<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DoveCercare</title>
<style>
    *{ -webkit-box-sizing:border-box; box-sizing:border-box;}
    body{ font-family:'Open Sans', sans-serif; color:#fff;}
    div, h1,h3,body,h2,p,table{ margin:0; padding:0;}
    ul,ol{ list-style:none; margin:0; padding:0}
    a{ text-decoration:none; display:inline-block; vertical-align:middle;}
</style>
</head>
<body>
<table width="100%" style="margin:0 auto; background-color:#fff; color:#666; padding:0; max-width:750px" cellspacing="0" cellpadding="0" border="0">
    <thead style="background-color:#eeeeee">
         <tr>
            <th colspan="2">
                <div style=" padding-top:40px"></div>
            </th>
        </tr>
        <tr>
            <th style="text-align:left; padding-left:20px">
                <img src="img/logo.png" alt="img" style="width:50%;">
            </th>
        </tr>
         <tr>
            <th colspan="2">
                <div style=" padding-top:40px"></div>
            </th>
        </tr>
        <tr>
            <th colspan="2">
                <div style="border-bottom:2px solid #ddd"></div>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2" style="padding:15px 20px;">
                <h3 style="color:#ccc; float:left;width: 100%;">Ciao, </br></br> Grazie per esserti registrato su  <b>{{ SITE_NAME }}</b></h3><br/>
               <p style="padding:15px 0; font-size:14px;">
                Il tuo account è stato creato e deve essere attivato prima di poter accedere.<br> 
                Per attivare il tuo account, clicca <a href="{{ $active_link }}">qui</a><br>
                Dopo l'attivazione puoi entrare su {{ SITE_NAME }} utilizzando il nome utente e la  password che hai scelto durante la registrazione.<br>  
               </p>
            </td>  
       </tr>
        <tr>
            <th colspan="2">
                <div style=" padding-top:40px"></div>
            </th>
        </tr>
        <tr>
            <th colspan="2">
                <div style=" padding-top:40px"></div>
            </th>
        </tr>
         <tr>
            <td colspan="2" style="padding:15px 20px">
                <h3 style="color:#666">Saluti,</h3>
                <h3 style="color:#666">Il DoveCercare Squadra</h3>
             </td>  
       </tr>
        <tr>     
             <td colspan="2" style="padding:15px 20px">  
                <p style="padding:15px 0; font-size:14px;">
                    Questo messaggio è stato inviato da Dove Cercare e può contenere information.Should riservate non il destinatario, si prega di avvisare immediatamente allo stesso modo e cancellare il messaggio ed eventuali allegati, senza conservare l'copy.Any utilizzo non autorizzato del contenuto di questo messaggio è una violazione dell'obbligo non un prendere conoscenza della corrispondenza tra le parti ither, tranne che per il reato più grave, e exposses la maneger della conseguenza giuridica revelent.
                </p>
             </td>
        </tr>
        
    </tbody>
    <tfoot style="background-color:#eeeeee">
        <tr>
            <td colspan="2" style="padding:15px 0; float:left; padding-left:20px;">  
                <p style="padding:15px 0; font-size:12px;">
                    @ <?php echo date('Y'); ?> DoveCercare. Tutti Reseverd destro. 
                </p>
                    <p style="padding:15px 0; font-size:12px; padding-top:0px;">
                    <a target="_blank" href="http://<?php echo env('SERVER_NAME'); ?>/privacy-policy" style="color:#666; text-decoration:underline;">politica sulla riservatezza</a> |     
                    <a target="_blank" href="http://<?php echo env('SERVER_NAME'); ?>/terms-and-condition" style="color:#666; text-decoration:underline;">Termini e condizioni</a>
                </p>
                    <h3>
                    
                    </h3>
            </td>
            <td colspan="2" style="padding:15px 0; float:right; padding-right:20px;">  
                <ul style="padding: 12px 0px;">
                    <li style="display:inline-block; width:28px; height:28px; background:#d9d9d9; vertical-align:top;   padding-top: 6px; text-align: center;"><a href="javascript:void(0);" style="display:inline-block;"><img src="http://<?php echo env('SERVER_NAME'); ?>/img/facebook.png" alt="" style="width: 18px; height: 18px;"></a></li>
                 <li style="display:inline-block; width:28px; height:28px; background:#d9d9d9; vertical-align:top;   padding-top: 6px; text-align: center;"> <a href="javascript:void(0);" style="display:inline-block;"><img src="http://<?php echo env('SERVER_NAME'); ?>/img/google-plus.png" alt="" style="    width: 18px; height: 18px;"></a></li>
                  <li style="display:inline-block; width:28px; height:28px; background:#d9d9d9; vertical-align:top;   padding-top: 6px; text-align: center;">  <a href="javascript:void(0);" style="display:inline-block;"><img src="http://<?php echo env('SERVER_NAME'); ?>/img/twitter.png" alt="" style="width: 18px; height: 18px;"></a></li>
                   <li style="display:inline-block; width:28px; height:28px; background:#d9d9d9; vertical-align:top;   padding-top: 6px; text-align: center;"> <a href="javascript:void(0);" style="display:inline-block;"><img src="http://<?php echo env('SERVER_NAME'); ?>/img/instagram.png" alt="" class="img-responsive" style="    width: 18px; height: 18px;"></a></li>
                   </ul>
                
                    <p style="padding:15px 0; font-size:12px; padding-top:0px;">
                    <a target="_blank" href="http://<?php echo env('SERVER_NAME'); ?>/contactus" style="color:#666; text-decoration:underline;">Contatta il supporto</a>
                </p>
            </td>
        </tr>
    </tfoot>
</table>
</body>
</html>
