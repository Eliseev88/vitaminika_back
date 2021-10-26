<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductAddRequest;
use App\Services\FileUploadService;
use App\Models\Brand;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('updated_at')->get();


        return view('admin/products', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::orderBy('updated_at')->get();

        return view('admin/createProduct', [
            'brands' => $brands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FileUploadService $uploadedService)
    {
        $fields = $request->all();

        $fields['updated_at'] = Carbon::now();
        $pathDir = '/img/products/' . $fields['name'];

        if ($request->hasFile('image')) {
            $fields['image'] = $uploadedService->upload($request->file('image'), $pathDir);
        }

        $product = Product::create($fields);

        if ($product) {
            return redirect()->route('admin.products')
                ->with('success', 'Товар успешно добавлен');
        }

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        return view('admin/editProduct', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, FileUploadService $uploadedService)
    {
        $fields = $request->only(
            'brand_id',
            'name',
            'code',
            'description',
            'details',
            'function',
            'form',
            'amount',
            'image',
            'availability'
        );
        

        $fields['updated_at'] = Carbon::now();
        $pathDir = '/img/products/' . $fields['name'];

        if ($request->hasFile('image')) {
            $productFile = $product->find($request->product)->image;
            Storage::disk('public')->delete($productFile);

            $fields['image'] = $uploadedService->upload($request->file('image'), $pathDir);
        }

        $product = $product->where('id', $request->product)->update($fields);

        if ($product) {
            return redirect()->route('admin.products')
                ->with('success', 'Товар успешно добавлен');
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $productFile = Brand::find($request->productId)->name;
        Storage::disk('public')->deleteDirectory('/img/products/' . $productFile);

        $product = Brand::where('id', $request->productId)->delete();;

        if ($product) {
            return true;
        }

        return false;
    }
}
