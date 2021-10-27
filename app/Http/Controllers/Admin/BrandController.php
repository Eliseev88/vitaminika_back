<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandAddRequest;
use App\Models\Brand;
use App\Services\FileUploadService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderByDesc('updated_at')->get();

        return view('admin.brands', [
            'brands' => $brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/createBrand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandAddRequest $request, FileUploadService $uploadedService)
    {
        $fields = $request->validated();
        $fields['updated_at'] = Carbon::now();
        $pathDir = '/brands/' . $fields['name'];

        if ($request->hasFile('image')) {
            $fields['image'] = $uploadedService->upload($request->file('image'), $pathDir);
        }

        if ($request->hasFile('presentation')) {
            $fields['presentation'] = $uploadedService->upload($request->file('presentation'), $pathDir);
        }

        $brand = Brand::create($fields);

        if ($brand) {
            return redirect()->route('admin.brand.all')
                ->with('success', 'Бренд успешно добавлен');
        }

        return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('admin/editBrand', [
            'brand' => $brand,
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
    public function update(BrandAddRequest $request, Brand $brand, FileUploadService $uploadedService)
    {
        $fields = $request->validated();
        $fields['updated_at'] = Carbon::now();
        $pathDir = '/brands/' . $fields['name'];

        if ($request->hasFile('image')) {
            $brandFile = $brand->find($request->brand)->image;
            Storage::disk('public')->delete($brandFile);

            $fields['image'] = $uploadedService->upload($request->file('image'), $pathDir);
        }

        if ($request->hasFile('presentation')) {
            $brandFile = $brand->find($request->brand)->presentation;
            Storage::disk('public')->delete($brandFile);

            $fields['presentation'] = $uploadedService->upload($request->file('presentation'), $pathDir);
        }

        $brand = $brand->where('id', $request->brand)->update($fields);

        if ($brand) {
            return redirect()->route('admin.brand.all')
                ->with('success', 'Бренд успешно обновлен');
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
        $brandFile = Brand::find($request->brandId)->name;
        Storage::disk('public')->deleteDirectory('/img/brands/' . $brandFile);

        $brand = Brand::where('id', $request->brandId)->delete();;

        if ($brand) {
            return true;
        }

        return false;
    }
}
