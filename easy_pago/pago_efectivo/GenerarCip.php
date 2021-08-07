<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PagoEfectivo - Comprar Recarga</title>
<link href="css/estilo.css"     rel="stylesheet" type="text/css" />
<link href="images/favicon.ico" rel="icon"       type="image/x-icon">

</head>

<body onload="MM_preloadImages('images/inicio_up.png')">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top">
		<table align="center" width="990" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="220" height="150" align="center"><img src="images/logo.png" height="100" /></td>
        <td width="770" valign="top">
			<?php require_once 'core/menu.php';?>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top" bgcolor="#b91026"><table align="center" width="990" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center">
			<table width="90%" border="0" cellpadding="0" cellspacing="0" class="tab_bca esquina_red">
          <tr>
            <td align="center"><!-- Do not change the code! -->
              <table align="center" width="500" border="0" cellspacing="0" cellpadding="0">
				
<?php
//Compruebo si recibi los datos
if (isset($_POST['Fono'])) {
	
	// Recibo los datos a traves de post
    $Fono        = $_POST['Fono'];

	//Conecto a la base de datos externa
	function conectar2 ($servidor, $usuario, $pass, $base) {
		$db_con = mysql_connect ($servidor,$usuario,$pass);
		if (!$db_con) return false; 
		if (!mysql_select_db ($base, $db_con)) return false;
		if (!mysql_query("SET NAMES 'utf8'")) return false;
		return $db_con; 
	}
	$dbConn2 = conectar2("190.98.210.37","userdbscl","petland","llappaperu");


	//Selecciono datos del usuario
	$query = "SELECT id_ejecutiv, nom_ejecutiv, fono_ejecutiv, mail_ejecutiv
	FROM ejecutivos  
	WHERE fono_ejecutiv LIKE '%$Fono%'";
	$resultado = mysql_query ($query, $dbConn2)or die(mysql_error());
	$row_data = mysql_fetch_assoc ($resultado);
    
	//Si el usuario existe y esta activo
    if (isset($row_data)&&$row_data!='') {

		require_once('lib_pagoefectivo/code/configpe.php'); ?>

		<div class="pe_pago golden-forms">
			<form action="cip.php" id="frmPago" name="frmPago" method="post">
				
				<input type="hidden" name="t-total"  value="<?php echo $_POST['monto']?>">
				<input type="hidden" value="2" name="metodopago" checked="checked" id="form-validation-field-1">
				
				<input type="hidden" name="user_name"  value="<?php echo $row_data['nom_ejecutiv']?>">
				<input type="hidden" name="user_phone"  value="<?php echo $row_data['fono_ejecutiv']?>">
				<input type="hidden" name="user_id"  value="<?php echo $row_data['id_ejecutiv']?>">
				<input type="hidden" name="user_email"  value="<?php echo $_POST['Email']?>">
				
				<h3 style="width:50%;">Datos de la venta</h3>
				
				<section style="margin-top:5px; width:50%;">
					<div style="text-align:justify;">
						<p><strong>Nombre : </strong><?php echo $row_data['nom_ejecutiv']; ?></p>
						<p><strong>Telefono : </strong><?php echo $row_data['fono_ejecutiv']; ?></p>
						<p><strong>Monto  : </strong><?php echo $_POST['monto'].' Soles'; ?></p>
						<p><strong>Email  : </strong><?php echo $_POST['Email']; ?></p>
					</div>
				</section>
				
				
				
				<h3 style="width:50%;">M&eacute;todo de pago</h3>
				
				<section style="margin-top:5px; width:50%;">
					<div style="float: left; width: 5%;">
						<input style="margin-top:17px;" type="radio" name="asd" value="1" checked>
					</div>	
					<div style="float: left; width: 30%;">
						<img width="90%" height="auto" src="lib_pagoefectivo/images/15b.png">
					</div>
					<div style="float:left;text-align:justify; width: 65%;">
						<strong>Banca por Internet</strong><br />
						Paga a través de tu banca por internet en BCP. Debítalo de tu cuenta o cargalo a tu tarjeta de credito asociada.
					</div>
					<div style="clear:both;"></div>
					
					<div style="margin-top:15px;"></div>
					<div style="float: left; width: 5%;">
						<input style="margin-top:17px;" type="radio" name="asd" value="2" >
					</div>
					<div style="float: left; width: 30%;">
						<img width="90%" height="auto" src="lib_pagoefectivo/images/15.png">
					</div>
					<div style="float:left;text-align:justify; width: 65%;">
						<strong>Agentes y bodegas</strong><br />
						Acércate a cualquier punto del BCP y Bodegas de FULLCARGA.
					</div>
					<div style="clear:both;"></div>
				</section>
			   
				<section>
					<a href="venta.php"><input type="button" value="volver" class="button pe_continuar_btn1" ></a>
					<input type="submit" id="Send" value="Crear Voucher" class="button pe_continuar_btn1" name="Send">
				</section>
								  
			</form>
		</div>        

    <?php //Si no hay datos envio mensaje de error
   } else { ?>

	<div class="pe_pago golden-forms">
		<h3 style="width:50%;">Mensaje</h3>
		<section style="margin-top:5px; width:50%;">
			<div style="text-align:justify">
				Usuario no registrado o numero telefonico mal ingresado<br />
			</div>
		</section>
		   
		<section>
			<a href="venta.php"><input type="button" value="volver" class="button pe_continuar_btn1" ></a>
		</section>
	</div> 
     
    <?php }
//Mensaje de error en caso de que se ejecute el formulario sin los datos post
} else { ?>
    <div class="pe_pago golden-forms">
		<h3 style="width:50%;">Mensaje</h3>
		<section style="margin-top:5px; width:50%;">
			<div style="text-align:justify">
				Telefono no ingresado<br />
			</div>
		</section>
		   
		<section>
			<a href="venta.php"><input type="button" value="volver" class="button pe_continuar_btn1" ></a>
		</section>
	</div>   
<?php } ?>





 






				
              </table>
          </tr>
        </table>
        </td>
      </tr>
    </table></td>
  </tr>
</table>
<table align="center" width="990" border="0" cellspacing="0" cellpadding="0">
  <?php require_once 'core/footer.php';?>
</table>
<blockquote>&nbsp;</blockquote>
</body>
</html>
