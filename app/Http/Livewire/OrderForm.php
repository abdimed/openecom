<?php

namespace App\Http\Livewire;

use App\Events\NewOrder;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

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

    public function newOrder()
    {

        $this->validate();

        $customer = $this->customer(); //create or update customer

        $order = $this->orderCreate($customer);

        $cartItems = Cart::content();

        foreach ($cartItems as $item) {

            $order->variations()->attach($item->id, ['qty' => $item->qty]);
        }

        NewOrder::dispatch($customer, $order); //notification

        session()->flash('orderPosted', 'Votre commande a bien été reçue!');

        Cart::destroy();

        // return to_route('order.bill', ['customer' => $customer, 'order' => $order]);
    }

    public function render()
    {
        return view('livewire.order-form', [
            'cartItems' => Cart::content(),
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
                'is_company' => $this->is_company,
                'company_name' => $this->company_name,
                'email' => $this->email,
            ]);

        else return $customer;
    }

    protected function orderCreate($customer): Order
    {
        $number = '0';
        $latestOrder = Order::latest()->first();
        if (is_null($latestOrder)) $number = 'CMD-1';
        else $number = 'CMD-' . $latestOrder->id + 1;

        return  Order::create([
            'customer_id' => $customer->id,
            'number' => $number,
            'wilaya' => $this->wilaya,
            'address' => $this->address,
            'total_price' => Cart::priceTotal(),
        ]);
    }
}
