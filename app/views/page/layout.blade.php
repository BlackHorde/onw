<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@section ('title') Onwebed @show</title>

        <!-- Bootstrap -->
        <link href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style type='text/css'>
            html {
                background: url('/onwebed/images/backend-background2.jpg') no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
            body {
                margin: 10px 5% 10px 5%;
                padding: 10px;
                border-radius: 2px;
            }
            .bdhlab-container {
                padding: 0px;
            }
            .row {
                margin: 0px;
            }
            .header {
                border-bottom: 1px solid #CCCCCC;
                padding: 20px;
            }
            .header-site-name {
                font-weight: bold;
                font-size: 20px;
            }
            .body {
                padding: 20px;
                color: #666;
            }
            .footer {
                text-align: center;
                color: gray;
                opacity: 0.8;
            }
        </style>
    </head>
    <body>
        <div class='container-fluid'>
        @yield('content')
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
    </body>
</html>