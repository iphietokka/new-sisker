@extends('layouts.app')
@section('content')
<section class="content">
<div class="row">
<div class="col-md-12">
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Tambah Data User</h3>
</div>

<form class="form-horizontal" role="form" method="POST" action="{{url('admin/user/store')}}" enctype="multipart/form-data">
{{ csrf_field() }} 
<div class="box-body">
<div class="form-group has-feedback">
    <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
    <div class="col-sm-6">
        <input type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Username" name="username" value="{{ old('username') }}">
         @if ($errors->has('username'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                              </span>
                              @endif
    </div>
</div>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
    <div class="col-sm-6">
        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" value="{{ old('password') }}">
         @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                              </span>
                              @endif
    </div>
</div>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Role</label>
    <div class="col-sm-6">
        <select class="form-control select2" name="role_id">
                            <option value="0" >Select Role</option>
                           @foreach ($roles as $key => $value)
                                 <option value="{{$key}}">{{$value}}</option>
                           @endforeach
                          </select>
            @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                              </span>
                              @endif
    </div>
</div>
<hr>
<div class="form-group">  
<label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
<div class="col-sm-6">
    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"" name="name" placeholder="Nama" value="{{ old('name') }}">
 @if ($errors->has('name'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                              </span>
                              @endif
</div>
</div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Alamat Email</label>
    <div class="col-sm-6">
        <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Alamat Email" name="email" value="{{ old('email') }}">
         @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                              </span>
                              @endif
    </div>
</div>
<div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Nomor HP</label>
    <div class="col-sm-6">
        <input type="text" class="form-control{{ $errors->has('telepon') ? ' is-invalid' : '' }}" placeholder="Nomor HP" name="telepon" value="{{ old('telepon') }}">
         @if ($errors->has('telepon'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('telepon') }}</strong>
                              </span>
                              @endif
    </div>
</div>
<hr>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Nama Instansi</label>
    <div class="col-sm-6">
    <input type="text" class="form-control{{ $errors->has('institusi') ? ' is-invalid' : '' }}" placeholder="Nama Instansi" name="institusi" value="{{ old('institusi') }}">
         @if ($errors->has('institusi'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('institusi') }}</strong>
                              </span>
                              @endif
</div>
</div>
<div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Email Instansi</label>
    <div class="col-sm-6">
           <input type="email" class="form-control{{ $errors->has('email_institusi') ? ' is-invalid' : '' }}" placeholder="Email Instansi" name="email_institusi" value="{{ old('email_institusi') }}">
         @if ($errors->has('email_institusi'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email_institusi') }}</strong>
                              </span>
                              @endif
    </div>
</div>

 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Telepon Instansi</label>
    <div class="col-sm-6">
         <input type="text" class="form-control{{ $errors->has('telp_institusi') ? ' is-invalid' : '' }}" placeholder="Telepon Instansi" name="telp_institusi" value="{{ old('telp_institusi') }}">
        @if ($errors->has('telp_institusi'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('telp_institusi') }}</strong>
                              </span>
                              @endif
        </div>
</div>

    <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Provinsi</label>
    <div class="col-sm-6">
    
   <input type="text" class="form-control{{ $errors->has('provinsi') ? ' is-invalid' : '' }}" placeholder="Provinsi" name="provinsi" value="{{ old('provinsi') }}">
           @if ($errors->has('provinsi'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('provinsi') }}</strong>
                              </span>
                              @endif
    </div>
</div>

 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Kota</label>
    <div class="col-sm-6">
  <input type="text" class="form-control{{ $errors->has('kota') ? ' is-invalid' : '' }}" placeholder="Kota" name="kota" value="{{ old('kota') }}">
        @if ($errors->has('kota'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('kota') }}</strong>
                              </span>
                              @endif
    </div>
</div>

 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Alamat</label>
    <div class="col-sm-4">
       <input type="text" name="alamat" class="form-control" {{ $errors->has('alamat') ? ' is-invalid' : '' }} placeholder="Alamat" value="{{ old('alamat') }}">
        @if ($errors->has('alamat'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('alamat') }}</strong>
                              </span>
                              @endif
    </div>
</div>
</div>
<div class="box-footer">
  <input type="hidden" name="active" value="1">
<a href="{{url('admin/kerjasama')}}" class="btn btn-danger"> Cancel</a>
<button type="submit" class="btn btn-info">Simpan</button>
</div>
</form>
</div>
</div>
</div>
</section>
@endsection

@section('scripts')
<script>
 $('#datepicker').datepicker({
     autoclose: true,
       format: 'yyyy-mm-dd'
   });
   $('#datepicker2').datepicker({
      autoclose: true,
       format: 'yyyy-mm-dd'
   });
   $('.select2').select2()
</script>
@endsection

