<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Services\CookieCartService;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{
    public function basket(Request $request, CookieCartService $cookieCartService)
    {
        $basket = $cookieCartService->check();
        $brands = Brand::all();

        return view('basket', [
            'allBrands' => $brands,
            'cart' => $basket['cart'],
            'quantity' => $basket['quantity'],
        ]);
    }

    public function basketAdd(Request $request)
    {
        $product = Product::where('id', $request->productId)->first();

        \Cart::session($_COOKIE['cart_id']);
        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [
                'img' => $product->image,
                'amount' => $product->amount,
            ]
        ]);
        return response()->json(\Cart::getTotalQuantity());
    }

    public function basketDelete(Request $request)
    {
        \Cart::session($_COOKIE['cart_id']);

        \Cart::remove($request->productId);

        return response()->json(\Cart::getContent());
    }

    public function basketUpdate(Request $request)
    {
        if ($request->positive) {
            \Cart::session($_COOKIE['cart_id'])->update($request->productId,[
                'quantity' => +1,
            ]);
        } else {
            \Cart::session($_COOKIE['cart_id'])->update($request->productId,[
                'quantity' => -1,
            ]);
        }
        return response()->json([
            'totalSum' => \Cart::session($_COOKIE['cart_id'])->getTotal(),
            'totalQuantity' => \Cart::session($_COOKIE['cart_id'])->getTotalQuantity(),
            'currentProduct' => \Cart::session($_COOKIE['cart_id'])->get($request->productId)
        ]);
    }
}
