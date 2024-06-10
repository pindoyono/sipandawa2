<x-filament-panels::page>
    <div>
        <form method="post" wire:submit='save'>
            {{ $this->form }}
            <br>
            {{-- {{ $this->productInfolist }} --}}
            <span>
                {{-- {{ $this->saveAction }} --}}
            </span>
            <x-filament::section>
                <x-slot name="heading">
                    <p class="text-center">
                        Data Ijazah
                    </p>
                </x-slot>

                <x-slot name="headerEnd">
                    {{-- Input to select the user's ID --}}
                </x-slot>

                <p class="text-center">
                <div class="flex items-center justify-center">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white shadow-md rounded-xl">
                            <tbody class="text-blue-gray-900">
                                @foreach ($this->results as $key => $item)
                                    <tr class="border-b border-blue-gray-200">
                                        <td class="py-3 px-130">{{ $key }}
                                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                                        <td class="py-3 px-130">: </td>
                                        <td class="py-3 px-130">&emsp;&emsp;{{ $item }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                </p>
            </x-filament::section>
        </form>
    </div>
</x-filament-panels::page>
