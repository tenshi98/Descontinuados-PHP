<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';

// obtengo puntero de conexion con la db
$dbConn = conectar();

// Se traen todos los datos 
$query = "SELECT 
background_color, 
usr_img_border, 
usr_img_border_radius, 
usr_img_shadow, 
usr_img_width,
usr_name_lettersize,
usr_name_lettercolor,
usr_name_pat_lettersize,
usr_name_pat_lettercolor,
usr_name_pat_lettersize_2,
usr_name_pat_lettercolor_2
FROM `app_ajustes_generales`
WHERE id = {$_GET['app_conf']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
//Se revisa si se entrega algun valor por get
$z="";
if (isset($_GET['viewgrilla'])){
	$z.="WHERE app_areas_listado.idArea = {$_GET['viewgrilla']}";	
}
if (isset($_GET['view'])){
	$z.="WHERE app_areas_listado.idPagelist = {$_GET['view']}";	
}
// Se trae un listado con todos los elementos de la grilla
$query = "SELECT  
app_areas_listado.idArea  AS bloque,
app_areas_listado.Codigo,
app_areas_elementos.Nombre,
app_areas_elementos.Orden,
app_areas_elementos.body_col,
app_areas_elementos.body_fil,
app_areas_elementos.grid_color,
app_areas_elementos.grid_border,
app_areas_elementos.grid_shadow,
app_areas_elementos.grid_img,
app_areas_elementos.url_img
FROM `app_areas_listado`
LEFT JOIN `app_areas_elementos`        ON app_areas_elementos.idArea         = app_areas_listado.idArea
".$z."
ORDER BY app_areas_listado.Orden , app_areas_elementos.Orden ASC";
$resultado = mysql_query ($query, $dbConn);
while ($row_origen[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($row_origen);
//array_multisort($row_origen, SORT_ASC);


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>test</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/estilo.css">

</head>
<body class="<?php echo $rowdata['background_color'] ?>">
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
                <div class="box_col_1 <?php echo $idcomp['grid_color'].' '.$idcomp['grid_border'].' '.$idcomp['grid_shadow'].' '.$idcomp['grid_img'] ?>">
                    <a href="#">
                        <img src="img/btn/<?php echo $idcomp['url_img'] ?>" border="0" />
                    </a>
                </div>
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
                <div class="box_col_1 <?php echo $idcomp['grid_color'].' '.$idcomp['grid_border'].' '.$idcomp['grid_shadow'].' '.$idcomp['grid_img'] ?>">
                    <a href="#">
                        <img src="img/btn/<?php echo $idcomp['url_img'] ?>" border="0" />
                    </a>
                </div>
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
                <div class="box_col_1 <?php echo $idcomp['grid_color'].' '.$idcomp['grid_border'].' '.$idcomp['grid_shadow'].' '.$idcomp['grid_img'] ?>">
                    <a href="#">
                        <img src="img/btn/<?php echo $idcomp['url_img'] ?>" border="0" />
                    </a>
                </div>
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
                <div class="box_col_1 <?php echo $idcomp['grid_color'].' '.$idcomp['grid_border'].' '.$idcomp['grid_shadow'].' '.$idcomp['grid_img'] ?>">
                    <a href="#">
                        <img src="img/btn/<?php echo $idcomp['url_img'] ?>" border="0" />
                    </a>
                </div>
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
                    <img src="<?php echo $idcomp['url_img'] ?>" border="0" />
                </div>
            </td>
        </tr>
        <?php } ?> 
        </table>  
     <?php break;
	 
	 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 case "subtitle fancy";?>
     <?php foreach ($componentes as $idcomp) { ?>
     	<p class="<?php echo $idcomp['Codigo'] ?>"><span><?php echo $idcomp['Nombre'] ?></span></p>
     <?php } ?> 
     <?php break;
	 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 case "headline1";?>
     <?php foreach ($componentes as $idcomp) { ?>
     	<p class="<?php echo $idcomp['Codigo'] ?>"><span><?php echo $idcomp['Nombre'] ?></span></p>
     <?php } ?>
     <?php break;
	 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 case "headline2";?>
     <?php foreach ($componentes as $idcomp) { ?>
     	<p class="<?php echo $idcomp['Codigo'] ?>"><span><?php echo $idcomp['Nombre'] ?></span></p>
     <?php } ?>
     <?php break;
	 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 case "headline3";?>
     <?php foreach ($componentes as $idcomp) { ?>
     	<p class="<?php echo $idcomp['Codigo'] ?>"><span><?php echo $idcomp['Nombre'] ?></span></p>
     <?php } ?>
     <?php break;
	  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	 case "tb_user";?>
     <table class="<?php echo $rowdata['Codigo'] ?>">
        <tr>
            <td> 
                <div class="cover"> 
                      <img src="img/avatar.jpg" class="<?php echo $rowdata['usr_img_border'].' '.$rowdata['usr_img_border_radius'].' '.$rowdata['usr_img_shadow'].' '.$rowdata['usr_img_width'] ?>" /> 
                      <p class="name <?php echo $rowdata['usr_name_lettersize'].' '.$rowdata['usr_name_lettercolor'] ?>">Bienvenido</p>
                      <p class="name_pat <?php echo $rowdata['usr_name_pat_lettersize'].' '.$rowdata['usr_name_pat_lettercolor'] ?>">Visita</p> 
                      <p class="name_pat2 <?php echo $rowdata['usr_name_pat_lettersize_2'].' '.$rowdata['usr_name_pat_lettercolor_2'] ?>">Datos</p>                         
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

</body>
</html>