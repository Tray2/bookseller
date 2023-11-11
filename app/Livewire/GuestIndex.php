<?php

namespace App\Livewire;

use App\Models\Book;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\TextEntry\TextEntrySize;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use function Filament\Support\format_money;

class GuestIndex extends Component implements HasForms, HasTable, HasActions, HasInfolists
{
    use InteractsWithTable;
    use InteractsWithForms;
    use InteractsWithActions;
    use InteractsWithInfolists;

    protected Book $book;

    public function table(Table $table): Table
    {
        return $table
            ->query(Book::query()->latest()->take(10))
            ->columns([
                ImageColumn::make('images.name')
                    ->label('Cover')
                    ->limit(1)
                    ->limitedRemainingText()
                    ->height(150),
                TextColumn::make('authors.name'),
                TextColumn::make('title'),
                TextColumn::make('published'),
                TextColumn::make('genre.name')
                    ->label('Genre'),
                TextColumn::make('format.name')
                    ->label('Format')
            ])
            ->actions([
                ViewAction::make()
                    ->infolist([
                        Section::make()
                            ->schema([
                                TextEntry::make('')
                                    ->default(function (Book $record) {
                                        return 'Discount:' . 100 - ($record->discounted_price / $record->price) * 100 . '%';
                                    })
                                    ->size(TextEntrySize::Large)
                                    ->weight(FontWeight::Bold)
                                    ->color('success')
                            ])->columns(1)
                            ->visible(function (Book $record) {
                                return $record->discounted_price !== null;
                            }),
                        Section::make()
                            ->schema([
                                ImageEntry::make('images.name')
                                    ->height(300)
                                    ->label('')
                                    ->extraAttributes(['class' => 'justify-center'], true)
                            ])->columns(1),
                        Section::make('Information')
                            ->schema([
                                TextEntry::make('authors.name'),
                                TextEntry::make('title'),
                                TextEntry::make('published'),
                                TextEntry::make('edition.name')
                                    ->label('Edition'),
                                TextEntry::make('isbn')
                                    ->default('N/A'),
                                TextEntry::make('genre.name')
                                    ->label('Genre'),
                                TextEntry::make('format.name')
                                    ->label('Format'),
                                TextEntry::make('condition.name')
                                    ->label('Condition'),
                                TextEntry::make('price')
                                    ->formatStateUsing(function (Book $record) {
                                        return format_money(
                                            $record->discounted_price ?? $record->price,
                                                   config('app.currency')
                                        );
                                    })
                                    ->badge(function (Book $record) {
                                        return $record->discounted_price !== null;
                                    })
                                    ->color(function (Book $record) {
                                        if ($record->discounted_price !== null) {
                                            return 'success';
                                        }
                                        return '';
                                    }),
                            ])->columns(3),
                        Section::make()
                            ->schema([
                                TextEntry::make('comment')
                                    ->markdown(),
                                TextEntry::make('created_at')
                                    ->label('Added'),
                            ])->columns(1)
                    ])
            ]);
    }

    public function render(): View
    {
        return view('livewire.guest-index')
            ->layout('components.layouts.app');
    }
}
