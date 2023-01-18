<?php

namespace Tests\Feature;

use App\Http\Livewire\OrderForm;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class OrderTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

     public function seedUsers()
     {
        $this->seed();
     }

    public function test_an_order_can_be_stored_to_the_database()
    {

    //     Livewire::test(OrderForm::class)
    //         ->set('full_name', 'Joe Doe')
    //         ->set('tel', '0794662246')
    //         ->set('wilaya', 'Alger')
    //         ->set('address', '55 street, Oran')
    //         ->set('is_company', 1)
    //         ->set('company_name', 'DevCompany')
    //         ->set('email', 'example@email.com')
    //         ->call('post');

    //     $this->assertCount(1, Order::all());
    // }

    // public function test_if_customer_ordered_before()
    // {
    //     $this->test_an_order_can_be_stored_to_the_database();

    //     $response = Livewire::test(OrderForm::class)
    //         ->set('full_name', 'Joe Doe')
    //         ->set('tel', '0794662246')
    //         ->set('wilaya', 'Alger')
    //         ->set('address', '55 street, Oran')
    //         ->set('is_company', 1)
    //         ->set('company_name', 'DevCompany')
    //         ->set('email', 'example@email.com')
    //         ->call('post');

    //     $response->assertStatus(200);
    //     // $this->assertTrue(Customer::where('id', 1)->withCount(2));
    }
}
