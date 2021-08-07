                                     
<?php

/*
$connection = odbc_connect('Social', 'sa', 'igual');
if (!$connection) { die("Connection failed"); }
else {

$rs = odbc_exec($connection, "select * from Social.dbo.Omil_Postulantes") or die (odbc_errormsg());

while (odbc_fetch_row($rs)){          
echo odbc_result($rs,"Rut");
echo odbc_result($rs,"Apellido_Paterno");
echo "<br>";
}
odbc_close_all();


}

echo "<br>";
echo "<br>";
echo "<br>";

$connection = odbc_connect('LicConducir', 'sa', 'igual');
if (!$connection) { die("Connection failed"); }
else {

$rs = odbc_exec($connection, "select * from Licencias_de_Conducir.dbo.Personas WHERE Comuna='SAN MIGUEL' AND Sexo='1' AND Profesion<>'JUBILADA'") or die (odbc_errormsg());

while (odbc_fetch_row($rs)){          
echo odbc_result($rs,"Rut");
echo odbc_result($rs,"Nombres");
echo odbc_result($rs,"Apellidos");
echo "<br>";
}
odbc_close_all();


}

echo "<br>";
echo "<br>";
echo "<br>";

$connection = odbc_connect('PerCircula', 'sa', 'igual');
if (!$connection) { die("Connection failed"); }
else {

$rs = odbc_exec($connection, "SELECT Placa,Rut FROM Permisos_de_Circulacion.dbo.Permisos_de_Circulacion") or die (odbc_errormsg());

while (odbc_fetch_row($rs)){          
echo odbc_result($rs,"Rut");
echo odbc_result($rs,"Placa");
echo "<br>";
}
odbc_close_all();


}*/


ini_set("display_errors", 1);
ini_set("memory_limit", "120M");
/* $server = "190.98.210.41:1433"; 
$link = mssql_connect($server, "sa", "igual");*/
$server = "200.24.230.94:1433";
$lnk_permcirc= mssql_connect($server, "consultor", "consultor_base_natphon","TRUE");  //Servidor Usuario Contraseña

if (!$lnk_permcirc) {
  	die("<br/><br/>Algo sali&oacute; mal mientras se conectaba a MSSQL-PermCirc");
} else {
	if (!mssql_select_db("[Permisos_de_Circulacion]", $lnk_permcirc)){    //Nombre de la BD a utilizar
		  echo "No he podido abrir la base Permisos_de_Circulacion";
		  exit();
	} else {
	echo "<strong>Conectado a Permisos_de_Circulacion</strong><br/>";
	echo "<br/>Buscar 10 permisos del a&ntilde;o 2013 con tipo de vehiculo, propietario y registro de multas<br/><hr>";
	$result = mssql_query("select TOP 10 *  from Permisos_de_Circulacion where Año_del_Permiso='2013'");
	while($row = mssql_fetch_array($result)) {
		$Rut=$row["Rut"];
		$placa=$row["Placa"];
	echo $row["Año_del_Permiso"] ."  ". $row["Placa"] ."  ". $Rut."<br/>";
	$vehi=$row["Tipo_Vehiculo"];
			$paso="SELECT * FROM Tipos_de_Vehiculos WHERE codigo=".$vehi;
			$sql3 = mssql_query($paso);
			while($row3 = mssql_fetch_array($sql3)) {
				$tipo=$row3["Descripcion"];
			}
	
		$sql2 = mssql_query("SELECT Rut,Nombre,Direccion,Comuna,Telefono,Mail,Telefono_Movil FROM Propietarios WHERE Rut LIKE '%".$row["Rut"]."%'");
		while($row2 = mssql_fetch_array($sql2)) {
			echo $row2["Rut"] ."  ". $row2["Nombre"] ."  ". $row2["Direccion"] ."  ". $row2["Comuna"] ."  ". $row2["Telefono"] ."  ". $tipo . "<br/>";
	
			$paso2="SELECT * FROM Registro_de_multas WHERE Rut LIKE '%".$row["Rut"]."%' or Placa='".$placa."'";
			$sql4 = mssql_query($paso2);
			while($row4 = mssql_fetch_array($sql4)) {
				echo $row4["Motivo_Multa"]."<br>";
			}
		echo "<br />";
	    }

    }

	}
}

?>