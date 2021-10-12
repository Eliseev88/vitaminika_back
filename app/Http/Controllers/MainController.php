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

        return view('index', [
            'allBrands' => $brands,
            'topBrand' => $topBrand,
            'cart_id' => $cart_id,
            'cart' => \Cart::session($cart_id)->getContent(),
        ]);
    }

    public function brand($brandName)
    {
        if (!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];

        $brands = Brand::all();
        $brand = Brand::where('name', $brandName)->first();
        return view('brand', [
            'allBrands' => $brands,
            'currentBrand' => $brand,
            'cart_id' => $cart_id,
            'cart' => \Cart::session($cart_id)->getContent(),
        ]);
    }

    public function product($brandName, $productName)
    {
        if (!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];

        $brands = Brand::all();
        $currentProduct = Product::with('brand', 'amounts')->where('name', $productName)->first();
        return view('product', [
            'allBrands' => $brands,
            'currentProduct' => $currentProduct,
            'cart_id' => $cart_id,
            'cart' => \Cart::session($cart_id)->getContent(),
        ]);
    }

    public function contacts()
    {
        if (!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];
        $brands = Brand::all();

        return view('contacts', [
            'allBrands' => $brands,
            'cart_id' => $cart_id,
        ]);
    }

    public function delivery()
    {
        if (!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];
        $brands = Brand::all();

        return view('delivery', [
            'allBrands' => $brands,
            'cart_id' => $cart_id,
        ]);
    }
}
