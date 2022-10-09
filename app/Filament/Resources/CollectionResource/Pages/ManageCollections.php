<?php

namespace App\Filament\Resources\CollectionResource\Pages;

use App\Filament\Resources\CollectionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCollections extends ManageRecords
{
    protected static string $resource = CollectionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
