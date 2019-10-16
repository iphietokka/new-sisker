<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RealisasiKerjasama extends Model
{
    protected $fillable = [
        'mitra',
        'deskripsi',
        'pelaksana',
        'kegiatan',
        'no_kontrak',
        'tgl_mulai',
        'tgl_selesai',
        'pj_univ',
        'pj_mitra',
        'dokumen',


    ];
}
