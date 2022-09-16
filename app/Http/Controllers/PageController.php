<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        return view('pages.welcome', [
           'products' => Product::with(['brand', 'categories'])->get()
        ]);
    }

}
