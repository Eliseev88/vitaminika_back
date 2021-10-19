<?php


namespace App\Services;


class CookieCartService
{
    public function check()
    {
        if (!isset($_COOKIE['cart_id'])) {
            setcookie('cart_id', uniqid());
            $cart = null;
            $quantity = null;
        } else {
            $cart = \Cart::session($_COOKIE['cart_id'])->getContent();
            $quantity = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
        }

        return collect([
            'cart' => $cart,
            'quantity' => $quantity,
        ]);
    }
}
