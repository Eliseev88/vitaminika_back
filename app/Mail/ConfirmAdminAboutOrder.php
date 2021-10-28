<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmAdminAboutOrder extends Mailable
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
        $this->subject('Поступил новый заказ');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.order_admin_notification', [
            'order' => $this->order,
            'cart' => $this->cart,
        ]);
    }
}
