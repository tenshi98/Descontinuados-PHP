<?
   if (!($base=mysql_connect("190.98.210.34","root","petland","TRUE"))) //Servidor Usuario Contrase�a
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("psvirtual",$base)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
  
  
?>
