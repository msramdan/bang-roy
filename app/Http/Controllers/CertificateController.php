<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Http\Requests\{StoreCertificateRequest, UpdateCertificateRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;
use RealRashid\SweetAlert\Facades\Alert;

class CertificateController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:certificate view')->only('index', 'show');
        $this->middleware('permission:certificate create')->only('create', 'store');
        $this->middleware('permission:certificate edit')->only('edit', 'update');
        $this->middleware('permission:certificate delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $certificates = Certificate::query();

            return Datatables::of($certificates)
                ->addColumn('keterangan', function($row){
                    return str($row->keterangan)->limit(100);
                })
				
                ->addColumn('image', function ($row) {
                    if ($row->image == null) {
                    return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                }
                    return asset('storage/uploads/images/' . $row->image);
                })

                ->addColumn('action', 'certificates.include.action')
                ->toJson();
        }

        return view('certificates.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certificates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCertificateRequest $request)
    {
        $attr = $request->validated();
        
        if ($request->file('image') && $request->file('image')->isValid()) {

            $path = storage_path('app/public/uploads/images/');
            $filename = $request->file('image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            $attr['image'] = $filename;
        }

        Certificate::create($attr);

        return redirect()
            ->route('certificates.index')
            ->with('success', __('The certificate was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        return view('certificates.show', compact('certificate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        return view('certificates.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        $attr = $request->validated();
        
        if ($request->file('image') && $request->file('image')->isValid()) {

            $path = storage_path('app/public/uploads/images/');
            $filename = $request->file('image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            // delete old image from storage
            if ($certificate->image != null && file_exists($path . $certificate->image)) {
                unlink($path . $certificate->image);
            }

            $attr['image'] = $filename;
        }

        $certificate->update($attr);

        return redirect()
            ->route('certificates.index')
            ->with('success', __('The certificate was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        try {
            $path = storage_path('app/public/uploads/images/');

            if ($certificate->image != null && file_exists($path . $certificate->image)) {
                unlink($path . $certificate->image);
            }

            $certificate->delete();

            return redirect()
                ->route('certificates.index')
                ->with('success', __('The certificate was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('certificates.index')
                ->with('error', __("The certificate can't be deleted because it's related to another table."));
        }
    }
}
