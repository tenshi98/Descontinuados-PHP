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
				
				<div class="golden-forms">
					<form method="post" name="form1" action="GenerarCip.php">
						<section>
                       		<label for="Fono" class="lbl-text">Numero Telefonico:</label>
                            <label class="lbl-ui">
                            	<input required name="Fono" id="Fono" class="input" placeholder="Ingrese un numero telefonico" autofocus="" type="text" onkeypress="return isNumberKey(event)">
                            	<script>
								  <!--
								  function isNumberKey(evt)
								  {
									var charCode = (evt.which) ? evt.which : event.keyCode
									if (charCode > 31 && (charCode < 48 || charCode > 57)){
										return false;
									}else{
										return true;
									}
								  }
								  //-->
								</script>
                            </label>                            
						</section>
						<section>
                       		<label for="Fono" class="lbl-text">Email:</label>
                            <label class="lbl-ui">
                            	<input required name="Email" id="Email" class="input" placeholder="Ingrese su correo electronico" autofocus="" type="text" >
                            </label>                            
						</section>
						<section>
                       		<label for="monto" class="lbl-text">Monto de la Recarga:</label>
							<label for="monto" class="lbl-ui select">
                              <select id="monto" name="monto" required>
                                <option value="Select a State">Seleccione un monto</option>
                                <option value="5">5 Soles</option>
                                <option value="10">10 Soles</option>
                                <option value="20">20 Soles</option>
                              </select>
                            </label>
                        </section>
							<br/>
						<section>
						   <input value="Borrar" class="button" type="reset">
						   <input value="Confirmar" class="button" type="submit">  
						</section>
					</form>
				</div>
				
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
