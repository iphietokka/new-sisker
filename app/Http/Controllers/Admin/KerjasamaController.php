<?php

namespace App\Http\Controllers\Admin;

use App\Exports\KerjasamaExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Model\Kerjasama;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use File;
use DB;


class KerjasamaController extends Controller
{
    public function __construct()
    {
        $this->title = 'kerjasama';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        //query untuk mendapatkan status tanpa membuat field di db         
        $data = DB::select('SELECT * ,
                        CASE WHEN DATEDIFF(tgl_selesai, CURDATE()) <= 0 THEN "Berakhir"
                        WHEN DATEDIFF(tgl_selesai, CURDATE()) < 30 THEN "Akan Berakhir"
                        ELSE "Masih Berjalan"
                        END status
                        FROM kerjasamas');
        return view('admin.' . $title . '.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->title;
        $data = "";
        return view('admin.' . $title . '.create', compact('title', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'mitra' => 'required|string',
            'deskripsi' => 'required|string',
            'no_kontrak' => 'required|string',
            'tgl_mulai' => 'required|string',
            'tgl_selesai' => 'required|string',
            'pengelola' => 'required|string',
            'jenis' => 'required|string',
            'bidang' => 'required|string',
            'regional' => 'required|string',
            'no_kerja_mitra' => 'required|string',
            'dokumen' => 'file|mimes:docx,doc,pdf,jpg,gif,svg',
        ]);
        if ($validator->fails()) {
            return Redirect::to('admin/kerjasama/create')
                ->withErrors($validator)
                ->withInput();
        }
        //validasi inputan gambar ataupun file
        if ($validator->passes()) {
            $input['tgl_mulai'] = date('Y-m-d', strtotime($request->tgl_mulai));
            $input['tgl_selesai'] = date('Y-m-d', strtotime($request->tgl_selesai));
            $input = $request->all();
            if ($request->hasFile('dokumen')) {
                $file = $request->file('dokumen');
                $file_extension = $file->getClientOriginalName();
                $destination_path = public_path() . '/dokumen/kerjasama/';
                $filename = $file_extension;
                $request->file('dokumen')->move($destination_path, $filename);
                $input['dokumen'] = $filename;
            }
            Kerjasama::create($input);
            return Redirect::to('admin/' . $this->title)->with('success', 'Data Berhasil Disimpan');
        }
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
        $title = $this->title;
        $data = Kerjasama::find($id);
        return view('admin.' . $title . '.edit', compact('title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $model = $request->all();
        $boat = Kerjasama::find($model['id']);
        $boat->fill($request->except('dokumen'));
        if ($file = $request->hasFile('dokumen')) {
            $fullPath = public_path("dokumen/kerjasama/{$boat->dokumen}");
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
            $file = $request->file('dokumen');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/dokumen/kerjasama/';
            $file->move($destinationPath, $fileName);
            $boat->dokumen = $fileName;
        }
        if ($boat->save()) {
            return Redirect::to('admin/' . $this->title)->with('success', 'Data Berhasil Diupdate');
        } else {
            return Redirect::to('admin/' . $this->title)->with('error', 'Terjadi Kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($data = Kerjasama::find($id)) {
            $filename = $data->dokumen;
            $fullPath = public_path("dokumen/kerjasama/{$data->dokumen}");
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
            $data->delete($fullPath);
            return Redirect::to('admin/' . $this->title)->with('success', 'Data Berhasil Dihapus');
        } else {
            return Redirect::to('admin/' . $this->title)->with('error', 'Terjadi Kesalahan');
        }
    }

    public function download($id)
    {
        $kerja = Kerjasama::where('id', $id)->firstOrFail();
        $pathToFile = public_path('dokumen/kerjasama/' . $kerja->dokumen);
        return response()->download($pathToFile);
    }


    public function akan_berakhir(Request $request)
    {
        $title = $this->title;
        $akanberakhir = DB::select('SELECT * FROM kerjasamas WHERE date(tgl_selesai) >=date(NOW()) and date(tgl_selesai) <= date(NOW()+INTERVAL 1 MONTH)');
        return view('admin.' . $this->title . '.akan_berakhir', compact('title', 'akanberakhir'));
    }

    public function berakhir(Request $request)
    {
        $title = $this->title;
        $berakhir = DB::select('SELECT * FROM kerjasamas WHERE date(tgl_selesai) <= date(NOW())');
        return view('admin.' . $this->title . '.berakhir', compact('title', 'berakhir'));
    }

    public function aktif(Request $request)
    {
        $title = $this->title;
        $aktif = DB::select('SELECT * FROM kerjasamas WHERE date(tgl_selesai) > date(NOW())');
        return view('admin.' . $this->title . '.aktif', compact('title', 'aktif'));
    }

    public function cetak_pdf()
    {
        $title = $this->title;
        $data = DB::select('SELECT * ,
                        CASE WHEN DATEDIFF(tgl_selesai, CURDATE()) <= 0 THEN "Berakhir"
                        WHEN DATEDIFF(tgl_selesai, CURDATE()) < 30 THEN "Akan Berakhir"
                        ELSE "Masih Berjalan"
                        END status
                        FROM kerjasamas');
        $pdf = PDF::loadview('admin.' . $title . '.cetak-pdf', compact('title', 'data'));

        return $pdf->stream();
    }

    public function export()
    {
        return Excel::download(new KerjasamaExport, 'data_kerjasama.xlsx');
    }
}
