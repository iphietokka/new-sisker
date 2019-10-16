@extends('layouts.app')
@section('pageTitle', 'Ganti Password')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Ganti Password</h3>
                </div>
                <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                     
                  <form method="POST" action="{{url('user/ganti_password/ubah')}}" enctype="multipart/form-data">
                    {{ csrf_field() }} 
                    <div class="box-body">
                        <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                          
                               <label for="new-password" class="col-md-4 control-label">Current Password</label>
                            <div class="col-sm-9">
                               <input id="current-password" type="password" class="form-control" name="current-password" required placeholder="Password Lama">

                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                        <label for="new-password" class="col-md-4 control-label">New Password</label>

                            <div class="col-sm-9">
                              <input id="new-password" type="password" class="form-control" name="new-password" required placeholder="Password Baru">

                                    @if ($errors->has('new-password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>
                          <div class="form-group">
                                <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>
                            <div class="col-sm-9">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required placeholder="Ulangi Password">
                            </div>
                        </div>
                    
                       
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-info pull-right">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

