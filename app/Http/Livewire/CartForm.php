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
    public $variations;

    public function post()
    {
        $variation = Variation::findOrFail($this->variation_id);

        Cart::add($variation->id, $variation->name, 50, $variation->price, $variation->id);

    }

    public function mount()
    {
        $firstVariation = $this->product->variations->first();
        $this->variation_id = $firstVariation->id;
        $this->price = $firstVariation->price;

    }

    public function updatedVariationID()
    {
        $variation = $this->variations->firstWhere('id', $this->variation_id);
        $this->price= $variation->price;
    }

    public function render()
    {
        return view('livewire.cart-form');
    }
}
