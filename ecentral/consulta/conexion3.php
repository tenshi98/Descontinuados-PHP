<?
ini_set("display_errors", 1);
ini_set("memory_limit", "120M");
$server = "200.54.186.114:1433";

$lnk_patcom = mssql_connect($server, "usuariolector", "lectorec0702","TRUE");  //Servidor Usuario Contraseña
if (!$lnk_patcom) {
  	die("<br/><br/>Algo sali&oacute; mal mientras se conectaba a MSSQL-PatCom");
} else {
	if (!mssql_select_db("[Patentes_Comerciales]", $lnk_patcom)){    //Nombre de la BD
		  echo "No he podido abrir la base de datos de Patentes Comerciales";
		  exit();
	}
}

$lnk_social= mssql_connect($server, "usuariolector", "lectorec0702","TRUE");  //Servidor Usuario Contraseña
if (!$lnk_social) {
  	die("<br/><br/>Algo sali&oacute; mal mientras se conectaba a MSSQL-Social");
} else {
	if (!mssql_select_db("[Social]", $lnk_social)){    //Nombre de la BD
		  echo "No he podido abrir la base de datos Social";
		  exit();
	}
}

$lnk_aseo= mssql_connect($server, "usuariolector", "lectorec0702","TRUE");  //Servidor Usuario Contraseña
if (!$lnk_aseo) {
  	die("<br/><br/>Algo sali&oacute; mal mientras se conectaba a MSSQL-Aseo");
} else {
	if (!mssql_select_db("[DB_Aseo]", $lnk_aseo)){    //Nombre de la BD a utilizar
		  echo "No he podido abrir la base DB_Aseo";
		  exit();
	}
}

$lnk_obras= mssql_connect($server, "usuariolector", "lectorec0702","TRUE");  //Servidor Usuario Contraseña
if (!$lnk_obras) {
  	die("<br/><br/>Algo sali&oacute; mal mientras se conectaba a MSSQL-obras");
} else {
	if (!mssql_select_db("[Certificados_Obras]", $lnk_obras)){    //Nombre de la BD a utilizar
		  echo "No he podido abrir la base DB_obras";
		  exit();
	}
}

$lnk_BDCAS= mssql_connect($server, "usuariolector", "lectorec0702","TRUE");  //Servidor Usuario Contraseña
if (!$lnk_BDCAS) {
  	die("<br/><br/>Algo sali&oacute; mal mientras se conectaba a MSSQL-CAS");
} else {
	if (!mssql_select_db("[Bd_Cas]", $lnk_BDCAS)){    //Nombre de la BD a utilizar
		  echo "No he podido abrir la base DB_CAS";
		  exit();
	}
}

$lnk_comun= mssql_connect($server, "usuariolector", "lectorec0702","TRUE");  //Servidor Usuario Contraseña
if (!$lnk_comun) {
  	die("<br/><br/>Algo sali&oacute; mal mientras se conectaba a MSSQL-comun");
} else {
	if (!mssql_select_db("[Comun]", $lnk_comun)){    //Nombre de la BD a utilizar
		  echo "No he podido abrir la base Comun";
		  exit();
	}
}

$lnk_licconducir= mssql_connect($server, "usuariolector", "lectorec0702","TRUE");  //Servidor Usuario Contraseña
if (!$lnk_licconducir) {
  	die("<br/><br/>Algo sali&oacute; mal mientras se conectaba a MSSQL-LicConducir");
} else {
	if (!mssql_select_db("[Licencias_de_Conducir]", $lnk_licconducir)){    //Nombre de la BD a utilizar
		  echo "No he podido abrir la base Licencias_de_Conducir";
		  exit();
	}
}

$lnk_permcirc= mssql_connect($server, "usuariolector", "lectorec0702","TRUE");  //Servidor Usuario Contraseña

if (!$lnk_permcirc) {
  	die("<br/><br/>Algo sali&oacute; mal mientras se conectaba a MSSQL-PermCirc");
} else {
	if (!mssql_select_db("[Permisos_de_Circulacion]", $lnk_permcirc)){    //Nombre de la BD a utilizar
		  echo "No he podido abrir la base Permisos_de_Circulacion";
		  exit();
	}
}

$lnk_provisorio= mssql_connect($server, "usuariolector", "lectorec0702","TRUE");  //Servidor Usuario Contraseña
if (!$lnk_provisorio) {
  	die("<br/><br/>Algo sali&oacute; mal mientras se conectaba a MSSQL-Provisorios");
} else {
	if (!mssql_select_db("[Provisorias]", $lnk_provisorio)){    //Nombre de la BD a utilizar
		  echo "No he podido abrir la base Permisos_Provisorios";
		  exit();
	}
}

$lnk_inspec= mssql_connect($server, "usuariolector", "lectorec0702","TRUE");  //Servidor Usuario Contraseña
if (!$lnk_inspec) {
  	die("<br/><br/>Algo sali&oacute; mal mientras se conectaba a MSSQL-Inspecciones");
} else {
	if (!mssql_select_db("[DB_Inspeccion]", $lnk_inspec)){    //Nombre de la BD a utilizar
		  echo "No he podido abrir la base Inspecciones";
		  exit();
	}
}

$lnk_teso= mssql_connect($server, "usuariolector", "lectorec0702","TRUE");  //Servidor Usuario Contraseña
if (!$lnk_teso) {
  	die("<br/><br/>Algo sali&oacute; mal mientras se conectaba a MSSQL-Tesoreria");
} else {
	if (!mssql_select_db("[Tesoreria]", $lnk_teso)){    //Nombre de la BD a utilizar
		  echo "No he podido abrir la base Tesoreria";
		  exit();
	}
}
$haypatcom=0;
$haysocial=0;
$hayaseo=0;
$hayobras=0;
$haylicconducir=0;
$haypermcirc=0;
$hayprovisorio=0;
$hayinspec=0;
$hayBDCAS=0;
$haycomun=0;
$hayteso=0;


   if (!($padron=mysql_connect("190.98.210.42","sanmichael","yt8917","TRUE"))) //Servidor Usuario Contraseña
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
