<?php

namespace App\Filament\Guest\Resources\SekolahResource\Pages;

use App\Filament\Guest\Resources\SekolahResource;
use Filament\Resources\Pages\ListRecords;

class ListSekolahs extends ListRecords
{
    protected static string $resource = SekolahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
