<?php

namespace App\Livewire;

use App\Models\Contact;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\IconEntry\IconEntrySize;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Livewire\Component;

class GuestContact extends Component implements HasForms, HasInfolists
{
    use InteractsWithForms;
    use InteractsWithInfolists;
    use InteractsWithActions;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record(Contact::query()->first())
            ->schema([
                Section::make('Visit Us')
                ->schema([
                    TextEntry::make('street_address')
                        ->icon('heroicon-o-map-pin')
                        ->label('')
                        ->inlineLabel(),
                    TextEntry::make('city')
                        ->icon('icon-city')
                        ->label('')
                        ->inlineLabel(),
                ])->collapsible(),
                Section::make('Contact Us')
                    ->schema([
                        TextEntry::make('phone_number')
                            ->label('')
                            ->icon('heroicon-o-phone'),
                        TextEntry::make('email')
                            ->icon('heroicon-o-envelope')
                            ->label(''),
                    ])->collapsible(),
                Section::make('Social Media')
                    ->schema([
                        IconEntry::make('social.twitter')
                            ->size(IconEntrySize::Small)
                            ->label('')
                            ->icon('icon-twitter-logo')
                            ->default('')
                            ->url(function (string $state) {
                                return "https://twitter.com/{$state}";
                            }, true)
                            ->hidden(function ($state) {
                                return $state === '';
                            }),
                        IconEntry::make('social.instagram')
                            ->size(IconEntrySize::Small)
                            ->label('')
                            ->default('')
                            ->icon('icon-instagram-logo')
                            ->url(function (string $state) {
                                return "https://instagram.com/{$state}";
                            }, true)
                            ->hidden(function ($state) {
                                return $state === '';
                            }),
                    ])
                    ->columns(2)
                    ->collapsible()
                    ->hidden(function (Contact $record) {
                       return ($record->social['twitter'] === null && $record->social['instagram'] === null);
                    }),
            ]);
    }

    public function render()
    {
        return view('livewire.guest-contact');
    }
}
