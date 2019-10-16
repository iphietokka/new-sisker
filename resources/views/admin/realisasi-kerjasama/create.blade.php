    @extends('layouts.app')
    @section('content')
<section class="content">
<div class="row">
<div class="col-md-12">
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Realisasi Kerjasama</h3>
</div>
    <form method="POST" action="{{url('admin/realisasi-kerjasama/store')}}" enctype="multipart/form-data" class="form-horizontal">
    {{ csrf_field() }} 
  <div class="box-body">
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Mitra</label>
    <div class="col-sm-6">
    <select class="form-control select2" name="mitra" style="width: 100%;">
    <option selected="selected">--Pilih--</option>
    @foreach($kerja as $key => $value)
    <option value="{{$key}}">{{$value}}</option>
    @endforeach
    </select>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Deskripsi</label>
    <div class="col-sm-6">
    <textarea class="form-control" rows="5" name="deskripsi"></textarea>
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Pelaksana</label>
    <div class="col-sm-6">
    <input type="text" class="form-control" placeholder="Pelaksana" name="pelaksana">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Kegiatan</label>
    <div class="col-sm-6">
    <input type="text" class="form-control" placeholder="Kegiatan" name="kegiatan">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">No.Kontrak</label>
    <div class="col-sm-6">
    <input type="text" class="form-control" placeholder="Nomor Kontrak" name="no_kontrak">
    </div>
    </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">PJ Univ</label>
    <div class="col-sm-6">
    <input type="text" class="form-control" placeholder="PJ Univ" name="pj_univ">
    </div>
    </div>

    <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">PJ Mitra</label>
    <div class="col-sm-6">
    <input type="text" class="form-control" placeholder="PJ Mitra" name="pj_mitra">
    </div>
    </div>

    <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Mulai</label>
    <div class="col-sm-6">
    <input type="text" id="datepicker2" class="form-control" placeholder="" name="tgl_mulai"> 
    </div>
    </div>

    <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Selesai</label>
    <div class="col-sm-6">
    <input type="text" id="datepicker" class="form-control" placeholder="" name="tgl_selesai">
    </div>
    </div>


    <div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">Upload File</label>
    <div class="col-sm-6">
    <input type="file" class="form-control" placeholder="" name="dokumen">
    </div>
    </div>
</div>
   <div class="box-footer">
 <a href="{{url('admin/realisasi-kerjasama')}}" class="btn btn-danger"> Cancel</a>
<button type="submit" class="btn btn-info">Simpan</button>
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