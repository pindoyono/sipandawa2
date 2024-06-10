<?php

namespace App\Filament\Guest\Resources\IjazahResource\Pages;

use App\Filament\Guest\Resources\IjazahResource;
use App\Models\Ijazah;
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

        $this->results['NISN'] = $results->value('nama');
        $this->results['Nama'] = $results->value('nama');
        $this->results['Sekolah'] = $results->value('sekolah');
        $this->results['Tanggal Lahir'] = $results->value('tgl_lahir');
        $this->results['Tempat Lahir'] = $results->value('tmt_lahir');
        $this->results['Nama ortu'] = $results->value('nama_ortu');
        $this->results['No Ijazah SD'] = $results->value('no_ijazah_sd');
        $this->results['No Ijazah SMP'] = $results->value('no_ijazah_smp');
        $this->results['Status'] = $results->value('status');
        $this->results['Tahun Lulus'] = $results->value('th_lulus');

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
