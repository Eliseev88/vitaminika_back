<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        if (!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];

        $brands = Brand::all();
        $topBrand = Brand::find(rand(1, 3));
        $topBrandRandomProducts = Product::where('brand_id', $topBrand->id)
            ->where('availability', '1')->inRandomOrder()->get();

        return view('index', [
            'allBrands' => $brands,
            'topBrand' => $topBrand,
            'topBrandRandomProducts' => $topBrandRandomProducts,
            'cart_id' => $cart_id,
            'cart' => \Cart::session($_COOKIE['cart_id'])->getContent(),
        ]);
    }

    public function brand(Brand $brand)
    {
        if (!isset($_COOKIE['cart_id'])) {
            setcookie('cart_id', uniqid());
        }
        $cart_id = $_COOKIE['cart_id'];
        $brands = Brand::all();
        $products = Product::where('brand_id', $brand->id)->where('availability', 1)->paginate(6);
        return view('brand', [
            'allBrands' => $brands,
            'currentBrand' => $brand,
            'products' => $products,
            'cart_id' => $cart_id,
            'cart' => \Cart::session($cart_id)->getContent(),
        ]);
    }

    public function product(Brand $brand, Product $product)
    {
        if (!isset($_COOKIE['cart_id'])) {
            setcookie('cart_id', uniqid());
            $cart_id = $_COOKIE['cart_id'];
        }
        $cart_id = $_COOKIE['cart_id'];
        $brands = Brand::all();
        return view('product', [
            'allBrands' => $brands,
            'currentProduct' => $product,
            'cart_id' => $cart_id,
            'cart' => \Cart::session($cart_id)->getContent(),
        ]);
    }

    public function contacts()
    {
        if (!isset($_COOKIE['cart_id'])) {
            setcookie('cart_id', uniqid());
            $cart_id = $_COOKIE['cart_id'];
        }
        $cart_id = $_COOKIE['cart_id'];
        $brands = Brand::all();

        return view('contacts', [
            'allBrands' => $brands,
            'cart_id' => $cart_id,
        ]);
    }

    public function delivery()
    {
        if (!isset($_COOKIE['cart_id'])) {
            setcookie('cart_id', uniqid());
            $cart_id = $_COOKIE['cart_id'];
        }
        $cart_id = $_COOKIE['cart_id'];
        $brands = Brand::all();

        return view('delivery', [
            'allBrands' => $brands,
            'cart_id' => $cart_id,
        ]);
    }

    public function pagination(Request $request)
    {
        if($request->ajax())
        {
            $cart_id = $_COOKIE['cart_id'];
            $data = Product::where('brand_id', $request->brandId)->where('availability', 1)->paginate(6);
            $brand = Brand::find($request->brandId);
            return view('vendor.pagination.data', [
                'products' => $data,
                'currentBrand' => $brand,
                'cart_id' => $cart_id,
            ])->render();
        }
    }
}
