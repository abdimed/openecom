<?php

namespace App\Filament\Resources\ContactMessagesResource\Pages;

use App\Filament\Resources\ContactMessagesResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactMessages extends EditRecord
{
    protected static string $resource = ContactMessagesResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
