<?php

namespace App\Filament\Resources\IjazahSmpResource\Pages;

use App\Filament\Resources\IjazahSmpResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIjazahSmp extends EditRecord
{
    protected static string $resource = IjazahSmpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
