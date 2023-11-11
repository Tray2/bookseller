<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use App\Models\Condition;
use App\Models\Edition;
use App\Models\Format;
use App\Models\Genre;
use Faker\Provider\Text;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('authors')
                    ->relationship('authors', 'name')
                    ->multiple()
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('published')
                    ->required(),
                TextInput::make('price')
                    ->required(),
                TextInput::make('discounted_price')
                    ->nullable(),
                TextInput::make('isbn')
                    ->nullable(),
                Select::make('edition_id')
                    ->label('Edition')
                    ->required()
                    ->searchable()
                    ->options(Edition::all()->pluck('name', 'id')),
                Select::make('genre_id')
                    ->label('Genre')
                    ->required()
                    ->searchable()
                    ->options(Genre::all()->pluck('name', 'id')),
                Select::make('format_id')
                    ->label('Format')
                    ->required()
                    ->searchable()
                    ->options(Format::all()->pluck('name', 'id')),
                Select::make('condition_id')
                    ->label('Condition')
                    ->required()
                    ->searchable()
                    ->options(Condition::all()->pluck('name', 'id')),
                RichEditor::make('comment')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('authors.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('published')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('format.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('isbn')
                    ->searchable(),
                TextColumn::make('price')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ImagesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
