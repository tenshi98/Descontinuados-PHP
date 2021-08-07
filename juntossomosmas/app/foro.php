<script type="text/javascript" src="js/jquery_1.5.2.js"></script>
<script type="text/javascript" src="js/vpb_load_more_contents.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">
	<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<? 
define('XMBCXRXSKGC', 1);
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';

$cuento_posteo="SELECT * FROM respuesta WHERE id_mensaje =".$_GET["cat"]." and texto_respuesta<>''";
 $cuento_posteo1=mysql_query($cuento_posteo,$dbConn);
 $cuento_posteo11=mysql_num_rows($cuento_posteo1); 
?>
<font color="#ff0000"><? echo $cuento_posteo11;?> Comentarios</font>



<!-- Load more contents code starts here -->

<?php

$check_contents_from_the_database = mysql_query("SELECT * FROM respuesta WHERE id_mensaje =".$_GET["cat"]." and texto_respuesta<>'' order by `id` desc limit 5",$dbConn);
 
if(mysql_num_rows($check_contents_from_the_database) > 0)
{
	 while($get_checked_contents_from_the_database = mysql_fetch_array($check_contents_from_the_database))
	 {
		 $last_loaded_id = strip_tags($get_checked_contents_from_the_database["id"]);
		 $sql01 ="SELECT nom_ejecutiv FROM ejecutivos WHERE id_ejecutiv='".$get_checked_contents_from_the_database["id_usuario"]."'";
		$res01=mysql_query($sql01,$dbConn); 
		$row_data01 = mysql_fetch_assoc ($res01);
		 ?>
         <div id="vpbconetnts" onclick="vpb_show_text('<?php echo strip_tags($get_checked_contents_from_the_database["id"]); ?>. <?php echo strip_tags($get_checked_contents_from_the_database["texto_respuesta"]); ?>');">
		 <div style=" float:left; width:90%;" align="left"><span class="fecha_gris_12"><strong><?php echo $row_data01['nom_ejecutiv'];?></strong></span></div><br>
         
		 <div style=" float:left; width:90%;" align="left"><?php echo strip_tags($get_checked_contents_from_the_database["texto_respuesta"]); ?></div>
		 <div style=" float:left; width:90%;" align="right"> <span class="fecha_gris_12" align=right><?php echo strip_tags($get_checked_contents_from_the_database["fecha_hora"]); ?></span></div>
         <br clear="all" />
         </div>
         <?php
	 }
	 ?>
     
     <!-- Displays more contents -->
     <div id="more_tutorials_loaded"></div>
     
     
     <!-- Holds the id of the last loaded content for the next contents to load -->
     <input type="hidden" id="last_loaded_id" value="<?php echo $last_loaded_id; ?>" />
     
     <!-- This is the load more contents button -->
 	 <center>
     <div id="vpb_more_button" class="vpb_show_more_or_the_end" align="center" onclick="Vasplus_Programming_Blog_Load_More_Contents(<?=$_GET["cat"]?>);"><center><span id="more_contents_loading">Cargar Mas Comentarios</span></center></div>
     </center>
     
     <?php
}
else
{
	echo "En este momento no existen comentarios al tema...";
}

?>

<!-- Load more contents code ends here -->











<p style="padding-bottom:200px;">&nbsp;</p>
</center>