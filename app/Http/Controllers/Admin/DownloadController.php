<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use File;
use App\Model\Download;

class DownloadController extends Controller
{
    public function __construct()
    {
        $this->title = "download";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $data = Download::orderBy('name', 'ASC')->get();
        return view('admin.' . $title . '.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|string',
            'dokumen' => 'required|file|mimes:docx,doc,pdf,jpg,gif,svg',
        ]);

        if ($validator->passes()) {
            $input = $request->all();
            if ($request->hasFile('dokumen')) {
                $input['dokumen'] = $request->dokumen->getClientOriginalName();
                $request->dokumen->move(public_path('uploads/dokumen'), $input['dokumen']);
            }

            Download::create($input);
            return redirect('admin/' . $this->title)->with('success', 'Data Berhasil Disimpan');
        } else {
            return redirect('admin/' . $this->title)->with('error', 'Data Gagal Disimpan');
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
        $model = $request->all();
        $boat = Download::find($model['id']);
        $boat->fill($request->except('dokumen'));
        if ($file = $request->hasFile('dokumen')) {
            $fullPath = public_path("uploads/dokumen/{$boat->dokumen}");
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
            $file = $request->file('dokumen');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/uploads/dokumen/';
            $file->move($destinationPath, $fileName);
            $boat->dokumen = $fileName;
        }
        if ($boat->save()) {
            return Redirect::to('admin/' . $this->title)->with('success', 'Data Berhasil Diupdate');
        } else {
            return Redirect::to('admin/' . $this->title)->with('success', 'Data Gagal Diupdate');
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
        if ($data = Download::find($id)) {
            $filename = $data->dokumen;
            $fullPath = public_path("/uploads/dokumen/{$data->dokumen}");
            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }
            $data->delete($fullPath);
            return Redirect::to('admin/' . $this->title)->with('success', 'Data Berhasil Dihapus');
        } else {
            return Redirect::to('admin/' . $this->title)->with('error', 'Data Gagal Dihapus');
        }
    }

    public function download($id)
    {

        $filesss = Download::where('id', $id)->firstOrFail();
        $pathToFile = public_path('uploads/dokumen/' . $filesss->dokumen);
        return response()->download($pathToFile);
    }
}
