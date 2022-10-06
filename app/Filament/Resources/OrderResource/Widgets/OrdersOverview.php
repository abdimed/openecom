<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use App\Services\OrderService;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Flowframe\Trend\TrendValue;

class OrdersOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Commandes', Order::where('status', 'new')->get()->count())->chart((new OrderService())->allPerMonth()),
            Card::make('Nouvelle Commandes', Order::where('status', 'new')->get()->count())->chart((new OrderService())->newPerMonth())->color('success'),
            Card::make('Expedié', Order::where('status', 'shipped')->get()->count()),
            Card::make('Livrée', Order::where('status', 'delivered')->get()->count()),
        ];
    }
}
