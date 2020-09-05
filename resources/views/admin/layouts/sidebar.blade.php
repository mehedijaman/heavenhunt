<!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{ URL::asset('/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree" >
          <li class="header">MAIN NAVIGATION</li>
          <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li><a href="/admin/property"><i class="fa fa-flag"></i> Properties</a></li>
          <!-- <li><a href="/admin/testimonial"><i class="fa fa-flag"></i> Tetimonials</a></li> -->
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>