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
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Placeholder;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-lightning-bolt';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationGroup = 'E-Commerce';

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


                        Section::make('Images')
                            ->schema([

                                FileUpload::make('images')->image()->multiple()->maxFiles(4),

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
                                    ->relationship('category', 'name')
                                    ->createOptionForm([
                                        FileUpload::make('icon')->image()->avatar(),
                                        Grid::make()
                                            ->schema([
                                                TextInput::make('name')
                                                    ->reactive()
                                                    ->afterStateUpdated(function (Closure $set, $state) {
                                                        $set('slug', Str::slug($state));
                                                    })->required(),

                                                TextInput::make('slug')->required()->disabled()->rules(['alpha_dash'])->unique()->hint('SEO')->helperText('Ceci sera affiché dans le lien de la page du produit'),
                                            ])

                                    ])
                                    ->searchable()->required(),

                                // MultiSelect::make('categories')
                                //     ->relationship('categories', 'name')
                                //     ->createOptionForm([
                                //         TextInput::make('name')->required()->maxLength(255),
                                //     ])

                            ]),

                    ])->columnSpan(['lg' => 1]),

            ])->columns(['lg' => 3]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('img')->searchable(),
                TextColumn::make('name'),
                ToggleColumn::make('visible')->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\RestoreAction::make(),
                    Tables\Actions\ForceDeleteAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
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

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
