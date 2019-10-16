@extends('layouts.app')
@section('pageTitle', 'Mitra')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                 <th class="text-center">Institusi</th>
                                  <th class="text-center">Email Institusi</th>
                                   <th class="text-center">Telp.Institusi</th>
                                  <th class="text-center">Telepon</th>
                                   <th class="text-center">Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mitras as $mitra)
                                <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$mitra->name}}</td>
                                <td class="text-center">{{$mitra->institusi}}</td>
                                <td class="text-center">{{$mitra->email_institusi}}</td>
                                 <td class="text-center">{{$mitra->telp_institusi}}</td>
                                <td class="text-center">{{$mitra->telepon}}</td>
                                <td class="text-center">
                    {{ !empty($mitra->alamat) ? $mitra->alamat :'' }}{{ !empty($mitra->kota) ? ', '.$mitra->kota:'' }}{{ !empty($mitra->provinsi) ? ', '.$mitra->provinsi:'' }}
                                </td>
                            </tr>
        @endforeach
        </tbody>
        </table>
                </div>
            </div>
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