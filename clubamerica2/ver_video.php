<?php session_start();
  
    // HEAD --->
        require_once('inc/head.php');         
     // HEAD --->         

?>

<body  bgcolor="#000000">

<?
$result = mysql_query("select * from parametros",$dbCasting);

while($row=mysql_fetch_array($result))
{
		  $ipe_in=$row['IP_interna'];
		  $ipe_out=$row['IP_externa'];
		  $datos=$row['donde'];
		  list($ip1_in, $ip2_in, $ip3_in, $ip4_in) =split( '[.]', $row['IP_interna']);
		  list($ip1_out, $ip2_out, $ip3_out, $ip4_out) =split( '[.]', $row['IP_externa']);
		  
}	

$mi_ip = $_SERVER['REMOTE_ADDR']; 
list($ip1, $ip2, $ip3, $ip4) =split( '[.]', $mi_ip);
$inicio=$ip1_in.".".$ip2_in.".".$ip3_in.".";


if ($mi_ip == "200.119.246.138")
			{
				 $IPE_ok=$ip1_in.".".$ip2_in.".".$ip3_in.".".$ip4_in;
			}
			  else
			{
	 			$IPE_ok=$ip1_out.".".$ip2_out.".".$ip3_out.".".$ip4_out;
}

$pos = strpos($_GET["correo"], ".jpg");
if ($pos === false) {
	$video=$_GET["correo"].".flv";
} else {
	$video=str_replace('.jpg', '.flv', $_GET["correo"]);
	
}
$video=$datos.$video;
?>
  <!-- Inicio Cuerpo Web-->



<script type='text/javascript' src='http://<?=$nombreurl?>/jw/jwplayer.js'></script>
<div id="intro">
<div id="container">Cargando Videos...</div>
<script type="text/javascript"> 
jwplayer("container").setup
({ 
        flashplayer: "http://<?=$nombreurl?>/jw/player.swf", 
		autostart: true,
        file: "<?=$video?>",
		skin: "http://<?=$nombreurl?>/jw/glow.zip",		
								width: 620,
								height: 347,
}); 
</script> 
</div>





</div>















</body>
</html>
