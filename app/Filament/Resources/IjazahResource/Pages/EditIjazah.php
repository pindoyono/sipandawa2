<?php

namespace App\Filament\Resources\IjazahResource\Pages;

use App\Filament\Resources\IjazahResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIjazah extends EditRecord
{
    protected static string $resource = IjazahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
