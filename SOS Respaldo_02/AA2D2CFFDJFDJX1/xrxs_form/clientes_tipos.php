<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                        Se traspasan los datos a variables                                       */
/*******************************************************************************************************************/

	//Traspaso de valores input a variables
	if ( !empty($_POST['idTipoCliente']) )                   $idTipoCliente                   = $_POST['idTipoCliente'];
	if ( !empty($_POST['Nombre']) )                          $Nombre                          = $_POST['Nombre'];
	if ( !empty($_POST['imgLogo']) )                         $imgLogo                         = $_POST['imgLogo'];
	if ( !empty($_POST['email_principal']) )                 $email_principal                 = $_POST['email_principal'];
	if ( !empty($_POST['RazonSocial']) )                     $RazonSocial                     = $_POST['RazonSocial'];
	if ( !empty($_POST['Rut']) )                             $Rut                             = $_POST['Rut'];
	if ( !empty($_POST['Direccion']) )                       $Direccion                       = $_POST['Direccion'];
	if ( !empty($_POST['Fono']) )                            $Fono                            = $_POST['Fono'];
	if ( !empty($_POST['Ciudad']) )                          $Ciudad                          = $_POST['Ciudad'];
	if ( !empty($_POST['Comuna']) )                          $Comuna                          = $_POST['Comuna'];
	if ( !empty($_POST['background_color']) )                $background_color                = $_POST['background_color'];
	if ( !empty($_POST['btn_enlace_color_fondo']) )          $btn_enlace_color_fondo          = $_POST['btn_enlace_color_fondo'];
	if ( !empty($_POST['btn_enlace_ancho']) )                $btn_enlace_ancho                = $_POST['btn_enlace_ancho'];
	if ( !empty($_POST['btn_enlace_radio']) )                $btn_enlace_radio                = $_POST['btn_enlace_radio'];
	if ( !empty($_POST['btn_enlace_float']) )                $btn_enlace_float                = $_POST['btn_enlace_float'];
	if ( !empty($_POST['btn_enlace_color_texto']) )          $btn_enlace_color_texto          = $_POST['btn_enlace_color_texto'];
	if ( !empty($_POST['btn_enlace_sombra']) )               $btn_enlace_sombra 	          = $_POST['btn_enlace_sombra'];
	if ( !empty($_POST['btn_enlace_border']) )               $btn_enlace_border               = $_POST['btn_enlace_border'];
	if ( !empty($_POST['btn_aceptar_color_fondo']) )         $btn_aceptar_color_fondo         = $_POST['btn_aceptar_color_fondo'];
	if ( !empty($_POST['btn_aceptar_ancho']) )               $btn_aceptar_ancho 	          = $_POST['btn_aceptar_ancho'];
	if ( !empty($_POST['btn_aceptar_radio']) )               $btn_aceptar_radio 	          = $_POST['btn_aceptar_radio'];
	if ( !empty($_POST['btn_aceptar_float']) )               $btn_aceptar_float 	          = $_POST['btn_aceptar_float'];
	if ( !empty($_POST['btn_aceptar_color_texto']) )         $btn_aceptar_color_texto 	      = $_POST['btn_aceptar_color_texto'];
	if ( !empty($_POST['btn_aceptar_sombra']) )              $btn_aceptar_sombra 	          = $_POST['btn_aceptar_sombra'];
	if ( !empty($_POST['btn_aceptar_border']) )              $btn_aceptar_border 	          = $_POST['btn_aceptar_border'];
	if ( !empty($_POST['btn_cancelar_color_fondo']) )        $btn_cancelar_color_fondo        = $_POST['btn_cancelar_color_fondo'];
	if ( !empty($_POST['btn_cancelar_ancho']) )              $btn_cancelar_ancho              = $_POST['btn_cancelar_ancho'];
	if ( !empty($_POST['btn_cancelar_radio']) )              $btn_cancelar_radio              = $_POST['btn_cancelar_radio'];
	if ( !empty($_POST['btn_cancelar_float']) )              $btn_cancelar_float              = $_POST['btn_cancelar_float'];
	if ( !empty($_POST['btn_cancelar_color_texto']) )        $btn_cancelar_color_texto        = $_POST['btn_cancelar_color_texto'];
	if ( !empty($_POST['btn_cancelar_sombra']) )             $btn_cancelar_sombra             = $_POST['btn_cancelar_sombra'];
	if ( !empty($_POST['btn_cancelar_border']) )             $btn_cancelar_border             = $_POST['btn_cancelar_border'];
	if ( !empty($_POST['btn_otros_color_fondo']) )           $btn_otros_color_fondo           = $_POST['btn_otros_color_fondo'];
	if ( !empty($_POST['btn_otros_ancho']) )                 $btn_otros_ancho                 = $_POST['btn_otros_ancho'];
	if ( !empty($_POST['btn_otros_radio']) )                 $btn_otros_radio                 = $_POST['btn_otros_radio'];
	if ( !empty($_POST['btn_otros_float']) )                 $btn_otros_float                 = $_POST['btn_otros_float'];
	if ( !empty($_POST['btn_otros_color_texto']) )           $btn_otros_color_texto           = $_POST['btn_otros_color_texto'];
	if ( !empty($_POST['btn_otros_sombra']) )                $btn_otros_sombra                = $_POST['btn_otros_sombra'];
	if ( !empty($_POST['btn_otros_border']) )                $btn_otros_border                = $_POST['btn_otros_border'];
	if ( !empty($_POST['form_color']) )                      $form_color                      = $_POST['form_color'];
	if ( !empty($_POST['msg_error_color_body']) )            $msg_error_color_body            = $_POST['msg_error_color_body'];
	if ( !empty($_POST['msg_error_color_text']) )            $msg_error_color_text            = $_POST['msg_error_color_text'];
	if ( !empty($_POST['msg_error_width']) )                 $msg_error_width                 = $_POST['msg_error_width'];
	if ( !empty($_POST['msg_error_border']) )                $msg_error_border                = $_POST['msg_error_border'];
	if ( !empty($_POST['msg_error_border_color']) )          $msg_error_border_color          = $_POST['msg_error_border_color'];
	if ( !empty($_POST['msg_alert_color_body']) )            $msg_alert_color_body            = $_POST['msg_alert_color_body'];
	if ( !empty($_POST['msg_alert_color_text']) )            $msg_alert_color_text            = $_POST['msg_alert_color_text'];
	if ( !empty($_POST['msg_alert_width']) )                 $msg_alert_width                 = $_POST['msg_alert_width'];
	if ( !empty($_POST['msg_alert_border']) )                $msg_alert_border                = $_POST['msg_alert_border'];
	if ( !empty($_POST['msg_alert_border_color']) )          $msg_alert_border_color          = $_POST['msg_alert_border_color'];
	if ( !empty($_POST['msg_success_color_body']) )          $msg_success_color_body          = $_POST['msg_success_color_body'];
	if ( !empty($_POST['msg_success_color_text']) )          $msg_success_color_text          = $_POST['msg_success_color_text'];
	if ( !empty($_POST['msg_success_width']) )               $msg_success_width               = $_POST['msg_success_width'];
	if ( !empty($_POST['msg_success_border']) )              $msg_success_border              = $_POST['msg_success_border'];
	if ( !empty($_POST['msg_success_border_color']) )        $msg_success_border_color        = $_POST['msg_success_border_color'];
	if ( !empty($_POST['msg_info_color_body']) )             $msg_info_color_body             = $_POST['msg_info_color_body'];
	if ( !empty($_POST['msg_info_color_text']) )             $msg_info_color_text             = $_POST['msg_info_color_text'];
	if ( !empty($_POST['msg_info_width']) )                  $msg_info_width                  = $_POST['msg_info_width'];
	if ( !empty($_POST['msg_info_border']) )                 $msg_info_border                 = $_POST['msg_info_border'];
	if ( !empty($_POST['msg_info_border_color']) )           $msg_info_border_color           = $_POST['msg_info_border_color'];
	if ( !empty($_POST['usr_img_border']) )                  $usr_img_border                  = $_POST['usr_img_border'];
	if ( !empty($_POST['usr_img_border_radius']) )           $usr_img_border_radius           = $_POST['usr_img_border_radius'];
	if ( !empty($_POST['usr_img_shadow']) )                  $usr_img_shadow                  = $_POST['usr_img_shadow'];
	if ( !empty($_POST['usr_img_width']) )                   $usr_img_width                   = $_POST['usr_img_width'];
	if ( !empty($_POST['usr_name_lettersize']) )             $usr_name_lettersize             = $_POST['usr_name_lettersize'];
	if ( !empty($_POST['usr_name_lettercolor']) )            $usr_name_lettercolor            = $_POST['usr_name_lettercolor'];
	if ( !empty($_POST['usr_name_pat_lettersize']) )         $usr_name_pat_lettersize         = $_POST['usr_name_pat_lettersize'];
	if ( !empty($_POST['usr_name_pat_lettercolor']) )        $usr_name_pat_lettercolor        = $_POST['usr_name_pat_lettercolor'];
	if ( !empty($_POST['usr_name_pat_lettersize_2']) )       $usr_name_pat_lettersize_2       = $_POST['usr_name_pat_lettersize_2'];
	if ( !empty($_POST['usr_name_pat_lettercolor_2']) )      $usr_name_pat_lettercolor_2      = $_POST['usr_name_pat_lettercolor_2'];
	if ( !empty($_POST['list_shadow']) )                     $list_shadow                     = $_POST['list_shadow'];
	if ( !empty($_POST['list_color_border']) )               $list_color_border               = $_POST['list_color_border'];
	if ( !empty($_POST['list_sep']) )                        $list_sep                        = $_POST['list_sep'];
	if ( !empty($_POST['list_width']) )                      $list_width                      = $_POST['list_width'];
	if ( !empty($_POST['list_alin']) )                       $list_alin                       = $_POST['list_alin'];
	if ( !empty($_POST['list_deg']) )                        $list_deg                        = $_POST['list_deg'];
	if ( !empty($_POST['list_border']) )                     $list_border                     = $_POST['list_border'];
	if ( !empty($_POST['list_tittle_size']) )                $list_tittle_size                = $_POST['list_tittle_size'];
	if ( !empty($_POST['list_tittle_color']) )               $list_tittle_color               = $_POST['list_tittle_color'];
	if ( !empty($_POST['list_text_size']) )                  $list_text_size                  = $_POST['list_text_size'];
	if ( !empty($_POST['list_text_color']) )                 $list_text_color                 = $_POST['list_text_color'];
	if ( !empty($_POST['noti_tittle_color']) )               $noti_tittle_color               = $_POST['noti_tittle_color'];
	if ( !empty($_POST['noti_tittle_size']) )                $noti_tittle_size                = $_POST['noti_tittle_size'];
	if ( !empty($_POST['noti_width']) )                      $noti_width                      = $_POST['noti_width'];
	if ( !empty($_POST['noti_border']) )                     $noti_border                     = $_POST['noti_border'];
	if ( !empty($_POST['noti_shadow']) )                     $noti_shadow                     = $_POST['noti_shadow'];
	if ( !empty($_POST['noti_aling']) )                      $noti_aling                      = $_POST['noti_aling'];
	if ( !empty($_POST['noti_color']) )                      $noti_color                      = $_POST['noti_color'];
	if ( !empty($_POST['noti_tab_color']) )                  $noti_tab_color                  = $_POST['noti_tab_color'];
	if ( !empty($_POST['noti_tab_hover']) )                  $noti_tab_hover                  = $_POST['noti_tab_hover'];
	if ( !empty($_POST['noti_tab_check']) )                  $noti_tab_check                  = $_POST['noti_tab_check'];
	if ( !empty($_POST['noti_tab_label']) )                  $noti_tab_label                  = $_POST['noti_tab_label'];
	if ( !empty($_POST['noti_tab_label_select']) )           $noti_tab_label_select           = $_POST['noti_tab_label_select'];
	if ( !empty($_POST['noti_ul_color_new']) )               $noti_ul_color_new               = $_POST['noti_ul_color_new'];
	if ( !empty($_POST['noti_ul_color_tittle']) )            $noti_ul_color_tittle            = $_POST['noti_ul_color_tittle'];
	if ( !empty($_POST['noti_ul_color_text']) )              $noti_ul_color_text              = $_POST['noti_ul_color_text'];
	if ( !empty($_POST['noti_ul_size_new']) )                $noti_ul_size_new                = $_POST['noti_ul_size_new'];
	if ( !empty($_POST['noti_ul_size_tittle']) )             $noti_ul_size_tittle             = $_POST['noti_ul_size_tittle'];
	if ( !empty($_POST['noti_ul_size_text']) )               $noti_ul_size_text               = $_POST['noti_ul_size_text'];
	if ( !empty($_POST['noti_btn_acept_bgcolor']) )          $noti_btn_acept_bgcolor          = $_POST['noti_btn_acept_bgcolor'];
	if ( !empty($_POST['noti_btn_acept_textcolor']) )        $noti_btn_acept_textcolor        = $_POST['noti_btn_acept_textcolor'];
	if ( !empty($_POST['noti_btn_acept_textsize']) )         $noti_btn_acept_textsize         = $_POST['noti_btn_acept_textsize'];
	if ( !empty($_POST['noti_btn_cancel_bgcolor']) )         $noti_btn_cancel_bgcolor         = $_POST['noti_btn_cancel_bgcolor'];
	if ( !empty($_POST['noti_btn_cancel_textcolor']) )       $noti_btn_cancel_textcolor       = $_POST['noti_btn_cancel_textcolor'];
	if ( !empty($_POST['noti_btn_cancel_textsize']) )        $noti_btn_cancel_textsize        = $_POST['noti_btn_cancel_textsize'];
	if ( !empty($_POST['title1_size']) )                     $title1_size                     = $_POST['title1_size'];
	if ( !empty($_POST['title1_color']) )                    $title1_color                    = $_POST['title1_color'];
	if ( !empty($_POST['title2_size']) )                     $title2_size                     = $_POST['title2_size'];
	if ( !empty($_POST['title2_color']) )                    $title2_color                    = $_POST['title2_color'];
	if ( !empty($_POST['title3_size']) )                     $title3_size                     = $_POST['title3_size'];
	if ( !empty($_POST['title3_color']) )                    $title3_color                    = $_POST['title3_color'];
	if ( !empty($_POST['title4_size']) )                     $title4_size                     = $_POST['title4_size'];
	if ( !empty($_POST['title4_color']) )                    $title4_color                    = $_POST['title4_color'];
	if ( !empty($_POST['title5_size']) )                     $title5_size                     = $_POST['title5_size'];
	if ( !empty($_POST['title5_color']) )                    $title5_color                    = $_POST['title5_color'];
	if ( !empty($_POST['comport_register']) )                $comport_register                = $_POST['comport_register'];
	if ( !empty($_POST['comport_recover']) )                 $comport_recover                 = $_POST['comport_recover'];
	if ( !empty($_POST['comport_autoactivate']) )            $comport_autoactivate            = $_POST['comport_autoactivate'];
	if ( !empty($_POST['comport_client']) )                  $comport_client                  = $_POST['comport_client'];
	if ( !empty($_POST['comport_alcance']) )                 $comport_alcance                 = $_POST['comport_alcance'];
	if ( !empty($_POST['comport_busq_taxi_1']) )             $comport_busq_taxi_1             = $_POST['comport_busq_taxi_1'];
	if ( !empty($_POST['comport_busq_taxi_2']) )             $comport_busq_taxi_2             = $_POST['comport_busq_taxi_2'];
	if ( !empty($_POST['comport_espera']) )                  $comport_espera                  = $_POST['comport_espera'];
	
	
/*******************************************************************************************************************/
/*                                      Verificacion de los datos obligatorios                                     */
/*******************************************************************************************************************/

	//limpio y separo los datos de la cadena de comprobacion
	$form_obligatorios = str_replace(' ', '', $form_obligatorios);
	$piezas = explode(",", $form_obligatorios);
	//recorro los elementos
	foreach ($piezas as $valor) {
		//veo si existe el dato solicitado y genero el error
		switch ($valor) {
			case 'idTipoCliente':               if(empty($idTipoCliente)){                $error['idTipoCliente']               = 'error/No ha ingresado el id del sistema';}break;
			case 'Nombre':                      if(empty($Nombre)){                       $error['Nombre']                      = 'error/No ha ingresado el id del sistema';}break;
			case 'imgLogo':                     if(empty($imgLogo)){                      $error['imgLogo']                     = 'error/No ha ingresado el id del sistema';}break;
			case 'email_principal':             if(empty($email_principal)){              $error['email_principal']             = 'error/No ha ingresado el id del sistema';}break;
			case 'RazonSocial':                 if(empty($RazonSocial)){                  $error['RazonSocial']                 = 'error/No ha ingresado el id del sistema';}break;
			case 'Rut':                         if(empty($Rut)){                          $error['Rut']                         = 'error/No ha ingresado el id del sistema';}break;
			case 'Direccion':                   if(empty($Direccion)){                    $error['Direccion']                   = 'error/No ha ingresado el id del sistema';}break;
			case 'Fono':                        if(empty($Fono)){                         $error['Fono']                        = 'error/No ha ingresado el id del sistema';}break;
			case 'Ciudad':                      if(empty($Ciudad)){                       $error['Ciudad']                      = 'error/No ha ingresado el id del sistema';}break;
			case 'Comuna':                      if(empty($Comuna)){                       $error['Comuna']                      = 'error/No ha ingresado el id del sistema';}break;	
			case 'background_color':            if(empty($background_color)){             $error['background_color']            = 'error/No ha ingresado el background_color del sistema';}break;
			case 'btn_enlace_color_fondo':      if(empty($btn_enlace_color_fondo)){       $error['btn_enlace_color_fondo']      = 'error/No ha ingresado la imagen';}break;
			case 'btn_enlace_ancho':            if(empty($btn_enlace_ancho)){             $error['btn_enlace_ancho']            = 'error/No ha ingresado el email';}break;
			case 'btn_enlace_radio':            if(empty($btn_enlace_radio)){             $error['btn_enlace_radio']            = 'error/No ha ingresado la razon social';}break;
			case 'btn_enlace_float':            if(empty($btn_enlace_float)){             $error['btn_enlace_float']            = 'error/No ha ingresado el btn_enlace_float';}break;
			case 'btn_enlace_color_texto':      if(empty($btn_enlace_color_texto)){       $error['btn_enlace_color_texto']      = 'error/No ha ingresado la btn_enlace_color_texto';}break;
			case 'btn_enlace_sombra':           if(empty($btn_enlace_sombra)){            $error['btn_enlace_sombra']           = 'error/No ha ingresado el btn_enlace_sombra';}break;
			case 'btn_enlace_border':           if(empty($btn_enlace_border)){            $error['btn_enlace_border']           = 'error/No ha ingresado el btn_enlace_border';}break;
			case 'btn_aceptar_color_fondo':     if(empty($btn_aceptar_color_fondo)){      $error['btn_aceptar_color_fondo']     = 'error/No ha ingresado la btn_aceptar_color_fondo';}break;
			case 'btn_aceptar_ancho':           if(empty($btn_aceptar_ancho)){            $error['btn_aceptar_ancho']           = 'error/No ha ingresado el btn_aceptar_ancho';}break;	
			case 'btn_aceptar_radio':           if(empty($btn_aceptar_radio)){            $error['btn_aceptar_radio']           = 'error/No ha ingresado la carpeta de imagenes';}break;
			case 'btn_aceptar_float':           if(empty($btn_aceptar_float)){            $error['btn_aceptar_float']           = 'error/No ha ingresado la carpeta de mp3';}break;
			case 'btn_aceptar_color_texto':     if(empty($btn_aceptar_color_texto)){      $error['btn_aceptar_color_texto']     = 'error/No ha ingresado la carpeta de videos';}break;
			case 'btn_aceptar_sombra':          if(empty($btn_aceptar_sombra)){           $error['btn_aceptar_sombra']          = 'error/No ha ingresado la web de videos';}break;
			case 'btn_aceptar_border':          if(empty($btn_aceptar_border)){           $error['btn_aceptar_border']          = 'error/No ha ingresado la web de videos';}break;
			case 'btn_cancelar_color_fondo':    if(empty($btn_cancelar_color_fondo)){     $error['btn_cancelar_color_fondo']    = 'error/No ha ingresado la web de videos';}break;
			case 'btn_cancelar_ancho':          if(empty($btn_cancelar_ancho)){           $error['btn_cancelar_ancho']          = 'error/No ha ingresado la web de talento';}break;
			case 'btn_cancelar_radio':          if(empty($btn_cancelar_radio)){           $error['btn_cancelar_radio']          = 'error/No ha ingresado la web de talento';}break;
			case 'btn_cancelar_float':          if(empty($btn_cancelar_float)){           $error['btn_cancelar_float']          = 'error/No ha ingresado la web de talento';}break;
			case 'btn_cancelar_color_texto':    if(empty($btn_cancelar_color_texto)){     $error['btn_cancelar_color_texto']    = 'error/No ha ingresado la web de talento';}break;
			case 'btn_cancelar_sombra':         if(empty($btn_cancelar_sombra)){          $error['btn_cancelar_sombra']         = 'error/No ha ingresado la web de talento';}break;
			case 'btn_cancelar_border':         if(empty($btn_cancelar_border)){          $error['btn_cancelar_border']         = 'error/No ha ingresado la web de talento';}break;
			case 'btn_otros_color_fondo':       if(empty($btn_otros_color_fondo)){        $error['btn_otros_color_fondo']       = 'error/No ha ingresado la web de talento';}break;
			case 'btn_otros_ancho':             if(empty($btn_otros_ancho)){              $error['btn_otros_ancho']             = 'error/No ha ingresado la web de talento';}break;
			case 'btn_otros_radio':             if(empty($btn_otros_radio)){              $error['btn_otros_radio']             = 'error/No ha ingresado la web de talento';}break;
			case 'btn_otros_float':             if(empty($btn_otros_float)){              $error['btn_otros_float']             = 'error/No ha ingresado la web de talento';}break;
			case 'btn_otros_color_texto':       if(empty($btn_otros_color_texto)){        $error['btn_otros_color_texto']       = 'error/No ha ingresado la web de talento';}break;
			case 'btn_otros_sombra':            if(empty($btn_otros_sombra)){             $error['btn_otros_sombra']            = 'error/No ha ingresado la web de talento';}break;
			case 'btn_otros_border':            if(empty($btn_otros_border)){             $error['btn_otros_border']            = 'error/No ha ingresado la web de talento';}break;
			case 'form_color':                  if(empty($form_color)){                   $error['form_color']                  = 'error/No ha ingresado la web de talento';}break;
			case 'msg_error_color_body':        if(empty($msg_error_color_body)){         $error['msg_error_color_body']        = 'error/No ha ingresado la web de talento';}break;
			case 'msg_error_color_text':        if(empty($msg_error_color_text)){         $error['msg_error_color_text']        = 'error/No ha ingresado la web de talento';}break;
			case 'msg_error_width':             if(empty($msg_error_width)){              $error['msg_error_width']             = 'error/No ha ingresado la web de talento';}break;
			case 'msg_error_border':            if(empty($msg_error_border)){             $error['msg_error_border']            = 'error/No ha ingresado la web de talento';}break;
			case 'msg_error_border_color':      if(empty($msg_error_border_color)){       $error['msg_error_border_color']      = 'error/No ha ingresado la web de talento';}break;
			case 'msg_alert_color_body':        if(empty($msg_alert_color_body)){         $error['msg_alert_color_body']        = 'error/No ha ingresado la web de talento';}break;
			case 'msg_alert_color_text':        if(empty($msg_alert_color_text)){         $error['msg_alert_color_text']        = 'error/No ha ingresado la web de talento';}break;
			case 'msg_alert_width':             if(empty($msg_alert_width)){              $error['msg_alert_width']             = 'error/No ha ingresado la web de talento';}break;
			case 'msg_alert_border':            if(empty($msg_alert_border)){             $error['msg_alert_border']            = 'error/No ha ingresado la web de talento';}break;
			case 'msg_alert_border_color':      if(empty($msg_alert_border_color)){       $error['msg_alert_border_color']      = 'error/No ha ingresado la web de talento';}break;
			case 'msg_success_color_body':      if(empty($msg_success_color_body)){       $error['msg_success_color_body']      = 'error/No ha ingresado la web de talento';}break;
			case 'msg_success_color_text':      if(empty($msg_success_color_text)){       $error['msg_success_color_text']      = 'error/No ha ingresado la web de talento';}break;
			case 'msg_success_width':           if(empty($msg_success_width)){            $error['msg_success_width']           = 'error/No ha ingresado la web de talento';}break;
			case 'msg_success_border':          if(empty($msg_success_border)){           $error['msg_success_border']          = 'error/No ha ingresado la web de talento';}break;
			case 'msg_success_border_color':    if(empty($msg_success_border_color)){     $error['msg_success_border_color']    = 'error/No ha ingresado la web de talento';}break;
			case 'msg_info_color_body':         if(empty($msg_info_color_body)){          $error['msg_info_color_body']         = 'error/No ha ingresado la web de talento';}break;
			case 'msg_info_color_text':         if(empty($msg_info_color_text)){          $error['msg_info_color_text']         = 'error/No ha ingresado la web de talento';}break;
			case 'msg_info_width':              if(empty($msg_info_width)){               $error['msg_info_width']              = 'error/No ha ingresado la web de talento';}break;
			case 'msg_info_border':             if(empty($msg_info_border)){              $error['msg_info_border']             = 'error/No ha ingresado la web de talento';}break;
			case 'msg_info_border_color':       if(empty($msg_info_border_color)){        $error['msg_info_border_color']       = 'error/No ha ingresado la web de talento';}break;
			case 'usr_img_border':              if(empty($usr_img_border)){               $error['usr_img_border']              = 'error/No ha ingresado la web de talento';}break;
			case 'usr_img_border_radius':       if(empty($usr_img_border_radius)){        $error['usr_img_border_radius']       = 'error/No ha ingresado la web de talento';}break;
			case 'usr_img_shadow':              if(empty($usr_img_shadow)){               $error['usr_img_shadow']              = 'error/No ha ingresado la web de talento';}break;
			case 'usr_img_width':               if(empty($usr_img_width)){                $error['usr_img_width']               = 'error/No ha ingresado la web de talento';}break;
			case 'usr_name_lettersize':         if(empty($usr_name_lettersize)){          $error['usr_name_lettersize']         = 'error/No ha ingresado la web de talento';}break;
			case 'usr_name_lettercolor':        if(empty($usr_name_lettercolor)){         $error['usr_name_lettercolor']        = 'error/No ha ingresado la web de talento';}break;
			case 'usr_name_pat_lettersize':     if(empty($usr_name_pat_lettersize)){      $error['usr_name_pat_lettersize']     = 'error/No ha ingresado la web de talento';}break;
			case 'usr_name_pat_lettercolor':    if(empty($usr_name_pat_lettercolor)){     $error['usr_name_pat_lettercolor']    = 'error/No ha ingresado la web de talento';}break;
			case 'usr_name_pat_lettersize_2':   if(empty($usr_name_pat_lettersize_2)){    $error['usr_name_pat_lettersize_2']   = 'error/No ha ingresado la web de talento';}break;
			case 'usr_name_pat_lettercolor_2':  if(empty($usr_name_pat_lettercolor_2)){   $error['usr_name_pat_lettercolor_2']  = 'error/No ha ingresado la web de talento';}break;
			case 'list_shadow':                 if(empty($list_shadow)){                  $error['list_shadow']                 = 'error/No ha ingresado la web de talento';}break;
			case 'list_color_border':           if(empty($list_color_border)){            $error['list_color_border']           = 'error/No ha ingresado la web de talento';}break;
			case 'list_sep':                    if(empty($list_sep)){                     $error['list_sep']                    = 'error/No ha ingresado la web de talento';}break;
			case 'list_width':                  if(empty($list_width)){                   $error['list_width']                  = 'error/No ha ingresado la web de talento';}break;
			case 'list_alin':                   if(empty($list_alin)){                    $error['list_alin']                   = 'error/No ha ingresado la web de talento';}break;
			case 'list_deg':                    if(empty($list_deg)){                     $error['list_deg']                    = 'error/No ha ingresado la web de talento';}break;
			case 'list_border':                 if(empty($list_border)){                  $error['list_border']                 = 'error/No ha ingresado la web de talento';}break;
			case 'list_tittle_size':            if(empty($list_tittle_size)){             $error['list_tittle_size']            = 'error/No ha ingresado la web de talento';}break;
			case 'list_tittle_color':           if(empty($list_tittle_color)){            $error['list_tittle_color']           = 'error/No ha ingresado la web de talento';}break;
			case 'list_text_size':              if(empty($list_text_size)){               $error['list_text_size']              = 'error/No ha ingresado la web de talento';}break;
			case 'list_text_color':             if(empty($list_text_color)){              $error['list_text_color']             = 'error/No ha ingresado la web de talento';}break;
			case 'noti_tittle_color':           if(empty($noti_tittle_color)){            $error['noti_tittle_color']           = 'error/No ha ingresado la web de talento';}break;
			case 'noti_tittle_size':            if(empty($noti_tittle_size)){             $error['noti_tittle_size']            = 'error/No ha ingresado la web de talento';}break;
			case 'noti_width':                  if(empty($noti_width)){                   $error['noti_width']                  = 'error/No ha ingresado la web de talento';}break;
			case 'noti_border':                 if(empty($noti_border)){                  $error['noti_border']                 = 'error/No ha ingresado la web de talento';}break;
			case 'noti_shadow':                 if(empty($noti_shadow)){                  $error['noti_shadow']                 = 'error/No ha ingresado la web de talento';}break;
			case 'noti_aling':                  if(empty($noti_aling)){                   $error['noti_aling']                  = 'error/No ha ingresado la web de talento';}break;
			case 'noti_color':                  if(empty($noti_color)){                   $error['noti_color']                  = 'error/No ha ingresado la web de talento';}break;
			case 'noti_tab_color':              if(empty($noti_tab_color)){               $error['noti_tab_color']              = 'error/No ha ingresado la web de talento';}break;
			case 'noti_tab_hover':              if(empty($noti_tab_hover)){               $error['noti_tab_hover']              = 'error/No ha ingresado la web de talento';}break;
			case 'noti_tab_check':              if(empty($noti_tab_check)){               $error['noti_tab_check']              = 'error/No ha ingresado la web de talento';}break;
			case 'noti_tab_label':              if(empty($noti_tab_label)){               $error['noti_tab_label']              = 'error/No ha ingresado la web de talento';}break;
			case 'noti_tab_label_select':       if(empty($noti_tab_label_select)){        $error['noti_tab_label_select']       = 'error/No ha ingresado la web de talento';}break;
			case 'noti_ul_color_new':           if(empty($noti_ul_color_new)){            $error['noti_ul_color_new']           = 'error/No ha ingresado la web de talento';}break;
			case 'noti_ul_color_tittle':        if(empty($noti_ul_color_tittle)){         $error['noti_ul_color_tittle']        = 'error/No ha ingresado la web de talento';}break;
			case 'noti_ul_color_text':          if(empty($noti_ul_color_text)){           $error['noti_ul_color_text']          = 'error/No ha ingresado la web de talento';}break;
			case 'noti_ul_size_new':            if(empty($noti_ul_size_new)){             $error['noti_ul_size_new']            = 'error/No ha ingresado la web de talento';}break;
			case 'noti_ul_size_tittle':         if(empty($noti_ul_size_tittle)){          $error['noti_ul_size_tittle']         = 'error/No ha ingresado la web de talento';}break;
			case 'noti_ul_size_text':           if(empty($noti_ul_size_text)){            $error['noti_ul_size_text']           = 'error/No ha ingresado la web de talento';}break;
			case 'noti_btn_acept_bgcolor':      if(empty($noti_btn_acept_bgcolor)){       $error['noti_btn_acept_bgcolor']      = 'error/No ha ingresado la web de talento';}break;
			case 'noti_btn_acept_textcolor':    if(empty($noti_btn_acept_textcolor)){     $error['noti_btn_acept_textcolor']    = 'error/No ha ingresado la web de talento';}break;
			case 'noti_btn_acept_textsize':     if(empty($noti_btn_acept_textsize)){      $error['noti_btn_acept_textsize']     = 'error/No ha ingresado la web de talento';}break;
			case 'noti_btn_cancel_bgcolor':     if(empty($noti_btn_cancel_bgcolor)){      $error['noti_btn_cancel_bgcolor']     = 'error/No ha ingresado la web de talento';}break;
			case 'noti_btn_cancel_textcolor':   if(empty($noti_btn_cancel_textcolor)){    $error['noti_btn_cancel_textcolor']   = 'error/No ha ingresado la web de talento';}break;
			case 'noti_btn_cancel_textsize':    if(empty($noti_btn_cancel_textsize)){     $error['noti_btn_cancel_textsize']    = 'error/No ha ingresado la web de talento';}break;
			case 'title1_size':                 if(empty($title1_size)){                  $error['title1_size']                 = 'error/No ha ingresado la web de talento';}break;
			case 'title1_color':                if(empty($title1_color)){                 $error['title1_color']                = 'error/No ha ingresado la web de talento';}break;
			case 'title2_size':                 if(empty($title2_size)){                  $error['title2_size']                 = 'error/No ha ingresado la web de talento';}break;
			case 'title2_color':                if(empty($title2_color)){                 $error['title2_color']                = 'error/No ha ingresado la web de talento';}break;
			case 'title3_size':                 if(empty($title3_size)){                  $error['title3_size']                 = 'error/No ha ingresado la web de talento';}break;
			case 'title3_color':                if(empty($title3_color)){                 $error['title3_color']                = 'error/No ha ingresado la web de talento';}break;
			case 'title4_size':                 if(empty($title4_size)){                  $error['title4_size']                 = 'error/No ha ingresado la web de talento';}break;
			case 'title4_color':                if(empty($title4_color)){                 $error['title4_color']                = 'error/No ha ingresado la web de talento';}break;
			case 'title5_size':                 if(empty($title5_size)){                  $error['title5_size']                 = 'error/No ha ingresado la web de talento';}break;
			case 'title5_color':                if(empty($title5_color)){                 $error['title5_color']                = 'error/No ha ingresado la web de talento';}break;
			case 'comport_register':            if(empty($comport_register)){             $error['comport_register']            = 'error/No ha ingresado la web de talento';}break;
			case 'comport_recover':             if(empty($comport_recover)){              $error['comport_recover']             = 'error/No ha ingresado la web de talento';}break;
			case 'comport_autoactivate':        if(empty($comport_autoactivate)){         $error['comport_autoactivate']        = 'error/No ha ingresado la web de talento';}break;
			case 'comport_client':              if(empty($comport_client)){               $error['comport_client']              = 'error/No ha ingresado la web de talento';}break;
			case 'comport_alcance':             if(empty($comport_alcance)){              $error['comport_alcance']             = 'error/No ha ingresado la web de talento';}break;
			case 'comport_busq_taxi_1':         if(empty($comport_busq_taxi_1)){          $error['comport_busq_taxi_1']         = 'error/No ha ingresado la web de talento';}break;
			case 'comport_busq_taxi_2':         if(empty($comport_busq_taxi_2)){          $error['comport_busq_taxi_2']         = 'error/No ha ingresado la web de talento';}break;
			case 'comport_espera':              if(empty($comport_espera)){               $error['comport_espera']              = 'error/No ha ingresado la web de talento';}break;

		}
	}
	
/*******************************************************************************************************************/
/*                                        Verificacion de los datos ingresados                                     */
/*******************************************************************************************************************/	
	//Verifica si el mail corresponde
	if(isset($email_principal)){if(validaremail($email_principal)){ }else{   $error['email_principal']   = 'error/El Email ingresado no es valido'; }}	
	if(isset($Fono)){if (validarnumero($Fono)) {                             $error['Fono']	   = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($Rut)){if(RutValidate($Rut)==0){                                $error['Rut']     = 'error/El Rut ingresado no es valido'; }}
	
	
	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'insert':
			//Verifico otros datos
			
			//Se verifica si el usuario existe
			if(isset($Nombre)){
				$sql_usuario = mysql_query("SELECT Nombre FROM core_sistemas WHERE Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/El sistema ya esta en uso';}
			
			// se verifica si el correo ya existe
			if(isset($RazonSocial)){
				$sql_email = mysql_query("SELECT RazonSocial FROM core_sistemas WHERE RazonSocial='".$RazonSocial."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['RazonSocial'] = 'error/El sistema ya esta en uso';}
			
			// se verifica si el correo ya existe
			if(isset($Rut)){
				$sql_email = mysql_query("SELECT Rut FROM core_sistemas WHERE Rut='".$Rut."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['Rut'] = 'error/El Rut ya esta en uso';}
			
			
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($Nombre) && $Nombre != ''){                                           $a = "'".$Nombre."'" ;                         }else{$a ="''";}
				if(isset($imgLogo) && $imgLogo != ''){                                         $a .= ",'".$imgLogo."'" ;                      }else{$a .= ",''";}
				if(isset($email_principal) && $email_principal != ''){                         $a .= ",'".$email_principal."'" ;              }else{$a .= ",''";}
				if(isset($RazonSocial) && $RazonSocial != ''){                                 $a .= ",'".$RazonSocial."'" ;                  }else{$a .= ",''";}
				if(isset($Rut) && $Rut != ''){                                                 $a .= ",'".$Rut."'" ;                          }else{$a .= ",''";}
				if(isset($Direccion) && $Direccion != ''){                                     $a .= ",'".$Direccion."'" ;                    }else{$a .= ",''";}
				if(isset($Fono) && $Fono != ''){                                               $a .= ",'".$Fono."'" ;                         }else{$a .= ",''";}
				if(isset($Ciudad) && $Ciudad != ''){                                           $a .= ",'".$Ciudad."'" ;                       }else{$a .= ",''";}
				if(isset($Comuna) && $Comuna != ''){                                           $a .= ",'".$Comuna."'" ;                       }else{$a .= ",''";}
				if(isset($background_color) && $background_color != ''){                       $a .= ",'".$background_color."'" ;             }else{$a .= ",''";}
				if(isset($btn_enlace_color_fondo) && $btn_enlace_color_fondo != ''){           $a .= ",'".$btn_enlace_color_fondo."'" ;       }else{$a .= ",''";}
				if(isset($btn_enlace_ancho) && $btn_enlace_ancho != ''){                       $a .= ",'".$btn_enlace_ancho."'" ;             }else{$a .= ",''";}
				if(isset($btn_enlace_radio) && $btn_enlace_radio != ''){                       $a .= ",'".$btn_enlace_radio."'" ;             }else{$a .= ",''";}
				if(isset($btn_enlace_float) && $btn_enlace_float != ''){                       $a .= ",'".$btn_enlace_float."'" ;             }else{$a .= ",''";}
				if(isset($btn_enlace_color_texto) && $btn_enlace_color_texto != ''){           $a .= ",'".$btn_enlace_color_texto."'" ;       }else{$a .= ",''";}
				if(isset($btn_enlace_sombra) && $btn_enlace_sombra != ''){                     $a .= ",'".$btn_enlace_sombra."'" ;            }else{$a .= ",''";}
				if(isset($btn_enlace_border) && $btn_enlace_border != ''){                     $a .= ",'".$btn_enlace_border."'" ;            }else{$a .= ",''";}
				if(isset($btn_aceptar_color_fondo) && $btn_aceptar_color_fondo != ''){         $a .= ",'".$btn_aceptar_color_fondo."'" ;      }else{$a .= ",''";}
				if(isset($btn_aceptar_ancho) && $btn_aceptar_ancho != ''){                     $a .= ",'".$btn_aceptar_ancho."'" ;            }else{$a .= ",''";}
				if(isset($btn_aceptar_radio) && $btn_aceptar_radio != ''){                     $a .= ",'".$btn_aceptar_radio."'" ;            }else{$a .= ",''";}
				if(isset($btn_aceptar_float) && $btn_aceptar_float != ''){                     $a .= ",'".$btn_aceptar_float."'" ;            }else{$a .= ",''";}
				if(isset($btn_aceptar_color_texto) && $btn_aceptar_color_texto != ''){         $a .= ",'".$btn_aceptar_color_texto."'" ;      }else{$a .= ",''";}
				if(isset($btn_aceptar_sombra) && $btn_aceptar_sombra != ''){                   $a .= ",'".$btn_aceptar_sombra."'" ;           }else{$a .= ",''";}
				if(isset($btn_aceptar_border) && $btn_aceptar_border != ''){                   $a .= ",'".$btn_aceptar_border."'" ;           }else{$a .= ",''";}
				if(isset($btn_cancelar_color_fondo) && $btn_cancelar_color_fondo != ''){       $a .= ",'".$btn_cancelar_color_fondo."'" ;     }else{$a .= ",''";}
				if(isset($btn_cancelar_ancho) && $btn_cancelar_ancho != ''){                   $a .= ",'".$btn_cancelar_ancho."'" ;           }else{$a .= ",''";}
				if(isset($btn_cancelar_radio) && $btn_cancelar_radio != ''){                   $a .= ",'".$btn_cancelar_radio."'" ;           }else{$a .= ",''";}
				if(isset($btn_cancelar_float) && $btn_cancelar_float != ''){                   $a .= ",'".$btn_cancelar_float."'" ;           }else{$a .= ",''";}
				if(isset($btn_cancelar_color_texto) && $btn_cancelar_color_texto != ''){       $a .= ",'".$btn_cancelar_color_texto."'" ;     }else{$a .= ",''";}
				if(isset($btn_cancelar_sombra) && $btn_cancelar_sombra != ''){                 $a .= ",'".$btn_cancelar_sombra."'" ;          }else{$a .= ",''";}
				if(isset($btn_cancelar_border) && $btn_cancelar_border != ''){                 $a .= ",'".$btn_cancelar_border."'" ;          }else{$a .= ",''";}
				if(isset($btn_otros_color_fondo) && $btn_otros_color_fondo != ''){             $a .= ",'".$btn_otros_color_fondo."'" ;        }else{$a .= ",''";}
				if(isset($btn_otros_ancho) && $btn_otros_ancho != ''){                         $a .= ",'".$btn_otros_ancho."'" ;              }else{$a .= ",''";}
				if(isset($btn_otros_radio) && $btn_otros_radio != ''){                         $a .= ",'".$btn_otros_radio."'" ;              }else{$a .= ",''";}
				if(isset($btn_otros_float) && $btn_otros_float != ''){                         $a .= ",'".$btn_otros_float."'" ;              }else{$a .= ",''";}
				if(isset($btn_otros_color_texto) && $btn_otros_color_texto != ''){             $a .= ",'".$btn_otros_color_texto."'" ;        }else{$a .= ",''";}
				if(isset($btn_otros_sombra) && $btn_otros_sombra != ''){                       $a .= ",'".$btn_otros_sombra."'" ;             }else{$a .= ",''";}
				if(isset($btn_otros_border) && $btn_otros_border != ''){                       $a .= ",'".$btn_otros_border."'" ;             }else{$a .= ",''";}
				if(isset($form_color) && $form_color != ''){                                   $a .= ",'".$form_color."'" ;                   }else{$a .= ",''";}
				if(isset($msg_error_color_body) && $msg_error_color_body != ''){               $a .= ",'".$msg_error_color_body."'" ;         }else{$a .= ",''";}
				if(isset($msg_error_color_text) && $msg_error_color_text != ''){               $a .= ",'".$msg_error_color_text."'" ;         }else{$a .= ",''";}
				if(isset($msg_error_width) && $msg_error_width != ''){                         $a .= ",'".$msg_error_width."'" ;              }else{$a .= ",''";}
				if(isset($msg_error_border) && $msg_error_border != ''){                       $a .= ",'".$msg_error_border."'" ;             }else{$a .= ",''";}
				if(isset($msg_error_border_color) && $msg_error_border_color != ''){           $a .= ",'".$msg_error_border_color."'" ;       }else{$a .= ",''";}
				if(isset($msg_alert_color_body) && $msg_alert_color_body != ''){               $a .= ",'".$msg_alert_color_body."'" ;         }else{$a .= ",''";}
				if(isset($msg_alert_color_text) && $msg_alert_color_text != ''){               $a .= ",'".$msg_alert_color_text."'" ;         }else{$a .= ",''";}
				if(isset($msg_alert_width) && $msg_alert_width != ''){                         $a .= ",'".$msg_alert_width."'" ;              }else{$a .= ",''";}
				if(isset($msg_alert_border) && $msg_alert_border != ''){                       $a .= ",'".$msg_alert_border."'" ;             }else{$a .= ",''";}
				if(isset($msg_alert_border_color) && $msg_alert_border_color != ''){           $a .= ",'".$msg_alert_border_color."'" ;       }else{$a .= ",''";}
				if(isset($msg_success_color_body) && $msg_success_color_body != ''){           $a .= ",'".$msg_success_color_body."'" ;       }else{$a .= ",''";}
				if(isset($msg_success_color_text) && $msg_success_color_text != ''){           $a .= ",'".$msg_success_color_text."'" ;       }else{$a .= ",''";}
				if(isset($msg_success_width) && $msg_success_width != ''){                     $a .= ",'".$msg_success_width."'" ;            }else{$a .= ",''";}
				if(isset($msg_success_border) && $msg_success_border != ''){                   $a .= ",'".$msg_success_border."'" ;           }else{$a .= ",''";}
				if(isset($msg_success_border_color) && $msg_success_border_color != ''){       $a .= ",'".$msg_success_border_color."'" ;     }else{$a .= ",''";}
				if(isset($msg_info_color_body) && $msg_info_color_body != ''){                 $a .= ",'".$msg_info_color_body."'" ;          }else{$a .= ",''";}
				if(isset($msg_info_color_text) && $msg_info_color_text != ''){                 $a .= ",'".$msg_info_color_text."'" ;          }else{$a .= ",''";}
				if(isset($msg_info_width) && $msg_info_width != ''){                           $a .= ",'".$msg_info_width."'" ;               }else{$a .= ",''";}
				if(isset($msg_info_border) && $msg_info_border != ''){                         $a .= ",'".$msg_info_border."'" ;              }else{$a .= ",''";}
				if(isset($msg_info_border_color) && $msg_info_border_color != ''){             $a .= ",'".$msg_info_border_color."'" ;        }else{$a .= ",''";}
				if(isset($usr_img_border) && $usr_img_border != ''){                           $a .= ",'".$usr_img_border."'" ;               }else{$a .= ",''";}
				if(isset($usr_img_border_radius) && $usr_img_border_radius != ''){             $a .= ",'".$usr_img_border_radius."'" ;        }else{$a .= ",''";}
				if(isset($usr_img_shadow) && $usr_img_shadow != ''){                           $a .= ",'".$usr_img_shadow."'" ;               }else{$a .= ",''";}
				if(isset($usr_img_width) && $usr_img_width != ''){                             $a .= ",'".$usr_img_width."'" ;                }else{$a .= ",''";}
				if(isset($usr_name_lettersize) && $usr_name_lettersize != ''){                 $a .= ",'".$usr_name_lettersize."'" ;          }else{$a .= ",''";}
				if(isset($usr_name_lettercolor) && $usr_name_lettercolor != ''){               $a .= ",'".$usr_name_lettercolor."'" ;         }else{$a .= ",''";}
				if(isset($usr_name_pat_lettersize) && $usr_name_pat_lettersize != ''){         $a .= ",'".$usr_name_pat_lettersize."'" ;      }else{$a .= ",''";}
				if(isset($usr_name_pat_lettercolor) && $usr_name_pat_lettercolor != ''){       $a .= ",'".$usr_name_pat_lettercolor."'" ;     }else{$a .= ",''";}
				if(isset($usr_name_pat_lettersize_2) && $usr_name_pat_lettersize_2 != ''){     $a .= ",'".$usr_name_pat_lettersize_2."'" ;    }else{$a .= ",''";}
				if(isset($usr_name_pat_lettercolor_2) && $usr_name_pat_lettercolor_2 != ''){   $a .= ",'".$usr_name_pat_lettercolor_2."'" ;   }else{$a .= ",''";}
				if(isset($list_shadow) && $list_shadow != ''){                                 $a .= ",'".$list_shadow."'" ;                  }else{$a .= ",''";}
				if(isset($list_color_border) && $list_color_border != ''){                     $a .= ",'".$list_color_border."'" ;            }else{$a .= ",''";}
				if(isset($list_sep) && $list_sep != ''){                                       $a .= ",'".$list_sep."'" ;                     }else{$a .= ",''";}
				if(isset($list_width) && $list_width != ''){                                   $a .= ",'".$list_width."'" ;                   }else{$a .= ",''";}
				if(isset($list_alin) && $list_alin != ''){                                     $a .= ",'".$list_alin."'" ;                    }else{$a .= ",''";}
				if(isset($list_deg) && $list_deg != ''){                                       $a .= ",'".$list_deg."'" ;                     }else{$a .= ",''";}
				if(isset($list_border) && $list_border != ''){                                 $a .= ",'".$list_border."'" ;                  }else{$a .= ",''";}
				if(isset($list_tittle_size) && $list_tittle_size != ''){                       $a .= ",'".$list_tittle_size."'" ;             }else{$a .= ",''";}
				if(isset($list_tittle_color) && $list_tittle_color != ''){                     $a .= ",'".$list_tittle_color."'" ;            }else{$a .= ",''";}
				if(isset($list_text_size) && $list_text_size != ''){                           $a .= ",'".$list_text_size."'" ;               }else{$a .= ",''";}
				if(isset($list_text_color) && $list_text_color != ''){                         $a .= ",'".$list_text_color."'" ;              }else{$a .= ",''";}
				if(isset($noti_tittle_color) && $noti_tittle_color != ''){                     $a .= ",'".$noti_tittle_color."'" ;            }else{$a .= ",''";}
				if(isset($noti_tittle_size) && $noti_tittle_size != ''){                       $a .= ",'".$noti_tittle_size."'" ;             }else{$a .= ",''";}
				if(isset($noti_width) && $noti_width != ''){                                   $a .= ",'".$noti_width."'" ;                   }else{$a .= ",''";}
				if(isset($noti_border) && $noti_border != ''){                                 $a .= ",'".$noti_border."'" ;                  }else{$a .= ",''";}
				if(isset($noti_shadow) && $noti_shadow != ''){                                 $a .= ",'".$noti_shadow."'" ;                  }else{$a .= ",''";}
				if(isset($noti_aling) && $noti_aling != ''){                                   $a .= ",'".$noti_aling."'" ;                   }else{$a .= ",''";}
				if(isset($noti_color) && $noti_color != ''){                                   $a .= ",'".$noti_color."'" ;                   }else{$a .= ",''";}
				if(isset($noti_tab_color) && $noti_tab_color != ''){                           $a .= ",'".$noti_tab_color."'" ;               }else{$a .= ",''";}
				if(isset($noti_tab_hover) && $noti_tab_hover != ''){                           $a .= ",'".$noti_tab_hover."'" ;               }else{$a .= ",''";}
				if(isset($noti_tab_check) && $noti_tab_check != ''){                           $a .= ",'".$noti_tab_check."'" ;               }else{$a .= ",''";}
				if(isset($noti_tab_label) && $noti_tab_label != ''){                           $a .= ",'".$noti_tab_label."'" ;               }else{$a .= ",''";}
				if(isset($noti_tab_label_select) && $noti_tab_label_select != ''){             $a .= ",'".$noti_tab_label_select."'" ;        }else{$a .= ",''";}
				if(isset($noti_ul_color_new) && $noti_ul_color_new != ''){                     $a .= ",'".$noti_ul_color_new."'" ;            }else{$a .= ",''";}
				if(isset($noti_ul_color_tittle) && $noti_ul_color_tittle != ''){               $a .= ",'".$noti_ul_color_tittle."'" ;         }else{$a .= ",''";}
				if(isset($noti_ul_color_text) && $noti_ul_color_text != ''){                   $a .= ",'".$noti_ul_color_text."'" ;           }else{$a .= ",''";}
				if(isset($noti_ul_size_new) && $noti_ul_size_new != ''){                       $a .= ",'".$noti_ul_size_new."'" ;             }else{$a .= ",''";}
				if(isset($noti_ul_size_tittle) && $noti_ul_size_tittle != ''){                 $a .= ",'".$noti_ul_size_tittle."'" ;          }else{$a .= ",''";}
				if(isset($noti_ul_size_text) && $noti_ul_size_text != ''){                     $a .= ",'".$noti_ul_size_text."'" ;            }else{$a .= ",''";}
				if(isset($noti_btn_acept_bgcolor) && $noti_btn_acept_bgcolor != ''){           $a .= ",'".$noti_btn_acept_bgcolor."'" ;       }else{$a .= ",''";}
				if(isset($noti_btn_acept_textcolor) && $noti_btn_acept_textcolor != ''){       $a .= ",'".$noti_btn_acept_textcolor."'" ;     }else{$a .= ",''";}
				if(isset($noti_btn_acept_textsize) && $noti_btn_acept_textsize != ''){         $a .= ",'".$noti_btn_acept_textsize."'" ;      }else{$a .= ",''";}
				if(isset($noti_btn_cancel_bgcolor) && $noti_btn_cancel_bgcolor != ''){         $a .= ",'".$noti_btn_cancel_bgcolor."'" ;      }else{$a .= ",''";}
				if(isset($noti_btn_cancel_textcolor) && $noti_btn_cancel_textcolor != ''){     $a .= ",'".$noti_btn_cancel_textcolor."'" ;    }else{$a .= ",''";}
				if(isset($noti_btn_cancel_textsize) && $noti_btn_cancel_textsize != ''){       $a .= ",'".$noti_btn_cancel_textsize."'" ;     }else{$a .= ",''";}
				if(isset($title1_size) && $title1_size != ''){                                 $a .= ",'".$title1_size."'" ;                  }else{$a .= ",''";}
				if(isset($title1_color) && $title1_color != ''){                               $a .= ",'".$title1_color."'" ;                 }else{$a .= ",''";}
				if(isset($title2_size) && $title2_size != ''){                                 $a .= ",'".$title2_size."'" ;                  }else{$a .= ",''";}
				if(isset($title2_color) && $title2_color != ''){                               $a .= ",'".$title2_color."'" ;                 }else{$a .= ",''";}
				if(isset($title3_size) && $title3_size != ''){                                 $a .= ",'".$title3_size."'" ;                  }else{$a .= ",''";}
				if(isset($title3_color) && $title3_color != ''){                               $a .= ",'".$title3_color."'" ;                 }else{$a .= ",''";}
				if(isset($title4_size) && $title4_size != ''){                                 $a .= ",'".$title4_size."'" ;                  }else{$a .= ",''";}
				if(isset($title4_color) && $title4_color != ''){                               $a .= ",'".$title4_color."'" ;                 }else{$a .= ",''";}
				if(isset($title5_size) && $title5_size != ''){                                 $a .= ",'".$title5_size."'" ;                  }else{$a .= ",''";}
				if(isset($title5_color) && $title5_color != ''){                               $a .= ",'".$title5_color."'" ;                 }else{$a .= ",''";}
				if(isset($comport_register) && $comport_register != ''){                       $a .= ",'".$comport_register."'" ;             }else{$a .= ",''";}
				if(isset($comport_recover) && $comport_recover != ''){                         $a .= ",'".$comport_recover."'" ;              }else{$a .= ",''";}
				if(isset($comport_autoactivate) && $comport_autoactivate != ''){               $a .= ",'".$comport_autoactivate."'" ;         }else{$a .= ",''";}
				if(isset($comport_client) && $comport_client != ''){                           $a .= ",'".$comport_client."'" ;               }else{$a .= ",''";}
				if(isset($comport_alcance) && $comport_alcance != ''){                         $a .= ",'".$comport_alcance."'" ;              }else{$a .= ",''";}
				if(isset($comport_busq_taxi_1) && $comport_busq_taxi_1 != ''){                 $a .= ",'".$comport_busq_taxi_1."'" ;          }else{$a .= ",''";}
				if(isset($comport_busq_taxi_2) && $comport_busq_taxi_2 != ''){                 $a .= ",'".$comport_busq_taxi_2."'" ;          }else{$a .= ",''";}
				if(isset($comport_espera) && $comport_espera != ''){                           $a .= ",'".$comport_espera."'" ;               }else{$a .= ",''";}
				

				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `clientes_tipos` (Nombre, imgLogo, email_principal, RazonSocial, Rut, Direccion, Fono, Ciudad, Comuna,
				background_color, btn_enlace_color_fondo, btn_enlace_ancho, btn_enlace_radio, btn_enlace_float, btn_enlace_color_texto, 
				btn_enlace_sombra, btn_enlace_border, btn_aceptar_color_fondo, btn_aceptar_ancho, btn_aceptar_radio, btn_aceptar_float, btn_aceptar_color_texto, 
				btn_aceptar_sombra, btn_aceptar_border, btn_cancelar_color_fondo, btn_cancelar_ancho, btn_cancelar_radio, btn_cancelar_float, btn_cancelar_color_texto, 
				btn_cancelar_sombra, btn_cancelar_border, btn_otros_color_fondo, btn_otros_ancho, btn_otros_radio, btn_otros_float, btn_otros_color_texto, btn_otros_sombra, 
				btn_otros_border, form_color, msg_error_color_body, msg_error_color_text, msg_error_width, msg_error_border, msg_error_border_color, msg_alert_color_body, 
				msg_alert_color_text, msg_alert_width, msg_alert_border, msg_alert_border_color, msg_success_color_body, msg_success_color_text, msg_success_width, 
				msg_success_border, msg_success_border_color, msg_info_color_body, msg_info_color_text, msg_info_width, msg_info_border, msg_info_border_color,
				usr_img_border, usr_img_border_radius, usr_img_shadow, usr_img_width, usr_name_lettersize, usr_name_lettercolor, usr_name_pat_lettersize, 
				usr_name_pat_lettercolor, usr_name_pat_lettersize_2, usr_name_pat_lettercolor_2, list_shadow, list_color_border, list_sep, list_width, list_alin, 
				list_deg, list_border, list_tittle_size, list_tittle_color, list_text_size, list_text_color, noti_tittle_color, noti_tittle_size, noti_width, 
				noti_border, noti_shadow, noti_aling, noti_color, noti_tab_color, noti_tab_hover, noti_tab_check, noti_tab_label, noti_tab_label_select, 
				noti_ul_color_new, noti_ul_color_tittle, noti_ul_color_text, noti_ul_size_new, noti_ul_size_tittle, noti_ul_size_text, noti_btn_acept_bgcolor, 
				noti_btn_acept_textcolor, noti_btn_acept_textsize, noti_btn_cancel_bgcolor, noti_btn_cancel_textcolor, noti_btn_cancel_textsize, title1_size, 
				title1_color, title2_size, title2_color, title3_size, title3_color, title4_size, title4_color, title5_size, title5_color, comport_register, 
				comport_recover, comport_autoactivate, comport_client, comport_alcance, comport_busq_taxi_1,comport_busq_taxi_2,comport_espera) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'update':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				$a = "idTipoCliente='".$idTipoCliente."'" ;
				if(isset($Nombre) && $Nombre != ''){                                         $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($imgLogo) && $imgLogo != ''){                                       $a .= ",imgLogo='".$imgLogo."'" ;}
				if(isset($email_principal) && $email_principal != ''){                       $a .= ",email_principal='".$email_principal."'" ;}
				if(isset($RazonSocial) && $RazonSocial != ''){                               $a .= ",RazonSocial='".$RazonSocial."'" ;}
				if(isset($Rut) && $Rut != ''){                                               $a .= ",Rut='".$Rut."'" ;}
				if(isset($Direccion) && $Direccion != ''){                                   $a .= ",Direccion='".$Direccion."'" ;}
				if(isset($Fono) && $Fono != ''){                                             $a .= ",Fono='".$Fono."'" ;}
				if(isset($Ciudad) && $Ciudad != ''){                                         $a .= ",Ciudad='".$Ciudad."'" ;}
				if(isset($Comuna) && $Comuna != ''){                                         $a .= ",Comuna='".$Comuna."'" ;}
				if(isset($background_color) && $background_color != ''){                     $a .= ",background_color='".$background_color."'" ;}
				if(isset($btn_enlace_color_fondo) && $btn_enlace_color_fondo != ''){         $a .= ",btn_enlace_color_fondo='".$btn_enlace_color_fondo."'" ;}
				if(isset($btn_enlace_ancho) && $btn_enlace_ancho != ''){                     $a .= ",btn_enlace_ancho='".$btn_enlace_ancho."'" ;}
				if(isset($btn_enlace_radio) && $btn_enlace_radio != ''){                     $a .= ",btn_enlace_radio='".$btn_enlace_radio."'" ;}
				if(isset($btn_enlace_float) && $btn_enlace_float != ''){                     $a .= ",btn_enlace_float='".$btn_enlace_float."'" ;}
				if(isset($btn_enlace_color_texto) && $btn_enlace_color_texto != ''){         $a .= ",btn_enlace_color_texto='".$btn_enlace_color_texto."'" ;}
				if(isset($btn_enlace_sombra) && $btn_enlace_sombra != ''){                   $a .= ",btn_enlace_sombra='".$btn_enlace_sombra."'" ;}
				if(isset($btn_enlace_border) && $btn_enlace_border != ''){                   $a .= ",btn_enlace_border='".$btn_enlace_border."'" ;}
				if(isset($btn_aceptar_color_fondo) && $btn_aceptar_color_fondo != ''){       $a .= ",btn_aceptar_color_fondo='".$btn_aceptar_color_fondo."'" ;}
				if(isset($btn_aceptar_ancho) && $btn_aceptar_ancho != ''){                   $a .= ",btn_aceptar_ancho='".$btn_aceptar_ancho."'" ;}
				if(isset($btn_aceptar_radio) && $btn_aceptar_radio != ''){                   $a .= ",btn_aceptar_radio='".$btn_aceptar_radio."'" ;}
				if(isset($btn_aceptar_float) && $btn_aceptar_float != ''){                   $a .= ",btn_aceptar_float='".$btn_aceptar_float."'" ;}
				if(isset($btn_aceptar_color_texto) && $btn_aceptar_color_texto != ''){       $a .= ",btn_aceptar_color_texto='".$btn_aceptar_color_texto."'" ;}
				if(isset($btn_aceptar_sombra) && $btn_aceptar_sombra != ''){                 $a .= ",btn_aceptar_sombra='".$btn_aceptar_sombra."'" ;}
				if(isset($btn_aceptar_border) && $btn_aceptar_border != ''){                 $a .= ",btn_aceptar_border='".$btn_aceptar_border."'" ;}
				if(isset($btn_cancelar_color_fondo) && $btn_cancelar_color_fondo != ''){     $a .= ",btn_cancelar_color_fondo='".$btn_cancelar_color_fondo."'" ;}
				if(isset($btn_cancelar_ancho) && $btn_cancelar_ancho != ''){                 $a .= ",btn_cancelar_ancho='".$btn_cancelar_ancho."'" ;}
				if(isset($btn_cancelar_radio) && $btn_cancelar_radio!= ''){                  $a .= ",btn_cancelar_radio='".$btn_cancelar_radio."'" ;}
				if(isset($btn_cancelar_float) && $btn_cancelar_float!= ''){                  $a .= ",btn_cancelar_float='".$btn_cancelar_float."'" ;}
				if(isset($btn_cancelar_color_texto) && $btn_cancelar_color_texto!= ''){      $a .= ",btn_cancelar_color_texto='".$btn_cancelar_color_texto."'" ;}
				if(isset($btn_cancelar_sombra) && $btn_cancelar_sombra!= ''){                $a .= ",btn_cancelar_sombra='".$btn_cancelar_sombra."'" ;}
				if(isset($btn_cancelar_border) && $btn_cancelar_border!= ''){                $a .= ",btn_cancelar_border='".$btn_cancelar_border."'" ;}
				if(isset($btn_otros_color_fondo) && $btn_otros_color_fondo!= ''){            $a .= ",btn_otros_color_fondo='".$btn_otros_color_fondo."'" ;}
				if(isset($btn_otros_ancho) && $btn_otros_ancho!= ''){                        $a .= ",btn_otros_ancho='".$btn_otros_ancho."'" ;}
				if(isset($btn_otros_radio) && $btn_otros_radio!= ''){                        $a .= ",btn_otros_radio='".$btn_otros_radio."'" ;}
				if(isset($btn_otros_float) && $btn_otros_float!= ''){                        $a .= ",btn_otros_float='".$btn_otros_float."'" ;}
				if(isset($btn_otros_color_texto) && $btn_otros_color_texto!= ''){            $a .= ",btn_otros_color_texto='".$btn_otros_color_texto."'" ;}
				if(isset($btn_otros_sombra) && $btn_otros_sombra!= ''){                      $a .= ",btn_otros_sombra='".$btn_otros_sombra."'" ;}
				if(isset($btn_otros_border) && $btn_otros_border!= ''){                      $a .= ",btn_otros_border='".$btn_otros_border."'" ;}
				if(isset($form_color) && $form_color!= ''){                                  $a .= ",form_color='".$form_color."'" ;}
				if(isset($msg_error_color_body) && $msg_error_color_body!= ''){              $a .= ",msg_error_color_body='".$msg_error_color_body."'" ;}
				if(isset($msg_error_color_text) && $msg_error_color_text!= ''){              $a .= ",msg_error_color_text='".$msg_error_color_text."'" ;}
				if(isset($msg_error_width) && $msg_error_width!= ''){                        $a .= ",msg_error_width='".$msg_error_width."'" ;}
				if(isset($msg_error_border) && $msg_error_border!= ''){                      $a .= ",msg_error_border='".$msg_error_border."'" ;}
				if(isset($msg_error_border_color) && $msg_error_border_color!= ''){          $a .= ",msg_error_border_color='".$msg_error_border_color."'" ;}
				if(isset($msg_alert_color_body) && $msg_alert_color_body!= ''){              $a .= ",msg_alert_color_body='".$msg_alert_color_body."'" ;}
				if(isset($msg_alert_color_text) && $msg_alert_color_text!= ''){              $a .= ",msg_alert_color_text='".$msg_alert_color_text."'" ;}
				if(isset($msg_alert_width) && $msg_alert_width!= ''){                        $a .= ",msg_alert_width='".$msg_alert_width."'" ;}
				if(isset($msg_alert_border) && $msg_alert_border!= ''){                      $a .= ",msg_alert_border='".$msg_alert_border."'" ;}
				if(isset($msg_alert_border_color) && $msg_alert_border_color!= ''){          $a .= ",msg_alert_border_color='".$msg_alert_border_color."'" ;}
				if(isset($msg_success_color_body) && $msg_success_color_body!= ''){          $a .= ",msg_success_color_body='".$msg_success_color_body."'" ;}
				if(isset($msg_success_color_text) && $msg_success_color_text!= ''){          $a .= ",msg_success_color_text='".$msg_success_color_text."'" ;}
				if(isset($msg_success_width) && $msg_success_width!= ''){                    $a .= ",msg_success_width='".$msg_success_width."'" ;}
				if(isset($msg_success_border) && $msg_success_border!= ''){                  $a .= ",msg_success_border='".$msg_success_border."'" ;}
				if(isset($msg_success_border_color) && $msg_success_border_color!= ''){      $a .= ",msg_success_border_color='".$msg_success_border_color."'" ;}
				if(isset($msg_info_color_body) && $msg_info_color_body!= ''){                $a .= ",msg_info_color_body='".$msg_info_color_body."'" ;}
				if(isset($msg_info_color_text) && $msg_info_color_text!= ''){                $a .= ",msg_info_color_text='".$msg_info_color_text."'" ;}
				if(isset($msg_info_width) && $msg_info_width!= ''){                          $a .= ",msg_info_width='".$msg_info_width."'" ;}
				if(isset($msg_info_border) && $msg_info_border!= ''){                        $a .= ",msg_info_border='".$msg_info_border."'" ;}
				if(isset($msg_info_border_color) && $msg_info_border_color!= ''){            $a .= ",msg_info_border_color='".$msg_info_border_color."'" ;}
				if(isset($usr_img_border) && $usr_img_border!= ''){                          $a .= ",usr_img_border='".$usr_img_border."'" ;}
				if(isset($usr_img_border_radius) && $usr_img_border_radius!= ''){            $a .= ",usr_img_border_radius='".$usr_img_border_radius."'" ;}
				if(isset($usr_img_shadow) && $usr_img_shadow!= ''){                          $a .= ",usr_img_shadow='".$usr_img_shadow."'" ;}
				if(isset($usr_img_width) && $usr_img_width!= ''){                            $a .= ",usr_img_width='".$usr_img_width."'" ;}
				if(isset($usr_name_lettersize) && $usr_name_lettersize!= ''){                $a .= ",usr_name_lettersize='".$usr_name_lettersize."'" ;}
				if(isset($usr_name_lettercolor) && $usr_name_lettercolor!= ''){              $a .= ",usr_name_lettercolor='".$usr_name_lettercolor."'" ;}
				if(isset($usr_name_pat_lettersize) && $usr_name_pat_lettersize!= ''){        $a .= ",usr_name_pat_lettersize='".$usr_name_pat_lettersize."'" ;}
				if(isset($usr_name_pat_lettercolor) && $usr_name_pat_lettercolor!= ''){      $a .= ",usr_name_pat_lettercolor='".$usr_name_pat_lettercolor."'" ;}
				if(isset($usr_name_pat_lettersize_2) && $usr_name_pat_lettersize_2!= ''){    $a .= ",usr_name_pat_lettersize_2='".$usr_name_pat_lettersize_2."'" ;}
				if(isset($usr_name_pat_lettercolor_2) && $usr_name_pat_lettercolor_2!= ''){  $a .= ",usr_name_pat_lettercolor_2='".$usr_name_pat_lettercolor_2."'" ;}
				if(isset($list_shadow) && $list_shadow!= ''){                                $a .= ",list_shadow='".$list_shadow."'" ;}
				if(isset($list_color_border) && $list_color_border!= ''){                    $a .= ",list_color_border='".$list_color_border."'" ;}
				if(isset($list_sep) && $list_sep!= ''){                                      $a .= ",list_sep='".$list_sep."'" ;}
				if(isset($list_width) && $list_width!= ''){                                  $a .= ",list_width='".$list_width."'" ;}
				if(isset($list_alin) && $list_alin!= ''){                                    $a .= ",list_alin='".$list_alin."'" ;}
				if(isset($list_deg) && $list_deg!= ''){                                      $a .= ",list_deg='".$list_deg."'" ;}
				if(isset($list_border) && $list_border!= ''){                                $a .= ",list_border='".$list_border."'" ;}
				if(isset($list_tittle_size) && $list_tittle_size!= ''){                      $a .= ",list_tittle_size='".$list_tittle_size."'" ;}
				if(isset($list_tittle_color) && $list_tittle_color!= ''){                    $a .= ",list_tittle_color='".$list_tittle_color."'" ;}
				if(isset($list_text_size) && $list_text_size!= ''){                          $a .= ",list_text_size='".$list_text_size."'" ;}
				if(isset($list_text_color) && $list_text_color!= ''){                        $a .= ",list_text_color='".$list_text_color."'" ;}
				if(isset($noti_tittle_color) && $noti_tittle_color!= ''){                    $a .= ",noti_tittle_color='".$noti_tittle_color."'" ;}
				if(isset($noti_tittle_size) && $noti_tittle_size!= ''){                      $a .= ",noti_tittle_size='".$noti_tittle_size."'" ;}
				if(isset($noti_width) && $noti_width!= ''){                                  $a .= ",noti_width='".$noti_width."'" ;}
				if(isset($noti_border) && $noti_border!= ''){                                $a .= ",noti_border='".$noti_border."'" ;}
				if(isset($noti_shadow) && $noti_shadow!= ''){                                $a .= ",noti_shadow='".$noti_shadow."'" ;}
				if(isset($noti_aling) && $noti_aling!= ''){                                  $a .= ",noti_aling='".$noti_aling."'" ;}
				if(isset($noti_color) && $noti_color!= ''){                                  $a .= ",noti_color='".$noti_color."'" ;}
				if(isset($noti_tab_color) && $noti_tab_color!= ''){                          $a .= ",noti_tab_color='".$noti_tab_color."'" ;}
				if(isset($noti_tab_hover) && $noti_tab_hover!= ''){                          $a .= ",noti_tab_hover='".$noti_tab_hover."'" ;}
				if(isset($noti_tab_check) && $noti_tab_check!= ''){                          $a .= ",noti_tab_check='".$noti_tab_check."'" ;}
				if(isset($noti_tab_label) && $noti_tab_label!= ''){                          $a .= ",noti_tab_label='".$noti_tab_label."'" ;}
				if(isset($noti_tab_label_select) && $noti_tab_label_select!= ''){            $a .= ",noti_tab_label_select='".$noti_tab_label_select."'" ;}
				if(isset($noti_ul_color_new) && $noti_ul_color_new!= ''){                    $a .= ",noti_ul_color_new='".$noti_ul_color_new."'" ;}
				if(isset($noti_ul_color_tittle) && $noti_ul_color_tittle!= ''){              $a .= ",noti_ul_color_tittle='".$noti_ul_color_tittle."'" ;}
				if(isset($noti_ul_color_text) && $noti_ul_color_text!= ''){                  $a .= ",noti_ul_color_text='".$noti_ul_color_text."'" ;}
				if(isset($noti_ul_size_new) && $noti_ul_size_new!= ''){                      $a .= ",noti_ul_size_new='".$noti_ul_size_new."'" ;}
				if(isset($noti_ul_size_tittle) && $noti_ul_size_tittle!= ''){                $a .= ",noti_ul_size_tittle='".$noti_ul_size_tittle."'" ;}
				if(isset($noti_ul_size_text) && $noti_ul_size_text!= ''){                    $a .= ",noti_ul_size_text='".$noti_ul_size_text."'" ;}
				if(isset($noti_btn_acept_bgcolor) && $noti_btn_acept_bgcolor!= ''){          $a .= ",noti_btn_acept_bgcolor='".$noti_btn_acept_bgcolor."'" ;}
				if(isset($noti_btn_acept_textcolor) && $noti_btn_acept_textcolor!= ''){      $a .= ",noti_btn_acept_textcolor='".$noti_btn_acept_textcolor."'" ;}
				if(isset($noti_btn_acept_textsize) && $noti_btn_acept_textsize!= ''){        $a .= ",noti_btn_acept_textsize='".$noti_btn_acept_textsize."'" ;}
				if(isset($noti_btn_cancel_bgcolor) && $noti_btn_cancel_bgcolor!= ''){        $a .= ",noti_btn_cancel_bgcolor='".$noti_btn_cancel_bgcolor."'" ;}
				if(isset($noti_btn_cancel_textcolor) && $noti_btn_cancel_textcolor!= ''){    $a .= ",noti_btn_cancel_textcolor='".$noti_btn_cancel_textcolor."'" ;}
				if(isset($noti_btn_cancel_textsize) && $noti_btn_cancel_textsize!= ''){      $a .= ",noti_btn_cancel_textsize='".$noti_btn_cancel_textsize."'" ;}
				if(isset($title1_size) && $title1_size!= ''){                                $a .= ",title1_size='".$title1_size."'" ;}
				if(isset($title1_color) && $title1_color!= ''){                              $a .= ",title1_color='".$title1_color."'" ;}
				if(isset($title2_size) && $title2_size!= ''){                                $a .= ",title2_size='".$title2_size."'" ;}
				if(isset($title2_color) && $title2_color!= ''){                              $a .= ",title2_color='".$title2_color."'" ;}
				if(isset($title3_size) && $title3_size!= ''){                                $a .= ",title3_size='".$title3_size."'" ;}
				if(isset($title3_color) && $title3_color!= ''){                              $a .= ",title3_color='".$title3_color."'" ;}
				if(isset($title4_size) && $title4_size!= ''){                                $a .= ",title4_size='".$title4_size."'" ;}
				if(isset($title4_color) && $title4_color!= ''){                              $a .= ",title4_color='".$title4_color."'" ;}
				if(isset($title5_size) && $title5_size!= ''){                                $a .= ",title5_size='".$title5_size."'" ;}
				if(isset($title5_color) && $title5_color!= ''){                              $a .= ",title5_color='".$title5_color."'" ;}
				if(isset($comport_register) && $comport_register!= ''){                      $a .= ",comport_register='".$comport_register."'" ;}
				if(isset($comport_recover) && $comport_recover!= ''){                        $a .= ",comport_recover='".$comport_recover."'" ;}
				if(isset($comport_autoactivate) && $comport_autoactivate!= ''){              $a .= ",comport_autoactivate='".$comport_autoactivate."'" ;}
				if(isset($comport_client) && $comport_client!= ''){                          $a .= ",comport_client='".$comport_client."'" ;}
				if(isset($comport_alcance) && $comport_alcance!= ''){                        $a .= ",comport_alcance='".$comport_alcance."'" ;}
				if(isset($comport_busq_taxi_1) && $comport_busq_taxi_1!= ''){                $a .= ",comport_busq_taxi_1='".$comport_busq_taxi_1."'" ;}
				if(isset($comport_busq_taxi_2) && $comport_busq_taxi_2!= ''){                $a .= ",comport_busq_taxi_2='".$comport_busq_taxi_2."'" ;}
				if(isset($comport_espera) && $comport_espera!= ''){                          $a .= ",comport_espera='".$comport_espera."'" ;}

				// inserto los datos de registro en la db
				$query  = "UPDATE `clientes_tipos` SET ".$a." WHERE idTipoCliente = '$idTipoCliente'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	

						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `clientes_tipos` WHERE idTipoCliente = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
					
/*******************************************************************************************************************/
	}
?>