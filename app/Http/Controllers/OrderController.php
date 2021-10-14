<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderAddRequest;
use App\Mail\OrderCreated;
use App\Models\Brand;
use App\Models\Order;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function order()
    {
        $brands = Brand::all();
        $cart_id = $_COOKIE['cart_id'];

        return view('order', [
            'allBrands' => $brands,
            'cart_id' => $cart_id,
        ]);
    }

    public function orderAdd(OrderAddRequest $request)
    {
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);

        $fields = $request->only(['name', 'surname', 'phone', 'email', 'address', 'delivery']);
        $fields['sum'] = \Cart::getTotal();
        $order = Order::create($fields);
        $cart = \Cart::getContent();

        if ($order) {
            foreach ($cart as $product) {
                $order->products()->attach($product->id, ['count' => $product->quantity]);
            }
            Mail::to($order->email)->send(new OrderCreated($order, $cart));
            \Cart::clear();
            return redirect()->route('order')->with([
                'orderId' => $order->id,
                'email' => $order->email,
                'sum' => $order->sum,
                'success' => true,
            ]);
        }
        return back()->withInput();
    }
}
