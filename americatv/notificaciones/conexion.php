<?
   if (!($base=mysql_connect("190.98.210.34","root","petland","TRUE"))) //Servidor Usuario Contraseņa
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("sosclick",$base)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
  
  
?>
