<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{
    public function basket(Request $request) {
        if (!isset($_COOKIE['cart_id'])) {
            setcookie('cart_id', uniqid());
        }
        $cart_id = $_COOKIE['cart_id'];
        $brands = Brand::all();

        return view('basket', [
            'allBrands' => $brands,
            'cart_id' => $cart_id,
            'cart' => \Cart::session($cart_id)->getContent()
        ]);
    }

    public function basketAdd(Request $request)
    {
        $product = Product::where('id', $request->productId)->first();
        $productPrice = $product->price;

        \Cart::session($request->cart_id);
        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $productPrice,
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
        \Cart::session($request->cart_id);

        \Cart::remove($request->productId);

        return response()->json(\Cart::getContent());
    }

    public function basketUpdate(Request $request)
    {
        if ($request->positive) {
            \Cart::session($request->cart_id)->update($request->productId,[
                'quantity' => +1,
            ]);
        } else {
            \Cart::session($request->cart_id)->update($request->productId,[
                'quantity' => -1,
            ]);
        }
        return response()->json([
            'totalSum' => \Cart::session($request->cart_id)->getTotal(),
            'currentProduct' => \Cart::session($request->cart_id)->get($request->productId)
        ]);
    }
}
