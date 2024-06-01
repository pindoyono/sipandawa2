<?php

namespace App\Imports;

use App\Models\Sekolah;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MySekolahImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //
        foreach ($collection as $row) {
            Sekolah::create([
                'nama' => $row[0],
                'npsn' => $row[1],
                'telpon' => $row[2],
                'alamat' => $row[3],
            ]);
        }
    }
}
