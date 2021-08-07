<?php session_start();
  
    // HEAD --->
        require_once('inc/head.php');         
     // HEAD --->         

?>

<body>
<?
$sql_vs="Select nombre,foto,motivo,enviado,estado from tarjetas_saludos where nombre='".$_GET["nombre"]."' and motivo='".$_GET["tarjeta"]."'";
$result = mysql_query($sql_vs,$dbCasting);
while($row=mysql_fetch_array($result))
{

?>
<audio source src="./imagesVS/<?=$_GET["tarjeta"]?>/<?=$_GET["musica"]?>" autoplay>      </audio>




  <TABLE width=640 height=480 background="./imagesVS/<?=$_GET["tarjeta"]?>/<?=$row["foto"]?>" >
  <TR>
  	<TD>&nbsp;</TD>
  </TR>
  </TABLE>
<?

}


?>








</body>
</html>
