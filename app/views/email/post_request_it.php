<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
Ciao <?php echo $company_name; ?>,<br><br>
E 'stato pubblicato una nuova richiesta per la tua professione <?php echo $company_name; ?>.<br>
I dettagli della richiesta sono:<br> 
Titolo:  <?php echo $title; ?> <br>
Descrizione: <?php echo $description; ?><br>
Prezzo massimo per questa richiesta: <?php echo $budget; ?><br>
L'ordine è valido fino al giorno: <?php echo $expiry_date; ?><br>
Nome: <?php echo $request_creator_name; ?><br>
Rispondi a nome utente: <a href="<?php echo $base_url; ?>/request/reply/<?php echo $insert_id; ?>" title="Rispondi a utente">rispondere</a><br><br>

Saluti,<br>
Squadra DoveCercare<br><br>
Questo messaggio è stato inviato da Dove Cercare e può contenere informazioni riservate. Non dovrebbe il destinatario, si prega di avvisare immediatamente allo stesso modo ed eliminare il messaggio ed eventuali allegati, senza trattenerne copia. Qualsiasi utilizzo non autorizzato del contenuto di questo messaggio costituisce violazione dell'obbligo di non prendere cognizione della corrispondenza tra altri soggetti, fatta eccezione per il reato più grave, ed espone il responsabile alle relative conseguenze legali.
</body>
</html>