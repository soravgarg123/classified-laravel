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
            <p>La tua prenotazione è stata confermata con successo su {{ SITE_NAME }}</p>
            <table>
            	<thead>
            		<tr>
            			<th>Nome del Servizio</th>
            			<th>Ufficio</th>
            			<th>Indirizzo</th>
            			@if(!empty($book_date))
            			<th>Data dell'appuntamento</th>
            			@endif
            			@if(!empty($duration))
            			<th>Durata del Servizio</th>
            			@endif
            			@if(!empty($delivery_days))
            			<th>Giorni per la consegna</th>
            			@endif
            			<th>Totale</th>
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
            <p>Message : {{$msg}}</p>
        </div>
        <hr/>
        <div>
            <b>ATTENZIONE<br>
               Nel caso in cui decidi di disdire o modificare l´appuntamento potrai farlo o contattando direttamente per telefono il Professionista o accedendo alla tua area riservata nella sezione appuntamenti.<br><br> 
            <b>Saluti,<br>
            <b>Il Team di {{ SITE_NAME }} <br><br>
            Questo messaggio è stato inviato da {{ SITE_NAME }} e può contenere informazioni di carattere riservato e confidenziale. Qualora non fosse il destinatario, la preghiamo di informarci immediatamente con lo stesso mezzo ed eliminare il messaggio, con gli eventuali allegati, senza trattenerne copia. Qualsiasi utilizzo non autorizzato del contenuto di questo messaggio costituisce violazione dell'obbligo di non prendere cognizione della corrispondenza tra altri soggetti, salvo più grave illecito, ed espone il responsabile alle relative conseguenze civili e penali.
        </div>
    </body>
</html>
