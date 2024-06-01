<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ijazah extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'sekolah',
        'nisn',
        'tmt_lahir',
        'tgl_lahir',
        'nama_ortu',
        'no_ijazah_sd',
        'no_ijazah_smp',
        'status',
        'th_lulus',
        'nilai_ijazah_sd',
        'nilai_ijazah_smp',
    ];

}
