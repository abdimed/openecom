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

    public function minusQty($rowId)
    {

        $itemQty = Cart::get($rowId)->qty;

        Cart::update($rowId, $itemQty-1);

    }

    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);

        $this->emit('cart_updated');
    }

    public function render()
    {
        $this->totalPrice = Cart::total();
        return view(
            'livewire.cart-table',
            [
                'cartItems' => Cart::content(),
                'totalPrice' => Cart::total(),
            ]
        );
    }
}
