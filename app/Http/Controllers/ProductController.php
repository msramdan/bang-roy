<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\{StoreProductRequest, UpdateProductRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:product view')->only('index', 'show');
        $this->middleware('permission:product create')->only('create', 'store');
        $this->middleware('permission:product edit')->only('edit', 'update');
        $this->middleware('permission:product delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $products = DB::table('products')
            ->leftJoin('categoryproducts', 'products.categoryproducts_id', '=', 'categoryproducts.id')
            ->select('products.*', 'categoryproducts.category_name');

            return Datatables::of($products)
                ->addColumn('keterangan', function($row){
                    return str($row->keterangan)->limit(100);
                })
				->addColumn('categoryproduct', function ($row) {
                    return $row->category_name;
                })
                ->addColumn('photo', function ($row) {
                    if ($row->photo == null) {
                    return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                }
                    return asset('storage/uploads/photos/' . $row->photo);
                })

                ->addColumn('action', 'products.include.action')
                ->toJson();
        }

        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
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

        Product::create($attr);

        return redirect()
            ->route('products.index')
            ->with('success', __('The product was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load('categoryproduct:id,category_name', );

		return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product->load('categoryproduct:id,category_name', );

		return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
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
            if ($product->photo != null && file_exists($path . $product->photo)) {
                unlink($path . $product->photo);
            }

            $attr['photo'] = $filename;
        }

        $product->update($attr);

        return redirect()
            ->route('products.index')
            ->with('success', __('The product was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $path = storage_path('app/public/uploads/photos/');

            if ($product->photo != null && file_exists($path . $product->photo)) {
                unlink($path . $product->photo);
            }

            $product->delete();

            return redirect()
                ->route('products.index')
                ->with('success', __('The product was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('products.index')
                ->with('error', __("The product can't be deleted because it's related to another table."));
        }
    }

    public function getProductDetails($id)
    {
        $product = Product::find($id);

        // Return the product details in a blade view
        return view('products.modal_content', ['product' => $product]);
    }

    public function searchProducts(Request $request)
{
    $query = $request->input('query');

    $products = Product::where('nama', 'like', '%' . $query . '%')->get();

    return response()->json($products);
}
}
