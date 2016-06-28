<html>
    <head>

        <style>
            hr{
                border: 1px solid #333333;
            }
            body{
                color: #999;
            }
            h1{
                color: #444;
            }
        </style>
    </head>
    <body style="font-family: 'Verdana'">
        <div style="width: 600px; margin:0 auto; text-align: justify;">

            <div id="header">
                <img src="https://raw.githubusercontent.com/DesarrollosAMCH/EvaluacionClubes/master/evaluacionClubes/public/assets/app/images/mailing/header.jpg" />
            </div>
            <h1>Activa tu Cuenta</h1>

            <p>Estimado Director:</p>

            <p>
                Hemos recibido una solicitud de activación de cuenta en sistema de evaluación
                de la Convención 2015, con la información que se detalla a continuación.
            </p>


            <p>
                <b>Club:</b> {{ $club }}<br/>
                <b>Usuario:</b> {{ $username }}<br/>
                <b>Clave:</b> {{ $password }}<br/>
            </p>

            Por motivos de seguridad, solo tu puedes completar la activación ingresando al siguiente link: <br/>

            <a href="{{ $domain }}/activate/{{ $token }}/{{ $id_club }}/{{ $email }}">Enlace de Activación</a>

            <br/>

            <br/>
            <br/>
            <hr/>
            <br/>

            <small>
                NOTA: Si por algún motivo te ha llegado este mensaje por equivocación, favor reenvíalo a regional@conquis.cl
            </small>
        </div>
    </body>
</html>