                                     
<?php
require_once('./conexion3.php');

echo "<strong>Conectado a Tesoreria</strong><br/>";
$rut='07024003-3';
echo "<br/>Mostrar base<br/><hr>";
$qryteso="SELECT TOP 25 Ano_Proceso, Codigo_Area, Orden_Ingreso, Item_Pago, Fecha_Emision, Fecha_Vencimiento, Rut, Nombre, Placa_Vehiculo, Rol_Patente, Rol_Propiedad, EmitidoPor, Glosa, Fecha_OrdenIngreso, Ano_OrdenIngreso, Numero_OrdenIngreso, FormaDePago, NroConvenio, Tipo_Tarjeta, Codigo_Tarjeta, Rut_Tarjeta, Monto_Tarjeta, Pagado_ConOrdenIngreso, Pagado_ConIDOrdenIngreso, Numero_Licencia, idUnidadHabitacional, Folio_Unico, Total_OrdenIngreso FROM EncabezadoDeudoresMunicipales WITH (NOLOCK) WHERE Item_Pago='5' AND ((Rut='".$rut."')) ORDER BY Ano_Proceso DESC";
			 
$result = mssql_query($qryteso, $lnk_teso);
			if (mssql_num_rows($result)>0){ 
			 ?>
              <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
			  <thead><tr><th width="20">Orden de Ingreso</th><th width="80">Fecha</th><th width="240">Glosa</th><th width="38">Rol Propiedad</th><th width="80">Valor Total</th></tr></thead>
			 <? $auxctcontrol=1;
			    $anhoantes="";
				while($row = mssql_fetch_array($result)) {
					$ordingreso="";
					$fechaemi="";
					$cerglosa="";
					$rolprop="";
					$valorpagado="";
					$anhoproc="";

				    $ordingreso=trim($row["Orden_Ingreso"]);
					$cerglosa=trim($row["Glosa"]);
					$rolprop=trim($row["Rol_Propiedad"]);
					$valorpagado=trim($row["Total_OrdenIngreso"]);
					if (strlen($valorpagado) > 0 ) {
					  $valorpagado="$ ".number_format($valorpagado , 0 ,',' , '.' );
					}
					$anhoproc=trim($row["Ano_Proceso"]);

					$dato=$row["Fecha_Emision"];
					if (strlen($dato) != 0 ){
						if (substr($dato,0,3)=="Ene") {
							$dato = str_replace("Ene", "Jan", $dato);
						}
						if (substr($dato,0,3)=="Abr") {
							$dato = str_replace("Abr", "Apr", $dato);
						}
						if (substr($dato,0,3)=="Ago") {
							$dato = str_replace("Ago", "Aug", $dato);
						}
						if (substr($dato,0,3)=="Dic") {
							$dato = str_replace("Dic", "Dec", $dato);
						}				
						$fechanacim = strtotime($dato);
						$fechaemi = date( 'd/m/Y', $fechanacim);
					}
					if (($auxctcontrol!=1) && ($anhoantes!=$anhoproc)) {
						echo"<tr><td colspan='12' style='padding:1px;background-color:#dad7c7;'><img src='./images/espacio.gif' border='0' width='1' height='1' /></td></tr>";	
					}
					echo "<tr><td align='center' >".$ordingreso."</td><td align='center'>".$fechaemi."</td><td  align='left'>".$cerglosa."</td><td align='center' >".$rolprop."</td><td align='right' >".$valorpagado." </td></tr>";
					$anhoantes = $anhoproc;
					$auxctcontrol = $auxctcontrol + 1 ;
				  } 
                 

				 ?>
				
			 </table>
		 <? } ?>


<br /><br />