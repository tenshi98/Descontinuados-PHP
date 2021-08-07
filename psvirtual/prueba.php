<?
   if (!($base=mysql_connect("localhost","root","petland","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos 1.";
      exit();
   }
   if (!mysql_select_db("root",$base)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }


   if (!($base_padron=mysql_connect("190.98.210.41","sosclick","petland","TRUE"))) //Servidor Usuario Contraseña
   {



   }
   if (!mysql_select_db("padron",$base_padron)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos padron.";
      exit();
   }




$sql ="SELECT NOMBRE,DOMICILIO,Comuna,fono_celular,domicilio_2,comuna_2,tipo_domicilio2,correo,rut_compara FROM padron_electoral_CL WHERE rut_compara='81147221'";



	$res=mysql_query($sql,$base_padron); 
	$numeroRegistros=mysql_num_rows($res); 
	if ($numeroRegistros==1)  {
	echo $sql."<br>".$numeroRegistros;	
		
	?>


	<form name="formulario" method="post" action="http://<?=$nombreurl?>/app/crea_usuario.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?>
	&imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">

	<?
		$rowusr = mysql_fetch_assoc ($res);

		?>
		<input type="hidden" name="rut" value="<?=$_POST['rutpersona']?>">
		<input type="hidden" name="rut_compara" value="<?=$uno.$dos?>">
		<input type="hidden" name="nom_ejecutiv" value="<?=$rowusr['NOMBRE']?>">
		<input type="hidden" name="fono_ejecutiv" value="<?=$rowusr['fono_celular']?>">

		<? if ($rowusr['comuna_2']!="") {?>
			<input type="hidden" name="comuna" value="<?=$rowusr['comuna_2']?>">
		<?}else{?>
			<input type="hidden" name="comuna" value="<?=$rowusr['Comuna']?>">
		<?}?>

		<? if ($rowusr['domicilio_2']!="") {?>
			<input type="hidden" name="dir_ejecutiv" value="<?=$rowusr['domicilio_2']?>">
		<?}else{?>
			<input type="hidden" name="dir_ejecutiv" value="<?=$rowusr['DOMICILIO']?>">
		<?}?>
		<input type="hidden" name="login" value="<?=$rowusr['correo']?>">

	</form>
	<script type="text/javascript">
    //Redireccionar con el formulario creado
    //document.formulario.submit();
	</script>

<?
}?>
