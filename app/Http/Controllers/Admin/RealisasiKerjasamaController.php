<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Kerjasama;
use Alert;
use File;
use DB;
use App\Model\RealisasiKerjasama;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class RealisasiKerjasamaController extends Controller
{
    public function __construct()
    {
        $this->title = 'realisasi-kerjasama';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $data = RealisasiKerjasama::orderBy('mitra', 'ASC')->get();
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
        $kerja = Kerjasama::pluck('mitra', 'id');
        $data = "";
        return view('admin.' . $title . '.create', compact('title', 'data', 'kerja'));
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
            'pelaksana' => 'required|string',
            'kegiatan' => 'required|string',
            'no_kontrak' => 'required|string',
            'tgl_mulai' => 'required|string',
            'tgl_selesai' => 'required|string',
            'pj_univ' => 'required|string',
            'pj_mitra' => 'required|string',
            'dokumen' => 'file|mimes:docx,doc,pdf,jpg,gif,svg',
        ]);

        if ($validator->passes()) {
            $input = $request->all();
            $input['tgl_mulai'] = date('Y-m-d', strtotime($request->tgl_mulai));
            $input['tgl_selesai'] = date('Y-m-d', strtotime($request->tgl_selesai));
            $input['dokumen'] = $request->dokumen->getClientOriginalName();
            $request->dokumen->move(public_path('dokumen/realisasi'), $input['dokumen']);

            RealisasiKerjasama::create($input);
            return Redirect::to('admin/' . $this->title)->with('success', 'Data Berhasil Disimpan');
        } else {
            return Redirect::to('admin/' . $this->title)->with('error', 'Terjadi Kesalahan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = $this->title;
        $data = RealisasiKerjasama::find($id);
        $kerja = Kerjasama::pluck('mitra', 'id');
        return view('admin.' . $title . '.edit', compact('title', 'data', 'kerja'));
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
        $boat = RealisasiKerjasama::find($model['id']);


        $boat->fill($request->except('dokumen'));


        if ($file = $request->hasFile('dokumen')) {
            $fullPath = public_path("dokumen/realisasi/{$boat->dokumen}");
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
            $file = $request->file('dokumen');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/dokumen/realisasi/';
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
        if ($data = RealisasiKerjasama::find($id)) {
            $filename = $data->dokumen;
            $fullPath = public_path("dokumen/realisasi/{$data->dokumen}");
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
            $data->delete($fullPath);

            return Redirect::to('admin/' . $this->title)->with('success', 'Data Berhasil Dihapus');
        } else {
            return Redirect::to('admin/' . $this->title)->with('error', 'Terjadi Kesalahan');
        }
    }
}
