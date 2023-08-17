<?php

namespace App\Listeners;

use App\Events\NewOrder;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Filament\Notifications\Notification;
use Filament\Notifications\Actions\Action;

class NewOrderListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewOrder  $event
     * @return void
     */
    public function handle(NewOrder $event)
    {
        $admins = User::permission('order viewAny')->get();

        Notification::make()
            ->title('Nouvelle Commande')
            ->body('**' . $event->customer->full_name. '**' . ' a fais une commande')
            ->icon('heroicon-o-shopping-bag')
            ->iconColor('success')
            ->actions([
                Action::make('voir')
                    ->url(route('filament.resources.orders.edit', $event->order))

            ])
            ->sendToDatabase($admins);
    }
}
