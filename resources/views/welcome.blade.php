<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard - Sistem Kerjasama</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    <!-- Date Picker -->
   <link rel="stylesheet" href="{{asset('backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
   <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('backend/bower_components/select2/dist/css/select2.min.css') }}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SIS</b>KER</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SIS</b>KER</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-center image-center">
          <img src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Home</span>
            
          </a>
        </li>
        <li>
          <a href="{{ route('login') }}">
            <i class="fa fa-sign-in"></i> <span>Login</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$datakerja}}</h3>

              <p>Data Kerjasama</p>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              @foreach($aktif as $ak)
              <h3>{{$ak->aktif}}</h3>
                @endforeach
              <p>Kerjasama Aktif</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>

            <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              @foreach($akanberakhir as $ab)

              <h3>{{$ab->akanberakhir}}</h3>
              
              @endforeach
              <p>Kerjasama Akan Berakhir</p>
            </div>
            <div class="icon">
             <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              @foreach($berakhir as $br)

              <h3>{{$br->berakhir}}</h3>
           
              @endforeach
              <p>Kerjasama Berakhir</p>
            </div>
            <div class="icon">
             <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
    

    
   

        <!-- ./col -->
      </div>

<div class="box">
  <div class="box-header">
         <div class="pull-left">
        <h4>Daftar Kerjasama Unimus</h4>
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
<li><a data-toggle="modal" data-target="#modal-{{$dt->id}}"  href="#">Details</a></li>
</ul>
</div>

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
       
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2019 <a href="#">Sisker</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<script src="{{ asset('backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('backend/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('backend/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('backend/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('backend/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('backend/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('backend/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/dist/js/demo.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<script src="{{ asset('js/bootstrap-notify.js') }}"></script>

<!-- datepicker -->
<script src="{{asset('backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
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
</body>
</html>
