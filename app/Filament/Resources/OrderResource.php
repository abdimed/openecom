<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\RelationManagers\VariationsRelationManager;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
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

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->schema([
                        Card::make()
                            ->schema([

                                TextInput::make('id')->disabled(),

                                Select::make('status')->options([
                                    'new' => 'Nouveau',
                                    'processing' => 'En traitement',
                                    'delivered' => 'Livré',
                                    'shipped' => 'Expédié',
                                    'cancelled' => 'Annulé'
                                ]),

                                Select::make('customers')->relationship('customer', 'full_name')->disabled(),

                                TextInput::make('wilaya')->disabled(),

                            ])->columns(['lg' => 2])

                    ])->columnSpan(['lg' => 2]),
                Grid::make()
                    ->schema([
                        Card::make()
                            ->schema([

                                Placeholder::make('date')->content(fn (Order $record): ?string => $record->created_at->format('d M Y h:i')),
                                Placeholder::make('Depuis')->content(fn (Order $record): string  => $record->created_at->since()),

                            ])
                    ])->columnSpan(['lg' => 1])

            ])->columns(['lg' => 3]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->prefix('CMD-'),
                TextColumn::make('customer.full_name')->searchable(),
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



            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([

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
            VariationsRelationManager::class,
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
