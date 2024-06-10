<?php

namespace App\Filament\Guest\Resources\SekolahResource\Pages;

use App\Filament\Guest\Resources\SekolahResource;
use Filament\Resources\Pages\EditRecord;

class EditSekolah extends EditRecord
{
    protected static string $resource = SekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
