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
$original = "admin_funcionarios.php";
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != ''){                       $location .= "&search=".$_GET['search'] ; 	}
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_GET['sincronizar']) )  { 
	//conexion al seridor
	$server = "200.55.192.42";
	$sql_conection = mssql_connect($server, "patentes", "k34n/p46jh");  
	if (!$sql_conection) {
		die("Algo sali&oacute; mal mientras se conectaba a la base de datos");
	} else {
		if (!mssql_select_db("[Rem_Municipal]", $sql_conection)){    
			  echo "No he podido abrir la base de datos de Patentes Comerciales";
			  exit();
		}else{
			//echo "Conexion exitosa";
		}
	}
	
	//Selecciono a todos los usuarios
	$arrUsers = array();
	$query = "SELECT  
	Rut, Nombres, Apellidos, Email, Id_Funcionario
	FROM FichaFuncionario
	WHERE Activo=0";
	$resultado = mssql_query ($query, $sql_conection);
	while ( $row = mssql_fetch_assoc ($resultado)) {
	array_push( $arrUsers,$row );
	}
	
	//recorro los usuarios y verifico si estos existen en el sistema
	foreach ($arrUsers as $usuarios) {
		
		$query = "SELECT idUsuario
		FROM `usuarios_listado`
		WHERE idCasChile = '{$usuarios['Id_Funcionario']}' ";
		$resultado = mysql_query ($query, $dbConn);
		$numero = mysql_num_rows($resultado);
		
		if($numero==0){
			
			//variables
			$usuario = $usuarios['Rut'];
			$password = '1234';
			$tipo = 'Funcionario';
			$idEstado = '1';
			$email = $usuarios['Email'];
			$Nombre = $usuarios['Nombres'];
			$Apellido = $usuarios['Apellidos'];
			$Rut = $usuarios['Rut'];
			$idCasChile = $usuarios['Id_Funcionario'];
			$Direccion_img = '';
			$Ultimo_acceso = '';
			$idSistema = '1';
			
			//filtros
			if(isset($usuario) && $usuario != ''){              $a  = "'".$usuario."'" ;         }else{$a  ="''";}
			if(isset($password) && $password != ''){            $a .= ",'".md5($password)."'" ;  }else{$a .= ",''";}
			if(isset($tipo) && $tipo != ''){                    $a .= ",'".$tipo."'" ;           }else{$a .= ",''";}
			if(isset($idEstado) && $idEstado != ''){            $a .= ",'".$idEstado."'" ;       }else{$a .= ",''";}
			if(isset($email) && $email != ''){                  $a .= ",'".$email."'" ;          }else{$a .= ",''";}
			if(isset($Nombre) && $Nombre != ''){                $a .= ",'".$Nombre."'" ;         }else{$a .= ",''";}
			if(isset($Apellido) && $Apellido != ''){            $a .= ",'".$Apellido."'" ;       }else{$a .= ",''";}
			if(isset($Rut) && $Rut != ''){                      $a .= ",'".$Rut."'" ;            }else{$a .= ",''";}
			if(isset($idCasChile) && $idCasChile != ''){        $a .= ",'".$idCasChile."'" ;     }else{$a .= ",''";}
			if(isset($Direccion_img) && $Direccion_img != ''){  $a .= ",'".$Direccion_img."'" ;  }else{$a .= ",''";}
			if(isset($Ultimo_acceso) && $Ultimo_acceso != ''){  $a .= ",'".$Ultimo_acceso."'" ;  }else{$a .= ",''";}
			if(isset($idSistema) && $idSistema != ''){          $a .= ",'".$idSistema."'" ;      }else{$a .= ",''";}
				
				
			// inserto los datos de registro en la db
			$query  = "INSERT INTO `usuarios_listado` (usuario, password, tipo, idEstado, email, Nombre, Apellido, 
			Rut, idCasChile, Direccion_img, Ultimo_acceso, idSistema) VALUES ({$a} )";
			$result = mysql_query($query, $dbConn);
			
		}else{
			
			//variables
			$usuario = $usuarios['Rut'];
			$tipo = 'Funcionario';
			$email = $usuarios['Email'];
			$Nombre = $usuarios['Nombres'];
			$Apellido = $usuarios['Apellidos'];
			$Rut = $usuarios['Rut'];
			$idCasChile = $usuarios['Id_Funcionario'];
			$idSistema = '1';
			
			
			//Filtros
			$a = "usuario='".$usuario."'" ;
			if(isset($tipo) && $tipo != ''){                    $a .= ",tipo='".$tipo."'" ;}
			if(isset($email) && $email != ''){                  $a .= ",email='".$email."'" ;}
			if(isset($Nombre) && $Nombre != ''){                $a .= ",Nombre='".$Nombre."'" ;}
			if(isset($Apellido) && $Apellido != ''){            $a .= ",Apellido='".$Apellido."'" ;}
			if(isset($Rut) && $Rut != ''){                      $a .= ",Rut='".$Rut."'" ;}
			if(isset($idCasChile) && $idCasChile != ''){        $a .= ",idCasChile='".$idCasChile."'" ;}
			if(isset($idSistema) && $idSistema != ''){          $a .= ",idSistema='".$idSistema."'" ;}
		
			// inserto los datos de registro en la db
			$query  = "UPDATE `usuarios_listado` SET ".$a." WHERE idCasChile = '$idCasChile'";
			$result = mysql_query($query, $dbConn);
			
		}
		
	}




	
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idUsuario,Nombre,email,Direccion,idSistema';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_listado.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_listado.php';	
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
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Usuario creado correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Usuario editado correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Usuario borrado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo notifications_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT Nombre, Apellido, Rut, idCasChile, idSistema, email
FROM `usuarios_listado`
WHERE idUsuario = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	?>
 
<div class="col-lg-6 fcenter">
<div class="box dark">	
<header>		
<div class="icons"><i class="fa fa-edit"></i></div>
		<h5>Modificacion datos del Funcionario</h5>	
		</header>	
		
		<div id="div-1" class="body">	
		<form class="form-horizontal" method="post">		
			
			<?php 
			//Se verifican si existen los datos	
			if(isset($Nombre)) {         $x1  = $Nombre;         }else{$x1  = $rowdata['Nombre'];}
			if(isset($Apellido)) {       $x2  = $Apellido;       }else{$x2  = $rowdata['Apellido'];}
			if(isset($Rut)) {            $x3  = $Rut;            }else{$x3  = $rowdata['Rut'];}
			if(isset($idCasChile)) {     $x4  = $idCasChile;     }else{$x4  = $rowdata['idCasChile'];}
			if(isset($email)) {          $x5  = $email;          }else{$x5  = $rowdata['email'];}
			if(isset($idSistema)) {      $x6  = $idSistema;      }else{$x6  = $rowdata['idSistema'];}

			echo '<h3>Datos Personales</h3>';
			echo form_input('text', 'Nombres', 'Nombre', $x1, 2);
			echo form_input('text', 'Apellidos', 'Apellido', $x2, 2);
			echo form_input_icon('text', 'Rut', 'Rut', $x3, 1,'fa fa-exclamation-triangle');
			echo form_input('text', 'idCasChile', 'idCasChile', $x4, 2);
			echo form_input_icon('text', 'Email', 'email', $x5, 1,'fa fa-envelope-o');
				
			if($arrUsuario['tipo']=='SuperAdmin'){
			echo form_select('Sistema','idSistema', $x6, 2, 'idSistema', 'Nombre', 'core_sistemas', 0, $dbConn);
			}else{
			echo '<input type="hidden" name="idSistema"   value="'.$arrUsuario['idSistema'].'">';
			}
			?>

			<div class="form-group">
				<input type="hidden" name="idUsuario" value="<?php echo $_GET['id']; ?>" >			
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 		
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>		
			</div>
		</form> 
	</div>
</div>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { 
//conexion al seridor
$server = "200.55.192.42";
$sql_conection = mssql_connect($server, "patentes", "k34n/p46jh");  
if (!$sql_conection) {
  	die("Algo sali&oacute; mal mientras se conectaba a la base de datos");
} else {
	if (!mssql_select_db("[Rem_Municipal]", $sql_conection)){    
		  echo "No he podido abrir la base de datos de Patentes Comerciales";
		  exit();
	}else{
		//echo "Conexion exitosa";
	}
}
//se cuenta la cantidad de usuarios en el sistema CAS
$query = "SELECT COUNT(Id_Funcionario) AS cuenta 
FROM FichaFuncionario 
WHERE Activo=0";
$resultado = mssql_query( $query, $sql_conection );
$rowCas = mssql_fetch_assoc ($resultado);	 

//se cuenta la cantidad de usuarios en el sistema Interno
$query = "SELECT COUNT(idUsuario) AS cuenta 
FROM `usuarios_listado`
WHERE idEstado = 1 AND tipo='Funcionario'";
$resultado = mysql_query ($query, $dbConn);
$rowInterno = mysql_fetch_assoc ($resultado);	 
	 
	 ?>
 <div class="col-lg-6 fcenter">
	<div class="box dark">	
		<header>		
			<div class="icons"><i class="fa fa-edit"></i></div>		
			<h5>Importar Funcionarios</h5>	
		</header>	
		<div id="div-1" class="body">	
			<p class="text-muted"><strong>Usuarios CAS Chile Activos : </strong> <?php echo $rowCas['cuenta']; ?></p>
			<p class="text-muted"><strong>Usuarios en el sistema Activos : </strong> <?php echo $rowInterno['cuenta']; ?></p>
			
			<div class="form-group">		
				<a href="<?php echo $location.'&sincronizar=true'; ?>" class="btn btn-primary fright margin_width" data-original-title="" title="">Sincronizar</a>		
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>		
			</div>
			<div class="clearfix"></div>    
		</div>
	</div>
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
	$comienzo = 0 ;$num_pag = 1 ;
} else {
	$comienzo = ( $num_pag - 1 ) * $cant_reg ;
}
//Variable con la ubicacion
$z="WHERE usuarios_listado.tipo='Funcionario'";
//Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
	$z.=" AND usuarios_listado.idSistema>=0";	
}else{
	$z.=" AND usuarios_listado.idSistema={$arrUsuario['idSistema']}";	
}
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z.=" AND usuarios_listado.Rut LIKE '%{$_GET['search']}%' ";	
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idUsuario FROM `usuarios_listado` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT 
usuarios_listado.idUsuario,
usuarios_listado.usuario,
usuarios_listado.Nombre,
usuarios_listado.Apellido,
usuarios_listado.Rut,
usuarios_listado.Ultimo_acceso,
usuarios_estado.Nombre AS estado
FROM `usuarios_listado`
LEFT JOIN `usuarios_estado`   ON usuarios_estado.idEstado       = usuarios_listado.idEstado
".$z."
ORDER BY usuarios_listado.tipo ASC, usuarios_listado.usuario ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}
?>

<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Funcionario (Rut)</label>
    <div class="col-lg-5">	
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >		
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Rut">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>	
		</div>
    </div>
</form>
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Importar Funcionarios</a><?php } ?>
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
<div class="box">	
	<header>		
		<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Funcionarios</h5>	
	</header>
        
    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
		<thead>
			<tr role="row">
				<th class="word_break">Rut</th>
				<th class="word_break">Nombre del usuario</th>
				<th>Ultimo acceso</th>
				<th>Estado</th>
				<th width="120">Acciones</th>
			</tr>
		</thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">		
			<td class="word_break"><?php echo $usuarios['usuario']; ?></td>		
			<td class="word_break"><?php echo $usuarios['Nombre'].' '.$usuarios['Apellido']; ?></td>
			<td><?php echo $usuarios['Ultimo_acceso']; ?></td>			
			<td><?php echo $usuarios['estado']; ?></td>		
			<td>
	<?php if ($rowlevel['level']>=1){?><a href="<?php echo 'view_funcionario.php?view='.$usuarios['idUsuario']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
	<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&id='.$usuarios['idUsuario']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php } ?>
	<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$usuarios['idUsuario'];?>			
	<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php } ?>		
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
