@extends('layouts.app')
@section('content')
<section class="content">
  <div class="box">
    <div class="box-header">
         <div class="pull-right">
         <a href="realisasi-kerjasama/create" class="btn btn-default"> <i class="fa  fa-plus-square"> Tambah</i></a>
          </div>
      </div>
         <div class="box-body"> 
 <table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
 <th class="text-center" width="10%" class="" >No</th>
            <th class="text-center">Mitra</th>
            <th class="text-center">Deskripsi</th>
            <th class="text-center">Pelaksana</th>
            <th class="text-center">Kegiatan</th>
            <th class="text-center">PJ Univ</th>
            <th class="text-center">PJ Mitra</th>
            <th class="text-center">Waktu</th>
            <th class="text-center" width="10%">Aksi</th>
</tr>
</thead>
<tbody>
<?php $a=1;?>
@foreach($data as $dt)
<tr>
 <td class="text-center">{{$a++}}</td>
         <td class="text-center">{{ Helper::getDetail('kerjasamas', $dt->mitra,'mitra','id')  }}</td>
          <td class="text-center">{{$dt->deskripsi}}</td>
          <td class="text-center">{{$dt->pelaksana}}</td>
         <td class="text-center">{{$dt->kegiatan}}</td>
               <td class="text-center">{{$dt->pj_univ}}</td>
         <td class="text-center">{{$dt->pj_mitra}}</td>  
<td>{{Carbon\Carbon::parse($dt->tgl_mulai)->format('d-m-Y')}} / {{Carbon\Carbon::parse($dt->tgl_selesai)->format('d-m-Y')}}</td> 

<td class="text-center">

          <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action
                  <span class="fa fa-caret-down"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="{{ url('admin/'.$title.'/edit/'.$dt->id) }}">Edit</a></li>
                    <li> <a href=""  data-toggle="modal" data-target="#delete_modal{{$dt->id}}"> Delete</a></li>
                    <li><a data-toggle="modal" data-target="#modal-{{$dt->id}}"  href="#">Details</a></li>
                  </ul>
                </div>

                 {{-- Modal Start --}}
                <div class="modal fade" tabindex="-1" role="dialog" id="delete_modal{{$dt->id}}">
                  <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                      <div class="modal-body text-center">
                        <div class="row">

                          <h4 class="modal-heading">Are You Sure?</h4>
                          <p>Do you really want to delete these records? This process cannot be undone.</p>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <form class="form-horizontal" method="POST" action="{{url('admin/'.$title.'/'.$dt->id) }}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <input name="_method" type="hidden" value="DELETE">
                          <button type="reset" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                      </form>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                {{-- END MODAL --}}

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;" id="modal-{{$dt->id}}">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">

        </div>
        <div class="modal-body">
            <table class="table table-bordered">

                 <tr>
     <th>Mitra</th>
     <td>{{ Helper::getDetail('kerjasamas', $dt->mitra,'mitra','id')  }}</td>
    </tr>
    <tr>
     <th>Deskripsi</th>
     <td>{{ $dt->deskripsi }}</td>
    </tr>
    <tr>
     <th>Pelaksana</th>
     <td>{{ $dt->pelaksana }}</td>
    </tr>
    <tr>
      <th>Kegiatan</th>
      <td>{{$dt->kegiatan}}</td>
    </tr>
    <tr>

     <th>PJ.Univ</th>
     <td>{{ $dt->pj_univ }}</td>
    </tr>
    <tr>
      <th>PJ.Mitra</th>
      <td> {{  $dt->pj_mitra }}</td>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a class="btn btn-secondary" href="{{ url('admin/'.$title.'/download/'.$dt->id) }}"> <i class="fa fa-download"> Download </i></a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</td>
</tr>

</div>
@endforeach
</tr>
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