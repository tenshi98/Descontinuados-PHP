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
$original = "medicos_listado.php";
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != ''){                     $location .= "&search=".$_GET['search'] ; 	}	
if(isset($_GET['Nombre']) && $_GET['Nombre'] != ''){                     $location .= "&Nombre=".$_GET['Nombre'] ; }
if(isset($_GET['idEstado']) && $_GET['idEstado'] != ''){                 $location .= "&idEstado=".$_GET['idEstado'] ; }
if(isset($_GET['idSexo']) && $_GET['idSexo'] != ''){                     $location .= "&idSexo=".$_GET['idSexo'] ; }
if(isset($_GET['idDepartamento']) && $_GET['idDepartamento'] != ''){     $location .= "&idDepartamento=".$_GET['idDepartamento'] ; }
if(isset($_GET['idProvincia']) && $_GET['idProvincia'] != ''){           $location .= "&idProvincia=".$_GET['idProvincia'] ; }
if(isset($_GET['idDistrito']) && $_GET['idDistrito'] != ''){             $location .= "&idDistrito=".$_GET['idDistrito'] ; }
if(isset($_GET['Direccion']) && $_GET['Direccion'] != ''){               $location .= "&Direccion=".$_GET['Direccion'] ; }
if(isset($_GET['Especialidad']) && $_GET['Especialidad'] != ''){         $location .= "&Especialidad=".$_GET['Especialidad'] ; }
if(isset($_GET['idDisponibilidad']) && $_GET['idDisponibilidad'] != ''){ $location .= "&idDisponibilidad=".$_GET['idDisponibilidad'] ; }
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$location .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ; 
}
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'usuario,password,Nombre,Rut,idSistema,email';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/medicos_listado.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idMedico,Nombre,Rut,idSistema,email';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/medicos_listado.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/medicos_listado.php';	
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
              <a href="principal.php" class="navbar-brand">
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
            <?php echo '<i class="'.$rowlevel['IconoCategoria'].'"></i> '.$rowlevel['nombre_transaccion']; ?>		
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
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Medico creado correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Medico editado correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Medico borrado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo notifications_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT Nombre, Rut, fNacimiento, idDepartamento, idProvincia, idDistrito, Direccion, idSistema, Fono1, email,
Especialidad, idDisponibilidad,idSexo
FROM `medicos_listado`
WHERE idMedico = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	

?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion datos del Medico</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
        	
            <?php 
			//Se verifican si existen los datos
			if(isset($Nombre)) {           $x1  = $Nombre;            }else{$x1  = $rowdata['Nombre'];}
			if(isset($Rut)) {              $x2  = $Rut;               }else{$x2  = $rowdata['Rut'];}
            if(isset($fNacimiento)) {      $x3  = $fNacimiento;       }else{$x3  = $rowdata['fNacimiento'];}
            if(isset($idSexo)) {           $x4  = $idSexo;            }else{$x4  = $rowdata['idSexo'];}
            if(isset($idDepartamento)) {   $x5  = $idDepartamento;    }else{$x5  = $rowdata['idDepartamento'];}
            if(isset($idProvincia)) {      $x6  = $idProvincia;       }else{$x6  = $rowdata['idProvincia'];}
            if(isset($idDistrito)) {       $x7  = $idDistrito;        }else{$x7  = $rowdata['idDistrito'];}
			if(isset($Direccion)) {        $x8  = $Direccion;         }else{$x8  = $rowdata['Direccion'];}
			if(isset($idSistema)) {        $x9  = $idSistema;         }else{$x9  = $rowdata['idSistema'];}
			if(isset($Especialidad)) {     $x10 = $Especialidad;      }else{$x10 = $rowdata['Especialidad'];}
			if(isset($idDisponibilidad)) { $x11 = $idDisponibilidad;  }else{$x11 = $rowdata['idSistema'];}
			if(isset($Fono1)) {            $x12 = $Fono1;             }else{$x12 = $rowdata['Fono1'];}
			if(isset($email)) {            $x13 = $email;             }else{$x13 = $rowdata['email'];}
			

			//se dibujan los inputs
			echo '<h3>Datos Basicos</h3>';
			echo form_input('text', 'Nombres', 'Nombre', $x1, 2);
			echo form_input_icon('text', 'DNI', 'Rut', $x2, 2,'fa fa-exclamation-triangle');
			echo form_date('F Nacimiento','fNacimiento', $x3, 1);
			echo form_select('Sexo','idSexo', $x4, 1, 'idSexo', 'Nombre', 'medicos_sexo', 0, $dbConn);	
			echo form_select_depend2('Departamento','idDepartamento', $x5, 1, 'idDepartamento', 'Nombre', 'ubicacion_departamento', 0,
									'Provincia','idProvincia', $x6, 1, 'idProvincia', 'idDepartamento', 'Nombre', 'ubicacion_provincia', 0, 
									'Distrito','idDistrito', $x7, 1, 'idDistrito', 'idProvincia', 'Nombre', 'ubicacion_distrito', 0,
									 $dbConn);		 	 
			echo form_input_icon('text', 'Direccion', 'Direccion', $x8, 1,'fa fa-map');	 
			if($arrUsuario['tipo']=='SuperAdmin'){
			echo form_select('Sistema','idSistema', $x9, 2, 'idSistema', 'Nombre', 'core_sistemas', 0, $dbConn);
			}else{
			echo '<input type="hidden" name="idSistema"   value="'.$arrUsuario['idSistema'].'">';
			}
			echo form_select('Especialidad','Especialidad', $x10, 1, 'Nombre', 'Nombre', 'medicos_especialidades', 0, $dbConn);
			echo form_select('Disponibilidad','idDisponibilidad', $x11, 1, 'idDisponibilidad', 'Nombre', 'medicos_disponibilidad', 0, $dbConn);
			
			echo '<h3>Datos de contacto</h3>';
			echo form_input_phone('Telefono', 'Fono1', $x12, 1);
			echo form_input_icon('text', 'Email', 'email', $x13, 2,'fa fa-envelope-o');
			?>
          
			<div class="form-group">
            	<input type="hidden" name="idMedico" value="<?php echo $_GET['id']; ?>" >
				<input type="submit" class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { ?>
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nuevo Medico</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
			
			<?php 
			//Se verifican si existen los datos
			if(isset($usuario)) {          $x1  = $usuario;           }else{$x1  = '';}
			if(isset($password)) {         $x2  = $password;          }else{$x2  = '';}
			if(isset($Nombre)) {           $x3  = $Nombre;            }else{$x3  = '';}
			if(isset($Rut)) {              $x4  = $Rut;               }else{$x4  = '';}
            if(isset($fNacimiento)) {      $x5  = $fNacimiento;       }else{$x5  = '';}
            if(isset($idSexo)) {           $x6  = $idSexo;            }else{$x6  = '';}
            if(isset($idDepartamento)) {   $x7  = $idDepartamento;    }else{$x7  = '';}
            if(isset($idProvincia)) {      $x8  = $idProvincia;       }else{$x8  = '';}
            if(isset($idDistrito)) {       $x9  = $idDistrito;        }else{$x9  = '';}
			if(isset($Direccion)) {        $x10 = $Direccion;         }else{$x10 = '';}
			if(isset($idSistema)) {        $x11 = $idSistema;         }else{$x11 = '';}
			if(isset($Especialidad)) {     $x12 = $Especialidad;      }else{$x12 = '';}
			if(isset($idDisponibilidad)) { $x13 = $idDisponibilidad;  }else{$x13 = '';}
			if(isset($Fono1)) {            $x14 = $Fono1;             }else{$x14 = '';}
			if(isset($email)) {            $x15 = $email;             }else{$x15 = '';}
			

			//se dibujan los inputs
			echo '<h3>Perfil</h3>';
			echo form_input('text', 'Nombre de Usuario', 'usuario', $x1, 2);
			echo form_input('text', 'Contraseña', 'password', $x2, 2);
		
			echo '<h3>Datos Basicos</h3>';
			echo form_input('text', 'Nombres', 'Nombre', $x3, 2);
			echo form_input_icon('text', 'DNI', 'Rut', $x4, 2,'fa fa-exclamation-triangle');
			echo form_date('F Nacimiento','fNacimiento', $x5, 1);
			echo form_select('Sexo','idSexo', $x6, 1, 'idSexo', 'Nombre', 'medicos_sexo', 0, $dbConn);	
			echo form_select_depend2('Departamento','idDepartamento', $x7, 1, 'idDepartamento', 'Nombre', 'ubicacion_departamento', 0,
									'Provincia','idProvincia', $x8, 1, 'idProvincia', 'idDepartamento', 'Nombre', 'ubicacion_provincia', 0, 
									'Distrito','idDistrito', $x9, 1, 'idDistrito', 'idProvincia', 'Nombre', 'ubicacion_distrito', 0,
									 $dbConn);		 	 
			echo form_input_icon('text', 'Direccion', 'Direccion', $x10, 1,'fa fa-map');	 
			if($arrUsuario['tipo']=='SuperAdmin'){
			echo form_select('Sistema','idSistema', $x11, 2, 'idSistema', 'Nombre', 'core_sistemas', 0, $dbConn);
			}else{
			echo '<input type="hidden" name="idSistema"   value="'.$arrUsuario['idSistema'].'">';
			}
			echo form_select('Especialidad','Especialidad', $x12, 1, 'Nombre', 'Nombre', 'medicos_especialidades', 0, $dbConn);
			echo '<input type="hidden" name="idDisponibilidad"   value="2">';					
			
			echo '<h3>Datos de contacto</h3>';
			echo form_input_phone('Telefono', 'Fono1', $x14, 1);
			echo form_input_icon('text', 'Email', 'email', $x15, 2,'fa fa-envelope-o');
			
			

			echo '<input type="hidden" name="idEstado"   value="1" >';	
			?>        
   
			<div class="form-group">
				<input type="submit" class="btn btn-primary fright margin_width" value="Guardar" name="submit"> 
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>   

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['fullsearch']) ) { ?>
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Filtro para Busqueda Avanzada</h5>
		</header>
		<div id="div-1" class="body">
		<form name="form1" class="form-horizontal" action="<?php echo $location; ?>" >
			
            <?php 
			//Se verifican si existen los datos
			if(isset($Nombre)) {            $x1  = $Nombre;             }else{$x1  = '';}
			if(isset($rango_a)) {           $x2  = $rango_a;            }else{$x2  = '';}
            if(isset($rango_b)) {           $x3  = $rango_b;            }else{$x3  = '';}
			if(isset($idEstado)) {          $x4  = $idEstado;           }else{$x4  = '';}
			if(isset($idSexo)) {            $x5  = $idSexo;             }else{$x5  = '';}
			if(isset($idDepartamento)) {    $x6  = $idDepartamento;     }else{$x6  = '';}
			if(isset($idProvincia)) {       $x7  = $idProvincia;        }else{$x7  = '';}
			if(isset($idDistrito)) {        $x8  = $idDistrito;         }else{$x8  = '';}
			if(isset($Direccion)) {         $x9  = $Direccion;          }else{$x9  = '';}
			if(isset($Especialidad)) {      $x10 = $Especialidad;       }else{$x10 = '';}
			if(isset($idDisponibilidad)) {  $x11 = $idDisponibilidad;   }else{$x11 = '';}
			
			//se dibujan los inputs
			echo form_input('text', 'Nombres', 'Nombre', $x1, 1);
			echo form_date('F Nacimiento inicio','rango_a', $x2, 1);
			echo form_date('F Nacimiento termino','rango_b', $x3, 1);
			echo form_select('Estado Medico','idEstado', $x4, 1, 'idEstado', 'Nombre', 'medicos_estado', 0, $dbConn);
			echo form_select('Sexo','idSexo', $x5, 1, 'idSexo', 'Nombre', 'medicos_sexo', 0, $dbConn);	
			echo form_select_depend2('Departamento','idDepartamento', $x6, 1, 'idDepartamento', 'Nombre', 'ubicacion_departamento', 0,
									'Provincia','idProvincia', $x7, 1, 'idProvincia', 'idDepartamento', 'Nombre', 'ubicacion_provincia', 0, 
									'Distrito','idDistrito', $x8, 1, 'idDistrito', 'idProvincia', 'Nombre', 'ubicacion_distrito', 0,
									 $dbConn);		 	 
			echo form_input_icon('text', 'Direccion', 'Direccion', $x9, 1,'fa fa-map');
			echo form_select('Especialidad','Especialidad', $x10, 1, 'Nombre', 'Nombre', 'medicos_especialidades', 0, $dbConn);
			echo form_select('Disponibilidad','idDisponibilidad', $x11, 1, 'idDisponibilidad', 'Nombre', 'medicos_disponibilidad', 0, $dbConn);
			
			
			?>        
   
			<div class="form-group">
            	<input type="hidden" name="pagina" value="1" >
				<input type="submit" class="btn btn-primary fright margin_width" value="Buscar" >
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>  
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
//Se inicializa el paginador de resultados
//tomo el numero de la pagina si es que este existe
if(isset($_GET["pagina"])){$num_pag = $_GET["pagina"];	
} else {$num_pag = 1;	
}
//Defino la cantidad total de elementos por pagina
$cant_reg = 30;
//resto de variables
if (!$num_pag){
	$comienzo = 0 ;$num_pag = 1 ;
} else {
	$comienzo = ( $num_pag - 1 ) * $cant_reg ;
}
//verifico que sea un administrador
if($arrUsuario['tipo']=='SuperAdmin'){
	$z="WHERE medicos_listado.idSistema>=0";	
}else{
	$z="WHERE medicos_listado.idSistema={$arrUsuario['idSistema']}";
}	
//Verifico si la variable de busqueda existe
if(isset($_GET['search']) && $_GET['search'] != ''){                        $z .= " AND medicos_listado.Rut LIKE '%{$_GET['search']}%'";}
if(isset($_GET['Nombre']) && $_GET['Nombre'] != '')  {                      $z .= " AND medicos_listado.Nombre LIKE '%{$_GET['Nombre']}%' " ;}
if(isset($_GET['idEstado']) && $_GET['idEstado'] != '')  {                  $z .= " AND medicos_listado.idEstado = '".$_GET['idEstado']."'" ;}
if(isset($_GET['idSexo']) && $_GET['idSexo'] != '')  {                      $z .= " AND medicos_listado.idSexo = '".$_GET['idSexo']."'" ;}
if(isset($_GET['idDepartamento']) && $_GET['idDepartamento'] != '')  {      $z .= " AND medicos_listado.idDepartamento = '".$_GET['idDepartamento']."'" ;}
if(isset($_GET['idProvincia']) && $_GET['idProvincia'] != '')  {            $z .= " AND medicos_listado.idProvincia = '".$_GET['idProvincia']."'" ;}
if(isset($_GET['idDistrito']) && $_GET['idDistrito'] != '')  {              $z .= " AND medicos_listado.idDistrito = '".$_GET['idDistrito']."'" ;}
if(isset($_GET['Direccion']) && $_GET['Direccion'] != '')  {                $z .= " AND medicos_listado.Direccion LIKE '%{$_GET['Direccion']}%' " ;}
if(isset($_GET['Especialidad']) && $_GET['Especialidad'] != '')  {          $z .= " AND medicos_listado.Especialidad LIKE '%{$_GET['Especialidad']}%' " ;}
if(isset($_GET['idDisponibilidad']) && $_GET['idDisponibilidad'] != '')  {  $z .= " AND medicos_listado.idDisponibilidad = '".$_GET['idDisponibilidad']."'" ;}
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$z .= " AND medicos_listado.fNacimiento BETWEEN '{$_GET['rango_a']}' AND '{$_GET['rango_b']}'" ;
}

//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT medicos_listado.idMedico FROM `medicos_listado` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT 
medicos_listado.idMedico,
medicos_listado.Rut,
medicos_listado.Nombre,
medicos_estado.Nombre AS estado,
core_sistemas.Nombre AS sistema
FROM `medicos_listado`
LEFT JOIN `medicos_estado`   ON medicos_estado.idEstado       = medicos_listado.idEstado
LEFT JOIN `core_sistemas`    ON core_sistemas.idSistema       = medicos_listado.idSistema
".$z."
ORDER BY medicos_listado.Nombre ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}

?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Medico</label>
    <div class="col-lg-5">	<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >		
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="DNI">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <a href="<?php echo $location; ?>&fullsearch=true" class="t_search_button_full" ><i class="fa fa-search-plus"></i></a>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
           </div>
    </div>
</form>
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nuevo Medico</a><?php }?>
</div>
<div class="clearfix"></div>                     
                                 
<div class="col-lg-12">
	<div class="box">	
		<header>		
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Medicos</h5>	
		</header>
        
		<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
		<thead>
			<tr role="row">
				<th width="209">DNI</th>
				<th>Nombre del Medico</th>
				<th width="160">Sistema</th>
				<th width="120">Estado</th>
				<th width="120">Acciones</th>
			</tr>
		</thead>
		<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">		
			<td><?php echo $usuarios['Rut']; ?></td>		
			<td><?php echo $usuarios['Nombre']; ?></td>		
			<td><?php echo $usuarios['sistema']; ?></td>
            <td><?php echo $usuarios['estado']; ?></td>		
			<td>
<?php if ($rowlevel['level']>=1){?><a href="<?php echo 'view_medico.php?view='.$usuarios['idMedico']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php }?>   
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&id='.$usuarios['idMedico']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?>
<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$usuarios['idMedico'];?>			
<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php }?>		
			</td>	
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
