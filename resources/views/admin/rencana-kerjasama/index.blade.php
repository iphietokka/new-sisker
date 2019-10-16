@extends('layouts.app')
@section('pageTitle', 'Rencana Kerjasama')
@section('content')
<section class="content">
  <div class="box">
    <div class="box-header">
      </div>
         <div class="box-body"> 
 <table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
 <th class="text-center" width="10%" class="" >No</th>
 <th class="text-center">Mitra</th>
            <th class="text-center">Jenis</th>
            <th class="text-center">Deskripsi</th>
            <th class="text-center">Bidang</th>
            <th class="text-center">Dokumen</th>
</tr>
</thead>
<tbody>
<?php $a=1;?>
@foreach($data as $dt)
<tr>
 <td class="text-center">{{$a++}}</td>
  <td class="text-center">{{$dt->users->name}}</td>
          <td class="text-center">{{$dt->jenis}}</td>
          <td class="text-center">{{$dt->judul}}</td>
         <td class="text-center">{{ !empty($dt->bidang_1) ? $dt->bidang_1 :'' }}{{ !empty($dt->bidang_2) ? ', '.$dt->bidang_2:'' }}{{ !empty($dt->bidang_3) ? ', '.$dt->bidang_3:'' }}{{ !empty($dt->bidang_4) ? ', '.$dt->bidang_4:'' }}</td>
        <td class="text-center">
        @if ($dt->dokumen == null)
             <a class="btn btn-secondary" href="#"> <i class="fa fa-download"> No File </i></a>
          @else
<a class="btn btn-secondary" href="{{ url('admin/'.$title.'/download/'.$dt->id) }}"> <i class="fa fa-download"> Download </i></a>
         
        @endif
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