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

                        Section::make('Variations')
                            ->schema([

                                Repeater::make('variations')
                                    ->relationship()
                                    ->schema([
                                        TextInput::make('ref'),
                                        TextInput::make('name'),
                                        TextInput::make('quantity'),
                                        TextInput::make('price')->mask(fn (TextInput\Mask $mask) => $mask->money(prefix: '', thousandsSeparator: ',', decimalPlaces: 2))->suffix('DA')

                                    ])->columns(['lg' => 2])->columnSpan(['lg' => 2])

                            ])->columns(['lg' => 2]),

                        Section::make('Specifications')
                            ->schema([

                                Repeater::make('specifications')
                                    ->relationship()
                                    ->schema([
                                        TextInput::make('name'),
                                        TextInput::make('value'),
                                    ])->columns(['lg' => 2])->columnSpan(['lg' => 2])

                            ]),

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
                                    ->relationship('brand', 'name'),

                                MultiSelect::make('categories')
                                    ->relationship('categories', 'name')
                                    ->createOptionForm([
                                        TextInput::make('name')->required()->maxLength(255),
                                    ])

                            ]),

                    ])->columnSpan(['lg' => 1]),

            ])->columns(['lg' => 3]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
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
