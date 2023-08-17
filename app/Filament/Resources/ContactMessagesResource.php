<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessagesResource\Pages;
use App\Filament\Resources\ContactMessagesResource\RelationManagers;
use App\Models\ContactMessages;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactMessagesResource extends Resource
{
    protected static ?string $model = ContactMessages::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-in';

    protected static ?string $navigationGroup = 'contact';

    protected static ?string $modelLabel = 'Messages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')->disabled(),
                        TextInput::make('email')->disabled(),
                        Textarea::make('message')->disabled(),
                    ])->columnSpan(['lg' => 3]),
                Card::make()
                    ->schema([

                        Placeholder::make('date')->content(fn (ContactMessages $record): ?string => $record->created_at->format('d M Y h:i')),
                        Placeholder::make('Depuis')->content(fn (ContactMessages $record): string  => $record->created_at->since()),
                    ])->visible(
                        static fn (Page $livewire): bool =>
                        $livewire instanceof Pages\EditContactMessages ? true : false,
                    )->columnSpan(['lg' => 1]),
            ])->columns(['lg' => 4]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('email'),
                TextColumn::make('created_at')->label('Envoyé le')->dateTime(format: 'd M Y')->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])->defaultSort('created_at', 'desc');;
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
            'index' => Pages\ListContactMessages::route('/'),
            // 'create' => Pages\CreateContactMessages::route('/create'),
            'edit' => Pages\EditContactMessages::route('/{record}/edit'),
        ];
    }
}
