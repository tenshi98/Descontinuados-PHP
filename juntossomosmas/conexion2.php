<?
   if (!($base=mysql_connect("localhost","root","petland","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos 1.";
      exit();
   }
   if (!mysql_select_db("juntossomosmas",$base)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }

   if (!($base_padron=mysql_connect("190.98.210.41","sosclick","petland","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos padron.";
      exit();
   }
   if (!mysql_select_db("padron",$base_padron)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos padron.";
      exit();
   }



?>
