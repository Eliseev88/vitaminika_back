<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $cart;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $cart)
    {
        $this->order = $order;
        $this->cart = $cart;
        $this->subject('Ваш заказ в магазине Витаминика');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.order_created', [
            'order' => $this->order,
            'cart' => $this->cart,
        ]);
    }
}
