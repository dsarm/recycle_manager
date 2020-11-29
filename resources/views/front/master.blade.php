<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>recycle</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Style CSS -->
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{ URL::asset('dist/css/timeline.css') }}" rel="stylesheet">

        <!-- Bootstrap Select CSS -->
        <link href="{{ URL::asset('bower_components/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">

        <!-- PACE CSS -->
        <link href="{{ URL::asset('bower_components/PACE/themes/blue/pace-theme-minimal.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ URL::asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <!-- jQuery -->
        <script src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js') }}"></script>

        <!-- Bootstrap Select JavaScript -->
        <script src="{{ URL::asset('bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <div id="wrapper">

            @yield('content')

            @yield('scripts')

            @yield('styles')

        </div>
        <!-- /#wrapper -->

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

        <!-- Bootbox Plugin JavaScript -->
        <script src="{{ URL::asset('bower_components/bootbox.js/bootbox.js') }}"></script>

        <!-- PACE Plugin JavaScript -->
        <script src="{{ URL::asset('bower_components/PACE/pace.min.js') }}"></script>

    </body>

</html>
