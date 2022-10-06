<?php

namespace App\Filament\Resources\CustomerResource\RelationManagers;

use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    protected static ?string $recordTitleAttribute = 'number';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('number')
                    ->required()
                    ->maxLength(255),
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
                        'primary',
                        'danger' => 'cancelled',
                        'warning' => 'processing',
                        'success' => 'delivered',
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
                Tables\Filters\TrashedFilter::make()
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
                    ])->requiresConfirmation()->icon('heroicon-s-cog'),
                Tables\Actions\DeleteAction::make()->label(''),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            ]);
    }

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
