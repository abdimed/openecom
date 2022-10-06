<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class OrdersCount extends BaseWidget
{
    protected function getCards(): array
    {
        $orders = Trend::model(Order::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )->perMonth()
            ->count();

        $newOrders = Trend::query(Order::where('status', 'new'))
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )->perMonth()
            ->count();


        return [
            Card::make('Commandes', Order::all()->count())->chart($orders->map(fn (TrendValue $value) => $value->aggregate)->toArray()),
            Card::make('Nouvelle Commandes', Order::where('status', 'new')->get()->count())->chart($newOrders->map(fn (TrendValue $value) => $value->aggregate)->toArray())->color('success'),
            Card::make('Expedié', Order::where('status', 'shipped')->get()->count()),
            Card::make('Livrée', Order::where('status', 'delivered')->get()->count()),

        ];
    }
}
