<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Customer;
use App\Models\Product;

class PageController extends Controller
{
    public function welcome()
    {
        return view('pages.welcome', [
            'collections' => Collection::has('products.variations')->with([
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
            'products' => $category->products()->has('variations')->with('variations', 'category')->get(),
            'categories' => Category::all(),
        ]);
    }

    public function collectionProducts(Collection $collection)
    {
        return view('pages.collection-products', [
            'products' => $collection->products()->has('variations')->with('variations', 'category')->get(),
            'categories' => Category::all(),
            'collection' => $collection->name,
        ]);
    }

    public function productDetails(Category $category, Product $product)
    {

        return view('pages.product-details', [
            'product' => $product,
            'category' => $category,
            'otherProducts' => $category->products()->where('id', '!=', $product->id)->has('variations')->with('category', 'variations')->get(),
            'categories' => Category::all(),
        ]);
    }

    public function productSamet()
    {
        return view('pages.category-products', [
            'products' => Product::has('variations')->with('variations', 'category')->whereRelation('brand', 'name', 'samet')->get(),
            'categories' => Category::all()
        ]);
    }
}
