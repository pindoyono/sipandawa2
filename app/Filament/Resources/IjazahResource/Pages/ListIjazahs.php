<?php

namespace App\Filament\Resources\IjazahResource\Pages;

use App\Filament\Resources\IjazahResource;
use App\Imports\MyIjazahImport;
use EightyNine\ExcelImport\ExcelImportAction;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIjazahs extends ListRecords
{
    protected static string $resource = IjazahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExcelImportAction::make()
                ->slideOver()
                ->color("primary")
                ->use(MyIjazahImport::class),
            Actions\CreateAction::make(),
        ];
    }
}
