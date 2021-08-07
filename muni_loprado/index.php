<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once 'AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para obtener datos
if ( !empty($_POST['submit']) )  { 
	require_once 'AA2D2CFFDJFDJX1/xrxs_form_common/patente.php';
	require_once 'AA2D2CFFDJFDJX1/xrxs_form_controller/patente_1.php';
	require_once 'AA2D2CFFDJFDJX1/xrxs_trans/patente.php';
}
/**********************************************************************************************************************************/
/*                                          Genero las claves aleatoriamente                                                      */
/**********************************************************************************************************************************/
//llamo a la funcion que genera las claves
$pass=genera_password(5);
//traspasamos el valor a una variable de sesion para poder acceder a esta en cualquier momento
$_SESSION['mipass']=$pass;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema de Consulta Online - Direcci&oacute;n de Tr&aacute;nsito</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php  if (isset($errors[1])) {echo $errors[1];}?>
    <?php  if (isset($errors[2])) {echo $errors[2];}?>
    <?php  if (isset($errors[3])) {echo $errors[3];}?>
    <?php  if (isset($errors[4])) {echo $errors[4];}?>
    <?php  if (isset($errors[5])) {echo $errors[5];}?>
    <?php  if (isset($errors[6])) {echo $errors[6];}?>
    <?php  if (isset($errors[7])) {echo $errors[7];}?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['PUU']) ) { ?>
 <h1>Resultados</h1>
<?php 
// Se define la cadena de conexion
$server = "192.168.1.6";
$conection = mssql_connect($server, "patentes", "k34n/p46jh");  
if (!$conection) {
  	die("Algo sali&oacute; mal mientras se conectaba a la base de datos");
} else {
	if (!mssql_select_db("[Permisos_de_Circulacion]", $conection)){    
		  echo "No he podido abrir la base de datos de Patentes Comerciales";
		  exit();
	}
}
	
?> 
<table class="bordered">
    <thead>
    	<tr><th colspan="2">Registros Municipales</th></tr>
    </thead>
    <tbody>
    	<tr class="subtitle"><td colspan="2">Informaci&oacute;n del veh&iacute;culo</td></tr>
        <?php 
		//Obtengo la patente y la divido para poder crear el formato con las patentes de la BD
		$varpat = Texto_en_Mayuscula($_GET['PUU']);
		$r = ($varpat[0] . $varpat[1]);
		$g = ($varpat[2] . $varpat[3]); 
		$b = ($varpat[4] . $varpat[5]); 
		//Genero las dos variables de las patentes
		$old_pat = $r.'-'.$g.$b;
		$new_pat = $r.$g.'-'.$b;
	
		//Se realiza la consulta a la base de datos
		$query = "SELECT TOP 1
			Datos_del_Vehiculo.Placa,
			Datos_del_Vehiculo.Modelo,
			Datos_del_Vehiculo.Color,
			Datos_del_Vehiculo.Cilindrada,
			Datos_del_Vehiculo.Combustible,
			Datos_del_Vehiculo.Equipamiento,
			Datos_del_Vehiculo.Transmision,
			Tipos_de_Vehiculos.Descripcion AS tipo_vehiculo, 
			Marcas.Descripcion
		FROM Datos_del_Vehiculo
		LEFT JOIN Marcas                         ON Marcas.Codigo                = Datos_del_Vehiculo.Codigo_Marca
		LEFT JOIN Tipos_de_Vehiculos             ON Tipos_de_Vehiculos.Codigo    = Datos_del_Vehiculo.Tipo_Vehiculo
		WHERE Datos_del_Vehiculo.Placa = '{$old_pat}' OR Datos_del_Vehiculo.Placa = '{$new_pat}' ";
		$resultado = mssql_query( $query );
		if ( !$resultado ) { exit( "error" ); }
		while ($row = mssql_fetch_array($resultado)) {
			$Placa = $row['Placa'];
			$Modelo = $row['Modelo'];
			$Color = $row['Color'];
			$Cilindrada = $row['Cilindrada'];
			$Combustible = $row['Combustible'];
			$Transmision = $row['Transmision'];
			$Descripcion = $row['Descripcion'];
			$tipo_vehiculo = $row['tipo_vehiculo'];
		}
		//Si no existen datos pongo mensaje de error
		if(!isset($Placa)){
		echo '<tr><td colspan="2">Su veh&iacute;culo no esta registrado en este Municipio.</td></tr>';
		//por el contrario, si existen datos, armo la tabla
		}else{
				echo '<tr><td width="180">Marca</td>        <td>
				'.$tipo_vehiculo.
				' '.$Descripcion.
				' '.$Modelo.
				' COLOR '.$Color.
				' PATENTE '.$Placa.'
				</td></tr>';
				if ($Cilindrada!=''){ echo '<tr><td width="180">Cilindrada</td><td>'.$Cilindrada.'</td></tr>' ;}
				if ($Combustible!=''){ echo '<tr><td width="180">Combustible</td>  <td>'.$Combustible.'</td></tr>';}
				if ($Transmision!=''){ echo '<tr><td width="180">Transmisi&oacute;n</td>  <td>'.$Transmision.'</td></tr>';}	
		}
		
		?>
        <tr class="subtitle"><td colspan="2">Datos del Permiso de Circulaci&oacute;n</td></tr>
        <?php 
		//Se consultan por todos los pagos realizados
		$query2 = "SELECT TOP 1
		Permisos_de_Circulacion.Fecha_Emision,
		Permisos_de_Circulacion.Fecha_Vencimiento,
		Permisos_de_Circulacion.Fecha_Pago,
		Permisos_de_Circulacion.Municipalidad,
		Permisos_de_Circulacion.Estado_del_Pago,
		Comunas.Descripcion AS nombre_comuna,
		Comunas.Informacion_Comuna,
		Traslados_de_Vehiculos.Fecha_Emision AS fecha_traslado,
		comuna_traslado.Descripcion AS comuna_destino	
		FROM Permisos_de_Circulacion	
		LEFT JOIN Comunas                    ON Comunas.Codigo                = Permisos_de_Circulacion.Comuna_Origen
		LEFT JOIN Traslados_de_Vehiculos     ON Traslados_de_Vehiculos.placa  = Permisos_de_Circulacion.placa
		LEFT JOIN Comunas comuna_traslado    ON comuna_traslado.Codigo        = Traslados_de_Vehiculos.Codigo_Comuna
		WHERE Permisos_de_Circulacion.Placa = '{$old_pat}' OR Permisos_de_Circulacion.Placa = '{$new_pat}' 
		ORDER BY Permisos_de_Circulacion.Fecha_Vencimiento DESC";
		$resultado2 = mssql_query( $query2 );
		if ( !$resultado2 ) { exit( "error" ); }
		$nnx=0;
		while ($row2 = mssql_fetch_array($resultado2)) {
			$nnx++;
			$Fecha_Vencimiento = Fecha_estandar($row2['Fecha_Vencimiento']);
			$Fecha_Pago =Fecha_estandar($row2['Fecha_Pago']);
			$Municipalidad = utf8_encode ($row2['Municipalidad']);
			$Nombre_comuna = utf8_encode ($row2['nombre_comuna']);
			$Informacion_Comuna = utf8_encode ($row2['Informacion_Comuna']);
			$Estadopago = $row2['Informacion_Comuna'];
			$fecha_traslado = Fecha_estandar($row2['fecha_traslado']);
			$comuna_destino = utf8_encode ($row2['comuna_destino']);
			?>
			<tr>
				<td colspan="2"> 
                Permiso de Circulacion con
                <?php if ($Fecha_Pago!=''&&$Fecha_Pago!=0){ ?>                 fecha de Pago <?php echo $Fecha_Pago ?>,<?php }?>
				<?php if ($Fecha_Vencimiento!=''&&$Fecha_Vencimiento!=0){ ?>   fecha de Vencimiento <?php echo $Fecha_Vencimiento ?>,<?php }?>
                <?php if ($Municipalidad!=''){ ?>                              en la municipalidad <?php echo $Municipalidad ?>,<?php }?>
                <?php if ($Nombre_comuna!=''){ ?>                              de la comuna <?php echo $Nombre_comuna ?>,<?php }?>
                <?php if ($Informacion_Comuna!=''){ ?>                         en la direcci&oacute;n <?php echo $Informacion_Comuna ?>,<?php }?>
                <?php if ($Estadopago!=''&&$Estadopago==1){ echo 'se encuentra no pagado'; } else {echo 'se encuentra pagado';}?>  
                <?php if ($fecha_traslado!=''&&$comuna_destino!=''){ ?>        <?php echo ', vehiculo trasladado a '.$comuna_destino.' con fecha '.$fecha_traslado ?><?php }?>.                   
               </td>
			</tr>
			<?php }
			if($nnx==0){
				echo '<tr><td colspan="2">Esta patente no registra pagos en nuestra comuna. Cuando Ud. encuentre la comuna de su permiso de circulaci&oacute;n, lo invitamos a trasladar su veh&iacute;culo a nuestro municipio y hacer su pago Online <a class="enlace_aqui" href="http://www.e-com.cl/Pagos/PermisoCirculacion/renovacion/ecomv2/vista/?id=14&plebcas=12&portal=%2705/03/2013%27&html=70&opc=1" target="_new">AQU&Iacute;</a>.</td></tr>';
			}
			
		?>
            
        <tr class="subtitle"><td colspan="2">Revisiones T&eacute;cnicas (Datos obtenidos del Ministerio de Transportes y Telecomunicaciones)</td></tr>
        <tr>
            <td colspan="2" class="no_padding">
<table id="t" class="rv_tecnicas"> 
<?php 
$url = "http://www.prt.cl/dpProxy/ws/proxy.asmx/dataPower?m=GET&s=2055&u=/gethistrev?ppu=".strtoupper($_GET['PUU'])."&d=";
$xml = file_get_contents($url);
$xml = str_replace("[","",$xml);
$xml = str_replace("]","",$xml);
$xml = str_replace('{"name":"db2_json", "PPU":"PPU", "ID_CRT":"ID_CRT", "NOMBRE_REGION":"NOMBRE_REGION", "NOMBRE_COMUNA":"NOMBRE_COMUNA", "COD_PRT":"COD_PRT", "FEC_REVISION":"FEC_REVISION", "TIPO_CRT":"TIPO_CRT", "NUM_CERTIFICADO":"NUM_CERTIFICADO", "FEC_VENCIMIENTO":"FEC_VENCIMIENTO", "RESULTADO_CRT":"RESULTADO_CRT", "CONCESIONARIO":"CONCESIONARIO"}, ',"<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td>Codigo Planta</td>
<td class='display_none'>Fecha</td>
<td class='display_none'></td>
<td class='display_none'>N Certificado</td>
<td class='display_none'>Fecha Venc.</td>
<td class='display_none'>Estado</td>
<td class='display_none'>Planta</td>
</tr>",$xml);  
$xml = str_replace('{"name":"','<tr class="minimaltd"><td>',$xml);
$xml = str_replace('", "PPU":"','</td><td>',$xml);
$xml = str_replace('", "ID_CRT":"','</td><td>',$xml);
$xml = str_replace('", "NOMBRE_REGION":"','</td><td>',$xml);
$xml = str_replace('", "NOMBRE_COMUNA":"','</td><td>',$xml);
$xml = str_replace('", "COD_PRT":"','</td><td>',$xml);
$xml = str_replace('", "FEC_REVISION":"','</td><td class="display_none">',$xml);
$xml = str_replace('", "TIPO_CRT":"','</td><td class="display_none">',$xml);
$xml = str_replace('", "NUM_CERTIFICADO":"','</td><td class="display_none">',$xml);
$xml = str_replace('", "FEC_VENCIMIENTO":"','</td><td class="display_none">',$xml);
$xml = str_replace('", "RESULTADO_CRT":"','</td><td class="display_none">',$xml);
$xml = str_replace('", "CONCESIONARIO":"','</td><td class="display_none">',$xml);
$xml = str_replace('"}, ','</td></tr>',$xml);
$xml = str_replace('"}','',$xml);
//Funcion bara buscar cadena dentro de otra cadena
function buscarCadena($cadena,$palabra){
    if (strstr($cadena,$palabra)){
        return '<p class="padding10" > Informaci&oacute;n no disponible temporalmente, int&eacute;ntelo mas tarde. </p>';
	} else {
        return $cadena;
    }
}
//condicional para imprimir datos
if($xml=='') {
	echo '<p class="padding10" > No se registran revisiones t&eacute;cnicas. </p>';
} else {	
	$palabra="db2_json";
    echo buscarCadena($xml,$palabra);
}
?>
</table>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script>
$.fn.switchColumns = function ( col1, col2 ) {
    var $this = this,
        $tr = $this.find('tr');

    $tr.each(function(i, ele){
        var $ele = $(ele),
            $td = $ele.find('td'),
            $tdt;
        
        $tdt = $td.eq( col1 ).clone();
        $td.eq( col1 ).html( $td.eq( col2 ).html() );
        $td.eq( col2 ).html( $tdt.html() );
    });
};


$('#t').switchColumns( 0, 6 );
$('#t').switchColumns( 1, 5 );
$('#t').switchColumns( 2, 11 );
$('#t').switchColumns( 3, 8 );
$('#t').switchColumns( 4, 9 );
$('#t').switchColumns( 5, 10 );
</script>

            
            
            
            </td>
        </tr>
        
        <tr class="subtitle"><td colspan="2">Multas</td></tr>
        <?php 
		//Se consultan por todos los pagos realizados
		$query3 = "SELECT TOP 1
		Registro_de_Multas.Comuna,
		Registro_de_Multas.Rol,
		Registro_de_Multas_Pagadas.Estado_del_Pago AS MP_Estado_del_Pago
		FROM Registro_de_Multas	
		LEFT JOIN Registro_de_Multas_Pagadas     ON Registro_de_Multas_Pagadas.ID_Multa   = Registro_de_Multas.ID_Multa
		WHERE Registro_de_Multas.Placa = '{$old_pat}' OR Registro_de_Multas.Placa = '{$new_pat}' AND  Registro_de_Multas_Pagadas.Estado_del_Pago = '0'
		ORDER BY Registro_de_Multas_Pagadas.Fecha_Pago DESC";
		$resultado3 = mssql_query( $query3 );
		if ( !$resultado3 ) { exit( "error" ); }
		$nnx=0;
		while ($row3 = mssql_fetch_array($resultado3)) { 
			$nnx++;
			//$Comuna = utf8_encode ($row3['Comuna']) ;
			//$Rol = $row3['Rol'] ;
			$MP_Estado_del_Pago = $row3['MP_Estado_del_Pago'] ;
			
			?>
			<tr>
				<td colspan="2">
            <?php  $ww = 'Este veh&iacute;culo registra multa(as) pendiente(s) ';  ?>
			<?php //if ($Comuna!=''){ $ww .= ' en la comuna de '.$Comuna.', ';  }?>
            <?php //if ($Rol!=''&&$Rol!=0){ $ww .= ' con el Rol '.$Rol.', '; }?>
            <?php if ($MP_Estado_del_Pago!=''&&$MP_Estado_del_Pago!=1){ $ww .= ' y se encuentra no pagada, ';}?> 
            <?php  $ww .= ' si desea mayor informaci&oacute;n ingrese al <a target="_new" class="enlace_aqui" href="http://consultamultas.srcei.cl/ConsultaMultas/consultaMultasExterna.do">Registro Civil</a>.';  ?> 
            <?php echo $ww; ?>                 
               </td>
			</tr>
			<?php }
			if($nnx==0){
				echo '<tr><td colspan="2">Este veh&iacute;culo no registra multas impagas en nuestro sistema, si desea mayor informaci&oacute;n ingrese al <a target="_new" class="enlace_aqui" href="http://consultamultas.srcei.cl/ConsultaMultas/consultaMultasExterna.do">Registro Civil</a>. </td></tr>';
			}
			
		?>
    </tbody>
</table>    
    
<table class="bordered">
    <thead>
    	<tr><th colspan="2">Datos Obtenidos del Registro Nacional de Vehiculos Motorizados</th></tr>
    </thead>
<?php 
//Direccion del archivo xml
$url = @file_get_contents('http://www.prt.cl/infovehiculomttwsNew.asmx/infoVehiculoMTT?ppu='.$_GET['PUU']);
//Verifico si obtengo una respuesta
if ($url) {
	//La respuesta la traspasamos a un arreglo
	$xml = new SimpleXMLElement($url);
	if($xml!=''&&($xml->rvm[0]->tipoVehiculo)!=''){
		echo '<tr><td>Vehiculo</td><td>
		'.$xml->rvm[0]->tipoVehiculo.
		' '.$xml->rvm[0]->marca.
		' '.$xml->rvm[0]->modelo.
		' COLOR '.$xml->rvm[0]->color.
		' PATENTE '.$xml->rvm[0]->patenteVehiculo.
		' FABRICADO EN '.$xml->rvm[0]->anioFabricacion.'</td></tr>';
		echo '<tr><td>N&ordm; Motor</td><td>'.$xml->rvm[0]->Nmotor.'</td></tr>';
		echo '<tr><td>N&ordm; Chasis</td><td>'.$xml->rvm[0]->Nchasis.'</td></tr>';
		echo '<tr><td>Fecha Vencimiento Rev. Tec.</td><td>'.$xml->prt[0]->fechaVencimiento.'</td></tr>';
		
		
	}else{
	//Si no encontramos datos
	echo '<tr><td colspan="2"> Este veh&iacute;culo no registra datos en el Registro Nacional de Veh&iacute;�culos Motorizados.</td></tr>';	
	}	
} else {
    //Si da error
    echo '<tr><td colspan="2"> Informaci&oacute;n no disponible temporalmente, int&eacute;ntelo mas tarde.</td></tr>';
}
?>    
</table>
<a class="button button-1 btn_volver" href="index.php">Volver</a>
   
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 }else{?>
<h1>Ingrese la patente a consultar</h1>
<table class="table_form">
<form method="post">
  <tr>
    <td class="puu_back"><input type="text"  name="patente" class="puu" <?php if (isset($patente))  {echo 'value="'.$patente.'"';}?>></td>
  </tr>
  <tr>
    <td><img class="centrarimagen" src="image.php"></td>
  </tr>
  <tr>
    <td><input type="text"  placeholder="Clave generada" name="password" class="input_text" <?php if (isset($password)) {echo 'value="'.$password.'"';}?>></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="submit"  name="submit" value="Buscar" class="button button-1"></td>
  </tr>
  </form>
</table>





	

  
<?php }?>

</body>
</html>