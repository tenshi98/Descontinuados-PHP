<?php
   if (!($base=mysql_connect("localhost","root","petland","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos 1.";
      exit();
   }
   if (!mysql_select_db("sosamerica",$base)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }
 
?>
