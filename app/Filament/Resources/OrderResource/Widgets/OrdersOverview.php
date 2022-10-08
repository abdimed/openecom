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
        $orderService = new OrderService();
        return [
            Card::make('Commandes', Order::count())->chart($orderService->getArray('')),
            Card::make('Nouvelle Commandes', Order::where('status', 'new')->get()->count())->chart($orderService->getArray('new'))->color('primary'),
            Card::make('Expedié', Order::where('status', 'shipped')->get()->count()),
            Card::make('Livrée', Order::where('status', 'delivered')->get()->count()),
        ];
    }
}
