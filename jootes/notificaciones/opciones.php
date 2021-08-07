<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
  <meta charset="UTF-8">	
	<title>Opciones</title> 

		<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="jquery.mobile.structure-1.0.1.css" />


		
		<link rel="stylesheet" type="text/css" href="resources/styles.css"/>
</head> 
<body> 
    <div id="content1" class="content">
        <div id = "form" class="center">

<table align="center" width="250" border="0" cellspacing="0" cellpadding="0" id="table4">
  <tr>
    <td  align="center" valign="top" height="20" >
	<div class="nombre"><?=$_POST["nombre"]?></div>
	</td>
  </tr>

  <tr>
    <td align="center" valign="top" height="20" >
	&nbsp;</td>
  </tr>
  


<FORM  name="formulario" id="formulario"  action="privado_mensajes.php" method="post" target="_self">  
<input type=hidden name=correo value="<?=$_POST["correo"]?>">
<input type=hidden name=login value="<?=$_POST["login"]?>">
	<tr>
    <td width="250" align="left" ><div class="fecha">Su Mensaje</div></td>
	</TR>
	<tr>
    <td width="250" align="left" >
    <input  type="text" id="mensaje" name="mensaje"size="25"  class="campo_txt" /><input name="button" type="submit" class="bot_two" id="button" value=" " /></td>
	</TR>
	<tr>
    <td width="250" align="right" ></td>
	</TR>
</form>

  <tr>
    <td align="center" valign="top" height="30" >
	&nbsp;</td>
  </tr>
<FORM  name="bloquear" id="bloquear"  action="bloqueo.php" method="post" target="_self">  
<input type=hidden name=correo value="<?=$_POST["correo"]?>">
<input type=hidden name=login value="<?=$_POST["login"]?>">
  <tr>
    <td width="250" height="25" align="left" >
	<input type=submit value=Bloquear class="bot_one"></td>
	</TR>
</form>
  <tr>
    <td align="center" valign="top" height="30" >
	&nbsp;</td>
  </tr>

<FORM  name="volver" id="volver"  action="notificaciones.php" method="post" target="_self">  
<input type=hidden name=correo value="<?=$_POST["correo"]?>">
<input type=hidden name=login value="<?=$_POST["login"]?>">

	<tr>
    <td width="250" align="left" >
	<input type=submit value=volver  class="bot_one"></td>
	</TR>
</form>

  <tr>
    <td align="center" valign="top" height="60" >
	&nbsp;</td>
  </tr>
  

</TABLE>


</div></div>
</body>
</html>
