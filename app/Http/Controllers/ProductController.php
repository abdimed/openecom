<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;


class ProductController extends Controller
{
    public function view(Category $category, Product $product)
    {
        return view('pages.product-details', [
            'product' => $product,
            'category' => Category::findOrFail($category->id),
        ]);
    }
}
