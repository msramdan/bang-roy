<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\{StoreClientRequest, UpdateClientRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:client view')->only('index', 'show');
        $this->middleware('permission:client create')->only('create', 'store');
        $this->middleware('permission:client edit')->only('edit', 'update');
        $this->middleware('permission:client delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $clients = Client::query();

            return Datatables::of($clients)
                
                ->addColumn('logo', function ($row) {
                    if ($row->logo == null) {
                    return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                }
                    return asset('storage/uploads/logos/' . $row->logo);
                })

                ->addColumn('action', 'clients.include.action')
                ->toJson();
        }

        return view('clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $attr = $request->validated();
        
        if ($request->file('logo') && $request->file('logo')->isValid()) {

            $path = storage_path('app/public/uploads/logos/');
            $filename = $request->file('logo')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('logo')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            $attr['logo'] = $filename;
        }

        Client::create($attr);

        return redirect()
            ->route('clients.index')
            ->with('success', __('The client was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $attr = $request->validated();
        
        if ($request->file('logo') && $request->file('logo')->isValid()) {

            $path = storage_path('app/public/uploads/logos/');
            $filename = $request->file('logo')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('logo')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            // delete old logo from storage
            if ($client->logo != null && file_exists($path . $client->logo)) {
                unlink($path . $client->logo);
            }

            $attr['logo'] = $filename;
        }

        $client->update($attr);

        return redirect()
            ->route('clients.index')
            ->with('success', __('The client was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        try {
            $path = storage_path('app/public/uploads/logos/');

            if ($client->logo != null && file_exists($path . $client->logo)) {
                unlink($path . $client->logo);
            }

            $client->delete();

            return redirect()
                ->route('clients.index')
                ->with('success', __('The client was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('clients.index')
                ->with('error', __("The client can't be deleted because it's related to another table."));
        }
    }
}
