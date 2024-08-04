<?php

namespace App\Imports;

use App\Models\IjazahSmp;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MyIjazahSmpImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $sekolah_id = User::find(auth()->id())->sekolah_id;
        foreach ($rows as $row) {
            if (is_null(IjazahSmp::where('nisn', $row['nisn'])->first())) {
                IjazahSmp::create([
                    'nama' => $row['nama'],
                    'sekolah_id' => $sekolah_id,
                    'nis' => $row['nis'],
                    'nama_kepsek' => $row['nama_kepsek'],
                    'nisn' => $row['nisn'],
                    'tmt_lahir' => $row['tmt_lahir'],
                    'tgl_lahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tgl_lahir']),
                    'nama_ayah' => $row['nama_ayah'],
                    'nama_ibu' => $row['nama_ibu'],
                    'no_ijazah' => $row['no_ijazah'],
                    'nilai' => $row['nilai'],
                    'tgl_terbit' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tgl_terbit']),
                ]);
            }

        }
    }
}
