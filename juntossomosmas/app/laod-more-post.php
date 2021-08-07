
	<?php
/***********************************************************************************************************
* Facebook Style Auto Scroll Pagination using jQuery and PHP
* Written by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: info@vasplus.info

**********************************Copyright Information*****************************************************
* This script has been released with the aim that it will be useful.
* Please, do not remove this copyright information from the top of this page.
* This script must not be sold.
* All Copy Rights Reserved by Vasplus Programming Blog
*************************************************************************************************************/
 
define('XMBCXRXSKGC', 1);
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';

$sql_vpb = str_replace("3xyzxyz3", " ", $_GET["sql_vpb"]);
$sql_vpb = str_replace("potocaca", "'", $sql_vpb);


$vpb_start = isset($_POST['vpb_start']) && is_numeric($_POST['vpb_start']) ? strip_tags($_POST['vpb_start']) : 'vpb_is_finished';
$vpb_total =  isset($_POST['vpb_total']) && is_numeric($_POST['vpb_total']) ? strip_tags($_POST['vpb_total']) : 'vpb_is_finished';


if($_POST['page'] && !empty($_POST['page']))
{
	if($_POST['page'] == "laod-more-post")
	{
		if( $vpb_start == "vpb_is_finished" || $vpb_total == "vpb_is_finished" )
		{
			echo "vpb_is_finished";
		}
		else {
			$sql_off=$sql_vpb." limit ".$vpb_total." offset ".$vpb_start;
		//	echo $sql_off;
			$check_data = mysql_query($sql_off,$dbConn);
			
			if(mysql_num_rows($check_data) > 0)
			{
				while($row = mysql_fetch_array($check_data))
				{
        		

switch ($_GET["que_es"]) {
        
		
case "foro":
				$sql01 ="SELECT nom_ejecutiv FROM ejecutivos WHERE id_ejecutiv='".$row["id_usuario"]."'";
				$res01=mysql_query($sql01,$dbConn); 
				$row_data01 = mysql_fetch_assoc ($res01);?>

				<div id="vpbconetnts" onclick="vpb_show_text('<?php echo strip_tags($row["id"]); ?>. <?php echo strip_tags($row["texto_respuesta"]); ?>');">
				<div style=" float:left; width:90%;" align="left"><span class="fecha_gris_12"><strong><?php echo $row_data01['nom_ejecutiv'];?></strong></span></div><br>
         
				<div style=" float:left; width:90%;" align="left"><?php echo strip_tags($row["texto_respuesta"]); ?></div>
				<div style=" float:left; width:90%;" align="right"> <span class="fecha_gris_12" align=right><?php echo strip_tags($row["fecha_hora"]); ?></span></div>
				 <br clear="all" />
				</div>
<?
break; case "consultas":
				$query = "SELECT Categoria from preguntas_categorias where idCatPreg=".$row["idCatPreg"];
				$resultado = mysql_query ($query, $dbConn);
				$row_cat = mysql_fetch_assoc ($resultado);
				if ($row['usuario']!=''&&$row['usuario']==$_GET['yo']){ /* NO HACE NADA */ 
					}else{?>
				<div class="q_box2 border_btn">
				<div class="quest">		
				<strong><?=$row_cat["Categoria"]?></strong><br><?=$row['Pregunta']?><br><?=$row['fecha_ingreso']?></div>
				<div class="button">
				<? if ($_GET["militante"]==1) {?>
				<a class="btn_list btn-app" href="<?php echo 'gracias_cel_01.php?donde=porvencer&cat='.$row['idCatPreg'].'&pregunta='.$row['idPregunta'].'&imei='.$_GET['imei'] ?>"><i class="fap fap-eye"></i> Votar</a>
				<?}else{?>
					<? if ($row["abierta"]==1) {?>
							<a class="btn_list btn-app" href="<?php echo 'gracias_cel_01.php?donde=porvencer&cat='.$row['idCatPreg'].'&pregunta='.$row['idPregunta'].'&imei='.$_GET['imei'] ?>"><i class="fap fap-eye"></i> Votar</a>

					<?}}?>
				</div>
				<div class="clear"></div>
				</div>
				<div class="clear"></div>


<? }
break; case "cerradas":
				$query1 = "SELECT Pregunta,idCatPreg,link_data,Opcion1,Opcion2,Opcion3,Opcion4,Opcion5,fecha_ingreso from preguntas where idPregunta=".$row["idPregunta"];
				$resultado1 = mysql_query ($query1, $dbConn);
				$row1= mysql_fetch_assoc ($resultado1);

				$query = "SELECT Categoria from preguntas_categorias where idCatPreg=".$row1["idCatPreg"];
				$resultado = mysql_query ($query, $dbConn);
				$row_cat = mysql_fetch_assoc ($resultado);

				$var_total=0;

				$contador="SELECT COUNT(Respuesta) as total FROM preguntas_resp WHERE idPregunta = ".$row["idPregunta"]." AND Respuesta =1";
				$resultado_contador = mysql_query ($contador, $dbConn);
				$row_contador = mysql_fetch_assoc ($resultado_contador);
				$var_total = $var_total + $row_contador['total'];
				$opcion1 =  $row_contador['total'];

				$contador="SELECT COUNT(Respuesta) as total FROM preguntas_resp WHERE idPregunta = ".$row["idPregunta"]." AND Respuesta =2";
				$resultado_contador = mysql_query ($contador, $dbConn);
				$row_contador = mysql_fetch_assoc ($resultado_contador);
				$var_total = $var_total + $row_contador['total'];
				$opcion2 =  $row_contador['total'];

if ($row1['Opcion3']!='') {
				$contador="SELECT COUNT(Respuesta) as total FROM preguntas_resp WHERE idPregunta = ".$row["idPregunta"]." AND Respuesta =3";
				$resultado_contador = mysql_query ($contador, $dbConn);
				$row_contador = mysql_fetch_assoc ($resultado_contador);
				$var_total = $var_total + $row_contador['total'];
				$opcion3 =  $row_contador['total'];
}
if ($row1['Opcion4']!='') {
				$contador="SELECT COUNT(Respuesta) as total FROM preguntas_resp WHERE idPregunta = ".$row["idPregunta"]." AND Respuesta =4";
				$resultado_contador = mysql_query ($contador, $dbConn);
				$row_contador = mysql_fetch_assoc ($resultado_contador);
				$var_total = $var_total + $row_contador['total'];
				$opcion4 =  $row_contador['total'];
}
if ($row1['Opcion5']!='') {
				$contador="SELECT COUNT(Respuesta) as total FROM preguntas_resp WHERE idPregunta = ".$row["idPregunta"]." AND Respuesta =5";
				$resultado_contador = mysql_query ($contador, $dbConn);
				$row_contador = mysql_fetch_assoc ($resultado_contador);
				$var_total = $var_total + $row_contador['total'];
				$opcion5 =  $row_contador['total'];
}
				$por_opcion1 = ($opcion1/$var_total)*100;
				$por_opcion2 = ($opcion2/$var_total)*100;

				if ($row1['Opcion3']!='') { $por_opcion3 = ($opcion3/$var_total)*100; }
				if ($row1['Opcion4']!='') { $por_opcion4 = ($opcion4/$var_total)*100; }
				if ($row1['Opcion5']!='') { $por_opcion5 = ($opcion5/$var_total)*100; }
				
				?>

				<div class="q_box2 border_btn">
				<div class="quest">		
				<strong><?=$row_cat["Categoria"]?></strong><br><?=$row1['Pregunta']?><br><?=$row1['fecha_ingreso']?>
				<table align="left">
					<tr><td width="19%" align="center"><span class="arial_tit_gris"><?php echo "Total".'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$var_total; ?></td></tr>
					<tr><td width="19%" align="center"><span class="arial_tit_gris"><?php echo $row1['Opcion1'].'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;('.number_format($por_opcion1, 2).')'; ?>%</td></tr>
					<tr><td width="19%" align="center"><span class="arial_tit_gris"><?php echo $row1['Opcion2'].'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;('.number_format($por_opcion2, 2).')'; ?>%</td></tr>
					<?if ($row1['Opcion3']!='') {?><tr><td width="19%" align="center"><span class="arial_tit_gris"><?php echo $row1['Opcion3'].'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;('.number_format($por_opcion3, 2).')'; ?>%</td></tr><?}?>
					<?if ($row1['Opcion4']!='') {?><tr><td width="19%" align="center"><span class="arial_tit_gris"><?php echo $row1['Opcion4'].'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;('.number_format($por_opcion4, 2).')'; ?>%</td></tr><?}?>
					<?if ($row1['Opcion5']!='') {?><tr><td width="19%" align="center"><span class="arial_tit_gris"><?php echo $row1['Opcion5'].'</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;('.number_format($por_opcion5, 2).')'; ?>%</td></tr><?}?>
					</tr>
				</table>
				</div>
				<?php if ($row1['link_data']!=''){ ?> 
 					<div class="button"><a class="btn_list btn-app" href="<?php echo $row1['link_data'];?>"><i class="fap fap-eye"></i> Link</a></div> 
				<?php }?>
				<div class="clear"></div>
				</div>
				<div class="clear"></div>
<?
break; case "activar":
				$ejecutivos_datos="select nom_ejecutiv FROM ejecutivos WHERE id_ejecutiv=".$row["mi_id"];
				$res011=mysql_query($ejecutivos_datos,$dbConn); 
				$data=mysql_fetch_array($res011);


				$aquiensigo='';
				if ($row["tipo"]=='P') {
					$aquiensigo="Me quiere seguir a mi";
				}else{
					$grupo="select nombre_grupo FROM grupo WHERE id_grupo=".$row["id_sigo"];
					$res011_grupo=mysql_query($grupo,$dbConn); 
					$data_grupo=mysql_fetch_array($res011_grupo);
					$aquiensigo="Quiere seguir al Grupo: ".$data_grupo["nombre_grupo"];
				}
				?>
				<div id="vpbconetnts" >
				<div style=" float:left; width:90%;" align="left"><span class="fecha_gris_12"> 	<strong><?php echo $data['nom_ejecutiv'];?></strong><br>
				<strong><?php echo $aquiensigo;?></strong><br></div><br>
				<div style=" float:left; width:90%;" align="center"><table><tr><td>
				<strong>Aceptar </strong><form id="fsms1<?=$_GET['imei']?>" name="fsms1<?=$_GET['imei']?>" action="activar.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" >
				<input type="hidden" name="valor" value='<?=$row["id"]?>'>
				<input type="hidden" name="nombre" value='<?=$_POST["nombre"]?>'>
				<input id="Seguir1" name="Seguir1" type="image" src="images/invita4.png" value="Seguir" alt="Seguir" width="30"/>
				</form>
				</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>		
				<td><strong>Rechazar </strong><form id="fsms2<?=$_GET['imei']?>" name="fsms2<?=$_GET['imei']?>" action="activar.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" >
				<input type="hidden" name="valor" value='<?=$row["id"]?>'>
				<input type="hidden" name="nombre" value='<?=$_POST["nombre"]?>'>
				<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" width="30"/>
				</form>	
				</td></tr>
				</table></div>
				 <br clear="all" />
				</div>

<?
break; case "eliminar":
				$ejecutivos_datos="select nom_ejecutiv FROM ejecutivos WHERE id_ejecutiv=".$row["mi_id"];
				$res011=mysql_query($ejecutivos_datos,$dbConn); 
				$data=mysql_fetch_array($res011);
				$aquiensigo='';
				if ($row_data01["tipo"]=='P') {
					$aquiensigo="Me sigue a mi";
				}else{
					$grupo="select nombre_grupo FROM grupo WHERE id_grupo=".$row["id_sigo"];
					$res011_grupo=mysql_query($grupo,$dbConn); 
					$data_grupo=mysql_fetch_array($res011_grupo);
					$aquiensigo="Sigue al Grupo: ".$data_grupo["nombre_grupo"];
				}?>

				<div id="vpbconetnts" >
				<div style=" float:left; width:90%;" align="left"><span class="fecha_gris_12"> 	<strong><?php echo $data['nom_ejecutiv'];?></strong><br>
				<strong><?php echo $aquiensigo;?></strong><br></div><br>
				<div style=" float:left; width:90%;" align="center">
				<table><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>		
				<td><strong>Eliminar </strong><form id="fsms2<?=$_GET['imei']?>" name="fsms2<?=$_GET['imei']?>" action="eliminar.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" >
				<input type="hidden" name="valor" value='<?=$row_data01["id"]?>'>
				<input type="hidden" name="nombre" value='<?=$_POST["nombre"]?>'>
				<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" width="30"/>
				</form>	
				</td></tr>
				</table></div>
				 <br clear="all" />
				</div>

<?
break; case "sigues":
				$aquiensigo='';
				if ($row_data01["tipo"]=='P') {
					$ejecutivos_datos="select nom_ejecutiv FROM ejecutivos WHERE id_ejecutiv=".$row["id_sigo"];
					$res011=mysql_query($ejecutivos_datos,$dbConn); 
					$data=mysql_fetch_array($res011);
					$aquiensigo="Persona : ".$data["nom_ejecutiv"];
				}else{
					$grupo="select nombre_grupo FROM grupo WHERE id_grupo=".$row["id_sigo"];
					$res011_grupo=mysql_query($grupo,$dbConn); 
					$data_grupo=mysql_fetch_array($res011_grupo);
				$aquiensigo="Nombre del Grupo: ".$data_grupo["nombre_grupo"];
				}?>

				<div id="vpbconetnts" >
				<div style=" float:left; width:90%;" align="left"><span class="fecha_gris_12"> 	<strong><?php echo $aquiensigo;?></strong><br></div><br>
				<div style=" float:left; width:90%;" align="center">		
				<table><tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>		
						<td align="center"><strong>Eliminarme del Grupo </strong>
						<form id="fsms2<?=$_GET['imei']?>" name="fsms2<?=$_GET['imei']?>" action="siguesa.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" >
						<input type="hidden" name="valor" value='<?=$row_data01["id"]?>'>
						<input type="hidden" name="nombre" value='<?=$_POST["nombre"]?>'>
						<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" width="30"/>
						</form>	
						</td></tr>
				</table></div>
				 <br clear="all" />
				</div>
<?
break; case "bgrupo":
				$topten= " SELECT  COUNT( * ) AS total FROM  ejecutivo_seguidores where id_sigo=".$row["id_grupo"]." and tipo='G'";
				$resultado = mysql_query ($topten, $dbConn);
				$pregunta = mysql_fetch_assoc ($resultado);
				$cuantos_siguen=$pregunta['total']-1;
				if ($cuantos_siguen<0) {
					$cuantos_siguen=0;
				}

				$ejecutivos_creador="select nom_ejecutiv,id_ejecutiv FROM ejecutivos WHERE id_ejecutiv=".$row["creador"];
				$res01_creador=mysql_query($ejecutivos_creador,$dbConn); 
				$row_creador = mysql_fetch_assoc ($res01_creador)?>
				<div id="vpbconetnts" >
				<? if ($row["creador"]==$_GET["yo"]) {?>
						<div style=" float:left; width:90%;" align="left"><strong>Nombre Grupo:</strong> <?php echo $row['nombre_grupo'];?><br><strong>Creador: </strong><?php echo $row_creador['nom_ejecutiv'];?><br><strong>Seguidores: </strong><?php echo $cuantos_siguen;?><br></div>
				<?}else{?>
						<div style=" float:left; width:90%;" align="left"><strong>Nombre Grupo:</strong> <?php echo $row['nombre_grupo'];?><br><strong>Creador: </strong><?php echo $row_creador['nom_ejecutiv'];?><br><strong>Seguidores: </strong><?php echo $cuantos_siguen;?><br>
						</div>
				<?
				$query_sigo = "SELECT id from ejecutivo_seguidores where mi_id=".$_GET["yo"]." and id_sigo=".$row["id_grupo"]." and tipo='G'";
				$resultado_sigo = mysql_query ($query_sigo, $dbConn);
				$numeroRegistros_sigo=mysql_num_rows($resultado_sigo); 
				if ($numeroRegistros_sigo==0){		?>
					<form id="fsms1<?=$_GET['imei']?>" name="fsms1<?=$_GET['imei']?>" action="buscargrupo.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" >
					<input type="hidden" name="valor" value='<?=$row["id_grupo"]?>'>
					<input type="hidden" name="nombre" value='<?=$_POST["nombre"]?>'>
					<input type="hidden" name="creador" value='<?=$row["creador"]?>'>
					<input id="Seguir1" name="Seguir1" type="image" src="images/invita4.png" value="Seguir" alt="Seguir" width="30"/>
					</form>		
				<?}else{?>
					<form id="fsms2<?=$_GET['imei']?>" name="fsms2<?=$_GET['imei']?>" action="buscargrupo.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" >
					<input type="hidden" name="valor" value='<?=$row["id_grupo"]?>'>
					<input type="hidden" name="nombre" value='<?=$_POST["nombre"]?>'>
					<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" width="30"/>
					</form>	
				<?	}
				}?>
				 <br clear="all" />
				</div>
<?
break; case "dforo":
				$query2 = "SELECT id from respuesta where id_mensaje=".$row["id"];
				$resultado2 = mysql_query ($query2, $dbConn);
				$numeroRegistros_respuesta=mysql_num_rows($resultado2); 
				?>
				<div id="vpbconetnts" >
				

				

				<div style=" float:right; width:30%;" align="right"><span class="fecha_gris_12"><strong>Cerrar</strong></span>
				<form id="fsms1<?=$_GET['imei']?>" name="fsms1<?=$_GET['imei']?>" action="desactivarforos.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" >
				<input type="hidden" name="valor" value='<?=$row["id"]?>'>
				<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" width="25"/>
				</form>
				</div><div style=" float:justify; width:70%;" align="justify"><span class="fecha_gris_12"><?php echo $row['mensaje'];?>.<br><br><span class="fecha_gris_12"> <?php echo $row['fecha_hora'];?></span>
				
				</div>
				<div style=" float:left; width:70%;" align="left">Comentarios: <?php echo $numeroRegistros_respuesta;?><br></div>
				<div class="clear"></div>
				</div>
	
<br clear="all" />
</div>
<?
break; case "factivos":
				$foro = "foro0.php";
				$query = "SELECT id,mensaje,grupo,fecha_hora,subcategoria from mensajes where estado='0' and categoria='99' and grupo=".$row["id_sigo"]." ORDER BY id DESC ";
				$resultado = mysql_query ($query, $dbConn);
				while ( $pregunta = mysql_fetch_assoc ($resultado)) {
					$sql011 ="SELECT nombre_grupo,creador FROM grupo WHERE id_grupo='".$pregunta['grupo']."'";
					$res011=mysql_query($sql011,$dbConn); 
					$row_data011 = mysql_fetch_assoc ($res011);
					$sql01 ="SELECT nom_ejecutiv FROM ejecutivos WHERE id_ejecutiv='".$row_data011['creador']."'";
					$res01=mysql_query($sql01,$dbConn); 
					$row_data01 = mysql_fetch_assoc ($res01);

					$cuento_posteo="SELECT * FROM respuesta WHERE id_mensaje =".$pregunta['id']." and texto_respuesta<>'' and estado=1 ";
					$cuento_posteo1=mysql_query($cuento_posteo,$dbConn);
					$cuento_posteo11=mysql_num_rows($cuento_posteo1); 
				?>
				<!-- GRUPOS -->
				<div id="vpbconetnts" >
				<? if ($yosigo["id_sigo"]==$_GET["yo"]) {?>
					<div style=" float:left; width:70%;"><span class="fecha_gris_12"><?php echo $row_data01['nom_ejecutiv'];?></span></div><div class="clear"></div><br>
				<?}else{?>
				<div style=" float:left; width:70%;">
				<span class="fecha_gris_12"><strong><?php echo $row_data011['nombre_grupo'];?></strong>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;<?php echo $row_data01['nom_ejecutiv'];?>
				<br><font color="#ff0000"><? echo $cuento_posteo11;?> Comentarios</font>
				</span><div class="clear"></div></div>
				<?
					if ($row_data011["creador"]!=$_GET["yo"]) {?>

						<div style="float:right; width:30%;" align="right">
<span class="fecha_gris_12"><strong>Eliminarme</strong></span>
								<form id="fsms1<?=$_GET['imei']?>" name="fsms1<?=$_GET['imei']?>" action="migrupo.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" >
								<input type="hidden" name="valor" value='<?=$yosigo["id_sigo"]?>'>
								<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" width="32"/></strong>
								</form><br>
											  <!--div class="button" style=" float:right; width:90%;" align="right">
			   <a class="btn_list btn-app" href="<?php echo $foro.'?cat='.$pregunta['id'].'&imei='.$_GET['imei'] ?>"><i class="fap fap-eye"></i> Ver</a>
			   </div-->
				
				</div>
				<?}?>
				

				<?}?>
															  <div class="button" style=" float:right; width:90%;" align="right">
			   <a class="btn_list btn-app" href="<?php echo $foro.'?cat='.$pregunta['id'].'&imei='.$_GET['imei'] ?>"><i class="fap fap-eye"></i> Ver</a>
			   </div>
				<div style=" float:justify; width:70%;" align="justify"><span class="fecha_gris_12"><?php echo $pregunta['mensaje'];?></span></div><br>
				<div style=" float:right; width:30%;" align="right"><span class="fecha_gris_12"> <?php echo $pregunta['fecha_hora'];?></span><br></div>
   

			    <div class="clear"></div>
				</div>
	
<br clear="all" />
</div>

<?
		}	

break; case "mensajes":
				$foro = "foro0.php";
				$query = "SELECT * FROM respuesta WHERE id_mensaje =".$row['id']." and texto_respuesta<>'' and estado=0 ORDER BY id DESC ";
				$resultado = mysql_query ($query, $dbConn);
				while ( $pregunta = mysql_fetch_assoc ($resultado)) {
					$sql011 ="SELECT nombre_grupo,creador FROM grupo WHERE id_grupo='".$row['grupo']."'";
					$res011=mysql_query($sql011,$dbConn); 
					$row_data011 = mysql_fetch_assoc ($res011);
					$sql01 ="SELECT nom_ejecutiv FROM ejecutivos WHERE id_ejecutiv='".$pregunta['id_usuario']."'";
					$res01=mysql_query($sql01,$dbConn); 
					$row_data01 = mysql_fetch_assoc ($res01);

				?>

				<div id="vpbconetnts" >
				<div style=" float:left; width:90%;" align="left">
					<span class="fecha_gris_12">
					
					<b><font color="#ff0000"><?php echo $row_data011['nombre_grupo'];?>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;<?php echo $row_data01['nom_ejecutiv'];?></font></b><br>
								
				<span class="fecha_gris_12"> <?php echo $pregunta['fecha_hora'];?></span><br>
				
				</div>
				<div style=" float:justify; width:70%;" align="justify"><span class="fecha_gris_12"><?php echo $pregunta['texto_respuesta'];?></span></div><br>
		
	

				<div style=" float:left; width:90%;" align="center">
					<table width="100%">
					<tr>
					<td  width="40%" align="center">
					<strong>Aceptar </strong>
					<form id="fsms1<?=$_GET['imei']?>" name="fsms1<?=$_GET['imei']?>" action="activarforos.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" >
					<input type="hidden" name="valor" value='<?=$pregunta["id"]?>'>
					<input id="Seguir1" name="Seguir1" type="image" src="images/invita4.png" value="Seguir" alt="Seguir" width="30"/>
					</form>
					</td>
					<td  width="20%" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>		
					<td  width="40%" align="center"><strong>Rechazar </strong><form id="fsms2<?=$_GET['imei']?>" name="fsms2<?=$_GET['imei']?>" 	action="activarforos.php?id=<?=$_GET['id']?>&longitud=<?=$_GET['longitud']?>&latitud=<?=$_GET['latitud']?>&imei=<?=$_GET['imei']?>"  method="post" target="_self" >
					<input type="hidden" name="valor" value='<?=$pregunta["id"]?>'>
					<input id="Elimina" name="Elimina" type="image" src="images/elimina2.png" value="Eliminar" alt="Eliminar" width="30"/>
					</form>	
					</td></tr>
					</table>
				</div>

				  <div class="clear"></div>
				</div>
	
<br clear="all" />
</div>



		

<?
		}	
break;


}




				}
			}
			else
			{
				echo "vpb_is_finished". $sql_vpb;
			}
		}
	}
	else
	{
		echo 'vpb_loading_error'. $sql_vpb;
	}
}

?>