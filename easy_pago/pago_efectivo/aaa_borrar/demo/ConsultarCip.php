<?php include("../demo/MasterPage.php") ?>
  <div class="bootstrap pspagoefectivo">
      <div class="page-head">
          <ul class="breadcrumb page-breadcrumb">
              <li class="breadcrumb-current">
                  <i class="icon-AdminParentModules"></i>
              </li>
          </ul>
          <h2 class="page-title">
              Consultar Cip
          </h2>

      </div>
  </div>
  <div class="bootstrap pspagoefectivo">
  <div class='pe_pago'>
   <div class='pe_payment'>
	    <form method="post" action="<?=$_SERVER["PHP_SELF"];?>">
	            Num CIP:<br /> <input type="text" style="width:358px;" id="txtCodigoCip" name="txtCodigoCip">
	            <br /><br />
                <input type="submit" id="btnPanel" value="Consultar" name="btnPanel">
	   </form>
    <div style="font-size:10px;">
		<sup>*</sup> Se puede Ingresar el valor de un cip o de mas separados por coma. Ej: 1724393,1723897  o 1724393
	</div>
    <br />
   <div class='pe_option_pago'>

<?php
    //Validación de variables enviadas
    if(count($_POST)){
       	echo '<br /><br />Respuesta:<br /><hr><br>';

        require_once('../lib_pagoefectivo/code/PagoEfectivo.php');
        try {
            $arr_moneda = array('1'=> 'S./', '2'=>'$');
			$arr_estado = array('22'=> 'Pendiente', '23'=>'Pagado', '21'=>'Expirado', '25'=>'Eliminado');
            //Lamada al método de Consulta de Cip
            $pagoefectivo = new App_Service_PagoEfectivo();
            $paymentResponse =$pagoefectivo->consultarCIP(trim($_POST['txtCodigoCip']));
						
            //Mostrar respuesta
    	    if($paymentResponse->Estado){
    			$CIPResult = $paymentResponse->CIPs->ConfirSolPago;
			 
    			if(count($CIPResult) > 1){					
					$i=1;
					foreach($CIPResult as $CIPs){
					   echo 'Orden Pago: '.$CIPs->CIP->IdOrdenPago.'<br />';
    					echo 'Id Comercio: '.$CIPs->CIP->OrderIdComercio.'<br />';
    					echo 'Monto: '.$arr_moneda[(string)$CIPs->CIP->IdMoneda].' '.$CIPs->CIP->Total.'<br />';
    					echo 'Estado del CIP: '.'<strong>'.$arr_estado[(string)($CIPs->CIP->IdEstado)].'</strong><br />';
    					echo 'Fecha de Emision: '.$CIPs->CIP->FechaEmision.'<br />';
    					echo '<br />Datos de Usuario<br />';
    					echo 'Nombre: '.$CIPs->CIP->UsuarioNombre.', '.$CIPs->CIP->UsuarioApellidos.'<br />';
    					echo 'E-mail: '.$CIPs->CIP->UsuarioEmail.'<br />';
    					echo '<br><hr><br>';						   
					}
    				
    			}else{
					$CIPResult = $CIPResult->CIP;
					$moneda = $CIPResult->IdMoneda; 					
    				echo 'Orden Pago: '.$CIPResult->IdOrdenPago.'<br />';
    				echo 'Id Comercio: '.$CIPResult->OrderIdComercio.'<br />';
    				echo 'Monto: '.$arr_moneda[(string)$CIPResult->IdMoneda].' '.$CIPResult->Total.'<br />';
    				echo 'Estado del CIP: '.'<strong>'.$arr_estado[(string)$CIPResult->IdEstado].'</strong><br />';
    				echo 'Fecha de Emision: '.$CIPResult->FechaEmision.'<br />';
    				echo '<br />Datos de Usuario<br />';
    				echo 'Nombre: '.$CIPResult->UsuarioNombre.', '.$CIPResult->UsuarioApellidos.'<br />';
    				echo 'E-mail: '.$CIPResult->UsuarioEmail.'<br />';
    				echo '<br><hr><br>';
    			}
    	    }else{
    			echo $paymentResponse->ConsultarCIPResult->Mensaje;
    	    }
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