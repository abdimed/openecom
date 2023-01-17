<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductSearch extends Component
{

    public string $search = '';


    public function render()
    {
        return view(
            'livewire.product-search',
            [
                'products' => Product::where('name', 'LIKE', "%{$this->search}%")->with('category')->get()
            ]
        );
    }
}
