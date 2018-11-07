<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Cart;

class CartComposer
{
    protected $cart;
    protected $count;
    protected $total;

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        if (Auth::check()){
            $this->cart = Cart::instance(Auth::id())->content();
            $this->count = str_pad(Cart::instance(Auth::id())->count(), 2, '0', STR_PAD_LEFT);
            $this->total = Cart::instance(Auth::id())->subtotal();
        } else {
            $this->cart = Cart::instance(0)->content();
            $this->count = str_pad(Cart::instance(0)->count(), 2, '0', STR_PAD_LEFT);
            $this->total = Cart::instance(0)->subtotal();
        }
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('cart', ['count' => $this->count, 'content' => $this->cart, 'total' => $this->total]);
    }
}