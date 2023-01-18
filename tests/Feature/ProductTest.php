<?php

namespace Tests\Feature;

use App\Filament\Resources\ProductResource\Pages\CreateProduct;
use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());
    }
    public function test_adding_a_product_from_filement_create_page()
    {
        $brand = Brand::factory()->make();

        $category = Category::factory()->make();

        $response = Livewire(CreateProduct::class)
            // ->set('name', 'product one')
            // ->set('brand_id', $brand->id)
            // ->set('category_id', $category->id)
            // ->set('slug', 'product-one')
            // ->set('images', '["1.jpg", "2.jpg"]')
            // ->set('description', fake()->text())
            // ->set('visible', 1)
            ->call('create');

        $response->assertStatus(200);
    }
}
