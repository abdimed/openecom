<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variation;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function view()
    {
        $items = Cart::content();

        $total = Cart::total();

        foreach ($items as $item)
        {
            $products[]= Product::find($item->id);
        }

        return view('pages.cart', [
           'cartItems' => Cart::content(),
           'total' => $total,
           'products'=> $products,
        ]);
    }
}
