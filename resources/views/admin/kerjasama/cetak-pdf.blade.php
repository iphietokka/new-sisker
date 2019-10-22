<style>
  .page-break {
    page-break-after: always;
  }
</style>

<style type="text/css">

  #print {
    margin:auto;
    /text-align:center;/
    font-size:15px;
  /*  size: all;
    height: 800px;
    width: 1024px;
    -webkit-transform: rotate(-90deg); 
     -moz-transform:rotate(-90deg);
     filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3)*/;
  }

  table {
    width:  100%; 
    border-collapse: collapse;
  }

  thead {
    display: table-header-group;
    border-collapse: unset;
  }

  th {
    text-align: center;
    font-size: 12px;
  }

  td {
    text-align: left;
    padding: 2px 5px 2px 5px;
     font-size: 12px;
  }

  .cen{
    text-align: center;
  }

</style>

<div id="print">

  <h4 align="center" style="font-size: 12px;">DATA KERJASAMA <br>
  UNIVERSITAS  ............</h4>
  <h3 align="center" style="font-size: 12px;">Tahun : {{\Carbon\Carbon::now()->format('Y') }}</h3> 
  
  <div style="overflow-x:auto;">
	   <table width='70%' border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Mitra</th>
				<th>No.Kerjasama Mitra</th>
				<th>Deskripsi</th>
				<th>No.Kontrak</th>
                <th>Jenis</th>
                <th>Bidang</th>
				<th>Regional</th>
				<th>Unit Pengelola</th>
				<th>Tanggal Mulai</th>
				<th>Tanggal Selesai</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@php $a=1 @endphp
			@foreach($data as $dt)
			<tr>
<td>{{$a++}}</td>
<td>{{$dt->mitra}}</td>
<td >{{$dt->no_kerja_mitra}}</td>
<td>{{$dt->deskripsi}}</td>
<td >{{$dt->no_kontrak}}</td>
<td>{{$dt->jenis}}</td>
<td >{{$dt->bidang}}</td>
<td>{{$dt->regional}}</td>
<td >{{$dt->pengelola}}</td>
<td>{{Carbon\Carbon::parse($dt->tgl_mulai)->format('d-m-Y')}}</td>
<td>{{Carbon\Carbon::parse($dt->tgl_selesai)->format('Y-m-d')}}</td>
<td>
@if ($dt->status === 'Berakhir')
<span style="color: red"><b>Berakhir</b></span>
@elseif ($dt->status === 'Masih Berjalan')
<span style="color: black"><b>Masih Berjalan</b></span>
@else
<span style="color: orange">Akan Berakhir</span>
@endif
</td>
			</tr>
			@endforeach
		</tbody>
	</table>


  </div>
</div>