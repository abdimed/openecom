<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Filament\Resources\CustomerResource\RelationManagers\OrdersRelationManager;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $recordTitleAttribute = 'full_name';

    protected static ?string $modelLabel = 'client';

    protected static ?string $navigationGroup = 'E-Commerce';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('full_name')->disabled(),
                        TextInput::make('tel')->disabled(),
                        TextInput::make('email')->disabled(),
                    ])->columns(['lg' => 2])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('full_name')->searchable()->prefix('Client : '),
                TextColumn::make('orders_count')->counts('orders')->prefix('commandes : '),

                Panel::make([
                    Stack::make([
                        TextColumn::make('tel')->icon('heroicon-s-phone')->searchable(),
                        TextColumn::make('email')->icon('heroicon-s-mail')->searchable(),
                    ]),


                ])->collapsible(),
                BooleanColumn::make('is_company')->alignment('right')->sortable()->label('entreprise')
                    ->trueIcon('heroicon-o-office-building')
                    ->falseIcon('heroicon-o-user')
                    ->trueColor('success')
                    ->falseColor('primary')
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
                // Tables\Actions\RestoreBulkAction::make(),
                // Tables\Actions\ForceDeleteBulkAction::make(),
            ])->contentGrid([
                'md' => 2,
                'xl' => 3,
            ]);
    }

    public static function getRelations(): array
    {
        return [
            OrdersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
