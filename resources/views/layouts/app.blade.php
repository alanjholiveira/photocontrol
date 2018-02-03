<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--<title>{{ config('app.name', 'Laravel') }}</title>--}}
    <title>Photo Controll | </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Ionicons -->
    <link href="{{ asset('assets/vendor/Ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
    <!-- Theme style -->
    <link href="{{ asset('assets/css/AdminLTE.min.css') }}" rel="stylesheet">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('assets/css/skins/skin-purple.min.css') }}" rel="stylesheet"/>

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-sweetalert/dist/sweetalert.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/r-2.2.1/datatables.min.css"/>

@yield('styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
{{--<body class="hold-transition skin-purple sidebar-mini">--}}
<body class="hold-transition skin-purple layout-top-nav">
<div class="wrapper">

    <!-- Main Header -->
    @if(Auth::User()->isAdmin())
        @include('panel._header')
    @else
        @include('client._header')
    @endif

    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="row">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    #@yield('title')
                    <small>@yield('description')</small>
                </h1>
                <ol class="breadcrumb">
                    {{--@if(Auth::User()->hasAccess('student', false))--}}
                    <li><a href="{{ route('client.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    {{--@else--}}
                    {{--<li><a href="{{ route('painel.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>)--}}
                    {{--@endif--}}
                    @if($__env->yieldContent('title') == 'Dashboard')
                    @else
                        <li>@yield('title')</li>
                    @endif
                    {{--<li>@yield('title')</li>--}}
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div id="alert-elementID"></div>
                {{--<div class="row">--}}
                    @yield('content')
                {{--</div>--}}

            </section>
            <!-- /.content -->


        </div>
        </div>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="container">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2017</strong> All rights
            reserved.
        </div>
        <!-- /.container -->
    </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('assets/vendor/input-mask/jquery.inputmask.js')}}"></script>

<!-- iCheck 1.0.1 -->
<script src="{{asset('assets/vendor/iCheck/icheck.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('assets/vendor/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/js/demo.js')}}"></script>
<!-- CK Editor -->
<script src="{{asset('assets/vendor/ckeditor/ckeditor.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('assets/vendor/select2/dist/js/select2.full.min.js')}}"></script>

<!-- CDN JS Libs -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
<script src="{{asset('assets/vendor/bootstrap-sweetalert/dist/sweetalert.min.js')}}"></script>


<script src="{{asset('assets/js/proajax.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>

@yield('scripts')

</body>
</html>
