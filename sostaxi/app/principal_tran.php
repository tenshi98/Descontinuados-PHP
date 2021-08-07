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
		 $('#consulta').load('principal_tran_cierre_sesion.php?id=<?php echo $arrCliente['idCliente']; ?>');
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
		 $('#consulta').load('principal_tran_cambio_ruta.php?id=<?php echo $arrCliente['idCliente']; ?>&nav=<?php echo $nav ?>');
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
<td width="30%" class="transantiago_fondo"> 

<table>
	<tr>
    	<td width="50%">
        	<a onclick="salir('<?php echo $location ?>')" >
				<div class="box_col_1 background_color_34 border_radius5 center_img_2">
                	<img src="img/salir.png" border="0">                
                </div>
			</a>
        </td>
        <td width="50%">
        	<a onclick="ruta('<?php echo $location.'&nav='.$nav ?>')" >
				<div class="box_col_1 background_color_41 border_radius5 center_img_2">
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
				$link = 'principal_tran_gen_alertas.php';
				//Emergencias
				$link .= '?idTipoAlerta='.$idcomp['idTipoAlerta'];
				$link .= '&desplegar='.$idcomp['desplegar'];
				$link .= '&idCliente='.$arrCliente['idCliente']; ?>   
                <a onclick="action('<?php echo $link ?>')" >
                    <div class="<?php echo $idcomp['Margen'].' '.$idcomp['grid_color'].' '.$idcomp['grid_border'].' '.$idcomp['grid_shadow'].' '.$idcomp['grid_img'] ?>">
                        <img src="img/<?php echo $idcomp['url_img'] ?>" border="0" />           
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
				$link = 'principal_tran_gen_alertas.php';
				//Emergencias
				$link .= '?idTipoAlerta='.$idcomp['idTipoAlerta'];
				$link .= '&desplegar='.$idcomp['desplegar'];
				$link .= '&idCliente='.$arrCliente['idCliente']; ?>   
                <a onclick="action('<?php echo $link ?>')" >
                	<div class="<?php echo $idcomp['Margen'].' '.$idcomp['grid_color'].' '.$idcomp['grid_border'].' '.$idcomp['grid_shadow'].' '.$idcomp['grid_img'] ?>">
                        <img src="img/<?php echo $idcomp['url_img'] ?>" border="0" /> 
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
				$link = 'principal_tran_gen_alertas.php';
				//Emergencias
				$link .= '?idTipoAlerta='.$idcomp['idTipoAlerta'];
				$link .= '&desplegar='.$idcomp['desplegar'];
				$link .= '&idCliente='.$arrCliente['idCliente']; ?>   
                <a onclick="action('<?php echo $link ?>')" >
                	<div class="<?php echo $idcomp['Margen'].' '.$idcomp['grid_color'].' '.$idcomp['grid_border'].' '.$idcomp['grid_shadow'].' '.$idcomp['grid_img'] ?>">
                        <img src="img/<?php echo $idcomp['url_img'] ?>" border="0" />
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
				$link = 'principal_tran_gen_alertas.php';
				//Emergencias
				$link .= '?idTipoAlerta='.$idcomp['idTipoAlerta'];
				$link .= '&desplegar='.$idcomp['desplegar'];
				$link .= '&idCliente='.$arrCliente['idCliente']; ?>   
                <a onclick="action('<?php echo $link ?>')" >
                	<div class="<?php echo $idcomp['Margen'].' '.$idcomp['grid_color'].' '.$idcomp['grid_border'].' '.$idcomp['grid_shadow'].' '.$idcomp['grid_img'] ?>">
                        <img src="img/<?php echo $idcomp['url_img'] ?>" border="0" />                
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

<div id="vozTimer" ></div>	


</td>   
<td  width="60%">

<?php
// Se trae un listado con todos los rutas
$arrRutasAlt = array();
$query = "SELECT 
transantiago_rutas_multi_listado.Latitud, 
transantiago_rutas_multi_listado.Longitud,
transantiago_rutas_multi.idTipo AS tipo
FROM `transantiago_rutas_multi`
LEFT JOIN `transantiago_rutas_multi_listado` ON transantiago_rutas_multi_listado.idRutaAlt = transantiago_rutas_multi.idRutaAlt
WHERE transantiago_rutas_multi.idRecorrido = {$arrCliente['idRecorrido']} AND transantiago_rutas_multi.idRuta = {$arrCliente['idRuta']}
AND transantiago_rutas_multi.idEstado=1 
AND transantiago_rutas_multi.idTipo!=1 AND transantiago_rutas_multi.idTipo!=2 AND transantiago_rutas_multi.idTipo!=6 
ORDER BY transantiago_rutas_multi.idRutaAlt ASC,transantiago_rutas_multi_listado.idListado ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRutasAlt,$row );
}
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<div style="width: 100%; height: 100%;">
    <div class="bar" style="width: 100%; height: 14%;">
        <div class="tabs2 puu_back"><span>Patente</span><p class="puu" id="patente"></p></div>
        
        <div class="tabs2 delante">
            <img src="img/bus_adelante.png" width="50" height="50" class="fleft"/>
            <div class="fleft pad_left" >
                <span>Bus Delante</span>
                <p class="puu" id="anterior"></p>
            </div>
        </div>
        
        <div class="tabs2 atras">
            <img src="img/bus_atras.png" width="50" height="50" class="fleft"/>
            <div class="fleft pad_left" >
                <span>Bus Atras</span>
                <p class="puu" id="siguiente"></p>
            </div>
        </div>
        
    </div>

	<div id="map_canvas"></div>
</div>
<div id="consulta"></div>	
<div id="consulta2"></div>	
<div id="consulta3"></div>	


			
			<script>

				var map;
				var marker;
				
				
	
				/* ************************************************************************** */
				function initialize() {
					var myLatlng = new google.maps.LatLng(-33.477271996598965, -70.65170304882815);

					var myOptions = {
						zoom: 15,
						center: myLatlng,
						mapTypeId: google.maps.MapTypeId.ROADMAP,
						panControl: false,
						zoomControl: false,
						mapTypeControl: false,
						scaleControl: false,
						streetViewControl: false,
						overviewMapControl: false
					};
					map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
					//Las rutas y paraderos de los recorridos
					webserv();
					//Rutas alternativas, cambios de rutas fijos y puntos de control
					RutasAlternativas(2000);
					PuntosControl();
					//Ubicacion de los distintos buses
					transMarker(2000);//se agrega el tiempo en una variable de referencia
					//Ubicacion de los distintos buses
					mensajesVoz(60000);//se agrega el tiempo en una variable de referencia
				}
				////////////////////////////////////////////////////////////////////////////////
				//                                Web Service                                 //
				////////////////////////////////////////////////////////////////////////////////
				function webserv() {
					var serviceAddr = 'http://200.29.15.107/rest/'
					$.ajax({
						crossDomain: true,
						type: 'get',
						url: serviceAddr + 'conocerecorrido',
						data: {
							codsint: '<?php echo $arrCliente['recorrido']?>'
						},
						success: function(resp) {
							dibujarRuta(resp)
						},
						error: function() {
							alert('No se ha podido conectar con e webservice');
						}
					});
				}
				/* ************************************************************************** */
				function dibujarRuta(data) {
					var color = data.negocio.color;
					var ruta, paraderos;

					<?php if($arrCliente['ruta']=='ida'){?>
						ruta = data.ida.path;
						paraderos = data.ida.paraderos;
					<?php }elseif($arrCliente['ruta']=='vuelta'){ ?>
						ruta = data.regreso.path;
						paraderos = data.regreso.paraderos;
					<?php } ?>
					drawRoute(ruta, color);
					showParaderos(paraderos);
				}
				/* ************************************************************************** */
				function drawRoute(ruta, color) {
					lineaServicio = drawRouteFromArray(ruta, {
						color: color
					});
					lineaServicio.oldColor = color;
					map.setZoom(16);
				}
				/* ************************************************************************** */
				var drawRouteFromArray=function(arr,opt){
					var route=[];
					
					var tmp;
					
					for (var a in arr){
						if (arr[a].drawRoute!='undefined'&&arr[a].length==2){
							
							tmp=new google.maps.LatLng(arr[a][0],arr[a][1]);
							route.push(tmp);
						}
					}
					
					opt=opt||{}
					
					var drawn = new google.maps.Polyline({
						map: map,
						path: route,
						strokeColor: opt.color||'black',
						strokeOpacity: opt.opacity||1,
						strokeWeight: opt.strokeWeight||5
					});
					
					return drawn;
				}
				/* ************************************************************************** */
				var showParaderos = function(data) {

					for (var a in data) {
					
						var myLatlng = new google.maps.LatLng(data[a].pos[0], data[a].pos[1]);
						var marker2 = new google.maps.Marker({
							position: myLatlng,
							map: map,
							icon: 'img/bus.png',
							title: "Paradero"
						});
					}
				}	
				////////////////////////////////////////////////////////////////////////////////
				//                    Rutas Alternativas y puntos de control                  //
				////////////////////////////////////////////////////////////////////////////////
				function RutasAlternativas(time) {
					setInterval(function(){actualizaRutas()},time);
				}
				var rutax = 0;
				function actualizaRutas() {
				
				var tmp;
				var color;

					switch(rutax) {
						//Ejecutar formulario con el recorrido y la ruta
						case 1:
							$('#consulta2').load('principal_tran_rutas.php?idRecorrido=<?php echo $arrCliente['idRecorrido'];?>');
						break;
						//se dibujan las rutas	
						case 2:
							
							for (x = 0; x < cuenta; x++) {
								var route=[];
								 for(var i in maya[x]){
									 tmp=new google.maps.LatLng(maya[x][i][0], maya[x][i][1]);
									 color=maya[x][i][2];
									 route.push(tmp);
									 
									 //console.log("lat="+maya[x][i][0]);
									 //console.log("lon="+maya[x][i][1]);
									 //console.log("color="+maya[x][i][2]);
								 }
	
								var drawn = new google.maps.Polyline({
									path: route,
									strokeColor: color,
									strokeOpacity: 1,
									strokeWeight: 5
								});
								
								drawn.setMap(map);

							 }
							 
						break;	
						//Muestro la ubicacion de las alertas
						case 3:
							//Los demas buses
							
							var icon_alarmas = {
									name: 'icon_alarmas',
									title: 'Alarmas',
									visible: true
							}
				
							$.hideMarkers('icon_alarmas');
							$.deleteMarkers('icon_alarmas');
							for (x = 0; x < cuenta2; x++) {
								for(var i in alertas){
									
									icon_alarmas.icon = 'img/'+alertas[x][i][2];
									
									//if(alertas[i][0]!=miBus){
										alertasObj = $.addMarker(icon_alarmas);
										alertasObj.show().setPosition(new google.maps.LatLng(alertas[x][i][0], alertas[x][i][1]));
											
									//}
								}
							}
						break;


						
					}

					rutax++;	
					if(rutax==4){rutax=1}
				}
				
				/* ************************************************************************** */
				var puntoFinal_x;
				var puntoFinal_y;
				var puntoRetorno_x;
				var puntoRetorno_y;
				
				function PuntosControl() {

					var puntosControlData = [ 
					<?php foreach($arrRutasAlt as $pos) {
						echo "[".$pos['Latitud'].", ".$pos['Longitud'].", ".$pos['tipo']."],
						";
					}?>
					];
					
					for (var i in puntosControlData) {
						
						var puntosColor; 
						switch(puntosControlData[i][2]) {
							case 3:
								puntosColor='#FF0000';
								break;
							case 4:
								puntosColor='#3CC41D';//defino color
								puntoRetorno_x=puntosControlData[i][0];//defino el punto x para utilizarlo en function Controles(lat, lon)
								puntoRetorno_y=puntosControlData[i][1];//defino el punto y para utilizarlo en function Controles(lat, lon)
								break;
							case 5:
								puntosColor='#2E29AF';
								puntoFinal_x=puntosControlData[i][0];
								puntoFinal_y=puntosControlData[i][1];
								break;
						}

						var myLatlng = new google.maps.LatLng(puntosControlData[i][0], puntosControlData[i][1]);
						var marker2 = new google.maps.Circle({
							strokeColor: puntosColor,
							strokeOpacity: 0.8,
							strokeWeight: 2,
							fillColor: puntosColor,
							fillOpacity: 0.35,
							map: map,
							center: myLatlng,
							radius: 150

						});
					}
					
				}
				
				////////////////////////////////////////////////////////////////////////////////
				//                         Ubicacion de los otros Buses                       //
				////////////////////////////////////////////////////////////////////////////////
				var icon_transMarker = {
						name: 'transMarkers',
						icon: 'img/trans.png',
						title: 'Otros',
						visible: true
				}
				var icon_miBus = {
						name: 'miBus',
						icon: 'img/mibus.png',
						title: 'MiBus',
						visible: true
				}
				var markers={}


				function transMarker(time) {
					setInterval(function(){myTimer2()},time);
				}
				
				var mapax = 0;	
				var miBus = <?php echo $arrCliente['orden'];?>;
				function myTimer2() {

					switch(mapax) {
						//Ejecutar formulario con el recorrido y la ruta
						case 1:
							$('#consulta').load('principal_tran_ubicaciones.php?idRecorrido=<?php echo $arrCliente['idRecorrido'].'&idRuta='.$arrCliente['idRuta'];?>');
						break;
						//se dibujan los iconos de los buses	
						case 2:
							//Los demas buses
							$.hideMarkers('transMarkers');
							$.deleteMarkers('transMarkers');
							$.hideMarkers('miBus');
							$.deleteMarkers('miBus');
							
							for(var i in locations){
							
								if(locations[i][0]!=miBus){
									transporte = $.addMarker(icon_transMarker);
									transporte.show().setPosition(new google.maps.LatLng(locations[i][1], locations[i][2]));
										
								}else{
									//Muestro el icono del bus mio
									transporte = $.addMarker(icon_miBus);
									transporte.show().setPosition(new google.maps.LatLng(locations[i][1], locations[i][2]));
									map.panTo(transporte.position);	
									//imprimo mi patente
									document.getElementById('patente').innerHTML= locations[i][3];
									//calculo la distancia
									if(locations[i][0]){
										//console.log("calculateDistances="+i); 
										calculateDistances(i);
										
									}
									Controles(locations[i][1], locations[i][2]);
								}
							}
						break;		
					}

					mapax++;	
					if(mapax==3){mapax=1}
				}
				/* ************************************************************************** */
				var nControl = 0;
				function Controles(lat, lon) {
					
					var puntos = [ 
					<?php foreach($arrRutasAlt as $pos) {
						echo "[".$pos['Latitud'].", ".$pos['Longitud'].", ".$pos['tipo']."],
						";
					}?>
					];
					
					var radio = 0.2;//200 metros de cercania
					var centroX = puntos[nControl][0];
					var centroY = puntos[nControl][1];
				
					

					Number.prototype.toRad = function() {
					   return this * Math.PI / 180;
					}

					var R = 6371; // km 
					//Radio de los puntos de Control.
					if(centroX){
						var x1 = centroX-lat;
						var dLat = x1.toRad();  
						var x2 = centroY-lon;
						var dLon = x2.toRad();  
						var a = Math.sin(dLat/2) * Math.sin(dLat/2) + 
										Math.cos(lat.toRad()) * Math.cos(centroX.toRad()) * 
										Math.sin(dLon/2) * Math.sin(dLon/2);  
						var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
						var d = R * c;
						
						if (d <= radio) {
							<?php 
							$link  = '?idCliente='.$arrCliente['idCliente'];
							$link .= '&idRecorrido='.$arrCliente['idRecorrido'];
							$link .= '&idRuta='.$arrCliente['idRuta'];
							?>
							$('#consulta3').load('principal_tran_control.php<?php echo $link ?>&Latitud='+centroX+'&Longitud='+centroY+'');
							nControl++;
						}
					}
					
					//Radio del punto de control final.
					if(puntoFinal_x){
						var y1 = puntoFinal_x-lat;
						var ydLat = y1.toRad();  
						var y2 = puntoFinal_y-lon;
						var ydLon = y2.toRad();  
						var ya = Math.sin(ydLat/2) * Math.sin(ydLat/2) + 
										Math.cos(lat.toRad()) * Math.cos(puntoFinal_x.toRad()) * 
										Math.sin(ydLon/2) * Math.sin(ydLon/2);  
						var yc = 2 * Math.atan2(Math.sqrt(ya), Math.sqrt(1-ya)); 
						var yd = R * yc;
						
						if (yd <= radio) {
							console.log("Punto Final");
							$('#consulta3').load('principal_tran_cierre_sesion.php?id=<?php echo $arrCliente['idCliente']; ?>');
							var pagina="<?php echo $location.'&nav='.$nav ?>"
							setTimeout(function () { window.location=pagina; }, 1000); 
						}
					}
					
					//Radio del punto de control de retorno.
					if(puntoRetorno_x){
						var z1 = puntoRetorno_x-lat;
						var zdLat = z1.toRad();  
						var z2 = puntoRetorno_y-lon;
						var zdLon = z2.toRad();  
						var za = Math.sin(zdLat/2) * Math.sin(zdLat/2) + 
										Math.cos(lat.toRad()) * Math.cos(puntoRetorno_x.toRad()) * 
										Math.sin(zdLon/2) * Math.sin(zdLon/2);  
						var zc = 2 * Math.atan2(Math.sqrt(za), Math.sqrt(1-za)); 
						var zd = R * zc;
						
						if (zd <= radio) {
							console.log("Punto retorno");
							$('#consulta3').load('principal_tran_cambio_ruta.php?id=<?php echo $arrCliente['idCliente']; ?>&nav=<?php echo $nav ?>');
							var pagina="<?php echo $location.'&nav='.$nav ?>"
							setTimeout(function () { window.location=pagina; }, 1000); 
						
						}
					}

				}
			
				/* ************************************************************************** */
				var foreachMarkerByName=function(name,callback){
        
					var toRet=false
					
					if (typeof name != 'object') {
						name=[name]
					}
					
					for (var a in name){
						var tmp=name[a];
						
						if (tmp==undefined||markers[tmp]==undefined) {
							continue;
						}
						
						toRet=true;
						
						for (var a in markers[tmp]) callback(markers[tmp][a]);
					}
					
					return toRet;
				}
				/* ************************************************************************** */
				$.hideMarkers=function(name){
					foreachMarkerByName(name,function(el){
						el.hide();
					});
					return this;
				}
				/* ************************************************************************** */
				$.deleteMarkers=function(name){
					foreachMarkerByName(name,function(el){            
						el.delete();
					});
					delete markers[name];
					return this;
				}
				/* ************************************************************************** */
				$.addMarker=function(opt){
        
					if (opt == undefined) return false;
					
					opt.map=map;
					
					var tmp=new google.maps.Marker(opt);
					
					if (opt.pos) tmp.setPosition(opt.pos);
					//tmp.setVisible(opt.visible||true);
					
					if (opt.name) {
						if (markers[opt.name] == undefined) markers[opt.name]=[];
						
						markers[opt.name].push(tmp);
						
						tmp.markerFamilyName=opt.name;
						tmp.markerFamilyPos=markers[opt.name].length-1;
					}
					
					if (opt.events) {
						for (var a in opt.events) {
							google.maps.event.addListener(tmp,a,opt.events[a].bind(tmp));
						}
					}
					
					// Borrar, esconder y mostrar
					tmp.delete=function(){
						this.deleteInfo();
						this.setMap(null);
						
						return this;
					}.bind(tmp);
					
					tmp.hide=function(){
						this.setVisible(false);
						
						return this;
					}.bind(tmp);
					
					tmp.show=function(){
						google.maps.event.trigger(this, 'show');
						this.setVisible(true);
						
						return this;
					}.bind(tmp)
					
					tmp.isVisible=function(){
						return this.visible
					}.bind(tmp)
					
					// Agrega mensajes a los marcadores
					tmp.info=function(message,click,opt){
						
						opt=opt||{}
						
						var custom=click===true;
						
						click=typeof click=='function'?click:opt.click||function(){};
					
						var opt=$.extend({content: message},opt);
					
						this.infoBox=custom;
					
						if (custom) {
							this.infoWindow = new InfoBox(opt);
						} else {
							this.infoWindow = new google.maps.InfoWindow(opt);
						}
					

						this.infoWindowListener=google.maps.event.addListener(this, 'click', function () {
							
							if (activeInfoWindow) {
								activeInfoWindow.close();
							}
							this.infoWindow.open(map, this);
							activeInfoWindow=this.infoWindow;                
							click.bind(this)();
							
							return this;
							
						}.bind(this));
					}.bind(tmp);
					
					tmp.deleteInfo=function(){
						if (this.infoWindow) {
							this.infoWindow.setMap(null);
							delete this.infoWindow;
							
							google.maps.event.removeListener(this.infoWindowListener);
							delete this.infoWindowListener;
						}
						return this;
						
					}.bind(tmp);
					
					tmp.click=function(){
						google.maps.event.trigger(this, 'click');
					}.bind(tmp);
					
					return tmp;
					
				}
				/* ************************************************************************** */
				
				function calculateDistances(valor) {						
					var total_usr = locations.length;
					var valor1 = parseInt(valor);
					var valor2 = 0;
					var valor3 = 0;
					if(valor1===total_usr-1){valor2=0;}else{valor2 = valor1 + 1;}
					if(valor1===0){valor3 = total_usr-1;}else{valor3 = valor1 - 1;}
					
					
					var origin1 = new google.maps.LatLng(locations[valor1][1], locations[valor1][2]);
					var origin2 = new google.maps.LatLng(locations[valor2][1], locations[valor2][2]);
					var destination = new google.maps.LatLng(locations[valor3][1], locations[valor3][2]);
					var service = new google.maps.DistanceMatrixService();
					service.getDistanceMatrix(
						{
							origins: [origin1,origin2],
							destinations: [destination],
							travelMode: google.maps.TravelMode.DRIVING,
							avoidHighways: false,
							avoidTolls: false
						}, callback);
				}
				/* ************************************************************************** */					
				function callback(response, status) {
					if (status != google.maps.DistanceMatrixStatus.OK) {
						alert('Error was: ' + status);
					} else {
						var origins = response.originAddresses;
						var destinations = response.destinationAddresses;
						var anterior = document.getElementById('anterior');
						var siguiente = document.getElementById('siguiente');
						anterior.innerHTML = '';
						siguiente.innerHTML = '';
							
						for (var i = 0; i < origins.length; i++) {
							var results = response.rows[i].elements;
							for (var j = 0; j < results.length; j++) {
								
								if(i===0){
									siguiente.innerHTML = results[j].duration.text;
								}else{
									anterior.innerHTML = results[j].duration.text;	
								}
								
							}
						}
					}
				}
				////////////////////////////////////////////////////////////////////////////////
				//                             Mensajes por voz                               //
				////////////////////////////////////////////////////////////////////////////////
				function mensajesVoz(time) {
					setInterval(function(){vozTimer()},time);
				}

				function vozTimer() {
					$('#vozTimer').load('principal_tran_voz.php?idCliente=<?php echo $arrCliente['idCliente'];?>');
						
						
				}
				/* ************************************************************************** */
				
				
				
				
				google.maps.event.addDomListener(window, "load", initialize());
			
			
			

			</script>



</td> 
</tr>
</table>     
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  {
	 
//ubico la id del conductor
	$query = "SELECT  idConductor
	FROM `clientes_listado`
	WHERE  idCliente = '{$arrCliente['idCliente']}'";
	$resultado1 = mysql_query ($query, $dbConn);
	$rowdata = mysql_fetch_assoc ($resultado1);
	
	
	if(isset($rowdata['idConductor'])&&$rowdata['idConductor']!=''&&$rowdata['idConductor']!=0){
		header( 'Location: '.$location.'&nav=1' );
		die;	 
	}else{
	 ?>
 
<div class="form <?php echo $config_app['form_color'] ?>"> 
 <form method="post">
  <h1>Inicio de Sesion Conductor</h1>
  <div class="input"><label id="icon" for="name"><i class="fa fa-user"></i></label>  <input type="text"      name="Rut"   placeholder="Rut" /></div>
  <input type="submit"   value="Ingresar"  name="submit_login" >
  </form>
</div> 
 
 
 
 
<?php }
 }?>           
      <!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>