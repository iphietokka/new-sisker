@extends('layouts.app')
  @section('pageTitle', 'Rencana Kerjasama')
@section('content')
<section class="content">
  <div class="box">
    <div class="box-header">
         <div class="pull-right">
         <a href="rencana-kerjasama/create" class="btn btn-default"> <i class="fa  fa-plus-square"> Tambah</i></a>
          </div>
      </div>
         <div class="box-body"> 
 <table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
 <th class="text-center" width="10%" class="" >No</th>
            <th class="text-center">Jenis</th>
            <th class="text-center">Judul</th>
            <th class="text-center">Bidang</th>
            <th class="text-center">Dokumen</th>
            <th class="text-center" width="10%">Aksi</th>
</tr>
</thead>
<tbody>
<?php $a=1;?>
@foreach($data as $dt)
<tr>
 <td class="text-center">{{$a++}}</td>
          <td class="text-center">{{$dt->jenis}}</td>
          <td class="text-center">{{$dt->judul}}</td>
         <td class="text-center">{{ !empty($dt->bidang_1) ? $dt->bidang_1 :'' }}{{ !empty($dt->bidang_2) ? ', '.$dt->bidang_2:'' }}{{ !empty($dt->bidang_3) ? ', '.$dt->bidang_3:'' }}{{ !empty($dt->bidang_4) ? ', '.$dt->bidang_4:'' }}</td>
        <td class="text-center">
          @if ($dt->dokumen == null)
              <a class="btn btn-secondary" href="#"> <i class="fa fa-download"> No File </i></a>
          @else
               <a class="btn btn-secondary" href="{{ url('user/'.$title.'/download/'.$dt->id) }}"> <i class="fa fa-download"> Download </i></a>
          @endif
       
          </td>
<td class="text-center">

          <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action
                  <span class="fa fa-caret-down"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="{{ url('user/'.$title.'/edit/'.$dt->id) }}">Edit</a></li>
                    <li> <a href=""  data-toggle="modal" data-target="#delete_modal{{$dt->id}}"> Delete</a></li>
                   
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
                        <form class="form-horizontal" method="POST" action="{{url('user/'.$title.'/'.$dt->id) }}" enctype="multipart/form-data">
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