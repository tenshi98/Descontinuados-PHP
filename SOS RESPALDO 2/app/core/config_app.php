<?php
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
} 
/**********************************************************************************************************************************/
/*                                       Se cargan las variables URL para reutilizarlas                                           */
/**********************************************************************************************************************************/
// Se traen todos los datos 
$query = "SELECT 
background_color, 

form_color,

btn_enlace_color_fondo, 
btn_enlace_ancho, 
btn_enlace_radio, 
btn_enlace_float,
btn_enlace_color_texto,
btn_enlace_sombra,
btn_enlace_border,

btn_aceptar_color_fondo,
btn_aceptar_ancho,
btn_aceptar_radio,
btn_aceptar_float,
btn_aceptar_color_texto,
btn_aceptar_sombra,
btn_aceptar_border,

btn_cancelar_color_fondo,
btn_cancelar_ancho,
btn_cancelar_radio,
btn_cancelar_float,
btn_cancelar_color_texto,
btn_cancelar_sombra,
btn_cancelar_border,

btn_otros_color_fondo,
btn_otros_ancho,
btn_otros_radio,
btn_otros_float,
btn_otros_color_texto,
btn_otros_sombra,
btn_otros_border,

msg_error_color_body,
msg_error_color_text,
msg_error_width,
msg_error_border,
msg_error_border_color,

msg_alert_color_body,
msg_alert_color_text,
msg_alert_width,
msg_alert_border,
msg_alert_border_color,

msg_success_color_body,
msg_success_color_text,
msg_success_width,
msg_success_border,
msg_success_border_color,

msg_info_color_body,
msg_info_color_text,
msg_info_width,
msg_info_border,
msg_info_border_color,

usr_img_border, 
usr_img_border_radius, 
usr_img_shadow, 
usr_img_width,
usr_name_lettersize,
usr_name_lettercolor,
usr_name_pat_lettersize,
usr_name_pat_lettercolor,
usr_name_pat_lettersize_2,
usr_name_pat_lettercolor_2,

list_shadow,
list_color_border,
list_sep,
list_width,
list_alin,
list_deg,
list_border,
list_tittle_size,
list_tittle_color,
list_text_size,
list_text_color,

noti_tittle_color,
noti_tittle_size,
noti_width,
noti_border,
noti_shadow,
noti_aling,
noti_color,
noti_tab_color,
noti_tab_hover,
noti_tab_check,
noti_tab_label,
noti_tab_label_select,
noti_ul_color_new,
noti_ul_color_tittle,
noti_ul_color_text,
noti_ul_size_new,
noti_ul_size_tittle,
noti_ul_size_text,
noti_btn_acept_bgcolor,
noti_btn_acept_textcolor,
noti_btn_acept_textsize,
noti_btn_cancel_bgcolor,
noti_btn_cancel_textcolor,
noti_btn_cancel_textsize,

title1_size,
title1_color,
title2_size,
title2_color,
title3_size,
title3_color,
title4_size,
title4_color,
title5_size,
title5_color,

comport_register,
comport_recover,
comport_autoactivate,
comport_client,
comport_busq_taxi_1,
comport_busq_taxi_2,
comport_espera



FROM `app_ajustes_generales`
WHERE id = {$_GET['app_conf']}";
$resultado = mysql_query ($query, $dbConn);
$config_app = mysql_fetch_assoc ($resultado);
?>