<?php
require_once('../conexion.php');
	if(isset($_GET['set']))
	{
  	   if(isset($_GET['content']))
		{
		   $str_msg = stripslashes($_GET['content']);
		   $time = getdate();
		   $str_msg = add_smilies($str_msg);
		   $t_stamp = $time['hours'].":".$time['minutes'].":".$time['seconds'];

		   ($_GET['uid']=='1')? $color ="red" : $color ="green";

		   $insert1 = "INSERT INTO chat (user_id,room,msg,timestamp,displayed) VALUES ('".$_GET['uid']."','".$_GET['room']."', '".addslashes($str_msg)."', '$t_stamp', '0')";
		   mysql_query($insert1,$base);
		   echo "<br><font color=$color><b>Me </b>[".$t_stamp."] <b>: </b></font>".$str_msg;
		}
	}
	else if(isset($_GET['get']))
	{ 
		if($_GET['uid']=='1')
		{
			$uid = "2";
			$color  = "green";
		}
		else
		{
			$uid = "1";
			$color  = "red";
		}
     	   $get = "select * from chat where user_id= ".$uid." and room='".$_GET['room']."' and displayed=0";	
  	       $res = mysql_query($get,$base);
		   $num_rows = mysql_num_rows($res);
		   if($num_rows)
			{
			   while($new_msg = mysql_fetch_array($res))
				    echo "<br><font color=\"$color\"><b>User ".$uid." </b>[".$new_msg['timestamp']."] <b>: </b></font>".stripslashes($new_msg['msg']);
			   $udp="update chat set displayed=1 where user_id=".$uid." and room='".$_GET['room']."' and displayed=0";
			   $mark2 = mysql_query($udp,$base);	
			}
		
	}
	else
	{
		echo "<font color=red><b><br>Error processing data...!</b></font>";
	}

function add_smilies($str_msg)
{
 $get_smiles = mysql_query("select * from smilies order by length(image_code) desc",$base);
  while($row_smilies = mysql_fetch_array($get_smiles))
  {
    $str_msg = str_replace(''.$row_smilies['image_code'].''," <img src='images/".$row_smilies['id'].".gif'> ",$str_msg);
	
	//$str_msg = preg_match("/".$row_smilies['image_code']."/","<img src='images/".$row_smilies['id'].".gif'>");
	/*if(false !== strpos($row_smilies['image_code'],$str_msg))
	  {
		$sel = mysql_query("select * from smilies where image_code='".$row_smilies['image_code']."'");
		$row = mysql_fetch_array($sel);		
		echo "<img src='images/".$row_smilies['id'].".gif'>";
	  }*/

  }
  return $str_msg;
}

?>
