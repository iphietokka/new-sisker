@extends('layouts.home')
@section('content')
  <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
     
      <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Menu Download</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              <ul class="todo-list">
              @foreach ($data as $dt)
                  <li>
                  <span class="handle">{{$loop->iteration}}</span>
                  <span class="text"> <a href="{{ url('panduan/download/'.$dt->id) }}">{{$dt->name}}</a> </span>
                </li> 
              @endforeach
               
            </div>
          </div>
         
</section>
          <!-- /.box -->
@endsection
        