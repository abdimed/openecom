<?php

namespace Tests\Feature;

use App\Models\Variation;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_products_can_be_added_to_cart()
    {

        $variation = Variation::factory()->create();

        Cart::add($variation->id, $variation->product->name, 1, $variation->price, 1, ['product_id' => $variation->product->id, 'variation' => $variation->name, 'img' => $variation->product->images[0]]);

        $this->assertTrue(Cart::content()->count() > 0);
    }

    public function test_product_is_already_in_cart()
    {
        $variation = Variation::factory()->create();

        Cart::add($variation->id, $variation->product->name, 1, $variation->price, 1, ['product_id' => $variation->product->id, 'variation' => $variation->name, 'img' => $variation->product->images[0]]);

        $this->assertTrue(Cart::content()->count() == 1);
    }
}
