<?php

namespace App\Http\Livewire;

use App\Events\NewOrder;
use App\Models\Client;
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
    public $adress;
    public $is_company;
    public $company_name;
    public $email;


    protected $rules = [
        'full_name' => 'required',
        'tel' => 'required',
        'wilaya' => 'required',
        'adress' => 'required',
        'is_company' => 'required',
        'company_name' => 'nullable',
        'email' => 'nullable',
    ];

    public function newOrder()
    {
        $this->validate();

        $client = Client::create([
            'full_name' => $this->full_name,
            'tel' => $this->tel,
            'wilaya' => $this->wilaya,
            'adress' => $this->adress,
            'is_company' => $this->is_company,
            'company_name' => $this->company_name,
            'email' => $this->email,
        ]);

        $cartItems = Cart::content();

        foreach ($cartItems as $item) {
            $order =  Order::create([
                'client_id' => $client->id,
                'product_id' => $item->options['product_id'],
                'variation_id' => $item->id,
                'qty' => $item->qty,
            ]);

            NewOrder::dispatch($client, $order);
        }



    }

    public function render()
    {
        return view('livewire.order-form', [
            'totalPrice' => Cart::total(),
        ]);
    }
}
