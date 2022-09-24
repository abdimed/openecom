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

        $total = Cart::total();

        return view('pages.cart', [
            'total' => $total,
        ]);
    }
}
