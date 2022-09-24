<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartTable extends Component
{


    public $item;

    public $rowId;


    public function addQty($rowId)
    {

        $itemQty = Cart::get($rowId)->qty;

        Cart::update($rowId, $itemQty+1);

    }

    public function render()
    {
        return view(
            'livewire.cart-table',
            [
                'cartItems' => Cart::content(),
            ]
        );
    }
}
