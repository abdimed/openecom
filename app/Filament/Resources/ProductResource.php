<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-lightning-bolt';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()
                    ->schema([

                        Card::make()
                            ->schema([
                                TextInput::make('name')
                                    ->reactive()
                                    ->afterStateUpdated(function (Closure $set, $state) {
                                        $set('slug', Str::slug($state));
                                    })->required(),
                                TextInput::make('slug')->required()->hint('SEO')->helperText('Ceci sera affiché dans le lien de la page du produit'),
                                MarkdownEditor::make('description')->columnSpan(['lg' => 2])->required(),
                            ])->columns(['lg' => 2]),


                        Section::make('Images')
                            ->schema([
                                FileUpload::make('img')->image()->required()->hint('L\'image principale'),
                            ])->collapsible(),

                        Section::make('Tarification')
                            ->schema([
                                TextInput::make('price')->required()->hint('DA')->label('Prix Unitaire HT'),
                            ])->columns(['lg' => 2]),

                        Section::make('Inventaire')
                            ->schema([
                                TextInput::make('ref')->required(),
                            ])->columns(['lg' => 2]),


                    ])->columnSpan(['lg' => 2]),

                Grid::make()
                    ->schema([
                        Section::make('Status')
                            ->schema([
                                Toggle::make('visible')->helperText('Ce produit sera visible dans la page des ventes'),
                                DatePicker::make('aviability')
                            ]),

                        Section::make('Associations')
                            ->schema([]),

                    ])->columnSpan(['lg' => 1]),

            ])->columns(['lg' => 3]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
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
