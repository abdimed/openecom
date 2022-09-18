<?php

namespace App\Http\Livewire;

use App\Models\Variation;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartForm extends Component
{
    public $product;
    public $variation_id;
    public $price;

    public function post($variation_id)
    {
        $variation = Variation::findOrFail($variation_id);

        Cart::add($variation->id, $variation->name, 50, $variation->price, $variation->id);

    }

    public function price($variation_id)
    {
        $variation = Variation::findOrFail($variation_id);
        $this->price = $variation->price;
    }

    public function mount()
    {
        $this->variation_id = 1;
    }

    public function render()
    {
        return view('livewire.cart-form');
    }
}
