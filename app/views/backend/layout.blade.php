<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@section ('title') Onwebed Administration Panel @show</title>

        <!-- Bootstrap -->
        <link href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('todc-bootstrap/css/todc-bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/backend/layout.css') }}" rel="stylesheet">
        @yield('stylesheets')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class='container-fluid'>
            <p>
                <ul class='nav nav-pills'>
                    @section('main-menu')
                    <li class="@yield('menu-dashboard')"><a href='{{ URL::to('backend') }}'><span class='glyphicon glyphicon-calendar'></span> Dashboard</a></li>
                    <li class="@yield('menu-manage')"><a href='{{ URL::to('backend/manage') }}'><span class='glyphicon glyphicon-tasks'></span> Manage</a></li>
                    @show
                </ul>
            </p>
            <hr/>
            @if (Session::get('alert'))
            <?php $alert = Session::get('alert') ?>
            <div class='alert alert-{{ $alert['type'] }}'>{{ $alert['content'] }}</div>
            @endif
            @yield('content')
            <div class='footer'>
                Copyright &copy; BDHLab 2014. All rights reserved.
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('todc-bootstrap/js/bootstrap.min.js') }}"></script>
    </body>
</html>