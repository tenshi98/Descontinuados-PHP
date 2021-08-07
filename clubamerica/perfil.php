<?php session_start();
  
    // HEAD --->
        require_once('inc/head.php'); 
		require_once('AR2D2CFFDJFDJX1/xrxs_funciones/functions.php');        
     // HEAD --->         
//si el boton editar es presionado
if ( !empty($_POST['submit_edit']) ) {
	//Defino variables
	if ( !empty($_POST['PostNombres']) )        $PostNombres       = $_POST['PostNombres'];
	if ( !empty($_POST['PostApellPapa']) )      $PostApellPapa     = $_POST['PostApellPapa'];
	if ( !empty($_POST['PostApellMama']) )      $PostApellMama     = $_POST['PostApellMama'];
	if ( !empty($_POST['dia']) )                $dia               = $_POST['dia'];
	if ( !empty($_POST['mes']) )                $mes               = $_POST['mes'];
	if ( !empty($_POST['ano']) )                $ano               = $_POST['ano'];
	if ( !empty($_POST['idPais']) )             $idPais            = $_POST['idPais'];
	if ( !empty($_POST['idDepartamento']) )     $idDepartamento    = $_POST['idDepartamento'];
	if ( !empty($_POST['idProvincia']) )        $idProvincia 	   = $_POST['idProvincia'];
	if ( !empty($_POST['idDistrito']) )         $idDistrito 	   = $_POST['idDistrito'];
	if ( !empty($_POST['PostDireccion']) )      $PostDireccion 	   = $_POST['PostDireccion'];
	if ( !empty($_POST['PostFonoFijo']) )       $PostFonoFijo 	   = $_POST['PostFonoFijo'];
	if ( !empty($_POST['PostFonoCel']) )        $PostFonoCel 	   = $_POST['PostFonoCel'];
	if ( !empty($_POST['PostEmail']) )          $PostEmail 	       = $_POST['PostEmail'];
	
	//Defino errores
	if ( empty($PostNombres) )      $errors[1] 	  = 'error';
	
	// si no hay errores ejecuto el codigo	
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])     ) { 

			
		//Se buscan los datos validos
        $a = "PostNombres='".$PostNombres."'" ;
		if(isset($PostApellPapa) && $PostApellPapa != ''){                         $a .= ",PostApellPapa='".$PostApellPapa."'" ; }
		if(isset($PostApellMama) && $PostApellMama != ''){                         $a .= ",PostApellMama='".$PostApellMama."'" ; }
		if(isset($dia)&&$dia!=''&&isset($mes)&&$mes!=''&&isset($ano)&&$ano!=''){   $a .= ",PostFecNac='".$ano.$mes.$dia."'" ; }
		if(isset($idPais) && $idPais != ''){                                       $a .= ",idPais='".$idPais."'" ; }
		if(isset($idDepartamento) && $idDepartamento != ''){                       $a .= ",idDepartamento='".$idDepartamento."'" ; }
		if(isset($idProvincia) && $idProvincia != ''){                             $a .= ",idProvincia='".$idProvincia."'" ; }
		if(isset($idDistrito) && $idDistrito != ''){                               $a .= ",idDistrito='".$idDistrito."'" ; }
		if(isset($PostDireccion) && $PostDireccion != ''){                         $a .= ",PostDireccion='".$PostDireccion."'" ; }
		if(isset($PostFonoFijo) && $PostFonoFijo != ''){                           $a .= ",PostFonoFijo='".$PostFonoFijo."'" ; }
		if(isset($PostFonoCel) && $PostFonoCel != ''){                             $a .= ",PostFonoCel='".$PostFonoCel."'" ; }
		if(isset($PostEmail) && $PostEmail != ''){                                 $a .= ",PostEmail='".$PostEmail."'" ; }

		// inserto los datos de registro en la db
		$query  = "UPDATE `Postulante` SET ".$a." WHERE user_atv = '".$_COOKIE['sess_demo_correo']."'";
		$result = mysql_query($query, $dbCasting);

	}


	//Consulto por los datos ya guardados
	$zz="si";
    $sql = "SELECT *
	FROM Postulante 
	WHERE user_atv = '".$_COOKIE['sess_demo_correo']."'"; 
    $result =mysql_query($sql,$dbCasting);
	$row_usuario = mysql_fetch_assoc ($result); 
}
//Consulta de los datos
//Se trae un listado con todos los paises
// Se trae un listado de todos los departamentos
$arrPais = array();
$query = "SELECT  idPais, Nombre
FROM `ubicacion_pais`
ORDER BY Nombre ASC";
$resultado1 = mysql_query ($query, $dbCasting);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrPais,$row );
}
// Se trae un listado de todos los departamentos
$arrDepartamento = array();
$query = "SELECT  idDepartamento, Nombre
FROM `ubicacion_departamento`
ORDER BY Nombre ASC";
$resultado1 = mysql_query ($query, $dbCasting);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrDepartamento,$row );
}
// Se trae un listado con todas las provincias
 if ($row_usuario['idDepartamento']!=0&&$row_usuario['idDepartamento']!=''){
	$arrProvincia = array();
	$query = "SELECT idProvincia,Nombre
	FROM `ubicacion_provincia`
	WHERE idDepartamento = ".$row_usuario['idDepartamento']." 
	ORDER BY Nombre ASC ";
	$resultado = mysql_query ($query, $dbCasting);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrProvincia,$row );
	}
} 
// Se trae un listado con todas las provincias
$query = "SELECT  idProvincia, idDepartamento, Nombre
FROM `ubicacion_provincia` ";
$resultado = mysql_query ($query, $dbCasting);
while ($Provincia[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Provincia);
array_multisort($Provincia, SORT_ASC);
// Se trae un listado con todos los distritos
 if ($row_usuario['idProvincia']!=0&&$row_usuario['idProvincia']!=''){
	$arrDistrito = array();
	$query = "SELECT idDistrito,Nombre
	FROM `ubicacion_distrito`
	WHERE idProvincia = ".$row_usuario['idProvincia']." 
	ORDER BY Nombre ASC ";
	$resultado = mysql_query ($query, $dbCasting);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrDistrito,$row );
	}
} 
// Se trae un listado con todos los distritos
$query = "SELECT  idDistrito, idProvincia, Nombre
FROM `ubicacion_distrito` ";
$resultado = mysql_query ($query, $dbCasting);
while ($Distrito[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Distrito);
array_multisort($Distrito, SORT_ASC);





?>
<body  >
<div class="perfil_data">
<form name="salva" action="perfil.php" target='_self'  method="post" >
	<div class="casting_16 ">
		<div class="cont_book_perfil">       
			<h3>Mi Perfil</h3>
				<div class="b_perfil">
					<div class="fotoperfil_d box">
<table>
    <tr>
        <td align="left" valign="middle">
            <h4>Nombre:</h4>
            <input name="PostNombres" type="text" placeholder="(*) Nombre Completo" id="PostNombres" value='<?php echo $row_usuario['PostNombres']?>'/>
        </td>           
        <td  align="left" valign="middle">
            <h4>Apellido Paterno:</h4>
            <input name="PostApellPapa" type="text" placeholder="(*) Apellido Paterno"   id="PostApellPapa" value='<?php echo $row_usuario['PostApellPapa']?>'/>
        </td>
        <td align="left" valign="middle">
            <h4>Apellido Materno:</h4>
            <input name="PostApellMama" type="text" placeholder="(*) Apellido Materno"   id="PostApellMama" value='<?php echo $row_usuario['PostApellMama']?>'/>
        </td>
    </tr>  
</table>




<table>
    <tr>
        <td align="left" valign="middle"  width="100%">
        <h4>Fecha de Nacimiento:</h4>
            <select  name="dia" id="dia" class="fecha" >
                <option value="" selected>Seleccione</option>
                <?php
                $dato_dia = substr($row_usuario['PostFecNac'],6,2);
                for ($i = 1; $i <= 31; $i++) {?>
                    <option value="<?php echo $i ?>" <?php if($i==$dato_dia){ echo 'selected';}?>><?php echo $i ?></option>
                <?php } ?>
            </select> 
            - 
            <select name="mes" id="mes" class="fecha">
                <option value="" selected>Seleccione</option>
                <?php $dato_mes = substr($row_usuario['PostFecNac'],4,2);?>
                <option value='01' <?php if($dato_mes=='01'){ echo 'selected';}?>>Enero</option>
                <option value='02' <?php if($dato_mes=='02'){ echo 'selected';}?>>Febrero</option>
                <option value='03' <?php if($dato_mes=='03'){ echo 'selected';}?>>Marzo</option>
                <option value='04' <?php if($dato_mes=='04'){ echo 'selected';}?>>Abril</option>
                <option value='05' <?php if($dato_mes=='05'){ echo 'selected';}?>>Mayo</option>
                <option value='06' <?php if($dato_mes=='06'){ echo 'selected';}?>>Junio</option>
                <option value='07' <?php if($dato_mes=='07'){ echo 'selected';}?>>Julio</option>
                <option value='08' <?php if($dato_mes=='08'){ echo 'selected';}?>>Agosto</option>
                <option value='09' <?php if($dato_mes=='09'){ echo 'selected';}?>>Septiembre</option>
                <option value='10' <?php if($dato_mes=='10'){ echo 'selected';}?>>Octubre</option>
                <option value='11' <?php if($dato_mes=='11'){ echo 'selected';}?>>Noviembre</option>
                <option value='12' <?php if($dato_mes=='12'){ echo 'selected';}?>>Diciembre</option>
            </select>
            - 
            <select  name="ano" id="ano" class="fecha">
                <option value="" selected>Seleccione</option>
                <?php
                $dato_ano = substr($row_usuario['PostFecNac'],0,4);
                for ($i = 1900; $i <= date('Y'); $i++) {?>
                    <option value="<?php echo $i ?>" <?php if($i==$dato_ano){ echo 'selected';}elseif(!isset($dato_ano)&&$dato_ano==''&$i==1950){echo 'selected';}?>><?php echo $i ?></option>
                <?php } ?>
            </select> 
        </td>           
    </tr>
</table>


<table>
    <tr>
        <td  align="left" valign="middle">
            <h4>Pais:</h4>
            <select name="idPais">
            <option value="" selected="selected">Seleccione un Pais</option>
            <?php foreach ($arrPais as $pais) { ?>
            <option value="<?php echo $pais['idPais']; ?>" <?php if(isset($idPais)&&$idPais==$pais['idPais']) {echo 'selected="selected"';} elseif($row_usuario['idPais']==$pais['idPais']){ echo 'selected="selected"'; }?>><?php echo $pais['Nombre']; ?></option>
            <?php } ?>             
            </select>
        </td>
        <td  align="left" valign="middle">
        	<h4>Departamento:</h4>
            <select name="idDepartamento" onChange="cambia_departamento()">
            <option value="" selected="selected">Seleccione un Departamento</option>
            <?php foreach ($arrDepartamento as $depto) { ?>
            <option value="<?php echo $depto['idDepartamento']; ?>" <?php if(isset($idDepartamento)&&$idDepartamento==$depto['idDepartamento']) {echo 'selected="selected"';} elseif($row_usuario['idDepartamento']==$depto['idDepartamento']){ echo 'selected="selected"'; }?>><?php echo $depto['Nombre']; ?></option>
            <?php } ?>             
            </select>
        </td>
        <td  align="left" valign="middle" >
        	<h4>Provincia:</h4>
            <select name="idProvincia" onChange="cambia_provincia()">
            <option value="" selected="selected">Seleccione una Provincia</option>
            <?php foreach ($arrProvincia as $provincia) { ?>
            <option value="<?php echo $provincia['idProvincia']; ?>" <?php if(isset($idProvincia)&&$idProvincia==$provincia['idProvincia']) {echo 'selected="selected"';} elseif($row_usuario['idProvincia']==$provincia['idProvincia']){ echo 'selected="selected"'; }?>><?php echo $provincia['Nombre']; ?></option>
            <?php } ?>             
            </select>
<script>
<?php
//se imprime la id de la tarea
filtrar($Provincia, 'idDepartamento'); 
foreach($Provincia as $tipo=>$componentes){ 
echo'var id_provincia_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idProvincia'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Provincia as $tipo=>$componentes){ 
echo'var provincia_'.$tipo.'=new Array("Seleccione una Provincia"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_departamento(){
	var Componente
	Componente = document.salva.idDepartamento[document.salva.idDepartamento.selectedIndex].value
	try {
	if (Componente != '') {
		id_provincia=eval("id_provincia_" + Componente)
		provincia=eval("provincia_" + Componente)
		num_int = id_provincia.length
		document.salva.idProvincia.length = num_int
		for(i=0;i<num_int;i++){
		   document.salva.idProvincia.options[i].value=id_provincia[i]
		   document.salva.idProvincia.options[i].text=provincia[i]
		}	
	}else{
		document.salva.idProvincia.length = 1
		document.salva.idProvincia.options[0].value = ""
	    document.salva.idProvincia.options[0].text = "Seleccione una Provincia"
	}
	} catch (e) {
    alert("El departamento seleccionado no posee provincias");
}
	document.salva.idProvincia.options[0].selected = true
}
</script>              
                       
        </td>
	</tr> 
    <tr>   
		<td>
        	<h4>Distrito:</h4>
            <select name="idDistrito">
            <option value="" selected="selected">Seleccione un Distrito</option>
            <?php foreach ($arrDistrito as $distrito) { ?>
            <option value="<?php echo $distrito['idDistrito']; ?>" <?php if(isset($idDistrito)&&$idDistrito==$distrito['idDistrito']) {echo 'selected="selected"';} elseif($row_usuario['idDistrito']==$distrito['idDistrito']){ echo 'selected="selected"'; }?>><?php echo $distrito['Nombre']; ?></option>
            <?php } ?>             
            </select>
<script>
<?php
//se imprime la id de la tarea
filtrar($Distrito, 'idProvincia'); 
foreach($Distrito as $tipo=>$componentes){ 
echo'var id_distrito_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idProvincia'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Distrito as $tipo=>$componentes){ 
echo'var distrito_'.$tipo.'=new Array("Seleccione un Distrito"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_provincia(){
	var Componente
	Componente = document.salva.idProvincia[document.salva.idProvincia.selectedIndex].value
	try {
	if (Componente != '') {
		id_distrito=eval("id_distrito_" + Componente)
		distrito=eval("distrito_" + Componente)
		num_int = id_distrito.length
		document.salva.idDistrito.length = num_int
		for(i=0;i<num_int;i++){
		   document.salva.idDistrito.options[i].value=id_distrito[i]
		   document.salva.idDistrito.options[i].text=distrito[i]
		}	
	}else{
		document.salva.idDistrito.length = 1
		document.salva.idDistrito.options[0].value = ""
	    document.salva.idDistrito.options[0].text = "Seleccione un Distrito"
	}
	} catch (e) {
    alert("La provincia seleccionada no posee distritos");
}
	document.salva.idDistrito.options[0].selected = true
}
</script>              
                       
        </td>   
        <td  align="left" valign="middle" colspan="2">
        	<h4>Direccion:</h4>
        	<input name="PostDireccion" type="text" placeholder="(*) Direcci&oacute;n"   id="PostDireccion" value='<?php echo $row_usuario['PostDireccion']?>'/>
        </td>   
    </tr>
</table>




<table>
    <tr>
        <td align="left" valign="middle">
            <h4>Telefono Fijo:</h4>
            <input name="PostFonoFijo" type="text" placeholder="(*) Tel&eacute;fono Fijo de Contacto"   id="PostFonoFijo" value='<?php echo $row_usuario['PostFonoFijo']?>'/>
        </td>
        <td align="left" valign="middle">
            <h4>Telefono Movil:</h4>
            <input name="PostFonoCel" type="text" placeholder="(*) Tel&eacute;fono Celular de Contacto"   id="PostFonoCel" value='<?php echo $row_usuario['PostFonoCel']?>'/>
        </td>
        <td align="left" valign="middle">
            <h4>Correo:</h4>
            <input name="PostEmail" type="text" placeholder="(Login) Correo Electr&oacute;nico"   id="PostEmail" value='<?php echo $row_usuario['PostEmail']?>' readonly/>
        </td>
    </tr>
</table>

<?php if ($zz=='si') {?>
<div class="cont_btn"><input type="submit"  onClick="parent.location.reload();parent.Shadowbox .close();" Value="Cerrar"/></div>
<?php }else{?>
<div class="cont_btn"><input name="submit_edit" type="submit"  id="post_button" Value="Guardar Cambios"/></div>
<?php }?>

       <!--div class="cont_btn"><a href="perfil.php" rel="shadowbox;width=640;height=360"><input type="butom" class="bot_big_red margin_top_15" value="Guardar Book" /></a></div-->

    
	</form>
</div>

</body>
</html>
