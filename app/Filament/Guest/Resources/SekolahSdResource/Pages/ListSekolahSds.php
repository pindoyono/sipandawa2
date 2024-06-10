<?php

namespace App\Filament\Guest\Resources\SekolahSdResource\Pages;

use App\Filament\Guest\Resources\SekolahSdResource;
use Filament\Resources\Pages\ListRecords;

class ListSekolahSds extends ListRecords
{
    protected static string $resource = SekolahSdResource::class;
    // public static $title = 'Data SMP';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
