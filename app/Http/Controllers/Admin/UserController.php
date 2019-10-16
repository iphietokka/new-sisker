<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->title = 'user';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = $this->title;
        $users = User::orderBy('name', 'ASC')->get();
        return view('admin.' . $title . '.index', compact('title', 'users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = $this->title;

        $roles = Role::pluck('name', 'id');
        return view('admin.' . $title . '.create', compact('title', 'roles'));
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
            'username' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'role_id' => ['required', 'string', 'max:255'],
            'active' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'string', 'max:255'],
            'institusi' => ['required', 'string', 'max:255'],
            'email_institusi' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telp_institusi' => ['required', 'string', 'max:255'],
            'provinsi' => ['required', 'string', 'max:255'],
            'kota' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        if ($validator->fails()) {
            return Redirect::to('admin/user/create')
                ->withErrors($validator)
                ->withInput();
        }

        //validasi inputan gambar ataupun file
        if ($validator->passes()) {
            $input = $request->all();
            User::create($input);
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
        $data = User::find($id);
        $roles = Role::pluck('name', 'id');
        return view('admin.' . $title . '.edit', compact('title', 'data', 'roles'));
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
        $data = User::find($model['id']);
        if ($request->password == '') {
            $input = $request->except('password');
        } else {
            $input = $request->all();
        }
        if (!$request->password == '') {
            $input['password'] = bcrypt($request->password);
        }
        if ($data->update($input)) {
            return redirect('admin/' . $this->title)->with('success', 'Data Successfully Updated');
        } else {
            return redirect('admin/' . $this->title)->with('error', 'Something Went Wrong!!');
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
        $users = User::find($id);
        if ($users->delete()) {
            return redirect('admin/' . $this->title)->with('success', 'Data Successfully Deleted');
        } else {
            return redirect('admin/' . $this->title)->with('error', 'Something Went Wrong!!');
        }
    }
}
