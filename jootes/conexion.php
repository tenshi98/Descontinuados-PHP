<?
   if (!($base=mysql_connect("localhost","root","petland","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos 1.";
      exit();
   }
   if (!mysql_select_db("jootes",$base)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos sosclick.";
      exit();
   }
   if (!($base_cdr=mysql_connect("bridge60.click2call.cl","root","eLaStIx.2oo7","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos 2.";
      exit();
   }
   if (!mysql_select_db("asterisk",$base_cdr)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos asterisk.";
      exit();
   }
   if (!($base_cdr_voip=mysql_connect("bridge60.click2call.cl","root","eLaStIx.2oo7","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos 2.";
      exit();
   }
   if (!mysql_select_db("tarificador",$base_cdr_voip)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos tarificador.";
      exit();
   }
   if (!($base_valida=mysql_connect("bridge60.click2call.cl","root","eLaStIx.2oo7","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos 3.";
      exit();
   }
   if (!mysql_select_db("validacion",$base_valida)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos validacion.";
      exit();
   }
 if (!($control_cdr=mysql_connect("bridge60.click2call.cl","root","eLaStIx.2oo7","TRUE"))) //Servidor Usuario Contraseña
   {
      echo "Error conectando a la base de datos 4.";
      exit();
   }
   if (!mysql_select_db("asteriskcdrdb",$control_cdr)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos asteriskcdrdb.";
      exit();
   }
?>
