<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Customer;
use App\Services\CustomerService;
use App\Services\OrderService;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected function getCards(): array
    {
        return [
            Card::make('Nouvelle Commandes', Order::where('status', 'new')->get()->count())->chart((new OrderService())->getArray(''))->color('primary'),
            Card::make('Nouveaux Clients', Customer::count())->chart((new CustomerService())->getArray())->color('success'),
        ];
    }

}
