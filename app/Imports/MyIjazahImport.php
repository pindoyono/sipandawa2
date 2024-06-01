<?php

namespace App\Imports;

use App\Models\Ijazah;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MyIjazahImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //
        foreach ($collection as $row) {
            Ijazah::create([
                'nama' => $row[0],
                'sekolah' => $row[1],
                'nisn' => $row[2],
                'tmt_lahir' => $row[3],
                'tgl_lahir' => $row[4],
                'nama_ortu' => $row[5],
                'no_ijazah_sd' => $row[6],
                'no_ijazah_smp' => $row[7],
                'status' => $row[8],
                'th_lulus' => $row[9],
                'nilai_ijazah_sd' => $row[10],
                'nilai_ijazah_smp' => $row[11],
            ]);
        }
    }
}
