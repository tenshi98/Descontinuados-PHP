<?php
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'app/AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';



if ($_GET['id_ejecutiv']!=''){
	$x="WHERE id_ejecutiv='".$_GET['id_ejecutiv']."'";
} else {
	$x="WHERE login='".$_GET['login']."' AND pass='".$_GET['pass']."'";
}
 
//SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT 
ejecutivos.id_ejecutiv AS idEjecutivo,
ejecutivos.pass AS password,
ejecutivos.nom_ejecutiv AS nick,
ejecutivos.radio AS radio,
ejecutivos.soy AS genero,
ejecutivos.busco AS busqueda,
ejecutivos.login AS email,
ejecutivos.edad AS edad,
ejecutivos.b_edad_a AS edad_desde,
ejecutivos.b_edad_b AS edad_hasta,
ejecutivos.publicidad AS publicidad,
ejecutivos.direccion_img AS imagen
FROM `ejecutivos`
".$x;
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado);	



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="app/css/reset.css" rel="stylesheet" type="text/css" />
<link href="app/css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script> 
</head>

<body>



    
    
    

<FORM  name="mainFrame" id="mainFrame" onSubmit="return aceptar(this);" action="G_gestores.php" method="post" target="_self">
<table width="616" height="506">
  <tr>
    <td>Nick</td>
    <td><input type="text" name="nom_ejecutiv" id="text-basic" value="<?php echo $rowusr['nick'];?>" required="required" ></td>
  </tr>
  <tr>
    <td>Tu Login (no modificable)</td>
    <td><?php echo $rowusr['email'];?></td>
  </tr>
  <tr>
    <td>Password antigua</td>
    <td><input name="password" type="password" class="arial_light_cuadro" id="password"  value="" size="37" /></td>
  </tr>
  <tr>
    <td>Tu Nueva Password</td>
    <td><input name="new_password1" type="password" class="arial_light_cuadro" id="password1"  value="" size="37" /></td>
  </tr>
  <tr>
    <td>Reingresa Tu Nueva Password</td>
    <td><input name="new_password2" type="password" class="arial_light_cuadro" id="password1"  value="" size="37" /></td>
  </tr>
  <tr>
    <td>Eres</td>
    <td>
    <fieldset data-role="controlgroup" data-type="horizontal">
        <input type="radio" name="soy" id="radio-choice-h-2a" value="H" <?php if($rowusr['genero']=='H'){echo 'checked="checked"';}?> >
        <label for="radio-choice-h-2a">Hombre</label>
        <input type="radio" name="soy" id="radio-choice-h-2b" value="M" <?php if($rowusr['genero']=='M'){echo 'checked="checked"';}?> >
        <label for="radio-choice-h-2b">Mujer</label>
    </fieldset>
    </td>
  </tr>
  <tr>
    <td>Tu edad es de</td>
    <td><input type="range" name="edad" id="slider-2" data-highlight="true" min="18" max="75" value="<?php echo $rowusr['edad'];?>"></td>
  </tr>
  <tr>
    <td>Buscas</td>
    <td>&nbsp;</td>
  </tr>
  <?php if($rowusr['busqueda']=='1'){?>
  <tr>
    <td width="90%">Hombres</td>
    <td width="10%">
    <select name="busco_a" id="flip-1" data-role="slider">
        <option value="0"  >Off</option>
        <option value="1" selected="selected" >On</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Mujeres</td>
    <td>
    <select name="busco_b" id="flip-1" data-role="slider">
        <option value="0">Off</option>
        <option value="2">On</option>
    </select>
    </td>
  </tr>
  <?php } elseif($rowusr['busqueda']=='2')  { ?>
  <tr>
    <td>Hombres</td>
    <td>
    <select name="busco_a" id="flip-1" data-role="slider">
        <option value="0"  >Off</option>
        <option value="1"  >On</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Mujeres</td>
    <td>
    <select name="busco_b" id="flip-1" data-role="slider">
        <option value="0">Off</option>
        <option value="2" selected="selected" >On</option>
    </select>
    </td>
  </tr>
  <?php } elseif($rowusr['busqueda']=='3')  { ?>
  <tr>
    <td>Hombres</td>
    <td>
    <select name="busco_a" id="flip-1" data-role="slider">
        <option value="0"  >Off</option>
        <option value="1" selected="selected" >On</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Mujeres</td>
    <td>
    <select name="busco_b" id="flip-1" data-role="slider">
        <option value="0">Off</option>
        <option value="2" selected="selected" >On</option>
    </select>
    </td>
  </tr>
  <?php } else { ?>
  <tr>
    <td>Hombres</td>
    <td>
    <select name="busco_a" id="flip-1" data-role="slider">
        <option value="0"  >Off</option>
        <option value="1" >On</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Mujeres</td>
    <td>
    <select name="busco_b" id="flip-1" data-role="slider">
        <option value="0">Off</option>
        <option value="2">On</option>
    </select>
    </td>
  </tr>
  <?php } ?>
  <tr>
    <td>Rango de edad de busqueda</td>
    <td>
    <div data-role="rangeslider">
        <input type="range" name="b_edad_a" id="range-1a" min="18" max="75" value="<?php echo $rowusr['edad_desde'];?>">
        <input type="range" name="b_edad_b" id="range-1b" min="18" max="75" value="<?php echo $rowusr['edad_hasta'];?>">
    </div> 
    </td>
  </tr>
  <tr>
    <td>Rango de Busqueda de contactos(KM)</td>
    <td>
    <input type="range" name="radio" id="slider-2" data-highlight="true" min="1" max="20" value="<?php echo $rowusr['radio'];?>">
    </td>
  </tr>
  <tr>
    <td>Imagen Perfil</td>
    <td>
    <input name="direccion_img" type="text" value="<?php if($rowusr['imagen']!=''){ echo $rowusr['imagen']; }?>"/>
    </td>
  </tr>
  <tr>
    <td>Recibir publicidad</td>
    <td>
    <select name="publicidad" id="flip-1" data-role="slider">
        <option value="Si" <?php if($rowusr['publicidad']=='Si'){echo 'selected="selected"';}?> >Si</option>
        <option value="No" <?php if($rowusr['publicidad']=='No'){echo 'selected="selected"';}?> >No</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="2">
    <input name="login" type="hidden" value="<?php echo $rowusr['email'];?>"/>
    <input name="id_ejecutiv" type="hidden" value="<?php echo  $rowusr['idEjecutivo'];?>"/>
    <input name="old_password" type="hidden" value="<?php echo  $rowusr['password'];?>"/>
    
    <div class="disable_jquery_style"  >
    <input name="button5" type="submit" class="boton_form fright" value="Guardar Cambios" />
    <input name="button3" type="button" class="boton_form fright" value="Descarga la Aplicaci&oacute;n" onclick="javascript:window.open('pop_descarga.php','Telefon�a','height=400px,width=480px,help=no,scrollbars=no,menubar=no,status=no,titlebar=no,toolbar=no');"  />
    </div>
    </td>
  </tr>
  
</table>
</form> 
</body>
</html>
