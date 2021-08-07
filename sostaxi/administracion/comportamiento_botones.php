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
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "comportamiento_botones.php";
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != ''){    $location .= "&search=".$_GET['search'] ; 	}

//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_POST['filtrar']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'tipo';
	$form_trabajo= 'filtrar';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/z_comportamiento_botones.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$location .= "&view=".$_GET['view'];
	$form_obligatorios = 'login,Archivo,idTipoBoton,idElementos';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/app_areas_elementos.php';
}

?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title><?php echo $rowlevel['nombre_transaccion']; ?></title>
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
    <!--Modernizr 2.7.2-->
    <script src="assets/lib/modernizr/modernizr.min.js"></script>
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
              <a href="index.html" class="navbar-brand">
                <?php if (isset($arrUsuario['imgLogo'])&&$arrUsuario['imgLogo']!=''){?><img src="upload/<?php echo $arrUsuario['imgLogo']; ?>" alt=""><?php }else{?><img src="img/logo_default.png" alt=""><?php } ?>
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
            <i class="fa fa-dashboard"></i> <?php echo $rowlevel['nombre_transaccion']; ?>
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
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Boton editado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['filter']) ) {
// Se traen todos los datos del boton seleccionado
$query = "SELECT  Archivo, fun
FROM `app_tipo_boton`
WHERE idTipoBoton = {$_GET['tipo']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// Se traen todos los datos del boton seleccionado
$query = "SELECT  idTipoAlerta, cercanos, contactar, desplegar, login, idGrupo, idCat, idListado, pantalla, Fono, idTipoContacto
FROM `app_areas_elementos`
WHERE idElementos = {$_GET['id_class']}";
$resultado = mysql_query ($query, $dbConn);
$data = mysql_fetch_assoc ($resultado);
?>

<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Agregar comportamiento al boton</h5>
		</header>
		<div id="div-1" class="body">
			<form class="form-horizontal" method="post" name="form1">
		
				<?php 
				switch ($rowdata['fun']) {
					//***********************************************************************************************************************************************//
					case 1: /*En caso de que sea un boton de emergencia */
						
						//Se verifican si existen los datos
						if(isset($idTipoAlerta)) {      $x1  = $idTipoAlerta;   }else{$x1  = $data['idTipoAlerta'];}
						if(isset($cercanos)) {          $x2  = $cercanos;       }else{$x2  = $data['cercanos'];}
						if(isset($contactar)) {         $x3  = $contactar;      }else{$x3  = $data['contactar'];}
						if(isset($idTipoContacto)) {    $x4  = $idTipoContacto; }else{$x4  = $data['idTipoContacto'];}
						if(isset($desplegar)) {         $x5  = $desplegar;      }else{$x5  = $data['desplegar'];}
						
						//se dibujan los inputs
						echo form_select('Tipo de alerta','idTipoAlerta', $x1, 2, 'idTipoAlerta', 'Nombre', 'alertas_tipos', 'idTipoBoton = '.$_GET['tipo'], $dbConn);
						echo form_select('Informar a cercanos','cercanos', $x2, 2, 'idOpciones', 'Nombre', 'alertas_opciones', 0, $dbConn);
						echo form_select('Informar a contactos','contactar', $x3, 2, 'idOpciones', 'Nombre', 'alertas_opciones', 0, $dbConn);
						echo form_select('Tipo de contactos','idTipoContacto', $x4, 2, 'idTipoContacto', 'Nombre', 'clientes_contacto_amigos_tipos', 0, $dbConn);
						echo form_select('Mostrar como emergencias','desplegar', $x5, 2, 'idOpciones', 'Nombre', 'alertas_opciones', 0, $dbConn);
					
					break;
					//***********************************************************************************************************************************************//
					case 2: /*Abrir Todas Categorias Noticias*/
						
						//Se verifica el tipo de usuario ara mostrar las paginas
						if($arrUsuario['tipo']=='SuperAdmin'){ $zz="idTipoCliente>0"; }else{ $zz="idTipoCliente={$arrUsuario['idTipoCliente']}"; }
						
						//Se verifican si existen los datos
						if(isset($idNotGrupo)) {      $x1  = $idNotGrupo;   }else{$x1  = $data['idGrupo'];}
						
						//se dibujan los inputs
						echo form_select('Grupo de Categorias','idNotGrupo', $x1, 2, 'idNotGrupo', 'Nombre', 'noticias_grupos', $zz, $dbConn);
						echo form_input_hidden('idTipoAlerta', 9999);
						echo form_input_hidden('level_view', 1);

					break;
					//***********************************************************************************************************************************************//
					case 3:/*Abrir Una Categoria Noticia*/
						
						//Se verifica el tipo de usuario ara mostrar las paginas
						if($arrUsuario['tipo']=='SuperAdmin'){ $zz="idTipoCliente>0"; }else{ $zz="idTipoCliente={$arrUsuario['idTipoCliente']}"; }
						
						//Se verifican si existen los datos
						if(isset($idNotGrupo)) {      $x1  = $idNotGrupo;   }else{$x1  = $data['idGrupo'];}
						if(isset($idNotCat)) {        $x2  = $idNotCat;     }else{$x2  = $data['idCat'];}
					
						//se dibujan los inputs
						echo form_select_depend1('Grupo','idNotGrupo', $x8, 2, 'idNotGrupo', 'Nombre', 'noticias_grupos', $zz,
												'Categoria','idNotCat', $x9, 2, 'idNotCat', 'idNotGrupo', 'Nombre', 'noticias_categorias', $zz, 
												 $dbConn);
						echo form_input_hidden('idTipoAlerta', 9999);
						echo form_input_hidden('level_view', 2);
					
					break;
					//***********************************************************************************************************************************************//
					case 4:/*Abrir Una Noticia*/
						
						//Se verifica el tipo de usuario ara mostrar las paginas
						if($arrUsuario['tipo']=='SuperAdmin'){ $zz="idTipoCliente>0"; }else{ $zz="idTipoCliente={$arrUsuario['idTipoCliente']}"; }
						
						//Se verifican si existen los datos
						if(isset($idNotGrupo)) {      $x1  = $idNotGrupo;   }else{$x1  = $data['idGrupo'];}
						if(isset($idNotCat)) {        $x2  = $idNotCat;     }else{$x2  = $data['idCat'];}
						if(isset($idNotListado)) {    $x3  = $idNotListado; }else{$x3  = $data['idListado'];}
						
						//Se verifican si existen los datos
						echo form_select_depend2('Grupo','idNotGrupo', $x1, 2, 'idNotGrupo', 'Nombre', 'noticias_grupos', $zz,
												 'Categoria','idNotCat', $x2, 2, 'idNotCat', 'idNotGrupo', 'Nombre', 'noticias_categorias', $zz, 
												 'Noticias','idNotListado', $x3, 2, 'idNotListado','idNotCat', 'Titulo', 'noticias_listado', $zz, 
												$dbConn);
						echo form_input_hidden('idTipoAlerta', 9999);
						echo form_input_hidden('level_view', 3);
					
					
					break;
					//***********************************************************************************************************************************************//
					case 5:/* Abrir grupo de categorias de noticias*/
					
						//Se verifica el tipo de usuario ara mostrar las paginas
						if($arrUsuario['tipo']=='SuperAdmin'){ $zz="idTipoCliente>0"; }else{ $zz="idTipoCliente={$arrUsuario['idTipoCliente']}"; }
						
						//Se verifican si existen los datos
						if(isset($idPagGrupo)) {      $x1  = $idPagGrupo;   }else{$x1  = $data['idGrupo'];}
					
						//Se verifican si existen los datos
						echo form_select('Grupo de Categorias','idPagGrupo', $x1, 2, 'idPagGrupo', 'Nombre', 'paginas_grupos', $zz, $dbConn);
						echo form_input_hidden('idTipoAlerta', 9999);
						echo form_input_hidden('level_view', 1);
					
					break;
					//***********************************************************************************************************************************************//
					case 6:/*Abrir Una Categoria Noticia*/
						
						//Se verifica el tipo de usuario ara mostrar las paginas
						if($arrUsuario['tipo']=='SuperAdmin'){ $zz="idTipoCliente>0"; }else{ $zz="idTipoCliente={$arrUsuario['idTipoCliente']}"; }
						
						//Se verifican si existen los datos
						if(isset($idPagGrupo)) {      $x1  = $idPagGrupo;   }else{$x1  = $data['idGrupo'];}
						if(isset($idPagCat)) {        $x2  = $idPagCat;     }else{$x2  = $data['idCat'];}
					
						//se dibujan los inputs
						echo form_select_depend1('Grupo','idPagGrupo', $x8, 2, 'idPagGrupo', 'Nombre', 'paginas_grupos', $zz,
												'Categoria','idPagCat', $x9, 2, 'idPagCat', 'idPagGrupo', 'Nombre', 'paginas_categorias', $zz, 
												 $dbConn);
						echo form_input_hidden('idTipoAlerta', 9999);
						echo form_input_hidden('level_view', 2);
					
					break;
					//***********************************************************************************************************************************************//
					case 7:/*Abrir Una Noticia*/
						
						//Se verifica el tipo de usuario ara mostrar las paginas
						if($arrUsuario['tipo']=='SuperAdmin'){ $zz="idTipoCliente>0"; }else{ $zz="idTipoCliente={$arrUsuario['idTipoCliente']}"; }
						
						//Se verifican si existen los datos
						if(isset($idPagGrupo)) {      $x1  = $idPagGrupo;   }else{$x1  = $data['idGrupo'];}
						if(isset($idPagCat)) {        $x2  = $idPagCat;     }else{$x2  = $data['idCat'];}
						if(isset($idPagListado)) {    $x3  = $idPagListado; }else{$x3  = $data['idListado'];}
						
						//Se verifican si existen los datos
						echo form_select_depend2('Grupo','idPagGrupo', $x1, 2, 'idPagGrupo', 'Nombre', 'paginas_grupos', $zz,
												 'Categoria','idPagCat', $x2, 2, 'idPagCat', 'idPagGrupo', 'Nombre', 'paginas_categorias', $zz, 
												 'Paginas','idPagListado', $x3, 2, 'idPagListado','idPagCat', 'Titulo', 'noticias_listado', $zz, 
												$dbConn);
						echo form_input_hidden('idTipoAlerta', 9999);
						echo form_input_hidden('level_view', 3);
					
					
					break;
					//***********************************************************************************************************************************************//
					case 8:/*No hace ninguna funcion, utilizado en notificaciones que no es mas que una redireccion*/

						//Se verifican si existen los datos
						if(isset($idTipoAlerta)) {      $x1  = $idTipoAlerta;   }else{$x1  = $data['idTipoAlerta'];}
					
						//Se verifican si existen los datos
						echo form_select('Tipo de alerta','idTipoAlerta', $x1, 2, 'idTipoAlerta', 'Nombre', 'alertas_tipos', 'idTipoBoton!=1', $dbConn);
					
					break;
					//***********************************************************************************************************************************************//
					case 9:/*Permite ir a otra pantalla*/

						//Se verifican si existen los datos
						if(isset($pantalla)) {      $x1  = $pantalla;   }else{$x1  = $data['pantalla'];}
					
						//Se verifican si existen los datos
						echo form_select('Seleccionar Pantalla','pantalla', $x1, 2, 'idPagelist', 'Nombre', 'app_areas_pagelist', 0, $dbConn);
					
					break;
					//***********************************************************************************************************************************************//
					case 11:/*Se muestra el listado con todos los numeros telefonicos*/

						//Se verifican si existen los datos
						if(isset($Fono)) {      $x1  = $Fono;   }else{$x1  = $data['Fono'];}
					
						//Se verifican si existen los datos
						echo form_select('Telefonos Disponibles','Fono', $x1, 2, 'Fono', 'Nombre', 'mnt_fonos', 0, $dbConn);
						echo form_input_hidden('tipofuncion', 11);
					
					break;
					//***********************************************************************************************************************************************//
					case 12:/*Se muestra el listado con todas las categorias de las preguntas*/
						
						//Se verifica el tipo de usuario ara mostrar las paginas
						if($arrUsuario['tipo']=='SuperAdmin'){ $zz="idTipoCliente>0"; }else{ $zz="idTipoCliente={$arrUsuario['idTipoCliente']}"; }

						//Se verifican si existen los datos
						if(isset($idCategorias)) {      $x1  = $idCategorias;   }else{$x1  = $data['idCategorias'];}
					
						//Se verifican si existen los datos
						echo form_select('Categoria','idCategorias', $x1, 2, 'idCategorias', 'Nombre', 'preguntas_categorias', $zz, $dbConn);
						echo form_input_hidden('idTipoAlerta', 9999);
						echo form_input_hidden('level_view', 2);
					
					break;
					//***********************************************************************************************************************************************//
					case 13:/*Abrir Una Categoria Noticia*/
						
						//Se verifica el tipo de usuario ara mostrar las paginas
						if($arrUsuario['tipo']=='SuperAdmin'){ $zz="idTipoCliente>0"; }else{ $zz="idTipoCliente={$arrUsuario['idTipoCliente']}"; }
						
						//Se verifican si existen los datos
						if(isset($idCategorias)) {      $x1  = $idCategorias;   }else{$x1  = $data['idCat'];}
						if(isset($idPregunta)) {        $x2  = $idPregunta;     }else{$x2  = $data['idListado'];}
					
						//se dibujan los inputs
						echo form_select_depend1('Grupo','idCategorias', $x1, 2, 'idCategorias', 'Nombre', 'preguntas_categorias', $zz,
												'Categoria','idPregunta', $x2, 2, 'idPregunta', 'idCategorias', 'Nombre', 'preguntas_listado', $zz, 
												 $dbConn);
						echo form_input_hidden('idTipoAlerta', 9999);
						echo form_input_hidden('level_view', 3);
					
					break;
				
				
				
				}
				//Se verifican si existen los datos
				if(isset($login)) {      $x1  = $login;   }else{$x1  = $data['login'];}
						
				//se dibujan los inputs
				echo form_select('Login Necesario','login', $x1, 2, 'idOpciones', 'Nombre', 'alertas_opciones', 0, $dbConn);
				?>	      	 
            
				<div class="form-group">
					<input type="hidden"  name="Archivo" value="<?php echo $rowdata['Archivo'] ?>" >
					<input type="hidden"  name="idTipoBoton" value="<?php echo $_GET['tipo'] ?>" >
					<input type="hidden"  name="idElementos" value="<?php echo $_GET['id_class'] ?>" >
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar" name="submit_edit">	
					<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
				</div>
                      
			</form> 
                    
		</div>
	</div>
</div>


<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['id_class']) ) { 
// Se traen todos los datos del boton seleccionado
$query = "SELECT  idTipoBoton
FROM `app_areas_elementos`
WHERE idElementos = {$_GET['id_class']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
?>

<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Seleccionar el tipo de boton</h5>
		</header>
		<div id="div-1" class="body">
			<form class="form-horizontal" method="post" name="form1">

				 <?php 
				//Se verifican si existen los datos
				if(isset($Nombre)) {                 $x1  = $Nombre;                 }else{$x1  = $rowdata['idTipoBoton'];}
				
				//se dibujan los inputs
				echo form_select('Tipo Boton','tipo', $x1, 1, 'idTipoBoton', 'Nombre', 'app_tipo_boton', 0, $dbConn);					 
				?> 
				
				<div class="form-group">
					<input type="hidden"  name="pagina" value="<?php echo $_GET['pagina'] ?>" >
					<input type="hidden"  name="view" value="<?php echo $_GET['view'] ?>" >
					<?php if(isset($_GET['search'])){?><input type="hidden"  name="search" value="<?php echo $_GET['search'] ?>" ><?php } ?>
					<input type="hidden"  name="id_class" value="<?php echo $_GET['id_class'] ?>" >
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Continuar" name="filtrar">	
					<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
				</div>
                      
			</form> 
                    
		</div>
	</div>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['view']) ) { 
// Se trae un listado con todos los colores de los botones
$arrGrilla = array();
$query = "SELECT  
app_areas_elementos.Nombre AS nombre_elemento,
app_areas_elementos.idElementos,
app_areas_listado.Nombre AS nombre_grid,
alertas_tipos.Nombre AS tipo_alerta,
app_tipo_boton.Nombre AS tipo_boton

FROM `app_areas_elementos`
LEFT JOIN `app_areas_listado`     ON app_areas_listado.idArea          = app_areas_elementos.idArea
LEFT JOIN `alertas_tipos`         ON alertas_tipos.idTipoAlerta        = app_areas_elementos.idTipoAlerta
LEFT JOIN `app_tipo_boton`        ON app_tipo_boton.idTipoBoton        = app_areas_elementos.idTipoBoton

WHERE app_areas_elementos.idPagelist = {$_GET['view']} AND app_areas_elementos.Tipo_elemento = 'boton'
ORDER BY nombre_grid ASC, app_areas_elementos.Orden ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrGrilla,$row );
}
?>
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Botones</h5>
		</header>       
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
		<thead>
			<tr role="row">
				<th>Nombre</th>
				<th>Tipo de Boton</th>
				<th>Funcion</th>
				<th width="120">Acciones</th>
			</tr>
		</thead>                
		<tbody role="alert" aria-live="polite" aria-relevant="all">
			<?php
			filtrar($arrGrilla, 'nombre_grid');  
			foreach($arrGrilla as $categoria=>$elementos){ 
				echo '<tr class="odd" ><td colspan="5"  style="background-color:#DDD">'.$categoria.'</td></tr>';
				foreach ($elementos as $elemento) { ?>
				<tr class="odd"> 
					<td><?php echo $elemento['nombre_elemento']; ?></td>
					<td><?php echo $elemento['tipo_boton']; ?></td>
					<td><?php if($elemento['tipo_alerta']==''&&$elemento['tipo_boton']!=''){echo 'Llamada Archivo';}else{echo $elemento['tipo_alerta'];} ?></td>
					<td><a href="<?php echo $location.'&view='.$_GET['view'].'&id_class='.$elemento['idElementos']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a></td>   
				</tr> 
				<?php } 
			}?>
				  
		</tbody>
	</table>   
</div>
</div>


<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 	
//Se inicializa el paginador de resultados
//tomo el numero de la pagina si es que este existe
if(isset($_GET["pagina"])){
	$num_pag = $_GET["pagina"];	
} else {
	$num_pag = 1;	
}
//Defino la cantidad total de elementos por pagina
$cant_reg = 30;
//resto de variables
if (!$num_pag){
	$comienzo = 0 ;
	$num_pag = 1 ;
} else {
	$comienzo = ( $num_pag - 1 ) * $cant_reg ;
}
//Creo la variable con la ubicacion
	$z="WHERE idPagelist!=0 ";
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z .=" AND Nombre LIKE '%{$_GET['search']}%' ";	
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idPagelist FROM `app_areas_pagelist` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrPage = array();
$query = "SELECT idPagelist,Nombre
FROM `app_areas_pagelist`
".$z."
ORDER BY Nombre ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPage,$row );
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar pantalla</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Nombre">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
</div>
                               
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de pantalla</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
		<thead>
			<tr role="row">
				<th>Nombre</th>
				<th width="120">ID</th>
				<th width="120">Acciones</th>
			</tr>
		</thead>
						  
		<tbody role="alert" aria-live="polite" aria-relevant="all">
		<?php foreach ($arrPage as $paginas) { ?>
			<tr class="odd">
				<td><?php echo $paginas['Nombre']; ?></td>
				<td><?php echo $paginas['idPagelist']; ?></td>
				<td><a href="<?php echo $location.'&view='.$paginas['idPagelist']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a></td>
			</tr>
		<?php } ?>                    
		</tbody>
	</table>
<?php 
if (isset($_GET['search'])) {  $search ='&search='.$_GET['search']; } else { $search='';}
echo paginador_1($total_paginas, $original, $search, $num_pag ) ?> 
</div>
</div>
<?php } ?>    
			<!-- InstanceEndEditable -->   
            </div>
        </div>
      </div> 
    </div>
    <?php require_once 'core/footer.php';?>
    <!--jQuery 2.1.0 -->
    <script src="assets/lib/jquery/jquery.min.js"></script>
    <!--Bootstrap -->
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- Screenfull -->
    <script src="assets/lib/screenfull/screenfull.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="assets/js/main.min.js"></script>
    <script src="assets/lib/fullcalendar/fullcalendar.min.js"></script>
    <script src="assets/lib/jquery.tablesorter/jquery.tablesorter.min.js"></script>
    <script src="assets/lib/jquery.sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/lib/flot/jquery.flot.js"></script>
    <script src="assets/lib/flot/jquery.flot.selection.js"></script>
    <script src="assets/lib/flot/jquery.flot.resize.js"></script>
    <script>
      $(function() {
        dashboard();
      });
    </script>
 
  </body>
<!-- InstanceEnd --></html>