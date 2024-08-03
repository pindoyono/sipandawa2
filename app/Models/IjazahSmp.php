<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IjazahSmp extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'sekolah_id',
        'nisn',
        'nis',
        'tmt_lahir',
        'tgl_lahir',
        'nama_ayah',
        'nama_ibu',
        'no_ijazah',
        'nilai',
        'tgl_terbit',
    ];

    public function sekolah()
    {
        // return $this->hasMany(Sekolah::class);
        return $this->belongsTo(Sekolah::class);
    }

}
