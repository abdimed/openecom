<?php

namespace App\Http\Livewire;

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
        $variation = $this->product->variations->firstWhere('id', $this->variation_id);

        Cart::add($variation->id, $this->product->name, 1, $variation->price, 1, ['product_id' => $this->product->id, 'variation' => $variation->name, 'img' => $this->product->images[0]]);

        $this->emit('cart_updated');
    }

    public function buyNow()
    {

        if (!Cart::content()->where('id', $this->variation_id)->count()) {

            $variation = $this->product->variations->firstWhere('id', $this->variation_id);

            Cart::add($variation->id, $this->product->name, 1, $variation->price, 1, ['variation' => $variation->name, 'img' => $this->product->images[0]]);
        }

        return to_route('cart.view');
    }

    public function mount()
    {
        $firstVariation = $this->product->variations->first();
        $this->variation_id = $firstVariation->id;
        $this->price = number_format($firstVariation->price, 2, ',', '.');
    }

    public function updatedVariationID()
    {
        $this->price = $this->variations->firstWhere('id', $this->variation_id)->price;
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
