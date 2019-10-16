@extends('layouts.app')
@section('pageTitle', 'User')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <a class="btn btn-info" href="{{ route('user-create') }}">Tambah User</a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Last Login</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$user->name}}</td>
                                <td class="text-center">{{$user->username}}</td>
                                <td class="text-center">{{$user->roles->name}}</td>
                                <td class="text-center">
                                    {!! $user->active?"<i style= 'color:green' class= 'fa fa-check'></i>" : "<i style='color:red' class='fa fa-close'></i>"!!}
                                </td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($user->last_login)->format("D, M j, Y g:i:s A") }}</td>
                                <td class="text-center">
                                <a href="{{ route('user-edit', $user->id) }}" class="btn btn-info btn-xs"> <i class="fa fa-edit"></i> Edit</a>
					                       <a href="" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal{{$user->id}}"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                             <div class="modal fade" tabindex="-1" role="dialog" id="delete_modal{{$user->id}}">
                            <div class="modal-dialog modal-sm" role="document">
                              <div class="modal-content">
                                <div class="modal-body text-center">
                                  <div class="row">
                                  
                                 <h4 class="modal-heading">Are You Sure?</h4>
                                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                                          </div>
                                        </div>
                                <div class="modal-footer">
                                   <form class="form-horizontal" method="POST" action="{{ route('user-delete', $user->id) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                     <button type="reset" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                                </form>
                              </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->

            
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