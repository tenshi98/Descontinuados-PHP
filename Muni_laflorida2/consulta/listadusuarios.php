<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
 $fecha = date("d/m/Y"); 
// require_once('../nombre_pag.php');
    //conectar BD
    include("conectar_bd.php"); 
    conectar_bd();
// usuario y tipo de usuario
//$tipo2=$_GET["t"];
// $user2=$_GET["u"];


 ?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>.:: Mantenedor de Atenciones Virtuales ::.</title>
<link href="./css/estilo.css" rel="stylesheet" type="text/css" />
<link href="./css/style.css" rel="stylesheet" type="text/css" />
<link href="./css/tabla.css" rel="stylesheet" type="text/css" />

    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script type='text/javascript' src='js/infogrid.js'></script>

		<link rel="stylesheet" media="all" type="text/css" href="./impromptu/jquery-impromptu.css" />

		<style type="text/css">			
			/* body,img,p,h1,h2,h3,h4,h5,h6,fieldset,form,table,td,ul,li,pre,blockquote,code{ margin:0; padding:0; border:0; }
			body{ font: 100% Georgia, "Times New Roman", serif; background-color: #ffffff; color: #565656; text-align: center; } */
			div.wrapper{ position: static; margin: 0 0 0 0 0; width: 960px; text-align: left; border: solid 1px #aaaaaa;}
			#users{  }
			#users .user{ border: solid 0px #bbbbbb; background-color: #FFFFFF; padding: 5px; margin: 5px; }
			#users .user .controls{ float: right; }
			
			/*-------------impromptu---------- */			
            div.jqi .jqimessage .field{ padding: 5px 0; }
			div.jqi .jqimessage .field label{ display: block; clear: left; float: left; width: 100px; }
			div.jqi .jqimessage .field input{ width: 150px; border: solid 1px #777777; }
			div.jqi .jqimessage .field input.error{ width: 150px; border: solid 1px #ff0000; }
			/*-------------------------------- */
		</style>
		
		
		<script type="text/javascript" src="./impromptu/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="./impromptu/jquery-impromptu.js"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
	function removeUser(id){
		var txt = '\xBF Est\xE1 seguro de borrar el usuario ?<input type="hidden" id="userid" name="userid" value="'+ id +'" />';
		// alert("id="+id);
		$.prompt(txt,{
		    title: '<span style="color:#999999;"><strong> \xBF Borrar usuario Consultor ?</strong></span>', 
			buttons:{Borrar:true, Cancelar:false},
			close: function(e,v,m,f){
				
				if(v){
					var uid = f.userid;
					//Here is where you would do an ajax post to remove the user
					//also you might want to print out true/false from your .php
					//file and verify it has been removed before removing from the 
					//html.  if false dont remove, $promt() the error.
					   
					//$.post('remover_usuario.php',{userid:f.userid}, callback:function(data){
					//	if(data == 'true'){
					$.post('remover_usuario.php',{userid:f.userid}, function(data){
						if(data == 'true'){
							$('#userid'+uid).hide('slow', function(){ $(this).remove(); });
							
						}else{ $.prompt('Un Error Ocurri\xF3 al remover el usuario'); }	
												
					 }); 
				}
				else{}
				
			}
		});
	}

//-->
</script>	
<script language="JavaScript" type="text/JavaScript">
<!--
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
//-->
</script>

</head>

<body >
<div align="center">
<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="./images/logo_sm.png" width="200" height="65" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Ciudadana<br />
            <span class="Arial2_red">Uso Exclusivo de la Municipalidad de San Miguel</span></td>
          <td width="15%" align="center" valign="middle" class="fecha"><?php echo $fecha ?></td>
        </tr>
        <tr>
          <td colspan="3" align="right" valign="middle" class="borde_button"><input type="submit" class="rojo_sombra" value="&laquo; Volver" onclick="location='principal.php'"/>&nbsp;&nbsp;&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" >
    <? 
$cons2="SELECT id_usuario,tx_nombre,tx_apellidoPaterno,tx_apellidoMaterno,tx_correo,tx_username,id_TipoUsuario,usuariovalido,dt_registro FROM tbl_users WHERE usuariovalido='1'";
$resultado2 = mysql_query($cons2,$conexio); 
if (mysql_num_rows($resultado2)>0){
?>
  <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
	<thead><tr>
        <th colspan="5" ><a href="registro.php" rel="shadowbox;width=850;height=600" style="text-decoration:none; color:#000000" >&nbsp; &nbsp; Ingresar Nuevo Usuario <img src="images/add_new.png" alt="Agregar Nuevo Usuario" name="imgaddnew" width="16" height="16"  border="0" id="imgaddnew"  title="Agregar Nuevo Usuario"/></a></th>
        <th width="75" rowspan="2" align="center">Eliminar</th>
      </tr>
      <tr>
        <th width="270" align="center" >Nombre Completo</th>
        <th width="200" align="center" >E-mail</th>
        <th width="170" align="center" >Nombre de Usuario</th>
        <th width="145" align="center" >Tipo de Usuario</th>
        <th width="100" align="center" >Fecha Ingreso</th>
      </tr>
    </thead>
</table>	
    <div class="wrapper">
	    <div id="users">
<?	  
while ($registro2 = mysql_fetch_array($resultado2))  {    
     $cual2=''; 
	 $nombredir2='';
     $nombre2=''; 
	 $email2='';
	 $logusuario2='';
	 
     $cual2=trim($registro2["id_usuario"]); 
     // $nombredir2=trim($registro2["nomdir"]);
	 $nombre2=trim($registro2["tx_nombre"])." ".trim($registro2["tx_apellidoPaterno"])." ".trim($registro2["tx_apellidoMaterno"]);
	 $email2=trim($registro2["tx_correo"]);
	 $logusuario2=trim($registro2["tx_username"]);
	 $tipusuario2=trim($registro2["id_TipoUsuario"]);
	 $tipousuario = 'Consultor';	
	 if ($tipusuario2== '1') {
	    $tipousuario = 'Administrador';
	 }
	 if ($tipusuario2== '3') {
	    $tipousuario = 'Consultor Especial';
	 }
	 if ($tipusuario2== '4') {
	    $tipousuario = 'Revisor Gesti&oacute;n';
	 }
	 if ($tipusuario2== '5') {
	    $tipousuario = 'Consultor Externo';
	 }
	  if ($tipusuario2== '6') {
	    $tipousuario = 'Mantenedor WF';
	 }
	 $dato=trim($registro2["dt_registro"]);
	 $fechaing = strtotime($dato);
	 $fechaingreso = date( 'd/m/Y', $fechaing);
	 ?>
     <div id="userid<?php echo $cual2 ?>" class="user">
			<span class="controls">
					<a href="#" title="Delete User" class="deleteuser" onclick="removeUser(<?php echo $cual2 ?>);" id="user<?php echo $cual2 ?>"><img src='./images/BotonAceptar0.png' alt='Borrar Usuario' id='imgborrar<?php echo $cual2 ?>' width='16' border='0' title='Borrar Usuario' onmouseover="javascript:this.src='./images/cancelar.gif';" onmouseout="javascript:this.src='./images/BotonAceptar0.png';" /></a>
			</span>
			<span class="fname">
	 <table border='0'  cellspacing='0' cellpadding='0' class='detalle' width="885"><tr><td width='270'><?php echo $nombre2 ?></td><td width='200'><?php echo $email2 ?></td><td width='170'><?php echo $logusuario2 ?></td><td width='145'><?php echo $tipousuario ?></td><td width='100'><?php echo $fechaingreso ?></td></tr></table>
	        </span></div>
	 <?
	
}


} else {
  echo("<table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >");
  echo("<tr><td><br /><br /> *** Error: El Sistema no registra usuarios <br /><br /></td></tr>");
  echo("</table>");
}
?>
		</div>
	</div>
 	   <!-- <td align='center' ><a href="#" ><img src='./images/BotonAceptar0.png' alt='Borrar Usuario' width='16' border='0' title='Borrar Usuario' onmouseover="javascript:this.src='./images/cancelar.gif';" onclick="javascript: if(confirm('\xBF Est\xE1 seguro de querer borrar este usuario?')){
alert('Proceso de eliminaci\xF3n!); this.src='./images/cancel.png';}
else {alert('OK se aborta la eliminaci\xF3n'); this.src='./images/BotonAceptar0.png';}" onmouseout="javascript:this.src='./images/BotonAceptar0.png';" /></a></td>-->
<br />

  		  </td>
		</tr></table>
    </td></tr>
</table>		  
</div>


</body>
<script language="JavaScript">
function cambia_estado(cualreg)
{
	var url="manten_atvirtual.php?cambiar=SI&cual="+ cualreg; 
	cSearchValue=window.open(url,"_self");
}
</script>	
</html>