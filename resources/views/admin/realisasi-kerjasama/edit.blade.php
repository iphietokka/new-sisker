@extends('layouts.app')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
<form method="POST" action="{{url('admin/realisasi-kerjasama/edit')}}" enctype="multipart/form-data" class="form-horizontal">
{{ csrf_field() }} 

<div class="box-body">

<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Mitra</label>
<div class="col-sm-6">
<select class="form-control select2" name="mitra" style="width: 100%;">
<option value="{{$data->mitra}}" selected="">{{ Helper::getDetail('kerjasamas', $data->mitra,'mitra','id')  }}</option>

@foreach($kerja as $key => $value)
<option value="{{$key}}">{{$value}}</option>
@endforeach
</select>
</div>
</div>



<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Deskripsi</label>
<div class="col-sm-6">
<textarea class="form-control" rows="5" name="deskripsi">{{ $data->deskripsi }}</textarea>
</div>
</div>

<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Pelaksana</label>
<div class="col-sm-6">
<input type="text" class="form-control" placeholder="Pelaksana" name="pelaksana" value="{{$data->pelaksana}}">
</div>
</div>

<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Kegiatan</label>
<div class="col-sm-6">
<input type="text" class="form-control" placeholder="Kegiatan" name="kegiatan" value="{{$data->kegiatan}}">
</div>
</div>


<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">No.Kontrak</label>
<div class="col-sm-6">
<input type="text" class="form-control" placeholder="Nomor Kontrak" name="no_kontrak" value="{{$data->no_kontrak}}">
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">PJ Univ</label>
<div class="col-sm-6">
<input type="text" class="form-control" placeholder="PJ Univ" name="pj_univ" value="{{$data->pj_univ}}">
</div>
</div>

<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">PJ Mitra</label>
<div class="col-sm-6">
<input type="text" class="form-control" placeholder="PJ Mitra" name="pj_mitra" value="{{$data->pj_mitra}}">
</div>
</div>

<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Default file input</label>
<div class="col-sm-6">
<input type="file" class="form-control" placeholder="" name="dokumen">
</div>
</div>

<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Tanggal Mulai</label>
<div class="col-sm-6">
<input type="text" class="form-control" placeholder="" name="tgl_mulai" value="{{$data->tgl_mulai}}" id="datepicker2"> 
</div>
</div>

<div class="form-group">
<label for="inputEmail3" class="col-sm-3 control-label">Tanggal Selesai</label>
<div class="col-sm-6">
<input type="text" class="form-control" placeholder="" name="tgl_selesai" value="{{$data->tgl_selesai}}" id="datepicker">
</div>
</div>
</div>
<div class="box-footer">

<input type="hidden" class="form-control" value="{{$data->id}}" name="id">
 <a href="{{url('admin/realisasi-kerjasama')}}" class="btn btn-danger"> Cancel</a>
<button type="submit" class="btn btn-info ">Simpan</button>
</div>
</form>
</div>
</div>

</div>
<!-- end row -->
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
    $('.select2').select2()
</script>
@endsection