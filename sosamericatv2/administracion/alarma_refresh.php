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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';

echo "<div align='left'>"; 
echo "<span class='arial_light_med'>&nbsp; &nbsp; Encontrados ".$numeroRegistros." resultados a las ".date('H:i:s')."<br>"; 
echo "</span></div>"; 
?>

<table width="98%" align="center" id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable"> 
<thead>
 <tr class="tbl_title">
        <th width="7%"  align="left" height="47" >Tipo<br>Activacion</th>
        <th    height="47">Mensaje del llamado</th>
        <th width="15%" align="left" height="47">Fecha y Hora</th>
        <th width="14%" align="left" height="47">Tel&eacute;fono</th>     
        <th width="14%" align="left" height="47">Destino</th>   		
        <th   height="47">Activador</th>    
		<th width="10%" align="left" height="47">Localizaci&oacute;n</th>    
		<th width="7%"  align="left" >Apagar</th>                           
</tr>
</thead>

<?
$sql2="SELECT * FROM activaciones where estado='1' and tipo_llamada='EMERGENCIA' ORDER BY id_sms ASC "; 
$gral=mysql_query($sql2,$dbConn);
while($registro=mysql_fetch_array($gral)) 
{ 
		$id=$registro["id_sms"];
		$remitente = $registro["remitente"];
		$tipo_llamada = $registro["tipo_llamada"];
		$mensaje=$registro["mensaje"];    
		$fecha_hora=$registro["fecha_hora"]; 
		$origen=$registro["origen"]; 
		$destino=$registro["destino"];
		$municipal=$registro["municipal"];
		$lat=str_replace(",",".",$registro["lat"]);
		$lon=str_replace(",",".",$registro["lon"]); 
$sql ="Select * from ejecutivos where id_ejecutiv=" . $registro["id_usuario"];
$res=mysql_query($sql,$dbConn); 
		while($fila=mysql_fetch_array($res))
		{
		  $nombre=$fila['nom_ejecutiv'];
		}

if ($municipal==0) {

	$estilo="arial_light_med_red";
}else{
	$estilo="arial_light_med";
}

?>
  <!-- tabla de resultados rel=shadowbox;width=700;height=500  --> 
 	<tbody role="alert" aria-live="polite" aria-relevant="all">
 <tr class="odd">
                <td width="7%"  align="left" class=" " height=15>
                <span class=" "><strong><?=$tipo_llamada?></strong></span></td>
                <td  class=" "><?=$mensaje?></td>
                <td width="15%"  align="left" class=" "><?=$fecha_hora?></td>
                <td width="14%"  align="left" class=" "><?=substr($origen,2,10);?></td>  
				<td width="14%"  align="left" class=" "><?=$destino?></td>     
                <td   class=" "><?=$nombre?></td>
				<td width="10%"  align="left" class=" ">
				<a href="detalle_alarmas.php?lon=<?=$lon?>&lat=<?=$lat?>" target=_self  title="Ver Ubicacion" class="icon-ver info-tooltip">
				</a></td>   
				 
				<td width="7%"  align="left" class="arial_10_33">
<FORM language=javascript name="F<?=$id?>" id="<?=$id?>" action="gestion_alarmas.php" method="post" target="_self">
<input  type="hidden" name="descativar" value="si" size="28" >
<input type="hidden" name="apagar" value="<?=$id?>">
<a href="#" onclick="document.F<?=$id?>.submit(); return false"  title="Borrar Alarma" class="icon-borrar info-tooltip"></a>

</form>
</td>
         
</tr>
</tbody>
    
   <!-- fin tabla resultados --> 
<?	
}//fin while
?>

</table>  