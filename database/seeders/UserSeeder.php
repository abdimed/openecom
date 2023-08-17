<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
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

        $user2 = \App\Models\User::factory()->create([
            'name' => 'supAdmin',
            'email' => 'supadmin@admin.com',
            'password' => Hash::make('123')
        ]);

        $user->assignRole('admin');
        $user->givePermissionTo('dashboard access');
        $user2->assignRole('super admin');
    }
}
