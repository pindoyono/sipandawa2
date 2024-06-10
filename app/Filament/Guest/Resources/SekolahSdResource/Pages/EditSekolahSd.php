<?php

namespace App\Filament\Guest\Resources\SekolahSdResource\Pages;

use App\Filament\Guest\Resources\SekolahSdResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSekolahSd extends EditRecord
{
    protected static string $resource = SekolahSdResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
