<?php

namespace App\Filament\Guest\Resources\IjazahResource\Pages;

use App\Filament\Guest\Resources\IjazahResource;
use App\Models\Ijazah;
use App\Models\IjazahSmp;
use App\Models\Sekolah;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\Page;

class CariIjazah extends Page implements HasForms, HasActions, HasInfolists
{
    use InteractsWithForms;
    use InteractsWithActions;
    use InteractsWithInfolists;

    protected static string $resource = IjazahResource::class;
    protected static ?string $navigationLabel = 'Custom Navigation Label';

    protected static string $view = 'filament.guest.resources.ijazah-resource.pages.cari-ijazah';

    public $ijazahs = [];
    public $results = [];
    public $nisn = '';
    public $tgl_lahir = '';

    public function mount(): void
    {
        $this->form->fill();
        $this->results;
        $this->productInfolist;
    }

    public function getFormSchema(): array
    {
        return [
            Split::make([
                Grid::make([
                    TextInput::make(''),
                    Textarea::make(''),
                ]),
                TextInput::make('nisn')
                    ->label('NISN')
                    ->numeric(),
                DatePicker::make('tgl_lahir')
                    ->label('Tanggal Lahir')
                    ->native(false)
                    ->displayFormat('d/m/Y')
                    ->suffixAction(
                        Action::make('copyCostToPrice')
                            ->icon('heroicon-m-magnifying-glass')
                            ->action(fn() => $this->save())
                    ),
                Grid::make([
                    TextInput::make(''),
                    Textarea::make(''),
                ]),
            ])->from('md'),
        ];
    }

    // public function saveAction(): Action
    // {
    //     return Action::make('save')
    //     // ->requiresConfirmation()
    //         ->action(fn() => $this->save());
    // }

    public function save()
    {
        $results = Ijazah::query()->where('nisn', $this->nisn);
        $results1 = IjazahSmp::query()->where('nisn', $this->nisn);

        $this->results['sd']['Nama'] = $results->value('nama');
        $this->results['sd']['Sekolah'] = Sekolah::query()->where('id', $results->value('sekolah_id'))->pluck('nama');
        $this->results['sd']['NISN'] = $results->value('nis');
        $this->results['sd']['NISN'] = $results->value('nisn');
        $this->results['sd']['Tempat Lahir'] = $results->value('tmt_lahir');
        $this->results['sd']['Tanggal Lahir'] = $results->value('tgl_lahir');
        $this->results['sd']['Nama Ayah'] = $results->value('nama_ayah');
        $this->results['sd']['Nama Ibu'] = $results->value('nama_ibu');
        $this->results['sd']['No Ijazah'] = $results->value('no_ijazah');
        $this->results['sd']['Nilai Rata Rata'] = $results->value('nilai');

        $this->results['smp']['Nama'] = $results1->value('nama');
        $this->results['smp']['Sekolah'] = $results1->value('sekolah_id');
        $this->results['smp']['NISN'] = $results1->value('nis');
        $this->results['smp']['NISN'] = $results1->value('nisn');
        $this->results['smp']['Tempat Lahir'] = $results1->value('tmt_lahir');
        $this->results['smp']['Tanggal Lahir'] = $results1->value('tgl_lahir');
        $this->results['smp']['Nama Ayah'] = $results1->value('nama_ayah');
        $this->results['smp']['Nama Ibu'] = $results1->value('nama_ibu');
        $this->results['smp']['No Ijazah'] = $results1->value('no_ijazah');
        $this->results['smp']['Nilai Rata Rata'] = $results1->value('nilai');

        $this->results['smp_count'] = IjazahSmp::query()->where('nisn', $this->nisn)->count();
        $this->results['sd_count'] = Ijazah::query()->where('nisn', $this->nisn)->count();

        // dd($this->results['smp']);
        return $this->results;

        // try {
        //     dd($results->value('nisn'));
        // } catch (\Throwable $th) {
        //     dd($th);
        // }

    }

    public function productInfolist(Infolist $infolist): Infolist
    {
        return $infolist
        // ->record($this->results)
        ->state([
            $this->results,
        ])
            ->schema([
                TextEntry::make('name'),
                // ...
            ]);
    }
}
