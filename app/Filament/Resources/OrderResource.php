<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Filament\Resources\OrderResource\RelationManagers\VariationsRelationManager;
use App\Models\Order;
use Filament\Forms;
use Filament\Pages\page;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'e-commerce';

    protected static ?string $recordTitleAttribute = 'number';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->schema([
                        Grid::make()
                            ->schema([
                                Card::make()
                                    ->schema([

                                        TextInput::make('number')->disabled(),

                                        Select::make('status')->options([
                                            'new' => 'Nouveau',
                                            'processing' => 'En traitement',
                                            'delivered' => 'Livré',
                                            'shipped' => 'Expédié',
                                            'cancelled' => 'Annulé'
                                        ]),

                                        TextInput::make('wilaya')->disabled(),

                                        TextInput::make('address')->columnSpan(['lg' => 2]),

                                        TextInput::make('total_price')->suffix('DA'),

                                    ])->columns(['lg' => 2])

                            ])->columnSpan(['lg' => 2]),

                        Grid::make()
                            ->schema([
                                Card::make()
                                    ->schema([

                                        Placeholder::make('date')->content(fn (Order $record): ?string => $record->created_at->format('d M Y h:i')),
                                        Placeholder::make('Depuis')->content(fn (Order $record): string  => $record->created_at->since()),
                                    ])->visible(
                                        static fn (Page $livewire): bool =>
                                        $livewire instanceof Pages\EditOrder ? true : false,
                                    ),
                            ])->columnSpan(['lg' => 1])
                    ])->columns(['lg' => 3])


            ]);
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
                        'secondary',
                        'danger' => 'cancelled',
                        'warning' => 'processing',
                        'success' => 'delivered',
                        'primary' => 'new',
                    ])
                    ->icons([
                        'heroicon-o-x',
                        'heroicon-o-exclamation-circle' => 'new',
                        'heroicon-o-clock' => 'processing',
                        'heroicon-o-truck' => 'shipped',
                        'heroicon-o-x-circle' => 'cancelled',
                        'heroicon-o-check-circle' => 'delivered'
                    ])->sortable(),

                TextColumn::make('total_price'),

                TextColumn::make('wilaya'),

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
                                'shipped' => 'Expédié',
                                'delivered' => 'Livré',
                                'cancelled' => 'Annulé'
                            ])->required()
                    ])->requiresConfirmation()->icon('heroicon-s-cog')
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

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
