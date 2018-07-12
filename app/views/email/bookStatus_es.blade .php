<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <div>
            <h4>Hola {{$user_name}}</h4>
        </div>
        <div>
            <p>Su reserva ha sido {{$status}} desde {{$store_name}}</p>            
            <p>Fecha de la reserva : {{ $book_date }}</p>
            <p>Duración : {{ $duration }}</p>                    
        </div>
        <hr/>
        <div>
            <b>Saludos,<br>
            <b>El equipo de {{ SITE_NAME }} <br><br>
            Este mensaje fue enviado por {{ SITE_NAME }} y puede contener información confidencial. En caso de que no es el destinatario, por favor notifique inmediatamente a la misma direccion y borre el mensaje y sus adjuntos, sin retener una copia. Cualquier uso no autorizado del contenido de este mensaje es una violación de la obligación de no tomar conocimiento de la correspondencia entre otras partes, excepto para el delito más grave, y expone el gerente de las consecuencias legales pertinentes.        
        </div>
    </body>
</html>