<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Notifications\Actions\Action;
use Illuminate\Http\Request;
use Filament\Notifications\Notification;
use Filament\Notifications\Events\DatabaseNotificationsSent;

class OrderController extends Controller
{
    public function post(Brand $brand, Product $product, Request $request)
    {
        $order =  Order::create([
            'name' => $request->name,
            'product_id' => $product->id,
            'variation_id' => $request->variation,
        ]);

        $user = User::where('id', 11)->get();

        Notification::make()
            ->title('Nouvelle Commande')
            ->body('**' . $order->name . '**')
            ->icon('heroicon-o-shopping-bag')
            ->actions([
                Action::make('voir')


            ])
            ->sendToDatabase($user);

        event(new DatabaseNotificationsSent($user));
        return back();
    }
}
