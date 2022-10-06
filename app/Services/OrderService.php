<?php

namespace App\Services;

use App\Models\Order;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class OrderService
{
    public function allPerMonth(): array
    {
        return Trend::model(Order::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )->perMonth()
            ->count()
            ->map(fn (TrendValue $value) => $value->aggregate)
            ->toArray();
    }

    public function newPerMonth(): array
    {
        return Trend::query(Order::where('status', 'new'))
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )->perMonth()
            ->count()
            ->map(fn (TrendValue $value) => $value->aggregate)
            ->toArray();
    }

    public function cancelledPerMonth(): array
    {
        return Trend::query(Order::where('status', 'cancelled'))
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )->perMonth()
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
}
