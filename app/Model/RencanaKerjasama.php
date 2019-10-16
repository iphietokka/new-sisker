<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RencanaKerjasama extends Model
{
    protected $fillable = [
        'jenis', 'judul', 'bidang', 'dokumen', 'bidang_1', 'bidang_2', 'bidang_3', 'bidang_4', 'user_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
