<?php
session_start();
    include("conectar_bd.php"); 
    conectar_bd();
    include("conectar_np.php"); 
?>
<?php
    /*
    Descripcion:   Este archivo muestra un formulario que permite al usuario
        capturar sus datos y personales y de acceso.
    Archivo:    registro.php
    */
$fecha = date("d/m/Y");
$str_nombre         = "";
$str_apPaterno  = "";
$str_apMaterno  = "";
$str_correo         = "";
$str_username   = "";
$str_password   = "";
$str_password2  = "";
 
if( isset($_POST['str_nombre']) )      
    $str_nombre         = trim($_POST['str_nombre']);
if( isset($_POST['str_apPaterno']) )
    $str_apPaterno  = trim($_POST['str_apPaterno']);
if( isset($_POST['str_apMaterno']) )
    $str_apMaterno      = trim($_POST['str_apMaterno']);
if( isset($_POST['str_correo']) )
    $str_correo     = trim($_POST['str_correo']);
if( isset($_POST['str_username']) )
    $str_username   = trim($_POST['str_username']);
if( isset($_POST['str_password']) )
    $str_password   = trim($_POST['str_password']);
if( isset($_POST['str_password2']) )
    $str_password2  = trim($_POST['str_password2']);
 
 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>San Miguel == Consulta Vecinos == Registrar Usuario </title>
 
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

 <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
 
    <script src="./scripts/jquery171.js" type="text/javascript"></script>
    <script src="./scripts/jquery.validate.js" type="text/javascript"></script>
    <script src="./scripts/jquery.alerts.js" type="text/javascript"></script>
    <link href="./scripts/jquery.alerts.css" rel="stylesheet" type="text/css" />
 
    <script type="text/javascript">
    <!--
        $().ready(function() {
        $("#registrar_usuario").validate({
        rules: {
        /*A continuacion los nombres de los campos y sus reglas a cumplir */
            tx_nombre: {
                required: true, minlength: 3
            },
            tx_apPaterno: {
                required: true, minlength: 3
            },
            tx_apMaterno: {
                required: true, minlength: 3
            },
            tx_correo: {
                required: true, minlength: 5, email: true
            },
            tx_username: {
                required: true, minlength: 5
            },
            tx_password: {
                required: true, minlength: 5
            },
            tx_password2: {
                required: true, minlength: 5,   equalTo: "#tx_password"
            }
 
        },
        /*A continuacion los campos y los mensajes en caso de que no se cumplan las reglas */
        messages: {
            tx_nombre: {
                required: "Por favor, escriba su Nombre.",
                minlength: jQuery.format("Su Nombre como minimo debe tener {0} caracteres.")
            },
            tx_apPaterno: {
                required: "Por favor, escriba su Apellido Paterno.",
                minlength: jQuery.format("Su Apellido Paterno como minimo debe tener {0} caracteres.")
            },
            tx_apMaterno: {
                required: "Por favor, escriba su Apellido Materno.",
                minlength: jQuery.format("Su Apellido Materno como minimo debe tener {0} caracteres.")
            },
            tx_correo: {
                required: "Por favor, escriba una direccion de correo electronico valida.",
                minlength: jQuery.format("Por favor, escriba una direccion de correo electronico valida.")
            },
            tx_username: {
                required: "Por favor, escriba un nombre de usuario. Este dato le servira para iniciar sesion y ver el contenido.",
                minlength: jQuery.format("Su nombre de usuario como minimo debe tener {0} caracteres.")
            },
            tx_password: {
                required: "Por favor, escriba una contraseña.",
                minlength: jQuery.format("Su contraseña como minimo debe tener {0} caracteres.")
            },
            tx_password2: {
                required: "Por favor, repita la contraseña anterior.",
                minlength: jQuery.format("Su contraseña como minimo debe tener {0} caracteres."),
                equalTo: "Por favor, repita la contraseña anterior.",
            }
 
        }
 
        });
        $("#tx_nombre").focus();
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
          <td width="32%" height="100" align="center" valign="middle"><img src="./images/logo_sm.png" width="200" height="65" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Ciudadana<br />
            <span class="Arial2_red">Uso Exclusivo de la Municipalidad de San Miguel</span></td>
          <td width="15%" align="center" valign="middle" class="fecha"><?php echo $fecha ?></td>
        </tr>
        <tr>
          <td  colspan="3" align="center" valign="middle" class="borde_button"></td>
        </tr>
        <tr>
          <td colspan="3" align="center" valign="middle"><table id="table1" border="0" height="163" width="834">
            <tbody>
              <tr>
                <td width="343" align="center" ><img src="./images/configuracion.png" width="200" height="200" /></td>
                <td width="481" align="left" bgcolor="#FFFFFF">
 
 
<form id="registrar_usuario" name="registrar_usuario"  method="POST" action="guardarRegistro.php">
 
<table align="center" width="600px">
 
<tr>
    <td colspan="2" align="center"><span class="Arial4">Registrar Nuevo Usuario</span></td>
</tr>
 
<tr>
    <td colspan="2" class="Arial2">Para registrar un usuario, s&oacute;lo debes llenar
    los siguientes campos y pulsar el bot&oacute;n <b>Registrar Usuario</b>. La cuenta del usuario, se activa inmediatamente.
    </td>
</tr>
<tr><td colspan="2" align="right" valign="middle" class="borde_button"><input type="submit" class="rojo_sombra" value="&laquo; Volver" onclick="location='principal.php'"/>&nbsp;&nbsp;&nbsp;</td></tr>
     
    <?php
        //Si llega el parametro error y no viene vacio
        if( isset( $_POST['error'] ) && $_POST['error'] != '' ) {
    ?>
        <tr>
            <td colspan="2" class="Arial2">
                <font color="red">
                <ul>
                    <?php
                        echo $_POST['msgs_error'];
                    ?>
                </ul>
                </font>
            </td>
        </tr>
    <?php
        }
    ?>
 
     
    <tr>
        <td class="Arial2"><label for="tx_nombre">Nombre(s)</label></td>
        <td>
            <input type="text" name="tx_nombre" id="tx_nombre" value='<?php echo $str_nombre ?>' size="30"  maxlength="30" />
        </td>
    </tr>
    <tr>
        <td class="Arial2"><label for="tx_apPaterno">Apellido paterno</label></td>
        <td>
            <input type="text" name="tx_apPaterno" id="tx_apPaterno" value='<?php echo $str_apPaterno ?>' size="30"  maxlength="30" class="tabla_cont_social required" />
        </td>
    </tr>
    <tr>
        <td class="Arial2"><label for="tx_apMaterno">Apellido materno</label></td>
        <td>
            <input type="text" name="tx_apMaterno" id="tx_apMaterno"  value='<?php echo $str_apMaterno ?>' size="30"  maxlength="30" class="tabla_cont_social required"/>
        </td>
    </tr>
    <tr>
        <td class="Arial2"><label for="tx_correo">Correo electr&oacute;nico</label></td>
        <td>
            <input type="text" name="tx_correo" id="tx_correo"  value='<?php echo $str_correo ?>' size="30"  maxlength="30" class="tabla_cont_social required"/>
        </td>
    </tr>
    <tr>
        <td class="Arial2"><label for="tx_username">Nombre de usuario</label></td>
        <td>
            <input type="text" name="tx_username" id="tx_username"  value='<?php echo $str_username ?>' size="25"  maxlength="25"  class="tabla_cont_social required"/>
        </td>
    </tr>
    <tr>
        <td class="Arial2"><label for="tx_password">Contrase&ntilde;a</label></td>
        <td>
            <input type="password" name="tx_password" id="tx_password"  value='<?php echo $str_password ?>'  size="25"  maxlength="25" class="tabla_cont_social required"/>
        </td>
    </tr>
    <tr>
        <td class="Arial2"><label for="tx_password2">Confirme la contrase&ntilde;a</label></td>
        <td>
            <input type="password" name="tx_password2" id="tx_password2"  value='<?php echo $str_password2 ?>'  size="25"  maxlength="25" class="tabla_cont_social required"/>
        </td>
    </tr>
    <tr>
	   <!-- td>
	   <input type="hidden" name="i_tipoUsuario" id="i_tipoUsuario" value="2" />
	   </td-->
	   
        <td class="Arial2">Tipo de usuario</td>
        <td>
		    <select id="i_tipoUsuario" name="i_tipoUsuario" >
			<option value="1">Administrador</option>
			<option value="2" selected="selected">Consultor</option>
			<option value="3">Consultor especial</option>
			<!-- option value="4">Revisor Gesti&oacute;n</option>
			<option value="5">Consultor Externo</option-->
			<option value="6">Mantenedor Ordenes de Trabajo (WF)</option>
			<option value="7">Fiscalizador</option>
            </select>
        </td>
    </tr>


		<tr>
        <td class="Arial2" valign=top><br>Puede ver:</td>
        <td class="Arial2"><br>
			<?$SQL_lee4=" SELECT * FROM wf_areas where id_area>1 ORDER BY desc_area ASC ";
			$res=mysql_query($SQL_lee4,$conexio); 
			while($fila=mysql_fetch_array($res)) {
				
				 				  $descripcion = $fila["desc_area"];
								  $id_area= $fila["id_area"];
								  ?>
			<input type=radio name=<?=$id_area?> value=1><?=$descripcion?><br>
			<? }?>

        </td>
    </tr>

		<tr>
        <td class="Arial2">Area de Supervici&oacute;n Ordenes de Trabajo (WF).<br>
		<span class="Arial2_red">Solo si el Tipo de Usuario es <br>"Mantenedor Ordenes de Trabajo (WF)"</span>
		</td>

        <td>
			<select name="area_wf" id="area_wf" style="font-size:12px" onChange='ChangeComboFecha(this.form)'>
			<option value="0" SELECTED>Seleccionar</option>
			<?$SQL_lee4=" SELECT * FROM wf_areas ORDER BY desc_area ASC ";
			$res=mysql_query($SQL_lee4,$conexio); 
			while($fila=mysql_fetch_array($res)) {
 				  $descripcion = $fila["desc_area"];
				  $id_area= $fila["id_area"];?>
						<option value="<?=$id_area?>"><?=$descripcion?></option>
					<? }?>
						</select>
        </td>
    </tr>


	<tr><td colspan="2">&nbsp;</td></tr>
 
<tr>
 
    <td align="center" colspan="2">
        <!-- input type="button" onClick="javascript: location.href='index.php'" name="cancelar" value="Cancelar y Volver" class="rojo_sombra"  -->
        <input type="button" onClick="javascript:window.history.back();" name="cancelar" value="Cancelar y Volver" class="rojo_sombra" >
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="registrarme" value="Registrar Usuario" class="rojo_sombra">
    </td>
</tr>
 
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