<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;

class PageController extends Controller
{
    public function welcome()
    {
        return view('pages.welcome', [
            'collections' => Collection::has('products')->with([
                'products' => [
                    'category',
                    'variations',
                ]
            ])->get(),
            'categories' => Category::all()
        ]);
    }

    public function categoryProducts(Category $category)
    {
        return view('pages.category-products', [
            'products' => $category->products()->with('variations', 'category')->get(),
            'categories' => Category::all()
        ]);
    }

    public function productDetails(Category $category, Product $product)
    {

        return view('pages.product-details', [
            'product' => $product,
            'category' => $category,
            'otherProducts' => $category->products()->with('category', 'variations'),
            'categories' => Category::all()
        ]);
    }

}
