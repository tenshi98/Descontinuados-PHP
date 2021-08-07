<?php
require_once('../nombre_pag.php');
require_once('../conexion.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>..:: <?=$pagina?> ::..</title>
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<link href="../estilo.css" rel="stylesheet" type="text/css" />
<link href="../estilo_bot.css" rel="stylesheet" type="text/css" />
</head>
<body>


<table align="center" width="990" border="0" cellspacing="0" cellpadding="0" background="http://<?=$nombreurl?>/images/body_body.png">
  <tr><td align="center" valign="top" ><?  require_once('../inc/cabecera_admin.incl'); ?></td></tr>

  <tr><td align="center" valign="top"  height=10><?  require_once('../inc/bot_admin.incl'); ?></td></tr>
<tr><td align="center" valign="top" height=600>
<!-- CONTENIDO -->	

<div align="center">
<br><br><br><br>



	<TABLE width=70%>
	<TR>
	<TD class="arial_tit_calip" width=30% >Sugerencia para convertir</TD>
	<TD width=70%><a href="http://video.online-convert.com/convert-to-flv"  onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('selec0','','../images/convierte_flv_up.jpg',1)" target=_blank>
					<img src="../images/convierte_flv.jpg" name=selec0 id=selec0 border=0   /></a></TD>
	</TR>
	<TR>
	<TD class="arial_tit_calip" width=30% height=10>&nbsp;</TD>
	<TD width=70%>&nbsp;</TD>
	</TR>
	<TR>
	<TD class="arial_tit_calip" width=30% >Tutorial de conversion</TD>
	<TD width=70%>
		<TABLE>
		<TR>
		<TD width=10%><input type="button" class='button3' onclick="window.location = 'http://<?=$nombreurl?>/admin/tutorial_convertir.php';" value="Ver Tutorial" /></TD>
		</TR>
		</TABLE>
	</TD>
	</TR>
<form action="subido.php" method="post" enctype="multipart/form-data">
<TR><TD class="arial_tit_calip" width=30% height=10>&nbsp;</TD><TD width=70%>&nbsp;</TD></TR>
	<TR>
	<TD class="arial_tit_calip" width=30%> Archivo:  (Sin espacios ni comas)</TD>
	<TD width="70%"><input type="file" name="archivo" size="35"  /></TD>
	</TR>
	<TR><TD class="arial_tit_calip" width=30% height=10>&nbsp;</TD><TD width=70%>&nbsp;</TD></TR>
	<TR>
	<TD class="arial_tit_calip" width=30%> Categoría:  </TD>
	<TD width=70%>
	<select name="tipo_video" id="tipo_video" class="cajaGris" >
	<option value="0" SELECTED>Selecciona la Categoria del Video</option>
	<?
	$SQL_lee4="select * from dh_tipo_video order by descripcion asc";
			$res1=mysql_query($SQL_lee4,$base); 
			while($fila2=mysql_fetch_array($res1))
			{
			$descripcion = $fila2["descripcion"];
			$id_tipo = $fila2["id_tipo"];
			echo "<option value='". $id_tipo ."'>&nbsp;&nbsp;" . $descripcion . "</option>";
			}

	?>
	</select>
	</TD>
	</TR>
	<TR><TD class="arial_tit_calip" width=30% height=10>&nbsp;</TD><TD width=70%>&nbsp;</TD></TR>
	<TR>
	<TD class="arial_tit_calip" width=30%> Asunto del Video:  </TD>
	<TD width="70%"><input name="asunto" type="text" size="50"></TD>
	</TR>
	
	<TR><TD class="arial_tit_calip" width=30% height=10>&nbsp;</TD><TD width=70%>&nbsp;</TD></TR>
	<TR>
	<TD class="arial_tit_calip" width=30%> Comenzar la carga  </TD>
	<TD width=70% align=left><TABLE><TR><TD width=10%><input name="submit" type="submit" value="Subir" class='button3' size="50" ></TD></TR></TABLE>
	</TD>
	</TR>
	</TABLE>
</form>	





<!-- CONTENIDO -->
</td>
</tr>

</table>
<!--Pie -->			
			
			
		<?  require_once('../inc/pie.incl'); ?>  	
			
			
			
<!-- Pie -->
</body>
</html>
