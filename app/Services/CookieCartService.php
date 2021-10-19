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
            $isEmpty = true;
            $sum = 0;
        } else {
            $cart = \Cart::session($_COOKIE['cart_id'])->getContent();
            $quantity = \Cart::session($_COOKIE['cart_id'])->getTotalQuantity();
            $isEmpty = \Cart::session($_COOKIE['cart_id'])->isEmpty();
            $sum = \Cart::session($_COOKIE['cart_id'])->getTotal();
        }

        return collect([
            'cart' => $cart,
            'quantity' => $quantity,
            'isEmpty' => $isEmpty,
            'sum' => $sum,
        ]);
    }
}
