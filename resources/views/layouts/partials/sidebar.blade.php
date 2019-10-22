<section class="sidebar" id="nav">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li>
           @if (Auth::user()->roles->name == 'admin')
        <a href="{{ url('admin') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
          @else
           <a href="{{ url('user') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
          @endif
        </li>
        @if (Auth::user()->roles->name == 'user')
             <li><a href="{{ url('user/profile') }}"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="{{ url('user/ganti_password') }}"><i class="fa fa-circle-o"></i> Ganti Password</a></li>
        @endif
        @if (Auth::user()->roles->name == 'admin')
            <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('admin/user') }}"><i class="fa fa-circle-o"></i> Data User</a></li>
            <li><a href="{{ url('admin/mitra') }}"><i class="fa fa-circle-o"></i> Data Mitra</a></li>
          </ul>
        </li>
        @endif
        
         @if (Auth::user()->roles->name == 'admin')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Master Kerjasama</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           
                <li><a href="{{ url ('admin/kerjasama') }}"><i class="fa fa-circle-o"></i> Data Kerjasama</a></li>
                <li><a href="{{ url ('admin/realisasi-kerjasama') }}"><i class="fa fa-circle-o"></i> Realisasi Kerjasama</a></li>
            <li><a href="{{ url('admin/rencana-kerjasama') }}"><i class="fa fa-circle-o"></i> Rencana Kerjasama</a></li>
          </ul>
        </li>
        @else
        <li><a href="{{ url('user/rencana-kerjasama') }}"><i class="fa fa-circle-o"></i> Rencana Kerjasama</a></li>
          @endif
           @if (Auth::user()->roles->name == 'admin')
        <li><a href="{{ url('admin/download') }}"><i class="fa fa-circle-o"></i> Download</a></li>
  @endif
      </ul>
    </section>