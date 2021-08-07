<?php include("../demo/MasterPage.php") ?>
  <div class="bootstrap pspagoefectivo">
      <div class="page-head">
          <ul class="breadcrumb page-breadcrumb">
              <li class="breadcrumb-current">
                  <i class="icon-AdminParentModules"></i>
              </li>
          </ul>
          <h2 class="page-title">
              Actualizar Fecha de expiraci&oacute;n Cip
          </h2>

      </div>
  </div>
  <div class="bootstrap pspagoefectivo">
<link href="../tools/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../tools/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../tools/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../tools/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="../tools/js/bootstrap-datetimepicker.pt-BR.js"></script>
<script type="text/javascript">
$(document).ready(function(){
                        $('#datetimepicker').datetimepicker({
                            format: 'dd/MM/yyyy hh:mm:ss',
                            language: 'pt-BR'
                        });
 });
                    </script>
<div class='pe_pago'>
   <div class='pe_payment'>
	    <form method="post" action="<?=$_SERVER["PHP_SELF"];?>">
	            Num CIP:<br /> <input type="text" style="width:358px;" id="txtCodigoCip" name="txtCodigoCip">
				<br />Fecha Expiraci&oacute;n : <div id="datetimepicker" class="input-append date"><input type="text" style="width:358px;" id="txtFechaExpiracion" name="txtFechaExpiracion">
                      <span class="add-on" >
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                      </span></div><br />
	            <input type="submit" id="btnPanel" value="Actualizar" name="btnPanel">
	   </form>
    <div style="font-size:10px;">
		<sup>*</sup> Se debe Ingresar el valor de un cip.  Ej: 1724393 y <br />Colocar la fecha de expiraci&oacute;n mayor a la fecha que se le asigno al inicio al CIP al generarlo
	</div>
   <div class='pe_option_pago'>

<?php
    //Validación de variables enviadas
    if(count($_POST)){
        require_once('../lib_pagoefectivo/code/PagoEfectivo.php');

        echo '<br /><br />Respuesta:<br /><hr><br>';

        $pagoefectivo = new App_Service_PagoEfectivo();
        try {
            //Llamada al método de actualización del Cip
            $paymentResponse =$pagoefectivo->actualizarCip(trim($_POST['txtCodigoCip']), trim($_POST['txtFechaExpiracion']));
			echo '<div style="color:#FF0000;">'.utf8_decode($paymentResponse->Mensaje).'</div>';
        }
        catch (Exception $e){
            echo 'Mensaje: ',  $e->getMessage(), "\n";
        }
    }
?>
    </div>
  </div>
 </div>
</div>
<?php include("../demo/FooterPage.php") ?>