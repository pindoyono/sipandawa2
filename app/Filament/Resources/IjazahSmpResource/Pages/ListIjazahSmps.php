<?php

namespace App\Filament\Resources\IjazahSmpResource\Pages;

use App\Filament\Resources\IjazahSmpResource;
use App\Imports\MyIjazahSmpImport;
use EightyNine\ExcelImport\ExcelImportAction;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIjazahSmps extends ListRecords
{
    protected static string $resource = IjazahSmpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExcelImportAction::make()
                ->slideOver()
                ->color("primary")
                ->use(MyIjazahSmpImport::class),
            Actions\CreateAction::make(),
        ];
    }
}
