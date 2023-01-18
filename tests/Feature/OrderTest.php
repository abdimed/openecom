<?php

namespace Tests\Feature;

use App\Http\Livewire\OrderForm;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Variation;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_livewire_order_form_component_can_store_an_order_and_send_notification_to_admins()
    {
        $this->seed();

        Livewire::test(OrderForm::class)
            ->set('full_name', 'Joe Doe')
            ->set('tel', '0794662246')
            ->set('wilaya', 'Alger')
            ->set('address', '55 street, Oran')
            ->set('is_company', 1)
            ->set('company_name', 'DevCompany')
            ->set('email', 'example@email.com')
            ->call('post');

        $this->assertTrue(Order::whereStatus('new')->exists());
    }


    public function test_if_unauthenticated_customer_will_be_recognized_when_he_orders_again()
    {
        $this->seed();

        Livewire::test(OrderForm::class)
            ->set('full_name', 'Joe Doe')
            ->set('tel', '0794662246')
            ->set('wilaya', 'Alger')
            ->set('address', '55 street, Oran')
            ->set('is_company', 1)
            ->set('company_name', 'DevCompany')
            ->set('email', 'example@email.com')
            ->call('post');

        Livewire::test(OrderForm::class)
            ->set('full_name', 'Joe Doe')
            ->set('tel', '0794662246')
            ->set('wilaya', 'Alger')
            ->set('address', '55 street, Oran')
            ->set('is_company', 1)
            ->set('company_name', 'DevCompany')
            ->set('email', 'example@email.com')
            ->call('post');

        $this->assertTrue(Customer::where('tel', '0794662246')->where('email', 'example@email.com')->withCount('orders')->first()->orders_count == 2);
    }
}
