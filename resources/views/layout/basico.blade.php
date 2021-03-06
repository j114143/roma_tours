<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('titulo') | Pequeña Roma Tours Slta</title>

    <!-- Bootstrap Core CSS -->
    {!!Html::style('assets/css/bootstrap.min.css')!!}
    {!!Html::style('assets/css/font-awesome.min.css')!!}
    {!!Html::style('assets/css/creative.css')!!}

    {!!Html::script('assets/js/jquery.js')!!}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
    function checkSubmit() {
        document.getElementById("btsubmit").value = "Enviando...";
        document.getElementById("btsubmit").disabled = true;
        return true;
    }
    </script>

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="{{url()}}">Pequeña roma tours</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="page-scroll" href="{{ url() }}">Inicio</a></li>
                    <li><a class="page-scroll" href="{{ url() }}#nosotros">Acerca de nosotros</a></li>
                    <li><a class="page-scroll" href="{{ url() }}">Servicios</a></li>
                    <li><a class="page-scroll" href="{{ url() }}#contact">Contactenos</a></li>
                    <li><a class="page-scroll" href="{{route('login')}}">Iniciar sesión</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    @yield('feacture')
    <section id="contenido">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">@yield('titulo')</h2>
                    <hr class="primary">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div  class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    @if(Session::has('mensaje'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('mensaje') }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            @yield('contenido')
        </div>
    </section>
            @yield('footer')
            <p class="text-center text-muted">Pequeña Roma Tours S.R.Lta</p>

    <!-- jQuery -->
    {!!Html::script('assets/js/jquery.js')!!}
    {!!Html::script('assets/js/bootstrap.min.js')!!}
    {!!Html::script('assets/js/jquery.validate.min.js')!!}
</body>

</html>
