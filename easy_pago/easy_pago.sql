/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : easy_pago

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2016-04-29 20:48:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for clientes_cell_power
-- ----------------------------
DROP TABLE IF EXISTS `clientes_cell_power`;
CREATE TABLE `clientes_cell_power` (
  `idVentas` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `puntodeventa` varchar(60) NOT NULL,
  `Monto` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `idPin` int(11) NOT NULL,
  `Mensaje` varchar(255) NOT NULL,
  PRIMARY KEY (`idVentas`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of clientes_cell_power
-- ----------------------------
INSERT INTO `clientes_cell_power` VALUES ('1', '1450881334821', '6', '2016-01-01', '0', 'El valor indicado no corresponde a ningun PIN');
INSERT INTO `clientes_cell_power` VALUES ('2', '14516529872', '6', '2016-01-01', '0', 'El valor indicado no corresponde a ningun PIN');
INSERT INTO `clientes_cell_power` VALUES ('3', '14519224623', '6', '2016-01-04', '0', 'El valor indicado no corresponde a ningun PIN');
INSERT INTO `clientes_cell_power` VALUES ('4', '14519226164', '6', '2016-01-04', '0', 'El valor indicado no corresponde a ningun PIN');
INSERT INTO `clientes_cell_power` VALUES ('5', '14519229769', '6', '2016-01-04', '0', 'El valor indicado no corresponde a ningun PIN');
INSERT INTO `clientes_cell_power` VALUES ('6', '145192358910', '5', '2016-01-04', '20035', '');
INSERT INTO `clientes_cell_power` VALUES ('7', '145194096214', '5', '2016-01-04', '20036', '');
INSERT INTO `clientes_cell_power` VALUES ('8', '145200848328', '5', '2016-01-05', '20037', '');
INSERT INTO `clientes_cell_power` VALUES ('9', '145200904130', '5', '2016-01-05', '20038', '');
INSERT INTO `clientes_cell_power` VALUES ('10', '145210053041', '10', '2016-01-06', '120005', '');
INSERT INTO `clientes_cell_power` VALUES ('11', '145210208943', '5', '2016-01-06', '20039', '');
INSERT INTO `clientes_cell_power` VALUES ('12', '145238841659', '5', '2016-01-09', '20040', '');
INSERT INTO `clientes_cell_power` VALUES ('13', '145296967382', '5', '2016-01-16', '20041', '');
INSERT INTO `clientes_cell_power` VALUES ('14', '145314219590', '5', '2016-01-18', '20042', '');
INSERT INTO `clientes_cell_power` VALUES ('15', '145315499693', '5', '2016-01-18', '20043', '');
INSERT INTO `clientes_cell_power` VALUES ('16', '1453487886103', '5', '2016-01-22', '20044', '');
INSERT INTO `clientes_cell_power` VALUES ('17', '1453737945111', '5', '2016-01-25', '20045', '');
INSERT INTO `clientes_cell_power` VALUES ('18', '1453922815117', '10', '2016-01-27', '120006', '');
INSERT INTO `clientes_cell_power` VALUES ('19', '1454103157122', '5', '2016-01-29', '20046', '');
INSERT INTO `clientes_cell_power` VALUES ('20', '1454794710140', '5', '2016-02-06', '20047', '');
INSERT INTO `clientes_cell_power` VALUES ('21', '1455042215149', '5', '2016-02-09', '20048', '');
INSERT INTO `clientes_cell_power` VALUES ('22', '1455204622160', '5', '2016-02-11', '20049', '');
INSERT INTO `clientes_cell_power` VALUES ('23', '1455204751162', '5', '2016-02-11', '20050', '');
INSERT INTO `clientes_cell_power` VALUES ('24', '1455673528177', '5', '2016-02-16', '20051', '');
INSERT INTO `clientes_cell_power` VALUES ('25', '1455828248187', '5', '2016-02-18', '20052', '');

-- ----------------------------
-- Table structure for clientes_contactos
-- ----------------------------
DROP TABLE IF EXISTS `clientes_contactos`;
CREATE TABLE `clientes_contactos` (
  `idContacto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Fono` varchar(30) NOT NULL,
  `Estado` varchar(25) NOT NULL,
  `fcreacion` datetime NOT NULL,
  `GSM` varchar(500) NOT NULL,
  `idClienteMain` int(11) unsigned NOT NULL,
  `TipoContacto` varchar(30) NOT NULL,
  PRIMARY KEY (`idContacto`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of clientes_contactos
-- ----------------------------
INSERT INTO `clientes_contactos` VALUES ('20', '1', 'Curimil', '85313156', 'No Registrado', '2015-11-11 17:44:35', '', '0', 'Familiar');
INSERT INTO `clientes_contactos` VALUES ('15', '3', 'Marcelo Lopez1', '998215180', 'No Registrado', '2015-11-07 19:44:30', '', '0', 'Familiar');
INSERT INTO `clientes_contactos` VALUES ('19', '1', 'Carlos Valenzuela', '93462365', 'Registrado', '2015-11-11 17:44:20', 'ebw4S-klcf4:APA91bEkdF-CbhKIWTX6FO-MvYfr8Fld6W71eZyRGbU1b0nat5KSoAJeTIHNNILpqshZ4NyaVxh6NvxRK0bE2WoHas3eDP792ZVzIWSKsQ5zLpK0oesUa0KNvFx7u0vS8CiAyTJBXYvA', '3', 'Familiar');
INSERT INTO `clientes_contactos` VALUES ('17', '3', 'Carlos Melendes1', '51990002027', 'No Registrado', '2015-11-09 15:23:52', '', '0', 'Familiar');
INSERT INTO `clientes_contactos` VALUES ('21', '3', 'Victor Reyes Nuevo', '56955391914', 'No Registrado', '2015-11-15 22:22:50', '', '0', '');

-- ----------------------------
-- Table structure for clientes_estado
-- ----------------------------
DROP TABLE IF EXISTS `clientes_estado`;
CREATE TABLE `clientes_estado` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

-- ----------------------------
-- Records of clientes_estado
-- ----------------------------
INSERT INTO `clientes_estado` VALUES ('1', 'Activo');
INSERT INTO `clientes_estado` VALUES ('2', 'Inactivo');

-- ----------------------------
-- Table structure for clientes_listado
-- ----------------------------
DROP TABLE IF EXISTS `clientes_listado`;
CREATE TABLE `clientes_listado` (
  `idCliente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `idEstado` int(11) unsigned NOT NULL,
  `idTipo` int(11) unsigned NOT NULL,
  `email` varchar(120) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `fNacimiento` date NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `Fono1` varchar(15) NOT NULL,
  `Fono2` varchar(15) NOT NULL,
  `Departamento` varchar(180) NOT NULL,
  `Provincia` varchar(180) NOT NULL,
  `Distrito` varchar(180) NOT NULL,
  `unique_id` varchar(23) NOT NULL,
  `password` varchar(80) NOT NULL,
  `fcreacion` datetime NOT NULL,
  `factualizacion` datetime NOT NULL,
  `IMEI` varchar(120) NOT NULL,
  `GSM` varchar(500) NOT NULL,
  `Latitud` double NOT NULL,
  `Longitud` double NOT NULL,
  `dispositivo` varchar(120) NOT NULL,
  `Saldo` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=202 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of clientes_listado
-- ----------------------------
INSERT INTO `clientes_listado` VALUES ('1', '1', '1', '2', 'tenshi98@gmail.com', 'AAAZU Victor', '16029464-7', '0000-00-00', 'ghgg3', '1', '', 'Ancash', 'Huaraz', 'Huaraz', '560d46f8d975c4.04940934', '81dc9bdb52d04dc20036dbd8313ed055', '2015-10-01 14:45:12', '2015-11-18 00:00:00', '', 'dBxe0VR_Z5U:APA91bERm-pgvudULJSlg5fEttaFZOq8ZSAbkrpOnfUuMkZm6xmD9_zHEkgDuGX1srlxev6fGezFbpELf60EoojUj1Oro77eDyR7EFwR4-Z99DnN0_eYwV-eemF_KZPSABFHDC0Whe0o', '-12.1029536337589', '-77.0501674559969', 'android', '1980', '4');
INSERT INTO `clientes_listado` VALUES ('3', '1', '1', '2', 'carlos.valenzuela.silva@gmail.com', 'AAAZU N.Ph Carlos Valenzuela', '82476563', '1958-07-04', 'vevey 308', '93462365', '229556120', '0', '0', '', '561ec44eef3231.06040047', '81dc9bdb52d04dc20036dbd8313ed055', '2015-10-14 21:08:30', '2015-10-14 21:08:30', '', 'ef_UtTXWUU4:APA91bEU0U5Kc6sRoHVq8n-mtyvZ62hPO9LV1Xa49pxFYjU8XkzfXOegYpdF6zUtGtqhXI8sE1qHNGrqIHo2kSyP5QPt96luvgkfG805IR-Fk6Pc-xHFGL_3O0838TenQ404A6j2C6c-', '-12.1031', '-77.052', 'android', '885', '4');
INSERT INTO `clientes_listado` VALUES ('4', '1', '1', '1', 'cmelendez.1805@gmail.com', 'AAAZU N.Ph carlos melendez', '10197175', '1975-05-18', 'camino real 1121', '990002027', '4220351', '0', '0', '', '81dc9bdb52d04dc20036dbd', 'a31f9a75f223e9a1c912e5c4e0c5cf14', '2015-10-15 17:35:54', '2015-10-15 17:35:54', '', 'd5t1iDoYg9A:APA91bHcxsVbRRqtvDYgu1RLYaKGKyIHkGVA39iANMOZK4_OEha_itMPp7H3NFdMpMKmHwstM0i1ZKY1KmNPiHoi--AyzUXj42wdSUi8djGR6A9o19ykB2kZgOSRqY8znev-P8AF35BG', '-12.1031', '-77.052', 'android', '90', '4');
INSERT INTO `clientes_listado` VALUES ('5', '1', '1', '2', 'mlopez@gmail.com', 'AAAZU N. Ph Marcelo', '81147221', '0000-00-00', 'camino real 1121', '', '', '0', '0', '', '56265b5cee2de4.49163201', '81dc9bdb52d04dc20036dbd8313ed055', '2015-10-20 15:18:52', '2015-10-20 15:18:52', '', '', '-12.1031', '-77.052', '', '75', '4');
INSERT INTO `clientes_listado` VALUES ('7', '1', '1', '2', 'arones_13@hotmail.com', 'ALCIDES ARONES FLORES', '100969743', '1973-04-13', 'Barlovento 130 Stand 15 surco', '2718571', '998455049', 'Lima', 'Lima', 'Santiago De Surco', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-16 17:37:03', '2016-02-20 00:00:00', '', 'eQ21PJack28:APA91bElDC5LyR8Vopp8S6aWpxtE1IfARvalS6n0fiff69eu-rN8U7WuLGF9HUevAXu7BOWrp4lIrWBs9HVwsB1eUhG6pqMWaCPnIq5I6dK004bCXrsUl1kKzjPwZYrNkT9UPT0ksnD2', '0', '0', 'android', '170', '4');
INSERT INTO `clientes_listado` VALUES ('8', '1', '1', '2', '', 'YESSENIA FLOR CHAVEZ YARANGA', '47073892', '0000-00-00', 'Calle Chavin 258, Distrito Santa Anita , Lima', '', '931142236', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-16 17:37:05', '2015-12-16 17:37:11', '', '', '0', '0', '', '195', '4');
INSERT INTO `clientes_listado` VALUES ('9', '1', '1', '2', '', 'AAAZU N. Ph Evelyn', '85977865', '1957-12-05', 'Curico 88', '4220351', '75576436', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-16 17:41:29', '2015-12-16 17:41:29', '', '', '0', '0', '', '300', '4');
INSERT INTO `clientes_listado` VALUES ('70', '1', '1', '1', 'EJEMPLO@GMAIL.COM', 'AAAZU N. Ph EJEMPLO', '12345678', '0000-00-00', 'Camino real', '', '', 'Lima', 'Lima', 'San Isidro', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-12 19:31:22', '2016-01-12 19:31:22', '', 'cUAISF2FHoM:APA91bFJPG0PbbJHTubY4894G9psp7S_1olv4ksvfIEATzaF-1b782vjD2IET1O31Kfa06XXUpfSBz2GIyKvARJ7SNk0kbkcqQiILUNjbUlzRU0dgMgtlSwykA_0nIKfwLeL2YvKsHak', '0', '0', 'android', '120', '19');
INSERT INTO `clientes_listado` VALUES ('72', '1', '1', '1', 'rivasnaider@hotmail.com', 'Juan Jose Rivas Sousa', '10741455', '0000-00-00', 'Av. Alfredo Mendiola 1971, SMP', '5567598', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-14 01:29:39', '2016-01-14 01:29:39', '', '', '0', '0', '', '200', '8');
INSERT INTO `clientes_listado` VALUES ('12', '1', '1', '1', '', 'JHONY ALBERTO GOMEZ LLANCA', '44968341', '1988-02-01', 'mz. M; Lote 27; Huytapallana, los olivos', '', '962234834', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-19 15:07:12', '2015-12-19 15:07:12', '', '', '0', '0', '', '200', '8');
INSERT INTO `clientes_listado` VALUES ('13', '1', '1', '1', '', 'MARITZA ROBLES MUÑOZ', '08490241', '0000-00-00', 'centro comercial ascay, tienda 14 Los Olivos', '', '991637243', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-19 15:49:28', '2015-12-19 15:49:28', '', '', '0', '0', '', '200', '8');
INSERT INTO `clientes_listado` VALUES ('78', '1', '1', '1', 'cielito_15_20@hotmail.es', 'Victor Miguel sayan Melendez', '22962299', '0000-00-00', 'Av. Raymondy 752, Leoncio Prado', '', '989333404', '', '', '', '', 'aee92f16efd522b9326c25cc3237ac15', '2016-01-14 21:38:55', '2016-01-14 21:38:55', '', '', '0', '0', '', '190', '19');
INSERT INTO `clientes_listado` VALUES ('22', '1', '1', '1', 'emapresupuestos@hotmail.com', 'ROSA FLOR CARHUAS INCA', '09429685', '0000-00-00', 'AV. JUAN VELAZCO ALVARADO 375, CERCADO', '', '962619924', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-29 20:09:03', '2015-12-29 20:09:03', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('16', '1', '1', '1', 'Royraul_chaca@hotmail.com', 'ROY RAUL CHACA SANCHEZ', '43615698', '0000-00-00', 'Jr. Los planetas mz w, lote 6, asociacion Fortaleza, Ate Vit', '3512685', '963638803', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-24 15:30:29', '2015-12-24 15:30:29', '', 'eVqI8qBa0To:APA91bExRXxIq5V1dju7KPavtUAPlf2Uq06DApKK-pmYEM7n1AY3R6LGd5YLRzpV_pPx3oYqoqGDa9FysQdnoRZZesj8lRExtcKsGiMQIHKq1MubwhMboMjMmr2V4eLKawkc6vseS1lQ', '0', '0', 'android', '200', '4');
INSERT INTO `clientes_listado` VALUES ('17', '1', '1', '1', 'benito17712@hotmail.com', 'BENITO MURRUGARRA LEIVA', '44157490', '0000-00-00', 'Av. Revolución 1392, Comas', '4695128', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-29 18:29:12', '2015-12-29 18:29:12', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('19', '1', '1', '1', 'analucia_6dejulio@hotmail.com', 'LUCIA CASTILLO BARRERA VITE de YÁBAR', '10072984', '0000-00-00', 'ASOCIACIÓN BRISAS DEL NORTE Mz. D Lt. 7', '5209157', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-29 19:26:28', '2015-12-29 19:26:28', '', 'eIsBxb75Ng8:APA91bEzw-v-M8RG6qfIt3XF0zcWLkdlqiCA6dBgRc_9jRZ4u3BaZWdg4cpPGW16AL5oVTr0QBcSSpJDB0BaVJVKfyTAVIw7ItPrvq2vKboVlit612YJFzbe3dILI60c5UOUqDX3LZkD', '0', '0', 'android', '195', '4');
INSERT INTO `clientes_listado` VALUES ('20', '1', '2', '1', 'lalita231180@hotmail.com', 'GLADYS ESPEZUA SARAZU', '40718809', '0000-00-00', 'AV. BETANCOURT Mz. L13 Lt. 30, LOS OLIVOS', '', '974639955', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-29 19:47:25', '2015-12-29 19:47:25', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('21', '1', '1', '1', 'innovaciones_11mp@gmail.com', 'SUJEY CAYCAY FERNANDEZ', '41273160', '0000-00-00', 'URB. EL PINAR Mz. C1 Lt. 18', '957880703', '972926745', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-29 19:54:11', '2015-12-29 19:54:11', '', 'd5t1iDoYg9A:APA91bHcxsVbRRqtvDYgu1RLYaKGKyIHkGVA39iANMOZK4_OEha_itMPp7H3NFdMpMKmHwstM0i1ZKY1KmNPiHoi--AyzUXj42wdSUi8djGR6A9o19ykB2kZgOSRqY8znev-P8AF35BG', '0', '0', 'android', '200', '4');
INSERT INTO `clientes_listado` VALUES ('23', '1', '1', '1', 'payal34@hotmail.com', 'ERIKA ANCHARTE ALMEIDA', '45976705', '0000-00-00', 'AV. ALFREDO PALACIOS Mz. B Lt. 26, CALLAO', '4653292', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-29 22:36:38', '2015-12-29 22:36:38', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('24', '1', '1', '1', 'ricky14_ima@hotmail.com', 'JULIO CESAR HUINGO VASQUEZ', '44785039', '0000-00-00', 'AV. CARLOS EYZAGUIRRE, MERCADO CASUARINAS', '', '990090067', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-29 22:40:40', '2015-12-29 22:40:40', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('25', '1', '1', '1', 'multiserviciostobys@gmail.com', 'LUIS JAIME TERREROS SANCHEZ', '06837396', '0000-00-00', 'AV. BOLIVAR Mz. C Lt. 12 A ZONA D  C.P. TAMBO VIEJO, CIENEGU', '', '941601470', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-29 22:45:35', '2015-12-29 22:45:35', '', 'd_y84OPIF4Q:APA91bEPkaVGFYaDEbrg_Fb5e7-KMXaRX5jMeJhFK6DGQox9ViZBoH6eFv_pT4u75opHSsKh5jlJUqn1qfYq2P0vlTZhfyikArOwArZnmrT4_DKUjp2eNySc2VkCQBqIQXGjhYJjAJXG', '0', '0', 'android', '200', '4');
INSERT INTO `clientes_listado` VALUES ('26', '1', '2', '1', 'anabell_2015_39@hotmail.com', 'ANA MELVA ISIDRO PALOMINO de FIGUEROA', '10181182', '0000-00-00', 'AV. SN JUAN 680, URB. TUPAC AMARU, SAN LUIS', '', '977610153', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-29 22:48:37', '2015-12-29 22:48:37', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('27', '1', '2', '1', 'LIZEHTMACHUCACENTENO@HOTMAIL.COM', 'LIZETH MACHUCA CENTENO', '46731905', '0000-00-00', 'URB. CANTO GRANDE Mz. H1 Lt. 14, SAN JUAN DE LURIGANCHO', '3894329', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-29 22:51:47', '2015-12-29 22:51:47', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('28', '1', '1', '2', 'sanchezkelly@hotmail.com', 'KELLY SANCHEZ FERNANDEZ', '41825211', '0000-00-00', 'AV. MIGUEL IGLESIAS 749', '', '987485739', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-30 18:11:11', '2015-12-30 18:11:11', '', '', '0', '0', '', '185', '4');
INSERT INTO `clientes_listado` VALUES ('29', '1', '1', '1', 'minimarketjorito@gmail.com', 'weyder castañeda salas', '32970329', '0000-00-00', 'urb. villa club 3, zona comercial, tienda 4, Carabayllo ', '', '984724330', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2015-12-30 18:36:09', '2015-12-30 18:36:09', '', 'dJjAWm3Psyg:APA91bEIZBTij-iP3gGX1TKsbZK9TG667DlqbSLl5VpeNExjcdt-jWCMxgarFkuiXU_B35aCt8MY_4EeovMVZy5xSu1iDmk7rJohGoxlLPIReeexUpzhqp5x-JHygI0Ouq35wqO5boNc', '0', '0', 'android', '200', '4');
INSERT INTO `clientes_listado` VALUES ('32', '1', '1', '1', '', 'Richard Vicente ibarra rutti', '20078084', '1975-11-20', 'jr. leon pinelolo 299 urb. huaquillay 2da etapa - comas ', '', '962085770', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-06 23:19:45', '2016-01-06 23:19:45', '', '', '0', '0', '', '200', '13');
INSERT INTO `clientes_listado` VALUES ('35', '1', '1', '1', 'ronald.reategui.a@gmail.com', 'Ronald Reategui', '41009069', '0000-00-00', 'Jr. Revolución 506, Pucallpa, Coronel Portillo, Ucayali', '', '961023971', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-07 23:11:08', '2016-01-07 23:11:08', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('85', '1', '1', '1', 'skill_bits.14@hotmail.com', 'RICHARD VILCA ABRIANO', '77670316', '2016-01-14', 'Mz. A1 Lt. 8', '5061272', '988621652', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-15 20:17:29', '2016-01-15 20:17:29', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('75', '1', '1', '1', 'leninsac21@hotmail.com', 'DAYVIS LENIN SERRANO ROQUE 	', '930550011', '0000-00-00', 'Daniel Alcides carrion 310, Yanacancha- Pasco', '46483751', '930550011', '', '', '', '', '6f2d950b9f03ddc798b4db9f9855faaa', '2016-01-14 16:11:12', '2016-01-14 16:11:12', '', '', '0', '0', '', '195', '19');
INSERT INTO `clientes_listado` VALUES ('38', '1', '1', '1', 'snaider25@outlook.com', 'Jose Manuel Inga Fernandez', '42868767', '0000-00-00', 'Av. camino real Mz C lote 23 urb El eden- carabayllo', '4873752', '952226636', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-08 17:41:52', '2016-01-08 17:41:52', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('83', '1', '1', '1', 'Virgo.1969@live.com', 'Fabiana Llerena Ludeña', '09608759', '0000-00-00', 'Jr. Poseidón 323 MZ A32 Lote 29 Sagitario Surco', '', '986712785', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-15 19:30:10', '2016-01-15 19:30:10', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('80', '1', '1', '1', 'milagritos_06_10@hotmail.com', 'Carmen Milagros Catacora Balta', '46888335', '1991-10-06', 'Calle Ilo, 658-A, Moquegua ', '053507511', '999283032', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-15 13:58:38', '2016-01-15 13:58:38', '', '', '0', '0', '', '195', '20');
INSERT INTO `clientes_listado` VALUES ('79', '1', '1', '1', 'mariajesus142@hotmail.com', 'Pablo Cayro Cari', '29499911', '1966-01-29', 'URB. San José C - 9 , Umacollo, Arequipa', '054346507', '959093310', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-14 23:33:37', '2016-01-14 23:33:37', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('42', '1', '1', '1', 'yanet_2840love@hotmail.com', 'raquel yanet huancas camacho', '45535030', '1989-02-01', 'prog. de vivienda calle E Mz.N Lt.17 los pinos de carabayllo', '5472749', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-08 18:26:57', '2016-01-08 18:26:57', '', '', '0', '0', '', '195', '20');
INSERT INTO `clientes_listado` VALUES ('71', '1', '1', '1', '', 'Silvia Salazar Cordoba', '40187979', '0000-00-00', 'Mz. O1 Lt. 33 4ª Etapa, San Benito, Carabayllo', '', '948172480', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-13 22:36:28', '2016-01-13 22:36:28', '', '', '0', '0', '', '195', '14');
INSERT INTO `clientes_listado` VALUES ('103', '1', '1', '1', 'eliseomix1@hotmail.com', 'eliseo quispe sedano', '10398700', '0000-00-00', 'Av. La UnionMz.Q1 Lt 17 Moron , ChaclacayO  paradero girasol', '', '980486372', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-20 18:34:09', '2016-01-20 18:34:09', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('82', '1', '1', '1', 'maximoxtremo@hotmail.com', 'jonatan pacompia', '01324556', '0000-00-00', 'jr. villa del lago 104 a 1 cuadra del mercado laykakota pun', '', '959477682', '', '', '', '', 'cf481b8933d2add81700c031549a906d', '2016-01-15 15:06:58', '2016-01-15 15:06:58', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('46', '1', '2', '1', 'maria.jason1002@gmail.com', 'Maria Socorro Huañipe Musoline', '74212995', '0000-00-00', 'calle atahualpa 264- miseriche / loreto', '', '937579308', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-08 19:39:53', '2016-01-08 19:39:53', '', '', '0', '0', '', '0', '20');
INSERT INTO `clientes_listado` VALUES ('47', '1', '1', '1', 'el_3sconocido@hotmail.com', 'wildet hurancca huamani', '44078130', '0000-00-00', 'nuevo mercado central fedacel, block M6, puesto 1 y 2, Indep', '', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-08 22:18:32', '2016-01-08 22:18:32', '', '', '0', '0', '', '200', '8');
INSERT INTO `clientes_listado` VALUES ('48', '1', '1', '1', 'medina_0202@hotmail.com', 'Oscar Medina Villar', '40953786', '0000-00-00', 'jr. napolli 101, San Martin de porres', '', '987696968', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-08 23:05:52', '2016-01-08 23:05:52', '', '', '0', '0', '', '190', '8');
INSERT INTO `clientes_listado` VALUES ('50', '1', '1', '1', 'ELIZABETH.ALBURQUEQUE.SUNCION@gmail.com', 'ELIZABETH ALBURQUEQUE SUNCION	', '30495535', '0000-00-00', 'CALLE SEVILLA 125 A	', '', '991389753', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-11 16:38:10', '2016-01-11 16:38:10', '', '', '0', '0', '', '200', '19');
INSERT INTO `clientes_listado` VALUES ('77', '1', '1', '1', 'javiereduardo24@hotmail.com', 'Javier Guerrero Parado', '40018733', '0000-00-00', 'general san martin 102. Mz.E Lt2, los huertos de huachipa', '3711426', '', '', '', '', '', 'e1abf399228c435a328ba9b562100af5', '2016-01-14 17:31:52', '2016-01-14 17:31:52', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('84', '1', '2', '1', 'Martinjhon1@hotmail.com', 'Martín Izaguirre', '41368784', '0000-00-00', 'Pacasmayo mz. I lote 14 urb. Los jasminez , Callao', '', '946230908', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-15 20:02:36', '2016-01-15 20:02:36', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('53', '1', '1', '1', 'leom18_38@hotmail.com', 'leny omar ruiz amaya', '43636549', '0000-00-00', 'jr.cajamarca 596-cpm pakatnamu guadalupe', '', '944608370', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-11 17:52:51', '2016-01-11 17:52:51', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('54', '1', '2', '1', 'landeo_156@hotmail.com', 'ricardo landeo quesquen', '70235378', '0000-00-00', 'xalle trujillo #567/ chepen', '', '949972314', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-11 17:55:01', '2016-01-11 17:55:01', '', '', '0', '0', '', '0', '20');
INSERT INTO `clientes_listado` VALUES ('55', '1', '1', '1', 'atenciocalixto@gmail.com', 'Gabriel Atencio Calixto', '47344294', '0000-00-00', 'Carretera Central km 288 Colquijirca- tinyahuarco-pasco', '', '990119372', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-11 18:14:52', '2016-01-11 18:14:52', '', '', '0', '0', '', '195', '20');
INSERT INTO `clientes_listado` VALUES ('56', '1', '1', '1', 'maximocari@gmail.com', 'Maximo Cari Lluille', '42434735', '0000-00-00', 'Av. Tomas Valle Mz. 17 Lt. 5 Asoc. Los Portales de Fiori, Sn', '', '979533889', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-11 18:22:50', '2016-01-11 18:22:50', '', '', '0', '0', '', '200', '13');
INSERT INTO `clientes_listado` VALUES ('76', '1', '1', '1', 'mirano22@hotmail.com', 'Maribel Mirano Galos', '33411628', '0000-00-00', 'Mz. V1 Lt. 16 6ª Etapa Sn Benito, Carbayllo', '7195923', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-14 17:11:10', '2016-01-14 17:11:10', '', '', '0', '0', '', '95', '14');
INSERT INTO `clientes_listado` VALUES ('58', '1', '1', '1', 'claudia.aricoche@hotmail.com', 'uberlinda diaz sarmiento', '33640408', '0000-00-00', 'jr. augusto b. leguia #244', '', '953960764', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-11 19:33:51', '2016-01-11 19:33:51', '', '', '0', '0', '', '95', '20');
INSERT INTO `clientes_listado` VALUES ('59', '1', '1', '1', 'jhonn13_02_yarock@hotmail.com', 'Jhonn Alex Yarleque Rosas', '44340822', '1987-02-13', 'calle bolivar 426, sechura, piura', '', '965607387', 'Piura', 'Seleccione una Provincia', 'Seleccionar un Distrito', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-11 19:49:51', '2016-01-15 00:00:00', '', 'cV9yts3cvsM:APA91bGjPVIdcPQff5rYVvbe4dqDkF4O8KGVC55dj202i0k3Zb-cVWlnFh-LW9CzDytmc8bdo0T2E5YtbnC74-9STvOvCYJUlAuBc_PcTpbYmB7JaSTGDA9zX84omhSZWWu7etS9CeLX', '0', '0', 'android', '200', '20');
INSERT INTO `clientes_listado` VALUES ('60', '1', '1', '1', 'elizabeth_rv2007@hotmail.com', 'Elizabeht Rodriguez Vargas', '43530416', '0000-00-00', 'cc comercial fevacel  pabellon m ps 11 y 12', '', '965875420', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-11 20:44:30', '2016-01-11 20:44:30', '', '', '0', '0', '', '200', '8');
INSERT INTO `clientes_listado` VALUES ('88', '1', '1', '1', 'fanyalzamora07@hotmail.com', 'Fany Marbel Alzamora', '08737046', '0000-00-00', 'Jr. Leoncio Prado 278, San Miguel', '', '999235322', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-18 16:39:19', '2016-01-18 16:39:19', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('86', '1', '1', '1', '', 'vidal Suica', '09351257', '0000-00-00', 'Santa Anita 508, V. Marina, Chorrillos', '', '958135792', '', '', '', '', 'c26820b8a4c1b3c2aa868d6d57e14a79', '2016-01-16 17:07:47', '2016-01-16 17:07:47', '', '', '0', '0', '', '200', '19');
INSERT INTO `clientes_listado` VALUES ('87', '1', '1', '1', 'rsantamaria5@hotmail.com', 'Roxana Liz Santamaria Lock', '07494258', '1973-10-26', 'Calle Las Gravas Mz C Lt 19 Urb Las Begonias , Sn J de Lurig', '2860429', '949168643', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-16 23:34:20', '2016-01-16 23:34:20', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('65', '1', '1', '1', '', 'Fanny Perez Diaz', '18207175', '0000-00-00', 'Miguel Angel 220 URB. Friory, San Martin de Porras', '', '997668359', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-12 00:25:45', '2016-01-12 00:25:45', '', '', '0', '0', '', '200', '8');
INSERT INTO `clientes_listado` VALUES ('67', '1', '2', '1', 'cristomiamigoljbh@hotmail.com', 'LUIS JAVIER BARRETO HUARINGA', '44822162', '0000-00-00', 'jiron arabico 336 alt del mercado la cantuta de la av, gran ', '', '940249880', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-12 16:52:32', '2016-01-12 16:52:32', '', '', '0', '0', '', '0', '20');
INSERT INTO `clientes_listado` VALUES ('96', '1', '1', '1', 'evelyncita_pao@hotmail.com', 'Paola Evelyn Chara Coaquira', '41685285', '1983-02-06', 'av.porongoche 405- arequipa', '054465289', '989729943', '', '', '', '', '40975bf37747b01969933d4b6c8f31d5', '2016-01-18 20:32:14', '2016-01-18 20:32:14', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('69', '1', '1', '1', 'percy0501@hotmail.com', 'Percy Tintalla Tomaylla', '10650047', '0000-00-00', 'Jr. Echeñique 398, URB. Ciudad de Dios, San Juan de Luriganc', '', '992358890', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-12 19:20:48', '2016-01-12 19:20:48', '', '', '0', '0', '', '200', '21');
INSERT INTO `clientes_listado` VALUES ('89', '1', '1', '1', 'monica.64@hotmail.com', 'monica yañez', '25441701', '0000-00-00', 'Ayacucho 580, Callao', '', '944683203', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-18 16:44:32', '2016-01-18 16:44:32', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('90', '1', '1', '1', 'josmarcenteno@gmail.com', 'Martin Centeno Montes', '44868415', '0000-00-00', 'Av. Pacasmayo 4504, El Olivar, Callao', '', '992050512', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-18 16:50:07', '2016-01-18 16:50:07', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('91', '1', '1', '1', 'bodegalaesperanza2011@hotmail.com', 'Susana Ruiz Chang', '25785374', '0000-00-00', 'Av. Canada Mz. O Lt. 69, URB S. Juan Macias, Callao', '', '966719160', '', '', '', '', 'eaf3f984c453cc67c8ff9d1f57fc3386', '2016-01-18 16:54:38', '2016-01-18 16:54:38', '', '', '0', '0', '', '190', '20');
INSERT INTO `clientes_listado` VALUES ('92', '1', '1', '1', 'cyknus2@hotmail.com', 'Carlos Bernable', '43416872', '0000-00-00', 'Mz. C1 Lt. 47 URB Praderas Sta. Anita II, El Agustino', '', '997743856', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-18 17:00:00', '2016-01-18 17:00:00', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('93', '1', '1', '1', 'fiestilandiashow@hotmail.com', 'Cristian Quijana', '45885511', '0000-00-00', 'jr.arica 162 - Chosica - Lurigancho', '', '945896381', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-18 17:18:27', '2016-01-18 17:18:27', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('112', '1', '1', '1', 'huallitha_ah@hotmail.com', 'THARSILA HUAYNAPOMAS', '46171716', '1989-08-24', 'Mz J  Lt.  01 AA.HH. CASA HUERTA LA CAMPIÑA SEC. A', '017277815', '999607332', '', '', '', '', 'b9d487a30398d42ecff55c228ed5652b', '2016-01-21 18:08:00', '2016-01-21 18:08:00', '', '', '0', '0', '', '100', '4');
INSERT INTO `clientes_listado` VALUES ('95', '1', '1', '1', '', 'Marilu Cochas', '19863278', '0000-00-00', 'av. condorcanqui mz. U, lote 12, Urb. Santo domingo, Carabay', '5278305', '955451556', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-18 17:51:42', '2016-01-18 17:51:42', '', '', '0', '0', '', '200', '18');
INSERT INTO `clientes_listado` VALUES ('97', '1', '1', '1', 'L_b_roman@hotmail.com', 'Lourdes Blanca Roman Fernandez', '10451000', '0000-00-00', 'Virgen de las mercedes Mz. A2. Lote 54, Urb. San Diego, San ', '6777749', '989808172', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-19 16:45:26', '2016-01-19 16:45:26', '', 'cxUbMBE9Y70:APA91bGm_dDJmKcQW1JyR34cdjIcCSibGuTxLuByH7Bx3sCa6bE4cBqjNeWQ3j-zwsleFWugJRweoXUHNM0i6tM5DAguUt6L6f2WcOjbGW5VHaHboAAsNhkmCa80BrE2wWo0mSmNj7Gm', '0', '0', 'android', '190', '18');
INSERT INTO `clientes_listado` VALUES ('98', '1', '1', '1', 'foquita_deamor18@hotmail.com', 'viana perez olivos', '44564862', '0000-00-00', 'av. Lindo 216, Pucara Jaen Cajamarca DEP CAJAMARCA, PROV JAE', '', '962615588', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-19 17:43:59', '2016-01-19 17:43:59', '', '', '0', '0', '', '200', '19');
INSERT INTO `clientes_listado` VALUES ('99', '1', '1', '1', 'jacky719824@gmail.com', 'Jacqueline Milán', '20669320', '0000-00-00', 'Jr. Perú 156, Carabayllo', '', '937541400', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-19 20:55:42', '2016-01-19 20:55:42', '', '', '0', '0', '', '195', '4');
INSERT INTO `clientes_listado` VALUES ('100', '1', '1', '1', 'stefanyramosh@yahoo.es', 'Estefanía Ramos Hidalgo', '10401999', '0000-00-00', 'Mz C Lt. 1, Villa Caudivilla, Carabayllo', '7928954', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-19 21:15:47', '2016-01-19 21:15:47', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('101', '1', '1', '1', 'idelgado@cacsanjose.com', 'FANNY ULLOA', '44866354', '0000-00-00', 'bolivar 16 Cartavio, Santiago de Cao ref. al costado del par', '', '979849732', '', '', '', '', 'bb836c01cdc9120a9c984c525e4b1a4a', '2016-01-20 15:27:24', '2016-01-20 15:27:24', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('102', '1', '1', '1', 'marcam_zero@hotmail.com', 'Mario Campos Vidal ', '08275773', '0000-00-00', 'Jr. Castilla 914/ barranca', '', '981012573', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-20 16:38:24', '2016-01-20 16:38:24', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('104', '1', '1', '1', 'carlos.aparcana.diaz@gmail.com', 'Carlos Aparcana Diaz', '21527878', '0000-00-00', 'Urb. La Palma  J-42 Ica', '056232381', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-20 18:42:21', '2016-01-20 18:42:21', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('105', '1', '1', '1', 'CAMIRP11@HOTMAIL.COM', 'CARMEN RUBIÑOS PEREZ', '40663971', '0000-00-00', 'AV SAN PABLO 1035 B - LA VICTORIA LIMA', '', '997368560', 'Lima', 'Lima', 'La Victoria', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-20 19:47:40', '2016-01-25 00:00:00', '', 'dnrS0RtIeKA:APA91bHv1kzvXlqePwidSet4T-fsJSLevuBcD0DnC57lTRKYL6W0mSXyNAWHJlFF97HTySi5DqRb8wy6Oy0U2sdRK1xko1zN8OiSjGrqhGohyU9xMQ72BGFssxuCa84IUtP0ke9aPLuR', '0', '0', 'android', '195', '19');
INSERT INTO `clientes_listado` VALUES ('107', '1', '1', '1', 'paulfernandez2051@hotmail.com', 'Paul Fernandez Lagos', '10666905', '0000-00-00', 'Av. Canto Grande 3800, SJLurigancho', '', '2209043', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-20 23:23:41', '2016-01-20 23:23:41', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('108', '1', '1', '1', 'juanitarosa68@gmail.com', 'Juana Mendoza', '09554490', '0000-00-00', 'Jr. Leoncio Prado Nº 508 Provincia San Marcos Dep. Cajamarca', '', '995757911', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-20 23:37:01', '2016-01-20 23:37:01', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('109', '1', '1', '1', 'enma_93_08@hotmail.com', 'ENMA FERNANDEZ MUÑOZ', '47456612', '0000-00-00', 'JR: SAN MARTIN CUADRA 9 NUEVA CAJAMARCA ref costado mercado ', '', '966804357', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-21 14:50:00', '2016-01-21 14:50:00', '', '', '0', '0', '', '195', '20');
INSERT INTO `clientes_listado` VALUES ('110', '1', '1', '1', 'paramedic129@hotmail.com', 'angela lorena arriaga cruz', '09531941', '0000-00-00', 'Calle Andromeda 796-, Chorrillos / ALT CUADRA 5 Y 6 DE MATEL', '', '993574209', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-21 16:25:51', '2016-01-21 16:25:51', '', '', '0', '0', '', '195', '20');
INSERT INTO `clientes_listado` VALUES ('111', '1', '1', '1', 'bazar.libreria.montalvan@gmail.com', 'rosa samillan', '40219452', '0000-00-00', 'mantaro 108 pueblo joven san nicolas - dep.lambayeque- prov.', '', '981821476', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-21 17:39:55', '2016-01-21 17:39:55', '', '', '0', '0', '', '200', '19');
INSERT INTO `clientes_listado` VALUES ('113', '1', '1', '1', 'atmelohuaringa@outlook.com', 'ABELINA MELO HUARINGA', '40297375', '0000-00-00', 'coop. PARAISO MZ  A , Lt. 9 PACHACAMAC', '', '988299120', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-21 19:33:30', '2016-01-21 19:33:30', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('114', '1', '2', '1', 'ysamar.s.a@gmail.com', 'Yelena Samar', '46488011', '0000-00-00', 'Mz.H7 lote 12, LOS ROSALES Ancon/ POR EL COLEGIO CESAR VALLE', '', '955098212', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-21 19:35:29', '2016-01-21 19:35:29', '', '', '0', '0', '', '0', '20');
INSERT INTO `clientes_listado` VALUES ('115', '1', '2', '1', 'Tu.bebitha.dulce@hotmail.com', 'Emma madeleyne Soria ferro', '47605239', '0000-00-00', 'Jr. VilcabambaS-13B, PROV. La convención-Cusco DISTR SANTA A', '', '977133935', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-21 19:37:00', '2016-01-21 19:37:00', '', '', '0', '0', '', '0', '20');
INSERT INTO `clientes_listado` VALUES ('116', '1', '1', '1', 'vania1421chanta@gmail.com', 'vania olenka chanta arbildo', '74648088', '1996-01-13', 'Mz A lote 8 - 1° sector nuevo progreso VMT', '2576646', '964318402', '', '', '', '', '55b027f61dfc3e74e3d2adea567c5f37', '2016-01-21 22:12:43', '2016-01-21 22:12:43', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('117', '1', '1', '1', 'rosa_7844@live.com', 'rosa matilde camacho ruiz', '10682170', '0000-00-00', 'miraflores calle los claveles, DISTR Las lomas, Piura PROV P', '', '995548151', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-22 17:02:34', '2016-01-22 17:02:34', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('118', '1', '1', '1', 'lazaro_v_a@hotmail.com', 'Lazaro Segundo Vilchez Ascencio', '17430320', '0000-00-00', 'Juan Gil 400 Pueblo nuevo_ FerreñafeDEP. CHICLAYO  PROV:FERR', '', '976581601', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-22 17:47:30', '2016-01-22 17:47:30', '', '', '0', '0', '', '230', '19');
INSERT INTO `clientes_listado` VALUES ('119', '1', '1', '1', 'SEBAS_DIGITAL@HOTMAIL.COM', 'Julio Miguel ORDOÑEZ SOLORZANO', '42003380', '0000-00-00', 'eucaliptos 1146, Sta. Anita', '3629240', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-22 23:18:50', '2016-01-22 23:18:50', '', '', '0', '0', '', '185', '20');
INSERT INTO `clientes_listado` VALUES ('120', '1', '1', '1', 'michellegiron19@gmail.com', 'michelle giron', '73702844', '0000-00-00', 'Av. Nicolas de pierola Nº 1199, Cercado de Lima, A 2 CUADRAS', '', '971673143', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-25 19:35:59', '2016-01-25 19:35:59', '', '', '0', '0', '', '200', '19');
INSERT INTO `clientes_listado` VALUES ('121', '1', '1', '1', 'cleandro51@hotmail.com', 'carlos leandro', '40812007', '0000-00-00', 'AA HH. 28 de julio MZ. J Lt. 3 Campoy  SJL', '', '956115917', '', '', '', '', '9c05dcaba7b2c7f605076b0d73067469', '2016-01-25 19:55:08', '2016-01-25 19:55:08', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('122', '1', '1', '1', 'nivi33vs@gmail.com', 'Violeta salvatierra medina', '44534041', '0000-00-00', 'Av.ANGELICA GAMARRA 251/ los olivos', '', '980544396', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-27 20:41:31', '2016-01-27 20:41:31', '', '', '0', '0', '', '190', '20');
INSERT INTO `clientes_listado` VALUES ('124', '1', '1', '1', 'multiservicios.myl@outlook.com', 'leonardo cajusol valdera', '47122076', '0000-00-00', 'Mz B Lt 5 Urb Las Begonias de Sta Rosa II Etapa SM.P San Mar', '4845919', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-28 16:18:02', '2016-01-28 16:18:02', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('125', '1', '1', '1', 'ayde_0187@hotmail.com', 'Dina Chumbes Palomino', '44114657', '0000-00-00', 'AAHH 27 de marzo Mz Q Lt 6 SJL', '', '974146659', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-28 17:26:57', '2016-01-28 17:26:57', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('126', '1', '1', '1', 'nicautivo_2011@hotmail.com', 'rosa fiestas', '02849400', '0000-00-00', 'mz.a lt.9-b urb el alamo', '5741182', '943166791', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-28 18:54:01', '2016-01-28 18:54:01', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('163', '1', '1', '1', 'ruthicisneros@yahoo.com.mx', 'Ruth Isela Cisneros Chinchay', '09965996', '0000-00-00', 'AV. REVOLUCION 1168 INTERIOR 3 COLLIQUE', '', '954754029', '', '', '', '', '202447d5d44ce12531f7207cb33b6bf7', '2016-02-08 17:11:12', '2016-02-08 17:11:12', '', '', '0', '0', '', '200', '18');
INSERT INTO `clientes_listado` VALUES ('128', '1', '1', '1', 'mini_chasqui@hotmail.com', 'peregrina troncos abad', '06740936', '0000-00-00', 'av. chinchaysullo 402 tahuantinsuyo- independencia ref. cerc', '5261919', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-29 15:21:30', '2016-01-29 15:21:30', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('129', '1', '1', '1', '', 'ada peregrina galvez troncos ', '06755023', '0000-00-00', 'esquina av. proceres y av. portales mz e4 lLT.66 URB PUERTA ', '5423401', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-01-29 15:32:55', '2016-01-29 15:32:55', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('130', '1', '1', '1', '', 'NANCY IRMA CARLOS MENDOZA', '09985610', '0000-00-00', 'AV. REVOLUCIÓN 2949, COLLIQUE, 5TA ETAPA', '5583224', '993600099', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-01 16:15:00', '2016-02-01 16:15:00', '', '', '0', '0', '', '100', '18');
INSERT INTO `clientes_listado` VALUES ('131', '1', '1', '1', 'emit_jc@hotmail.com', 'EMIT MALPARTIDA ENCINA', '10395470', '0000-00-00', 'AV. REVOLUCION 2861 4TA ETAPA  ', '5584894', '957462991', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-01 16:34:16', '2016-02-01 16:34:16', '', '', '0', '0', '', '200', '18');
INSERT INTO `clientes_listado` VALUES ('134', '1', '1', '1', 'Pilar_301_22@hotmail.com', 'Santiago Velasque Yucra', '44729253', '0000-00-00', 'Sector 3 Grupo24 Mz. J Lt.17  villa el salvador ref. frente ', '', '949408517', '', '', '', '', 'd93591bdf7860e1e4ee2fca799911215', '2016-02-02 15:32:21', '2016-02-02 15:32:21', '', '', '0', '0', '', '90', '20');
INSERT INTO `clientes_listado` VALUES ('133', '1', '1', '1', 'luiscaiceldo@gmail.com', 'luis miguel caicedo morales', '43019553', '0000-00-00', 'Mz C Lt.16   AAHH ancieta alta El agustino ref. el ex cuarte', '', '986413021', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-02 15:02:46', '2016-02-02 15:02:46', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('135', '1', '1', '1', 'mavilibreriabazar@gmail.com', 'Massiel Chavez arroyo Mori', '46458347', '0000-00-00', 'Jr. Huaraz 1747 Int. 169A  Breña', '3320018', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-02 17:40:42', '2016-02-02 17:40:42', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('136', '1', '1', '1', 'anheli_scat@hotmail.com', 'ana ascate garcia', '47086996', '0000-00-00', 'Jr. Miguel grau 521 raul porras barrenechea.carabayllo 2 CUA', '', '976314838', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-02 19:40:21', '2016-02-02 19:40:21', '', '', '0', '0', '', '200', '19');
INSERT INTO `clientes_listado` VALUES ('137', '1', '1', '1', 'jakelin_margarita@hotmail.com', 'haydee quispe flores', '19940765', '0000-00-00', '\"mz b lote 17. Sta. Elena- Carabayllo KM 22 AV TUPACAMARU\"', '', '993960316', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-02 19:41:16', '2016-02-02 19:41:16', '', '', '0', '0', '', '200', '19');
INSERT INTO `clientes_listado` VALUES ('138', '1', '1', '1', 'correo@gmail.com', 'jhonny vasquez', '45353066', '0000-00-00', 'Av. Julio fernandez de la oliva mz Glt 02 lambayeque chiclay', '', '943275601', '', '', '', '', '9d7311ba459f9e45ed746755a32dcd11', '2016-02-03 18:11:54', '2016-02-03 18:11:54', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('139', '1', '1', '1', 'angelicaperezvillegas@hotmail.com', 'angelica perez villegas', '10350141', '0000-00-00', 'Av Las Lomas 1435 VIPOL MANGOMARCA SJL', '', '992159765', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-03 18:25:46', '2016-02-03 18:25:46', '', '', '0', '0', '', '200', '19');
INSERT INTO `clientes_listado` VALUES ('143', '1', '1', '1', 'mariareyes_28@hotmail.com', 'MARIA REYES BRAVO ', '16503048', '0000-00-00', 'URB Avientel MZ.  A - lt. 10 Chiclayo-Pimentel- LAMAYEQUE', '', '074208019', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-03 19:24:44', '2016-02-03 19:24:44', '', '', '0', '0', '', '200', '19');
INSERT INTO `clientes_listado` VALUES ('141', '1', '1', '1', 'Dagny_vasquez@hotmail.com', 'Dagny cindy Vasquez ycahuate', '45038472', '0000-00-00', 'Mz M Lt. 28 5ta etapa Musa/ alt av. Madre selva La Molina RE', '', '941762775', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-03 18:32:07', '2016-02-03 18:32:07', '', '', '0', '0', '', '185', '19');
INSERT INTO `clientes_listado` VALUES ('142', '1', '1', '1', 'annyemes@hotmail.com', 'cesar sono', '45762422', '0000-00-00', 'calle elvira garcia 599-a lambayeque-chiclayo', '', '956018548', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-03 18:41:07', '2016-02-03 18:41:07', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('144', '1', '1', '1', 'deand_net@hotmail.com', 'Dean Domingo Basteres Vega', '21136799', '0000-00-00', 'mercado productores -psje huancayo  puesto 33 santa anita ', '3540309', '990602293', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-03 20:05:59', '2016-02-03 20:05:59', '', '', '0', '0', '', '200', '18');
INSERT INTO `clientes_listado` VALUES ('145', '1', '1', '2', 'markstrada19@hotmail.com', 'Marcos Villafuerte', '41550688', '0000-00-00', 'calle 2 mz f lote 11', '4673457', '990029089', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-03 20:27:34', '2016-02-03 20:27:34', '', '', '0', '0', '', '190', '22');
INSERT INTO `clientes_listado` VALUES ('146', '1', '1', '2', 'Telecomunicacionesn@gmail.com', 'Norma chaupez coras', '46116531', '0000-00-00', 'Mercado súper march av. Hualas 2270 tienda 254', '2481474', '944525550', '', '', '', '', 'dc513ea4fbdaa7a14786ffdebc4ef64e', '2016-02-03 21:20:20', '2016-02-03 21:20:20', '', '', '0', '0', '', '200', '22');
INSERT INTO `clientes_listado` VALUES ('162', '1', '1', '2', 'wlorihuelab@gmail.com', 'Walter Lorenzo Orihuela Bailon', '43861689', '1986-08-10', 'Calle Aguas Verdes Mz C Lt 30', '931138208', '964821700', 'Loreto', 'Maynas', 'Punchana', '', '93573dae6d994fbc216f1ed5a4758f1f', '2016-02-08 16:37:33', '2016-02-17 00:00:00', '', 'd1DdkQCRfWI:APA91bHl-FlEUZ57tg2ErYL5KtuufmzP8NDF69R_3ZWW7vC9QddAFn8G0ITSUH4uxRLp5woWHXhX6kw0GXHn4qIVuI1-YN2G0JtOefQwyBS9sVEsu3O5PZ8A0zsoGy5d5-6lAVYZrcs1', '0', '0', 'android', '200', '4');
INSERT INTO `clientes_listado` VALUES ('147', '1', '1', '1', '', 'Juan Vertis Castro', '09173772', '0000-00-00', 'av. revolucion 533 collique', '5585058', '968259853', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-04 18:34:56', '2016-02-04 18:34:56', '', '', '0', '0', '', '200', '18');
INSERT INTO `clientes_listado` VALUES ('148', '1', '1', '1', 'bri2015_pat@outlook.com', 'Valeriana belinda peralta gomez', '02424643', '0000-00-00', '\"CALIFORNIA D-7  DISTRITO. paucarpata PROVINCIA: AREQUIPA DE', '', '951105099', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-04 18:37:36', '2016-02-04 18:37:36', '', '', '0', '0', '', '200', '19');
INSERT INTO `clientes_listado` VALUES ('149', '1', '1', '1', 'kathy10817@hotmail.com', 'Katherinne Morales Valentín', '46083049', '0000-00-00', 'Mz T  Lt. 21 urb. El Alamo - Callao Cercado', '5942399', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-04 19:43:29', '2016-02-04 19:43:29', '', '', '0', '0', '', '0', '20');
INSERT INTO `clientes_listado` VALUES ('150', '1', '1', '1', 'santacruz_nico@hotmail.com', 'Nicolas Anchay santa cruz', '40104148', '0000-00-00', 'Calle Los Pinos Mz. E2 Lt. 13 La Alameda del Norte, Pte Pied', '', '994462426', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-04 19:44:21', '2016-02-04 19:44:21', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('151', '1', '1', '2', 'servicioschugden@hotmail.com', 'Ricardo Chugden Zambrano', '42487329', '0000-00-00', 'Jr. Alfonso Ugarte 301 Cajamarca', '', '976074545', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-04 21:14:22', '2016-02-04 21:14:22', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('152', '1', '1', '1', 'manu_pachs@hotmail.com', 'manuel pachas mendoza', '10309858', '0000-00-00', 'jr. dinamarca 787 - nocheto sta. Anita', '3628496', '993342608', '', '', '', '', '60d785bf31685f4f3991477d6f3a6704', '2016-02-05 15:41:33', '2016-02-05 15:41:33', '', '', '0', '0', '', '200', '19');
INSERT INTO `clientes_listado` VALUES ('153', '1', '1', '1', 'el_papi_jean96@hotmail.com', 'jeancarlos timoteo trujillo', '77968042', '0000-00-00', 'El Alamo mz x lote 23, Callao REF. frente al colegio virgen ', '5752510', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-05 17:24:37', '2016-02-05 17:24:37', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('154', '1', '2', '1', '', 'JAZMIN BASTEDES VEGA', '40494921', '0000-00-00', 'Urb. Alameda Calle 16, ', '', '943712928', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-05 17:54:12', '2016-02-05 17:54:12', '', '', '0', '0', '', '200', '18');
INSERT INTO `clientes_listado` VALUES ('155', '1', '2', '1', 'gloria_oscanoa@hotmail.com', 'GLORIA VEGA OSCANOA', '21069149', '0000-00-00', 'Urb. inderbrando Mz. C, Lote 2', '3543808', '999027146', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-05 18:51:55', '2016-02-05 18:51:55', '', '', '0', '0', '', '200', '18');
INSERT INTO `clientes_listado` VALUES ('156', '1', '1', '1', 'elkoko2828@hotmail.com', 'alicia vasquez', '22293662', '0000-00-00', 'Calle independencia mz2 lt16, Tupac Amaru Inca ref. frente a', '956539774', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-05 19:54:08', '2016-02-05 19:54:08', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('157', '1', '1', '1', 'tejeda1509@hotmail.com', 'Sandra natividad centeno huaringa', '42060231', '0000-00-00', 'Av. Miguel grau mz ch lt 2 anexo 22 SJL', '', '986903337', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-05 19:56:42', '2016-02-05 19:56:42', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('158', '1', '1', '1', 'ysa_reyna@hotmail.com', 'Isabel Julia Reyna Sulca', '42695466', '0000-00-00', 'LA MOLINA PASAJE MAXIMINA ALVARES MZ B LT 5', '', '985986948', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-05 19:57:50', '2016-02-05 19:57:50', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('159', '1', '1', '1', 'vanessacosette@hotmail.com', 'VANESSA TOMAS RAMOS', '45916452', '0000-00-00', 'av. revolución 2624, collique', '', '957164452', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-06 14:43:38', '2016-02-06 14:43:38', '', '', '0', '0', '', '200', '18');
INSERT INTO `clientes_listado` VALUES ('160', '1', '1', '1', 'leslie41273@gmsil.com', 'Leslie Poma', '18133694', '0000-00-00', 'msnurlubslde 280', '', '969807295', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-06 17:01:35', '2016-02-06 17:01:35', '', '', '0', '0', '', '200', '19');
INSERT INTO `clientes_listado` VALUES ('161', '1', '1', '1', 'janethfabi28@hotmail.com', 'maria caceres oblitas', '08461765', '0000-00-00', 'av. angelica gamarra 344- el trebol los olivos', '', '997265453', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-06 17:16:48', '2016-02-06 17:16:48', '', '', '0', '0', '', '50', '20');
INSERT INTO `clientes_listado` VALUES ('170', '1', '1', '2', 'alfo9020@gmail.com', 'Alfonso Lopez Cotera', '40601586', '0000-00-00', 'Av Jose Carlos Mariategui N° 1651, Ate', '', '976313373', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-09 17:08:00', '2016-02-09 17:08:00', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('165', '1', '1', '1', 'BBS26131627@GMAIL.COM', 'EDGAR YON VALENTÍN CALIXPTO', '40453545', '0000-00-00', 'JR. JOSE SANTOS ATAHUALPA 557 URB EL TREBOL LOS OLIVOS 1ERA ', '', '986198241', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-09 15:22:08', '2016-02-09 15:22:08', '', '', '0', '0', '', '195', '18');
INSERT INTO `clientes_listado` VALUES ('166', '1', '1', '1', '', 'SARA DE SANTA CRUZ PEREGRINA', '04206665', '0000-00-00', 'Av. Mariano Condorcanqui mz. q, int. 1', '', '958868633', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-09 15:23:57', '2016-02-09 15:23:57', '', '', '0', '0', '', '200', '18');
INSERT INTO `clientes_listado` VALUES ('167', '1', '1', '2', 'delacruzm6@hotmail.com', 'moises de la cruz peceros', '10055061', '0000-00-00', 'Jr. Los Nogales 499-A, ', '', '986253621', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-09 15:25:37', '2016-02-09 15:25:37', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('168', '1', '1', '1', 'pariona1109@gmail.com', 'edgar pariona Quispe', '10048871', '0000-00-00', 'Coop. Mangomarca Mz. F Lt. 22, Santa Anita', '', '975562420', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-09 16:38:18', '2016-02-09 16:38:18', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('169', '1', '1', '1', '', 'PASTOR ENRIQUE CARRION RAMOS', '10377731', '0000-00-00', 'Av. Mariano Condorcanqui Mz. B2, lote 3, collique.', '', '988055949', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-09 16:46:01', '2016-02-09 16:46:01', '', '', '0', '0', '', '200', '18');
INSERT INTO `clientes_listado` VALUES ('171', '1', '1', '1', 'san2811@hotmail.com', 'santos gaytan pino', '10321527', '1975-11-28', 'Rafael orellano n° 112 comas REF. frente del mercado santa l', '5360605', '999073154', '', '', '', '', '0738069b244a1c43c83112b735140a16', '2016-02-09 17:53:02', '2016-02-09 17:53:02', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('172', '1', '1', '2', 'cecilia509075@gmail.com', 'SARA CECILIA ESPIRITU CHURAMPI', '42771549', '0000-00-00', 'AV. MARIA REICH MZ. C , LOTE  03 , AA. HH. PACHACAMAC  IV ET', '', '998575180', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-09 19:55:40', '2016-02-09 19:55:40', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('173', '1', '1', '1', 'claudcin@hotmail.com', 'claudia sanchez', '40263178', '0000-00-00', 'calle los pinos mz. N lote 3 pando IX etapa san miguel ref. ', '', '993761188', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-09 20:06:36', '2016-02-09 20:06:36', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('174', '1', '1', '1', 'carlos22_libra@hotmail.com', 'JUAN CARLOS CARDENAS FERNANDEZ', '80084939', '0000-00-00', 'prolongancion huamanga 799 la victoria ', '3231931', '953730578', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-09 20:32:08', '2016-02-09 20:32:08', '', '', '0', '0', '', '200', '19');
INSERT INTO `clientes_listado` VALUES ('175', '1', '1', '1', 'jhenypenaloza2014@Outlook. com', 'JHENY PEÑALOZA SOTOMAYOR', '10734745', '0000-00-00', 'Av. Venezuela 216-c, Puente Piedra', '', '960504735', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-10 15:38:45', '2016-02-10 15:38:45', '', '', '0', '0', '', '200', '18');
INSERT INTO `clientes_listado` VALUES ('176', '1', '1', '1', 'hcallem@gmail.com', 'Hector Martin Calle Moran', '46144778', '0000-00-00', 'Mz A Lote 02 Urb. Santa Rosa Sullana dep:piura prov:sullana ', '', '945773265', '', '', '', '', 'e567503425be50f117680484c2be498c', '2016-02-10 16:16:55', '2016-02-10 16:16:55', '', '', '0', '0', '', '200', '19');
INSERT INTO `clientes_listado` VALUES ('177', '1', '1', '2', 'erik_0_4@hotmail.com', 'erik paucar gamarra', '43113888', '0000-00-00', 'AV. San Miguel Mz a Lt 6', '', '967845121', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-10 18:54:15', '2016-02-10 18:54:15', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('178', '1', '1', '1', 'macky200585@gmail.com', 'Maria noelita Llapapasca molina', '18136966', '0000-00-00', ' Av. Los gorriones Mza. I lt 5B Chorrillos', '2481535', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-10 19:59:15', '2016-02-10 19:59:15', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('179', '1', '1', '1', 'Janethc_2015@hotmail.com', 'Janet Huaman cardenas', '44123124', '0000-00-00', '\"Plaza marquina 363  torres de limatambo San borja 2 TORRES ', '', '999020574', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-10 22:00:49', '2016-02-10 22:00:49', '', '', '0', '0', '', '200', '19');
INSERT INTO `clientes_listado` VALUES ('180', '1', '1', '2', 'rodolfo_ldg_5@hotmail.com', 'rodolfo calderom alarcon', '71714294', '0000-00-00', 'Av. marcelino torres 187, El agustino', '', '931642746', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-10 22:27:53', '2016-02-10 22:27:53', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('181', '1', '1', '2', 'victor_chuqui@hotmail.com', 'Ivan Chuquicaña fernandez', '09965283', '0000-00-00', 'Av. Revolución 1723 3era Coquille , COMAS', '', '989762491', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-10 22:32:18', '2016-02-10 22:32:18', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('182', '1', '1', '1', '', 'ELENA TRUJILLO ECHEVARRIA', '06912514', '0000-00-00', 'Av. Tupac Amaru 5491, urb. Huaquillay, Comas', '', '993508065', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-11 17:39:44', '2016-02-11 17:39:44', '', '', '0', '0', '', '200', '18');
INSERT INTO `clientes_listado` VALUES ('183', '1', '1', '1', 'rociolg18@yahoo.com', 'petronila ledezma gaytan', '41962639', '0000-00-00', 'frente a la av. 15 de junio laderas de chillon puente piedra', '', '93080678', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-11 19:57:46', '2016-02-11 19:57:46', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('189', '1', '1', '1', 'claudiainesvoces@gmail.com', 'KATTY RAMIREZ', '47167223', '0000-00-00', 'Jr. Los Mirtos 209 -  Santa Isabel  Carabayllo', '5442181', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-15 19:58:39', '2016-02-15 19:58:39', '', '', '0', '0', '', '100', '19');
INSERT INTO `clientes_listado` VALUES ('185', '1', '1', '1', 'erika_dpinedo@hotmail.com', 'erika lizet diaz pinedo', '47096942', '0000-00-00', 'jr. ilo 386, Cercado Lima ref. alcostado del mercado ilo', '3304958', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-12 16:25:11', '2016-02-12 16:25:11', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('186', '1', '1', '1', '', 'juan luis fernandez nina', '41549517', '0000-00-00', 'av. Andres avelino caceres 10A centro comercial  gratersa- d', '', '957741749', '', '', '', '', '41a60377ba920919939d83326ebee5a1', '2016-02-12 16:57:03', '2016-02-12 16:57:03', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('187', '1', '1', '1', 'markweb_2198@hotmail.com', 'juan camacho ESPINOZA', '45133491', '0000-00-00', 'mz. i lote 7 urb .santa ana los olvos BOTICA \"SALUD ES VIDA\"', '', '6554617', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-12 17:24:26', '2016-02-12 17:24:26', '', '', '0', '0', '', '200', '19');
INSERT INTO `clientes_listado` VALUES ('188', '1', '1', '2', 'jhinezhka_solorzanoch@hotmail.com', 'JHINEZHKA SOLORZANO CHAVEZ', '45818330', '0000-00-00', 'ASOC. LAS Flores de san pedro de carabayllo Mz B lote 5', '', '955336021', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-12 17:38:16', '2016-02-12 17:38:16', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('190', '1', '1', '1', 'rosario061056@hotmail.com', 'rosario ordoñez', '25438979', '0000-00-00', 'mz f5 lt18 -1 sector de angamos ventanlla REF paradero la ca', '5394905', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-15 20:07:09', '2016-02-15 20:07:09', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('191', '1', '1', '1', 'lo.loco_5@hotmail.com', 'Nancy Dina Lazarte Lozano', '8495015', '0000-00-00', 'Jr.Mercedes Gallondevilla, SMP', '5671387', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-16 16:45:51', '2016-02-16 16:45:51', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('192', '1', '1', '2', 'Vanessa30902@gmail.com', 'Vanessa noemi Sanchez vinces', '42197429', '0000-00-00', 'Mz \"J\" Lt\"25\" urb aeropuerto, Callao', '', '977412833', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-16 18:01:42', '2016-02-16 18:01:42', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('193', '1', '1', '2', 'christianechandia@gmail.com', 'christian exhandia neyra', '20563994', '0000-00-00', 'Jr. Huancavelica 3098 ', '', '947948869', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-16 18:46:46', '2016-02-16 18:46:46', '', '', '0', '0', '', '195', '4');
INSERT INTO `clientes_listado` VALUES ('194', '1', '1', '2', 'rosa.zanabria@gmail.com', 'ROSA ZANABRIA ACUÑA', '41468667', '0000-00-00', 'Autopista Ramiro Priale Km 8.5 Huachipa, Mz A Lt. 54, Grifo ', '', '975080756', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-16 18:57:05', '2016-02-16 18:57:05', '', '', '0', '0', '', '200', '4');
INSERT INTO `clientes_listado` VALUES ('195', '1', '1', '1', 'floryale2003@yahoo.es', 'gilberto oswaldo ponce tipismana', '41634638', '0000-00-00', 'Jr.Francisco Irazola 171-DISTR SATIPO PROVSatipo-DEPJunin', '', '938188885', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-16 20:13:23', '2016-02-16 20:13:23', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('196', '1', '1', '1', 'sofiatg2012@gmail.com', 'sofia torres guevara', '41703664', '0000-00-00', 'calle las orquidias 464 1 etapa urb rosa luz - puente piedra', '6737953', '', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-19 16:39:56', '2016-02-19 16:39:56', '', '', '0', '0', '', '200', '19');
INSERT INTO `clientes_listado` VALUES ('197', '1', '1', '1', 'momentum_data@hotmail.com', 'Elvis Colque', '29555403', '0000-00-00', 'Av. Brasilia 308 - Dist. Jacobo Hunter -Dep. Arequipa - Prov', '054440021', '959464815', '', '', '', '', 'c26820b8a4c1b3c2aa868d6d57e14a79', '2016-02-19 17:54:45', '2016-02-19 17:54:45', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('198', '1', '1', '1', 'esther_love_leo@hotmail.com', 'Esther Yolanda Vasquez Sandoval', '41539824', '0000-00-00', 'carretera Panamericana # 110-Marcavelica_Sullana_Piura Marca', '', '968922609', 'Piura', 'Sullana', 'Marcavelica', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-19 19:05:19', '2016-02-19 19:05:19', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('199', '1', '1', '1', 'jen_2210@hotmail.com', 'jenny huaman', '45245627', '0000-00-00', 'jr.angel valdez 257 B rimac / al frentedel cole maria parado', '', '997593168', '', '', '', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-19 19:53:10', '2016-02-19 19:53:10', '', '', '0', '0', '', '200', '20');
INSERT INTO `clientes_listado` VALUES ('200', '1', '1', '2', 'edupealo@gmail.com', 'Edwin pretel ', '10693150', '0000-00-00', 'Jr. Huancavelica 692, Cercado de Lima', '', '934602224', 'Lima', 'Lima', 'Lima', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-23 17:17:46', '2016-02-23 17:17:46', '', '', '0', '0', '', '200', '23');
INSERT INTO `clientes_listado` VALUES ('201', '1', '1', '2', '', 'gladys betty trujillo cabanillas', '10108068', '0000-00-00', 'av. San hilarion este 300', '', '949693484', 'Lima', 'Lima', 'San Juan De Lurigancho', '', '81dc9bdb52d04dc20036dbd8313ed055', '2016-02-23 17:46:28', '2016-02-23 17:46:28', '', '', '0', '0', '', '0', '23');

-- ----------------------------
-- Table structure for clientes_notificaciones
-- ----------------------------
DROP TABLE IF EXISTS `clientes_notificaciones`;
CREATE TABLE `clientes_notificaciones` (
  `idNotificacion` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idAlerta` bigint(20) unsigned NOT NULL,
  `idCliente` int(11) unsigned NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `idEstado` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `idTipoAlerta` int(11) unsigned NOT NULL,
  `idSubTipoAlerta` int(11) unsigned NOT NULL,
  `Fono` varchar(15) NOT NULL,
  `Texto` text NOT NULL,
  `Web` varchar(150) NOT NULL,
  PRIMARY KEY (`idNotificacion`)
) ENGINE=MyISAM AUTO_INCREMENT=242 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_notificaciones
-- ----------------------------
INSERT INTO `clientes_notificaciones` VALUES ('2', '1', '1', 'JOAQUIN ALBERTO VASQUEZ ha informado un accidente cerca', '2', '2015-01-12', '00:00:00', '1', '2', '123', '', 'www.google.cl');
INSERT INTO `clientes_notificaciones` VALUES ('3', '2', '1', 'JOAQUIN ALBERTO VASQUEZ ha informado un accidente cerca', '2', '2015-01-12', '00:00:00', '1', '3', '6566', 'JOAQUIN ALBERTO VASQUEZ ha informado un accidente cerca', '');
INSERT INTO `clientes_notificaciones` VALUES ('4', '3', '1', 'JOAQUIN ALBERTO VASQUEZ ha informado del robo de su vehiculo', '2', '2015-01-12', '00:00:00', '1', '4', '88825', 'JOAQUIN ALBERTO VASQUEZ ha informado del robo de su vehiculo', '');
INSERT INTO `clientes_notificaciones` VALUES ('5', '4', '1', 'Ha indicado que esta bien', '2', '0000-00-00', '00:00:00', '2', '6', '', 'Ha indicado que esta bien', 'www.google.cl');
INSERT INTO `clientes_notificaciones` VALUES ('6', '31', '2', 'Victor ', '1', '2015-10-30', '18:01:55', '1', '2', '', 'Victor ', '');
INSERT INTO `clientes_notificaciones` VALUES ('7', '31', '0', 'Victor ', '1', '2015-10-30', '18:01:55', '1', '2', '', 'Victor ', '');
INSERT INTO `clientes_notificaciones` VALUES ('8', '31', '0', 'Victor ', '1', '2015-10-30', '18:01:55', '1', '2', '', 'Victor ', '');
INSERT INTO `clientes_notificaciones` VALUES ('9', '32', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:57:50', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('10', '33', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:41', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('11', '34', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:44', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('12', '35', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:46', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('13', '36', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:46', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('14', '37', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:47', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('15', '38', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:47', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('16', '39', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:47', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('17', '40', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:47', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('18', '41', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:48', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('19', '42', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:48', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('20', '43', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:48', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('21', '44', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:48', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('22', '45', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:49', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('23', '46', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:49', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('24', '47', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:49', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('25', '48', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '19:58:49', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('26', '49', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:03:23', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('27', '50', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:08:36', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('28', '51', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:11:37', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('29', '52', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:14:17', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('30', '53', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:14:25', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('31', '54', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:14:31', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('32', '55', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:14:39', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('33', '56', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:18:27', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('34', '57', '2', 'Victorte ha solicitado tu ubicacion', '1', '2015-10-30', '20:18:35', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('35', '59', '1', 'Victor ha generado una alarma', '2', '2015-11-11', '17:45:35', '1', '1', '', 'Victor ha generado una alarma', '');
INSERT INTO `clientes_notificaciones` VALUES ('36', '60', '1', 'Victor ha indicado que esta bien', '2', '2015-11-11', '18:39:04', '2', '6', '', 'Victor ha indicado que esta bien', '');
INSERT INTO `clientes_notificaciones` VALUES ('37', '61', '1', 'Victorte ha solicitado tu ubicacion', '2', '2015-11-11', '18:52:25', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('38', '62', '1', 'Victor ha solicitado tu ubicacion', '2', '2015-11-11', '18:52:55', '1', '2', '', 'Victor ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('39', '63', '1', 'Victor ha indicado que llego a su destino', '2', '2015-11-11', '18:53:02', '1', '3', '', 'Victor ha indicado que llego a su destino', '');
INSERT INTO `clientes_notificaciones` VALUES ('40', '64', '1', 'Victor ha generado una alarma', '2', '2015-11-12', '20:01:20', '1', '1', '', 'Victor ha generado una alarma', '');
INSERT INTO `clientes_notificaciones` VALUES ('41', '65', '1', 'Victor ha generado una alarma', '2', '2015-11-12', '20:08:29', '1', '1', '1', 'Victor ha generado una alarma', '');
INSERT INTO `clientes_notificaciones` VALUES ('42', '66', '1', 'Victorte ha solicitado tu ubicacion', '2', '2015-11-12', '20:12:57', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('46', '70', '1', 'Victor ha enviado su ubicacion', '2', '2015-11-13', '16:25:34', '2', '8', '1', 'Victor ha enviado su ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('45', '69', '1', 'Victorte ha solicitado tu ubicacion', '2', '2015-11-12', '20:33:41', '3', '7', '', 'Victorte ha solicitado tu ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('47', '71', '1', 'Victor ha enviado su ubicacion', '2', '2015-11-13', '16:29:06', '2', '8', '1', 'Victor ha enviado su ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('48', '72', '1', 'Victor ha enviado su ubicacion', '2', '2015-11-13', '16:30:24', '2', '8', '1', 'Victor ha enviado su ubicacion', '');
INSERT INTO `clientes_notificaciones` VALUES ('49', '73', '1', 'Victor, Has recibido una recarga ', '2', '2015-11-24', '21:08:17', '5', '9', '', 'Victor, Has recibido una recarga ', '');
INSERT INTO `clientes_notificaciones` VALUES ('50', '74', '1', 'Victor, Has recibido una recarga ', '2', '2015-11-24', '21:08:46', '5', '9', '', 'Victor, Has recibido una recarga ', '');
INSERT INTO `clientes_notificaciones` VALUES ('51', '75', '1', 'Victor, Has recibido una recarga ', '2', '2015-11-25', '14:03:23', '5', '9', '', 'Victor, Has recibido una recarga ', '');
INSERT INTO `clientes_notificaciones` VALUES ('52', '76', '1', 'Victor, Has recibido una recarga de 10 Soles', '2', '2015-11-25', '18:06:56', '5', '9', '', 'Victor, Has recibido una recarga de 10 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('53', '77', '1', 'Victor, Has recibido una recarga de 15 Soles', '2', '2015-11-25', '18:07:47', '5', '9', '', 'Victor, Has recibido una recarga de 15 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('54', '78', '1', 'Victor, Has recibido una recarga de 60 Soles', '2', '2015-11-30', '14:58:41', '5', '9', '', 'Victor, Has recibido una recarga de 60 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('55', '79', '8', 'Yessenia Flor Chavez Yaranga, Has recibido una recarga de 200 Soles', '1', '2015-12-16', '16:31:35', '5', '9', '', 'Yessenia Flor Chavez Yaranga, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('56', '80', '9', 'Evelyn, Has recibido una recarga de 200 Soles', '1', '2015-12-16', '17:42:07', '5', '9', '', 'Evelyn, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('57', '81', '7', 'Alcides Arones Flores, Has recibido una recarga de 30 Soles', '2', '2015-12-16', '17:50:32', '5', '9', '', 'Alcides Arones Flores, Has recibido una recarga de 30 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('58', '82', '10', 'Evelyn1, Has recibido una recarga de 200 Soles', '1', '2015-12-16', '22:19:20', '5', '9', '', 'Evelyn1, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('59', '83', '8', 'Yessenia Flor Chavez Yaranga, Has recibido una recarga de 5 Soles', '1', '2015-12-16', '22:31:36', '5', '9', '', 'Yessenia Flor Chavez Yaranga, Has recibido una recarga de 5 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('60', '84', '11', 'marco villafuerte, Has recibido una recarga de 200 Soles', '1', '2015-12-18', '01:42:17', '5', '9', '', 'marco villafuerte, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('61', '85', '12', 'JHONY ALBERTO GOMEZ LLANCA, Has recibido una recarga de 200 Soles', '1', '2015-12-19', '15:09:26', '5', '9', '', 'JHONY ALBERTO GOMEZ LLANCA, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('62', '86', '13', 'MARITZA ROBLES MUÑOZ, Has recibido una recarga de 200 Soles', '1', '2015-12-19', '15:49:56', '5', '9', '', 'MARITZA ROBLES MUÑOZ, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('63', '87', '14', 'arturo concepción huete mandujano, Has recibido una recarga de 200 Soles', '1', '2015-12-19', '20:28:17', '5', '9', '', 'arturo concepción huete mandujano, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('64', '88', '14', 'arturo concepción huete mandujano, Has recibido una recarga de O Soles', '1', '2015-12-19', '20:47:41', '5', '9', '', 'arturo concepción huete mandujano, Has recibido una recarga de O Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('65', '89', '15', 'sarolaine Sharon Milla Tambra, Has recibido una recarga de 200 Soles', '1', '2015-12-21', '23:15:55', '5', '9', '', 'sarolaine Sharon Milla Tambra, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('66', '90', '16', 'Roy Raul Chaca Sanchez, Has recibido una recarga de 200 Soles', '1', '2015-12-24', '15:31:05', '5', '9', '', 'Roy Raul Chaca Sanchez, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('67', '17', '17', 'Benito Murrugarra Leiva, Has recibido una recarga de 200 Soles', '1', '2015-12-29', '18:41:44', '5', '9', '', 'Benito Murrugarra Leiva, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('68', '18', '18', 'Rosa Manco Navarro, Has recibido una recarga de 200 Soles', '1', '2015-12-29', '18:47:50', '5', '9', '', 'Rosa Manco Navarro, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('69', '19', '19', 'LUCIA CASTILLO BARRERA VITE de YÁBAR, Has recibido una recarga de 200 Soles', '2', '2015-12-29', '19:27:29', '5', '9', '', 'LUCIA CASTILLO BARRERA VITE de YÁBAR, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('70', '20', '20', 'GLADYS ESPEZUA SARAZU, Has recibido una recarga de 200 Soles', '1', '2015-12-29', '19:49:03', '5', '9', '', 'GLADYS ESPEZUA SARAZU, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('71', '21', '21', 'SUJEY CAYCAY FERNANDEZ, Has recibido una recarga de 200 Soles', '1', '2015-12-29', '19:55:33', '5', '9', '', 'SUJEY CAYCAY FERNANDEZ, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('72', '22', '22', 'ROSA FLOR CARHUAS INCA, Has recibido una recarga de 200 Soles', '1', '2015-12-29', '20:09:50', '5', '9', '', 'ROSA FLOR CARHUAS INCA, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('73', '23', '23', 'ERIKA ANCHARTE ALMEIDA, Has recibido una recarga de 200 Soles', '1', '2015-12-29', '22:37:19', '5', '9', '', 'ERIKA ANCHARTE ALMEIDA, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('74', '24', '24', 'JULIO CESAR HUINGO VASQUEZ, Has recibido una recarga de 200 Soles', '1', '2015-12-29', '22:41:31', '5', '9', '', 'JULIO CESAR HUINGO VASQUEZ, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('75', '25', '25', 'LUIS JAIME TERREROS SANCHEZ, Has recibido una recarga de 200 Soles', '1', '2015-12-29', '22:46:16', '5', '9', '', 'LUIS JAIME TERREROS SANCHEZ, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('76', '26', '26', 'ANA MELVA ISIDRO PALOMINO de FIGUEROA, Has recibido una recarga de 200 Soles', '1', '2015-12-29', '22:49:16', '5', '9', '', 'ANA MELVA ISIDRO PALOMINO de FIGUEROA, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('77', '27', '27', 'LIZETH MACHUCA CENTENO, Has recibido una recarga de 200 Soles', '1', '2015-12-29', '22:52:28', '5', '9', '', 'LIZETH MACHUCA CENTENO, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('78', '28', '28', 'KELLY SANCHEZ FERNANDEZ, Has recibido una recarga de 200 Soles', '1', '2015-12-30', '18:12:09', '5', '9', '', 'KELLY SANCHEZ FERNANDEZ, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('79', '29', '29', 'weyder castañeda salas, Has recibido una recarga de 200 Soles', '1', '2015-12-30', '18:36:52', '5', '9', '', 'weyder castañeda salas, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('80', '30', '29', 'weyder castañeda salas, Has recibido una recarga de 200 Soles', '1', '2015-12-30', '18:36:55', '5', '9', '', 'weyder castañeda salas, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('81', '31', '30', 'Richard Vicente ibarra rutti, Has recibido una recarga de 200 Soles', '1', '2016-01-06', '22:03:31', '5', '9', '', 'Richard Vicente ibarra rutti, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('82', '32', '31', 'pedro picapiedras, Has recibido una recarga de 100 Soles', '1', '2016-01-06', '22:51:26', '5', '9', '', 'pedro picapiedras, Has recibido una recarga de 100 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('83', '33', '32', 'Richard Vicente ibarra rutti, Has recibido una recarga de 200 Soles', '1', '2016-01-06', '23:20:19', '5', '9', '', 'Richard Vicente ibarra rutti, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('84', '34', '33', 'NEYDA NERIDA CAPCHA IPARRAGUIRRE, Has recibido una recarga de 200 Soles', '1', '2016-01-07', '01:04:24', '5', '9', '', 'NEYDA NERIDA CAPCHA IPARRAGUIRRE, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('85', '35', '34', 'Rosita Garcia Atanasio, Has recibido una recarga de 200 Soles', '1', '2016-01-07', '16:41:10', '5', '9', '', 'Rosita Garcia Atanasio, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('86', '36', '35', 'Ronald Reategui, Has recibido una recarga de 200 Soles', '1', '2016-01-07', '23:11:44', '5', '9', '', 'Ronald Reategui, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('87', '37', '36', 'Melissa Barrenechea, Has recibido una recarga de 200 Soles', '1', '2016-01-08', '16:29:42', '5', '9', '', 'Melissa Barrenechea, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('88', '38', '37', 'Rosa Piscoya Gomez, Has recibido una recarga de 200 Soles', '1', '2016-01-08', '17:17:23', '5', '9', '', 'Rosa Piscoya Gomez, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('89', '39', '37', 'Rosa Piscoya Gomez, Has recibido una recarga de 200 Soles', '1', '2016-01-08', '17:17:56', '5', '9', '', 'Rosa Piscoya Gomez, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('90', '40', '38', 'Jose Manuel Inga Fernandez, Has recibido una recarga de 200 Soles', '1', '2016-01-08', '17:42:13', '5', '9', '', 'Jose Manuel Inga Fernandez, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('91', '41', '47', 'wildet hurancca huamani, Has recibido una recarga de 200 Soles', '1', '2016-01-08', '22:20:11', '5', '9', '', 'wildet hurancca huamani, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('92', '42', '48', 'Oscar Medina Villar, Has recibido una recarga de 200 Soles', '1', '2016-01-08', '23:06:25', '5', '9', '', 'Oscar Medina Villar, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('93', '43', '45', 'Morales Ramos Jose, Has recibido una recarga de 200 Soles', '1', '2016-01-09', '01:13:33', '5', '9', '', 'Morales Ramos Jose, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('94', '44', '56', 'Maximo Cari Lluille, Has recibido una recarga de 200 Soles', '1', '2016-01-11', '18:23:23', '5', '9', '', 'Maximo Cari Lluille, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('95', '45', '42', 'raquel yanet huancas camacho, Has recibido una recarga de 200 Soles', '1', '2016-01-11', '20:17:17', '5', '9', '', 'raquel yanet huancas camacho, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('96', '46', '60', 'Elizabeht Rodriguez Vargas, Has recibido una recarga de 200 Soles', '1', '2016-01-11', '20:45:52', '5', '9', '', 'Elizabeht Rodriguez Vargas, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('97', '47', '61', 'GABRIEL PALOMINO JACHA	, Has recibido una recarga de 200 Soles', '1', '2016-01-11', '23:30:00', '5', '9', '', 'GABRIEL PALOMINO JACHA	, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('98', '48', '41', 'beatriz mendoza soto, Has recibido una recarga de 200 Soles', '1', '2016-01-11', '23:50:34', '5', '9', '', 'beatriz mendoza soto, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('99', '49', '65', 'Fanny Perez Diaz, Has recibido una recarga de 200 Soles', '1', '2016-01-12', '00:26:05', '5', '9', '', 'Fanny Perez Diaz, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('100', '50', '68', 'Elizabeht Espinoza Aponte, Has recibido una recarga de 200 Soles', '1', '2016-01-12', '18:16:31', '5', '9', '', 'Elizabeht Espinoza Aponte, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('101', '51', '43', 'edgar saldaña guevara, Has recibido una recarga de 200 Soles', '1', '2016-01-12', '19:04:54', '5', '9', '', 'edgar saldaña guevara, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('102', '52', '55', 'gabriel atencio calixto, Has recibido una recarga de 200 Soles', '1', '2016-01-12', '19:05:47', '5', '9', '', 'gabriel atencio calixto, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('103', '53', '69', 'Percy Tintalla Tomaylla, Has recibido una recarga de 200 Soles', '1', '2016-01-12', '19:21:24', '5', '9', '', 'Percy Tintalla Tomaylla, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('104', '54', '59', 'jhonn yarleque rosas, Has recibido una recarga de 200 Soles', '2', '2016-01-12', '19:24:18', '5', '9', '', 'jhonn yarleque rosas, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('105', '55', '50', 'ELIZABETH ALBURQUEQUE SUNCION	, Has recibido una recarga de 200 Soles', '1', '2016-01-12', '19:52:45', '5', '9', '', 'ELIZABETH ALBURQUEQUE SUNCION	, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('106', '56', '71', 'Silvia Salazar Cordoba, Has recibido una recarga de 200 Soles', '1', '2016-01-13', '22:36:48', '5', '9', '', 'Silvia Salazar Cordoba, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('107', '57', '72', 'Juan Jose Rivas Sousa, Has recibido una recarga de 200 Soles', '1', '2016-01-14', '01:30:06', '5', '9', '', 'Juan Jose Rivas Sousa, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('108', '58', '73', 'Paola Evelyn Chara Coaquira, Has recibido una recarga de 200 Soles', '1', '2016-01-14', '02:15:33', '5', '9', '', 'Paola Evelyn Chara Coaquira, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('109', '59', '75', 'DAYVIS LENIN SERRANO ROQUE 	, Has recibido una recarga de 200 Soles', '1', '2016-01-14', '16:12:12', '5', '9', '', 'DAYVIS LENIN SERRANO ROQUE 	, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('110', '60', '4', 'AAAZU N.Ph carlos melendez, Has recibido una recarga de 200 Soles', '2', '2016-01-14', '17:00:45', '5', '9', '', 'AAAZU N.Ph carlos melendez, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('111', '61', '70', 'AAAZU N. Ph EJEMPLO, Has recibido una recarga de 200 Soles', '1', '2016-01-14', '17:03:32', '5', '9', '', 'AAAZU N. Ph EJEMPLO, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('112', '62', '76', 'Maribel Mirano Galos, Has recibido una recarga de 100 Soles', '1', '2016-01-14', '17:12:59', '5', '9', '', 'Maribel Mirano Galos, Has recibido una recarga de 100 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('113', '63', '77', 'Javier Guerrero Parado, Has recibido una recarga de 200 Soles', '1', '2016-01-14', '17:59:34', '5', '9', '', 'Javier Guerrero Parado, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('114', '64', '66', 'RUBEN EDMUNDO ARIAS ARIAS,, Has recibido una recarga de 200 Soles', '1', '2016-01-14', '18:42:48', '5', '9', '', 'RUBEN EDMUNDO ARIAS ARIAS,, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('115', '65', '78', 'Victor Miguel sayan Melendez, Has recibido una recarga de 200 Soles', '1', '2016-01-14', '21:39:26', '5', '9', '', 'Victor Miguel sayan Melendez, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('116', '66', '79', 'Pablo Cayro Cari, Has recibido una recarga de 200 Soles', '1', '2016-01-14', '23:34:08', '5', '9', '', 'Pablo Cayro Cari, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('117', '67', '80', 'carmen milagros catacora balta, Has recibido una recarga de 200 Soles', '1', '2016-01-15', '13:59:05', '5', '9', '', 'carmen milagros catacora balta, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('118', '68', '53', 'leny omar ruiz amaya, Has recibido una recarga de 200 Soles', '1', '2016-01-15', '13:59:26', '5', '9', '', 'leny omar ruiz amaya, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('119', '69', '82', 'jonatan pacompia, Has recibido una recarga de 200 Soles', '1', '2016-01-15', '15:07:36', '5', '9', '', 'jonatan pacompia, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('120', '70', '81', 'Jimena Palomino, Has recibido una recarga de 200 Soles', '1', '2016-01-15', '17:56:45', '5', '9', '', 'Jimena Palomino, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('121', '71', '83', 'Fabiana Llerena Ludeña, Has recibido una recarga de 200 Soles', '1', '2016-01-15', '19:31:12', '5', '9', '', 'Fabiana Llerena Ludeña, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('122', '72', '84', 'Martín Izaguirre, Has recibido una recarga de 200 Soles', '1', '2016-01-15', '20:10:21', '5', '9', '', 'Martín Izaguirre, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('123', '73', '85', 'RICHARD VILCA ABRIANO, Has recibido una recarga de 200 Soles', '1', '2016-01-15', '20:18:00', '5', '9', '', 'RICHARD VILCA ABRIANO, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('124', '74', '85', 'RICHARD VILCA ABRIANO, Has recibido una recarga de 5 Soles', '1', '2016-01-15', '23:16:22', '5', '9', '', 'RICHARD VILCA ABRIANO, Has recibido una recarga de 5 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('125', '75', '86', 'vidal Suica, Has recibido una recarga de 200 Soles', '1', '2016-01-16', '17:08:16', '5', '9', '', 'vidal Suica, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('126', '76', '86', 'vidal Suica, Has recibido una recarga de 5 Soles', '1', '2016-01-16', '17:24:56', '5', '9', '', 'vidal Suica, Has recibido una recarga de 5 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('127', '77', '87', 'Roxana Santamaria Lock, Has recibido una recarga de 200 Soles', '1', '2016-01-16', '23:35:18', '5', '9', '', 'Roxana Santamaria Lock, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('128', '78', '88', 'Fany Marbel Alzamora, Has recibido una recarga de 200 Soles', '1', '2016-01-18', '16:39:48', '5', '9', '', 'Fany Marbel Alzamora, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('129', '79', '89', 'monica yañez, Has recibido una recarga de 200 Soles', '1', '2016-01-18', '16:45:20', '5', '9', '', 'monica yañez, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('130', '80', '90', 'Martin Centeno Montes, Has recibido una recarga de 200 Soles', '1', '2016-01-18', '16:50:35', '5', '9', '', 'Martin Centeno Montes, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('131', '81', '91', 'Susana Ruiz Chang, Has recibido una recarga de 200 Soles', '1', '2016-01-18', '16:55:26', '5', '9', '', 'Susana Ruiz Chang, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('132', '82', '92', 'Carlos Bernable, Has recibido una recarga de 200 Soles', '1', '2016-01-18', '17:00:23', '5', '9', '', 'Carlos Bernable, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('133', '83', '93', 'Cristian Quijana, Has recibido una recarga de 200 Soles', '1', '2016-01-18', '17:18:47', '5', '9', '', 'Cristian Quijana, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('134', '84', '94', 'Lili Ana Rodriguez, Has recibido una recarga de 200 Soles', '1', '2016-01-18', '17:25:38', '5', '9', '', 'Lili Ana Rodriguez, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('135', '85', '95', 'Marilu Cochas, Has recibido una recarga de 200 Soles', '1', '2016-01-18', '17:52:48', '5', '9', '', 'Marilu Cochas, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('136', '86', '96', 'Paola Evelyn Chara Coaquira, Has recibido una recarga de 200 Soles', '1', '2016-01-18', '20:32:36', '5', '9', '', 'Paola Evelyn Chara Coaquira, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('137', '87', '97', 'Lurdes Blanca Roman Fernandez, Has recibido una recarga de 200 Soles', '2', '2016-01-19', '16:46:06', '5', '9', '', 'Lurdes Blanca Roman Fernandez, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('138', '88', '98', 'viana perez olivos, Has recibido una recarga de 200 Soles', '1', '2016-01-19', '17:44:39', '5', '9', '', 'viana perez olivos, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('139', '89', '99', 'Jacqueline Milán, Has recibido una recarga de 200 Soles', '1', '2016-01-19', '20:56:04', '5', '9', '', 'Jacqueline Milán, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('140', '90', '100', 'Estefanía Ramos Hidalgo, Has recibido una recarga de 200 Soles', '1', '2016-01-19', '21:16:13', '5', '9', '', 'Estefanía Ramos Hidalgo, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('141', '91', '101', 'FANNY ULLOA, Has recibido una recarga de 200 Soles', '1', '2016-01-20', '15:27:45', '5', '9', '', 'FANNY ULLOA, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('142', '92', '102', 'Mario Campos Vidal , Has recibido una recarga de 200 Soles', '1', '2016-01-20', '16:38:52', '5', '9', '', 'Mario Campos Vidal , Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('143', '93', '103', 'eliseo quispe sedano, Has recibido una recarga de 200 Soles', '1', '2016-01-20', '18:34:23', '5', '9', '', 'eliseo quispe sedano, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('144', '94', '104', 'Carlos Aparcana Diaz, Has recibido una recarga de 200 Soles', '1', '2016-01-20', '18:42:42', '5', '9', '', 'Carlos Aparcana Diaz, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('145', '95', '105', 'CARMEN RUBIÑOS PEREZ , Has recibido una recarga de 200 Soles', '2', '2016-01-20', '19:48:03', '5', '9', '', 'CARMEN RUBIÑOS PEREZ , Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('146', '96', '106', 'Carmen Rubiños Perez, Has recibido una recarga de 200 Soles', '1', '2016-01-20', '21:45:47', '5', '9', '', 'Carmen Rubiños Perez, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('147', '97', '107', 'Paul Fernandez Lagos, Has recibido una recarga de 200 Soles', '1', '2016-01-20', '23:24:10', '5', '9', '', 'Paul Fernandez Lagos, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('148', '98', '108', 'Juana Mendoza, Has recibido una recarga de 200 Soles', '1', '2016-01-20', '23:37:56', '5', '9', '', 'Juana Mendoza, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('149', '99', '109', 'ENMA FERNANDEZ MUÑOZ, Has recibido una recarga de 200 Soles', '1', '2016-01-21', '14:50:35', '5', '9', '', 'ENMA FERNANDEZ MUÑOZ, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('150', '100', '110', 'angela lorena arriaga cruz, Has recibido una recarga de 200 Soles', '1', '2016-01-21', '16:26:08', '5', '9', '', 'angela lorena arriaga cruz, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('151', '101', '111', 'rosa samillan, Has recibido una recarga de 200 Soles', '1', '2016-01-21', '17:40:38', '5', '9', '', 'rosa samillan, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('152', '102', '112', 'THARSILA HUAYNAPOMAS, Has recibido una recarga de 100 Soles', '1', '2016-01-21', '18:08:49', '5', '9', '', 'THARSILA HUAYNAPOMAS, Has recibido una recarga de 100 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('153', '103', '113', 'ABELINA MELO HUARINGA, Has recibido una recarga de 200 Soles', '1', '2016-01-21', '20:41:48', '5', '9', '', 'ABELINA MELO HUARINGA, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('154', '104', '116', 'vania olenca chanta arbildo, Has recibido una recarga de 200 Soles', '1', '2016-01-21', '22:13:19', '5', '9', '', 'vania olenca chanta arbildo, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('155', '105', '117', 'rosa matilde camacho ruiz, Has recibido una recarga de 200 Soles', '1', '2016-01-22', '17:02:58', '5', '9', '', 'rosa matilde camacho ruiz, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('156', '106', '118', 'Lazaro Segundo Vilchez Ascencio, Has recibido una recarga de 230 Soles', '1', '2016-01-22', '17:48:32', '5', '9', '', 'Lazaro Segundo Vilchez Ascencio, Has recibido una recarga de 230 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('157', '107', '58', 'uberlinda diaz sarmiento, Has recibido una recarga de 100 Soles', '1', '2016-01-22', '23:03:23', '5', '9', '', 'uberlinda diaz sarmiento, Has recibido una recarga de 100 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('158', '108', '119', 'Julio Miguel ORDOÑEZ SOLORZANO, Has recibido una recarga de 200 Soles', '1', '2016-01-22', '23:19:28', '5', '9', '', 'Julio Miguel ORDOÑEZ SOLORZANO, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('159', '109', '121', 'carlos leandro, Has recibido una recarga de 200 Soles', '1', '2016-01-25', '19:55:26', '5', '9', '', 'carlos leandro, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('160', '110', '122', 'Violeta salvatierra medina, Has recibido una recarga de 200 Soles', '1', '2016-01-27', '20:41:54', '5', '9', '', 'Violeta salvatierra medina, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('161', '111', '123', 'ANTOLY LEONARDO CAJUSOL VALDERA, Has recibido una recarga de 200 Soles', '1', '2016-01-27', '21:39:42', '5', '9', '', 'ANTOLY LEONARDO CAJUSOL VALDERA, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('162', '112', '125', 'Dina Chumbes Palomino, Has recibido una recarga de 200 Soles', '1', '2016-01-28', '17:27:16', '5', '9', '', 'Dina Chumbes Palomino, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('163', '113', '126', 'rosa fiestas, Has recibido una recarga de 200 Soles', '1', '2016-01-28', '18:54:17', '5', '9', '', 'rosa fiestas, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('164', '114', '127', 'jorge luis rodriguez siapo, Has recibido una recarga de 200 Soles', '2', '2016-01-28', '20:54:08', '5', '9', '', 'jorge luis rodriguez siapo, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('165', '115', '124', 'leonardo cajusol valdera, Has recibido una recarga de 200 Soles', '1', '2016-01-28', '21:01:03', '5', '9', '', 'leonardo cajusol valdera, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('166', '116', '120', 'michelle giron, Has recibido una recarga de 200 Soles', '1', '2016-01-29', '23:11:25', '5', '9', '', 'michelle giron, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('167', '117', '129', 'ada peregrina galvez troncos , Has recibido una recarga de 200 Soles', '1', '2016-01-30', '03:53:25', '5', '9', '', 'ada peregrina galvez troncos , Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('168', '118', '128', 'peregrina troncos abad, Has recibido una recarga de 200 Soles', '1', '2016-01-30', '03:53:40', '5', '9', '', 'peregrina troncos abad, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('169', '119', '130', 'NANCY IRMA CARLOS MENDOZA, Has recibido una recarga de 100 Soles', '1', '2016-02-01', '16:15:41', '5', '9', '', 'NANCY IRMA CARLOS MENDOZA, Has recibido una recarga de 100 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('170', '120', '131', 'EMIT MALPARTIDA ENCINA, Has recibido una recarga de 200 Soles', '1', '2016-02-01', '16:39:37', '5', '9', '', 'EMIT MALPARTIDA ENCINA, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('171', '121', '132', 'Santiago Velasque Yucra, Has recibido una recarga de 200 Soles', '1', '2016-02-01', '19:56:27', '5', '9', '', 'Santiago Velasque Yucra, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('172', '122', '132', 'Santiago Velasque Yucra, Has recibido una recarga de 100 Soles', '1', '2016-02-01', '20:16:48', '5', '9', '', 'Santiago Velasque Yucra, Has recibido una recarga de 100 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('173', '123', '133', 'luis miguel caicedo morales, Has recibido una recarga de 200 Soles', '1', '2016-02-02', '15:04:01', '5', '9', '', 'luis miguel caicedo morales, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('174', '124', '134', 'Santiago Velasque Yucra, Has recibido una recarga de 100 Soles', '1', '2016-02-02', '15:32:49', '5', '9', '', 'Santiago Velasque Yucra, Has recibido una recarga de 100 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('175', '125', '135', 'Massiel Chavez arroyo Mori, Has recibido una recarga de 200 Soles', '1', '2016-02-02', '18:36:31', '5', '9', '', 'Massiel Chavez arroyo Mori, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('176', '126', '136', 'ana ascate garcia, Has recibido una recarga de 200 Soles', '1', '2016-02-02', '19:41:31', '5', '9', '', 'ana ascate garcia, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('177', '127', '137', 'haydee quispe flores, Has recibido una recarga de 200 Soles', '1', '2016-02-02', '19:41:41', '5', '9', '', 'haydee quispe flores, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('178', '128', '138', 'jhonny vasquez, Has recibido una recarga de 200 Soles', '1', '2016-02-03', '18:13:00', '5', '9', '', 'jhonny vasquez, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('179', '129', '139', 'angelica perez villegas, Has recibido una recarga de 200 Soles', '1', '2016-02-03', '18:26:04', '5', '9', '', 'angelica perez villegas, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('180', '130', '140', 'Eduardo Chumbe, Has recibido una recarga de 200 Soles', '1', '2016-02-03', '18:29:39', '5', '9', '', 'Eduardo Chumbe, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('181', '131', '141', 'Dagny cindy Vasquez ycahuate, Has recibido una recarga de 200 Soles', '1', '2016-02-03', '18:32:32', '5', '9', '', 'Dagny cindy Vasquez ycahuate, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('182', '132', '142', 'cesar sono, Has recibido una recarga de 200 Soles', '1', '2016-02-03', '18:41:27', '5', '9', '', 'cesar sono, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('183', '133', '143', 'MARIA REYES BRAVO , Has recibido una recarga de 200 Soles', '1', '2016-02-03', '19:25:24', '5', '9', '', 'MARIA REYES BRAVO , Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('184', '134', '144', 'dean domingo basteres vega, Has recibido una recarga de 200 Soles', '1', '2016-02-03', '20:07:25', '5', '9', '', 'dean domingo basteres vega, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('185', '135', '145', 'Marcos Villafuerte, Has recibido una recarga de 200 Soles', '1', '2016-02-03', '20:28:24', '5', '9', '', 'Marcos Villafuerte, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('186', '136', '146', 'Norma chaupez coras, Has recibido una recarga de 200 Soles', '1', '2016-02-03', '21:20:52', '5', '9', '', 'Norma chaupez coras, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('187', '137', '147', 'Juan Vertis Castro, Has recibido una recarga de 200 Soles', '1', '2016-02-04', '18:35:34', '5', '9', '', 'Juan Vertis Castro, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('188', '138', '148', 'Valeriana belinda peralta gomez, Has recibido una recarga de 200 Soles', '1', '2016-02-04', '18:39:18', '5', '9', '', 'Valeriana belinda peralta gomez, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('189', '139', '151', 'Ricardo Chugden Zambrano, Has recibido una recarga de 200 Soles', '1', '2016-02-04', '21:22:02', '5', '9', '', 'Ricardo Chugden Zambrano, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('190', '140', '152', 'manuel pachas mendoza, Has recibido una recarga de 200 Soles', '1', '2016-02-05', '15:42:04', '5', '9', '', 'manuel pachas mendoza, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('191', '141', '153', 'jeancarlos timoteo trujillo, Has recibido una recarga de 200 Soles', '1', '2016-02-05', '17:25:11', '5', '9', '', 'jeancarlos timoteo trujillo, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('192', '142', '150', 'Nicolas Anchay santa cruz, Has recibido una recarga de 200 Soles', '1', '2016-02-05', '17:47:47', '5', '9', '', 'Nicolas Anchay santa cruz, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('193', '143', '154', 'JAZMIN BASTEDES VEGA, Has recibido una recarga de 200 Soles', '1', '2016-02-05', '17:54:55', '5', '9', '', 'JAZMIN BASTEDES VEGA, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('194', '144', '155', 'GLORIA VEGA OSCANOA, Has recibido una recarga de 200 Soles', '1', '2016-02-05', '18:53:46', '5', '9', '', 'GLORIA VEGA OSCANOA, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('195', '145', '156', 'alicia vasquez, Has recibido una recarga de 200 Soles', '1', '2016-02-05', '19:58:29', '5', '9', '', 'alicia vasquez, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('196', '146', '158', 'Isabel Julia Reyna Sulca, Has recibido una recarga de 200 Soles', '1', '2016-02-05', '19:58:47', '5', '9', '', 'Isabel Julia Reyna Sulca, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('197', '147', '157', 'Sandra natividad centeno huaringa, Has recibido una recarga de 200 Soles', '1', '2016-02-05', '19:59:11', '5', '9', '', 'Sandra natividad centeno huaringa, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('198', '148', '159', 'VANESSA TOMAS RAMOS, Has recibido una recarga de 200 Soles', '1', '2016-02-06', '14:44:18', '5', '9', '', 'VANESSA TOMAS RAMOS, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('199', '149', '160', 'Leslie Poma, Has recibido una recarga de 200 Soles', '1', '2016-02-06', '17:01:50', '5', '9', '', 'Leslie Poma, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('200', '150', '161', 'maria caceres oblitas, Has recibido una recarga de 50 Soles', '1', '2016-02-06', '17:17:41', '5', '9', '', 'maria caceres oblitas, Has recibido una recarga de 50 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('201', '151', '162', 'Walter Lorenzo Orihuela Bairon, Has recibido una recarga de 200 Soles', '2', '2016-02-08', '16:39:51', '5', '9', '', 'Walter Lorenzo Orihuela Bairon, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('202', '152', '163', 'ruth  isela cisneros chinchay, Has recibido una recarga de 200 Soles', '1', '2016-02-08', '17:12:08', '5', '9', '', 'ruth  isela cisneros chinchay, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('203', '153', '164', 'RUTH NOEMI ALVAREZ CALLA, Has recibido una recarga de 200 Soles', '1', '2016-02-08', '17:14:48', '5', '9', '', 'RUTH NOEMI ALVAREZ CALLA, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('204', '154', '165', 'EDGAR YON VALENTÍN CALIXPTO, Has recibido una recarga de 200 Soles', '1', '2016-02-09', '15:22:50', '5', '9', '', 'EDGAR YON VALENTÍN CALIXPTO, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('205', '155', '167', 'moises de la cruz peceros, Has recibido una recarga de 200 Soles', '1', '2016-02-09', '15:26:02', '5', '9', '', 'moises de la cruz peceros, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('206', '156', '166', 'SARA DE SANTA CRUZ PEREGRINA, Has recibido una recarga de 200 Soles', '1', '2016-02-09', '15:26:26', '5', '9', '', 'SARA DE SANTA CRUZ PEREGRINA, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('207', '157', '168', 'edgar pariona Quispe, Has recibido una recarga de 200 Soles', '1', '2016-02-09', '16:38:41', '5', '9', '', 'edgar pariona Quispe, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('208', '158', '169', 'PASTOR ENRIQUE CARRION RAMOS, Has recibido una recarga de 200 Soles', '1', '2016-02-09', '16:46:27', '5', '9', '', 'PASTOR ENRIQUE CARRION RAMOS, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('209', '159', '170', 'Alfonso Lopez Cotera, Has recibido una recarga de 200 Soles', '1', '2016-02-09', '17:08:36', '5', '9', '', 'Alfonso Lopez Cotera, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('210', '160', '171', 'santos gaytan pino, Has recibido una recarga de 200 Soles', '1', '2016-02-09', '17:53:23', '5', '9', '', 'santos gaytan pino, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('211', '161', '172', 'SARA CECILIA ESPIRITU CHURAMPI, Has recibido una recarga de 200 Soles', '1', '2016-02-09', '19:56:15', '5', '9', '', 'SARA CECILIA ESPIRITU CHURAMPI, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('212', '162', '173', 'claudia sanchez, Has recibido una recarga de 200 Soles', '1', '2016-02-09', '20:07:05', '5', '9', '', 'claudia sanchez, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('213', '163', '174', 'JUAN CARLOS CARDENAS FERNANDEZ, Has recibido una recarga de 200 Soles', '1', '2016-02-09', '20:32:28', '5', '9', '', 'JUAN CARLOS CARDENAS FERNANDEZ, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('214', '164', '175', 'JHENY PEÑALOZA SOTOMAYOR, Has recibido una recarga de 200 Soles', '1', '2016-02-10', '15:39:35', '5', '9', '', 'JHENY PEÑALOZA SOTOMAYOR, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('215', '165', '176', 'Hector Martin Calle Moran, Has recibido una recarga de 200 Soles', '1', '2016-02-10', '16:17:13', '5', '9', '', 'Hector Martin Calle Moran, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('216', '166', '177', 'erik paucar gamarra, Has recibido una recarga de 200 Soles', '1', '2016-02-10', '18:54:45', '5', '9', '', 'erik paucar gamarra, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('217', '167', '178', 'Maria noelita Llapapasca molina, Has recibido una recarga de 200 Soles', '1', '2016-02-10', '19:59:46', '5', '9', '', 'Maria noelita Llapapasca molina, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('218', '168', '179', 'Janet Huaman cardenas, Has recibido una recarga de 200 Soles', '1', '2016-02-10', '22:01:03', '5', '9', '', 'Janet Huaman cardenas, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('219', '169', '180', 'rodolfo calderom alarcon, Has recibido una recarga de 200 Soles', '1', '2016-02-10', '22:28:26', '5', '9', '', 'rodolfo calderom alarcon, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('220', '170', '181', 'Ivan Chuquicaña fernandez, Has recibido una recarga de 200 Soles', '1', '2016-02-10', '22:33:15', '5', '9', '', 'Ivan Chuquicaña fernandez, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('221', '171', '182', 'ELENA TRUJILLO ECHEVARRIA, Has recibido una recarga de 200 Soles', '1', '2016-02-11', '17:40:17', '5', '9', '', 'ELENA TRUJILLO ECHEVARRIA, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('222', '172', '183', 'petronila ledezma gaytan, Has recibido una recarga de 200 Soles', '1', '2016-02-11', '19:58:21', '5', '9', '', 'petronila ledezma gaytan, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('223', '173', '184', 'KATTY RAMIREZ, Has recibido una recarga de 200 Soles', '1', '2016-02-11', '20:01:49', '5', '9', '', 'KATTY RAMIREZ, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('224', '174', '185', 'erika lizet diaz pinedo, Has recibido una recarga de 200 Soles', '1', '2016-02-12', '16:25:29', '5', '9', '', 'erika lizet diaz pinedo, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('225', '175', '186', 'juan luis fernandez nina, Has recibido una recarga de 200 Soles', '1', '2016-02-12', '16:57:44', '5', '9', '', 'juan luis fernandez nina, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('226', '176', '187', 'juan camacho ESPINOZA, Has recibido una recarga de 200 Soles', '1', '2016-02-12', '17:24:42', '5', '9', '', 'juan camacho ESPINOZA, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('227', '177', '188', 'JHINEZHKA SOLORZANO CHAVEZ, Has recibido una recarga de 200 Soles', '1', '2016-02-12', '17:39:03', '5', '9', '', 'JHINEZHKA SOLORZANO CHAVEZ, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('228', '178', '184', 'KATTY RAMIREZ, Has recibido una recarga de 100 Soles', '1', '2016-02-15', '19:50:14', '5', '9', '', 'KATTY RAMIREZ, Has recibido una recarga de 100 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('229', '179', '9', 'AAAZU N. Ph Evelyn, Has recibido una recarga de 100 Soles', '1', '2016-02-15', '19:52:05', '5', '9', '', 'AAAZU N. Ph Evelyn, Has recibido una recarga de 100 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('230', '180', '189', 'KATTY RAMIREZ, Has recibido una recarga de 100 Soles', '1', '2016-02-15', '19:59:00', '5', '9', '', 'KATTY RAMIREZ, Has recibido una recarga de 100 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('231', '181', '190', 'rosario ordoñez, Has recibido una recarga de 200 Soles', '1', '2016-02-15', '20:07:38', '5', '9', '', 'rosario ordoñez, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('232', '182', '191', 'Nancy Dina Lazarte Lozano, Has recibido una recarga de 200 Soles', '1', '2016-02-16', '16:46:14', '5', '9', '', 'Nancy Dina Lazarte Lozano, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('233', '183', '192', 'Vanessa noemi Sanchez vinces, Has recibido una recarga de 200 Soles', '1', '2016-02-16', '18:02:26', '5', '9', '', 'Vanessa noemi Sanchez vinces, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('234', '184', '193', 'christian exhandia neyra, Has recibido una recarga de 200 Soles', '1', '2016-02-16', '18:47:29', '5', '9', '', 'christian exhandia neyra, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('235', '185', '194', 'ROSA ZANABRIA ACUÑA, Has recibido una recarga de 200 Soles', '1', '2016-02-16', '18:57:29', '5', '9', '', 'ROSA ZANABRIA ACUÑA, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('236', '186', '195', 'gilberto oswaldo ponce tipismana, Has recibido una recarga de 200 Soles', '1', '2016-02-16', '20:13:58', '5', '9', '', 'gilberto oswaldo ponce tipismana, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('237', '187', '196', 'sofia torres guevara, Has recibido una recarga de 200 Soles', '1', '2016-02-19', '16:40:30', '5', '9', '', 'sofia torres guevara, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('238', '188', '197', 'Elvis Colque, Has recibido una recarga de 200 Soles', '1', '2016-02-19', '17:55:09', '5', '9', '', 'Elvis Colque, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('239', '189', '198', 'Esther Yolanda Vasquez Sandoval, Has recibido una recarga de 200 Soles', '1', '2016-02-19', '19:05:59', '5', '9', '', 'Esther Yolanda Vasquez Sandoval, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('240', '190', '199', 'jenny huaman, Has recibido una recarga de 200 Soles', '1', '2016-02-19', '19:53:27', '5', '9', '', 'jenny huaman, Has recibido una recarga de 200 Soles', '');
INSERT INTO `clientes_notificaciones` VALUES ('241', '191', '200', 'Edwin pretel , Has recibido una recarga de 200 Soles', '1', '2016-02-23', '17:18:42', '5', '9', '', 'Edwin pretel , Has recibido una recarga de 200 Soles', '');

-- ----------------------------
-- Table structure for clientes_notificaciones_estado
-- ----------------------------
DROP TABLE IF EXISTS `clientes_notificaciones_estado`;
CREATE TABLE `clientes_notificaciones_estado` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes_notificaciones_estado
-- ----------------------------
INSERT INTO `clientes_notificaciones_estado` VALUES ('1', 'No Leida');
INSERT INTO `clientes_notificaciones_estado` VALUES ('2', 'Leida');

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of clientes_observaciones
-- ----------------------------
INSERT INTO `clientes_observaciones` VALUES ('1', '1', '1', '2015-09-18', 'asd');
INSERT INTO `clientes_observaciones` VALUES ('2', '7', '2', '2015-12-16', 'Vendedor: Evelyn Paz');
INSERT INTO `clientes_observaciones` VALUES ('20', '33', '5', '2016-01-12', 'se desactiva su app por que se desanimó y no deposito dinero.');
INSERT INTO `clientes_observaciones` VALUES ('4', '12', '2', '2015-12-29', 'Vendedor: Doris Valle');
INSERT INTO `clientes_observaciones` VALUES ('5', '13', '2', '2015-12-29', 'Vendedor: Doris Valle');
INSERT INTO `clientes_observaciones` VALUES ('14', '23', '2', '2015-12-29', 'VENTA: EVELYN PAZ - JOSUE ');
INSERT INTO `clientes_observaciones` VALUES ('7', '8', '2', '2015-12-29', 'Vendedor: Evelyn Paz');
INSERT INTO `clientes_observaciones` VALUES ('8', '16', '2', '2015-12-29', 'Vendedor: Evelyn Paz');
INSERT INTO `clientes_observaciones` VALUES ('9', '17', '2', '2015-12-29', 'Venta: Evelyn Paz');
INSERT INTO `clientes_observaciones` VALUES ('10', '18', '2', '2015-12-29', 'VENTA: EVELYN PAZ');
INSERT INTO `clientes_observaciones` VALUES ('11', '19', '2', '2015-12-29', 'VENTA: EVELYN PAZ');
INSERT INTO `clientes_observaciones` VALUES ('12', '20', '2', '2015-12-29', 'VENTA: EVELYN PAZ');
INSERT INTO `clientes_observaciones` VALUES ('13', '21', '2', '2015-12-29', 'VENTA: EVELYN PAZ');
INSERT INTO `clientes_observaciones` VALUES ('15', '24', '2', '2015-12-29', 'VENTA: EVELYN PAZ');
INSERT INTO `clientes_observaciones` VALUES ('16', '25', '2', '2015-12-29', 'VENTA: EVELYN PAZ');
INSERT INTO `clientes_observaciones` VALUES ('17', '26', '2', '2015-12-29', 'Venta: Evelyn Paz');
INSERT INTO `clientes_observaciones` VALUES ('18', '27', '2', '2015-12-29', 'VENTA: EVELYN PAZ');
INSERT INTO `clientes_observaciones` VALUES ('19', '28', '2', '2015-12-30', 'VENTA: EVELYN PAZ');

-- ----------------------------
-- Table structure for clientes_pago_efectivo
-- ----------------------------
DROP TABLE IF EXISTS `clientes_pago_efectivo`;
CREATE TABLE `clientes_pago_efectivo` (
  `idVentas` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `Monto` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Fono` varchar(20) NOT NULL,
  `Cip` int(11) NOT NULL,
  `Estado` int(1) unsigned NOT NULL,
  PRIMARY KEY (`idVentas`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of clientes_pago_efectivo
-- ----------------------------
INSERT INTO `clientes_pago_efectivo` VALUES ('1', '7', '5', '2015-12-10', '98215180', '2432468', '2');
INSERT INTO `clientes_pago_efectivo` VALUES ('2', '7', '5', '2015-12-10', '98215180', '2432532', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('3', '7', '5', '2015-12-10', '98215180', '2432535', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('4', '7', '20', '2015-12-10', '98215180', '2432544', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('5', '7', '20', '2015-12-10', '98215180', '2432570', '1');
INSERT INTO `clientes_pago_efectivo` VALUES ('6', '10', '10', '2015-12-15', '98358439', '2432754', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('7', '7', '5', '2015-12-15', '98215180', '2432761', '2');
INSERT INTO `clientes_pago_efectivo` VALUES ('8', '7', '10', '2015-12-15', '98215180', '2432762', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('9', '7', '20', '2015-12-15', '98215180', '2432763', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('10', '7', '5', '2015-12-15', '98215180', '2432821', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('11', '7', '5', '2015-12-15', '98215180', '2432823', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('12', '7', '10', '2015-12-16', '98215180', '2432910', '1');
INSERT INTO `clientes_pago_efectivo` VALUES ('13', '7', '10', '2015-12-16', '98215180', '2432911', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('14', '7', '10', '2015-12-16', '98215180', '2432912', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('15', '7', '20', '2015-12-16', '98215180', '2432913', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('16', '7', '5', '2015-12-18', '98215180', '2433132', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('17', '7', '5', '2015-12-18', '98215180', '2433145', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('18', '7', '5', '2015-12-18', '98215180', '2433147', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('19', '104197', '20', '2015-12-18', '997542256', '2433148', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('20', '104197', '10', '2015-12-18', '997542256', '2433149', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('21', '104197', '20', '2015-12-18', '997542256', '2433150', '1');
INSERT INTO `clientes_pago_efectivo` VALUES ('22', '104197', '10', '2015-12-18', '997542256', '2433151', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('23', '7', '5', '2016-02-09', '98215180', '2436562', '1');
INSERT INTO `clientes_pago_efectivo` VALUES ('24', '7', '5', '2016-02-09', '98215180', '3955970', '1');
INSERT INTO `clientes_pago_efectivo` VALUES ('25', '7', '5', '2016-02-10', '98215180', '3961304', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('26', '43315', '5', '2016-02-10', '994665973', '3962161', '2');
INSERT INTO `clientes_pago_efectivo` VALUES ('27', '170911', '5', '2016-02-10', '960310640', '3962389', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('28', '43315', '5', '2016-02-10', '994665973', '3962487', '2');
INSERT INTO `clientes_pago_efectivo` VALUES ('29', '7', '5', '2016-02-12', '98215180', '3969927', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('30', '104197', '20', '2016-02-12', '997542256', '3970904', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('31', '104197', '20', '2016-02-12', '997542256', '3971291', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('32', '170911', '5', '2016-02-16', '960310640', '3983088', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('33', '104197', '5', '2016-02-17', '997542256', '3988819', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('34', '170911', '5', '2016-02-18', '960310640', '3990843', '3');
INSERT INTO `clientes_pago_efectivo` VALUES ('35', '7', '10', '2016-02-18', '98215180', '3991902', '1');
INSERT INTO `clientes_pago_efectivo` VALUES ('36', '104197', '5', '2016-02-19', '997542256', '3995456', '1');
INSERT INTO `clientes_pago_efectivo` VALUES ('37', '1130', '20', '2016-02-23', '999995647', '4008260', '1');

-- ----------------------------
-- Table structure for clientes_recargas
-- ----------------------------
DROP TABLE IF EXISTS `clientes_recargas`;
CREATE TABLE `clientes_recargas` (
  `idRecarga` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `MontoReal` int(11) unsigned NOT NULL,
  `Monto` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Ano` int(11) unsigned NOT NULL,
  `idMes` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idRecarga`)
) ENGINE=MyISAM AUTO_INCREMENT=192 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of clientes_recargas
-- ----------------------------
INSERT INTO `clientes_recargas` VALUES ('1', '1', '0', '0', '10', '2015-11-25', '2015', '11');
INSERT INTO `clientes_recargas` VALUES ('2', '1', '0', '0', '15', '2015-11-25', '2015', '11');
INSERT INTO `clientes_recargas` VALUES ('3', '1', '1', '0', '60', '2015-11-30', '2015', '11');
INSERT INTO `clientes_recargas` VALUES ('4', '8', '4', '160', '200', '2015-12-16', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('5', '9', '4', '160', '200', '2015-12-16', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('6', '7', '4', '0', '30', '2015-12-16', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('7', '10', '4', '160', '200', '2015-12-16', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('8', '8', '4', '0', '5', '2015-12-16', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('9', '11', '4', '160', '200', '2015-12-18', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('10', '12', '8', '160', '200', '2015-12-19', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('11', '13', '8', '160', '200', '2015-12-19', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('12', '14', '4', '160', '200', '2015-12-19', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('13', '14', '4', '0', '0', '2015-12-19', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('14', '15', '4', '160', '200', '2015-12-21', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('15', '16', '4', '160', '200', '2015-12-24', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('16', '7', '4', '160', '200', '2015-12-16', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('17', '17', '4', '160', '200', '2015-12-29', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('18', '18', '4', '160', '200', '2015-12-29', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('19', '19', '4', '160', '200', '2015-12-29', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('20', '20', '4', '160', '200', '2015-12-29', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('21', '21', '4', '160', '200', '2015-12-29', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('22', '22', '4', '160', '200', '2015-12-29', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('23', '23', '4', '160', '200', '2015-12-29', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('24', '24', '4', '160', '200', '2015-12-29', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('25', '25', '4', '160', '200', '2015-12-29', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('26', '26', '4', '160', '200', '2015-12-29', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('27', '27', '4', '160', '200', '2015-12-29', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('28', '28', '4', '160', '200', '2015-12-30', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('29', '29', '4', '160', '200', '2015-12-30', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('30', '29', '4', '160', '200', '2015-12-30', '2015', '12');
INSERT INTO `clientes_recargas` VALUES ('38', '37', '19', '160', '200', '2016-01-08', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('37', '36', '19', '160', '200', '2016-01-08', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('33', '32', '13', '160', '200', '2016-01-06', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('34', '33', '5', '160', '200', '2016-01-07', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('35', '34', '14', '160', '200', '2016-01-07', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('36', '35', '4', '160', '200', '2016-01-07', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('39', '37', '19', '160', '200', '2016-01-08', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('40', '38', '4', '160', '200', '2016-01-08', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('41', '47', '8', '160', '200', '2016-01-08', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('42', '48', '8', '160', '200', '2016-01-08', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('43', '45', '19', '160', '200', '2016-01-09', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('44', '56', '13', '160', '200', '2016-01-11', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('45', '42', '20', '160', '200', '2016-01-11', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('46', '60', '8', '160', '200', '2016-01-11', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('47', '61', '19', '160', '200', '2016-01-11', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('48', '41', '20', '160', '200', '2016-01-11', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('49', '65', '8', '160', '200', '2016-01-12', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('50', '68', '14', '160', '200', '2016-01-12', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('51', '43', '20', '160', '200', '2016-01-12', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('52', '55', '20', '160', '200', '2016-01-12', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('53', '69', '21', '160', '200', '2016-01-12', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('54', '59', '20', '160', '200', '2016-01-12', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('55', '50', '19', '160', '200', '2016-01-12', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('56', '71', '14', '160', '200', '2016-01-13', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('57', '72', '8', '160', '200', '2016-01-14', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('58', '73', '4', '160', '200', '2016-01-14', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('59', '75', '19', '160', '200', '2016-01-14', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('60', '4', '4', '160', '200', '2016-01-14', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('61', '70', '19', '160', '200', '2016-01-14', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('62', '76', '14', '80', '100', '2016-01-14', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('63', '77', '20', '160', '200', '2016-01-14', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('64', '66', '20', '160', '200', '2016-01-14', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('65', '78', '19', '160', '200', '2016-01-14', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('66', '79', '4', '160', '200', '2016-01-14', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('67', '80', '20', '160', '200', '2016-01-15', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('68', '53', '20', '160', '200', '2016-01-15', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('69', '82', '20', '160', '200', '2016-01-15', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('70', '81', '20', '160', '200', '2016-01-15', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('71', '83', '4', '160', '200', '2016-01-15', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('72', '84', '4', '160', '200', '2016-01-15', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('73', '85', '4', '160', '200', '2016-01-15', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('74', '85', '4', '5', '5', '2016-01-15', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('75', '86', '19', '160', '200', '2016-01-16', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('76', '86', '19', '5', '5', '2016-01-16', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('77', '87', '4', '160', '200', '2016-01-16', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('78', '88', '20', '160', '200', '2016-01-18', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('79', '89', '4', '160', '200', '2016-01-18', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('80', '90', '4', '160', '200', '2016-01-18', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('81', '91', '20', '160', '200', '2016-01-18', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('82', '92', '20', '160', '200', '2016-01-18', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('83', '93', '4', '160', '200', '2016-01-18', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('84', '94', '19', '160', '200', '2016-01-18', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('85', '95', '18', '160', '200', '2016-01-18', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('86', '96', '20', '160', '200', '2016-01-18', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('87', '97', '18', '160', '200', '2016-01-19', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('88', '98', '19', '160', '200', '2016-01-19', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('89', '99', '4', '160', '200', '2016-01-19', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('90', '100', '4', '160', '200', '2016-01-19', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('91', '101', '20', '160', '200', '2016-01-20', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('92', '102', '20', '160', '200', '2016-01-20', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('93', '103', '20', '160', '200', '2016-01-20', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('94', '104', '4', '160', '200', '2016-01-20', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('95', '105', '19', '160', '200', '2016-01-20', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('96', '106', '19', '160', '200', '2016-01-20', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('97', '107', '20', '160', '200', '2016-01-20', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('98', '108', '4', '160', '200', '2016-01-20', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('99', '109', '20', '160', '200', '2016-01-21', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('100', '110', '20', '160', '200', '2016-01-21', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('101', '111', '19', '160', '200', '2016-01-21', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('102', '112', '4', '80', '100', '2016-01-21', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('103', '113', '20', '160', '200', '2016-01-21', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('104', '116', '4', '160', '200', '2016-01-21', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('105', '117', '20', '160', '200', '2016-01-22', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('106', '118', '19', '200', '230', '2016-01-22', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('107', '58', '20', '80', '100', '2016-01-22', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('108', '119', '20', '160', '200', '2016-01-22', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('109', '121', '20', '160', '200', '2016-01-25', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('110', '122', '20', '160', '200', '2016-01-27', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('111', '123', '19', '160', '200', '2016-01-27', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('112', '125', '4', '160', '200', '2016-01-28', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('113', '126', '20', '160', '200', '2016-01-28', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('114', '127', '20', '160', '200', '2016-01-28', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('115', '124', '20', '160', '200', '2016-01-28', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('116', '120', '19', '160', '200', '2016-01-29', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('117', '129', '20', '160', '200', '2016-01-30', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('118', '128', '20', '160', '200', '2016-01-30', '2016', '1');
INSERT INTO `clientes_recargas` VALUES ('119', '130', '18', '80', '100', '2016-02-01', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('120', '131', '18', '160', '200', '2016-02-01', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('121', '132', '20', '160', '200', '2016-02-01', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('122', '132', '20', '80', '100', '2016-02-01', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('123', '133', '20', '160', '200', '2016-02-02', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('124', '134', '20', '80', '100', '2016-02-02', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('125', '135', '20', '160', '200', '2016-02-02', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('126', '136', '19', '160', '200', '2016-02-02', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('127', '137', '19', '160', '200', '2016-02-02', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('128', '138', '20', '160', '200', '2016-02-03', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('129', '139', '19', '160', '200', '2016-02-03', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('130', '140', '19', '160', '200', '2016-02-03', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('131', '141', '19', '160', '200', '2016-02-03', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('132', '142', '20', '160', '200', '2016-02-03', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('133', '143', '19', '160', '200', '2016-02-03', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('134', '144', '18', '160', '200', '2016-02-03', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('135', '145', '22', '160', '200', '2016-02-03', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('136', '146', '22', '160', '200', '2016-02-03', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('137', '147', '18', '160', '200', '2016-02-04', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('138', '148', '19', '160', '200', '2016-02-04', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('139', '151', '4', '160', '200', '2016-02-04', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('140', '152', '19', '160', '200', '2016-02-05', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('141', '153', '20', '160', '200', '2016-02-05', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('142', '150', '20', '160', '200', '2016-02-05', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('143', '154', '18', '160', '200', '2016-02-05', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('144', '155', '18', '16', '200', '2016-02-05', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('145', '156', '20', '160', '200', '2016-02-05', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('146', '158', '20', '160', '200', '2016-02-05', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('147', '157', '20', '160', '200', '2016-02-05', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('148', '159', '18', '160', '200', '2016-02-06', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('149', '160', '19', '160', '200', '2016-02-06', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('150', '161', '20', '30', '50', '2016-02-06', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('151', '162', '4', '160', '200', '2016-02-08', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('152', '163', '18', '160', '200', '2016-02-08', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('153', '164', '4', '160', '200', '2016-02-08', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('154', '165', '18', '160', '200', '2016-02-09', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('155', '167', '4', '160', '200', '2016-02-09', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('156', '166', '18', '160', '200', '2016-02-09', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('157', '168', '4', '160', '200', '2016-02-09', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('158', '169', '18', '160', '200', '2016-02-09', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('159', '170', '4', '160', '200', '2016-02-09', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('160', '171', '20', '160', '200', '2016-02-09', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('161', '172', '4', '160', '200', '2016-02-09', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('162', '173', '20', '160', '200', '2016-02-09', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('163', '174', '19', '160', '200', '2016-02-09', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('164', '175', '18', '160', '200', '2016-02-10', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('165', '176', '19', '160', '200', '2016-02-10', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('166', '177', '4', '160', '200', '2016-02-10', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('167', '178', '20', '160', '200', '2016-02-10', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('168', '179', '19', '160', '200', '2016-02-10', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('169', '180', '4', '160', '200', '2016-02-10', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('170', '181', '4', '160', '200', '2016-02-10', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('171', '182', '18', '160', '200', '2016-02-11', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('172', '183', '20', '160', '200', '2016-02-11', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('173', '184', '19', '160', '200', '2016-02-11', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('174', '185', '20', '160', '200', '2016-02-12', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('175', '186', '20', '160', '200', '2016-02-12', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('176', '187', '19', '160', '200', '2016-02-12', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('177', '188', '4', '160', '200', '2016-02-12', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('178', '184', '19', '80', '100', '2016-02-15', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('179', '9', '4', '80', '100', '2016-02-15', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('180', '189', '19', '80', '100', '2016-02-15', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('181', '190', '20', '160', '200', '2016-02-15', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('182', '191', '4', '160', '200', '2016-02-16', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('183', '192', '4', '160', '200', '2016-02-16', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('184', '193', '4', '160', '200', '2016-02-16', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('185', '194', '4', '160', '200', '2016-02-16', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('186', '195', '20', '160', '200', '2016-02-16', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('187', '196', '19', '160', '200', '2016-02-19', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('188', '197', '20', '160', '200', '2016-02-19', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('189', '198', '20', '160', '200', '2016-02-19', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('190', '199', '20', '160', '200', '2016-02-19', '2016', '2');
INSERT INTO `clientes_recargas` VALUES ('191', '200', '23', '160', '200', '2016-02-23', '2016', '2');

-- ----------------------------
-- Table structure for clientes_tipos
-- ----------------------------
DROP TABLE IF EXISTS `clientes_tipos`;
CREATE TABLE `clientes_tipos` (
  `idTipo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

-- ----------------------------
-- Records of clientes_tipos
-- ----------------------------
INSERT INTO `clientes_tipos` VALUES ('1', 'Empresa');
INSERT INTO `clientes_tipos` VALUES ('2', 'Particular(Persona)');

-- ----------------------------
-- Table structure for clientes_ventas
-- ----------------------------
DROP TABLE IF EXISTS `clientes_ventas`;
CREATE TABLE `clientes_ventas` (
  `idVentas` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `idComprador` int(11) unsigned NOT NULL,
  `Monto` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Ano` int(11) unsigned NOT NULL,
  `idMes` int(11) unsigned NOT NULL,
  `Fono` varchar(20) NOT NULL,
  PRIMARY KEY (`idVentas`)
) ENGINE=MyISAM AUTO_INCREMENT=251 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of clientes_ventas
-- ----------------------------
INSERT INTO `clientes_ventas` VALUES ('20', '1', '0', '5', '2015-11-24', '2015', '11', '3454');
INSERT INTO `clientes_ventas` VALUES ('15', '3', '0', '5', '2015-11-03', '2015', '11', '345345345');
INSERT INTO `clientes_ventas` VALUES ('19', '1', '0', '10', '2015-11-12', '2015', '11', '345345');
INSERT INTO `clientes_ventas` VALUES ('17', '3', '0', '20', '2015-11-27', '2015', '11', '345435');
INSERT INTO `clientes_ventas` VALUES ('21', '3', '0', '5', '2015-11-16', '2015', '11', '34543');
INSERT INTO `clientes_ventas` VALUES ('22', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('23', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('24', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('25', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('26', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('27', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('28', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('29', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('30', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('31', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('32', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('33', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('34', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('35', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('36', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('37', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('38', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('39', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('40', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('41', '1', '40', '5', '2015-11-25', '2015', '11', '990002027');
INSERT INTO `clientes_ventas` VALUES ('42', '1', '37', '5', '2015-11-25', '2015', '11', '93462365');
INSERT INTO `clientes_ventas` VALUES ('43', '1', '37', '5', '2015-11-25', '2015', '11', '93462365');
INSERT INTO `clientes_ventas` VALUES ('44', '1', '40', '5', '2015-11-25', '2015', '11', '990002027');
INSERT INTO `clientes_ventas` VALUES ('45', '1', '40', '5', '2015-11-25', '2015', '11', '990002027');
INSERT INTO `clientes_ventas` VALUES ('46', '1', '40', '5', '2015-11-25', '2015', '11', '990002027');
INSERT INTO `clientes_ventas` VALUES ('47', '1', '40', '5', '2015-11-25', '2015', '11', '990002027');
INSERT INTO `clientes_ventas` VALUES ('48', '1', '40', '5', '2015-11-25', '2015', '11', '990002027');
INSERT INTO `clientes_ventas` VALUES ('49', '1', '40', '5', '2015-11-25', '2015', '11', '990002027');
INSERT INTO `clientes_ventas` VALUES ('50', '1', '40', '5', '2015-11-25', '2015', '11', '990002027');
INSERT INTO `clientes_ventas` VALUES ('51', '1', '40', '5', '2015-11-25', '2015', '11', '990002027');
INSERT INTO `clientes_ventas` VALUES ('52', '1', '40', '5', '2015-11-25', '2015', '11', '990002027');
INSERT INTO `clientes_ventas` VALUES ('53', '1', '48', '5', '2015-11-25', '2015', '11', '990002027');
INSERT INTO `clientes_ventas` VALUES ('54', '1', '48', '5', '2015-11-25', '2015', '11', '990002027');
INSERT INTO `clientes_ventas` VALUES ('55', '1', '48', '5', '2015-11-25', '2015', '11', '990002027');
INSERT INTO `clientes_ventas` VALUES ('56', '1', '48', '5', '2015-11-25', '2015', '11', '990002027');
INSERT INTO `clientes_ventas` VALUES ('57', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('58', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('59', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('60', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('61', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('62', '1', '7', '5', '2015-11-25', '2015', '11', '98215180');
INSERT INTO `clientes_ventas` VALUES ('63', '1', '37', '20', '2015-11-25', '2015', '11', '93462365');
INSERT INTO `clientes_ventas` VALUES ('64', '1', '37', '10', '2015-12-09', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('65', '1', '37', '5', '2015-12-10', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('66', '1', '37', '5', '2015-12-10', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('67', '5', '7', '5', '2015-12-10', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('68', '5', '7', '5', '2015-12-10', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('69', '5', '7', '5', '2015-12-10', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('70', '3', '37', '5', '2015-12-10', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('71', '3', '37', '5', '2015-12-10', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('72', '1', '7', '5', '2015-12-10', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('73', '1', '37', '10', '2015-12-10', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('74', '3', '37', '10', '2015-12-10', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('75', '5', '7', '20', '2015-12-10', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('76', '5', '7', '20', '2015-12-10', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('77', '5', '7', '20', '2015-12-10', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('78', '5', '7', '5', '2015-12-10', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('79', '1', '7', '5', '2015-12-10', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('80', '5', '7', '5', '2015-12-11', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('81', '5', '7', '5', '2015-12-11', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('82', '5', '7', '5', '2015-12-11', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('83', '1', '37', '10', '2015-12-11', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('84', '3', '37', '5', '2015-12-13', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('85', '1', '37', '5', '2015-12-13', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('86', '1', '37', '10', '2015-12-13', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('87', '1', '48', '10', '2015-12-14', '2015', '12', '990002027');
INSERT INTO `clientes_ventas` VALUES ('88', '5', '37', '10', '2015-12-14', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('89', '1', '48', '10', '2015-12-14', '2015', '12', '990002027');
INSERT INTO `clientes_ventas` VALUES ('90', '3', '48', '10', '2015-12-14', '2015', '12', '990002027');
INSERT INTO `clientes_ventas` VALUES ('91', '3', '7', '10', '2015-12-14', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('92', '1', '7', '5', '2015-12-14', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('93', '3', '3', '1', '2015-12-14', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('94', '3', '3', '4', '2015-12-14', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('95', '5', '7', '5', '2015-12-14', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('96', '3', '37', '10', '2015-12-14', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('97', '3', '3', '1', '2015-12-15', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('98', '3', '3', '2', '2015-12-15', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('99', '1', '7', '5', '2015-12-15', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('100', '1', '7', '5', '2015-12-15', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('101', '1', '7', '5', '2015-12-15', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('102', '3', '7', '5', '2015-12-15', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('103', '3', '37', '10', '2015-12-15', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('104', '3', '37', '20', '2015-12-15', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('105', '6', '7', '5', '2015-12-15', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('106', '6', '7', '5', '2015-12-15', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('107', '6', '7', '5', '2015-12-15', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('108', '6', '7', '5', '2015-12-15', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('109', '6', '7', '5', '2015-12-15', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('110', '6', '7', '5', '2015-12-15', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('111', '6', '7', '5', '2015-12-15', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('112', '6', '7', '5', '2015-12-15', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('113', '3', '37', '10', '2015-12-15', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('114', '3', '37', '20', '2015-12-15', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('115', '1', '7', '5', '2015-12-15', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('116', '1', '7', '10', '2015-12-15', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('117', '3', '37', '10', '2015-12-15', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('118', '6', '79', '5', '2015-12-15', '2015', '12', '');
INSERT INTO `clientes_ventas` VALUES ('119', '3', '37', '10', '2015-12-15', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('120', '3', '37', '10', '2015-12-15', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('121', '3', '37', '10', '2015-12-15', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('122', '3', '37', '10', '2015-12-15', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('123', '7', '79', '10', '2015-12-15', '2015', '12', '');
INSERT INTO `clientes_ventas` VALUES ('124', '7', '48', '10', '2015-12-15', '2015', '12', '990002027');
INSERT INTO `clientes_ventas` VALUES ('125', '7', '106550', '10', '2015-12-15', '2015', '12', '998455049');
INSERT INTO `clientes_ventas` VALUES ('126', '3', '37', '10', '2015-12-15', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('127', '8', '69882', '5', '2015-12-16', '2015', '12', '931142236');
INSERT INTO `clientes_ventas` VALUES ('128', '7', '119395', '10', '2015-12-16', '2015', '12', '930803633');
INSERT INTO `clientes_ventas` VALUES ('129', '7', '114211', '10', '2015-12-16', '2015', '12', '930258922');
INSERT INTO `clientes_ventas` VALUES ('130', '3', '37', '10', '2015-12-17', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('131', '3', '37', '10', '2015-12-17', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('132', '1', '10', '5', '2015-12-17', '2015', '12', '98358439');
INSERT INTO `clientes_ventas` VALUES ('133', '3', '37', '10', '2015-12-17', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('134', '11', '103105', '10', '2015-12-17', '2015', '12', '990029089');
INSERT INTO `clientes_ventas` VALUES ('135', '11', '37', '10', '2015-12-18', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('136', '3', '37', '10', '2015-12-18', '2015', '12', '93462365');
INSERT INTO `clientes_ventas` VALUES ('137', '4', '14756', '5', '2015-12-18', '2015', '12', '980452207');
INSERT INTO `clientes_ventas` VALUES ('138', '4', '48', '10', '2015-12-19', '2015', '12', '990002027');
INSERT INTO `clientes_ventas` VALUES ('139', '4', '48', '10', '2015-12-22', '2015', '12', '990002027');
INSERT INTO `clientes_ventas` VALUES ('140', '4', '48', '10', '2015-12-22', '2015', '12', '990002027');
INSERT INTO `clientes_ventas` VALUES ('141', '1', '7', '10', '2015-12-23', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('142', '1', '7', '10', '2015-12-23', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('143', '1', '7', '5', '2015-12-23', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('144', '1', '7', '20', '2015-12-23', '2015', '12', '98215180');
INSERT INTO `clientes_ventas` VALUES ('145', '4', '48', '10', '2015-12-24', '2015', '12', '990002027');
INSERT INTO `clientes_ventas` VALUES ('146', '4', '48', '10', '2015-12-24', '2015', '12', '990002027');
INSERT INTO `clientes_ventas` VALUES ('147', '4', '52', '10', '2015-12-24', '2015', '12', '992109191');
INSERT INTO `clientes_ventas` VALUES ('148', '4', '48', '5', '2015-12-25', '2015', '12', '990002027');
INSERT INTO `clientes_ventas` VALUES ('149', '4', '48', '5', '2015-12-28', '2015', '12', '990002027');
INSERT INTO `clientes_ventas` VALUES ('150', '4', '48', '10', '2015-12-29', '2015', '12', '990002027');
INSERT INTO `clientes_ventas` VALUES ('151', '4', '48', '10', '2015-12-29', '2015', '12', '990002027');
INSERT INTO `clientes_ventas` VALUES ('152', '19', '45490', '5', '2016-01-02', '2016', '1', '940296302');
INSERT INTO `clientes_ventas` VALUES ('153', '4', '48', '10', '2016-01-05', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('154', '4', '48', '10', '2016-01-06', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('155', '4', '48', '5', '2016-01-07', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('156', '4', '48', '10', '2016-01-07', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('157', '7', '114211', '10', '2016-01-08', '2016', '1', '930258922');
INSERT INTO `clientes_ventas` VALUES ('158', '5', '7', '5', '2016-01-08', '2016', '1', '98215180');
INSERT INTO `clientes_ventas` VALUES ('159', '5', '7', '5', '2016-01-08', '2016', '1', '98215180');
INSERT INTO `clientes_ventas` VALUES ('160', '5', '7', '5', '2016-01-08', '2016', '1', '98215180');
INSERT INTO `clientes_ventas` VALUES ('161', '4', '48', '10', '2016-01-08', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('162', '48', '153072', '10', '2016-01-09', '2016', '1', '961214279');
INSERT INTO `clientes_ventas` VALUES ('163', '3', '37', '20', '2016-01-10', '0', '0', '93462365');
INSERT INTO `clientes_ventas` VALUES ('164', '4', '48', '10', '2016-01-11', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('165', '3', '37', '20', '2016-01-11', '2016', '1', '93462365');
INSERT INTO `clientes_ventas` VALUES ('166', '4', '48', '10', '2016-01-11', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('167', '4', '48', '10', '2016-01-12', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('168', '4', '48', '10', '2016-01-12', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('169', '28', '108275', '5', '2016-01-12', '2016', '1', '999461111');
INSERT INTO `clientes_ventas` VALUES ('170', '3', '37', '20', '2016-01-12', '2016', '1', '93462365');
INSERT INTO `clientes_ventas` VALUES ('171', '4', '48', '5', '2016-01-12', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('172', '4', '48', '5', '2016-01-12', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('173', '45', '155395', '5', '2016-01-12', '2016', '1', '944702525');
INSERT INTO `clientes_ventas` VALUES ('174', '4', '48', '5', '2016-01-12', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('175', '55', '53172', '5', '2016-01-12', '2016', '1', '990119372');
INSERT INTO `clientes_ventas` VALUES ('176', '28', '108275', '5', '2016-01-14', '2016', '1', '999461111');
INSERT INTO `clientes_ventas` VALUES ('177', '71', '37269', '5', '2016-01-14', '2016', '1', '5');
INSERT INTO `clientes_ventas` VALUES ('178', '70', '48', '10', '2016-01-14', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('179', '70', '48', '20', '2016-01-14', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('180', '76', '141129', '5', '2016-01-14', '2016', '1', '996097694');
INSERT INTO `clientes_ventas` VALUES ('181', '70', '48', '5', '2016-01-14', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('182', '3', '37', '20', '2016-01-15', '2016', '1', '93462365');
INSERT INTO `clientes_ventas` VALUES ('183', '85', '158293', '5', '2016-01-15', '2016', '1', '977733107');
INSERT INTO `clientes_ventas` VALUES ('184', '86', '92870', '5', '2016-01-16', '2016', '1', '985288545');
INSERT INTO `clientes_ventas` VALUES ('185', '78', '158556', '5', '2016-01-16', '2016', '1', '962074386');
INSERT INTO `clientes_ventas` VALUES ('186', '97', '157948', '5', '2016-01-19', '2016', '1', '989808172');
INSERT INTO `clientes_ventas` VALUES ('187', '99', '155395', '5', '2016-01-19', '2016', '1', '944702525');
INSERT INTO `clientes_ventas` VALUES ('188', '4', '48', '10', '2016-01-20', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('189', '4', '48', '10', '2016-01-20', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('190', '4', '48', '5', '2016-01-20', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('191', '4', '48', '5', '2016-01-20', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('192', '91', '159333', '5', '2016-01-20', '2016', '1', '989899374');
INSERT INTO `clientes_ventas` VALUES ('193', '91', '160050', '5', '2016-01-20', '2016', '1', '983892218');
INSERT INTO `clientes_ventas` VALUES ('194', '3', '37', '20', '2016-01-20', '2016', '1', '93462365');
INSERT INTO `clientes_ventas` VALUES ('195', '70', '48', '10', '2016-01-20', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('196', '70', '48', '5', '2016-01-21', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('197', '70', '48', '5', '2016-01-21', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('198', '110', '151228', '5', '2016-01-21', '2016', '1', '993574209');
INSERT INTO `clientes_ventas` VALUES ('199', '109', '49626', '5', '2016-01-22', '2016', '1', '950469639');
INSERT INTO `clientes_ventas` VALUES ('200', '119', '67633', '5', '2016-01-23', '2016', '1', '980286298');
INSERT INTO `clientes_ventas` VALUES ('201', '105', '162926', '5', '2016-01-26', '2016', '1', '955307929');
INSERT INTO `clientes_ventas` VALUES ('202', '119', '162766', '5', '2016-01-26', '2016', '1', '930456532');
INSERT INTO `clientes_ventas` VALUES ('203', '119', '162766', '5', '2016-01-26', '2016', '1', '930456532');
INSERT INTO `clientes_ventas` VALUES ('204', '4', '48', '5', '2016-01-28', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('205', '4', '48', '10', '2016-01-28', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('206', '4', '48', '5', '2016-01-28', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('207', '78', '164255', '5', '2016-01-29', '2016', '1', '989333404');
INSERT INTO `clientes_ventas` VALUES ('208', '4', '48', '5', '2016-01-29', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('209', '4', '48', '5', '2016-01-29', '2016', '1', '990002027');
INSERT INTO `clientes_ventas` VALUES ('210', '97', '158709', '5', '2016-01-29', '2016', '1', '954797400');
INSERT INTO `clientes_ventas` VALUES ('211', '97', '158709', '5', '2016-01-29', '2016', '1', '954797400');
INSERT INTO `clientes_ventas` VALUES ('212', '28', '108275', '5', '2016-01-31', '2016', '1', '999461111');
INSERT INTO `clientes_ventas` VALUES ('213', '80', '102510', '5', '2016-02-01', '2016', '2', '999283032');
INSERT INTO `clientes_ventas` VALUES ('214', '132', '167291', '5', '2016-02-01', '2016', '2', '947249873');
INSERT INTO `clientes_ventas` VALUES ('215', '4', '48', '5', '2016-02-02', '2016', '2', '990002027');
INSERT INTO `clientes_ventas` VALUES ('216', '5', '7', '5', '2016-02-02', '2016', '2', '98215180');
INSERT INTO `clientes_ventas` VALUES ('217', '134', '167264', '5', '2016-02-03', '2016', '2', '949408517');
INSERT INTO `clientes_ventas` VALUES ('218', '134', '167291', '5', '2016-02-03', '2016', '2', '947249873');
INSERT INTO `clientes_ventas` VALUES ('219', '11', '103105', '5', '2016-02-03', '2016', '2', '990029089');
INSERT INTO `clientes_ventas` VALUES ('220', '11', '103105', '5', '2016-02-03', '2016', '2', '990029089');
INSERT INTO `clientes_ventas` VALUES ('221', '11', '103105', '5', '2016-02-03', '2016', '2', '990029089');
INSERT INTO `clientes_ventas` VALUES ('222', '4', '48', '5', '2016-02-03', '2016', '2', '990002027');
INSERT INTO `clientes_ventas` VALUES ('223', '4', '48', '5', '2016-02-03', '2016', '2', '990002027');
INSERT INTO `clientes_ventas` VALUES ('224', '145', '103105', '5', '2016-02-03', '2016', '2', '990029089');
INSERT INTO `clientes_ventas` VALUES ('225', '145', '103105', '5', '2016-02-03', '2016', '2', '990029089');
INSERT INTO `clientes_ventas` VALUES ('226', '11', '103105', '5', '2016-02-03', '2016', '2', '990029089');
INSERT INTO `clientes_ventas` VALUES ('227', '42', '167904', '5', '2016-02-04', '2016', '2', '935074785');
INSERT INTO `clientes_ventas` VALUES ('228', '122', '156599', '5', '2016-02-04', '2016', '2', '953871002');
INSERT INTO `clientes_ventas` VALUES ('229', '8', '69882', '5', '2016-02-04', '2016', '2', '931142236');
INSERT INTO `clientes_ventas` VALUES ('230', '4', '48', '5', '2016-02-05', '2016', '2', '990002027');
INSERT INTO `clientes_ventas` VALUES ('231', '4', '48', '5', '2016-02-05', '2016', '2', '990002027');
INSERT INTO `clientes_ventas` VALUES ('232', '70', '48', '5', '2016-02-08', '2016', '2', '990002027');
INSERT INTO `clientes_ventas` VALUES ('234', '58', '164431', '5', '2016-02-08', '2016', '2', '931849734');
INSERT INTO `clientes_ventas` VALUES ('235', '165', '170568', '5', '2016-02-09', '2016', '2', '965119193');
INSERT INTO `clientes_ventas` VALUES ('236', '1', '7', '5', '2016-02-10', '2016', '2', '98215180');
INSERT INTO `clientes_ventas` VALUES ('237', '1', '43315', '5', '2016-02-10', '2016', '2', '994665973');
INSERT INTO `clientes_ventas` VALUES ('238', '1', '43315', '5', '2016-02-10', '2016', '2', '994665973');
INSERT INTO `clientes_ventas` VALUES ('239', '75', '92865', '5', '2016-02-12', '2016', '2', '930870467');
INSERT INTO `clientes_ventas` VALUES ('240', '70', '48', '5', '2016-02-16', '2016', '2', '990002027');
INSERT INTO `clientes_ventas` VALUES ('241', '70', '48', '5', '2016-02-16', '2016', '2', '990002027');
INSERT INTO `clientes_ventas` VALUES ('242', '70', '48', '5', '2016-02-16', '2016', '2', '990002027');
INSERT INTO `clientes_ventas` VALUES ('243', '70', '48', '5', '2016-02-16', '2016', '2', '990002027');
INSERT INTO `clientes_ventas` VALUES ('244', '122', '156599', '5', '2016-02-16', '2016', '2', '953871002');
INSERT INTO `clientes_ventas` VALUES ('245', '141', '169561', '5', '2016-02-16', '2016', '2', '941762775');
INSERT INTO `clientes_ventas` VALUES ('246', '141', '171150', '10', '2016-02-16', '2016', '2', '991193626');
INSERT INTO `clientes_ventas` VALUES ('247', '4', '48', '10', '2016-02-17', '2016', '2', '990002027');
INSERT INTO `clientes_ventas` VALUES ('248', '4', '48', '10', '2016-02-18', '2016', '2', '990002027');
INSERT INTO `clientes_ventas` VALUES ('249', '193', '93121', '5', '2016-02-18', '2016', '2', '976540818');
INSERT INTO `clientes_ventas` VALUES ('250', '4', '48', '10', '2016-02-18', '2016', '2', '990002027');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

-- ----------------------------
-- Records of core_datos_opciones
-- ----------------------------
INSERT INTO `core_datos_opciones` VALUES ('1', 'Si');
INSERT INTO `core_datos_opciones` VALUES ('2', 'No');

-- ----------------------------
-- Table structure for core_meses
-- ----------------------------
DROP TABLE IF EXISTS `core_meses`;
CREATE TABLE `core_meses` (
  `idMes` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`idMes`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_meses
-- ----------------------------
INSERT INTO `core_meses` VALUES ('1', 'Enero');
INSERT INTO `core_meses` VALUES ('2', 'Febrero');
INSERT INTO `core_meses` VALUES ('3', 'Marzo');
INSERT INTO `core_meses` VALUES ('4', 'Abril');
INSERT INTO `core_meses` VALUES ('5', 'Mayo');
INSERT INTO `core_meses` VALUES ('6', 'Junio');
INSERT INTO `core_meses` VALUES ('7', 'Julio');
INSERT INTO `core_meses` VALUES ('8', 'Agosto');
INSERT INTO `core_meses` VALUES ('9', 'Septiembre');
INSERT INTO `core_meses` VALUES ('10', 'Octubre');
INSERT INTO `core_meses` VALUES ('11', 'Noviembre');
INSERT INTO `core_meses` VALUES ('12', 'Diciembre');

-- ----------------------------
-- Table structure for core_permisos
-- ----------------------------
DROP TABLE IF EXISTS `core_permisos`;
CREATE TABLE `core_permisos` (
  `idAdmpm` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_pmcat` int(11) unsigned NOT NULL,
  `Direccionweb` varchar(50) NOT NULL,
  `Direccionbase` varchar(50) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `visualizacion` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idAdmpm`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COMMENT='Administrador';

-- ----------------------------
-- Records of core_permisos
-- ----------------------------
INSERT INTO `core_permisos` VALUES ('1', '2', 'admin_clientes.php?pagina=1', 'admin_clientes.php', 'Almacenes - Listado', '9998');
INSERT INTO `core_permisos` VALUES ('2', '2', 'admin_clientes_activation.php?pagina=1', 'admin_clientes_activation.php', 'Almacenes - Estado', '9998');
INSERT INTO `core_permisos` VALUES ('3', '3', 'admin_datos.php', 'admin_datos.php', 'Datos de la Empresa', '9998');
INSERT INTO `core_permisos` VALUES ('4', '1', 'admin_usr.php?pagina=1', 'admin_usr.php', 'Usuarios - Listado', '9998');
INSERT INTO `core_permisos` VALUES ('5', '1', 'admin_usr_activation.php?pagina=1', 'admin_usr_activation.php', 'Usuarios - Estado', '9998');
INSERT INTO `core_permisos` VALUES ('6', '1', 'admin_usr_password.php?pagina=1', 'admin_usr_password.php', 'Usuarios - Contraseña', '9998');
INSERT INTO `core_permisos` VALUES ('7', '1', 'admin_usr_permisos.php?pagina=1', 'admin_usr_permisos.php', 'Usuarios - Permisos', '9998');
INSERT INTO `core_permisos` VALUES ('8', '1', 'admin_usr_type.php?pagina=1', 'admin_usr_type.php', 'Usuarios - Cambiar Tipo', '9998');
INSERT INTO `core_permisos` VALUES ('13', '2', 'admin_clientes_recarga.php?pagina=1', 'admin_clientes_recarga.php', 'Almacenes - Recargas', '9998');
INSERT INTO `core_permisos` VALUES ('14', '6', 'admin_administradores.php?pagina=1', 'admin_administradores.php', 'Supervisores - Listado', '9998');
INSERT INTO `core_permisos` VALUES ('15', '6', 'admin_administradores_activation.php?pagina=1', 'admin_administradores_activation.php', 'Supervisores - Estado', '9998');
INSERT INTO `core_permisos` VALUES ('16', '6', 'admin_administradores_password.php?pagina=1', 'admin_administradores_password.php', 'Supervisores - Contraseña', '9998');
INSERT INTO `core_permisos` VALUES ('17', '7', 'admin_vendedores.php?pagina=1', 'admin_vendedores.php', 'Vendedores - Listado', '9998');
INSERT INTO `core_permisos` VALUES ('18', '7', 'admin_vendedores_activation.php?pagina=1', 'admin_vendedores_activation.php', 'Vendedores - Estado', '9998');
INSERT INTO `core_permisos` VALUES ('19', '7', 'admin_vendedores_password.php?pagina=1', 'admin_vendedores_password.php', 'Vendedores - Contraseña', '9998');
INSERT INTO `core_permisos` VALUES ('20', '8', 'informe_ventas_todas.php', 'informe_ventas_todas.php', 'Todas las ventas', '9998');
INSERT INTO `core_permisos` VALUES ('21', '8', 'informe_ventas_supervisor.php', 'informe_ventas_supervisor.php', 'Supervisores - Resumen de ventas', '9998');
INSERT INTO `core_permisos` VALUES ('22', '8', 'informe_ventas_vendedor.php', 'informe_ventas_vendedor.php', 'Vendedores - Resumen de ventas', '9998');
INSERT INTO `core_permisos` VALUES ('23', '2', 'supervisores_clientes.php?pagina=1', 'supervisores_clientes.php', 'Sup - Almacenes Listado', '9998');
INSERT INTO `core_permisos` VALUES ('24', '2', 'supervisores_clientes_activation.php?pagina=1', 'supervisores_clientes_activation.php', 'Sup - Almacenes Estado', '9998');
INSERT INTO `core_permisos` VALUES ('25', '2', 'supervisores_clientes_recarga.php?pagina=1', 'supervisores_clientes_recarga.php', 'Sup - Almacenes Recargas', '9998');
INSERT INTO `core_permisos` VALUES ('26', '8', 'informe_ventas_pagoefectivo.php?pagina=1', 'informe_ventas_pagoefectivo.php', 'Ventas PagoEfectivo', '9998');
INSERT INTO `core_permisos` VALUES ('27', '8', 'informe_ventas_cellpower.php?pagina=1', 'informe_ventas_cellpower.php', 'Ventas Cellpower', '9998');
INSERT INTO `core_permisos` VALUES ('28', '8', 'informe_ventas_easypago.php?pagina=1', 'informe_ventas_easypago.php', 'Ventas Easy pago', '9998');

-- ----------------------------
-- Table structure for core_permisos_cat
-- ----------------------------
DROP TABLE IF EXISTS `core_permisos_cat`;
CREATE TABLE `core_permisos_cat` (
  `id_pmcat` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(60) NOT NULL,
  `idFont` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_pmcat`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='Administrador';

-- ----------------------------
-- Records of core_permisos_cat
-- ----------------------------
INSERT INTO `core_permisos_cat` VALUES ('1', 'Usuarios', '108');
INSERT INTO `core_permisos_cat` VALUES ('2', 'Almacenes', '131');
INSERT INTO `core_permisos_cat` VALUES ('3', 'Mantenimiento', '128');
INSERT INTO `core_permisos_cat` VALUES ('6', 'Supervisores', '125');
INSERT INTO `core_permisos_cat` VALUES ('7', 'Vendedores', '108');
INSERT INTO `core_permisos_cat` VALUES ('8', 'Informes', '38');

-- ----------------------------
-- Table structure for core_pines
-- ----------------------------
DROP TABLE IF EXISTS `core_pines`;
CREATE TABLE `core_pines` (
  `idPin` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(60) NOT NULL,
  `Valor` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idPin`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of core_pines
-- ----------------------------
INSERT INTO `core_pines` VALUES ('1', '5 Soles', '5');
INSERT INTO `core_pines` VALUES ('2', '10 Soles', '10');
INSERT INTO `core_pines` VALUES ('3', '20 Soles', '20');
INSERT INTO `core_pines` VALUES ('4', '5 Soles plus', '5');
INSERT INTO `core_pines` VALUES ('5', '10 Soles plus', '10');
INSERT INTO `core_pines` VALUES ('6', '20 Soles plus', '20');

-- ----------------------------
-- Table structure for core_sistemas
-- ----------------------------
DROP TABLE IF EXISTS `core_sistemas`;
CREATE TABLE `core_sistemas` (
  `idSistema` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `imgLogo` varchar(250) NOT NULL,
  `email_principal` varchar(60) NOT NULL,
  `Rut` varchar(13) NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `Fono` varchar(15) NOT NULL,
  `Ciudad` varchar(60) NOT NULL,
  `Comuna` varchar(60) NOT NULL,
  `idTheme` int(11) unsigned NOT NULL,
  `Fax` varchar(15) NOT NULL,
  `Web` varchar(120) NOT NULL,
  `Rubro` varchar(120) NOT NULL,
  `Contacto` varchar(120) NOT NULL,
  `NombreContrato` varchar(120) NOT NULL,
  `NContrato` varchar(30) NOT NULL,
  `FContrato` date NOT NULL,
  `DContrato` int(11) unsigned NOT NULL,
  `Bodega_OT` int(11) unsigned NOT NULL,
  `idRubro` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idSistema`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Administrador';

-- ----------------------------
-- Records of core_sistemas
-- ----------------------------
INSERT INTO `core_sistemas` VALUES ('1', 'Easy Pago', '', '', '', '', '', '', '', '1', '', '', '', '', '', '', '0000-00-00', '0', '0', '0');

-- ----------------------------
-- Table structure for core_sistemas_rubro
-- ----------------------------
DROP TABLE IF EXISTS `core_sistemas_rubro`;
CREATE TABLE `core_sistemas_rubro` (
  `idRubro` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idRubro`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Administrador';

-- ----------------------------
-- Records of core_sistemas_rubro
-- ----------------------------
INSERT INTO `core_sistemas_rubro` VALUES ('1', 'Todos');
INSERT INTO `core_sistemas_rubro` VALUES ('2', 'Lubricacion');
INSERT INTO `core_sistemas_rubro` VALUES ('3', 'Agua');
INSERT INTO `core_sistemas_rubro` VALUES ('4', 'Servicios');
INSERT INTO `core_sistemas_rubro` VALUES ('5', 'Otro2');

-- ----------------------------
-- Table structure for core_theme_colors
-- ----------------------------
DROP TABLE IF EXISTS `core_theme_colors`;
CREATE TABLE `core_theme_colors` (
  `idTheme` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTheme`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='Fija';

-- ----------------------------
-- Records of core_theme_colors
-- ----------------------------
INSERT INTO `core_theme_colors` VALUES ('1', 'Por defecto');
INSERT INTO `core_theme_colors` VALUES ('2', 'Silver');
INSERT INTO `core_theme_colors` VALUES ('3', 'Silver - Blue');
INSERT INTO `core_theme_colors` VALUES ('4', 'Silver - Red');
INSERT INTO `core_theme_colors` VALUES ('5', 'Silver - Green');
INSERT INTO `core_theme_colors` VALUES ('6', 'Silver - Black');
INSERT INTO `core_theme_colors` VALUES ('7', 'Silver - Yelow');
INSERT INTO `core_theme_colors` VALUES ('8', 'Silver - Clear');
INSERT INTO `core_theme_colors` VALUES ('9', 'Silver - Clear Blue');
INSERT INTO `core_theme_colors` VALUES ('10', 'Silver - Clear Red');
INSERT INTO `core_theme_colors` VALUES ('11', 'Silver - Clear Green');
INSERT INTO `core_theme_colors` VALUES ('12', 'Silver - Clear Black');
INSERT INTO `core_theme_colors` VALUES ('13', 'Silver - Clear Yelow');
INSERT INTO `core_theme_colors` VALUES ('14', '');
INSERT INTO `core_theme_colors` VALUES ('15', '');

-- ----------------------------
-- Table structure for font_awesome
-- ----------------------------
DROP TABLE IF EXISTS `font_awesome`;
CREATE TABLE `font_awesome` (
  `idFont` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `Codigo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idFont`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=latin1 COMMENT='Fija';

-- ----------------------------
-- Records of font_awesome
-- ----------------------------
INSERT INTO `font_awesome` VALUES ('1', 'Manos - piedra', 'fa fa-hand-rock-o');
INSERT INTO `font_awesome` VALUES ('2', 'Manos - lizard', 'fa fa-hand-lizard-o');
INSERT INTO `font_awesome` VALUES ('3', 'Manos - apuntando abajo', 'fa fa-hand-o-down');
INSERT INTO `font_awesome` VALUES ('4', 'Manos - apuntando izquierda', 'fa fa-hand-o-left');
INSERT INTO `font_awesome` VALUES ('5', 'Manos - apuntando derecha', 'fa fa-hand-o-right');
INSERT INTO `font_awesome` VALUES ('6', 'Manos - apuntando arriba', 'fa fa-hand-o-up');
INSERT INTO `font_awesome` VALUES ('7', 'Manos - papel', 'fa fa-hand-paper-o');
INSERT INTO `font_awesome` VALUES ('8', 'Manos - paz', 'fa fa-hand-peace-o');
INSERT INTO `font_awesome` VALUES ('9', 'Manos - apuntar', 'fa fa-hand-pointer-o');
INSERT INTO `font_awesome` VALUES ('10', 'Varios - Calculadora', 'fa fa-calculator');
INSERT INTO `font_awesome` VALUES ('11', 'Manos - tijeras', 'fa fa-hand-scissors-o');
INSERT INTO `font_awesome` VALUES ('12', 'Manos - saludo spock', 'fa fa-hand-spock-o');
INSERT INTO `font_awesome` VALUES ('13', 'Manos - desaprobar ver 1', 'fa fa-thumbs-down');
INSERT INTO `font_awesome` VALUES ('14', 'Manos - desaprobar ver 2', 'fa fa-thumbs-o-down');
INSERT INTO `font_awesome` VALUES ('15', 'Manos - aprobar ver 1', 'fa fa-thumbs-o-up');
INSERT INTO `font_awesome` VALUES ('16', 'Manos - aprobar ver 2', 'fa fa-thumbs-up');
INSERT INTO `font_awesome` VALUES ('17', 'Transporte - Ambulancia', 'fa fa-ambulance');
INSERT INTO `font_awesome` VALUES ('18', 'Transporte - Bicicleta', 'fa fa-bicycle');
INSERT INTO `font_awesome` VALUES ('19', 'Transporte - Bus', 'fa fa-bus');
INSERT INTO `font_awesome` VALUES ('20', 'Transporte - Auto', 'fa fa-car');
INSERT INTO `font_awesome` VALUES ('21', 'Transporte - Motocicleta', 'fa fa-motorcycle');
INSERT INTO `font_awesome` VALUES ('22', 'Transporte - Avion', 'fa fa-plane');
INSERT INTO `font_awesome` VALUES ('23', 'Transporte - Barco', 'fa fa-ship');
INSERT INTO `font_awesome` VALUES ('24', 'Transporte - Metro', 'fa fa-subway');
INSERT INTO `font_awesome` VALUES ('25', 'Transporte - Taxi', 'fa fa-taxi');
INSERT INTO `font_awesome` VALUES ('26', 'Transporte - Tren', 'fa fa-train');
INSERT INTO `font_awesome` VALUES ('27', 'Transporte - Camion', 'fa fa-truck');
INSERT INTO `font_awesome` VALUES ('28', 'Transporte - Silla de ruedas', 'fa fa-wheelchair');
INSERT INTO `font_awesome` VALUES ('29', 'Archivos - Archivo', 'fa fa-file');
INSERT INTO `font_awesome` VALUES ('30', 'Archivos - Comprimido', 'fa fa-file-archive-o');
INSERT INTO `font_awesome` VALUES ('31', 'Archivos - Audio', 'fa fa-file-audio-o');
INSERT INTO `font_awesome` VALUES ('32', 'Archivos - Codigo', 'fa fa-file-code-o');
INSERT INTO `font_awesome` VALUES ('33', 'Archivos - Excel', 'fa fa-file-excel-o');
INSERT INTO `font_awesome` VALUES ('34', 'Archivos - Imagen', 'fa fa-file-image-o');
INSERT INTO `font_awesome` VALUES ('35', 'Archivos - Archivo version 2', 'fa fa-file-o');
INSERT INTO `font_awesome` VALUES ('36', 'Archivos - PDF', 'fa fa-file-pdf-o');
INSERT INTO `font_awesome` VALUES ('37', 'Archivos - Power Point', 'fa fa-file-powerpoint-o');
INSERT INTO `font_awesome` VALUES ('38', 'Archivos - Texto', 'fa fa-file-text');
INSERT INTO `font_awesome` VALUES ('39', 'Archivos - Texto version 2', 'fa fa-file-text-o');
INSERT INTO `font_awesome` VALUES ('40', 'Archivos - Video', 'fa fa-file-video-o');
INSERT INTO `font_awesome` VALUES ('41', 'Archivos - Word', 'fa fa-file-word-o');
INSERT INTO `font_awesome` VALUES ('42', 'Formularios - check-square', 'fa fa-check-square');
INSERT INTO `font_awesome` VALUES ('43', 'Formularios - check-square 2', 'fa fa-check-square-o');
INSERT INTO `font_awesome` VALUES ('44', 'Formularios - circle', 'fa fa-circle');
INSERT INTO `font_awesome` VALUES ('45', 'Formularios - circle 2', 'fa fa-circle-o');
INSERT INTO `font_awesome` VALUES ('46', 'Formularios - dot-circle', 'fa fa-dot-circle-o');
INSERT INTO `font_awesome` VALUES ('47', 'Formularios - minus-square', 'fa fa-minus-square');
INSERT INTO `font_awesome` VALUES ('48', 'Formularios - minus-square 2', 'fa fa-minus-square-o');
INSERT INTO `font_awesome` VALUES ('49', 'Formularios - plus-square', 'fa fa-plus-square');
INSERT INTO `font_awesome` VALUES ('50', 'Formularios - plus-square2', 'fa fa-plus-square-o');
INSERT INTO `font_awesome` VALUES ('51', 'Formularios - square', 'fa fa-square');
INSERT INTO `font_awesome` VALUES ('52', 'Graficos - Linea', 'fa fa-line-chart');
INSERT INTO `font_awesome` VALUES ('53', 'Graficos - Torta', 'fa fa-pie-chart');
INSERT INTO `font_awesome` VALUES ('54', 'Graficos - Area', 'fa fa-area-chart');
INSERT INTO `font_awesome` VALUES ('55', 'Graficos - Barras', 'fa fa-bar-chart');
INSERT INTO `font_awesome` VALUES ('56', 'Dinero - Dolar', 'fa fa-usd');
INSERT INTO `font_awesome` VALUES ('57', 'Dinero - Euro', 'fa fa-eur');
INSERT INTO `font_awesome` VALUES ('58', 'Dinero - Yen', 'fa fa-jpy');
INSERT INTO `font_awesome` VALUES ('59', 'Editor Texto - Alineamiento Centro', 'fa fa-align-center');
INSERT INTO `font_awesome` VALUES ('60', 'Editor Texto - Alineamiento Justificado', 'fa fa-align-justify');
INSERT INTO `font_awesome` VALUES ('61', 'Editor Texto - Alineamiento Izquierda', 'fa fa-align-left');
INSERT INTO `font_awesome` VALUES ('62', 'Editor Texto - Alineamiento Derecha', 'fa fa-align-right');
INSERT INTO `font_awesome` VALUES ('63', 'Editor Texto - Negrita', 'fa fa-bold');
INSERT INTO `font_awesome` VALUES ('64', 'Editor Texto - Enlace', 'fa fa-link');
INSERT INTO `font_awesome` VALUES ('65', 'Editor Texto - Enlace Roto', 'fa fa-chain-broken');
INSERT INTO `font_awesome` VALUES ('66', 'Editor Texto - Columnas', 'fa fa-columns');
INSERT INTO `font_awesome` VALUES ('67', 'Editor Texto - Italica', 'fa fa-italic');
INSERT INTO `font_awesome` VALUES ('68', 'Editor Texto - Cortar', 'fa fa-scissors');
INSERT INTO `font_awesome` VALUES ('69', 'Editor Texto - Lista', 'fa fa-list');
INSERT INTO `font_awesome` VALUES ('70', 'Editor Texto - Lista Alternativa', 'fa fa-list-alt');
INSERT INTO `font_awesome` VALUES ('71', 'Editor Texto - Lista 2', 'fa fa-list-ol');
INSERT INTO `font_awesome` VALUES ('72', 'Editor Texto - Repetir', 'fa fa-repeat');
INSERT INTO `font_awesome` VALUES ('73', 'Editor Texto - Deshacer', 'fa fa-undo');
INSERT INTO `font_awesome` VALUES ('74', 'Editor Texto - Guardar', 'fa fa-floppy-o');
INSERT INTO `font_awesome` VALUES ('75', 'Editor Texto - Tabla', 'fa fa-table');
INSERT INTO `font_awesome` VALUES ('76', 'Internet - Nube', 'fa fa-cloud');
INSERT INTO `font_awesome` VALUES ('77', 'Internet - Nube descargar', 'fa fa-cloud-download');
INSERT INTO `font_awesome` VALUES ('78', 'Internet - Nube subir', 'fa fa-cloud-upload');
INSERT INTO `font_awesome` VALUES ('79', 'Internet - Internet Explorer', 'fa fa-internet-explorer');
INSERT INTO `font_awesome` VALUES ('80', 'Internet - Firefox', 'fa fa-firefox');
INSERT INTO `font_awesome` VALUES ('81', 'Internet - Facebook', 'fa fa-facebook');
INSERT INTO `font_awesome` VALUES ('82', 'Internet - Youtube', 'fa fa-youtube');
INSERT INTO `font_awesome` VALUES ('83', 'Internet - Whatsapp', 'fa fa-whatsapp');
INSERT INTO `font_awesome` VALUES ('84', 'Calendario - Normal', 'fa fa-calendar');
INSERT INTO `font_awesome` VALUES ('85', 'Calendario - Check', 'fa fa-calendar-check-o');
INSERT INTO `font_awesome` VALUES ('86', 'Calendario - Menos', 'fa fa-calendar-minus-o');
INSERT INTO `font_awesome` VALUES ('87', 'Calendario - Vacio', 'fa fa-calendar-o');
INSERT INTO `font_awesome` VALUES ('88', 'Calendario - Mas', 'fa fa-calendar-plus-o');
INSERT INTO `font_awesome` VALUES ('89', 'Calendario - Cancelado', 'fa fa-calendar-times-o');
INSERT INTO `font_awesome` VALUES ('90', 'Varios - Camara', 'fa fa-camera');
INSERT INTO `font_awesome` VALUES ('91', 'Varios - Correo', 'fa fa-envelope');
INSERT INTO `font_awesome` VALUES ('92', 'Varios - Correo 2', 'fa fa-envelope-o');
INSERT INTO `font_awesome` VALUES ('93', 'Varios - Descargar', 'fa fa-download');
INSERT INTO `font_awesome` VALUES ('94', 'Varios - Base de Datos', 'fa fa-database');
INSERT INTO `font_awesome` VALUES ('95', 'Varios - Cafe', 'fa fa-coffee');
INSERT INTO `font_awesome` VALUES ('96', 'Varios - Engranaje', 'fa fa-cog');
INSERT INTO `font_awesome` VALUES ('97', 'Varios - Engranajes', 'fa fa-cogs');
INSERT INTO `font_awesome` VALUES ('98', 'Varios - Fax', 'fa fa-fax');
INSERT INTO `font_awesome` VALUES ('99', 'Varios - Ojo', 'fa fa-eye');
INSERT INTO `font_awesome` VALUES ('100', 'Varios - RSS', 'fa fa-rss');
INSERT INTO `font_awesome` VALUES ('101', 'Varios - Mujer', 'fa fa-female');
INSERT INTO `font_awesome` VALUES ('102', 'Varios - Hombre', 'fa fa-male');
INSERT INTO `font_awesome` VALUES ('103', 'Varios - Fuego', 'fa fa-fire');
INSERT INTO `font_awesome` VALUES ('104', 'Varios - Estintor de fuego', 'fa fa-fire-extinguisher');
INSERT INTO `font_awesome` VALUES ('105', 'Varios - Bandera', 'fa fa-flag');
INSERT INTO `font_awesome` VALUES ('106', 'Varios - Mundo', 'fa fa-globe');
INSERT INTO `font_awesome` VALUES ('107', 'Varios - Graduacion', 'fa fa-graduation-cap');
INSERT INTO `font_awesome` VALUES ('108', 'Varios - Usuarios', 'fa fa-users');
INSERT INTO `font_awesome` VALUES ('109', 'Varios - Informacion', 'fa fa-info');
INSERT INTO `font_awesome` VALUES ('110', 'Varios - Universidad', 'fa fa-university');
INSERT INTO `font_awesome` VALUES ('111', 'Varios - Llave', 'fa fa-key');
INSERT INTO `font_awesome` VALUES ('112', 'Varios - Portatil', 'fa fa-laptop');
INSERT INTO `font_awesome` VALUES ('113', 'Varios - Mapa', 'fa fa-map');
INSERT INTO `font_awesome` VALUES ('114', 'Varios - Marcador mapa', 'fa fa-map-marker');
INSERT INTO `font_awesome` VALUES ('115', 'Varios - Mapa 2', 'fa fa-map-o');
INSERT INTO `font_awesome` VALUES ('116', 'Varios - Musica', 'fa fa-music');
INSERT INTO `font_awesome` VALUES ('117', 'Varios - Diario', 'fa fa-newspaper-o');
INSERT INTO `font_awesome` VALUES ('118', 'Varios - Telefono', 'fa fa-phone');
INSERT INTO `font_awesome` VALUES ('119', 'Varios - Impresora', 'fa fa-print');
INSERT INTO `font_awesome` VALUES ('120', 'Varios - Apagar', 'fa fa-power-off');
INSERT INTO `font_awesome` VALUES ('121', 'Varios - Carro de Compras', 'fa fa-shopping-cart');
INSERT INTO `font_awesome` VALUES ('122', 'Varios - Mapa del sitio', 'fa fa-sitemap');
INSERT INTO `font_awesome` VALUES ('123', 'Varios - Abrir', 'fa fa-unlock-alt');
INSERT INTO `font_awesome` VALUES ('124', 'Varios - Cerrar', 'fa fa-lock');
INSERT INTO `font_awesome` VALUES ('125', 'Varios - Usuario', 'fa fa-user');
INSERT INTO `font_awesome` VALUES ('126', 'Varios - Agregar usuario', 'fa fa-user-plus');
INSERT INTO `font_awesome` VALUES ('127', 'Varios - Eliminar usuario', 'fa fa-user-times');
INSERT INTO `font_awesome` VALUES ('128', 'Varios - Herramienta', 'fa fa-wrench');
INSERT INTO `font_awesome` VALUES ('129', 'Varios - Lupa', 'fa fa-search');
INSERT INTO `font_awesome` VALUES ('130', 'Varios - Cajas', 'fa fa-cubes');
INSERT INTO `font_awesome` VALUES ('131', 'Varios - Persona', 'fa fa-user-secret');
INSERT INTO `font_awesome` VALUES ('132', 'Varios - Intercambio', 'fa fa-exchange');
INSERT INTO `font_awesome` VALUES ('133', 'Varios - Caja', 'fa fa-cube');

-- ----------------------------
-- Table structure for ubicacion_departamento
-- ----------------------------
DROP TABLE IF EXISTS `ubicacion_departamento`;
CREATE TABLE `ubicacion_departamento` (
  `idDepartamento` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(80) NOT NULL,
  PRIMARY KEY (`idDepartamento`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ubicacion_departamento
-- ----------------------------
INSERT INTO `ubicacion_departamento` VALUES ('1', 'Amazonas');
INSERT INTO `ubicacion_departamento` VALUES ('2', 'Ancash');
INSERT INTO `ubicacion_departamento` VALUES ('3', 'Apurimac');
INSERT INTO `ubicacion_departamento` VALUES ('4', 'Arequipa');
INSERT INTO `ubicacion_departamento` VALUES ('5', 'Ayacucho');
INSERT INTO `ubicacion_departamento` VALUES ('6', 'Cajamarca');
INSERT INTO `ubicacion_departamento` VALUES ('7', 'Callao');
INSERT INTO `ubicacion_departamento` VALUES ('8', 'Cusco');
INSERT INTO `ubicacion_departamento` VALUES ('9', 'Huancavelica');
INSERT INTO `ubicacion_departamento` VALUES ('10', 'Huanuco');
INSERT INTO `ubicacion_departamento` VALUES ('11', 'Ica');
INSERT INTO `ubicacion_departamento` VALUES ('12', 'Junin');
INSERT INTO `ubicacion_departamento` VALUES ('13', 'La Libertad');
INSERT INTO `ubicacion_departamento` VALUES ('14', 'Lambayeque');
INSERT INTO `ubicacion_departamento` VALUES ('15', 'Lima');
INSERT INTO `ubicacion_departamento` VALUES ('16', 'Loreto');
INSERT INTO `ubicacion_departamento` VALUES ('17', 'Madre de Dios');
INSERT INTO `ubicacion_departamento` VALUES ('18', 'Moquegua');
INSERT INTO `ubicacion_departamento` VALUES ('19', 'Pasco');
INSERT INTO `ubicacion_departamento` VALUES ('20', 'Piura');
INSERT INTO `ubicacion_departamento` VALUES ('21', 'Puno');
INSERT INTO `ubicacion_departamento` VALUES ('22', 'San Martín');
INSERT INTO `ubicacion_departamento` VALUES ('23', 'Tacna');
INSERT INTO `ubicacion_departamento` VALUES ('24', 'Tumbes');
INSERT INTO `ubicacion_departamento` VALUES ('25', 'Ucayali');

-- ----------------------------
-- Table structure for ubicacion_distrito
-- ----------------------------
DROP TABLE IF EXISTS `ubicacion_distrito`;
CREATE TABLE `ubicacion_distrito` (
  `idDistrito` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idDepartamento` int(11) unsigned NOT NULL,
  `idProvincia` int(11) unsigned NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  PRIMARY KEY (`idDistrito`)
) ENGINE=MyISAM AUTO_INCREMENT=1830 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ubicacion_distrito
-- ----------------------------
INSERT INTO `ubicacion_distrito` VALUES ('1', '1', '1', 'Chachapoyas');
INSERT INTO `ubicacion_distrito` VALUES ('2', '1', '1', 'Asuncion');
INSERT INTO `ubicacion_distrito` VALUES ('3', '1', '1', 'Balsas');
INSERT INTO `ubicacion_distrito` VALUES ('4', '1', '1', 'Cheto');
INSERT INTO `ubicacion_distrito` VALUES ('5', '1', '1', 'Chiliquin');
INSERT INTO `ubicacion_distrito` VALUES ('6', '1', '1', 'Chuquibamba');
INSERT INTO `ubicacion_distrito` VALUES ('7', '1', '1', 'Granada');
INSERT INTO `ubicacion_distrito` VALUES ('8', '1', '1', 'Huancas');
INSERT INTO `ubicacion_distrito` VALUES ('9', '1', '1', 'La Jalca');
INSERT INTO `ubicacion_distrito` VALUES ('10', '1', '1', 'Leimebamba');
INSERT INTO `ubicacion_distrito` VALUES ('11', '1', '1', 'Levanto');
INSERT INTO `ubicacion_distrito` VALUES ('12', '1', '1', 'Magdalena');
INSERT INTO `ubicacion_distrito` VALUES ('13', '1', '1', 'Mariscal Castilla');
INSERT INTO `ubicacion_distrito` VALUES ('14', '1', '1', 'Molinopampa');
INSERT INTO `ubicacion_distrito` VALUES ('15', '1', '1', 'Montevideo');
INSERT INTO `ubicacion_distrito` VALUES ('16', '1', '1', 'Olleros');
INSERT INTO `ubicacion_distrito` VALUES ('17', '1', '1', 'Quinjalca');
INSERT INTO `ubicacion_distrito` VALUES ('18', '1', '1', 'San Francisco De Daguas');
INSERT INTO `ubicacion_distrito` VALUES ('19', '1', '1', 'San Isidro De Maino');
INSERT INTO `ubicacion_distrito` VALUES ('20', '1', '1', 'Soloco');
INSERT INTO `ubicacion_distrito` VALUES ('21', '1', '1', 'Sonche');
INSERT INTO `ubicacion_distrito` VALUES ('22', '1', '2', 'La Peca');
INSERT INTO `ubicacion_distrito` VALUES ('23', '1', '2', 'Aramango');
INSERT INTO `ubicacion_distrito` VALUES ('24', '1', '2', 'Copallin');
INSERT INTO `ubicacion_distrito` VALUES ('25', '1', '2', 'El Parco');
INSERT INTO `ubicacion_distrito` VALUES ('26', '1', '2', 'Imaza');
INSERT INTO `ubicacion_distrito` VALUES ('27', '1', '3', 'Jumbilla');
INSERT INTO `ubicacion_distrito` VALUES ('28', '1', '3', 'Chisquilla');
INSERT INTO `ubicacion_distrito` VALUES ('29', '1', '3', 'Churuja');
INSERT INTO `ubicacion_distrito` VALUES ('30', '1', '3', 'Corosha');
INSERT INTO `ubicacion_distrito` VALUES ('31', '1', '3', 'Cuispes');
INSERT INTO `ubicacion_distrito` VALUES ('32', '1', '3', 'Florida');
INSERT INTO `ubicacion_distrito` VALUES ('33', '1', '3', 'Jazan');
INSERT INTO `ubicacion_distrito` VALUES ('34', '1', '3', 'Recta');
INSERT INTO `ubicacion_distrito` VALUES ('35', '1', '3', 'San Carlos');
INSERT INTO `ubicacion_distrito` VALUES ('36', '1', '3', 'Shipasbamba');
INSERT INTO `ubicacion_distrito` VALUES ('37', '1', '3', 'Valera');
INSERT INTO `ubicacion_distrito` VALUES ('38', '1', '3', 'Yambrasbamba');
INSERT INTO `ubicacion_distrito` VALUES ('39', '1', '4', 'Nieva');
INSERT INTO `ubicacion_distrito` VALUES ('40', '1', '4', 'El Cenepa');
INSERT INTO `ubicacion_distrito` VALUES ('41', '1', '4', 'Rio Santiago');
INSERT INTO `ubicacion_distrito` VALUES ('42', '1', '5', 'Lamud');
INSERT INTO `ubicacion_distrito` VALUES ('43', '1', '5', 'Camporredondo');
INSERT INTO `ubicacion_distrito` VALUES ('44', '1', '5', 'Cocabamba');
INSERT INTO `ubicacion_distrito` VALUES ('45', '1', '5', 'Colcamar');
INSERT INTO `ubicacion_distrito` VALUES ('46', '1', '5', 'Conila');
INSERT INTO `ubicacion_distrito` VALUES ('47', '1', '5', 'Inguilpata');
INSERT INTO `ubicacion_distrito` VALUES ('48', '1', '5', 'Longuita');
INSERT INTO `ubicacion_distrito` VALUES ('49', '1', '5', 'Lonya Chico');
INSERT INTO `ubicacion_distrito` VALUES ('50', '1', '5', 'Luya');
INSERT INTO `ubicacion_distrito` VALUES ('51', '1', '5', 'Luya Viejo');
INSERT INTO `ubicacion_distrito` VALUES ('52', '1', '5', 'Maria');
INSERT INTO `ubicacion_distrito` VALUES ('53', '1', '5', 'Ocalli');
INSERT INTO `ubicacion_distrito` VALUES ('54', '1', '5', 'Ocumal');
INSERT INTO `ubicacion_distrito` VALUES ('55', '1', '5', 'Pisuquia');
INSERT INTO `ubicacion_distrito` VALUES ('56', '1', '5', 'Providencia');
INSERT INTO `ubicacion_distrito` VALUES ('57', '1', '5', 'San Cristobal');
INSERT INTO `ubicacion_distrito` VALUES ('58', '1', '5', 'San Francisco Del Yeso');
INSERT INTO `ubicacion_distrito` VALUES ('59', '1', '5', 'San Jeronimo');
INSERT INTO `ubicacion_distrito` VALUES ('60', '1', '5', 'San Juan De Lopecancha');
INSERT INTO `ubicacion_distrito` VALUES ('61', '1', '5', 'Santa Catalina');
INSERT INTO `ubicacion_distrito` VALUES ('62', '1', '5', 'Santo Tomas');
INSERT INTO `ubicacion_distrito` VALUES ('63', '1', '5', 'Tingo');
INSERT INTO `ubicacion_distrito` VALUES ('64', '1', '5', 'Trita');
INSERT INTO `ubicacion_distrito` VALUES ('65', '1', '6', 'San Nicolas');
INSERT INTO `ubicacion_distrito` VALUES ('66', '1', '6', 'Chirimoto');
INSERT INTO `ubicacion_distrito` VALUES ('67', '1', '6', 'Cochamal');
INSERT INTO `ubicacion_distrito` VALUES ('68', '1', '6', 'Huambo');
INSERT INTO `ubicacion_distrito` VALUES ('69', '1', '6', 'Limabamba');
INSERT INTO `ubicacion_distrito` VALUES ('70', '1', '6', 'Longar');
INSERT INTO `ubicacion_distrito` VALUES ('71', '1', '6', 'Mariscal Benavides');
INSERT INTO `ubicacion_distrito` VALUES ('72', '1', '6', 'Milpuc');
INSERT INTO `ubicacion_distrito` VALUES ('73', '1', '6', 'Omia');
INSERT INTO `ubicacion_distrito` VALUES ('74', '1', '6', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('75', '1', '6', 'Totora');
INSERT INTO `ubicacion_distrito` VALUES ('76', '1', '6', 'Vista Alegre');
INSERT INTO `ubicacion_distrito` VALUES ('77', '1', '7', 'Bagua Grande');
INSERT INTO `ubicacion_distrito` VALUES ('78', '1', '7', 'Cajaruro');
INSERT INTO `ubicacion_distrito` VALUES ('79', '1', '7', 'Cumba');
INSERT INTO `ubicacion_distrito` VALUES ('80', '1', '7', 'El Milagro');
INSERT INTO `ubicacion_distrito` VALUES ('81', '1', '7', 'Jamalca');
INSERT INTO `ubicacion_distrito` VALUES ('82', '1', '7', 'Lonya Grande');
INSERT INTO `ubicacion_distrito` VALUES ('83', '1', '7', 'Yamon');
INSERT INTO `ubicacion_distrito` VALUES ('84', '2', '8', 'Huaraz');
INSERT INTO `ubicacion_distrito` VALUES ('85', '2', '8', 'Cochabamba');
INSERT INTO `ubicacion_distrito` VALUES ('86', '2', '8', 'Colcabamba');
INSERT INTO `ubicacion_distrito` VALUES ('87', '2', '8', 'Huanchay');
INSERT INTO `ubicacion_distrito` VALUES ('88', '2', '8', 'Independencia');
INSERT INTO `ubicacion_distrito` VALUES ('89', '2', '8', 'Jangas');
INSERT INTO `ubicacion_distrito` VALUES ('90', '2', '8', 'La Libertad');
INSERT INTO `ubicacion_distrito` VALUES ('91', '2', '8', 'Olleros');
INSERT INTO `ubicacion_distrito` VALUES ('92', '2', '8', 'Pampas');
INSERT INTO `ubicacion_distrito` VALUES ('93', '2', '8', 'Pariacoto');
INSERT INTO `ubicacion_distrito` VALUES ('94', '2', '8', 'Pira');
INSERT INTO `ubicacion_distrito` VALUES ('95', '2', '8', 'Tarica');
INSERT INTO `ubicacion_distrito` VALUES ('96', '2', '9', 'Aija');
INSERT INTO `ubicacion_distrito` VALUES ('97', '2', '9', 'Coris');
INSERT INTO `ubicacion_distrito` VALUES ('98', '2', '9', 'Huacllan');
INSERT INTO `ubicacion_distrito` VALUES ('99', '2', '9', 'La Merced');
INSERT INTO `ubicacion_distrito` VALUES ('100', '2', '9', 'Succha');
INSERT INTO `ubicacion_distrito` VALUES ('101', '2', '10', 'Llamellin');
INSERT INTO `ubicacion_distrito` VALUES ('102', '2', '10', 'Aczo');
INSERT INTO `ubicacion_distrito` VALUES ('103', '2', '10', 'Chaccho');
INSERT INTO `ubicacion_distrito` VALUES ('104', '2', '10', 'Chingas');
INSERT INTO `ubicacion_distrito` VALUES ('105', '2', '10', 'Mirgas');
INSERT INTO `ubicacion_distrito` VALUES ('106', '2', '10', 'San Juan De Rontoy');
INSERT INTO `ubicacion_distrito` VALUES ('107', '2', '11', 'Chacas');
INSERT INTO `ubicacion_distrito` VALUES ('108', '2', '11', 'Acochaca');
INSERT INTO `ubicacion_distrito` VALUES ('109', '2', '12', 'Chiquian');
INSERT INTO `ubicacion_distrito` VALUES ('110', '2', '12', 'Abelardo Pardo Lezameta');
INSERT INTO `ubicacion_distrito` VALUES ('111', '2', '12', 'Antonio Raymondi');
INSERT INTO `ubicacion_distrito` VALUES ('112', '2', '12', 'Aquia');
INSERT INTO `ubicacion_distrito` VALUES ('113', '2', '12', 'Cajacay');
INSERT INTO `ubicacion_distrito` VALUES ('114', '2', '12', 'Canis');
INSERT INTO `ubicacion_distrito` VALUES ('115', '2', '12', 'Colquioc');
INSERT INTO `ubicacion_distrito` VALUES ('116', '2', '12', 'Huallanca');
INSERT INTO `ubicacion_distrito` VALUES ('117', '2', '12', 'Huasta');
INSERT INTO `ubicacion_distrito` VALUES ('118', '2', '12', 'Huayllacayan');
INSERT INTO `ubicacion_distrito` VALUES ('119', '2', '12', 'La Primavera');
INSERT INTO `ubicacion_distrito` VALUES ('120', '2', '12', 'Mangas');
INSERT INTO `ubicacion_distrito` VALUES ('121', '2', '12', 'Pacllon');
INSERT INTO `ubicacion_distrito` VALUES ('122', '2', '12', 'San Miguel De Corpanqui');
INSERT INTO `ubicacion_distrito` VALUES ('123', '2', '12', 'Ticllos');
INSERT INTO `ubicacion_distrito` VALUES ('124', '2', '13', 'Carhuaz');
INSERT INTO `ubicacion_distrito` VALUES ('125', '2', '13', 'Acopampa');
INSERT INTO `ubicacion_distrito` VALUES ('126', '2', '13', 'Amashca');
INSERT INTO `ubicacion_distrito` VALUES ('127', '2', '13', 'Anta');
INSERT INTO `ubicacion_distrito` VALUES ('128', '2', '13', 'Ataquero');
INSERT INTO `ubicacion_distrito` VALUES ('129', '2', '13', 'Marcara');
INSERT INTO `ubicacion_distrito` VALUES ('130', '2', '13', 'Pariahuanca');
INSERT INTO `ubicacion_distrito` VALUES ('131', '2', '13', 'San Miguel De Aco');
INSERT INTO `ubicacion_distrito` VALUES ('132', '2', '13', 'Shilla');
INSERT INTO `ubicacion_distrito` VALUES ('133', '2', '13', 'Tinco');
INSERT INTO `ubicacion_distrito` VALUES ('134', '2', '13', 'Yungar');
INSERT INTO `ubicacion_distrito` VALUES ('135', '2', '14', 'San Luis');
INSERT INTO `ubicacion_distrito` VALUES ('136', '2', '14', 'San Nicolas');
INSERT INTO `ubicacion_distrito` VALUES ('137', '2', '14', 'Yauya');
INSERT INTO `ubicacion_distrito` VALUES ('138', '2', '15', 'Casma');
INSERT INTO `ubicacion_distrito` VALUES ('139', '2', '15', 'Buena Vista Alta');
INSERT INTO `ubicacion_distrito` VALUES ('140', '2', '15', 'Comandante Noel');
INSERT INTO `ubicacion_distrito` VALUES ('141', '2', '15', 'Yautan');
INSERT INTO `ubicacion_distrito` VALUES ('142', '2', '16', 'Corongo');
INSERT INTO `ubicacion_distrito` VALUES ('143', '2', '16', 'Aco');
INSERT INTO `ubicacion_distrito` VALUES ('144', '2', '16', 'Bambas');
INSERT INTO `ubicacion_distrito` VALUES ('145', '2', '16', 'Cusca');
INSERT INTO `ubicacion_distrito` VALUES ('146', '2', '16', 'La Pampa');
INSERT INTO `ubicacion_distrito` VALUES ('147', '2', '16', 'Yanac');
INSERT INTO `ubicacion_distrito` VALUES ('148', '2', '16', 'Yupan');
INSERT INTO `ubicacion_distrito` VALUES ('149', '2', '17', 'Huari');
INSERT INTO `ubicacion_distrito` VALUES ('150', '2', '17', 'Anra');
INSERT INTO `ubicacion_distrito` VALUES ('151', '2', '17', 'Cajay');
INSERT INTO `ubicacion_distrito` VALUES ('152', '2', '17', 'Chavin De Huantar');
INSERT INTO `ubicacion_distrito` VALUES ('153', '2', '17', 'Huacachi');
INSERT INTO `ubicacion_distrito` VALUES ('154', '2', '17', 'Huacchis');
INSERT INTO `ubicacion_distrito` VALUES ('155', '2', '17', 'Huachis');
INSERT INTO `ubicacion_distrito` VALUES ('156', '2', '17', 'Huantar');
INSERT INTO `ubicacion_distrito` VALUES ('157', '2', '17', 'Masin');
INSERT INTO `ubicacion_distrito` VALUES ('158', '2', '17', 'Paucas');
INSERT INTO `ubicacion_distrito` VALUES ('159', '2', '17', 'Ponto');
INSERT INTO `ubicacion_distrito` VALUES ('160', '2', '17', 'Rahuapampa');
INSERT INTO `ubicacion_distrito` VALUES ('161', '2', '17', 'Rapayan');
INSERT INTO `ubicacion_distrito` VALUES ('162', '2', '17', 'San Marcos');
INSERT INTO `ubicacion_distrito` VALUES ('163', '2', '17', 'San Pedro De Chana');
INSERT INTO `ubicacion_distrito` VALUES ('164', '2', '17', 'Uco');
INSERT INTO `ubicacion_distrito` VALUES ('165', '2', '18', 'Huarmey');
INSERT INTO `ubicacion_distrito` VALUES ('166', '2', '18', 'Cochapeti');
INSERT INTO `ubicacion_distrito` VALUES ('167', '2', '18', 'Culebras');
INSERT INTO `ubicacion_distrito` VALUES ('168', '2', '18', 'Huayan');
INSERT INTO `ubicacion_distrito` VALUES ('169', '2', '18', 'Malvas');
INSERT INTO `ubicacion_distrito` VALUES ('170', '2', '19', 'Caraz');
INSERT INTO `ubicacion_distrito` VALUES ('171', '2', '19', 'Huallanca');
INSERT INTO `ubicacion_distrito` VALUES ('172', '2', '19', 'Huata');
INSERT INTO `ubicacion_distrito` VALUES ('173', '2', '19', 'Huaylas');
INSERT INTO `ubicacion_distrito` VALUES ('174', '2', '19', 'Mato');
INSERT INTO `ubicacion_distrito` VALUES ('175', '2', '19', 'Pamparomas');
INSERT INTO `ubicacion_distrito` VALUES ('176', '2', '19', 'Pueblo Libre');
INSERT INTO `ubicacion_distrito` VALUES ('177', '2', '19', 'Santa Cruz');
INSERT INTO `ubicacion_distrito` VALUES ('178', '2', '19', 'Santo Toribio');
INSERT INTO `ubicacion_distrito` VALUES ('179', '2', '19', 'Yuracmarca');
INSERT INTO `ubicacion_distrito` VALUES ('180', '2', '20', 'Piscobamba');
INSERT INTO `ubicacion_distrito` VALUES ('181', '2', '20', 'Casca');
INSERT INTO `ubicacion_distrito` VALUES ('182', '2', '20', 'Eleazar Guzman Barron');
INSERT INTO `ubicacion_distrito` VALUES ('183', '2', '20', 'Fidel Olivas Escudero');
INSERT INTO `ubicacion_distrito` VALUES ('184', '2', '20', 'Llama');
INSERT INTO `ubicacion_distrito` VALUES ('185', '2', '20', 'Llumpa');
INSERT INTO `ubicacion_distrito` VALUES ('186', '2', '20', 'Lucma');
INSERT INTO `ubicacion_distrito` VALUES ('187', '2', '20', 'Musga');
INSERT INTO `ubicacion_distrito` VALUES ('188', '2', '21', 'Ocros');
INSERT INTO `ubicacion_distrito` VALUES ('189', '2', '21', 'Acas');
INSERT INTO `ubicacion_distrito` VALUES ('190', '2', '21', 'Cajamarquilla');
INSERT INTO `ubicacion_distrito` VALUES ('191', '2', '21', 'Carhuapampa');
INSERT INTO `ubicacion_distrito` VALUES ('192', '2', '21', 'Cochas');
INSERT INTO `ubicacion_distrito` VALUES ('193', '2', '21', 'Congas');
INSERT INTO `ubicacion_distrito` VALUES ('194', '2', '21', 'Llipa');
INSERT INTO `ubicacion_distrito` VALUES ('195', '2', '21', 'San Cristobal De Rajan');
INSERT INTO `ubicacion_distrito` VALUES ('196', '2', '21', 'San Pedro');
INSERT INTO `ubicacion_distrito` VALUES ('197', '2', '21', 'Santiago De Chilcas');
INSERT INTO `ubicacion_distrito` VALUES ('198', '2', '22', 'Cabana');
INSERT INTO `ubicacion_distrito` VALUES ('199', '2', '22', 'Bolognesi');
INSERT INTO `ubicacion_distrito` VALUES ('200', '2', '22', 'Conchucos');
INSERT INTO `ubicacion_distrito` VALUES ('201', '2', '22', 'Huacaschuque');
INSERT INTO `ubicacion_distrito` VALUES ('202', '2', '22', 'Huandoval');
INSERT INTO `ubicacion_distrito` VALUES ('203', '2', '22', 'Lacabamba');
INSERT INTO `ubicacion_distrito` VALUES ('204', '2', '22', 'Llapo');
INSERT INTO `ubicacion_distrito` VALUES ('205', '2', '22', 'Pallasca');
INSERT INTO `ubicacion_distrito` VALUES ('206', '2', '22', 'Pampas');
INSERT INTO `ubicacion_distrito` VALUES ('207', '2', '22', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('208', '2', '22', 'Tauca');
INSERT INTO `ubicacion_distrito` VALUES ('209', '2', '23', 'Pomabamba');
INSERT INTO `ubicacion_distrito` VALUES ('210', '2', '23', 'Huayllan');
INSERT INTO `ubicacion_distrito` VALUES ('211', '2', '23', 'Parobamba');
INSERT INTO `ubicacion_distrito` VALUES ('212', '2', '23', 'Quinuabamba');
INSERT INTO `ubicacion_distrito` VALUES ('213', '2', '24', 'Recuay');
INSERT INTO `ubicacion_distrito` VALUES ('214', '2', '24', 'Catac');
INSERT INTO `ubicacion_distrito` VALUES ('215', '2', '24', 'Cotaparaco');
INSERT INTO `ubicacion_distrito` VALUES ('216', '2', '24', 'Huayllapampa');
INSERT INTO `ubicacion_distrito` VALUES ('217', '2', '24', 'Llacllin');
INSERT INTO `ubicacion_distrito` VALUES ('218', '2', '24', 'Marca');
INSERT INTO `ubicacion_distrito` VALUES ('219', '2', '24', 'Pampas Chico');
INSERT INTO `ubicacion_distrito` VALUES ('220', '2', '24', 'Pararin');
INSERT INTO `ubicacion_distrito` VALUES ('221', '2', '24', 'Tapacocha');
INSERT INTO `ubicacion_distrito` VALUES ('222', '2', '24', 'Ticapampa');
INSERT INTO `ubicacion_distrito` VALUES ('223', '2', '25', 'Chimbote');
INSERT INTO `ubicacion_distrito` VALUES ('224', '2', '25', 'Caceres Del Peru');
INSERT INTO `ubicacion_distrito` VALUES ('225', '2', '25', 'Coishco');
INSERT INTO `ubicacion_distrito` VALUES ('226', '2', '25', 'Macate');
INSERT INTO `ubicacion_distrito` VALUES ('227', '2', '25', 'Moro');
INSERT INTO `ubicacion_distrito` VALUES ('228', '2', '25', 'Nepeña');
INSERT INTO `ubicacion_distrito` VALUES ('229', '2', '25', 'Samanco');
INSERT INTO `ubicacion_distrito` VALUES ('230', '2', '25', 'Santa');
INSERT INTO `ubicacion_distrito` VALUES ('231', '2', '25', 'Nuevo Chimbote');
INSERT INTO `ubicacion_distrito` VALUES ('232', '2', '26', 'Sihuas');
INSERT INTO `ubicacion_distrito` VALUES ('233', '2', '26', 'Acobamba');
INSERT INTO `ubicacion_distrito` VALUES ('234', '2', '26', 'Alfonso Ugarte');
INSERT INTO `ubicacion_distrito` VALUES ('235', '2', '26', 'Cashapampa');
INSERT INTO `ubicacion_distrito` VALUES ('236', '2', '26', 'Chingalpo');
INSERT INTO `ubicacion_distrito` VALUES ('237', '2', '26', 'Huayllabamba');
INSERT INTO `ubicacion_distrito` VALUES ('238', '2', '26', 'Quiches');
INSERT INTO `ubicacion_distrito` VALUES ('239', '2', '26', 'Ragash');
INSERT INTO `ubicacion_distrito` VALUES ('240', '2', '26', 'San Juan');
INSERT INTO `ubicacion_distrito` VALUES ('241', '2', '26', 'Sicsibamba');
INSERT INTO `ubicacion_distrito` VALUES ('242', '2', '27', 'Yungay');
INSERT INTO `ubicacion_distrito` VALUES ('243', '2', '27', 'Cascapara');
INSERT INTO `ubicacion_distrito` VALUES ('244', '2', '27', 'Mancos');
INSERT INTO `ubicacion_distrito` VALUES ('245', '2', '27', 'Matacoto');
INSERT INTO `ubicacion_distrito` VALUES ('246', '2', '27', 'Quillo');
INSERT INTO `ubicacion_distrito` VALUES ('247', '2', '27', 'Ranrahirca');
INSERT INTO `ubicacion_distrito` VALUES ('248', '2', '27', 'Shupluy');
INSERT INTO `ubicacion_distrito` VALUES ('249', '2', '27', 'Yanama');
INSERT INTO `ubicacion_distrito` VALUES ('250', '3', '28', 'Abancay');
INSERT INTO `ubicacion_distrito` VALUES ('251', '3', '28', 'Chacoche');
INSERT INTO `ubicacion_distrito` VALUES ('252', '3', '28', 'Circa');
INSERT INTO `ubicacion_distrito` VALUES ('253', '3', '28', 'Curahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('254', '3', '28', 'Huanipaca');
INSERT INTO `ubicacion_distrito` VALUES ('255', '3', '28', 'Lambrama');
INSERT INTO `ubicacion_distrito` VALUES ('256', '3', '28', 'Pichirhua');
INSERT INTO `ubicacion_distrito` VALUES ('257', '3', '28', 'San Pedro De Cachora');
INSERT INTO `ubicacion_distrito` VALUES ('258', '3', '28', 'Tamburco');
INSERT INTO `ubicacion_distrito` VALUES ('259', '3', '29', 'Andahuaylas');
INSERT INTO `ubicacion_distrito` VALUES ('260', '3', '29', 'Andarapa');
INSERT INTO `ubicacion_distrito` VALUES ('261', '3', '29', 'Chiara');
INSERT INTO `ubicacion_distrito` VALUES ('262', '3', '29', 'Huancarama');
INSERT INTO `ubicacion_distrito` VALUES ('263', '3', '29', 'Huancaray');
INSERT INTO `ubicacion_distrito` VALUES ('264', '3', '29', 'Huayana');
INSERT INTO `ubicacion_distrito` VALUES ('265', '3', '29', 'Kishuara');
INSERT INTO `ubicacion_distrito` VALUES ('266', '3', '29', 'Pacobamba');
INSERT INTO `ubicacion_distrito` VALUES ('267', '3', '29', 'Pacucha');
INSERT INTO `ubicacion_distrito` VALUES ('268', '3', '29', 'Pampachiri');
INSERT INTO `ubicacion_distrito` VALUES ('269', '3', '29', 'Pomacocha');
INSERT INTO `ubicacion_distrito` VALUES ('270', '3', '29', 'San Antonio De Cachi');
INSERT INTO `ubicacion_distrito` VALUES ('271', '3', '29', 'San Jeronimo');
INSERT INTO `ubicacion_distrito` VALUES ('272', '3', '29', 'San Miguel De Chaccrampa');
INSERT INTO `ubicacion_distrito` VALUES ('273', '3', '29', 'Santa Maria De Chicmo');
INSERT INTO `ubicacion_distrito` VALUES ('274', '3', '29', 'Talavera');
INSERT INTO `ubicacion_distrito` VALUES ('275', '3', '29', 'Tumay Huaraca');
INSERT INTO `ubicacion_distrito` VALUES ('276', '3', '29', 'Turpo');
INSERT INTO `ubicacion_distrito` VALUES ('277', '3', '29', 'Kaquiabamba');
INSERT INTO `ubicacion_distrito` VALUES ('278', '3', '30', 'Antabamba');
INSERT INTO `ubicacion_distrito` VALUES ('279', '3', '30', 'El Oro');
INSERT INTO `ubicacion_distrito` VALUES ('280', '3', '30', 'Huaquirca');
INSERT INTO `ubicacion_distrito` VALUES ('281', '3', '30', 'Juan Espinoza Medrano');
INSERT INTO `ubicacion_distrito` VALUES ('282', '3', '30', 'Oropesa');
INSERT INTO `ubicacion_distrito` VALUES ('283', '3', '30', 'Pachaconas');
INSERT INTO `ubicacion_distrito` VALUES ('284', '3', '30', 'Sabaino');
INSERT INTO `ubicacion_distrito` VALUES ('285', '3', '31', 'Chalhuanca');
INSERT INTO `ubicacion_distrito` VALUES ('286', '3', '31', 'Capaya');
INSERT INTO `ubicacion_distrito` VALUES ('287', '3', '31', 'Caraybamba');
INSERT INTO `ubicacion_distrito` VALUES ('288', '3', '31', 'Chapimarca');
INSERT INTO `ubicacion_distrito` VALUES ('289', '3', '31', 'Colcabamba');
INSERT INTO `ubicacion_distrito` VALUES ('290', '3', '31', 'Cotaruse');
INSERT INTO `ubicacion_distrito` VALUES ('291', '3', '31', 'Huayllo');
INSERT INTO `ubicacion_distrito` VALUES ('292', '3', '31', 'Justo Apu Sahuaraura');
INSERT INTO `ubicacion_distrito` VALUES ('293', '3', '31', 'Lucre');
INSERT INTO `ubicacion_distrito` VALUES ('294', '3', '31', 'Pocohuanca');
INSERT INTO `ubicacion_distrito` VALUES ('295', '3', '31', 'San Juan De Chacña');
INSERT INTO `ubicacion_distrito` VALUES ('296', '3', '31', 'Sañayca');
INSERT INTO `ubicacion_distrito` VALUES ('297', '3', '31', 'Soraya');
INSERT INTO `ubicacion_distrito` VALUES ('298', '3', '31', 'Tapairihua');
INSERT INTO `ubicacion_distrito` VALUES ('299', '3', '31', 'Tintay');
INSERT INTO `ubicacion_distrito` VALUES ('300', '3', '31', 'Toraya');
INSERT INTO `ubicacion_distrito` VALUES ('301', '3', '31', 'Yanaca');
INSERT INTO `ubicacion_distrito` VALUES ('302', '3', '32', 'Tambobamba');
INSERT INTO `ubicacion_distrito` VALUES ('303', '3', '32', 'Cotabambas');
INSERT INTO `ubicacion_distrito` VALUES ('304', '3', '32', 'Coyllurqui');
INSERT INTO `ubicacion_distrito` VALUES ('305', '3', '32', 'Haquira');
INSERT INTO `ubicacion_distrito` VALUES ('306', '3', '32', 'Mara');
INSERT INTO `ubicacion_distrito` VALUES ('307', '3', '32', 'Challhuahuacho');
INSERT INTO `ubicacion_distrito` VALUES ('308', '3', '33', 'Chincheros');
INSERT INTO `ubicacion_distrito` VALUES ('309', '3', '33', 'Anco-Huallo');
INSERT INTO `ubicacion_distrito` VALUES ('310', '3', '33', 'Cocharcas');
INSERT INTO `ubicacion_distrito` VALUES ('311', '3', '33', 'Huaccana');
INSERT INTO `ubicacion_distrito` VALUES ('312', '3', '33', 'Ocobamba');
INSERT INTO `ubicacion_distrito` VALUES ('313', '3', '33', 'Ongoy');
INSERT INTO `ubicacion_distrito` VALUES ('314', '3', '33', 'Uranmarca');
INSERT INTO `ubicacion_distrito` VALUES ('315', '3', '33', 'Ranracancha');
INSERT INTO `ubicacion_distrito` VALUES ('316', '3', '34', 'Chuquibambilla');
INSERT INTO `ubicacion_distrito` VALUES ('317', '3', '34', 'Curpahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('318', '3', '34', 'Gamarra');
INSERT INTO `ubicacion_distrito` VALUES ('319', '3', '34', 'Huayllati');
INSERT INTO `ubicacion_distrito` VALUES ('320', '3', '34', 'Mamara');
INSERT INTO `ubicacion_distrito` VALUES ('321', '3', '34', 'Micaela Bastidas');
INSERT INTO `ubicacion_distrito` VALUES ('322', '3', '34', 'Pataypampa');
INSERT INTO `ubicacion_distrito` VALUES ('323', '3', '34', 'Progreso');
INSERT INTO `ubicacion_distrito` VALUES ('324', '3', '34', 'San Antonio');
INSERT INTO `ubicacion_distrito` VALUES ('325', '3', '34', 'Santa Ros a');
INSERT INTO `ubicacion_distrito` VALUES ('326', '3', '34', 'Turpay');
INSERT INTO `ubicacion_distrito` VALUES ('327', '3', '34', 'Vilcabamba');
INSERT INTO `ubicacion_distrito` VALUES ('328', '3', '34', 'Virundo');
INSERT INTO `ubicacion_distrito` VALUES ('329', '3', '34', 'Curasco');
INSERT INTO `ubicacion_distrito` VALUES ('330', '4', '35', 'Arequipa');
INSERT INTO `ubicacion_distrito` VALUES ('331', '4', '35', 'Alto Selva Alegre');
INSERT INTO `ubicacion_distrito` VALUES ('332', '4', '35', 'Cayma');
INSERT INTO `ubicacion_distrito` VALUES ('333', '4', '35', 'Cerro Colorado');
INSERT INTO `ubicacion_distrito` VALUES ('334', '4', '35', 'Characato');
INSERT INTO `ubicacion_distrito` VALUES ('335', '4', '35', 'Chiguata');
INSERT INTO `ubicacion_distrito` VALUES ('336', '4', '35', 'Jacobo Hunter');
INSERT INTO `ubicacion_distrito` VALUES ('337', '4', '35', 'La Joya');
INSERT INTO `ubicacion_distrito` VALUES ('338', '4', '35', 'Mariano Melgar');
INSERT INTO `ubicacion_distrito` VALUES ('339', '4', '35', 'Miraflores');
INSERT INTO `ubicacion_distrito` VALUES ('340', '4', '35', 'Mollebaya');
INSERT INTO `ubicacion_distrito` VALUES ('341', '4', '35', 'Paucarpata');
INSERT INTO `ubicacion_distrito` VALUES ('342', '4', '35', 'Pocsi');
INSERT INTO `ubicacion_distrito` VALUES ('343', '4', '35', 'Polobaya');
INSERT INTO `ubicacion_distrito` VALUES ('344', '4', '35', 'Quequeña');
INSERT INTO `ubicacion_distrito` VALUES ('345', '4', '35', 'Sabandia');
INSERT INTO `ubicacion_distrito` VALUES ('346', '4', '35', 'Sachaca');
INSERT INTO `ubicacion_distrito` VALUES ('347', '4', '35', 'San Juan De Siguas');
INSERT INTO `ubicacion_distrito` VALUES ('348', '4', '35', 'San Juan De Tarucani');
INSERT INTO `ubicacion_distrito` VALUES ('349', '4', '35', 'Santa Isabel De Siguas');
INSERT INTO `ubicacion_distrito` VALUES ('350', '4', '35', 'Santa Rita De Siguas');
INSERT INTO `ubicacion_distrito` VALUES ('351', '4', '35', 'Socabaya');
INSERT INTO `ubicacion_distrito` VALUES ('352', '4', '35', 'Tiabaya');
INSERT INTO `ubicacion_distrito` VALUES ('353', '4', '35', 'Uchumayo');
INSERT INTO `ubicacion_distrito` VALUES ('354', '4', '35', 'Vitor');
INSERT INTO `ubicacion_distrito` VALUES ('355', '4', '35', 'Yanahuara');
INSERT INTO `ubicacion_distrito` VALUES ('356', '4', '35', 'Yarabamba');
INSERT INTO `ubicacion_distrito` VALUES ('357', '4', '35', 'Yura');
INSERT INTO `ubicacion_distrito` VALUES ('358', '4', '35', 'Jose Luis Bustamante Y Rive');
INSERT INTO `ubicacion_distrito` VALUES ('359', '4', '36', 'Camana');
INSERT INTO `ubicacion_distrito` VALUES ('360', '4', '36', 'Jose Maria Quimper');
INSERT INTO `ubicacion_distrito` VALUES ('361', '4', '36', 'Mariano Nicolas Valcarcel');
INSERT INTO `ubicacion_distrito` VALUES ('362', '4', '36', 'Mariscal Caceres');
INSERT INTO `ubicacion_distrito` VALUES ('363', '4', '36', 'Nicolas De Pierola');
INSERT INTO `ubicacion_distrito` VALUES ('364', '4', '36', 'Ocoña');
INSERT INTO `ubicacion_distrito` VALUES ('365', '4', '36', 'Quilca');
INSERT INTO `ubicacion_distrito` VALUES ('366', '4', '36', 'Samuel Pastor');
INSERT INTO `ubicacion_distrito` VALUES ('367', '4', '37', 'Caraveli');
INSERT INTO `ubicacion_distrito` VALUES ('368', '4', '37', 'Acari');
INSERT INTO `ubicacion_distrito` VALUES ('369', '4', '37', 'Atico');
INSERT INTO `ubicacion_distrito` VALUES ('370', '4', '37', 'Atiquipa');
INSERT INTO `ubicacion_distrito` VALUES ('371', '4', '37', 'Bella Union');
INSERT INTO `ubicacion_distrito` VALUES ('372', '4', '37', 'Cahuacho');
INSERT INTO `ubicacion_distrito` VALUES ('373', '4', '37', 'Chala');
INSERT INTO `ubicacion_distrito` VALUES ('374', '4', '37', 'Chaparra');
INSERT INTO `ubicacion_distrito` VALUES ('375', '4', '37', 'Huanuhuanu');
INSERT INTO `ubicacion_distrito` VALUES ('376', '4', '37', 'Jaqui');
INSERT INTO `ubicacion_distrito` VALUES ('377', '4', '37', 'Lomas');
INSERT INTO `ubicacion_distrito` VALUES ('378', '4', '37', 'Quicacha');
INSERT INTO `ubicacion_distrito` VALUES ('379', '4', '37', 'Yauca');
INSERT INTO `ubicacion_distrito` VALUES ('380', '4', '38', 'Aplao');
INSERT INTO `ubicacion_distrito` VALUES ('381', '4', '38', 'Andagua');
INSERT INTO `ubicacion_distrito` VALUES ('382', '4', '38', 'Ayo');
INSERT INTO `ubicacion_distrito` VALUES ('383', '4', '38', 'Chachas');
INSERT INTO `ubicacion_distrito` VALUES ('384', '4', '38', 'Chilcaymarca');
INSERT INTO `ubicacion_distrito` VALUES ('385', '4', '38', 'Choco');
INSERT INTO `ubicacion_distrito` VALUES ('386', '4', '38', 'Huancarqui');
INSERT INTO `ubicacion_distrito` VALUES ('387', '4', '38', 'Machaguay');
INSERT INTO `ubicacion_distrito` VALUES ('388', '4', '38', 'Orcopampa');
INSERT INTO `ubicacion_distrito` VALUES ('389', '4', '38', 'Pampacolca');
INSERT INTO `ubicacion_distrito` VALUES ('390', '4', '38', 'Tipan');
INSERT INTO `ubicacion_distrito` VALUES ('391', '4', '38', 'Uñon');
INSERT INTO `ubicacion_distrito` VALUES ('392', '4', '38', 'Uraca');
INSERT INTO `ubicacion_distrito` VALUES ('393', '4', '38', 'Viraco');
INSERT INTO `ubicacion_distrito` VALUES ('394', '4', '39', 'Chivay');
INSERT INTO `ubicacion_distrito` VALUES ('395', '4', '39', 'Achoma');
INSERT INTO `ubicacion_distrito` VALUES ('396', '4', '39', 'Cabanaconde');
INSERT INTO `ubicacion_distrito` VALUES ('397', '4', '39', 'Callalli');
INSERT INTO `ubicacion_distrito` VALUES ('398', '4', '39', 'Caylloma');
INSERT INTO `ubicacion_distrito` VALUES ('399', '4', '39', 'Coporaque');
INSERT INTO `ubicacion_distrito` VALUES ('400', '4', '39', 'Huambo');
INSERT INTO `ubicacion_distrito` VALUES ('401', '4', '39', 'Huanca');
INSERT INTO `ubicacion_distrito` VALUES ('402', '4', '39', 'Ichupampa');
INSERT INTO `ubicacion_distrito` VALUES ('403', '4', '39', 'Lari');
INSERT INTO `ubicacion_distrito` VALUES ('404', '4', '39', 'Lluta');
INSERT INTO `ubicacion_distrito` VALUES ('405', '4', '39', 'Maca');
INSERT INTO `ubicacion_distrito` VALUES ('406', '4', '39', 'Madrigal');
INSERT INTO `ubicacion_distrito` VALUES ('407', '4', '39', 'San Antonio De Chuca');
INSERT INTO `ubicacion_distrito` VALUES ('408', '4', '39', 'Sibayo');
INSERT INTO `ubicacion_distrito` VALUES ('409', '4', '39', 'Tapay');
INSERT INTO `ubicacion_distrito` VALUES ('410', '4', '39', 'Tisco');
INSERT INTO `ubicacion_distrito` VALUES ('411', '4', '39', 'Tuti');
INSERT INTO `ubicacion_distrito` VALUES ('412', '4', '39', 'Yanque');
INSERT INTO `ubicacion_distrito` VALUES ('413', '4', '39', 'Majes');
INSERT INTO `ubicacion_distrito` VALUES ('414', '4', '40', 'Chuquibamba');
INSERT INTO `ubicacion_distrito` VALUES ('415', '4', '40', 'Andaray');
INSERT INTO `ubicacion_distrito` VALUES ('416', '4', '40', 'Cayarani');
INSERT INTO `ubicacion_distrito` VALUES ('417', '4', '40', 'Chichas');
INSERT INTO `ubicacion_distrito` VALUES ('418', '4', '40', 'Iray');
INSERT INTO `ubicacion_distrito` VALUES ('419', '4', '40', 'Rio Grande');
INSERT INTO `ubicacion_distrito` VALUES ('420', '4', '40', 'Salamanca');
INSERT INTO `ubicacion_distrito` VALUES ('421', '4', '40', 'Yanaquihua');
INSERT INTO `ubicacion_distrito` VALUES ('422', '4', '41', 'Mollendo');
INSERT INTO `ubicacion_distrito` VALUES ('423', '4', '41', 'Cocachacra');
INSERT INTO `ubicacion_distrito` VALUES ('424', '4', '41', 'Dean Valdivia');
INSERT INTO `ubicacion_distrito` VALUES ('425', '4', '41', 'Islay');
INSERT INTO `ubicacion_distrito` VALUES ('426', '4', '41', 'Mejia');
INSERT INTO `ubicacion_distrito` VALUES ('427', '4', '41', 'Punta De Bombon');
INSERT INTO `ubicacion_distrito` VALUES ('428', '4', '42', 'Cotahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('429', '4', '42', 'Alca');
INSERT INTO `ubicacion_distrito` VALUES ('430', '4', '42', 'Charcana');
INSERT INTO `ubicacion_distrito` VALUES ('431', '4', '42', 'Huaynacotas');
INSERT INTO `ubicacion_distrito` VALUES ('432', '4', '42', 'Pampamarca');
INSERT INTO `ubicacion_distrito` VALUES ('433', '4', '42', 'Puyca');
INSERT INTO `ubicacion_distrito` VALUES ('434', '4', '42', 'Quechualla');
INSERT INTO `ubicacion_distrito` VALUES ('435', '4', '42', 'Sayla');
INSERT INTO `ubicacion_distrito` VALUES ('436', '4', '42', 'Tauria');
INSERT INTO `ubicacion_distrito` VALUES ('437', '4', '42', 'Tomepampa');
INSERT INTO `ubicacion_distrito` VALUES ('438', '4', '42', 'Toro');
INSERT INTO `ubicacion_distrito` VALUES ('439', '5', '43', 'Ayacucho');
INSERT INTO `ubicacion_distrito` VALUES ('440', '5', '43', 'Acocro');
INSERT INTO `ubicacion_distrito` VALUES ('441', '5', '43', 'Acos Vinchos');
INSERT INTO `ubicacion_distrito` VALUES ('442', '5', '43', 'Carmen Alto');
INSERT INTO `ubicacion_distrito` VALUES ('443', '5', '43', 'Chiara');
INSERT INTO `ubicacion_distrito` VALUES ('444', '5', '43', 'Ocros');
INSERT INTO `ubicacion_distrito` VALUES ('445', '5', '43', 'Pacaycasa');
INSERT INTO `ubicacion_distrito` VALUES ('446', '5', '43', 'Quinua');
INSERT INTO `ubicacion_distrito` VALUES ('447', '5', '43', 'San Jose De Ticllas');
INSERT INTO `ubicacion_distrito` VALUES ('448', '5', '43', 'San Juan Bautista');
INSERT INTO `ubicacion_distrito` VALUES ('449', '5', '43', 'Santiago De Pischa');
INSERT INTO `ubicacion_distrito` VALUES ('450', '5', '43', 'Socos');
INSERT INTO `ubicacion_distrito` VALUES ('451', '5', '43', 'Tambillo');
INSERT INTO `ubicacion_distrito` VALUES ('452', '5', '43', 'Vinchos');
INSERT INTO `ubicacion_distrito` VALUES ('453', '5', '43', 'Jesus Nazareno');
INSERT INTO `ubicacion_distrito` VALUES ('454', '5', '44', 'Cangallo');
INSERT INTO `ubicacion_distrito` VALUES ('455', '5', '44', 'Chuschi');
INSERT INTO `ubicacion_distrito` VALUES ('456', '5', '44', 'Los Morochucos');
INSERT INTO `ubicacion_distrito` VALUES ('457', '5', '44', 'Maria Parado De Bellido');
INSERT INTO `ubicacion_distrito` VALUES ('458', '5', '44', 'Paras');
INSERT INTO `ubicacion_distrito` VALUES ('459', '5', '44', 'Totos');
INSERT INTO `ubicacion_distrito` VALUES ('460', '5', '45', 'Sancos');
INSERT INTO `ubicacion_distrito` VALUES ('461', '5', '45', 'Carapo');
INSERT INTO `ubicacion_distrito` VALUES ('462', '5', '45', 'Sacsamarca');
INSERT INTO `ubicacion_distrito` VALUES ('463', '5', '45', 'Santiago De Lucanamarca');
INSERT INTO `ubicacion_distrito` VALUES ('464', '5', '46', 'Huanta');
INSERT INTO `ubicacion_distrito` VALUES ('465', '5', '46', 'Ayahuanco');
INSERT INTO `ubicacion_distrito` VALUES ('466', '5', '46', 'Huamanguilla');
INSERT INTO `ubicacion_distrito` VALUES ('467', '5', '46', 'Iguain');
INSERT INTO `ubicacion_distrito` VALUES ('468', '5', '46', 'Luricocha');
INSERT INTO `ubicacion_distrito` VALUES ('469', '5', '46', 'Santillana');
INSERT INTO `ubicacion_distrito` VALUES ('470', '5', '46', 'Sivia');
INSERT INTO `ubicacion_distrito` VALUES ('471', '5', '46', 'Llochegua');
INSERT INTO `ubicacion_distrito` VALUES ('472', '5', '47', 'San Miguel');
INSERT INTO `ubicacion_distrito` VALUES ('473', '5', '47', 'Anco');
INSERT INTO `ubicacion_distrito` VALUES ('474', '5', '47', 'Ayna');
INSERT INTO `ubicacion_distrito` VALUES ('475', '5', '47', 'Chilcas');
INSERT INTO `ubicacion_distrito` VALUES ('476', '5', '47', 'Chungui');
INSERT INTO `ubicacion_distrito` VALUES ('477', '5', '47', 'Luis Carranza');
INSERT INTO `ubicacion_distrito` VALUES ('478', '5', '47', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('479', '5', '47', 'Tambo');
INSERT INTO `ubicacion_distrito` VALUES ('480', '5', '48', 'Puquio');
INSERT INTO `ubicacion_distrito` VALUES ('481', '5', '48', 'Aucara');
INSERT INTO `ubicacion_distrito` VALUES ('482', '5', '48', 'Cabana');
INSERT INTO `ubicacion_distrito` VALUES ('483', '5', '48', 'Carmen Salcedo');
INSERT INTO `ubicacion_distrito` VALUES ('484', '5', '48', 'Chaviña');
INSERT INTO `ubicacion_distrito` VALUES ('485', '5', '48', 'Chipao');
INSERT INTO `ubicacion_distrito` VALUES ('486', '5', '48', 'Huac-Huas');
INSERT INTO `ubicacion_distrito` VALUES ('487', '5', '48', 'Laramate');
INSERT INTO `ubicacion_distrito` VALUES ('488', '5', '48', 'Leoncio Prado');
INSERT INTO `ubicacion_distrito` VALUES ('489', '5', '48', 'Llauta');
INSERT INTO `ubicacion_distrito` VALUES ('490', '5', '48', 'Lucanas');
INSERT INTO `ubicacion_distrito` VALUES ('491', '5', '48', 'Ocaña');
INSERT INTO `ubicacion_distrito` VALUES ('492', '5', '48', 'Otoca');
INSERT INTO `ubicacion_distrito` VALUES ('493', '5', '48', 'Saisa');
INSERT INTO `ubicacion_distrito` VALUES ('494', '5', '48', 'San Cristobal');
INSERT INTO `ubicacion_distrito` VALUES ('495', '5', '48', 'San Juan');
INSERT INTO `ubicacion_distrito` VALUES ('496', '5', '48', 'San Pedro');
INSERT INTO `ubicacion_distrito` VALUES ('497', '5', '48', 'San Pedro De Palco');
INSERT INTO `ubicacion_distrito` VALUES ('498', '5', '48', 'Sancos');
INSERT INTO `ubicacion_distrito` VALUES ('499', '5', '48', 'Santa Ana De Huaycahuacho');
INSERT INTO `ubicacion_distrito` VALUES ('500', '5', '48', 'Santa Lucia');
INSERT INTO `ubicacion_distrito` VALUES ('501', '5', '49', 'Coracora');
INSERT INTO `ubicacion_distrito` VALUES ('502', '5', '49', 'Chumpi');
INSERT INTO `ubicacion_distrito` VALUES ('503', '5', '49', 'Coronel Castaðeda');
INSERT INTO `ubicacion_distrito` VALUES ('504', '5', '49', 'Pacapausa');
INSERT INTO `ubicacion_distrito` VALUES ('505', '5', '49', 'Pullo');
INSERT INTO `ubicacion_distrito` VALUES ('506', '5', '49', 'Puyusca');
INSERT INTO `ubicacion_distrito` VALUES ('507', '5', '49', 'San Francisco De Ravacayco');
INSERT INTO `ubicacion_distrito` VALUES ('508', '5', '49', 'Upahuacho');
INSERT INTO `ubicacion_distrito` VALUES ('509', '5', '50', 'Pausa');
INSERT INTO `ubicacion_distrito` VALUES ('510', '5', '50', 'Colta');
INSERT INTO `ubicacion_distrito` VALUES ('511', '5', '50', 'Corculla');
INSERT INTO `ubicacion_distrito` VALUES ('512', '5', '50', 'Lampa');
INSERT INTO `ubicacion_distrito` VALUES ('513', '5', '50', 'Marcabamba');
INSERT INTO `ubicacion_distrito` VALUES ('514', '5', '50', 'Oyolo');
INSERT INTO `ubicacion_distrito` VALUES ('515', '5', '50', 'Pararca');
INSERT INTO `ubicacion_distrito` VALUES ('516', '5', '50', 'San Javier De Alpabamba');
INSERT INTO `ubicacion_distrito` VALUES ('517', '5', '50', 'San Jose De Ushua');
INSERT INTO `ubicacion_distrito` VALUES ('518', '5', '50', 'Sara Sara');
INSERT INTO `ubicacion_distrito` VALUES ('519', '5', '51', 'Querobamba');
INSERT INTO `ubicacion_distrito` VALUES ('520', '5', '51', 'Belen');
INSERT INTO `ubicacion_distrito` VALUES ('521', '5', '51', 'Chalcos');
INSERT INTO `ubicacion_distrito` VALUES ('522', '5', '51', 'Chilcayoc');
INSERT INTO `ubicacion_distrito` VALUES ('523', '5', '51', 'Huacaña');
INSERT INTO `ubicacion_distrito` VALUES ('524', '5', '51', 'Morcolla');
INSERT INTO `ubicacion_distrito` VALUES ('525', '5', '51', 'Paico');
INSERT INTO `ubicacion_distrito` VALUES ('526', '5', '51', 'San Pedro De Larcay');
INSERT INTO `ubicacion_distrito` VALUES ('527', '5', '51', 'San Salvador De Quije');
INSERT INTO `ubicacion_distrito` VALUES ('528', '5', '51', 'Santiago De Paucaray');
INSERT INTO `ubicacion_distrito` VALUES ('529', '5', '51', 'Soras');
INSERT INTO `ubicacion_distrito` VALUES ('530', '5', '52', 'Huancapi');
INSERT INTO `ubicacion_distrito` VALUES ('531', '5', '52', 'Alcamenca');
INSERT INTO `ubicacion_distrito` VALUES ('532', '5', '52', 'Apongo');
INSERT INTO `ubicacion_distrito` VALUES ('533', '5', '52', 'Asquipata');
INSERT INTO `ubicacion_distrito` VALUES ('534', '5', '52', 'Canaria');
INSERT INTO `ubicacion_distrito` VALUES ('535', '5', '52', 'Cayara');
INSERT INTO `ubicacion_distrito` VALUES ('536', '5', '52', 'Colca');
INSERT INTO `ubicacion_distrito` VALUES ('537', '5', '52', 'Huamanquiquia');
INSERT INTO `ubicacion_distrito` VALUES ('538', '5', '52', 'Huancaraylla');
INSERT INTO `ubicacion_distrito` VALUES ('539', '5', '52', 'Huaya');
INSERT INTO `ubicacion_distrito` VALUES ('540', '5', '52', 'Sarhua');
INSERT INTO `ubicacion_distrito` VALUES ('541', '5', '52', 'Vilcanchos');
INSERT INTO `ubicacion_distrito` VALUES ('542', '5', '53', 'Vilcas Huaman');
INSERT INTO `ubicacion_distrito` VALUES ('543', '5', '53', 'Accomarca');
INSERT INTO `ubicacion_distrito` VALUES ('544', '5', '53', 'Carhuanca');
INSERT INTO `ubicacion_distrito` VALUES ('545', '5', '53', 'Concepcion');
INSERT INTO `ubicacion_distrito` VALUES ('546', '5', '53', 'Huambalpa');
INSERT INTO `ubicacion_distrito` VALUES ('547', '5', '53', 'Independencia');
INSERT INTO `ubicacion_distrito` VALUES ('548', '5', '53', 'Saurama');
INSERT INTO `ubicacion_distrito` VALUES ('549', '5', '53', 'Vischongo');
INSERT INTO `ubicacion_distrito` VALUES ('550', '6', '54', 'Cajamarca');
INSERT INTO `ubicacion_distrito` VALUES ('551', '6', '54', 'Asuncion');
INSERT INTO `ubicacion_distrito` VALUES ('552', '6', '54', 'Chetilla');
INSERT INTO `ubicacion_distrito` VALUES ('553', '6', '54', 'Cospan');
INSERT INTO `ubicacion_distrito` VALUES ('554', '6', '54', 'Encañada');
INSERT INTO `ubicacion_distrito` VALUES ('555', '6', '54', 'Jesus');
INSERT INTO `ubicacion_distrito` VALUES ('556', '6', '54', 'Llacanora');
INSERT INTO `ubicacion_distrito` VALUES ('557', '6', '54', 'Los Baños Del Inca');
INSERT INTO `ubicacion_distrito` VALUES ('558', '6', '54', 'Magdalena');
INSERT INTO `ubicacion_distrito` VALUES ('559', '6', '54', 'Matara');
INSERT INTO `ubicacion_distrito` VALUES ('560', '6', '54', 'Namora');
INSERT INTO `ubicacion_distrito` VALUES ('561', '6', '54', 'San Juan');
INSERT INTO `ubicacion_distrito` VALUES ('562', '6', '55', 'Cajabamba');
INSERT INTO `ubicacion_distrito` VALUES ('563', '6', '55', 'Cachachi');
INSERT INTO `ubicacion_distrito` VALUES ('564', '6', '55', 'Condebamba');
INSERT INTO `ubicacion_distrito` VALUES ('565', '6', '55', 'Sitacocha');
INSERT INTO `ubicacion_distrito` VALUES ('566', '6', '56', 'Celendin');
INSERT INTO `ubicacion_distrito` VALUES ('567', '6', '56', 'Chumuch');
INSERT INTO `ubicacion_distrito` VALUES ('568', '6', '56', 'Cortegana');
INSERT INTO `ubicacion_distrito` VALUES ('569', '6', '56', 'Huasmin');
INSERT INTO `ubicacion_distrito` VALUES ('570', '6', '56', 'Jorge Chavez');
INSERT INTO `ubicacion_distrito` VALUES ('571', '6', '56', 'Jose Galvez');
INSERT INTO `ubicacion_distrito` VALUES ('572', '6', '56', 'Miguel Iglesias');
INSERT INTO `ubicacion_distrito` VALUES ('573', '6', '56', 'Oxamarca');
INSERT INTO `ubicacion_distrito` VALUES ('574', '6', '56', 'Sorochuco');
INSERT INTO `ubicacion_distrito` VALUES ('575', '6', '56', 'Sucre');
INSERT INTO `ubicacion_distrito` VALUES ('576', '6', '56', 'Utco');
INSERT INTO `ubicacion_distrito` VALUES ('577', '6', '56', 'La Libertad De Pallan');
INSERT INTO `ubicacion_distrito` VALUES ('578', '6', '57', 'Chota');
INSERT INTO `ubicacion_distrito` VALUES ('579', '6', '57', 'Anguia');
INSERT INTO `ubicacion_distrito` VALUES ('580', '6', '57', 'Chadin');
INSERT INTO `ubicacion_distrito` VALUES ('581', '6', '57', 'Chiguirip');
INSERT INTO `ubicacion_distrito` VALUES ('582', '6', '57', 'Chimban');
INSERT INTO `ubicacion_distrito` VALUES ('583', '6', '57', 'Choropampa');
INSERT INTO `ubicacion_distrito` VALUES ('584', '6', '57', 'Cochabamba');
INSERT INTO `ubicacion_distrito` VALUES ('585', '6', '57', 'Conchan');
INSERT INTO `ubicacion_distrito` VALUES ('586', '6', '57', 'Huambos');
INSERT INTO `ubicacion_distrito` VALUES ('587', '6', '57', 'Lajas');
INSERT INTO `ubicacion_distrito` VALUES ('588', '6', '57', 'Llama');
INSERT INTO `ubicacion_distrito` VALUES ('589', '6', '57', 'Miracosta');
INSERT INTO `ubicacion_distrito` VALUES ('590', '6', '57', 'Paccha');
INSERT INTO `ubicacion_distrito` VALUES ('591', '6', '57', 'Pion');
INSERT INTO `ubicacion_distrito` VALUES ('592', '6', '57', 'Querocoto');
INSERT INTO `ubicacion_distrito` VALUES ('593', '6', '57', 'San Juan De Licupis');
INSERT INTO `ubicacion_distrito` VALUES ('594', '6', '57', 'Tacabamba');
INSERT INTO `ubicacion_distrito` VALUES ('595', '6', '57', 'Tocmoche');
INSERT INTO `ubicacion_distrito` VALUES ('596', '6', '57', 'Chalamarca');
INSERT INTO `ubicacion_distrito` VALUES ('597', '6', '58', 'Contumaza');
INSERT INTO `ubicacion_distrito` VALUES ('598', '6', '58', 'Chilete');
INSERT INTO `ubicacion_distrito` VALUES ('599', '6', '58', 'Cupisnique');
INSERT INTO `ubicacion_distrito` VALUES ('600', '6', '58', 'Guzmango');
INSERT INTO `ubicacion_distrito` VALUES ('601', '6', '58', 'San Benito');
INSERT INTO `ubicacion_distrito` VALUES ('602', '6', '58', 'Santa Cruz De Toled');
INSERT INTO `ubicacion_distrito` VALUES ('603', '6', '58', 'Tantarica');
INSERT INTO `ubicacion_distrito` VALUES ('604', '6', '58', 'Yonan');
INSERT INTO `ubicacion_distrito` VALUES ('605', '6', '59', 'Cutervo');
INSERT INTO `ubicacion_distrito` VALUES ('606', '6', '59', 'Callayuc');
INSERT INTO `ubicacion_distrito` VALUES ('607', '6', '59', 'Choros');
INSERT INTO `ubicacion_distrito` VALUES ('608', '6', '59', 'Cujillo');
INSERT INTO `ubicacion_distrito` VALUES ('609', '6', '59', 'La Ramada');
INSERT INTO `ubicacion_distrito` VALUES ('610', '6', '59', 'Pimpingos');
INSERT INTO `ubicacion_distrito` VALUES ('611', '6', '59', 'Querocotillo');
INSERT INTO `ubicacion_distrito` VALUES ('612', '6', '59', 'San Andres De Cutervo');
INSERT INTO `ubicacion_distrito` VALUES ('613', '6', '59', 'San Juan De Cutervo');
INSERT INTO `ubicacion_distrito` VALUES ('614', '6', '59', 'San Luis De Lucma');
INSERT INTO `ubicacion_distrito` VALUES ('615', '6', '59', 'Santa Cruz');
INSERT INTO `ubicacion_distrito` VALUES ('616', '6', '59', 'Santo Domingo De La Capilla');
INSERT INTO `ubicacion_distrito` VALUES ('617', '6', '59', 'Santo Tomas');
INSERT INTO `ubicacion_distrito` VALUES ('618', '6', '59', 'Socota');
INSERT INTO `ubicacion_distrito` VALUES ('619', '6', '59', 'Toribio Casanova');
INSERT INTO `ubicacion_distrito` VALUES ('620', '6', '60', 'Bambamarca');
INSERT INTO `ubicacion_distrito` VALUES ('621', '6', '60', 'Chugur');
INSERT INTO `ubicacion_distrito` VALUES ('622', '6', '60', 'Hualgayoc');
INSERT INTO `ubicacion_distrito` VALUES ('623', '6', '61', 'Jaen');
INSERT INTO `ubicacion_distrito` VALUES ('624', '6', '61', 'Bellavista');
INSERT INTO `ubicacion_distrito` VALUES ('625', '6', '61', 'Chontali');
INSERT INTO `ubicacion_distrito` VALUES ('626', '6', '61', 'Colasay');
INSERT INTO `ubicacion_distrito` VALUES ('627', '6', '61', 'Huabal');
INSERT INTO `ubicacion_distrito` VALUES ('628', '6', '61', 'Las Pirias');
INSERT INTO `ubicacion_distrito` VALUES ('629', '6', '61', 'Pomahuaca');
INSERT INTO `ubicacion_distrito` VALUES ('630', '6', '61', 'Pucara');
INSERT INTO `ubicacion_distrito` VALUES ('631', '6', '61', 'Sallique');
INSERT INTO `ubicacion_distrito` VALUES ('632', '6', '61', 'San Felipe');
INSERT INTO `ubicacion_distrito` VALUES ('633', '6', '61', 'San Jose Del Alto');
INSERT INTO `ubicacion_distrito` VALUES ('634', '6', '61', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('635', '6', '62', 'San Ignacio');
INSERT INTO `ubicacion_distrito` VALUES ('636', '6', '62', 'Chirinos');
INSERT INTO `ubicacion_distrito` VALUES ('637', '6', '62', 'Huarango');
INSERT INTO `ubicacion_distrito` VALUES ('638', '6', '62', 'La Coipa');
INSERT INTO `ubicacion_distrito` VALUES ('639', '6', '62', 'Namballe');
INSERT INTO `ubicacion_distrito` VALUES ('640', '6', '62', 'San Jose De Lourdes');
INSERT INTO `ubicacion_distrito` VALUES ('641', '6', '62', 'Tabaconas');
INSERT INTO `ubicacion_distrito` VALUES ('642', '6', '63', 'Pedro Galvez');
INSERT INTO `ubicacion_distrito` VALUES ('643', '6', '63', 'Chancay');
INSERT INTO `ubicacion_distrito` VALUES ('644', '6', '63', 'Eduardo Villanueva');
INSERT INTO `ubicacion_distrito` VALUES ('645', '6', '63', 'Gregorio Pita');
INSERT INTO `ubicacion_distrito` VALUES ('646', '6', '63', 'Ichocan');
INSERT INTO `ubicacion_distrito` VALUES ('647', '6', '63', 'Jose Manuel Quiroz');
INSERT INTO `ubicacion_distrito` VALUES ('648', '6', '63', 'Jose Sabogal');
INSERT INTO `ubicacion_distrito` VALUES ('649', '6', '64', 'San Miguel');
INSERT INTO `ubicacion_distrito` VALUES ('650', '6', '64', 'Bolivar');
INSERT INTO `ubicacion_distrito` VALUES ('651', '6', '64', 'Calquis');
INSERT INTO `ubicacion_distrito` VALUES ('652', '6', '64', 'Catilluc');
INSERT INTO `ubicacion_distrito` VALUES ('653', '6', '64', 'El Prado');
INSERT INTO `ubicacion_distrito` VALUES ('654', '6', '64', 'La Florida');
INSERT INTO `ubicacion_distrito` VALUES ('655', '6', '64', 'Llapa');
INSERT INTO `ubicacion_distrito` VALUES ('656', '6', '64', 'Nanchoc');
INSERT INTO `ubicacion_distrito` VALUES ('657', '6', '64', 'Niepos');
INSERT INTO `ubicacion_distrito` VALUES ('658', '6', '64', 'San Gregorio');
INSERT INTO `ubicacion_distrito` VALUES ('659', '6', '64', 'San Silvestre De Cochan');
INSERT INTO `ubicacion_distrito` VALUES ('660', '6', '64', 'Tongod');
INSERT INTO `ubicacion_distrito` VALUES ('661', '6', '64', 'Union Agua Blanca');
INSERT INTO `ubicacion_distrito` VALUES ('662', '6', '65', 'San Pablo');
INSERT INTO `ubicacion_distrito` VALUES ('663', '6', '65', 'San Bernardino');
INSERT INTO `ubicacion_distrito` VALUES ('664', '6', '65', 'San Luis');
INSERT INTO `ubicacion_distrito` VALUES ('665', '6', '65', 'Tumbaden');
INSERT INTO `ubicacion_distrito` VALUES ('666', '6', '66', 'Santa Cruz');
INSERT INTO `ubicacion_distrito` VALUES ('667', '6', '66', 'Andabamba');
INSERT INTO `ubicacion_distrito` VALUES ('668', '6', '66', 'Catache');
INSERT INTO `ubicacion_distrito` VALUES ('669', '6', '66', 'Chancaybaños');
INSERT INTO `ubicacion_distrito` VALUES ('670', '6', '66', 'La Esperanza');
INSERT INTO `ubicacion_distrito` VALUES ('671', '6', '66', 'Ninabamba');
INSERT INTO `ubicacion_distrito` VALUES ('672', '6', '66', 'Pulan');
INSERT INTO `ubicacion_distrito` VALUES ('673', '6', '66', 'Saucepampa');
INSERT INTO `ubicacion_distrito` VALUES ('674', '6', '66', 'Sexi');
INSERT INTO `ubicacion_distrito` VALUES ('675', '6', '66', 'Uticyacu');
INSERT INTO `ubicacion_distrito` VALUES ('676', '6', '66', 'Yauyucan');
INSERT INTO `ubicacion_distrito` VALUES ('677', '7', '67', 'Callao');
INSERT INTO `ubicacion_distrito` VALUES ('678', '7', '67', 'Bellavista');
INSERT INTO `ubicacion_distrito` VALUES ('679', '7', '67', 'Carmen De La Legua Reynoso');
INSERT INTO `ubicacion_distrito` VALUES ('680', '7', '67', 'La Perla');
INSERT INTO `ubicacion_distrito` VALUES ('681', '7', '67', 'La Punta');
INSERT INTO `ubicacion_distrito` VALUES ('682', '7', '67', 'Ventanilla');
INSERT INTO `ubicacion_distrito` VALUES ('683', '8', '68', 'Cusco');
INSERT INTO `ubicacion_distrito` VALUES ('684', '8', '68', 'Ccorca');
INSERT INTO `ubicacion_distrito` VALUES ('685', '8', '68', 'Poroy');
INSERT INTO `ubicacion_distrito` VALUES ('686', '8', '68', 'San Jeronimo');
INSERT INTO `ubicacion_distrito` VALUES ('687', '8', '68', 'San Sebastian');
INSERT INTO `ubicacion_distrito` VALUES ('688', '8', '68', 'Santiago');
INSERT INTO `ubicacion_distrito` VALUES ('689', '8', '68', 'Saylla');
INSERT INTO `ubicacion_distrito` VALUES ('690', '8', '68', 'Wanchaq');
INSERT INTO `ubicacion_distrito` VALUES ('691', '8', '69', 'Acomayo');
INSERT INTO `ubicacion_distrito` VALUES ('692', '8', '69', 'Acopia');
INSERT INTO `ubicacion_distrito` VALUES ('693', '8', '69', 'Acos');
INSERT INTO `ubicacion_distrito` VALUES ('694', '8', '69', 'Mosoc Llacta');
INSERT INTO `ubicacion_distrito` VALUES ('695', '8', '69', 'Pomacanchi');
INSERT INTO `ubicacion_distrito` VALUES ('696', '8', '69', 'Rondocan');
INSERT INTO `ubicacion_distrito` VALUES ('697', '8', '69', 'Sangarara');
INSERT INTO `ubicacion_distrito` VALUES ('698', '8', '70', 'Anta');
INSERT INTO `ubicacion_distrito` VALUES ('699', '8', '70', 'Ancahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('700', '8', '70', 'Cachimayo');
INSERT INTO `ubicacion_distrito` VALUES ('701', '8', '70', 'Chinchaypujio');
INSERT INTO `ubicacion_distrito` VALUES ('702', '8', '70', 'Huarocondo');
INSERT INTO `ubicacion_distrito` VALUES ('703', '8', '70', 'Limatambo');
INSERT INTO `ubicacion_distrito` VALUES ('704', '8', '70', 'Mollepata');
INSERT INTO `ubicacion_distrito` VALUES ('705', '8', '70', 'Pucyura');
INSERT INTO `ubicacion_distrito` VALUES ('706', '8', '70', 'Zurite');
INSERT INTO `ubicacion_distrito` VALUES ('707', '8', '71', 'Calca');
INSERT INTO `ubicacion_distrito` VALUES ('708', '8', '71', 'Coya');
INSERT INTO `ubicacion_distrito` VALUES ('709', '8', '71', 'Lamay');
INSERT INTO `ubicacion_distrito` VALUES ('710', '8', '71', 'Lares');
INSERT INTO `ubicacion_distrito` VALUES ('711', '8', '71', 'Pisac');
INSERT INTO `ubicacion_distrito` VALUES ('712', '8', '71', 'San Salvador');
INSERT INTO `ubicacion_distrito` VALUES ('713', '8', '71', 'Taray');
INSERT INTO `ubicacion_distrito` VALUES ('714', '8', '71', 'Yanatile');
INSERT INTO `ubicacion_distrito` VALUES ('715', '8', '72', 'Yanaoca');
INSERT INTO `ubicacion_distrito` VALUES ('716', '8', '72', 'Checca');
INSERT INTO `ubicacion_distrito` VALUES ('717', '8', '72', 'Kunturkanki');
INSERT INTO `ubicacion_distrito` VALUES ('718', '8', '72', 'Langui');
INSERT INTO `ubicacion_distrito` VALUES ('719', '8', '72', 'Layo');
INSERT INTO `ubicacion_distrito` VALUES ('720', '8', '72', 'Pampamarca');
INSERT INTO `ubicacion_distrito` VALUES ('721', '8', '72', 'Quehue');
INSERT INTO `ubicacion_distrito` VALUES ('722', '8', '72', 'Tupac Amaru');
INSERT INTO `ubicacion_distrito` VALUES ('723', '8', '73', 'Sicuani');
INSERT INTO `ubicacion_distrito` VALUES ('724', '8', '73', 'Checacupe');
INSERT INTO `ubicacion_distrito` VALUES ('725', '8', '73', 'Combapata');
INSERT INTO `ubicacion_distrito` VALUES ('726', '8', '73', 'Marangani');
INSERT INTO `ubicacion_distrito` VALUES ('727', '8', '73', 'Pitumarca');
INSERT INTO `ubicacion_distrito` VALUES ('728', '8', '73', 'San Pablo');
INSERT INTO `ubicacion_distrito` VALUES ('729', '8', '73', 'San Pedro');
INSERT INTO `ubicacion_distrito` VALUES ('730', '8', '73', 'Tinta');
INSERT INTO `ubicacion_distrito` VALUES ('731', '8', '74', 'Santo Tomas');
INSERT INTO `ubicacion_distrito` VALUES ('732', '8', '74', 'Capacmarca');
INSERT INTO `ubicacion_distrito` VALUES ('733', '8', '74', 'Chamaca');
INSERT INTO `ubicacion_distrito` VALUES ('734', '8', '74', 'Colquemarca');
INSERT INTO `ubicacion_distrito` VALUES ('735', '8', '74', 'Livitaca');
INSERT INTO `ubicacion_distrito` VALUES ('736', '8', '74', 'Llusco');
INSERT INTO `ubicacion_distrito` VALUES ('737', '8', '74', 'Quiñota');
INSERT INTO `ubicacion_distrito` VALUES ('738', '8', '74', 'Velille');
INSERT INTO `ubicacion_distrito` VALUES ('739', '8', '75', 'Espinar');
INSERT INTO `ubicacion_distrito` VALUES ('740', '8', '75', 'Condoroma');
INSERT INTO `ubicacion_distrito` VALUES ('741', '8', '75', 'Coporaque');
INSERT INTO `ubicacion_distrito` VALUES ('742', '8', '75', 'Ocoruro');
INSERT INTO `ubicacion_distrito` VALUES ('743', '8', '75', 'Pallpata');
INSERT INTO `ubicacion_distrito` VALUES ('744', '8', '75', 'Pichigua');
INSERT INTO `ubicacion_distrito` VALUES ('745', '8', '75', 'Suyckutambo');
INSERT INTO `ubicacion_distrito` VALUES ('746', '8', '75', 'Alto Pichigua');
INSERT INTO `ubicacion_distrito` VALUES ('747', '8', '76', 'Santa Ana');
INSERT INTO `ubicacion_distrito` VALUES ('748', '8', '76', 'Echarate');
INSERT INTO `ubicacion_distrito` VALUES ('749', '8', '76', 'Huayopata');
INSERT INTO `ubicacion_distrito` VALUES ('750', '8', '76', 'Maranura');
INSERT INTO `ubicacion_distrito` VALUES ('751', '8', '76', 'Ocobamba');
INSERT INTO `ubicacion_distrito` VALUES ('752', '8', '76', 'Quellouno');
INSERT INTO `ubicacion_distrito` VALUES ('753', '8', '76', 'Kimbiri');
INSERT INTO `ubicacion_distrito` VALUES ('754', '8', '76', 'Santa Teresa');
INSERT INTO `ubicacion_distrito` VALUES ('755', '8', '76', 'Vilcabamba');
INSERT INTO `ubicacion_distrito` VALUES ('756', '8', '76', 'Pichari');
INSERT INTO `ubicacion_distrito` VALUES ('757', '8', '77', 'Paruro');
INSERT INTO `ubicacion_distrito` VALUES ('758', '8', '77', 'Accha');
INSERT INTO `ubicacion_distrito` VALUES ('759', '8', '77', 'Ccapi');
INSERT INTO `ubicacion_distrito` VALUES ('760', '8', '77', 'Colcha');
INSERT INTO `ubicacion_distrito` VALUES ('761', '8', '77', 'Huanoquite');
INSERT INTO `ubicacion_distrito` VALUES ('762', '8', '77', 'Omacha');
INSERT INTO `ubicacion_distrito` VALUES ('763', '8', '77', 'Paccaritambo');
INSERT INTO `ubicacion_distrito` VALUES ('764', '8', '77', 'Pillpinto');
INSERT INTO `ubicacion_distrito` VALUES ('765', '8', '77', 'Yaurisque');
INSERT INTO `ubicacion_distrito` VALUES ('766', '8', '78', 'Paucartambo');
INSERT INTO `ubicacion_distrito` VALUES ('767', '8', '78', 'Caicay');
INSERT INTO `ubicacion_distrito` VALUES ('768', '8', '78', 'Challabamba');
INSERT INTO `ubicacion_distrito` VALUES ('769', '8', '78', 'Colquepata');
INSERT INTO `ubicacion_distrito` VALUES ('770', '8', '78', 'Huancarani');
INSERT INTO `ubicacion_distrito` VALUES ('771', '8', '78', 'Kosñipata');
INSERT INTO `ubicacion_distrito` VALUES ('772', '8', '79', 'Urcos');
INSERT INTO `ubicacion_distrito` VALUES ('773', '8', '79', 'Andahuaylillas');
INSERT INTO `ubicacion_distrito` VALUES ('774', '8', '79', 'Camanti');
INSERT INTO `ubicacion_distrito` VALUES ('775', '8', '79', 'Ccarhuayo');
INSERT INTO `ubicacion_distrito` VALUES ('776', '8', '79', 'Ccatca');
INSERT INTO `ubicacion_distrito` VALUES ('777', '8', '79', 'Cusipata');
INSERT INTO `ubicacion_distrito` VALUES ('778', '8', '79', 'Huaro');
INSERT INTO `ubicacion_distrito` VALUES ('779', '8', '79', 'Lucre');
INSERT INTO `ubicacion_distrito` VALUES ('780', '8', '79', 'Marcapata');
INSERT INTO `ubicacion_distrito` VALUES ('781', '8', '79', 'Ocongate');
INSERT INTO `ubicacion_distrito` VALUES ('782', '8', '79', 'Oropesa');
INSERT INTO `ubicacion_distrito` VALUES ('783', '8', '79', 'Quiquijana');
INSERT INTO `ubicacion_distrito` VALUES ('784', '8', '80', 'Urubamba');
INSERT INTO `ubicacion_distrito` VALUES ('785', '8', '80', 'Chinchero');
INSERT INTO `ubicacion_distrito` VALUES ('786', '8', '80', 'Huayllabamba');
INSERT INTO `ubicacion_distrito` VALUES ('787', '8', '80', 'Machupicchu');
INSERT INTO `ubicacion_distrito` VALUES ('788', '8', '80', 'Maras');
INSERT INTO `ubicacion_distrito` VALUES ('789', '8', '80', 'Ollantaytambo');
INSERT INTO `ubicacion_distrito` VALUES ('790', '8', '80', 'Yucay');
INSERT INTO `ubicacion_distrito` VALUES ('791', '9', '81', 'Huancavelica');
INSERT INTO `ubicacion_distrito` VALUES ('792', '9', '81', 'Acobambilla');
INSERT INTO `ubicacion_distrito` VALUES ('793', '9', '81', 'Acoria');
INSERT INTO `ubicacion_distrito` VALUES ('794', '9', '81', 'Conayca');
INSERT INTO `ubicacion_distrito` VALUES ('795', '9', '81', 'Cuenca');
INSERT INTO `ubicacion_distrito` VALUES ('796', '9', '81', 'Huachocolpa');
INSERT INTO `ubicacion_distrito` VALUES ('797', '9', '81', 'Huayllahuara');
INSERT INTO `ubicacion_distrito` VALUES ('798', '9', '81', 'Izcuchaca');
INSERT INTO `ubicacion_distrito` VALUES ('799', '9', '81', 'Laria');
INSERT INTO `ubicacion_distrito` VALUES ('800', '9', '81', 'Manta');
INSERT INTO `ubicacion_distrito` VALUES ('801', '9', '81', 'Mariscal Caceres');
INSERT INTO `ubicacion_distrito` VALUES ('802', '9', '81', 'Moya');
INSERT INTO `ubicacion_distrito` VALUES ('803', '9', '81', 'Nuevo Occoro');
INSERT INTO `ubicacion_distrito` VALUES ('804', '9', '81', 'Palca');
INSERT INTO `ubicacion_distrito` VALUES ('805', '9', '81', 'Pilchaca');
INSERT INTO `ubicacion_distrito` VALUES ('806', '9', '81', 'Vilca');
INSERT INTO `ubicacion_distrito` VALUES ('807', '9', '81', 'Yauli');
INSERT INTO `ubicacion_distrito` VALUES ('808', '9', '81', 'Ascension');
INSERT INTO `ubicacion_distrito` VALUES ('809', '9', '82', 'Acobamba');
INSERT INTO `ubicacion_distrito` VALUES ('810', '9', '82', 'Andabamba');
INSERT INTO `ubicacion_distrito` VALUES ('811', '9', '82', 'Anta');
INSERT INTO `ubicacion_distrito` VALUES ('812', '9', '82', 'Caja');
INSERT INTO `ubicacion_distrito` VALUES ('813', '9', '82', 'Marcas');
INSERT INTO `ubicacion_distrito` VALUES ('814', '9', '82', 'Paucara');
INSERT INTO `ubicacion_distrito` VALUES ('815', '9', '82', 'Pomacocha');
INSERT INTO `ubicacion_distrito` VALUES ('816', '9', '82', 'Rosario');
INSERT INTO `ubicacion_distrito` VALUES ('817', '9', '83', 'Lircay');
INSERT INTO `ubicacion_distrito` VALUES ('818', '9', '83', 'Anchonga');
INSERT INTO `ubicacion_distrito` VALUES ('819', '9', '83', 'Callanmarca');
INSERT INTO `ubicacion_distrito` VALUES ('820', '9', '83', 'Ccochaccasa');
INSERT INTO `ubicacion_distrito` VALUES ('821', '9', '83', 'Chincho');
INSERT INTO `ubicacion_distrito` VALUES ('822', '9', '83', 'Congalla');
INSERT INTO `ubicacion_distrito` VALUES ('823', '9', '83', 'Huanca-Huanca');
INSERT INTO `ubicacion_distrito` VALUES ('824', '9', '83', 'Huayllay Grande');
INSERT INTO `ubicacion_distrito` VALUES ('825', '9', '83', 'Julcamarca');
INSERT INTO `ubicacion_distrito` VALUES ('826', '9', '83', 'San Antonio De Antaparco');
INSERT INTO `ubicacion_distrito` VALUES ('827', '9', '83', 'Santo Tomas De Pata');
INSERT INTO `ubicacion_distrito` VALUES ('828', '9', '83', 'Secclla');
INSERT INTO `ubicacion_distrito` VALUES ('829', '9', '84', 'Castrovirreyna');
INSERT INTO `ubicacion_distrito` VALUES ('830', '9', '84', 'Arma');
INSERT INTO `ubicacion_distrito` VALUES ('831', '9', '84', 'Aurahua');
INSERT INTO `ubicacion_distrito` VALUES ('832', '9', '84', 'Capillas');
INSERT INTO `ubicacion_distrito` VALUES ('833', '9', '84', 'Chupamarca');
INSERT INTO `ubicacion_distrito` VALUES ('834', '9', '84', 'Cocas');
INSERT INTO `ubicacion_distrito` VALUES ('835', '9', '84', 'Huachos');
INSERT INTO `ubicacion_distrito` VALUES ('836', '9', '84', 'Huamatambo');
INSERT INTO `ubicacion_distrito` VALUES ('837', '9', '84', 'Mollepampa');
INSERT INTO `ubicacion_distrito` VALUES ('838', '9', '84', 'San Juan');
INSERT INTO `ubicacion_distrito` VALUES ('839', '9', '84', 'Santa Ana');
INSERT INTO `ubicacion_distrito` VALUES ('840', '9', '84', 'Tantara');
INSERT INTO `ubicacion_distrito` VALUES ('841', '9', '84', 'Ticrapo');
INSERT INTO `ubicacion_distrito` VALUES ('842', '9', '85', 'Churcampa');
INSERT INTO `ubicacion_distrito` VALUES ('843', '9', '85', 'Anco');
INSERT INTO `ubicacion_distrito` VALUES ('844', '9', '85', 'Chinchihuasi');
INSERT INTO `ubicacion_distrito` VALUES ('845', '9', '85', 'El Carmen');
INSERT INTO `ubicacion_distrito` VALUES ('846', '9', '85', 'La Merced');
INSERT INTO `ubicacion_distrito` VALUES ('847', '9', '85', 'Locroja');
INSERT INTO `ubicacion_distrito` VALUES ('848', '9', '85', 'Paucarbamba');
INSERT INTO `ubicacion_distrito` VALUES ('849', '9', '85', 'San Miguel De Mayocc');
INSERT INTO `ubicacion_distrito` VALUES ('850', '9', '85', 'San Pedro De Coris');
INSERT INTO `ubicacion_distrito` VALUES ('851', '9', '85', 'Pachamarca');
INSERT INTO `ubicacion_distrito` VALUES ('852', '9', '86', 'Huaytara');
INSERT INTO `ubicacion_distrito` VALUES ('853', '9', '86', 'Ayavi');
INSERT INTO `ubicacion_distrito` VALUES ('854', '9', '86', 'Cordova');
INSERT INTO `ubicacion_distrito` VALUES ('855', '9', '86', 'Huayacundo Arma');
INSERT INTO `ubicacion_distrito` VALUES ('856', '9', '86', 'Laramarca');
INSERT INTO `ubicacion_distrito` VALUES ('857', '9', '86', 'Ocoyo');
INSERT INTO `ubicacion_distrito` VALUES ('858', '9', '86', 'Pilpichaca');
INSERT INTO `ubicacion_distrito` VALUES ('859', '9', '86', 'Querco');
INSERT INTO `ubicacion_distrito` VALUES ('860', '9', '86', 'Quito-Arma');
INSERT INTO `ubicacion_distrito` VALUES ('861', '9', '86', 'San Antonio De Cusicancha');
INSERT INTO `ubicacion_distrito` VALUES ('862', '9', '86', 'San Francisco De Sangayaico');
INSERT INTO `ubicacion_distrito` VALUES ('863', '9', '86', 'San Isidro');
INSERT INTO `ubicacion_distrito` VALUES ('864', '9', '86', 'Santiago De Chocorvos');
INSERT INTO `ubicacion_distrito` VALUES ('865', '9', '86', 'Santiago De Quirahuara');
INSERT INTO `ubicacion_distrito` VALUES ('866', '9', '86', 'Santo Domingo De Capillas');
INSERT INTO `ubicacion_distrito` VALUES ('867', '9', '86', 'Tambo');
INSERT INTO `ubicacion_distrito` VALUES ('868', '9', '87', 'Pampas');
INSERT INTO `ubicacion_distrito` VALUES ('869', '9', '87', 'Acostambo');
INSERT INTO `ubicacion_distrito` VALUES ('870', '9', '87', 'Acraquia');
INSERT INTO `ubicacion_distrito` VALUES ('871', '9', '87', 'Ahuaycha');
INSERT INTO `ubicacion_distrito` VALUES ('872', '9', '87', 'Colcabamba');
INSERT INTO `ubicacion_distrito` VALUES ('873', '9', '87', 'Daniel Hernandez');
INSERT INTO `ubicacion_distrito` VALUES ('874', '9', '87', 'Huachocolpa');
INSERT INTO `ubicacion_distrito` VALUES ('875', '9', '87', 'Huando');
INSERT INTO `ubicacion_distrito` VALUES ('876', '9', '87', 'Huaribamba');
INSERT INTO `ubicacion_distrito` VALUES ('877', '9', '87', 'Ñahuimpuquio');
INSERT INTO `ubicacion_distrito` VALUES ('878', '9', '87', 'Pazos');
INSERT INTO `ubicacion_distrito` VALUES ('879', '9', '87', 'Quishuar');
INSERT INTO `ubicacion_distrito` VALUES ('880', '9', '87', 'Salcabamba');
INSERT INTO `ubicacion_distrito` VALUES ('881', '9', '87', 'Salcahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('882', '9', '87', 'San Marcos De Rocchac');
INSERT INTO `ubicacion_distrito` VALUES ('883', '9', '87', 'Surcubamba');
INSERT INTO `ubicacion_distrito` VALUES ('884', '9', '87', 'Tintay Puncu');
INSERT INTO `ubicacion_distrito` VALUES ('885', '10', '88', 'Huanuco');
INSERT INTO `ubicacion_distrito` VALUES ('886', '10', '88', 'Amarilis');
INSERT INTO `ubicacion_distrito` VALUES ('887', '10', '88', 'Chinchao');
INSERT INTO `ubicacion_distrito` VALUES ('888', '10', '88', 'Churubamba');
INSERT INTO `ubicacion_distrito` VALUES ('889', '10', '88', 'Margos');
INSERT INTO `ubicacion_distrito` VALUES ('890', '10', '88', 'Quisqui');
INSERT INTO `ubicacion_distrito` VALUES ('891', '10', '88', 'San Francisco De Cayran');
INSERT INTO `ubicacion_distrito` VALUES ('892', '10', '88', 'San Pedro De Chaulan');
INSERT INTO `ubicacion_distrito` VALUES ('893', '10', '88', 'Santa Maria Del Valle');
INSERT INTO `ubicacion_distrito` VALUES ('894', '10', '88', 'Yarumayo');
INSERT INTO `ubicacion_distrito` VALUES ('895', '10', '88', 'Pillco Marca');
INSERT INTO `ubicacion_distrito` VALUES ('896', '10', '89', 'Ambo');
INSERT INTO `ubicacion_distrito` VALUES ('897', '10', '89', 'Cayna');
INSERT INTO `ubicacion_distrito` VALUES ('898', '10', '89', 'Colpas');
INSERT INTO `ubicacion_distrito` VALUES ('899', '10', '89', 'Conchamarca');
INSERT INTO `ubicacion_distrito` VALUES ('900', '10', '89', 'Huacar');
INSERT INTO `ubicacion_distrito` VALUES ('901', '10', '89', 'San Francisco');
INSERT INTO `ubicacion_distrito` VALUES ('902', '10', '89', 'San Rafael');
INSERT INTO `ubicacion_distrito` VALUES ('903', '10', '89', 'Tomay Kichwa');
INSERT INTO `ubicacion_distrito` VALUES ('904', '10', '90', 'La Union');
INSERT INTO `ubicacion_distrito` VALUES ('905', '10', '90', 'Chuquis');
INSERT INTO `ubicacion_distrito` VALUES ('906', '10', '90', 'Marias');
INSERT INTO `ubicacion_distrito` VALUES ('907', '10', '90', 'Pachas');
INSERT INTO `ubicacion_distrito` VALUES ('908', '10', '90', 'Quivilla');
INSERT INTO `ubicacion_distrito` VALUES ('909', '10', '90', 'Ripan');
INSERT INTO `ubicacion_distrito` VALUES ('910', '10', '90', 'Shunqui');
INSERT INTO `ubicacion_distrito` VALUES ('911', '10', '90', 'Sillapata');
INSERT INTO `ubicacion_distrito` VALUES ('912', '10', '90', 'Yanas');
INSERT INTO `ubicacion_distrito` VALUES ('913', '10', '91', 'Huacaybamba');
INSERT INTO `ubicacion_distrito` VALUES ('914', '10', '91', 'Canchabamba');
INSERT INTO `ubicacion_distrito` VALUES ('915', '10', '91', 'Cochabamba');
INSERT INTO `ubicacion_distrito` VALUES ('916', '10', '91', 'Pinra');
INSERT INTO `ubicacion_distrito` VALUES ('917', '10', '92', 'Llata');
INSERT INTO `ubicacion_distrito` VALUES ('918', '10', '92', 'Arancay');
INSERT INTO `ubicacion_distrito` VALUES ('919', '10', '92', 'Chavin De Pariarca');
INSERT INTO `ubicacion_distrito` VALUES ('920', '10', '92', 'Jacas Grande');
INSERT INTO `ubicacion_distrito` VALUES ('921', '10', '92', 'Jircan');
INSERT INTO `ubicacion_distrito` VALUES ('922', '10', '92', 'Miraflores');
INSERT INTO `ubicacion_distrito` VALUES ('923', '10', '92', 'Monzon');
INSERT INTO `ubicacion_distrito` VALUES ('924', '10', '92', 'Punchao');
INSERT INTO `ubicacion_distrito` VALUES ('925', '10', '92', 'Puños');
INSERT INTO `ubicacion_distrito` VALUES ('926', '10', '92', 'Singa');
INSERT INTO `ubicacion_distrito` VALUES ('927', '10', '92', 'Tantamayo');
INSERT INTO `ubicacion_distrito` VALUES ('928', '10', '93', 'Rupa-Rupa');
INSERT INTO `ubicacion_distrito` VALUES ('929', '10', '93', 'Daniel Alomia Robles');
INSERT INTO `ubicacion_distrito` VALUES ('930', '10', '93', 'Hermilio Valdizan');
INSERT INTO `ubicacion_distrito` VALUES ('931', '10', '93', 'Jose Crespo Y Castillo');
INSERT INTO `ubicacion_distrito` VALUES ('932', '10', '93', 'Luyando');
INSERT INTO `ubicacion_distrito` VALUES ('933', '10', '93', 'Mariano Damaso Beraun');
INSERT INTO `ubicacion_distrito` VALUES ('934', '10', '94', 'Huacrachuco');
INSERT INTO `ubicacion_distrito` VALUES ('935', '10', '94', 'Cholon');
INSERT INTO `ubicacion_distrito` VALUES ('936', '10', '94', 'San Buenaventura');
INSERT INTO `ubicacion_distrito` VALUES ('937', '10', '95', 'Panao');
INSERT INTO `ubicacion_distrito` VALUES ('938', '10', '95', 'Chaglla');
INSERT INTO `ubicacion_distrito` VALUES ('939', '10', '95', 'Molino');
INSERT INTO `ubicacion_distrito` VALUES ('940', '10', '95', 'Umari');
INSERT INTO `ubicacion_distrito` VALUES ('941', '10', '96', 'Puerto Inca');
INSERT INTO `ubicacion_distrito` VALUES ('942', '10', '96', 'Codo Del Pozuzo');
INSERT INTO `ubicacion_distrito` VALUES ('943', '10', '96', 'Honoria');
INSERT INTO `ubicacion_distrito` VALUES ('944', '10', '96', 'Tournavista');
INSERT INTO `ubicacion_distrito` VALUES ('945', '10', '96', 'Yuyapichis');
INSERT INTO `ubicacion_distrito` VALUES ('946', '10', '97', 'Jesus');
INSERT INTO `ubicacion_distrito` VALUES ('947', '10', '97', 'Baños');
INSERT INTO `ubicacion_distrito` VALUES ('948', '10', '97', 'Jivia');
INSERT INTO `ubicacion_distrito` VALUES ('949', '10', '97', 'Queropalca');
INSERT INTO `ubicacion_distrito` VALUES ('950', '10', '97', 'Rondos');
INSERT INTO `ubicacion_distrito` VALUES ('951', '10', '97', 'San Francisco De Asis');
INSERT INTO `ubicacion_distrito` VALUES ('952', '10', '97', 'San Miguel De Cauri');
INSERT INTO `ubicacion_distrito` VALUES ('953', '10', '98', 'Chavinillo');
INSERT INTO `ubicacion_distrito` VALUES ('954', '10', '98', 'Cahuac');
INSERT INTO `ubicacion_distrito` VALUES ('955', '10', '98', 'Chacabamba');
INSERT INTO `ubicacion_distrito` VALUES ('956', '10', '98', 'Aparicio Pomares');
INSERT INTO `ubicacion_distrito` VALUES ('957', '10', '98', 'Jacas Chico');
INSERT INTO `ubicacion_distrito` VALUES ('958', '10', '98', 'Obas');
INSERT INTO `ubicacion_distrito` VALUES ('959', '10', '98', 'Pampamarca');
INSERT INTO `ubicacion_distrito` VALUES ('960', '10', '98', 'Choras');
INSERT INTO `ubicacion_distrito` VALUES ('961', '11', '99', 'Ica');
INSERT INTO `ubicacion_distrito` VALUES ('962', '11', '99', 'La Tinguiða');
INSERT INTO `ubicacion_distrito` VALUES ('963', '11', '99', 'Los Aquijes');
INSERT INTO `ubicacion_distrito` VALUES ('964', '11', '99', 'Ocucaje');
INSERT INTO `ubicacion_distrito` VALUES ('965', '11', '99', 'Pachacutec');
INSERT INTO `ubicacion_distrito` VALUES ('966', '11', '99', 'Parcona');
INSERT INTO `ubicacion_distrito` VALUES ('967', '11', '99', 'Pueblo Nuevo');
INSERT INTO `ubicacion_distrito` VALUES ('968', '11', '99', 'Salas');
INSERT INTO `ubicacion_distrito` VALUES ('969', '11', '99', 'San Jose De Los Molinos');
INSERT INTO `ubicacion_distrito` VALUES ('970', '11', '99', 'San Juan Bautista');
INSERT INTO `ubicacion_distrito` VALUES ('971', '11', '99', 'Santiago');
INSERT INTO `ubicacion_distrito` VALUES ('972', '11', '99', 'Subtanjalla');
INSERT INTO `ubicacion_distrito` VALUES ('973', '11', '99', 'Tate');
INSERT INTO `ubicacion_distrito` VALUES ('974', '11', '99', 'Yauca Del Rosario');
INSERT INTO `ubicacion_distrito` VALUES ('975', '11', '100', 'Chincha Alta');
INSERT INTO `ubicacion_distrito` VALUES ('976', '11', '100', 'Alto Laran');
INSERT INTO `ubicacion_distrito` VALUES ('977', '11', '100', 'Chavin');
INSERT INTO `ubicacion_distrito` VALUES ('978', '11', '100', 'Chincha Baja');
INSERT INTO `ubicacion_distrito` VALUES ('979', '11', '100', 'El Carmen');
INSERT INTO `ubicacion_distrito` VALUES ('980', '11', '100', 'Grocio Prado');
INSERT INTO `ubicacion_distrito` VALUES ('981', '11', '100', 'Pueblo Nuevo');
INSERT INTO `ubicacion_distrito` VALUES ('982', '11', '100', 'San Juan De Yanac');
INSERT INTO `ubicacion_distrito` VALUES ('983', '11', '100', 'San Pedro De Huacarpana');
INSERT INTO `ubicacion_distrito` VALUES ('984', '11', '100', 'Sunampe');
INSERT INTO `ubicacion_distrito` VALUES ('985', '11', '100', 'Tambo De Mora');
INSERT INTO `ubicacion_distrito` VALUES ('986', '11', '101', 'Nazca');
INSERT INTO `ubicacion_distrito` VALUES ('987', '11', '101', 'Changuillo');
INSERT INTO `ubicacion_distrito` VALUES ('988', '11', '101', 'El Ingenio');
INSERT INTO `ubicacion_distrito` VALUES ('989', '11', '101', 'Marcona');
INSERT INTO `ubicacion_distrito` VALUES ('990', '11', '101', 'Vista Alegre');
INSERT INTO `ubicacion_distrito` VALUES ('991', '11', '102', 'Palpa');
INSERT INTO `ubicacion_distrito` VALUES ('992', '11', '102', 'Llipata');
INSERT INTO `ubicacion_distrito` VALUES ('993', '11', '102', 'Rio Grande');
INSERT INTO `ubicacion_distrito` VALUES ('994', '11', '102', 'Santa Cruz');
INSERT INTO `ubicacion_distrito` VALUES ('995', '11', '102', 'Tibillo');
INSERT INTO `ubicacion_distrito` VALUES ('996', '11', '103', 'Pisco');
INSERT INTO `ubicacion_distrito` VALUES ('997', '11', '103', 'Huancano');
INSERT INTO `ubicacion_distrito` VALUES ('998', '11', '103', 'Humay');
INSERT INTO `ubicacion_distrito` VALUES ('999', '11', '103', 'Independencia');
INSERT INTO `ubicacion_distrito` VALUES ('1000', '11', '103', 'Paracas');
INSERT INTO `ubicacion_distrito` VALUES ('1001', '11', '103', 'San Andres');
INSERT INTO `ubicacion_distrito` VALUES ('1002', '11', '103', 'San Clemente');
INSERT INTO `ubicacion_distrito` VALUES ('1003', '11', '103', 'Tupac Amaru Inca');
INSERT INTO `ubicacion_distrito` VALUES ('1004', '12', '104', 'Huancayo');
INSERT INTO `ubicacion_distrito` VALUES ('1005', '12', '104', 'Carhuacallanga');
INSERT INTO `ubicacion_distrito` VALUES ('1006', '12', '104', 'Chacapampa');
INSERT INTO `ubicacion_distrito` VALUES ('1007', '12', '104', 'Chicche');
INSERT INTO `ubicacion_distrito` VALUES ('1008', '12', '104', 'Chilca');
INSERT INTO `ubicacion_distrito` VALUES ('1009', '12', '104', 'Chongos Alto');
INSERT INTO `ubicacion_distrito` VALUES ('1010', '12', '104', 'Chupuro');
INSERT INTO `ubicacion_distrito` VALUES ('1011', '12', '104', 'Colca');
INSERT INTO `ubicacion_distrito` VALUES ('1012', '12', '104', 'Cullhuas');
INSERT INTO `ubicacion_distrito` VALUES ('1013', '12', '104', 'El Tambo');
INSERT INTO `ubicacion_distrito` VALUES ('1014', '12', '104', 'Huacrapuquio');
INSERT INTO `ubicacion_distrito` VALUES ('1015', '12', '104', 'Hualhuas');
INSERT INTO `ubicacion_distrito` VALUES ('1016', '12', '104', 'Huancan');
INSERT INTO `ubicacion_distrito` VALUES ('1017', '12', '104', 'Huasicancha');
INSERT INTO `ubicacion_distrito` VALUES ('1018', '12', '104', 'Huayucachi');
INSERT INTO `ubicacion_distrito` VALUES ('1019', '12', '104', 'Ingenio');
INSERT INTO `ubicacion_distrito` VALUES ('1020', '12', '104', 'Pariahuanca');
INSERT INTO `ubicacion_distrito` VALUES ('1021', '12', '104', 'Pilcomayo');
INSERT INTO `ubicacion_distrito` VALUES ('1022', '12', '104', 'Pucara');
INSERT INTO `ubicacion_distrito` VALUES ('1023', '12', '104', 'Quichuay');
INSERT INTO `ubicacion_distrito` VALUES ('1024', '12', '104', 'Quilcas');
INSERT INTO `ubicacion_distrito` VALUES ('1025', '12', '104', 'San Agustin');
INSERT INTO `ubicacion_distrito` VALUES ('1026', '12', '104', 'San Jeronimo De Tunan');
INSERT INTO `ubicacion_distrito` VALUES ('1027', '12', '104', 'Saño');
INSERT INTO `ubicacion_distrito` VALUES ('1028', '12', '104', 'Sapallanga');
INSERT INTO `ubicacion_distrito` VALUES ('1029', '12', '104', 'Sicaya');
INSERT INTO `ubicacion_distrito` VALUES ('1030', '12', '104', 'Santo Domingo De Acobamba');
INSERT INTO `ubicacion_distrito` VALUES ('1031', '12', '104', 'Viques');
INSERT INTO `ubicacion_distrito` VALUES ('1032', '12', '105', 'Concepcion');
INSERT INTO `ubicacion_distrito` VALUES ('1033', '12', '105', 'Aco');
INSERT INTO `ubicacion_distrito` VALUES ('1034', '12', '105', 'Andamarca');
INSERT INTO `ubicacion_distrito` VALUES ('1035', '12', '105', 'Chambara');
INSERT INTO `ubicacion_distrito` VALUES ('1036', '12', '105', 'Cochas');
INSERT INTO `ubicacion_distrito` VALUES ('1037', '12', '105', 'Comas');
INSERT INTO `ubicacion_distrito` VALUES ('1038', '12', '105', 'Heroinas Toledo');
INSERT INTO `ubicacion_distrito` VALUES ('1039', '12', '105', 'Manzanares');
INSERT INTO `ubicacion_distrito` VALUES ('1040', '12', '105', 'Mariscal Castilla');
INSERT INTO `ubicacion_distrito` VALUES ('1041', '12', '105', 'Matahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('1042', '12', '105', 'Mito');
INSERT INTO `ubicacion_distrito` VALUES ('1043', '12', '105', 'Nueve De Julio');
INSERT INTO `ubicacion_distrito` VALUES ('1044', '12', '105', 'Orcotuna');
INSERT INTO `ubicacion_distrito` VALUES ('1045', '12', '105', 'San Jose De Quero');
INSERT INTO `ubicacion_distrito` VALUES ('1046', '12', '105', 'Santa Rosa De Ocopa');
INSERT INTO `ubicacion_distrito` VALUES ('1047', '12', '106', 'Chanchamayo');
INSERT INTO `ubicacion_distrito` VALUES ('1048', '12', '106', 'Perene');
INSERT INTO `ubicacion_distrito` VALUES ('1049', '12', '106', 'Pichanaqui');
INSERT INTO `ubicacion_distrito` VALUES ('1050', '12', '106', 'San Luis De Shuaro');
INSERT INTO `ubicacion_distrito` VALUES ('1051', '12', '106', 'San Ramon');
INSERT INTO `ubicacion_distrito` VALUES ('1052', '12', '106', 'Vitoc');
INSERT INTO `ubicacion_distrito` VALUES ('1053', '12', '107', 'Jauja');
INSERT INTO `ubicacion_distrito` VALUES ('1054', '12', '107', 'Acolla');
INSERT INTO `ubicacion_distrito` VALUES ('1055', '12', '107', 'Apata');
INSERT INTO `ubicacion_distrito` VALUES ('1056', '12', '107', 'Ataura');
INSERT INTO `ubicacion_distrito` VALUES ('1057', '12', '107', 'Canchayllo');
INSERT INTO `ubicacion_distrito` VALUES ('1058', '12', '107', 'Curicaca');
INSERT INTO `ubicacion_distrito` VALUES ('1059', '12', '107', 'El Mantaro');
INSERT INTO `ubicacion_distrito` VALUES ('1060', '12', '107', 'Huamali');
INSERT INTO `ubicacion_distrito` VALUES ('1061', '12', '107', 'Huaripampa');
INSERT INTO `ubicacion_distrito` VALUES ('1062', '12', '107', 'Huertas');
INSERT INTO `ubicacion_distrito` VALUES ('1063', '12', '107', 'Janjaillo');
INSERT INTO `ubicacion_distrito` VALUES ('1064', '12', '107', 'Julcan');
INSERT INTO `ubicacion_distrito` VALUES ('1065', '12', '107', 'Leonor Ordoñez');
INSERT INTO `ubicacion_distrito` VALUES ('1066', '12', '107', 'Llocllapampa');
INSERT INTO `ubicacion_distrito` VALUES ('1067', '12', '107', 'Marco');
INSERT INTO `ubicacion_distrito` VALUES ('1068', '12', '107', 'Masma');
INSERT INTO `ubicacion_distrito` VALUES ('1069', '12', '107', 'Masma Chicche');
INSERT INTO `ubicacion_distrito` VALUES ('1070', '12', '107', 'Molinos');
INSERT INTO `ubicacion_distrito` VALUES ('1071', '12', '107', 'Monobamba');
INSERT INTO `ubicacion_distrito` VALUES ('1072', '12', '107', 'Muqui');
INSERT INTO `ubicacion_distrito` VALUES ('1073', '12', '107', 'Muquiyauyo');
INSERT INTO `ubicacion_distrito` VALUES ('1074', '12', '107', 'Paca');
INSERT INTO `ubicacion_distrito` VALUES ('1075', '12', '107', 'Paccha');
INSERT INTO `ubicacion_distrito` VALUES ('1076', '12', '107', 'Pancan');
INSERT INTO `ubicacion_distrito` VALUES ('1077', '12', '107', 'Parco');
INSERT INTO `ubicacion_distrito` VALUES ('1078', '12', '107', 'Pomacancha');
INSERT INTO `ubicacion_distrito` VALUES ('1079', '12', '107', 'Ricran');
INSERT INTO `ubicacion_distrito` VALUES ('1080', '12', '107', 'San Lorenzo');
INSERT INTO `ubicacion_distrito` VALUES ('1081', '12', '107', 'San Pedro De Chunan');
INSERT INTO `ubicacion_distrito` VALUES ('1082', '12', '107', 'Sausa');
INSERT INTO `ubicacion_distrito` VALUES ('1083', '12', '107', 'Sincos');
INSERT INTO `ubicacion_distrito` VALUES ('1084', '12', '107', 'Tunan Marca');
INSERT INTO `ubicacion_distrito` VALUES ('1085', '12', '107', 'Yauli');
INSERT INTO `ubicacion_distrito` VALUES ('1086', '12', '107', 'Yauyos');
INSERT INTO `ubicacion_distrito` VALUES ('1087', '12', '108', 'Junin');
INSERT INTO `ubicacion_distrito` VALUES ('1088', '12', '108', 'Carhuamayo');
INSERT INTO `ubicacion_distrito` VALUES ('1089', '12', '108', 'Ondores');
INSERT INTO `ubicacion_distrito` VALUES ('1090', '12', '108', 'Ulcumayo');
INSERT INTO `ubicacion_distrito` VALUES ('1091', '12', '109', 'Satipo');
INSERT INTO `ubicacion_distrito` VALUES ('1092', '12', '109', 'Coviriali');
INSERT INTO `ubicacion_distrito` VALUES ('1093', '12', '109', 'Llaylla');
INSERT INTO `ubicacion_distrito` VALUES ('1094', '12', '109', 'Mazamari');
INSERT INTO `ubicacion_distrito` VALUES ('1095', '12', '109', 'Pampa Hermosa');
INSERT INTO `ubicacion_distrito` VALUES ('1096', '12', '109', 'Pangoa');
INSERT INTO `ubicacion_distrito` VALUES ('1097', '12', '109', 'Rio Negro');
INSERT INTO `ubicacion_distrito` VALUES ('1098', '12', '109', 'Rio Tambo');
INSERT INTO `ubicacion_distrito` VALUES ('1099', '12', '110', 'Tarma');
INSERT INTO `ubicacion_distrito` VALUES ('1100', '12', '110', 'Acobamba');
INSERT INTO `ubicacion_distrito` VALUES ('1101', '12', '110', 'Huaricolca');
INSERT INTO `ubicacion_distrito` VALUES ('1102', '12', '110', 'Huasahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('1103', '12', '110', 'La Union');
INSERT INTO `ubicacion_distrito` VALUES ('1104', '12', '110', 'Palca');
INSERT INTO `ubicacion_distrito` VALUES ('1105', '12', '110', 'Palcamayo');
INSERT INTO `ubicacion_distrito` VALUES ('1106', '12', '110', 'San Pedro De Cajas');
INSERT INTO `ubicacion_distrito` VALUES ('1107', '12', '110', 'Tapo');
INSERT INTO `ubicacion_distrito` VALUES ('1108', '12', '111', 'La Oroya');
INSERT INTO `ubicacion_distrito` VALUES ('1109', '12', '111', 'Chacapalpa');
INSERT INTO `ubicacion_distrito` VALUES ('1110', '12', '111', 'Huay-Huay');
INSERT INTO `ubicacion_distrito` VALUES ('1111', '12', '111', 'Marcapomacocha');
INSERT INTO `ubicacion_distrito` VALUES ('1112', '12', '111', 'Morococha');
INSERT INTO `ubicacion_distrito` VALUES ('1113', '12', '111', 'Paccha');
INSERT INTO `ubicacion_distrito` VALUES ('1114', '12', '111', 'Santa Barbara De Carhuacaya');
INSERT INTO `ubicacion_distrito` VALUES ('1115', '12', '111', 'Santa Rosa De Sacco');
INSERT INTO `ubicacion_distrito` VALUES ('1116', '12', '111', 'Suitucancha');
INSERT INTO `ubicacion_distrito` VALUES ('1117', '12', '111', 'Yauli');
INSERT INTO `ubicacion_distrito` VALUES ('1118', '12', '112', 'Chupaca');
INSERT INTO `ubicacion_distrito` VALUES ('1119', '12', '112', 'Ahuac');
INSERT INTO `ubicacion_distrito` VALUES ('1120', '12', '112', 'Chongos Bajo');
INSERT INTO `ubicacion_distrito` VALUES ('1121', '12', '112', 'Huachac');
INSERT INTO `ubicacion_distrito` VALUES ('1122', '12', '112', 'Huamancaca Chico');
INSERT INTO `ubicacion_distrito` VALUES ('1123', '12', '112', 'San Juan De Iscos');
INSERT INTO `ubicacion_distrito` VALUES ('1124', '12', '112', 'San Juan De Jarpa');
INSERT INTO `ubicacion_distrito` VALUES ('1125', '12', '112', 'Tres De Diciembre');
INSERT INTO `ubicacion_distrito` VALUES ('1126', '12', '112', 'Yanacancha');
INSERT INTO `ubicacion_distrito` VALUES ('1127', '13', '113', 'Trujillo');
INSERT INTO `ubicacion_distrito` VALUES ('1128', '13', '113', 'El Porvenir');
INSERT INTO `ubicacion_distrito` VALUES ('1129', '13', '113', 'Florencia De Mora');
INSERT INTO `ubicacion_distrito` VALUES ('1130', '13', '113', 'Huanchaco');
INSERT INTO `ubicacion_distrito` VALUES ('1131', '13', '113', 'La Esperanza');
INSERT INTO `ubicacion_distrito` VALUES ('1132', '13', '113', 'Laredo');
INSERT INTO `ubicacion_distrito` VALUES ('1133', '13', '113', 'Moche');
INSERT INTO `ubicacion_distrito` VALUES ('1134', '13', '113', 'Poroto');
INSERT INTO `ubicacion_distrito` VALUES ('1135', '13', '113', 'Salaverry');
INSERT INTO `ubicacion_distrito` VALUES ('1136', '13', '113', 'Simbal');
INSERT INTO `ubicacion_distrito` VALUES ('1137', '13', '113', 'Victor Larco Herrera');
INSERT INTO `ubicacion_distrito` VALUES ('1138', '13', '114', 'Ascope');
INSERT INTO `ubicacion_distrito` VALUES ('1139', '13', '114', 'Chicama');
INSERT INTO `ubicacion_distrito` VALUES ('1140', '13', '114', 'Chocope');
INSERT INTO `ubicacion_distrito` VALUES ('1141', '13', '114', 'Magdalena De Cao');
INSERT INTO `ubicacion_distrito` VALUES ('1142', '13', '114', 'Paijan');
INSERT INTO `ubicacion_distrito` VALUES ('1143', '13', '114', 'Razuri');
INSERT INTO `ubicacion_distrito` VALUES ('1144', '13', '114', 'Santiago De Cao');
INSERT INTO `ubicacion_distrito` VALUES ('1145', '13', '114', 'Casa Grande');
INSERT INTO `ubicacion_distrito` VALUES ('1146', '13', '115', 'Bolivar');
INSERT INTO `ubicacion_distrito` VALUES ('1147', '13', '115', 'Bambamarca');
INSERT INTO `ubicacion_distrito` VALUES ('1148', '13', '115', 'Condormarca');
INSERT INTO `ubicacion_distrito` VALUES ('1149', '13', '115', 'Longotea');
INSERT INTO `ubicacion_distrito` VALUES ('1150', '13', '115', 'Uchumarca');
INSERT INTO `ubicacion_distrito` VALUES ('1151', '13', '115', 'Ucuncha');
INSERT INTO `ubicacion_distrito` VALUES ('1152', '13', '116', 'Chepen');
INSERT INTO `ubicacion_distrito` VALUES ('1153', '13', '116', 'Pacanga');
INSERT INTO `ubicacion_distrito` VALUES ('1154', '13', '116', 'Pueblo Nuevo');
INSERT INTO `ubicacion_distrito` VALUES ('1155', '13', '117', 'Julcan');
INSERT INTO `ubicacion_distrito` VALUES ('1156', '13', '117', 'Calamarca');
INSERT INTO `ubicacion_distrito` VALUES ('1157', '13', '117', 'Carabamba');
INSERT INTO `ubicacion_distrito` VALUES ('1158', '13', '117', 'Huaso');
INSERT INTO `ubicacion_distrito` VALUES ('1159', '13', '118', 'Otuzco');
INSERT INTO `ubicacion_distrito` VALUES ('1160', '13', '118', 'Agallpampa');
INSERT INTO `ubicacion_distrito` VALUES ('1161', '13', '118', 'Charat');
INSERT INTO `ubicacion_distrito` VALUES ('1162', '13', '118', 'Huaranchal');
INSERT INTO `ubicacion_distrito` VALUES ('1163', '13', '118', 'La Cuesta');
INSERT INTO `ubicacion_distrito` VALUES ('1164', '13', '118', 'Mache');
INSERT INTO `ubicacion_distrito` VALUES ('1165', '13', '118', 'Paranday');
INSERT INTO `ubicacion_distrito` VALUES ('1166', '13', '118', 'Salpo');
INSERT INTO `ubicacion_distrito` VALUES ('1167', '13', '118', 'Sinsicap');
INSERT INTO `ubicacion_distrito` VALUES ('1168', '13', '118', 'Usquil');
INSERT INTO `ubicacion_distrito` VALUES ('1169', '13', '119', 'San Pedro De Lloc');
INSERT INTO `ubicacion_distrito` VALUES ('1170', '13', '119', 'Guadalupe');
INSERT INTO `ubicacion_distrito` VALUES ('1171', '13', '119', 'Jequetepeque');
INSERT INTO `ubicacion_distrito` VALUES ('1172', '13', '119', 'Pacasmayo');
INSERT INTO `ubicacion_distrito` VALUES ('1173', '13', '119', 'San Jose');
INSERT INTO `ubicacion_distrito` VALUES ('1174', '13', '120', 'Tayabamba');
INSERT INTO `ubicacion_distrito` VALUES ('1175', '13', '120', 'Buldibuyo');
INSERT INTO `ubicacion_distrito` VALUES ('1176', '13', '120', 'Chillia');
INSERT INTO `ubicacion_distrito` VALUES ('1177', '13', '120', 'Huancaspata');
INSERT INTO `ubicacion_distrito` VALUES ('1178', '13', '120', 'Huaylillas');
INSERT INTO `ubicacion_distrito` VALUES ('1179', '13', '120', 'Huayo');
INSERT INTO `ubicacion_distrito` VALUES ('1180', '13', '120', 'Ongon');
INSERT INTO `ubicacion_distrito` VALUES ('1181', '13', '120', 'Parcoy');
INSERT INTO `ubicacion_distrito` VALUES ('1182', '13', '120', 'Pataz');
INSERT INTO `ubicacion_distrito` VALUES ('1183', '13', '120', 'Pias');
INSERT INTO `ubicacion_distrito` VALUES ('1184', '13', '120', 'Santiago De Challas');
INSERT INTO `ubicacion_distrito` VALUES ('1185', '13', '120', 'Taurija');
INSERT INTO `ubicacion_distrito` VALUES ('1186', '13', '120', 'Urpay');
INSERT INTO `ubicacion_distrito` VALUES ('1187', '13', '121', 'Huamachuco');
INSERT INTO `ubicacion_distrito` VALUES ('1188', '13', '121', 'Chugay');
INSERT INTO `ubicacion_distrito` VALUES ('1189', '13', '121', 'Cochorco');
INSERT INTO `ubicacion_distrito` VALUES ('1190', '13', '121', 'Curgos');
INSERT INTO `ubicacion_distrito` VALUES ('1191', '13', '121', 'Marcabal');
INSERT INTO `ubicacion_distrito` VALUES ('1192', '13', '121', 'Sanagoran');
INSERT INTO `ubicacion_distrito` VALUES ('1193', '13', '121', 'Sarin');
INSERT INTO `ubicacion_distrito` VALUES ('1194', '13', '121', 'Sartimbamba');
INSERT INTO `ubicacion_distrito` VALUES ('1195', '13', '122', 'Santiago De Chuco');
INSERT INTO `ubicacion_distrito` VALUES ('1196', '13', '122', 'Angasmarca');
INSERT INTO `ubicacion_distrito` VALUES ('1197', '13', '122', 'Cachicadan');
INSERT INTO `ubicacion_distrito` VALUES ('1198', '13', '122', 'Mollebamba');
INSERT INTO `ubicacion_distrito` VALUES ('1199', '13', '122', 'Mollepata');
INSERT INTO `ubicacion_distrito` VALUES ('1200', '13', '122', 'Quiruvilca');
INSERT INTO `ubicacion_distrito` VALUES ('1201', '13', '122', 'Santa Cruz De Chuca');
INSERT INTO `ubicacion_distrito` VALUES ('1202', '13', '122', 'Sitabamba');
INSERT INTO `ubicacion_distrito` VALUES ('1203', '13', '123', 'Cascas');
INSERT INTO `ubicacion_distrito` VALUES ('1204', '13', '123', 'Lucma');
INSERT INTO `ubicacion_distrito` VALUES ('1205', '13', '123', 'Marmot');
INSERT INTO `ubicacion_distrito` VALUES ('1206', '13', '123', 'Sayapullo');
INSERT INTO `ubicacion_distrito` VALUES ('1207', '13', '124', 'Viru');
INSERT INTO `ubicacion_distrito` VALUES ('1208', '13', '124', 'Chao');
INSERT INTO `ubicacion_distrito` VALUES ('1209', '13', '124', 'Guadalupito');
INSERT INTO `ubicacion_distrito` VALUES ('1210', '14', '125', 'Chiclayo');
INSERT INTO `ubicacion_distrito` VALUES ('1211', '14', '125', 'Chongoyape');
INSERT INTO `ubicacion_distrito` VALUES ('1212', '14', '125', 'Eten');
INSERT INTO `ubicacion_distrito` VALUES ('1213', '14', '125', 'Eten Puerto');
INSERT INTO `ubicacion_distrito` VALUES ('1214', '14', '125', 'Jose Leonardo Ortiz');
INSERT INTO `ubicacion_distrito` VALUES ('1215', '14', '125', 'La Victoria');
INSERT INTO `ubicacion_distrito` VALUES ('1216', '14', '125', 'Lagunas');
INSERT INTO `ubicacion_distrito` VALUES ('1217', '14', '125', 'Monsefu');
INSERT INTO `ubicacion_distrito` VALUES ('1218', '14', '125', 'Nueva Arica');
INSERT INTO `ubicacion_distrito` VALUES ('1219', '14', '125', 'Oyotun');
INSERT INTO `ubicacion_distrito` VALUES ('1220', '14', '125', 'Picsi');
INSERT INTO `ubicacion_distrito` VALUES ('1221', '14', '125', 'Pimentel');
INSERT INTO `ubicacion_distrito` VALUES ('1222', '14', '125', 'Reque');
INSERT INTO `ubicacion_distrito` VALUES ('1223', '14', '125', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('1224', '14', '125', 'Saña');
INSERT INTO `ubicacion_distrito` VALUES ('1225', '14', '125', 'Cayalti');
INSERT INTO `ubicacion_distrito` VALUES ('1226', '14', '125', 'Patapo');
INSERT INTO `ubicacion_distrito` VALUES ('1227', '14', '125', 'Pomalca');
INSERT INTO `ubicacion_distrito` VALUES ('1228', '14', '125', 'Pucala');
INSERT INTO `ubicacion_distrito` VALUES ('1229', '14', '125', 'Tuman');
INSERT INTO `ubicacion_distrito` VALUES ('1230', '14', '126', 'Ferreñafe');
INSERT INTO `ubicacion_distrito` VALUES ('1231', '14', '126', 'Cañaris');
INSERT INTO `ubicacion_distrito` VALUES ('1232', '14', '126', 'Incahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('1233', '14', '126', 'Manuel Antonio Mesones');
INSERT INTO `ubicacion_distrito` VALUES ('1234', '14', '126', 'o');
INSERT INTO `ubicacion_distrito` VALUES ('1235', '14', '126', 'Pitipo');
INSERT INTO `ubicacion_distrito` VALUES ('1236', '14', '126', 'Pueblo Nuevo');
INSERT INTO `ubicacion_distrito` VALUES ('1237', '14', '127', 'Lambayeque');
INSERT INTO `ubicacion_distrito` VALUES ('1238', '14', '127', 'Chochope');
INSERT INTO `ubicacion_distrito` VALUES ('1239', '14', '127', 'Illimo');
INSERT INTO `ubicacion_distrito` VALUES ('1240', '14', '127', 'Jayanca');
INSERT INTO `ubicacion_distrito` VALUES ('1241', '14', '127', 'Mochumi');
INSERT INTO `ubicacion_distrito` VALUES ('1242', '14', '127', 'Morrope');
INSERT INTO `ubicacion_distrito` VALUES ('1243', '14', '127', 'Motupe');
INSERT INTO `ubicacion_distrito` VALUES ('1244', '14', '127', 'Olmos');
INSERT INTO `ubicacion_distrito` VALUES ('1245', '14', '127', 'Pacora');
INSERT INTO `ubicacion_distrito` VALUES ('1246', '14', '127', 'Salas');
INSERT INTO `ubicacion_distrito` VALUES ('1247', '14', '127', 'San Jose');
INSERT INTO `ubicacion_distrito` VALUES ('1248', '14', '127', 'Tucume');
INSERT INTO `ubicacion_distrito` VALUES ('1249', '15', '128', 'Lima');
INSERT INTO `ubicacion_distrito` VALUES ('1250', '15', '128', 'Ancon');
INSERT INTO `ubicacion_distrito` VALUES ('1251', '15', '128', 'Ate');
INSERT INTO `ubicacion_distrito` VALUES ('1252', '15', '128', 'Barranco');
INSERT INTO `ubicacion_distrito` VALUES ('1253', '15', '128', 'Breña');
INSERT INTO `ubicacion_distrito` VALUES ('1254', '15', '128', 'Carabayllo');
INSERT INTO `ubicacion_distrito` VALUES ('1255', '15', '128', 'Chaclacayo');
INSERT INTO `ubicacion_distrito` VALUES ('1256', '15', '128', 'Chorrillos');
INSERT INTO `ubicacion_distrito` VALUES ('1257', '15', '128', 'Cieneguilla');
INSERT INTO `ubicacion_distrito` VALUES ('1258', '15', '128', 'Comas');
INSERT INTO `ubicacion_distrito` VALUES ('1259', '15', '128', 'El Agustino');
INSERT INTO `ubicacion_distrito` VALUES ('1260', '15', '128', 'Independencia');
INSERT INTO `ubicacion_distrito` VALUES ('1261', '15', '128', 'Jesus Maria');
INSERT INTO `ubicacion_distrito` VALUES ('1262', '15', '128', 'La Molina');
INSERT INTO `ubicacion_distrito` VALUES ('1263', '15', '128', 'La Victoria');
INSERT INTO `ubicacion_distrito` VALUES ('1264', '15', '128', 'Lince');
INSERT INTO `ubicacion_distrito` VALUES ('1265', '15', '128', 'Los Olivos');
INSERT INTO `ubicacion_distrito` VALUES ('1266', '15', '128', 'Lurigancho');
INSERT INTO `ubicacion_distrito` VALUES ('1267', '15', '128', 'Lurin');
INSERT INTO `ubicacion_distrito` VALUES ('1268', '15', '128', 'Magdalena Del Mar');
INSERT INTO `ubicacion_distrito` VALUES ('1269', '15', '128', 'Pueblo Libre');
INSERT INTO `ubicacion_distrito` VALUES ('1270', '15', '128', 'Miraflores');
INSERT INTO `ubicacion_distrito` VALUES ('1271', '15', '128', 'Pachacamac');
INSERT INTO `ubicacion_distrito` VALUES ('1272', '15', '128', 'Pucusana');
INSERT INTO `ubicacion_distrito` VALUES ('1273', '15', '128', 'Puente Piedra');
INSERT INTO `ubicacion_distrito` VALUES ('1274', '15', '128', 'Punta Hermosa');
INSERT INTO `ubicacion_distrito` VALUES ('1275', '15', '128', 'Punta Negra');
INSERT INTO `ubicacion_distrito` VALUES ('1276', '15', '128', 'Rimac');
INSERT INTO `ubicacion_distrito` VALUES ('1277', '15', '128', 'San Bartolo');
INSERT INTO `ubicacion_distrito` VALUES ('1278', '15', '128', 'San Borja');
INSERT INTO `ubicacion_distrito` VALUES ('1279', '15', '128', 'San Isidro');
INSERT INTO `ubicacion_distrito` VALUES ('1280', '15', '128', 'San Juan De Lurigancho');
INSERT INTO `ubicacion_distrito` VALUES ('1281', '15', '128', 'San Juan De Miraflores');
INSERT INTO `ubicacion_distrito` VALUES ('1282', '15', '128', 'San Luis');
INSERT INTO `ubicacion_distrito` VALUES ('1283', '15', '128', 'San Martin De Porres');
INSERT INTO `ubicacion_distrito` VALUES ('1284', '15', '128', 'San Miguel');
INSERT INTO `ubicacion_distrito` VALUES ('1285', '15', '128', 'Santa Anita');
INSERT INTO `ubicacion_distrito` VALUES ('1286', '15', '128', 'Santa Maria Del Mar');
INSERT INTO `ubicacion_distrito` VALUES ('1287', '15', '128', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('1288', '15', '128', 'Santiago De Surco');
INSERT INTO `ubicacion_distrito` VALUES ('1289', '15', '128', 'Surquillo');
INSERT INTO `ubicacion_distrito` VALUES ('1290', '15', '128', 'Villa El Salvador');
INSERT INTO `ubicacion_distrito` VALUES ('1291', '15', '128', 'Villa Maria Del Triunfo');
INSERT INTO `ubicacion_distrito` VALUES ('1292', '15', '129', 'Barranca');
INSERT INTO `ubicacion_distrito` VALUES ('1293', '15', '129', 'Paramonga');
INSERT INTO `ubicacion_distrito` VALUES ('1294', '15', '129', 'Pativilca');
INSERT INTO `ubicacion_distrito` VALUES ('1295', '15', '129', 'Supe');
INSERT INTO `ubicacion_distrito` VALUES ('1296', '15', '129', 'Supe Puerto');
INSERT INTO `ubicacion_distrito` VALUES ('1297', '15', '130', 'Cajatambo');
INSERT INTO `ubicacion_distrito` VALUES ('1298', '15', '130', 'Copa');
INSERT INTO `ubicacion_distrito` VALUES ('1299', '15', '130', 'Gorgor');
INSERT INTO `ubicacion_distrito` VALUES ('1300', '15', '130', 'Huancapon');
INSERT INTO `ubicacion_distrito` VALUES ('1301', '15', '130', 'Manas');
INSERT INTO `ubicacion_distrito` VALUES ('1302', '15', '131', 'Canta');
INSERT INTO `ubicacion_distrito` VALUES ('1303', '15', '131', 'Arahuay');
INSERT INTO `ubicacion_distrito` VALUES ('1304', '15', '131', 'Huamantanga');
INSERT INTO `ubicacion_distrito` VALUES ('1305', '15', '131', 'Huaros');
INSERT INTO `ubicacion_distrito` VALUES ('1306', '15', '131', 'Lachaqui');
INSERT INTO `ubicacion_distrito` VALUES ('1307', '15', '131', 'San Buenaventura');
INSERT INTO `ubicacion_distrito` VALUES ('1308', '15', '131', 'Santa Rosa De Quives');
INSERT INTO `ubicacion_distrito` VALUES ('1309', '15', '132', 'San Vicente De Cañete');
INSERT INTO `ubicacion_distrito` VALUES ('1310', '15', '132', 'Asia');
INSERT INTO `ubicacion_distrito` VALUES ('1311', '15', '132', 'Calango');
INSERT INTO `ubicacion_distrito` VALUES ('1312', '15', '132', 'Cerro Azul');
INSERT INTO `ubicacion_distrito` VALUES ('1313', '15', '132', 'Chilca');
INSERT INTO `ubicacion_distrito` VALUES ('1314', '15', '132', 'Coayllo');
INSERT INTO `ubicacion_distrito` VALUES ('1315', '15', '132', 'Imperial');
INSERT INTO `ubicacion_distrito` VALUES ('1316', '15', '132', 'Lunahuana');
INSERT INTO `ubicacion_distrito` VALUES ('1317', '15', '132', 'Mala');
INSERT INTO `ubicacion_distrito` VALUES ('1318', '15', '132', 'Nuevo Imperial');
INSERT INTO `ubicacion_distrito` VALUES ('1319', '15', '132', 'Pacaran');
INSERT INTO `ubicacion_distrito` VALUES ('1320', '15', '132', 'Quilmana');
INSERT INTO `ubicacion_distrito` VALUES ('1321', '15', '132', 'San Antonio');
INSERT INTO `ubicacion_distrito` VALUES ('1322', '15', '132', 'San Luis');
INSERT INTO `ubicacion_distrito` VALUES ('1323', '15', '132', 'Santa Cruz De Flores');
INSERT INTO `ubicacion_distrito` VALUES ('1324', '15', '132', 'Zuñiga');
INSERT INTO `ubicacion_distrito` VALUES ('1325', '15', '133', 'Huaral');
INSERT INTO `ubicacion_distrito` VALUES ('1326', '15', '133', 'Atavillos Alto');
INSERT INTO `ubicacion_distrito` VALUES ('1327', '15', '133', 'Atavillos Bajo');
INSERT INTO `ubicacion_distrito` VALUES ('1328', '15', '133', 'Aucallama');
INSERT INTO `ubicacion_distrito` VALUES ('1329', '15', '133', 'Chancay');
INSERT INTO `ubicacion_distrito` VALUES ('1330', '15', '133', 'Ihuari');
INSERT INTO `ubicacion_distrito` VALUES ('1331', '15', '133', 'Lampian');
INSERT INTO `ubicacion_distrito` VALUES ('1332', '15', '133', 'Pacaraos');
INSERT INTO `ubicacion_distrito` VALUES ('1333', '15', '133', 'San Miguel De Acos');
INSERT INTO `ubicacion_distrito` VALUES ('1334', '15', '133', 'Santa Cruz De Andamarca');
INSERT INTO `ubicacion_distrito` VALUES ('1335', '15', '133', 'Sumbilca');
INSERT INTO `ubicacion_distrito` VALUES ('1336', '15', '133', 'Veintisiete De Noviembre');
INSERT INTO `ubicacion_distrito` VALUES ('1337', '15', '134', 'Matucana');
INSERT INTO `ubicacion_distrito` VALUES ('1338', '15', '134', 'Antioquia');
INSERT INTO `ubicacion_distrito` VALUES ('1339', '15', '134', 'Callahuanca');
INSERT INTO `ubicacion_distrito` VALUES ('1340', '15', '134', 'Carampoma');
INSERT INTO `ubicacion_distrito` VALUES ('1341', '15', '134', 'Chicla');
INSERT INTO `ubicacion_distrito` VALUES ('1342', '15', '134', 'Cuenca');
INSERT INTO `ubicacion_distrito` VALUES ('1343', '15', '134', 'Huachupampa');
INSERT INTO `ubicacion_distrito` VALUES ('1344', '15', '134', 'Huanza');
INSERT INTO `ubicacion_distrito` VALUES ('1345', '15', '134', 'Huarochiri');
INSERT INTO `ubicacion_distrito` VALUES ('1346', '15', '134', 'Lahuaytambo');
INSERT INTO `ubicacion_distrito` VALUES ('1347', '15', '134', 'Langa');
INSERT INTO `ubicacion_distrito` VALUES ('1348', '15', '134', 'Laraos');
INSERT INTO `ubicacion_distrito` VALUES ('1349', '15', '134', 'Mariatana');
INSERT INTO `ubicacion_distrito` VALUES ('1350', '15', '134', 'Ricardo Palma');
INSERT INTO `ubicacion_distrito` VALUES ('1351', '15', '134', 'San Andres De Tupicocha');
INSERT INTO `ubicacion_distrito` VALUES ('1352', '15', '134', 'San Antonio');
INSERT INTO `ubicacion_distrito` VALUES ('1353', '15', '134', 'San Bartolome');
INSERT INTO `ubicacion_distrito` VALUES ('1354', '15', '134', 'San Damian');
INSERT INTO `ubicacion_distrito` VALUES ('1355', '15', '134', 'San Juan De Iris');
INSERT INTO `ubicacion_distrito` VALUES ('1356', '15', '134', 'San Juan De Tantaranche');
INSERT INTO `ubicacion_distrito` VALUES ('1357', '15', '134', 'San Lorenzo De Quinti');
INSERT INTO `ubicacion_distrito` VALUES ('1358', '15', '134', 'San Mateo');
INSERT INTO `ubicacion_distrito` VALUES ('1359', '15', '134', 'San Mateo De Otao');
INSERT INTO `ubicacion_distrito` VALUES ('1360', '15', '134', 'San Pedro De Casta');
INSERT INTO `ubicacion_distrito` VALUES ('1361', '15', '134', 'San Pedro De Huancayre');
INSERT INTO `ubicacion_distrito` VALUES ('1362', '15', '134', 'Sangallaya');
INSERT INTO `ubicacion_distrito` VALUES ('1363', '15', '134', 'Santa Cruz De Cocachacra');
INSERT INTO `ubicacion_distrito` VALUES ('1364', '15', '134', 'Santa Eulalia');
INSERT INTO `ubicacion_distrito` VALUES ('1365', '15', '134', 'Santiago De Anchucaya');
INSERT INTO `ubicacion_distrito` VALUES ('1366', '15', '134', 'Santiago De Tuna');
INSERT INTO `ubicacion_distrito` VALUES ('1367', '15', '134', 'Santo Domingo De Los Ollero');
INSERT INTO `ubicacion_distrito` VALUES ('1368', '15', '134', 'Surco');
INSERT INTO `ubicacion_distrito` VALUES ('1369', '15', '135', 'Huacho');
INSERT INTO `ubicacion_distrito` VALUES ('1370', '15', '135', 'Ambar');
INSERT INTO `ubicacion_distrito` VALUES ('1371', '15', '135', 'Caleta De Carquin');
INSERT INTO `ubicacion_distrito` VALUES ('1372', '15', '135', 'Checras');
INSERT INTO `ubicacion_distrito` VALUES ('1373', '15', '135', 'Hualmay');
INSERT INTO `ubicacion_distrito` VALUES ('1374', '15', '135', 'Huaura');
INSERT INTO `ubicacion_distrito` VALUES ('1375', '15', '135', 'Leoncio Prado');
INSERT INTO `ubicacion_distrito` VALUES ('1376', '15', '135', 'Paccho');
INSERT INTO `ubicacion_distrito` VALUES ('1377', '15', '135', 'Santa Leonor');
INSERT INTO `ubicacion_distrito` VALUES ('1378', '15', '135', 'Santa Maria');
INSERT INTO `ubicacion_distrito` VALUES ('1379', '15', '135', 'Sayan');
INSERT INTO `ubicacion_distrito` VALUES ('1380', '15', '135', 'Vegueta');
INSERT INTO `ubicacion_distrito` VALUES ('1381', '15', '136', 'Oyon');
INSERT INTO `ubicacion_distrito` VALUES ('1382', '15', '136', 'Andajes');
INSERT INTO `ubicacion_distrito` VALUES ('1383', '15', '136', 'Caujul');
INSERT INTO `ubicacion_distrito` VALUES ('1384', '15', '136', 'Cochamarca');
INSERT INTO `ubicacion_distrito` VALUES ('1385', '15', '136', 'Navan');
INSERT INTO `ubicacion_distrito` VALUES ('1386', '15', '136', 'Pachangara');
INSERT INTO `ubicacion_distrito` VALUES ('1387', '15', '137', 'Yauyos');
INSERT INTO `ubicacion_distrito` VALUES ('1388', '15', '137', 'Alis');
INSERT INTO `ubicacion_distrito` VALUES ('1389', '15', '137', 'Ayauca');
INSERT INTO `ubicacion_distrito` VALUES ('1390', '15', '137', 'Ayaviri');
INSERT INTO `ubicacion_distrito` VALUES ('1391', '15', '137', 'Azangaro');
INSERT INTO `ubicacion_distrito` VALUES ('1392', '15', '137', 'Cacra');
INSERT INTO `ubicacion_distrito` VALUES ('1393', '15', '137', 'Carania');
INSERT INTO `ubicacion_distrito` VALUES ('1394', '15', '137', 'Catahuasi');
INSERT INTO `ubicacion_distrito` VALUES ('1395', '15', '137', 'Chocos');
INSERT INTO `ubicacion_distrito` VALUES ('1396', '15', '137', 'Cochas');
INSERT INTO `ubicacion_distrito` VALUES ('1397', '15', '137', 'Colonia');
INSERT INTO `ubicacion_distrito` VALUES ('1398', '15', '137', 'Hongos');
INSERT INTO `ubicacion_distrito` VALUES ('1399', '15', '137', 'Huampara');
INSERT INTO `ubicacion_distrito` VALUES ('1400', '15', '137', 'Huancaya');
INSERT INTO `ubicacion_distrito` VALUES ('1401', '15', '137', 'Huangascar');
INSERT INTO `ubicacion_distrito` VALUES ('1402', '15', '137', 'Huantan');
INSERT INTO `ubicacion_distrito` VALUES ('1403', '15', '137', 'Huaðec');
INSERT INTO `ubicacion_distrito` VALUES ('1404', '15', '137', 'Laraos');
INSERT INTO `ubicacion_distrito` VALUES ('1405', '15', '137', 'Lincha');
INSERT INTO `ubicacion_distrito` VALUES ('1406', '15', '137', 'Madean');
INSERT INTO `ubicacion_distrito` VALUES ('1407', '15', '137', 'Miraflores');
INSERT INTO `ubicacion_distrito` VALUES ('1408', '15', '137', 'Omas');
INSERT INTO `ubicacion_distrito` VALUES ('1409', '15', '137', 'Putinza');
INSERT INTO `ubicacion_distrito` VALUES ('1410', '15', '137', 'Quinches');
INSERT INTO `ubicacion_distrito` VALUES ('1411', '15', '137', 'Quinocay');
INSERT INTO `ubicacion_distrito` VALUES ('1412', '15', '137', 'San Joaquin');
INSERT INTO `ubicacion_distrito` VALUES ('1413', '15', '137', 'San Pedro De Pilas');
INSERT INTO `ubicacion_distrito` VALUES ('1414', '15', '137', 'Tanta');
INSERT INTO `ubicacion_distrito` VALUES ('1415', '15', '137', 'Tauripampa');
INSERT INTO `ubicacion_distrito` VALUES ('1416', '15', '137', 'Tomas');
INSERT INTO `ubicacion_distrito` VALUES ('1417', '15', '137', 'Tupe');
INSERT INTO `ubicacion_distrito` VALUES ('1418', '15', '137', 'Viñac');
INSERT INTO `ubicacion_distrito` VALUES ('1419', '15', '137', 'Vitis');
INSERT INTO `ubicacion_distrito` VALUES ('1420', '16', '138', 'Iquitos');
INSERT INTO `ubicacion_distrito` VALUES ('1421', '16', '138', 'Alto Nanay');
INSERT INTO `ubicacion_distrito` VALUES ('1422', '16', '138', 'Fernando Lores');
INSERT INTO `ubicacion_distrito` VALUES ('1423', '16', '138', 'Indiana');
INSERT INTO `ubicacion_distrito` VALUES ('1424', '16', '138', 'Las Amazonas');
INSERT INTO `ubicacion_distrito` VALUES ('1425', '16', '138', 'Mazan');
INSERT INTO `ubicacion_distrito` VALUES ('1426', '16', '138', 'Napo');
INSERT INTO `ubicacion_distrito` VALUES ('1427', '16', '138', 'Punchana');
INSERT INTO `ubicacion_distrito` VALUES ('1428', '16', '138', 'Putumayo');
INSERT INTO `ubicacion_distrito` VALUES ('1429', '16', '138', 'Torres Causana');
INSERT INTO `ubicacion_distrito` VALUES ('1430', '16', '138', 'Belen');
INSERT INTO `ubicacion_distrito` VALUES ('1431', '16', '138', 'San Juan Bautista');
INSERT INTO `ubicacion_distrito` VALUES ('1432', '16', '139', 'Yurimaguas');
INSERT INTO `ubicacion_distrito` VALUES ('1433', '16', '139', 'Balsapuerto');
INSERT INTO `ubicacion_distrito` VALUES ('1434', '16', '139', 'Barranca');
INSERT INTO `ubicacion_distrito` VALUES ('1435', '16', '139', 'Cahuapanas');
INSERT INTO `ubicacion_distrito` VALUES ('1436', '16', '139', 'Jeberos');
INSERT INTO `ubicacion_distrito` VALUES ('1437', '16', '139', 'Lagunas');
INSERT INTO `ubicacion_distrito` VALUES ('1438', '16', '139', 'Manseriche');
INSERT INTO `ubicacion_distrito` VALUES ('1439', '16', '139', 'Morona');
INSERT INTO `ubicacion_distrito` VALUES ('1440', '16', '139', 'Pastaza');
INSERT INTO `ubicacion_distrito` VALUES ('1441', '16', '139', 'Santa Cruz');
INSERT INTO `ubicacion_distrito` VALUES ('1442', '16', '139', 'Teniente Cesar Lopez Rojas');
INSERT INTO `ubicacion_distrito` VALUES ('1443', '16', '140', 'Nauta');
INSERT INTO `ubicacion_distrito` VALUES ('1444', '16', '140', 'Parinari');
INSERT INTO `ubicacion_distrito` VALUES ('1445', '16', '140', 'Tigre');
INSERT INTO `ubicacion_distrito` VALUES ('1446', '16', '140', 'Trompeteros');
INSERT INTO `ubicacion_distrito` VALUES ('1447', '16', '140', 'Urarinas');
INSERT INTO `ubicacion_distrito` VALUES ('1448', '16', '141', 'Ramon Castilla');
INSERT INTO `ubicacion_distrito` VALUES ('1449', '16', '141', 'Pebas');
INSERT INTO `ubicacion_distrito` VALUES ('1450', '16', '141', 'Yavari');
INSERT INTO `ubicacion_distrito` VALUES ('1451', '16', '141', 'San Pablo');
INSERT INTO `ubicacion_distrito` VALUES ('1452', '16', '142', 'Requena');
INSERT INTO `ubicacion_distrito` VALUES ('1453', '16', '142', 'Alto Tapiche');
INSERT INTO `ubicacion_distrito` VALUES ('1454', '16', '142', 'Capelo');
INSERT INTO `ubicacion_distrito` VALUES ('1455', '16', '142', 'Emilio San Martin');
INSERT INTO `ubicacion_distrito` VALUES ('1456', '16', '142', 'Maquia');
INSERT INTO `ubicacion_distrito` VALUES ('1457', '16', '142', 'Puinahua');
INSERT INTO `ubicacion_distrito` VALUES ('1458', '16', '142', 'Saquena');
INSERT INTO `ubicacion_distrito` VALUES ('1459', '16', '142', 'Soplin');
INSERT INTO `ubicacion_distrito` VALUES ('1460', '16', '142', 'Tapiche');
INSERT INTO `ubicacion_distrito` VALUES ('1461', '16', '142', 'Jenaro Herrera');
INSERT INTO `ubicacion_distrito` VALUES ('1462', '16', '142', 'Yaquerana');
INSERT INTO `ubicacion_distrito` VALUES ('1463', '16', '143', 'Contamana');
INSERT INTO `ubicacion_distrito` VALUES ('1464', '16', '143', 'Inahuaya');
INSERT INTO `ubicacion_distrito` VALUES ('1465', '16', '143', 'Padre Marquez');
INSERT INTO `ubicacion_distrito` VALUES ('1466', '16', '143', 'Pampa Hermosa');
INSERT INTO `ubicacion_distrito` VALUES ('1467', '16', '143', 'Sarayacu');
INSERT INTO `ubicacion_distrito` VALUES ('1468', '16', '143', 'Vargas Guerra');
INSERT INTO `ubicacion_distrito` VALUES ('1469', '17', '144', 'Tambopata');
INSERT INTO `ubicacion_distrito` VALUES ('1470', '17', '144', 'Inambari');
INSERT INTO `ubicacion_distrito` VALUES ('1471', '17', '144', 'Las Piedras');
INSERT INTO `ubicacion_distrito` VALUES ('1472', '17', '144', 'Laberinto');
INSERT INTO `ubicacion_distrito` VALUES ('1473', '17', '145', 'Manu');
INSERT INTO `ubicacion_distrito` VALUES ('1474', '17', '145', 'Fitzcarrald');
INSERT INTO `ubicacion_distrito` VALUES ('1475', '17', '145', 'Madre De Dios');
INSERT INTO `ubicacion_distrito` VALUES ('1476', '17', '145', 'Huepetuhe');
INSERT INTO `ubicacion_distrito` VALUES ('1477', '17', '146', 'Iñapari');
INSERT INTO `ubicacion_distrito` VALUES ('1478', '17', '146', 'Iberia');
INSERT INTO `ubicacion_distrito` VALUES ('1479', '17', '146', 'Tahuamanu');
INSERT INTO `ubicacion_distrito` VALUES ('1480', '18', '147', 'Moquegua');
INSERT INTO `ubicacion_distrito` VALUES ('1481', '18', '147', 'Carumas');
INSERT INTO `ubicacion_distrito` VALUES ('1482', '18', '147', 'Cuchumbaya');
INSERT INTO `ubicacion_distrito` VALUES ('1483', '18', '147', 'Samegua');
INSERT INTO `ubicacion_distrito` VALUES ('1484', '18', '147', 'San Cristobal');
INSERT INTO `ubicacion_distrito` VALUES ('1485', '18', '147', 'Torata');
INSERT INTO `ubicacion_distrito` VALUES ('1486', '18', '148', 'Omate');
INSERT INTO `ubicacion_distrito` VALUES ('1487', '18', '148', 'Chojata');
INSERT INTO `ubicacion_distrito` VALUES ('1488', '18', '148', 'Coalaque');
INSERT INTO `ubicacion_distrito` VALUES ('1489', '18', '148', 'Ichuña');
INSERT INTO `ubicacion_distrito` VALUES ('1490', '18', '148', 'La Capilla');
INSERT INTO `ubicacion_distrito` VALUES ('1491', '18', '148', 'Lloque');
INSERT INTO `ubicacion_distrito` VALUES ('1492', '18', '148', 'Matalaque');
INSERT INTO `ubicacion_distrito` VALUES ('1493', '18', '148', 'Puquina');
INSERT INTO `ubicacion_distrito` VALUES ('1494', '18', '148', 'Quinistaquillas');
INSERT INTO `ubicacion_distrito` VALUES ('1495', '18', '148', 'Ubinas');
INSERT INTO `ubicacion_distrito` VALUES ('1496', '18', '148', 'Yunga');
INSERT INTO `ubicacion_distrito` VALUES ('1497', '18', '149', 'Ilo');
INSERT INTO `ubicacion_distrito` VALUES ('1498', '18', '149', 'El Algarrobal');
INSERT INTO `ubicacion_distrito` VALUES ('1499', '18', '149', 'Pacocha');
INSERT INTO `ubicacion_distrito` VALUES ('1500', '19', '150', 'Chaupimarca');
INSERT INTO `ubicacion_distrito` VALUES ('1501', '19', '150', 'Huachon');
INSERT INTO `ubicacion_distrito` VALUES ('1502', '19', '150', 'Huariaca');
INSERT INTO `ubicacion_distrito` VALUES ('1503', '19', '150', 'Huayllay');
INSERT INTO `ubicacion_distrito` VALUES ('1504', '19', '150', 'Ninacaca');
INSERT INTO `ubicacion_distrito` VALUES ('1505', '19', '150', 'Pallanchacra');
INSERT INTO `ubicacion_distrito` VALUES ('1506', '19', '150', 'Paucartambo');
INSERT INTO `ubicacion_distrito` VALUES ('1507', '19', '150', 'San Fco.De As is De Yarusyac');
INSERT INTO `ubicacion_distrito` VALUES ('1508', '19', '150', 'Simon Bolivar');
INSERT INTO `ubicacion_distrito` VALUES ('1509', '19', '150', 'Ticlacayan');
INSERT INTO `ubicacion_distrito` VALUES ('1510', '19', '150', 'Tinyahuarco');
INSERT INTO `ubicacion_distrito` VALUES ('1511', '19', '150', 'Vicco');
INSERT INTO `ubicacion_distrito` VALUES ('1512', '19', '150', 'Yanacancha');
INSERT INTO `ubicacion_distrito` VALUES ('1513', '19', '151', 'Yanahuanca');
INSERT INTO `ubicacion_distrito` VALUES ('1514', '19', '151', 'Chacayan');
INSERT INTO `ubicacion_distrito` VALUES ('1515', '19', '151', 'Goyllarisquizga');
INSERT INTO `ubicacion_distrito` VALUES ('1516', '19', '151', 'Paucar');
INSERT INTO `ubicacion_distrito` VALUES ('1517', '19', '151', 'San Pedro De Pillao');
INSERT INTO `ubicacion_distrito` VALUES ('1518', '19', '151', 'Santa Ana De Tusi');
INSERT INTO `ubicacion_distrito` VALUES ('1519', '19', '151', 'Tapuc');
INSERT INTO `ubicacion_distrito` VALUES ('1520', '19', '151', 'Vilcabamba');
INSERT INTO `ubicacion_distrito` VALUES ('1521', '19', '152', 'Oxapampa');
INSERT INTO `ubicacion_distrito` VALUES ('1522', '19', '152', 'Chontabamba');
INSERT INTO `ubicacion_distrito` VALUES ('1523', '19', '152', 'Huancabamba');
INSERT INTO `ubicacion_distrito` VALUES ('1524', '19', '152', 'Palcazu');
INSERT INTO `ubicacion_distrito` VALUES ('1525', '19', '152', 'Pozuzo');
INSERT INTO `ubicacion_distrito` VALUES ('1526', '19', '152', 'Puerto Bermudez');
INSERT INTO `ubicacion_distrito` VALUES ('1527', '19', '152', 'Villa Rica');
INSERT INTO `ubicacion_distrito` VALUES ('1528', '20', '153', 'Piura');
INSERT INTO `ubicacion_distrito` VALUES ('1529', '20', '153', 'Castilla');
INSERT INTO `ubicacion_distrito` VALUES ('1530', '20', '153', 'Catacaos');
INSERT INTO `ubicacion_distrito` VALUES ('1531', '20', '153', 'Cura Mori');
INSERT INTO `ubicacion_distrito` VALUES ('1532', '20', '153', 'El Tallan');
INSERT INTO `ubicacion_distrito` VALUES ('1533', '20', '153', 'La Arena');
INSERT INTO `ubicacion_distrito` VALUES ('1534', '20', '153', 'La Union');
INSERT INTO `ubicacion_distrito` VALUES ('1535', '20', '153', 'Las Lomas');
INSERT INTO `ubicacion_distrito` VALUES ('1536', '20', '153', 'Tambo Grande');
INSERT INTO `ubicacion_distrito` VALUES ('1537', '20', '154', 'Ayabaca');
INSERT INTO `ubicacion_distrito` VALUES ('1538', '20', '154', 'Frias');
INSERT INTO `ubicacion_distrito` VALUES ('1539', '20', '154', 'Jilili');
INSERT INTO `ubicacion_distrito` VALUES ('1540', '20', '154', 'Lagunas');
INSERT INTO `ubicacion_distrito` VALUES ('1541', '20', '154', 'Montero');
INSERT INTO `ubicacion_distrito` VALUES ('1542', '20', '154', 'Pacaipampa');
INSERT INTO `ubicacion_distrito` VALUES ('1543', '20', '154', 'Paimas');
INSERT INTO `ubicacion_distrito` VALUES ('1544', '20', '154', 'Sapillica');
INSERT INTO `ubicacion_distrito` VALUES ('1545', '20', '154', 'Sicchez');
INSERT INTO `ubicacion_distrito` VALUES ('1546', '20', '154', 'Suyo');
INSERT INTO `ubicacion_distrito` VALUES ('1547', '20', '155', 'Huancabamba');
INSERT INTO `ubicacion_distrito` VALUES ('1548', '20', '155', 'Canchaque');
INSERT INTO `ubicacion_distrito` VALUES ('1549', '20', '155', 'El Carmen De La Frontera');
INSERT INTO `ubicacion_distrito` VALUES ('1550', '20', '155', 'Huarmaca');
INSERT INTO `ubicacion_distrito` VALUES ('1551', '20', '155', 'Lalaquiz');
INSERT INTO `ubicacion_distrito` VALUES ('1552', '20', '155', 'San Miguel De El Faique');
INSERT INTO `ubicacion_distrito` VALUES ('1553', '20', '155', 'Sondor');
INSERT INTO `ubicacion_distrito` VALUES ('1554', '20', '155', 'Sondorillo');
INSERT INTO `ubicacion_distrito` VALUES ('1555', '20', '156', 'Chulucanas');
INSERT INTO `ubicacion_distrito` VALUES ('1556', '20', '156', 'Buenos Aires');
INSERT INTO `ubicacion_distrito` VALUES ('1557', '20', '156', 'Chalaco');
INSERT INTO `ubicacion_distrito` VALUES ('1558', '20', '156', 'La Matanza');
INSERT INTO `ubicacion_distrito` VALUES ('1559', '20', '156', 'Morropon');
INSERT INTO `ubicacion_distrito` VALUES ('1560', '20', '156', 'Salitral');
INSERT INTO `ubicacion_distrito` VALUES ('1561', '20', '156', 'San Juan De Bigote');
INSERT INTO `ubicacion_distrito` VALUES ('1562', '20', '156', 'Santa Catalina De Mossa');
INSERT INTO `ubicacion_distrito` VALUES ('1563', '20', '156', 'Santo Domingo');
INSERT INTO `ubicacion_distrito` VALUES ('1564', '20', '156', 'Yamango');
INSERT INTO `ubicacion_distrito` VALUES ('1565', '20', '157', 'Paita');
INSERT INTO `ubicacion_distrito` VALUES ('1566', '20', '157', 'Amotape');
INSERT INTO `ubicacion_distrito` VALUES ('1567', '20', '157', 'Arenal');
INSERT INTO `ubicacion_distrito` VALUES ('1568', '20', '157', 'Colan');
INSERT INTO `ubicacion_distrito` VALUES ('1569', '20', '157', 'La Huaca');
INSERT INTO `ubicacion_distrito` VALUES ('1570', '20', '157', 'Tamarindo');
INSERT INTO `ubicacion_distrito` VALUES ('1571', '20', '157', 'Vichayal');
INSERT INTO `ubicacion_distrito` VALUES ('1572', '20', '158', 'Sullana');
INSERT INTO `ubicacion_distrito` VALUES ('1573', '20', '158', 'Bellavista');
INSERT INTO `ubicacion_distrito` VALUES ('1574', '20', '158', 'Ignacio Escudero');
INSERT INTO `ubicacion_distrito` VALUES ('1575', '20', '158', 'Lancones');
INSERT INTO `ubicacion_distrito` VALUES ('1576', '20', '158', 'Marcavelica');
INSERT INTO `ubicacion_distrito` VALUES ('1577', '20', '158', 'Miguel Checa');
INSERT INTO `ubicacion_distrito` VALUES ('1578', '20', '158', 'Querecotillo');
INSERT INTO `ubicacion_distrito` VALUES ('1579', '20', '158', 'Salitral');
INSERT INTO `ubicacion_distrito` VALUES ('1580', '20', '159', 'Pariñas');
INSERT INTO `ubicacion_distrito` VALUES ('1581', '20', '159', 'El Alto');
INSERT INTO `ubicacion_distrito` VALUES ('1582', '20', '159', 'La Brea');
INSERT INTO `ubicacion_distrito` VALUES ('1583', '20', '159', 'Lobitos');
INSERT INTO `ubicacion_distrito` VALUES ('1584', '20', '159', 'Los Organos');
INSERT INTO `ubicacion_distrito` VALUES ('1585', '20', '159', 'Mancora');
INSERT INTO `ubicacion_distrito` VALUES ('1586', '20', '160', 'Sechura');
INSERT INTO `ubicacion_distrito` VALUES ('1587', '20', '160', 'Bellavista De La Union');
INSERT INTO `ubicacion_distrito` VALUES ('1588', '20', '160', 'Bernal');
INSERT INTO `ubicacion_distrito` VALUES ('1589', '20', '160', 'Cristo Nos Valga');
INSERT INTO `ubicacion_distrito` VALUES ('1590', '20', '160', 'Vice');
INSERT INTO `ubicacion_distrito` VALUES ('1591', '20', '160', 'Rinconada Llicuar');
INSERT INTO `ubicacion_distrito` VALUES ('1592', '21', '161', 'Puno');
INSERT INTO `ubicacion_distrito` VALUES ('1593', '21', '161', 'Acora');
INSERT INTO `ubicacion_distrito` VALUES ('1594', '21', '161', 'Amantani');
INSERT INTO `ubicacion_distrito` VALUES ('1595', '21', '161', 'Atuncolla');
INSERT INTO `ubicacion_distrito` VALUES ('1596', '21', '161', 'Capachica');
INSERT INTO `ubicacion_distrito` VALUES ('1597', '21', '161', 'Chucuito');
INSERT INTO `ubicacion_distrito` VALUES ('1598', '21', '161', 'Coata');
INSERT INTO `ubicacion_distrito` VALUES ('1599', '21', '161', 'Huata');
INSERT INTO `ubicacion_distrito` VALUES ('1600', '21', '161', 'Mañazo');
INSERT INTO `ubicacion_distrito` VALUES ('1601', '21', '161', 'Paucarcolla');
INSERT INTO `ubicacion_distrito` VALUES ('1602', '21', '161', 'Pichacani');
INSERT INTO `ubicacion_distrito` VALUES ('1603', '21', '161', 'Plateria');
INSERT INTO `ubicacion_distrito` VALUES ('1604', '21', '161', 'San Antonio');
INSERT INTO `ubicacion_distrito` VALUES ('1605', '21', '161', 'Tiquillaca');
INSERT INTO `ubicacion_distrito` VALUES ('1606', '21', '161', 'Vilque');
INSERT INTO `ubicacion_distrito` VALUES ('1607', '21', '162', 'Azangaro');
INSERT INTO `ubicacion_distrito` VALUES ('1608', '21', '162', 'Achaya');
INSERT INTO `ubicacion_distrito` VALUES ('1609', '21', '162', 'Arapa');
INSERT INTO `ubicacion_distrito` VALUES ('1610', '21', '162', 'Asillo');
INSERT INTO `ubicacion_distrito` VALUES ('1611', '21', '162', 'Caminaca');
INSERT INTO `ubicacion_distrito` VALUES ('1612', '21', '162', 'Chupa');
INSERT INTO `ubicacion_distrito` VALUES ('1613', '21', '162', 'Jose Domingo Choquehuanca');
INSERT INTO `ubicacion_distrito` VALUES ('1614', '21', '162', 'Muñani');
INSERT INTO `ubicacion_distrito` VALUES ('1615', '21', '162', 'Potoni');
INSERT INTO `ubicacion_distrito` VALUES ('1616', '21', '162', 'Saman');
INSERT INTO `ubicacion_distrito` VALUES ('1617', '21', '162', 'San Anton');
INSERT INTO `ubicacion_distrito` VALUES ('1618', '21', '162', 'San Jose');
INSERT INTO `ubicacion_distrito` VALUES ('1619', '21', '162', 'San Juan De Salinas');
INSERT INTO `ubicacion_distrito` VALUES ('1620', '21', '162', 'Santiago De Pupuja');
INSERT INTO `ubicacion_distrito` VALUES ('1621', '21', '162', 'Tirapata');
INSERT INTO `ubicacion_distrito` VALUES ('1622', '21', '163', 'Macusani');
INSERT INTO `ubicacion_distrito` VALUES ('1623', '21', '163', 'Ajoyani');
INSERT INTO `ubicacion_distrito` VALUES ('1624', '21', '163', 'Ayapata');
INSERT INTO `ubicacion_distrito` VALUES ('1625', '21', '163', 'Coasa');
INSERT INTO `ubicacion_distrito` VALUES ('1626', '21', '163', 'Corani');
INSERT INTO `ubicacion_distrito` VALUES ('1627', '21', '163', 'Crucero');
INSERT INTO `ubicacion_distrito` VALUES ('1628', '21', '163', 'Ituata');
INSERT INTO `ubicacion_distrito` VALUES ('1629', '21', '163', 'Ollachea');
INSERT INTO `ubicacion_distrito` VALUES ('1630', '21', '163', 'San Gaban');
INSERT INTO `ubicacion_distrito` VALUES ('1631', '21', '163', 'Usicayos');
INSERT INTO `ubicacion_distrito` VALUES ('1632', '21', '164', 'Juli');
INSERT INTO `ubicacion_distrito` VALUES ('1633', '21', '164', 'Desaguadero');
INSERT INTO `ubicacion_distrito` VALUES ('1634', '21', '164', 'Huacullani');
INSERT INTO `ubicacion_distrito` VALUES ('1635', '21', '164', 'Kelluyo');
INSERT INTO `ubicacion_distrito` VALUES ('1636', '21', '164', 'Pisacoma');
INSERT INTO `ubicacion_distrito` VALUES ('1637', '21', '164', 'Pomata');
INSERT INTO `ubicacion_distrito` VALUES ('1638', '21', '164', 'Zepita');
INSERT INTO `ubicacion_distrito` VALUES ('1639', '21', '165', 'Ilave');
INSERT INTO `ubicacion_distrito` VALUES ('1640', '21', '165', 'Capazo');
INSERT INTO `ubicacion_distrito` VALUES ('1641', '21', '165', 'Pilcuyo');
INSERT INTO `ubicacion_distrito` VALUES ('1642', '21', '165', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('1643', '21', '165', 'Conduriri');
INSERT INTO `ubicacion_distrito` VALUES ('1644', '21', '166', 'Huancane');
INSERT INTO `ubicacion_distrito` VALUES ('1645', '21', '166', 'Cojata');
INSERT INTO `ubicacion_distrito` VALUES ('1646', '21', '166', 'Huatasani');
INSERT INTO `ubicacion_distrito` VALUES ('1647', '21', '166', 'Inchupalla');
INSERT INTO `ubicacion_distrito` VALUES ('1648', '21', '166', 'Pusi');
INSERT INTO `ubicacion_distrito` VALUES ('1649', '21', '166', 'Rosaspata');
INSERT INTO `ubicacion_distrito` VALUES ('1650', '21', '166', 'Taraco');
INSERT INTO `ubicacion_distrito` VALUES ('1651', '21', '166', 'Vilque Chico');
INSERT INTO `ubicacion_distrito` VALUES ('1652', '21', '167', 'Lampa');
INSERT INTO `ubicacion_distrito` VALUES ('1653', '21', '167', 'Cabanilla');
INSERT INTO `ubicacion_distrito` VALUES ('1654', '21', '167', 'Calapuja');
INSERT INTO `ubicacion_distrito` VALUES ('1655', '21', '167', 'Nicasio');
INSERT INTO `ubicacion_distrito` VALUES ('1656', '21', '167', 'Ocuviri');
INSERT INTO `ubicacion_distrito` VALUES ('1657', '21', '167', 'Palca');
INSERT INTO `ubicacion_distrito` VALUES ('1658', '21', '167', 'Paratia');
INSERT INTO `ubicacion_distrito` VALUES ('1659', '21', '167', 'Pucara');
INSERT INTO `ubicacion_distrito` VALUES ('1660', '21', '167', 'Santa Lucia');
INSERT INTO `ubicacion_distrito` VALUES ('1661', '21', '167', 'Vilavila');
INSERT INTO `ubicacion_distrito` VALUES ('1662', '21', '168', 'Ayaviri');
INSERT INTO `ubicacion_distrito` VALUES ('1663', '21', '168', 'Antauta');
INSERT INTO `ubicacion_distrito` VALUES ('1664', '21', '168', 'Cupi');
INSERT INTO `ubicacion_distrito` VALUES ('1665', '21', '168', 'Llalli');
INSERT INTO `ubicacion_distrito` VALUES ('1666', '21', '168', 'Macari');
INSERT INTO `ubicacion_distrito` VALUES ('1667', '21', '168', 'Nuñoa');
INSERT INTO `ubicacion_distrito` VALUES ('1668', '21', '168', 'Orurillo');
INSERT INTO `ubicacion_distrito` VALUES ('1669', '21', '168', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('1670', '21', '168', 'Umachiri');
INSERT INTO `ubicacion_distrito` VALUES ('1671', '21', '169', 'Moho');
INSERT INTO `ubicacion_distrito` VALUES ('1672', '21', '169', 'Conima');
INSERT INTO `ubicacion_distrito` VALUES ('1673', '21', '169', 'Huayrapata');
INSERT INTO `ubicacion_distrito` VALUES ('1674', '21', '169', 'Tilali');
INSERT INTO `ubicacion_distrito` VALUES ('1675', '21', '170', 'Putina');
INSERT INTO `ubicacion_distrito` VALUES ('1676', '21', '170', 'Ananea');
INSERT INTO `ubicacion_distrito` VALUES ('1677', '21', '170', 'Pedro Vilca Apaza');
INSERT INTO `ubicacion_distrito` VALUES ('1678', '21', '170', 'Quilcapuncu');
INSERT INTO `ubicacion_distrito` VALUES ('1679', '21', '170', 'Sina');
INSERT INTO `ubicacion_distrito` VALUES ('1680', '21', '171', 'Juliaca');
INSERT INTO `ubicacion_distrito` VALUES ('1681', '21', '171', 'Cabana');
INSERT INTO `ubicacion_distrito` VALUES ('1682', '21', '171', 'Cabanillas');
INSERT INTO `ubicacion_distrito` VALUES ('1683', '21', '171', 'Caracoto');
INSERT INTO `ubicacion_distrito` VALUES ('1684', '21', '172', 'Sandia');
INSERT INTO `ubicacion_distrito` VALUES ('1685', '21', '172', 'Cuyocuyo');
INSERT INTO `ubicacion_distrito` VALUES ('1686', '21', '172', 'Limbani');
INSERT INTO `ubicacion_distrito` VALUES ('1687', '21', '172', 'Patambuco');
INSERT INTO `ubicacion_distrito` VALUES ('1688', '21', '172', 'Phara');
INSERT INTO `ubicacion_distrito` VALUES ('1689', '21', '172', 'Quiaca');
INSERT INTO `ubicacion_distrito` VALUES ('1690', '21', '172', 'San Juan Del Oro');
INSERT INTO `ubicacion_distrito` VALUES ('1691', '21', '172', 'Yanahuaya');
INSERT INTO `ubicacion_distrito` VALUES ('1692', '21', '172', 'Alto Inambari');
INSERT INTO `ubicacion_distrito` VALUES ('1693', '21', '173', 'Yunguyo');
INSERT INTO `ubicacion_distrito` VALUES ('1694', '21', '173', 'Anapia');
INSERT INTO `ubicacion_distrito` VALUES ('1695', '21', '173', 'Copani');
INSERT INTO `ubicacion_distrito` VALUES ('1696', '21', '173', 'Cuturapi');
INSERT INTO `ubicacion_distrito` VALUES ('1697', '21', '173', 'Ollaraya');
INSERT INTO `ubicacion_distrito` VALUES ('1698', '21', '173', 'Tinicachi');
INSERT INTO `ubicacion_distrito` VALUES ('1699', '21', '173', 'Unicachi');
INSERT INTO `ubicacion_distrito` VALUES ('1700', '22', '174', 'Moyobamba');
INSERT INTO `ubicacion_distrito` VALUES ('1701', '22', '174', 'Calzada');
INSERT INTO `ubicacion_distrito` VALUES ('1702', '22', '174', 'Habana');
INSERT INTO `ubicacion_distrito` VALUES ('1703', '22', '174', 'Jepelacio');
INSERT INTO `ubicacion_distrito` VALUES ('1704', '22', '174', 'Soritor');
INSERT INTO `ubicacion_distrito` VALUES ('1705', '22', '174', 'Yantalo');
INSERT INTO `ubicacion_distrito` VALUES ('1706', '22', '175', 'Bellavista');
INSERT INTO `ubicacion_distrito` VALUES ('1707', '22', '175', 'Alto Biavo');
INSERT INTO `ubicacion_distrito` VALUES ('1708', '22', '175', 'Bajo Biavo');
INSERT INTO `ubicacion_distrito` VALUES ('1709', '22', '175', 'Huallaga');
INSERT INTO `ubicacion_distrito` VALUES ('1710', '22', '175', 'San Pablo');
INSERT INTO `ubicacion_distrito` VALUES ('1711', '22', '175', 'San Rafael');
INSERT INTO `ubicacion_distrito` VALUES ('1712', '22', '176', 'San Jose De Sisa');
INSERT INTO `ubicacion_distrito` VALUES ('1713', '22', '176', 'Agua Blanca');
INSERT INTO `ubicacion_distrito` VALUES ('1714', '22', '176', 'San Martin');
INSERT INTO `ubicacion_distrito` VALUES ('1715', '22', '176', 'Santa Rosa');
INSERT INTO `ubicacion_distrito` VALUES ('1716', '22', '176', 'Shatoja');
INSERT INTO `ubicacion_distrito` VALUES ('1717', '22', '177', 'Saposoa');
INSERT INTO `ubicacion_distrito` VALUES ('1718', '22', '177', 'Alto Saposoa');
INSERT INTO `ubicacion_distrito` VALUES ('1719', '22', '177', 'El Eslabon');
INSERT INTO `ubicacion_distrito` VALUES ('1720', '22', '177', 'Piscoyacu');
INSERT INTO `ubicacion_distrito` VALUES ('1721', '22', '177', 'Sacanche');
INSERT INTO `ubicacion_distrito` VALUES ('1722', '22', '177', 'Tingo De Saposoa');
INSERT INTO `ubicacion_distrito` VALUES ('1723', '22', '178', 'Lamas');
INSERT INTO `ubicacion_distrito` VALUES ('1724', '22', '178', 'Alonso De Alvarado');
INSERT INTO `ubicacion_distrito` VALUES ('1725', '22', '178', 'Barranquita');
INSERT INTO `ubicacion_distrito` VALUES ('1726', '22', '178', 'Caynarachi 1/');
INSERT INTO `ubicacion_distrito` VALUES ('1727', '22', '178', 'Cuñumbuqui');
INSERT INTO `ubicacion_distrito` VALUES ('1728', '22', '178', 'Pinto Recodo');
INSERT INTO `ubicacion_distrito` VALUES ('1729', '22', '178', 'Rumisapa');
INSERT INTO `ubicacion_distrito` VALUES ('1730', '22', '178', 'San Roque De Cumbaza');
INSERT INTO `ubicacion_distrito` VALUES ('1731', '22', '178', 'Shanao');
INSERT INTO `ubicacion_distrito` VALUES ('1732', '22', '178', 'Tabalosos');
INSERT INTO `ubicacion_distrito` VALUES ('1733', '22', '178', 'Zapatero');
INSERT INTO `ubicacion_distrito` VALUES ('1734', '22', '179', 'Juanjui');
INSERT INTO `ubicacion_distrito` VALUES ('1735', '22', '179', 'Campanilla');
INSERT INTO `ubicacion_distrito` VALUES ('1736', '22', '179', 'Huicungo');
INSERT INTO `ubicacion_distrito` VALUES ('1737', '22', '179', 'Pachiza');
INSERT INTO `ubicacion_distrito` VALUES ('1738', '22', '179', 'Pajarillo');
INSERT INTO `ubicacion_distrito` VALUES ('1739', '22', '180', 'Picota');
INSERT INTO `ubicacion_distrito` VALUES ('1740', '22', '180', 'Buenos Aires');
INSERT INTO `ubicacion_distrito` VALUES ('1741', '22', '180', 'Caspisapa');
INSERT INTO `ubicacion_distrito` VALUES ('1742', '22', '180', 'Pilluana');
INSERT INTO `ubicacion_distrito` VALUES ('1743', '22', '180', 'Pucacaca');
INSERT INTO `ubicacion_distrito` VALUES ('1744', '22', '180', 'San Cristobal');
INSERT INTO `ubicacion_distrito` VALUES ('1745', '22', '180', 'San Hilarion');
INSERT INTO `ubicacion_distrito` VALUES ('1746', '22', '180', 'Shamboyacu');
INSERT INTO `ubicacion_distrito` VALUES ('1747', '22', '180', 'Tingo De Ponasa');
INSERT INTO `ubicacion_distrito` VALUES ('1748', '22', '180', 'Tres Unidos');
INSERT INTO `ubicacion_distrito` VALUES ('1749', '22', '181', 'Rioja');
INSERT INTO `ubicacion_distrito` VALUES ('1750', '22', '181', 'Awajun');
INSERT INTO `ubicacion_distrito` VALUES ('1751', '22', '181', 'Elias Soplin Vargas');
INSERT INTO `ubicacion_distrito` VALUES ('1752', '22', '181', 'Nueva Cajamarca');
INSERT INTO `ubicacion_distrito` VALUES ('1753', '22', '181', 'Pardo Miguel');
INSERT INTO `ubicacion_distrito` VALUES ('1754', '22', '181', 'Posic');
INSERT INTO `ubicacion_distrito` VALUES ('1755', '22', '181', 'San Fernando');
INSERT INTO `ubicacion_distrito` VALUES ('1756', '22', '181', 'Yorongos');
INSERT INTO `ubicacion_distrito` VALUES ('1757', '22', '181', 'Yuracyacu');
INSERT INTO `ubicacion_distrito` VALUES ('1758', '22', '182', 'Tarapoto');
INSERT INTO `ubicacion_distrito` VALUES ('1759', '22', '182', 'Alberto Leveau');
INSERT INTO `ubicacion_distrito` VALUES ('1760', '22', '182', 'Cacatachi');
INSERT INTO `ubicacion_distrito` VALUES ('1761', '22', '182', 'Chazuta');
INSERT INTO `ubicacion_distrito` VALUES ('1762', '22', '182', 'Chipurana');
INSERT INTO `ubicacion_distrito` VALUES ('1763', '22', '182', 'El Porvenir');
INSERT INTO `ubicacion_distrito` VALUES ('1764', '22', '182', 'Huimbayoc');
INSERT INTO `ubicacion_distrito` VALUES ('1765', '22', '182', 'Juan Guerra');
INSERT INTO `ubicacion_distrito` VALUES ('1766', '22', '182', 'La Banda De Shilcayo');
INSERT INTO `ubicacion_distrito` VALUES ('1767', '22', '182', 'Morales');
INSERT INTO `ubicacion_distrito` VALUES ('1768', '22', '182', 'Papaplaya');
INSERT INTO `ubicacion_distrito` VALUES ('1769', '22', '182', 'San Antonio');
INSERT INTO `ubicacion_distrito` VALUES ('1770', '22', '182', 'Sauce');
INSERT INTO `ubicacion_distrito` VALUES ('1771', '22', '182', 'Shapaja');
INSERT INTO `ubicacion_distrito` VALUES ('1772', '22', '183', 'Tocache');
INSERT INTO `ubicacion_distrito` VALUES ('1773', '22', '183', 'Nuevo Progreso');
INSERT INTO `ubicacion_distrito` VALUES ('1774', '22', '183', 'Polvora');
INSERT INTO `ubicacion_distrito` VALUES ('1775', '22', '183', 'Shunte');
INSERT INTO `ubicacion_distrito` VALUES ('1776', '22', '183', 'Uchiza');
INSERT INTO `ubicacion_distrito` VALUES ('1777', '23', '184', 'Tacna');
INSERT INTO `ubicacion_distrito` VALUES ('1778', '23', '184', 'Alto De La Alianza');
INSERT INTO `ubicacion_distrito` VALUES ('1779', '23', '184', 'Calana');
INSERT INTO `ubicacion_distrito` VALUES ('1780', '23', '184', 'Ciudad Nueva');
INSERT INTO `ubicacion_distrito` VALUES ('1781', '23', '184', 'Inclan');
INSERT INTO `ubicacion_distrito` VALUES ('1782', '23', '184', 'Pachia');
INSERT INTO `ubicacion_distrito` VALUES ('1783', '23', '184', 'Palca');
INSERT INTO `ubicacion_distrito` VALUES ('1784', '23', '184', 'Pocollay');
INSERT INTO `ubicacion_distrito` VALUES ('1785', '23', '184', 'Sama');
INSERT INTO `ubicacion_distrito` VALUES ('1786', '23', '184', 'Coronel Gregorio Albarracín Lanchipa');
INSERT INTO `ubicacion_distrito` VALUES ('1787', '23', '185', 'Candarave');
INSERT INTO `ubicacion_distrito` VALUES ('1788', '23', '185', 'Cairani');
INSERT INTO `ubicacion_distrito` VALUES ('1789', '23', '185', 'Camilaca');
INSERT INTO `ubicacion_distrito` VALUES ('1790', '23', '185', 'Curibaya');
INSERT INTO `ubicacion_distrito` VALUES ('1791', '23', '185', 'Huanuara');
INSERT INTO `ubicacion_distrito` VALUES ('1792', '23', '185', 'Quilahuani');
INSERT INTO `ubicacion_distrito` VALUES ('1793', '23', '186', 'Locumba');
INSERT INTO `ubicacion_distrito` VALUES ('1794', '23', '186', 'Ilabaya');
INSERT INTO `ubicacion_distrito` VALUES ('1795', '23', '186', 'Ite');
INSERT INTO `ubicacion_distrito` VALUES ('1796', '23', '187', 'Tarata');
INSERT INTO `ubicacion_distrito` VALUES ('1797', '23', '187', 'Chucatamani');
INSERT INTO `ubicacion_distrito` VALUES ('1798', '23', '187', 'Estique');
INSERT INTO `ubicacion_distrito` VALUES ('1799', '23', '187', 'Estique-Pampa');
INSERT INTO `ubicacion_distrito` VALUES ('1800', '23', '187', 'Sitajara');
INSERT INTO `ubicacion_distrito` VALUES ('1801', '23', '187', 'Susapaya');
INSERT INTO `ubicacion_distrito` VALUES ('1802', '23', '187', 'Tarucachi');
INSERT INTO `ubicacion_distrito` VALUES ('1803', '23', '187', 'Ticaco');
INSERT INTO `ubicacion_distrito` VALUES ('1804', '24', '188', 'Tumbes');
INSERT INTO `ubicacion_distrito` VALUES ('1805', '24', '188', 'Corrales');
INSERT INTO `ubicacion_distrito` VALUES ('1806', '24', '188', 'La Cruz');
INSERT INTO `ubicacion_distrito` VALUES ('1807', '24', '188', 'Pampas De Hospital');
INSERT INTO `ubicacion_distrito` VALUES ('1808', '24', '188', 'San Jacinto');
INSERT INTO `ubicacion_distrito` VALUES ('1809', '24', '188', 'San Juan De La Virgen');
INSERT INTO `ubicacion_distrito` VALUES ('1810', '24', '189', 'Zorritos');
INSERT INTO `ubicacion_distrito` VALUES ('1811', '24', '189', 'Casitas');
INSERT INTO `ubicacion_distrito` VALUES ('1812', '24', '190', 'Zarumilla');
INSERT INTO `ubicacion_distrito` VALUES ('1813', '24', '190', 'Aguas Verdes');
INSERT INTO `ubicacion_distrito` VALUES ('1814', '24', '190', 'Matapalo');
INSERT INTO `ubicacion_distrito` VALUES ('1815', '24', '190', 'Papayal');
INSERT INTO `ubicacion_distrito` VALUES ('1816', '25', '191', 'Calleria');
INSERT INTO `ubicacion_distrito` VALUES ('1817', '25', '191', 'Campoverde');
INSERT INTO `ubicacion_distrito` VALUES ('1818', '25', '191', 'Iparia');
INSERT INTO `ubicacion_distrito` VALUES ('1819', '25', '191', 'Masisea');
INSERT INTO `ubicacion_distrito` VALUES ('1820', '25', '191', 'Yarinacocha');
INSERT INTO `ubicacion_distrito` VALUES ('1821', '25', '191', 'Nueva Requena');
INSERT INTO `ubicacion_distrito` VALUES ('1822', '25', '192', 'Raymondi');
INSERT INTO `ubicacion_distrito` VALUES ('1823', '25', '192', 'Sepahua');
INSERT INTO `ubicacion_distrito` VALUES ('1824', '25', '192', 'Tahuania');
INSERT INTO `ubicacion_distrito` VALUES ('1825', '25', '192', 'Yurua');
INSERT INTO `ubicacion_distrito` VALUES ('1826', '25', '193', 'Padre Abad');
INSERT INTO `ubicacion_distrito` VALUES ('1827', '25', '193', 'Irazola');
INSERT INTO `ubicacion_distrito` VALUES ('1828', '25', '193', 'Curimana');
INSERT INTO `ubicacion_distrito` VALUES ('1829', '25', '194', 'Puru');

-- ----------------------------
-- Table structure for ubicacion_provincia
-- ----------------------------
DROP TABLE IF EXISTS `ubicacion_provincia`;
CREATE TABLE `ubicacion_provincia` (
  `idProvincia` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idDepartamento` int(11) unsigned NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  PRIMARY KEY (`idProvincia`)
) ENGINE=MyISAM AUTO_INCREMENT=195 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ubicacion_provincia
-- ----------------------------
INSERT INTO `ubicacion_provincia` VALUES ('1', '1', 'Chachapoyas');
INSERT INTO `ubicacion_provincia` VALUES ('2', '1', 'Bagua');
INSERT INTO `ubicacion_provincia` VALUES ('3', '1', 'Bongara');
INSERT INTO `ubicacion_provincia` VALUES ('4', '1', 'Condorcanqui');
INSERT INTO `ubicacion_provincia` VALUES ('5', '1', 'Luya');
INSERT INTO `ubicacion_provincia` VALUES ('6', '1', 'Rodriguez De Mendo');
INSERT INTO `ubicacion_provincia` VALUES ('7', '1', 'Utcubamba');
INSERT INTO `ubicacion_provincia` VALUES ('8', '2', 'Huaraz');
INSERT INTO `ubicacion_provincia` VALUES ('9', '2', 'Aija');
INSERT INTO `ubicacion_provincia` VALUES ('10', '2', 'Antonio Raymondi');
INSERT INTO `ubicacion_provincia` VALUES ('11', '2', 'Asuncion');
INSERT INTO `ubicacion_provincia` VALUES ('12', '2', 'Bolognesi');
INSERT INTO `ubicacion_provincia` VALUES ('13', '2', 'Carhuaz');
INSERT INTO `ubicacion_provincia` VALUES ('14', '2', 'Carlos F. Fitzcarrald');
INSERT INTO `ubicacion_provincia` VALUES ('15', '2', 'Casma');
INSERT INTO `ubicacion_provincia` VALUES ('16', '2', 'Corongo');
INSERT INTO `ubicacion_provincia` VALUES ('17', '2', 'Huari');
INSERT INTO `ubicacion_provincia` VALUES ('18', '2', 'Huarmey');
INSERT INTO `ubicacion_provincia` VALUES ('19', '2', 'Huaylas');
INSERT INTO `ubicacion_provincia` VALUES ('20', '2', 'Mariscal Luzuriaga');
INSERT INTO `ubicacion_provincia` VALUES ('21', '2', 'Ocros');
INSERT INTO `ubicacion_provincia` VALUES ('22', '2', 'Pallasca');
INSERT INTO `ubicacion_provincia` VALUES ('23', '2', 'Pomabamba');
INSERT INTO `ubicacion_provincia` VALUES ('24', '2', 'Recuay');
INSERT INTO `ubicacion_provincia` VALUES ('25', '2', 'Santa');
INSERT INTO `ubicacion_provincia` VALUES ('26', '2', 'Sihuas');
INSERT INTO `ubicacion_provincia` VALUES ('27', '2', 'Yungay');
INSERT INTO `ubicacion_provincia` VALUES ('28', '3', 'Abancay');
INSERT INTO `ubicacion_provincia` VALUES ('29', '3', 'Andahuaylas');
INSERT INTO `ubicacion_provincia` VALUES ('30', '3', 'Antabamba');
INSERT INTO `ubicacion_provincia` VALUES ('31', '3', 'Aymaraes');
INSERT INTO `ubicacion_provincia` VALUES ('32', '3', 'Cotabambas');
INSERT INTO `ubicacion_provincia` VALUES ('33', '3', 'Chincheros');
INSERT INTO `ubicacion_provincia` VALUES ('34', '3', 'Grau');
INSERT INTO `ubicacion_provincia` VALUES ('35', '4', 'Arequipa');
INSERT INTO `ubicacion_provincia` VALUES ('36', '4', 'Camana');
INSERT INTO `ubicacion_provincia` VALUES ('37', '4', 'Caraveli');
INSERT INTO `ubicacion_provincia` VALUES ('38', '4', 'Castilla');
INSERT INTO `ubicacion_provincia` VALUES ('39', '4', 'Caylloma');
INSERT INTO `ubicacion_provincia` VALUES ('40', '4', 'Condesuyos');
INSERT INTO `ubicacion_provincia` VALUES ('41', '4', 'Islay');
INSERT INTO `ubicacion_provincia` VALUES ('42', '4', 'La Union');
INSERT INTO `ubicacion_provincia` VALUES ('43', '5', 'Huamanga');
INSERT INTO `ubicacion_provincia` VALUES ('44', '5', 'Cangallo');
INSERT INTO `ubicacion_provincia` VALUES ('45', '5', 'Huanca Sancos');
INSERT INTO `ubicacion_provincia` VALUES ('46', '5', 'Huanta');
INSERT INTO `ubicacion_provincia` VALUES ('47', '5', 'La Mar');
INSERT INTO `ubicacion_provincia` VALUES ('48', '5', 'Lucanas');
INSERT INTO `ubicacion_provincia` VALUES ('49', '5', 'Parinacochas');
INSERT INTO `ubicacion_provincia` VALUES ('50', '5', 'Paucar Del Sara Sara');
INSERT INTO `ubicacion_provincia` VALUES ('51', '5', 'Sucre');
INSERT INTO `ubicacion_provincia` VALUES ('52', '5', 'Victor Fajardo');
INSERT INTO `ubicacion_provincia` VALUES ('53', '5', 'Vilcas Huaman');
INSERT INTO `ubicacion_provincia` VALUES ('54', '6', 'Cajamarca');
INSERT INTO `ubicacion_provincia` VALUES ('55', '6', 'Cajabamba');
INSERT INTO `ubicacion_provincia` VALUES ('56', '6', 'Celendin');
INSERT INTO `ubicacion_provincia` VALUES ('57', '6', 'Chota');
INSERT INTO `ubicacion_provincia` VALUES ('58', '6', 'Contumaza');
INSERT INTO `ubicacion_provincia` VALUES ('59', '6', 'Cutervo');
INSERT INTO `ubicacion_provincia` VALUES ('60', '6', 'Hualgayoc');
INSERT INTO `ubicacion_provincia` VALUES ('61', '6', 'Jaen');
INSERT INTO `ubicacion_provincia` VALUES ('62', '6', 'San Ignacio');
INSERT INTO `ubicacion_provincia` VALUES ('63', '6', 'San Marcos');
INSERT INTO `ubicacion_provincia` VALUES ('64', '6', 'San Miguel');
INSERT INTO `ubicacion_provincia` VALUES ('65', '6', 'San Pablo');
INSERT INTO `ubicacion_provincia` VALUES ('66', '6', 'Santa Cruz');
INSERT INTO `ubicacion_provincia` VALUES ('67', '7', 'Callao');
INSERT INTO `ubicacion_provincia` VALUES ('68', '8', 'Cusco');
INSERT INTO `ubicacion_provincia` VALUES ('69', '8', 'Acomayo');
INSERT INTO `ubicacion_provincia` VALUES ('70', '8', 'Anta');
INSERT INTO `ubicacion_provincia` VALUES ('71', '8', 'Calca');
INSERT INTO `ubicacion_provincia` VALUES ('72', '8', 'Canas');
INSERT INTO `ubicacion_provincia` VALUES ('73', '8', 'Canchis');
INSERT INTO `ubicacion_provincia` VALUES ('74', '8', 'Chumbivilcas');
INSERT INTO `ubicacion_provincia` VALUES ('75', '8', 'Espinar');
INSERT INTO `ubicacion_provincia` VALUES ('76', '8', 'La Convencion');
INSERT INTO `ubicacion_provincia` VALUES ('77', '8', 'Paruro');
INSERT INTO `ubicacion_provincia` VALUES ('78', '8', 'Paucartambo');
INSERT INTO `ubicacion_provincia` VALUES ('79', '8', 'Quispicanchi');
INSERT INTO `ubicacion_provincia` VALUES ('80', '8', 'Urubamba');
INSERT INTO `ubicacion_provincia` VALUES ('81', '9', 'Huancavelica');
INSERT INTO `ubicacion_provincia` VALUES ('82', '9', 'Acobamba');
INSERT INTO `ubicacion_provincia` VALUES ('83', '9', 'Angaraes');
INSERT INTO `ubicacion_provincia` VALUES ('84', '9', 'Castrovirreyna');
INSERT INTO `ubicacion_provincia` VALUES ('85', '9', 'Churcampa');
INSERT INTO `ubicacion_provincia` VALUES ('86', '9', 'Huaytara');
INSERT INTO `ubicacion_provincia` VALUES ('87', '9', 'Tayacaja');
INSERT INTO `ubicacion_provincia` VALUES ('88', '10', 'Huanuco');
INSERT INTO `ubicacion_provincia` VALUES ('89', '10', 'Ambo');
INSERT INTO `ubicacion_provincia` VALUES ('90', '10', 'Dos De Mayo');
INSERT INTO `ubicacion_provincia` VALUES ('91', '10', 'Huacaybamba');
INSERT INTO `ubicacion_provincia` VALUES ('92', '10', 'Huamalies');
INSERT INTO `ubicacion_provincia` VALUES ('93', '10', 'Leoncio Prado');
INSERT INTO `ubicacion_provincia` VALUES ('94', '10', 'Marañon');
INSERT INTO `ubicacion_provincia` VALUES ('95', '10', 'Pachitea');
INSERT INTO `ubicacion_provincia` VALUES ('96', '10', 'Puerto Inca');
INSERT INTO `ubicacion_provincia` VALUES ('97', '10', 'Lauricocha');
INSERT INTO `ubicacion_provincia` VALUES ('98', '10', 'Yarowilca');
INSERT INTO `ubicacion_provincia` VALUES ('99', '11', 'Ica');
INSERT INTO `ubicacion_provincia` VALUES ('100', '11', 'Chincha');
INSERT INTO `ubicacion_provincia` VALUES ('101', '11', 'Nazca');
INSERT INTO `ubicacion_provincia` VALUES ('102', '11', 'Palpa');
INSERT INTO `ubicacion_provincia` VALUES ('103', '11', 'Pisco');
INSERT INTO `ubicacion_provincia` VALUES ('104', '12', 'Huancayo');
INSERT INTO `ubicacion_provincia` VALUES ('105', '12', 'Concepcion');
INSERT INTO `ubicacion_provincia` VALUES ('106', '12', 'Chanchamayo');
INSERT INTO `ubicacion_provincia` VALUES ('107', '12', 'Jauja');
INSERT INTO `ubicacion_provincia` VALUES ('108', '12', 'Junin');
INSERT INTO `ubicacion_provincia` VALUES ('109', '12', 'Satipo');
INSERT INTO `ubicacion_provincia` VALUES ('110', '12', 'Tarma');
INSERT INTO `ubicacion_provincia` VALUES ('111', '12', 'Yauli');
INSERT INTO `ubicacion_provincia` VALUES ('112', '12', 'Chupaca');
INSERT INTO `ubicacion_provincia` VALUES ('113', '13', 'Trujillo');
INSERT INTO `ubicacion_provincia` VALUES ('114', '13', 'Ascope');
INSERT INTO `ubicacion_provincia` VALUES ('115', '13', 'Bolivar');
INSERT INTO `ubicacion_provincia` VALUES ('116', '13', 'Chepen');
INSERT INTO `ubicacion_provincia` VALUES ('117', '13', 'Julcan');
INSERT INTO `ubicacion_provincia` VALUES ('118', '13', 'Otuzco');
INSERT INTO `ubicacion_provincia` VALUES ('119', '13', 'Pacasmayo');
INSERT INTO `ubicacion_provincia` VALUES ('120', '13', 'Pataz');
INSERT INTO `ubicacion_provincia` VALUES ('121', '13', 'Sanchez Carrion');
INSERT INTO `ubicacion_provincia` VALUES ('122', '13', 'Santiago De Chuco');
INSERT INTO `ubicacion_provincia` VALUES ('123', '13', 'Gran Chimu');
INSERT INTO `ubicacion_provincia` VALUES ('124', '13', 'Viru');
INSERT INTO `ubicacion_provincia` VALUES ('125', '14', 'Chiclayo');
INSERT INTO `ubicacion_provincia` VALUES ('126', '14', 'Ferreñafe');
INSERT INTO `ubicacion_provincia` VALUES ('127', '14', 'Lambayeque');
INSERT INTO `ubicacion_provincia` VALUES ('128', '15', 'Lima');
INSERT INTO `ubicacion_provincia` VALUES ('129', '15', 'Barranca');
INSERT INTO `ubicacion_provincia` VALUES ('130', '15', 'Cajatambo');
INSERT INTO `ubicacion_provincia` VALUES ('131', '15', 'Canta');
INSERT INTO `ubicacion_provincia` VALUES ('132', '15', 'Cañete');
INSERT INTO `ubicacion_provincia` VALUES ('133', '15', 'Huaral');
INSERT INTO `ubicacion_provincia` VALUES ('134', '15', 'Huarochiri');
INSERT INTO `ubicacion_provincia` VALUES ('135', '15', 'Huaura');
INSERT INTO `ubicacion_provincia` VALUES ('136', '15', 'Oyon');
INSERT INTO `ubicacion_provincia` VALUES ('137', '15', 'Yauyos');
INSERT INTO `ubicacion_provincia` VALUES ('138', '16', 'Maynas');
INSERT INTO `ubicacion_provincia` VALUES ('139', '16', 'Alto Amazonas');
INSERT INTO `ubicacion_provincia` VALUES ('140', '16', 'Loreto');
INSERT INTO `ubicacion_provincia` VALUES ('141', '16', 'Mariscal Ramon Castilla');
INSERT INTO `ubicacion_provincia` VALUES ('142', '16', 'Requena');
INSERT INTO `ubicacion_provincia` VALUES ('143', '16', 'Ucayali');
INSERT INTO `ubicacion_provincia` VALUES ('144', '17', 'Tambopata');
INSERT INTO `ubicacion_provincia` VALUES ('145', '17', 'Manu');
INSERT INTO `ubicacion_provincia` VALUES ('146', '17', 'Tahuamanu');
INSERT INTO `ubicacion_provincia` VALUES ('147', '18', 'Mariscal Nieto');
INSERT INTO `ubicacion_provincia` VALUES ('148', '18', 'General Sanchez Cerro');
INSERT INTO `ubicacion_provincia` VALUES ('149', '18', 'Ilo');
INSERT INTO `ubicacion_provincia` VALUES ('150', '19', 'Pasco');
INSERT INTO `ubicacion_provincia` VALUES ('151', '19', 'Daniel Alcides Carrion');
INSERT INTO `ubicacion_provincia` VALUES ('152', '19', 'Oxapampa');
INSERT INTO `ubicacion_provincia` VALUES ('153', '20', 'Piura');
INSERT INTO `ubicacion_provincia` VALUES ('154', '20', 'Ayabaca');
INSERT INTO `ubicacion_provincia` VALUES ('155', '20', 'Huancabamba');
INSERT INTO `ubicacion_provincia` VALUES ('156', '20', 'Morropon');
INSERT INTO `ubicacion_provincia` VALUES ('157', '20', 'Paita');
INSERT INTO `ubicacion_provincia` VALUES ('158', '20', 'Sullana');
INSERT INTO `ubicacion_provincia` VALUES ('159', '20', 'Talara');
INSERT INTO `ubicacion_provincia` VALUES ('160', '20', 'Sechura');
INSERT INTO `ubicacion_provincia` VALUES ('161', '21', 'Puno');
INSERT INTO `ubicacion_provincia` VALUES ('162', '21', 'Azangaro');
INSERT INTO `ubicacion_provincia` VALUES ('163', '21', 'Carabaya');
INSERT INTO `ubicacion_provincia` VALUES ('164', '21', 'Chucuito');
INSERT INTO `ubicacion_provincia` VALUES ('165', '21', 'El Collao');
INSERT INTO `ubicacion_provincia` VALUES ('166', '21', 'Huancane');
INSERT INTO `ubicacion_provincia` VALUES ('167', '21', 'Lampa');
INSERT INTO `ubicacion_provincia` VALUES ('168', '21', 'Melgar');
INSERT INTO `ubicacion_provincia` VALUES ('169', '21', 'Moho');
INSERT INTO `ubicacion_provincia` VALUES ('170', '21', 'San Antonio De Putina');
INSERT INTO `ubicacion_provincia` VALUES ('171', '21', 'San Roman');
INSERT INTO `ubicacion_provincia` VALUES ('172', '21', 'Sandia');
INSERT INTO `ubicacion_provincia` VALUES ('173', '21', 'Yunguyo');
INSERT INTO `ubicacion_provincia` VALUES ('174', '22', 'Moyobamba');
INSERT INTO `ubicacion_provincia` VALUES ('175', '22', 'Bellavista');
INSERT INTO `ubicacion_provincia` VALUES ('176', '22', 'El Dorado');
INSERT INTO `ubicacion_provincia` VALUES ('177', '22', 'Huallaga');
INSERT INTO `ubicacion_provincia` VALUES ('178', '22', 'Lamas');
INSERT INTO `ubicacion_provincia` VALUES ('179', '22', 'Mariscal Caceres');
INSERT INTO `ubicacion_provincia` VALUES ('180', '22', 'Picota');
INSERT INTO `ubicacion_provincia` VALUES ('181', '22', 'Rioja');
INSERT INTO `ubicacion_provincia` VALUES ('182', '22', 'San Martin');
INSERT INTO `ubicacion_provincia` VALUES ('183', '22', 'Tocache');
INSERT INTO `ubicacion_provincia` VALUES ('184', '23', 'Tacna');
INSERT INTO `ubicacion_provincia` VALUES ('185', '23', 'Candarave');
INSERT INTO `ubicacion_provincia` VALUES ('186', '23', 'Jorge Basadre');
INSERT INTO `ubicacion_provincia` VALUES ('187', '23', 'Tarata');
INSERT INTO `ubicacion_provincia` VALUES ('188', '24', 'Tumbes');
INSERT INTO `ubicacion_provincia` VALUES ('189', '24', 'Contralmirante Villar');
INSERT INTO `ubicacion_provincia` VALUES ('190', '24', 'Zarumilla');
INSERT INTO `ubicacion_provincia` VALUES ('191', '25', 'Coronel Portillo');
INSERT INTO `ubicacion_provincia` VALUES ('192', '25', 'Atalaya');
INSERT INTO `ubicacion_provincia` VALUES ('193', '25', 'Padre Abad');
INSERT INTO `ubicacion_provincia` VALUES ('194', '25', 'Purus');

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
) ENGINE=MyISAM AUTO_INCREMENT=498 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of usuarios_accesos
-- ----------------------------
INSERT INTO `usuarios_accesos` VALUES ('1', '1', '2015-09-29', '13:25:24');
INSERT INTO `usuarios_accesos` VALUES ('2', '1', '2015-10-15', '14:32:34');
INSERT INTO `usuarios_accesos` VALUES ('3', '1', '2015-11-09', '12:21:32');
INSERT INTO `usuarios_accesos` VALUES ('4', '1', '2015-11-09', '14:51:31');
INSERT INTO `usuarios_accesos` VALUES ('5', '1', '2015-11-09', '16:42:19');
INSERT INTO `usuarios_accesos` VALUES ('6', '1', '2015-11-09', '17:10:19');
INSERT INTO `usuarios_accesos` VALUES ('7', '1', '2015-11-24', '10:58:55');
INSERT INTO `usuarios_accesos` VALUES ('8', '1', '2015-11-24', '14:09:07');
INSERT INTO `usuarios_accesos` VALUES ('9', '1', '2015-11-24', '14:56:18');
INSERT INTO `usuarios_accesos` VALUES ('10', '1', '2015-11-24', '17:48:54');
INSERT INTO `usuarios_accesos` VALUES ('11', '1', '2015-11-25', '10:59:22');
INSERT INTO `usuarios_accesos` VALUES ('12', '1', '2015-11-25', '15:03:18');
INSERT INTO `usuarios_accesos` VALUES ('13', '1', '2015-11-26', '14:57:46');
INSERT INTO `usuarios_accesos` VALUES ('14', '1', '2015-11-30', '11:58:22');
INSERT INTO `usuarios_accesos` VALUES ('15', '1', '2015-12-02', '16:18:44');
INSERT INTO `usuarios_accesos` VALUES ('16', '1', '2015-12-03', '13:20:18');
INSERT INTO `usuarios_accesos` VALUES ('17', '1', '2015-12-09', '17:17:01');
INSERT INTO `usuarios_accesos` VALUES ('18', '1', '2015-12-14', '10:25:20');
INSERT INTO `usuarios_accesos` VALUES ('19', '1', '2015-12-14', '12:12:13');
INSERT INTO `usuarios_accesos` VALUES ('20', '1', '2015-12-14', '16:15:51');
INSERT INTO `usuarios_accesos` VALUES ('21', '2', '2015-12-14', '16:17:59');
INSERT INTO `usuarios_accesos` VALUES ('22', '2', '2015-12-14', '16:18:06');
INSERT INTO `usuarios_accesos` VALUES ('23', '1', '2015-12-14', '16:19:24');
INSERT INTO `usuarios_accesos` VALUES ('24', '1', '2015-12-14', '16:19:29');
INSERT INTO `usuarios_accesos` VALUES ('25', '2', '2015-12-14', '16:20:26');
INSERT INTO `usuarios_accesos` VALUES ('26', '2', '2015-12-14', '16:20:29');
INSERT INTO `usuarios_accesos` VALUES ('27', '1', '2015-12-15', '15:18:09');
INSERT INTO `usuarios_accesos` VALUES ('28', '1', '2015-12-15', '21:40:44');
INSERT INTO `usuarios_accesos` VALUES ('29', '1', '2015-12-15', '21:51:54');
INSERT INTO `usuarios_accesos` VALUES ('30', '1', '2015-12-16', '09:44:13');
INSERT INTO `usuarios_accesos` VALUES ('31', '1', '2015-12-16', '12:21:40');
INSERT INTO `usuarios_accesos` VALUES ('32', '2', '2015-12-16', '12:21:54');
INSERT INTO `usuarios_accesos` VALUES ('33', '2', '2015-12-16', '12:21:58');
INSERT INTO `usuarios_accesos` VALUES ('34', '2', '2015-12-16', '12:25:49');
INSERT INTO `usuarios_accesos` VALUES ('35', '2', '2015-12-16', '12:25:53');
INSERT INTO `usuarios_accesos` VALUES ('36', '2', '2015-12-16', '14:38:58');
INSERT INTO `usuarios_accesos` VALUES ('37', '2', '2015-12-16', '19:12:53');
INSERT INTO `usuarios_accesos` VALUES ('38', '2', '2015-12-16', '19:25:35');
INSERT INTO `usuarios_accesos` VALUES ('39', '2', '2015-12-16', '19:27:18');
INSERT INTO `usuarios_accesos` VALUES ('40', '2', '2015-12-16', '20:47:26');
INSERT INTO `usuarios_accesos` VALUES ('41', '2', '2015-12-17', '11:56:08');
INSERT INTO `usuarios_accesos` VALUES ('42', '2', '2015-12-17', '12:35:52');
INSERT INTO `usuarios_accesos` VALUES ('43', '1', '2015-12-17', '12:36:36');
INSERT INTO `usuarios_accesos` VALUES ('44', '1', '2015-12-17', '12:36:42');
INSERT INTO `usuarios_accesos` VALUES ('45', '2', '2015-12-17', '13:01:30');
INSERT INTO `usuarios_accesos` VALUES ('46', '2', '2015-12-17', '20:19:37');
INSERT INTO `usuarios_accesos` VALUES ('47', '2', '2015-12-17', '22:36:34');
INSERT INTO `usuarios_accesos` VALUES ('48', '2', '2015-12-18', '16:29:52');
INSERT INTO `usuarios_accesos` VALUES ('49', '2', '2015-12-19', '00:19:12');
INSERT INTO `usuarios_accesos` VALUES ('50', '2', '2015-12-19', '12:03:39');
INSERT INTO `usuarios_accesos` VALUES ('51', '2', '2015-12-19', '12:33:59');
INSERT INTO `usuarios_accesos` VALUES ('52', '2', '2015-12-19', '12:47:03');
INSERT INTO `usuarios_accesos` VALUES ('53', '2', '2015-12-19', '12:47:54');
INSERT INTO `usuarios_accesos` VALUES ('54', '2', '2015-12-19', '17:26:30');
INSERT INTO `usuarios_accesos` VALUES ('55', '2', '2015-12-19', '17:46:15');
INSERT INTO `usuarios_accesos` VALUES ('56', '1', '2015-12-21', '09:49:33');
INSERT INTO `usuarios_accesos` VALUES ('57', '2', '2015-12-21', '18:04:03');
INSERT INTO `usuarios_accesos` VALUES ('58', '2', '2015-12-21', '20:00:33');
INSERT INTO `usuarios_accesos` VALUES ('59', '1', '2015-12-22', '17:31:16');
INSERT INTO `usuarios_accesos` VALUES ('60', '1', '2015-12-23', '15:42:08');
INSERT INTO `usuarios_accesos` VALUES ('61', '2', '2015-12-24', '00:15:46');
INSERT INTO `usuarios_accesos` VALUES ('62', '2', '2015-12-24', '10:58:13');
INSERT INTO `usuarios_accesos` VALUES ('63', '2', '2015-12-24', '12:26:18');
INSERT INTO `usuarios_accesos` VALUES ('64', '1', '2015-12-24', '13:12:57');
INSERT INTO `usuarios_accesos` VALUES ('65', '2', '2015-12-25', '14:10:45');
INSERT INTO `usuarios_accesos` VALUES ('66', '2', '2015-12-28', '13:22:24');
INSERT INTO `usuarios_accesos` VALUES ('67', '2', '2015-12-29', '11:54:35');
INSERT INTO `usuarios_accesos` VALUES ('68', '2', '2015-12-29', '15:26:44');
INSERT INTO `usuarios_accesos` VALUES ('69', '2', '2015-12-29', '19:34:45');
INSERT INTO `usuarios_accesos` VALUES ('70', '2', '2015-12-29', '19:42:57');
INSERT INTO `usuarios_accesos` VALUES ('71', '2', '2015-12-29', '22:12:36');
INSERT INTO `usuarios_accesos` VALUES ('72', '2', '2015-12-30', '12:01:11');
INSERT INTO `usuarios_accesos` VALUES ('73', '2', '2015-12-30', '13:46:16');
INSERT INTO `usuarios_accesos` VALUES ('74', '2', '2015-12-30', '15:07:07');
INSERT INTO `usuarios_accesos` VALUES ('75', '2', '2015-12-30', '15:33:35');
INSERT INTO `usuarios_accesos` VALUES ('76', '2', '2016-01-02', '13:14:00');
INSERT INTO `usuarios_accesos` VALUES ('77', '3', '2016-01-04', '18:01:00');
INSERT INTO `usuarios_accesos` VALUES ('78', '4', '2016-01-04', '18:01:14');
INSERT INTO `usuarios_accesos` VALUES ('79', '5', '2016-01-05', '12:43:38');
INSERT INTO `usuarios_accesos` VALUES ('80', '2', '2016-01-05', '22:26:47');
INSERT INTO `usuarios_accesos` VALUES ('81', '5', '2016-01-05', '22:28:48');
INSERT INTO `usuarios_accesos` VALUES ('82', '5', '2016-01-05', '22:29:18');
INSERT INTO `usuarios_accesos` VALUES ('83', '1', '2016-01-06', '10:05:07');
INSERT INTO `usuarios_accesos` VALUES ('84', '9', '2016-01-06', '10:05:36');
INSERT INTO `usuarios_accesos` VALUES ('85', '3', '2016-01-06', '10:18:54');
INSERT INTO `usuarios_accesos` VALUES ('86', '3', '2016-01-06', '10:18:57');
INSERT INTO `usuarios_accesos` VALUES ('87', '4', '2016-01-06', '10:25:09');
INSERT INTO `usuarios_accesos` VALUES ('88', '4', '2016-01-06', '10:25:20');
INSERT INTO `usuarios_accesos` VALUES ('89', '9', '2016-01-06', '10:43:45');
INSERT INTO `usuarios_accesos` VALUES ('90', '9', '2016-01-06', '10:43:49');
INSERT INTO `usuarios_accesos` VALUES ('91', '5', '2016-01-06', '11:58:14');
INSERT INTO `usuarios_accesos` VALUES ('92', '2', '2016-01-06', '11:59:35');
INSERT INTO `usuarios_accesos` VALUES ('93', '3', '2016-01-06', '12:49:03');
INSERT INTO `usuarios_accesos` VALUES ('94', '4', '2016-01-06', '12:58:02');
INSERT INTO `usuarios_accesos` VALUES ('95', '4', '2016-01-06', '12:58:19');
INSERT INTO `usuarios_accesos` VALUES ('96', '9', '2016-01-06', '13:22:23');
INSERT INTO `usuarios_accesos` VALUES ('97', '3', '2016-01-06', '13:26:10');
INSERT INTO `usuarios_accesos` VALUES ('98', '3', '2016-01-06', '13:26:14');
INSERT INTO `usuarios_accesos` VALUES ('99', '9', '2016-01-06', '13:34:17');
INSERT INTO `usuarios_accesos` VALUES ('100', '9', '2016-01-06', '13:34:20');
INSERT INTO `usuarios_accesos` VALUES ('101', '3', '2016-01-06', '13:57:37');
INSERT INTO `usuarios_accesos` VALUES ('102', '3', '2016-01-06', '13:57:49');
INSERT INTO `usuarios_accesos` VALUES ('103', '3', '2016-01-06', '14:03:27');
INSERT INTO `usuarios_accesos` VALUES ('104', '3', '2016-01-06', '14:03:29');
INSERT INTO `usuarios_accesos` VALUES ('105', '4', '2016-01-06', '14:11:56');
INSERT INTO `usuarios_accesos` VALUES ('106', '4', '2016-01-06', '14:11:57');
INSERT INTO `usuarios_accesos` VALUES ('107', '1', '2016-01-06', '17:51:55');
INSERT INTO `usuarios_accesos` VALUES ('108', '3', '2016-01-06', '18:57:20');
INSERT INTO `usuarios_accesos` VALUES ('109', '11', '2016-01-06', '18:59:51');
INSERT INTO `usuarios_accesos` VALUES ('110', '11', '2016-01-06', '19:00:02');
INSERT INTO `usuarios_accesos` VALUES ('111', '11', '2016-01-06', '19:31:00');
INSERT INTO `usuarios_accesos` VALUES ('112', '7', '2016-01-06', '19:32:06');
INSERT INTO `usuarios_accesos` VALUES ('113', '7', '2016-01-06', '19:32:17');
INSERT INTO `usuarios_accesos` VALUES ('114', '12', '2016-01-06', '19:49:01');
INSERT INTO `usuarios_accesos` VALUES ('115', '12', '2016-01-06', '19:49:26');
INSERT INTO `usuarios_accesos` VALUES ('116', '12', '2016-01-06', '19:49:40');
INSERT INTO `usuarios_accesos` VALUES ('117', '7', '2016-01-06', '19:52:25');
INSERT INTO `usuarios_accesos` VALUES ('118', '7', '2016-01-06', '19:52:36');
INSERT INTO `usuarios_accesos` VALUES ('119', '13', '2016-01-06', '20:10:48');
INSERT INTO `usuarios_accesos` VALUES ('120', '13', '2016-01-06', '20:10:58');
INSERT INTO `usuarios_accesos` VALUES ('121', '3', '2016-01-06', '20:14:37');
INSERT INTO `usuarios_accesos` VALUES ('122', '3', '2016-01-06', '20:14:50');
INSERT INTO `usuarios_accesos` VALUES ('123', '3', '2016-01-06', '20:14:59');
INSERT INTO `usuarios_accesos` VALUES ('124', '13', '2016-01-06', '20:18:07');
INSERT INTO `usuarios_accesos` VALUES ('125', '13', '2016-01-06', '20:18:35');
INSERT INTO `usuarios_accesos` VALUES ('126', '7', '2016-01-06', '20:21:31');
INSERT INTO `usuarios_accesos` VALUES ('127', '7', '2016-01-06', '20:21:45');
INSERT INTO `usuarios_accesos` VALUES ('128', '7', '2016-01-06', '20:21:55');
INSERT INTO `usuarios_accesos` VALUES ('129', '7', '2016-01-06', '20:51:31');
INSERT INTO `usuarios_accesos` VALUES ('130', '7', '2016-01-06', '20:51:41');
INSERT INTO `usuarios_accesos` VALUES ('131', '2', '2016-01-06', '21:47:34');
INSERT INTO `usuarios_accesos` VALUES ('132', '5', '2016-01-06', '21:48:21');
INSERT INTO `usuarios_accesos` VALUES ('133', '5', '2016-01-06', '22:09:18');
INSERT INTO `usuarios_accesos` VALUES ('134', '3', '2016-01-07', '11:36:41');
INSERT INTO `usuarios_accesos` VALUES ('135', '4', '2016-01-07', '12:46:39');
INSERT INTO `usuarios_accesos` VALUES ('136', '14', '2016-01-07', '13:37:15');
INSERT INTO `usuarios_accesos` VALUES ('137', '14', '2016-01-07', '13:37:30');
INSERT INTO `usuarios_accesos` VALUES ('138', '13', '2016-01-07', '13:43:01');
INSERT INTO `usuarios_accesos` VALUES ('139', '13', '2016-01-07', '13:43:13');
INSERT INTO `usuarios_accesos` VALUES ('140', '4', '2016-01-07', '14:29:01');
INSERT INTO `usuarios_accesos` VALUES ('141', '7', '2016-01-07', '15:25:45');
INSERT INTO `usuarios_accesos` VALUES ('142', '7', '2016-01-07', '15:25:56');
INSERT INTO `usuarios_accesos` VALUES ('143', '4', '2016-01-07', '20:05:37');
INSERT INTO `usuarios_accesos` VALUES ('144', '4', '2016-01-07', '20:05:52');
INSERT INTO `usuarios_accesos` VALUES ('145', '19', '2016-01-08', '13:27:40');
INSERT INTO `usuarios_accesos` VALUES ('146', '19', '2016-01-08', '14:11:51');
INSERT INTO `usuarios_accesos` VALUES ('147', '4', '2016-01-08', '14:30:23');
INSERT INTO `usuarios_accesos` VALUES ('148', '4', '2016-01-08', '14:30:36');
INSERT INTO `usuarios_accesos` VALUES ('149', '20', '2016-01-08', '14:49:51');
INSERT INTO `usuarios_accesos` VALUES ('150', '20', '2016-01-08', '14:50:06');
INSERT INTO `usuarios_accesos` VALUES ('151', '19', '2016-01-08', '14:56:46');
INSERT INTO `usuarios_accesos` VALUES ('152', '19', '2016-01-08', '16:15:52');
INSERT INTO `usuarios_accesos` VALUES ('153', '20', '2016-01-08', '16:35:27');
INSERT INTO `usuarios_accesos` VALUES ('154', '20', '2016-01-08', '17:44:12');
INSERT INTO `usuarios_accesos` VALUES ('155', '3', '2016-01-08', '18:05:23');
INSERT INTO `usuarios_accesos` VALUES ('156', '3', '2016-01-08', '18:05:33');
INSERT INTO `usuarios_accesos` VALUES ('157', '7', '2016-01-08', '19:13:50');
INSERT INTO `usuarios_accesos` VALUES ('158', '7', '2016-01-08', '19:14:03');
INSERT INTO `usuarios_accesos` VALUES ('159', '19', '2016-01-08', '22:12:40');
INSERT INTO `usuarios_accesos` VALUES ('160', '19', '2016-01-08', '22:12:50');
INSERT INTO `usuarios_accesos` VALUES ('161', '19', '2016-01-09', '14:34:38');
INSERT INTO `usuarios_accesos` VALUES ('162', '3', '2016-01-11', '11:46:49');
INSERT INTO `usuarios_accesos` VALUES ('163', '20', '2016-01-11', '12:15:28');
INSERT INTO `usuarios_accesos` VALUES ('164', '19', '2016-01-11', '12:43:51');
INSERT INTO `usuarios_accesos` VALUES ('165', '3', '2016-01-11', '12:56:07');
INSERT INTO `usuarios_accesos` VALUES ('166', '3', '2016-01-11', '12:56:27');
INSERT INTO `usuarios_accesos` VALUES ('167', '3', '2016-01-11', '12:56:27');
INSERT INTO `usuarios_accesos` VALUES ('168', '7', '2016-01-11', '13:20:52');
INSERT INTO `usuarios_accesos` VALUES ('169', '7', '2016-01-11', '13:21:03');
INSERT INTO `usuarios_accesos` VALUES ('170', '5', '2016-01-11', '13:30:17');
INSERT INTO `usuarios_accesos` VALUES ('171', '19', '2016-01-11', '14:30:08');
INSERT INTO `usuarios_accesos` VALUES ('172', '20', '2016-01-11', '14:36:46');
INSERT INTO `usuarios_accesos` VALUES ('173', '7', '2016-01-11', '15:08:11');
INSERT INTO `usuarios_accesos` VALUES ('174', '19', '2016-01-11', '16:04:13');
INSERT INTO `usuarios_accesos` VALUES ('175', '20', '2016-01-11', '17:08:08');
INSERT INTO `usuarios_accesos` VALUES ('176', '20', '2016-01-11', '17:08:28');
INSERT INTO `usuarios_accesos` VALUES ('177', '7', '2016-01-11', '17:39:30');
INSERT INTO `usuarios_accesos` VALUES ('178', '19', '2016-01-11', '18:19:11');
INSERT INTO `usuarios_accesos` VALUES ('179', '3', '2016-01-11', '20:02:38');
INSERT INTO `usuarios_accesos` VALUES ('180', '19', '2016-01-11', '20:29:05');
INSERT INTO `usuarios_accesos` VALUES ('181', '7', '2016-01-11', '21:23:08');
INSERT INTO `usuarios_accesos` VALUES ('182', '7', '2016-01-11', '21:23:22');
INSERT INTO `usuarios_accesos` VALUES ('183', '20', '2016-01-12', '11:11:50');
INSERT INTO `usuarios_accesos` VALUES ('184', '20', '2016-01-12', '11:12:03');
INSERT INTO `usuarios_accesos` VALUES ('185', '19', '2016-01-12', '11:15:00');
INSERT INTO `usuarios_accesos` VALUES ('186', '3', '2016-01-12', '11:53:31');
INSERT INTO `usuarios_accesos` VALUES ('187', '3', '2016-01-12', '11:53:48');
INSERT INTO `usuarios_accesos` VALUES ('188', '20', '2016-01-12', '12:17:54');
INSERT INTO `usuarios_accesos` VALUES ('189', '20', '2016-01-12', '13:12:59');
INSERT INTO `usuarios_accesos` VALUES ('190', '14', '2016-01-12', '15:13:56');
INSERT INTO `usuarios_accesos` VALUES ('191', '20', '2016-01-12', '15:47:14');
INSERT INTO `usuarios_accesos` VALUES ('192', '2', '2016-01-12', '15:59:54');
INSERT INTO `usuarios_accesos` VALUES ('193', '6', '2016-01-12', '16:06:58');
INSERT INTO `usuarios_accesos` VALUES ('194', '6', '2016-01-12', '16:07:10');
INSERT INTO `usuarios_accesos` VALUES ('195', '5', '2016-01-12', '16:10:17');
INSERT INTO `usuarios_accesos` VALUES ('196', '5', '2016-01-12', '16:10:32');
INSERT INTO `usuarios_accesos` VALUES ('197', '5', '2016-01-12', '16:12:27');
INSERT INTO `usuarios_accesos` VALUES ('198', '19', '2016-01-12', '16:30:43');
INSERT INTO `usuarios_accesos` VALUES ('199', '2', '2016-01-12', '18:25:59');
INSERT INTO `usuarios_accesos` VALUES ('200', '5', '2016-01-12', '18:26:25');
INSERT INTO `usuarios_accesos` VALUES ('201', '3', '2016-01-12', '18:37:04');
INSERT INTO `usuarios_accesos` VALUES ('202', '19', '2016-01-12', '22:16:08');
INSERT INTO `usuarios_accesos` VALUES ('203', '20', '2016-01-13', '11:23:54');
INSERT INTO `usuarios_accesos` VALUES ('204', '3', '2016-01-13', '15:45:19');
INSERT INTO `usuarios_accesos` VALUES ('205', '20', '2016-01-13', '16:03:43');
INSERT INTO `usuarios_accesos` VALUES ('206', '14', '2016-01-13', '19:35:02');
INSERT INTO `usuarios_accesos` VALUES ('207', '3', '2016-01-13', '22:17:08');
INSERT INTO `usuarios_accesos` VALUES ('208', '3', '2016-01-14', '00:56:01');
INSERT INTO `usuarios_accesos` VALUES ('209', '3', '2016-01-14', '01:43:51');
INSERT INTO `usuarios_accesos` VALUES ('210', '3', '2016-01-14', '08:34:15');
INSERT INTO `usuarios_accesos` VALUES ('211', '20', '2016-01-14', '11:15:05');
INSERT INTO `usuarios_accesos` VALUES ('212', '3', '2016-01-14', '12:39:19');
INSERT INTO `usuarios_accesos` VALUES ('213', '20', '2016-01-14', '12:41:52');
INSERT INTO `usuarios_accesos` VALUES ('214', '19', '2016-01-14', '13:04:36');
INSERT INTO `usuarios_accesos` VALUES ('215', '3', '2016-01-14', '13:10:18');
INSERT INTO `usuarios_accesos` VALUES ('216', '20', '2016-01-14', '13:14:21');
INSERT INTO `usuarios_accesos` VALUES ('217', '19', '2016-01-14', '14:00:02');
INSERT INTO `usuarios_accesos` VALUES ('218', '20', '2016-01-14', '14:10:41');
INSERT INTO `usuarios_accesos` VALUES ('219', '3', '2016-01-14', '15:41:50');
INSERT INTO `usuarios_accesos` VALUES ('220', '3', '2016-01-14', '16:31:16');
INSERT INTO `usuarios_accesos` VALUES ('221', '5', '2016-01-14', '16:59:50');
INSERT INTO `usuarios_accesos` VALUES ('222', '2', '2016-01-14', '17:01:20');
INSERT INTO `usuarios_accesos` VALUES ('223', '5', '2016-01-14', '17:02:15');
INSERT INTO `usuarios_accesos` VALUES ('224', '3', '2016-01-14', '17:43:24');
INSERT INTO `usuarios_accesos` VALUES ('225', '3', '2016-01-14', '18:34:44');
INSERT INTO `usuarios_accesos` VALUES ('226', '3', '2016-01-14', '19:21:47');
INSERT INTO `usuarios_accesos` VALUES ('227', '3', '2016-01-14', '20:30:49');
INSERT INTO `usuarios_accesos` VALUES ('228', '3', '2016-01-14', '22:48:03');
INSERT INTO `usuarios_accesos` VALUES ('229', '20', '2016-01-15', '10:55:33');
INSERT INTO `usuarios_accesos` VALUES ('230', '19', '2016-01-15', '11:25:57');
INSERT INTO `usuarios_accesos` VALUES ('231', '20', '2016-01-15', '11:47:48');
INSERT INTO `usuarios_accesos` VALUES ('232', '19', '2016-01-15', '13:00:16');
INSERT INTO `usuarios_accesos` VALUES ('233', '20', '2016-01-15', '14:56:23');
INSERT INTO `usuarios_accesos` VALUES ('234', '3', '2016-01-15', '16:10:53');
INSERT INTO `usuarios_accesos` VALUES ('235', '20', '2016-01-15', '16:35:26');
INSERT INTO `usuarios_accesos` VALUES ('236', '3', '2016-01-15', '19:28:27');
INSERT INTO `usuarios_accesos` VALUES ('237', '3', '2016-01-15', '22:14:57');
INSERT INTO `usuarios_accesos` VALUES ('238', '3', '2016-01-16', '11:53:42');
INSERT INTO `usuarios_accesos` VALUES ('239', '3', '2016-01-16', '14:02:07');
INSERT INTO `usuarios_accesos` VALUES ('240', '3', '2016-01-16', '20:30:27');
INSERT INTO `usuarios_accesos` VALUES ('241', '20', '2016-01-18', '11:36:34');
INSERT INTO `usuarios_accesos` VALUES ('242', '20', '2016-01-18', '12:38:46');
INSERT INTO `usuarios_accesos` VALUES ('243', '19', '2016-01-18', '12:55:11');
INSERT INTO `usuarios_accesos` VALUES ('244', '3', '2016-01-18', '13:12:50');
INSERT INTO `usuarios_accesos` VALUES ('245', '5', '2016-01-18', '14:41:23');
INSERT INTO `usuarios_accesos` VALUES ('246', '20', '2016-01-18', '17:22:12');
INSERT INTO `usuarios_accesos` VALUES ('247', '3', '2016-01-18', '17:24:41');
INSERT INTO `usuarios_accesos` VALUES ('248', '20', '2016-01-18', '17:26:00');
INSERT INTO `usuarios_accesos` VALUES ('249', '20', '2016-01-18', '17:26:08');
INSERT INTO `usuarios_accesos` VALUES ('250', '3', '2016-01-18', '20:07:18');
INSERT INTO `usuarios_accesos` VALUES ('251', '20', '2016-01-19', '11:34:41');
INSERT INTO `usuarios_accesos` VALUES ('252', '3', '2016-01-19', '12:53:58');
INSERT INTO `usuarios_accesos` VALUES ('253', '5', '2016-01-19', '13:43:21');
INSERT INTO `usuarios_accesos` VALUES ('254', '19', '2016-01-19', '14:39:41');
INSERT INTO `usuarios_accesos` VALUES ('255', '3', '2016-01-19', '17:53:42');
INSERT INTO `usuarios_accesos` VALUES ('256', '3', '2016-01-19', '20:14:50');
INSERT INTO `usuarios_accesos` VALUES ('257', '20', '2016-01-20', '11:08:19');
INSERT INTO `usuarios_accesos` VALUES ('258', '20', '2016-01-20', '13:32:10');
INSERT INTO `usuarios_accesos` VALUES ('259', '20', '2016-01-20', '15:03:09');
INSERT INTO `usuarios_accesos` VALUES ('260', '3', '2016-01-20', '15:38:17');
INSERT INTO `usuarios_accesos` VALUES ('261', '20', '2016-01-20', '16:12:30');
INSERT INTO `usuarios_accesos` VALUES ('262', '19', '2016-01-20', '16:43:42');
INSERT INTO `usuarios_accesos` VALUES ('263', '20', '2016-01-20', '17:10:31');
INSERT INTO `usuarios_accesos` VALUES ('264', '3', '2016-01-20', '18:44:21');
INSERT INTO `usuarios_accesos` VALUES ('265', '3', '2016-01-20', '20:19:27');
INSERT INTO `usuarios_accesos` VALUES ('266', '20', '2016-01-21', '11:07:51');
INSERT INTO `usuarios_accesos` VALUES ('267', '20', '2016-01-21', '11:49:09');
INSERT INTO `usuarios_accesos` VALUES ('268', '20', '2016-01-21', '13:23:32');
INSERT INTO `usuarios_accesos` VALUES ('269', '19', '2016-01-21', '14:38:19');
INSERT INTO `usuarios_accesos` VALUES ('270', '3', '2016-01-21', '15:04:23');
INSERT INTO `usuarios_accesos` VALUES ('271', '20', '2016-01-21', '16:32:35');
INSERT INTO `usuarios_accesos` VALUES ('272', '3', '2016-01-21', '17:15:51');
INSERT INTO `usuarios_accesos` VALUES ('273', '3', '2016-01-21', '19:10:41');
INSERT INTO `usuarios_accesos` VALUES ('274', '3', '2016-01-21', '20:13:28');
INSERT INTO `usuarios_accesos` VALUES ('275', '20', '2016-01-22', '11:09:26');
INSERT INTO `usuarios_accesos` VALUES ('276', '20', '2016-01-22', '12:20:53');
INSERT INTO `usuarios_accesos` VALUES ('277', '19', '2016-01-22', '13:30:34');
INSERT INTO `usuarios_accesos` VALUES ('278', '20', '2016-01-22', '14:01:54');
INSERT INTO `usuarios_accesos` VALUES ('279', '19', '2016-01-22', '14:46:29');
INSERT INTO `usuarios_accesos` VALUES ('280', '3', '2016-01-22', '15:31:33');
INSERT INTO `usuarios_accesos` VALUES ('281', '3', '2016-01-22', '19:54:36');
INSERT INTO `usuarios_accesos` VALUES ('282', '3', '2016-01-23', '09:03:08');
INSERT INTO `usuarios_accesos` VALUES ('283', '20', '2016-01-25', '11:14:36');
INSERT INTO `usuarios_accesos` VALUES ('284', '19', '2016-01-25', '13:35:45');
INSERT INTO `usuarios_accesos` VALUES ('285', '19', '2016-01-25', '14:41:09');
INSERT INTO `usuarios_accesos` VALUES ('286', '19', '2016-01-25', '16:33:29');
INSERT INTO `usuarios_accesos` VALUES ('287', '20', '2016-01-25', '16:54:22');
INSERT INTO `usuarios_accesos` VALUES ('288', '3', '2016-01-25', '20:20:46');
INSERT INTO `usuarios_accesos` VALUES ('289', '3', '2016-01-26', '11:34:29');
INSERT INTO `usuarios_accesos` VALUES ('290', '19', '2016-01-26', '15:13:36');
INSERT INTO `usuarios_accesos` VALUES ('291', '20', '2016-01-26', '15:21:32');
INSERT INTO `usuarios_accesos` VALUES ('292', '20', '2016-01-27', '11:29:04');
INSERT INTO `usuarios_accesos` VALUES ('293', '20', '2016-01-27', '13:04:21');
INSERT INTO `usuarios_accesos` VALUES ('294', '20', '2016-01-27', '17:37:47');
INSERT INTO `usuarios_accesos` VALUES ('295', '19', '2016-01-27', '18:35:27');
INSERT INTO `usuarios_accesos` VALUES ('296', '20', '2016-01-28', '12:34:57');
INSERT INTO `usuarios_accesos` VALUES ('297', '20', '2016-01-28', '12:47:15');
INSERT INTO `usuarios_accesos` VALUES ('298', '3', '2016-01-28', '12:56:34');
INSERT INTO `usuarios_accesos` VALUES ('299', '20', '2016-01-28', '13:14:39');
INSERT INTO `usuarios_accesos` VALUES ('300', '20', '2016-01-28', '13:14:46');
INSERT INTO `usuarios_accesos` VALUES ('301', '19', '2016-01-28', '13:15:57');
INSERT INTO `usuarios_accesos` VALUES ('302', '19', '2016-01-28', '13:16:01');
INSERT INTO `usuarios_accesos` VALUES ('303', '20', '2016-01-28', '13:16:26');
INSERT INTO `usuarios_accesos` VALUES ('304', '20', '2016-01-28', '13:16:33');
INSERT INTO `usuarios_accesos` VALUES ('305', '5', '2016-01-28', '13:38:49');
INSERT INTO `usuarios_accesos` VALUES ('306', '3', '2016-01-28', '14:25:16');
INSERT INTO `usuarios_accesos` VALUES ('307', '20', '2016-01-28', '15:51:33');
INSERT INTO `usuarios_accesos` VALUES ('308', '20', '2016-01-28', '17:52:19');
INSERT INTO `usuarios_accesos` VALUES ('309', '20', '2016-01-29', '11:12:28');
INSERT INTO `usuarios_accesos` VALUES ('310', '20', '2016-01-29', '11:54:31');
INSERT INTO `usuarios_accesos` VALUES ('311', '20', '2016-01-29', '13:39:23');
INSERT INTO `usuarios_accesos` VALUES ('312', '5', '2016-01-29', '16:18:00');
INSERT INTO `usuarios_accesos` VALUES ('313', '18', '2016-01-29', '16:19:39');
INSERT INTO `usuarios_accesos` VALUES ('314', '5', '2016-01-29', '16:19:45');
INSERT INTO `usuarios_accesos` VALUES ('315', '18', '2016-01-29', '16:20:40');
INSERT INTO `usuarios_accesos` VALUES ('316', '18', '2016-01-29', '16:20:55');
INSERT INTO `usuarios_accesos` VALUES ('317', '18', '2016-01-29', '16:21:43');
INSERT INTO `usuarios_accesos` VALUES ('318', '18', '2016-01-29', '16:27:16');
INSERT INTO `usuarios_accesos` VALUES ('319', '3', '2016-01-29', '20:10:33');
INSERT INTO `usuarios_accesos` VALUES ('320', '19', '2016-01-30', '00:50:45');
INSERT INTO `usuarios_accesos` VALUES ('321', '20', '2016-01-30', '00:51:29');
INSERT INTO `usuarios_accesos` VALUES ('322', '20', '2016-01-30', '00:51:39');
INSERT INTO `usuarios_accesos` VALUES ('323', '19', '2016-01-30', '00:55:00');
INSERT INTO `usuarios_accesos` VALUES ('324', '19', '2016-01-30', '00:55:08');
INSERT INTO `usuarios_accesos` VALUES ('325', '19', '2016-02-01', '12:02:16');
INSERT INTO `usuarios_accesos` VALUES ('326', '20', '2016-02-01', '12:02:56');
INSERT INTO `usuarios_accesos` VALUES ('327', '20', '2016-02-01', '12:03:34');
INSERT INTO `usuarios_accesos` VALUES ('328', '20', '2016-02-01', '12:10:29');
INSERT INTO `usuarios_accesos` VALUES ('329', '20', '2016-02-01', '12:14:22');
INSERT INTO `usuarios_accesos` VALUES ('330', '5', '2016-02-01', '13:12:19');
INSERT INTO `usuarios_accesos` VALUES ('331', '18', '2016-02-01', '13:31:28');
INSERT INTO `usuarios_accesos` VALUES ('332', '20', '2016-02-01', '13:32:59');
INSERT INTO `usuarios_accesos` VALUES ('333', '9', '2016-02-01', '13:47:54');
INSERT INTO `usuarios_accesos` VALUES ('334', '20', '2016-02-01', '14:41:38');
INSERT INTO `usuarios_accesos` VALUES ('335', '20', '2016-02-01', '16:56:04');
INSERT INTO `usuarios_accesos` VALUES ('336', '20', '2016-02-02', '12:01:49');
INSERT INTO `usuarios_accesos` VALUES ('337', '20', '2016-02-02', '14:39:07');
INSERT INTO `usuarios_accesos` VALUES ('338', '20', '2016-02-02', '15:36:15');
INSERT INTO `usuarios_accesos` VALUES ('339', '3', '2016-02-02', '15:59:18');
INSERT INTO `usuarios_accesos` VALUES ('340', '19', '2016-02-02', '16:38:47');
INSERT INTO `usuarios_accesos` VALUES ('341', '20', '2016-02-02', '16:51:13');
INSERT INTO `usuarios_accesos` VALUES ('342', '18', '2016-02-02', '22:48:58');
INSERT INTO `usuarios_accesos` VALUES ('343', '20', '2016-02-03', '11:51:16');
INSERT INTO `usuarios_accesos` VALUES ('344', '20', '2016-02-03', '13:00:16');
INSERT INTO `usuarios_accesos` VALUES ('345', '20', '2016-02-03', '15:07:02');
INSERT INTO `usuarios_accesos` VALUES ('346', '19', '2016-02-03', '15:15:38');
INSERT INTO `usuarios_accesos` VALUES ('347', '3', '2016-02-03', '15:33:57');
INSERT INTO `usuarios_accesos` VALUES ('348', '5', '2016-02-03', '15:34:01');
INSERT INTO `usuarios_accesos` VALUES ('349', '19', '2016-02-03', '16:21:43');
INSERT INTO `usuarios_accesos` VALUES ('350', '3', '2016-02-03', '16:28:10');
INSERT INTO `usuarios_accesos` VALUES ('351', '3', '2016-02-03', '16:30:20');
INSERT INTO `usuarios_accesos` VALUES ('352', '22', '2016-02-03', '16:36:51');
INSERT INTO `usuarios_accesos` VALUES ('353', '22', '2016-02-03', '16:44:13');
INSERT INTO `usuarios_accesos` VALUES ('354', '22', '2016-02-03', '16:44:52');
INSERT INTO `usuarios_accesos` VALUES ('355', '20', '2016-02-03', '16:47:59');
INSERT INTO `usuarios_accesos` VALUES ('356', '18', '2016-02-03', '17:02:12');
INSERT INTO `usuarios_accesos` VALUES ('357', '22', '2016-02-03', '17:25:37');
INSERT INTO `usuarios_accesos` VALUES ('358', '22', '2016-02-03', '17:33:41');
INSERT INTO `usuarios_accesos` VALUES ('359', '22', '2016-02-03', '18:16:37');
INSERT INTO `usuarios_accesos` VALUES ('360', '22', '2016-02-03', '19:00:09');
INSERT INTO `usuarios_accesos` VALUES ('361', '22', '2016-02-03', '19:00:54');
INSERT INTO `usuarios_accesos` VALUES ('362', '18', '2016-02-03', '19:48:01');
INSERT INTO `usuarios_accesos` VALUES ('363', '20', '2016-02-04', '11:36:23');
INSERT INTO `usuarios_accesos` VALUES ('364', '20', '2016-02-04', '13:14:17');
INSERT INTO `usuarios_accesos` VALUES ('365', '5', '2016-02-04', '15:31:35');
INSERT INTO `usuarios_accesos` VALUES ('366', '19', '2016-02-04', '15:34:59');
INSERT INTO `usuarios_accesos` VALUES ('367', '20', '2016-02-04', '16:39:05');
INSERT INTO `usuarios_accesos` VALUES ('368', '3', '2016-02-04', '18:12:14');
INSERT INTO `usuarios_accesos` VALUES ('369', '5', '2016-02-05', '03:00:09');
INSERT INTO `usuarios_accesos` VALUES ('370', '20', '2016-02-05', '12:00:28');
INSERT INTO `usuarios_accesos` VALUES ('371', '19', '2016-02-05', '12:40:18');
INSERT INTO `usuarios_accesos` VALUES ('372', '20', '2016-02-05', '14:21:18');
INSERT INTO `usuarios_accesos` VALUES ('373', '5', '2016-02-05', '14:52:25');
INSERT INTO `usuarios_accesos` VALUES ('374', '5', '2016-02-05', '15:49:22');
INSERT INTO `usuarios_accesos` VALUES ('375', '20', '2016-02-05', '16:52:50');
INSERT INTO `usuarios_accesos` VALUES ('376', '3', '2016-02-05', '17:30:59');
INSERT INTO `usuarios_accesos` VALUES ('377', '5', '2016-02-06', '11:41:52');
INSERT INTO `usuarios_accesos` VALUES ('378', '19', '2016-02-06', '13:45:59');
INSERT INTO `usuarios_accesos` VALUES ('379', '20', '2016-02-06', '13:51:24');
INSERT INTO `usuarios_accesos` VALUES ('380', '20', '2016-02-06', '13:51:37');
INSERT INTO `usuarios_accesos` VALUES ('381', '19', '2016-02-06', '13:54:24');
INSERT INTO `usuarios_accesos` VALUES ('382', '19', '2016-02-06', '13:58:19');
INSERT INTO `usuarios_accesos` VALUES ('383', '20', '2016-02-06', '14:07:35');
INSERT INTO `usuarios_accesos` VALUES ('384', '20', '2016-02-06', '14:07:46');
INSERT INTO `usuarios_accesos` VALUES ('385', '3', '2016-02-06', '22:39:02');
INSERT INTO `usuarios_accesos` VALUES ('386', '18', '2016-02-08', '03:03:42');
INSERT INTO `usuarios_accesos` VALUES ('387', '18', '2016-02-08', '11:29:51');
INSERT INTO `usuarios_accesos` VALUES ('388', '20', '2016-02-08', '12:21:13');
INSERT INTO `usuarios_accesos` VALUES ('389', '3', '2016-02-08', '12:55:06');
INSERT INTO `usuarios_accesos` VALUES ('390', '3', '2016-02-08', '13:38:17');
INSERT INTO `usuarios_accesos` VALUES ('391', '3', '2016-02-08', '13:38:23');
INSERT INTO `usuarios_accesos` VALUES ('392', '20', '2016-02-08', '13:43:20');
INSERT INTO `usuarios_accesos` VALUES ('393', '18', '2016-02-08', '14:08:59');
INSERT INTO `usuarios_accesos` VALUES ('394', '3', '2016-02-08', '14:12:15');
INSERT INTO `usuarios_accesos` VALUES ('395', '3', '2016-02-08', '15:32:17');
INSERT INTO `usuarios_accesos` VALUES ('396', '5', '2016-02-08', '18:01:15');
INSERT INTO `usuarios_accesos` VALUES ('397', '20', '2016-02-09', '11:58:34');
INSERT INTO `usuarios_accesos` VALUES ('398', '3', '2016-02-09', '12:16:53');
INSERT INTO `usuarios_accesos` VALUES ('399', '18', '2016-02-09', '12:20:07');
INSERT INTO `usuarios_accesos` VALUES ('400', '5', '2016-02-09', '12:22:23');
INSERT INTO `usuarios_accesos` VALUES ('401', '3', '2016-02-09', '13:34:24');
INSERT INTO `usuarios_accesos` VALUES ('402', '5', '2016-02-09', '13:44:17');
INSERT INTO `usuarios_accesos` VALUES ('403', '20', '2016-02-09', '14:51:59');
INSERT INTO `usuarios_accesos` VALUES ('404', '20', '2016-02-09', '15:57:22');
INSERT INTO `usuarios_accesos` VALUES ('405', '3', '2016-02-09', '16:48:30');
INSERT INTO `usuarios_accesos` VALUES ('406', '20', '2016-02-09', '17:05:34');
INSERT INTO `usuarios_accesos` VALUES ('407', '19', '2016-02-09', '17:11:28');
INSERT INTO `usuarios_accesos` VALUES ('408', '5', '2016-02-10', '12:36:47');
INSERT INTO `usuarios_accesos` VALUES ('409', '19', '2016-02-10', '13:14:43');
INSERT INTO `usuarios_accesos` VALUES ('410', '20', '2016-02-10', '14:05:02');
INSERT INTO `usuarios_accesos` VALUES ('411', '3', '2016-02-10', '15:39:01');
INSERT INTO `usuarios_accesos` VALUES ('412', '20', '2016-02-10', '16:57:00');
INSERT INTO `usuarios_accesos` VALUES ('413', '19', '2016-02-10', '18:59:20');
INSERT INTO `usuarios_accesos` VALUES ('414', '19', '2016-02-10', '19:04:27');
INSERT INTO `usuarios_accesos` VALUES ('415', '3', '2016-02-10', '19:26:10');
INSERT INTO `usuarios_accesos` VALUES ('416', '3', '2016-02-11', '11:28:11');
INSERT INTO `usuarios_accesos` VALUES ('417', '5', '2016-02-11', '14:37:08');
INSERT INTO `usuarios_accesos` VALUES ('418', '20', '2016-02-11', '14:39:40');
INSERT INTO `usuarios_accesos` VALUES ('419', '20', '2016-02-11', '16:55:18');
INSERT INTO `usuarios_accesos` VALUES ('420', '19', '2016-02-11', '16:59:14');
INSERT INTO `usuarios_accesos` VALUES ('421', '20', '2016-02-12', '13:23:47');
INSERT INTO `usuarios_accesos` VALUES ('422', '19', '2016-02-12', '14:23:26');
INSERT INTO `usuarios_accesos` VALUES ('423', '18', '2016-02-12', '14:23:54');
INSERT INTO `usuarios_accesos` VALUES ('424', '3', '2016-02-12', '14:32:34');
INSERT INTO `usuarios_accesos` VALUES ('425', '18', '2016-02-12', '15:29:55');
INSERT INTO `usuarios_accesos` VALUES ('426', '18', '2016-02-13', '05:27:04');
INSERT INTO `usuarios_accesos` VALUES ('427', '18', '2016-02-13', '14:10:36');
INSERT INTO `usuarios_accesos` VALUES ('428', '3', '2016-02-15', '12:55:40');
INSERT INTO `usuarios_accesos` VALUES ('429', '3', '2016-02-15', '16:44:52');
INSERT INTO `usuarios_accesos` VALUES ('430', '19', '2016-02-15', '16:49:16');
INSERT INTO `usuarios_accesos` VALUES ('431', '20', '2016-02-15', '17:04:30');
INSERT INTO `usuarios_accesos` VALUES ('432', '18', '2016-02-15', '18:17:22');
INSERT INTO `usuarios_accesos` VALUES ('433', '5', '2016-02-15', '19:08:58');
INSERT INTO `usuarios_accesos` VALUES ('434', '18', '2016-02-15', '21:37:29');
INSERT INTO `usuarios_accesos` VALUES ('435', '20', '2016-02-16', '13:11:41');
INSERT INTO `usuarios_accesos` VALUES ('436', '3', '2016-02-16', '13:44:28');
INSERT INTO `usuarios_accesos` VALUES ('437', '3', '2016-02-16', '14:59:43');
INSERT INTO `usuarios_accesos` VALUES ('438', '3', '2016-02-16', '15:44:21');
INSERT INTO `usuarios_accesos` VALUES ('439', '20', '2016-02-16', '17:12:24');
INSERT INTO `usuarios_accesos` VALUES ('440', '3', '2016-02-16', '20:56:51');
INSERT INTO `usuarios_accesos` VALUES ('441', '3', '2016-02-17', '09:06:09');
INSERT INTO `usuarios_accesos` VALUES ('442', '20', '2016-02-17', '12:46:12');
INSERT INTO `usuarios_accesos` VALUES ('443', '1', '2016-02-17', '16:15:36');
INSERT INTO `usuarios_accesos` VALUES ('444', '20', '2016-02-17', '16:21:52');
INSERT INTO `usuarios_accesos` VALUES ('445', '5', '2016-02-17', '16:23:19');
INSERT INTO `usuarios_accesos` VALUES ('446', '3', '2016-02-17', '16:23:47');
INSERT INTO `usuarios_accesos` VALUES ('447', '9', '2016-02-17', '16:24:07');
INSERT INTO `usuarios_accesos` VALUES ('448', '9', '2016-02-17', '16:24:14');
INSERT INTO `usuarios_accesos` VALUES ('449', '19', '2016-02-17', '16:51:17');
INSERT INTO `usuarios_accesos` VALUES ('450', '3', '2016-02-17', '17:58:00');
INSERT INTO `usuarios_accesos` VALUES ('451', '3', '2016-02-18', '10:46:12');
INSERT INTO `usuarios_accesos` VALUES ('452', '3', '2016-02-18', '10:50:50');
INSERT INTO `usuarios_accesos` VALUES ('453', '20', '2016-02-18', '14:39:12');
INSERT INTO `usuarios_accesos` VALUES ('454', '3', '2016-02-18', '14:42:10');
INSERT INTO `usuarios_accesos` VALUES ('455', '20', '2016-02-18', '15:12:49');
INSERT INTO `usuarios_accesos` VALUES ('456', '9', '2016-02-18', '15:13:52');
INSERT INTO `usuarios_accesos` VALUES ('457', '19', '2016-02-18', '15:13:55');
INSERT INTO `usuarios_accesos` VALUES ('458', '9', '2016-02-18', '15:14:07');
INSERT INTO `usuarios_accesos` VALUES ('459', '1', '2016-02-18', '15:15:04');
INSERT INTO `usuarios_accesos` VALUES ('460', '1', '2016-02-18', '15:15:11');
INSERT INTO `usuarios_accesos` VALUES ('461', '1', '2016-02-18', '15:16:08');
INSERT INTO `usuarios_accesos` VALUES ('462', '1', '2016-02-18', '15:16:12');
INSERT INTO `usuarios_accesos` VALUES ('463', '3', '2016-02-18', '17:43:06');
INSERT INTO `usuarios_accesos` VALUES ('464', '9', '2016-02-18', '17:44:33');
INSERT INTO `usuarios_accesos` VALUES ('465', '9', '2016-02-18', '17:45:35');
INSERT INTO `usuarios_accesos` VALUES ('466', '20', '2016-02-19', '12:41:14');
INSERT INTO `usuarios_accesos` VALUES ('467', '19', '2016-02-19', '13:39:00');
INSERT INTO `usuarios_accesos` VALUES ('468', '20', '2016-02-19', '14:53:24');
INSERT INTO `usuarios_accesos` VALUES ('469', '20', '2016-02-19', '16:04:02');
INSERT INTO `usuarios_accesos` VALUES ('470', '20', '2016-02-19', '16:51:21');
INSERT INTO `usuarios_accesos` VALUES ('471', '20', '2016-02-22', '11:42:45');
INSERT INTO `usuarios_accesos` VALUES ('472', '9', '2016-02-22', '12:24:36');
INSERT INTO `usuarios_accesos` VALUES ('473', '3', '2016-02-22', '12:26:49');
INSERT INTO `usuarios_accesos` VALUES ('474', '3', '2016-02-22', '12:27:02');
INSERT INTO `usuarios_accesos` VALUES ('475', '3', '2016-02-22', '13:32:00');
INSERT INTO `usuarios_accesos` VALUES ('476', '1', '2016-02-22', '13:37:54');
INSERT INTO `usuarios_accesos` VALUES ('477', '1', '2016-02-22', '13:41:33');
INSERT INTO `usuarios_accesos` VALUES ('478', '1', '2016-02-22', '14:24:01');
INSERT INTO `usuarios_accesos` VALUES ('479', '1', '2016-02-22', '14:50:59');
INSERT INTO `usuarios_accesos` VALUES ('480', '5', '2016-02-23', '00:00:06');
INSERT INTO `usuarios_accesos` VALUES ('481', '20', '2016-02-23', '11:40:09');
INSERT INTO `usuarios_accesos` VALUES ('482', '20', '2016-02-23', '13:56:54');
INSERT INTO `usuarios_accesos` VALUES ('483', '20', '2016-02-23', '14:00:07');
INSERT INTO `usuarios_accesos` VALUES ('484', '20', '2016-02-23', '14:00:19');
INSERT INTO `usuarios_accesos` VALUES ('485', '23', '2016-02-23', '14:07:29');
INSERT INTO `usuarios_accesos` VALUES ('486', '23', '2016-02-23', '14:12:33');
INSERT INTO `usuarios_accesos` VALUES ('487', '3', '2016-02-23', '14:13:25');
INSERT INTO `usuarios_accesos` VALUES ('488', '3', '2016-02-23', '14:13:43');
INSERT INTO `usuarios_accesos` VALUES ('489', '1', '2016-02-23', '14:14:28');
INSERT INTO `usuarios_accesos` VALUES ('490', '23', '2016-02-23', '14:20:37');
INSERT INTO `usuarios_accesos` VALUES ('491', '23', '2016-02-23', '14:20:54');
INSERT INTO `usuarios_accesos` VALUES ('492', '1', '2016-02-23', '14:30:07');
INSERT INTO `usuarios_accesos` VALUES ('493', '3', '2016-02-23', '14:31:23');
INSERT INTO `usuarios_accesos` VALUES ('494', '3', '2016-02-23', '14:31:34');
INSERT INTO `usuarios_accesos` VALUES ('495', '23', '2016-02-23', '14:38:56');
INSERT INTO `usuarios_accesos` VALUES ('496', '23', '2016-02-23', '14:39:04');
INSERT INTO `usuarios_accesos` VALUES ('497', '1', '2016-04-13', '10:39:39');

-- ----------------------------
-- Table structure for usuarios_estado
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_estado`;
CREATE TABLE `usuarios_estado` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

-- ----------------------------
-- Records of usuarios_estado
-- ----------------------------
INSERT INTO `usuarios_estado` VALUES ('1', 'Activo');
INSERT INTO `usuarios_estado` VALUES ('2', 'Inactivo');

-- ----------------------------
-- Table structure for usuarios_listado
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_listado`;
CREATE TABLE `usuarios_listado` (
  `idUsuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `idEstado` int(11) unsigned NOT NULL,
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
  `idSistema` int(11) unsigned NOT NULL,
  `Comision` decimal(11,1) unsigned NOT NULL,
  `idCreador` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COMMENT='Cuidado';

-- ----------------------------
-- Records of usuarios_listado
-- ----------------------------
INSERT INTO `usuarios_listado` VALUES ('1', 'tenshi98', 'b9ad227539cc03cd8199e23aa9078065', 'SuperAdmin', '1', 'asd@bla1.cl', 'Victor Reyes', '16029464-7', '2014-05-14', 'Los Lirios 0936', '8512517', 'Santiago', 'Puente Alto', 'usr_img_img_6626.jpg', '2016-04-13', '0', '0.0', '0');
INSERT INTO `usuarios_listado` VALUES ('2', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrador', '1', '', 'Administrador', '', '0000-00-00', '', '', '', '', '', '2016-01-14', '1', '0.0', '0');
INSERT INTO `usuarios_listado` VALUES ('3', 'esoto', '02005284a7ef1d150b04cd42e9086f04', 'Supervisor', '1', 'admin1@admin1.cl', 'Evelyn Soto', '', '0000-00-00', 'asd', '', '', '', '', '2016-02-23', '1', '5.0', '0');
INSERT INTO `usuarios_listado` VALUES ('4', 'ejecutivo1', '81dc9bdb52d04dc20036dbd8313ed055', 'Vendedor', '1', 'ejecutivo1@eje.cl', 'Evelyn Soto', '', '0000-00-00', 'asd', '', '', '', '', '2016-01-08', '1', '10.0', '3');
INSERT INTO `usuarios_listado` VALUES ('5', 'cmelendez', '81dc9bdb52d04dc20036dbd8313ed055', 'Supervisor', '1', 'cmelendez.1805@gmail.com', 'Carlos Melendez', '', '0000-00-00', 'asd', '', '', '', '', '2016-02-23', '1', '5.0', '0');
INSERT INTO `usuarios_listado` VALUES ('6', 'ejecutivo2', '81dc9bdb52d04dc20036dbd8313ed055', 'Vendedor', '1', 'asd@asd.cl', 'Ejecutivo 2', '', '0000-00-00', 'asd', '', '', '', '', '2016-01-12', '1', '10.0', '5');
INSERT INTO `usuarios_listado` VALUES ('7', 'doris', '81dc9bdb52d04dc20036dbd8313ed055', 'Supervisor', '1', 'doris@gmail.com', 'Doris', '', '0000-00-00', 'camino real', '', '', '', '', '2016-01-11', '1', '5.0', '0');
INSERT INTO `usuarios_listado` VALUES ('8', 'ejecutivo3', '81dc9bdb52d04dc20036dbd8313ed055', 'Vendedor', '1', 'doris@gmail.com', 'Doris', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '1', '10.0', '7');
INSERT INTO `usuarios_listado` VALUES ('9', 'gventas1', '02005284a7ef1d150b04cd42e9086f04', 'Gerente Ventas', '1', 'admin1@admin1.cl', 'Evelyn Soto', '', '0000-00-00', '', '', '', '', '', '2016-02-22', '1', '2.5', '0');
INSERT INTO `usuarios_listado` VALUES ('10', 'gventas2', '81dc9bdb52d04dc20036dbd8313ed055', 'Gerente Ventas', '1', 'admin1@admin1.cl', 'Carlos Melendez', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '1', '2.5', '0');
INSERT INTO `usuarios_listado` VALUES ('13', 'Elsa1', '81dc9bdb52d04dc20036dbd8313ed055', 'Vendedor', '1', 'elsa@gmail.com', 'Elsa Bruno Chinchay', '', '0000-00-00', ' mz m lote 03 huaytapayana los olivos', '', '', '', '', '2016-01-07', '1', '10.0', '7');
INSERT INTO `usuarios_listado` VALUES ('14', 'Wilson1', '81dc9bdb52d04dc20036dbd8313ed055', 'Vendedor', '2', 'wilson@gmail.com', 'Wison Alfaro Bazan', '', '0000-00-00', 'Ah San Benito mz z1 lote 02 ', '', 'Lima', 'Carabayllo', '', '2016-01-13', '1', '10.0', '7');
INSERT INTO `usuarios_listado` VALUES ('15', 'Favio1', '81dc9bdb52d04dc20036dbd8313ed055', 'Vendedor', '2', 'favio@gmail.com', 'Favio Condor Huamani', '', '1979-11-03', 'mz k lote 02 Ah El mirador de vista Alegre comas', '', 'Lima', '', '', '0000-00-00', '1', '10.0', '7');
INSERT INTO `usuarios_listado` VALUES ('16', 'Felix1', '81dc9bdb52d04dc20036dbd8313ed055', 'Vendedor', '2', 'felix@gmail.com', 'Felix Santivañez Colonio', '', '2016-01-13', 'AH 9 de Junio 1r sector puente piedra', '', 'Lima', '', '', '0000-00-00', '1', '10.0', '7');
INSERT INTO `usuarios_listado` VALUES ('17', 'Cristian1', '81dc9bdb52d04dc20036dbd8313ed055', 'Vendedor', '1', 'cristian@gmail.com', 'Cristian Angel Santivañez Solano', '', '2016-01-23', 'AH 9 de Junio 1r sector puente piedra', '', '', '', '', '0000-00-00', '1', '10.0', '7');
INSERT INTO `usuarios_listado` VALUES ('18', 'ALOPEZ', '81dc9bdb52d04dc20036dbd8313ed055', 'Vendedor', '1', 'alilop.benbenuto@gmail.com', 'ANDREA LOPEZ BENBENUTO', '', '1989-02-09', 'Urb. San Diego, Calle San Gregorio 338, mz U, lt 38', '959119809', 'Lima', 'San Martin de Porres', '', '2016-02-15', '1', '10.0', '5');
INSERT INTO `usuarios_listado` VALUES ('19', 'arodriguez', '81dc9bdb52d04dc20036dbd8313ed055', 'Vendedor', '1', 'andisrpeton@gmail.com', 'Andres Rodriguez Bustamante', '', '1987-05-07', 'Luis Giribaldi 851', '', 'Lima', 'La Victoria', '', '2016-02-19', '1', '5.0', '3');
INSERT INTO `usuarios_listado` VALUES ('20', 'jespinoza', '81dc9bdb52d04dc20036dbd8313ed055', 'Vendedor', '1', 'janethfabi28@hotmail.com', 'Janeth Elizabeth Espinoza Cáceres', '', '1989-02-03', 'Av. Angelica Gamarra 344', '983150010', 'Lima', 'Los Olivos', '', '2016-02-23', '1', '5.0', '3');
INSERT INTO `usuarios_listado` VALUES ('21', 'Karina1', '81dc9bdb52d04dc20036dbd8313ed055', 'Vendedor', '1', 'karina@gmail.com', 'Karina de Melendez', '', '0000-00-00', 'camino real 1121', '', '', '', '', '0000-00-00', '1', '10.0', '5');
INSERT INTO `usuarios_listado` VALUES ('22', 'mvillafuerte', '486bb60e1a486a332af256be7f4ff456', 'Vendedor', '1', 'markstrada19@hotmail.com', 'Marcos VIllafuerte Strada', '', '0000-00-00', 'calle 2 MZ F Lt 11Chorrillos ', '990029089', '', '', '', '2016-02-03', '1', '10.0', '3');
INSERT INTO `usuarios_listado` VALUES ('23', 'licyvila', '81dc9bdb52d04dc20036dbd8313ed055', 'Vendedor', '1', 'ventas@aaazu.com.pe', 'Dayana Licy Vila Ramos', '', '0000-00-00', 'Jr San miguel 370 San Carlos', '995354481', 'Lima', 'Comas', '', '2016-02-23', '1', '10.0', '3');

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of usuarios_observaciones
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
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

-- ----------------------------
-- Records of usuarios_permisos
-- ----------------------------
INSERT INTO `usuarios_permisos` VALUES ('1', '2', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('2', '2', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('3', '2', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('5', '2', '3', '4');
INSERT INTO `usuarios_permisos` VALUES ('6', '2', '8', '4');
INSERT INTO `usuarios_permisos` VALUES ('7', '2', '6', '4');
INSERT INTO `usuarios_permisos` VALUES ('8', '2', '5', '4');
INSERT INTO `usuarios_permisos` VALUES ('9', '2', '4', '4');
INSERT INTO `usuarios_permisos` VALUES ('10', '2', '7', '4');
INSERT INTO `usuarios_permisos` VALUES ('11', '3', '17', '4');
INSERT INTO `usuarios_permisos` VALUES ('12', '3', '18', '4');
INSERT INTO `usuarios_permisos` VALUES ('13', '3', '19', '4');
INSERT INTO `usuarios_permisos` VALUES ('17', '4', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('18', '4', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('19', '4', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('20', '5', '17', '4');
INSERT INTO `usuarios_permisos` VALUES ('21', '5', '18', '4');
INSERT INTO `usuarios_permisos` VALUES ('22', '5', '19', '4');
INSERT INTO `usuarios_permisos` VALUES ('32', '6', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('31', '3', '21', '4');
INSERT INTO `usuarios_permisos` VALUES ('26', '6', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('27', '6', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('28', '6', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('29', '5', '21', '4');
INSERT INTO `usuarios_permisos` VALUES ('30', '4', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('47', '7', '18', '4');
INSERT INTO `usuarios_permisos` VALUES ('48', '7', '17', '4');
INSERT INTO `usuarios_permisos` VALUES ('46', '7', '19', '4');
INSERT INTO `usuarios_permisos` VALUES ('45', '7', '21', '4');
INSERT INTO `usuarios_permisos` VALUES ('37', '9', '20', '4');
INSERT INTO `usuarios_permisos` VALUES ('38', '9', '16', '4');
INSERT INTO `usuarios_permisos` VALUES ('39', '9', '15', '4');
INSERT INTO `usuarios_permisos` VALUES ('40', '9', '14', '4');
INSERT INTO `usuarios_permisos` VALUES ('41', '10', '20', '4');
INSERT INTO `usuarios_permisos` VALUES ('42', '10', '16', '4');
INSERT INTO `usuarios_permisos` VALUES ('43', '10', '15', '4');
INSERT INTO `usuarios_permisos` VALUES ('44', '10', '14', '4');
INSERT INTO `usuarios_permisos` VALUES ('49', '8', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('50', '8', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('51', '8', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('52', '8', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('53', '5', '24', '4');
INSERT INTO `usuarios_permisos` VALUES ('54', '5', '23', '4');
INSERT INTO `usuarios_permisos` VALUES ('55', '5', '25', '4');
INSERT INTO `usuarios_permisos` VALUES ('56', '7', '24', '4');
INSERT INTO `usuarios_permisos` VALUES ('57', '7', '23', '4');
INSERT INTO `usuarios_permisos` VALUES ('58', '7', '25', '4');
INSERT INTO `usuarios_permisos` VALUES ('59', '3', '24', '4');
INSERT INTO `usuarios_permisos` VALUES ('60', '3', '23', '4');
INSERT INTO `usuarios_permisos` VALUES ('61', '3', '25', '4');
INSERT INTO `usuarios_permisos` VALUES ('62', '11', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('63', '11', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('64', '11', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('65', '11', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('66', '12', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('67', '12', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('68', '12', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('69', '12', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('70', '13', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('71', '13', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('72', '13', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('73', '13', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('74', '14', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('75', '14', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('76', '14', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('77', '14', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('78', '15', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('79', '15', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('80', '15', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('81', '15', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('82', '16', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('83', '16', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('84', '16', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('85', '16', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('86', '17', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('87', '17', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('88', '17', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('89', '17', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('90', '18', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('91', '18', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('92', '18', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('93', '18', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('94', '19', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('95', '19', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('96', '19', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('97', '19', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('98', '20', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('99', '20', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('100', '20', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('101', '20', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('102', '21', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('103', '21', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('104', '21', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('105', '21', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('106', '22', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('107', '22', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('108', '22', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('109', '22', '22', '4');
INSERT INTO `usuarios_permisos` VALUES ('110', '23', '1', '4');
INSERT INTO `usuarios_permisos` VALUES ('111', '23', '2', '4');
INSERT INTO `usuarios_permisos` VALUES ('112', '23', '13', '4');
INSERT INTO `usuarios_permisos` VALUES ('113', '23', '22', '4');

-- ----------------------------
-- Table structure for usuarios_tipos
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_tipos`;
CREATE TABLE `usuarios_tipos` (
  `idTipoUsr` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipoUsr`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Fija';

-- ----------------------------
-- Records of usuarios_tipos
-- ----------------------------
INSERT INTO `usuarios_tipos` VALUES ('1', 'Administrador');
INSERT INTO `usuarios_tipos` VALUES ('2', 'Vendedor');
INSERT INTO `usuarios_tipos` VALUES ('3', 'Supervisor');
INSERT INTO `usuarios_tipos` VALUES ('4', 'Gerente Ventas');
