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
        ]);
    }
}
