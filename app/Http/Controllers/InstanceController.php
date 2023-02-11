<?php

namespace App\Http\Controllers;

use App\Models\Instance;
use App\Http\Requests\{StoreInstanceRequest, UpdateInstanceRequest};
use App\Models\SettingToleranceAlert;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InstanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:instance view')->only('index', 'show');
        $this->middleware('permission:instance create')->only('create', 'store');
        $this->middleware('permission:instance edit')->only('edit', 'update');
        $this->middleware('permission:instance delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $instances = Instance::with('province:id,provinsi', 'kabkot:id,kabupaten_kota', 'kecamatan:id,kabkot_id', 'kelurahan:id,kecamatan_id',);
            return DataTables::of($instances)
                ->addColumn('address', function ($row) {
                    return str($row->address)->limit(100);
                })
                ->addColumn('province', function ($row) {
                    return $row->province ? $row->province->provinsi : '';
                })->addColumn('kabkot', function ($row) {
                    return $row->kabkot ? $row->kabkot->kabupaten_kota : '';
                })->addColumn('kecamatan', function ($row) {
                    return $row->kecamatan ? $row->kecamatan->kabkot_id : '';
                })->addColumn('kelurahan', function ($row) {
                    return $row->kelurahan ? $row->kelurahan->kecamatan_id : '';
                })->addColumn('action', 'instances.include.action')
                ->toJson();
        }

        return view('instances.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $days = [
            'sunday',
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday',
            'saturday'
        ];

        return view('instances.create', compact('days'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $response = Http::withHeaders(['x-access-token' => setting_web()->token])
                ->withOptions(['verify' => false])
                ->post(setting_web()->endpoint_nms . '/openapi/app/create', [
                    "appName" =>  Str::slug(request('instance_name', '_')),
                    "pushURL" => $request->push_url,
                    "enableMQTT" => false
                ]);

            if ($response['code'] == 0) {
                $data = $request->except(['_token']);
                $data['app_id'] = $response['appID'];
                $data['app_name'] = Str::slug(request('instance_name', '_'));
                // create local intance
                $instances = Instance::create($data);

                // insert day operational
                $days = $request->day;
                $open_hour = $request->opening_hour;
                $closing_hour = $request->closing_hour;

                foreach ($days as $i => $day) {
                    $operational_time = OperationalTime::create([
                        'instance_id' => $instances->id,
                        'day' => $day,
                        'open_hour' => $open_hour[$i],
                        'closed_hour' => $closing_hour[$i]
                    ]);
                }

                // insert tolerance
                $field_data = $request->field_data;
                $min_tolerance = $request->min_tolerance;
                $max_tolerance = $request->max_tolerance;

                foreach ($field_data as $a => $field) {
                    $setting_tolerance = SettingToleranceAlert::create([
                        'instance_id' => $instances->id,
                        'field_data' => $field,
                        'min_tolerance' => $min_tolerance[$a],
                        'max_tolerance' => $max_tolerance[$a]
                    ]);
                }
                if ($instances) {
                    Alert::toast('Data success saved', 'success');
                    return redirect()->route('instances.index');
                }
            } else {
                Alert::toast('There is something wrong with respond api.', 'error');
                return redirect()->route('instances.index');
            }
        } catch (Exception $e) {
            Alert::toast('Data failed to save', 'error');
            return redirect()->route('instances.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function show(Instance $instance)
    {
        $instance->load('province:id,provinsi', 'kabkot:id,provinsi_id', 'kecamatan:id,kabkot_id', 'kelurahan:id,kecamatan_id',);

        return view('instances.show', compact('instance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function edit(Instance $instance)
    {
        $instance->load('province:id,provinsi', 'kabkot:id,provinsi_id', 'kecamatan:id,kabkot_id', 'kelurahan:id,kecamatan_id',);

        return view('instances.edit', compact('instance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstanceRequest $request, Instance $instance)
    {

        $instance->update($request->validated());
        Alert::toast('The instance was updated successfully.', 'success');
        return redirect()
            ->route('instances.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instance $instance)
    {
        try {
            $response = Http::withHeaders(['x-access-token' => setting_web()->token])
                ->withOptions(['verify' => false])
                ->post(setting_web()->endpoint_nms . '/openapi/app/delete', [
                    "appIDs" => [$instance->app_id],
                ]);
            if ($response['code'] == 0) {
                $instance->delete();
                Alert::toast('The instance was deleted successfully.', 'success');
                return redirect()->route('instances.index');
            } else {
                Alert::toast('There is something wrong with respond api.', 'error');
                return redirect()->route('instances.index');
            }
        } catch (\Throwable $th) {
            Alert::toast('The instance cant be deleted because its related to another table.', 'error');
            return redirect()->route('instances.index');
        }
    }
}
