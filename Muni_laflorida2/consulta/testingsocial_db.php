                                     
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
// $server = "190.98.210.41:1433";
$server = "200.24.230.94:1433";
//$link = mssql_connect($server, "sa", "igual");
$link = mssql_connect($server, "consultor", "consultornph");


if (!$link) {
die("<br/><br/>Algo salio mal mientras se conectaba a MSSQL");
}
else {
$selected = mssql_select_db("Social", $link)
or die("No he podido abrir la base de datos Social");
echo "<strong>Conectado a Social</strong><br/>";
echo "<br/>Buscar cuando fue atendida una persona determinada<br/><hr>";
$result = mssql_query("SELECT TOP 1 *  FROM social_atenpub WITH (NOLOCK) WHERE atpub_rut='22845297-1' ORDER BY atpub_fechaat DESC");
while($row = mssql_fetch_array($result)) {
	$Rut=$row["atpub_rut"];
	$nombrecompleto=$row["atpub_prinombre"]." ". $row["atpub_segnombre"]." ".$row["atpub_apepater"]." ".$row["atpub_apemater"];
echo "RUT: ". $Rut ."&nbsp; Nombre Completo: ". $nombrecompleto ."&nbsp;  Fecha de Nacimiento: ". $row["atpub_fecnac"] ."&nbsp;  Sexo: ". $row["atpub_sexo"] . "<br/>";
echo "Direcci&oacute;n: ".$row["atpub_direccion"]." ".$row["atpub_cerro"]." ".$row["atpub_sector"]." &nbsp; Celular: ".$row["Telefono_celular"]." &nbsp; Tel&eacute;fono: ".$row["Telefono"]." &nbsp; e-mail: ".$row["mail"]."<br /><br />";
}

echo "<strong>Grupo Familiar</strong><br />";

$result = mssql_query("SELECT TOP 1 integrante_fichafamiliar,integrante_rut FROM social_integrantesfam WHERE integrante_rut='09461734-0'");
if (mssql_num_rows($result)>0){
echo "<table width='900' border='0' cellspacing='0' cellpadding='0' ><thead><tr>";
echo "<th>Nombre</th><th>Rut</th><th>Parentesco</th><th>Fecha Nacimiento (Edad)</th><th>Inactivo</th><th>Ingresos</th><th>Actividad</th></tr></thead>";
while($row = mssql_fetch_array($result)) {
    echo "Ficha familiar=".$row["integrante_fichafamiliar"]."<br />";
	$Rut=$row["integrante_rut"];
	$fichafam=$row["integrante_fichafamiliar"];
	
	$paso1="SELECT integrante_fichafamiliar,integrante_rut,integrante_estado,integrante_apepater,integrante_apemater, integrante_prinombre, integrante_segnombre, integrante_fechanac,integrante_edad,integrante_codparentes,integrante_sexo, integrante_estadocivil, integrante_ingresos, integrante_actividad, integrante_prevision,integrante_escolaridad, integrante_Estado_Salud,integrante_AdultoM,integrante_Discapacitado,Integrante_MTrabajados,integrante_FDefun  FROM social_integrantesfam WHERE integrante_fichafamiliar='". $fichafam ."'";
	$sql03 = mssql_query($paso1);
	while($row03 = mssql_fetch_array($sql03)) {
			$integrante_nombre=trim($row03["integrante_prinombre"])." ".trim($row03["integrante_segnombre"])." ". trim($row03["integrante_apepater"])." ".trim($row03["integrante_apemater"]);
			$fechanacio="";
			$fechanacim="";
			$fechaedad="";
			$edad ="";
			if (trim($row03["integrante_fechanac"]) <> "" ){
				$dato=trim($row03["integrante_fechanac"]);
				if (substr($dato,0,3)=="Ene") {
					$dato = str_replace("Ene", "Jan", $dato);
				}
				if (substr($dato,0,3)=="Abr") {
					$dato = str_replace("Abr", "Apr", $dato);
				}
				if (substr($dato,0,3)=="Ago") {
					$dato = str_replace("Ago", "Aug", $dato);
				}
				if (substr($dato,0,3)=="Dic") {
					$dato = str_replace("Dic", "Dec", $dato);
				}				
				$fechanacim = strtotime($dato);
				$fechanacio = date( 'd/m/Y', $fechanacim);
				$fechaedad = time() - strtotime($row03["integrante_fechanac"]);
				$edad = floor($fechaedad / 31556926);
			}
			$ingresos = number_format($row03["integrante_ingresos"] , 0 ,',' , '.' );
			$codparent= trim($row03["integrante_codparentes"]);
			if ($codparent <> "") {
				$paso04="SELECT parent_cod,parent_desc FROM social_parentesco WHERE parent_cod=".$codparent;
				$sql04 = mssql_query($paso04);
				if (mssql_num_rows($sql04)>0){
				while($row04 = mssql_fetch_array($sql04)) {
					$descparent=$row04["parent_desc"];
				} 
				} else {
				   $descparent=$codparent ." * C&oacute;d No Encontrado *";
				} 
			} 
			$codactiv= trim($row03["integrante_actividad"]);
			if ($codactiv <> "") {
				$paso05="SELECT activ_codigo,activ_descripcion FROM social_actividadsocial WHERE activ_codigo=".$codactiv;
				$sql05 = mssql_query($paso05);
				if (mssql_num_rows($sql05)>0){
				while($row05 = mssql_fetch_array($sql05)) {
					$descactiv=$row05["activ_descripcion"];
				} 
				} else {
				   $descactiv=$codactiv ." * C&oacute;d No Encontrado *";
				} 
			} 
			
			echo "<tr><td>".$integrante_nombre."</td><td>".$row03["integrante_rut"]."</td><td>".$descparent."</td><td>".$fechanacio." (".$edad." a&ntilde;os)</td><td>".$row03["integrante_estado"]."</td><td> $".$ingresos."</td><td>".$descactiv."</td></tr>";
		} 
    
}
echo "</table><br />";
}

 echo "<strong>Atenci&oacute;n de P&uacute;blico</strong><br><table width='900' border='0' cellspacing='0' cellpadding='0' ><thead><tr>";
echo "<th>Fecha de Atencion</th><th>Folio de atencion</th><th>Ptje CAS</th><th>Folio CAS</th><th>Atendido por</th></tr></thead>";
$result = mssql_query("SELECT TOP 10 *  FROM social_atenpub WHERE atpub_rut='22845297-1' ORDER BY atpub_fechaat DESC");
while($row = mssql_fetch_array($result)) {

$asistsocial=$row["atpub_atendidopor"];
$tipo = " ";
        if ($asistsocial <> "") {
		$paso="SELECT asist_cod,asist_nombre FROM Social_asistente WHERE asist_cod=". $asistsocial;
		$sql3 = mssql_query($paso);
		if (mssql_num_rows($sql3)>0){
		while($row3 = mssql_fetch_array($sql3)) {
			$tipo=$row3["asist_nombre"];
		} 
		} else {
		   $tipo=$asistsocial ." * Cod No encontrado *";
		} 
		} 
echo "<tr><td>".$row["atpub_fechaat"]."</td><td>".$row["atpub_folio"]."</td><td>".$row["atpub_ptjecas"]."</td><td>".$row["atpub_foliocas"]."</td><td>".$tipo."</td></tr>";
}
echo "</table><br /><strong>Control de Atencion</strong><br>";
echo "<table width='900' border='0' cellspacing='0' cellpadding='0' ><thead><tr>";
echo "<th>Fecha de Atenci&oacute;n</th><th>Ficha Familiar</th><th>Motivo</th><th>Derivado</th><th>Atendido por</th></tr></thead>";
	$sql2 = mssql_query("SELECT control_fechaatencion, control_fichafamiliar, control_motivo, control_codderivado,control_atendidopor FROM social_controlpublico WHERE control_rut LIKE '%".$Rut."%' ORDER BY control_fechaatencion DESC");
	while($row2 = mssql_fetch_array($sql2)) {
        $descmotiv = " ";
        $motivo=$row2["control_motivo"];
		if ($motivo <> "") {
		$paso2="SELECT * FROM social_motivo WHERE motivo_cod =". $motivo;
		$sql4 = mssql_query($paso2);
		if (mssql_num_rows($sql4)>0){
		while($row4 = mssql_fetch_array($sql4)) {
			$descmotiv=$row4["motivo_desc"];
		}
		} else {
		   $descmotiv=$motivo ." * Cod No encontrado *";
		}
        } 
		
	    $deriva=$row2["control_codderivado"];
		$paso2="SELECT * FROM social_derivado WHERE derivado_cod =". $deriva;
		$sql4 = mssql_query($paso2);
		while($row4 = mssql_fetch_array($sql4)) {
			$descderiva=$row4["derivado_descrip"];
		}
		
		$atenpor=$row2["control_atendidopor"];
		if ($atenpor <> "") {
		$paso2="SELECT asist_cod,asist_nombre FROM Social_asistente WHERE asist_cod=" . $atenpor;
		$sql4 = mssql_query($paso2);
		while($row4 = mssql_fetch_array($sql4)) {
			$descasist=$row4["asist_nombre"];
		}
		} else {
		$descasist = " ";
		}
    echo "<tr><td>".$row2["control_fechaatencion"] ."</td><td>". $row2["control_fichafamiliar"] ."</td><td>". $descmotiv ."</td><td>". $descderiva ."</td><td>". $descasist ."</td></tr>";
	}
echo "</table><br /><strong>Detalle Atenciones Sociales</strong><br>";
echo "<table width='900' border='0' cellspacing='0' cellpadding='0' ><thead><tr>";
echo "<th>Fecha de Atenci&oacute;n</th><th>Folio Atencion</th><th>Observacion</th><th>Asistente</th></tr></thead>";
	$sql2 = mssql_query("SELECT Folio_Atencion,Fecha_Atencion,Codigo_Asistente,Observacion FROM Det_Atenciones_Social WHERE Rut LIKE '%".$Rut."%' ORDER BY Fecha_Atencion DESC");
	while($row2 = mssql_fetch_array($sql2)) {
        $asistent = " ";
        $codasist=$row2["Codigo_Asistente"];
		if ($codasist <> "") {
		$paso2="SELECT * FROM Social_asistente WHERE asist_cod =". $codasist;
		$sql4 = mssql_query($paso2);
		if (mssql_num_rows($sql4)>0){
		while($row4 = mssql_fetch_array($sql4)) {
			$descmotiv=$row4["asist_nombre"];
		}
		} else {
		   $descmotiv=$motivo ." * Cod No encontrado *";
		}
        } 

    echo "<tr><td>".$row2["Fecha_Atencion"] ."</td><td>". $row2["Folio_Atencion"] ."</td><td>". $row2["Observacion"]  ."</td><td>". $descmotiv ."</td></tr>";
	}
}

?>