<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123')
        ]);

        Role::create(['name' => 'admin']);

        $user->assignRole('admin');

        Brand::create([
            'logo' => fake()->imageUrl(),
            'name' => fake()->name(),
            'slug' => fake()->slug(),
            'website' => fake()->url(),
        ]);

        Category::create([
            'icon' => fake()->imageUrl(),
            'name' => 'a',
            'slug' => 'a',
        ]);
    }
}
