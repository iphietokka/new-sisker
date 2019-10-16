<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RencanaRequest;
use App\Model\RencanaKerjasama;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Auth;
use File;


class RecanaKerjasamaController extends Controller
{
    public function __construct()
    {
        $this->title = 'rencana-kerjasama';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;

        $data = RencanaKerjasama::where('user_id', '=', Auth::user()->id)->get();
        return view('user.' . $title . '.index', compact('title', 'data'));
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
        return view('user.' . $title . '.create', compact('title', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RencanaRequest $request)
    {
        $data = new RencanaKerjasama();
        $data->judul = $request->judul;
        $data->jenis = $request->judul;
        $data->bidang_1 = $request->bidang_1;
        $data->bidang_2 = $request->bidang_2;
        $data->bidang_3 = $request->bidang_3;
        $data->bidang_4 = $request->bidang_4;
        $data->dokumen = $request->dokumen;
        $data->user_id = Auth::user()->id;
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $file_extension = $file->getClientOriginalName();
            $destination_path = public_path() . '/dokumen/kerjasama/';
            $filename = $file_extension;
            $request->file('dokumen')->move($destination_path, $filename);
            $data->dokumen = $filename;
        }
        if ($data->save()) {
            return Redirect::to('user/' . $this->title)->with('success', 'Data Berhasil Disimpan');
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
        $data = RencanaKerjasama::find($id);
        $checked = explode(', ', $data['bidang']);
        return view('user.' . $title . '.edit', compact('title', 'data', 'checked'));
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
        $boat = RencanaKerjasama::find($model['id']);
        $boat->fill($request->except('dokumen'));
        if ($file = $request->hasFile('dokumen')) {
            $fullPath = public_path("dokumen/rencana/{$boat->dokumen}");
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
            $file = $request->file('dokumen');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/dokumen/rencana/';
            $file->move($destinationPath, $fileName);
            $boat->dokumen = $fileName;
        }
        if ($boat->save()) {
            return Redirect::to('user/' . $this->title)->with('success', 'Data Berhasil Diupdate');
        } else {
            return Redirect::to('user/' . $this->title)->with('error', 'Terjadi Kesalahan');
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
        if ($data = RencanaKerjasama::find($id)) {
            $filename = $data->dokumen;
            $fullPath = public_path("dokumen/rencana/{$data->dokumen}");
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
            $data->delete($fullPath);
            return Redirect::to('user/' . $this->title)->with('success', 'Data Berhasil Dihapus');
        } else {
            return Redirect::to('user/' . $this->title)->with('error', 'Terjadi Kesalahan');
        }
    }

    public function download($id)
    {
        $kerja = RencanaKerjasama::where('id', $id)->firstOrFail();
        $pathToFile = public_path('dokumen/rencana/' . $kerja->dokumen);
        return response()->download($pathToFile);
    }
}
