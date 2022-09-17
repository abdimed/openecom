<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Variation;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view(Brand $brand, Product $product)
    {
        return view('pages.product-details', [
            'product' => $product,
            'brand' => $brand,
        ]);
    }

    public function order(Brand $brand, Product $product, Request $request)
    {
        return view('pages.product-order', [
            'product' => $product,
            'brand' => $brand,
            'variation' => $request->variation,
        ]);
    }
}
