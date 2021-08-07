<!DOCTYPE html>
<html>
<head>
    <title>Consulta Virtual</title>
<style>

body {
    width: 960px;
    margin: 40px auto;
    font-family: 'trebuchet MS', 'Lucida sans', Arial;
    font-size: 14px;
    color: #444;
}
table {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 100%;    
}

.bordered {
    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;         
}

.bordered tr:hover {
    /* background: #fbf8e9; */
	background: #f9f4df;
    -o-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;     
}    
    
.bordered td, .bordered th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 6px;
    text-align: left;    
}

.bordered th {
    background-color: #dce9f9;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
    border-top: none;
    text-shadow: 0 1px 0 rgba(255,255,255,.5);
	text-align: center;
	font-size:14px;
}

.bordered td:first-child, .bordered th:first-child {
    border-left: none;
}
.bordered td {
	font-size:12px;
}
.bordered th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;
}

.bordered th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.bordered th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.bordered tr:last-child td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.bordered tr:last-child td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}
/*----------------------*/

.zebra td, .zebra th {
    padding: 6px;
    border-bottom: 1px solid #f2f2f2;    
}

.zebra tbody tr:nth-child(even) {
    background: #f5f5f5;
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
}

.zebra th {
    text-align: left;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
    border-bottom: 1px solid #ccc;
    background-color: #eee;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#f5f5f5), to(#eee));
    background-image: -webkit-linear-gradient(top, #f5f5f5, #eee);
    background-image:    -moz-linear-gradient(top, #f5f5f5, #eee);
    background-image:     -ms-linear-gradient(top, #f5f5f5, #eee);
    background-image:      -o-linear-gradient(top, #f5f5f5, #eee); 
    background-image:         linear-gradient(top, #f5f5f5, #eee);
}

.zebra th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;  
}

.zebra th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.zebra th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.zebra tfoot td {
    border-bottom: 0;
    border-top: 1px solid #fff;
    background-color: #f1f1f1;  
}

.zebra tfoot td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.zebra tfoot td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}

.zebra tfoot td:only-child{
    -moz-border-radius: 0 0 6px 6px;
    -webkit-border-radius: 0 0 6px 6px
    border-radius: 0 0 6px 6px
}
  
</style>
</head>
<body>
<?php

/*
Patentes:

SELECT MC.NOMBRE,aMP.NUMERACION_CALLE,MC.RUT,aMP.ROL FROM  ( MAESTRO_PATENTES  aMP INNER JOIN MAESTRO_CONTRIBUYENTE  MC ON aMP.RUT = MC.RUT)  ORDER BY MC.NOMBRE

Alcoholes:
SELECT aMP.CODIGO_CALLE,aMP.MONTO_CAPITAL,aMP.codigo_calle,aMP.Numeracion_Calle FROM  MAESTRO_PATENTES aMP  ORDER BY aMP.CODIGO_CALLE

Propaganda:
SELECT aMP.codigo_calle,aMP.Numeracion_Calle,MV.Propaganda,MC.RUT,MC.NOMBRE FROM  (( MAESTRO_PATENTES  aMP INNER JOIN MAESTRO_CONTRIBUYENTE  MC ON aMP.RUT = MC.RUT) LEFT JOIN MAESTRO_VALORES  MV ON aMP.ROL = MV.ROL)  ORDER BY aMP.codigo_calle,aMP.Numeracion_Calle

Propaganda2:
SELECT aMP.ROL,MC.RUT,MC.NOMBRE,aMP.codigo_calle,aMP.Numeracion_Calle,MV.Propaganda FROM  (( MAESTRO_PATENTES  aMP INNER JOIN MAESTRO_CONTRIBUYENTE  MC ON aMP.RUT = MC.RUT) LEFT JOIN MAESTRO_VALORES  MV ON aMP.ROL = MV.ROL)  WHERE MV.Semestre=1 AND MV.Ano=2011 ORDER BY aMP.ROL

Profesionales:
SELECT aMP.ROL,MC.RUT,MC.NOMBRE,aMP.codigo_calle,aMP.Numeracion_Calle,MG.GIRO,MV.ASEO,MV.BIEN_NACIONAL,MV.IMPUESTO,MV.MULTA,MV.PATENTE,MV.Propaganda,MV.Total,MV.VARIOS,MV.ANO,aMP.CODIGO_PATENTE,aMP.ESTADO_PATENTE,MV.ESTADO,MV.FECHA_EMISION,aMP.FECHA_OTORGA_PATENTE,MV.FECHA_PAGO,aMP.FECHA_TERMINO,aMP.MTS_BIEN_NACIONAL,MV.PAGADO,MV.SEMESTRE FROM  ((( MAESTRO_PATENTES  aMP INNER JOIN MAESTRO_CONTRIBUYENTE  MC ON aMP.RUT = MC.RUT) INNER JOIN MAESTRO_GIROS  MG ON aMP.ROL = MG.ROL) LEFT JOIN MAESTRO_VALORES  MV ON aMP.ROL = MV.ROL)  ORDER BY aMP.ROL

Numero de Trabajadores
SELECT MC.NUM_TABAJADORES_COMUNAS,MC.NOMBRE,TCA.DESCRIPCION,aMP.ROL,MC.RUT,aMP.ESTADO_PATENTE,aMP.NUMERACION_CALLE FROM  (( MAESTRO_PATENTES  aMP INNER JOIN MAESTRO_CONTRIBUYENTE  MC ON aMP.RUT = MC.RUT) LEFT JOIN TT_CALLES  TCA ON aMP.CODIGO_CALLE=TCA.COD_CALLE)  ORDER BY MC.NUM_TABAJADORES_COMUNAS


SELECT aMP.ROL,MC.RUT,aMP.MTR_EXCEDASEO FROM  (( MAESTRO_PATENTES  aMP INNER JOIN MAESTRO_CONTRIBUYENTE  MC ON aMP.RUT = MC.RUT) LEFT JOIN MAESTRO_VALORES  MV ON aMP.ROL = MV.ROL)  WHERE aMP.MTR_EXCEDASEO>0 AND MV.Semestre=1 AND MV.Ano=2011 ORDER BY aMP.ROL

*/


?>

<? 
$rut= $_GET["r"];

/* $rut = '001771377-9';  */


ini_set("display_errors", 1);
ini_set("memory_limit", "120M");
$server = "190.98.210.41:1433";
$link = mssql_connect($server, "sa", "igual");



if (!$link) {
die("<br/><br/>Algo salio mal mientras se conectaba a MSSQL");
}
else {
$selected = mssql_select_db("Patentes_Comerciales", $link)
or die("No he podido abrir la base de datos Social");
echo "<strong>Conectado a Patentes_Comerciales</strong><br/>";
echo "<br/>Buscar si el RUT: ".$rut. " tiene patentes comerciales en la comuna<br/><hr>";
$result = mssql_query("SELECT TOP 1 *  FROM MAESTRO_CONTRIBUYENTE WHERE RUT='".$rut."' ORDER BY ANO_Capital DESC");
while($row = mssql_fetch_array($result)) {
	$Rut=$row["RUT"];
	$nombrecompleto=$row["NOMBRE"];
echo "RUT: ". $Rut ."&nbsp; Nombre Completo: ". $nombrecompleto ."<br/>";
echo "Direcci&oacute;n: ".$row["DIRECCION"]." ".$row["COMUNA"]." &nbsp; Tel&eacute;fono: ".$row["FONO1"]." &nbsp; Tel&eacute;fono 2: ".$row["FONO2"] . "<br/><br />";
}
echo "<strong>PATENTES COMERCIALES</strong><br><table width='900' border='0' cellspacing='0' cellpadding='0' class='bordered'><thead><tr>";
echo "<th>A&ntilde;o Capital</th><th>Tipo de Capital</th><th>Porc.%</th><th>Monto Capital</th><th>Fecha Presentaci&oacute;n</th></tr></thead>";
$result = mssql_query("SELECT TOP 10 *  FROM MAESTRO_CONTRIBUYENTE WHERE RUT='".$rut."' ORDER BY ANO_Capital DESC");
while($row = mssql_fetch_array($result)) {
$fecha01 = strtotime($row["FECHA_DECLARACION"]);
/* $mysqldate = date( 'Y-m-d H:i:s', $fecha01 ); */
$fechapres = date( 'd/m/Y', $fecha01 );
$tipcapital=$row["TIPO_CAPITAL"];
$tipo = " ";
        if ($tipcapital <> "") {
		$paso="SELECT CODIGO,DESCRIPCION FROM Tipos_de_Capitales WHERE CODIGO='". $tipcapital."'";
		$sql3 = mssql_query($paso);
		if (mssql_num_rows($sql3)>0){
		while($row3 = mssql_fetch_array($sql3)) {
			$tipo=$row3["DESCRIPCION"];
		} 
		} else {
		   $tipo=$tipcapital ." * Cod No encontrado *";
		} 
		} 
echo "<tr><td>".$row["ANO_Capital"]."</td><td>".$tipo."</td><td>".$row["MONTO_PORCENTAJE_CAPITAL"]."% </td><td> $".number_format($row["MONTO_CAPITAL"] , 0 ,',' , '.' )."</td><td>".$fechapres."</td></tr>";
}

echo "</table><br /><strong>Patentes Asociadas al RUT</strong><br>";
echo "<table width='900' border='1' cellspacing='0' cellpadding='0' class='bordered' ><thead><tr>";
echo "<th width='73'>ROL<br>N&deg; Patente</th><th width='82'>Clasificaci&oacute;n</th><th width='360'>Giro</th><th width='85'>Tipo Patente</th><th>Direcci&oacute;n</th><th width='64'>Rol SII</th><th width='50'>Estado</th></tr></thead>";
	$sql2 = mssql_query("SELECT ROL, CODIGO_PATENTE, CODIGO_CALLE, NUMERACION_CALLE, ROL_SII_PROPIEDAD, ESTADO_PATENTE, GLOSA_DE_TERMINO, FECHA_DECLARACION FROM MAESTRO_PATENTES WHERE RUT LIKE '%".$rut."%' ORDER BY FECHA_DECLARACION DESC");
	while($row2 = mssql_fetch_array($sql2)) {
	    
        $descmotiv = " ";
        $motivo=$row2["CODIGO_PATENTE"];
		if ($motivo <> "") {
		$paso2="SELECT CODIGO, DESCRIPCION FROM Tipos_de_Patentes WHERE CODIGO =". $motivo;
		$sql4 = mssql_query($paso2);
		if (mssql_num_rows($sql4)>0){
		while($row4 = mssql_fetch_array($sql4)) {
			$descmotiv=$row4["DESCRIPCION"];
		}
		} else {
		   $descmotiv=$motivo ." * C&oacute;d No encontrado *";
		}
        } 
		
		$descclasif = " ";
		$cclasif=$row2["ROL"];
		$paso2="SELECT ROL,TIPO_PATENTE,SII,GIRO FROM MAESTRO_GIROS WHERE ROL=".$cclasif;
		$sql4 = mssql_query($paso2);
		if (mssql_num_rows($sql4)>0){
		while($row4 = mssql_fetch_array($sql4)) {
			$tpclasif=$row4["TIPO_PATENTE"];
			$girosii=$row4["GIRO"];
			$paso3="Select CODIGO,DESCRIPCION FROM ESTADO_PATENTE WHERE CODIGO='".$tpclasif."' AND TIPIPO=1";
			$sql5 = mssql_query($paso3);
			if (mssql_num_rows($sql5)>0){
			while($row5 = mssql_fetch_array($sql5)) {
			   $descclasif=$row5["DESCRIPCION"];
			}
			}
		}
		} else {
		   $dclasif=$cclasif." * C&oacute;d No encontrado *";
		}
        
		
		$numcalle=$row2["CODIGO_CALLE"];
		$paso2="SELECT COD_CALLE, DESCRIPCION FROM TT_CALLES WHERE COD_CALLE =". $numcalle;
		$sql4 = mssql_query($paso2);
		while($row4 = mssql_fetch_array($sql4)) {
			$desccalle=$row4["DESCRIPCION"];
		}
		
	    $deriva=$row2["ESTADO_PATENTE"];
		if ($deriva ='V') {
		    $descderiva='Vigente';
		} else {
		    if ($deriva ='P') {
		    $descderiva='Provisoria';
			} else {
		    	$descderiva=$row4["GLOSA_DE_TERMINO"];
			}
		}
		
    echo "<tr><td>".$row2["ROL"] ."</td><td>".$descclasif."</td><td>".$girosii."</td><td>". $descmotiv ."</td><td>".$desccalle." ".$row2["NUMERACION_CALLE"] ."</td><td>". $row2["ROL_SII_PROPIEDAD"]."</td><td>". $descderiva ."</td></tr>";
	}

}
echo "</table><br />";

?>