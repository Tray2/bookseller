<?php

namespace App\Livewire;

use App\Models\OpenHours;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class GuestDeviatingOpeningHours extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(OpenHours::query()
                ->whereNotNull('date')
                ->orderBy('date'))
            ->columns([
                TextColumn::make('day')
                    ->formatStateUsing(function (OpenHours $record) {
                        $date = new \DateTime($record->date);
                        return "{$date->format('M dS')}: {$record->open_hour} - {$record->close_hour}";
                    })->label('Deviating Dates'),
            ])->paginated(false);
    }


    public function render(): View
    {
        return view('livewire.guest-deviating-opening-hours');
    }
}

