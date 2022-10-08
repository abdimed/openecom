<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Order;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderService
{
    public function getArray(string $status): array
    {
        return $trend = Trend::query(Order::where('status', '<>', $status))
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )->perMonth()
            ->count()
            ->map(fn (TrendValue $value) => $value->aggregate)
            ->toArray();

        dd($trend);
    }

    public function getMonth()
    {
        return Trend::query(Order::where('status', 'new'))
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )->perMonth()
            ->count()
            ->map(fn (TrendValue $value) => $value->date);
    }

    public function setOrder(Customer $customer, $wilaya, $address): Order
    {
        $number = '0';
        $latestOrder = Order::latest()->first();
        if (is_null($latestOrder)) $number = 'CMD-1';
        else $number = 'CMD-' . $latestOrder->id + 1;

        return  Order::create([
            'customer_id' => $customer->id,
            'number' => $number,
            'wilaya' => $wilaya,
            'address' => $address,
            'total_price' => Cart::priceTotal(),
        ]);
    }

    public function setOrderVariations(Order $order)
    {
        $cartItems = Cart::content();

        foreach ($cartItems as $item) {

            $order->variations()->attach($item->id, ['qty' => $item->qty]);
        }
    }
}
