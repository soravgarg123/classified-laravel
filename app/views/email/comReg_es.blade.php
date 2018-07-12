<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    	<h2>Hola {{$company_name}}</h2>
        <div>
            Gracias por registrarse en  <b>{{ SITE_NAME }}</b>
        </div>
        <div>
            Haga clic <a href="{{ $link }}">aqui</a> para activar tu cuenta.
        </div>
        <hr/>
        <div>
            <b>Saludos,<br>
            <b>El equipo de {{ SITE_NAME }} <br><br>
            Este mensaje fue enviado por {{ SITE_NAME }} y puede contener información confidencial. En caso de que no es el destinatario, por favor notifique inmediatamente a la misma direccion y borre el mensaje y sus adjuntos, sin retener una copia. Cualquier uso no autorizado del contenido de este mensaje es una violación de la obligación de no tomar conocimiento de la correspondencia entre otras partes, excepto para el delito más grave, y expone el gerente de las consecuencias legales pertinentes.        
        </div>
    </body>
</html>
