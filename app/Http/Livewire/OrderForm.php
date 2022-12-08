<?php

namespace App\Http\Livewire;

use App\Events\NewOrder;
use App\Services\CustomerService;
use App\Services\OrderService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\View;

class OrderForm extends Component
{
    public $full_name;
    public $tel;
    public $wilaya;
    public $address;
    public $is_company = false;
    public $company_name;
    public $email;

    protected $rules = [
        'full_name' => 'required|max:255',
        'tel' => 'required|max:255',
        'wilaya' => 'required|max:255',
        'address' => 'required|max:255',
        'is_company' => '',
        'company_name' => 'nullable|max:255',
        'email' => 'nullable|email',
    ];

    public function post()
    {

        $this->validate();

        $customer = (new CustomerService())->setCustomer($this->full_name, $this->tel, $this->is_company, $this->company_name, $this->email); //Create or update customer

        $order = (new OrderService())->setOrder($customer, $this->wilaya, $this->address);

        (new OrderService())->setOrderVariations($order);

        NewOrder::dispatch($customer, $order); //Notification

        $this->emit('orderPosted');

        return to_route('order.bill', ['customer' => $customer, 'order' => $order]);
    }

    public function render()
    {
        return view('livewire.order-form', [
            'cartItems' => Cart::content(),
            'totalPrice' => Cart::total(),
        ]);
    }
}
