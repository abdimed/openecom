<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Closure;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestOrders extends BaseWidget
{
    protected static ?int $sort = 4;
    protected static ?string $heading = 'Les dernierres commandes';
    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Order::where('status', 'new');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('number'),
            TextColumn::make('customer.full_name'),
            BadgeColumn::make('status')->enum([
                'new' => 'Nouveau',
                'processing' => 'En traitement',
                'delivered' => 'Livré',
                'shipped' => 'Expédié',
                'cancelled' => 'Annulé'
            ])
                ->colors([
                    'primary',
                    'danger' => 'cancelled',
                    'warning' => 'processing',
                    'success' => 'delivered',
                ]),
            TextColumn::make('total_price'),

            TextColumn::make('created_at')->dateTime(format: 'd M Y')->sortable(),
        ];
    }
}
