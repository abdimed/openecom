<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductSearch extends Component
{

    public string $search = '';

    public $products;

    public function searchUpdated()
    {
        if ($this->search == '') {
        } else
            $this->products =  Product::where('name', 'LIKE', "%{$this->search}%")->get();
    }

    public function render()
    {
        return view(
            'livewire.product-search',
            [
                'products' => $this->products
            ]
        );
    }
}
