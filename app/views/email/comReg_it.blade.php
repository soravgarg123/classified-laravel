<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    	<h2>Ciao {{$company_name}}</h2>
        <div>
            Grazie per esserti registrato su  <b>{{ SITE_NAME }}</b>
        </div>
        <div>
            Clicca <a href="{{ $link }}">qui</a> per attivare il tuo account
        </div>
        <hr/>
        <div>
            <b>Saluti,<br>
            <b>Il Team di {{ SITE_NAME }} <br><br>
            Questo messaggio è stato inviato da {{ SITE_NAME }} e può contenere informazioni di carattere riservato e confidenziale. Qualora non fosse il destinatario, la preghiamo di informarci immediatamente con lo stesso mezzo ed eliminare il messaggio, con gli eventuali allegati, senza trattenerne copia. Qualsiasi utilizzo non autorizzato del contenuto di questo messaggio costituisce violazione dell'obbligo di non prendere cognizione della corrispondenza tra altri soggetti, salvo più grave illecito, ed espone il responsabile alle relative conseguenze civili e penali.
        </div>
    </body>
</html>
