<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Sekolah;
use Filament\Forms\Form;
use App\Models\IjazahSmp;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\IjazahSmpResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\IjazahSmpResource\RelationManagers;

class IjazahSmpResource extends Resource
{
    protected static ?string $model = IjazahSmp::class;

    // protected static ?string $label = 'Ijazah SMP';
    protected static ?string $pluralLabel = 'Ijazah SMP';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getEloquentQuery(): Builder
    {
        // return parent::getEloquentQuery()->where('user_id',auth()->id());

        if(Auth::user()->hasRole('Admin SD')){
            $sekolah_id = User::find(auth()->id())->sekolah_id;
            return parent::getEloquentQuery()->where('sekolah_id',$sekolah_id);
        }else{
            return parent::getEloquentQuery();
        }
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
            ->label('Nama')
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('sekolah_id')
                ->label('Sekolah')
                ->required()
                ->options(Sekolah::all()->pluck('nama', 'id'))
                ->searchable(),
            Forms\Components\TextInput::make('nama_kepsek')
            ->label('Nama Kepsek')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('nis')
            ->label('NIS')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('nisn')
            ->label('NISN')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('tmt_lahir')
            ->label('Tempat Lahir')
                ->required()
                ->maxLength(255),
            Forms\Components\DatePicker::make('tgl_lahir')
            ->label('Tanggal Lahir')
                ->required(),
            Forms\Components\TextInput::make('nama_ayah')
            ->label('Nama Ayah')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('nama_ibu')
            ->label('Nama Ibu')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('no_ijazah')
            ->label('Nomor Ijazah')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('nilai')
            ->label('Nilai Rata-Rata')
                ->required()
                ->maxLength(255),
            Forms\Components\DatePicker::make('tgl_terbit')
            ->label('Tanggal Terbit')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sekolah.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_kepsek')
                    ->label('Nama Kepsek')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nisn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tmt_lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tgl_lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_ayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_ibu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_ijazah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nilai')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tgl_terbit')
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListIjazahSmps::route('/'),
            'create' => Pages\CreateIjazahSmp::route('/create'),
            'edit' => Pages\EditIjazahSmp::route('/{record}/edit'),
        ];
    }
}
