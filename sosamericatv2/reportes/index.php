<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once('../nombre_pag.php');
require_once('../conexion.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>


<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<script type="text/javascript" src="../scripts/FuncJScript.js"></script>

    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script src="../scripts/jquery.alerts.js" type="text/javascript"></script>
    <link href="../scripts/jquery.alerts.css" rel="stylesheet" type="text/css" />   
<script type="text/javascript">
function validaRut() {
	var x=document.forms["form1"]["rutpersona"].value
	if (x==null || x=="") {
		//alert("El Rut NO puede estar en blanco");
		jAlert("El Rut NO puede estar en blanco", "Error");
		form1.rutpersona.focus();	
		return false;
	} 
    if (x.length < 3) {
		// alert("Rut ingresado NO es v\xE1lido");
		 jAlert("Rut ingresado NO es v\xE1lido", "Error");
		form1.rutpersona.focus();	
	    return false;
	}

	var suma=0;
	var arrRut = x.split("-");
	var rutSolo = arrRut[0];
	var verif = arrRut[1];
	var continuar = true;
	for(i=2;continuar;i++){
	  suma += (rutSolo%10)*i;
	  rutSolo = parseInt((rutSolo /10));
	  i=(i==7)?1:i;
	  continuar = (rutSolo == 0)?false:true;
	}
	resto = suma%11;
	dv = 11-resto;
	if(dv==10){
	if(verif.toUpperCase() == 'K')
	   return true;
	}
	else if (dv == 11 && verif == 0)
	  return true;
	else if (dv == verif)
	  return true;
	else
	  alert("El valor ingresado NO es un Rut v\xE1lido");
	  //jAlert("El valor ingresado NO es un Rut v\xE1lido", "Error");
	  form1.rutpersona.focus();	
	  return false;
	}
</script>
</head >

<body>
<div id="nonFooter" width="100%">
 <table bgcolor="#999999" width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td align="center" valign="middle"><table width="990" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="58%" align="right" valign="middle" class="google_fjalla_bco"><table border="0" cellpadding="0" cellspacing="0" class="logo_flot">
          <tr>
            <td><img src="../images/logo.png" height="200" /></td>
          </tr>
        </table>
          Reportes <?=$nombreurl?></td>
        <td width="42%" height="50" align="center" valign="middle">
		<input name="button" type="submit" class="bot_sombra_izq" id="button" value="" />
          <input name="button2" type="submit" class="bot_sombra_cent" id="button2" value="Volver"  onclick="javascript:window.location.href='http://<?=$nombreurl?>/admin';"/>
          <input name="button4" type="submit" class="bot_sombra_der" id="button4" value="" /></td>
      </tr>
    </table></td>
    </tr>
</table>

<table id="table3" border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
              <td height=75>&nbsp;</td>
              </tr>

          </table>



			<table width="990" border="0" cellpadding="0" cellspacing="0" class="tabla_bca_sombra" align="center">
                  <tr>
                    <td align="center">

					<table width="90%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" valign="middle" height=50>

<table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
                          <tbody>
                            <tr>
                              <td align="center" valign="middle" class="google_fjalla_gde">Notificaciones<br />
                                <span class="arial_light_med">Visualizaci&oacute;n de Visitas por Mensaje Emitido</span><br></td>

                            </tr>
                            <tr></tr>
                          </tbody>
</table>

						</td>
                      </tr>
                      <tr>
                        <td>
						
<table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
                          <tbody>
                            <tr>
                              <td align="center" valign="middle" class="google_fjalla_gde">Men&uacute; de Opciones<br />
                                <span class="arial_light_med">&nbsp;</span></td>
                            </tr>
                            <tr></tr>
                          </tbody>
</table>
						
						</td>
                      </tr>
                      <tr>
                        <td>
						
				  
                          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
						    <form method="post" id="menu_form" action="mensajes_fecha.php">
							<input type="hidden" name="dedonde" value="menuppal">
                            <tr>
                              <td width="40%" height="60" align="left">
							    <span class="arial_tit_gris">Históricos mensaje por Fecha</span><br />
                                <span class="arial_light_med">Vizualiza Los Mensajes de una fecha determinada</span></td>
                              <td width="50%">
							    <span class="arial_gris_med">
									<select name="fecha" class="arial_light_combo" id="fecha">
									<option value="0" SELECTED>Selecciona la Fecha</option>
						<?
						$SQL_lee4=" SELECT SUBSTR( fecha_hora, 7, 4 ) AS ano, SUBSTR( fecha_hora, 4, 2 ) AS mes, SUBSTR( fecha_hora, 1, 2 ) AS dia FROM mensajes GROUP BY SUBSTR( fecha_hora, 7, 4 ) , SUBSTR( fecha_hora, 4, 2 ) , SUBSTR( fecha_hora, 1, 2 ) ORDER BY SUBSTR( fecha_hora, 7, 4 ) DESC , SUBSTR( fecha_hora, 4, 2 ) DESC , SUBSTR( fecha_hora, 1, 2 ) DESC ";
						
						$res=mysql_query($SQL_lee4,$base); 
						
						while($fila=mysql_fetch_array($res)) {
								$fecha = $fila["dia"]."/".$fila["mes"]."/".$fila["ano"];
								echo $fecha;
								?>
								
							<option value="<?=$fecha?>"><?=$fecha?></option>
							
						
						<? }?>
						</select>
									

                              </span></td>
                              <td width="10%"><input name="button6" type="submit" class="bot_sombra" id="button6" value="Ingresar" /></td>
                            </tr></form>
                          </table>




                          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <form method="post" id="menu_form" action="detalle_mensaje.php">
							<input type="hidden" name="dedonde" value="menuppal">
						    <tr>
                              <td width="40%" height="60" align="left">
							    <span class="arial_tit_gris">Históricos por Mensaje</span><br />
                                <span class="arial_light_med">Vizualiza Las Visitas por Mensajes</span></td>
                              <td width="50%"><span class="arial_gris_med">
                                <select name="id_mensaje" class="arial_light_combo" id="id_mensaje">
								<option value="0" SELECTED>Selecciona el Mensaje</option>

				<?
				$SQL_lee4="select id ,mensaje  from mensajes where id_alerta=0  order by id desc";
				$res=mysql_query($SQL_lee4,$base); 
				
				while($fila=mysql_fetch_array($res)) {
						$mensaje = $fila["mensaje"];
						$id = $fila["id"];
				

						?>
						
					<option value="<?=$id?>"><?=$mensaje?></option>

				<?}?>
								</select>

                              </span></td>
                              <td width="10%"><input name="button7" type="submit" class="bot_sombra" id="button7" value="Ingresar" /></td>
                            </tr>
							</form>
                          </table>
						  
	
					
					<table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <form method="post" id="menu_categoria" action="detalle_categoria.php">
							<input type="hidden" name="dedonde" value="menuppal">
						    <tr>
                              <td width="40%" height="60" align="left">
							    <span class="arial_tit_gris">Históricos por Categorias</span><br />
                                <span class="arial_light_med">Vizualiza Las Visitas por Categorias</span></td>
                              <td width="50%"><span class="arial_gris_med">


     <select name="categoria" required="required" class="arial_light_cuadro">
		<option value='0'>Todas las Categorias</option>
		<?php //consulta
		$SQL_categoria=" SELECT id_categoria,descripcion FROM preferencias_categorias ORDER BY descripcion ASC";

		$categoria=mysql_query($SQL_categoria,$base_padron); 
		while($fila_categoria=mysql_fetch_array($categoria)) {?>
		<option value="<?php echo $fila_categoria["id_categoria"]; ?>" ><?php echo $fila_categoria["descripcion"]; ?></option>
		<? } ?>
	</select>
								
<br><br>
     <select name="subcategoria" required="required" class="arial_light_cuadro">
		<option value='0'>Todas las SubCategorias</option>
		<?php //consulta
		$SQL_categoria=" SELECT id_subcategoria,descripcion FROM preferencias_subcategoria ORDER BY descripcion ASC";
		$categoria=mysql_query($SQL_categoria,$base_padron); 
		while($fila_categoria=mysql_fetch_array($categoria)) {?>
		<option value="<?php echo $fila_categoria["id_subcategoria"]; ?>" ><?php echo $fila_categoria["descripcion"]; ?></option>
		<?php } ?>
	</select>
					
                              </span></td>
                              <td width="10%"><input name="button7" type="submit" class="bot_sombra" id="button7" value="Ingresar" /></td>
                            </tr>
							</form>
                          </table>
						  

   <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <form method="post" id="menu_rut" action="detalle_rut.php">
							<input type="hidden" name="dedonde" value="menuppal">
						    <tr>
                              <td width="40%" height="60" align="left">
							    <span class="arial_tit_gris">Históricos por Rut</span><br />
                                <span class="arial_light_med">Vizualiza Las Visitas por Rut</span></td>
                              <td width="50%"><span class="arial_gris_med">
                                
					<input name="rutpersona" type="text"  id="rutpersona" size="50" maxlength="20"  placeholder="Ej: 12345678-9" style="width:220px !important;"/>
                              </span></td>
                              <td width="10%"><input name="button7" type="submit" class="bot_sombra" id="button7" value="Ingresar" /></td>
                            </tr>
							</form>
                          </table>

						  </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table>
					
					</td>
  </tr>
</table>
					</td>
  </tr>
</table>

   

<!--Tabla de margen frente al footer -->

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="70">&nbsp;</td>
  </tr>
</table>

<!--Fin de la Tabla de margen frente al footer -->

</div> 

<div align=center>
  <!-- PIE -->

<?   
    require_once('../inc/pie.incl');  
?>  

  <!-- PIE -->
</div> 


</body>
</html>
