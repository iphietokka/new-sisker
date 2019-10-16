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
<form class="form-horizontal" role="form"  enctype="multipart/form-data">
<div class="box-body">
<div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Mitra" disabled value="{{$data->name}}">
    </div>
</div>
<div class="form-group">  
<label for="inputEmail3" class="col-sm-3 control-label">Alamat</label>
<div class="col-sm-6">
<textarea id="editor1" name="deskripsi" rows="4" cols="80" disabled> {{ !empty($data->alamat) ? $data->alamat :'' }}{{ !empty($data->kota) ? ', '.$data->kota:'' }}{{ !empty($data->provinsi) ? ', '.$data->provinsi:'' }}
                                </textarea>
</div>
</div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Telepon</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Nomor Kontrak" name="no_kontrak" value="{{$data->telepon}}" disabled>
    </div>
</div>
<div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Email</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Nomor Kontrak" name="no_kontrak" value="{{$data->email}}" disabled>
    </div>
</div>
<div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Institusi</label>
    <div class="col-sm-6">
        <input type="text" class="form-control"  value="{{$data->institusi}}" disabled>
    </div>
</div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Email Institusi</label>
    <div class="col-sm-6">
        <input type="text" class="form-control"  value="{{$data->email_institusi}}" disabled>
    </div>
</div>
<div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Telepon Institusi</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Tanggal Kerjasama" name="tgl_mulai" value="{{$data->telp_institusi}}" disabled>
    </div>
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