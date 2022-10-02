<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class OrdersCount extends BaseWidget
{
    protected function getCards(): array
    {

        return [
            Card::make('Commandes', Order::all()->count()),
            Card::make('Nouvelle Commandes', Order::where('status', 'new')->get()->count()),
            Card::make('Livrée', Order::where('status', 'delivered')->get()->count()),
        ];
    }
}
