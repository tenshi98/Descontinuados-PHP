<?php session_start();
  
    // HEAD --->
        require_once('../inc/head_int.php');         
     // HEAD --->
include('openinviter.php');


$id=$_GET['id'];
$logonform = <<< _end_lform

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" bgcolor=#e6e4e4>
<div align="center">
				<div class="b_perfil">
	    <table width="100%" border="0" cellspacing="0" cellpadding="0" height="400">
          <tr>
            <td height="90%" valign="middle" colspan="2" align="center">
_end_lform;
echo $logonform;
$inviter=new OpenInviter();
$oi_services=$inviter->getPlugins();

if (isset($_POST['provider_box'])) 
{
	if (isset($oi_services['email'][$_POST['provider_box']])) $plugType='email';
	elseif (isset($oi_services['social'][$_POST['provider_box']])) $plugType='social';
	else $plugType='';
}
else $plugType = '';

function ers($ers)
	{
	if (!empty($ers))
		{
		$contents="<table cellspacing='0' cellpadding='0' style='border:1px solid red;' align='center' class='tbErrorMsgGrad'><tr><td valign='middle' style='padding:3px' valign='middle' class='tbErrorMsg'>";
		foreach ($ers as $key=>$error)
		$contents.="{$error}";
		$contents.="<br><br><br> <div class='cont_btn'><input type='submit'  onClick='parent.location.reload();parent.Shadowbox .close();' Value='Volver'/></div></td></tr></table>";


		return $contents;
		}
	}
	
function oks($oks)
	{
	if (!empty($oks))
		{
		require('../nombre_pag.php');
		$contents="<table border='0' cellspacing='0' cellpadding='10' style='border:1px solid #5897FE;' align='center' class='tbInfoMsgGrad'><tr><td valign='middle' style='color:#5897FE;padding:5px;'>	";
		foreach ($oks as $key=>$msg)
		$contents.="{$msg}";
		$contents.="<br><br><br> <div class='cont_btn'><input type='submit'  onClick='parent.location.reload();parent.Shadowbox .close();' Value='Volver'/></div></td></tr></table>";

		return $contents;
		}
	}

if (!empty($_POST['step'])) $step=$_POST['step'];
else $step='get_contacts';

$ers=array();$oks=array();$import_ok=false;$done=false;
if ($_SERVER['REQUEST_METHOD']=='POST')
	{
	if ($step=='get_contacts')
		{
		if (empty($_POST['email_box']))
			$ers['email']="E-mail No enviado.";
		if (empty($_POST['password_box']))
			$ers['password']="Password errónea o nula.";
		if (empty($_POST['provider_box']))
			$ers['provider']="Proveedor erróneo.";
		if (count($ers)==0)
			{
			$inviter->startPlugin($_POST['provider_box']);
			$internal=$inviter->getInternalError();
			if ($internal)
				$ers['inviter']=$internal;
			elseif (!$inviter->login($_POST['email_box'],$_POST['password_box']))
				{
				$internal=$inviter->getInternalError();
				$ers['login']=($internal?$internal:"Fallo en el Login. Por favor , revise su e-mail o login y la password y trate nuevamente m&aacute;s tarde.");
				}
			elseif (false===$contacts=$inviter->getMyContacts())
				$ers['contacts']="Imposible de capturar sus contactos en este momento, trate m&aacute;s tarde.";
			else
				{
				$import_ok=true;
				$step='send_invites';
				$_POST['oi_session_id']=$inviter->plugin->getSessionID();
				$_POST['message_box']=$mensaje;
				}
			}
		}
	else {
	}}
else
	{
	$_POST['email_box']='';
	$_POST['password_box']='';
	$_POST['provider_box']='';
	}

$contents="<script type='text/javascript'>
	function toggleAll(element) 
	{
	var form = document.forms.openinviter, z = 0;
	for(z=0; z<form.length;z++)
		{
		if(form[z].type == 'checkbox')
			form[z].checked = element.checked;
	   	}
	}
</script>";



$contents.="<form action='' method='POST' name='openinviter'>".ers($ers).oks($oks);
if (!$done)

	{
	if ($step=='get_contacts')
		{
	
		$contents.="<img src='http://$nombreurl/img/iconos_mail_texto.png' /><table align='center' class='TablaCV_t' cellspacing='0' cellpadding='0' style='border:none;' width=500 >";
		$contents.= "<tr ><td align='right'  ><h4>Email o Login de Red Social&nbsp;&nbsp;&nbsp;&nbsp;</h4></td><td><input class='formmail' type='text' name='email_box' value='{$mi_mail}'></td></tr>";
		$contents.= "<tr ><td align='right'><h4>Password de Tu Correo&nbsp;&nbsp;&nbsp;&nbsp;</h4></td><td><input class='formmail' type='password' name='password_box' value='{$_POST['password_box']}'></td></tr>";
		$contents.= "<tr ><td align='right' ><h4>Selecciona Correo Electr&oacutenico/Red Social&nbsp;&nbsp;&nbsp;&nbsp;</h4></td><td><select class='formmail' name='provider_box'><option value=''></option>";
		
		foreach ($oi_services as $type=>$providers)	
			{
			$contents.="<option disabled>".$inviter->pluginTypes[$type]."</option>";
			foreach ($providers as $provider=>$details)
				$contents.="<option value='{$provider}'".($_POST['provider_box']==$provider?' selected':'').">{$details['name']}</option>";
			}
		$contents.="</select></td></tr><tr ><td align='right'></td><td align='right'></td></tr><br></br><br></br><tr class='thTableImportantRow'><td colspan='2' align='center' valign='middle'><br></br><div class='cont_btn'><input name='submit_edit' type='submit'  id='post_button' Value='Enviar Consulta'/></div>";
		$contents.="<div class='cont_btn'><input type='submit'  onClick='parent.location.reload();parent.Shadowbox .close();' Value='Volver'/></div>";
		$contents.="</td></tr></table><input type='hidden' name='step' value='get_contacts'>";
		}
	else
		$contents.="<table class='thTable' cellspacing='0' cellpadding='0' style='border:none;'><tr class='thTableRow'><td align='right' valign='top'></td><td><img src='http://{$nombreurl}/img/ok.png' ><br></td><p>&nbsp;</p><p>&nbsp;</p></tr></table>";
	}

if (!$done)
	{
	if ($step=='send_invites')
		{
		if ($inviter->showContacts())
			{
			$contents.="<table class='thTable' align='center' cellspacing='0' cellpadding='0'><tr class='blanco'><td colspan='".($plugType=='email'? "3":"2")."'>Tus Contactos han sido Cargados</td></tr>";
			if (count($contacts)==0)
				$contents.="<tr class='thTableOddRow'><td align='center' style='padding:20px;' colspan='".($plugType=='email'? "3":"2")."'>Tu no tienes contactos en esta direccion.</td></tr>";
			else
				{
				$contents.="<tr class='thTableDesc'><td><br> Puedes continuar <br></td></tr>";
				$odd=true;$counter=0;
				foreach ($contacts as $email=>$name)
					{
					$counter++;
					if ($odd) $class='thTableOddRow'; else $class='thTableEvenRow';
//******************
        $email_check = "SELECT * FROM correos  WHERE origen ='".$row_usuario["PostEmail"]."' and destino='".$email."'  and usuario='".$row_usuario["PostEmail"]."'";




        if (!($email_check)) print mysql_error(); 
        $result = mysql_query($email_check ,$dbCasting); 
        $num_rows = mysql_num_rows($result); 
     
        if ($num_rows == 0) 
            { 
			$sql = "insert into correos (usuario,origen,destino,estado) values ('{$row_usuario['PostEmail']}','{$row_usuario['PostEmail']}','{$email}','1')";
			$ejecuta = mysql_query($sql ,$dbCasting);
			}


//******************
					}
				$contents.="<tr class='thTableFooter'><td colspan='".($plugType=='email'? "3":"2")."' style='padding:3px;'>";
				$contents.="<div class='cont_btn'><input type='submit'  onClick='parent.location.reload();parent.Shadowbox .close();' Value='Volver'/></div></td></tr>";

				}
			$contents.="</table>";
			}
			
	
		}
	}
$contents.="</td>";
$contents.="</tr>";
$contents.="</table></div>";

echo $contents;
?>