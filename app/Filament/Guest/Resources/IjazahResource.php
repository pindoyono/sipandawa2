<?php

namespace App\Filament\Guest\Resources;

use App\Filament\Guest\Resources\IjazahResource\Pages;
use App\Models\Ijazah;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class IjazahResource extends Resource
{
    protected static ?string $model = Ijazah::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Ijazah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\CariIjazah::route('/'),
            // 'create' => Pages\CreateIjazah::route('/create'),
            // 'edit' => Pages\EditIjazah::route('/{record}/edit'),
        ];
    }
}
