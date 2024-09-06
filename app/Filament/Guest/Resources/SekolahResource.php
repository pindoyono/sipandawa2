<?php

namespace App\Filament\Guest\Resources;

use Filament\Tables;
use App\Models\Sekolah;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Guest\Resources\SekolahResource\Pages;

class SekolahResource extends Resource
{
    protected static ?string $model = Sekolah::class;

    protected static ?string $navigationLabel = 'SMP';
    protected static bool $shouldRegisterNavigation = false;

    public static function getEloquentQuery(): Builder
        {
            if(true){
                return parent::getEloquentQuery()->where('jenjang','SD');
            }else{
                return parent::getEloquentQuery()->where('jenjang','SD');
            }
        }


    public static function canViewAny(): bool
    {
        return true;
    }
    // public static $title = 'Data SMP';

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                Tables\Columns\TextColumn::make('index')
                ->label('Nomor')
                ->rowIndex(),
            Tables\Columns\TextColumn::make('nama')
                ->label('Nama')
                ->searchable(),
            Tables\Columns\TextColumn::make('npsn')
                ->label('NPSN')
                ->searchable(),
            Tables\Columns\TextColumn::make('telpon')
                ->label('No Telepon')
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            // ->actions([
            //     // Tables\Actions\EditAction::make(),
            // ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListSekolahs::route('/'),
            // 'create' => Pages\CreateSekolah::route('/create'),
            // 'edit' => Pages\EditSekolah::route('/{record}/edit'),
        ];
    }
}
