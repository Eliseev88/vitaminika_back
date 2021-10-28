<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use App\Models\Product;
use App\Services\CookieCartService;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(CookieCartService $cookieCartService)
    {
        $collection = $cookieCartService->check();
        $brands = Brand::all();
        $topBrand = Brand::inRandomOrder()->first();
        $topBrandRandomProducts = Product::where('brand_id', $topBrand->id)
            ->where('availability', '1')->inRandomOrder()->get();

        return view('index', [
            'allBrands' => $brands,
            'topBrand' => $topBrand,
            'topBrandRandomProducts' => $topBrandRandomProducts,
            'quantity' => $collection['quantity'],
        ]);
    }

    public function brand(Brand $brand, CookieCartService $cookieCartService)
    {
        $basket = $cookieCartService->check();
        $brands = Brand::all();
        $products = Product::where('brand_id', $brand->id)->where('availability', 1)->paginate(6);
        return view('brand', [
            'allBrands' => $brands,
            'currentBrand' => $brand,
            'products' => $products,
            'quantity' => $basket['quantity'],
        ]);
    }

    public function product(Brand $brand, Product $product, CookieCartService $cookieCartService)
    {
        $basket = $cookieCartService->check();
        $brands = Brand::all();
        $products = Product::where('brand_id', $brand->id)->where('availability', 1)->get();
        return view('product', [
            'allBrands' => $brands,
            'currentProduct' => $product,
            'quantity' => $basket['quantity'],
            'products' => $products,
        ]);
    }

    public function contacts(CookieCartService $cookieCartService)
    {
        $basket = $cookieCartService->check();
        $brands = Brand::all();

        return view('contacts', [
            'allBrands' => $brands,
            'quantity' => $basket['quantity'],
        ]);
    }

    public function delivery(CookieCartService $cookieCartService)
    {
        $basket = $cookieCartService->check();
        $brands = Brand::all();

        return view('delivery', [
            'allBrands' => $brands,
            'quantity' => $basket['quantity'],
        ]);
    }

    public function pagination(Request $request)
    {
        if($request->ajax())
        {
            $data = Product::where('brand_id', $request->brandId)->where('availability', 1)->paginate(6);
            $brand = Brand::find($request->brandId);
            return view('vendor.pagination.data', [
                'products' => $data,
                'currentBrand' => $brand,
            ])->render();
        }
    }
}
