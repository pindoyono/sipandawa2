<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Ijazah;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\IjazahResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\IjazahResource\RelationManagers;

class IjazahResource extends Resource
{
    protected static ?string $model = Ijazah::class;

    // protected static ?string $label = 'Ijazah SD';
    protected static ?string $pluralLabel = 'Ijazah SD';

    public static function getEloquentQuery(): Builder
    {
        // return parent::getEloquentQuery()->where('user_id',auth()->id());
        if (auth()->user()->role === 'Admin SD') {
            $sekolah_id = User::find(auth()->id())->sekolah_id;
            return parent::getEloquentQuery()->where('sekolah_id',$sekolah_id);
        }else{
            return parent::getEloquentQuery();
        }
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                ->maxLength(255),
            Forms\Components\TextInput::make('sekolah_id')
                ->required()
                ->maxLength(255)
                ->default(1),
            Forms\Components\TextInput::make('nis')
                ->maxLength(255),
            Forms\Components\TextInput::make('nisn')
                ->maxLength(255),
            Forms\Components\TextInput::make('tmt_lahir')
                ->maxLength(255),
            Forms\Components\DatePicker::make('tgl_lahir'),
            Forms\Components\TextInput::make('nama_ayah')
                ->maxLength(255),
            Forms\Components\TextInput::make('nama_ibu')
                ->maxLength(255),
            Forms\Components\TextInput::make('no_ijazah')
                ->maxLength(255),
            Forms\Components\TextInput::make('nilai')
                ->maxLength(255),
            Forms\Components\DatePicker::make('tgl_terbit'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sekolah.nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nisn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tmt_lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tgl_lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_ayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_ibu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_ijazah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nilai')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tgl_terbit')
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
