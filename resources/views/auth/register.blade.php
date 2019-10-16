<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sisker | Halaman Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="backend/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="backend/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="backend/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="backend/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>SIS</b>KER</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Daftar Akun Baru</p>
     @if(session()->has('message'))
                          <div class="alert alert-success">
                              {{ session()->get('message') }}
                        </div>
                        @endif

    <form method="POST" action="{{ route('register') }}">
                            @csrf
         <div class="form-group has-feedback">
        <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Username" name="username" value="{{ old('username') }}">
        @if ($errors->has('username'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                              </span>
                              @endif
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
       <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" id="password-confirm" name="password_confirmation" >
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
        <hr>
      <div class="form-group has-feedback">
        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nama" name="name" value="{{ old('name') }}">
         @if ($errors->has('name'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                              </span>
                              @endif
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Alamat Email" name="email" value="{{ old('email') }}">
         @if ($errors->has('email'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                              </span>
                              @endif
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
  <div class="form-group has-feedback">
        <input type="text" class="form-control{{ $errors->has('telepon') ? ' is-invalid' : '' }}" placeholder="Nomor HP" name="telepon" value="{{ old('telepon') }}">
         @if ($errors->has('telepon'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('telepon') }}</strong>
                              </span>
                              @endif
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
      <hr>
        <div class="form-group has-feedback">
        <input type="text" class="form-control{{ $errors->has('institusi') ? ' is-invalid' : '' }}" placeholder="Nama Perusahaan" name="institusi" value="{{ old('institusi') }}">
         @if ($errors->has('institusi'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('institusi') }}</strong>
                              </span>
                              @endif
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control{{ $errors->has('email_institusi') ? ' is-invalid' : '' }}" placeholder="Email Perusahaan" name="email_institusi" value="{{ old('email_institusi') }}">
         @if ($errors->has('email_institusi'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email_institusi') }}</strong>
                              </span>
                              @endif
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control{{ $errors->has('telp_institusi') ? ' is-invalid' : '' }}" placeholder="Telepon Perusahaan" name="telp_institusi" value="{{ old('telp_institusi') }}">
        @if ($errors->has('telp_institusi'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('telp_institusi') }}</strong>
                              </span>
                              @endif
        <span class="fa fa-phone form-control-feedback"></span>
      </div>

     
      <div class="form-group has-feedback">
        <input type="text" class="form-control{{ $errors->has('provinsi') ? ' is-invalid' : '' }}" placeholder="Provinsi" name="provinsi" value="{{ old('provinsi') }}">
           @if ($errors->has('provinsi'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('provinsi') }}</strong>
                              </span>
                              @endif
        <span class="fa fa-map-marker form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control{{ $errors->has('kota') ? ' is-invalid' : '' }}" placeholder="Kota" name="kota" value="{{ old('kota') }}">
        @if ($errors->has('kota'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('kota') }}</strong>
                              </span>
                              @endif
        <span class="fa fa-map-marker form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="alamat" class="form-control" {{ $errors->has('alamat') ? ' is-invalid' : '' }} placeholder="Alamat" value="{{ old('alamat') }}">
        @if ($errors->has('alamat'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('alamat') }}</strong>
                              </span>
                              @endif
                               <span class="fa fa-map-marker form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
            <input type="hidden" name="active" value="1">
            <input type="hidden" name="role_id" value="2">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
<br>
    <a href="{{ route('login') }}" class="text-center">Kembali Ke Halaman Login</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="backend/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
