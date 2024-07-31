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

                {{-- <p class="text-center">
                    Selamat datang di Sipandawa - Sistem Pangkalan Data Siswa, solusi digital terdepan untuk menyimpan
                    dan mengelola data ijazah siswa SD dan SMP di Kabupaten Malinau. Aplikasi ini dirancang untuk
                    memudahkan akses dan verifikasi data ijazah, memastikan setiap dokumen penting tersimpan dengan aman
                    dan dapat diakses kapan saja, di mana saja.
                </p> --}}

                <div class="flex items-center justify-center space-x-100 ">
                    <div class="overflow-x-auto">
                        <table class="min-w-full shadow-md rounded-xl">
                            <tbody class="text-blue-gray-900">
                                @if (!empty($this->results['sd']))
                                    @if ($this->results['sd_count'] > 0)
                                        <tr>
                                            Data Ijazah SD
                                        </tr>
                                        @foreach ($this->results['sd'] as $key => $item)
                                            <tr class="text-sm border-b border-blue-gray-200">
                                                <td class="py-3 px-130">{{ $key }}
                                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                                                <td class="py-3 px-130">: </td>
                                                <td class="py-3 px-130">&emsp;&emsp;{{ $item }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        Data Ijazah SMP Tidak Di temukan
                                    @endif
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="">
                        &emsp;&emsp;&emsp;&emsp;
                    </div>


                    <div class="overflow-x-auto">
                        <table class="min-w-full shadow-md rounded-xl">
                            <tbody class="text-blue-gray-900">
                                @if (!empty($this->results['sd']))
                                    @if ($this->results['smp_count'] > 0)
                                        <tr>
                                            Data Ijazah SMP
                                        </tr>
                                        @foreach ($this->results['smp'] as $key => $item)
                                            <tr class="text-sm border-b border-blue-gray-200">
                                                <td class="py-3 px-130">{{ $key }}
                                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>
                                                <td class="py-3 px-130">: </td>
                                                <td class="py-3 px-130">&emsp;&emsp;{{ $item }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        Data Ijazah SMP Tidak Di temukan
                                    @endif
                                @endif
                            </tbody>
                        </table>

                    </div>

                </div>

                </p>
            </x-filament::section>
        </form>
    </div>
</x-filament-panels::page>
