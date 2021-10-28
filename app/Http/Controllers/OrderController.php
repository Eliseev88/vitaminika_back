<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderAddRequest;
use App\Mail\ConfirmAdminAboutOrder;
use App\Mail\OrderCreated;
use App\Models\Brand;
use App\Models\Order;
use App\Services\CookieCartService;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function order(CookieCartService $cookieCartService)
    {
        $basket = $cookieCartService->check();
        $brands = Brand::all();

        return view('order', [
            'allBrands' => $brands,
            'quantity' => $basket['quantity'],
        ]);
    }

    public function orderAdd(OrderAddRequest $request)
    {
        \Cart::session($_COOKIE['cart_id']);

        $fields = $request->only(['name', 'surname', 'phone', 'email', 'address', 'delivery']);
        $fields['sum'] = \Cart::getTotal();
        $order = Order::create($fields);
        $cart = \Cart::getContent();

        if ($order) {
            foreach ($cart as $product) {
                $order->products()->attach($product->id, ['count' => $product->quantity]);
            }
            Mail::to($order->email)->send(new OrderCreated($order, $cart));
            Mail::to('sales@vitaminika.ru')->send(new ConfirmAdminAboutOrder($order, $cart));
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
