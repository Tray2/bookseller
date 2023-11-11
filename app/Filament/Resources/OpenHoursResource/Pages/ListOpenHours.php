<?php

namespace App\Filament\Resources\OpenHoursResource\Pages;

use App\Filament\Resources\OpenHoursResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOpenHours extends ListRecords
{
    protected static string $resource = OpenHoursResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
