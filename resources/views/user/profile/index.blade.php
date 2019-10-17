@extends('layouts.app')
@section('pageTitle', 'Ganti Password')
@section('content')
<section class="content">
<div class="row">
<div class="col-md-12">
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Profile {{$data->name}}</h3>
</div>
<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('user/profile/update/'.$data->id)}}">
{{ csrf_field() }}
<div class="box-body">
<div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Mitra"  value="{{$data->name}}" name="name">
    </div>
</div>

 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Telepon</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Nomor Kontrak" name="telepon" value="{{$data->telepon}}" >
    </div>
</div>
<div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Email</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Nomor Kontrak" name="email" value="{{$data->email}}" >
    </div>
</div>
<div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Institusi</label>
    <div class="col-sm-6">
        <input type="text" class="form-control"  value="{{$data->institusi}}" name="institusi">
    </div>
</div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Email Institusi</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="email_institusi" value="{{$data->email_institusi}}" >
    </div>
</div>
<div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Telepon Institusi</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Tanggal Kerjasama" name="telp_institusi" value="{{$data->telp_institusi}}" >
    </div>
</div>
<div class="form-group">  
<label for="inputEmail3" class="col-sm-3 control-label">Provinsi</label>
<div class="col-sm-6">
<input type="text" name="provinsi" class="form-control" value="{{$data->provinsi}}">
</div>
</div>
<div class="form-group">  
<label for="inputEmail3" class="col-sm-3 control-label">Kota</label>
<div class="col-sm-6">
<input type="text" name="kota" class="form-control" value="{{$data->kota}}">
</div>
</div>
<div class="form-group">  
<label for="inputEmail3" class="col-sm-3 control-label">Alamat</label>
<div class="col-sm-6">
<input type="text" name="alamat" class="form-control" value="{{$data->alamat}}">
</div>
</div>
<div class="col-sm-12">
<input type="hidden" name="id" value="{{$data->id}}">
<button type="submit" class="btn btn-primary">Simpan</button>
							</div>
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
     autoclose: true
   });
   $('#datepicker2').datepicker({
     autoclose: true
   });
</script>
@endsection