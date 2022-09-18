<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartCounter extends Component
{

    public function render()
    {

        return view(
            'livewire.cart-counter',
            [
                'cart_counter' => Cart::content()->count(),
            ]
        );
    }
}
