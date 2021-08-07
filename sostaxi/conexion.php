<?
   if (!($base=mysql_connect("localhost","root","petland","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos 1.";
      exit();
   }
   if (!mysql_select_db("sostaxi",$base)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }


   if (!($base_padron=mysql_connect("190.98.210.41","sostaxi","petland","TRUE"))) //Servidor Usuario Contraseña
   {

		/*if (!($base_padron=mysql_connect("190.98.210.42","root","petland"))) //Servidor Usuario Contraseña
		{
			echo "Error conectando a la base de datos padron BAK.";
			exit();
		}
		if (!mysql_select_db("padron",$base_padron)) //Nombre de la BD
		{
			echo "Error seleccionando la base de datos padron BAK.";
			exit();
		}*/
     /* echo "Error conectando a la base de datos padron.";
      exit();*/
   }
   if (!mysql_select_db("padron",$base_padron)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos padron.";
      exit();
   }





?>
