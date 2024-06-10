<?php

namespace App\Livewire;

use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class CariIjazah extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),
                MarkdownEditor::make('content'),
                // ...
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        dd($this->form->getState());
    }

    // public function render(): View
    // {
    //     return view('livewire.create-post');
    // }
    // test
    public function render()
    {
        return view('livewire.cari-ijazah');
    }
}
