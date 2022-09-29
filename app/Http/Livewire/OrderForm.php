<?php

namespace App\Http\Livewire;

use App\Events\NewOrder;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class OrderForm extends Component
{
    public $full_name;
    public $tel;
    public $wilaya;
    public $address;
    public $is_company;
    public $company_name;
    public $email;


    protected $rules = [
        'full_name' => 'required',
        'tel' => 'required',
        'wilaya' => 'required',
        'address' => 'required',
        'is_company' => 'required',
        'company_name' => 'nullable',
        'email' => 'nullable',
    ];

    public function newOrder()
    {
        $this->validate();

        $customer = $this->customer();

        $cartItems = Cart::content();

        $order = $this->orderCreate($customer);

        foreach ($cartItems as $item) {

            $order->variations()->attach($item->id, ['qty' => $item->qty]);
        }

        NewOrder::dispatch($customer, $order);
    }

    public function render()
    {
        return view('livewire.order-form', [
            'totalPrice' => Cart::total(),
        ]);
    }

    protected function customer(): Customer
    {
        $customer = Customer::where('tel', $this->tel)->where('email', $this->email)->first();
        if (empty($customer))
            return Customer::create([
                'full_name' => $this->full_name,
                'tel' => $this->tel,
                'wilaya' => $this->wilaya,
                'address' => $this->address,
                'is_company' => $this->is_company,
                'company_name' => $this->company_name,
                'email' => $this->email,
            ]);
        else return $customer;
    }

    protected function orderCreate($customer): Order
    {
        return  Order::create([
            'customer_id' => $customer->id,
            'total_price' => Cart::total(),
        ]);
    }
}
