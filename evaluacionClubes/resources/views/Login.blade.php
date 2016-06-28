<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AMCH| Login</title>

    <link href="/assets/_admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/_admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/assets/_admin/css/animate.css" rel="stylesheet">
    <link href="/assets/_admin/css/style.css" rel="stylesheet">


    <style>
            .align-center{
                text-align: center;
            }
            .msg p{
                padding: 15px;
            }
            .my_hidden{
                display: none;
            }
            .chosen-container{
                margin-left: 1px;
            }
            h1{
                text-align: center;
                margin-bottom: 70px;
            }
            img{
                display: block;
                margin: 20px auto 10px;
                width: 300px;
            }
        </style>

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-12">
                <h1 class="font-bold">Conquistadores AMCH</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">

                <img src="/assets/parcheamch.png" width="350">

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form">
                        <div class="form-group">
                            <select class="chosen-select form-control" required>
                                <option value="0">Seleccionar ...</option>
                                @foreach($clubesList as $club)
                                    <option value="{{ $club->id }}">{{ $club->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Escriba su Contraseña" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Entrar</button>

                        @if(Session::has('msg'))
                        <div class="msg align-center">
                            <p class="bg-{{ Session::get('msg') }}">
                                {{ Session::get('message') }}
                            </p>
                        </div>
                        @endif

                        <div class="msg my_hidden">
                            <p class="bg-warning">
                                El sistema aún no está disponible
                            </p>
                        </div>

                        <!--<a href="#">
                            <small>Forgot password?</small>
                        </a>-->

                        <p class="text-muted text-center">
                            <small>¿Tu club no aparece en el listado?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="/register">Activa tu Club</a>
                    </form>
                    <!--<p class="m-t">
                        <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
                    </p>-->
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-12">
                <p class="align-center">
                    <!--El horario de acceso es desde las 11:00 hasta las 23:59 del día Sábado 16 de Mayo-->
                </p>
            </div>
            <div class="align-center">
                Regional de Conquistadores AMCH <small>© 2016</small>
            </div>

            </div>
        </div>
    </div>
</body>

</html>
