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
        return Trend::query(Order::where('status', '<>', $status))
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )->perMonth()
            ->count()
            ->map(fn (TrendValue $value) => $value->aggregate)
            ->toArray();
    }

    public function getArrayPerDay(string $status): array
    {
        return Trend::query(Order::where('status', '<>', $status))
            ->between(
                start: now(),
                end: now(),
            )->perDay()
            ->count()
            ->map(fn (TrendValue $value) => $value->aggregate)
            ->toArray();
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

    public function getDay()
    {
        return Trend::model(Order::class)
            ->between(
                start: now()->startOfWeek(),
                end: now()->endOfWeek(),
            )->perDay()
            ->count()
            ->map(fn (TrendValue $value) => $value->date)->toArray();
    }

    public function setOrder(Customer $customer, $wilaya): Order
    {
        $number = '0';
        $latestOrder = Order::latest()->first();
        if (is_null($latestOrder)) $number = 'CMD-1';
        else $number = 'CMD-' . $latestOrder->id + 1;

        return  Order::create([
            'customer_id' => $customer->id,
            'number' => $number,
            'wilaya' => $wilaya,
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
