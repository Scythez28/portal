<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Timesheet Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
    <link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="{{ asset("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/bower_components/AdminLTE/plugins/datepicker/datepicker3.css")}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
      page. However, you can choose any other skin. Make sure you
      apply the skin class to the body tag so the changes take effect.
      -->
    <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/_all-skins.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app-template.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset ("/bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  @include('layouts.header')
  <!-- Sidebar -->
  @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
          <small>Quick View</small>
      </h1>
      <ol class="breadcrumb">
        <li class="active"><a href="{{url('/')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Your Page Content Here -->
        <div class="row">

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <?php $users = DB::table('users'); ?>
                        <h3>{{ $users->count() }}</h3><p>Registered Users</p>
                    </div>
                    <div class="icon"><i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ url('user-management/user') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>


            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <?php $employees = DB::table('employees'); ?>
                        <h3>{{ $employees->count() }}</h3><p>Employees</p>
                    </div>
                    <div class="icon"><i class="ion ion-ios-people"></i>
                    </div>
                    <a href="{{ url('employee-management') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <?php $clients = DB::table('client'); ?>
                        <h3>{{ $clients->count() }}</h3><p>Clients</p>
                    </div>
                    <div class="icon"><i class="ion ion-android-contacts"></i></div>
                    <a href="{{ url('system-management/client') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>


            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <?php $roles = DB::table('role'); ?>
                        <h3>{{ $roles->count() }}</h3><p>Roles & Permission</p>
                    </div>
                    <div class="icon"><i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ url('user-management/role') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        
        <div class="row">

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <?php $projects = DB::table('projects'); ?>
                        <h3>{{ $projects->count() }}</h3><p>Listed Projects</p>
                    </div>
                    <div class="icon"><i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ url('project') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>


            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <?php $codes = DB::table('codes'); ?>
                        <h3>{{ $codes->count() }}</h3><p>Project Codes</p>
                    </div>
                    <div class="icon"><ion-icon name="code"></ion-icon><></i>
                    </div>
                    <a href="{{ url('code') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="{{ url('category') }}"><span class="info-box-icon bg-teal-gradient"><i class="fa fa-files-o"></i></span></a>
                    <div class="info-box-content">
                        <?php $categories = DB::table('category'); ?>
                        <span class="info-box-text">Categories</span>
                        <span class="info-box-number">{{ $categories->count() }}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
        </div>
        
        
        
        
        

        <div class="row">

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="{{ url('system-management/department') }}"><span class="info-box-icon bg-teal-gradient"><i class="fa fa-flag-o"></i></span></a>
                    <div class="info-box-content">
                        <?php $departments = DB::table('department'); ?>
                        <span class="info-box-text">Departments</span>
                        <span class="info-box-number">{{ $departments->count() }}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="{{ url('system-management/division') }}"><span class="info-box-icon bg-maroon-gradient"><i class="fa fa-building-o"></i></span></a>
                    <div class="info-box-content">
                        <?php $org = DB::table('division'); ?>
                        <span class="info-box-text">Organizations</span>
                        <span class="info-box-number">{{ $org->count() }}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <a href="{{ url('system-management/country') }}"><span class="info-box-icon bg-purple-gradient"><i class="fa fa-map-o"></i></span></a>
                    <div class="info-box-content">
                        <?php $country = DB::table('country'); ?>
                        <span class="info-box-text">Countries</span>
                        <span class="info-box-number">{{ $country->count() }}</span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div>

        </div>


     

        </div>

    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->

  <!-- Footer -->
  @include('layouts.footer')
  
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

 <!-- jQuery 2.1.3 -->
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/fastclick/fastclick.js") }}" type="text/javascript" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js") }}" type="text/javascript" ></script>
    <script  src="{{ asset ("/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js") }}" type="text/javascript" ></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") }}"></script>
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/pages/dashboard.js") }}"></script>
    <script src="{{ asset ("/bower_components/AdminLTE/dist/js/demo.js") }}" type="text/javascript"></script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
    <script>
        $(document).ready(function() {
            //Date picker
            $('#birthDate').datepicker({
                autoclose: true,
                format: 'yyyy/mm/dd'
            });
            $('#hiredDate').datepicker({
                autoclose: true,
                format: 'yyyy/mm/dd'
            });
            $('#from').datepicker({
                autoclose: true,
                format: 'yyyy/mm/dd'
            });
            $('#to').datepicker({
                autoclose: true,
                format: 'yyyy/mm/dd'
            });
        });
    </script>

    <script src="{{ asset('js/site.js') }}"></script>


</body>
</html>
