<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <div>
            <h2>¡Felicidades</h2>
        </div>
        <div>
            <p>Su reserva ha sido confirmada con éxito en {{ SITE_NAME }}</p>
            <table>
            	<thead>
            		<tr>
            			<th>Nombre del Servicio</th>
            			<th>Oficina</th>
            			<th>Dirección</th>
            			@if(!empty($book_date))
            			<th>Fecha de la reserva</th>
            			@endif
            			@if(!empty($duration))
            			<th>Duración del Servicio</th>
            			@endif
            			@if(!empty($delivery_days))
            			<th>Días para la entrega</th>
            			@endif
            			<th>Total</th>
            		</tr>
            	</thead>
            	<tbody>
            		<tr>
            			<td>{{$store_name}}</td>
            			<td>{{$location}}</td>
            			<td>{{$addr}}</td>
            			@if(!empty($book_date))
            			<td>{{$book_date}}</td>
            			@endif
            			@if(!empty($duration))
            			<td>{{$duration}}</td>
            			@endif
            			@if(!empty($delivery_days))
            			<td>$delivery_days</td>
            			@endif
            			<td>$price</td>
            		</tr>
            	</tbody>
            </table>
           <br />
            <p>Mensaje : {{$msg}}</p>
        </div>
        <hr/>
        <div>
            <b>CUIDADO<br>
               Le recordamos que si usted necesita cancelar la cita puede hacerlo llamando al Profesional o desde su panel de configuracion en la seccion de las citas.<br><br> 
            <b>Saludos,<br>
            <b>El equipo de {{ SITE_NAME }} <br><br>
            Este mensaje fue enviado por {{ SITE_NAME }} y puede contener información confidencial. En caso de que no es el destinatario, por favor notifique inmediatamente a la misma direccion y borre el mensaje y sus adjuntos, sin retener una copia. Cualquier uso no autorizado del contenido de este mensaje es una violación de la obligación de no tomar conocimiento de la correspondencia entre otras partes, excepto para el delito más grave, y expone el gerente de las consecuencias legales pertinentes.        
        </div>
    </body>
</html>
