<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
require_once('../nombre_pag.php');
require_once('../conexion.php');
?>
<head>
<title>Ajax Chat Script [User 2]</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript" src="ajax.js"></script>
<script type="text/javascript" src="functions.js"></script>
<script type="text/javascript">
</script>
<link href="styles.css" rel="stylesheet" type="text/css"></link>	
<script language="JavaScript">
<!--
if (document.layers)
  document.captureEvents(Event.KEYDOWN);
  document.onkeydown =
    function (evt) { 
      var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
      if (keyCode == 13)
       {
         send_message('output_div','text_content','2','<?=$_GET["room"]?>');
       }
    }
//-->
</script>
<META http-equiv="Page-Enter" CONTENT="RevealTrans(Duration=4,Transition=7)"/>
</head>
<body onload="get_message('output_div','2','<?=$_GET["room"]?>')">
<center>
 <div class="body-holder">
	<div class="window">
		<table width="100%" cellspacing="0" cellpadding="0" border="0">
		<tr>
		  <td><img src='images/header_01.jpg' height="34"></td>
		  <td background="images/header_02.jpg" >
			<img src="images/1.gif" border="0" >
		  </td>
		  <td background="images/header_02.jpg" width="100%">
			<div id="window_title">&nbsp;jOOtes Chat</div>
		  </td>
		  <td background="images/header_02.jpg" >
			<img src="images/tipclose.gif" width="20" height="15" onclick="javascript:window.opener='x';window.close();";">
		  </td>
		  <td><img src='images/header_03.jpg'></td>
		</tr>
		</table>
	</div>
 	 <div id="tools">
	   <?php
	   $res_smilies = mysql_query("select * from smilies",$base);
	   $count = 0;
	   echo "<table cellspacing=1 border=0 cellpadding=1>\n<tr>";
	   	while($row_smilies = mysql_fetch_array($res_smilies))
		{
			if($count == 4)
			{
				echo "</tr><tr>";
				$count=0;
			}
			echo "\n<td align='center' width='35'>\n <a href='#' alt='".$row_smilies['image_code']."' onclick=\"add_code('".($row_smilies['image_code'])."');\" border=\"0\"><img src=\"images/".$row_smilies['id'].".gif\" border=\"0\"></a>\n</td>";
			$count ++;
		}
		echo "</table>";
	  ?>
	 </div>
     <div class="main_container">
		<div class="output-div-container">
		   <div id="output_div" onclick="show_smilies()">   </div>
		</div>
		<table border="0" width="504" class="tool_table">
		 <tr>
		  <td width="20"><a href="#" onclick="show_smilies('tool')"><img src="images/1.gif" border="0"></a></td>
	      <td></td>	
		 </tr>
		</table>
		<div class="input-div">
		   <textarea type="text" id="text_content" onclick="show_smilies()" size="40" ></textarea>
		   <input type="submit" value="enviar" onclick="send_message('output_div','text_content','2','<?=$_GET["room"]?>')">
		</div>
	</div>
	</div>

 </center>
</body>
</html>
