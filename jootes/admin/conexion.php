<?
   if (!($base=mysql_connect("localhost","root","petland"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("sosclick",$base)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos 1.";
      exit();
   }
   if (!($asterisk=mysql_connect("190.196.70.162","root","eLaStIx.2oo7"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("asterisk",$asterisk)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos 2.";
      exit();
   }
  /* if (!($tarificador=mysql_connect("190.196.70.162","root","eLaStIx.2oo7"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("tarificador",$tarificador)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos 3.";
      exit();
   }
   */
?>
