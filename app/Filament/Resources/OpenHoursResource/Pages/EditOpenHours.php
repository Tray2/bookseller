<?php

namespace App\Filament\Resources\OpenHoursResource\Pages;

use App\Filament\Resources\OpenHoursResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOpenHours extends EditRecord
{
    protected static string $resource = OpenHoursResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
