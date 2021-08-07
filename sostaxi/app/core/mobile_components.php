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
function link_btn($type,$location,$text,$extra_class,$config_app){	

	switch ($type) {
		case 'enlace':
			$estilo = '';
			$estilo .= $config_app['btn_enlace_color_fondo'].' ';
			$estilo .= $config_app['btn_enlace_ancho'].' ';
			$estilo .= $config_app['btn_enlace_radio'].' ';
			$estilo .= $config_app['btn_enlace_float'].' ';
			$estilo .= $config_app['btn_enlace_color_texto'].' ';
			$estilo .= $config_app['btn_enlace_sombra'].' ';
			$estilo .= $config_app['btn_enlace_border'].' ';
			break;
			
		case 'aceptar':
			$estilo = '';
			$estilo .= $config_app['btn_aceptar_color_fondo'].' ';
			$estilo .= $config_app['btn_aceptar_ancho'].' ';
			$estilo .= $config_app['btn_aceptar_radio'].' ';
			$estilo .= $config_app['btn_aceptar_float'].' ';
			$estilo .= $config_app['btn_aceptar_color_texto'].' ';
			$estilo .= $config_app['btn_aceptar_sombra'].' ';
			$estilo .= $config_app['btn_aceptar_border'].' ';
			break;
		case 'cancelar':
			$estilo = '';
			$estilo .= $config_app['btn_cancelar_color_fondo'].' ';
			$estilo .= $config_app['btn_cancelar_ancho'].' ';
			$estilo .= $config_app['btn_cancelar_radio'].' ';
			$estilo .= $config_app['btn_cancelar_float'].' ';
			$estilo .= $config_app['btn_cancelar_color_texto'].' ';
			$estilo .= $config_app['btn_cancelar_sombra'].' ';
			$estilo .= $config_app['btn_cancelar_border'].' ';
			break;
			
		case 'otros':
			$estilo = '';
			$estilo .= $config_app['btn_otros_color_fondo'].' ';
			$estilo .= $config_app['btn_otros_ancho'].' ';
			$estilo .= $config_app['btn_otros_radio'].' ';
			$estilo .= $config_app['btn_otros_float'].' ';
			$estilo .= $config_app['btn_otros_color_texto'].' ';
			$estilo .= $config_app['btn_otros_sombra'].' ';
			$estilo .= $config_app['btn_otros_border'].' ';
			break;
	}

	$btn = '<a class="'.$estilo.' btn_link '.$extra_class.'" href="'.$location.'" >'.$text.'</a>';
 

	return $btn;
}
/*******************************************************************************************************************/
function link_btn_java($type,$javafunction,$text,$extra_class,$config_app){	

	switch ($type) {
		case 'enlace':
			$estilo = '';
			$estilo .= $config_app['btn_enlace_color_fondo'].' ';
			$estilo .= $config_app['btn_enlace_ancho'].' ';
			$estilo .= $config_app['btn_enlace_radio'].' ';
			$estilo .= $config_app['btn_enlace_float'].' ';
			$estilo .= $config_app['btn_enlace_color_texto'].' ';
			$estilo .= $config_app['btn_enlace_sombra'].' ';
			$estilo .= $config_app['btn_enlace_border'].' ';
			break;
			
		case 'aceptar':
			$estilo = '';
			$estilo .= $config_app['btn_aceptar_color_fondo'].' ';
			$estilo .= $config_app['btn_aceptar_ancho'].' ';
			$estilo .= $config_app['btn_aceptar_radio'].' ';
			$estilo .= $config_app['btn_aceptar_float'].' ';
			$estilo .= $config_app['btn_aceptar_color_texto'].' ';
			$estilo .= $config_app['btn_aceptar_sombra'].' ';
			$estilo .= $config_app['btn_aceptar_border'].' ';
			break;
		case 'cancelar':
			$estilo = '';
			$estilo .= $config_app['btn_cancelar_color_fondo'].' ';
			$estilo .= $config_app['btn_cancelar_ancho'].' ';
			$estilo .= $config_app['btn_cancelar_radio'].' ';
			$estilo .= $config_app['btn_cancelar_float'].' ';
			$estilo .= $config_app['btn_cancelar_color_texto'].' ';
			$estilo .= $config_app['btn_cancelar_sombra'].' ';
			$estilo .= $config_app['btn_cancelar_border'].' ';
			break;
			
		case 'otros':
			$estilo = '';
			$estilo .= $config_app['btn_otros_color_fondo'].' ';
			$estilo .= $config_app['btn_otros_ancho'].' ';
			$estilo .= $config_app['btn_otros_radio'].' ';
			$estilo .= $config_app['btn_otros_float'].' ';
			$estilo .= $config_app['btn_otros_color_texto'].' ';
			$estilo .= $config_app['btn_otros_sombra'].' ';
			$estilo .= $config_app['btn_otros_border'].' ';
			break;
	}

	$btn = '<a class="'.$estilo.' btn_link '.$extra_class.'" onclick="'.$javafunction.'" >'.$text.'</a>';
 

	return $btn;
}
/*******************************************************************************************************************/
function tag_text($type,$tag,$text,$config_app){

	switch ($type) {
		case 'title1':
			$estilo = '';
			$estilo .= $config_app['title1_size'].' ';
			$estilo .= $config_app['title1_color'].' ';
			break;
		
		case 'title2':
			$estilo = '';
			$estilo .= $config_app['title2_size'].' ';
			$estilo .= $config_app['title2_color'].' ';
			break;
		
		case 'title3':
			$estilo = '';
			$estilo .= $config_app['title3_size'].' ';
			$estilo .= $config_app['title3_color'].' ';
			break;
		
		case 'title4':
			$estilo = '';
			$estilo .= $config_app['title4_size'].' ';
			$estilo .= $config_app['title4_color'].' ';
			break;	
		
		case 'title5':
			$estilo = '';
			$estilo .= $config_app['title5_size'].' ';
			$estilo .= $config_app['title5_color'].' ';
			break;	

	}
	
	$text = '<'.$tag.' class="'.$estilo.'">'.$text.'</'.$tag.'>';
 
	return $text;
}
/*******************************************************************************************************************/
function noti_title($text1,$text2,$config_app){

	$x1 = $config_app['noti_ul_color_tittle'].' '.$config_app['noti_ul_size_tittle'];
	$x2 = $config_app['noti_ul_color_new'].' '.$config_app['noti_ul_size_new'];
	
	$title  = '<h1 class="'.$x1.'">';
	$title .= '<span class="'.$x2.'">'.$text2.'</span>  '.$text1.'';
	$title .= '</h1>';

	return $title;
}
/*******************************************************************************************************************/
function noti_text($tag,$text,$config_app){

	$estilo = '';
	$estilo .= $config_app['noti_ul_color_text'].' ';
	$estilo .= $config_app['noti_ul_size_text'].' ';
	
	$text = '<'.$tag.' class="'.$estilo.'">'.$text.'</'.$tag.'>';
 
	return $text;
}
/*******************************************************************************************************************/
function noti_text_new($tag,$text,$config_app){

	$estilo = '';
	$estilo .= $config_app['noti_ul_color_new'].' ';
	$estilo .= $config_app['noti_ul_size_new'].' ';
	
	$text = '<'.$tag.' class="'.$estilo.'">'.$text.'</'.$tag.'>';
 
	return $text;
}
/*******************************************************************************************************************/
function form_input($type,$placeholder,$name, $value, $required,$config_app){
	if($value==''){$w='';}else{$w=$value;}
	if($required==1){$x='';}elseif($required==2){$x='required';}	
	$input = '<div class="input">
				  <input type="'.$type.'"  name="'.$name.'" id="'.$name.'"  placeholder="'.$placeholder.'" value="'.$w.'"  '.$x.' />
			  </div>';
			
	return $input;
}
/*******************************************************************************************************************/
function table_btn($type,$icon,$link,$text,$extra_class,$config_app){	

	switch ($type) {
		case 'acept':
			$estilo  = '';
			$estilo .= $config_app['noti_btn_acept_bgcolor'].' ';
			$estilo .= $config_app['noti_btn_acept_textcolor'].' ';
			$estilo .= $config_app['noti_btn_acept_textsize'];
			break;
		
		case 'cancel':
			$estilo  = '';
			$estilo .= $config_app['noti_btn_cancel_bgcolor'].' ';
			$estilo .= $config_app['noti_btn_cancel_textcolor'].' ';
			$estilo .= $config_app['noti_btn_cancel_textsize'];
			break;

	}
	$btn  = '<a class="'.$estilo.' btn_link '.$extra_class.'"  href="'.$link.'">';
	$btn .= '<i class="fa '.$icon.'"></i>  '.$text.'';
	$btn .= '</a>';
	
	return $btn;

}























?>
