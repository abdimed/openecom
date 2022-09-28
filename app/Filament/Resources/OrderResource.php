<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'E-Commerce';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer.full_name'),
                TextColumn::make('variation.product.name')->label('produit'),
                TextColumn::make('variation.name')->label('variation'),
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
                TextColumn::make('variation.price')->money('dzd')->label('prix'),
                TextColumn::make('created_at')->dateTime(format: 'd/m/Y H:i')->sortable(),
                TextColumn::make('qty'),


            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('status')
                    ->action(function (Order $record, array $data): void {
                        $record->status = $data['status'];
                        $record->save();
                    })
                    ->form([
                        Select::make('status')
                            ->options([
                                'new' => 'Nouveau',
                                'processing' => 'En traitement',
                                'delivered' => 'Livré',
                                'shipped' => 'Expédié',
                                'cancelled' => 'Annulé'
                            ])->required()
                    ])->requiresConfirmation()
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }


    protected function getHeaderWidgets(): array
    {
        return [
            Widgets\OrderTotal::class,
        ];
    }
}
