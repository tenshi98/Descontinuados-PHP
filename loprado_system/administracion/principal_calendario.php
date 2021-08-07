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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/componentes.php';
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "principal_calendario.php";
$location = $original;
//Se agregan ubicaciones
if(isset($_GET['Mes']) && $_GET['Mes'] != ''){  $location .= "?Mes=".$_GET['Mes'] ; } else { $location .= "?Mes=".mes_actual(); }
if(isset($_GET['Ano']) && $_GET['Ano'] != ''){  $location .= "&Ano=".$_GET['Ano'] ; } else { $location .= "&Ano=".ano_actual(); }
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'Fecha,Titulo,Cuerpo,idSistema';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/calendario_listado.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Se agregan ubicaciones
	$location .= "&view=".$_GET['id'] ; 
	//Llamamos al formulario
	$form_obligatorios = 'idCalendario,Fecha,Titulo,Cuerpo.idSistema';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/calendario_listado.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/calendario_listado.php';	
}
?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Calendario de eventos</title>
    <!-- InstanceEndEditable -->
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.min.css">
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.min.css">
    <!-- Metis Theme stylesheet -->
    <link rel="stylesheet" href="assets/css/theme_color_<?php echo $arrUsuario['idTheme'] ?>.css">
    <link rel="stylesheet" href="assets/lib/fullcalendar/fullcalendar.css">
    <!-- Estilo definido por mi -->
    <link href="assets/css/estilo.css" rel="stylesheet" type="text/css">
	<script src="assets/js/personel.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/lib/html5shiv/html5shiv.js"></script>
        <script src="assets/lib/respond/respond.min.js"></script>
        <![endif]-->
    <!--Modulos de javascript-->
    <script type="text/javascript" src="assets/lib/modernizr/modernizr.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
	<!-- Icono de la pagina -->
	<link rel="icon" type="image/png" href="img/mifavicon.png" />
    <!-- InstanceBeginEditable name="head" -->

    <!-- InstanceEndEditable -->
  </head>
  <body>
    <div id="wrap">
      <div id="top">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">
            <header class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
              </button>
              <a href="principal.php" class="navbar-brand">
                <?php require_once 'core/logo_empresa.php';?>
              </a> 
            </header>
            <?php require_once 'core/infobox.php';?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <?php require_once 'core/menu_top.php';?>
            </div>
          </div>
        </nav>
        <header class="head">
          <div class="main-bar">
            <h3>
            <!-- InstanceBeginEditable name="titulo" -->
            <i class="fa fa-calendar"></i> Calendario de eventos
			<!-- InstanceEndEditable --> </h3>
          </div>
        </header>
      </div>
      <div id="left">
       <?php require_once 'core/userbox.php';?> 
       <?php require_once 'core/menu.php';?> 
      </div>
      <div id="content">
        <div class="outer">
            <div class="inner">
			<!-- InstanceBeginEditable name="Bodytext" -->
<?php 
//Listado de errores no manejables
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Evento Creado correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Evento Modificado correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Evento borrado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo notifications_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT Fecha, Titulo, Cuerpo, idSistema
FROM `calendario_listado`
WHERE idCalendario = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	?>
 
<div class="col-lg-9 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion del Evento</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
			
			<?php 
			//Se verifican si existen los datos
			if(isset($Fecha)) {      $x1  = $Fecha;      }else{$x1  = $rowdata['Fecha'];}
			if(isset($Titulo)) {     $x2  = $Titulo;     }else{$x2  = $rowdata['Titulo'];}
			if(isset($Cuerpo)) {     $x3  = $Cuerpo;     }else{$x3  = $rowdata['Cuerpo'];}
			if(isset($idSistema)) {  $x4  = $idSistema;  }else{$x4  = $rowdata['idSistema'];}

			//se dibujan los inputs
			echo form_date('Fecha del Evento','Fecha', $x1, 2);
			echo form_input('text', 'Titulo', 'Titulo', $x2, 2);
			echo form_ckeditor('Detalle','Cuerpo', $x3, 2);
			if($arrUsuario['tipo']=='SuperAdmin'){
				echo form_select('Sistema','idSistema', $x4, 2, 'idSistema', 'Nombre', 'core_sistemas', 0, $dbConn);
			}else{
				echo '<input type="hidden" name="idSistema"   value="'.$arrUsuario['idSistema'].'">';
			}
			echo '<input type="hidden" name="idUsuario"   value="'.$arrUsuario['idUsuario'].'">';
			?>

			<div class="form-group">
            	<input type="hidden" name="idCalendario" value="<?php echo $_GET['id']; ?>" >
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
				<a href="<?php echo $location.'&view='.$_GET['id']; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
$query = "SELECT Fecha, Titulo, Cuerpo, idUsuario
FROM `calendario_listado`
WHERE idCalendario = '{$_GET['view']}'  ";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado); 
?>
<?php if ($row_data['idUsuario']!=9999){?>	
	<div class="form-group">
	<a href="<?php echo $location.'&id='.$_GET["view"]; ?>" class="btn btn-default fright margin_width" >Editar Evento</a>
	<?php $ubicacion=$location.'&del='.$_GET['view'];?>			
	<a onclick="msg('<?php echo $ubicacion ?>')"  class="btn btn-default fright margin_width" >Borrar Evento</a>
	</div>
	<div class="clearfix"></div>
<?php }?>

<div class="col-lg-12">
	<div class="box">
		<header>
			<h5>Evento</h5>	
		</header>
        <div class="body">
				<h2 class="text-primary"><?php echo $row_data['Titulo'];?></h2>
				<p class="text-muted"><?php echo fecha_estandar($row_data['Fecha']);?></p>
				<p class="text-muted"><?php echo $row_data['Cuerpo'];?></p>
        </div>	
	</div>
</div>






 

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div> 
	 
	 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { ?>
 <div class="col-lg-9 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nuevo evento</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
        	
			<?php 
			//Se verifican si existen los datos
			if(isset($Fecha)) {      $x1  = $Fecha;      }else{$x1  = '';}
			if(isset($Titulo)) {     $x2  = $Titulo;     }else{$x2  = '';}
			if(isset($Cuerpo)) {     $x3  = $Cuerpo;     }else{$x3  = '';}
			if(isset($idSistema)) {  $x4  = $idSistema;  }else{$x4  = '';}

			//se dibujan los inputs
			echo form_date('Fecha del Evento','Fecha', $x1, 2);
			echo form_input('text', 'Titulo', 'Titulo', $x2, 2);
			echo form_ckeditor('Detalle','Cuerpo', $x3, 2);
			if($arrUsuario['tipo']=='SuperAdmin'){
				echo form_select('Sistema','idSistema', $x4, 2, 'idSistema', 'Nombre', 'core_sistemas', 0, $dbConn);
			}else{
				echo '<input type="hidden" name="idSistema"   value="'.$arrUsuario['idSistema'].'">';
			}
			echo '<input type="hidden" name="idUsuario"   value="'.$arrUsuario['idUsuario'].'">';
			?>
			
			<div class="form-group">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Crear Evento" name="submit">
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>

 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
//Se definen las variables
if(isset($_GET["Mes"])){   $Mes = $_GET["Mes"];   } else { $Mes  = mes_actual(); }
if(isset($_GET["Ano"])){   $Ano = $_GET["Ano"];   } else { $Ano  = ano_actual(); }
$diaActual = dia_actual();

//calculo de los dias del mes, cuando inicia y cuando termina
$diaSemana      = date("w",mktime(0,0,0,$Mes,1,$Ano))+7; 
$ultimoDiaMes   = date("d",(mktime(0,0,0,$Mes+1,1,$Ano)-1));

//arreglo con los meses
$meses=array(1=>"Enero", 
				"Febrero", 
				"Marzo", 
				"Abril", 
				"Mayo", 
				"Junio", 
				"Julio",
				"Agosto", 
				"Septiembre", 
				"Octubre", 
				"Noviembre", 
				"Diciembre"
			);
//verifico el tipo de usuario
if($arrUsuario['tipo']=='SuperAdmin'){
	$z=" AND idSistema>=0";	
}else{
	$z=" AND idSistema={$arrUsuario['idSistema']}";	
}
//Traigo los eventos guardados en la base de datos
$arrEventos = array();
$query = "SELECT idCalendario, Titulo, Dia, idUsuario
FROM `calendario_listado`
WHERE idUsuario='{$arrUsuario['idUsuario']}' OR idUsuario=9999 AND Ano='{$Ano}' AND Mes='{$Mes}' ".$z." 
ORDER BY Fecha ASC  ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrEventos,$row );
}

?>

<div class="form-group">
	<a href="<?php echo $location.'&new=true'; ?>" class="btn btn-default fright margin_width" >Crear Nuevo Evento</a>
</div>




<div class="col-lg-12">
	<div class="box">
		<header>
			<h5>Calendario de eventos</h5>
		</header>
				
		<div id="calendar_content" class="body">
			<div id="calendar" class="fc fc-ltr">

				<table class="fc-header" style="width:100%">
					<tbody>
						<tr>
							<?php
							if(isset($_GET["Ano"])){
								$Ano_a  = $_GET["Ano"];
								$Ano_b  = $_GET["Ano"];	
							} else {
								$Ano_a  = date("Y");
								$Ano_b  = date("Y");
							}
							if (($Mes-1)==0)  {$mes_atras=12;   $Ano_a=$Ano_a-1;}else{$mes_atras=$Mes-1; }
							if (($Mes+1)==13) {$mes_adelante=1; $Ano_b=$Ano_b+1;}else{$mes_adelante=$Mes+1; }
							?>
							<td class="fc-header-left"><a href="<?php echo $original.'?Mes='.$mes_atras.'&Ano='.$Ano_a ?>" class="btn btn-default" data-original-title="" title="">‹</a></td>
							<td class="fc-header-center"><span class="fc-header-title"><h2><?php echo $meses[$Mes]." ".$Ano?></h2></span></td>
							<td class="fc-header-right"><a href="<?php echo $original.'?Mes='.$mes_adelante.'&Ano='.$Ano_b ?>" class="btn btn-default" data-original-title="" title="">›</a></td>
						</tr>
					</tbody>
				</table>

				<div class="fc-content" style="position: relative;">
					<div class="fc-view fc-view-Mes fc-grid" style="position:relative" unselectable="on">

						<table class="fc-border-separate correct_border" style="width:100%" cellspacing="0"> 
							<thead>
								<tr class="fc-first fc-last"> 
									<th class="fc-day-header fc-sun fc-widget-header" width="14%">Lunes</th>
									<th class="fc-day-header fc-sun fc-widget-header" width="14%">Martes</th>
									<th class="fc-day-header fc-sun fc-widget-header" width="14%">Miercoles</th>
									<th class="fc-day-header fc-sun fc-widget-header" width="14%">Jueves</th>
									<th class="fc-day-header fc-sun fc-widget-header" width="14%">Viernes</th>
									<th class="fc-day-header fc-sun fc-widget-header" width="14%">Sabado</th>
									<th class="fc-day-header fc-sun fc-widget-header" width="14%">Domingo</th>
								</tr>
							</thead>
							<tbody>
								<tr class="fc-week"> 
									<?php
									$last_cell = $diaSemana + $ultimoDiaMes;
									// hacemos un bucle hasta 42, que es el máximo de valores que puede
									// haber... 6 columnas de 7 dias
									for($i=1;$i<=42;$i++){
										// determinamos en que dia empieza
										if($i==$diaSemana){
											$Dia=1;
										}
										// celca vacia
										if($i<$diaSemana || $i>=$last_cell){
											echo "<td class='fc-Dia fc-wed fc-widget-content fc-other-Mes fc-future fc-state-none'> </td>";
										// mostramos el dia
										}else{ ?>  
											<td class="fc-Dia fc-sun fc-widget-content fc-past fc-first <?php if($Dia==$diaActual){ echo 'fc-state-highlight'; }?>">
												<div class="calendar_min">
													<div class="fc-Dia-number"><?php echo $meses[$Mes].' '.$Dia; ?></div>
													<div class="fc-Dia-content">
														<?php foreach ($arrEventos as $evento) { 
															if ($evento['Dia']==$Dia) {
																$ver = $location.'&view='.$evento['idCalendario'];
																if ($evento['idUsuario']==9999){
																	echo '<a class="event_calendar evcal_color2 word_break" href="'.$ver.'">'.cortar('Administrador : '.$evento['Titulo'], 20).'</a>';
																}else{
																	echo '<a class="event_calendar evcal_color1 word_break" href="'.$ver.'">'.cortar($evento['Titulo'], 20).'</a>';
																}
															} 
														} ?>    
													</div>
												</div>
											</td>
											<?php  
											$Dia++;
										}
										// cuando llega al final de la semana, iniciamos una columna nueva
										if($i%7==0){
											echo "</tr><tr class='fc-week'>\n";
										}
									}
									?>
								</tr>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px; margin-top:30px">
<a href="principal.php" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>

<?php } ?>           
			<!-- InstanceEndEditable -->   
            </div>
        </div>
      </div> 
    </div>
    <?php require_once 'core/footer.php';?>
    <!--Otros archivos javascript -->
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/lib/screenfull/screenfull.js"></script> 
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="assets/js/main.min.js"></script>
    <script>
      $(function() {
        dashboard();
      });
    </script>
 
  </body>
<!-- InstanceEnd --></html>
