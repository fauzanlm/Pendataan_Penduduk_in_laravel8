<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nik',
        'nama',
        'jk',
        'jln',
        'rt_rw',
        'desa',
        'kecamatan',
        'kab_kota',
        'agama',
        'pekerjaan',
        'pas_foto',
    ];
}
