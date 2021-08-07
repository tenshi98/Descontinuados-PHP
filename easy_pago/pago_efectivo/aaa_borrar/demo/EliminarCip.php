<?php include("../demo/MasterPage.php") ?>
  <div class="bootstrap pspagoefectivo">
      <div class="page-head">
          <ul class="breadcrumb page-breadcrumb">
              <li class="breadcrumb-current">
                  <i class="icon-AdminParentModules"></i>
              </li>
          </ul>
          <h2 class="page-title">
              Eliminar Cip
          </h2>

      </div>
  </div>
  <div class="bootstrap pspagoefectivo">
  <div class='pe_pago'>
     <div class='pe_payment'>
	    <form method="post" action="<?=$_SERVER["PHP_SELF"];?>">
	            Num CIP:<br /> <input type="text" style="width:358px;" id="txtCodigoCip" name="txtCodigoCip">
                <br /><br />
	            <input type="submit" id="btnPanel" value="Eliminar" name="btnPanel">
	   </form>
   <div class='pe_option_pago'>

<?php
    //Validación de variables enviadas
    if(count($_POST)){
       	echo '<br /><br />Respuesta:<br /><hr><br>';

        require_once('../lib_pagoefectivo/code/PagoEfectivo.php');
        try {
            //Lamada al método de Eliminar de Cip
            $pagoefectivo = new App_Service_PagoEfectivo();
            $paymentRequest =$pagoefectivo->eliminarCip($_POST['txtCodigoCip']);
            echo $paymentRequest->Mensaje;

        }
        catch (Exception $e){ var_dump($e);
            echo 'Mensaje: ',  $e->getMessage(), "\n";
        }
    }
?>
    </div>
  </div>
 </div>
</div>
<?php include("../demo/FooterPage.php") ?>