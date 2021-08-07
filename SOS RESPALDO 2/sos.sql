/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : sos

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2015-01-12 10:37:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for alertas_avistadas
-- ----------------------------
DROP TABLE IF EXISTS `alertas_avistadas`;
CREATE TABLE `alertas_avistadas` (
  `idVista` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idRobo` bigint(20) unsigned NOT NULL,
  `idCliente` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Longitud` double NOT NULL,
  `Latitud` double NOT NULL,
  `Gsm` varchar(500) NOT NULL,
  `vista` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`idVista`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alertas_avistadas
-- ----------------------------

-- ----------------------------
-- Table structure for alertas_listado
-- ----------------------------
DROP TABLE IF EXISTS `alertas_listado`;
CREATE TABLE `alertas_listado` (
  `idAlerta` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `idTipoAlerta` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Longitud` double NOT NULL,
  `Latitud` double NOT NULL,
  `Gsm` varchar(250) NOT NULL,
  `desplegar` tinyint(1) unsigned NOT NULL,
  `vista` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`idAlerta`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alertas_listado
-- ----------------------------

-- ----------------------------
-- Table structure for alertas_tipos
-- ----------------------------
DROP TABLE IF EXISTS `alertas_tipos`;
CREATE TABLE `alertas_tipos` (
  `idTipoAlerta` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idTipoBoton` int(11) unsigned NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `Mensaje` varchar(120) NOT NULL,
  `img` varchar(230) NOT NULL,
  PRIMARY KEY (`idTipoAlerta`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alertas_tipos
-- ----------------------------
INSERT INTO `alertas_tipos` VALUES ('2', '1', 'Solicitud de ayuda', 'ha informado la solicitud de ayuda', 'map_accidente.png');
INSERT INTO `alertas_tipos` VALUES ('3', '1', 'Accidente', 'ha informado un accidente cerca', 'map_accidente.png');
INSERT INTO `alertas_tipos` VALUES ('4', '1', 'Calle Cerrada', 'ha informado de una calle cerrada', 'map_peligro.png');
INSERT INTO `alertas_tipos` VALUES ('5', '1', 'Peligro', 'ha informado de peligro', 'map_accidente.png');
INSERT INTO `alertas_tipos` VALUES ('6', '1', 'Persona sospechosa', 'ha informado de una persona sospechosa', 'map_accidente.png');
INSERT INTO `alertas_tipos` VALUES ('7', '2', 'Robo Vehiculo', 'ha informado del robo de su vehiculo', 'map_accidente.png');
INSERT INTO `alertas_tipos` VALUES ('10', '10', 'Solicitud Taxi', 'ha solicitado un Taxi', 'map_accidente.png');
INSERT INTO `alertas_tipos` VALUES ('11', '11', 'Recepcion Llamada Taxi', 'ha aceptado la solicitud', 'map_accidente.png');
INSERT INTO `alertas_tipos` VALUES ('12', '1', 'Incendio', 'ha reportado un incendio', 'map_accidente.png');

-- ----------------------------
-- Table structure for app_ajustes_generales
-- ----------------------------
DROP TABLE IF EXISTS `app_ajustes_generales`;
CREATE TABLE `app_ajustes_generales` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `background_color` varchar(30) NOT NULL,
  `btn_enlace_color_fondo` varchar(30) NOT NULL,
  `btn_enlace_ancho` varchar(30) NOT NULL,
  `btn_enlace_radio` varchar(30) NOT NULL,
  `btn_enlace_float` varchar(30) NOT NULL,
  `btn_enlace_color_texto` varchar(30) NOT NULL,
  `btn_enlace_sombra` varchar(30) NOT NULL,
  `btn_enlace_border` varchar(30) NOT NULL,
  `btn_aceptar_color_fondo` varchar(30) NOT NULL,
  `btn_aceptar_ancho` varchar(30) NOT NULL,
  `btn_aceptar_radio` varchar(30) NOT NULL,
  `btn_aceptar_float` varchar(30) NOT NULL,
  `btn_aceptar_color_texto` varchar(30) NOT NULL,
  `btn_aceptar_sombra` varchar(30) NOT NULL,
  `btn_aceptar_border` varchar(30) NOT NULL,
  `btn_cancelar_color_fondo` varchar(30) NOT NULL,
  `btn_cancelar_ancho` varchar(30) NOT NULL,
  `btn_cancelar_radio` varchar(30) NOT NULL,
  `btn_cancelar_float` varchar(30) NOT NULL,
  `btn_cancelar_color_texto` varchar(30) NOT NULL,
  `btn_cancelar_sombra` varchar(30) NOT NULL,
  `btn_cancelar_border` varchar(30) NOT NULL,
  `btn_otros_color_fondo` varchar(30) NOT NULL,
  `btn_otros_ancho` varchar(30) NOT NULL,
  `btn_otros_radio` varchar(30) NOT NULL,
  `btn_otros_float` varchar(30) NOT NULL,
  `btn_otros_color_texto` varchar(30) NOT NULL,
  `btn_otros_sombra` varchar(30) NOT NULL,
  `btn_otros_border` varchar(30) NOT NULL,
  `form_color` varchar(30) NOT NULL,
  `msg_error_color_body` varchar(30) NOT NULL,
  `msg_error_color_text` varchar(30) NOT NULL,
  `msg_error_width` varchar(30) NOT NULL,
  `msg_error_border` varchar(30) NOT NULL,
  `msg_error_border_color` varchar(30) NOT NULL,
  `msg_alert_color_body` varchar(30) NOT NULL,
  `msg_alert_color_text` varchar(30) NOT NULL,
  `msg_alert_width` varchar(30) NOT NULL,
  `msg_alert_border` varchar(30) NOT NULL,
  `msg_alert_border_color` varchar(30) NOT NULL,
  `msg_success_color_body` varchar(30) NOT NULL,
  `msg_success_color_text` varchar(30) NOT NULL,
  `msg_success_width` varchar(30) NOT NULL,
  `msg_success_border` varchar(30) NOT NULL,
  `msg_success_border_color` varchar(30) NOT NULL,
  `msg_info_color_body` varchar(30) NOT NULL,
  `msg_info_color_text` varchar(30) NOT NULL,
  `msg_info_width` varchar(30) NOT NULL,
  `msg_info_border` varchar(30) NOT NULL,
  `msg_info_border_color` varchar(30) NOT NULL,
  `usr_img_border` varchar(30) NOT NULL,
  `usr_img_border_radius` varchar(30) NOT NULL,
  `usr_img_shadow` varchar(30) NOT NULL,
  `usr_img_width` varchar(30) NOT NULL,
  `usr_name_lettersize` varchar(30) NOT NULL,
  `usr_name_lettercolor` varchar(30) NOT NULL,
  `usr_name_pat_lettersize` varchar(30) NOT NULL,
  `usr_name_pat_lettercolor` varchar(30) NOT NULL,
  `usr_name_pat_lettersize_2` varchar(30) NOT NULL,
  `usr_name_pat_lettercolor_2` varchar(30) NOT NULL,
  `list_shadow` varchar(30) NOT NULL,
  `list_color_border` varchar(30) NOT NULL,
  `list_sep` varchar(30) NOT NULL,
  `list_width` varchar(30) NOT NULL,
  `list_alin` varchar(30) NOT NULL,
  `list_deg` varchar(30) NOT NULL,
  `list_border` varchar(30) NOT NULL,
  `list_tittle_size` varchar(30) NOT NULL,
  `list_tittle_color` varchar(30) NOT NULL,
  `list_text_size` varchar(30) NOT NULL,
  `list_text_color` varchar(30) NOT NULL,
  `noti_tittle_color` varchar(30) NOT NULL,
  `noti_tittle_size` varchar(30) NOT NULL,
  `noti_width` varchar(30) NOT NULL,
  `noti_border` varchar(30) NOT NULL,
  `noti_shadow` varchar(30) NOT NULL,
  `noti_aling` varchar(30) NOT NULL,
  `noti_color` varchar(30) NOT NULL,
  `noti_tab_color` varchar(30) NOT NULL,
  `noti_tab_hover` varchar(30) NOT NULL,
  `noti_tab_check` varchar(30) NOT NULL,
  `noti_tab_label` varchar(30) NOT NULL,
  `noti_tab_label_select` varchar(30) NOT NULL,
  `noti_ul_color_new` varchar(30) NOT NULL,
  `noti_ul_color_tittle` varchar(30) NOT NULL,
  `noti_ul_color_text` varchar(30) NOT NULL,
  `noti_ul_size_new` varchar(30) NOT NULL,
  `noti_ul_size_tittle` varchar(30) NOT NULL,
  `noti_ul_size_text` varchar(30) NOT NULL,
  `noti_btn_acept_bgcolor` varchar(30) NOT NULL,
  `noti_btn_acept_textcolor` varchar(30) NOT NULL,
  `noti_btn_acept_textsize` varchar(30) NOT NULL,
  `noti_btn_cancel_bgcolor` varchar(30) NOT NULL,
  `noti_btn_cancel_textcolor` varchar(30) NOT NULL,
  `noti_btn_cancel_textsize` varchar(30) NOT NULL,
  `title1_size` varchar(30) NOT NULL,
  `title1_color` varchar(30) NOT NULL,
  `title2_size` varchar(30) NOT NULL,
  `title2_color` varchar(30) NOT NULL,
  `title3_size` varchar(30) NOT NULL,
  `title3_color` varchar(30) NOT NULL,
  `title4_size` varchar(30) NOT NULL,
  `title4_color` varchar(30) NOT NULL,
  `title5_size` varchar(30) NOT NULL,
  `title5_color` varchar(30) NOT NULL,
  `comport_register` tinyint(1) unsigned NOT NULL,
  `comport_recover` tinyint(1) unsigned NOT NULL,
  `comport_autoactivate` tinyint(1) unsigned NOT NULL,
  `comport_client` tinyint(1) unsigned NOT NULL,
  `comport_alcance` tinyint(2) unsigned NOT NULL,
  `comport_busq_taxi_1` tinyint(2) unsigned NOT NULL,
  `comport_busq_taxi_2` tinyint(2) unsigned NOT NULL,
  `comport_espera` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of app_ajustes_generales
-- ----------------------------
INSERT INTO `app_ajustes_generales` VALUES ('1', 'background_color_06', 'background_color_34', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_box_02', 'cover_img_03', 'background_color_88', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_externa_2', '', 'background_color_89', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_externa_2', '', 'background_color_92', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_externa_2', '', 'form_color_4', 'background_color_29', 'link_text_color3', 'width75', 'border_radius5', 'cover_img_07', 'background_color_28', 'link_text_color5', 'width75', 'border_radius5', 'cover_img_08', 'background_color_23', 'link_text_color6', 'width75', 'border_radius5', 'cover_img_06', 'background_color_16', 'link_text_color4', 'width75', 'border_radius5', 'cover_img_04', 'cover_img_01', 'border_radius50p', 'sombra_externa_1', 'width40', 'letter_size_17', 'link_text_color4', 'letter_size_12', 'link_text_color3', 'letter_size_04', 'link_text_color2', 'sombra_box_02', 'cover_img_15', 'border_separator_1', 'width95', 'fcenter', 'tb_deg_1', 'border_radius05p', 'letter_size_05', 'link_text_color3', 'letter_size_04', 'link_text_color2', 'link_text_color2', 'letter_size_07', 'width100', 'cover_img_03', 'sombra_box_02', 'fcenter', 'background_color_06', 'background_color_01', 'noti_hover04', 'noti_checked06', 'tabscolorbase1', 'tabscolorchecked4', 'link_text_color4', 'link_text_color5', 'link_text_color2', 'letter_size_07', 'letter_size_06', 'letter_size_04', 'background_color_35', 'link_text_color1', 'letter_size_04', 'background_color_36', 'link_text_color1', 'letter_size_04', 'letter_size_18', 'link_text_color4', 'letter_size_08', 'link_text_color2', 'letter_size_06', 'link_text_color2', 'letter_size_06', 'link_text_color4', 'letter_size_06', 'link_text_color2', '1', '1', '1', '1', '5', '1', '2', '2');
INSERT INTO `app_ajustes_generales` VALUES ('2', 'background_color_06', 'background_color_34', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_box_30', 'cover_img_05', 'background_color_33', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_box_30', 'cover_img_05', 'background_color_53', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_box_30', 'cover_img_07', 'background_color_35', 'width90', 'border_radius05p', 'fcenter', 'link_text_color1', 'sombra_box_30', 'cover_img_20', 'form_color_8', 'background_color_91', 'link_text_color3', 'width70', 'border_radius5', 'cover_img_07', 'background_color_93', 'link_text_color5', 'width70', 'border_radius5', 'cover_img_08', 'background_color_28', 'link_text_color6', 'width70', 'border_radius5', 'cover_img_21', 'background_color_10', 'link_text_color4', 'width70', 'border_radius5', 'cover_img_34', 'cover_img_01', 'border_radius50p', 'sombra_box_29', 'width50', 'letter_size_10', 'link_text_color4', 'letter_size_07', 'link_text_color2', 'letter_size_04', 'link_text_color2', 'sombra_box_02', 'cover_img_04', '', 'width95', 'fcenter', 'tb_deg_1', '', 'letter_size_06', 'link_text_color4', 'letter_size_02', 'link_text_color2', 'link_text_color4', 'letter_size_06', 'width100', '', '', '', 'background_color_06', 'background_color_01', 'noti_hover04', 'noti_checked06', 'tabscolorbase1', 'tabscolorchecked4', 'link_text_color3', 'link_text_color4', 'link_text_color2', 'letter_size_06', 'letter_size_06', 'letter_size_02', 'background_color_01', 'link_text_color1', 'letter_size_04', 'background_color_36', 'link_text_color1', 'letter_size_04', 'letter_size_11', 'link_text_color4', 'letter_size_08', 'link_text_color4', 'letter_size_05', 'link_text_color2', 'letter_size_03', 'link_text_color2', 'letter_size_02', 'link_text_color2', '0', '0', '0', '0', '5', '1', '2', '2');
INSERT INTO `app_ajustes_generales` VALUES ('3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `app_ajustes_generales` VALUES ('4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `app_ajustes_generales` VALUES ('5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `app_ajustes_generales` VALUES ('6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `app_ajustes_generales` VALUES ('7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `app_ajustes_generales` VALUES ('8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `app_ajustes_generales` VALUES ('9', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `app_ajustes_generales` VALUES ('10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `app_ajustes_generales` VALUES ('11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for app_ajustes_tipo
-- ----------------------------
DROP TABLE IF EXISTS `app_ajustes_tipo`;
CREATE TABLE `app_ajustes_tipo` (
  `idApp` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idGrupo` tinyint(2) unsigned NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Codigo` varchar(30) NOT NULL,
  PRIMARY KEY (`idApp`)
) ENGINE=MyISAM AUTO_INCREMENT=601 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of app_ajustes_tipo
-- ----------------------------
INSERT INTO `app_ajustes_tipo` VALUES ('1', '22', 'Alto del 005%', 'height5');
INSERT INTO `app_ajustes_tipo` VALUES ('2', '22', 'Alto del 010%', 'height10');
INSERT INTO `app_ajustes_tipo` VALUES ('3', '22', 'Alto del 015%', 'height15');
INSERT INTO `app_ajustes_tipo` VALUES ('4', '22', 'Alto del 020%', 'height20');
INSERT INTO `app_ajustes_tipo` VALUES ('5', '22', 'Alto del 025%', 'height25');
INSERT INTO `app_ajustes_tipo` VALUES ('6', '22', 'Alto del 030%', 'height30');
INSERT INTO `app_ajustes_tipo` VALUES ('7', '22', 'Alto del 035%', 'height35');
INSERT INTO `app_ajustes_tipo` VALUES ('8', '22', 'Alto del 040%', 'height40');
INSERT INTO `app_ajustes_tipo` VALUES ('9', '22', 'Alto del 045%', 'height45');
INSERT INTO `app_ajustes_tipo` VALUES ('10', '22', 'Alto del 050%', 'height50');
INSERT INTO `app_ajustes_tipo` VALUES ('11', '22', 'Alto del 055%', 'height55');
INSERT INTO `app_ajustes_tipo` VALUES ('12', '22', 'Alto del 060%', 'height60');
INSERT INTO `app_ajustes_tipo` VALUES ('13', '22', 'Alto del 065%', 'height65');
INSERT INTO `app_ajustes_tipo` VALUES ('14', '22', 'Alto del 070%', 'height70');
INSERT INTO `app_ajustes_tipo` VALUES ('15', '22', 'Alto del 075%', 'height75');
INSERT INTO `app_ajustes_tipo` VALUES ('16', '22', 'Alto del 080%', 'height80');
INSERT INTO `app_ajustes_tipo` VALUES ('17', '22', 'Alto del 085%', 'height85');
INSERT INTO `app_ajustes_tipo` VALUES ('18', '22', 'Alto del 090%', 'height90');
INSERT INTO `app_ajustes_tipo` VALUES ('19', '22', 'Alto del 095%', 'height95');
INSERT INTO `app_ajustes_tipo` VALUES ('20', '22', 'Alto del 100%', 'height100');
INSERT INTO `app_ajustes_tipo` VALUES ('21', '23', 'Ancho del 005%', 'width5');
INSERT INTO `app_ajustes_tipo` VALUES ('22', '23', 'Ancho del 010%', 'width10');
INSERT INTO `app_ajustes_tipo` VALUES ('23', '23', 'Ancho del 015%', 'width15');
INSERT INTO `app_ajustes_tipo` VALUES ('24', '23', 'Ancho del 020%', 'width20');
INSERT INTO `app_ajustes_tipo` VALUES ('25', '23', 'Ancho del 025%', 'width25');
INSERT INTO `app_ajustes_tipo` VALUES ('26', '23', 'Ancho del 030%', 'width30');
INSERT INTO `app_ajustes_tipo` VALUES ('27', '23', 'Ancho del 035%', 'width35');
INSERT INTO `app_ajustes_tipo` VALUES ('28', '23', 'Ancho del 040%', 'width40');
INSERT INTO `app_ajustes_tipo` VALUES ('29', '23', 'Ancho del 045%', 'width45');
INSERT INTO `app_ajustes_tipo` VALUES ('30', '23', 'Ancho del 050%', 'width50');
INSERT INTO `app_ajustes_tipo` VALUES ('31', '23', 'Ancho del 055%', 'width55');
INSERT INTO `app_ajustes_tipo` VALUES ('32', '23', 'Ancho del 060%', 'width60');
INSERT INTO `app_ajustes_tipo` VALUES ('33', '23', 'Ancho del 065%', 'width65');
INSERT INTO `app_ajustes_tipo` VALUES ('34', '23', 'Ancho del 070%', 'width70');
INSERT INTO `app_ajustes_tipo` VALUES ('35', '23', 'Ancho del 075%', 'width75');
INSERT INTO `app_ajustes_tipo` VALUES ('36', '23', 'Ancho del 080%', 'width80');
INSERT INTO `app_ajustes_tipo` VALUES ('37', '23', 'Ancho del 085%', 'width85');
INSERT INTO `app_ajustes_tipo` VALUES ('38', '23', 'Ancho del 090%', 'width90');
INSERT INTO `app_ajustes_tipo` VALUES ('39', '23', 'Ancho del 095%', 'width95');
INSERT INTO `app_ajustes_tipo` VALUES ('40', '23', 'Ancho del 100%', 'width100');
INSERT INTO `app_ajustes_tipo` VALUES ('41', '24', 'Imagen al 100%', 'center_img_1');
INSERT INTO `app_ajustes_tipo` VALUES ('42', '24', 'Imagen al 90%', 'center_img_2');
INSERT INTO `app_ajustes_tipo` VALUES ('43', '24', 'Imagen al 80%', 'center_img_3');
INSERT INTO `app_ajustes_tipo` VALUES ('44', '24', 'Imagen al 70%', 'center_img_4');
INSERT INTO `app_ajustes_tipo` VALUES ('45', '24', 'Imagen al 60%', 'center_img_5');
INSERT INTO `app_ajustes_tipo` VALUES ('46', '24', 'Imagen al 50%', 'center_img_6');
INSERT INTO `app_ajustes_tipo` VALUES ('47', '24', 'Imagen al 40%', 'center_img_7');
INSERT INTO `app_ajustes_tipo` VALUES ('48', '24', 'Imagen al 33%', 'center_img_8');
INSERT INTO `app_ajustes_tipo` VALUES ('49', '24', 'Imagen al 30%', 'center_img_9');
INSERT INTO `app_ajustes_tipo` VALUES ('50', '24', 'Imagen al 25%', 'center_img_10');
INSERT INTO `app_ajustes_tipo` VALUES ('51', '24', 'Imagen al 20%', 'center_img_11');
INSERT INTO `app_ajustes_tipo` VALUES ('52', '24', 'Imagen al 15%', 'center_img_12');
INSERT INTO `app_ajustes_tipo` VALUES ('53', '25', 'Borde blanco', 'cover_img_01');
INSERT INTO `app_ajustes_tipo` VALUES ('54', '25', 'Ninguno', 'cover_img_00');
INSERT INTO `app_ajustes_tipo` VALUES ('55', '25', 'Gris claro', 'cover_img_02');
INSERT INTO `app_ajustes_tipo` VALUES ('56', '26', '00px', 'border_radius0');
INSERT INTO `app_ajustes_tipo` VALUES ('57', '26', '05px', 'border_radius5');
INSERT INTO `app_ajustes_tipo` VALUES ('58', '26', '10px', 'border_radius10');
INSERT INTO `app_ajustes_tipo` VALUES ('59', '26', '15px', 'border_radius15');
INSERT INTO `app_ajustes_tipo` VALUES ('60', '26', '20px', 'border_radius20');
INSERT INTO `app_ajustes_tipo` VALUES ('61', '26', '25px', 'border_radius25');
INSERT INTO `app_ajustes_tipo` VALUES ('62', '26', '30px', 'border_radius30');
INSERT INTO `app_ajustes_tipo` VALUES ('63', '26', '35px', 'border_radius35');
INSERT INTO `app_ajustes_tipo` VALUES ('64', '26', '40px', 'border_radius40');
INSERT INTO `app_ajustes_tipo` VALUES ('65', '26', '45px', 'border_radius45');
INSERT INTO `app_ajustes_tipo` VALUES ('66', '26', '50px', 'border_radius50');
INSERT INTO `app_ajustes_tipo` VALUES ('67', '26', '55px', 'border_radius55');
INSERT INTO `app_ajustes_tipo` VALUES ('68', '26', '60px', 'border_radius60');
INSERT INTO `app_ajustes_tipo` VALUES ('69', '26', '65px', 'border_radius65');
INSERT INTO `app_ajustes_tipo` VALUES ('70', '26', '70px', 'border_radius70');
INSERT INTO `app_ajustes_tipo` VALUES ('71', '26', '75px', 'border_radius75');
INSERT INTO `app_ajustes_tipo` VALUES ('72', '26', '80px', 'border_radius80');
INSERT INTO `app_ajustes_tipo` VALUES ('73', '26', '05%', 'border_radius05p');
INSERT INTO `app_ajustes_tipo` VALUES ('74', '26', '10%', 'border_radius10p');
INSERT INTO `app_ajustes_tipo` VALUES ('75', '26', '15%', 'border_radius15p');
INSERT INTO `app_ajustes_tipo` VALUES ('76', '26', '20%', 'border_radius20p');
INSERT INTO `app_ajustes_tipo` VALUES ('77', '26', '25%', 'border_radius25p');
INSERT INTO `app_ajustes_tipo` VALUES ('78', '26', '30%', 'border_radius30p');
INSERT INTO `app_ajustes_tipo` VALUES ('79', '26', '35%', 'border_radius35p');
INSERT INTO `app_ajustes_tipo` VALUES ('80', '26', '40%', 'border_radius40p');
INSERT INTO `app_ajustes_tipo` VALUES ('81', '26', '45%', 'border_radius45p');
INSERT INTO `app_ajustes_tipo` VALUES ('82', '26', '50%', 'border_radius50p');
INSERT INTO `app_ajustes_tipo` VALUES ('83', '27', 'Combinacion 01', 'background_color_01');
INSERT INTO `app_ajustes_tipo` VALUES ('84', '27', 'Combinacion 02', 'background_color_02');
INSERT INTO `app_ajustes_tipo` VALUES ('85', '27', 'Combinacion 03', 'background_color_03');
INSERT INTO `app_ajustes_tipo` VALUES ('86', '27', 'Combinacion 04', 'background_color_04');
INSERT INTO `app_ajustes_tipo` VALUES ('87', '27', 'Combinacion 05', 'background_color_05');
INSERT INTO `app_ajustes_tipo` VALUES ('88', '27', 'Combinacion 06', 'background_color_06');
INSERT INTO `app_ajustes_tipo` VALUES ('89', '27', 'Combinacion 07', 'background_color_07');
INSERT INTO `app_ajustes_tipo` VALUES ('90', '27', 'Combinacion 08', 'background_color_08');
INSERT INTO `app_ajustes_tipo` VALUES ('91', '27', 'Combinacion 09', 'background_color_09');
INSERT INTO `app_ajustes_tipo` VALUES ('92', '27', 'Combinacion 10', 'background_color_10');
INSERT INTO `app_ajustes_tipo` VALUES ('93', '27', 'Combinacion 11', 'background_color_11');
INSERT INTO `app_ajustes_tipo` VALUES ('94', '27', 'Combinacion 12', 'background_color_12');
INSERT INTO `app_ajustes_tipo` VALUES ('95', '27', 'Combinacion 13', 'background_color_13');
INSERT INTO `app_ajustes_tipo` VALUES ('96', '27', 'Combinacion 14', 'background_color_14');
INSERT INTO `app_ajustes_tipo` VALUES ('97', '27', 'Combinacion 15', 'background_color_15');
INSERT INTO `app_ajustes_tipo` VALUES ('98', '27', 'Combinacion 16', 'background_color_16');
INSERT INTO `app_ajustes_tipo` VALUES ('99', '27', 'Combinacion 17', 'background_color_17');
INSERT INTO `app_ajustes_tipo` VALUES ('100', '27', 'Combinacion 18', 'background_color_18');
INSERT INTO `app_ajustes_tipo` VALUES ('101', '27', 'Combinacion 19', 'background_color_19');
INSERT INTO `app_ajustes_tipo` VALUES ('102', '27', 'Combinacion 20', 'background_color_20');
INSERT INTO `app_ajustes_tipo` VALUES ('103', '27', 'Combinacion 21', 'background_color_21');
INSERT INTO `app_ajustes_tipo` VALUES ('104', '27', 'Combinacion 22', 'background_color_22');
INSERT INTO `app_ajustes_tipo` VALUES ('105', '27', 'Combinacion 23', 'background_color_23');
INSERT INTO `app_ajustes_tipo` VALUES ('106', '27', 'Combinacion 24', 'background_color_24');
INSERT INTO `app_ajustes_tipo` VALUES ('107', '27', 'Combinacion 25', 'background_color_25');
INSERT INTO `app_ajustes_tipo` VALUES ('108', '27', 'Combinacion 26', 'background_color_26');
INSERT INTO `app_ajustes_tipo` VALUES ('109', '27', 'Combinacion 27', 'background_color_27');
INSERT INTO `app_ajustes_tipo` VALUES ('110', '27', 'Combinacion 28', 'background_color_28');
INSERT INTO `app_ajustes_tipo` VALUES ('111', '27', 'Combinacion 29', 'background_color_29');
INSERT INTO `app_ajustes_tipo` VALUES ('112', '27', 'Combinacion 30', 'background_color_30');
INSERT INTO `app_ajustes_tipo` VALUES ('113', '27', 'Combinacion 31', 'background_color_31');
INSERT INTO `app_ajustes_tipo` VALUES ('114', '28', 'Combinacion 01', 'background_color_01');
INSERT INTO `app_ajustes_tipo` VALUES ('115', '28', 'Combinacion 02', 'background_color_02');
INSERT INTO `app_ajustes_tipo` VALUES ('116', '28', 'Combinacion 03', 'background_color_03');
INSERT INTO `app_ajustes_tipo` VALUES ('117', '28', 'Combinacion 04', 'background_color_04');
INSERT INTO `app_ajustes_tipo` VALUES ('118', '28', 'Combinacion 05', 'background_color_05');
INSERT INTO `app_ajustes_tipo` VALUES ('119', '28', 'Combinacion 06', 'background_color_06');
INSERT INTO `app_ajustes_tipo` VALUES ('120', '28', 'Combinacion 07', 'background_color_07');
INSERT INTO `app_ajustes_tipo` VALUES ('121', '28', 'Combinacion 08', 'background_color_08');
INSERT INTO `app_ajustes_tipo` VALUES ('122', '28', 'Combinacion 09', 'background_color_09');
INSERT INTO `app_ajustes_tipo` VALUES ('123', '28', 'Combinacion 10', 'background_color_10');
INSERT INTO `app_ajustes_tipo` VALUES ('124', '28', 'Combinacion 11', 'background_color_11');
INSERT INTO `app_ajustes_tipo` VALUES ('125', '28', 'Combinacion 12', 'background_color_12');
INSERT INTO `app_ajustes_tipo` VALUES ('126', '28', 'Combinacion 13', 'background_color_13');
INSERT INTO `app_ajustes_tipo` VALUES ('127', '28', 'Combinacion 14', 'background_color_14');
INSERT INTO `app_ajustes_tipo` VALUES ('128', '28', 'Combinacion 15', 'background_color_15');
INSERT INTO `app_ajustes_tipo` VALUES ('129', '28', 'Combinacion 16', 'background_color_16');
INSERT INTO `app_ajustes_tipo` VALUES ('130', '28', 'Combinacion 17', 'background_color_17');
INSERT INTO `app_ajustes_tipo` VALUES ('131', '28', 'Combinacion 18', 'background_color_18');
INSERT INTO `app_ajustes_tipo` VALUES ('132', '28', 'Combinacion 19', 'background_color_19');
INSERT INTO `app_ajustes_tipo` VALUES ('133', '28', 'Combinacion 20', 'background_color_20');
INSERT INTO `app_ajustes_tipo` VALUES ('134', '28', 'Combinacion 21', 'background_color_21');
INSERT INTO `app_ajustes_tipo` VALUES ('135', '28', 'Combinacion 22', 'background_color_22');
INSERT INTO `app_ajustes_tipo` VALUES ('136', '28', 'Combinacion 23', 'background_color_23');
INSERT INTO `app_ajustes_tipo` VALUES ('137', '28', 'Combinacion 24', 'background_color_24');
INSERT INTO `app_ajustes_tipo` VALUES ('138', '28', 'Combinacion 25', 'background_color_25');
INSERT INTO `app_ajustes_tipo` VALUES ('139', '28', 'Combinacion 26', 'background_color_26');
INSERT INTO `app_ajustes_tipo` VALUES ('140', '28', 'Combinacion 27', 'background_color_27');
INSERT INTO `app_ajustes_tipo` VALUES ('141', '28', 'Combinacion 28', 'background_color_28');
INSERT INTO `app_ajustes_tipo` VALUES ('142', '28', 'Combinacion 29', 'background_color_29');
INSERT INTO `app_ajustes_tipo` VALUES ('143', '28', 'Combinacion 30', 'background_color_30');
INSERT INTO `app_ajustes_tipo` VALUES ('144', '28', 'Combinacion 31', 'background_color_31');
INSERT INTO `app_ajustes_tipo` VALUES ('145', '29', 'Blanco', 'link_text_color1');
INSERT INTO `app_ajustes_tipo` VALUES ('146', '29', 'Gris', 'link_text_color2');
INSERT INTO `app_ajustes_tipo` VALUES ('147', '29', 'Rojo', 'link_text_color3');
INSERT INTO `app_ajustes_tipo` VALUES ('148', '29', 'Azul', 'link_text_color4');
INSERT INTO `app_ajustes_tipo` VALUES ('149', '29', 'Naranjo', 'link_text_color5');
INSERT INTO `app_ajustes_tipo` VALUES ('150', '29', 'Verde', 'link_text_color6');
INSERT INTO `app_ajustes_tipo` VALUES ('151', '30', '09 px', 'letter_size_01');
INSERT INTO `app_ajustes_tipo` VALUES ('152', '30', '10 px', 'letter_size_02');
INSERT INTO `app_ajustes_tipo` VALUES ('153', '30', '12 px', 'letter_size_03');
INSERT INTO `app_ajustes_tipo` VALUES ('154', '30', '14 px', 'letter_size_04');
INSERT INTO `app_ajustes_tipo` VALUES ('155', '30', '15 px', 'letter_size_05');
INSERT INTO `app_ajustes_tipo` VALUES ('156', '30', '16 px', 'letter_size_06');
INSERT INTO `app_ajustes_tipo` VALUES ('157', '30', '18 px', 'letter_size_07');
INSERT INTO `app_ajustes_tipo` VALUES ('158', '30', '20 px', 'letter_size_08');
INSERT INTO `app_ajustes_tipo` VALUES ('159', '30', '22 px', 'letter_size_09');
INSERT INTO `app_ajustes_tipo` VALUES ('160', '30', '23 px', 'letter_size_10');
INSERT INTO `app_ajustes_tipo` VALUES ('161', '30', '24 px', 'letter_size_11');
INSERT INTO `app_ajustes_tipo` VALUES ('162', '30', '25 px', 'letter_size_12');
INSERT INTO `app_ajustes_tipo` VALUES ('163', '30', '26 px', 'letter_size_13');
INSERT INTO `app_ajustes_tipo` VALUES ('164', '30', '27 px', 'letter_size_14');
INSERT INTO `app_ajustes_tipo` VALUES ('165', '30', '28 px', 'letter_size_15');
INSERT INTO `app_ajustes_tipo` VALUES ('166', '30', '29 px', 'letter_size_16');
INSERT INTO `app_ajustes_tipo` VALUES ('167', '30', '30 px', 'letter_size_17');
INSERT INTO `app_ajustes_tipo` VALUES ('168', '30', '32 px', 'letter_size_18');
INSERT INTO `app_ajustes_tipo` VALUES ('169', '30', '34 px', 'letter_size_19');
INSERT INTO `app_ajustes_tipo` VALUES ('170', '30', '36 px', 'letter_size_20');
INSERT INTO `app_ajustes_tipo` VALUES ('171', '31', 'Sombra 04', 'sombra_box_04');
INSERT INTO `app_ajustes_tipo` VALUES ('172', '31', 'Sombra 03', 'sombra_box_03');
INSERT INTO `app_ajustes_tipo` VALUES ('173', '31', 'Sombra 01', 'sombra_box_01');
INSERT INTO `app_ajustes_tipo` VALUES ('174', '31', 'Sombra 02', 'sombra_box_02');
INSERT INTO `app_ajustes_tipo` VALUES ('175', '32', 'Sin degradado', 'tb_deg_0');
INSERT INTO `app_ajustes_tipo` VALUES ('176', '32', 'Degradado 01', 'tb_deg_1');
INSERT INTO `app_ajustes_tipo` VALUES ('177', '33', 'Sin separador', 'border_separator_0');
INSERT INTO `app_ajustes_tipo` VALUES ('178', '33', 'Separador 1', 'border_separator_1');
INSERT INTO `app_ajustes_tipo` VALUES ('179', '34', 'hover 01', 'noti_hover01');
INSERT INTO `app_ajustes_tipo` VALUES ('180', '34', 'hover 02', 'noti_hover02');
INSERT INTO `app_ajustes_tipo` VALUES ('181', '34', 'hover 03', 'noti_hover03');
INSERT INTO `app_ajustes_tipo` VALUES ('182', '34', 'hover 04', 'noti_hover04');
INSERT INTO `app_ajustes_tipo` VALUES ('183', '34', 'hover 05', 'noti_hover05');
INSERT INTO `app_ajustes_tipo` VALUES ('184', '34', 'hover 06', 'noti_hover06');
INSERT INTO `app_ajustes_tipo` VALUES ('185', '34', 'hover 07', 'noti_hover07');
INSERT INTO `app_ajustes_tipo` VALUES ('186', '34', 'hover 08', 'noti_hover08');
INSERT INTO `app_ajustes_tipo` VALUES ('187', '34', 'hover 09', 'noti_hover09');
INSERT INTO `app_ajustes_tipo` VALUES ('188', '34', 'hover 10', 'noti_hover10');
INSERT INTO `app_ajustes_tipo` VALUES ('189', '34', 'hover 11', 'noti_hover11');
INSERT INTO `app_ajustes_tipo` VALUES ('190', '34', 'hover 12', 'noti_hover12');
INSERT INTO `app_ajustes_tipo` VALUES ('191', '34', 'hover 13', 'noti_hover13');
INSERT INTO `app_ajustes_tipo` VALUES ('192', '34', 'hover 14', 'noti_hover14');
INSERT INTO `app_ajustes_tipo` VALUES ('193', '34', 'hover 15', 'noti_hover15');
INSERT INTO `app_ajustes_tipo` VALUES ('194', '34', 'hover 16', 'noti_hover16');
INSERT INTO `app_ajustes_tipo` VALUES ('195', '34', 'hover 17', 'noti_hover17');
INSERT INTO `app_ajustes_tipo` VALUES ('196', '34', 'hover 18', 'noti_hover18');
INSERT INTO `app_ajustes_tipo` VALUES ('197', '34', 'hover 19', 'noti_hover19');
INSERT INTO `app_ajustes_tipo` VALUES ('198', '34', 'hover 20', 'noti_hover20');
INSERT INTO `app_ajustes_tipo` VALUES ('199', '34', 'hover 21', 'noti_hover21');
INSERT INTO `app_ajustes_tipo` VALUES ('200', '34', 'hover 22', 'noti_hover22');
INSERT INTO `app_ajustes_tipo` VALUES ('201', '34', 'hover 23', 'noti_hover23');
INSERT INTO `app_ajustes_tipo` VALUES ('202', '34', 'hover 24', 'noti_hover24');
INSERT INTO `app_ajustes_tipo` VALUES ('203', '34', 'hover 25', 'noti_hover25');
INSERT INTO `app_ajustes_tipo` VALUES ('204', '34', 'hover 26', 'noti_hover26');
INSERT INTO `app_ajustes_tipo` VALUES ('205', '34', 'hover 27', 'noti_hover27');
INSERT INTO `app_ajustes_tipo` VALUES ('206', '34', 'hover 28', 'noti_hover28');
INSERT INTO `app_ajustes_tipo` VALUES ('207', '34', 'hover 29', 'noti_hover29');
INSERT INTO `app_ajustes_tipo` VALUES ('208', '34', 'hover 30', 'noti_hover30');
INSERT INTO `app_ajustes_tipo` VALUES ('209', '34', 'hover 31', 'noti_hover31');
INSERT INTO `app_ajustes_tipo` VALUES ('210', '34', 'hover 32', 'noti_hover32');
INSERT INTO `app_ajustes_tipo` VALUES ('211', '35', 'checked 01', 'noti_checked01');
INSERT INTO `app_ajustes_tipo` VALUES ('212', '35', 'checked 02', 'noti_checked02');
INSERT INTO `app_ajustes_tipo` VALUES ('213', '35', 'checked 03', 'noti_checked03');
INSERT INTO `app_ajustes_tipo` VALUES ('214', '35', 'checked 04', 'noti_checked04');
INSERT INTO `app_ajustes_tipo` VALUES ('215', '35', 'checked 05', 'noti_checked05');
INSERT INTO `app_ajustes_tipo` VALUES ('216', '35', 'checked 06', 'noti_checked06');
INSERT INTO `app_ajustes_tipo` VALUES ('217', '35', 'checked 07', 'noti_checked07');
INSERT INTO `app_ajustes_tipo` VALUES ('218', '35', 'checked 08', 'noti_checked08');
INSERT INTO `app_ajustes_tipo` VALUES ('219', '35', 'checked 09', 'noti_checked09');
INSERT INTO `app_ajustes_tipo` VALUES ('220', '35', 'checked 10', 'noti_checked10');
INSERT INTO `app_ajustes_tipo` VALUES ('221', '35', 'checked 11', 'noti_checked11');
INSERT INTO `app_ajustes_tipo` VALUES ('222', '35', 'checked 12', 'noti_checked12');
INSERT INTO `app_ajustes_tipo` VALUES ('223', '35', 'checked 13', 'noti_checked13');
INSERT INTO `app_ajustes_tipo` VALUES ('224', '35', 'checked 14', 'noti_checked14');
INSERT INTO `app_ajustes_tipo` VALUES ('225', '35', 'checked 15', 'noti_checked15');
INSERT INTO `app_ajustes_tipo` VALUES ('226', '35', 'checked 16', 'noti_checked16');
INSERT INTO `app_ajustes_tipo` VALUES ('227', '35', 'checked 17', 'noti_checked17');
INSERT INTO `app_ajustes_tipo` VALUES ('228', '35', 'checked 18', 'noti_checked18');
INSERT INTO `app_ajustes_tipo` VALUES ('229', '35', 'checked 19', 'noti_checked19');
INSERT INTO `app_ajustes_tipo` VALUES ('230', '35', 'checked 20', 'noti_checked20');
INSERT INTO `app_ajustes_tipo` VALUES ('231', '35', 'checked 21', 'noti_checked21');
INSERT INTO `app_ajustes_tipo` VALUES ('232', '35', 'checked 22', 'noti_checked22');
INSERT INTO `app_ajustes_tipo` VALUES ('233', '35', 'checked 23', 'noti_checked23');
INSERT INTO `app_ajustes_tipo` VALUES ('234', '35', 'checked 24', 'noti_checked24');
INSERT INTO `app_ajustes_tipo` VALUES ('235', '35', 'checked 25', 'noti_checked25');
INSERT INTO `app_ajustes_tipo` VALUES ('236', '35', 'checked 26', 'noti_checked26');
INSERT INTO `app_ajustes_tipo` VALUES ('237', '35', 'checked 27', 'noti_checked27');
INSERT INTO `app_ajustes_tipo` VALUES ('238', '35', 'checked 28', 'noti_checked28');
INSERT INTO `app_ajustes_tipo` VALUES ('239', '35', 'checked 29', 'noti_checked29');
INSERT INTO `app_ajustes_tipo` VALUES ('240', '35', 'checked 30', 'noti_checked30');
INSERT INTO `app_ajustes_tipo` VALUES ('241', '35', 'checked 31', 'noti_checked31');
INSERT INTO `app_ajustes_tipo` VALUES ('242', '35', 'checked 32', 'noti_checked32');
INSERT INTO `app_ajustes_tipo` VALUES ('243', '35', 'checked 33', 'noti_checked33');
INSERT INTO `app_ajustes_tipo` VALUES ('244', '35', 'checked 34', 'noti_checked34');
INSERT INTO `app_ajustes_tipo` VALUES ('245', '27', 'Combinacion 32', 'background_color_32');
INSERT INTO `app_ajustes_tipo` VALUES ('246', '27', 'Combinacion 33', 'background_color_33');
INSERT INTO `app_ajustes_tipo` VALUES ('247', '27', 'Combinacion 34', 'background_color_34');
INSERT INTO `app_ajustes_tipo` VALUES ('248', '27', 'Combinacion 35', 'background_color_35');
INSERT INTO `app_ajustes_tipo` VALUES ('249', '27', 'Combinacion 36', 'background_color_36');
INSERT INTO `app_ajustes_tipo` VALUES ('250', '27', 'Combinacion 37', 'background_color_37');
INSERT INTO `app_ajustes_tipo` VALUES ('251', '27', 'Combinacion 38', 'background_color_38');
INSERT INTO `app_ajustes_tipo` VALUES ('252', '27', 'Combinacion 39', 'background_color_39');
INSERT INTO `app_ajustes_tipo` VALUES ('253', '27', 'Combinacion 40', 'background_color_40');
INSERT INTO `app_ajustes_tipo` VALUES ('254', '27', 'Combinacion 41', 'background_color_41');
INSERT INTO `app_ajustes_tipo` VALUES ('255', '27', 'Combinacion 42', 'background_color_42');
INSERT INTO `app_ajustes_tipo` VALUES ('256', '27', 'Combinacion 43', 'background_color_43');
INSERT INTO `app_ajustes_tipo` VALUES ('257', '27', 'Combinacion 44', 'background_color_44');
INSERT INTO `app_ajustes_tipo` VALUES ('258', '27', 'Combinacion 45', 'background_color_45');
INSERT INTO `app_ajustes_tipo` VALUES ('259', '27', 'Combinacion 46', 'background_color_46');
INSERT INTO `app_ajustes_tipo` VALUES ('260', '27', 'Combinacion 47', 'background_color_47');
INSERT INTO `app_ajustes_tipo` VALUES ('261', '27', 'Combinacion 48', 'background_color_48');
INSERT INTO `app_ajustes_tipo` VALUES ('262', '27', 'Combinacion 49', 'background_color_49');
INSERT INTO `app_ajustes_tipo` VALUES ('263', '27', 'Combinacion 50', 'background_color_50');
INSERT INTO `app_ajustes_tipo` VALUES ('264', '27', 'Combinacion 51', 'background_color_51');
INSERT INTO `app_ajustes_tipo` VALUES ('265', '27', 'Combinacion 52', 'background_color_52');
INSERT INTO `app_ajustes_tipo` VALUES ('266', '27', 'Combinacion 53', 'background_color_53');
INSERT INTO `app_ajustes_tipo` VALUES ('267', '27', 'Combinacion 54', 'background_color_54');
INSERT INTO `app_ajustes_tipo` VALUES ('268', '27', 'Combinacion 55', 'background_color_55');
INSERT INTO `app_ajustes_tipo` VALUES ('269', '27', 'Combinacion 56', 'background_color_56');
INSERT INTO `app_ajustes_tipo` VALUES ('270', '27', 'Combinacion 57', 'background_color_57');
INSERT INTO `app_ajustes_tipo` VALUES ('271', '27', 'Combinacion 58', 'background_color_58');
INSERT INTO `app_ajustes_tipo` VALUES ('272', '27', 'Combinacion 59', 'background_color_59');
INSERT INTO `app_ajustes_tipo` VALUES ('273', '27', 'Combinacion 60', 'background_color_60');
INSERT INTO `app_ajustes_tipo` VALUES ('274', '27', 'Combinacion 61', 'background_color_61');
INSERT INTO `app_ajustes_tipo` VALUES ('275', '27', 'Combinacion 62', 'background_color_62');
INSERT INTO `app_ajustes_tipo` VALUES ('276', '27', 'Combinacion 63', 'background_color_63');
INSERT INTO `app_ajustes_tipo` VALUES ('277', '27', 'Combinacion 64', 'background_color_64');
INSERT INTO `app_ajustes_tipo` VALUES ('278', '27', 'Combinacion 65', 'background_color_65');
INSERT INTO `app_ajustes_tipo` VALUES ('279', '27', 'Combinacion 66', 'background_color_66');
INSERT INTO `app_ajustes_tipo` VALUES ('280', '27', 'Combinacion 67', 'background_color_67');
INSERT INTO `app_ajustes_tipo` VALUES ('281', '27', 'Combinacion 68', 'background_color_68');
INSERT INTO `app_ajustes_tipo` VALUES ('282', '27', 'Combinacion 69', 'background_color_69');
INSERT INTO `app_ajustes_tipo` VALUES ('283', '27', 'Combinacion 70', 'background_color_70');
INSERT INTO `app_ajustes_tipo` VALUES ('284', '27', 'Combinacion 71', 'background_color_71');
INSERT INTO `app_ajustes_tipo` VALUES ('285', '27', 'Combinacion 72', 'background_color_72');
INSERT INTO `app_ajustes_tipo` VALUES ('286', '27', 'Combinacion 73', 'background_color_73');
INSERT INTO `app_ajustes_tipo` VALUES ('287', '27', 'Combinacion 74', 'background_color_74');
INSERT INTO `app_ajustes_tipo` VALUES ('288', '27', 'Combinacion 75', 'background_color_75');
INSERT INTO `app_ajustes_tipo` VALUES ('289', '27', 'Combinacion 76', 'background_color_76');
INSERT INTO `app_ajustes_tipo` VALUES ('290', '27', 'Combinacion 77', 'background_color_77');
INSERT INTO `app_ajustes_tipo` VALUES ('291', '27', 'Combinacion 78', 'background_color_78');
INSERT INTO `app_ajustes_tipo` VALUES ('292', '27', 'Combinacion 79', 'background_color_79');
INSERT INTO `app_ajustes_tipo` VALUES ('293', '27', 'Combinacion 80', 'background_color_80');
INSERT INTO `app_ajustes_tipo` VALUES ('294', '27', 'Combinacion 81', 'background_color_81');
INSERT INTO `app_ajustes_tipo` VALUES ('295', '27', 'Combinacion 82', 'background_color_82');
INSERT INTO `app_ajustes_tipo` VALUES ('296', '27', 'Combinacion 83', 'background_color_83');
INSERT INTO `app_ajustes_tipo` VALUES ('297', '27', 'Combinacion 84', 'background_color_84');
INSERT INTO `app_ajustes_tipo` VALUES ('298', '27', 'Combinacion 85', 'background_color_85');
INSERT INTO `app_ajustes_tipo` VALUES ('299', '27', 'Combinacion 86', 'background_color_86');
INSERT INTO `app_ajustes_tipo` VALUES ('300', '28', 'Combinacion 32', 'background_color_32');
INSERT INTO `app_ajustes_tipo` VALUES ('301', '28', 'Combinacion 33', 'background_color_33');
INSERT INTO `app_ajustes_tipo` VALUES ('302', '28', 'Combinacion 34', 'background_color_34');
INSERT INTO `app_ajustes_tipo` VALUES ('303', '28', 'Combinacion 35', 'background_color_35');
INSERT INTO `app_ajustes_tipo` VALUES ('304', '28', 'Combinacion 36', 'background_color_36');
INSERT INTO `app_ajustes_tipo` VALUES ('305', '28', 'Combinacion 37', 'background_color_37');
INSERT INTO `app_ajustes_tipo` VALUES ('306', '28', 'Combinacion 38', 'background_color_38');
INSERT INTO `app_ajustes_tipo` VALUES ('307', '28', 'Combinacion 39', 'background_color_39');
INSERT INTO `app_ajustes_tipo` VALUES ('308', '28', 'Combinacion 40', 'background_color_40');
INSERT INTO `app_ajustes_tipo` VALUES ('309', '28', 'Combinacion 41', 'background_color_41');
INSERT INTO `app_ajustes_tipo` VALUES ('310', '28', 'Combinacion 42', 'background_color_42');
INSERT INTO `app_ajustes_tipo` VALUES ('311', '28', 'Combinacion 43', 'background_color_43');
INSERT INTO `app_ajustes_tipo` VALUES ('312', '28', 'Combinacion 44', 'background_color_44');
INSERT INTO `app_ajustes_tipo` VALUES ('313', '28', 'Combinacion 45', 'background_color_45');
INSERT INTO `app_ajustes_tipo` VALUES ('314', '28', 'Combinacion 46', 'background_color_46');
INSERT INTO `app_ajustes_tipo` VALUES ('315', '28', 'Combinacion 47', 'background_color_47');
INSERT INTO `app_ajustes_tipo` VALUES ('316', '28', 'Combinacion 48', 'background_color_48');
INSERT INTO `app_ajustes_tipo` VALUES ('317', '28', 'Combinacion 49', 'background_color_49');
INSERT INTO `app_ajustes_tipo` VALUES ('318', '28', 'Combinacion 50', 'background_color_50');
INSERT INTO `app_ajustes_tipo` VALUES ('319', '28', 'Combinacion 51', 'background_color_51');
INSERT INTO `app_ajustes_tipo` VALUES ('320', '28', 'Combinacion 52', 'background_color_52');
INSERT INTO `app_ajustes_tipo` VALUES ('321', '28', 'Combinacion 53', 'background_color_53');
INSERT INTO `app_ajustes_tipo` VALUES ('322', '28', 'Combinacion 54', 'background_color_54');
INSERT INTO `app_ajustes_tipo` VALUES ('323', '28', 'Combinacion 55', 'background_color_55');
INSERT INTO `app_ajustes_tipo` VALUES ('324', '28', 'Combinacion 56', 'background_color_56');
INSERT INTO `app_ajustes_tipo` VALUES ('325', '28', 'Combinacion 57', 'background_color_57');
INSERT INTO `app_ajustes_tipo` VALUES ('326', '28', 'Combinacion 58', 'background_color_58');
INSERT INTO `app_ajustes_tipo` VALUES ('327', '28', 'Combinacion 59', 'background_color_59');
INSERT INTO `app_ajustes_tipo` VALUES ('328', '28', 'Combinacion 60', 'background_color_60');
INSERT INTO `app_ajustes_tipo` VALUES ('329', '28', 'Combinacion 61', 'background_color_61');
INSERT INTO `app_ajustes_tipo` VALUES ('330', '28', 'Combinacion 62', 'background_color_62');
INSERT INTO `app_ajustes_tipo` VALUES ('331', '28', 'Combinacion 63', 'background_color_63');
INSERT INTO `app_ajustes_tipo` VALUES ('332', '28', 'Combinacion 64', 'background_color_64');
INSERT INTO `app_ajustes_tipo` VALUES ('333', '28', 'Combinacion 65', 'background_color_65');
INSERT INTO `app_ajustes_tipo` VALUES ('334', '28', 'Combinacion 66', 'background_color_66');
INSERT INTO `app_ajustes_tipo` VALUES ('335', '28', 'Combinacion 67', 'background_color_67');
INSERT INTO `app_ajustes_tipo` VALUES ('336', '28', 'Combinacion 68', 'background_color_68');
INSERT INTO `app_ajustes_tipo` VALUES ('337', '28', 'Combinacion 69', 'background_color_69');
INSERT INTO `app_ajustes_tipo` VALUES ('338', '28', 'Combinacion 70', 'background_color_70');
INSERT INTO `app_ajustes_tipo` VALUES ('339', '28', 'Combinacion 71', 'background_color_71');
INSERT INTO `app_ajustes_tipo` VALUES ('340', '28', 'Combinacion 72', 'background_color_72');
INSERT INTO `app_ajustes_tipo` VALUES ('341', '28', 'Combinacion 73', 'background_color_73');
INSERT INTO `app_ajustes_tipo` VALUES ('342', '28', 'Combinacion 74', 'background_color_74');
INSERT INTO `app_ajustes_tipo` VALUES ('343', '28', 'Combinacion 75', 'background_color_75');
INSERT INTO `app_ajustes_tipo` VALUES ('344', '28', 'Combinacion 76', 'background_color_76');
INSERT INTO `app_ajustes_tipo` VALUES ('345', '28', 'Combinacion 77', 'background_color_77');
INSERT INTO `app_ajustes_tipo` VALUES ('346', '28', 'Combinacion 78', 'background_color_78');
INSERT INTO `app_ajustes_tipo` VALUES ('347', '28', 'Combinacion 79', 'background_color_79');
INSERT INTO `app_ajustes_tipo` VALUES ('348', '28', 'Combinacion 80', 'background_color_80');
INSERT INTO `app_ajustes_tipo` VALUES ('349', '28', 'Combinacion 81', 'background_color_81');
INSERT INTO `app_ajustes_tipo` VALUES ('350', '28', 'Combinacion 82', 'background_color_82');
INSERT INTO `app_ajustes_tipo` VALUES ('351', '28', 'Combinacion 83', 'background_color_83');
INSERT INTO `app_ajustes_tipo` VALUES ('352', '28', 'Combinacion 84', 'background_color_84');
INSERT INTO `app_ajustes_tipo` VALUES ('353', '28', 'Combinacion 85', 'background_color_85');
INSERT INTO `app_ajustes_tipo` VALUES ('354', '28', 'Combinacion 86', 'background_color_86');
INSERT INTO `app_ajustes_tipo` VALUES ('355', '29', 'Otro', 'link_text_color7');
INSERT INTO `app_ajustes_tipo` VALUES ('356', '34', 'hover 33', 'noti_hover33');
INSERT INTO `app_ajustes_tipo` VALUES ('357', '34', 'hover 34', 'noti_hover34');
INSERT INTO `app_ajustes_tipo` VALUES ('358', '34', 'hover 35', 'noti_hover35');
INSERT INTO `app_ajustes_tipo` VALUES ('359', '34', 'hover 36', 'noti_hover36');
INSERT INTO `app_ajustes_tipo` VALUES ('360', '34', 'hover 37', 'noti_hover37');
INSERT INTO `app_ajustes_tipo` VALUES ('361', '34', 'hover 38', 'noti_hover38');
INSERT INTO `app_ajustes_tipo` VALUES ('362', '34', 'hover 39', 'noti_hover39');
INSERT INTO `app_ajustes_tipo` VALUES ('363', '34', 'hover 40', 'noti_hover40');
INSERT INTO `app_ajustes_tipo` VALUES ('364', '34', 'hover 41', 'noti_hover41');
INSERT INTO `app_ajustes_tipo` VALUES ('365', '34', 'hover 42', 'noti_hover42');
INSERT INTO `app_ajustes_tipo` VALUES ('366', '34', 'hover 43', 'noti_hover43');
INSERT INTO `app_ajustes_tipo` VALUES ('367', '34', 'hover 44', 'noti_hover44');
INSERT INTO `app_ajustes_tipo` VALUES ('368', '34', 'hover 45', 'noti_hover45');
INSERT INTO `app_ajustes_tipo` VALUES ('369', '34', 'hover 46', 'noti_hover46');
INSERT INTO `app_ajustes_tipo` VALUES ('370', '34', 'hover 47', 'noti_hover47');
INSERT INTO `app_ajustes_tipo` VALUES ('371', '34', 'hover 48', 'noti_hover48');
INSERT INTO `app_ajustes_tipo` VALUES ('372', '34', 'hover 49', 'noti_hover49');
INSERT INTO `app_ajustes_tipo` VALUES ('373', '34', 'hover 50', 'noti_hover50');
INSERT INTO `app_ajustes_tipo` VALUES ('374', '34', 'hover 51', 'noti_hover51');
INSERT INTO `app_ajustes_tipo` VALUES ('375', '34', 'hover 52', 'noti_hover52');
INSERT INTO `app_ajustes_tipo` VALUES ('376', '34', 'hover 53', 'noti_hover53');
INSERT INTO `app_ajustes_tipo` VALUES ('377', '34', 'hover 54', 'noti_hover54');
INSERT INTO `app_ajustes_tipo` VALUES ('378', '34', 'hover 55', 'noti_hover55');
INSERT INTO `app_ajustes_tipo` VALUES ('379', '34', 'hover 56', 'noti_hover56');
INSERT INTO `app_ajustes_tipo` VALUES ('380', '34', 'hover 57', 'noti_hover57');
INSERT INTO `app_ajustes_tipo` VALUES ('381', '34', 'hover 58', 'noti_hover58');
INSERT INTO `app_ajustes_tipo` VALUES ('382', '34', 'hover 59', 'noti_hover59');
INSERT INTO `app_ajustes_tipo` VALUES ('383', '34', 'hover 60', 'noti_hover60');
INSERT INTO `app_ajustes_tipo` VALUES ('384', '34', 'hover 61', 'noti_hover61');
INSERT INTO `app_ajustes_tipo` VALUES ('385', '34', 'hover 62', 'noti_hover62');
INSERT INTO `app_ajustes_tipo` VALUES ('386', '34', 'hover 63', 'noti_hover63');
INSERT INTO `app_ajustes_tipo` VALUES ('387', '34', 'hover 64', 'noti_hover64');
INSERT INTO `app_ajustes_tipo` VALUES ('388', '34', 'hover 65', 'noti_hover65');
INSERT INTO `app_ajustes_tipo` VALUES ('389', '34', 'hover 66', 'noti_hover66');
INSERT INTO `app_ajustes_tipo` VALUES ('390', '34', 'hover 67', 'noti_hover67');
INSERT INTO `app_ajustes_tipo` VALUES ('391', '34', 'hover 68', 'noti_hover68');
INSERT INTO `app_ajustes_tipo` VALUES ('392', '34', 'hover 69', 'noti_hover69');
INSERT INTO `app_ajustes_tipo` VALUES ('393', '34', 'hover 70', 'noti_hover70');
INSERT INTO `app_ajustes_tipo` VALUES ('394', '34', 'hover 71', 'noti_hover71');
INSERT INTO `app_ajustes_tipo` VALUES ('395', '34', 'hover 72', 'noti_hover72');
INSERT INTO `app_ajustes_tipo` VALUES ('396', '34', 'hover 73', 'noti_hover73');
INSERT INTO `app_ajustes_tipo` VALUES ('397', '34', 'hover 74', 'noti_hover74');
INSERT INTO `app_ajustes_tipo` VALUES ('398', '34', 'hover 75', 'noti_hover75');
INSERT INTO `app_ajustes_tipo` VALUES ('399', '34', 'hover 76', 'noti_hover76');
INSERT INTO `app_ajustes_tipo` VALUES ('400', '34', 'hover 77', 'noti_hover77');
INSERT INTO `app_ajustes_tipo` VALUES ('401', '34', 'hover 78', 'noti_hover78');
INSERT INTO `app_ajustes_tipo` VALUES ('402', '34', 'hover 79', 'noti_hover79');
INSERT INTO `app_ajustes_tipo` VALUES ('403', '34', 'hover 80', 'noti_hover80');
INSERT INTO `app_ajustes_tipo` VALUES ('404', '34', 'hover 81', 'noti_hover81');
INSERT INTO `app_ajustes_tipo` VALUES ('405', '34', 'hover 82', 'noti_hover82');
INSERT INTO `app_ajustes_tipo` VALUES ('406', '34', 'hover 83', 'noti_hover83');
INSERT INTO `app_ajustes_tipo` VALUES ('407', '34', 'hover 84', 'noti_hover84');
INSERT INTO `app_ajustes_tipo` VALUES ('408', '34', 'hover 85', 'noti_hover85');
INSERT INTO `app_ajustes_tipo` VALUES ('409', '34', 'hover 86', 'noti_hover86');
INSERT INTO `app_ajustes_tipo` VALUES ('410', '35', 'checked 35', 'noti_checked35');
INSERT INTO `app_ajustes_tipo` VALUES ('411', '35', 'checked 36', 'noti_checked36');
INSERT INTO `app_ajustes_tipo` VALUES ('412', '35', 'checked 37', 'noti_checked37');
INSERT INTO `app_ajustes_tipo` VALUES ('413', '35', 'checked 38', 'noti_checked38');
INSERT INTO `app_ajustes_tipo` VALUES ('414', '35', 'checked 39', 'noti_checked39');
INSERT INTO `app_ajustes_tipo` VALUES ('415', '35', 'checked 40', 'noti_checked40');
INSERT INTO `app_ajustes_tipo` VALUES ('416', '35', 'checked 41', 'noti_checked41');
INSERT INTO `app_ajustes_tipo` VALUES ('417', '35', 'checked 42', 'noti_checked42');
INSERT INTO `app_ajustes_tipo` VALUES ('418', '35', 'checked 43', 'noti_checked43');
INSERT INTO `app_ajustes_tipo` VALUES ('419', '35', 'checked 44', 'noti_checked44');
INSERT INTO `app_ajustes_tipo` VALUES ('420', '35', 'checked 45', 'noti_checked45');
INSERT INTO `app_ajustes_tipo` VALUES ('421', '35', 'checked 46', 'noti_checked46');
INSERT INTO `app_ajustes_tipo` VALUES ('422', '35', 'checked 47', 'noti_checked47');
INSERT INTO `app_ajustes_tipo` VALUES ('423', '35', 'checked 48', 'noti_checked48');
INSERT INTO `app_ajustes_tipo` VALUES ('424', '35', 'checked 49', 'noti_checked49');
INSERT INTO `app_ajustes_tipo` VALUES ('425', '35', 'checked 50', 'noti_checked50');
INSERT INTO `app_ajustes_tipo` VALUES ('426', '35', 'checked 51', 'noti_checked51');
INSERT INTO `app_ajustes_tipo` VALUES ('427', '35', 'checked 52', 'noti_checked52');
INSERT INTO `app_ajustes_tipo` VALUES ('428', '35', 'checked 53', 'noti_checked53');
INSERT INTO `app_ajustes_tipo` VALUES ('429', '35', 'checked 54', 'noti_checked54');
INSERT INTO `app_ajustes_tipo` VALUES ('430', '35', 'checked 55', 'noti_checked55');
INSERT INTO `app_ajustes_tipo` VALUES ('431', '35', 'checked 56', 'noti_checked56');
INSERT INTO `app_ajustes_tipo` VALUES ('432', '35', 'checked 57', 'noti_checked57');
INSERT INTO `app_ajustes_tipo` VALUES ('433', '35', 'checked 58', 'noti_checked58');
INSERT INTO `app_ajustes_tipo` VALUES ('434', '35', 'checked 59', 'noti_checked59');
INSERT INTO `app_ajustes_tipo` VALUES ('435', '35', 'checked 60', 'noti_checked60');
INSERT INTO `app_ajustes_tipo` VALUES ('436', '35', 'checked 61', 'noti_checked61');
INSERT INTO `app_ajustes_tipo` VALUES ('437', '35', 'checked 62', 'noti_checked62');
INSERT INTO `app_ajustes_tipo` VALUES ('438', '35', 'checked 63', 'noti_checked63');
INSERT INTO `app_ajustes_tipo` VALUES ('439', '35', 'checked 64', 'noti_checked64');
INSERT INTO `app_ajustes_tipo` VALUES ('440', '35', 'checked 65', 'noti_checked65');
INSERT INTO `app_ajustes_tipo` VALUES ('441', '35', 'checked 66', 'noti_checked66');
INSERT INTO `app_ajustes_tipo` VALUES ('442', '35', 'checked 67', 'noti_checked67');
INSERT INTO `app_ajustes_tipo` VALUES ('443', '35', 'checked 68', 'noti_checked68');
INSERT INTO `app_ajustes_tipo` VALUES ('444', '35', 'checked 69', 'noti_checked69');
INSERT INTO `app_ajustes_tipo` VALUES ('445', '35', 'checked 70', 'noti_checked70');
INSERT INTO `app_ajustes_tipo` VALUES ('446', '35', 'checked 71', 'noti_checked71');
INSERT INTO `app_ajustes_tipo` VALUES ('447', '35', 'checked 72', 'noti_checked72');
INSERT INTO `app_ajustes_tipo` VALUES ('448', '35', 'checked 73', 'noti_checked73');
INSERT INTO `app_ajustes_tipo` VALUES ('449', '35', 'checked 74', 'noti_checked74');
INSERT INTO `app_ajustes_tipo` VALUES ('450', '35', 'checked 75', 'noti_checked75');
INSERT INTO `app_ajustes_tipo` VALUES ('451', '35', 'checked 76', 'noti_checked76');
INSERT INTO `app_ajustes_tipo` VALUES ('452', '35', 'checked 77', 'noti_checked77');
INSERT INTO `app_ajustes_tipo` VALUES ('453', '35', 'checked 78', 'noti_checked78');
INSERT INTO `app_ajustes_tipo` VALUES ('454', '35', 'checked 79', 'noti_checked79');
INSERT INTO `app_ajustes_tipo` VALUES ('455', '35', 'checked 80', 'noti_checked80');
INSERT INTO `app_ajustes_tipo` VALUES ('456', '35', 'checked 81', 'noti_checked81');
INSERT INTO `app_ajustes_tipo` VALUES ('457', '35', 'checked 82', 'noti_checked82');
INSERT INTO `app_ajustes_tipo` VALUES ('458', '35', 'checked 83', 'noti_checked83');
INSERT INTO `app_ajustes_tipo` VALUES ('459', '35', 'checked 84', 'noti_checked84');
INSERT INTO `app_ajustes_tipo` VALUES ('460', '35', 'checked 85', 'noti_checked85');
INSERT INTO `app_ajustes_tipo` VALUES ('461', '35', 'checked 86', 'noti_checked86');
INSERT INTO `app_ajustes_tipo` VALUES ('462', '25', 'Combinacion 04', 'cover_img_03');
INSERT INTO `app_ajustes_tipo` VALUES ('463', '25', 'Combinacion 05', 'cover_img_04');
INSERT INTO `app_ajustes_tipo` VALUES ('464', '25', 'Combinacion 06', 'cover_img_05');
INSERT INTO `app_ajustes_tipo` VALUES ('465', '25', 'Combinacion 07', 'cover_img_06');
INSERT INTO `app_ajustes_tipo` VALUES ('466', '25', 'Combinacion 08', 'cover_img_07');
INSERT INTO `app_ajustes_tipo` VALUES ('467', '25', 'Combinacion 09', 'cover_img_08');
INSERT INTO `app_ajustes_tipo` VALUES ('468', '25', 'Combinacion 10', 'cover_img_09');
INSERT INTO `app_ajustes_tipo` VALUES ('469', '25', 'Combinacion 11', 'cover_img_10');
INSERT INTO `app_ajustes_tipo` VALUES ('470', '25', 'Combinacion 12', 'cover_img_11');
INSERT INTO `app_ajustes_tipo` VALUES ('471', '25', 'Combinacion 13', 'cover_img_12');
INSERT INTO `app_ajustes_tipo` VALUES ('472', '25', 'Combinacion 14', 'cover_img_13');
INSERT INTO `app_ajustes_tipo` VALUES ('473', '25', 'Combinacion 15', 'cover_img_14');
INSERT INTO `app_ajustes_tipo` VALUES ('474', '25', 'Combinacion 16', 'cover_img_15');
INSERT INTO `app_ajustes_tipo` VALUES ('475', '25', 'Combinacion 17', 'cover_img_16');
INSERT INTO `app_ajustes_tipo` VALUES ('476', '25', 'Combinacion 18', 'cover_img_17');
INSERT INTO `app_ajustes_tipo` VALUES ('477', '25', 'Combinacion 19', 'cover_img_18');
INSERT INTO `app_ajustes_tipo` VALUES ('478', '25', 'Combinacion 20', 'cover_img_19');
INSERT INTO `app_ajustes_tipo` VALUES ('479', '25', 'Combinacion 21', 'cover_img_20');
INSERT INTO `app_ajustes_tipo` VALUES ('480', '25', 'Combinacion 22', 'cover_img_21');
INSERT INTO `app_ajustes_tipo` VALUES ('481', '25', 'Combinacion 23', 'cover_img_22');
INSERT INTO `app_ajustes_tipo` VALUES ('482', '25', 'Combinacion 24', 'cover_img_23');
INSERT INTO `app_ajustes_tipo` VALUES ('483', '25', 'Combinacion 25', 'cover_img_24');
INSERT INTO `app_ajustes_tipo` VALUES ('484', '25', 'Combinacion 26', 'cover_img_25');
INSERT INTO `app_ajustes_tipo` VALUES ('485', '25', 'Combinacion 27', 'cover_img_26');
INSERT INTO `app_ajustes_tipo` VALUES ('486', '25', 'Combinacion 28', 'cover_img_27');
INSERT INTO `app_ajustes_tipo` VALUES ('487', '25', 'Combinacion 29', 'cover_img_28');
INSERT INTO `app_ajustes_tipo` VALUES ('488', '25', 'Combinacion 30', 'cover_img_29');
INSERT INTO `app_ajustes_tipo` VALUES ('489', '25', 'Combinacion 31', 'cover_img_30');
INSERT INTO `app_ajustes_tipo` VALUES ('490', '25', 'Combinacion 32', 'cover_img_31');
INSERT INTO `app_ajustes_tipo` VALUES ('491', '25', 'Combinacion 33', 'cover_img_32');
INSERT INTO `app_ajustes_tipo` VALUES ('492', '25', 'Combinacion 34', 'cover_img_33');
INSERT INTO `app_ajustes_tipo` VALUES ('493', '25', 'Combinacion 35', 'cover_img_34');
INSERT INTO `app_ajustes_tipo` VALUES ('494', '25', 'Combinacion 36', 'cover_img_35');
INSERT INTO `app_ajustes_tipo` VALUES ('495', '25', 'Combinacion 37', 'cover_img_36');
INSERT INTO `app_ajustes_tipo` VALUES ('496', '25', 'Combinacion 38', 'cover_img_37');
INSERT INTO `app_ajustes_tipo` VALUES ('497', '25', 'Combinacion 39', 'cover_img_38');
INSERT INTO `app_ajustes_tipo` VALUES ('498', '25', 'Combinacion 40', 'cover_img_39');
INSERT INTO `app_ajustes_tipo` VALUES ('499', '25', 'Combinacion 41', 'cover_img_40');
INSERT INTO `app_ajustes_tipo` VALUES ('500', '25', 'Combinacion 42', 'cover_img_41');
INSERT INTO `app_ajustes_tipo` VALUES ('501', '25', 'Combinacion 43', 'cover_img_42');
INSERT INTO `app_ajustes_tipo` VALUES ('502', '25', 'Combinacion 44', 'cover_img_43');
INSERT INTO `app_ajustes_tipo` VALUES ('503', '25', 'Combinacion 45', 'cover_img_44');
INSERT INTO `app_ajustes_tipo` VALUES ('504', '25', 'Combinacion 46', 'cover_img_45');
INSERT INTO `app_ajustes_tipo` VALUES ('505', '25', 'Combinacion 47', 'cover_img_46');
INSERT INTO `app_ajustes_tipo` VALUES ('506', '25', 'Combinacion 48', 'cover_img_47');
INSERT INTO `app_ajustes_tipo` VALUES ('507', '25', 'Combinacion 49', 'cover_img_48');
INSERT INTO `app_ajustes_tipo` VALUES ('508', '25', 'Combinacion 50', 'cover_img_49');
INSERT INTO `app_ajustes_tipo` VALUES ('509', '25', 'Combinacion 51', 'cover_img_50');
INSERT INTO `app_ajustes_tipo` VALUES ('510', '25', 'Combinacion 52', 'cover_img_51');
INSERT INTO `app_ajustes_tipo` VALUES ('511', '25', 'Combinacion 53', 'cover_img_52');
INSERT INTO `app_ajustes_tipo` VALUES ('512', '25', 'Combinacion 54', 'cover_img_53');
INSERT INTO `app_ajustes_tipo` VALUES ('513', '25', 'Combinacion 55', 'cover_img_54');
INSERT INTO `app_ajustes_tipo` VALUES ('514', '25', 'Combinacion 56', 'cover_img_55');
INSERT INTO `app_ajustes_tipo` VALUES ('515', '25', 'Combinacion 57', 'cover_img_56');
INSERT INTO `app_ajustes_tipo` VALUES ('516', '25', 'Combinacion 58', 'cover_img_57');
INSERT INTO `app_ajustes_tipo` VALUES ('517', '25', 'Combinacion 59', 'cover_img_58');
INSERT INTO `app_ajustes_tipo` VALUES ('518', '25', 'Combinacion 60', 'cover_img_59');
INSERT INTO `app_ajustes_tipo` VALUES ('519', '25', 'Combinacion 61', 'cover_img_60');
INSERT INTO `app_ajustes_tipo` VALUES ('520', '25', 'Combinacion 62', 'cover_img_61');
INSERT INTO `app_ajustes_tipo` VALUES ('521', '25', 'Combinacion 63', 'cover_img_62');
INSERT INTO `app_ajustes_tipo` VALUES ('522', '25', 'Combinacion 64', 'cover_img_63');
INSERT INTO `app_ajustes_tipo` VALUES ('523', '25', 'Combinacion 65', 'cover_img_64');
INSERT INTO `app_ajustes_tipo` VALUES ('524', '25', 'Combinacion 66', 'cover_img_65');
INSERT INTO `app_ajustes_tipo` VALUES ('525', '31', 'Sombra 05', 'sombra_box_05');
INSERT INTO `app_ajustes_tipo` VALUES ('526', '31', 'Sombra 06', 'sombra_box_06');
INSERT INTO `app_ajustes_tipo` VALUES ('527', '31', 'Sombra 07', 'sombra_box_07');
INSERT INTO `app_ajustes_tipo` VALUES ('528', '31', 'Sombra 08', 'sombra_box_08');
INSERT INTO `app_ajustes_tipo` VALUES ('529', '31', 'Sombra 09', 'sombra_box_09');
INSERT INTO `app_ajustes_tipo` VALUES ('530', '31', 'Sombra 10', 'sombra_box_10');
INSERT INTO `app_ajustes_tipo` VALUES ('531', '31', 'Sombra 11', 'sombra_box_11');
INSERT INTO `app_ajustes_tipo` VALUES ('532', '31', 'Sombra 12', 'sombra_box_12');
INSERT INTO `app_ajustes_tipo` VALUES ('533', '31', 'Sombra 13', 'sombra_box_13');
INSERT INTO `app_ajustes_tipo` VALUES ('534', '31', 'Sombra 14', 'sombra_box_14');
INSERT INTO `app_ajustes_tipo` VALUES ('535', '31', 'Sombra 15', 'sombra_box_15');
INSERT INTO `app_ajustes_tipo` VALUES ('536', '31', 'Sombra 16', 'sombra_box_16');
INSERT INTO `app_ajustes_tipo` VALUES ('537', '31', 'Sombra 17', 'sombra_box_17');
INSERT INTO `app_ajustes_tipo` VALUES ('538', '31', 'Sombra 18', 'sombra_box_18');
INSERT INTO `app_ajustes_tipo` VALUES ('539', '31', 'Sombra 19', 'sombra_box_19');
INSERT INTO `app_ajustes_tipo` VALUES ('540', '31', 'Sombra 20', 'sombra_box_20');
INSERT INTO `app_ajustes_tipo` VALUES ('541', '31', 'Sombra 21', 'sombra_box_21');
INSERT INTO `app_ajustes_tipo` VALUES ('542', '31', 'Sombra 22', 'sombra_box_22');
INSERT INTO `app_ajustes_tipo` VALUES ('543', '31', 'Sombra 23', 'sombra_box_23');
INSERT INTO `app_ajustes_tipo` VALUES ('544', '31', 'Sombra 24', 'sombra_box_24');
INSERT INTO `app_ajustes_tipo` VALUES ('545', '31', 'Sombra 25', 'sombra_box_25');
INSERT INTO `app_ajustes_tipo` VALUES ('546', '31', 'Sombra 26', 'sombra_box_26');
INSERT INTO `app_ajustes_tipo` VALUES ('547', '31', 'Sombra 27', 'sombra_box_27');
INSERT INTO `app_ajustes_tipo` VALUES ('548', '31', 'Sombra 28', 'sombra_box_28');
INSERT INTO `app_ajustes_tipo` VALUES ('549', '31', 'Sombra 29', 'sombra_box_29');
INSERT INTO `app_ajustes_tipo` VALUES ('550', '31', 'Sombra 30', 'sombra_box_30');
INSERT INTO `app_ajustes_tipo` VALUES ('551', '36', 'Blanco', 'tabscolorbase1');
INSERT INTO `app_ajustes_tipo` VALUES ('552', '36', 'Gris', 'tabscolorbase2');
INSERT INTO `app_ajustes_tipo` VALUES ('553', '36', 'Rojo', 'tabscolorbase3');
INSERT INTO `app_ajustes_tipo` VALUES ('554', '36', 'Azul', 'tabscolorbase4');
INSERT INTO `app_ajustes_tipo` VALUES ('555', '36', 'Naranjo', 'tabscolorbase5');
INSERT INTO `app_ajustes_tipo` VALUES ('556', '36', 'Verde', 'tabscolorbase6');
INSERT INTO `app_ajustes_tipo` VALUES ('557', '36', 'Otro', 'tabscolorbase7');
INSERT INTO `app_ajustes_tipo` VALUES ('558', '37', 'Blanco', 'tabscolorchecked1');
INSERT INTO `app_ajustes_tipo` VALUES ('559', '37', 'Gris', 'tabscolorchecked2');
INSERT INTO `app_ajustes_tipo` VALUES ('560', '37', 'Rojo', 'tabscolorchecked3');
INSERT INTO `app_ajustes_tipo` VALUES ('561', '37', 'Azul', 'tabscolorchecked4');
INSERT INTO `app_ajustes_tipo` VALUES ('562', '37', 'Naranjo', 'tabscolorchecked5');
INSERT INTO `app_ajustes_tipo` VALUES ('563', '37', 'Verde', 'tabscolorchecked6');
INSERT INTO `app_ajustes_tipo` VALUES ('564', '37', 'Otro', 'tabscolorchecked7');
INSERT INTO `app_ajustes_tipo` VALUES ('565', '27', 'Combinacion 87', 'background_color_87');
INSERT INTO `app_ajustes_tipo` VALUES ('566', '28', 'Combinacion 87', 'background_color_87');
INSERT INTO `app_ajustes_tipo` VALUES ('567', '35', 'checked 87', 'noti_checked87');
INSERT INTO `app_ajustes_tipo` VALUES ('568', '34', 'hover 87', 'noti_hover87');
INSERT INTO `app_ajustes_tipo` VALUES ('569', '27', 'Combinacion 88', 'background_color_88');
INSERT INTO `app_ajustes_tipo` VALUES ('570', '28', 'Combinacion 88', 'background_color_88');
INSERT INTO `app_ajustes_tipo` VALUES ('571', '35', 'checked 88', 'noti_checked88');
INSERT INTO `app_ajustes_tipo` VALUES ('572', '34', 'hover 88', 'noti_hover88');
INSERT INTO `app_ajustes_tipo` VALUES ('573', '27', 'Combinacion 89', 'background_color_89');
INSERT INTO `app_ajustes_tipo` VALUES ('574', '28', 'Combinacion 89', 'background_color_89');
INSERT INTO `app_ajustes_tipo` VALUES ('575', '35', 'checked 89', 'noti_checked89');
INSERT INTO `app_ajustes_tipo` VALUES ('576', '34', 'hover 89', 'noti_hover89');
INSERT INTO `app_ajustes_tipo` VALUES ('577', '27', 'Combinacion 90', 'background_color_90');
INSERT INTO `app_ajustes_tipo` VALUES ('578', '27', 'Combinacion 91', 'background_color_91');
INSERT INTO `app_ajustes_tipo` VALUES ('579', '27', 'Combinacion 92', 'background_color_92');
INSERT INTO `app_ajustes_tipo` VALUES ('580', '27', 'Combinacion 93', 'background_color_93');
INSERT INTO `app_ajustes_tipo` VALUES ('581', '27', 'Combinacion 94', 'background_color_94');
INSERT INTO `app_ajustes_tipo` VALUES ('582', '27', 'Combinacion 95', 'background_color_95');
INSERT INTO `app_ajustes_tipo` VALUES ('583', '28', 'Combinacion 90', 'background_color_90');
INSERT INTO `app_ajustes_tipo` VALUES ('584', '28', 'Combinacion 91', 'background_color_91');
INSERT INTO `app_ajustes_tipo` VALUES ('585', '28', 'Combinacion 92', 'background_color_92');
INSERT INTO `app_ajustes_tipo` VALUES ('586', '28', 'Combinacion 93', 'background_color_93');
INSERT INTO `app_ajustes_tipo` VALUES ('587', '28', 'Combinacion 94', 'background_color_94');
INSERT INTO `app_ajustes_tipo` VALUES ('588', '28', 'Combinacion 95', 'background_color_95');
INSERT INTO `app_ajustes_tipo` VALUES ('589', '35', 'checked 90', 'noti_checked90');
INSERT INTO `app_ajustes_tipo` VALUES ('590', '35', 'checked 91', 'noti_checked91');
INSERT INTO `app_ajustes_tipo` VALUES ('591', '35', 'checked 92', 'noti_checked92');
INSERT INTO `app_ajustes_tipo` VALUES ('592', '35', 'checked 93', 'noti_checked93');
INSERT INTO `app_ajustes_tipo` VALUES ('593', '35', 'checked 94', 'noti_checked94');
INSERT INTO `app_ajustes_tipo` VALUES ('594', '35', 'checked 95', 'noti_checked95');
INSERT INTO `app_ajustes_tipo` VALUES ('595', '34', 'hover 90', 'noti_hover90');
INSERT INTO `app_ajustes_tipo` VALUES ('596', '34', 'hover 91', 'noti_hover91');
INSERT INTO `app_ajustes_tipo` VALUES ('597', '34', 'hover 92', 'noti_hover92');
INSERT INTO `app_ajustes_tipo` VALUES ('598', '34', 'hover 93', 'noti_hover93');
INSERT INTO `app_ajustes_tipo` VALUES ('599', '34', 'hover 94', 'noti_hover94');
INSERT INTO `app_ajustes_tipo` VALUES ('600', '34', 'hover 95', 'noti_hover95');

-- ----------------------------
-- Table structure for app_areas_elementos
-- ----------------------------
DROP TABLE IF EXISTS `app_areas_elementos`;
CREATE TABLE `app_areas_elementos` (
  `idElementos` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Tipo_elemento` varchar(10) NOT NULL,
  `Orden` tinyint(3) unsigned NOT NULL,
  `idArea` int(11) unsigned NOT NULL,
  `idPagelist` int(11) unsigned NOT NULL,
  `body_col` tinyint(2) unsigned NOT NULL,
  `body_fil` tinyint(2) unsigned NOT NULL,
  `grid_color` varchar(30) NOT NULL,
  `grid_border` varchar(30) NOT NULL,
  `grid_shadow` varchar(30) NOT NULL,
  `grid_img` varchar(30) NOT NULL,
  `url_img` varchar(255) NOT NULL,
  `idTipoBoton` int(11) unsigned NOT NULL,
  `Archivo` varchar(120) NOT NULL,
  `idTipoAlerta` int(11) unsigned NOT NULL,
  `cercanos` tinyint(1) unsigned NOT NULL,
  `contactar` tinyint(1) unsigned NOT NULL,
  `desplegar` tinyint(1) unsigned NOT NULL,
  `login` tinyint(1) unsigned NOT NULL,
  `idGrupo` int(11) unsigned NOT NULL,
  `idCat` int(11) unsigned NOT NULL,
  `idListado` int(11) unsigned NOT NULL,
  `level_view` tinyint(1) unsigned NOT NULL,
  `pantalla` int(11) unsigned NOT NULL,
  `tipofuncion` tinyint(2) unsigned NOT NULL,
  `Fono` varchar(15) NOT NULL,
  PRIMARY KEY (`idElementos`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of app_areas_elementos
-- ----------------------------
INSERT INTO `app_areas_elementos` VALUES ('1', 'SosTaxi', '', '1', '1', '1', '0', '0', '', '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('2', 'Club America', '', '1', '2', '2', '0', '0', '', '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('3', 'Alerta Accidente', 'boton', '1', '3', '1', '1', '1', 'background_color_01', 'border_radius0', 'sombra_box_01', 'center_img_1', 'accidente.png', '1', 'em_alertas.php', '3', '2', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('4', 'Alertas', '', '1', '4', '1', '0', '0', '', '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('5', 'Calle Cerrada', 'boton', '2', '3', '1', '1', '1', 'background_color_01', 'border_radius0', 'sombra_box_01', 'center_img_1', 'close.png', '1', 'em_alertas.php', '4', '2', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('6', 'Incendio', 'boton', '3', '3', '1', '1', '1', 'background_color_01', 'border_radius0', 'sombra_box_01', 'center_img_1', 'incendio.png', '1', 'em_alertas.php', '12', '2', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('7', 'Peligro', 'boton', '4', '3', '1', '1', '1', 'background_color_01', 'border_radius0', 'sombra_box_01', 'center_img_1', 'peligro.png', '1', 'em_alertas.php', '5', '2', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('8', 'Persona sospechosa', 'boton', '5', '3', '1', '1', '1', 'background_color_01', 'border_radius0', 'sombra_box_01', 'center_img_1', 'ladron.png', '1', 'em_alertas.php', '6', '2', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('9', ' 	Solicitud de ayuda', 'boton', '6', '3', '1', '1', '1', 'background_color_01', 'border_radius0', 'sombra_box_01', 'center_img_1', 'sosclick.png', '1', 'em_alertas.php', '2', '2', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('10', 'Robo Vehiculo', '', '1', '5', '1', '0', '0', '', '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('11', 'Robo Vehiculo', 'boton', '1', '6', '1', '2', '1', 'background_color_02', 'border_radius0', 'sombra_box_01', 'center_img_10', 'robo_vehiculo.png', '2', 'em_robo_vehiculo.php', '7', '2', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('12', 'Noticias', '', '1', '7', '1', '0', '0', '', '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('13', 'Noticias - Todas las categoria', 'boton', '1', '8', '1', '1', '1', 'background_color_03', 'border_radius0', 'sombra_box_01', 'center_img_1', 'Noticias_todas_categorias.png', '3', 'list_noticias.php', '9999', '0', '0', '0', '2', '1', '0', '0', '1', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('14', 'Noticias - Una Categoria', 'boton', '2', '8', '1', '1', '1', 'background_color_03', 'border_radius0', 'sombra_box_01', 'center_img_1', 'Noticias_una_categoria.png', '4', 'list_noticias.php', '9999', '0', '0', '0', '2', '1', '1', '0', '2', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('15', 'Noticias - Una Noticia', 'boton', '3', '8', '1', '1', '1', 'background_color_03', 'border_radius0', 'sombra_box_01', 'center_img_1', 'Noticias_una_noticia.png', '5', 'list_noticias.php', '9999', '0', '0', '0', '2', '1', '1', '1', '3', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('16', 'Paginas', '', '1', '9', '1', '0', '0', '', '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('17', 'Paginas - Todas las categoria', 'boton', '1', '10', '1', '1', '1', 'background_color_05', 'border_radius0', 'sombra_box_01', 'center_img_1', 'paginas_todas_categorias.png', '6', 'list_paginas.php', '9999', '0', '0', '0', '2', '1', '0', '0', '1', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('18', 'Pagina - Una Categoria', 'boton', '2', '10', '1', '1', '1', 'background_color_08', 'border_radius0', 'sombra_box_01', 'center_img_1', 'pagina_una_categoria.png', '7', 'list_paginas.php', '9999', '0', '0', '0', '2', '1', '1', '0', '2', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('19', 'Pagina - Una pagina', 'boton', '3', '10', '1', '1', '1', 'background_color_01', 'border_radius0', 'sombra_box_01', 'center_img_1', 'pagina_una_pagina.png', '8', 'list_paginas.php', '9999', '0', '0', '0', '2', '1', '1', '1', '3', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('20', 'Recepcion Llamada Taxi', '', '1', '11', '1', '0', '0', '', '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('21', 'Recepcion Llamada Taxi', 'boton', '1', '12', '1', '2', '1', 'background_color_72', 'border_radius0', 'sombra_box_01', 'center_img_10', 'recepcion_llamada_taxi.png', '11', 'sis_taxi_recepcion.php', '11', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('22', 'Alerta Accidente', 'boton', '1', '13', '2', '1', '1', 'background_color_01', 'border_radius0', 'sombra_box_01', 'center_img_1', 'accidente.png', '1', 'em_alertas.php', '3', '2', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('23', 'Alertas', '', '1', '14', '2', '0', '0', '', '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('24', 'Calle Cerrada', 'boton', '2', '13', '2', '1', '1', 'background_color_01', 'border_radius0', 'sombra_box_01', 'center_img_1', 'close.png', '1', 'em_alertas.php', '4', '2', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('25', 'Incendio', 'boton', '3', '13', '2', '1', '1', 'background_color_01', 'border_radius0', 'sombra_box_01', 'center_img_1', 'incendio.png', '1', 'em_alertas.php', '12', '2', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('26', 'Peligro', 'boton', '4', '13', '2', '1', '1', 'background_color_01', 'border_radius0', 'sombra_box_01', 'center_img_1', 'peligro.png', '1', 'em_alertas.php', '5', '2', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('27', 'Persona sospechosa', 'boton', '5', '13', '2', '1', '1', 'background_color_01', 'border_radius0', 'sombra_box_01', 'center_img_1', 'ladron.png', '1', 'em_alertas.php', '6', '2', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('28', 'Solicitud de ayuda', 'boton', '6', '13', '2', '1', '1', 'background_color_01', 'border_radius0', 'sombra_box_01', 'center_img_1', 'sosclick.png', '1', 'em_alertas.php', '2', '2', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('29', 'Robo Vehiculo', '', '1', '15', '2', '0', '0', '', '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('30', 'Robo Vehiculo', 'boton', '1', '16', '2', '2', '1', 'background_color_33', 'border_radius0', 'sombra_box_01', 'center_img_10', 'robo_vehiculo.png', '2', 'em_robo_vehiculo.php', '7', '2', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('31', 'Noticias', '', '1', '17', '2', '0', '0', '', '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('32', 'Noticias - Todas las categoria', 'boton', '1', '18', '2', '1', '1', 'background_color_03', 'border_radius0', 'sombra_box_01', 'center_img_1', 'Noticias_todas_categorias.png', '3', 'list_noticias.php', '9999', '0', '0', '0', '2', '1', '0', '0', '1', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('33', 'Noticias - Una Categoria', 'boton', '2', '18', '2', '1', '1', 'background_color_03', 'border_radius0', 'sombra_box_01', 'center_img_1', 'Noticias_una_categoria.png', '4', 'list_noticias.php', '9999', '0', '0', '0', '2', '1', '1', '0', '2', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('34', 'Noticias - Una Noticia', 'boton', '3', '18', '2', '1', '1', 'background_color_03', 'border_radius0', 'sombra_box_01', 'center_img_1', 'Noticias_una_noticia.png', '5', 'list_noticias.php', '9999', '0', '0', '0', '2', '1', '1', '1', '3', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('35', 'Paginas', '', '1', '19', '2', '0', '0', '', '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('36', 'Paginas - Todas las categoria', 'boton', '1', '20', '2', '1', '1', 'background_color_05', 'border_radius0', 'sombra_box_01', 'center_img_1', 'paginas_todas_categorias.png', '6', 'list_paginas.php', '9999', '0', '0', '0', '2', '1', '0', '0', '1', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('37', 'Pagina - Una Categoria', 'boton', '2', '20', '2', '1', '1', 'background_color_08', 'border_radius0', 'sombra_box_01', 'center_img_1', 'pagina_una_categoria.png', '7', 'list_paginas.php', '9999', '0', '0', '0', '2', '1', '1', '0', '2', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('38', 'Pagina - Una pagina', 'boton', '3', '20', '2', '1', '1', 'background_color_01', 'border_radius0', 'sombra_box_01', 'center_img_1', 'pagina_una_pagina.png', '8', 'list_paginas.php', '9999', '0', '0', '0', '2', '1', '1', '1', '3', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('39', 'Llamada taxi', '', '1', '21', '2', '0', '0', '', '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('40', 'Recepcion Llamada Taxi', 'boton', '1', '22', '2', '2', '1', 'background_color_11', 'border_radius0', 'sombra_box_01', 'center_img_10', 'llamada_taxi.png', '10', 'sis_taxi_solicitud.php', '10', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('41', 'Otros botones', '', '1', '23', '2', '0', '0', '', '', '', '', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('42', 'Modificar datos de usuario', 'boton', '1', '24', '2', '1', '1', 'background_color_42', 'border_radius5', 'sombra_box_01', 'center_img_1', 'mod_datos_usr.png', '13', 'usr_datos.php', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('43', 'Llamar a bomberos', 'boton', '2', '24', '2', '1', '1', 'background_color_08', 'border_radius5', 'sombra_box_01', 'center_img_1', 'llamar_bomberos.png', '14', 'ninguno', '0', '0', '0', '0', '2', '0', '0', '0', '0', '1', '11', '88888888');

-- ----------------------------
-- Table structure for app_areas_listado
-- ----------------------------
DROP TABLE IF EXISTS `app_areas_listado`;
CREATE TABLE `app_areas_listado` (
  `idArea` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Orden` tinyint(2) unsigned NOT NULL,
  `idPagelist` int(11) unsigned NOT NULL,
  `Codigo` varchar(30) NOT NULL,
  PRIMARY KEY (`idArea`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of app_areas_listado
-- ----------------------------
INSERT INTO `app_areas_listado` VALUES ('1', 'Titulo', '1', '1', 'subtitle fancy');
INSERT INTO `app_areas_listado` VALUES ('2', 'Titulo', '1', '2', 'subtitle fancy');
INSERT INTO `app_areas_listado` VALUES ('3', 'Botones', '3', '1', 'tb_1-5');
INSERT INTO `app_areas_listado` VALUES ('4', 'Alertas', '2', '1', 'headline1');
INSERT INTO `app_areas_listado` VALUES ('5', 'Robo Vehiculo', '4', '1', 'headline1');
INSERT INTO `app_areas_listado` VALUES ('6', 'Botones robo', '5', '1', 'tb_1-2');
INSERT INTO `app_areas_listado` VALUES ('7', 'Noticias', '6', '1', 'headline1');
INSERT INTO `app_areas_listado` VALUES ('8', 'Botones noticias', '7', '1', 'tb_1-3');
INSERT INTO `app_areas_listado` VALUES ('9', 'Paginas', '8', '1', 'headline1');
INSERT INTO `app_areas_listado` VALUES ('10', 'Botones paginas', '9', '1', 'tb_1-3');
INSERT INTO `app_areas_listado` VALUES ('11', 'Sistema', '10', '1', 'headline1');
INSERT INTO `app_areas_listado` VALUES ('12', 'llamada taxi', '11', '1', 'tb_1-2');
INSERT INTO `app_areas_listado` VALUES ('13', 'Botones', '3', '2', 'tb_1-5');
INSERT INTO `app_areas_listado` VALUES ('14', 'Alertas', '2', '2', 'headline1');
INSERT INTO `app_areas_listado` VALUES ('15', 'Robo Vehiculo', '4', '2', 'headline1');
INSERT INTO `app_areas_listado` VALUES ('16', 'Botones robo', '5', '2', 'tb_1-2');
INSERT INTO `app_areas_listado` VALUES ('17', 'Noticias', '6', '2', 'headline1');
INSERT INTO `app_areas_listado` VALUES ('18', 'Botones noticias', '7', '2', 'tb_1-3');
INSERT INTO `app_areas_listado` VALUES ('19', 'Paginas', '8', '2', 'headline1');
INSERT INTO `app_areas_listado` VALUES ('20', 'Botones paginas', '9', '2', 'tb_1-3');
INSERT INTO `app_areas_listado` VALUES ('21', 'Sistema', '10', '2', 'headline1');
INSERT INTO `app_areas_listado` VALUES ('22', 'llamada taxi', '11', '2', 'tb_1-2');
INSERT INTO `app_areas_listado` VALUES ('23', 'Otros botones', '12', '2', 'subtitle fancy');
INSERT INTO `app_areas_listado` VALUES ('24', 'Otros botones2', '13', '2', 'tb_1-5');

-- ----------------------------
-- Table structure for app_areas_pagelist
-- ----------------------------
DROP TABLE IF EXISTS `app_areas_pagelist`;
CREATE TABLE `app_areas_pagelist` (
  `idPagelist` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `app_conf` int(11) unsigned NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idPagelist`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of app_areas_pagelist
-- ----------------------------
INSERT INTO `app_areas_pagelist` VALUES ('1', '2', 'Sostaxi - Principal');
INSERT INTO `app_areas_pagelist` VALUES ('2', '1', 'Club America - Principal');

-- ----------------------------
-- Table structure for app_form_color
-- ----------------------------
DROP TABLE IF EXISTS `app_form_color`;
CREATE TABLE `app_form_color` (
  `idFormColor` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Codigo` varchar(30) NOT NULL,
  `CSS` varchar(30) NOT NULL,
  PRIMARY KEY (`idFormColor`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of app_form_color
-- ----------------------------
INSERT INTO `app_form_color` VALUES ('1', 'Combinacion 01', 'form_color_1', '3a57af');
INSERT INTO `app_form_color` VALUES ('2', 'Combinacion 02', 'form_color_2', 'E6E6E6');
INSERT INTO `app_form_color` VALUES ('3', 'Combinacion 03', 'form_color_3', '0078E7');
INSERT INTO `app_form_color` VALUES ('4', 'Combinacion 04', 'form_color_4', '42B8DD');
INSERT INTO `app_form_color` VALUES ('5', 'Combinacion 05', 'form_color_5', '1CB841');
INSERT INTO `app_form_color` VALUES ('6', 'Combinacion 06', 'form_color_6', 'CA3C3C');
INSERT INTO `app_form_color` VALUES ('7', 'Combinacion 07', 'form_color_7', 'DF7514');
INSERT INTO `app_form_color` VALUES ('8', 'Combinacion 08', 'form_color_8', 'FFA84C');
INSERT INTO `app_form_color` VALUES ('9', 'Combinacion 09', 'form_color_9', '7ABCFF');
INSERT INTO `app_form_color` VALUES ('10', 'Combinacion 10', 'form_color_10', '8FC400');
INSERT INTO `app_form_color` VALUES ('11', 'Combinacion 11', 'form_color_11', 'E53C16');
INSERT INTO `app_form_color` VALUES ('12', 'Combinacion 12', 'form_color_12', '000');
INSERT INTO `app_form_color` VALUES ('13', 'Combinacion 13', 'form_color_13', '575757');
INSERT INTO `app_form_color` VALUES ('14', 'Combinacion 14', 'form_color_14', 'EDEDED');
INSERT INTO `app_form_color` VALUES ('15', 'Combinacion 15', 'form_color_15', 'BF404F');
INSERT INTO `app_form_color` VALUES ('16', 'Combinacion 16', 'form_color_16', 'FEB1D3');
INSERT INTO `app_form_color` VALUES ('17', 'Combinacion 17', 'form_color_17', 'CBE0F5');
INSERT INTO `app_form_color` VALUES ('18', 'Combinacion 18', 'form_color_18', '7089B3');
INSERT INTO `app_form_color` VALUES ('19', 'Combinacion 19', 'form_color_19', 'EE432E');
INSERT INTO `app_form_color` VALUES ('20', 'Combinacion 20', 'form_color_20', '38538C');
INSERT INTO `app_form_color` VALUES ('21', 'Combinacion 21', 'form_color_21', '7038E0');
INSERT INTO `app_form_color` VALUES ('22', 'Combinacion 22', 'form_color_22', '1A5AD9');
INSERT INTO `app_form_color` VALUES ('23', 'Combinacion 23', 'form_color_23', '377AD0');
INSERT INTO `app_form_color` VALUES ('24', 'Combinacion 24', 'form_color_24', '36518F');
INSERT INTO `app_form_color` VALUES ('25', 'Combinacion 25', 'form_color_25', 'D2D2D2');

-- ----------------------------
-- Table structure for app_grilla
-- ----------------------------
DROP TABLE IF EXISTS `app_grilla`;
CREATE TABLE `app_grilla` (
  `idGrilla` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Codigo` varchar(30) NOT NULL,
  PRIMARY KEY (`idGrilla`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of app_grilla
-- ----------------------------
INSERT INTO `app_grilla` VALUES ('1', 'Modelo 2 Celdas', 'tb_1-2');
INSERT INTO `app_grilla` VALUES ('2', 'Modelo 3 Celdas', 'tb_1-3');
INSERT INTO `app_grilla` VALUES ('3', 'Modelo 4 Celdas', 'tb_1-4');
INSERT INTO `app_grilla` VALUES ('4', 'Modelo 5 Celdas', 'tb_1-5');
INSERT INTO `app_grilla` VALUES ('5', 'Imagen', 'tb_img');
INSERT INTO `app_grilla` VALUES ('6', 'Menu superior 1', 'tb_menu_sup');
INSERT INTO `app_grilla` VALUES ('7', 'Titulo 1', 'subtitle fancy');
INSERT INTO `app_grilla` VALUES ('8', 'Titulo 2', 'headline1');
INSERT INTO `app_grilla` VALUES ('9', 'Titulo 3', 'headline2');
INSERT INTO `app_grilla` VALUES ('10', 'Titulo 4', 'headline3');
INSERT INTO `app_grilla` VALUES ('12', 'Ventana usuario', 'tb_user');

-- ----------------------------
-- Table structure for app_tipo_boton
-- ----------------------------
DROP TABLE IF EXISTS `app_tipo_boton`;
CREATE TABLE `app_tipo_boton` (
  `idTipoBoton` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Archivo` varchar(120) NOT NULL,
  `fun` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`idTipoBoton`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of app_tipo_boton
-- ----------------------------
INSERT INTO `app_tipo_boton` VALUES ('1', 'Alertas', 'em_alertas.php', '1');
INSERT INTO `app_tipo_boton` VALUES ('2', 'Robo Vehiculo', 'em_robo_vehiculo.php', '1');
INSERT INTO `app_tipo_boton` VALUES ('3', 'Noticias - Todas las categoria', 'list_noticias.php', '2');
INSERT INTO `app_tipo_boton` VALUES ('4', 'Noticias - Una categoria', 'list_noticias.php', '3');
INSERT INTO `app_tipo_boton` VALUES ('5', 'Noticias - Una Noticia', 'list_noticias.php', '4');
INSERT INTO `app_tipo_boton` VALUES ('6', 'Paginas - Todas las categoria', 'list_paginas.php', '5');
INSERT INTO `app_tipo_boton` VALUES ('7', 'Paginas - Una categoria', 'list_paginas.php', '6');
INSERT INTO `app_tipo_boton` VALUES ('8', 'Paginas - Una Pagina', 'list_paginas.php', '7');
INSERT INTO `app_tipo_boton` VALUES ('9', 'Notificaciones', 'notificaciones.php', '8');
INSERT INTO `app_tipo_boton` VALUES ('10', 'Solicitud Taxi', 'sis_taxi_solicitud.php', '11');
INSERT INTO `app_tipo_boton` VALUES ('11', 'Recepcion Llamada Taxi', 'sis_taxi_recepcion.php', '8');
INSERT INTO `app_tipo_boton` VALUES ('12', 'Abrir nueva pantalla', 'principal.php', '9');
INSERT INTO `app_tipo_boton` VALUES ('13', 'Modificar datos de usuario', 'usr_datos.php', '10');
INSERT INTO `app_tipo_boton` VALUES ('14', 'Llamada Telefonica', 'ninguno', '11');

-- ----------------------------
-- Table structure for clientes_contacto_amigos
-- ----------------------------
DROP TABLE IF EXISTS `clientes_contacto_amigos`;
CREATE TABLE `clientes_contacto_amigos` (
  `idAmigo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `idGrupo` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Fono` varchar(15) NOT NULL,
  `Email` varchar(120) NOT NULL,
  PRIMARY KEY (`idAmigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_contacto_amigos
-- ----------------------------

-- ----------------------------
-- Table structure for clientes_contacto_empresas
-- ----------------------------
DROP TABLE IF EXISTS `clientes_contacto_empresas`;
CREATE TABLE `clientes_contacto_empresas` (
  `idEmpresa` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Fono` varchar(15) NOT NULL,
  `Email` varchar(120) NOT NULL,
  PRIMARY KEY (`idEmpresa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_contacto_empresas
-- ----------------------------

-- ----------------------------
-- Table structure for clientes_listado
-- ----------------------------
DROP TABLE IF EXISTS `clientes_listado`;
CREATE TABLE `clientes_listado` (
  `idCliente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fcreacion` date NOT NULL,
  `usuario` varchar(120) NOT NULL,
  `password` char(32) NOT NULL,
  `idTipoCliente` int(11) unsigned NOT NULL,
  `Estado` int(11) unsigned NOT NULL,
  `email` varchar(120) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Apellido_Paterno` varchar(120) NOT NULL,
  `Apellido_Materno` varchar(120) NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `fNacimiento` date NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `Fono1` varchar(15) NOT NULL,
  `Fono2` varchar(15) NOT NULL,
  `Url_imagen` varchar(255) NOT NULL,
  `Pais` varchar(120) NOT NULL,
  `idCiudad` int(11) unsigned NOT NULL,
  `idComuna` int(11) unsigned NOT NULL,
  `Ultimo_acceso` date NOT NULL,
  `primer_ingreso` tinyint(1) unsigned NOT NULL,
  `Imei` varchar(120) NOT NULL,
  `Gsm` varchar(500) NOT NULL,
  `Latitud` double NOT NULL,
  `Longitud` double NOT NULL,
  `Radio` tinyint(2) unsigned NOT NULL,
  `Alarma` char(2) NOT NULL,
  `EstadoCarrera` int(11) unsigned NOT NULL,
  `dispositivo` varchar(20) NOT NULL,
  `create_pass` varchar(120) NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_listado
-- ----------------------------
INSERT INTO `clientes_listado` VALUES ('1', '2014-08-05', 'tenshi98', '81dc9bdb52d04dc20036dbd8313ed055', '1', '1', 'tenshi98@gmail.com', 'VICTOR HUGO', 'REYES ', 'GALVEZ ', '16029464-7', 'M', '2014-12-15', 'LOS LIRIOS 455', '8512517', '94109065', 'http://lh4.ggpht.com/-SwsRNhEBmdM/U3cTkIKU_6I/AAAAAAAANh0/cqx4OagcPAA/s400-o/8ACVgddF.png', 'Chile', '13', '100', '2014-12-07', '2', '355747055444738', 'APA91bGt_ALPwjhnmodzKVckNxPmc8ysWArwG30rZkgROaXq91WmsYRBw-PCdOXrAOX4qjom8kwHZWyHCreqLGsur3h46mZtlv0NlgWrjfr-gAwIzZPeom-OgZn9r0AQRFROFUuNZb1Asq1Y4D4PfCYS9A6kLKg_ow', '-33.4', '-70.575', '1', 'Si', '45', 'android', '');
INSERT INTO `clientes_listado` VALUES ('2', '2014-08-05', 'test0', '81dc9bdb52d04dc20036dbd8313ed055', '2', '1', 'mloprz@gmail.com', 'MARCELO IVAN', 'LOPEZ ', 'BETANCOURT ', '8114722-1', 'M', '2014-11-01', 'Profesor Alcaino', '', '98215180', 'http://lh4.ggpht.com/-SwsRNhEBmdM/U3cTkIKU_6I/AAAAAAAANh0/cqx4OagcPAA/s400-o/8ACVgddF.png', 'Chile', '13', '84', '2014-08-05', '2', '355747055444738', 'APA91bGt_ALPwjhnmodzKVckNxPmc8ysWArwG30rZkgROaXq91WmsYRBw-PCdOXrAOX4qjom8kwHZWyHCreqLGsur3h46mZtlv0NlgWrjfr-gAwIzZPeom-OgZn9r0AQRFROFUuNZb1Asq1Y4D4PfCYS9A6kLKg_ow', '-33.4006285', '-70.5750899', '1', 'Si', '45', 'android', '');
INSERT INTO `clientes_listado` VALUES ('3', '2014-11-25', 'test1', '81dc9bdb52d04dc20036dbd8313ed055', '1', '1', 'test@test.cl', 'Normal', 'Apellidopat1', 'Apellidomat1', '9999999-9', 'M', '0000-00-00', 'Profesor Alcaino', '', '', 'http://shots.ikbis.com/image/181729/screen/abu_7arb_hotmail_1_.com_3e65caee.jpg', 'Chile', '13', '100', '0000-00-00', '2', '355747055444738', 'APA91bGt_ALPwjhnmodzKVckNxPmc8ysWArwG30rZkgROaXq91WmsYRBw-PCdOXrAOX4qjom8kwHZWyHCreqLGsur3h46mZtlv0NlgWrjfr-gAwIzZPeom-OgZn9r0AQRFROFUuNZb1Asq1Y4D4PfCYS9A6kLKg_ow', '-33.4006285', '-70.5750899', '1', 'Si', '45', 'android', '046e5');
INSERT INTO `clientes_listado` VALUES ('4', '2014-11-25', 'test2', '81dc9bdb52d04dc20036dbd8313ed055', '2', '1', 'test2@test.cl', 'Taxi', 'Apellidopat', 'Apellidomat', '9999999-9', 'M', '0000-00-00', 'Profesor Alcaino', '', '', 'http://lh4.ggpht.com/-SwsRNhEBmdM/U3cTkIKU_6I/AAAAAAAANh0/cqx4OagcPAA/s400-o/8ACVgddF.png', 'Chile', '13', '100', '0000-00-00', '2', '355747055444738', 'APA91bGt_ALPwjhnmodzKVckNxPmc8ysWArwG30rZkgROaXq91WmsYRBw-PCdOXrAOX4qjom8kwHZWyHCreqLGsur3h46mZtlv0NlgWrjfr-gAwIzZPeom-OgZn9r0AQRFROFUuNZb1Asq1Y4D4PfCYS9A6kLKg_ow', '-33.4006285', '-70.5750899', '1', 'Si', '45', 'android', '');

-- ----------------------------
-- Table structure for clientes_notificaciones
-- ----------------------------
DROP TABLE IF EXISTS `clientes_notificaciones`;
CREATE TABLE `clientes_notificaciones` (
  `idNotificacion` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idAlerta` bigint(20) unsigned NOT NULL,
  `idCliente` int(11) unsigned NOT NULL,
  `idRecibidor` int(11) unsigned NOT NULL,
  `idTipoAlerta` int(11) unsigned NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `Fecha` date NOT NULL,
  `Leida` int(11) unsigned NOT NULL,
  `idVehiculo` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idNotificacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_notificaciones
-- ----------------------------

-- ----------------------------
-- Table structure for clientes_tipos
-- ----------------------------
DROP TABLE IF EXISTS `clientes_tipos`;
CREATE TABLE `clientes_tipos` (
  `idTipoCliente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `imgLogo` varchar(250) NOT NULL,
  `email_principal` varchar(60) NOT NULL,
  `RazonSocial` varchar(60) NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `Fono` varchar(15) NOT NULL,
  `Ciudad` varchar(60) NOT NULL,
  `Comuna` varchar(60) NOT NULL,
  PRIMARY KEY (`idTipoCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_tipos
-- ----------------------------
INSERT INTO `clientes_tipos` VALUES ('1', 'Normal', 'logo_normal.png', 'normal@normal.com', 'Empresa Normal', '16029464-7', 'direccion', '12345678', 'asd', 'asd');
INSERT INTO `clientes_tipos` VALUES ('2', 'Taxista', 'logo_sm.png', 'sostaxi@sostaxi.com', 'sostaxi', '16029464-7', 'sostaxi', '12345678', 'sostaxi', 'sostaxi');

-- ----------------------------
-- Table structure for clientes_vehiculos
-- ----------------------------
DROP TABLE IF EXISTS `clientes_vehiculos`;
CREATE TABLE `clientes_vehiculos` (
  `idVehiculo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `PPU` varchar(10) NOT NULL,
  `idMarca` int(11) unsigned NOT NULL,
  `idModelo` int(11) unsigned NOT NULL,
  `idTransmision` int(11) unsigned NOT NULL,
  `fTransferencia` date NOT NULL,
  `idColorV_1` int(11) unsigned NOT NULL,
  `idColorV_2` int(11) unsigned NOT NULL,
  `fFabricacion` date NOT NULL,
  `N_Motor` varchar(60) NOT NULL,
  `N_Chasis` varchar(60) NOT NULL,
  `Obs` text NOT NULL,
  PRIMARY KEY (`idVehiculo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_vehiculos
-- ----------------------------
INSERT INTO `clientes_vehiculos` VALUES ('1', '1', 'aa1856', '1', '1', '2', '2015-01-01', '1', '1', '2015-01-21', 'asdasd', 'asdasd', '');

-- ----------------------------
-- Table structure for clientes_vehiculos_img
-- ----------------------------
DROP TABLE IF EXISTS `clientes_vehiculos_img`;
CREATE TABLE `clientes_vehiculos_img` (
  `idImagen` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idVehiculo` int(11) unsigned NOT NULL,
  `idCliente` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Nombre` varchar(220) NOT NULL,
  PRIMARY KEY (`idImagen`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_vehiculos_img
-- ----------------------------

-- ----------------------------
-- Table structure for core_datos
-- ----------------------------
DROP TABLE IF EXISTS `core_datos`;
CREATE TABLE `core_datos` (
  `id_Datos` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email_principal` varchar(60) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `Fono` varchar(15) NOT NULL,
  `Ciudad` varchar(60) NOT NULL,
  `Comuna` varchar(60) NOT NULL,
  PRIMARY KEY (`id_Datos`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_datos
-- ----------------------------
INSERT INTO `core_datos` VALUES ('1', 'asd@bla21.cl', 'Corporacion Test', '16029464-7', 'Los Lirios 0936', '8512517', 'Santiago', 'Puente Alto');

-- ----------------------------
-- Table structure for core_permisos
-- ----------------------------
DROP TABLE IF EXISTS `core_permisos`;
CREATE TABLE `core_permisos` (
  `idAdmpm` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_pmcat` int(11) unsigned NOT NULL,
  `Direccionweb` varchar(50) NOT NULL,
  `Direccionbase` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `mode` tinyint(2) unsigned NOT NULL,
  `visualizacion` varchar(30) NOT NULL,
  PRIMARY KEY (`idAdmpm`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_permisos
-- ----------------------------
INSERT INTO `core_permisos` VALUES ('1', '2', 'admin_clientes.php?pagina=1', 'admin_clientes.php', 'Clientes - Listado', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('2', '2', 'admin_clientes_activation.php?pagina=1', 'admin_clientes_activation.php', 'Clientes - Cambiar Estado', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('3', '1', 'admin_usr.php?pagina=1', 'admin_usr.php', 'Usuarios - Administracion', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('4', '1', 'admin_usr_activation.php?pagina=1', 'admin_usr_activation.php', 'Usuarios - Cambiar Estado', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('5', '1', 'admin_usr_password.php?pagina=1', 'admin_usr_password.php', 'Usuarios - Cambio clave', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('6', '1', 'admin_usr_permisos.php?pagina=1', 'admin_usr_permisos.php', 'Usuarios - Asignar Permisos', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('7', '1', 'admin_usr_type.php?pagina=1', 'admin_usr_type.php', 'Usuarios - Cambiar Tipo', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('8', '12', 'mnt_ubicacion_comunas.php?pagina=1', 'mnt_ubicacion_comunas.php', 'MNT Ubicacion Comunas', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('9', '4', 'gestion_mensajes.php', 'gestion_mensajes.php', 'Mensajes Envio', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('10', '6', 'alertas_geolocalizacion.php', 'alertas_geolocalizacion.php', 'Alertas - Geolocalizacion', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('11', '6', 'alertas_listado.php?pagina=1', 'alertas_listado.php', 'Alertas - Listado', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('12', '6', 'alertas_listado_historico.php?pagina=1', 'alertas_listado_historico.php', 'Alertas - Historico', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('13', '6', 'alertas_cliente.php?pagina=1', 'alertas_cliente.php', 'Alertas - Por cliente', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('14', '4', 'gestion_mensajes_historico.php', 'gestion_mensajes_historico.php', 'Mensajes Historico', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('15', '3', 'mnt_fonos.php?pagina=1', 'mnt_fonos.php', 'MNT Numeros de Contacto', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('16', '12', 'mnt_ubicacion_region.php?pagina=1', 'mnt_ubicacion_region.php', 'MNT Ubicacion Region', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('17', '3', 'mnt_grupos.php?pagina=1', 'mnt_grupos.php', 'MNT Grupos', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('18', '3', 'admin_datos.php', 'admin_datos.php', 'MNT Datos de la empresa', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('29', '11', 'apariencia_grillas.php?pagina=1', 'apariencia_grillas.php', 'MNT App - Grillas', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('30', '11', 'apariencia_ancho_img.php?pagina=1', 'apariencia_ancho_img.php', 'MNT App - Tamaño de imagen', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('21', '5', 'apariencia_principal.php?pagina=1', 'apariencia_principal.php', 'APP - Apariencia Visual - Estilo', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('22', '11', 'apariencia_fondo.php?pagina=1', 'apariencia_fondo.php', 'MNT App - Color de Fondo', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('23', '11', 'apariencia_color_botones.php?pagina=1', 'apariencia_color_botones.php', 'MNT App - Color de botones', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('24', '11', 'apariencia_colortexto.php?pagina=1', 'apariencia_colortexto.php', 'MNT App - Color del texto', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('25', '11', 'apariencia_ancho.php?pagina=1', 'apariencia_ancho.php', 'MNT App - Ancho contenedores', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('26', '11', 'apariencia_borderradius.php?pagina=1', 'apariencia_borderradius.php', 'MNT App - Bordes redondeados', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('27', '11', 'apariencia_sombras.php?pagina=1', 'apariencia_sombras.php', 'MNT App - Tipos de Sombras', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('28', '11', 'apariencia_formcolor.php?pagina=1', 'apariencia_formcolor.php', 'MNT App - Color de formulario', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('39', '7', 'robos_listado.php?pagina=1', 'robos_listado.php', 'Robos - Listado', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('65', '5', 'comportamiento_clientes_sistemas.php', 'comportamiento_clientes_sistemas.php', 'APP - Sistemas Relacionados', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('32', '5', 'comportamiento_principal.php?pagina=1', 'comportamiento_principal.php', 'APP - Comportamiento', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('33', '11', 'apariencia_sizetext.php?pagina=1', 'apariencia_sizetext.php', 'MNT App - Tamaños texto', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('34', '11', 'apariencia_border.php?pagina=1', 'apariencia_border.php', 'MNT App - Bordes de contenedores', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('35', '3', 'alertas_tipos.php?pagina=1', 'alertas_tipos.php', 'MNT Alertas - Tipos de alerta', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('36', '5', 'comportamiento_botones.php?pagina=1', 'comportamiento_botones.php', 'APP - Apariencia Visual - Comportamiento', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('37', '5', 'comportamiento_sistemas.php?pagina=1', 'comportamiento_sistemas.php', 'APP - Sistemas', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('38', '5', 'comportamiento_botones_tipos.php?pagina=1', 'comportamiento_botones_tipos.php', 'APP - Administrar Tipos de Botones', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('40', '7', 'robos_geolocalizacion.php?pagina=1', 'robos_geolocalizacion.php', 'Robos - Geolocalizacion', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('41', '7', 'robos_clientes.php?pagina=1', 'robos_clientes.php', 'Robos - Por cliente', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('42', '7', 'robos_listado_historico.php?pagina=1', 'robos_listado_historico.php', 'Robos - Historico', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('43', '2', 'admin_clientes_vehiculos.php?pagina=1', 'admin_clientes_vehiculos.php', 'Clientes - Vehiculos', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('44', '13', 'vehiculos_marcas.php?pagina=1', 'vehiculos_marcas.php', 'MNT Vehiculos - Marcas', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('45', '13', 'vehiculos_modelos.php?pagina=1', 'vehiculos_modelos.php', 'MNT Vehiculos - Modelos', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('46', '13', 'vehiculos_transmision.php?pagina=1', 'vehiculos_transmision.php', 'MNT Vehiculos - Transmision', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('47', '13', 'vehiculos_colores.php?pagina=1', 'vehiculos_colores.php', 'MNT Vehiculos - Colores', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('48', '11', 'apariencia_tablas_degradados.php?pagina=1', 'apariencia_tablas_degradados.php', 'MNT App - Tablas-degradados', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('49', '11', 'apariencia_tablas_separador.php?pagina=1', 'apariencia_tablas_separador.php', 'MNT App - Tablas-separador', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('50', '11', 'apariencia_alto.php?pagina=1', 'apariencia_alto.php', 'MNT App - Alto contenedores', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('51', '11', 'apariencia_noti_colorchecked.php?pagina=1', 'apariencia_noti_colorchecked.php', 'MNT App - Notificaciones tab checked', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('52', '11', 'apariencia_noti_colorhover.php?pagina=1', 'apariencia_noti_colorhover.php', 'MNT App - Notificaciones tab hover', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('53', '8', 'paginas_grupos.php?pagina=1', 'paginas_grupos.php', 'Paginas - Grupos de Categorias', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('54', '8', 'paginas_categorias.php?pagina=1', 'paginas_categorias.php', 'Paginas - Categorias', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('55', '8', 'paginas_listado.php?pagina=1', 'paginas_listado.php', 'Paginas - Listado', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('56', '9', 'noticias_categorias.php?pagina=1', 'noticias_categorias.php', 'Noticias - Categorias', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('57', '9', 'noticias_grupos.php?pagina=1', 'noticias_grupos.php', 'Noticias - Grupos de Categorias', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('58', '9', 'noticias_listado.php?pagina=1', 'noticias_listado.php', 'Noticias - Listado', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('59', '11', 'apariencia_noti_label.php?pagina=1', 'apariencia_noti_label.php', 'MNT App - Notificaciones label', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('60', '11', 'apariencia_noti_label_select.php?pagina=1', 'apariencia_noti_label_select.php', 'MNT App - Notificaciones label seleccionado', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('61', '10', 'carreras_listado.php?pagina=1', 'carreras_listado.php', 'Carreras - Estado de Taxistas', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('62', '10', 'carreras_geolocalizacion.php', 'carreras_geolocalizacion.php', 'Carreras - Geolocalizacion', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('63', '10', 'carreras_listado_historico.php', 'carreras_listado_historico.php', 'Carreras - Historico de Carreras', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('64', '5', 'comportamiento_principal2.php', 'comportamiento_principal2.php', 'APP - Comportamiento General', '1', 'SuperAdmin');
INSERT INTO `core_permisos` VALUES ('66', '10', 'taxistas_activation.php?pagina=1', 'taxistas_activation.php', 'Taxistas - Cambiar Estado', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('67', '10', 'taxistas_listado.php?pagina=1', 'taxistas_listado.php', 'Taxistas - Listado', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('68', '10', 'taxistas_vehiculos.php?pagina=1', 'taxistas_vehiculos.php', 'Taxistas - Vehiculos', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('69', '10', 'taxistas_sistema.php', 'taxistas_sistema.php', 'Taxistas - Sistema', '1', 'Todos');
INSERT INTO `core_permisos` VALUES ('70', '10', 'taxistas_facturacion.php', 'taxistas_facturacion.php', 'Taxistas - Facturacion', '1', 'Todos');

-- ----------------------------
-- Table structure for core_permisos_cat
-- ----------------------------
DROP TABLE IF EXISTS `core_permisos_cat`;
CREATE TABLE `core_permisos_cat` (
  `id_pmcat` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(60) NOT NULL,
  `mode` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id_pmcat`,`mode`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_permisos_cat
-- ----------------------------
INSERT INTO `core_permisos_cat` VALUES ('1', 'Usuarios', '1');
INSERT INTO `core_permisos_cat` VALUES ('2', 'Clientes', '1');
INSERT INTO `core_permisos_cat` VALUES ('3', 'Mantenimiento', '1');
INSERT INTO `core_permisos_cat` VALUES ('4', 'Gestion', '1');
INSERT INTO `core_permisos_cat` VALUES ('5', 'App', '1');
INSERT INTO `core_permisos_cat` VALUES ('6', 'Alertas', '1');
INSERT INTO `core_permisos_cat` VALUES ('7', 'Robos', '1');
INSERT INTO `core_permisos_cat` VALUES ('8', 'Paginas', '1');
INSERT INTO `core_permisos_cat` VALUES ('9', 'Noticias', '1');
INSERT INTO `core_permisos_cat` VALUES ('10', 'Taxistas', '1');
INSERT INTO `core_permisos_cat` VALUES ('11', 'Mantenimiento APP', '1');
INSERT INTO `core_permisos_cat` VALUES ('12', 'Mantenimiento Ubicacion', '1');
INSERT INTO `core_permisos_cat` VALUES ('13', 'Mantenimiento Vehiculos', '1');

-- ----------------------------
-- Table structure for core_theme_colors
-- ----------------------------
DROP TABLE IF EXISTS `core_theme_colors`;
CREATE TABLE `core_theme_colors` (
  `idTheme` tinyint(3) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTheme`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of core_theme_colors
-- ----------------------------
INSERT INTO `core_theme_colors` VALUES ('1', 'Por defecto');
INSERT INTO `core_theme_colors` VALUES ('2', 'Azul');

-- ----------------------------
-- Table structure for detalle_general
-- ----------------------------
DROP TABLE IF EXISTS `detalle_general`;
CREATE TABLE `detalle_general` (
  `id_Detalle` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Tipo` smallint(5) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`id_Detalle`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detalle_general
-- ----------------------------
INSERT INTO `detalle_general` VALUES ('1', '1', 'Activo');
INSERT INTO `detalle_general` VALUES ('2', '1', 'Bloqueado');
INSERT INTO `detalle_general` VALUES ('3', '2', 'Interno');
INSERT INTO `detalle_general` VALUES ('4', '2', 'Externo');
INSERT INTO `detalle_general` VALUES ('5', '3', 'Abierta');
INSERT INTO `detalle_general` VALUES ('6', '3', 'Cerrada');
INSERT INTO `detalle_general` VALUES ('7', '4', 'No leido');
INSERT INTO `detalle_general` VALUES ('8', '4', 'Leido');
INSERT INTO `detalle_general` VALUES ('9', '5', 'Asistido');
INSERT INTO `detalle_general` VALUES ('10', '5', 'No Asistido');
INSERT INTO `detalle_general` VALUES ('11', '6', 'Padres');
INSERT INTO `detalle_general` VALUES ('12', '6', 'Hermanos');
INSERT INTO `detalle_general` VALUES ('13', '6', 'Conyugue');
INSERT INTO `detalle_general` VALUES ('14', '6', 'Hijos');
INSERT INTO `detalle_general` VALUES ('15', '6', 'Nietos');
INSERT INTO `detalle_general` VALUES ('16', '6', 'Abuelos');
INSERT INTO `detalle_general` VALUES ('17', '7', 'Normal');
INSERT INTO `detalle_general` VALUES ('18', '8', 'Informacion');
INSERT INTO `detalle_general` VALUES ('19', '8', 'Mensaje');
INSERT INTO `detalle_general` VALUES ('20', '8', 'Oferta');
INSERT INTO `detalle_general` VALUES ('21', '1', 'Inactivo');
INSERT INTO `detalle_general` VALUES ('22', '9', 'Alto contenedor');
INSERT INTO `detalle_general` VALUES ('23', '9', 'Ancho contenedor');
INSERT INTO `detalle_general` VALUES ('24', '9', 'Ancho imagen');
INSERT INTO `detalle_general` VALUES ('25', '9', 'Tipo borde');
INSERT INTO `detalle_general` VALUES ('26', '9', 'Border Radius');
INSERT INTO `detalle_general` VALUES ('27', '9', 'Boton color');
INSERT INTO `detalle_general` VALUES ('28', '9', 'Bg color');
INSERT INTO `detalle_general` VALUES ('29', '9', 'text color');
INSERT INTO `detalle_general` VALUES ('34', '9', 'Hover notificaciones');
INSERT INTO `detalle_general` VALUES ('30', '9', 'text size');
INSERT INTO `detalle_general` VALUES ('31', '9', 'shadow');
INSERT INTO `detalle_general` VALUES ('32', '9', 'Degradado');
INSERT INTO `detalle_general` VALUES ('33', '9', 'Separador');
INSERT INTO `detalle_general` VALUES ('35', '9', 'Checked notificaciones');
INSERT INTO `detalle_general` VALUES ('36', '10', 'No visto');
INSERT INTO `detalle_general` VALUES ('37', '10', 'Visto');
INSERT INTO `detalle_general` VALUES ('38', '11', 'Taxi Solicitado');
INSERT INTO `detalle_general` VALUES ('39', '11', 'Pasajero Inexistente');
INSERT INTO `detalle_general` VALUES ('40', '11', 'Rechazado por cliente');
INSERT INTO `detalle_general` VALUES ('41', '11', 'Carrera aceptada');
INSERT INTO `detalle_general` VALUES ('42', '11', 'Cancelado por tiempo');
INSERT INTO `detalle_general` VALUES ('43', '11', 'Pasajero tomado');
INSERT INTO `detalle_general` VALUES ('44', '11', 'Carrera Finalizada');
INSERT INTO `detalle_general` VALUES ('45', '12', 'Taxi Libre');
INSERT INTO `detalle_general` VALUES ('46', '12', 'Taxi Ocupado');

-- ----------------------------
-- Table structure for mnt_fonos
-- ----------------------------
DROP TABLE IF EXISTS `mnt_fonos`;
CREATE TABLE `mnt_fonos` (
  `idFono` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `Fono` varchar(15) NOT NULL,
  PRIMARY KEY (`idFono`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mnt_fonos
-- ----------------------------
INSERT INTO `mnt_fonos` VALUES ('1', 'Bomberos', '88888888');

-- ----------------------------
-- Table structure for mnt_grupos
-- ----------------------------
DROP TABLE IF EXISTS `mnt_grupos`;
CREATE TABLE `mnt_grupos` (
  `idGrupo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mnt_grupos
-- ----------------------------
INSERT INTO `mnt_grupos` VALUES ('1', 'Sin clasificar');
INSERT INTO `mnt_grupos` VALUES ('2', 'Familia');
INSERT INTO `mnt_grupos` VALUES ('3', 'Amigos');

-- ----------------------------
-- Table structure for mnt_ubicacion_ciudad
-- ----------------------------
DROP TABLE IF EXISTS `mnt_ubicacion_ciudad`;
CREATE TABLE `mnt_ubicacion_ciudad` (
  `idCiudad` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idCiudad`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mnt_ubicacion_ciudad
-- ----------------------------
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('14', 'Región de Los Ríos');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('13', 'Región Metropolitana');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('12', 'Región de Magallanes y la Antártica Chilena');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('11', 'Región de Aysén del General Carlos Ibáñez del Campo');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('10', 'Región de Los Lagos');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('9', 'Región de la Araucanía');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('8', 'Región del Bío-Bío');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('7', 'Región del Maule');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('6', 'Región del Libertador General Bernardo O Higgins');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('5', 'Región de Valparaiso');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('4', 'Región de Coquimbo');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('3', 'Región de Atacama');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('2', 'Región de Antofagasta');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('1', 'Región de Tarapacá');
INSERT INTO `mnt_ubicacion_ciudad` VALUES ('15', 'Región de Arica y Parinacota');

-- ----------------------------
-- Table structure for mnt_ubicacion_comunas
-- ----------------------------
DROP TABLE IF EXISTS `mnt_ubicacion_comunas`;
CREATE TABLE `mnt_ubicacion_comunas` (
  `idComuna` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCiudad` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idComuna`)
) ENGINE=MyISAM AUTO_INCREMENT=347 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mnt_ubicacion_comunas
-- ----------------------------
INSERT INTO `mnt_ubicacion_comunas` VALUES ('346', '1', 'ALTO HOSPICIO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('296', '1', 'CAMINA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('297', '1', 'COLCHANE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('3', '1', 'HUARA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('2', '1', 'IQUIQUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('4', '1', 'PICA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('5', '1', 'POZO ALMONTE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('7', '2', 'ANTOFAGASTA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('10', '2', 'CALAMA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('298', '2', 'MARIA ELENA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('8', '2', 'MEJILLONES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('300', '2', 'OLLAGÜE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('301', '2', 'SAN PEDRO DE ATACAMA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('299', '2', 'SIERRA GORDA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('9', '2', 'TALTAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('6', '2', 'TOCOPILLA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('302', '3', 'ALTO DEL CARMEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('14', '3', 'CALDERA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('11', '3', 'CHAÑARAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('13', '3', 'COPIAPO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('12', '3', 'DIEGO DE ALMAGRO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('17', '3', 'FREIRINA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('18', '3', 'HUASCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('15', '3', 'TIERRA AMARILLA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('16', '3', 'VALLENAR');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('22', '4', 'ANDACOLLO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('31', '4', 'CANELA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('29', '4', 'COMBARBALA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('21', '4', 'COQUIMBO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('30', '4', 'ILLAPEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('20', '4', 'LA HIGUERA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('19', '4', 'LA SERENA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('33', '4', 'LOS VILOS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('26', '4', 'MONTE PATRIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('25', '4', 'OVALLE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('24', '4', 'PAIHUANO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('27', '4', 'PUNITAQUI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('28', '4', 'RIO HURTADO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('32', '4', 'SALAMANCA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('23', '4', 'VICUÑA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('44', '5', 'ALGARROBO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('56', '5', 'CABILDO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('67', '5', 'CALLE LARGA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('46', '5', 'CARTAGENA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('40', '5', 'CASABLANCA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('63', '5', 'CATEMU');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('340', '5', 'CONCON');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('45', '5', 'EL QUISCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('47', '5', 'EL TABO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('51', '5', 'HIJUELAS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('41', '5', 'ISLA DE PASCUA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('321', '5', 'JUAN FERNANDEZ');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('50', '5', 'LA CALERA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('49', '5', 'LA CRUZ');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('59', '5', 'LA LIGUA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('53', '5', 'LIMACHE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('65', '5', 'LLAY LLAY');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('66', '5', 'LOS ANDES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('52', '5', 'NOGALES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('54', '5', 'OLMUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('62', '5', 'PANQUEHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('57', '5', 'PAPUDO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('55', '5', 'PETORCA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('36', '5', 'PUCHUNCAVI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('61', '5', 'PUTAENDO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('48', '5', 'QUILLOTA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('38', '5', 'QUILPUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('35', '5', 'QUINTERO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('68', '5', 'RINCONADA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('42', '5', 'SAN ANTONIO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('69', '5', 'SAN ESTEBAN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('60', '5', 'SAN FELIPE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('64', '5', 'SANTA MARIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('43', '5', 'SANTO DOMINGO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('34', '5', 'VALPARAISO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('39', '5', 'VILLA ALEMANA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('37', '5', 'VIÑA DEL MAR');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('58', '5', 'ZAPALLAR');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('132', '6', 'CHEPICA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('125', '6', 'CHIMBARONGO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('110', '6', 'CODEGUA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('114', '6', 'COINCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('113', '6', 'COLTAUCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('112', '6', 'DOÑIHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('107', '6', 'GRANEROS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('139', '6', 'LA ESTRELLA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('116', '6', 'LAS CABRAS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('136', '6', 'LITUECHE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('129', '6', 'LOLOL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('106', '6', 'MACHALI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('122', '6', 'MALLOA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('134', '6', 'MARCHIGUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('126', '6', 'NANCAGUA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('138', '6', 'NAVIDAD');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('120', '6', 'OLIVAR');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('130', '6', 'PALMILLA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('133', '6', 'PAREDONES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('131', '6', 'PERALILLO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('115', '6', 'PEUMO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('118', '6', 'PICHIDEGUA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('137', '6', 'PICHILEMU');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('127', '6', 'PLACILLA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('135', '6', 'PUMANQUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('123', '6', 'QUINTA DE TILCOCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('105', '6', 'RANCAGUA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('121', '6', 'RENGO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('119', '6', 'REQUINOA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('124', '6', 'SAN FERNANDO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('111', '6', 'SAN FRANCISCO DE MOSTAZAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('117', '6', 'SAN VICENTE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('128', '6', 'SANTA CRUZ');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('166', '7', 'CAUQUENES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('167', '7', 'CHANCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('161', '7', 'COLBUN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('157', '7', 'CONSTITUCION');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('155', '7', 'CUREPTO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('140', '7', 'CURICO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('158', '7', 'EMPEDRADO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('144', '7', 'HUALAÑE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('145', '7', 'LICANTEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('159', '7', 'LINARES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('162', '7', 'LONGAVI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('154', '7', 'MAULE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('147', '7', 'MOLINA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('164', '7', 'PARRAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('152', '7', 'PELARCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('320', '7', 'PELLUHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('153', '7', 'PENCAHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('143', '7', 'RAUCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('165', '7', 'RETIRO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('149', '7', 'RIO CLARO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('141', '7', 'ROMERAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('148', '7', 'SAGRADA FAMILIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('151', '7', 'SAN CLEMENTE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('156', '7', 'SAN JAVIER');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('341', '7', 'SAN RAFAEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('150', '7', 'TALCA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('142', '7', 'TENO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('146', '7', 'VICHUQUEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('163', '7', 'VILLA ALEGRE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('160', '7', 'YERBAS BUENAS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('303', '8', 'ANTUCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('198', '8', 'ARAUCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('180', '8', 'BULNES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('208', '8', 'CABRERO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('201', '8', 'CAÑETE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('344', '8', 'CHIGUAYANTE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('168', '8', 'CHILLAN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('342', '8', 'CHILLAN VIEJO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('175', '8', 'COBQUECURA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('186', '8', 'COELEMU');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('170', '8', 'COIHUECO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('188', '8', 'CONCEPCION');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('202', '8', 'CONTULMO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('194', '8', 'CORONEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('197', '8', 'CURANILAHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('185', '8', 'EL CARMEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('193', '8', 'FLORIDA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('192', '8', 'HUALQUI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('210', '8', 'LAJA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('199', '8', 'LEBU');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('200', '8', 'LOS ALAMOS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('204', '8', 'LOS ANGELES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('195', '8', 'LOTA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('214', '8', 'MULCHEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('212', '8', 'NACIMIENTO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('213', '8', 'NEGRETE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('174', '8', 'NINHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('184', '8', 'PEMUCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('191', '8', 'PENCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('169', '8', 'PINTO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('171', '8', 'PORTEZUELO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('215', '8', 'QUILACO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('206', '8', 'QUILLECO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('182', '8', 'QUILLON');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('172', '8', 'QUIRIHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('187', '8', 'RANQUIL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('176', '8', 'SAN CARLOS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('178', '8', 'SAN FABIAN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('177', '8', 'SAN GREGORIO DE ÑIQUEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('181', '8', 'SAN IGNACIO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('179', '8', 'SAN NICOLAS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('343', '8', 'SAN PEDRO DE LA PAZ');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('211', '8', 'SAN ROSENDO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('205', '8', 'SANTA BARBARA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('196', '8', 'SANTA JUANA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('189', '8', 'TALCAHUANO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('203', '8', 'TIRUA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('190', '8', 'TOME');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('173', '8', 'TREHUACO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('209', '8', 'TUCAPEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('207', '8', 'YUMBEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('183', '8', 'YUNGAY');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('216', '9', 'ANGOL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('235', '9', 'CARAHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('220', '9', 'COLLIPULLI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('230', '9', 'CUNCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('225', '9', 'CURACAUTIN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('305', '9', 'CURARREHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('221', '9', 'ERCILLA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('229', '9', 'FREIRE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('232', '9', 'GALVARINO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('238', '9', 'GORBEA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('231', '9', 'LAUTARO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('240', '9', 'LONCOCHE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('226', '9', 'LONQUIMAY');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('218', '9', 'LOS SAUCES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('223', '9', 'LUMACO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('304', '9', 'MELIPEUCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('234', '9', 'NUEVA IMPERIAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('345', '9', 'PADRE LAS CASAS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('233', '9', 'PERQUENCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('237', '9', 'PITRUFQUEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('242', '9', 'PUCON');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('236', '9', 'PUERTO SAAVEDRA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('217', '9', 'PUREN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('219', '9', 'RENAICO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('227', '9', 'TEMUCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('306', '9', 'TEODORO SCHMIDT');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('239', '9', 'TOLTEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('222', '9', 'TRAIGUEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('224', '9', 'VICTORIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('228', '9', 'VILCUN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('241', '9', 'VILLARRICA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('277', '10', 'ANCUD');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('265', '10', 'CALBUCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('270', '10', 'CASTRO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('280', '10', 'CHAITEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('271', '10', 'CHONCHI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('262', '10', 'COCHAMO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('276', '10', 'CURACO DE VELEZ');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('279', '10', 'DALCAHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('268', '10', 'FRESIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('269', '10', 'FRUTILLAR');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('281', '10', 'FUTALEUFU');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('308', '10', 'HUALAIHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('267', '10', 'LLANQUIHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('264', '10', 'LOS MUERMOS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('263', '10', 'MAULLIN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('255', '10', 'OSORNO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('282', '10', 'PALENA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('261', '10', 'PUERTO MONTT');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('258', '10', 'PUERTO OCTAY');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('266', '10', 'PUERTO VARAS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('274', '10', 'PUQUELDON');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('260', '10', 'PURRANQUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('256', '10', 'PUYEHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('272', '10', 'QUEILEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('273', '10', 'QUELLON');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('278', '10', 'QUEMCHI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('275', '10', 'QUINCHAO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('259', '10', 'RIO NEGRO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('307', '10', 'SAN JUAN DE LA COSTA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('257', '10', 'SAN PABLO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('285', '11', 'AYSEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('287', '11', 'CHILE CHICO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('286', '11', 'CISNES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('289', '11', 'COCHRANE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('284', '11', 'COYHAIQUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('309', '11', 'GUAITECAS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('312', '11', 'LAGO VERDE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('310', '11', 'O´HIGGINS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('288', '11', 'RIO IBAÑEZ');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('311', '11', 'TORTEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('316', '12', 'LAGUNA BLANCA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('319', '12', 'NAVARINO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('292', '12', 'PORVENIR');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('317', '12', 'PRIMAVERA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('291', '12', 'PUERTO NATALES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('290', '12', 'PUNTA ARENAS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('314', '12', 'RIO VERDE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('315', '12', 'SAN GREGORIO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('318', '12', 'TIMAUKEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('313', '12', 'TORRES DEL PAINE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('109', '13', 'ALHUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('103', '13', 'BUIN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('99', '13', 'CALERA DE TANGO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('333', '13', 'CERRILLOS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('324', '13', 'CERRO NAVIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('76', '13', 'COLINA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('75', '13', 'CONCHALI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('83', '13', 'CURACAVI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('338', '13', 'EL BOSQUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('89', '13', 'EL MONTE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('328', '13', 'ESTACION CENTRAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('334', '13', 'HUECHURABA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('330', '13', 'INDEPENDENCIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('87', '13', 'ISLA DE MAIPO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('96', '13', 'LA CISTERNA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('93', '13', 'LA FLORIDA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('97', '13', 'LA GRANJA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('327', '13', 'LA PINTANA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('92', '13', 'LA REINA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('78', '13', 'LAMPA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('71', '13', 'LAS CONDES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('332', '13', 'LO BARNECHEA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('337', '13', 'LO ESPEJO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('325', '13', 'LO PRADO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('323', '13', 'MACUL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('94', '13', 'MAIPU');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('90', '13', 'MARIA PINTO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('88', '13', 'MELIPILLA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('91', '13', 'ÑUÑOA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('339', '13', 'PADRE HURTADO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('104', '13', 'PAINE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('336', '13', 'PEDRO AGUIRRE CERDA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('85', '13', 'PEÑAFLOR');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('322', '13', 'PEÑALOLEN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('101', '13', 'PIRQUE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('72', '13', 'PROVIDENCIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('82', '13', 'PUDAHUEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('100', '13', 'PUENTE ALTO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('79', '13', 'QUILICURA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('81', '13', 'QUINTA NORMAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('329', '13', 'RECOLETA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('77', '13', 'RENCA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('98', '13', 'SAN BERNARDO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('335', '13', 'SAN JOAQUIN');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('102', '13', 'SAN JOSE DE MAIPO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('95', '13', 'SAN MIGUEL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('108', '13', 'SAN PEDRO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('326', '13', 'SAN RAMON');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('70', '13', 'SANTIAGO CENTRO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('73', '13', 'SANTIAGO OESTE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('84', '13', 'SANTIAGO SUR');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('86', '13', 'TALAGANTE');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('80', '13', 'TIL-TIL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('331', '13', 'VITACURA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('244', '14', 'CORRAL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('248', '14', 'FUTRONO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('251', '14', 'LA UNION');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('254', '14', 'LAGO RANCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('249', '14', 'LANCO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('247', '14', 'LOS LAGOS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('246', '14', 'MAFIL');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('245', '14', 'MARIQUINA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('243', '14', 'VALDIVIA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('250', '14', 'PANGUIPULLI');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('252', '14', 'PAILLACO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('253', '14', 'RIO BUENO');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('1', '15', 'ARICA');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('295', '15', 'CAMARONES');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('293', '15', 'GENERAL LAGOS');
INSERT INTO `mnt_ubicacion_comunas` VALUES ('294', '15', 'PUTRE');

-- ----------------------------
-- Table structure for noticias_categorias
-- ----------------------------
DROP TABLE IF EXISTS `noticias_categorias`;
CREATE TABLE `noticias_categorias` (
  `idNotCat` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idNotGrupo` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  PRIMARY KEY (`idNotCat`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of noticias_categorias
-- ----------------------------
INSERT INTO `noticias_categorias` VALUES ('1', '1', 'Categoria 01', '');

-- ----------------------------
-- Table structure for noticias_grupos
-- ----------------------------
DROP TABLE IF EXISTS `noticias_grupos`;
CREATE TABLE `noticias_grupos` (
  `idNotGrupo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`idNotGrupo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of noticias_grupos
-- ----------------------------
INSERT INTO `noticias_grupos` VALUES ('1', 'Grupo 1');

-- ----------------------------
-- Table structure for noticias_listado
-- ----------------------------
DROP TABLE IF EXISTS `noticias_listado`;
CREATE TABLE `noticias_listado` (
  `idNotListado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idNotGrupo` int(11) unsigned NOT NULL,
  `idNotCat` int(11) unsigned NOT NULL,
  `Titulo` varchar(120) NOT NULL,
  `Fecha` date NOT NULL,
  `Resumen` varchar(250) NOT NULL,
  `Texto` text NOT NULL,
  `Comentarios` tinyint(1) unsigned NOT NULL,
  `Aprobar` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`idNotListado`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of noticias_listado
-- ----------------------------
INSERT INTO `noticias_listado` VALUES ('1', '1', '1', 'test', '2015-01-02', '', '<p>test</p>\r\n', '1', '1');

-- ----------------------------
-- Table structure for paginas_categorias
-- ----------------------------
DROP TABLE IF EXISTS `paginas_categorias`;
CREATE TABLE `paginas_categorias` (
  `idPagCat` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idPagGrupo` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  PRIMARY KEY (`idPagCat`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of paginas_categorias
-- ----------------------------
INSERT INTO `paginas_categorias` VALUES ('1', '1', 'Categoria 01', '');

-- ----------------------------
-- Table structure for paginas_grupos
-- ----------------------------
DROP TABLE IF EXISTS `paginas_grupos`;
CREATE TABLE `paginas_grupos` (
  `idPagGrupo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`idPagGrupo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of paginas_grupos
-- ----------------------------
INSERT INTO `paginas_grupos` VALUES ('1', 'Grupo 01');

-- ----------------------------
-- Table structure for paginas_listado
-- ----------------------------
DROP TABLE IF EXISTS `paginas_listado`;
CREATE TABLE `paginas_listado` (
  `idPagListado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idPagGrupo` int(11) unsigned NOT NULL,
  `idPagCat` int(11) unsigned NOT NULL,
  `Titulo` varchar(120) NOT NULL,
  `Fecha` date NOT NULL,
  `Resumen` varchar(250) NOT NULL,
  `Texto` text NOT NULL,
  PRIMARY KEY (`idPagListado`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of paginas_listado
-- ----------------------------
INSERT INTO `paginas_listado` VALUES ('1', '1', '1', 'test', '2015-01-02', '', '<p>test</p>\r\n');

-- ----------------------------
-- Table structure for robos_listado
-- ----------------------------
DROP TABLE IF EXISTS `robos_listado`;
CREATE TABLE `robos_listado` (
  `idRobo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `idTipoAlerta` int(11) unsigned NOT NULL,
  `idVehiculo` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Longitud` double NOT NULL,
  `Latitud` double NOT NULL,
  `Gsm` varchar(250) NOT NULL,
  `desplegar` tinyint(1) unsigned NOT NULL,
  `vista` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`idRobo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of robos_listado
-- ----------------------------

-- ----------------------------
-- Table structure for robos_listado_avistados
-- ----------------------------
DROP TABLE IF EXISTS `robos_listado_avistados`;
CREATE TABLE `robos_listado_avistados` (
  `idVista` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idRobo` bigint(20) unsigned NOT NULL,
  `idCliente` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Longitud` double NOT NULL,
  `Latitud` double NOT NULL,
  `Gsm` varchar(500) NOT NULL,
  `vista` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`idVista`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of robos_listado_avistados
-- ----------------------------

-- ----------------------------
-- Table structure for solicitud_taxi_listado
-- ----------------------------
DROP TABLE IF EXISTS `solicitud_taxi_listado`;
CREATE TABLE `solicitud_taxi_listado` (
  `idSolicitud` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `idTaxista` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Hora_Cancel` time NOT NULL,
  `Cliente_Longitud` double NOT NULL,
  `Cliente_Latitud` double NOT NULL,
  `Taxista_Longitud` double NOT NULL,
  `Taxista_Latitud` double NOT NULL,
  `CarreraFinalizada_Longitud` double NOT NULL,
  `CarreraFinalizada_Latitud` double NOT NULL,
  `Estado` tinyint(1) unsigned NOT NULL,
  `taxista_vista` tinyint(1) unsigned NOT NULL,
  `taxista_evaluacion` tinyint(1) unsigned NOT NULL,
  `taxista_observacion` text NOT NULL,
  `pasajero_evaluacion` tinyint(1) unsigned NOT NULL,
  `pasajero_observacion` text NOT NULL,
  `minutos` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`idSolicitud`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of solicitud_taxi_listado
-- ----------------------------
INSERT INTO `solicitud_taxi_listado` VALUES ('1', '1', '2', '2015-01-06', '16:37:49', '16:55:44', '-70.5750899', '-33.4006285', '-70.5750899', '-33.4006285', '0', '0', '40', '0', '0', '', '0', '', '5');
INSERT INTO `solicitud_taxi_listado` VALUES ('2', '1', '2', '2015-01-06', '17:20:25', '00:00:00', '-70.5750899', '-33.4006285', '-70.5750899', '-33.4006285', '-70.5750899', '-33.4006285', '44', '0', '5', 'asd', '5', '', '5');
INSERT INTO `solicitud_taxi_listado` VALUES ('3', '1', '2', '2015-01-06', '18:11:34', '00:00:00', '-70.5750899', '-33.4006285', '-70.5750899', '-33.4006285', '0', '0', '39', '0', '0', '', '1', 'no estaba', '5');
INSERT INTO `solicitud_taxi_listado` VALUES ('4', '1', '2', '2015-01-06', '18:50:48', '16:00:58', '-70.5750899', '-33.4006285', '-70.5950899', '-33.4906285', '0', '0', '40', '0', '0', '', '0', '', '5');

-- ----------------------------
-- Table structure for solicitud_taxi_sorteo
-- ----------------------------
DROP TABLE IF EXISTS `solicitud_taxi_sorteo`;
CREATE TABLE `solicitud_taxi_sorteo` (
  `idSorteo` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idSolicitud` bigint(20) unsigned NOT NULL,
  `idCliente` int(11) unsigned NOT NULL,
  `idTaxista` int(11) unsigned NOT NULL,
  `Estado` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`idSorteo`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of solicitud_taxi_sorteo
-- ----------------------------
INSERT INTO `solicitud_taxi_sorteo` VALUES ('1', '1', '1', '2', '2');
INSERT INTO `solicitud_taxi_sorteo` VALUES ('2', '1', '1', '3', '4');
INSERT INTO `solicitud_taxi_sorteo` VALUES ('3', '1', '1', '4', '4');
INSERT INTO `solicitud_taxi_sorteo` VALUES ('4', '2', '1', '2', '2');
INSERT INTO `solicitud_taxi_sorteo` VALUES ('5', '2', '1', '3', '4');
INSERT INTO `solicitud_taxi_sorteo` VALUES ('6', '2', '1', '4', '4');
INSERT INTO `solicitud_taxi_sorteo` VALUES ('7', '3', '1', '2', '2');
INSERT INTO `solicitud_taxi_sorteo` VALUES ('8', '3', '1', '3', '4');
INSERT INTO `solicitud_taxi_sorteo` VALUES ('9', '3', '1', '4', '4');
INSERT INTO `solicitud_taxi_sorteo` VALUES ('10', '4', '1', '2', '2');
INSERT INTO `solicitud_taxi_sorteo` VALUES ('11', '4', '1', '3', '4');
INSERT INTO `solicitud_taxi_sorteo` VALUES ('12', '4', '1', '4', '4');

-- ----------------------------
-- Table structure for taxista_sistema
-- ----------------------------
DROP TABLE IF EXISTS `taxista_sistema`;
CREATE TABLE `taxista_sistema` (
  `idSistema` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ValorPlanBase` int(10) unsigned NOT NULL,
  `NumeroCarreras` tinyint(2) unsigned NOT NULL,
  `ValorCarrera` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idSistema`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of taxista_sistema
-- ----------------------------
INSERT INTO `taxista_sistema` VALUES ('1', '200', '9', '30');

-- ----------------------------
-- Table structure for usuarios_accesos
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_accesos`;
CREATE TABLE `usuarios_accesos` (
  `idAcceso` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`idAcceso`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios_accesos
-- ----------------------------
INSERT INTO `usuarios_accesos` VALUES ('1', '1', '2015-01-05', '09:48:55');
INSERT INTO `usuarios_accesos` VALUES ('2', '1', '2015-01-05', '13:20:04');
INSERT INTO `usuarios_accesos` VALUES ('3', '1', '2015-01-06', '09:58:57');
INSERT INTO `usuarios_accesos` VALUES ('4', '1', '2015-01-06', '11:53:45');
INSERT INTO `usuarios_accesos` VALUES ('5', '1', '2015-01-07', '09:49:41');
INSERT INTO `usuarios_accesos` VALUES ('6', '1', '2015-01-08', '17:11:51');
INSERT INTO `usuarios_accesos` VALUES ('7', '1', '2015-01-09', '10:24:20');
INSERT INTO `usuarios_accesos` VALUES ('8', '1', '2015-01-09', '13:57:38');
INSERT INTO `usuarios_accesos` VALUES ('9', '2', '2015-01-09', '16:37:32');
INSERT INTO `usuarios_accesos` VALUES ('10', '3', '2015-01-09', '16:37:47');

-- ----------------------------
-- Table structure for usuarios_listado
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_listado`;
CREATE TABLE `usuarios_listado` (
  `idUsuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `tipo` varchar(13) NOT NULL,
  `Estado` tinyint(3) unsigned NOT NULL,
  `email` varchar(60) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `fNacimiento` date NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `Fono` varchar(15) NOT NULL,
  `Ciudad` varchar(60) NOT NULL,
  `Comuna` varchar(60) NOT NULL,
  `Direccion_img` varchar(120) NOT NULL,
  `Ultimo_acceso` date NOT NULL,
  `mode` tinyint(3) unsigned NOT NULL,
  `idTheme` tinyint(3) unsigned NOT NULL,
  `idTipoCliente` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios_listado
-- ----------------------------
INSERT INTO `usuarios_listado` VALUES ('1', 'tenshi98', 'b9ad227539cc03cd8199e23aa9078065', 'SuperAdmin', '1', 'asd@bla1.cl', 'Victor Reyes', '16029464-7', '2014-05-14', 'Los Lirios 0936', '8512517', 'Santiago', 'Puente Alto', '', '2015-01-09', '1', '1', '0');
INSERT INTO `usuarios_listado` VALUES ('2', 'sostaxi', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrador', '1', 'test@test0.cl', 'Sostaxi Admin', '', '2014-11-17', 'test', '', '', '', '', '2015-01-09', '1', '0', '2');
INSERT INTO `usuarios_listado` VALUES ('3', 'normal', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrador', '1', 'normal@normal.com', 'Usuario normal', '', '2015-01-01', 'direccion', '', '', '', '', '2015-01-09', '1', '0', '1');

-- ----------------------------
-- Table structure for usuarios_msj_enviados
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_msj_enviados`;
CREATE TABLE `usuarios_msj_enviados` (
  `idMsj_enviado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) unsigned NOT NULL,
  `Tipo` tinyint(2) unsigned NOT NULL,
  `Titulo` varchar(120) NOT NULL,
  `Mensaje` text NOT NULL,
  `Fecha` date NOT NULL,
  `Cantidad_clientes` smallint(4) unsigned NOT NULL,
  PRIMARY KEY (`idMsj_enviado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios_msj_enviados
-- ----------------------------

-- ----------------------------
-- Table structure for usuarios_permisos
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_permisos`;
CREATE TABLE `usuarios_permisos` (
  `idPermisos` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) unsigned NOT NULL,
  `idAdmpm` int(11) unsigned NOT NULL,
  `level` char(1) NOT NULL,
  PRIMARY KEY (`idPermisos`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios_permisos
-- ----------------------------
INSERT INTO `usuarios_permisos` VALUES ('1', '1', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('2', '1', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('3', '1', '8', '4');
INSERT INTO `usuarios_permisos` VALUES ('4', '1', '3', '4');
INSERT INTO `usuarios_permisos` VALUES ('5', '1', '5', '4');
INSERT INTO `usuarios_permisos` VALUES ('6', '1', '4', '4');
INSERT INTO `usuarios_permisos` VALUES ('7', '1', '6', '4');
INSERT INTO `usuarios_permisos` VALUES ('8', '1', '7', '4');
INSERT INTO `usuarios_permisos` VALUES ('9', '1', '9', '4');
INSERT INTO `usuarios_permisos` VALUES ('10', '1', '10', '4');
INSERT INTO `usuarios_permisos` VALUES ('11', '1', '11', '4');
INSERT INTO `usuarios_permisos` VALUES ('12', '1', '12', '4');
INSERT INTO `usuarios_permisos` VALUES ('13', '1', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('14', '1', '14', '4');
INSERT INTO `usuarios_permisos` VALUES ('15', '1', '15', '4');
INSERT INTO `usuarios_permisos` VALUES ('16', '1', '16', '4');
INSERT INTO `usuarios_permisos` VALUES ('17', '1', '17', '4');
INSERT INTO `usuarios_permisos` VALUES ('18', '1', '18', '4');
INSERT INTO `usuarios_permisos` VALUES ('19', '1', '19', '4');
INSERT INTO `usuarios_permisos` VALUES ('20', '1', '20', '4');
INSERT INTO `usuarios_permisos` VALUES ('21', '1', '21', '4');
INSERT INTO `usuarios_permisos` VALUES ('22', '1', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('23', '1', '23', '4');
INSERT INTO `usuarios_permisos` VALUES ('24', '1', '24', '4');
INSERT INTO `usuarios_permisos` VALUES ('25', '1', '25', '4');
INSERT INTO `usuarios_permisos` VALUES ('26', '1', '26', '4');
INSERT INTO `usuarios_permisos` VALUES ('27', '1', '27', '4');
INSERT INTO `usuarios_permisos` VALUES ('28', '1', '28', '4');
INSERT INTO `usuarios_permisos` VALUES ('29', '1', '29', '4');
INSERT INTO `usuarios_permisos` VALUES ('30', '1', '30', '4');
INSERT INTO `usuarios_permisos` VALUES ('31', '1', '31', '4');
INSERT INTO `usuarios_permisos` VALUES ('32', '1', '32', '4');
INSERT INTO `usuarios_permisos` VALUES ('33', '1', '33', '4');
INSERT INTO `usuarios_permisos` VALUES ('34', '1', '34', '4');
INSERT INTO `usuarios_permisos` VALUES ('35', '1', '35', '4');
INSERT INTO `usuarios_permisos` VALUES ('36', '1', '36', '4');
INSERT INTO `usuarios_permisos` VALUES ('37', '1', '38', '4');
INSERT INTO `usuarios_permisos` VALUES ('38', '1', '37', '4');
INSERT INTO `usuarios_permisos` VALUES ('39', '1', '39', '4');
INSERT INTO `usuarios_permisos` VALUES ('40', '1', '40', '4');
INSERT INTO `usuarios_permisos` VALUES ('41', '1', '41', '4');
INSERT INTO `usuarios_permisos` VALUES ('42', '1', '42', '4');
INSERT INTO `usuarios_permisos` VALUES ('43', '1', '43', '4');
INSERT INTO `usuarios_permisos` VALUES ('44', '1', '44', '4');
INSERT INTO `usuarios_permisos` VALUES ('45', '1', '45', '4');
INSERT INTO `usuarios_permisos` VALUES ('46', '1', '46', '4');
INSERT INTO `usuarios_permisos` VALUES ('47', '1', '47', '4');
INSERT INTO `usuarios_permisos` VALUES ('48', '1', '48', '4');
INSERT INTO `usuarios_permisos` VALUES ('49', '1', '49', '4');
INSERT INTO `usuarios_permisos` VALUES ('50', '1', '50', '4');
INSERT INTO `usuarios_permisos` VALUES ('51', '1', '51', '4');
INSERT INTO `usuarios_permisos` VALUES ('52', '1', '52', '4');
INSERT INTO `usuarios_permisos` VALUES ('53', '2', '3', '4');
INSERT INTO `usuarios_permisos` VALUES ('54', '2', '6', '4');
INSERT INTO `usuarios_permisos` VALUES ('55', '2', '4', '4');
INSERT INTO `usuarios_permisos` VALUES ('56', '2', '7', '4');
INSERT INTO `usuarios_permisos` VALUES ('57', '2', '5', '4');
INSERT INTO `usuarios_permisos` VALUES ('58', '1', '53', '4');
INSERT INTO `usuarios_permisos` VALUES ('59', '1', '54', '4');
INSERT INTO `usuarios_permisos` VALUES ('60', '1', '55', '4');
INSERT INTO `usuarios_permisos` VALUES ('61', '1', '56', '4');
INSERT INTO `usuarios_permisos` VALUES ('62', '1', '57', '4');
INSERT INTO `usuarios_permisos` VALUES ('63', '1', '58', '4');
INSERT INTO `usuarios_permisos` VALUES ('64', '1', '59', '4');
INSERT INTO `usuarios_permisos` VALUES ('65', '1', '60', '4');
INSERT INTO `usuarios_permisos` VALUES ('66', '1', '61', '4');
INSERT INTO `usuarios_permisos` VALUES ('67', '1', '62', '4');
INSERT INTO `usuarios_permisos` VALUES ('68', '1', '63', '4');
INSERT INTO `usuarios_permisos` VALUES ('69', '1', '64', '4');
INSERT INTO `usuarios_permisos` VALUES ('70', '1', '65', '4');
INSERT INTO `usuarios_permisos` VALUES ('71', '1', '66', '4');
INSERT INTO `usuarios_permisos` VALUES ('72', '1', '67', '4');
INSERT INTO `usuarios_permisos` VALUES ('73', '1', '68', '4');
INSERT INTO `usuarios_permisos` VALUES ('74', '1', '69', '4');
INSERT INTO `usuarios_permisos` VALUES ('75', '1', '70', '4');
INSERT INTO `usuarios_permisos` VALUES ('76', '3', '6', '4');
INSERT INTO `usuarios_permisos` VALUES ('77', '3', '10', '4');
INSERT INTO `usuarios_permisos` VALUES ('78', '3', '12', '4');
INSERT INTO `usuarios_permisos` VALUES ('79', '3', '11', '4');
INSERT INTO `usuarios_permisos` VALUES ('80', '3', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('81', '3', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('82', '3', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('83', '3', '43', '4');
INSERT INTO `usuarios_permisos` VALUES ('84', '3', '9', '4');
INSERT INTO `usuarios_permisos` VALUES ('85', '3', '14', '4');
INSERT INTO `usuarios_permisos` VALUES ('86', '3', '56', '4');
INSERT INTO `usuarios_permisos` VALUES ('87', '3', '57', '4');
INSERT INTO `usuarios_permisos` VALUES ('88', '3', '58', '4');
INSERT INTO `usuarios_permisos` VALUES ('89', '3', '54', '4');
INSERT INTO `usuarios_permisos` VALUES ('90', '3', '53', '4');
INSERT INTO `usuarios_permisos` VALUES ('91', '3', '55', '4');
INSERT INTO `usuarios_permisos` VALUES ('92', '3', '40', '4');
INSERT INTO `usuarios_permisos` VALUES ('93', '3', '42', '4');
INSERT INTO `usuarios_permisos` VALUES ('94', '3', '39', '4');
INSERT INTO `usuarios_permisos` VALUES ('95', '3', '41', '4');
INSERT INTO `usuarios_permisos` VALUES ('96', '3', '3', '4');
INSERT INTO `usuarios_permisos` VALUES ('97', '3', '4', '4');
INSERT INTO `usuarios_permisos` VALUES ('98', '3', '7', '4');
INSERT INTO `usuarios_permisos` VALUES ('99', '3', '5', '4');
INSERT INTO `usuarios_permisos` VALUES ('100', '2', '10', '4');
INSERT INTO `usuarios_permisos` VALUES ('101', '2', '12', '4');
INSERT INTO `usuarios_permisos` VALUES ('102', '2', '11', '4');
INSERT INTO `usuarios_permisos` VALUES ('103', '2', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('104', '2', '9', '4');
INSERT INTO `usuarios_permisos` VALUES ('105', '2', '14', '4');
INSERT INTO `usuarios_permisos` VALUES ('106', '2', '56', '4');
INSERT INTO `usuarios_permisos` VALUES ('107', '2', '57', '4');
INSERT INTO `usuarios_permisos` VALUES ('108', '2', '58', '4');
INSERT INTO `usuarios_permisos` VALUES ('109', '2', '54', '4');
INSERT INTO `usuarios_permisos` VALUES ('110', '2', '53', '4');
INSERT INTO `usuarios_permisos` VALUES ('111', '2', '55', '4');
INSERT INTO `usuarios_permisos` VALUES ('112', '2', '40', '4');
INSERT INTO `usuarios_permisos` VALUES ('113', '2', '42', '4');
INSERT INTO `usuarios_permisos` VALUES ('114', '2', '39', '4');
INSERT INTO `usuarios_permisos` VALUES ('115', '2', '41', '4');
INSERT INTO `usuarios_permisos` VALUES ('116', '2', '61', '4');
INSERT INTO `usuarios_permisos` VALUES ('117', '2', '62', '4');
INSERT INTO `usuarios_permisos` VALUES ('118', '2', '63', '4');
INSERT INTO `usuarios_permisos` VALUES ('119', '2', '66', '4');
INSERT INTO `usuarios_permisos` VALUES ('120', '2', '70', '4');
INSERT INTO `usuarios_permisos` VALUES ('121', '2', '67', '4');
INSERT INTO `usuarios_permisos` VALUES ('122', '2', '69', '4');
INSERT INTO `usuarios_permisos` VALUES ('123', '2', '68', '4');

-- ----------------------------
-- Table structure for vehiculos_colores
-- ----------------------------
DROP TABLE IF EXISTS `vehiculos_colores`;
CREATE TABLE `vehiculos_colores` (
  `idColorV` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idColorV`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vehiculos_colores
-- ----------------------------
INSERT INTO `vehiculos_colores` VALUES ('1', 'Blanco');

-- ----------------------------
-- Table structure for vehiculos_marcas
-- ----------------------------
DROP TABLE IF EXISTS `vehiculos_marcas`;
CREATE TABLE `vehiculos_marcas` (
  `idMarca` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vehiculos_marcas
-- ----------------------------
INSERT INTO `vehiculos_marcas` VALUES ('1', 'Nissan');

-- ----------------------------
-- Table structure for vehiculos_modelos
-- ----------------------------
DROP TABLE IF EXISTS `vehiculos_modelos`;
CREATE TABLE `vehiculos_modelos` (
  `idModelo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idMarca` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idModelo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vehiculos_modelos
-- ----------------------------
INSERT INTO `vehiculos_modelos` VALUES ('1', '1', 'Tiida');

-- ----------------------------
-- Table structure for vehiculos_transmision
-- ----------------------------
DROP TABLE IF EXISTS `vehiculos_transmision`;
CREATE TABLE `vehiculos_transmision` (
  `idTransmision` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTransmision`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vehiculos_transmision
-- ----------------------------
INSERT INTO `vehiculos_transmision` VALUES ('1', 'Mecanica');
INSERT INTO `vehiculos_transmision` VALUES ('2', 'Automatica');
