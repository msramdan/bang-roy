<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Http\Requests\{StoreDeviceRequest, UpdateDeviceRequest};
use App\Models\Instance;
use App\Models\Subnet;
use GuzzleHttp\Client;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:device view')->only('index', 'show');
        $this->middleware('permission:device create')->only('create', 'store');
        $this->middleware('permission:device edit')->only('edit', 'update');
        $this->middleware('permission:device delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $devices = Device::with('subnet:id,subnet', 'instance:id,instance_name,app_id', 'cluster:id,cluster_name')->orderBy('devices.id', 'DESC');
            return DataTables::of($devices)
                ->addIndexColumn()
                ->addColumn('subnet', function ($row) {
                    return $row->subnet ? $row->subnet->subnet : '';
                })->addColumn('instance', function ($row) {
                    return $row->instance ? $row->instance->instance_name : '';
                })->addColumn('app_id', function ($row) {
                    return $row->instance ? $row->instance->app_id : '';
                })->addColumn('cluster', function ($row) {
                    return $row->cluster ? $row->cluster->cluster_name : '';
                })->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y H:i:s');
                })->addColumn('updated_at', function ($row) {
                    return $row->updated_at->format('d M Y H:i:s');
                })->addColumn('action', 'devices.include.action')
                ->toJson();
        }
        return view('devices.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeviceRequest $request)
    {
        try {
            $subnet = Subnet::Where('id', $request->subnet_id)->first();
            $app = Instance::Where('id', $request->instance_id)->first();
            $url_endpoint = setting_web()->endpoint_nms . '/openapi/device/create';
            $api_token   = setting_web()->token;
            $payload = [
                "devEUI" => $request->dev_eui,
                "appEUI" =>  $request->app_eui,
                "devType" =>  $request->dev_type,
                "devName" => $request->dev_name,
                "region" => $request->region,
                "subnet" => $subnet->subnet,
                "authType" => $request->auth_type,
                "appID" => (int) $app->app_id,
                "appKey" => $request->app_key,
                "supportClassB" =>  $request->support_class_b == '1' ? false : true,
                "supportClassC" =>  $request->support_class_c == '1' ? false : true,
            ];
            if ($request->dev_type == 'otaa-type') {
                $payload['macVersion'] = $request->mac_version;
            }

            if ($request->dev_type == 'abp-type') {
                $payload['appSKey'] = $request->app_s_key;
                $payload['nwkSKey'] = $request->nwk_s_key;
                $payload['devAddr'] = $request->dev_addr;
            }
            $client = new Client;

            $headers = [
                'Content-Type'          => 'application/json',
                'x-access-token' => $api_token,
            ];

            $res = $client->post($url_endpoint, [
                'headers'           => $headers,
                'json'              => $payload,
                'force_ip_resolve'  => 'v4',
                'http_errors'       => false,
                'timeout'           => 120,
                'connect_timeout'   => 10,
                'allow_redirects'   => false,
                'verify'            => false,
            ]);

            $response = $res->getBody()->getContents();

            $response = json_decode($response);

            if ($response->code != 0) {
                $errorMessage = errorMessage($response->code);

                if (!empty($errorMessage)) {
                    Alert::toast('Failed to create device. ' . $errorMessage['message'], 'error');
                } else {
                    Alert::toast('Failed to create device. ', 'error');
                }
                return redirect()->route('devices.index');
            }
            $data = $request->except('_token');
            $save = Device::create($data);
        } catch (Exception $err) {
            \Log::error($err);
            Alert::toast('Failed to save records', 'error');
        }
        Alert::toast('The device was created successfully.', 'success');
        return redirect()->route('devices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        $device->load('subnet:id,subnet', 'instance:id,instance_name', 'cluster:id,cluster_name',);

        return view('devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        $device->load('subnet:id,subnet', 'instance:id,app_id', 'cluster:id,instance_id',);

        return view('devices.edit', compact('device'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {

        $url_update = setting_web()->endpoint_nms . '/openapi/device/update';
        $url_check_device = setting_web()->endpoint_nms . '/openapi/device/status?devEUI=' . $device->dev_eui;
        $api_token   = setting_web()->token;
        $curlOptions = [
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0
        ];

        $device_check = Http::withOptions([
            'curl' => $curlOptions,
        ])->withHeaders([
            'x-access-token' => $api_token
        ])->get($url_check_device);

        $response_check = $device_check->getBody()->getContents();
        $response_check = json_decode($response_check);

        if ($response_check->code != 0) {
            $errorMessage = errorMessage($response_check->code);
            if (!empty($errorMessage)) {
                Alert::toast('Failed to update device! ' . $errorMessage['message'], 'error');
            } else {
                Alert::toast('Failed to update device!', 'error');
            }

            return redirect()->route('device.index');
        }
        $payload = [
            "devEUI" => $request->dev_eui,
            "devName" => $request->dev_name,
        ];
        $client = new Client;
        $headers = [
            'Content-Type'          => 'application/json',
            'x-access-token' => $api_token,
        ];

        $res = $client->post($url_update, [
            'headers'           => $headers,
            'json'              => $payload,
            'force_ip_resolve'  => 'v4',
            'http_errors'       => false,
            'timeout'           => 120,
            'connect_timeout'   => 10,
            'allow_redirects'   => false,
            'verify'            => false,
        ]);

        $response = $res->getBody()->getContents();
        $response = json_decode($response);

        if ($response_check->code != 0) {
            $errorMessage = errorMessage($response_check->code);

            if (!empty($errorMessage)) {
                Alert::toast('Failed to update device! ' . $errorMessage['message'], 'error');
            } else {
                Alert::toast('Failed to update device!', 'error');
            }

            return redirect()->route('device.index');
        }
        Device::where('id', $device->id)
            ->update(
                [
                    'dev_name' => $request->dev_name,
                    'cluster_id' => $request->cluster_id
                ]
            );
        Alert::toast('The device was updated successfully.', 'success');
        return redirect()
            ->route('devices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        try {
            $url_endpoint = setting_web()->endpoint_nms . '/openapi/device/delete';
            $api_token   = setting_web()->token;
            $payload = [
                "devEUIs" => [$device->dev_eui],
            ];
            $client = new Client;
            $headers = [
                'Content-Type'          => 'application/json',
                'x-access-token' => $api_token,
            ];

            $res = $client->post($url_endpoint, [
                'headers'           => $headers,
                'json'              => $payload,
                'force_ip_resolve'  => 'v4',
                'http_errors'       => false,
                'timeout'           => 120,
                'connect_timeout'   => 10,
                'allow_redirects'   => false,
                'verify'            => false,
            ]);

            $response = $res->getBody()->getContents();
            $response = json_decode($response);
            if ($response->code != 0) {
                $errorMessage = errorMessage($response->code);

                if (!empty($errorMessage)) {
                    Alert::toast('Failed to Delete device. ' . $errorMessage['message'], 'error');
                } else {
                    Alert::toast('Failed to delete device. ', 'error');
                }

                return redirect()->back();
            }
            $deleted = DB::table('rawdatas')->where('dev_eui', $device->dev_eui)->delete();
            $device->delete();
            Alert::toast('The device was deleted successfully.', 'success');
            return redirect()->route('devices.index');
        } catch (\Throwable $th) {
            Alert::toast('The device cant be deleted because its related to another table.', 'error');
            return redirect()->route('devices.index');
        }
    }
}
