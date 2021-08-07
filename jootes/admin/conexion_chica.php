<?
   if (!($base=mysql_connect("localhost","root","petland"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("sosclick",$base)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
   if (!($base_cdr=mysql_connect("190.196.70.162","root","eLaStIx.2oo7"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("asterisk",$base_cdr)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
   if (!($base_valida=mysql_connect("190.196.70.162","otro_linux","otro_linux"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("validacion",$base_valida)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
?>
