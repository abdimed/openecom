<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use App\Models\Category;
class CartTable extends Component
{

    public $item;

    public $rowId;

    public function addQty($rowId)
    {

        $itemQty = Cart::get($rowId)->qty;

        Cart::update($rowId, $itemQty + 1);

        $this->emit('cart_updated');
    }

    public function minusQty($rowId)
    {

        $itemQty = Cart::get($rowId)->qty;

        if ($itemQty > 1) {

            Cart::update($rowId, $itemQty - 1);
        }
    }

    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);

        $this->emit('cart_updated');
    }

    protected $listeners = ['orderPosted' => 'completeOrder'];

    public function completeOrder()
    {

        session()->flash('orderPosted', 'Votre commande a bien été reçue!');

        Cart::destroy();
    }

    public function render()
    {
        return view(
            'livewire.cart-table',
            [
                'cartItems' => Cart::content(),
                'totalPrice' => Cart::subtotal(),
                'categories' => Category::all()
            ]
        );
    }
}
