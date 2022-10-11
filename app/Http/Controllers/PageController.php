<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Media;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        return view('pages.welcome', [
           'products' => Product::with(['brand', 'category'])->get(),
           'categories' => Category::all(),
           'medias' => Media::all(),
        ]);
    }

}
