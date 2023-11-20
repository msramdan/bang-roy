<?php

namespace App\Http\Controllers;

use App\Models\Vm;
use App\Http\Requests\{StoreVmRequest, UpdateVmRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class VmController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:vm view')->only('index', 'show');
        $this->middleware('permission:vm edit')->only('edit', 'update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vm = Vm::findOrFail(1)->first();
        return view('vms.edit', compact('vm'));

    }


    public function update(UpdateVmRequest $request, Vm $vm)
    {

        $vm->update($request->validated());
        Alert::toast('The vm was updated successfully.', 'success');
        return redirect()
            ->route('vms.index');
    }

}
