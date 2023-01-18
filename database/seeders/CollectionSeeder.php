<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\Variation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Collection::factory()
            ->has(
                Product::factory()
                    ->state([
                        'document' => 'doc.pdf'
                    ])
                    ->for(
                        Category::factory()->state([
                            'name' => 'metal',
                        ])
                    )
                    ->for(
                        Brand::factory()->state([
                            'name' => 'samet',
                            'logo' => 'samet.png'
                        ])
                    )
                    ->has(
                        Variation::factory()
                            ->count(2)
                    )->count(2)
            )
            ->count(2)
            ->create();
    }
}
