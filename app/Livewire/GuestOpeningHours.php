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

class GuestOpeningHours extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(OpenHours::query()->whereNull('date'))
            ->columns([
                TextColumn::make('day')
                    ->formatStateUsing(function (OpenHours $record) {
                        return "{$record->day}: {$record->open_hour} - {$record->close_hour}";
                    })->label('Open')
                ,
            ])
            ->paginated(false);
    }


    public function render(): View
    {
        return view('livewire.guest-opening-hours');
    }
}
