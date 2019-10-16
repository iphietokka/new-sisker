@extends('layouts.app')
@section('pageTitle', 'Edit Berakhir')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
<h3 class="box-title">EditData Kerjasama</h3>
</div>
                <form class="form-horizontal" method="POST" action="{{url('admin/kerjasama/edit')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Mitra</label>
                            <div class="col-sm-6">
                                <input type="hidden" class="form-control" value="{{$data->id}}" name="id">
                                <input type="text" class="form-control" value="{{$data->mitra}}" name="mitra">
                            </div>
                        </div>

<div class="form-group">
    <label for="inputEmail3" class="col-sm-3 control-label">No. Kerja sama Mitra</label>
    <div class="col-sm-6">
        <input type="text" class="form-control {{ $errors->has('no_kerja_mitra') ? ' is-invalid' : '' }}" placeholder="No. Kerja sama Mitra" name="no_kerja_mitra" value="{{ $data->no_kerja_mitra }}">
         @if ($errors->has('no_kerja_mitra'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('no_kerja_mitra') }}</strong>
                              </span>
                              @endif
    </div>
</div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Deskripsi</label>
                            <div class="col-sm-6">
                                <textarea id="editor1" name="deskripsi" rows="4" cols="80" autofocus="">{{$data->deskripsi}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">No.Kerja sama Unmus</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="No.Kerja sama Unmus" name="no_kontrak" value="{{$data->no_kontrak}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Jenis</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Jenis" name="jenis" value="{{$data->jenis}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Bidang</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Bidang" name="bidang" value="{{$data->bidang}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Mulai</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Tanggal Mulai" name="tgl_mulai" value="{{$data->tgl_mulai}}" id="datepicker2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Selesai</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Tanggal Selesai" name="tgl_selesai" value="{{$data->tgl_selesai}}" id="datepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Regional</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Regional" name="regional" value="{{$data->regional}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Unit Pengelola</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Unit Pengelola" name="pengelola" value="{{$data->pengelola}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Dokumen</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" placeholder="" name="dokumen" value="">
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

