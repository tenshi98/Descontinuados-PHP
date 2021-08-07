<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html> 
<head>
	<meta charset="UTF-8">	
	<title>Mensajes</title> 
	<link href="css/estilo.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<META http-equiv="Page-Enter" CONTENT="RevealTrans(Duration=4,Transition=7)"/>
</head>
 
<body>

<div class="height100 widht100">


<div class="section group">
    <div class="sello_agua">
    <p class="cuerpo_gris_12"><span class="tit_red">Inicio de Sesion</span><br />
        <br />
        Gracias por participar,<br />
        sin embargo esta aplicacion es<br />
        solo para militantes del <strong>Partido<br />
        Socialista de Chile</strong><br />
      <br />
      </p> 
    </div>
</div>
<?php 
	//Agregamos direcciones
	$location = 'pide_rut.php';
	$location.='?imei='.$_GET['imei'];
	$location.='&longitud='.$_GET['longitud'];
	$location.='&latitud='.$_GET['latitud'];
	$location.='&id='.$_GET['id'];
	$location.='&dispositivo='.$_GET['dispositivo'];
?>
<a href="<?php echo $location ?>"><input id="post_button" type="button" value="Volver"/></a>
</div> 
</div>



</body>
</html>