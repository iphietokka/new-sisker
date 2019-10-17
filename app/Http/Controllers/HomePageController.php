<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Kerjasama;
use App\Model\RealisasiKerjasama;
use DB;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('SELECT * ,
                        CASE WHEN DATEDIFF(tgl_selesai, CURDATE()) <= 0 THEN "Berakhir"
                        WHEN DATEDIFF(tgl_selesai, CURDATE()) < 30 THEN "Akan Berakhir"
                        ELSE "Masih Berjalan"
                        END status
                        FROM kerjasamas');

        $datakerja = Kerjasama::count();

        $akanberakhir = DB::select('SELECT count(*) as akanberakhir FROM kerjasamas WHERE date(tgl_selesai) >=date(NOW()) and date(tgl_selesai) <= date(NOW()+INTERVAL 1 MONTH)');

        $berakhir = DB::select('SELECT COUNT(*) as berakhir FROM kerjasamas WHERE date(tgl_selesai) <= date(NOW())');

        $aktif = DB::select('SELECT COUNT(*) as aktif FROM kerjasamas WHERE date(tgl_selesai) > date(NOW())');

        $janji = RealisasiKerjasama::select(DB::raw('count(kegiatan) as jumlah'))
            ->groupBy(DB::raw("year(tgl_mulai)"), 'kegiatan')

            ->get()->toArray();
        $janji = array_column($janji, 'jumlah');

        $year = RealisasiKerjasama::select(DB::raw("YEAR(tgl_mulai) as year"))
            ->groupBy(DB::raw("year(tgl_mulai)"))

            ->get()->toArray();
        $year = array_column($year, 'year');

        // $jumlah = Perjanjian::select(DB::raw('count(kegiatan) as jumlah'))
        //  ->groupBy(DB::raw("year(tgl_mulai)"))
        //   ->get()->toArray();
        //     $jumlah = array_column($jumlah, 'jumlah');


        $desk = Kerjasama::select(DB::raw('count(deskripsi) as desk'))
            ->groupBy(DB::raw("year(tgl_mulai)"))
            ->get()->toArray();
        $desk = array_column($desk, 'desk');

        $tahun = Kerjasama::select(DB::raw("YEAR(tgl_mulai) as tahun"))
            ->groupBy(DB::raw("year(tgl_mulai)"))
            ->get()->toArray();
        $tahun = array_column($tahun, 'tahun');
        return view('welcome', compact('datakerja', 'akanberakhir', 'berakhir', 'aktif', 'janji', 'data'))
            ->with('desk', json_encode($desk, JSON_NUMERIC_CHECK))
            ->with('tahun', json_encode($tahun, JSON_NUMERIC_CHECK))
            ->with('janji', json_encode($janji, JSON_NUMERIC_CHECK))
            ->with('year', json_encode($year, JSON_NUMERIC_CHECK));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function panduan()
    {
        return view('panduan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function kerjasama()
    {
        $data = DB::select('SELECT * ,
                        CASE WHEN DATEDIFF(tgl_selesai, CURDATE()) <= 0 THEN "Berakhir"
                        WHEN DATEDIFF(tgl_selesai, CURDATE()) < 30 THEN "Akan Berakhir"
                        ELSE "Masih Berjalan"
                        END status
                        FROM kerjasamas');

        return view('kerjasama', compact('data'));
    }

    public function aktif()
    {
        $aktif = DB::select('SELECT * FROM kerjasamas WHERE date(tgl_selesai) > date(NOW())');

        return view('aktif', compact('aktif'));
    }

    public function berakhir()
    {
        $berakhir = DB::select('SELECT * FROM kerjasamas WHERE date(tgl_selesai) <= date(NOW())');

        return view('berakhir', compact('berakhir'));
    }

    public function akan_berakhir()
    {
        $akanberakhir = DB::select('SELECT * FROM kerjasamas WHERE date(tgl_selesai) >=date(NOW()) and date(tgl_selesai) <= date(NOW()+INTERVAL 1 MONTH)');

        return view('akan-berakhir', compact('akanberakhir'));
    }

    public function download($id)
    {
        $kerja = Kerjasama::where('id', $id)->firstOrFail();
        $pathToFile = public_path('dokumen/kerjasama/' . $kerja->dokumen);
        return response()->download($pathToFile);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
