<?php
    /*
    Descripcion:   Este archivo permite preguntar al usuario su correo electronico para enviarle un nuevo
                   password.
    Archivo:    recuperarPassword.php
    */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?=$g_pagina?> == Recuperar Password </title>
     
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="./css/estilo.css" rel="stylesheet" type="text/css" />
	<link href="./css/style.css" rel="stylesheet" type="text/css" />
    <script src="./scripts/jquery171.js" type="text/javascript"></script>
    <script src="./scripts/jquery.validate.js" type="text/javascript"></script>
    <script src="./scripts/jquery.alerts.js" type="text/javascript"></script>
    <link href="./scripts/jquery.alerts.css" rel="stylesheet" type="text/css" />
     
    <script type="text/javascript">
    <!--
        $().ready(function() {
        $("#recPassword").validate({
        rules: {
        /*A continuacion los nombres de los campos y sus reglas a cumplir */
            correo2: {
            required: true,
            email: true,
            equalTo: "#correo"
            },
            correo: {
            required: true,
            email: true
            }
 
 
        }
        });
        $("#correo").focus();
        });
    // -->
    </script>
     
</head>
<body>
<div align="center">
<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="images/logo_sm.png" width="200" height="65" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Vecinos<br />
            <span class="Arial2_red">Uso Exclusivo de la Municipalidad de San Miguel</span></td>
          <td width="15%" align="center" valign="middle" class="fecha">24/08/2013</td>
        </tr>
        <tr>
          <td  colspan="3" align="center" valign="middle" class="borde_button"></td>
        </tr>
        <tr>
          <td colspan="3" align="center" valign="middle"><table id="table1" border="0" height="163" width="834">
            <tbody>
              <tr>
                <td width="343" height="191" align="left" ><table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="115"><img src="images/candado.png" width="85" height="143" /></td>
                    <td width="168" align="left" valign="middle" class="Arial2">Ingrese su correo electr&oacute;nico y conf&iacute;rmelo resingres&aacute;ndolo</td>
                  </tr>
                  </table></td>
                <td width="481" align="center">
 
<form id="recPassword" name="recPassword"  method="POST" action="recuperarPassword.php">
 
<table align="center" border="0" cellspacing="0" cellpadding="0">
 
<tr>
    <td colspan="2" align="center"><span class="Arial4">Recuperar Contrase&ntilde;a </span></td>
</tr>
 
<?php
//Si llega el parametro correo y no viene vacio
if( isset( $_POST['correo'] ) && $_POST['correo'] != '' )
{
    //Conectar la BD
    include("conectar_bd.php"); 
    conectar_bd();
 
    //Recuperar la direccion de email que llega
    $elcorreo   = $_POST['correo'];
     
    //Verificar si existe el correo en la BD
    $sql = "SELECT  id_usuario,tx_username,tx_nombre,tx_apellidoPaterno
            FROM tbl_users
            WHERE tx_correo = '".$elcorreo."'";        
    $rs_sql = mysql_query($sql);
 
    //Si no existe el correo...
    if ( !( $fila   = mysql_fetch_object($rs_sql) )  )
    {
    //Mostrar msg de error al usuario (en esta misma pagina)
?>
    <input type="hidden" id="error" value="1">           
    <script type="text/javascript">
    location.href="recuperarPassword.php?error="+document.getElementById('error').value;
    </script>
<?php
    }
     
    //En caso de que si exista un email como el k llega, leer de la BD los datos del usuario
    $idusr  = $fila->id_usuario;     //Servira para actualizar el pw
    $nombre = $fila->tx_nombre." ".$fila->tx_apellidoPaterno;
    $nick   = $fila->tx_username;
     
    // Generacion de un nuevo Password
    $pasw = "";
    $abecedario = array("A","B","C","D","E","F","G","H","J","K","L","M","N","O","P","Q","R","S","T",
"U","V","W","a","b","c","d","e","f","g","h","j","k","l","m","n","o","p","q","r","s","t","u","v","w");
    $simbolos   = array(",","}","{","-","|","!","#","$","%","&","/","(",")","=","?","¡",
"*","]","[","_",":",";","+");
    for($i=0;$i<3; $i++)
    {
        $md     = rand(1,2);
        $pasw   .=  (($md%2)==0) ? $abecedario[rand(0,43)] : rand(0,9); 
        $md     = rand(1,2);
        $pasw   .=  (($md%2)==0) ? rand(0,9) :  $simbolos[rand(0,23)]; 
        $md     = rand(1,2);
        $pasw   .=  (($md%2)==0) ?   $simbolos[rand(0,23)] : $abecedario[rand(0,43)] ;     
    }      
     
    // Le  Envio  por correo electronico  su nuevo password
     $seEnvio;          //Para determinar si se envio o no el correo
     $destinatario  = $elcorreo;             //A quien se envia
     $nomAdmin      = 'Consulta Vecinos';       //Quien envia
     $mailAdmin     = 'luis.jimenezc@gmail.com';   //Mail de quien envia
     $urlAccessLogin = 'http://190.98.210.42/index.php'; //Url de la pantalla de login
 
     $elmensaje = "";    
     $asunto = "Consulta Vecinos: Nueva clave de Usuario para ".$nick;
 
     $cuerpomsg ='
        <h3>.::Recuperar Password::.</h3>
        <p>A peticion de usted; se le ha asignado un nuevo password, utilice los siguientes datos para acceder al sistema</p>
          <table border="0" >
            <tr>
              <td colspan="2" align="center" ><br> Nuevos datos de acceso para <a href="'.$urlAccessLogin.'">'.$urlAccessLogin.'</a><br></td>
            </tr>
            <tr>
              <td> Nombre </td>
              <td> '.$nombre.' </td>
            </tr>
            <tr>
              <td> Username </td>
              <td> '.$nick.' </td>
            </tr>
            <tr>
              <td> Password </td>
              <td> '.$pasw.' </td>
            </tr>
          </table> ';
           
    date_default_timezone_set('America/Santiago');
           
    //Establecer cabeceras para la funcion mail()
    //version MIME
    $cabeceras = "MIME-Version: 1.0\r\n";
    //Tipo de info
    $cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
    //direccion del remitente
    $cabeceras .= "From: ".$nomAdmin." <".$mailAdmin.">";
    $resEnvio = 0;
    //Si se envio el email
    if(mail($destinatario,$asunto,$cuerpomsg,$cabeceras))
    {
        //Actualizar el pwd en la BD
        $sql_updt = "UPDATE tbl_users SET tx_password = '".md5($pasw)."'
        WHERE (id_usuario = ".$idusr.")
        AND (tx_correo = '".$elcorreo."')";
        $res_updt = mysql_query($sql_updt);
        $resEnvio = 1;
    }
 
    //Cerrrar conexion a la BD
    mysql_close($conexio);
         
    // Mostrar resultado de envio (en esta misma pagina)
    ?>
        <input type="hidden" id="enviado" value="<?php echo $resEnvio ?>">
        <input type="hidden" id="elcorreo" value="<?php echo $elcorreo ?>">
        <script type="text/javascript">
            location.href="recuperarPassword.php?enviado="+document.getElementById('enviado').value+"&elcorreo="+document.getElementById('elcorreo').value;
        </script>
    <?php   
}
else
{
?>
 
<tr>
    <td colspan="2" valign="top"><span class="Arial2">Escriba su correo electr&oacute;nico con el que se ha registrado,
        se le enviar&aacute; un nuevo password a su correo electr&oacute;nico:<br />
        <br /></span>
    </td>
</tr>
 
<tr>
    <td class="Arial2">Correo electr&oacute;nico:</td>
    <td><input type="text" name="correo" id="correo"  maxlength="50" class="tabla_cont_social required" /></td>
</tr>
<tr>
    <td class="Arial2">Confirme Correo electr&oacute;nico:</td>
    <td><input type="text" name="correo2" id="correo2" maxlength="50" class="tabla_cont_social required"/></td>
</tr>
 
<?php
    //Si llega un codigo de error
    if( isset($_GET['error']) && $_GET['error']==1 )
    {
        echo "<tr><td colspan='2'><br><font color='red'>El correo electr&oacute;nico NO pertenece a ningun usuario registrado.</font><br></td></tr>";
    }
    else if( isset($_GET['enviado']) && isset($_GET['elcorreo'])  )
    {
        //Si se envio correctamente el nuevo password
        if( $_GET['enviado']==1 )
            echo "<tr><td colspan='2'><br><font color='green'>Su nueva contrase&ntilde;a ha sido enviada a <strong>".$_GET['elcorreo']."</strong>.</font><br></td></tr>";
        else if( $_GET['enviado']==0 )
            echo "<tr><td colspan='2'><br><font color='red'>Por el momento la nueva contrase&ntilde;a no pudo ser enviada a <strong>".$_GET['elcorreo']."</strong>.<br>
            Intente de nuevo m&aacute;s tarde.</font></td></tr>";
    }
?>
 
<tr>
    <td align="center" colspan="2">
        <input type="button" onClick="javascript: location.href='index.php'" name="cancelar" value="Cancelar" class="rojo_sombra"  >
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="enviar" value="Enviar" class="rojo_sombra"  >
    </td>
</tr>
 
<?php
}
?>
 
</table>
</form>
</td>
              </tr>
            </tbody>
          </table></td>
        </tr>
        <tr>
          <td colspan="3" align="center" valign="middle">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center" valign="middle" bgcolor="#666666" class="Arial3"><p>&nbsp;</p>
          <p><img src="images/logo_sm_bco.png" width="100" height="33" /></p>
          <p>2013 Todos los Derechos reservados. <?=$g_nombre_muni?></p>
          <p>&nbsp;</p></td>
        </tr>
      </table></td>
  </tr>
</table>
</div>
</body>
</html>