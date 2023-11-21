<?php

namespace App\Http\Controllers;

use App\Models\Categoryproduct;
use App\Http\Requests\{StoreCategoryproductRequest, UpdateCategoryproductRequest};
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryproductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:categoryproduct view')->only('index', 'show');
        $this->middleware('permission:categoryproduct create')->only('create', 'store');
        $this->middleware('permission:categoryproduct edit')->only('edit', 'update');
        $this->middleware('permission:categoryproduct delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $categoryproducts = Categoryproduct::query();

            return DataTables::of($categoryproducts)
                ->addColumn('action', 'categoryproducts.include.action')
                ->toJson();
        }

        return view('categoryproducts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoryproducts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryproductRequest $request)
    {
        
        Categoryproduct::create($request->validated());
        Alert::toast('The categoryproduct was created successfully.', 'success');
        return redirect()->route('categoryproducts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoryproduct  $categoryproduct
     * @return \Illuminate\Http\Response
     */
    public function show(Categoryproduct $categoryproduct)
    {
        return view('categoryproducts.show', compact('categoryproduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoryproduct  $categoryproduct
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoryproduct $categoryproduct)
    {
        return view('categoryproducts.edit', compact('categoryproduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoryproduct  $categoryproduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryproductRequest $request, Categoryproduct $categoryproduct)
    {
        
        $categoryproduct->update($request->validated());
        Alert::toast('The categoryproduct was updated successfully.', 'success');
        return redirect()
            ->route('categoryproducts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoryproduct  $categoryproduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoryproduct $categoryproduct)
    {
        try {
            $categoryproduct->delete();
            Alert::toast('The categoryproduct was deleted successfully.', 'success');
            return redirect()->route('categoryproducts.index');
        } catch (\Throwable $th) {
            Alert::toast('The categoryproduct cant be deleted because its related to another table.', 'error');
            return redirect()->route('categoryproducts.index');
        }
    }
}
