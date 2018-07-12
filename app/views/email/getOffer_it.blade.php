<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <div>
            <h2>Congratulazioni!</h2>
        </div>
        <div>
            <p>Hai ricevuto un offerta da {{ SITE_NAME }}</p>
            <p>Nome dell'Offerta : {{ $offer_name }}</p>
            <p>Descrizione : {{ $offer_description }}</p>
            <p>Codice : {{ $offer_code }}</p>
            <p>Nome del Professionista : <a href="{{ $company_link }}" target="_blank">{{ $company_name }} </a></p>        
        </div>
        <hr/>
        <div>
            <b>Saluti,<br>
            <b>Il Team di {{ SITE_NAME }} <br><br>
            Questo messaggio è stato inviato da {{ SITE_NAME }} e può contenere informazioni di carattere riservato e confidenziale. Qualora non fosse il destinatario, la preghiamo di informarci immediatamente con lo stesso mezzo ed eliminare il messaggio, con gli eventuali allegati, senza trattenerne copia. Qualsiasi utilizzo non autorizzato del contenuto di questo messaggio costituisce violazione dell'obbligo di non prendere cognizione della corrispondenza tra altri soggetti, salvo più grave illecito, ed espone il responsabile alle relative conseguenze civili e penali.
        </div>
    </body>
</html>
