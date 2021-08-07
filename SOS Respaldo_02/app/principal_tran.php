<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente_transantiago.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se llaman a los archivos de configuracion de la app                                          */
/**********************************************************************************************************************************/
require_once 'core/transantiago_url.php';
require_once 'core/config_app.php';
require_once 'core/datos_empresa.php';
require_once 'core/gsm.php';
require_once 'core/sesion_cliente.php';
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "principal_tran.php";
$location = $original.$w;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para iniciar sesion
if ( !empty($_POST['submit_login']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/transantiago_login.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/transantiago_login_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/transantiago_login_2.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal_2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Principal</title>

<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->



<!-- InstanceEndEditable -->
</head>

<body  class="<?php echo $config_app['background_color'] ?>" >
<!-- InstanceBeginEditable name="text" -->
<?php  if (isset($_GET['inex'])) {?>
    <div class="alert fcenter <?php echo $config_app['msg_alert_color_body'].' '.$config_app['msg_alert_color_text'].' '.$config_app['msg_alert_width'].' '.$config_app['msg_alert_border'].' '.$config_app['msg_alert_border_color'] ?>">
    <i class="fa fa-exclamation-triangle"></i>
    <p class="long_txt"><b>Alerta!</b> El Conductor es incorrecto o no existe.</p>
    </div>
<?php }?>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['nav']) ) { ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script> 
<div id="consulta"></div>
<script>
function action(data) {
	if (confirm("¿Confirmar Alerta?")) {
		 $('#consulta').load(data);
    } else {
       return false;
    }
}
</script>
<script>
function salir(data) {
	if (confirm("¿Confirmar Cerrar Sesion?")) {
		 $('#consulta').load('transantiago_cierre.php?id=<?php echo $arrCliente['idCliente']; ?>');
		 setTimeout(function () { window.location=data; }, 1000); 
    } else {
       return false;
    }
}
<?php 
//verifico la ruta
if($_GET['nav']==1){
	$nav=2;
}else{
	$nav=1;
}
?>
function ruta(data) {
	if (confirm("¿Confirmar Cambio de Ruta?")) {
		 $('#consulta').load('transantiago_ruta.php?id=<?php echo $arrCliente['idCliente']; ?>&nav=<?php echo $nav ?>');
		 setTimeout(function () { window.location=data; }, 1000); 
    } else {
       return false;
    }
}
</script>
<?php 
//Se gestiona la variable de reubicacion, distinta de la que da el sistema
if(isset($_GET['new_view_app'])&&$_GET['new_view_app']!=''&&$_GET['new_view_app']!=0){
	$app_page = $_GET['new_view_app'];
}elseif(isset($_GET['view_app'])&&$_GET['view_app']!=''){
	$app_page = $_GET['view_app'];
}else{
	$app_page = 1;
}
// Se trae un listado con todos los elementos de la grilla
$query = "SELECT  
app_areas_listado.idArea  AS bloque,
app_areas_listado.Codigo,
app_areas_listado.Margen,
app_areas_elementos.Nombre,
app_areas_elementos.Orden,
app_areas_elementos.body_col,
app_areas_elementos.body_fil,
app_areas_elementos.grid_color,
app_areas_elementos.grid_border,
app_areas_elementos.grid_shadow,
app_areas_elementos.grid_img,
app_areas_elementos.url_img,
app_areas_elementos.idTipoBoton,
app_areas_elementos.idTipoAlerta,
app_areas_elementos.desplegar

FROM `app_areas_listado`
LEFT JOIN `app_areas_elementos`        ON app_areas_elementos.idArea         = app_areas_listado.idArea
WHERE app_areas_listado.idPagelist = {$app_page}
ORDER BY app_areas_listado.Orden , app_areas_elementos.Orden ASC";
$resultado = mysql_query ($query, $dbConn);
while ($row_origen[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($row_origen);
?>   


<table class="width100 height100" >
<tr height="100%"> 
<td width="30%"> 

<table>
	<tr>
    	<td width="50%">
        	<a onclick="salir('<?php echo $location ?>')" >
				<div class="box_col_0 background_color_41 border_radius5 sombra_box_02 center_img_7">
                	<img src="img/cerrar_sesion.png" border="0">                
                </div>
			</a>
        </td>
        <td width="50%">
        	<a onclick="ruta('<?php echo $location.'&nav='.$nav ?>')" >
				<div class="box_col_0 background_color_41 border_radius5 sombra_box_02 center_img_7">
                	<img src="img/cambio_ruta.png" border="0">                
                </div>
			</a>
        </td>      	
	</tr>
</table>
    
<?php //se imprime la id 
filtrar($row_origen, 'bloque'); 
foreach($row_origen as $tipo=>$componentes){ 
//Indice del titulo
$titulo=0;
switch ($componentes[0]['Codigo']) {
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	case "tb_1-2":
		//Cantidad de columnas para la tabla    
		$xx=2;
		//Variable al recorrer tabla	 
		$xy=0;?>
     <table class="<?php echo $componentes[0]['Codigo'] ?>">
        <tr>
        <?php foreach ($componentes as $idcomp) { ?>
            <td rowspan="<?php echo $idcomp['body_fil']?>" colspan="<?php echo $idcomp['body_col']; $xy = $xy+$idcomp['body_col'] ?>">
            	<?php 
				//se inicializan variables
				$link = 'transantiago_alertas.php';
				//Emergencias
				$link .= '?idTipoAlerta='.$idcomp['idTipoAlerta'];
				$link .= '&desplegar='.$idcomp['desplegar'];
				$link .= '&idCliente='.$arrCliente['idCliente']; ?>   
                <a onclick="action('<?php echo $link ?>')" >
                    <div class="<?php echo $idcomp['Margen'].' '.$idcomp['grid_color'].' '.$idcomp['grid_border'].' '.$idcomp['grid_shadow'].' '.$idcomp['grid_img'] ?>">
                        <img src="img/btn/<?php echo $idcomp['url_img'] ?>" border="0" />           
                    </div>
                </a>
            </td>
        <?php 
        //Verifico si la columna actual es igal al limite de columnas, si es asi creo una nueva fila
        if($xy==$xx){$xy=0; echo '</tr><tr>';}
        //Cierre del for each
           } 
        //Verifico si al terminar el ciclo  faltan por generar columnas vacias
         if($xy<$xx){ for ($i = $xy; $i < $xx; $i++) {echo '<td></td>';} } ?>
        </tr>
    </table>
     <?php break;
	 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 case "tb_1-3":
		//Cantidad de columnas para la tabla    
		$xx=3;
		//Variable al recorrer tabla	 
		$xy=0;?>
     <table class="<?php echo $componentes[0]['Codigo'] ?>">
        <tr>
        <?php foreach ($componentes as $idcomp) { ?>
            <td rowspan="<?php echo $idcomp['body_fil']?>" colspan="<?php echo $idcomp['body_col']; $xy = $xy+$idcomp['body_col'] ?>">
                <?php 
				//se inicializan variables
				$link = 'transantiago_alertas.php';
				//Emergencias
				$link .= '?idTipoAlerta='.$idcomp['idTipoAlerta'];
				$link .= '&desplegar='.$idcomp['desplegar'];
				$link .= '&idCliente='.$arrCliente['idCliente']; ?>   
                <a onclick="action('<?php echo $link ?>')" >
                	<div class="<?php echo $idcomp['Margen'].' '.$idcomp['grid_color'].' '.$idcomp['grid_border'].' '.$idcomp['grid_shadow'].' '.$idcomp['grid_img'] ?>">
                        <img src="img/btn/<?php echo $idcomp['url_img'] ?>" border="0" /> 
                	</div>
                </a>
            </td>
        <?php 
        //Verifico si la columna actual es igal al limite de columnas, si es asi creo una nueva fila
        if($xy==$xx){$xy=0; echo '</tr><tr>';}
        //Cierre del for each
           } 
        //Verifico si al terminar el ciclo  faltan por generar columnas vacias
         if($xy<$xx){ for ($i = $xy; $i < $xx; $i++) {echo '<td></td>';} } ?>
        </tr>
    </table>
     <?php break;
	 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 case "tb_1-4":
		//Cantidad de columnas para la tabla    
		$xx=4;
		//Variable al recorrer tabla	 
		$xy=0;?>
     <table class="<?php echo $componentes[0]['Codigo'] ?>">
        <tr>
        <?php foreach ($componentes as $idcomp) { ?>
            <td rowspan="<?php echo $idcomp['body_fil']?>" colspan="<?php echo $idcomp['body_col']; $xy = $xy+$idcomp['body_col'] ?>">
                <?php 
				//se inicializan variables
				$link = 'transantiago_alertas.php';
				//Emergencias
				$link .= '?idTipoAlerta='.$idcomp['idTipoAlerta'];
				$link .= '&desplegar='.$idcomp['desplegar'];
				$link .= '&idCliente='.$arrCliente['idCliente']; ?>   
                <a onclick="action('<?php echo $link ?>')" >
                	<div class="<?php echo $idcomp['Margen'].' '.$idcomp['grid_color'].' '.$idcomp['grid_border'].' '.$idcomp['grid_shadow'].' '.$idcomp['grid_img'] ?>">
                        <img src="img/btn/<?php echo $idcomp['url_img'] ?>" border="0" />
                	</div>
                </a>
            </td>
        <?php 
        //Verifico si la columna actual es igal al limite de columnas, si es asi creo una nueva fila
        if($xy==$xx){$xy=0; echo '</tr><tr>';}
        //Cierre del for each
           } 
        //Verifico si al terminar el ciclo  faltan por generar columnas vacias
         if($xy<$xx){ for ($i = $xy; $i < $xx; $i++) {echo '<td></td>';} } ?>
        </tr>
    </table>
     <?php break;
	 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 case "tb_1-5":
		//Cantidad de columnas para la tabla    
		$xx=5;
		//Variable al recorrer tabla	 
		$xy=0;?>
     <table class="<?php echo $componentes[0]['Codigo'] ?>">
        <tr>
        <?php foreach ($componentes as $idcomp) { ?>
            <td rowspan="<?php echo $idcomp['body_fil']?>" colspan="<?php echo $idcomp['body_col']; $xy = $xy+$idcomp['body_col'] ?>">
                <?php 
				//se inicializan variables
				$link = 'transantiago_alertas.php';
				//Emergencias
				$link .= '?idTipoAlerta='.$idcomp['idTipoAlerta'];
				$link .= '&desplegar='.$idcomp['desplegar'];
				$link .= '&idCliente='.$arrCliente['idCliente']; ?>   
                <a onclick="action('<?php echo $link ?>')" >
                	<div class="<?php echo $idcomp['Margen'].' '.$idcomp['grid_color'].' '.$idcomp['grid_border'].' '.$idcomp['grid_shadow'].' '.$idcomp['grid_img'] ?>">
                        <img src="img/btn/<?php echo $idcomp['url_img'] ?>" border="0" />                
                	</div>
                </a>
            </td>
        <?php 
        //Verifico si la columna actual es igal al limite de columnas, si es asi creo una nueva fila
        if($xy==$xx){$xy=0; echo '</tr><tr>';}
        //Cierre del for each
           } 
        //Verifico si al terminar el ciclo  faltan por generar columnas vacias
         if($xy<$xx){ for ($i = $xy; $i < $xx; $i++) {echo '<td></td>';} } ?>
        </tr>
    </table>
     <?php break;
	 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 case "tb_img":
		//Cantidad de columnas para la tabla    
		$xx=5;
		//Variable al recorrer tabla	 
		$xy=0;?>
      <table class="<?php echo $componentes[0]['Codigo'] ?>">
       <?php foreach ($componentes as $idcomp) { ?>
        <tr>
            <td>
                <div class="box_img <?php echo $idcomp['grid_img'] ?>">
                    <img src="img/<?php echo $idcomp['url_img'] ?>" border="0" />
                </div>
            </td>
        </tr>
        <?php } ?> 
        </table>  
     <?php break;
	 
	 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 case "subtitle fancy";
     foreach ($componentes as $idcomp) {
     	echo '<p class="'.$idcomp['Codigo'].'"><span>'.$idcomp['Nombre'].'</span></p>';
     }  
     break;
	 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 case "headline1";
     foreach ($componentes as $idcomp) {
     	echo '<p class="'.$idcomp['Codigo'].'"><span>'.$idcomp['Nombre'].'</span></p>';
     }  
     break;
	 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 case "headline2";
     foreach ($componentes as $idcomp) {
     	echo '<p class="'.$idcomp['Codigo'].'"><span>'.$idcomp['Nombre'].'</span></p>';
     }  
     break;
	 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 case "headline3";
     foreach ($componentes as $idcomp) {
     	echo '<p class="'.$idcomp['Codigo'].'"><span>'.$idcomp['Nombre'].'</span></p>';
     }  
     break;
	 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 case "tb_user";?>
     <table class="<?php echo $componentes[0]['Codigo'] ?>">
        <tr>
            <td> 
                <div class="cover"> 
                <?php if ( empty($arrCliente) ) {?>
                      <img src="img/avatar.jpg" class="<?php echo $config_app['usr_img_border'].' '.$config_app['usr_img_border_radius'].' '.$config_app['usr_img_shadow'].' '.$config_app['usr_img_width'] ?>" /> 
                      <p class="name <?php echo $config_app['usr_name_lettersize'].' '.$config_app['usr_name_lettercolor'] ?>">Bienvenido</p>
                      <p class="name_pat <?php echo $config_app['usr_name_pat_lettersize'].' '.$config_app['usr_name_pat_lettercolor'] ?>">Visita</p> 
                      <p class="name_pat2 <?php echo $config_app['usr_name_pat_lettersize_2'].' '.$config_app['usr_name_pat_lettercolor_2'] ?>">
                      	Puede iniciar sesion con el enlace de mas abajo
                      </p>
                      
                     
  <a class="<?php echo $config_app['btn_enlace_color_fondo'].' '.$config_app['btn_enlace_ancho'].' '.$config_app['btn_enlace_radio'].' '.$config_app['btn_enlace_float'].' '.$config_app['btn_enlace_color_texto'].' '.$config_app['btn_enlace_sombra'].' '.$config_app['btn_enlace_border'] ?> btn_link" href="<?php echo 'login.php'.$w.'&return_to1=principal.php' ?>">Iniciar Sesion</a>

                
				<?php }elseif(!empty($arrCliente)){?> 
                	  <img src="<?php echo $arrCliente['Url_imagen'] ?>" class="<?php echo $config_app['usr_img_border'].' '.$config_app['usr_img_border_radius'].' '.$config_app['usr_img_shadow'].' '.$config_app['usr_img_width'] ?>" /> 
                      <p class="name <?php echo $config_app['usr_name_lettersize'].' '.$config_app['usr_name_lettercolor'] ?>">Bienvenido</p>
                      <p class="name_pat <?php echo $config_app['usr_name_pat_lettersize'].' '.$config_app['usr_name_pat_lettercolor'] ?>">
                      <?php echo $arrCliente['Nombre'].' '.$arrCliente['Apellido_Paterno'] ?>
                      </p>
                <?php } ?>     
                           
                </div>
            </td>
        </tr>
    </table>
     <?php break;
	 
    
}//fin del switch
//Avanzo en el encabezado del titulo
$titulo++;
//Cierre del for each
} ?> 

</td>   
<td  width="60%">
<iframe src="principal_tran_map.php?recorrido=<?php echo $arrCliente['recorrido'].'&idrecorrido='.$arrCliente['idrecorrido'].'&ruta='.$arrCliente['ruta'].'&idruta='.$arrCliente['idruta'].'&orden='.$arrCliente['orden'].'&ppu='.$arrCliente['PPU'];?>" style="border:none" class="width100 height100"></iframe>
</td> 
</tr>
</table>     
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  {?>
 
<div class="form <?php echo $config_app['form_color'] ?>"> 
 <form method="post">
  <h1>Inicio de Sesion Conductor</h1>
  <div class="input"><label id="icon" for="name"><i class="fa fa-user"></i></label>  <input type="text"      name="Rut"   placeholder="Rut" /></div>
  <input type="submit"   value="Ingresar"  name="submit_login" >
  </form>
</div> 
 
 
 
 
<?php } ?>           
      <!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>