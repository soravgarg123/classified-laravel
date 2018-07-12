<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
Hola <?php echo $user_name; ?>,<br><br>
<?php echo $reply_name; ?> ha respondido a su solicitud POST <br>
Los detalles de la solicitud son:<br> 
Título:  <?php echo $title; ?> <br>
Descripción: <?php echo $description; ?><br>
precio máximo para esta solicitud: <?php echo $budget; ?><br>
La orden es válida hasta el día: <?php echo $expiry_date; ?><br>
Mensaje: <?php echo $reply_message; ?><br><br>

Saludos,<br>
Equipo DoveCercare<br><br>
Este mensaje fue enviado por Dove Cercare y puede contener información confidencial. En caso de que no es el destinatario, por favor notifique inmediatamente por el mismo camino y borrar el mensaje y cualquier archivo adjunto, sin retener una copia. Cualquier uso no autorizado del contenido de este mensaje es una violación de la obligación de no tomar conocimiento de la correspondencia entre otras partes, excepto por el delito más grave, y expone el gerente de las consecuencias legales pertinentes.
</body>
</html>