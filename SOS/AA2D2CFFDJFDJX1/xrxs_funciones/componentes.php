<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                                  Funciones                                                      */
/*******************************************************************************************************************/
function submit($nombre, $valor){	
	$input = '<input type="submit" name="'.$nombre.'" class="btn btn-lg btn-primary btn-block" value="'.$valor.'" />';
	return $input;
}
/*******************************************************************************************************************/
function fancyBox($width, $height,$web,$funcion){	

	$input  = '<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>';
	$input .= '<script type="text/javascript" src="js/jquery.fancybox.js"></script>';
	$input .= '<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />';
	$input .= "<script type='text/javascript'>
					$(document).ready(function() {
						$('.fancybox').fancybox({
							type: 'iframe',
							'width':".$width.",
							'height':".$height.",
							'autoSize' : false,
							afterClose: function () { 
								//parent.location.reload(false);
								".$funcion."
							}
						});
					});
				</script>";
	$input .= '<a title="Ver Informacion"  class="icon-ver info-tooltip fancybox fancybox.iframe" href="'.$web.'"></a>';
	
	return $input;
}
/*******************************************************************************************************************/
function input($type,$placeholder,$name, $value, $required){
	if($value==0){$w='';}elseif($value!=0){$w=$value;}
	if($required==1){$x='';}elseif($required==2){$x='required';}	
	$input = '<input class="form-control" type="'.$type.'" placeholder="'.$placeholder.'"  name="'.$name.'" value="'.$w.'" '.$x.' >';	
	return $input;
}
/*******************************************************************************************************************/
function form_input($type,$placeholder,$name, $value, $required){
	if($value==''){$w='';}else{$w=$value;}
	if($required==1){$x='';}elseif($required==2){$x='required';}	
	$input = '<div class="form-group">
				<label class="control-label col-lg-4">'.$placeholder.'</label>
				<div class="col-lg-8">
					<input type="'.$type.'" placeholder="'.$placeholder.'" class="form-control"  name="'.$name.'" id="'.$name.'" value="'.$w.'"  '.$x.' >
				</div>
			</div>';	
	return $input;
}
/*******************************************************************************************************************/
function form_input2($type,$placeholder,$name, $value, $required){
	if($value==''){$w='';}else{$w=$value;}
	if($required==1){$x='';}elseif($required==2){$x='required';}	
	$input = '<div class="form-group">
				<label class="control-label col-lg-4">'.$placeholder.'</label>
				<div class="col-lg-8">
					<input type="'.$type.'" placeholder="'.$placeholder.'" class="form-control" value="'.$w.'"  '.$x.' disabled="disabled">
				</div>
			</div>';	
	return $input;
}
/*******************************************************************************************************************/
function form_input_hidden($name, $value){
		
	$input = '<input type="hidden"  name="'.$name.'" value="'.$value.'" >';
	
	return $input;
}
/*******************************************************************************************************************/
function form_textarea($placeholder,$name, $value, $required){
	if($value==''){$w='';}else{$w=$value;}
	if($required==1){$x='';}elseif($required==2){$x='required';}	
	$input = '<div class="form-group">
            	<label for="text2" class="control-label col-lg-4">'.$placeholder.'</label>
                <div class="col-lg-8">
                    <textarea name="'.$name.'" id="autosize" class="form-control" style="overflow: auto; word-wrap: break-word; resize: horizontal; height: 320px;" '.$x.' >'.$w.'</textarea>
                </div>
            </div>';	
	return $input;
}
/*******************************************************************************************************************/
function form_date($placeholder,$name, $value, $required){
	if($value==0){$w='';}elseif($value!=0){$w=$value;}
	if($required==1){$x='';}elseif($required==2){$x='required';}	
	$input = '<link rel="stylesheet" type="text/css" href="assets/css/smoothness/jquery-ui-1.10.4.custom.css" />    
			<script type="text/javascript" src="assets/js/jquery.min.js"></script>
			<script>
			  $(document).ready(function() {
				$("#'.$name.'").datepicker({ dateFormat: "yy-mm-dd" }).val();
				$.datepicker.regional["es"] = {
					closeText: "Cerrar",
					prevText: "<Ant",
					nextText: "Sig>",
					currentText: "Hoy",
					monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
					monthNamesShort: ["Ene","Feb","Mar","Abr", "May","Jun","Jul","Ago","Sep", "Oct","Nov","Dic"],
					dayNames: ["Domingo", "Lunes", "Martes", "Mi??rcoles", "Jueves", "Viernes", "S??bado"],
					dayNamesShort: ["Dom","Lun","Mar","Mi??","Juv","Vie","S??b"],
					dayNamesMin: ["Do","Lu","Ma","Mi","Ju","Vi","S??"],
					weekHeader: "Sm",
					dateFormat: "dd/mm/yy",
					firstDay: 1,
					isRTL: false,
					showMonthAfterYear: false,
					yearSuffix: ""
				};
				$.datepicker.setDefaults($.datepicker.regional["es"]);
			  });
			</script>';
	
	$input .='<div class="form-group">
				<label class="control-label col-lg-4">'.$placeholder.'</label>
				<div class="col-lg-8">
					<div class="input-group bootstrap-timepicker">
						<input placeholder="'.$placeholder.'" class="form-control timepicker-default" type="text" name="'.$name.'" id="'.$name.'" value="'.$w.'" '.$x.'>
						<span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
					</div>
				</div>
			</div>';
			
	return $input;
}

/*******************************************************************************************************************/
function form_time($placeholder,$name, $value, $required){
	if($value==0){$w='';}elseif($value!=0){$w=$value;}
	if($required==1){$x='';}elseif($required==2){$x='required';}	
	
	$input = '<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
			<link href="css/timepicki.css" rel="stylesheet">';
	
	$input .='<div class="form-group">
				<label class="control-label col-lg-4">'.$placeholder.'</label>
				<div class="col-lg-8">
					<div class="input-group bootstrap-timepicker">
						<input placeholder="'.$placeholder.'"  class="form-control timepicker-default" type="text" name="'.$name.'" id="'.$name.'" value="'.$w.'" '.$x.' data-default="20:48"  >
                        <span class="input-group-addon add-on"><i class="fa fa-clock-o"></i></span> 
						
					</div>
				</div>
			</div>';
			
	$input .= '<script src="js/timepicki.js"></script>
				<script>
				jQuery(document).ready(function( $ ) {
					//$("#'.$name.'").timepicki();
					$("#'.$name.'").timepicki({
						show_meridian:false,
						min_hour_value:0,
						max_hour_value:23,
						step_size_minutes:1,
						overflow_minutes:true,
						increase_direction:"up",
						disable_keyboard_mobile: true});
				});
				</script>';
	
	return $input;
}
/*******************************************************************************************************************/
function form_select($placeholder,$name, $value, $required, $data1, $data2, $table, $filter, $dbConn){

	//si dato es requerido
	if($required==1){$x='';}elseif($required==2){$x='required';}
	//Filtro para el where
	$filtro = '';
	if ($filter!='0'){$filtro .="WHERE ".$filter." ";	}
	//explode para poder crear cadena
	$datos = explode(",", $data2);
	if(count($datos)==1){
		$data_required = ','.$datos[0].' AS '.$datos[0];
	}else{
		$data_required = '';
		foreach($datos as $dato){
			$data_required .= ','.$dato.' AS '.$dato;
		}
	}

	//se trae un listado con todas las categorias
	$arrSelect = array();
	$query = "SELECT  
	".$data1." AS idData 
	".$data_required."
	FROM `".$table."`  
	".$filtro."
	ORDER BY Nombre";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrSelect,$row );
	}
	mysql_free_result($resultado);

	$input = '<div class="form-group">
            	<label for="text2" class="control-label col-lg-4">'.$placeholder.'</label>
                <div class="col-lg-8">
                <select name="'.$name.'" class="form-control" '.$x.' >
                <option value="" selected>Seleccione una Opcion</option>';
				
				foreach ( $arrSelect as $select ) {
					$w = '';
					if($value==$select['idData']){
						$w .= 'selected="selected"';
					}  	
					if(count($datos)==1){
						$data_writing = $select[$datos[0]].' ';
					}else{
						$data_writing = '';
						foreach($datos as $dato){
							$data_writing .= $select[$dato].' ';
						}
					}
    $input .= '<option value="'.$select['idData'].'" '.$w.' >'.$select['Nombre'].'</option>';
                 } 
    $input .= '</select>
                </div>
            </div>';
        	
	return $input;
}
/*******************************************************************************************************************/
function form_select_filter($placeholder,$name, $value, $required, $data1, $data2, $table, $filter, $dbConn){

	//si dato es requerido
	if($required==1){$x='';}elseif($required==2){$x='required';}
	//Filtro para el where
	$filtro = '';
	if ($filter!='0'){$filtro .="WHERE ".$filter." ";	}
	//explode para poder crear cadena
	$datos = explode(",", $data2);
	if(count($datos)==1){
		$data_required = ','.$datos[0].' AS '.$datos[0];
	}else{
		$data_required = '';
		foreach($datos as $dato){
			$data_required .= ','.$dato.' AS '.$dato;
		}
	}

	//se trae un listado con todas las categorias
	$arrSelect = array();
	$query = "SELECT  
	".$data1." AS idData 
	".$data_required."
	FROM `".$table."`  
	".$filtro."
	ORDER BY Nombre";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrSelect,$row );
	}
	mysql_free_result($resultado);
	
	$input = '<script type="text/javascript" SRC="js/filterlist.js"></script>';
	
	$input .= '<div class="form-group">
				<label class="control-label col-lg-4">Filtro de '.$placeholder.'</label>
				<div class="col-lg-8">
					<input type="text" placeholder="Ingrese texto para filtrar" class="form-control filter"  name="regexp" onKeyUp="myfilter_'.$name.'.set(this.value)"  >
				</div>
			</div>';
			
	$input .= '<div class="form-group">
            	<label for="text2" class="control-label col-lg-4">'.$placeholder.'</label>
                <div class="col-lg-8">
                <select name="'.$name.'" class="form-control" '.$x.' >
                <option value="" selected>Seleccione una Opcion</option>';
				
				foreach ( $arrSelect as $select ) {
					$w = '';
					if($value==$select['idData']){
						$w .= 'selected="selected"';
					}  	
					if(count($datos)==1){
						$data_writing = $select[$datos[0]].' ';
					}else{
						$data_writing = '';
						foreach($datos as $dato){
							$data_writing .= $select[$dato].' ';
						}
					}
    $input .= '<option value="'.$select['idData'].'" '.$w.' >'.$data_writing.'</option>';
                 } 
    $input .= '</select>
                </div>
            </div>';
			
	$input .= '<script type="text/javascript">
				<!--
				var myfilter_'.$name.' = new filterlist(document.form1.'.$name.');
				//-->
				</script> ';  
        	
	return $input;
}
/*******************************************************************************************************************/
function form_select_class($placeholder,$name, $value, $required, $class, $data1, $data2, $table, $filter, $dbConn){

	//si dato es requerido
	if($required==1){$x='';}elseif($required==2){$x='required';}
	//Filtro para el where
	$filtro = '';
	if ($filter!='0'){$filtro .="WHERE ".$filter." ";	}
	//explode para poder crear cadena
	$datos = explode(",", $data2);
	if(count($datos)==1){
		$data_required = ','.$datos[0].' AS '.$datos[0];
	}else{
		$data_required = '';
		foreach($datos as $dato){
			$data_required .= ','.$dato.' AS '.$dato;
		}
	}

	//se trae un listado con todas las categorias
	$arrSelect = array();
	$query = "SELECT 
	".$class." AS class, 
	".$data1." AS idData 
	".$data_required."
	FROM `".$table."`  
	".$filtro."
	ORDER BY Nombre";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrSelect,$row );
	}
	mysql_free_result($resultado);

	$input = '<div class="form-group">
            	<label for="text2" class="control-label col-lg-4">'.$placeholder.'</label>
                <div class="col-lg-8">
                <select name="'.$name.'" class="form-control" '.$x.' >
                <option value="" selected>Seleccione una Opcion</option>';
				
				foreach ( $arrSelect as $select ) {
					$w = '';
					if($value==$select['idData']){
						$w .= 'selected="selected"';
					}  	
					if(count($datos)==1){
						$data_writing = $select[$datos[0]].' ';
					}else{
						$data_writing = '';
						foreach($datos as $dato){
							$data_writing .= $select[$dato].' ';
						}
					}
    $input .= '<option class="'.$select['class'].'" value="'.$select['idData'].'" '.$w.' >'.$select['Nombre'].'</option>';
                 } 
    $input .= '</select>
                </div>
            </div>';
        	
	return $input;
}
/*******************************************************************************************************************/
function form_select2($placeholder,$name, $value, $required, $data1, $data2, $table, $filter, $dbConn){

	if($required==1){$x='';}elseif($required==2){$x='required';}
	//FILTRO
	$filtro = '';
	if ($filter!='0'){$filtro .="WHERE ".$filter." ";	}

	//se trae un listado con todas las categorias
	$arrSelect = array();
	$query = "SELECT  
	".$data1." AS idData, 
	".$data2." AS Nombre
	FROM `".$table."`  
	".$filtro."
	ORDER BY Nombre";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrSelect,$row );
	}
	mysql_free_result($resultado);

	$input = '<div class="form-group">
            	<label for="text2" class="control-label col-lg-4">'.$placeholder.'</label>
                <div class="col-lg-8">
                <select name="'.$name.'" class="form-control" '.$x.' >
                <option value="0" selected>Todos</option>';
				
				foreach ( $arrSelect as $select ) {
					$w = '';
					if($value==$select['idData']){
						$w .= 'selected="selected"';
					}  	
    $input .= '<option value="'.$select['idData'].'" '.$w.' >Solo '.$select['Nombre'].'</option>';
                 } 
    $input .= '</select>
                </div>
            </div>';
        	
	return $input;
}
/*******************************************************************************************************************/
function form_select3($placeholder,$name, $value, $required, $data1, $data2, $table, $filter, $dbConn){

	if($required==1){$x='';}elseif($required==2){$x='required';}
	//FILTRO
	$filtro = '';
	if ($filter!='0'){$filtro .="WHERE ".$filter." ";	}

	//se trae un listado con todas las categorias
	$arrSelect = array();
	$query = "SELECT  
	".$data1." AS idData, 
	".$data2." AS Nombre
	FROM `".$table."`  
	".$filtro."
	ORDER BY Nombre";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrSelect,$row );
	}
	mysql_free_result($resultado);

	$input = '<div class="form-group">
            	<label for="text2" class="control-label col-lg-4">'.$placeholder.'</label>
                <div class="col-lg-8">
                <select class="form-control" '.$x.' disabled="disabled" >
                <option value="" selected>Seleccione una Opcion</option>';
				
				foreach ( $arrSelect as $select ) {
					$w = '';
					if($value==$select['idData']){
						$w .= 'selected="selected"';
					}  	
    $input .= '<option value="'.$select['idData'].'" '.$w.' >'.$select['Nombre'].'</option>';
                 } 
    $input .= '</select>
                </div>
            </div>';
        	
	return $input;
}
/*******************************************************************************************************************/
function form_select_ext($placeholder,$name, $value, $required, $data1, $data2, $table, $filter, $dbConn){

	if($required==1){$x='';}elseif($required==2){$x='required';}
	//FILTRO
	$filtro = '';
	if ($filter!='0'){$filtro .="WHERE ".$filter." ";	}
	
	//se trae un listado con todas las categorias
	$arrSelect = array();
	$query = "SELECT  
	".$data1." AS idData, 
	".$data2." AS Nombre
	FROM `".$table."` 
	".$filtro." 
	ORDER BY Nombre";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrSelect,$row );
	}
	mysql_free_result($resultado);

	$input = '<div class="form-group">
            	<label for="text2" class="control-label col-lg-4">'.$placeholder.'</label>
                <div class="col-lg-8">
                <select name="'.$name.'" class="form-control" '.$x.' >
                <option value="" selected>Seleccione una Opcion</option>';
				
	$w1 = '';
	$w2 = '';
	if($value==9998){
		$w1 = 'selected="selected"';
	}elseif($value==9999){
		$w2 = 'selected="selected"';
	}			
	$input .= '<option value="9998" '.$w1.' >Todos</option>';
    $input .= '<option value="9999" '.$w2.'>Solo Superadministradores</option>';
                    			

	
	
				
				foreach ( $arrSelect as $select ) {
					$w = '';
					if($value==$select['idData']){
						$w .= 'selected="selected"';
					} 	
    $input .= '<option value="'.$select['idData'].'" '.$w.' >'.$select['Nombre'].'</option>';
                 } 
    $input .= '</select>
                </div>
            </div>';
        	
	return $input;
}
/*******************************************************************************************************************/
function form_select_tipousr($placeholder,$name, $value, $required){

	if($required==1){$x='';}elseif($required==2){$x='required';}

	$input = '<div class="form-group">
            	<label for="text2" class="control-label col-lg-4">'.$placeholder.'</label>
                <div class="col-lg-8">
                <select name="'.$name.'" class="form-control" '.$x.' >
                <option value="" selected>Seleccione una Opcion</option>';
				
	$w1 = '';
	$w2 = '';
	if($value=='Administrador'){
		$w1 = 'selected="selected"';
	}elseif($value=='Normal'){
		$w2 = 'selected="selected"';
	}			
	$input .= '<option value="Administrador" '.$w1.'>Administrador</option>';
    $input .= '<option value="Normal" '.$w2.'>Normal</option>';
                                                  			 
    $input .= '</select>
                </div>
            </div>';
        	
	return $input;
}
/*******************************************************************************************************************/
function form_select_n_auto($placeholder,$name, $value, $required, $valor_ini, $valor_fin){

	if($required==1){$x='';}elseif($required==2){$x='required';}

	$input = '<div class="form-group">			
				<label for="text2" class="control-label col-lg-4">'.$placeholder.'</label>			
				<div class="col-lg-8">				
					<select class="form-control" name="'.$name.'" '.$x.'>
						<option value="">Seleccione una Opcion</option>';
						for ($i = $valor_ini; $i <= $valor_fin; $i++) {
							$j = '';
							if(isset($value)&&$value==$i) {
								$j .= 'selected="selected"';
							}
								$input .= '<option value="'.$i.'" '.$j.'>'.$i.'</option>';					
						} 	       				
					$input .= '</select>			
				</div>		
			</div>';
        	
	return $input;
}
/*******************************************************************************************************************/
function form_input_file($placeholder,$name){
	
	$input = '<div class="form-group">
				<label class="control-label col-lg-4">'.$placeholder.'</label>
				<div class="col-lg-8">
                	<input id="uploadFile" placeholder="'.$placeholder.'" disabled="disabled" />
                    <div class="fileUpload btn btn-primary">
                        <span>Subir Archivo</span>
                        <input id="uploadBtn" type="file" class="upload" name="'.$name.'" />
                    </div>
				</div>
			</div>';
	$input .= '<script>
				document.getElementById("uploadBtn").onchange = function () {
					document.getElementById("uploadFile").value = this.value;
				};
				</script>';

	return $input;
}
/*******************************************************************************************************************/
function form_select_depend1($placeholder1,$name1, $value1, $required1, $dataA1, $dataA2, $table1, $filter1,
							 $placeholder2,$name2, $value2, $required2, $dataB1, $dataB2, $dataB3, $table2, $filter2, 
							 $dbConn){

	if($required1==1){$x1='';}elseif($required1==2){$x1='required';}
	if($required2==1){$x2='';}elseif($required2==2){$x2='required';}
	//FILTROS
	$filtro1 = ''; if ($filter1!=0){$filtro1 .="WHERE ".$filter1." ";	}
	$filtro2a = ''; if ($filtro2a!=0){$filtro2a .="WHERE ".$filter2." ";	}
	$filtro2b = ''; if ($filtro2b!=0){$filtro2b .=" AND ".$filter2." ";	}

	//se trae un listado con todas los datos
	$arrSelect1 = array();
	$query = "SELECT  
	".$dataA1." AS idData1, 
	".$dataA2." AS Nombre1
	FROM `".$table1."`  
	".$filtro1."
	ORDER BY Nombre1";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrSelect1,$row );
	}
	mysql_free_result($resultado);
	// Se trae un listado con todas las comunas
	 if ($value1!=0&&$value1!=''){
		$arrSelect2 = array();
		$query = "SELECT 
		".$dataB1." AS idData2, 
		".$dataB3." AS Nombre2
		FROM `".$table2."`
		WHERE ".$dataB2." = ".$value1." ".$filtro2b."
		ORDER BY Nombre2 ASC ";
		$resultado = mysql_query ($query, $dbConn);
		while ( $row = mysql_fetch_assoc ($resultado)) {
		array_push( $arrSelect2,$row );
		}
	} 
	// Se trae un listado de todas las comunas
	$query = "SELECT 
	".$dataB1." AS idData2, 
	".$dataB2." AS idCat2, 
	".$dataB3." AS Nombre2
	FROM `".$table2."` 
	".$filtro2a."";
	$resultado = mysql_query ($query, $dbConn);
	while ($Select[] = mysql_fetch_assoc ($resultado)); 
	mysql_free_result($resultado);
	array_pop($Select);
	array_multisort($Select, SORT_ASC);

	//Primer select
	$input = '<div class="form-group">
            	<label for="text2" class="control-label col-lg-4">'.$placeholder1.'</label>
                <div class="col-lg-8">
                <select name="'.$name1.'" class="form-control" '.$x1.' onChange="cambia_'.$name1.'()" >
                <option value="" selected>Seleccione una Opcion</option>';
				
				foreach ( $arrSelect1 as $select1 ) {
					$w = ''; if($value1==$select1['idData1']){ $w .= 'selected="selected"'; }  	
    $input .= '<option value="'.$select1['idData1'].'" '.$w.' >'.$select1['Nombre1'].'</option>';
                 } 
    $input .= '</select>
                </div>
            </div>';
			
	//Segundo select
	$input .= '<div class="form-group">
            	<label for="text2" class="control-label col-lg-4">'.$placeholder2.'</label>
                <div class="col-lg-8">
                <select name="'.$name2.'" class="form-control" '.$x2.' >
                <option value="" selected>Seleccione una Opcion</option>';
				if ($value1!=0&&$value1!=''){
					foreach ( $arrSelect2 as $select2 ) {
						$w = ''; if($value2==$select2['idData2']){ $w .= 'selected="selected"'; }  	
		$input .= '<option value="'.$select2['idData2'].'" '.$w.' >'.$select2['Nombre2'].'</option>';
					 } 
				}
    $input .= '</select>
                </div>
            </div>';
	
	//script		
	$input .= '<script>';	
	filtrar($Select, 'idCat2'); 
	foreach($Select as $tipo=>$componentes){ 
	$input .= 'var id_data_'.$tipo.'=new Array(""';
	foreach ($componentes as $idcomp) { 
	$input .= ',"'.$idcomp['idData2'].'"';
	 }
	$input .= ')
	';
	}
	
	//se imprime el nombre de la tarea
	foreach($Select as $tipo=>$componentes){ 
	$input .= 'var data_'.$tipo.'=new Array("Seleccione una Opcion"';
	foreach ($componentes as $comp) { 
	$input .= ',"'.$comp['Nombre2'].'"';
	 }
	$input .= ')
	';
	}	
	
	
	$input .= 'function cambia_'.$name1.'(){
	var Componente
	Componente = document.form1.'.$name1.'[document.form1.'.$name1.'.selectedIndex].value
	try {
	if (Componente != "") {
		id_data=eval("id_data_" + Componente)
		data=eval("data_" + Componente)
		num_int = id_data.length
		document.form1.'.$name2.'.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.'.$name2.'.options[i].value=id_data[i]
		   document.form1.'.$name2.'.options[i].text=data[i]
		}	
	}else{
		document.form1.'.$name2.'.length = 1
		document.form1.'.$name2.'.options[0].value = ""
	    document.form1.'.$name2.'.options[0].text = "Seleccione una Opcion"
	}
	} catch (e) {
    alert("La Opcion seleccionada no posee items");
}
	document.form1.'.$name2.'.options[0].selected = true
}
</script>';	
			
        	
	return $input;
}
/*******************************************************************************************************************/
function form_select_depend2($placeholder1,$name1, $value1, $required1, $dataA1, $dataA2, $table1, $filter1,
							 $placeholder2,$name2, $value2, $required2, $dataB1, $dataB2, $dataB3, $table2, $filter2, 
							 $placeholder3,$name3, $value3, $required3, $dataC1, $dataC2, $dataC3, $table3, $filter3, 
							$dbConn){

	if($required1==1){$x1='';}elseif($required1==2){$x1='required';}
	if($required2==1){$x2='';}elseif($required2==2){$x2='required';}
	if($required3==1){$x3='';}elseif($required3==2){$x3='required';}
	//FILTROS
	$filtro1 = ''; if ($filter1!=0){$filtro1 .="WHERE ".$filter1." ";	}
	$filtro2a = ''; if ($filtro2a!=0){$filtro2a .="WHERE ".$filter2." ";	}
	$filtro2b = ''; if ($filtro2b!=0){$filtro2b .=" AND ".$filter2." ";	}
	$filtro3a = ''; if ($filtro3a!=0){$filtro3a .="WHERE ".$filter3." ";	}
	$filtro3b = ''; if ($filtro3b!=0){$filtro3b .=" AND ".$filter3." ";	}

	//se trae un listado con todas los datos
	$arrSelect1 = array();
	$query = "SELECT  
	".$dataA1." AS idData1, 
	".$dataA2." AS Nombre1
	FROM `".$table1."`  
	".$filtro1."
	ORDER BY Nombre1";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrSelect1,$row );
	}
	mysql_free_result($resultado);
	// Se trae un listado con todas las comunas
	 if ($value1!=0&&$value1!=''){
		$arrSelect2 = array();
		$query = "SELECT 
		".$dataB1." AS idData2, 
		".$dataB3." AS Nombre2
		FROM `".$table2."`
		WHERE ".$dataB2." = ".$value1." ".$filtro2b."
		ORDER BY Nombre2 ASC ";
		$resultado = mysql_query ($query, $dbConn);
		while ( $row = mysql_fetch_assoc ($resultado)) {
		array_push( $arrSelect2,$row );
		}
	} 
	// Se trae un listado de todas las comunas
	$query = "SELECT 
	".$dataB1." AS idData2, 
	".$dataB2." AS idCat2, 
	".$dataB3." AS Nombre2
	FROM `".$table2."` 
	".$filtro2a."";
	$resultado = mysql_query ($query, $dbConn);
	while ($Select2[] = mysql_fetch_assoc ($resultado)); 
	mysql_free_result($resultado);
	array_pop($Select2);
	array_multisort($Select2, SORT_ASC);
	
	// Se trae un listado con todas las comunas
	 if ($value2!=0&&$value2!=''){
		$arrSelect3 = array();
		$query = "SELECT 
		".$dataC1." AS idData3, 
		".$dataC3." AS Nombre3
		FROM `".$table3."`
		WHERE ".$dataC2." = ".$value2." ".$filtro3a."
		ORDER BY Nombre3 ASC ";
		$resultado = mysql_query ($query, $dbConn);
		while ( $row = mysql_fetch_assoc ($resultado)) {
		array_push( $arrSelect3,$row );
		}
	} 
	// Se trae un listado de todas las comunas
	$query = "SELECT 
	".$dataC1." AS idData3, 
	".$dataC2." AS idCat3, 
	".$dataC3." AS Nombre3
	FROM `".$table3."` 
	".$filtro3a."";
	$resultado = mysql_query ($query, $dbConn);
	while ($Select3[] = mysql_fetch_assoc ($resultado)); 
	mysql_free_result($resultado);
	array_pop($Select3);
	array_multisort($Select3, SORT_ASC);

	//Primer select
	$input = '<div class="form-group">
            	<label for="text2" class="control-label col-lg-4">'.$placeholder1.'</label>
                <div class="col-lg-8">
                <select name="'.$name1.'" class="form-control" '.$x1.' onChange="cambia_'.$name1.'()" >
                <option value="" selected>Seleccione una Opcion</option>';
				
				foreach ( $arrSelect1 as $select1 ) {
					$w = ''; if($value1==$select1['idData1']){ $w .= 'selected="selected"'; }  	
    $input .= '<option value="'.$select1['idData1'].'" '.$w.' >'.$select1['Nombre1'].'</option>';
                 } 
    $input .= '</select>
                </div>
            </div>';
			
	//Segundo select
	$input .= '<div class="form-group">
            	<label for="text2" class="control-label col-lg-4">'.$placeholder2.'</label>
                <div class="col-lg-8">
                <select name="'.$name2.'" class="form-control" '.$x2.' onChange="cambia_'.$name2.'()"  >
                <option value="" selected>Seleccione una Opcion</option>';
				if ($value1!=0&&$value1!=''){
					foreach ( $arrSelect2 as $select2 ) {
						$w = ''; if($value2==$select2['idData2']){ $w .= 'selected="selected"'; }  	
		$input .= '<option value="'.$select2['idData2'].'" '.$w.' >'.$select2['Nombre2'].'</option>';
					 } 
				}
    $input .= '</select>
                </div>
            </div>';
	
	//script		
	$input .= '<script>';	
	filtrar($Select2, 'idCat2'); 
	foreach($Select2 as $tipo=>$componentes){ 
	$input .= 'var id_data1_'.$tipo.'=new Array(""';
	foreach ($componentes as $idcomp) { 
	$input .= ',"'.$idcomp['idData2'].'"';
	 }
	$input .= ')
	';
	}
	
	//se imprime el nombre de la tarea
	foreach($Select2 as $tipo=>$componentes){ 
	$input .= 'var data1_'.$tipo.'=new Array("Seleccione una Opcion"';
	foreach ($componentes as $comp) { 
	$input .= ',"'.$comp['Nombre2'].'"';
	 }
	$input .= ')
	';
	}	
	
	
	$input .= 'function cambia_'.$name1.'(){
	var Componente
	Componente = document.form1.'.$name1.'[document.form1.'.$name1.'.selectedIndex].value
	try {
	if (Componente != "") {
		id_data1=eval("id_data1_" + Componente)
		data1=eval("data1_" + Componente)
		num_int = id_data1.length
		document.form1.'.$name2.'.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.'.$name2.'.options[i].value=id_data1[i]
		   document.form1.'.$name2.'.options[i].text=data1[i]
		}	
	}else{
		document.form1.'.$name2.'.length = 1
		document.form1.'.$name2.'.options[0].value = ""
	    document.form1.'.$name2.'.options[0].text = "Seleccione una Opcion"
	}
	} catch (e) {
    alert("La Opcion seleccionada no posee items");
}
	document.form1.'.$name2.'.options[0].selected = true
}
</script>';	

	//Tercer select
	$input .= '<div class="form-group">
            	<label for="text2" class="control-label col-lg-4">'.$placeholder3.'</label>
                <div class="col-lg-8">
                <select name="'.$name3.'" class="form-control" '.$x3.' >
                <option value="" selected>Seleccione una Opcion</option>';
				if ($value2!=0&&$value2!=''){
					foreach ( $arrSelect3 as $select3) {
						$w = ''; if($value3==$select3['idData3']){ $w .= 'selected="selected"'; }  	
		$input .= '<option value="'.$select3['idData3'].'" '.$w.' >'.$select3['Nombre3'].'</option>';
					 } 
				}
    $input .= '</select>
                </div>
            </div>';
	
	//script		
	$input .= '<script>';	
	filtrar($Select3, 'idCat3'); 
	foreach($Select3 as $tipo=>$componentes){ 
	$input .= 'var id_data2_'.$tipo.'=new Array(""';
	foreach ($componentes as $idcomp) { 
	$input .= ',"'.$idcomp['idData3'].'"';
	 }
	$input .= ')
	';
	}
	
	//se imprime el nombre de la tarea
	foreach($Select3 as $tipo=>$componentes){ 
	$input .= 'var data2_'.$tipo.'=new Array("Seleccione una Opcion"';
	foreach ($componentes as $comp) { 
	$input .= ',"'.$comp['Nombre3'].'"';
	 }
	$input .= ')
	';
	}	
	
	
	$input .= 'function cambia_'.$name2.'(){
	var Componente
	Componente = document.form1.'.$name2.'[document.form1.'.$name2.'.selectedIndex].value
	try {
	if (Componente != "") {
		id_data2=eval("id_data2_" + Componente)
		data2=eval("data2_" + Componente)
		num_int = id_data2.length
		document.form1.'.$name3.'.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.'.$name3.'.options[i].value=id_data2[i]
		   document.form1.'.$name3.'.options[i].text=data2[i]
		}	
	}else{
		document.form1.'.$name3.'.length = 1
		document.form1.'.$name3.'.options[0].value = ""
	    document.form1.'.$name3.'.options[0].text = "Seleccione una Opcion"
	}
	} catch (e) {
    alert("La Opcion seleccionada no posee items");
}
	document.form1.'.$name3.'.options[0].selected = true
}
</script>';
			
        	
	return $input;
}
/*******************************************************************************************************************/
function form_obs_simple($placeholder,$name, $value, $required){

	if($required==1){$x='';}elseif($required==2){$x='required';}
	
	$input = '<div class="form-group">
            	<label for="text2" class="control-label col-lg-4">'.$placeholder.'</label>
                <div class="col-lg-8">
                    <textarea name="'.$name.'" id="autosize" class="form-control" style="overflow: auto; word-wrap: break-word; resize: horizontal; height: 320px;" '.$x.' >'.$value.'</textarea>
                </div>
            </div>';
	
	   	
	return $input;
}
/*******************************************************************************************************************/
function form_ckeditor($placeholder,$name, $value, $required){

	if($required==1){$x='';}elseif($required==2){$x='required';}
	
	$input = "<div class='form-group'>
            	<label for='text2' class='control-label col-lg-4'>".$placeholder."</label>
                <div class='col-lg-8 height360'>			
				<textarea id='ckeditor_".$name."' class='ckeditor' name='".$name."' ".$x.">".$value."</textarea>
                <script src='assets/lib/ckeditor/ckeditor.js'></script>
                <script>
                CKEDITOR.replace( 'ckeditor_".$name."', {				
				toolbar: [										
				[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],					
				{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule' ] },						
				{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align' ], 
				items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },					
				'/',
				{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },					
				{ name: 'styles', items: [ 'Styles', 'Format' ] }																																				]			});
                
                </script>
                </div>
            </div>";
	
	   	
	return $input;
}

/*******************************************************************************************************************/
function audio_capture(){

	$input = '<h2>Grabar Mensaje</h2>
				<p>Volumen de la grabacion: <input type="range" max="1" step="0.1" value="0" onchange="changeVolume(this.value)"/></p>
				<p>
					<button class="btn btn-primary" onclick="startRecording(this);">Grabar</button>
					<button class="btn btn-warning" onclick="stopRecording(this);" disabled>Detener</button>
				</p>
				<table id="recordingslist">
					<tr>
						  <th>Previsualizar</th>
						  <th></th>
						  <th></th>
					</tr>
				</table>';
	$input .= '
				<script src="js/lib/recorder.js"></script>
				<script src="js/recordLive.js"></script>';

	return $input;
}


?>
