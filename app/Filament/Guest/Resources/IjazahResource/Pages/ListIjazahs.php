<?php

namespace App\Filament\Guest\Resources\IjazahResource\Pages;

use App\Filament\Guest\Resources\IjazahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIjazahs extends ListRecords
{
    protected static string $resource = IjazahResource::class;
    protected static ?string $breadcrumb = "Sekolah";

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
