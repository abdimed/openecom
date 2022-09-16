<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function view(Brand $brand, Product $product)
    {
        return view('pages.product-details', [
            'product' => $product,
            'brand' => $brand
        ]);
    }
}
