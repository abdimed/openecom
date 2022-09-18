<?php

namespace App\Filament\Resources\BrandResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use Closure;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    protected static ?string $recordTitleAttribute = 'name';

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

                                TextInput::make('slug')->required()->disabled()->rules(['alpha_dash'])->hint('SEO')->helperText('Ceci sera affiché dans le lien de la page du produit'),

                                MarkdownEditor::make('description')->columnSpan(['lg' => 2])->required(),

                            ])->columns(['lg' => 2]),


                        Section::make('Images')
                            ->schema([

                                FileUpload::make('img')->image()->required()->hint('L\'image principale'),

                            ])->collapsible(),

                        Section::make('Choix de Variations')
                            ->schema([

                                Repeater::make('variations')
                                    ->relationship()
                                    ->schema([
                                        TextInput::make('ref')->required(),
                                        TextInput::make('name')->required(),
                                        TextInput::make('quantity')->required()->integer(),
                                        TextInput::make('price')->mask(fn (TextInput\Mask $mask) => $mask->money(prefix: '', thousandsSeparator: ',', decimalPlaces: 2))->suffix('DA')->required()

                                    ])->columns(['lg' => 2])->columnSpan(['lg' => 2])->nullable()

                            ])->columns(['lg' => 2])->collapsible(),

                        Section::make('Specifications')
                            ->schema([

                                Repeater::make('specifications')
                                    ->relationship()
                                    ->schema([
                                        TextInput::make('name')->required(),
                                        TextInput::make('value')->required(),
                                    ])->columns(['lg' => 2])->columnSpan(['lg' => 2])->nullable()

                            ])->collapsible(),

                    ])->columnSpan(['lg' => 2]),

                Grid::make()
                    ->schema([

                        Section::make('Status')
                            ->schema([

                                Toggle::make('visible')->helperText('Ce produit sera visible dans la page des ventes'),

                            ]),

                        Section::make('Associations')
                            ->schema([

                                Select::make('brand_id')
                                    ->relationship('brand', 'name')->required(),

                                Select::make('category_id')
                                    ->relationship('category', 'name')->searchable()->required(),

                            ]),

                    ])->columnSpan(['lg' => 1]),

            ])->columns(['lg' => 3]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                TextColumn::make('category.name')
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
