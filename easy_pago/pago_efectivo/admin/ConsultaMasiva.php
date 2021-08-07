<?php include("../admin/MasterPage.php") ?>
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
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['idPago']) ) { 	 ?> 
	  
	<div class='pe_payment'>
	    <form method="post" action="<?=$_SERVER["PHP_SELF"];?>">
	            Num CIP:<br /> <input type="text" style="width:358px;" id="txtCodigoCip" name="txtCodigoCip" value="<?php echo $_GET['idPago']; ?>">
	            <br /><br />
                <input type="submit" id="btnPanel" value="Consultar" name="btnPanel">
	   </form>
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
	  
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
//Conecto a la base de datos externa
function conectar2 ($servidor, $usuario, $pass, $base) {
	$db_con = mysql_connect ($servidor,$usuario,$pass);
	if (!$db_con) return false; 
	if (!mysql_select_db ($base, $db_con)) return false;
	if (!mysql_query("SET NAMES 'utf8'")) return false;
	return $db_con; 
}
$dbConn2 = conectar2("localhost","root","petland","easy_pago");	 
//Consulta
$arrVentas = array();
$query = "SELECT Monto, Fecha, Fono, Cip, Estado  FROM `clientes_pago_efectivo` WHERE Estado=1";
$resultado = mysql_query ($query, $dbConn2);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrVentas,$row );
}

require_once('../lib_pagoefectivo/code/PagoEfectivo.php');

$arr_moneda = array('1'=> 'S./', '2'=>'$');
$arr_estado = array('22'=> 'Pendiente', '23'=>'Pagado', '21'=>'Expirado', '25'=>'Eliminado');
//Lamada al método de Consulta de Cip
$pagoefectivo = new App_Service_PagoEfectivo();
            
            
?>

<style>
.table-bordered {
    border: 1px solid #DDD;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
}
table {
    background-color: transparent;
}
table {
    border-spacing: 0px;
    border-collapse: collapse;
}
.table > tbody > tr.active > td, .table > tbody > tr.active > th, .table > tbody > tr > td.active, .table > tbody > tr > th.active, .table > tfoot > tr.active > td, .table > tfoot > tr.active > th, .table > tfoot > tr > td.active, .table > tfoot > tr > th.active, .table > thead > tr.active > td, .table > thead > tr.active > th, .table > thead > tr > td.active, .table > thead > tr > th.active {
    background-color: #F5F5F5;
}


</style>
<table class="table table-bordered table-hover">
	<tr class="active">
		<td>Monto</td>
		<td>Fecha</td>
		<td>Fono</td>
		<td>Cip</td>
		<td>Estado Cip</td>
		<td>Acciones</td>
	</tr>
	<?php foreach ($arrVentas as $ventas) { ?>
		<tr>
			<td><?php echo $ventas['Monto']; ?></td>
			<td><?php echo $ventas['Fecha']; ?></td>
			<td><?php echo $ventas['Fono']; ?></td>
			<td><?php echo $ventas['Cip']; ?></td>
			<td>
			<?php
			try {
  
            $paymentResponse =$pagoefectivo->consultarCIP(trim($ventas['Cip']));
						
				//Mostrar respuesta
				if($paymentResponse->Estado){
					$CIPResult = $paymentResponse->CIPs->ConfirSolPago;
				 
					if(count($CIPResult) > 1){					
						$i=1;
						foreach($CIPResult as $CIPs){
							echo 'Estado del CIP 1: '.'<strong>'.$CIPs->CIP->IdEstado.'</strong>';						   
						}
						
					}else{
						echo 'Estado del CIP 2: '.'<strong>'.$CIPResult["CIP"]["IdEstado"].'</strong>';
						echo '<pre>';
						var_dump($CIPResult);
						echo '</pre>';
					}
				}else{
					echo $paymentResponse->ConsultarCIPResult->Mensaje;
				}
			}
			catch (Exception $e){
				echo 'Mensaje: ',  $e->getMessage(), "\n";
			}
			
			
			
			
			
			?>
			
			
			
			</td>
		</tr>
	<?php } ?>
</table>
	 
	   
<?php } ?>	  
	  
   
 </div>
</div>
<?php include("../admin/FooterPage.php") ?>
