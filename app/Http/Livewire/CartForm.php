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

    public function addToCart()
    {
        $variation = Variation::findOrFail($this->variation_id);

         Cart::add($variation->id, $this->product->name, 50, $variation->price, $variation->id, ['variation'=>$variation->name]);
        //Cart::add($this->product, 1, ['variation'=>$variation->name]);

        $this->emit('cart_updated');
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
        $this->price = $variation->price;
    }

    public function render()
    {
        return view(
            'livewire.cart-form',
            [
                'isInCart' => Cart::content()->where('id', $this->variation_id)->count(),
            ]
        );
    }
}
