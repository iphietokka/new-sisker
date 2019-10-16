@extends('layouts.app')
@section('pageTitle', 'Tambah Kerjasama')
@section('content')
<section class="content">
<div class="row">
<div class="col-md-12">
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Tambah Data Kerjasama</h3>
</div>

<form class="form-horizontal" role="form" method="POST" action="{{url('admin/kerjasama/store')}}" enctype="multipart/form-data">
{{ csrf_field() }} 
<div class="box-body">
<div class="form-group has-feedback">
    <label for="inputEmail3" class="col-sm-3 control-label">Mitra</label>
    <div class="col-sm-6">
        <input type="text" class="form-control {{ $errors->has('mitra') ? ' is-invalid' : '' }}" placeholder="Mitra" name="mitra" value="{{ old('mitra') }}">
         @if ($errors->has('mitra'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('mitra') }}</strong>
                              </span>
                              @endif
    </div>
</div>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">No. Kerja sama Mitra</label>
    <div class="col-sm-6">
        <input type="text" class="form-control {{ $errors->has('no_kerja_mitra') ? ' is-invalid' : '' }}" placeholder="No. Kerja sama Mitra" name="no_kerja_mitra" value="{{ old('no_kerja_mitra') }}">
         @if ($errors->has('no_kerja_mitra'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('no_kerja_mitra') }}</strong>
                              </span>
                              @endif
    </div>
</div>
<div class="form-group">  
<label for="inputEmail3" class="col-sm-3 control-label">Nama Kerjasama</label>
<div class="col-sm-6">
<textarea name="deskripsi" rows="4" cols="80" placeholder="Deskripsi Kerjasama" class="form-control{{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" > {{ old('deskripsi') }}</textarea>
 @if ($errors->has('deskripsi'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('deskripsi') }}</strong>
                              </span>
                              @endif
</div>
</div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">No.Kerja sama Unmus</label>
    <div class="col-sm-6">
        <input type="text" class="form-control{{ $errors->has('no_kontrak') ? ' is-invalid' : '' }}" placeholder="No.Kerja sama Unmus" name="no_kontrak" value="{{ old('no_kontrak') }}">
         @if ($errors->has('no_kontrak'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('no_kontrak') }}</strong>
                              </span>
                              @endif
    </div>
</div>
<div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Jenis</label>
    <div class="col-sm-6">
        <input type="text" class="form-control{{ $errors->has('jenis') ? ' is-invalid' : '' }}" placeholder="Jenis" name="jenis" value="{{ old('jenis') }}">
   @if ($errors->has('jenis'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('jenis') }}</strong>
                              </span>
                              @endif
    </div>
</div>
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Bidang</label>
    <div class="col-sm-6">
    <input type="text" class="form-control{{ $errors->has('bidang') ? ' is-invalid' : '' }}" placeholder="Bidang" name="bidang" value="{{old('bidang')}}">
     @if ($errors->has('bidang'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bidang') }}</strong>
                              </span>
                              @endif
</div>
</div>
<div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Mulai</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Tanggal Mulai" name="tgl_mulai" id="datepicker2">
    </div>
</div>

 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Selesai</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="Tanggal Selesai" name="tgl_selesai" id="datepicker">
    </div>
</div>

    <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Regional</label>
    <div class="col-sm-6">
    
      <input type="text" class="form-control{{ $errors->has('regional') ? ' is-invalid' : '' }}" placeholder="Regional" name="regional" value="{{old('regional')}}"> 
     @if ($errors->has('regional'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('regional') }}</strong>
                              </span>
                              @endif
    </div>
</div>

 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Unit Pengelola</label>
    <div class="col-sm-6">
        <input type="text" class="form-control{{ $errors->has('regional') ? ' is-invalid' : '' }}" placeholder="Unit Pengelola" name="pengelola" value="{{old('pengelola')}}">
        @if ($errors->has('pengelola'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('pengelola') }}</strong>
                              </span>
                              @endif
    </div>
</div>

 <div class="form-group">
    <label for="inputPassword3" class="col-sm-3 control-label">Dokumen</label>
    <div class="col-sm-4">
        <input type="file" class="form-control" placeholder="" name="dokumen">
    </div>
</div>
</div>
<div class="box-footer">
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
</script>
@endsection