<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title') | Romas Tours</title>

    {!!Html::style('assets/css/bootstrap.min.css')!!}
    {!!Html::style('assets/css/font-awesome.min.css')!!}
    {!!Html::style('assets/css/simple-sidebar.css')!!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Roma Tours
                    </a>
                </li>
                <li>
                    <a href="{{ url ('servicios') }}">Servicios</a>
                </li>
                <li>
                    <a href="#">Buses</a>
                </li>
                <li>
                    <a href="#">Empresas</a>
                </li>
                <li>
                    <a href="#">Usuarios</a>
                </li>
                <li>
                    <a href="#">Conductores</a>
                </li>
                <li>
                    <a href="#">Reservas</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>@yield('titulo')</h1>
                        <hr>
                        @if($errors->any())
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif
                        @if(Session::has('mensaje'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('mensaje') }}</p>
                        @endif
                        @yield('contenido')
                        <hr>
                        <p><a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    {!!Html::script('assets/js/jquery.js')!!}
    {!!Html::script('assets/js/bootstrap.min.js')!!}

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>