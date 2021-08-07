<?
   if (!($base=mysql_connect("localhost","root","petland","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("jootes",$base)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
  
  
?>
