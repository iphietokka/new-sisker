    @extends('layouts.app')
    @section('pageTitle', 'Tambah Rencana')
    @section('content')
<section class="content">
<div class="row">
<div class="col-md-12">
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Rencana Kerjasama</h3>
</div>
<form method="POST" action="{{url('user/rencana-kerjasama/store')}}" enctype="multipart/form-data" class="form-horizontal">
{{ csrf_field() }} 
 <div class='col-md-6'>
  <table class='table table-condensed table-bordered'>
  <tbody>
  <tr><th width='130px' scope='row'>Deskripsi</th> <td><textarea name="judul" id="" cols="50" rows="4" class="form-control{{ $errors->has('judul') ? ' is-invalid' : '' }}">{{ old('judul') }}</textarea>
    @if ($errors->has('judul'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('judul') }}</strong>
                              </span>
                              @endif
                            </td></tr>
  <tr><th scope='row'>Jenis</th> <td><select name="jenis" id="" class="form-control select2 {{ $errors->has('jenis') ? ' is-invalid' : '' }}" >
    <option value="">-- Pilih --</option>
    <option value="MoU">MoU</option>
    <option value="Perjanjian Kerjasama">Perjanjian Kerjasama</option>
  </select>
 @if ($errors->has('jenis'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('jenis') }}</strong>
                              </span>
                              @endif
</td></tr>
  </tbody>
  </table>
  </div>
   <div class='col-md-6'>
  <table class='table table-condensed table-bordered'>
  <tbody>
  <tr><th width='130px' scope='row'>Bidang</th> <td>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="bidang_1" value="Pendidikan"> Pendidikan
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="bidang_2" value="Penelitian"> Penelitian
                  </label>
                </div>
                 <div class="checkbox">
                  <label>
                    <input type="checkbox" name="bidang_3" value="Pengabdian Masyarakat"> Pengabdian Masyarakat
                  </label>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="myCheck"  onclick="myFunction()"> Lainnya
                  </label>
                </div>
                <input type="text" style="display:none" id="text" name="bidang_4" class='form-control'>

                
    </td></tr>
  <tr><th scope='row'>Dokumen</th> <td><input type="file" class="form-control" placeholder="" name="dokumen"></td></tr>
  </tbody>
  </table>
  </div>
  <div style='clear:both'></div>
 <div class='box-footer'>
  <button type='submit'  class='btn btn-info'>Tambahkan</button>
  <a href='{{ url('user/rencana-kerjasama') }}' class='btn btn-default'>Cancel</a>
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
<script>
function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}
</script>
@endsection