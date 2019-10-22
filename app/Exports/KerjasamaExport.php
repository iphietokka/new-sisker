<?php

namespace App\Exports;

use App\Model\Kerjasama;
use DB;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class KerjasamaExport implements FromView
{
    public function __construct()
    {
        $this->title = 'kerjasama';
    }

    public function view(): View
    {
        $title = $this->title;
        $data = DB::select('SELECT * ,
                        CASE WHEN DATEDIFF(tgl_selesai, CURDATE()) <= 0 THEN "Berakhir"
                        WHEN DATEDIFF(tgl_selesai, CURDATE()) < 30 THEN "Akan Berakhir"
                        ELSE "Masih Berjalan"
                        END status
                        FROM kerjasamas');

        return view('admin.' . $title . '.export', compact('title', 'data'));
    }
}
