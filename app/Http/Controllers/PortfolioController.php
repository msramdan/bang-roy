<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Http\Requests\{StorePortfolioRequest, UpdatePortfolioRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;
use RealRashid\SweetAlert\Facades\Alert;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:portfolio view')->only('index', 'show');
        $this->middleware('permission:portfolio create')->only('create', 'store');
        $this->middleware('permission:portfolio edit')->only('edit', 'update');
        $this->middleware('permission:portfolio delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $portfolios = Portfolio::query();

            return Datatables::of($portfolios)
                ->addColumn('keterangan', function($row){
                    return str($row->keterangan)->limit(100);
                })
				
                ->addColumn('photo', function ($row) {
                    if ($row->photo == null) {
                    return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                }
                    return asset('storage/uploads/photos/' . $row->photo);
                })

                ->addColumn('action', 'portfolios.include.action')
                ->toJson();
        }

        return view('portfolios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortfolioRequest $request)
    {
        $attr = $request->validated();
        
        if ($request->file('photo') && $request->file('photo')->isValid()) {

            $path = storage_path('app/public/uploads/photos/');
            $filename = $request->file('photo')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('photo')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            $attr['photo'] = $filename;
        }

        Portfolio::create($attr);

        return redirect()
            ->route('portfolios.index')
            ->with('success', __('The portfolio was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        return view('portfolios.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        $attr = $request->validated();
        
        if ($request->file('photo') && $request->file('photo')->isValid()) {

            $path = storage_path('app/public/uploads/photos/');
            $filename = $request->file('photo')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('photo')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            // delete old photo from storage
            if ($portfolio->photo != null && file_exists($path . $portfolio->photo)) {
                unlink($path . $portfolio->photo);
            }

            $attr['photo'] = $filename;
        }

        $portfolio->update($attr);

        return redirect()
            ->route('portfolios.index')
            ->with('success', __('The portfolio was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        try {
            $path = storage_path('app/public/uploads/photos/');

            if ($portfolio->photo != null && file_exists($path . $portfolio->photo)) {
                unlink($path . $portfolio->photo);
            }

            $portfolio->delete();

            return redirect()
                ->route('portfolios.index')
                ->with('success', __('The portfolio was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('portfolios.index')
                ->with('error', __("The portfolio can't be deleted because it's related to another table."));
        }
    }
}
