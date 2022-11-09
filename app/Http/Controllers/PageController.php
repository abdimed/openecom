<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Media;
use App\Models\Product;
use Illuminate\Http\Request;

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
            'products' => $category->products()->get(),
            'categories' => Category::all()
        ]);
    }

    public function productDetails(Category $category, Product $product)
    {
        return view('pages.product-details', [
            'product' => $product,
            'category' => Category::findOrFail($category->id),
            'categories' => Category::all()
        ]);
    }

}
