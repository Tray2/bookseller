<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OpenHoursResource\Pages;
use App\Filament\Resources\OpenHoursResource\RelationManagers;
use App\Models\OpenHours;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OpenHoursResource extends Resource
{
    protected static ?string $model = OpenHours::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('day')
                    ->nullable(),
                TimePicker::make('open_hour')
                    ->seconds(false)
                    ->nullable(),
                TimePicker::make('close_hour')
                    ->seconds(false)
                    ->nullable(),
                Forms\Components\DatePicker::make('date')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('day'),
                TextColumn::make('open_hour'),
                TextColumn::make('close_hour'),
                TextColumn::make('date')
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOpenHours::route('/'),
            'create' => Pages\CreateOpenHours::route('/create'),
            'edit' => Pages\EditOpenHours::route('/{record}/edit'),
        ];
    }
}
