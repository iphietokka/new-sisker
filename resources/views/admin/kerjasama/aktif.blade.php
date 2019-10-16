@extends('layouts.app')
@section('pageTitle', 'Aktif')
@section('content')
<section class="content">
  <div class="box">
         <div class="box-body"> 
     <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Mitra</th>
            <th class="text-center">Deskripsi</th>
           <th class="text-center">Jenis</th>
            <th class="text-center">Unit Pengelola</th>
            <th class="text-center">Tanggal Selesai</th>
            <th class="text-center" width="10%">Aksi</th>
          </tr>
        </thead>
        <tbody><?php $a=1;?>
        @foreach($aktif as $key => $dt)
        <tr>
          <td class="text-center">{{$a++}}</td>
         <td class="text-center">{{$dt->mitra}}</td>
          <td class="text-center">{{$dt->deskripsi}}</td>
          <td class="text-center">{{$dt->jenis}}</td>
         <td class="text-center">{{$dt->pengelola}}</td>
          <td class="text-center">{{Carbon\Carbon::parse($dt->tgl_selesai)->format('d-m-Y')}}</td>
          <td class="text-center">
<a href="" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#edit_modal{{$dt->id}}"> <i class="fa fa-edit"></i> Details</a>
          
            
        </td>
      </tr>
       <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;" id="modal-{{$dt->id}}">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">

        </div>
              <div class="modal-body">
                     <table class="table table-bordered">
  
    <tr>
     <th>Mitra</th>
     <td>{{ $dt->mitra }}</td>
    </tr>
     <tr>
     <th>No.Kerjasama Mitra</th>
     <td>{{ $dt->no_kerja_mitra }}</td>
    </tr>
    <tr>
     <th>Deskripsi</th>
     <td>{{ $dt->deskripsi }}</td>
    </tr>
    <tr>
     <th>No.Kerjasama Unmus</th>
     <td>{{ $dt->no_kontrak }}</td>
    </tr>
    <tr>
      <th>Jenis</th>
      <td>{{$dt->jenis}}</td>
    </tr>
    <tr>

     <th>Bidang</th>
     <td>{{ $dt->bidang }}</td>
    </tr>
    <tr>
      <th>Regional</th>
      <td> {{  $dt->regional }}</td>
    </tr>
     <tr>
     <th>Unit Pengelola</th>
     <td>{{ $dt->pengelola }}</td>
    </tr>
    <tr>
     <th>Tanggal Mulai</th>
     <td>{{ $dt->tgl_mulai}}</td>
    </tr>
     <tr>
     <th>Tanggal Selesai</th>
     <td>{{ $dt->tgl_selesai }}</td>
    </tr>
  
  </table>
              </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                @if ($dt->dokumen == null)
<a class="btn btn-info" href="#"> <i class="fa fa-download"> No File </i></a>
@else
<a class="btn btn-info" href="{{ url('admin/'.$title.'/download/'.$dt->id) }}"> <i class="fa fa-download"> Download </i></a>
@endif
                </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

  @endforeach
    </tbody>

  </table>
</div>
</div>

</section>
@endsection

@section('scripts')
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection

