<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IjazahResource\Pages;
use App\Filament\Resources\IjazahResource\RelationManagers;
use App\Models\Ijazah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IjazahResource extends Resource
{
    protected static ?string $model = Ijazah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255)
                    ->default('-'),
                Forms\Components\TextInput::make('sekolah')
                    ->required()
                    ->maxLength(255)
                    ->default('-'),
                Forms\Components\TextInput::make('nisn')
                    ->required()
                    ->maxLength(255)
                    ->default('-'),
                Forms\Components\TextInput::make('tmt_lahir')
                    ->required()
                    ->maxLength(255)
                    ->default('-'),
                Forms\Components\TextInput::make('tgl_lahir')
                    ->required()
                    ->maxLength(255)
                    ->default('-'),
                Forms\Components\TextInput::make('nama_ortu')
                    ->required()
                    ->maxLength(255)
                    ->default('-'),
                Forms\Components\TextInput::make('no_ijazah_sd')
                    ->required()
                    ->maxLength(255)
                    ->default('-'),
                Forms\Components\TextInput::make('no_ijazah_smp')
                    ->required()
                    ->maxLength(255)
                    ->default('-'),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255)
                    ->default('-'),
                Forms\Components\TextInput::make('th_lulus')
                    ->required()
                    ->maxLength(255)
                    ->default('-'),
                Forms\Components\TextInput::make('nilai_ijazah_sd')
                    ->required()
                    ->maxLength(255)
                    ->default('-'),
                Forms\Components\TextInput::make('nilai_ijazah_smp')
                    ->required()
                    ->maxLength(255)
                    ->default('-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sekolah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nisn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tmt_lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tgl_lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_ortu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_ijazah_sd')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_ijazah_smp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('th_lulus')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nilai_ijazah_sd')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nilai_ijazah_smp')
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
            'index' => Pages\ListIjazahs::route('/'),
            'create' => Pages\CreateIjazah::route('/create'),
            'edit' => Pages\EditIjazah::route('/{record}/edit'),
        ];
    }
}
