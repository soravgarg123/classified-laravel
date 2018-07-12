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
                <h3 style="color:#ccc; float:left;width: 100%;">Hola, </br></br> Gracias por registrarse en  <b>{{ SITE_NAME }}</b></h3><br/>
               <p style="padding:15px 0; font-size:14px;">
                   Tu cuenta ha sido creada y debe ser activada antes de poder usarla.<br> 
                    Para activar su cuenta, haga clic <a href="{{ $active_link }}">aqui</a><br>
                    Después de la activación usted puede entrar en {{ SITE_NAME }} utilizando el nombre de usuario y la contraseña que ha introducido durante el registro.<br>  
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
                <h3 style="color:#666">Saludos,</h3>
                <h3 style="color:#666">los DoveCercare Equipo</h3>
             </td>  
       </tr>
        <tr>     
             <td colspan="2" style="padding:15px 20px">  
                <p style="padding:15px 0; font-size:14px;">
                    Este mensaje fue enviado por Dove Cercare y puede contener information.Should confidencial no es el destinatario, por favor notifique inmediatamente por el mismo camino y borrar el mensaje y cualquier archivo adjunto, sin retener la copy.Any uso no autorizado del contenido de este mensaje es una violación de la obligación no es un tomar conocimiento de la correspondencia entre las partes ither, excepto por el delito más grave, y la exposses maneger de la consecuencia jurídica revelent.
                </p>
             </td>
        </tr>
        
    </tbody>
    <tfoot style="background-color:#eeeeee">
        <tr>
            <td colspan="2" style="padding:15px 0; float:left; padding-left:20px;">  
                <p style="padding:15px 0; font-size:12px;">
                    @ <?php echo date('Y'); ?> DoveCercare. Todo Reseverd derecho. 
                </p>
                    <p style="padding:15px 0; font-size:12px; padding-top:0px;">
                    <a target="_blank" href="http://<?php echo env('SERVER_NAME'); ?>/privacy-policy" style="color:#666; text-decoration:underline;">Política de privacidad</a> |     
                    <a target="_blank" href="http://<?php echo env('SERVER_NAME'); ?>/terms-and-condition" style="color:#666; text-decoration:underline;">Términos y Condiciones</a>
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
                    <a target="_blank" href="http://<?php echo env('SERVER_NAME'); ?>/contactus" style="color:#666; text-decoration:underline;">Soporte de contacto</a>
                </p>
            </td>
        </tr>
    </tfoot>
</table>
</body>
</html>
