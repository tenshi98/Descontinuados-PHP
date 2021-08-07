<?
   if (!($padron=mysql_connect("190.98.210.42","root","petland","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("padron",$padron)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }


?>
