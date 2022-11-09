<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CartController extends Controller
{
    public function view()
    {
        return view('pages.cart',[
            'categories' => Category::all()
        ]);
    }
}
