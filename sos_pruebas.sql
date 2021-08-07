/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : sos_pruebas

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2016-04-29 20:50:34
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
  `idConductor` int(11) unsigned NOT NULL,
  `idTipoAlerta` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Longitud` double NOT NULL,
  `Latitud` double NOT NULL,
  `Gsm` varchar(250) NOT NULL,
  `desplegar` tinyint(1) unsigned NOT NULL,
  `vista` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`idAlerta`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alertas_listado
-- ----------------------------
INSERT INTO `alertas_listado` VALUES ('1', '6', '0', '3', '2015-01-11', '21:24:42', '-70.5824971', '-33.6249688', '', '1', '1');
INSERT INTO `alertas_listado` VALUES ('2', '6', '0', '5', '2015-01-11', '21:29:14', '-70.5724971', '-33.6349688', '', '2', '1');
INSERT INTO `alertas_listado` VALUES ('3', '6', '0', '3', '2015-01-11', '21:29:34', '-70.5624971', '-33.6149688', '', '1', '1');
INSERT INTO `alertas_listado` VALUES ('4', '6', '0', '3', '2015-01-11', '21:31:40', '-70.5524971', '-33.6549688', '', '1', '1');
INSERT INTO `alertas_listado` VALUES ('5', '6', '0', '5', '2015-01-11', '21:34:51', '-70.5824986', '-33.5249671', '', '2', '1');
INSERT INTO `alertas_listado` VALUES ('6', '6', '0', '6', '2015-01-11', '21:35:00', '-70.5924986', '-33.4249671', '', '2', '1');
INSERT INTO `alertas_listado` VALUES ('7', '0', '0', '0', '2015-01-12', '18:53:04', '0', '0', '', '0', '1');
INSERT INTO `alertas_listado` VALUES ('8', '0', '0', '0', '2015-01-12', '19:02:38', '0', '0', '', '0', '1');
INSERT INTO `alertas_listado` VALUES ('9', '8', '0', '3', '2015-01-12', '19:11:02', '-70.5709844', '-33.5040135', '', '1', '1');
INSERT INTO `alertas_listado` VALUES ('10', '8', '0', '3', '2015-01-12', '19:16:31', '-70.5209844', '-33.1040135', '', '1', '1');
INSERT INTO `alertas_listado` VALUES ('11', '8', '0', '3', '2015-01-12', '19:17:22', '-70.5909844', '-33.8040135', '', '1', '1');
INSERT INTO `alertas_listado` VALUES ('12', '8', '0', '3', '2015-01-12', '19:21:47', '-70.5609844', '-33.6040135', '', '1', '1');
INSERT INTO `alertas_listado` VALUES ('13', '8', '0', '3', '2015-01-12', '19:22:36', '-70.5109844', '-33.4040135', '', '1', '1');
INSERT INTO `alertas_listado` VALUES ('14', '8', '0', '3', '2015-01-12', '19:29:41', '-70.5509844', '-33.6240135', '', '1', '1');
INSERT INTO `alertas_listado` VALUES ('15', '8', '0', '3', '2015-01-12', '19:31:16', '-70.5209844', '-33.6740135', '', '1', '1');
INSERT INTO `alertas_listado` VALUES ('16', '8', '0', '5', '2015-01-12', '19:31:26', '-70.5809844', '-33.6840135', '', '2', '1');
INSERT INTO `alertas_listado` VALUES ('17', '8', '0', '6', '2015-01-12', '19:31:29', '-70.5709844', '-33.6640135', '', '2', '1');
INSERT INTO `alertas_listado` VALUES ('18', '6', '0', '3', '2015-01-12', '20:30:29', '-70.584254', '-33.399732', 'APA91bFjDdcQ8pWaCmsnwc-7nIevcknB_AzuZbvLvai_aBqR4BL9z7IoibEBpcdW--dpXcibCGPizbXuCJweHIrkx7WM5TA3P4rTogT7-pkO2R5mze1nlOSHwPA07ExstacOtgSuxn_0VIml4zeriwpPdeq4WGrlJQ', '1', '1');
INSERT INTO `alertas_listado` VALUES ('19', '6', '0', '5', '2015-01-12', '20:31:36', '-70.590892', '-33.40684', 'APA91bFjDdcQ8pWaCmsnwc-7nIevcknB_AzuZbvLvai_aBqR4BL9z7IoibEBpcdW--dpXcibCGPizbXuCJweHIrkx7WM5TA3P4rTogT7-pkO2R5mze1nlOSHwPA07ExstacOtgSuxn_0VIml4zeriwpPdeq4WGrlJQ', '2', '1');
INSERT INTO `alertas_listado` VALUES ('20', '10', '1', '3', '2015-05-20', '14:57:07', '-70.593370082016', '-33.6280461382158', '', '1', '1');
INSERT INTO `alertas_listado` VALUES ('21', '10', '1', '3', '2015-05-20', '14:57:54', '-70.593370082016', '-33.6280461382158', '', '1', '1');
INSERT INTO `alertas_listado` VALUES ('22', '10', '7', '3', '2015-05-20', '17:27:44', '-70.593370082016', '-33.6280461382158', '', '1', '1');
INSERT INTO `alertas_listado` VALUES ('23', '10', '7', '3', '2015-05-20', '15:39:48', '-70.5961488505554', '-33.6244280481587', '', '1', '1');
INSERT INTO `alertas_listado` VALUES ('24', '8', '0', '16', '2015-05-25', '16:04:38', '-70.5711131460327', '-33.5033693705227', '', '1', '1');
INSERT INTO `alertas_listado` VALUES ('25', '0', '0', '0', '2015-05-25', '16:10:43', '0', '0', '', '0', '1');
INSERT INTO `alertas_listado` VALUES ('26', '10', '7', '3', '2015-05-27', '21:13:04', '-70.6032942553711', '-33.6156189270023', '', '1', '1');
INSERT INTO `alertas_listado` VALUES ('27', '8', '0', '17', '2015-06-04', '12:47:18', '0', '0', 'null', '2', '0');
INSERT INTO `alertas_listado` VALUES ('28', '10', '7', '3', '2015-06-04', '19:08:55', '-70.6046735793152', '-33.6158245206445', 'null', '1', '1');
INSERT INTO `alertas_listado` VALUES ('29', '11', '9', '3', '2015-06-10', '14:14:44', '-70.5908119231262', '-33.63156591011', 'null', '1', '1');
INSERT INTO `alertas_listado` VALUES ('30', '10', '5', '3', '2015-07-02', '16:03:11', '-70.5759846716919', '-33.6091724279811', 'null', '1', '1');

-- ----------------------------
-- Table structure for alertas_opciones
-- ----------------------------
DROP TABLE IF EXISTS `alertas_opciones`;
CREATE TABLE `alertas_opciones` (
  `idOpciones` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(80) NOT NULL,
  PRIMARY KEY (`idOpciones`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alertas_opciones
-- ----------------------------
INSERT INTO `alertas_opciones` VALUES ('1', 'Si');
INSERT INTO `alertas_opciones` VALUES ('2', 'No');

-- ----------------------------
-- Table structure for alertas_tipos
-- ----------------------------
DROP TABLE IF EXISTS `alertas_tipos`;
CREATE TABLE `alertas_tipos` (
  `idTipoAlerta` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idTipoBoton` int(11) unsigned NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `Mensaje` varchar(120) NOT NULL,
  `idCatimg` int(11) unsigned NOT NULL,
  `idListimg` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idTipoAlerta`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alertas_tipos
-- ----------------------------
INSERT INTO `alertas_tipos` VALUES ('2', '1', 'Normal - Solicitud de ayuda', 'ha informado la solicitud de ayuda', '1', '5');
INSERT INTO `alertas_tipos` VALUES ('3', '1', 'Transantiago - Accidente', 'ha informado un accidente cerca', '1', '1');
INSERT INTO `alertas_tipos` VALUES ('4', '1', 'Transantiago - Calle Cerrada', 'ha informado de una calle cerrada', '1', '2');
INSERT INTO `alertas_tipos` VALUES ('5', '1', 'Normal - Peligro', 'ha informado de peligro', '1', '3');
INSERT INTO `alertas_tipos` VALUES ('6', '1', 'Normal - Persona sospechosa', 'ha informado de una persona sospechosa', '1', '4');
INSERT INTO `alertas_tipos` VALUES ('7', '2', 'Taxi - Robo Vehiculo', 'ha informado del robo de su vehiculo', '1', '7');
INSERT INTO `alertas_tipos` VALUES ('10', '10', 'Taxi - Solicitud Taxi', 'ha solicitado un Taxi', '1', '8');
INSERT INTO `alertas_tipos` VALUES ('11', '11', 'Taxi - Recepcion Llamada Taxi', 'ha aceptado la solicitud', '1', '6');
INSERT INTO `alertas_tipos` VALUES ('13', '17', 'No hace nada', 'No hace nada', '1', '1');
INSERT INTO `alertas_tipos` VALUES ('14', '1', 'Transantiago - Barras bravas', 'ha generado una alerta de barra brava', '1', '1');
INSERT INTO `alertas_tipos` VALUES ('15', '1', 'Transantiago - Evasion', 'ha generado una alerta de evasion', '1', '1');
INSERT INTO `alertas_tipos` VALUES ('16', '1', 'Normal - Sosclick', 'Se ha generado una alerta', '1', '5');
INSERT INTO `alertas_tipos` VALUES ('17', '20', 'Carrete Seguro - enviar ubicacion', 'ha enviado su ubicacion', '1', '3');
INSERT INTO `alertas_tipos` VALUES ('18', '20', 'Carrete Seguro - Llegue a destino', 'ha llegado a destino', '1', '3');
INSERT INTO `alertas_tipos` VALUES ('19', '19', 'Carrete Seguro - Sin Transporte', 'ha notificado que no tiene transporte', '1', '3');
INSERT INTO `alertas_tipos` VALUES ('20', '21', 'Carrete Seguro - Llamame', 'ha notificado que necesita que lo llamen', '1', '3');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of app_ajustes_generales
-- ----------------------------
INSERT INTO `app_ajustes_generales` VALUES ('1', 'background_color_10', 'background_color_34', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_box_02', 'cover_img_03', 'background_color_88', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_externa_2', '', 'background_color_89', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_externa_2', '', 'background_color_92', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_externa_2', '', 'form_color_4', 'background_color_29', 'link_text_color3', 'width75', 'border_radius5', 'cover_img_07', 'background_color_28', 'link_text_color5', 'width75', 'border_radius5', 'cover_img_08', 'background_color_23', 'link_text_color6', 'width75', 'border_radius5', 'cover_img_06', 'background_color_16', 'link_text_color4', 'width75', 'border_radius5', 'cover_img_04', 'cover_img_01', 'border_radius50p', 'sombra_externa_1', 'width40', 'letter_size_17', 'link_text_color4', 'letter_size_12', 'link_text_color3', 'letter_size_04', 'link_text_color2', 'sombra_box_02', 'cover_img_15', 'border_separator_1', 'width95', 'fcenter', 'tb_deg_1', 'border_radius05p', 'letter_size_05', 'link_text_color3', 'letter_size_04', 'link_text_color2', 'link_text_color2', 'letter_size_07', 'width100', 'cover_img_03', 'sombra_box_02', 'fcenter', 'background_color_06', 'background_color_01', 'noti_hover04', 'noti_checked06', 'tabscolorbase1', 'tabscolorchecked4', 'link_text_color4', 'link_text_color5', 'link_text_color2', 'letter_size_07', 'letter_size_06', 'letter_size_04', 'background_color_35', 'link_text_color1', 'letter_size_04', 'background_color_36', 'link_text_color1', 'letter_size_04', 'letter_size_18', 'link_text_color4', 'letter_size_08', 'link_text_color2', 'letter_size_06', 'link_text_color2', 'letter_size_06', 'link_text_color4', 'letter_size_06', 'link_text_color2', '1', '1', '1', '1', '5', '1', '2', '2');
INSERT INTO `app_ajustes_generales` VALUES ('2', 'background_color_06', 'background_color_34', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_box_30', 'cover_img_05', 'background_color_33', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_box_30', 'cover_img_05', 'background_color_53', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_box_30', 'cover_img_07', 'background_color_35', 'width90', 'border_radius05p', 'fcenter', 'link_text_color1', 'sombra_box_30', 'cover_img_20', 'form_color_8', 'background_color_91', 'link_text_color3', 'width70', 'border_radius5', 'cover_img_07', 'background_color_93', 'link_text_color5', 'width70', 'border_radius5', 'cover_img_08', 'background_color_28', 'link_text_color6', 'width70', 'border_radius5', 'cover_img_21', 'background_color_10', 'link_text_color4', 'width70', 'border_radius5', 'cover_img_34', 'cover_img_01', 'border_radius50p', 'sombra_box_29', 'width50', 'letter_size_10', 'link_text_color4', 'letter_size_07', 'link_text_color2', 'letter_size_04', 'link_text_color2', 'sombra_box_02', 'cover_img_04', '', 'width95', 'fcenter', 'tb_deg_1', '', 'letter_size_06', 'link_text_color4', 'letter_size_02', 'link_text_color2', 'link_text_color4', 'letter_size_06', 'width100', '', '', '', 'background_color_06', 'background_color_01', 'noti_hover04', 'noti_checked06', 'tabscolorbase1', 'tabscolorchecked4', 'link_text_color3', 'link_text_color4', 'link_text_color2', 'letter_size_06', 'letter_size_06', 'letter_size_02', 'background_color_01', 'link_text_color1', 'letter_size_04', 'background_color_36', 'link_text_color1', 'letter_size_04', 'letter_size_11', 'link_text_color4', 'letter_size_08', 'link_text_color4', 'letter_size_05', 'link_text_color2', 'letter_size_03', 'link_text_color2', 'letter_size_02', 'link_text_color2', '0', '0', '0', '0', '5', '1', '2', '2');

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
) ENGINE=MyISAM AUTO_INCREMENT=619 DEFAULT CHARSET=latin1;

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
INSERT INTO `app_ajustes_tipo` VALUES ('601', '38', 'Margen 1', 'box_col_0');
INSERT INTO `app_ajustes_tipo` VALUES ('602', '38', 'Margen 2', 'box_col_1');
INSERT INTO `app_ajustes_tipo` VALUES ('603', '38', 'Margen 3', 'box_col_2');
INSERT INTO `app_ajustes_tipo` VALUES ('604', '38', 'Margen 4', 'box_col_3');
INSERT INTO `app_ajustes_tipo` VALUES ('605', '38', 'Margen 5', 'box_col_4');
INSERT INTO `app_ajustes_tipo` VALUES ('606', '38', 'Margen 6', 'box_col_5');
INSERT INTO `app_ajustes_tipo` VALUES ('608', '31', 'Sin Sombra', 'sombra_box_00');
INSERT INTO `app_ajustes_tipo` VALUES ('609', '27', 'Combinacion 96', 'background_color_96');
INSERT INTO `app_ajustes_tipo` VALUES ('610', '28', 'Combinacion 96', 'background_color_96');
INSERT INTO `app_ajustes_tipo` VALUES ('611', '28', 'Combinacion 97', 'background_color_97');
INSERT INTO `app_ajustes_tipo` VALUES ('612', '28', 'Combinacion 98', 'background_color_98');
INSERT INTO `app_ajustes_tipo` VALUES ('613', '28', 'Combinacion 99', 'background_color_99');
INSERT INTO `app_ajustes_tipo` VALUES ('614', '28', 'Combinacion 100', 'background_color_100');
INSERT INTO `app_ajustes_tipo` VALUES ('615', '27', 'Combinacion 97', 'background_color_97');
INSERT INTO `app_ajustes_tipo` VALUES ('616', '27', 'Combinacion 98', 'background_color_98');
INSERT INTO `app_ajustes_tipo` VALUES ('617', '27', 'Combinacion 99', 'background_color_99');
INSERT INTO `app_ajustes_tipo` VALUES ('618', '27', 'Combinacion 100', 'background_color_100');

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
  `cat_img` int(11) unsigned NOT NULL,
  `url_img` varchar(255) NOT NULL,
  `idTipoBoton` int(11) unsigned NOT NULL,
  `Archivo` varchar(120) NOT NULL,
  `idTipoAlerta` int(11) unsigned NOT NULL,
  `cercanos` tinyint(1) unsigned NOT NULL,
  `contactar` tinyint(1) unsigned NOT NULL,
  `idTipoContacto` int(11) unsigned NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of app_areas_elementos
-- ----------------------------
INSERT INTO `app_areas_elementos` VALUES ('10', 'logo SOSTaxi', '', '1', '7', '2', '0', '0', '', '', '', '', '0', 'logo_taxi.png', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('11', 'Recepcion Solicitud', 'boton', '1', '8', '2', '1', '1', 'background_color_01', 'border_radius5', 'sombra_box_01', 'center_img_1', '0', 'recepcion_llamada_taxi.png', '11', 'sis_taxi_recepcion.php', '11', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('12', 'Accidente', 'boton', '1', '9', '3', '1', '1', 'background_color_36', 'border_radius5', 'sombra_box_02', 'center_img_1', '0', 'accidente.png', '1', 'em_alertas.php', '3', '1', '1', '0', '1', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('13', 'Peligro', 'boton', '2', '9', '3', '1', '1', 'background_color_34', 'border_radius5', 'sombra_box_02', 'center_img_1', '0', 'peligro.png', '1', 'em_alertas.php', '5', '2', '2', '0', '1', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('14', 'Ayuda', 'boton', '3', '9', '3', '1', '1', 'background_color_37', 'border_radius5', 'sombra_box_02', 'center_img_1', '0', 'police.png', '1', 'em_alertas.php', '2', '2', '2', '0', '1', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('15', 'Barra brava', 'boton', '4', '9', '3', '1', '1', 'background_color_41', 'border_radius5', 'sombra_box_02', 'center_img_1', '0', 'barra_brava.png', '1', 'em_alertas.php', '14', '2', '2', '0', '1', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('16', 'evasion', 'boton', '5', '9', '3', '1', '1', 'background_color_53', 'border_radius5', 'sombra_box_02', 'center_img_1', '0', 'evasion.png', '1', 'em_alertas.php', '15', '2', '2', '0', '1', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('20', 'Boton Sosclick', 'boton', '1', '12', '1', '2', '1', 'background_color_53', 'border_radius0', 'sombra_box_00', 'center_img_1', '2', 'icn_sosclick.png', '12', 'principal.php', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '6', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('21', 'Bus', 'boton', '1', '13', '1', '2', '1', 'background_color_47', 'border_radius0', 'sombra_box_00', 'center_img_1', '2', 'icn_transantiago.png', '17', 'principal_mapa_tran.php', '13', '0', '0', '0', '0', '2', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('22', 'Espia', 'boton', '1', '14', '1', '2', '1', 'background_color_96', 'border_radius0', 'sombra_box_00', 'center_img_1', '2', 'icn_espia.png', '18', 'espia.php', '13', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('23', 'sosclick alerta', 'boton', '1', '17', '6', '2', '1', 'background_color_53', 'border_radius5', 'sombra_box_00', 'center_img_1', '2', 'icn_sosclick_alerta.png', '1', 'em_alertas.php', '16', '1', '1', '0', '1', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('24', 'boton carrete seguro', 'boton', '1', '18', '6', '2', '1', 'background_color_47', 'border_radius5', 'sombra_box_00', 'center_img_1', '2', 'icn_carrete_seguro.png', '12', 'principal.php', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '7', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('25', 'boton enviar ubicacion', 'boton', '1', '19', '6', '2', '1', 'background_color_96', 'border_radius5', 'sombra_box_00', 'center_img_1', '2', 'icn_enviar_ubicacion.png', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('26', 'boton pide mapa', 'boton', '1', '20', '6', '2', '1', 'background_color_04', 'border_radius5', 'sombra_box_00', 'center_img_1', '2', 'icn_pide_mapa.png', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('27', 'boton enviar ubicacion 2', 'boton', '1', '23', '7', '2', '1', 'background_color_97', 'border_radius5', 'sombra_box_00', 'center_img_1', '2', 'icn_carrete_enviar_ubicacion.png', '20', 'em_alertas_fijo.php', '17', '2', '1', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('28', 'boton llegue a destino', 'boton', '1', '24', '7', '2', '1', 'background_color_98', 'border_radius5', 'sombra_box_00', 'center_img_1', '2', 'icn_carrete_llegue.png', '20', 'em_alertas_fijo.php', '18', '2', '1', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('29', 'boton sin transporte', 'boton', '1', '25', '7', '2', '1', 'background_color_99', 'border_radius5', 'sombra_box_00', 'center_img_1', '2', 'icn_carrete_sintransporte.png', '19', 'em_carrete.php', '19', '2', '1', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('30', 'boton llamame', 'boton', '1', '26', '7', '2', '1', 'background_color_100', 'border_radius5', 'sombra_box_00', 'center_img_1', '2', 'icn_carrete_llamame.png', '21', 'em_notificaciones.php', '20', '2', '1', '2', '2', '1', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('31', 'boton volver sosclick', 'boton', '1', '15', '6', '2', '1', 'background_color_56', 'border_radius0', 'sombra_box_00', 'center_img_1', '2', 'icn_soscloc_tit.png', '12', 'principal.php', '0', '0', '0', '0', '0', '2', '0', '0', '0', '0', '1', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('32', 'texto sosclick', '', '1', '16', '6', '0', '0', '', '', '', '', '2', 'icn_texto_ppal.png', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('33', 'boton volver carrete seguro', 'boton', '1', '21', '7', '2', '1', 'background_color_56', 'border_radius0', 'sombra_box_00', 'center_img_1', '2', 'icn_carrete_tit.png', '12', 'principal.php', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '6', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('34', 'texto carrete seguro', '', '1', '22', '7', '0', '0', '', '', '', '', '2', 'icn_texto_carrete.png', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `app_areas_elementos` VALUES ('35', 'Llamada taxi', 'boton', '1', '27', '9', '2', '1', 'background_color_35', 'border_radius5', 'sombra_box_00', 'center_img_3', '2', 'icn_llamar taxi.png', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');

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
  `Margen` varchar(30) NOT NULL,
  PRIMARY KEY (`idArea`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of app_areas_listado
-- ----------------------------
INSERT INTO `app_areas_listado` VALUES ('18', 'boton carrete seguro', '4', '6', 'tb_1-2', 'box_col_1');
INSERT INTO `app_areas_listado` VALUES ('17', 'boton sosclick', '3', '6', 'tb_1-2', 'box_col_1');
INSERT INTO `app_areas_listado` VALUES ('16', 'Texto', '2', '6', 'tb_img', 'box_col_0');
INSERT INTO `app_areas_listado` VALUES ('15', 'Boton Volver', '1', '6', 'tb_1-2', 'box_col_0');
INSERT INTO `app_areas_listado` VALUES ('14', 'Akusete', '2', '1', 'tb_1-2', 'box_col_0');
INSERT INTO `app_areas_listado` VALUES ('7', 'logo SOSTaxi', '1', '2', 'tb_img', 'box_col_0');
INSERT INTO `app_areas_listado` VALUES ('8', 'Boton sistema', '2', '2', 'tb_1-5', 'box_col_0');
INSERT INTO `app_areas_listado` VALUES ('9', 'Botones alertas', '1', '3', 'tb_1-3', 'box_col_1');
INSERT INTO `app_areas_listado` VALUES ('13', 'Transantiago', '1', '1', 'tb_1-2', 'box_col_0');
INSERT INTO `app_areas_listado` VALUES ('12', 'SOSClick', '3', '1', 'tb_1-2', 'box_col_0');
INSERT INTO `app_areas_listado` VALUES ('19', 'boton enviar ubicacion', '5', '6', 'tb_1-2', 'box_col_1');
INSERT INTO `app_areas_listado` VALUES ('20', 'boton pide mapa', '6', '6', 'tb_1-2', 'box_col_1');
INSERT INTO `app_areas_listado` VALUES ('21', 'Boton Volver', '1', '7', 'tb_1-2', 'box_col_0');
INSERT INTO `app_areas_listado` VALUES ('22', 'Texto', '2', '7', 'tb_img', 'box_col_0');
INSERT INTO `app_areas_listado` VALUES ('23', 'boton enviar ubicacion', '3', '7', 'tb_1-2', 'box_col_1');
INSERT INTO `app_areas_listado` VALUES ('24', 'boton llegue a destino', '4', '7', 'tb_1-2', 'box_col_1');
INSERT INTO `app_areas_listado` VALUES ('25', 'boton sin transporte', '5', '7', 'tb_1-2', 'box_col_1');
INSERT INTO `app_areas_listado` VALUES ('26', 'boton llamame', '6', '7', 'tb_1-2', 'box_col_1');
INSERT INTO `app_areas_listado` VALUES ('27', 'botones', '1', '9', 'tb_1-2', 'box_col_1');

-- ----------------------------
-- Table structure for app_areas_pagelist
-- ----------------------------
DROP TABLE IF EXISTS `app_areas_pagelist`;
CREATE TABLE `app_areas_pagelist` (
  `idPagelist` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `app_conf` int(11) unsigned NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idPagelist`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of app_areas_pagelist
-- ----------------------------
INSERT INTO `app_areas_pagelist` VALUES ('6', '1', 'Sos - Sosclick');
INSERT INTO `app_areas_pagelist` VALUES ('2', '2', 'Sostaxi - Principal');
INSERT INTO `app_areas_pagelist` VALUES ('3', '3', 'Transantiago');
INSERT INTO `app_areas_pagelist` VALUES ('1', '1', 'Sos - Principal');
INSERT INTO `app_areas_pagelist` VALUES ('7', '1', 'Sos - Carrete seguro');
INSERT INTO `app_areas_pagelist` VALUES ('8', '4', 'Principal');
INSERT INTO `app_areas_pagelist` VALUES ('9', '5', 'Principal');

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
-- Table structure for app_funcion_boton
-- ----------------------------
DROP TABLE IF EXISTS `app_funcion_boton`;
CREATE TABLE `app_funcion_boton` (
  `idFuncion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idFuncion`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of app_funcion_boton
-- ----------------------------
INSERT INTO `app_funcion_boton` VALUES ('1', 'Emergencias');
INSERT INTO `app_funcion_boton` VALUES ('2', 'Abrir Todas Categorias Noticias');
INSERT INTO `app_funcion_boton` VALUES ('3', 'Abrir Una Categoria Noticia');
INSERT INTO `app_funcion_boton` VALUES ('4', 'Abrir Una Noticia');
INSERT INTO `app_funcion_boton` VALUES ('5', 'Abrir Todas Categorias Paginas');
INSERT INTO `app_funcion_boton` VALUES ('6', 'Abrir Una Categoria Pagina');
INSERT INTO `app_funcion_boton` VALUES ('7', 'Abrir Una Pagina');
INSERT INTO `app_funcion_boton` VALUES ('8', 'Ninguna');
INSERT INTO `app_funcion_boton` VALUES ('9', 'Nueva Pantalla');
INSERT INTO `app_funcion_boton` VALUES ('10', 'Modificar datos Usuario');
INSERT INTO `app_funcion_boton` VALUES ('11', 'Realizar Llamada');
INSERT INTO `app_funcion_boton` VALUES ('12', 'Abrir Una Categoria Pregunta');
INSERT INTO `app_funcion_boton` VALUES ('13', 'Abrir Una Pregunta');

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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of app_tipo_boton
-- ----------------------------
INSERT INTO `app_tipo_boton` VALUES ('1', 'Generar Alerta', 'em_alertas.php', '1');
INSERT INTO `app_tipo_boton` VALUES ('2', 'Generar Robo Vehiculo', 'em_robo_vehiculo.php', '1');
INSERT INTO `app_tipo_boton` VALUES ('3', 'Noticias - Todas las categoria', 'list_noticias.php', '2');
INSERT INTO `app_tipo_boton` VALUES ('4', 'Noticias - Una categoria', 'list_noticias.php', '3');
INSERT INTO `app_tipo_boton` VALUES ('5', 'Noticias - Una Noticia', 'list_noticias.php', '4');
INSERT INTO `app_tipo_boton` VALUES ('6', 'Paginas - Todas las categoria', 'list_paginas.php', '5');
INSERT INTO `app_tipo_boton` VALUES ('7', 'Paginas - Una categoria', 'list_paginas.php', '6');
INSERT INTO `app_tipo_boton` VALUES ('8', 'Paginas - Una Pagina', 'list_paginas.php', '7');
INSERT INTO `app_tipo_boton` VALUES ('9', 'Notificaciones', 'notificaciones.php', '8');
INSERT INTO `app_tipo_boton` VALUES ('10', 'Solicitud Taxi', 'sis_taxi_solicitud.php', '8');
INSERT INTO `app_tipo_boton` VALUES ('11', 'Recepcion Llamada Taxi', 'sis_taxi_recepcion.php', '8');
INSERT INTO `app_tipo_boton` VALUES ('12', 'Abrir nueva pantalla', 'principal.php', '9');
INSERT INTO `app_tipo_boton` VALUES ('13', 'Modificar datos de usuario', 'usr_datos.php', '10');
INSERT INTO `app_tipo_boton` VALUES ('14', 'Llamada Telefonica', 'ninguno', '11');
INSERT INTO `app_tipo_boton` VALUES ('15', 'Pregunta - Una categoria', 'list_preguntas.php', '12');
INSERT INTO `app_tipo_boton` VALUES ('16', 'Pregunta - Una Pregunta', 'list_preguntas.php', '13');
INSERT INTO `app_tipo_boton` VALUES ('17', 'Mapa Transantiago', 'principal_mapa_tran.php', '8');
INSERT INTO `app_tipo_boton` VALUES ('18', 'Generar Espia', 'espia.php', '8');
INSERT INTO `app_tipo_boton` VALUES ('19', 'Generar Alerta Carrete', 'em_carrete.php', '1');
INSERT INTO `app_tipo_boton` VALUES ('20', 'Generar Alerta mapa fijo', 'em_alertas_fijo.php', '1');
INSERT INTO `app_tipo_boton` VALUES ('21', 'Generar Notificacion', 'em_notificaciones.php', '1');

-- ----------------------------
-- Table structure for buses_colores
-- ----------------------------
DROP TABLE IF EXISTS `buses_colores`;
CREATE TABLE `buses_colores` (
  `idColorV` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idColorV`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of buses_colores
-- ----------------------------
INSERT INTO `buses_colores` VALUES ('1', 'Blanco');
INSERT INTO `buses_colores` VALUES ('2', 'Azul');
INSERT INTO `buses_colores` VALUES ('3', 'Verde');

-- ----------------------------
-- Table structure for buses_marcas
-- ----------------------------
DROP TABLE IF EXISTS `buses_marcas`;
CREATE TABLE `buses_marcas` (
  `idMarca` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of buses_marcas
-- ----------------------------
INSERT INTO `buses_marcas` VALUES ('1', 'Nissan');

-- ----------------------------
-- Table structure for buses_modelos
-- ----------------------------
DROP TABLE IF EXISTS `buses_modelos`;
CREATE TABLE `buses_modelos` (
  `idModelo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idMarca` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idModelo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of buses_modelos
-- ----------------------------
INSERT INTO `buses_modelos` VALUES ('1', '1', 'Tiida');

-- ----------------------------
-- Table structure for buses_transmision
-- ----------------------------
DROP TABLE IF EXISTS `buses_transmision`;
CREATE TABLE `buses_transmision` (
  `idTransmision` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTransmision`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of buses_transmision
-- ----------------------------
INSERT INTO `buses_transmision` VALUES ('1', 'Mecanica');
INSERT INTO `buses_transmision` VALUES ('2', 'Automatica');

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
  `idTipoContacto` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idAmigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_contacto_amigos
-- ----------------------------

-- ----------------------------
-- Table structure for clientes_contacto_amigos_tipos
-- ----------------------------
DROP TABLE IF EXISTS `clientes_contacto_amigos_tipos`;
CREATE TABLE `clientes_contacto_amigos_tipos` (
  `idTipoContacto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipoContacto`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_contacto_amigos_tipos
-- ----------------------------
INSERT INTO `clientes_contacto_amigos_tipos` VALUES ('1', 'Normal');
INSERT INTO `clientes_contacto_amigos_tipos` VALUES ('2', 'Carrete Seguro');

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
-- Table structure for clientes_disponibilidad
-- ----------------------------
DROP TABLE IF EXISTS `clientes_disponibilidad`;
CREATE TABLE `clientes_disponibilidad` (
  `idDisponibilidad` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idDisponibilidad`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_disponibilidad
-- ----------------------------
INSERT INTO `clientes_disponibilidad` VALUES ('1', 'Disponible');
INSERT INTO `clientes_disponibilidad` VALUES ('2', 'No Disponible');

-- ----------------------------
-- Table structure for clientes_dispositivo
-- ----------------------------
DROP TABLE IF EXISTS `clientes_dispositivo`;
CREATE TABLE `clientes_dispositivo` (
  `idDispositivo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idDispositivo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_dispositivo
-- ----------------------------
INSERT INTO `clientes_dispositivo` VALUES ('1', 'android');
INSERT INTO `clientes_dispositivo` VALUES ('2', 'iphone');

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
  `idPropietario` int(11) unsigned NOT NULL,
  `idRecorrido` int(11) NOT NULL,
  `idRuta` int(11) unsigned NOT NULL,
  `Orden` smallint(3) unsigned NOT NULL,
  `idConductor` int(11) unsigned NOT NULL,
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
  `idDisponibilidad` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_listado
-- ----------------------------
INSERT INTO `clientes_listado` VALUES ('7', '2015-01-12', 'taxista1', '81dc9bdb52d04dc20036dbd8313ed055', '2', '1', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0', '0', '0000-00-00', '0', '123123', '12323', '-33.6040135', '-70.5709844', '0', 'Si', '45', '', '', '7', '2', '0', '0', '7', 'aa1018', '1', '1', '2', '2015-03-16', '1', '0', '2015-03-16', 'asdasdasd', 'asdadasd', 'df', '0');
INSERT INTO `clientes_listado` VALUES ('6', '2015-01-11', 'prueba', '81dc9bdb52d04dc20036dbd8313ed055', '1', '1', 'prueba@prueba.cl', 'usuario de prueba', 'prueba1', 'prueba2', '10496784-1', 'M', '0000-00-00', 'sdf', '111', '123', '', '', '3', '12', '2015-01-12', '0', '807032778717414', 'APA91bFjDdcQ8pWaCmsnwc-7nIevcknB_AzuZbvLvai_aBqR4BL9z7IoibEBpcdW--dpXcibCGPizbXuCJweHIrkx7WM5TA3P4rTogT7-pkO2R5mze1nlOSHwPA07ExstacOtgSuxn_0VIml4zeriwpPdeq4WGrlJQ', '-33.40569', '-70.577844', '1', 'Si', '0', '', '', '0', '0', '0', '0', '0', '', '0', '0', '0', '0000-00-00', '0', '0', '0000-00-00', '', '', '', '0');
INSERT INTO `clientes_listado` VALUES ('8', '2015-01-12', 'test', '81dc9bdb52d04dc20036dbd8313ed055', '1', '1', 'joakhinn@gmail.com', 'JOAQUIN ALBERTO', 'VASQUEZ', 'TAPIA', '16029464-7', 'F', '2015-04-01', 'asdsad', '', '111', '', '', '0', '0', '2015-07-02', '0', '355864051171379', 'null', '0', '0', '1', 'Si', '0', '', '', '0', '0', '1', '0', '7', '', '0', '0', '0', '0000-00-00', '0', '0', '0000-00-00', '', '', '', '0');
INSERT INTO `clientes_listado` VALUES ('9', '2015-01-12', 'taxista2', '81dc9bdb52d04dc20036dbd8313ed055', '2', '1', '', '', '', '', '', '', '0000-00-00', '', '', '111', '', '', '0', '0', '0000-00-00', '0', '', '', '-33.6040135', '-70.5709844', '0', 'Si', '45', '', '', '1', '1', '0', '0', '1', 'aa1855', '1', '1', '2', '2015-03-15', '1', '0', '2015-03-15', 'asdasdasd', 'asdadasd', '', '0');
INSERT INTO `clientes_listado` VALUES ('10', '2015-03-18', 'tran1', '81dc9bdb52d04dc20036dbd8313ed055', '3', '1', '', '', '', '', '', '', '0000-00-00', '', '', '111', '', '', '0', '0', '0000-00-00', '0', '', 'null', '0', '-70.5931454449692', '0', '', '0', '', '', '1', '10', '2', '1', '5', 'aa1011', '1', '1', '2', '0000-00-00', '2', '1', '2015-03-11', 'qweqwasdas', 'asdasdqweqw', '', '1');
INSERT INTO `clientes_listado` VALUES ('11', '2015-03-18', 'tran2', '81dc9bdb52d04dc20036dbd8313ed055', '3', '1', '', '', '', '', '', '', '0000-00-00', '', '', '111', '', '', '0', '0', '0000-00-00', '0', '', 'null', '-33.6307440699055', '-70.6118297129669', '0', '', '0', '', '', '1', '10', '1', '2', '9', 'aa1012', '1', '1', '2', '0000-00-00', '2', '1', '0000-00-00', '', '', '', '1');
INSERT INTO `clientes_listado` VALUES ('12', '2015-03-18', 'tran3', '81dc9bdb52d04dc20036dbd8313ed055', '3', '1', '', '', '', '', '', '', '0000-00-00', '', '', '111', '', '', '0', '0', '0000-00-00', '0', '', 'null', '-33.6160032131651', '-70.6057893782654', '0', '', '0', '', '', '1', '10', '1', '3', '3', 'aa1013', '1', '1', '2', '0000-00-00', '2', '1', '0000-00-00', '', '', '', '1');
INSERT INTO `clientes_listado` VALUES ('13', '2015-03-18', 'tran4', '81dc9bdb52d04dc20036dbd8313ed055', '3', '1', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0', '0', '0000-00-00', '0', '', 'null', '-33.6192642865858', '-70.5948674231568', '0', '', '0', '', '', '1', '10', '1', '4', '4', 'aa1014', '1', '1', '2', '0000-00-00', '2', '1', '0000-00-00', '', '', '', '1');
INSERT INTO `clientes_listado` VALUES ('14', '2015-03-18', 'tran5', '81dc9bdb52d04dc20036dbd8313ed055', '3', '1', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0', '0', '0000-00-00', '0', '', '', '-33.6318785646505', '-70.5911874323883', '0', '', '0', '', '', '1', '10', '1', '5', '5', 'aa1015', '1', '1', '2', '0000-00-00', '2', '1', '0000-00-00', '', '', '', '1');
INSERT INTO `clientes_listado` VALUES ('15', '2015-03-18', 'tran6', '81dc9bdb52d04dc20036dbd8313ed055', '3', '1', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0', '0', '0000-00-00', '0', '', '', '-33.6223822934351', '-70.5786776095429', '0', '', '0', '', '', '1', '10', '1', '6', '6', 'aa1016', '1', '1', '2', '0000-00-00', '2', '1', '0000-00-00', '', '', '', '1');
INSERT INTO `clientes_listado` VALUES ('16', '2015-03-18', 'tran7', '81dc9bdb52d04dc20036dbd8313ed055', '3', '1', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0', '0', '0000-00-00', '0', '', '', '-33.606371158133', '-70.5737047940293', '0', '', '0', '', '', '1', '10', '2', '7', '0', 'aa1017', '1', '1', '2', '0000-00-00', '2', '1', '0000-00-00', '', '', '', '1');
INSERT INTO `clientes_listado` VALUES ('17', '2015-03-18', 'tran8', '81dc9bdb52d04dc20036dbd8313ed055', '3', '1', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0', '0', '0000-00-00', '0', '', '', '-33.6236598395869', '-70.5872231274643', '0', '', '0', '', '', '1', '10', '2', '8', '8', 'aa1018', '1', '1', '2', '0000-00-00', '2', '1', '0000-00-00', '', '', '', '1');
INSERT INTO `clientes_listado` VALUES ('18', '2015-03-18', 'tran9', '81dc9bdb52d04dc20036dbd8313ed055', '3', '1', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0', '0', '0000-00-00', '0', '', '', '-33.6239010524687', '-70.5961870699921', '0', '', '0', '', '', '1', '10', '2', '9', '9', 'aa1019', '1', '1', '2', '0000-00-00', '2', '1', '0000-00-00', '', '', '', '1');
INSERT INTO `clientes_listado` VALUES ('19', '0000-00-00', '', '', '3', '0', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0', '0', '0000-00-00', '0', '', '', '0', '0', '0', '', '0', '', '', '0', '0', '0', '0', '0', 'aa1020', '0', '0', '0', '0000-00-00', '0', '0', '0000-00-00', '', '', '', '0');
INSERT INTO `clientes_listado` VALUES ('20', '0000-00-00', '', '', '3', '0', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0', '0', '0000-00-00', '0', '', '', '0', '0', '0', '', '0', '', '', '0', '0', '0', '0', '0', 'aa1021', '0', '0', '0', '0000-00-00', '0', '0', '0000-00-00', '', '', '', '0');
INSERT INTO `clientes_listado` VALUES ('21', '0000-00-00', '', '', '3', '0', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0', '0', '0000-00-00', '0', '', '', '0', '0', '0', '', '0', '', '', '0', '0', '0', '0', '0', 'aa1022', '0', '0', '0', '0000-00-00', '0', '0', '0000-00-00', '', '', '', '0');
INSERT INTO `clientes_listado` VALUES ('22', '2015-05-19', 'tranf12', '81dc9bdb52d04dc20036dbd8313ed055', '3', '1', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '0', '0', '0000-00-00', '0', '', '', '0', '0', '0', '', '0', '', '', '2', '1', '0', '1', '1', 'as1825', '1', '1', '1', '2015-05-07', '1', '1', '2015-05-06', 'xcvxcvxc', 'xcvxcv', 'xcv', '2');
INSERT INTO `clientes_listado` VALUES ('23', '2015-08-13', 'alimento', '81dc9bdb52d04dc20036dbd8313ed055', '4', '1', 'prueba@prueba.cl', 'alimento', 'prueba', 'prueba', '', '', '0000-00-00', '', '', '', '', '', '0', '0', '0000-00-00', '0', '', '', '0', '0', '0', '', '0', '', '', '0', '0', '0', '0', '0', '', '0', '0', '0', '0000-00-00', '0', '0', '0000-00-00', '', '', '', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_notificaciones
-- ----------------------------
INSERT INTO `clientes_notificaciones` VALUES ('2', '14', '8', '6', '3', 'JOAQUIN ALBERTO VASQUEZ ha informado un accidente cerca', '2015-01-12', '7', '0');
INSERT INTO `clientes_notificaciones` VALUES ('3', '15', '8', '6', '3', 'JOAQUIN ALBERTO VASQUEZ ha informado un accidente cerca', '2015-01-12', '8', '0');
INSERT INTO `clientes_notificaciones` VALUES ('4', '2', '8', '6', '7', 'JOAQUIN ALBERTO VASQUEZ ha informado del robo de su vehiculo', '2015-01-12', '8', '3');

-- ----------------------------
-- Table structure for clientes_observaciones
-- ----------------------------
DROP TABLE IF EXISTS `clientes_observaciones`;
CREATE TABLE `clientes_observaciones` (
  `idObservacion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Observacion` text NOT NULL,
  PRIMARY KEY (`idObservacion`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_observaciones
-- ----------------------------
INSERT INTO `clientes_observaciones` VALUES ('1', '9', '1', '2015-01-21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum');
INSERT INTO `clientes_observaciones` VALUES ('3', '8', '1', '2015-04-10', 'asd');

-- ----------------------------
-- Table structure for clientes_sexo
-- ----------------------------
DROP TABLE IF EXISTS `clientes_sexo`;
CREATE TABLE `clientes_sexo` (
  `idSexo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `Inicial` char(2) NOT NULL,
  PRIMARY KEY (`idSexo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_sexo
-- ----------------------------
INSERT INTO `clientes_sexo` VALUES ('1', 'Masculino', 'M');
INSERT INTO `clientes_sexo` VALUES ('2', 'Femenino', 'F');

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
  PRIMARY KEY (`idTipoCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_tipos
-- ----------------------------
INSERT INTO `clientes_tipos` VALUES ('1', 'Sistema Transantiago (usuario)', 'logos_logo_normal.png', 'normal@normal.com', 'Sistema Transantiago (usuario)', '16029464-7', 'direccion', '12345678', 'asd', 'asd', 'background_color_10', 'background_color_34', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_box_02', 'cover_img_03', 'background_color_88', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_externa_2', '', 'background_color_89', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_externa_2', '', 'background_color_92', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_externa_2', '', 'form_color_8', 'background_color_29', 'link_text_color3', 'width75', 'border_radius5', 'cover_img_07', 'background_color_28', 'link_text_color5', 'width75', 'border_radius5', 'cover_img_08', 'background_color_23', 'link_text_color6', 'width75', 'border_radius5', 'cover_img_06', 'background_color_16', 'link_text_color4', 'width75', 'border_radius5', 'cover_img_04', 'cover_img_01', 'border_radius50p', 'sombra_externa_1', 'width40', 'letter_size_17', 'link_text_color4', 'letter_size_12', 'link_text_color3', 'letter_size_04', 'link_text_color2', 'sombra_box_02', 'cover_img_15', 'border_separator_1', 'width95', 'fcenter', 'tb_deg_1', 'border_radius05p', 'letter_size_05', 'link_text_color3', 'letter_size_04', 'link_text_color2', 'link_text_color2', 'letter_size_07', 'width100', 'cover_img_03', 'sombra_box_02', 'fcenter', 'background_color_06', 'background_color_01', 'noti_hover04', 'noti_checked06', 'tabscolorbase1', 'tabscolorchecked4', 'link_text_color4', 'link_text_color5', 'link_text_color2', 'letter_size_07', 'letter_size_06', 'letter_size_04', 'background_color_35', 'link_text_color1', 'letter_size_04', 'background_color_36', 'link_text_color1', 'letter_size_04', 'letter_size_18', 'link_text_color4', 'letter_size_08', 'link_text_color2', 'letter_size_06', 'link_text_color2', 'letter_size_06', 'link_text_color4', 'letter_size_06', 'link_text_color2', '1', '1', '1', '1', '5', '1', '2', '2');
INSERT INTO `clientes_tipos` VALUES ('2', 'Sistema Taxis (chofer)', 'logos_logo_taxi.png', 'sostaxi@sostaxi.com', 'Sistema Taxis (chofer)', '16029464-7', 'sostaxi', '12345678', 'sostaxi', 'sostaxi', 'background_color_06', 'background_color_34', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_box_30', 'cover_img_05', 'background_color_33', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_box_30', 'cover_img_05', 'background_color_53', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_box_30', 'cover_img_07', 'background_color_35', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', 'sombra_box_30', 'cover_img_20', 'form_color_8', 'background_color_91', 'link_text_color3', 'width70', 'border_radius5', 'cover_img_07', 'background_color_93', 'link_text_color5', 'width70', 'border_radius5', 'cover_img_08', 'background_color_28', 'link_text_color6', 'width70', 'border_radius5', 'cover_img_21', 'background_color_10', 'link_text_color4', 'width70', 'border_radius5', 'cover_img_34', 'cover_img_01', 'border_radius50p', 'sombra_box_29', 'width50', 'letter_size_10', 'link_text_color4', 'letter_size_07', 'link_text_color2', 'letter_size_04', 'link_text_color2', 'sombra_box_02', 'cover_img_04', '', 'width95', 'fcenter', 'tb_deg_1', '', 'letter_size_06', 'link_text_color4', 'letter_size_02', 'link_text_color2', 'link_text_color4', 'letter_size_06', 'width100', '', '', '', 'background_color_06', 'background_color_01', 'noti_hover04', 'noti_checked06', 'tabscolorbase1', 'tabscolorchecked4', 'link_text_color3', 'link_text_color4', 'link_text_color2', 'letter_size_06', 'letter_size_06', 'letter_size_02', 'background_color_01', 'link_text_color1', 'letter_size_04', 'background_color_36', 'link_text_color1', 'letter_size_04', 'letter_size_11', 'link_text_color4', 'letter_size_08', 'link_text_color4', 'letter_size_05', 'link_text_color2', 'letter_size_03', 'link_text_color2', 'letter_size_02', 'link_text_color2', '0', '0', '0', '0', '5', '1', '2', '2');
INSERT INTO `clientes_tipos` VALUES ('3', 'Sistema Transantiago (chofer)', '', 'transantiago@transantiago.cl', 'Sistema Transantiago (chofer)', '16029464-7', 'Transantiago', '123', 'santiago', 'puente2', 'background_color_06', 'background_color_34', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', '', 'cover_img_05', 'background_color_35', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', '', 'cover_img_06', 'background_color_36', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', '', 'cover_img_07', 'background_color_42', 'width90', 'border_radius5', 'fcenter', 'link_text_color1', '', 'cover_img_10', 'form_color_4', 'background_color_91', 'link_text_color3', 'width65', 'border_radius5', 'cover_img_07', 'background_color_93', 'link_text_color5', 'width65', 'border_radius5', 'cover_img_08', 'background_color_94', 'link_text_color6', 'width65', 'border_radius5', 'cover_img_20', 'background_color_95', 'link_text_color4', 'width65', 'border_radius5', 'cover_img_04', 'cover_img_01', 'border_radius50p', '', 'width45', 'letter_size_05', 'link_text_color1', 'letter_size_04', 'link_text_color1', 'letter_size_03', 'link_text_color1', 'sombra_box_01', 'cover_img_03', 'border_separator_1', 'width100', '', 'tb_deg_1', '', 'letter_size_06', 'link_text_color7', 'letter_size_03', 'link_text_color4', 'link_text_color3', 'letter_size_05', 'width100', '', '', '', 'background_color_06', 'background_color_01', 'noti_hover04', 'noti_checked06', 'tabscolorbase1', 'tabscolorchecked4', 'link_text_color2', 'link_text_color4', 'link_text_color2', 'letter_size_04', 'letter_size_04', 'letter_size_04', 'background_color_35', 'link_text_color1', 'letter_size_04', 'background_color_36', 'link_text_color1', 'letter_size_04', 'letter_size_07', 'link_text_color1', 'letter_size_06', 'link_text_color1', 'letter_size_05', 'link_text_color1', 'letter_size_04', 'link_text_color1', 'letter_size_03', 'link_text_color1', '2', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `clientes_tipos` VALUES ('4', 'Sistema Approbar', '', 'aprobar@gmail.com', 'Approbar', '12540263-1', 'Approbar 123', '1234', 'asd', 'asd', 'background_color_06', 'background_color_94', 'width90', 'border_radius5', 'fcenter', 'link_text_color6', '', 'cover_img_06', 'background_color_95', 'width90', 'border_radius5', 'fcenter', 'link_text_color4', '', 'cover_img_04', 'background_color_91', 'width90', 'border_radius5', 'fcenter', 'link_text_color3', '', 'cover_img_07', 'background_color_93', 'width90', 'border_radius5', 'fcenter', 'link_text_color5', '', 'cover_img_08', 'form_color_3', 'background_color_91', 'link_text_color3', 'width75', 'border_radius5', 'cover_img_07', 'background_color_93', 'link_text_color5', 'width75', 'border_radius5', 'cover_img_08', 'background_color_94', 'link_text_color6', 'width75', 'border_radius5', 'cover_img_06', 'background_color_95', 'link_text_color4', 'width75', 'border_radius5', 'cover_img_38', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'link_text_color2', 'letter_size_07', 'width100', 'cover_img_04', 'sombra_box_00', 'fcenter', 'background_color_20', 'background_color_01', 'noti_hover03', 'noti_checked18', 'tabscolorbase1', 'tabscolorchecked2', 'link_text_color4', 'link_text_color2', 'link_text_color7', 'letter_size_06', 'letter_size_04', 'letter_size_04', 'background_color_35', 'link_text_color1', 'letter_size_04', 'background_color_36', 'link_text_color1', 'letter_size_04', 'letter_size_07', 'link_text_color4', 'letter_size_06', 'link_text_color2', 'letter_size_06', 'link_text_color2', 'letter_size_05', 'link_text_color2', 'letter_size_04', 'link_text_color7', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `clientes_tipos` VALUES ('5', 'Sistema Taxis (usuario)', '', 'asdasd@asd.cl', 'Sistema Taxis (usuario)', '11708613-5', 'asd', '234234', 'asd', 'asd', 'background_color_01', 'background_color_42', 'width85', 'border_radius5', 'fcenter', 'link_text_color1', '', 'cover_img_05', 'background_color_35', 'width85', 'border_radius5', 'fcenter', 'link_text_color1', '', 'cover_img_06', 'background_color_100', 'width85', 'border_radius5', 'fcenter', 'link_text_color1', '', 'cover_img_07', 'background_color_37', 'width85', 'border_radius5', 'fcenter', 'link_text_color1', '', 'cover_img_08', 'form_color_13', 'background_color_91', 'link_text_color3', 'width75', 'border_radius5', 'cover_img_07', 'background_color_93', 'link_text_color5', 'width75', 'border_radius5', 'cover_img_08', 'background_color_94', 'link_text_color6', 'width75', 'border_radius5', 'cover_img_20', 'background_color_95', 'link_text_color4', 'width75', 'border_radius5', 'cover_img_05', '', '', '', '', '', '', '', '', '', '', 'sombra_box_00', 'cover_img_03', 'border_separator_1', 'width100', 'fcenter', 'tb_deg_0', '', 'letter_size_08', 'link_text_color1', 'letter_size_05', 'link_text_color1', 'link_text_color4', 'letter_size_08', 'width100', 'cover_img_03', 'sombra_box_00', 'fcenter', 'background_color_06', 'background_color_01', 'noti_hover03', 'noti_checked06', 'tabscolorbase1', 'tabscolorchecked2', 'link_text_color7', 'link_text_color2', 'link_text_color2', 'letter_size_07', 'letter_size_07', 'letter_size_06', 'background_color_42', 'link_text_color1', 'letter_size_06', 'background_color_100', 'link_text_color1', 'letter_size_06', 'letter_size_09', 'link_text_color1', 'letter_size_08', 'link_text_color1', 'letter_size_07', 'link_text_color1', 'letter_size_06', 'link_text_color1', 'letter_size_06', 'link_text_color1', '0', '0', '0', '0', '0', '0', '0', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_vehiculos
-- ----------------------------
INSERT INTO `clientes_vehiculos` VALUES ('1', '7', 'aa1856', '1', '1', '1', '2015-01-01', '1', '1', '2015-01-21', 'asdasd', 'asdasd', 'asd');
INSERT INTO `clientes_vehiculos` VALUES ('2', '6', 'aa1857', '1', '1', '1', '0000-00-00', '1', '0', '2014-06-05', '1232132324', '345345345345', '');
INSERT INTO `clientes_vehiculos` VALUES ('3', '8', 'au1825', '1', '1', '2', '0000-00-00', '1', '1', '2015-01-01', '343435', '345345', 'vcbcvb');
INSERT INTO `clientes_vehiculos` VALUES ('4', '8', 'aa1013', '1', '1', '2', '2015-04-01', '1', '1', '2015-04-01', '345', '345', 'asasd');

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
-- Table structure for clientes_votos
-- ----------------------------
DROP TABLE IF EXISTS `clientes_votos`;
CREATE TABLE `clientes_votos` (
  `idVoto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `idPregunta` int(11) unsigned NOT NULL,
  `idRespuesta` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idVoto`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_votos
-- ----------------------------
INSERT INTO `clientes_votos` VALUES ('1', '6', '1', '3');
INSERT INTO `clientes_votos` VALUES ('2', '6', '2', '7');
INSERT INTO `clientes_votos` VALUES ('3', '6', '1', '3');
INSERT INTO `clientes_votos` VALUES ('4', '6', '1', '2');
INSERT INTO `clientes_votos` VALUES ('5', '6', '1', '5');
INSERT INTO `clientes_votos` VALUES ('6', '6', '1', '5');
INSERT INTO `clientes_votos` VALUES ('7', '6', '1', '4');
INSERT INTO `clientes_votos` VALUES ('8', '6', '1', '1');

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
  `UrlApp` varchar(200) NOT NULL,
  `tareasServer` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id_Datos`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_datos
-- ----------------------------
INSERT INTO `core_datos` VALUES ('1', 'asd@bla21.cl', 'Corporacion Test', '16029464-7', 'Los Lirios 0936', '85125171', 'Santiago', 'Puente Alto', 'http://190.98.210.36/sostaxi/app/', '2');

-- ----------------------------
-- Table structure for core_datos_opciones
-- ----------------------------
DROP TABLE IF EXISTS `core_datos_opciones`;
CREATE TABLE `core_datos_opciones` (
  `idOpciones` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(80) NOT NULL,
  PRIMARY KEY (`idOpciones`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_datos_opciones
-- ----------------------------
INSERT INTO `core_datos_opciones` VALUES ('1', 'Si');
INSERT INTO `core_datos_opciones` VALUES ('2', 'No');

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
  `visualizacion` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idAdmpm`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_permisos
-- ----------------------------
INSERT INTO `core_permisos` VALUES ('1', '2', 'admin_clientes.php?pagina=1', 'admin_clientes.php', 'Clientes - Listado', '1', '1');
INSERT INTO `core_permisos` VALUES ('2', '2', 'admin_clientes_activation.php?pagina=1', 'admin_clientes_activation.php', 'Clientes - Cambiar Estado', '1', '1');
INSERT INTO `core_permisos` VALUES ('3', '1', 'admin_usr.php?pagina=1', 'admin_usr.php', 'Usuarios - Administracion', '1', '9998');
INSERT INTO `core_permisos` VALUES ('4', '1', 'admin_usr_activation.php?pagina=1', 'admin_usr_activation.php', 'Usuarios - Cambiar Estado', '1', '9998');
INSERT INTO `core_permisos` VALUES ('5', '1', 'admin_usr_password.php?pagina=1', 'admin_usr_password.php', 'Usuarios - Cambio clave', '1', '9998');
INSERT INTO `core_permisos` VALUES ('6', '1', 'admin_usr_permisos.php?pagina=1', 'admin_usr_permisos.php', 'Usuarios - Asignar Permisos', '1', '9998');
INSERT INTO `core_permisos` VALUES ('7', '1', 'admin_usr_type.php?pagina=1', 'admin_usr_type.php', 'Usuarios - Cambiar Tipo', '1', '9998');
INSERT INTO `core_permisos` VALUES ('8', '12', 'mnt_ubicacion_comunas.php?pagina=1', 'mnt_ubicacion_comunas.php', 'MNT Ubicacion Comunas', '1', '9999');
INSERT INTO `core_permisos` VALUES ('9', '4', 'gestion_mensajes.php', 'gestion_mensajes.php', 'Mensajes Envio', '1', '1');
INSERT INTO `core_permisos` VALUES ('10', '6', 'alertas_geolocalizacion.php', 'alertas_geolocalizacion.php', 'Alertas - Geolocalizacion', '1', '1');
INSERT INTO `core_permisos` VALUES ('11', '6', 'alertas_listado.php?pagina=1', 'alertas_listado.php', 'Alertas - Listado', '1', '1');
INSERT INTO `core_permisos` VALUES ('12', '6', 'alertas_listado_historico.php', 'alertas_listado_historico.php', 'Alertas - Historico', '1', '1');
INSERT INTO `core_permisos` VALUES ('13', '6', 'alertas_cliente.php?pagina=1', 'alertas_cliente.php', 'Alertas - Por cliente', '1', '1');
INSERT INTO `core_permisos` VALUES ('14', '4', 'gestion_mensajes_historico.php', 'gestion_mensajes_historico.php', 'Mensajes Historico', '1', '1');
INSERT INTO `core_permisos` VALUES ('15', '3', 'mnt_fonos.php?pagina=1', 'mnt_fonos.php', 'MNT Numeros de Contacto', '1', '9999');
INSERT INTO `core_permisos` VALUES ('16', '12', 'mnt_ubicacion_region.php?pagina=1', 'mnt_ubicacion_region.php', 'MNT Ubicacion Region', '1', '9999');
INSERT INTO `core_permisos` VALUES ('17', '3', 'mnt_grupos.php?pagina=1', 'mnt_grupos.php', 'MNT Grupos', '1', '9999');
INSERT INTO `core_permisos` VALUES ('18', '3', 'admin_datos.php', 'admin_datos.php', 'MNT Datos de la empresa', '1', '9999');
INSERT INTO `core_permisos` VALUES ('29', '11', 'apariencia_grillas.php?pagina=1', 'apariencia_grillas.php', 'MNT App - Grillas', '1', '9999');
INSERT INTO `core_permisos` VALUES ('30', '11', 'apariencia_ancho_img.php?pagina=1', 'apariencia_ancho_img.php', 'MNT App - Tamaño de imagen', '1', '9999');
INSERT INTO `core_permisos` VALUES ('21', '5', 'apariencia_principal.php?pagina=1', 'apariencia_principal.php', 'APP - Apariencia Visual - Estilo', '1', '9999');
INSERT INTO `core_permisos` VALUES ('22', '11', 'apariencia_fondo.php?pagina=1', 'apariencia_fondo.php', 'MNT App - Color de Fondo', '1', '9999');
INSERT INTO `core_permisos` VALUES ('23', '11', 'apariencia_color_botones.php?pagina=1', 'apariencia_color_botones.php', 'MNT App - Color de botones', '1', '9999');
INSERT INTO `core_permisos` VALUES ('24', '11', 'apariencia_colortexto.php?pagina=1', 'apariencia_colortexto.php', 'MNT App - Color del texto', '1', '9999');
INSERT INTO `core_permisos` VALUES ('25', '11', 'apariencia_ancho.php?pagina=1', 'apariencia_ancho.php', 'MNT App - Ancho contenedores', '1', '9999');
INSERT INTO `core_permisos` VALUES ('26', '11', 'apariencia_borderradius.php?pagina=1', 'apariencia_borderradius.php', 'MNT App - Bordes redondeados', '1', '9999');
INSERT INTO `core_permisos` VALUES ('27', '11', 'apariencia_sombras.php?pagina=1', 'apariencia_sombras.php', 'MNT App - Tipos de Sombras', '1', '9999');
INSERT INTO `core_permisos` VALUES ('28', '11', 'apariencia_formcolor.php?pagina=1', 'apariencia_formcolor.php', 'MNT App - Color de formulario', '1', '9999');
INSERT INTO `core_permisos` VALUES ('39', '7', 'robos_listado.php?pagina=1', 'robos_listado.php', 'Robos - Listado', '1', '1');
INSERT INTO `core_permisos` VALUES ('32', '5', 'comportamiento_principal.php?pagina=1', 'comportamiento_principal.php', 'APP - Comportamiento', '1', '9999');
INSERT INTO `core_permisos` VALUES ('33', '11', 'apariencia_sizetext.php?pagina=1', 'apariencia_sizetext.php', 'MNT App - Tamaños texto', '1', '9999');
INSERT INTO `core_permisos` VALUES ('34', '11', 'apariencia_border.php?pagina=1', 'apariencia_border.php', 'MNT App - Bordes de contenedores', '1', '9999');
INSERT INTO `core_permisos` VALUES ('35', '3', 'alertas_tipos.php?pagina=1', 'alertas_tipos.php', 'MNT Alertas - Tipos de alerta', '1', '9999');
INSERT INTO `core_permisos` VALUES ('36', '5', 'comportamiento_botones.php?pagina=1', 'comportamiento_botones.php', 'APP - Apariencia Visual - Comportamiento', '1', '9999');
INSERT INTO `core_permisos` VALUES ('37', '5', 'comportamiento_sistemas.php?pagina=1', 'comportamiento_sistemas.php', 'APP - Sistemas', '1', '9999');
INSERT INTO `core_permisos` VALUES ('38', '5', 'comportamiento_botones_tipos.php?pagina=1', 'comportamiento_botones_tipos.php', 'APP - Administrar Tipos de Botones', '1', '9999');
INSERT INTO `core_permisos` VALUES ('40', '7', 'robos_geolocalizacion.php?pagina=1', 'robos_geolocalizacion.php', 'Robos - Geolocalizacion', '1', '1');
INSERT INTO `core_permisos` VALUES ('41', '7', 'robos_clientes.php?pagina=1', 'robos_clientes.php', 'Robos - Por cliente', '1', '1');
INSERT INTO `core_permisos` VALUES ('42', '7', 'robos_listado_historico.php?pagina=1', 'robos_listado_historico.php', 'Robos - Historico', '1', '1');
INSERT INTO `core_permisos` VALUES ('43', '2', 'admin_clientes_vehiculos.php?pagina=1', 'admin_clientes_vehiculos.php', 'Clientes - Vehiculos', '1', '1');
INSERT INTO `core_permisos` VALUES ('44', '13', 'vehiculos_marcas.php?pagina=1', 'vehiculos_marcas.php', 'MNT Vehiculos - Marcas', '1', '9999');
INSERT INTO `core_permisos` VALUES ('45', '13', 'vehiculos_modelos.php?pagina=1', 'vehiculos_modelos.php', 'MNT Vehiculos - Modelos', '1', '9999');
INSERT INTO `core_permisos` VALUES ('46', '13', 'vehiculos_transmision.php?pagina=1', 'vehiculos_transmision.php', 'MNT Vehiculos - Transmision', '1', '9999');
INSERT INTO `core_permisos` VALUES ('47', '13', 'vehiculos_colores.php?pagina=1', 'vehiculos_colores.php', 'MNT Vehiculos - Colores', '1', '9999');
INSERT INTO `core_permisos` VALUES ('48', '11', 'apariencia_tablas_degradados.php?pagina=1', 'apariencia_tablas_degradados.php', 'MNT App - Tablas-degradados', '1', '9999');
INSERT INTO `core_permisos` VALUES ('49', '11', 'apariencia_tablas_separador.php?pagina=1', 'apariencia_tablas_separador.php', 'MNT App - Tablas-separador', '1', '9999');
INSERT INTO `core_permisos` VALUES ('50', '11', 'apariencia_alto.php?pagina=1', 'apariencia_alto.php', 'MNT App - Alto contenedores', '1', '9999');
INSERT INTO `core_permisos` VALUES ('51', '11', 'apariencia_noti_colorchecked.php?pagina=1', 'apariencia_noti_colorchecked.php', 'MNT App - Notificaciones tab checked', '1', '9999');
INSERT INTO `core_permisos` VALUES ('52', '11', 'apariencia_noti_colorhover.php?pagina=1', 'apariencia_noti_colorhover.php', 'MNT App - Notificaciones tab hover', '1', '9999');
INSERT INTO `core_permisos` VALUES ('53', '8', 'paginas_grupos.php?pagina=1', 'paginas_grupos.php', 'Paginas - Grupos de Categorias', '1', '1');
INSERT INTO `core_permisos` VALUES ('54', '8', 'paginas_categorias.php?pagina=1', 'paginas_categorias.php', 'Paginas - Categorias', '1', '1');
INSERT INTO `core_permisos` VALUES ('55', '8', 'paginas_listado.php?pagina=1', 'paginas_listado.php', 'Paginas - Listado', '1', '1');
INSERT INTO `core_permisos` VALUES ('56', '9', 'noticias_categorias.php?pagina=1', 'noticias_categorias.php', 'Noticias - Categorias', '1', '1');
INSERT INTO `core_permisos` VALUES ('57', '9', 'noticias_grupos.php?pagina=1', 'noticias_grupos.php', 'Noticias - Grupos de Categorias', '1', '1');
INSERT INTO `core_permisos` VALUES ('58', '9', 'noticias_listado.php?pagina=1', 'noticias_listado.php', 'Noticias - Listado', '1', '1');
INSERT INTO `core_permisos` VALUES ('59', '11', 'apariencia_noti_label.php?pagina=1', 'apariencia_noti_label.php', 'MNT App - Notificaciones label', '1', '9999');
INSERT INTO `core_permisos` VALUES ('60', '11', 'apariencia_noti_label_select.php?pagina=1', 'apariencia_noti_label_select.php', 'MNT App - Notificaciones label seleccionado', '1', '9999');
INSERT INTO `core_permisos` VALUES ('61', '10', 'carreras_listado.php?pagina=1', 'carreras_listado.php', 'Carreras - Estado de Taxistas', '1', '2');
INSERT INTO `core_permisos` VALUES ('62', '10', 'carreras_geolocalizacion.php', 'carreras_geolocalizacion.php', 'Carreras - Geolocalizacion', '1', '2');
INSERT INTO `core_permisos` VALUES ('63', '10', 'carreras_listado_historico.php', 'carreras_listado_historico.php', 'Carreras - Historico de Carreras', '1', '2');
INSERT INTO `core_permisos` VALUES ('64', '5', 'comportamiento_principal2.php', 'comportamiento_principal2.php', 'APP - Comportamiento General', '1', '9999');
INSERT INTO `core_permisos` VALUES ('66', '10', 'taxistas_activation.php?pagina=1', 'taxistas_activation.php', 'Taxistas - Cambiar Estado', '1', '2');
INSERT INTO `core_permisos` VALUES ('67', '10', 'taxistas_listado.php?pagina=1', 'taxistas_listado.php', 'Taxista - Listado', '1', '2');
INSERT INTO `core_permisos` VALUES ('69', '14', 'taxistas_sistema.php', 'taxistas_sistema.php', 'Taxistas - Sistema', '1', '2');
INSERT INTO `core_permisos` VALUES ('70', '10', 'taxistas_facturacion.php', 'taxistas_facturacion.php', 'Taxistas - Facturacion', '1', '2');
INSERT INTO `core_permisos` VALUES ('71', '10', 'taxistas_facturacion_historico.php', 'taxistas_facturacion_historico.php', 'Taxistas - Historico Facturacion', '1', '2');
INSERT INTO `core_permisos` VALUES ('72', '14', 'taxistas_tipo_pago.php?pagina=1', 'taxistas_tipo_pago.php', 'Taxistas - Tipos de Pago', '1', '9999');
INSERT INTO `core_permisos` VALUES ('73', '10', 'taxistas_bloqueo.php', 'taxistas_bloqueo.php', 'Taxistas - Bloqueo de Vehiculos', '1', '2');
INSERT INTO `core_permisos` VALUES ('74', '10', 'taxistas_bloqueos_historico.php', 'taxistas_bloqueos_historico.php', 'Taxistas - Historico de Bloqueos', '1', '2');
INSERT INTO `core_permisos` VALUES ('75', '3', 'mnt_imagenes_categorias.php?pagina=1', 'mnt_imagenes_categorias.php', 'MNT Imagenes - Categorias', '1', '9999');
INSERT INTO `core_permisos` VALUES ('76', '3', 'mnt_imagenes_listado.php?pagina=1', 'mnt_imagenes_listado.php', 'MNT Imagenes - Listado', '1', '9999');
INSERT INTO `core_permisos` VALUES ('77', '11', 'apariencia_margen.php?pagina=1', 'apariencia_margen.php', 'MNT App - Margenes', '1', '9999');
INSERT INTO `core_permisos` VALUES ('78', '15', 'preguntas_categorias.php?pagina=1', 'preguntas_categorias.php', 'Preguntas - Categorias', '1', '1');
INSERT INTO `core_permisos` VALUES ('79', '15', 'preguntas_listado.php?pagina=1', 'preguntas_listado.php', 'Preguntas - Listado', '1', '1');
INSERT INTO `core_permisos` VALUES ('80', '10', 'taxistas_propietarios.php?pagina=1', 'taxistas_propietarios.php', 'Propietarios - Listado', '1', '2');
INSERT INTO `core_permisos` VALUES ('81', '10', 'taxistas_conductores.php?pagina=1', 'taxistas_conductores.php', 'Conductores - Listado', '1', '2');
INSERT INTO `core_permisos` VALUES ('82', '10', 'taxistas_recorridos.php?pagina=1', 'taxistas_recorridos.php', 'Taxistas - Recorridos', '1', '2');
INSERT INTO `core_permisos` VALUES ('83', '21', 'transantiago_recorridos.php?pagina=1', 'transantiago_recorridos.php', 'Transantiago - Recorridos', '1', '3');
INSERT INTO `core_permisos` VALUES ('84', '21', 'transantiago_propietarios.php?pagina=1', 'transantiago_propietarios.php', 'Propietarios - Listado', '1', '3');
INSERT INTO `core_permisos` VALUES ('85', '21', 'transantiago_conductores.php?pagina=1', 'transantiago_conductores.php', 'Conductores - Listado', '1', '3');
INSERT INTO `core_permisos` VALUES ('86', '17', 'buses_transmision.php?pagina=1', 'buses_transmision.php', 'MNT Buses - Transmision', '1', '3');
INSERT INTO `core_permisos` VALUES ('87', '17', 'buses_colores.php?pagina=1', 'buses_colores.php', 'MNT Buses - Colores', '1', '3');
INSERT INTO `core_permisos` VALUES ('88', '17', 'buses_marcas.php?pagina=1', 'buses_marcas.php', 'MNT Buses - Marcas', '1', '3');
INSERT INTO `core_permisos` VALUES ('89', '17', 'buses_modelos.php?pagina=1', 'buses_modelos.php', 'MNT Buses - Modelos', '1', '3');
INSERT INTO `core_permisos` VALUES ('90', '21', 'transantiago_listado.php?pagina=1', 'transantiago_listado.php', 'Buses - Listado', '1', '3');
INSERT INTO `core_permisos` VALUES ('91', '18', 'alerta_transantiago_geolocalizacion.php', 'alerta_transantiago_geolocalizacion.php', 'Alertas Transantiago - Geolocalizacion', '1', '3');
INSERT INTO `core_permisos` VALUES ('92', '18', 'alerta_transantiago_listado.php?pagina=1', 'alerta_transantiago_listado.php', 'Alertas Transantiago - Listado', '1', '3');
INSERT INTO `core_permisos` VALUES ('93', '18', 'alerta_transantiago_listado_historico.php', 'alerta_transantiago_listado_historico.php', 'Alertas Transantiago - Historico', '1', '3');
INSERT INTO `core_permisos` VALUES ('94', '18', 'alerta_transantiago_cliente.php?pagina=1', 'alerta_transantiago_cliente.php', 'Alertas Transantiago - Maquina', '1', '3');
INSERT INTO `core_permisos` VALUES ('95', '19', 'transantiago_rutas_alternativas.php?pagina=1', 'transantiago_rutas_alternativas.php', 'Transantiago - Rutas Alt Imprevistas', '0', '3');
INSERT INTO `core_permisos` VALUES ('96', '19', 'transantiago_puntos_control.php?pagina=1', 'transantiago_puntos_control.php', 'Transantiago - Puntos de Control', '0', '3');
INSERT INTO `core_permisos` VALUES ('97', '19', 'transantiago_rutas_programadas.php?pagina=1', 'transantiago_rutas_programadas.php', 'Transantiago - Rutas Alt Programadas', '0', '3');
INSERT INTO `core_permisos` VALUES ('98', '16', 'transantiago_control_historico.php', 'transantiago_control_historico.php', 'Transantiago - Puntos de Control Historico', '0', '3');
INSERT INTO `core_permisos` VALUES ('99', '19', 'transantiago_control_entrada.php?pagina=1', 'transantiago_control_entrada.php', 'Transantiago - Control Entrada', '0', '3');
INSERT INTO `core_permisos` VALUES ('100', '19', 'transantiago_control_salida.php?pagina=1', 'transantiago_control_salida.php', 'Transantiago - Control Salida', '0', '3');
INSERT INTO `core_permisos` VALUES ('101', '19', 'transantiago_puntos_final_ruta.php?pagina=1', 'transantiago_puntos_final_ruta.php', 'Transantiago - Final de Ruta', '0', '3');
INSERT INTO `core_permisos` VALUES ('102', '19', 'transantiago_puntos_retorno.php?pagina=1', 'transantiago_puntos_retorno.php', 'Transantiago - Retorno Automatico', '0', '3');
INSERT INTO `core_permisos` VALUES ('103', '16', 'transantiago_conductores_historico.php?pagina=1', 'transantiago_conductores_historico.php', 'Conductores - Historico', '0', '3');
INSERT INTO `core_permisos` VALUES ('104', '19', 'transantiago_puntos_alertas.php?pagina=1', 'transantiago_puntos_alertas.php', 'Generacion Puntos de Alerta', '0', '3');
INSERT INTO `core_permisos` VALUES ('105', '19', 'transantiago_orden.php?pagina=1', 'transantiago_orden.php', 'Transantiago - Orden Recorridos', '0', '3');
INSERT INTO `core_permisos` VALUES ('106', '16', 'transantiago_seguimiento_ruta.php?pagina=1', 'transantiago_seguimiento_ruta.php', 'Seguimiento Buses', '0', '3');
INSERT INTO `core_permisos` VALUES ('107', '19', 'transantiago_control_flota.php?pagina=1', 'transantiago_control_flota.php', 'Control de Flota', '0', '3');
INSERT INTO `core_permisos` VALUES ('108', '20', 'espia_categorias.php?pagina=1', 'espia_categorias.php', 'Espia - Categorias', '0', '1');
INSERT INTO `core_permisos` VALUES ('109', '20', 'espia_listado.php?pagina=1', 'espia_listado.php', 'Espia - Listado de notas', '0', '1');
INSERT INTO `core_permisos` VALUES ('110', '4', 'gestion_transantiago_mensajes.php', 'gestion_transantiago_mensajes.php', 'Envio de mensajes Transantiago', '0', '3');
INSERT INTO `core_permisos` VALUES ('111', '22', 'productos_listado.php?pagina=1', 'productos_listado.php', 'Productos - Listado', '0', '9998');
INSERT INTO `core_permisos` VALUES ('112', '22', 'productos_listado_pasillos.php?pagina=1', 'productos_listado_pasillos.php', 'Productos - Pasillos', '0', '9998');
INSERT INTO `core_permisos` VALUES ('113', '22', 'productos_recetas.php?pagina=1', 'productos_recetas.php', 'Productos - Recetas', '0', '9998');
INSERT INTO `core_permisos` VALUES ('114', '22', 'productos_clientes.php?pagina=1', 'productos_clientes.php', 'Listado de clientes', '0', '9998');

-- ----------------------------
-- Table structure for core_permisos_cat
-- ----------------------------
DROP TABLE IF EXISTS `core_permisos_cat`;
CREATE TABLE `core_permisos_cat` (
  `id_pmcat` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(60) NOT NULL,
  `mode` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id_pmcat`,`mode`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_permisos_cat
-- ----------------------------
INSERT INTO `core_permisos_cat` VALUES ('1', 'Usuarios', '1');
INSERT INTO `core_permisos_cat` VALUES ('2', 'Clientes', '1');
INSERT INTO `core_permisos_cat` VALUES ('3', 'Mantenimiento', '1');
INSERT INTO `core_permisos_cat` VALUES ('4', 'Gestion', '1');
INSERT INTO `core_permisos_cat` VALUES ('5', 'App', '1');
INSERT INTO `core_permisos_cat` VALUES ('6', 'Alertas Clientes', '1');
INSERT INTO `core_permisos_cat` VALUES ('7', 'Robos', '1');
INSERT INTO `core_permisos_cat` VALUES ('8', 'Paginas', '1');
INSERT INTO `core_permisos_cat` VALUES ('9', 'Noticias', '1');
INSERT INTO `core_permisos_cat` VALUES ('10', 'Taxistas', '1');
INSERT INTO `core_permisos_cat` VALUES ('11', 'Mantenimiento APP', '1');
INSERT INTO `core_permisos_cat` VALUES ('12', 'Mantenimiento Ubicacion', '1');
INSERT INTO `core_permisos_cat` VALUES ('13', 'Mantenimiento Vehiculos', '1');
INSERT INTO `core_permisos_cat` VALUES ('14', 'Mantenimiento Taxistas', '1');
INSERT INTO `core_permisos_cat` VALUES ('15', 'Preguntas', '1');
INSERT INTO `core_permisos_cat` VALUES ('16', 'Transantiago', '1');
INSERT INTO `core_permisos_cat` VALUES ('17', 'Mantenimiento Buses', '1');
INSERT INTO `core_permisos_cat` VALUES ('18', 'Alertas Transantiago', '1');
INSERT INTO `core_permisos_cat` VALUES ('19', 'Transantiago Gestion Flota', '0');
INSERT INTO `core_permisos_cat` VALUES ('20', 'Espia', '0');
INSERT INTO `core_permisos_cat` VALUES ('21', 'Transantiago Mantenimiento', '0');
INSERT INTO `core_permisos_cat` VALUES ('22', 'Productos', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detalle_general
-- ----------------------------
INSERT INTO `detalle_general` VALUES ('1', '1', 'Activo');
INSERT INTO `detalle_general` VALUES ('2', '1', 'Bloqueado');
INSERT INTO `detalle_general` VALUES ('3', '2', 'Interno');
INSERT INTO `detalle_general` VALUES ('4', '2', 'Externo');
INSERT INTO `detalle_general` VALUES ('5', '3', 'Abierta');
INSERT INTO `detalle_general` VALUES ('6', '3', 'Cerrada');
INSERT INTO `detalle_general` VALUES ('7', '4', 'No Leida');
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
INSERT INTO `detalle_general` VALUES ('47', '999', 'Notificacion');

-- ----------------------------
-- Table structure for espia_categorias
-- ----------------------------
DROP TABLE IF EXISTS `espia_categorias`;
CREATE TABLE `espia_categorias` (
  `idEspiaCat` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `Margen` varchar(30) NOT NULL,
  `grid_color` varchar(30) NOT NULL,
  `grid_border` varchar(30) NOT NULL,
  `grid_shadow` varchar(30) NOT NULL,
  `grid_img` varchar(30) NOT NULL,
  `body_col` varchar(30) NOT NULL,
  PRIMARY KEY (`idEspiaCat`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of espia_categorias
-- ----------------------------
INSERT INTO `espia_categorias` VALUES ('1', 'No se detiene', 'espcat_espia_bus_no_detiene.png', 'box_col_1', 'background_color_56', 'border_radius5', 'sombra_box_00', 'center_img_1', '1');
INSERT INTO `espia_categorias` VALUES ('2', 'Bus no pasa', 'espcat_espia_bus_no_pasa.png', 'box_col_1', 'background_color_53', 'border_radius5', 'sombra_box_00', 'center_img_1', '1');
INSERT INTO `espia_categorias` VALUES ('3', 'Usuario no paga', 'espcat_espia_evasion.png', 'box_col_1', 'background_color_58', 'border_radius5', 'sombra_box_00', 'center_img_1', '1');
INSERT INTO `espia_categorias` VALUES ('4', 'Parada mal estado', 'espcat_espia_parada.png', 'box_col_1', 'background_color_04', 'border_radius5', 'sombra_box_00', 'center_img_1', '1');
INSERT INTO `espia_categorias` VALUES ('5', 'Mala conduccion', 'espcat_espia_conduccion.png', 'box_col_1', 'background_color_96', 'border_radius5', 'sombra_box_00', 'center_img_1', '1');
INSERT INTO `espia_categorias` VALUES ('6', 'Chofer problematico', 'espcat_espia_chofer.png', 'box_col_1', 'background_color_47', 'border_radius5', 'sombra_box_00', 'center_img_1', '1');

-- ----------------------------
-- Table structure for espia_estado
-- ----------------------------
DROP TABLE IF EXISTS `espia_estado`;
CREATE TABLE `espia_estado` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of espia_estado
-- ----------------------------
INSERT INTO `espia_estado` VALUES ('1', 'No leido');
INSERT INTO `espia_estado` VALUES ('2', 'Leido');

-- ----------------------------
-- Table structure for espia_listado
-- ----------------------------
DROP TABLE IF EXISTS `espia_listado`;
CREATE TABLE `espia_listado` (
  `idEspiaListado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idEspiaCat` int(11) unsigned NOT NULL,
  `idCliente` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Texto` text NOT NULL,
  `Nrecorrido` varchar(120) NOT NULL,
  `Nparada` varchar(120) NOT NULL,
  `idEstado` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idEspiaListado`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of espia_listado
-- ----------------------------
INSERT INTO `espia_listado` VALUES ('1', '2', '8', '2015-05-22', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', '', '', '2');
INSERT INTO `espia_listado` VALUES ('2', '6', '8', '2015-05-22', 'xxcx', 'vv', '', '2');
INSERT INTO `espia_listado` VALUES ('3', '6', '8', '2015-05-27', 'asdasd', 'f14', '', '2');

-- ----------------------------
-- Table structure for mnt_fonos
-- ----------------------------
DROP TABLE IF EXISTS `mnt_fonos`;
CREATE TABLE `mnt_fonos` (
  `idFono` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `Fono` varchar(15) NOT NULL,
  PRIMARY KEY (`idFono`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mnt_fonos
-- ----------------------------
INSERT INTO `mnt_fonos` VALUES ('1', 'Bomberos', '132');
INSERT INTO `mnt_fonos` VALUES ('2', 'Ambulancia', '131');
INSERT INTO `mnt_fonos` VALUES ('3', 'Carabineros', '133');

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
-- Table structure for mnt_imagenes_categorias
-- ----------------------------
DROP TABLE IF EXISTS `mnt_imagenes_categorias`;
CREATE TABLE `mnt_imagenes_categorias` (
  `idCatimg` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idCatimg`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mnt_imagenes_categorias
-- ----------------------------
INSERT INTO `mnt_imagenes_categorias` VALUES ('1', 'Iconos');
INSERT INTO `mnt_imagenes_categorias` VALUES ('2', 'Botones');

-- ----------------------------
-- Table structure for mnt_imagenes_listado
-- ----------------------------
DROP TABLE IF EXISTS `mnt_imagenes_listado`;
CREATE TABLE `mnt_imagenes_listado` (
  `idListimg` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCatimg` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `file` varchar(120) NOT NULL,
  PRIMARY KEY (`idListimg`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of mnt_imagenes_listado
-- ----------------------------
INSERT INTO `mnt_imagenes_listado` VALUES ('1', '1', 'accidentes', 'icn_map_alerta.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('2', '1', 'calle cerrada', 'icn_map_peligro.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('3', '1', 'Peligro', 'icn_map_robo_visto.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('4', '1', 'Persona Sospechosa', 'icn_map_ladron.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('5', '1', 'Solicitud de ayuda', 'icn_map_close.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('6', '1', 'Recepcion llamada taxi', 'icn_map_pass.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('7', '1', 'Robo Vehiculo', 'icn_map_robo_vehiculo.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('8', '1', 'Solicitud Taxi', 'icn_map_taxi.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('9', '2', 'Espia', 'icn_espia.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('10', '2', 'Sosclick', 'icn_sosclick.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('11', '2', 'transantiago', 'icn_transantiago.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('12', '2', 'boton sosclick alerta', 'icn_sosclick_alerta.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('13', '2', 'boton carrete seguro', 'icn_carrete_seguro.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('14', '2', 'boton enviar ubicacion', 'icn_carrete_enviar_ubicacion.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('15', '2', 'boton carrete seguro 2', 'icn_enviar_ubicacion.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('16', '2', 'boton pide mapa', 'icn_pide_mapa.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('17', '2', 'boton llegue a destino', 'icn_carrete_llegue.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('18', '2', 'boton sin transporte', 'icn_carrete_sintransporte.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('19', '2', 'boton llamame', 'icn_carrete_llamame.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('20', '2', 'volver sosclick', 'icn_soscloc_tit.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('21', '2', 'texto sosclick', 'icn_texto_ppal.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('22', '2', 'boton volver carrete seguro', 'icn_carrete_tit.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('23', '2', 'texto carrete seguro', 'icn_texto_carrete.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('24', '2', 'app bus', 'icn_appbuss logo.png');
INSERT INTO `mnt_imagenes_listado` VALUES ('25', '2', 'llamar taxi', 'icn_llamar taxi.png');

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
  `idTipoCliente` int(11) unsigned NOT NULL,
  `idNotGrupo` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  PRIMARY KEY (`idNotCat`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of noticias_categorias
-- ----------------------------
INSERT INTO `noticias_categorias` VALUES ('1', '1', '1', 'Categoria 01', '');

-- ----------------------------
-- Table structure for noticias_grupos
-- ----------------------------
DROP TABLE IF EXISTS `noticias_grupos`;
CREATE TABLE `noticias_grupos` (
  `idNotGrupo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idTipoCliente` int(11) unsigned NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`idNotGrupo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of noticias_grupos
-- ----------------------------
INSERT INTO `noticias_grupos` VALUES ('1', '1', 'Grupo 1');

-- ----------------------------
-- Table structure for noticias_listado
-- ----------------------------
DROP TABLE IF EXISTS `noticias_listado`;
CREATE TABLE `noticias_listado` (
  `idNotListado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idTipoCliente` int(11) unsigned NOT NULL,
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
INSERT INTO `noticias_listado` VALUES ('1', '1', '1', '1', 'test', '2015-01-02', '', '<p>test</p>\r\n', '1', '1');

-- ----------------------------
-- Table structure for noticias_listado_opc_com
-- ----------------------------
DROP TABLE IF EXISTS `noticias_listado_opc_com`;
CREATE TABLE `noticias_listado_opc_com` (
  `idComentarios` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idComentarios`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of noticias_listado_opc_com
-- ----------------------------
INSERT INTO `noticias_listado_opc_com` VALUES ('1', 'Permitir comentarios');
INSERT INTO `noticias_listado_opc_com` VALUES ('2', 'No Permitir comentarios');

-- ----------------------------
-- Table structure for noticias_listado_opc_pub
-- ----------------------------
DROP TABLE IF EXISTS `noticias_listado_opc_pub`;
CREATE TABLE `noticias_listado_opc_pub` (
  `idPublicacion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idPublicacion`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of noticias_listado_opc_pub
-- ----------------------------
INSERT INTO `noticias_listado_opc_pub` VALUES ('1', 'Automatica');
INSERT INTO `noticias_listado_opc_pub` VALUES ('2', 'Espera Aprobacion');

-- ----------------------------
-- Table structure for paginas_categorias
-- ----------------------------
DROP TABLE IF EXISTS `paginas_categorias`;
CREATE TABLE `paginas_categorias` (
  `idPagCat` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idTipoCliente` int(11) unsigned NOT NULL,
  `idPagGrupo` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  PRIMARY KEY (`idPagCat`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of paginas_categorias
-- ----------------------------
INSERT INTO `paginas_categorias` VALUES ('1', '1', '1', 'Categoria 01', '');

-- ----------------------------
-- Table structure for paginas_grupos
-- ----------------------------
DROP TABLE IF EXISTS `paginas_grupos`;
CREATE TABLE `paginas_grupos` (
  `idPagGrupo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idTipoCliente` int(11) unsigned NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`idPagGrupo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of paginas_grupos
-- ----------------------------
INSERT INTO `paginas_grupos` VALUES ('1', '1', 'Grupo 01');

-- ----------------------------
-- Table structure for paginas_listado
-- ----------------------------
DROP TABLE IF EXISTS `paginas_listado`;
CREATE TABLE `paginas_listado` (
  `idPagListado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idTipoCliente` int(11) unsigned NOT NULL,
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
INSERT INTO `paginas_listado` VALUES ('1', '1', '1', '1', 'test', '2015-01-02', '', '<p>test</p>\r\n');

-- ----------------------------
-- Table structure for preguntas_categorias
-- ----------------------------
DROP TABLE IF EXISTS `preguntas_categorias`;
CREATE TABLE `preguntas_categorias` (
  `idCategorias` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idTipoCliente` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idCategorias`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of preguntas_categorias
-- ----------------------------
INSERT INTO `preguntas_categorias` VALUES ('1', '1', 'Nacional');

-- ----------------------------
-- Table structure for preguntas_estado
-- ----------------------------
DROP TABLE IF EXISTS `preguntas_estado`;
CREATE TABLE `preguntas_estado` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of preguntas_estado
-- ----------------------------
INSERT INTO `preguntas_estado` VALUES ('1', 'Abierta');
INSERT INTO `preguntas_estado` VALUES ('2', 'Publicada');
INSERT INTO `preguntas_estado` VALUES ('3', 'Cerrada');

-- ----------------------------
-- Table structure for preguntas_listado
-- ----------------------------
DROP TABLE IF EXISTS `preguntas_listado`;
CREATE TABLE `preguntas_listado` (
  `idPregunta` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idTipoCliente` int(11) unsigned NOT NULL,
  `idCategorias` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `Pregunta` varchar(200) NOT NULL,
  `Fecha` date NOT NULL,
  `Estado` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idPregunta`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of preguntas_listado
-- ----------------------------
INSERT INTO `preguntas_listado` VALUES ('1', '1', '1', '1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '2015-01-27', '2');
INSERT INTO `preguntas_listado` VALUES ('2', '1', '1', '1', 'JSDHDSHJDSHJDSD', '2015-01-27', '2');
INSERT INTO `preguntas_listado` VALUES ('3', '0', '0', '1', '', '0000-00-00', '0');

-- ----------------------------
-- Table structure for preguntas_respuestas
-- ----------------------------
DROP TABLE IF EXISTS `preguntas_respuestas`;
CREATE TABLE `preguntas_respuestas` (
  `idRespuesta` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idPregunta` int(11) unsigned NOT NULL,
  `Respuesta` varchar(200) NOT NULL,
  PRIMARY KEY (`idRespuesta`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of preguntas_respuestas
-- ----------------------------
INSERT INTO `preguntas_respuestas` VALUES ('1', '1', 'test 2');
INSERT INTO `preguntas_respuestas` VALUES ('2', '1', 'test');
INSERT INTO `preguntas_respuestas` VALUES ('3', '1', 'dfg');
INSERT INTO `preguntas_respuestas` VALUES ('4', '1', 'dasdasdasd');
INSERT INTO `preguntas_respuestas` VALUES ('5', '1', 'qweqwewqe');
INSERT INTO `preguntas_respuestas` VALUES ('6', '2', 'QWE');
INSERT INTO `preguntas_respuestas` VALUES ('7', '2', 'RTY');

-- ----------------------------
-- Table structure for productos_consultados
-- ----------------------------
DROP TABLE IF EXISTS `productos_consultados`;
CREATE TABLE `productos_consultados` (
  `idConsultado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `Latitud` double NOT NULL,
  `Longitud` double NOT NULL,
  `idProducto` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`idConsultado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_consultados
-- ----------------------------

-- ----------------------------
-- Table structure for productos_favoritos
-- ----------------------------
DROP TABLE IF EXISTS `productos_favoritos`;
CREATE TABLE `productos_favoritos` (
  `idFavorito` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `idProducto` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idFavorito`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_favoritos
-- ----------------------------
INSERT INTO `productos_favoritos` VALUES ('1', '10', '1');

-- ----------------------------
-- Table structure for productos_listado
-- ----------------------------
DROP TABLE IF EXISTS `productos_listado`;
CREATE TABLE `productos_listado` (
  `idProducto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `Fabricante` varchar(120) NOT NULL,
  `idEvaluacion` int(11) unsigned NOT NULL,
  `Evaluacion` varchar(10) NOT NULL,
  `Precio` varchar(10) NOT NULL,
  `idPasillo` int(11) unsigned NOT NULL,
  `Informacion` text NOT NULL,
  `Descripcion` text NOT NULL,
  `Nombre_imagen` varchar(160) NOT NULL,
  `CodigoProd` varchar(120) NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_listado
-- ----------------------------
INSERT INTO `productos_listado` VALUES ('1', 'Fideos tipo spaguetti ', 'Luchetty', '3', '5.2', '650', '1', '<p>Comestible:&nbsp;&nbsp; &nbsp;100 %<br />\r\nEnerg&iacute;a: 350,00 Kcal.<br />\r\nCarbohidratos: 59,00 g.<br />\r\nGrasas:&nbsp;&nbsp; &nbsp;2,00 g.<br />\r\nProteinas: 9,00 g.</p>\r\n', '<p>Los espaguetis o spaghetti es la pasta seca por excelencia, el plato preferido de los italianos, y de los que no somos italianos. De hecho en Italia se comen hasta 28 kilos de espaguetis por persona al a&ntilde;o. Siendo la producci&oacute;n anual de pasta de 3 millones de toneladas, la mitad se destina a la exportaci&oacute;n.</p>\r\n', 'producto_Fideos tipo spaguetti spagheti.jpg', 'f816b629eac5400895de296f0ac250e7');
INSERT INTO `productos_listado` VALUES ('2', 'Aceite de oliva extra Virgen', 'ANGUS de Valdelana', '3', '7', '1200', '11', '<p>Energ&iacute;a: 899,00 Kcal<br />\r\nProte&iacute;na: 1,00 g<br />\r\nHidratos carbono: 0,00 g<br />\r\nFibra: 0,00 g<br />\r\nGrasa total: 99,90 g<br />\r\nAGS: 14,30 g<br />\r\nAGM: 73,00 g</p>\r\n', '<p>El <strong>aceite de oliva</strong> es un aceite vegetal de uso principalmente culinario que se extrae del fruto del olivo (<em>Olea europaea</em>), denominado oliva o aceituna.1 Casi la tercera parte de la pulpa de la aceituna es aceite y, por esta raz&oacute;n, desde la antig&uuml;edad se ha extra&iacute;do f&aacute;cilmente con una simple presi&oacute;n ejercida por un molino. En espa&ntilde;ol, las intalaciones donde se obtiene el aceite reciben el nombre de almazara.2 Su uso es fundamentalmente culinario, pero se ha empleado para usos cosm&eacute;ticos, medicinales, religiosos y para las l&aacute;mparas de aceite.</p>\r\n', 'producto_Aceite de oliva extra VirgenANGUS_de_Valdelana_Aceite_de_oliva_extra_virgen.jpg', 'ce958844924e4afcaa093d6d0846339d');
INSERT INTO `productos_listado` VALUES ('3', 'Ajo', 'Campolindo', '2', '5', '300', '5', '<p>Energ&iacute;a: 119,00 Kcal<br />\r\nProte&iacute;na: 4,30 g<br />\r\nHidratos carbono: 24,30 g<br />\r\nFibra: 1,20 g</p>\r\n', '<p><em><strong>Allium sativum</strong></em>, el <strong>ajo</strong>, es una especie de planta tradicionalmente clasificada dentro de la familia de las lili&aacute;ceas pero que actualmente se ubica en la de las amarilid&aacute;ceas,1 aunque este extremo es muy discutible, y discutido. Al igual que la cebolla (<em>Allium cepa</em>), el puerro (<em>Allium porrum</em>) y la cebolla de invierno o cebollino (<em>Allium fistulosum</em>), es una especie de importancia econ&oacute;mica ampliamente cultivada y desconocida en estado silvestre.2</p>\r\n\r\n<p>Es una especie est&eacute;ril de amplia variabilidad morfol&oacute;gica y fisiol&oacute;gica y, a la luz de los estudios moleculares, es altamente probable que sea originaria de Asia occidental y media a trav&eacute;s de su progenitor <em>Allium longiscupis</em>, y que fue introducida desde all&iacute; en el Mediterr&aacute;neo -y luego a otras zonas- donde se cultiva desde hace m&aacute;s de 7000 a&ntilde;os.</p>\r\n', '', '595acede33064542ae5ccfdd00dfbf25');
INSERT INTO `productos_listado` VALUES ('4', 'Camaron', 'Ecuatoriano sa', '3', '6.5', '3000', '8', '', '<p>Los <strong>car&iacute;deos</strong> (<strong>Caridea</strong>) son un infraorden de crust&aacute;ceos dec&aacute;podos marinos o de agua dulce, conocidos vulgarmente como <strong>camarones</strong>, <strong>quisquillas</strong> o <strong>esquilas</strong>.</p>\r\n\r\n<p>Son relativamente f&aacute;ciles de encontrar en todo el mundo, tanto en agua dulce, como en agua salada. Como ejemplo, unas 240 especies de car&iacute;deos viven tan s&oacute;lo en las aguas costeras tropicales del Pac&iacute;fico de las Am&eacute;ricas.</p>\r\n\r\n<p>Normalmente, son mucho m&aacute;s peque&ntilde;os que las gambas y los langostinos.</p>\r\n', 'producto_Camaroncamaron.jpg', 'cvxv');
INSERT INTO `productos_listado` VALUES ('5', 'Brocoli', 'Lider', '3', '6.8', '400', '8', '<p>Energ&iacute;a: 31 kcal<br />\r\nProte&iacute;na: 2,57 g<br />\r\nCarbohidrato: 6,04 g<br />\r\nFibra: 2,4 g<br />\r\nAz&uacute;car: 1,55 g</p>\r\n', '<p>El <strong>br&eacute;col</strong>, <strong>br&oacute;quil</strong>, <strong>br&oacute;culi</strong> o <strong>br&oacute;coli</strong> (<em><strong>Brassica oleracea italica</strong></em>), del lat&iacute;n <em>brachium</em> &lsquo;brazo&rsquo;, es una planta de la familia de las brasic&aacute;ceas, antes llamadas cruc&iacute;feras. Otras variedades de la misma especie son el repollo (<em>B. o. viridis</em>), la coliflor (<em>B. o. botrytis</em>), el colinabo (<em>B. o. caulorapa</em>) y la col de Bruselas (<em>B. o. gemmifera</em>). El llamado br&oacute;coli chino (<em>B. o. alboglabra</em>) es tambi&eacute;n una variedad de <em>Brassica oleracea</em>.</p>\r\n', 'producto_Brocolibrocoli.jpg', '10bd4a751ec34b7a85a631465dd521db');
INSERT INTO `productos_listado` VALUES ('6', 'Tomates Cherry', 'Lider', '3', '6.0', '600', '7', '<p>Energ&iacute;a: 18 kcal<br />\r\nProte&iacute;na: 0,88 g<br />\r\nGrasa: 0,2 g<br />\r\nGrasa Saturada: 0,046 g<br />\r\nGrasa Poliinsaturada: 0,135 g</p>\r\n', '<p><strong>Tomate cherry: </strong>planta anual de porte para en tutorar. Las hojas son sencillas, pecioladas y de limbo hendido. Toda la parte verde de la planta est&aacute; compuesta por pelos glandulares que al rozarse emite un liquido con olor caracter&iacute;stico. Las flores aparecen en racimos siendo el n&uacute;mero de estas variables. El fruto es una baya min&uacute;scula, parecida a una cereza. Se recolecta en rojo.</p>\r\n', '', '9c5eba1aad1847c5a44b39ddad277028');
INSERT INTO `productos_listado` VALUES ('7', 'Salsa de Soya', 'maggi', '2', '4.8', '600', '10', '<p>Energ&iacute;a: 65,70 Kcal<br />\r\nProte&iacute;na: 8,70 g<br />\r\nHidratos carbono: 6,70 g<br />\r\nFibra: 1,60 g<br />\r\nGrasa total: 0,10 g</p>\r\n', '<p>La salsa de soya es uno de los condimentos m&aacute;s antiguos del mundo y tiene su origen en China, hacia el final de la dinast&iacute;a Chou. Desde mucho tiempo antes, se acostumbraba conservar las carnes por salaz&oacute;n. El subproducto l&iacute;quido que se obten&iacute;a se aprovechaba como condimento. Cuando el budismo se propag&oacute; por el Lejano Oriente, el vegetarianismo se extendi&oacute; con &eacute;l, lo que llev&oacute; a que se buscaran sustitutos vegetales para los antiguos condimentos que conten&iacute;an carne. Uno de estos sustitutos era una pasta salada y fermentada de granos de soja, precursora de la salsa de soja moderna. Con el tiempo su uso se propag&oacute; a otros pa&iacute;ses asi&aacute;ticos, como Jap&oacute;n, Filipinas, Malasia, Indonesia, etc., siendo un condimento central en las cocinas de estos pa&iacute;ses. Con el proceso de globalizaci&oacute;n, la salsa de soja puede ser encontrada en los comercios, hogares y cocinas de todo el mundo, tanto en Oriente como en Occidente (como en Per&uacute; en sus tradicionales Chifa).</p>\r\n', 'producto_Salsa de Soyasalsa-de-soya-150ml-lkk_3.jpg', '3c9f50d13d8347079bd17f2030703ba2');
INSERT INTO `productos_listado` VALUES ('8', 'Caldo Liquido tu toque de pollo maggi', 'Maggi', '2', '6.0', '1600', '10', '<ul>\r\n	<li>Energ&iacute;a: 282 Kcal</li>\r\n	<li>Proteinas: 19.9 g</li>\r\n	<li>Grasa Total: 11.8 g</li>\r\n	<li>Colesterol: 59.0 mg</li>\r\n</ul>\r\n', '<p>sazonador</p>\r\n', 'producto_Caldo Liquido tu toque de pollo maggiimages.jpg', '1dcd39ec4d1b4b04ab8fefab6f92da5e');
INSERT INTO `productos_listado` VALUES ('9', 'Sesamo', 'Lider', '2', '4.0', '700', '5', '<p>Calor&iacute;as: 598 Kcal.<br />\r\nProte&iacute;nas: 20 gr<br />\r\nHidratos de carbono: 23 gr<br />\r\nGrasas: 58 gr<br />\r\nVitamina B1: 0,8 mg<br />\r\nVitamina B6: 0,79 mg<br />\r\nVitamina B3: 4,5 mg<br />\r\n&Aacute;cido f&oacute;lico: 97 mcg</p>\r\n', '<p>Son hierbas que alcanzan un tama&ntilde;o de hasta 1 m de alto, ramificadas o no. Hojas basalmente opuestas, alternas y disminuyendo de tama&ntilde;o hacia el &aacute;pice, ovadas a linear-lanceoladas, &aacute;pice agudo, base redondeada a angostamente cuneada, dentadas o enteras; pec&iacute;olos acanalados, los inferiores hasta 11 cm de largo, los superiores hasta 3 cm de largo. Flores solitarias en las axilas; s&eacute;palos connados solamente en la base, lineares, 5&ndash;8 mm de largo, algo carnosos, ebracteolados; corola oblicuamente campanulada, blanca, rosada o rosa viejo, nectarostigmas amarillo p&aacute;lidos o ausentes, lobos no manchados; estambres 4, estaminodios ausentes. Fruto una c&aacute;psula oblongo-cuadrangular, caf&eacute;-amarillenta, no pectinada, dehiscente, con 2 rostros terminales de 3&ndash;5 mm de largo; semillas numerosas, obovadas, negras, caf&eacute;s o blancas, testa brillante</p>\r\n', 'producto_Sesamosesamo-propiedades.jpg', 'f27acf9b30644578aa96e5ba7684baf3');
INSERT INTO `productos_listado` VALUES ('10', 'Lays clasicas', 'Everscripts', '1', '3', '550', '11', '<p>Energ&iacute;a: 522 kcal<br />\r\nProte&iacute;na: 7 g<br />\r\nGrasa: 33 g<br />\r\nGrasa Saturada: 4 g<br />\r\nGrasa Trans: 0 g<br />\r\nColesterol: 0 mg<br />\r\nCarbohidrato: 50 g<br />\r\nAz&uacute;car: 0 g<br />\r\nSodio: 640 mg</p>\r\n', '<p>papas normales</p>\r\n', 'producto_Lays clasicaslays clasicas.jpe', '018c6a01688d426f90b11ee6b877fb1c');
INSERT INTO `productos_listado` VALUES ('11', 'Papas fritas Lays al punto de sal', 'Everscripts', '1', '3', '700', '11', '<p>Energ&iacute;a: 522 kcal<br />\r\nProte&iacute;na: 7 g<br />\r\nGrasa: 33 g<br />\r\nGrasa Saturada: 4 g<br />\r\nGrasa Trans: 0 g<br />\r\nColesterol: 0 mg<br />\r\nCarbohidrato: 50 g<br />\r\nAz&uacute;car: 0 g<br />\r\nSodio: 640 mg</p>\r\n', '<p>papas con poca sal</p>\r\n', 'producto_Papas fritas Lays al punto de sallays.jpe', '6f746c4411d3438db31b6f063eeb8227');

-- ----------------------------
-- Table structure for productos_listado_evaluacion
-- ----------------------------
DROP TABLE IF EXISTS `productos_listado_evaluacion`;
CREATE TABLE `productos_listado_evaluacion` (
  `idEvaluacion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idEvaluacion`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_listado_evaluacion
-- ----------------------------
INSERT INTO `productos_listado_evaluacion` VALUES ('1', 'No saludable');
INSERT INTO `productos_listado_evaluacion` VALUES ('2', 'Saludable');
INSERT INTO `productos_listado_evaluacion` VALUES ('3', 'Muy saludable');

-- ----------------------------
-- Table structure for productos_listado_pasillos
-- ----------------------------
DROP TABLE IF EXISTS `productos_listado_pasillos`;
CREATE TABLE `productos_listado_pasillos` (
  `idPasillo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idPasillo`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_listado_pasillos
-- ----------------------------
INSERT INTO `productos_listado_pasillos` VALUES ('1', 'Pasillo 1A');
INSERT INTO `productos_listado_pasillos` VALUES ('2', 'Pasillo 1B');
INSERT INTO `productos_listado_pasillos` VALUES ('3', 'Pasillo 2A');
INSERT INTO `productos_listado_pasillos` VALUES ('4', 'Pasillo 2B');
INSERT INTO `productos_listado_pasillos` VALUES ('5', 'Pasillo 3A');
INSERT INTO `productos_listado_pasillos` VALUES ('6', 'Pasillo 3B');
INSERT INTO `productos_listado_pasillos` VALUES ('7', 'Pasillo 4A');
INSERT INTO `productos_listado_pasillos` VALUES ('8', 'Pasillo 4B');
INSERT INTO `productos_listado_pasillos` VALUES ('9', 'Pasillo 5A');
INSERT INTO `productos_listado_pasillos` VALUES ('10', 'Pasillo 5B');
INSERT INTO `productos_listado_pasillos` VALUES ('11', 'Pasillo 6A');
INSERT INTO `productos_listado_pasillos` VALUES ('12', 'Pasillo 6B');

-- ----------------------------
-- Table structure for productos_recetas
-- ----------------------------
DROP TABLE IF EXISTS `productos_recetas`;
CREATE TABLE `productos_recetas` (
  `idReceta` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `Minutos` time NOT NULL,
  `idDificultad` int(11) NOT NULL,
  `Preparacion` text NOT NULL,
  `NPorciones` tinyint(2) unsigned NOT NULL,
  `InfoNutricional` text NOT NULL,
  `NombreImagen` varchar(150) NOT NULL,
  PRIMARY KEY (`idReceta`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_recetas
-- ----------------------------
INSERT INTO `productos_recetas` VALUES ('1', 'PASTA THAI CON VERDURAS Y CAMARONES', '00:25:00', '1', '<p>Preparaci&oacute;n</p>\r\n\r\n<p>1.- Cocina las pastas en una cacerola con abundante agua caliente y con un toque de sal y seg&uacute;n el tiempo y las indicaciones del envase. Una vez listas, esc&uacute;rrelas y devu&eacute;lvelas a la olla con un toque de aceite para que &eacute;stas no se peguen.<br />\r\n<br />\r\n2.- Aparte calienta una sart&eacute;n con un toque de aceite y sofr&iacute;e el ajo durante unos segundos. Agrega los camarones y saltea durante 4 minutos m&aacute;s removiendo de vez en cuando; agrega los gajos de br&oacute;colis cocidos y los tomates cherry. Condimenta con el CALDO LIQUIDO TU TOQUE DE POLLO MAGGI y remueve s&oacute;lo unos segundos.<br />\r\n<br />\r\n3.- Agrega de inmediato las pastas al salteado y revuelve para juntar ambas preparaciones. Vierte la salsa de soya y el agua indicada y revuelve hasta impregnar bien todos los ingredientes, finalmente agrega un toque de pimienta y el s&eacute;samo tostado. Revuelve por &uacute;ltima vez y sirve de inmediato.</p>\r\n', '6', '<p>Energ&iacute;a: 497 Kcal<br />\r\nProteinas: 26.8 g<br />\r\nGrasa Total: 7.8 g<br />\r\nColesterol: 17.0 mg<br />\r\nH. de Carbono: 78.6 g<br />\r\nFibra Diet&eacute;tica: 7,9 g<br />\r\nSodio: 800 mg</p>\r\n', 'receta_PASTA THAI CON VERDURAS Y CAMARONESpasta thai verduras camarones.jpg');

-- ----------------------------
-- Table structure for productos_recetas_dificultad
-- ----------------------------
DROP TABLE IF EXISTS `productos_recetas_dificultad`;
CREATE TABLE `productos_recetas_dificultad` (
  `idDificultad` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`idDificultad`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_recetas_dificultad
-- ----------------------------
INSERT INTO `productos_recetas_dificultad` VALUES ('1', 'Facil');
INSERT INTO `productos_recetas_dificultad` VALUES ('2', 'Moderado');
INSERT INTO `productos_recetas_dificultad` VALUES ('3', 'Dificil');

-- ----------------------------
-- Table structure for productos_recetas_productos
-- ----------------------------
DROP TABLE IF EXISTS `productos_recetas_productos`;
CREATE TABLE `productos_recetas_productos` (
  `idRecetaProductos` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idReceta` int(11) unsigned NOT NULL,
  `idProducto` int(11) unsigned NOT NULL,
  `TextoAntes` varchar(255) NOT NULL,
  `TextoDespues` varchar(255) NOT NULL,
  PRIMARY KEY (`idRecetaProductos`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos_recetas_productos
-- ----------------------------
INSERT INTO `productos_recetas_productos` VALUES ('1', '1', '1', '1 ½ Paquete de', '');
INSERT INTO `productos_recetas_productos` VALUES ('2', '1', '2', '2 Cucharadas de', '');
INSERT INTO `productos_recetas_productos` VALUES ('3', '1', '3', '1 Diente de', '');
INSERT INTO `productos_recetas_productos` VALUES ('4', '1', '4', '300 g de', '');
INSERT INTO `productos_recetas_productos` VALUES ('5', '1', '5', '1 ', '');
INSERT INTO `productos_recetas_productos` VALUES ('6', '1', '6', '1 Bandeja de ', '');
INSERT INTO `productos_recetas_productos` VALUES ('7', '1', '7', '2 Cucharadas de', '');
INSERT INTO `productos_recetas_productos` VALUES ('8', '1', '0', '4 Cucharadas de agua ', '');
INSERT INTO `productos_recetas_productos` VALUES ('9', '1', '8', '2 Cucharadas de ', '');
INSERT INTO `productos_recetas_productos` VALUES ('10', '1', '9', '3 Cucharadas de', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of robos_listado
-- ----------------------------
INSERT INTO `robos_listado` VALUES ('1', '6', '7', '2', '2015-01-11', '23:42:28', '-70.5824986', '-33.6249671', '', '1', '1');
INSERT INTO `robos_listado` VALUES ('2', '8', '7', '3', '2015-01-12', '19:36:20', '-70.5709844', '-33.6040135', '', '1', '0');

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
  `Semana` tinyint(2) unsigned NOT NULL,
  `Ano` smallint(4) NOT NULL,
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
  `idDocumento` int(11) NOT NULL,
  `EstadoPago` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`idSolicitud`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of solicitud_taxi_listado
-- ----------------------------
INSERT INTO `solicitud_taxi_listado` VALUES ('1', '6', '7', '2015-01-06', '1', '2015', '16:37:49', '16:55:44', '-70.5750899', '-33.4006285', '-70.5709844', '-33.6040135', '-70.5824986', '-33.6249671', '44', '0', '0', '', '0', '', '5', '1', '2');
INSERT INTO `solicitud_taxi_listado` VALUES ('2', '1', '7', '2015-01-06', '1', '2015', '17:20:25', '00:00:00', '-70.5750899', '-33.4006285', '-70.5750899', '-33.4006285', '-70.5750899', '-33.4006285', '44', '0', '5', 'asd', '5', '', '5', '1', '2');
INSERT INTO `solicitud_taxi_listado` VALUES ('3', '1', '7', '2015-01-07', '2', '2015', '18:11:34', '00:00:00', '-70.5750899', '-33.4006285', '-70.5750899', '-33.4006285', '0', '0', '44', '0', '0', '', '1', 'no estaba', '5', '2', '2');
INSERT INTO `solicitud_taxi_listado` VALUES ('4', '1', '7', '2015-01-08', '2', '2015', '18:50:48', '16:00:58', '-70.5750899', '-33.4006285', '-70.5950899', '-33.4906285', '0', '0', '44', '0', '0', '', '0', '', '5', '2', '2');
INSERT INTO `solicitud_taxi_listado` VALUES ('5', '6', '7', '2015-01-09', '2', '2015', '00:52:44', '00:00:00', '-70.5824986', '-33.6249671', '0', '0', '0', '0', '44', '0', '0', '', '0', '', '0', '2', '2');
INSERT INTO `solicitud_taxi_listado` VALUES ('6', '6', '7', '2015-01-09', '2', '2015', '00:52:49', '00:00:00', '-70.5824986', '-33.6249671', '0', '0', '0', '0', '44', '0', '0', '', '0', '', '0', '2', '2');
INSERT INTO `solicitud_taxi_listado` VALUES ('7', '6', '7', '2015-01-09', '2', '2015', '00:52:51', '00:00:00', '-70.5824986', '-33.6249671', '0', '0', '0', '0', '44', '0', '0', '', '0', '', '0', '2', '2');
INSERT INTO `solicitud_taxi_listado` VALUES ('8', '6', '7', '2015-01-10', '2', '2015', '00:52:52', '00:00:00', '-70.5824986', '-33.6249671', '0', '0', '0', '0', '44', '0', '0', '', '0', '', '0', '2', '2');
INSERT INTO `solicitud_taxi_listado` VALUES ('9', '6', '7', '2015-01-11', '2', '2015', '00:52:52', '00:00:00', '-70.5824986', '-33.6249671', '0', '0', '0', '0', '44', '0', '0', '', '0', '', '0', '2', '2');
INSERT INTO `solicitud_taxi_listado` VALUES ('10', '6', '7', '2015-01-11', '2', '2015', '00:52:53', '00:00:00', '-70.5824986', '-33.6249671', '0', '0', '0', '0', '44', '0', '0', '', '0', '', '0', '2', '2');
INSERT INTO `solicitud_taxi_listado` VALUES ('11', '6', '7', '2015-01-14', '3', '2015', '00:58:13', '00:00:00', '-70.5824986', '-33.6249671', '0', '0', '0', '0', '44', '0', '0', '', '0', '', '0', '0', '0');
INSERT INTO `solicitud_taxi_listado` VALUES ('12', '6', '7', '2015-01-14', '3', '2015', '01:09:48', '00:00:00', '-70.5824986', '-33.6249671', '-70.5824986', '-33.6249671', '-70.5824986', '-33.6249671', '44', '0', '0', '', '0', '', '5', '0', '0');
INSERT INTO `solicitud_taxi_listado` VALUES ('13', '8', '7', '2015-01-15', '3', '2015', '19:38:06', '00:00:00', '-70.5709844', '-33.6040135', '0', '0', '0', '0', '44', '0', '0', '', '0', '', '0', '0', '0');
INSERT INTO `solicitud_taxi_listado` VALUES ('14', '8', '7', '2015-01-16', '3', '2015', '19:45:31', '00:00:00', '-70.5709844', '-33.6040135', '0', '0', '0', '0', '44', '0', '0', '', '0', '', '0', '0', '0');
INSERT INTO `solicitud_taxi_listado` VALUES ('15', '8', '7', '2015-01-17', '3', '2015', '19:48:03', '00:00:00', '-70.5709844', '-33.6040135', '-70.5709844', '-33.6040135', '-70.5709844', '-33.6040135', '44', '0', '0', '', '0', '', '5', '0', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

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
INSERT INTO `solicitud_taxi_sorteo` VALUES ('13', '12', '6', '7', '2');
INSERT INTO `solicitud_taxi_sorteo` VALUES ('14', '13', '8', '7', '3');
INSERT INTO `solicitud_taxi_sorteo` VALUES ('15', '14', '8', '7', '3');
INSERT INTO `solicitud_taxi_sorteo` VALUES ('16', '15', '8', '7', '2');

-- ----------------------------
-- Table structure for taxista_bloqueos
-- ----------------------------
DROP TABLE IF EXISTS `taxista_bloqueos`;
CREATE TABLE `taxista_bloqueos` (
  `idBloqueo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idEncargado` int(11) unsigned NOT NULL,
  `idTaxista` int(11) unsigned NOT NULL,
  `Semana` tinyint(2) unsigned NOT NULL,
  `Ano` smallint(4) unsigned NOT NULL,
  `FechaPago` date NOT NULL,
  `idTipoPago` int(11) unsigned NOT NULL,
  `NDoc` varchar(30) NOT NULL,
  `Monto` int(11) unsigned NOT NULL,
  `EstadoPago` tinyint(1) unsigned NOT NULL,
  `FechaBloqueo` date NOT NULL,
  `idDocumento` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idBloqueo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of taxista_bloqueos
-- ----------------------------
INSERT INTO `taxista_bloqueos` VALUES ('1', '1', '7', '2', '2015', '2015-01-16', '3', 'asd234234', '500', '2', '2015-01-16', '2');
INSERT INTO `taxista_bloqueos` VALUES ('2', '1', '7', '0', '0', '0000-00-00', '0', '', '500', '1', '2015-01-19', '0');

-- ----------------------------
-- Table structure for taxista_calendario
-- ----------------------------
DROP TABLE IF EXISTS `taxista_calendario`;
CREATE TABLE `taxista_calendario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Semana` tinyint(2) unsigned NOT NULL,
  `Mes` tinyint(2) unsigned NOT NULL,
  `Ano` smallint(4) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of taxista_calendario
-- ----------------------------
INSERT INTO `taxista_calendario` VALUES ('1', '1', '1', '2015');
INSERT INTO `taxista_calendario` VALUES ('2', '2', '1', '2015');
INSERT INTO `taxista_calendario` VALUES ('3', '3', '1', '2015');
INSERT INTO `taxista_calendario` VALUES ('4', '4', '1', '2015');
INSERT INTO `taxista_calendario` VALUES ('5', '5', '1', '2015');
INSERT INTO `taxista_calendario` VALUES ('6', '6', '2', '2015');
INSERT INTO `taxista_calendario` VALUES ('7', '7', '2', '2015');
INSERT INTO `taxista_calendario` VALUES ('8', '8', '2', '2015');
INSERT INTO `taxista_calendario` VALUES ('9', '9', '2', '2015');
INSERT INTO `taxista_calendario` VALUES ('10', '10', '3', '2015');
INSERT INTO `taxista_calendario` VALUES ('11', '11', '3', '2015');
INSERT INTO `taxista_calendario` VALUES ('12', '12', '3', '2015');
INSERT INTO `taxista_calendario` VALUES ('13', '13', '3', '2015');
INSERT INTO `taxista_calendario` VALUES ('14', '14', '4', '2015');
INSERT INTO `taxista_calendario` VALUES ('15', '15', '4', '2015');
INSERT INTO `taxista_calendario` VALUES ('16', '16', '4', '2015');
INSERT INTO `taxista_calendario` VALUES ('17', '17', '4', '2015');
INSERT INTO `taxista_calendario` VALUES ('18', '18', '4', '2015');
INSERT INTO `taxista_calendario` VALUES ('19', '19', '5', '2015');
INSERT INTO `taxista_calendario` VALUES ('20', '20', '5', '2015');
INSERT INTO `taxista_calendario` VALUES ('21', '21', '5', '2015');
INSERT INTO `taxista_calendario` VALUES ('22', '22', '5', '2015');
INSERT INTO `taxista_calendario` VALUES ('23', '23', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('24', '24', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('25', '25', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('26', '26', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('27', '27', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('28', '28', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('29', '29', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('30', '30', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('31', '31', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('32', '32', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('33', '33', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('34', '34', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('35', '35', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('36', '36', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('37', '37', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('38', '38', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('39', '39', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('40', '40', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('41', '41', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('42', '42', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('43', '43', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('44', '44', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('45', '45', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('46', '46', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('47', '47', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('48', '48', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('49', '49', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('50', '50', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('51', '51', '0', '2015');
INSERT INTO `taxista_calendario` VALUES ('52', '52', '0', '2015');

-- ----------------------------
-- Table structure for taxista_conductores
-- ----------------------------
DROP TABLE IF EXISTS `taxista_conductores`;
CREATE TABLE `taxista_conductores` (
  `idConductor` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `Apellido_Paterno` varchar(120) NOT NULL,
  `Apellido_Materno` varchar(120) NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `fNacimiento` date NOT NULL,
  `email` varchar(120) NOT NULL,
  `Pais` varchar(120) NOT NULL,
  `idCiudad` int(11) unsigned NOT NULL,
  `idComuna` int(11) unsigned NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `Fono1` varchar(15) NOT NULL,
  `Fono2` varchar(15) NOT NULL,
  PRIMARY KEY (`idConductor`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of taxista_conductores
-- ----------------------------
INSERT INTO `taxista_conductores` VALUES ('1', 'Conductor 1', 'asd', 'asd', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '123455666', '');
INSERT INTO `taxista_conductores` VALUES ('2', 'Conductor 2', 'qwe', 'qwe', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '', '');
INSERT INTO `taxista_conductores` VALUES ('3', 'Conductor 3', 'zxc', 'zxc', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '', '');
INSERT INTO `taxista_conductores` VALUES ('4', 'Conductor 4', 'rty', 'rty', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '', '');
INSERT INTO `taxista_conductores` VALUES ('5', 'Conductor 5', 'fgh', 'fgh', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '', '');
INSERT INTO `taxista_conductores` VALUES ('6', 'Conductor 6', 'cvb', 'cvb', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '', '');
INSERT INTO `taxista_conductores` VALUES ('7', 'Conductor 7', 'bnm', 'bm', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '', '');
INSERT INTO `taxista_conductores` VALUES ('8', 'Conductor 8', 'hjk', 'hjk', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '', '');
INSERT INTO `taxista_conductores` VALUES ('9', 'Conductor 9', 'uio', 'uio', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '', '');

-- ----------------------------
-- Table structure for taxista_pagos
-- ----------------------------
DROP TABLE IF EXISTS `taxista_pagos`;
CREATE TABLE `taxista_pagos` (
  `idDocumento` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idEncargado` int(11) unsigned NOT NULL,
  `idTaxista` int(11) unsigned NOT NULL,
  `Semana` tinyint(2) unsigned NOT NULL,
  `Ano` smallint(4) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `idTipoPago` int(11) unsigned NOT NULL,
  `NDoc` varchar(30) NOT NULL,
  `Monto` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idDocumento`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of taxista_pagos
-- ----------------------------
INSERT INTO `taxista_pagos` VALUES ('1', '1', '7', '1', '2015', '2015-01-16', '3', 'sdfsd34234', '236');
INSERT INTO `taxista_pagos` VALUES ('2', '1', '7', '2', '2015', '2015-01-16', '3', 'asd234234', '873');

-- ----------------------------
-- Table structure for taxista_propietarios
-- ----------------------------
DROP TABLE IF EXISTS `taxista_propietarios`;
CREATE TABLE `taxista_propietarios` (
  `idPropietario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `Apellido_Paterno` varchar(120) NOT NULL,
  `Apellido_Materno` varchar(120) NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `fNacimiento` date NOT NULL,
  `email` varchar(120) NOT NULL,
  `Pais` varchar(120) NOT NULL,
  `idCiudad` int(11) unsigned NOT NULL,
  `idComuna` int(11) unsigned NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `Fono1` varchar(15) NOT NULL,
  `Fono2` varchar(15) NOT NULL,
  `NombreEmpresa` varchar(120) NOT NULL,
  PRIMARY KEY (`idPropietario`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of taxista_propietarios
-- ----------------------------
INSERT INTO `taxista_propietarios` VALUES ('1', 'Propietario 1', 'asd', 'asd', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '123455666', '', 'dd');
INSERT INTO `taxista_propietarios` VALUES ('2', 'Propietario 2', 'qwe', 'qwe', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '', '', '');
INSERT INTO `taxista_propietarios` VALUES ('3', 'Propietario 3', 'zxc', 'zxc', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '', '', '');
INSERT INTO `taxista_propietarios` VALUES ('4', 'Propietario 4', 'rty', 'rty', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '', '', '');
INSERT INTO `taxista_propietarios` VALUES ('5', 'Propietario 5', 'fgh', 'fgh', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '', '', '');
INSERT INTO `taxista_propietarios` VALUES ('6', 'Propietario 6', 'cvb', 'cvb', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '', '', '');
INSERT INTO `taxista_propietarios` VALUES ('7', 'Propietario 7', 'bnm', 'bm', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '', '', '');
INSERT INTO `taxista_propietarios` VALUES ('8', 'Propietario 8', 'hjk', 'hjk', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '', '', '');
INSERT INTO `taxista_propietarios` VALUES ('9', 'Propietario 9', 'uio', 'uio', '16029464-7', '', '0000-00-00', 'asda@asd.cl', '', '0', '0', '', '', '', '');

-- ----------------------------
-- Table structure for taxista_recorridos
-- ----------------------------
DROP TABLE IF EXISTS `taxista_recorridos`;
CREATE TABLE `taxista_recorridos` (
  `idRecorrido` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idRecorrido`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of taxista_recorridos
-- ----------------------------
INSERT INTO `taxista_recorridos` VALUES ('1', 'F01');
INSERT INTO `taxista_recorridos` VALUES ('2', 'Recorrido 2');
INSERT INTO `taxista_recorridos` VALUES ('3', 'Recorrido 3');
INSERT INTO `taxista_recorridos` VALUES ('4', 'Recorrido 4');
INSERT INTO `taxista_recorridos` VALUES ('5', 'Recorrido 5');
INSERT INTO `taxista_recorridos` VALUES ('6', 'Recorrido 6');
INSERT INTO `taxista_recorridos` VALUES ('7', 'Recorrido 7');
INSERT INTO `taxista_recorridos` VALUES ('8', 'Recorrido 8');
INSERT INTO `taxista_recorridos` VALUES ('9', 'Recorrido 9');

-- ----------------------------
-- Table structure for taxista_sistema
-- ----------------------------
DROP TABLE IF EXISTS `taxista_sistema`;
CREATE TABLE `taxista_sistema` (
  `idSistema` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ValorPlanBase` int(10) unsigned NOT NULL,
  `NumeroCarreras` tinyint(2) unsigned NOT NULL,
  `ValorCarrera` int(10) unsigned NOT NULL,
  `Terminos` varchar(200) NOT NULL,
  `nombre_impuesto` varchar(120) NOT NULL,
  `porcentaje_impuesto` int(11) unsigned NOT NULL,
  `bloqueo_taxista` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idSistema`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of taxista_sistema
-- ----------------------------
INSERT INTO `taxista_sistema` VALUES ('1', '200', '9', '30', 'Un atraso de mas de una semana significa la desactivacion del perfil', 'IGV', '18', '500');

-- ----------------------------
-- Table structure for taxista_tipo_pago
-- ----------------------------
DROP TABLE IF EXISTS `taxista_tipo_pago`;
CREATE TABLE `taxista_tipo_pago` (
  `idTipoPago` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idTipoPago`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of taxista_tipo_pago
-- ----------------------------
INSERT INTO `taxista_tipo_pago` VALUES ('1', 'Efectivo');
INSERT INTO `taxista_tipo_pago` VALUES ('2', 'Tarjeta');
INSERT INTO `taxista_tipo_pago` VALUES ('3', 'Deposito');

-- ----------------------------
-- Table structure for transantiago_conductores
-- ----------------------------
DROP TABLE IF EXISTS `transantiago_conductores`;
CREATE TABLE `transantiago_conductores` (
  `idConductor` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `Apellido_Paterno` varchar(120) NOT NULL,
  `Apellido_Materno` varchar(120) NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `fNacimiento` date NOT NULL,
  `email` varchar(120) NOT NULL,
  `Pais` varchar(120) NOT NULL,
  `idCiudad` int(11) unsigned NOT NULL,
  `idComuna` int(11) unsigned NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `Fono1` varchar(15) NOT NULL,
  `Fono2` varchar(15) NOT NULL,
  PRIMARY KEY (`idConductor`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transantiago_conductores
-- ----------------------------
INSERT INTO `transantiago_conductores` VALUES ('1', 'Jeuel', 'Jaime', 'Huerta', '18427882-0', 'M', '2015-06-02', 'asda@asd.cl', '', '0', '0', 'asd', '123455666', '');
INSERT INTO `transantiago_conductores` VALUES ('2', 'Waldo', 'Galindo', 'Alcala', '10756900-6', '', '2015-06-02', 'asda@asd.cl', '', '0', '0', 'sdfsd', '56756', '');
INSERT INTO `transantiago_conductores` VALUES ('3', 'Jorge', 'Regalado', 'Fierro', '19302042-9', '', '2015-06-02', 'asda@asd.cl', '', '0', '0', 'fdgfd', '445645', '');
INSERT INTO `transantiago_conductores` VALUES ('4', 'Michael', 'Rivas', 'Saucedo', '14024869-k', '', '2015-06-30', 'asda@asd.cl', '', '0', '0', 'vbnbv', '567567', '');
INSERT INTO `transantiago_conductores` VALUES ('5', 'Angelo', 'Valdez', 'Segura', '8237974-6', '', '2015-06-02', 'asda@asd.cl', '', '0', '0', 'vbnb', '45645', '');
INSERT INTO `transantiago_conductores` VALUES ('6', 'Segismundo', 'Yañez', 'Barela', '7988393-k', 'M', '2015-06-02', 'asda@asd.cl', '', '0', '0', 'cvbcv', '45435', '');
INSERT INTO `transantiago_conductores` VALUES ('7', 'Salvatore', 'Sotelo', 'Serrato', '7424772-5', '', '2015-06-02', 'asda@asd.cl', '', '0', '0', 'dfgfdg', '465', '');
INSERT INTO `transantiago_conductores` VALUES ('8', 'Francisco', 'Estevez', 'Hurtado', '13710078-9', '', '2015-06-03', 'asda@asd.cl', '', '0', '0', 'sdfsdf', '34234', '');
INSERT INTO `transantiago_conductores` VALUES ('9', 'Bart', 'Garica', 'Carrera', '8626741-1', 'M', '2015-06-02', 'asda@asd.cl', '', '0', '0', 'asd', '23123', '');

-- ----------------------------
-- Table structure for transantiago_conductores_historico
-- ----------------------------
DROP TABLE IF EXISTS `transantiago_conductores_historico`;
CREATE TABLE `transantiago_conductores_historico` (
  `idHistorico` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL DEFAULT '0000-00-00',
  `Hora` time NOT NULL,
  `idCliente` int(11) unsigned NOT NULL,
  `idRecorrido` int(11) unsigned NOT NULL,
  `idConductor` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idHistorico`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transantiago_conductores_historico
-- ----------------------------
INSERT INTO `transantiago_conductores_historico` VALUES ('1', '2015-05-18', '18:59:49', '10', '10', '7');
INSERT INTO `transantiago_conductores_historico` VALUES ('2', '2015-05-20', '15:33:09', '10', '10', '7');
INSERT INTO `transantiago_conductores_historico` VALUES ('3', '2015-05-20', '19:32:02', '10', '10', '7');
INSERT INTO `transantiago_conductores_historico` VALUES ('4', '2015-05-27', '21:07:02', '10', '10', '7');
INSERT INTO `transantiago_conductores_historico` VALUES ('5', '2015-05-29', '18:57:46', '10', '10', '7');
INSERT INTO `transantiago_conductores_historico` VALUES ('6', '2015-06-01', '18:15:59', '10', '10', '7');
INSERT INTO `transantiago_conductores_historico` VALUES ('7', '2015-06-04', '12:37:01', '8', '0', '7');
INSERT INTO `transantiago_conductores_historico` VALUES ('8', '2015-06-09', '20:26:19', '10', '10', '5');
INSERT INTO `transantiago_conductores_historico` VALUES ('9', '2015-06-09', '20:27:54', '11', '10', '9');

-- ----------------------------
-- Table structure for transantiago_historico
-- ----------------------------
DROP TABLE IF EXISTS `transantiago_historico`;
CREATE TABLE `transantiago_historico` (
  `idHistorico` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL DEFAULT '0000-00-00',
  `Hora` time NOT NULL,
  `idCliente` int(11) unsigned NOT NULL,
  `idRecorrido` int(11) unsigned NOT NULL,
  `idRuta` int(11) unsigned NOT NULL,
  `Latitud` double NOT NULL,
  `Longitud` double NOT NULL,
  `idConductor` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idHistorico`)
) ENGINE=MyISAM AUTO_INCREMENT=309 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transantiago_historico
-- ----------------------------
INSERT INTO `transantiago_historico` VALUES ('1', '2015-05-15', '21:43:30', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('2', '2015-05-15', '21:43:46', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('3', '2015-05-15', '21:44:30', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('4', '2015-05-15', '21:45:10', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('5', '2015-05-15', '21:45:42', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('6', '2015-05-18', '16:28:54', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('7', '2015-05-18', '16:29:10', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('8', '2015-05-18', '16:29:54', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('9', '2015-05-18', '16:30:34', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('10', '2015-05-18', '16:31:06', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('11', '2015-05-18', '16:31:54', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '7');
INSERT INTO `transantiago_historico` VALUES ('12', '2015-05-18', '16:33:14', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '7');
INSERT INTO `transantiago_historico` VALUES ('13', '2015-05-18', '16:33:54', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '7');
INSERT INTO `transantiago_historico` VALUES ('14', '2015-05-18', '16:34:30', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '7');
INSERT INTO `transantiago_historico` VALUES ('15', '2015-05-18', '16:35:14', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '7');
INSERT INTO `transantiago_historico` VALUES ('16', '2015-05-18', '16:43:57', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('17', '2015-05-18', '16:44:09', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('18', '2015-05-18', '16:44:57', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('19', '2015-05-18', '16:45:37', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('20', '2015-05-18', '16:46:05', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('21', '2015-05-18', '16:46:57', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '7');
INSERT INTO `transantiago_historico` VALUES ('22', '2015-05-18', '16:48:17', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '7');
INSERT INTO `transantiago_historico` VALUES ('23', '2015-05-18', '16:48:57', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '7');
INSERT INTO `transantiago_historico` VALUES ('24', '2015-05-18', '16:49:29', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '7');
INSERT INTO `transantiago_historico` VALUES ('25', '2015-05-18', '16:50:17', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '7');
INSERT INTO `transantiago_historico` VALUES ('26', '2015-05-18', '16:51:26', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('27', '2015-05-18', '16:51:42', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('28', '2015-05-18', '16:52:26', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('29', '2015-05-18', '16:53:06', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('30', '2015-05-18', '16:53:34', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('31', '2015-05-18', '16:54:26', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '7');
INSERT INTO `transantiago_historico` VALUES ('32', '2015-05-18', '16:55:46', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '7');
INSERT INTO `transantiago_historico` VALUES ('33', '2015-05-18', '16:56:26', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '7');
INSERT INTO `transantiago_historico` VALUES ('34', '2015-05-18', '16:57:02', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '7');
INSERT INTO `transantiago_historico` VALUES ('35', '2015-05-18', '16:57:46', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '7');
INSERT INTO `transantiago_historico` VALUES ('36', '2015-05-18', '16:58:56', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('37', '2015-05-18', '16:59:12', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('38', '2015-05-18', '16:59:56', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('39', '2015-05-18', '17:00:36', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('40', '2015-05-18', '17:01:04', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('41', '2015-05-18', '17:01:56', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '7');
INSERT INTO `transantiago_historico` VALUES ('42', '2015-05-18', '17:03:16', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '7');
INSERT INTO `transantiago_historico` VALUES ('43', '2015-05-18', '17:03:56', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '7');
INSERT INTO `transantiago_historico` VALUES ('44', '2015-05-18', '17:04:32', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '7');
INSERT INTO `transantiago_historico` VALUES ('45', '2015-05-18', '17:05:16', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '7');
INSERT INTO `transantiago_historico` VALUES ('46', '2015-05-18', '17:06:25', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('47', '2015-05-18', '17:06:41', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('48', '2015-05-18', '17:07:25', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('49', '2015-05-18', '17:08:05', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('50', '2015-05-18', '17:08:37', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('51', '2015-05-18', '17:09:25', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '7');
INSERT INTO `transantiago_historico` VALUES ('52', '2015-05-18', '17:10:45', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '7');
INSERT INTO `transantiago_historico` VALUES ('53', '2015-05-18', '17:11:25', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '7');
INSERT INTO `transantiago_historico` VALUES ('54', '2015-05-18', '17:12:01', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '7');
INSERT INTO `transantiago_historico` VALUES ('55', '2015-05-18', '17:12:45', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '7');
INSERT INTO `transantiago_historico` VALUES ('56', '2015-05-18', '17:13:57', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('57', '2015-05-18', '17:14:09', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('58', '2015-05-18', '17:14:57', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('59', '2015-05-18', '17:15:37', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('60', '2015-05-18', '17:16:05', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('61', '2015-05-18', '17:16:57', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '7');
INSERT INTO `transantiago_historico` VALUES ('62', '2015-05-18', '17:18:17', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '7');
INSERT INTO `transantiago_historico` VALUES ('63', '2015-05-18', '17:18:57', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '7');
INSERT INTO `transantiago_historico` VALUES ('64', '2015-05-18', '17:19:29', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '7');
INSERT INTO `transantiago_historico` VALUES ('65', '2015-05-18', '17:20:17', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '7');
INSERT INTO `transantiago_historico` VALUES ('66', '2015-05-18', '17:21:27', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('67', '2015-05-18', '17:21:39', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('68', '2015-05-18', '17:22:27', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('69', '2015-05-18', '17:23:07', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('70', '2015-05-18', '17:23:35', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('71', '2015-05-18', '17:24:27', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '7');
INSERT INTO `transantiago_historico` VALUES ('72', '2015-05-18', '17:25:47', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '7');
INSERT INTO `transantiago_historico` VALUES ('73', '2015-05-18', '17:26:27', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '7');
INSERT INTO `transantiago_historico` VALUES ('74', '2015-05-18', '17:26:59', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '7');
INSERT INTO `transantiago_historico` VALUES ('75', '2015-05-18', '17:27:47', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '7');
INSERT INTO `transantiago_historico` VALUES ('76', '2015-05-18', '17:28:56', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('77', '2015-05-18', '17:29:12', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('78', '2015-05-18', '17:36:25', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('79', '2015-05-18', '17:36:41', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('80', '2015-05-18', '17:37:25', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('81', '2015-05-18', '17:43:55', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('82', '2015-05-18', '17:44:11', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('83', '2015-05-18', '17:44:55', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('84', '2015-05-18', '17:51:25', '10', '10', '2', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('85', '2015-05-18', '18:08:45', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('86', '2015-05-18', '18:09:01', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('87', '2015-05-18', '18:09:45', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('88', '2015-05-18', '18:10:25', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('89', '2015-05-18', '18:10:53', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('90', '2015-05-18', '18:11:45', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '7');
INSERT INTO `transantiago_historico` VALUES ('91', '2015-05-18', '18:13:05', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '7');
INSERT INTO `transantiago_historico` VALUES ('92', '2015-05-18', '18:13:45', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '7');
INSERT INTO `transantiago_historico` VALUES ('93', '2015-05-18', '18:14:21', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '7');
INSERT INTO `transantiago_historico` VALUES ('94', '2015-05-18', '18:15:05', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '7');
INSERT INTO `transantiago_historico` VALUES ('95', '2015-05-18', '18:16:14', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('96', '2015-05-18', '18:16:30', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('97', '2015-05-18', '18:17:14', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('98', '2015-05-18', '18:17:54', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('99', '2015-05-18', '18:18:22', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('100', '2015-05-18', '18:19:14', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '7');
INSERT INTO `transantiago_historico` VALUES ('101', '2015-05-18', '18:20:34', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '7');
INSERT INTO `transantiago_historico` VALUES ('102', '2015-05-18', '18:21:14', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '7');
INSERT INTO `transantiago_historico` VALUES ('103', '2015-05-18', '18:21:50', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '7');
INSERT INTO `transantiago_historico` VALUES ('104', '2015-05-18', '18:23:44', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('105', '2015-05-18', '18:24:00', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('106', '2015-05-18', '18:24:44', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('107', '2015-05-18', '18:25:24', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('108', '2015-05-27', '21:42:23', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('109', '2015-05-27', '21:42:39', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('110', '2015-05-27', '21:43:23', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('111', '2015-05-27', '21:44:03', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('112', '2015-05-27', '21:44:35', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('113', '2015-05-27', '21:45:23', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '7');
INSERT INTO `transantiago_historico` VALUES ('114', '2015-05-27', '21:46:43', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '7');
INSERT INTO `transantiago_historico` VALUES ('115', '2015-05-27', '21:47:23', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '7');
INSERT INTO `transantiago_historico` VALUES ('116', '2015-05-27', '21:47:59', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '7');
INSERT INTO `transantiago_historico` VALUES ('117', '2015-05-27', '21:48:43', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '7');
INSERT INTO `transantiago_historico` VALUES ('118', '2015-06-01', '18:42:58', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('119', '2015-06-01', '18:44:06', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('120', '2015-06-01', '19:04:42', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('121', '2015-06-01', '19:06:46', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('122', '2015-06-01', '19:08:06', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('123', '2015-06-01', '19:10:02', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '7');
INSERT INTO `transantiago_historico` VALUES ('124', '2015-06-01', '19:13:02', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '7');
INSERT INTO `transantiago_historico` VALUES ('125', '2015-06-01', '19:14:58', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '7');
INSERT INTO `transantiago_historico` VALUES ('126', '2015-06-01', '19:16:26', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '7');
INSERT INTO `transantiago_historico` VALUES ('127', '2015-06-01', '19:17:50', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '7');
INSERT INTO `transantiago_historico` VALUES ('128', '2015-06-01', '19:23:13', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('129', '2015-06-01', '19:23:13', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('130', '2015-06-01', '19:23:13', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('131', '2015-06-01', '19:23:14', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('132', '2015-06-01', '19:24:22', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('133', '2015-06-01', '19:24:24', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('134', '2015-06-01', '19:24:24', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('135', '2015-06-01', '19:24:25', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('136', '2015-06-01', '20:55:58', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('137', '2015-06-01', '20:55:59', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('138', '2015-06-01', '20:56:00', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('139', '2015-06-01', '20:56:00', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('140', '2015-06-01', '20:58:03', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('141', '2015-06-01', '20:58:03', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('142', '2015-06-01', '20:58:05', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('143', '2015-06-01', '20:58:05', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('144', '2015-06-01', '20:59:23', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('145', '2015-06-01', '20:59:24', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('146', '2015-06-01', '20:59:25', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('147', '2015-06-01', '20:59:25', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('148', '2015-06-01', '21:15:03', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('149', '2015-06-04', '22:11:05', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('150', '2015-06-04', '22:12:13', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('151', '2015-06-04', '22:32:50', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('152', '2015-06-04', '22:34:54', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('153', '2015-06-04', '22:36:14', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('154', '2015-06-08', '16:08:58', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('155', '2015-06-08', '16:09:49', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('156', '2015-06-08', '16:12:43', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('157', '2015-06-08', '16:14:19', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('158', '2015-06-08', '16:30:23', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('159', '2015-06-08', '16:30:36', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('160', '2015-06-08', '16:32:27', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('161', '2015-06-08', '16:32:28', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('162', '2015-06-08', '16:33:51', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('163', '2015-06-08', '16:34:15', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('164', '2015-06-08', '16:35:43', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '7');
INSERT INTO `transantiago_historico` VALUES ('165', '2015-06-08', '16:36:03', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '7');
INSERT INTO `transantiago_historico` VALUES ('166', '2015-06-08', '16:38:44', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '7');
INSERT INTO `transantiago_historico` VALUES ('167', '2015-06-08', '16:39:02', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '7');
INSERT INTO `transantiago_historico` VALUES ('168', '2015-06-08', '16:40:37', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '7');
INSERT INTO `transantiago_historico` VALUES ('169', '2015-06-08', '16:40:40', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '7');
INSERT INTO `transantiago_historico` VALUES ('170', '2015-06-08', '16:42:08', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '7');
INSERT INTO `transantiago_historico` VALUES ('171', '2015-06-08', '16:42:08', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '7');
INSERT INTO `transantiago_historico` VALUES ('172', '2015-06-08', '16:43:32', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '7');
INSERT INTO `transantiago_historico` VALUES ('173', '2015-06-08', '16:43:34', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '7');
INSERT INTO `transantiago_historico` VALUES ('174', '2015-06-08', '16:45:23', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('175', '2015-06-08', '16:46:35', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('176', '2015-06-08', '17:07:10', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('177', '2015-06-08', '17:09:15', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('178', '2015-06-08', '17:10:35', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('179', '2015-06-08', '17:12:27', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '7');
INSERT INTO `transantiago_historico` VALUES ('180', '2015-06-08', '17:15:28', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '7');
INSERT INTO `transantiago_historico` VALUES ('181', '2015-06-08', '17:17:24', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '7');
INSERT INTO `transantiago_historico` VALUES ('182', '2015-06-08', '17:18:53', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '7');
INSERT INTO `transantiago_historico` VALUES ('183', '2015-06-08', '17:20:17', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '7');
INSERT INTO `transantiago_historico` VALUES ('184', '2015-06-08', '19:16:28', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('185', '2015-06-08', '19:18:04', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('186', '2015-06-08', '19:34:08', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('187', '2015-06-08', '19:36:12', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('188', '2015-06-08', '19:37:32', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('189', '2015-06-08', '19:39:28', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '7');
INSERT INTO `transantiago_historico` VALUES ('190', '2015-06-08', '19:42:28', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '7');
INSERT INTO `transantiago_historico` VALUES ('191', '2015-06-08', '19:44:20', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '7');
INSERT INTO `transantiago_historico` VALUES ('192', '2015-06-08', '19:45:52', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '7');
INSERT INTO `transantiago_historico` VALUES ('193', '2015-06-08', '19:47:16', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '7');
INSERT INTO `transantiago_historico` VALUES ('194', '2015-06-09', '19:09:33', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('195', '2015-06-09', '19:11:17', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('196', '2015-06-09', '19:41:10', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('197', '2015-06-09', '19:42:34', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('198', '2015-06-09', '20:02:52', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '7');
INSERT INTO `transantiago_historico` VALUES ('199', '2015-06-09', '20:04:59', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '7');
INSERT INTO `transantiago_historico` VALUES ('200', '2015-06-09', '20:06:30', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '7');
INSERT INTO `transantiago_historico` VALUES ('201', '2015-06-09', '20:08:03', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '7');
INSERT INTO `transantiago_historico` VALUES ('202', '2015-06-09', '20:11:10', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '7');
INSERT INTO `transantiago_historico` VALUES ('203', '2015-06-09', '20:13:14', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '7');
INSERT INTO `transantiago_historico` VALUES ('204', '2015-06-09', '20:14:35', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '7');
INSERT INTO `transantiago_historico` VALUES ('205', '2015-06-09', '20:16:22', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '7');
INSERT INTO `transantiago_historico` VALUES ('206', '2015-06-09', '20:17:45', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '7');
INSERT INTO `transantiago_historico` VALUES ('207', '2015-06-09', '20:18:53', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '7');
INSERT INTO `transantiago_historico` VALUES ('208', '2015-06-10', '09:17:00', '10', '10', '2', '0', '0', '5');
INSERT INTO `transantiago_historico` VALUES ('209', '2015-06-10', '09:17:00', '11', '10', '2', '0', '0', '9');
INSERT INTO `transantiago_historico` VALUES ('210', '2015-06-10', '13:45:16', '11', '10', '2', '-33.605958094287', '-70.5766738677368', '9');
INSERT INTO `transantiago_historico` VALUES ('211', '2015-06-10', '13:50:12', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '5');
INSERT INTO `transantiago_historico` VALUES ('212', '2015-06-10', '13:51:48', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '5');
INSERT INTO `transantiago_historico` VALUES ('213', '2015-06-10', '13:55:12', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '5');
INSERT INTO `transantiago_historico` VALUES ('214', '2015-06-10', '13:57:16', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '5');
INSERT INTO `transantiago_historico` VALUES ('215', '2015-06-10', '13:58:36', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '5');
INSERT INTO `transantiago_historico` VALUES ('216', '2015-06-10', '13:59:59', '13', '10', '1', '-33.6250624383719', '-70.6125056296387', '4');
INSERT INTO `transantiago_historico` VALUES ('217', '2015-06-10', '14:00:32', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '5');
INSERT INTO `transantiago_historico` VALUES ('218', '2015-06-10', '14:03:32', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '5');
INSERT INTO `transantiago_historico` VALUES ('219', '2015-06-10', '14:05:16', '12', '10', '1', '-33.6250624383719', '-70.6125056296387', '3');
INSERT INTO `transantiago_historico` VALUES ('220', '2015-06-10', '14:05:28', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '5');
INSERT INTO `transantiago_historico` VALUES ('221', '2015-06-10', '14:06:56', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '5');
INSERT INTO `transantiago_historico` VALUES ('222', '2015-06-10', '14:08:20', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '5');
INSERT INTO `transantiago_historico` VALUES ('223', '2015-06-10', '14:12:02', '10', '10', '2', '-33.605958094287', '-70.5766738677368', '5');
INSERT INTO `transantiago_historico` VALUES ('224', '2015-06-10', '14:18:02', '10', '10', '2', '-33.6227108249766', '-70.5903531337128', '5');
INSERT INTO `transantiago_historico` VALUES ('225', '2015-06-10', '14:20:42', '10', '10', '2', '-33.6197000408842', '-70.5970479274141', '5');
INSERT INTO `transantiago_historico` VALUES ('226', '2015-06-10', '14:38:17', '12', '10', '1', '-33.6168788011606', '-70.6130849867859', '3');
INSERT INTO `transantiago_historico` VALUES ('227', '2015-06-10', '14:42:25', '12', '10', '1', '-33.6146987492452', '-70.5962621718445', '3');
INSERT INTO `transantiago_historico` VALUES ('228', '2015-06-10', '14:43:45', '12', '10', '1', '-33.6196931308956', '-70.5970561057129', '3');
INSERT INTO `transantiago_historico` VALUES ('229', '2015-06-10', '14:46:58', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '5');
INSERT INTO `transantiago_historico` VALUES ('230', '2015-06-10', '14:48:45', '10', '10', '2', '-33.605958094287', '-70.5766738677368', '5');
INSERT INTO `transantiago_historico` VALUES ('231', '2015-06-10', '14:50:26', '12', '10', '1', '-33.6242673374052', '-70.5942022353211', '3');
INSERT INTO `transantiago_historico` VALUES ('232', '2015-06-10', '14:52:22', '12', '10', '1', '-33.6305564748466', '-70.5929147749939', '3');
INSERT INTO `transantiago_historico` VALUES ('233', '2015-06-10', '14:54:45', '10', '10', '2', '-33.6227108249766', '-70.5903531337128', '5');
INSERT INTO `transantiago_historico` VALUES ('234', '2015-06-10', '14:57:25', '10', '10', '2', '-33.6197000408842', '-70.5970479274141', '5');
INSERT INTO `transantiago_historico` VALUES ('235', '2015-06-10', '15:03:40', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '5');
INSERT INTO `transantiago_historico` VALUES ('236', '2015-06-10', '15:05:16', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '5');
INSERT INTO `transantiago_historico` VALUES ('237', '2015-06-10', '15:08:03', '12', '10', '1', '-33.6239278538583', '-70.5900179892578', '3');
INSERT INTO `transantiago_historico` VALUES ('238', '2015-06-10', '15:08:40', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '5');
INSERT INTO `transantiago_historico` VALUES ('239', '2015-06-10', '15:09:55', '12', '10', '1', '-33.6226413777523', '-70.5809199362793', '3');
INSERT INTO `transantiago_historico` VALUES ('240', '2015-06-10', '15:10:44', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '5');
INSERT INTO `transantiago_historico` VALUES ('241', '2015-06-10', '15:11:26', '12', '10', '1', '-33.621140464685', '-70.5740534812012', '3');
INSERT INTO `transantiago_historico` VALUES ('242', '2015-06-10', '15:12:04', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '5');
INSERT INTO `transantiago_historico` VALUES ('243', '2015-06-10', '15:12:50', '12', '10', '1', '-33.6146362059585', '-70.5748259573975', '3');
INSERT INTO `transantiago_historico` VALUES ('244', '2015-06-10', '15:14:00', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '5');
INSERT INTO `transantiago_historico` VALUES ('245', '2015-06-10', '15:17:00', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '5');
INSERT INTO `transantiago_historico` VALUES ('246', '2015-06-10', '15:18:57', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '5');
INSERT INTO `transantiago_historico` VALUES ('247', '2015-06-10', '15:20:24', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '5');
INSERT INTO `transantiago_historico` VALUES ('248', '2015-06-10', '15:21:53', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '5');
INSERT INTO `transantiago_historico` VALUES ('249', '2015-06-10', '17:03:49', '13', '10', '1', '-33.6250624383719', '-70.6125056296387', '4');
INSERT INTO `transantiago_historico` VALUES ('250', '2015-06-25', '19:33:58', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '5');
INSERT INTO `transantiago_historico` VALUES ('251', '2015-06-25', '19:34:59', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '5');
INSERT INTO `transantiago_historico` VALUES ('252', '2015-06-25', '19:55:42', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '5');
INSERT INTO `transantiago_historico` VALUES ('253', '2015-06-25', '19:57:56', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '5');
INSERT INTO `transantiago_historico` VALUES ('254', '2015-06-25', '19:58:51', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '5');
INSERT INTO `transantiago_historico` VALUES ('255', '2015-06-25', '20:01:00', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '5');
INSERT INTO `transantiago_historico` VALUES ('256', '2015-06-25', '20:04:00', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '5');
INSERT INTO `transantiago_historico` VALUES ('257', '2015-06-25', '20:05:56', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '5');
INSERT INTO `transantiago_historico` VALUES ('258', '2015-06-25', '20:07:44', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '5');
INSERT INTO `transantiago_historico` VALUES ('259', '2015-06-25', '20:08:50', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '5');
INSERT INTO `transantiago_historico` VALUES ('260', '2015-07-01', '16:58:11', '13', '10', '2', '-33.605958094287', '-70.5766738677368', '4');
INSERT INTO `transantiago_historico` VALUES ('261', '2015-07-02', '15:40:31', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '5');
INSERT INTO `transantiago_historico` VALUES ('262', '2015-07-02', '15:41:54', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '5');
INSERT INTO `transantiago_historico` VALUES ('263', '2015-07-02', '15:45:29', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '5');
INSERT INTO `transantiago_historico` VALUES ('264', '2015-07-02', '15:47:26', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '5');
INSERT INTO `transantiago_historico` VALUES ('265', '2015-07-02', '15:48:54', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '5');
INSERT INTO `transantiago_historico` VALUES ('266', '2015-07-02', '15:50:57', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '5');
INSERT INTO `transantiago_historico` VALUES ('267', '2015-07-02', '15:54:08', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '5');
INSERT INTO `transantiago_historico` VALUES ('268', '2015-07-02', '15:55:34', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '5');
INSERT INTO `transantiago_historico` VALUES ('269', '2015-07-02', '15:57:05', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '5');
INSERT INTO `transantiago_historico` VALUES ('270', '2015-07-02', '15:58:37', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '5');
INSERT INTO `transantiago_historico` VALUES ('271', '2015-07-02', '16:02:32', '10', '10', '2', '-33.605958094287', '-70.5766738677368', '5');
INSERT INTO `transantiago_historico` VALUES ('272', '2015-07-02', '16:08:12', '10', '10', '2', '-33.6227108249766', '-70.5903531337128', '5');
INSERT INTO `transantiago_historico` VALUES ('273', '2015-07-02', '16:11:14', '10', '10', '2', '-33.6197000408842', '-70.5970479274141', '5');
INSERT INTO `transantiago_historico` VALUES ('274', '2015-07-03', '15:53:17', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '5');
INSERT INTO `transantiago_historico` VALUES ('275', '2015-07-03', '15:54:38', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '5');
INSERT INTO `transantiago_historico` VALUES ('276', '2015-07-03', '16:15:55', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '5');
INSERT INTO `transantiago_historico` VALUES ('277', '2015-07-03', '16:17:10', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '5');
INSERT INTO `transantiago_historico` VALUES ('278', '2015-07-03', '16:40:43', '10', '10', '1', '-33.6146987492452', '-70.5962621718445', '5');
INSERT INTO `transantiago_historico` VALUES ('279', '2015-07-03', '16:43:33', '10', '10', '1', '-33.6196931308956', '-70.5970561057129', '5');
INSERT INTO `transantiago_historico` VALUES ('280', '2015-07-03', '16:44:34', '10', '10', '1', '-33.6242673374052', '-70.5942022353211', '5');
INSERT INTO `transantiago_historico` VALUES ('281', '2015-07-03', '16:46:43', '10', '10', '1', '-33.6305564748466', '-70.5929147749939', '5');
INSERT INTO `transantiago_historico` VALUES ('282', '2015-07-03', '16:50:12', '10', '10', '1', '-33.6239278538583', '-70.5900179892578', '5');
INSERT INTO `transantiago_historico` VALUES ('283', '2015-07-03', '16:52:32', '10', '10', '1', '-33.6226413777523', '-70.5809199362793', '5');
INSERT INTO `transantiago_historico` VALUES ('284', '2015-07-03', '16:54:14', '10', '10', '1', '-33.621140464685', '-70.5740534812012', '5');
INSERT INTO `transantiago_historico` VALUES ('285', '2015-07-03', '16:55:47', '10', '10', '1', '-33.6146362059585', '-70.5748259573975', '5');
INSERT INTO `transantiago_historico` VALUES ('286', '2015-07-04', '15:43:38', '11', '10', '2', '-33.605958094287', '-70.5766738677368', '9');
INSERT INTO `transantiago_historico` VALUES ('287', '2015-07-13', '16:27:22', '10', '10', '2', '-33.605958094287', '-70.5766738677368', '5');
INSERT INTO `transantiago_historico` VALUES ('288', '2015-08-04', '19:35:33', '11', '10', '1', '-33.6250624383719', '-70.6125056296387', '9');
INSERT INTO `transantiago_historico` VALUES ('289', '2015-08-04', '19:36:53', '11', '10', '1', '-33.6168788011606', '-70.6130849867859', '9');
INSERT INTO `transantiago_historico` VALUES ('290', '2015-08-05', '16:11:17', '10', '10', '2', '-33.605958094287', '-70.5766738677368', '5');
INSERT INTO `transantiago_historico` VALUES ('291', '2015-08-05', '17:56:46', '10', '10', '1', '-33.6250624383719', '-70.6125056296387', '5');
INSERT INTO `transantiago_historico` VALUES ('292', '2015-08-05', '17:57:49', '10', '10', '1', '-33.6168788011606', '-70.6130849867859', '5');
INSERT INTO `transantiago_historico` VALUES ('293', '2015-08-07', '20:44:28', '11', '10', '1', '-33.6250624383719', '-70.6125056296387', '9');
INSERT INTO `transantiago_historico` VALUES ('294', '2015-08-07', '20:45:48', '11', '10', '1', '-33.6168788011606', '-70.6130849867859', '9');
INSERT INTO `transantiago_historico` VALUES ('295', '2015-08-07', '20:49:51', '11', '10', '1', '-33.6146987492452', '-70.5962621718445', '9');
INSERT INTO `transantiago_historico` VALUES ('296', '2015-08-07', '20:51:52', '10', '10', '2', '-33.605958094287', '-70.5766738677368', '5');
INSERT INTO `transantiago_historico` VALUES ('297', '2015-08-07', '20:52:11', '11', '10', '1', '-33.6196931308956', '-70.5970561057129', '9');
INSERT INTO `transantiago_historico` VALUES ('298', '2015-08-07', '20:58:45', '10', '10', '2', '-33.6227108249766', '-70.5903531337128', '5');
INSERT INTO `transantiago_historico` VALUES ('299', '2015-08-07', '21:02:03', '10', '10', '2', '-33.6197000408842', '-70.5970479274141', '5');
INSERT INTO `transantiago_historico` VALUES ('300', '2015-08-07', '21:13:28', '11', '10', '1', '-33.6242673374052', '-70.5942022353211', '9');
INSERT INTO `transantiago_historico` VALUES ('301', '2015-08-07', '21:15:40', '11', '10', '1', '-33.6305564748466', '-70.5929147749939', '9');
INSERT INTO `transantiago_historico` VALUES ('302', '2015-08-07', '21:19:09', '11', '10', '1', '-33.6239278538583', '-70.5900179892578', '9');
INSERT INTO `transantiago_historico` VALUES ('303', '2015-08-07', '21:21:17', '11', '10', '1', '-33.6226413777523', '-70.5809199362793', '9');
INSERT INTO `transantiago_historico` VALUES ('304', '2015-08-07', '21:22:56', '11', '10', '1', '-33.621140464685', '-70.5740534812012', '9');
INSERT INTO `transantiago_historico` VALUES ('305', '2015-08-07', '21:24:33', '11', '10', '1', '-33.6146362059585', '-70.5748259573975', '9');
INSERT INTO `transantiago_historico` VALUES ('306', '2015-08-07', '21:45:11', '11', '10', '2', '-33.605958094287', '-70.5766738677368', '9');
INSERT INTO `transantiago_historico` VALUES ('307', '2015-08-07', '21:51:55', '11', '10', '2', '-33.6227108249766', '-70.5903531337128', '9');
INSERT INTO `transantiago_historico` VALUES ('308', '2015-08-07', '22:20:56', '11', '10', '2', '-33.6197000408842', '-70.5970479274141', '9');

-- ----------------------------
-- Table structure for transantiago_mensaje
-- ----------------------------
DROP TABLE IF EXISTS `transantiago_mensaje`;
CREATE TABLE `transantiago_mensaje` (
  `idMensaje` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `idMsj_enviado` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `idEstado` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idMensaje`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transantiago_mensaje
-- ----------------------------
INSERT INTO `transantiago_mensaje` VALUES ('1', '10', '1', '5', '2015-06-09', '2');
INSERT INTO `transantiago_mensaje` VALUES ('2', '11', '1', '5', '2015-06-09', '2');
INSERT INTO `transantiago_mensaje` VALUES ('3', '12', '1', '5', '2015-06-09', '2');
INSERT INTO `transantiago_mensaje` VALUES ('4', '13', '1', '5', '2015-06-09', '2');
INSERT INTO `transantiago_mensaje` VALUES ('5', '14', '1', '5', '2015-06-09', '1');
INSERT INTO `transantiago_mensaje` VALUES ('6', '15', '1', '5', '2015-06-09', '1');
INSERT INTO `transantiago_mensaje` VALUES ('7', '16', '1', '5', '2015-06-09', '1');
INSERT INTO `transantiago_mensaje` VALUES ('8', '17', '1', '5', '2015-06-09', '1');
INSERT INTO `transantiago_mensaje` VALUES ('9', '18', '1', '5', '2015-06-09', '1');
INSERT INTO `transantiago_mensaje` VALUES ('10', '19', '1', '5', '2015-06-09', '1');
INSERT INTO `transantiago_mensaje` VALUES ('11', '20', '1', '5', '2015-06-09', '1');
INSERT INTO `transantiago_mensaje` VALUES ('12', '21', '1', '5', '2015-06-09', '1');
INSERT INTO `transantiago_mensaje` VALUES ('13', '22', '1', '5', '2015-06-09', '1');
INSERT INTO `transantiago_mensaje` VALUES ('14', '10', '2', '5', '2015-06-09', '2');
INSERT INTO `transantiago_mensaje` VALUES ('15', '11', '2', '5', '2015-06-09', '2');
INSERT INTO `transantiago_mensaje` VALUES ('16', '12', '2', '5', '2015-06-09', '2');
INSERT INTO `transantiago_mensaje` VALUES ('17', '13', '2', '5', '2015-06-09', '2');
INSERT INTO `transantiago_mensaje` VALUES ('18', '14', '2', '5', '2015-06-09', '1');
INSERT INTO `transantiago_mensaje` VALUES ('19', '15', '2', '5', '2015-06-09', '1');
INSERT INTO `transantiago_mensaje` VALUES ('20', '16', '2', '5', '2015-06-09', '1');
INSERT INTO `transantiago_mensaje` VALUES ('21', '17', '2', '5', '2015-06-09', '1');
INSERT INTO `transantiago_mensaje` VALUES ('22', '18', '2', '5', '2015-06-09', '1');
INSERT INTO `transantiago_mensaje` VALUES ('23', '19', '2', '5', '2015-06-09', '1');
INSERT INTO `transantiago_mensaje` VALUES ('24', '20', '2', '5', '2015-06-09', '1');
INSERT INTO `transantiago_mensaje` VALUES ('25', '21', '2', '5', '2015-06-09', '1');
INSERT INTO `transantiago_mensaje` VALUES ('26', '22', '2', '5', '2015-06-09', '1');

-- ----------------------------
-- Table structure for transantiago_mensaje_estado
-- ----------------------------
DROP TABLE IF EXISTS `transantiago_mensaje_estado`;
CREATE TABLE `transantiago_mensaje_estado` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transantiago_mensaje_estado
-- ----------------------------
INSERT INTO `transantiago_mensaje_estado` VALUES ('1', 'No visto');
INSERT INTO `transantiago_mensaje_estado` VALUES ('2', 'Visto');

-- ----------------------------
-- Table structure for transantiago_propietarios
-- ----------------------------
DROP TABLE IF EXISTS `transantiago_propietarios`;
CREATE TABLE `transantiago_propietarios` (
  `idPropietario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `Apellido_Paterno` varchar(120) NOT NULL,
  `Apellido_Materno` varchar(120) NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `fNacimiento` date NOT NULL,
  `email` varchar(120) NOT NULL,
  `Pais` varchar(120) NOT NULL,
  `idCiudad` int(11) unsigned NOT NULL,
  `idComuna` int(11) unsigned NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `Fono1` varchar(15) NOT NULL,
  `Fono2` varchar(15) NOT NULL,
  `NombreEmpresa` varchar(120) NOT NULL,
  PRIMARY KEY (`idPropietario`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transantiago_propietarios
-- ----------------------------
INSERT INTO `transantiago_propietarios` VALUES ('1', 'ANDRES', 'ROCA', 'CORTINA', '12807654-9', 'M', '2015-06-02', 'asda@asd.cl', '', '0', '0', 'asd', '123455666', '', 'RocaCortina SA');
INSERT INTO `transantiago_propietarios` VALUES ('2', 'VICTOR MANUEL', 'ASENCIO', 'GAYA', '7543214-3', 'M', '2015-06-02', 'asda@asd.cl', '', '0', '0', 'SDF', '', '', 'ASENCIO');
INSERT INTO `transantiago_propietarios` VALUES ('3', 'ALEJANDRO', 'VILAR', 'ROSAS', '16029464-7', 'M', '2015-06-02', 'asda@asd.cl', '', '0', '0', 'SDFD', '', '', 'VILAR ROSAS');
INSERT INTO `transantiago_propietarios` VALUES ('4', 'PABLO', 'GASPAR', 'VERDEJO', '7305433-8', 'M', '2015-06-02', 'asda@asd.cl', '', '0', '0', 'FSDF', '', '', 'GASPAR');
INSERT INTO `transantiago_propietarios` VALUES ('5', 'JOSE MARIA', 'CUBILLO', 'REGUERA', '17499901-5', 'M', '2015-06-02', 'asda@asd.cl', '', '0', '0', 'SDDF', '', '', 'CUBILLO SA');
INSERT INTO `transantiago_propietarios` VALUES ('6', 'FELIPE', 'ROVIRA ', 'ROYO', '22877898-2', 'M', '2015-06-02', 'asda@asd.cl', '', '0', '0', 'FDG', '', '', 'ROVIRA HERMANOS');
INSERT INTO `transantiago_propietarios` VALUES ('7', 'EDUARDO', 'SALVA', 'ESCALANTE', '14061369-k', 'M', '2015-06-02', 'asda@asd.cl', '', '0', '0', 'GFG', '', '', 'SALVA SA');
INSERT INTO `transantiago_propietarios` VALUES ('8', 'JOSE RAMON', 'URIBE', 'ESPIN', '15884518-0', 'M', '2015-06-02', 'asda@asd.cl', '', '0', '0', 'FDGDFG', '', '', 'URIBE LMTDA');
INSERT INTO `transantiago_propietarios` VALUES ('9', 'JOSE MANUEL', 'BELLES', 'MERINO', '16495567-2', 'M', '2015-06-02', 'asda@asd.cl', '', '0', '0', 'sdf', '', '', 'MERINO SA');

-- ----------------------------
-- Table structure for transantiago_recorridos
-- ----------------------------
DROP TABLE IF EXISTS `transantiago_recorridos`;
CREATE TABLE `transantiago_recorridos` (
  `idRecorrido` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idRecorrido`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transantiago_recorridos
-- ----------------------------
INSERT INTO `transantiago_recorridos` VALUES ('1', 'F02');
INSERT INTO `transantiago_recorridos` VALUES ('2', 'F01');
INSERT INTO `transantiago_recorridos` VALUES ('3', 'F03');
INSERT INTO `transantiago_recorridos` VALUES ('4', 'F04');
INSERT INTO `transantiago_recorridos` VALUES ('5', 'F05');
INSERT INTO `transantiago_recorridos` VALUES ('6', 'F06');
INSERT INTO `transantiago_recorridos` VALUES ('7', 'F07');
INSERT INTO `transantiago_recorridos` VALUES ('8', 'F08');
INSERT INTO `transantiago_recorridos` VALUES ('9', 'F09');
INSERT INTO `transantiago_recorridos` VALUES ('10', 'F12');

-- ----------------------------
-- Table structure for transantiago_rutas
-- ----------------------------
DROP TABLE IF EXISTS `transantiago_rutas`;
CREATE TABLE `transantiago_rutas` (
  `idRuta` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idRuta`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transantiago_rutas
-- ----------------------------
INSERT INTO `transantiago_rutas` VALUES ('1', 'ida');
INSERT INTO `transantiago_rutas` VALUES ('2', 'vuelta');

-- ----------------------------
-- Table structure for transantiago_rutas_multi
-- ----------------------------
DROP TABLE IF EXISTS `transantiago_rutas_multi`;
CREATE TABLE `transantiago_rutas_multi` (
  `idRutaAlt` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idTipo` int(11) unsigned NOT NULL,
  `idEstado` int(11) unsigned NOT NULL,
  `idDias` int(11) unsigned NOT NULL,
  `idRecorrido` int(11) unsigned NOT NULL,
  `idRuta` int(11) unsigned NOT NULL,
  `Nombre` varchar(250) NOT NULL,
  `Fecha` date NOT NULL,
  `HoraInicio` time NOT NULL,
  `HoraTermino` time NOT NULL,
  `idCatimg` int(11) unsigned NOT NULL,
  `idListimg` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idRutaAlt`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transantiago_rutas_multi
-- ----------------------------
INSERT INTO `transantiago_rutas_multi` VALUES ('3', '2', '1', '4', '10', '1', 'feria', '0000-00-00', '06:28:00', '23:59:00', '0', '0');
INSERT INTO `transantiago_rutas_multi` VALUES ('4', '3', '1', '0', '10', '1', 'control recorrido F12 ida', '0000-00-00', '00:00:00', '00:00:00', '0', '0');
INSERT INTO `transantiago_rutas_multi` VALUES ('5', '1', '1', '0', '10', '1', 'qweqwe', '2015-05-14', '05:27:00', '23:45:00', '0', '0');
INSERT INTO `transantiago_rutas_multi` VALUES ('6', '2', '1', '3', '10', '1', 'feria', '0000-00-00', '05:28:00', '23:58:00', '0', '0');
INSERT INTO `transantiago_rutas_multi` VALUES ('7', '1', '1', '0', '10', '1', 'choque', '2015-05-15', '11:45:00', '23:57:00', '0', '0');
INSERT INTO `transantiago_rutas_multi` VALUES ('8', '5', '2', '0', '10', '1', 'final recorrido', '0000-00-00', '00:00:00', '00:00:00', '0', '0');
INSERT INTO `transantiago_rutas_multi` VALUES ('9', '4', '2', '0', '10', '1', 'Cambio a vuelta', '0000-00-00', '00:00:00', '00:00:00', '0', '0');
INSERT INTO `transantiago_rutas_multi` VALUES ('10', '6', '1', '0', '10', '1', 'accidente', '2015-05-19', '07:52:00', '23:53:00', '1', '1');
INSERT INTO `transantiago_rutas_multi` VALUES ('11', '6', '1', '0', '10', '1', 'Calle cerrada', '2015-05-20', '09:44:00', '22:45:00', '1', '2');
INSERT INTO `transantiago_rutas_multi` VALUES ('12', '3', '1', '0', '10', '2', 'control recorrido F12 vuelta', '0000-00-00', '00:00:00', '00:00:00', '0', '0');
INSERT INTO `transantiago_rutas_multi` VALUES ('13', '6', '1', '0', '10', '1', 'choque', '2015-06-10', '11:14:00', '19:14:00', '1', '1');
INSERT INTO `transantiago_rutas_multi` VALUES ('14', '2', '2', '1', '10', '1', 'dfjkjkfdhf', '0000-00-00', '11:26:00', '15:26:00', '0', '0');
INSERT INTO `transantiago_rutas_multi` VALUES ('15', '1', '1', '0', '10', '1', 'dfg', '2015-07-02', '11:59:00', '21:59:00', '0', '0');

-- ----------------------------
-- Table structure for transantiago_rutas_multi_dias
-- ----------------------------
DROP TABLE IF EXISTS `transantiago_rutas_multi_dias`;
CREATE TABLE `transantiago_rutas_multi_dias` (
  `idDias` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idDias`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transantiago_rutas_multi_dias
-- ----------------------------
INSERT INTO `transantiago_rutas_multi_dias` VALUES ('1', 'Lunes');
INSERT INTO `transantiago_rutas_multi_dias` VALUES ('2', 'Martes');
INSERT INTO `transantiago_rutas_multi_dias` VALUES ('3', 'Miercoles');
INSERT INTO `transantiago_rutas_multi_dias` VALUES ('4', 'Jueves');
INSERT INTO `transantiago_rutas_multi_dias` VALUES ('5', 'Viernes');
INSERT INTO `transantiago_rutas_multi_dias` VALUES ('6', 'Sabado');
INSERT INTO `transantiago_rutas_multi_dias` VALUES ('7', 'Domingo');

-- ----------------------------
-- Table structure for transantiago_rutas_multi_estado
-- ----------------------------
DROP TABLE IF EXISTS `transantiago_rutas_multi_estado`;
CREATE TABLE `transantiago_rutas_multi_estado` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transantiago_rutas_multi_estado
-- ----------------------------
INSERT INTO `transantiago_rutas_multi_estado` VALUES ('1', 'Activo');
INSERT INTO `transantiago_rutas_multi_estado` VALUES ('2', 'Inactivo');

-- ----------------------------
-- Table structure for transantiago_rutas_multi_listado
-- ----------------------------
DROP TABLE IF EXISTS `transantiago_rutas_multi_listado`;
CREATE TABLE `transantiago_rutas_multi_listado` (
  `idListado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idRutaAlt` int(11) unsigned NOT NULL,
  `Latitud` double NOT NULL,
  `Longitud` double NOT NULL,
  `direccion` varchar(250) NOT NULL,
  PRIMARY KEY (`idListado`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transantiago_rutas_multi_listado
-- ----------------------------
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('1', '0', '0', '0', '');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('2', '0', '0', '0', '');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('5', '3', '-33.6296497596357', '-70.5930649786987', 'Nocedal 1218-1240, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('6', '3', '-33.629395163008', '-70.5912839919129', 'Cerro Yate, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('7', '3', '-33.6297256918175', '-70.5912303477326', 'Cerro Pinque 1400-1499, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('8', '3', '-33.6295425611473', '-70.5897980481186', 'Cerro Pinque 1301-1399, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('9', '3', '-33.6302706149236', '-70.5897283106842', 'Los Conquistadores 1373, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('10', '3', '-33.6302773147764', '-70.5894627719917', 'Ejército Liber 1292, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('11', '3', '-33.6296832591359', '-70.589500322918', 'Los Hispanos 1296, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('12', '5', '-33.6314319149595', '-70.5927162915268', 'Camino Internacional 1501-1689, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('13', '5', '-33.6316552400945', '-70.5894010811844', 'Camino Internacional, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('14', '6', '-33.6148327704209', '-70.5960368662872', 'Eyzaguirre 1749-1971, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('15', '6', '-33.6145557930947', '-70.5937945395508', 'Hermano Alberto 8-58, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('16', '6', '-33.6158602591783', '-70.5935692339935', 'Hermano Alberto 8-58, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('17', '6', '-33.6158959976972', '-70.5937677174607', 'Hermano Alberto 8-58, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('18', '6', '-33.6160255497041', '-70.5938428193131', 'Arturo Prat 1398-1410, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('19', '4', '-33.6250624383719', '-70.6125056296387', 'Juanita 634-642, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('20', '4', '-33.6168788011606', '-70.6130849867859', 'Eyzaguirre 3208, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('21', '4', '-33.6146987492452', '-70.5962621718445', 'Eyzaguirre 1749-1971, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('22', '4', '-33.6196931308956', '-70.5970561057129', 'Valle Central 297, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('23', '4', '-33.6242673374052', '-70.5942022353211', 'San Pedro 1501-1575, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('24', '4', '-33.6305564748466', '-70.5929147749939', 'Nocedal 1266-1284, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('25', '4', '-33.6239278538583', '-70.5900179892578', 'Ejército Liber 802-820, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('26', '4', '-33.6226413777523', '-70.5809199362793', 'San Pedro 605-699, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('27', '4', '-33.621140464685', '-70.5740534812012', 'Avenida Concha Y Toro 717-795, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('28', '4', '-33.6146362059585', '-70.5748259573975', 'Avenida Concha Y Toro 94-190, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('29', '7', '-33.6240484600084', '-70.596176341156', 'Valle Central 821, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('30', '7', '-33.6237804461122', '-70.5942666083374', 'Volcán Maipo 1548, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('31', '7', '-33.6242986055594', '-70.5941673666039', 'San Pedro 1502-1578, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('33', '8', '-33.6347381844105', '-70.6112999766865', 'Juanita Oriente, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('34', '9', '-33.6091746618123', '-70.5750834494629', 'Balmaceda 255-287, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('35', '10', '-33.6195099788994', '-70.5958598404923', 'Sargento Menadier 1548-1642, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('36', '11', '-33.6190811336781', '-70.59401448069', 'Sargento Menadier 1450-1458, Puente Alto, Región Metropolitana de Santiago, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('37', '12', '-33.605958094287', '-70.5766738677368', 'Avenida Concha Y Toro 610-612, Puente Alto, Puente Alto, Región Metropolitana, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('38', '12', '-33.6227108249766', '-70.5903531337128', 'Real Audiencia 1293, Puente Alto, Puente Alto, Región Metropolitana, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('39', '12', '-33.6197000408842', '-70.5970479274141', 'Sargento Menadier 1740, Puente Alto, Puente Alto, Región Metropolitana, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('40', '13', '-33.6152348326978', '-70.5953824072876', 'Arturo Prat 1478, Puente Alto, Puente Alto, Región Metropolitana, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('41', '14', '-33.631387249863', '-70.5927645712891', 'Camino Internacional 1507, Puente Alto, Puente Alto, Región Metropolitana, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('42', '14', '-33.6316463071002', '-70.5894064456024', 'Camino Internacional 1381, Puente Alto, Puente Alto, Región Metropolitana, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('43', '15', '-33.631387249863', '-70.5927645712891', 'Camino Internacional 1507, Puente Alto, Puente Alto, Región Metropolitana, Chile');
INSERT INTO `transantiago_rutas_multi_listado` VALUES ('44', '15', '-33.6316463071002', '-70.5894171744385', 'Camino Internacional 1381, Puente Alto, Puente Alto, Región Metropolitana, Chile');

-- ----------------------------
-- Table structure for transantiago_rutas_multi_tipo
-- ----------------------------
DROP TABLE IF EXISTS `transantiago_rutas_multi_tipo`;
CREATE TABLE `transantiago_rutas_multi_tipo` (
  `idTipo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transantiago_rutas_multi_tipo
-- ----------------------------
INSERT INTO `transantiago_rutas_multi_tipo` VALUES ('1', 'Rutas Alternativas Imprevistas');
INSERT INTO `transantiago_rutas_multi_tipo` VALUES ('2', 'Rutas Alternativas Programadas');
INSERT INTO `transantiago_rutas_multi_tipo` VALUES ('3', 'Puntos de Control');
INSERT INTO `transantiago_rutas_multi_tipo` VALUES ('4', 'Puntos de Retorno');
INSERT INTO `transantiago_rutas_multi_tipo` VALUES ('5', 'Puntos de Finalizacion de Ruta');
INSERT INTO `transantiago_rutas_multi_tipo` VALUES ('6', 'Alertas de Ruta');

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
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

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
INSERT INTO `usuarios_accesos` VALUES ('11', '1', '2015-01-10', '18:51:30');
INSERT INTO `usuarios_accesos` VALUES ('12', '3', '2015-01-11', '23:07:34');
INSERT INTO `usuarios_accesos` VALUES ('13', '3', '2015-01-11', '17:09:33');
INSERT INTO `usuarios_accesos` VALUES ('14', '3', '2015-01-11', '17:09:42');
INSERT INTO `usuarios_accesos` VALUES ('15', '1', '2015-01-11', '19:22:12');
INSERT INTO `usuarios_accesos` VALUES ('16', '1', '2015-01-11', '19:22:16');
INSERT INTO `usuarios_accesos` VALUES ('17', '3', '2015-01-12', '20:26:20');
INSERT INTO `usuarios_accesos` VALUES ('18', '3', '2015-01-12', '20:26:27');
INSERT INTO `usuarios_accesos` VALUES ('19', '1', '2015-01-12', '21:01:28');
INSERT INTO `usuarios_accesos` VALUES ('20', '1', '2015-01-12', '21:01:31');
INSERT INTO `usuarios_accesos` VALUES ('21', '2', '2015-01-12', '21:17:10');
INSERT INTO `usuarios_accesos` VALUES ('22', '2', '2015-01-12', '21:17:15');
INSERT INTO `usuarios_accesos` VALUES ('23', '1', '2015-01-12', '10:42:14');
INSERT INTO `usuarios_accesos` VALUES ('24', '3', '2015-01-12', '13:42:12');
INSERT INTO `usuarios_accesos` VALUES ('25', '2', '2015-01-12', '13:43:25');
INSERT INTO `usuarios_accesos` VALUES ('26', '2', '2015-01-12', '13:44:12');
INSERT INTO `usuarios_accesos` VALUES ('27', '1', '2015-01-12', '15:42:40');
INSERT INTO `usuarios_accesos` VALUES ('28', '3', '2015-01-12', '16:01:40');
INSERT INTO `usuarios_accesos` VALUES ('29', '2', '2015-01-12', '16:49:59');
INSERT INTO `usuarios_accesos` VALUES ('30', '2', '2015-01-12', '16:50:05');
INSERT INTO `usuarios_accesos` VALUES ('31', '3', '2015-01-12', '17:30:14');
INSERT INTO `usuarios_accesos` VALUES ('32', '3', '2015-01-12', '17:30:21');
INSERT INTO `usuarios_accesos` VALUES ('33', '1', '2015-01-12', '18:03:36');
INSERT INTO `usuarios_accesos` VALUES ('34', '1', '2015-01-12', '18:03:44');
INSERT INTO `usuarios_accesos` VALUES ('35', '3', '2015-01-12', '18:04:01');
INSERT INTO `usuarios_accesos` VALUES ('36', '3', '2015-01-12', '18:04:04');
INSERT INTO `usuarios_accesos` VALUES ('37', '2', '2015-01-12', '18:04:22');
INSERT INTO `usuarios_accesos` VALUES ('38', '2', '2015-01-12', '18:04:28');
INSERT INTO `usuarios_accesos` VALUES ('39', '1', '2015-01-12', '18:06:44');
INSERT INTO `usuarios_accesos` VALUES ('40', '1', '2015-01-12', '18:06:49');
INSERT INTO `usuarios_accesos` VALUES ('41', '4', '2015-01-12', '18:14:48');
INSERT INTO `usuarios_accesos` VALUES ('42', '4', '2015-01-12', '18:14:53');
INSERT INTO `usuarios_accesos` VALUES ('43', '3', '2015-01-13', '10:24:47');
INSERT INTO `usuarios_accesos` VALUES ('44', '2', '2015-01-13', '10:26:24');
INSERT INTO `usuarios_accesos` VALUES ('45', '1', '2015-01-14', '10:50:08');
INSERT INTO `usuarios_accesos` VALUES ('46', '1', '2015-01-15', '09:49:01');
INSERT INTO `usuarios_accesos` VALUES ('47', '1', '2015-01-16', '09:46:37');
INSERT INTO `usuarios_accesos` VALUES ('48', '1', '2015-01-19', '11:15:25');
INSERT INTO `usuarios_accesos` VALUES ('49', '1', '2015-01-20', '09:43:06');
INSERT INTO `usuarios_accesos` VALUES ('50', '1', '2015-01-20', '14:51:09');
INSERT INTO `usuarios_accesos` VALUES ('51', '1', '2015-01-21', '09:54:15');
INSERT INTO `usuarios_accesos` VALUES ('52', '1', '2015-01-21', '12:57:45');
INSERT INTO `usuarios_accesos` VALUES ('53', '1', '2015-01-22', '09:40:32');
INSERT INTO `usuarios_accesos` VALUES ('54', '1', '2015-01-23', '14:11:22');
INSERT INTO `usuarios_accesos` VALUES ('55', '1', '2015-01-26', '10:02:15');
INSERT INTO `usuarios_accesos` VALUES ('56', '1', '2015-01-27', '10:31:48');
INSERT INTO `usuarios_accesos` VALUES ('57', '1', '2015-02-03', '10:26:15');
INSERT INTO `usuarios_accesos` VALUES ('58', '1', '2015-02-05', '10:07:50');
INSERT INTO `usuarios_accesos` VALUES ('59', '1', '2015-02-05', '10:09:28');
INSERT INTO `usuarios_accesos` VALUES ('60', '1', '2015-02-17', '10:01:32');
INSERT INTO `usuarios_accesos` VALUES ('61', '1', '2015-02-20', '14:15:13');
INSERT INTO `usuarios_accesos` VALUES ('62', '1', '2015-02-20', '15:53:36');
INSERT INTO `usuarios_accesos` VALUES ('63', '1', '2015-03-14', '18:16:43');
INSERT INTO `usuarios_accesos` VALUES ('64', '1', '2015-03-17', '12:56:42');
INSERT INTO `usuarios_accesos` VALUES ('65', '1', '2015-03-18', '11:07:31');
INSERT INTO `usuarios_accesos` VALUES ('66', '1', '2015-03-18', '16:00:58');
INSERT INTO `usuarios_accesos` VALUES ('67', '1', '2015-03-20', '14:27:21');
INSERT INTO `usuarios_accesos` VALUES ('68', '1', '2015-03-23', '10:08:58');
INSERT INTO `usuarios_accesos` VALUES ('69', '1', '2015-04-10', '14:53:09');
INSERT INTO `usuarios_accesos` VALUES ('70', '1', '2015-04-13', '11:08:19');
INSERT INTO `usuarios_accesos` VALUES ('71', '5', '2015-04-13', '11:18:03');
INSERT INTO `usuarios_accesos` VALUES ('72', '5', '2015-04-13', '11:18:12');
INSERT INTO `usuarios_accesos` VALUES ('73', '1', '2015-04-13', '11:20:03');
INSERT INTO `usuarios_accesos` VALUES ('74', '1', '2015-04-13', '11:20:06');
INSERT INTO `usuarios_accesos` VALUES ('75', '1', '2015-04-13', '13:25:02');
INSERT INTO `usuarios_accesos` VALUES ('76', '1', '2015-04-14', '10:58:12');
INSERT INTO `usuarios_accesos` VALUES ('77', '1', '2015-04-14', '13:37:10');
INSERT INTO `usuarios_accesos` VALUES ('78', '1', '2015-04-20', '11:53:20');
INSERT INTO `usuarios_accesos` VALUES ('79', '1', '2015-04-20', '11:53:49');
INSERT INTO `usuarios_accesos` VALUES ('80', '1', '2015-05-04', '11:07:18');
INSERT INTO `usuarios_accesos` VALUES ('81', '1', '2015-05-05', '17:31:09');
INSERT INTO `usuarios_accesos` VALUES ('82', '1', '2015-05-06', '18:00:03');
INSERT INTO `usuarios_accesos` VALUES ('83', '1', '2015-05-06', '18:04:05');
INSERT INTO `usuarios_accesos` VALUES ('84', '1', '2015-05-06', '18:05:11');
INSERT INTO `usuarios_accesos` VALUES ('85', '1', '2015-05-12', '10:26:08');
INSERT INTO `usuarios_accesos` VALUES ('86', '1', '2015-05-13', '10:50:54');
INSERT INTO `usuarios_accesos` VALUES ('87', '1', '2015-05-13', '14:31:20');
INSERT INTO `usuarios_accesos` VALUES ('88', '1', '2015-05-14', '10:50:10');
INSERT INTO `usuarios_accesos` VALUES ('89', '1', '2015-05-14', '14:55:40');
INSERT INTO `usuarios_accesos` VALUES ('90', '1', '2015-05-14', '17:05:40');
INSERT INTO `usuarios_accesos` VALUES ('91', '1', '2015-05-15', '10:01:08');
INSERT INTO `usuarios_accesos` VALUES ('92', '1', '2015-05-15', '13:34:52');
INSERT INTO `usuarios_accesos` VALUES ('93', '1', '2015-05-15', '13:35:22');
INSERT INTO `usuarios_accesos` VALUES ('94', '1', '2015-05-18', '14:06:45');
INSERT INTO `usuarios_accesos` VALUES ('95', '1', '2015-05-19', '09:47:29');
INSERT INTO `usuarios_accesos` VALUES ('96', '1', '2015-05-22', '09:43:36');
INSERT INTO `usuarios_accesos` VALUES ('97', '1', '2015-05-27', '16:36:52');
INSERT INTO `usuarios_accesos` VALUES ('98', '1', '2015-05-29', '10:59:29');
INSERT INTO `usuarios_accesos` VALUES ('99', '1', '2015-06-01', '09:41:45');
INSERT INTO `usuarios_accesos` VALUES ('100', '1', '2015-06-01', '14:13:39');
INSERT INTO `usuarios_accesos` VALUES ('101', '1', '2015-06-01', '15:06:48');
INSERT INTO `usuarios_accesos` VALUES ('102', '3', '2015-06-01', '16:02:46');
INSERT INTO `usuarios_accesos` VALUES ('103', '5', '2015-06-01', '17:02:29');
INSERT INTO `usuarios_accesos` VALUES ('104', '5', '2015-06-01', '17:02:40');
INSERT INTO `usuarios_accesos` VALUES ('105', '1', '2015-06-01', '17:05:33');
INSERT INTO `usuarios_accesos` VALUES ('106', '5', '2015-06-02', '08:40:21');
INSERT INTO `usuarios_accesos` VALUES ('107', '3', '2015-06-02', '08:41:20');
INSERT INTO `usuarios_accesos` VALUES ('108', '3', '2015-06-02', '08:41:24');
INSERT INTO `usuarios_accesos` VALUES ('109', '5', '2015-06-02', '08:41:51');
INSERT INTO `usuarios_accesos` VALUES ('110', '5', '2015-06-02', '08:41:54');
INSERT INTO `usuarios_accesos` VALUES ('111', '1', '2015-06-02', '08:43:36');
INSERT INTO `usuarios_accesos` VALUES ('112', '1', '2015-06-02', '08:43:40');
INSERT INTO `usuarios_accesos` VALUES ('113', '5', '2015-06-02', '08:48:29');
INSERT INTO `usuarios_accesos` VALUES ('114', '5', '2015-06-02', '08:48:32');
INSERT INTO `usuarios_accesos` VALUES ('115', '1', '2015-06-02', '09:42:12');
INSERT INTO `usuarios_accesos` VALUES ('116', '1', '2015-06-02', '09:42:14');
INSERT INTO `usuarios_accesos` VALUES ('117', '5', '2015-06-02', '09:42:47');
INSERT INTO `usuarios_accesos` VALUES ('118', '5', '2015-06-02', '09:42:49');
INSERT INTO `usuarios_accesos` VALUES ('119', '1', '2015-06-02', '09:47:03');
INSERT INTO `usuarios_accesos` VALUES ('120', '1', '2015-06-02', '09:47:06');
INSERT INTO `usuarios_accesos` VALUES ('121', '5', '2015-06-02', '09:47:29');
INSERT INTO `usuarios_accesos` VALUES ('122', '5', '2015-06-02', '09:47:32');
INSERT INTO `usuarios_accesos` VALUES ('123', '3', '2015-06-03', '07:45:18');
INSERT INTO `usuarios_accesos` VALUES ('124', '5', '2015-06-03', '07:55:53');
INSERT INTO `usuarios_accesos` VALUES ('125', '1', '2015-06-08', '12:09:47');
INSERT INTO `usuarios_accesos` VALUES ('126', '5', '2015-06-08', '12:10:08');
INSERT INTO `usuarios_accesos` VALUES ('127', '5', '2015-06-08', '12:10:12');
INSERT INTO `usuarios_accesos` VALUES ('128', '5', '2015-06-09', '15:16:32');
INSERT INTO `usuarios_accesos` VALUES ('129', '5', '2015-06-09', '16:11:45');
INSERT INTO `usuarios_accesos` VALUES ('130', '5', '2015-06-09', '16:25:46');
INSERT INTO `usuarios_accesos` VALUES ('131', '5', '2015-06-09', '16:35:25');
INSERT INTO `usuarios_accesos` VALUES ('132', '5', '2015-06-10', '08:18:35');
INSERT INTO `usuarios_accesos` VALUES ('133', '1', '2015-06-10', '08:55:58');
INSERT INTO `usuarios_accesos` VALUES ('134', '1', '2015-06-10', '08:56:00');
INSERT INTO `usuarios_accesos` VALUES ('135', '5', '2015-06-10', '09:43:36');
INSERT INTO `usuarios_accesos` VALUES ('136', '5', '2015-06-15', '09:28:07');
INSERT INTO `usuarios_accesos` VALUES ('137', '5', '2015-06-27', '09:43:26');
INSERT INTO `usuarios_accesos` VALUES ('138', '1', '2015-06-27', '10:14:10');
INSERT INTO `usuarios_accesos` VALUES ('139', '1', '2015-06-27', '10:14:16');
INSERT INTO `usuarios_accesos` VALUES ('140', '1', '2015-06-29', '12:24:38');
INSERT INTO `usuarios_accesos` VALUES ('141', '1', '2015-06-29', '12:32:45');
INSERT INTO `usuarios_accesos` VALUES ('142', '1', '2015-06-29', '14:46:35');
INSERT INTO `usuarios_accesos` VALUES ('143', '5', '2015-07-02', '12:01:22');
INSERT INTO `usuarios_accesos` VALUES ('144', '1', '2015-08-04', '10:25:02');
INSERT INTO `usuarios_accesos` VALUES ('145', '1', '2015-08-04', '14:18:14');
INSERT INTO `usuarios_accesos` VALUES ('146', '1', '2015-08-04', '14:29:29');
INSERT INTO `usuarios_accesos` VALUES ('147', '1', '2015-08-04', '14:43:36');
INSERT INTO `usuarios_accesos` VALUES ('148', '1', '2015-08-05', '11:55:24');
INSERT INTO `usuarios_accesos` VALUES ('149', '1', '2015-08-12', '13:39:16');
INSERT INTO `usuarios_accesos` VALUES ('150', '1', '2015-08-13', '11:21:52');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios_listado
-- ----------------------------
INSERT INTO `usuarios_listado` VALUES ('1', 'tenshi98', 'b9ad227539cc03cd8199e23aa9078065', 'SuperAdmin', '1', 'asd@bla1.cl', 'Victor Reyes', '16029464-7', '2014-05-14', 'Los Lirios 0936', '8512517', 'Santiago', 'Puente Alto', 'usr_img_img_6626.jpg', '2015-08-13', '1', '1', '0');
INSERT INTO `usuarios_listado` VALUES ('2', 'sostaxi', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrador', '1', 'test@test0.cl', 'Sostaxi Admin', '', '2014-11-17', 'test', '', '', '', '', '2015-01-13', '1', '0', '3');
INSERT INTO `usuarios_listado` VALUES ('3', 'normal', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrador', '1', 'normal@normal.com', 'Usuario normal', '', '2015-01-02', 'direccion', '', '', '', '', '2015-06-03', '1', '0', '1');
INSERT INTO `usuarios_listado` VALUES ('4', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'SuperAdmin', '1', 'admin@admin.cl', 'administrador', '', '2015-01-06', 'calle123', '', 'santiago', 'santiago', '', '2015-01-12', '1', '0', '0');
INSERT INTO `usuarios_listado` VALUES ('5', 'transantiago', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrador', '1', 'transantiago@transantiagoss.cl', 'Usuario Transantiago', '', '2015-03-03', 'transantiago', '', '', '', '', '2015-07-02', '1', '0', '3');

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
-- Table structure for usuarios_msj_tran_enviados
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_msj_tran_enviados`;
CREATE TABLE `usuarios_msj_tran_enviados` (
  `idMsj_enviado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) unsigned NOT NULL,
  `Mensaje` text NOT NULL,
  `Fecha` date NOT NULL,
  `Cantidad_clientes` smallint(4) unsigned NOT NULL,
  PRIMARY KEY (`idMsj_enviado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios_msj_tran_enviados
-- ----------------------------
INSERT INTO `usuarios_msj_tran_enviados` VALUES ('1', '5', 'tran_msn__2015-06-09T20_49_23.435Z.wav', '2015-06-09', '13');
INSERT INTO `usuarios_msj_tran_enviados` VALUES ('2', '5', 'tran_msn__2015-06-09T21-43-17.873Z.wav', '2015-06-09', '13');

-- ----------------------------
-- Table structure for usuarios_observaciones
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_observaciones`;
CREATE TABLE `usuarios_observaciones` (
  `idObservacion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario_observado` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Observacion` text NOT NULL,
  PRIMARY KEY (`idObservacion`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios_observaciones
-- ----------------------------
INSERT INTO `usuarios_observaciones` VALUES ('1', '9', '1', '2015-01-21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum');
INSERT INTO `usuarios_observaciones` VALUES ('2', '3', '1', '2015-01-21', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum');
INSERT INTO `usuarios_observaciones` VALUES ('3', '3', '1', '2015-01-21', 'tes2');
INSERT INTO `usuarios_observaciones` VALUES ('4', '3', '1', '2015-04-13', 'sdasd');
INSERT INTO `usuarios_observaciones` VALUES ('7', '0', '1', '2015-04-13', 'fgh');
INSERT INTO `usuarios_observaciones` VALUES ('6', '0', '1', '2015-04-13', 'sd');
INSERT INTO `usuarios_observaciones` VALUES ('8', '0', '1', '2015-04-13', 'asd');

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
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios_permisos
-- ----------------------------
INSERT INTO `usuarios_permisos` VALUES ('1', '1', '10', '4');
INSERT INTO `usuarios_permisos` VALUES ('2', '1', '12', '4');
INSERT INTO `usuarios_permisos` VALUES ('3', '1', '11', '4');
INSERT INTO `usuarios_permisos` VALUES ('4', '1', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('5', '1', '91', '4');
INSERT INTO `usuarios_permisos` VALUES ('6', '1', '93', '4');
INSERT INTO `usuarios_permisos` VALUES ('7', '1', '92', '4');
INSERT INTO `usuarios_permisos` VALUES ('8', '1', '94', '4');
INSERT INTO `usuarios_permisos` VALUES ('9', '1', '38', '4');
INSERT INTO `usuarios_permisos` VALUES ('10', '1', '36', '4');
INSERT INTO `usuarios_permisos` VALUES ('11', '1', '21', '4');
INSERT INTO `usuarios_permisos` VALUES ('12', '1', '32', '4');
INSERT INTO `usuarios_permisos` VALUES ('13', '1', '64', '4');
INSERT INTO `usuarios_permisos` VALUES ('14', '1', '37', '4');
INSERT INTO `usuarios_permisos` VALUES ('15', '1', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('16', '1', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('17', '1', '43', '4');
INSERT INTO `usuarios_permisos` VALUES ('18', '1', '108', '4');
INSERT INTO `usuarios_permisos` VALUES ('19', '1', '109', '4');
INSERT INTO `usuarios_permisos` VALUES ('20', '1', '110', '4');
INSERT INTO `usuarios_permisos` VALUES ('21', '1', '9', '4');
INSERT INTO `usuarios_permisos` VALUES ('22', '1', '14', '4');
INSERT INTO `usuarios_permisos` VALUES ('23', '1', '35', '4');
INSERT INTO `usuarios_permisos` VALUES ('24', '1', '18', '4');
INSERT INTO `usuarios_permisos` VALUES ('25', '1', '17', '4');
INSERT INTO `usuarios_permisos` VALUES ('26', '1', '75', '4');
INSERT INTO `usuarios_permisos` VALUES ('27', '1', '76', '4');
INSERT INTO `usuarios_permisos` VALUES ('28', '1', '15', '4');
INSERT INTO `usuarios_permisos` VALUES ('29', '1', '50', '4');
INSERT INTO `usuarios_permisos` VALUES ('30', '1', '25', '4');
INSERT INTO `usuarios_permisos` VALUES ('31', '1', '34', '4');
INSERT INTO `usuarios_permisos` VALUES ('32', '1', '26', '4');
INSERT INTO `usuarios_permisos` VALUES ('33', '1', '23', '4');
INSERT INTO `usuarios_permisos` VALUES ('34', '1', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('35', '1', '28', '4');
INSERT INTO `usuarios_permisos` VALUES ('36', '1', '24', '4');
INSERT INTO `usuarios_permisos` VALUES ('37', '1', '29', '4');
INSERT INTO `usuarios_permisos` VALUES ('38', '1', '77', '4');
INSERT INTO `usuarios_permisos` VALUES ('39', '1', '59', '4');
INSERT INTO `usuarios_permisos` VALUES ('40', '1', '60', '4');
INSERT INTO `usuarios_permisos` VALUES ('41', '1', '51', '4');
INSERT INTO `usuarios_permisos` VALUES ('42', '1', '52', '4');
INSERT INTO `usuarios_permisos` VALUES ('43', '1', '48', '4');
INSERT INTO `usuarios_permisos` VALUES ('44', '1', '49', '4');
INSERT INTO `usuarios_permisos` VALUES ('45', '1', '30', '4');
INSERT INTO `usuarios_permisos` VALUES ('46', '1', '33', '4');
INSERT INTO `usuarios_permisos` VALUES ('47', '1', '27', '4');
INSERT INTO `usuarios_permisos` VALUES ('48', '1', '87', '4');
INSERT INTO `usuarios_permisos` VALUES ('49', '1', '88', '4');
INSERT INTO `usuarios_permisos` VALUES ('50', '1', '89', '4');
INSERT INTO `usuarios_permisos` VALUES ('51', '1', '86', '4');
INSERT INTO `usuarios_permisos` VALUES ('52', '1', '69', '4');
INSERT INTO `usuarios_permisos` VALUES ('53', '1', '72', '4');
INSERT INTO `usuarios_permisos` VALUES ('54', '1', '8', '4');
INSERT INTO `usuarios_permisos` VALUES ('55', '1', '16', '4');
INSERT INTO `usuarios_permisos` VALUES ('56', '1', '47', '4');
INSERT INTO `usuarios_permisos` VALUES ('57', '1', '44', '4');
INSERT INTO `usuarios_permisos` VALUES ('58', '1', '45', '4');
INSERT INTO `usuarios_permisos` VALUES ('59', '1', '46', '4');
INSERT INTO `usuarios_permisos` VALUES ('60', '1', '56', '4');
INSERT INTO `usuarios_permisos` VALUES ('61', '1', '57', '4');
INSERT INTO `usuarios_permisos` VALUES ('62', '1', '58', '4');
INSERT INTO `usuarios_permisos` VALUES ('63', '1', '54', '4');
INSERT INTO `usuarios_permisos` VALUES ('64', '1', '53', '4');
INSERT INTO `usuarios_permisos` VALUES ('65', '1', '55', '4');
INSERT INTO `usuarios_permisos` VALUES ('66', '1', '78', '4');
INSERT INTO `usuarios_permisos` VALUES ('67', '1', '79', '4');
INSERT INTO `usuarios_permisos` VALUES ('68', '1', '40', '4');
INSERT INTO `usuarios_permisos` VALUES ('69', '1', '42', '4');
INSERT INTO `usuarios_permisos` VALUES ('70', '1', '39', '4');
INSERT INTO `usuarios_permisos` VALUES ('71', '1', '41', '4');
INSERT INTO `usuarios_permisos` VALUES ('72', '1', '61', '4');
INSERT INTO `usuarios_permisos` VALUES ('73', '1', '62', '4');
INSERT INTO `usuarios_permisos` VALUES ('74', '1', '63', '4');
INSERT INTO `usuarios_permisos` VALUES ('75', '1', '81', '4');
INSERT INTO `usuarios_permisos` VALUES ('76', '1', '80', '4');
INSERT INTO `usuarios_permisos` VALUES ('77', '1', '67', '4');
INSERT INTO `usuarios_permisos` VALUES ('78', '1', '73', '4');
INSERT INTO `usuarios_permisos` VALUES ('79', '1', '66', '4');
INSERT INTO `usuarios_permisos` VALUES ('80', '1', '70', '4');
INSERT INTO `usuarios_permisos` VALUES ('81', '1', '74', '4');
INSERT INTO `usuarios_permisos` VALUES ('82', '1', '71', '4');
INSERT INTO `usuarios_permisos` VALUES ('83', '1', '82', '4');
INSERT INTO `usuarios_permisos` VALUES ('84', '1', '90', '4');
INSERT INTO `usuarios_permisos` VALUES ('85', '1', '103', '4');
INSERT INTO `usuarios_permisos` VALUES ('86', '1', '85', '4');
INSERT INTO `usuarios_permisos` VALUES ('87', '1', '107', '4');
INSERT INTO `usuarios_permisos` VALUES ('88', '1', '104', '4');
INSERT INTO `usuarios_permisos` VALUES ('89', '1', '84', '4');
INSERT INTO `usuarios_permisos` VALUES ('90', '1', '106', '4');
INSERT INTO `usuarios_permisos` VALUES ('91', '1', '99', '4');
INSERT INTO `usuarios_permisos` VALUES ('92', '1', '100', '4');
INSERT INTO `usuarios_permisos` VALUES ('93', '1', '101', '4');
INSERT INTO `usuarios_permisos` VALUES ('94', '1', '105', '4');
INSERT INTO `usuarios_permisos` VALUES ('95', '1', '96', '4');
INSERT INTO `usuarios_permisos` VALUES ('96', '1', '98', '4');
INSERT INTO `usuarios_permisos` VALUES ('97', '1', '102', '4');
INSERT INTO `usuarios_permisos` VALUES ('98', '1', '83', '4');
INSERT INTO `usuarios_permisos` VALUES ('99', '1', '95', '4');
INSERT INTO `usuarios_permisos` VALUES ('100', '1', '97', '4');
INSERT INTO `usuarios_permisos` VALUES ('101', '1', '3', '4');
INSERT INTO `usuarios_permisos` VALUES ('102', '1', '6', '4');
INSERT INTO `usuarios_permisos` VALUES ('103', '1', '4', '4');
INSERT INTO `usuarios_permisos` VALUES ('104', '1', '7', '4');
INSERT INTO `usuarios_permisos` VALUES ('105', '1', '5', '4');
INSERT INTO `usuarios_permisos` VALUES ('106', '3', '3', '4');
INSERT INTO `usuarios_permisos` VALUES ('107', '3', '6', '4');
INSERT INTO `usuarios_permisos` VALUES ('108', '3', '4', '4');
INSERT INTO `usuarios_permisos` VALUES ('109', '3', '7', '4');
INSERT INTO `usuarios_permisos` VALUES ('110', '3', '5', '4');
INSERT INTO `usuarios_permisos` VALUES ('111', '5', '3', '4');
INSERT INTO `usuarios_permisos` VALUES ('112', '5', '6', '4');
INSERT INTO `usuarios_permisos` VALUES ('113', '5', '4', '4');
INSERT INTO `usuarios_permisos` VALUES ('114', '5', '7', '4');
INSERT INTO `usuarios_permisos` VALUES ('115', '5', '5', '4');
INSERT INTO `usuarios_permisos` VALUES ('116', '3', '10', '4');
INSERT INTO `usuarios_permisos` VALUES ('117', '3', '12', '4');
INSERT INTO `usuarios_permisos` VALUES ('118', '3', '11', '4');
INSERT INTO `usuarios_permisos` VALUES ('119', '3', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('120', '3', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('121', '3', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('125', '5', '91', '4');
INSERT INTO `usuarios_permisos` VALUES ('124', '3', '109', '4');
INSERT INTO `usuarios_permisos` VALUES ('126', '5', '93', '4');
INSERT INTO `usuarios_permisos` VALUES ('127', '5', '92', '4');
INSERT INTO `usuarios_permisos` VALUES ('128', '5', '94', '4');
INSERT INTO `usuarios_permisos` VALUES ('129', '5', '110', '4');
INSERT INTO `usuarios_permisos` VALUES ('130', '5', '90', '4');
INSERT INTO `usuarios_permisos` VALUES ('131', '5', '103', '4');
INSERT INTO `usuarios_permisos` VALUES ('132', '5', '85', '4');
INSERT INTO `usuarios_permisos` VALUES ('133', '5', '107', '4');
INSERT INTO `usuarios_permisos` VALUES ('134', '5', '104', '4');
INSERT INTO `usuarios_permisos` VALUES ('135', '5', '84', '4');
INSERT INTO `usuarios_permisos` VALUES ('136', '5', '106', '4');
INSERT INTO `usuarios_permisos` VALUES ('137', '5', '99', '4');
INSERT INTO `usuarios_permisos` VALUES ('138', '5', '100', '4');
INSERT INTO `usuarios_permisos` VALUES ('139', '5', '101', '4');
INSERT INTO `usuarios_permisos` VALUES ('140', '5', '105', '4');
INSERT INTO `usuarios_permisos` VALUES ('141', '5', '96', '4');
INSERT INTO `usuarios_permisos` VALUES ('142', '5', '98', '4');
INSERT INTO `usuarios_permisos` VALUES ('143', '5', '102', '4');
INSERT INTO `usuarios_permisos` VALUES ('144', '5', '83', '4');
INSERT INTO `usuarios_permisos` VALUES ('145', '5', '95', '4');
INSERT INTO `usuarios_permisos` VALUES ('146', '5', '97', '4');
INSERT INTO `usuarios_permisos` VALUES ('147', '1', '111', '4');
INSERT INTO `usuarios_permisos` VALUES ('148', '1', '112', '4');
INSERT INTO `usuarios_permisos` VALUES ('149', '1', '113', '4');
INSERT INTO `usuarios_permisos` VALUES ('150', '1', '114', '4');

-- ----------------------------
-- Table structure for usuarios_tipos
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_tipos`;
CREATE TABLE `usuarios_tipos` (
  `idTipoUsr` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipoUsr`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios_tipos
-- ----------------------------
INSERT INTO `usuarios_tipos` VALUES ('1', 'Administrador');
INSERT INTO `usuarios_tipos` VALUES ('2', 'Normal');

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
