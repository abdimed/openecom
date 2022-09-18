<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Variation;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view(Category $category, Product $product)
    {

        return view('pages.product-details', [
            'product' => $product,
        ]);
    }

    public function order(Category $category, Product $product, Request $request)
    {
        switch ($request->action) {
            case 'order':
                return view('pages.product-order', [
                    'product' => $product,
                    'variation' => $request->variation,
                ]);
                break;

            case 'addToCart':
                $variation = Variation::findOrFail($request->variation);

                Cart::add($variation->id, $product->name, 50, $variation->price, $variation->id);
                return back();
                break;
        }
    }
}
