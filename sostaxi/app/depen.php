<?php
//echo "lon  ".$_GET["longitud"]."  lat  ".$_GET["latitud"]."  imei     ".$_GET["imei"]."  gm     ".$_GET["id"];

/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
?>
<!DOCTYPE html 
      PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<title>Listas dependientes con PHP y mySQL</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript">
/************************************************
 Listas dependientes por Tunait!(5/1/04)
 Si quieres usar este script en tu sitio eres libre de hacerlo con la condición
 de que permanezcan intactas estas líneas, osea, los créditos.
 No autorizo a publicar y ofrecer el código en sitios de script sin previa autorización
 Si quieres publicarlo, por favor, contacta conmigo.
 http://javascript.tunait.com/
 tunait@yahoo.com
*************************************************/
<!--
function slctr(texto,valor){
   this.texto = texto
   this.valor = valor
}
function slctryole(cual,donde){
   if(cual.selectedIndex != 0){
      donde.length=0
      cual = eval(cual.value)
      for(m=0;m<cual.length;m++){
         var nuevaOpcion = new Option(cual[m].texto);
         donde.options[m] = nuevaOpcion;
         if(cual[m].valor != null){
            donde.options[m].value = cual[m].valor
         }
         else{
            donde.options[m].value = cual[m].texto
         }
      }
   }
}
<?
$query = mysql_query("select * from regiones order by region",$dbConn); 
echo $query;
$categorias_padre = array();
while($res = mysql_fetch_assoc($query)){ 
   $contador = 0;
    if($res["id_categoria_padre"] == 0) $categorias_padre[$res["region"]] = $res["descripcion"];

   //$categorias_padre[$res["region"]] = $res["descripcion"];
?>
var cat_<?=$res["region"] ?>=new Array()
   cat_<?=$res["region"]."[".$contador++ ?>] = new slctr('- -<?=$res["region"] ?>- -')
<? 

   $query2 = mysql_query("select idcomu, comunas from comuna where reg = ". $res["region"]. " order by comunas",$dbConn);

   while($res2 = mysql_fetch_assoc($query2)){ ?>
      cat_<?=$res["region"]."[".$contador++ ?>] = new slctr("<?=$res2["idcomu"]?>","<?=$res2["comunas"]?>")
<? } 
 }
?>
//-->
</script>
</head>
<body>
<form>
  <fieldset>
   <select name="select" onchange="slctryole(this,this.form.select2)">
      <option>- - Seleccionar - -</option>
<?
   foreach($categorias_padre as $idd =>$cat){ ?>
      <option value="<?=$idd?>"><?=$cat?></option>
<?
       }
?>
   </select>
   <select name="select2" >
      <option>xxx- - - - - -</option>
   </select>

  </fieldset>
</form>
</body>
</html>
