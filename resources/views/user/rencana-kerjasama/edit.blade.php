@extends('layouts.app')
  @section('pageTitle', 'Edit Rencana')
@section('content')
<section class="content">
<div class="row">
<div class="col-md-12">
<div class="box box-info">
 <div class="box-header with-border">
                    <h3 class="box-title">Edit Data Rencana</h3>
                </div>
<form method="POST" action="{{url('user/rencana-kerjasama/edit')}}" enctype="multipart/form-data" class="form-horizontal">
{{ csrf_field() }} 
 <div class='col-md-6'>
  <table class='table table-condensed table-bordered'>
  <tbody>
  <tr><th width='130px' scope='row'>Deskripsi</th> <td><textarea name="judul" id="" cols="50" rows="4">{{$data->judul}}</textarea></td></tr>
  <tr><th scope='row'>Jenis</th> <td><select name="jenis" id="" class="form-control select2">
    <option value="{{$data->jenis}}">{{$data->jenis}}</option>
    <option value="MoU">MoU</option>
    <option value="Perjanjian Kerjasama">Perjanjian Kerjasama</option>
  </select></td></tr>
  </tbody>
  </table>
  </div>
   <div class='col-md-6'>
  <table class='table table-condensed table-bordered'>
  <tbody>
  <tr><th width='130px' scope='row'>Bidang</th> <td>
<div class="checkbox">
<label>
<input type="checkbox" name="bidang_1"  value="Pendidikan"  {{  ($data->bidang_1 == "Pendidikan" ? ' checked' : '') }}>Pendidikan
</label>
</div>
<div class="checkbox">
<label>
<input type="checkbox" name="bidang_2" value="Penelitian" {{  ($data->bidang_2 == "Penelitian" ? ' checked' : '') }}> Penelitian
</label>
</div>
<div class="checkbox">
<label>
<input type="checkbox" name="bidang_3"  value="Pengabdian Masyarakat" {{  ($data->bidang_3 == "Pengabdian Masyarakat" ? ' checked' : '') }}> Pengabdian Masyarakat
</label>
</div>

<div class="checkbox">
<label>
<input type="checkbox" id="myCheck"  onclick="myFunction()" {{  ($data->bidang_4 != null ? ' checked' : '') }}> Lainnya
</label>
</div>
<input type="text" id="text" name="bidang_4" class='form-control' value="{{$data->bidang_4}}">       
</td></tr>
<tr><th scope='row'>Dokumen</th> <td><input type="file" class="form-control" placeholder="" name="dokumen"></td></tr>
  </tbody>
  </table>
  </div>
  <div style='clear:both'></div>
 <div class='box-footer'>
     <input type="hidden" name="id" value="{{$data->id}}">
  <button type='submit'  class='btn btn-info'>Tambahkan</button>
  <a href='{{ url('admin/ksb') }}' class='btn btn-default'>Cancel</a>
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