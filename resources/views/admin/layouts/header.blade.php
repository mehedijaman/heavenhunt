<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@isset($title){{ $title }} | @endisset {{ config('app.name') }}
  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">

  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/Ionicons/css/ionicons.min.css') }}"> 

  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">

  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('/adminlte/plugins/iCheck/all.css') }}">

  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">

  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{ asset('/adminlte/plugins/timepicker/bootstrap-timepicker.min.css') }}">

  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">

  <!-- Sweet Alert2 -->
  <link rel="stylesheet" href="{{ asset('/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">  
  <!-- <link rel="stylesheet" href="{{ asset('/vendor/DataTables/Buttons-1.6.1/css/buttons.dataTables.min.css') }}">   -->
  <link rel="stylesheet" href="{{ asset('/vendor/DataTables/Buttons-1.6.1/css/buttons.bootstrap.min.css') }}">  
  <link rel="stylesheet" href="{{ asset('/vendor/DataTables/Responsive-2.2.3/css/responsive.bootstrap.min.css') }}">  
  <link rel="stylesheet" href="{{ asset('/vendor/DataTables/ColReorder-1.5.2/css/colReorder.dataTables.min.css') }}">  

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/adminlte/dist/css/AdminLTE.min.css') }}">

  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="{{ asset('/adminlte/dist/css/skins/_all-skins.min.css') }}">

  <!-- Morris chart -->
  <!-- <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/morris.js/morris.css') }}"> -->
  <!-- jvectormap -->
  <!-- <link rel="stylesheet" href="{{ asset('/adminlte/bower_components/jvectormap/jquery-jvectormap.css')}}"> -->
  
  <!-- bootstrap wysihtml5 - text editor -->
  <!-- <link rel="stylesheet" href="{{ asset('/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}"> -->

  <!-- jQuery 3 -->
  <script src="{{ asset('/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="/admin" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>{{ config('app.name') }}</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>{{ config('app.name') }}</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{URL::asset('/adminlte/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="{{ URL::asset('/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                  <p>
                    {{ Auth::user()->name }}
                  </p>
                </li>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">                  
                  <div class="pull-right">
                    <a class="dropdown-item btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>