@extends('layouts.app')
@section('pageTitle', 'Kerjasama')
@section('content')
<section class="content">
<div class="box">
<div class="box-header">
<div class="pull-right">
<a href="kerjasama/create" class="btn btn-default"> <i class="fa  fa-plus-square"> Tambah</i></a>
<a href="kerjasama/cetak-pdf" class="btn btn-default"> <i class="fa  fa-file"> Print PDF</i></a>
<a href="kerjasama/export" class="btn btn-default"> <i class="fa  fa-download"> Export</i></a>
</div>
</div>
<div class="box-body">
<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th class="text-center" width="10%" class="" >No</th>
<th class="text-center">Mitra</th>
<th class="text-center">Deskripsi</th>
<th class="text-center">Jenis</th>
<th class="text-center">Unit Pengelola</th>
<th class="text-center">Tanggal Selesai</th>
<th class="text-center">Status</th>
<th class="text-center" width="10%">Aksi</th>
</tr>
</thead>
<tbody>
<?php $a=1;?>
@foreach($data as $dt)
<tr>
<td class="text-center">{{$a++}}</td>
<td class="text-center">{{$dt->mitra}}</td>
<td class="text-center">{{$dt->deskripsi}}</td>
<td class="text-center">{{$dt->jenis}}</td>
<td class="text-center">{{$dt->pengelola}}</td>
<td class="text-center">{{Carbon\Carbon::parse($dt->tgl_selesai)->format('Y-m-d')}}</td>
<td class="text-center">
@if ($dt->status === 'Berakhir')
<span style="color: red"><b>Berakhir</b></span>
@elseif ($dt->status === 'Masih Berjalan')
<span style="color: black"><b>Masih Berjalan</b></span>
@else
<span style="color: orange">Akan Berakhir</span>
@endif
</td>
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
<h4>Data Kerjasama</h4>
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
<th>No.Kontrak</th>
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
<td>{{Carbon\Carbon::parse($dt->tgl_mulai)->format('d-m-Y')}}</td>
</tr>
<tr>
<th>Tanggal Selesai</th>
<td>{{Carbon\Carbon::parse($dt->tgl_selesai)->format('d-m-Y')}}</td>
</tr>
<tr>
<tr>
    <th>Status</th>
    <td class="text-center">

        @if ($dt->status === 'Berakhir')
<span style="color: red"><b>Berakhir</b></span>
@elseif ($dt->status === 'Masih Berjalan')
<span style="color: black"><b>Masih Berjalan</b></span>
@else
<span style="color: orange">Akan Berakhir</span>
@endif
    </td>
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
</button>
</td>
</tr>
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