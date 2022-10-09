<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use FFI;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VariationsRelationManager extends RelationManager
{
    protected static string $relationship = 'variations';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ref')->label('Code'),
                TextColumn::make('product.name'),
                TextColumn::make('name'),
                TextColumn::make('qty'),
                TextColumn::make('price'),
            ])
            ->filters([
                //
            ])
            ->headerActions([

            ])
            ->actions([

            ])
            ->bulkActions([

            ]);
    }
}
