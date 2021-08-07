<?
   if (!($base=mysql_connect("localhost","root","petland","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos 1.";
      exit();
   }
   if (!mysql_select_db("americatv",$base)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }


   if (!($base_padron=mysql_connect("190.98.210.41","sosclick","petland","TRUE"))) //Servidor Usuario Contraseña
   {






	/*	if (!($base_padron=mysql_connect("190.98.210.42","root","petland"))) //Servidor Usuario Contraseña
		{
			echo "Error conectando a la base de datos padron BAK.";
			exit();
		}
		if (!mysql_select_db("padron",$base_padron)) //Nombre de la BD
		{
			echo "Error seleccionando la base de datos padron BAK.";
			exit();
		}
      echo "Error conectando a la base de datos padron.";
      exit();*/
   }
   if (!mysql_select_db("padron",$base_padron)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos padron.";
      exit();
   }







  /*if (!($base_padron_bak=mysql_connect("190.98.210.42","root","petland"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos padron BAK.";
      exit();
   }
   if (!mysql_select_db("padron",$base_padron_bak)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos padron BAK.";
      exit();
   }
 if (!($base_cdr=mysql_connect("190.196.70.162","root","eLaStIx.2oo7","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos 2.";
      exit();
   }
   if (!mysql_select_db("asterisk",$base_cdr)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
   if (!($base_cdr_voip=mysql_connect("190.196.70.162","root","eLaStIx.2oo7","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos 2.";
      exit();
   }
   if (!mysql_select_db("tarificador",$base_cdr_voip)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
   if (!($base_valida=mysql_connect("190.196.70.162","root","eLaStIx.2oo7","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos 3.";
      exit();
   }
   if (!mysql_select_db("validacion",$base_valida)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
 if (!($control_cdr=mysql_connect("190.196.70.162","root","eLaStIx.2oo7","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos 4.";
      exit();
   }
   if (!mysql_select_db("asteriskcdrdb",$control_cdr)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }*/
?>
