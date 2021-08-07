DROP TABLE activos_categorias;

CREATE TABLE `activos_categorias` (
  `idCategoria` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO activos_categorias VALUES("1","Abrasivos");
INSERT INTO activos_categorias VALUES("2","Adhesivos");
INSERT INTO activos_categorias VALUES("3","Aereosoles");
INSERT INTO activos_categorias VALUES("4","Articulos de Oficina");
INSERT INTO activos_categorias VALUES("5","Aseo Industrial");
INSERT INTO activos_categorias VALUES("6","Elementos Proteccion Personal");
INSERT INTO activos_categorias VALUES("7","Fijaciones");
INSERT INTO activos_categorias VALUES("8","Herramientas Manuales");
INSERT INTO activos_categorias VALUES("9","Insumos De Lubricación");
INSERT INTO activos_categorias VALUES("10","Insumos Electricos");
INSERT INTO activos_categorias VALUES("11","Pinturas");
INSERT INTO activos_categorias VALUES("12","Ropa de Seguridad");



DROP TABLE activos_listado;

CREATE TABLE `activos_listado` (
  `idProducto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(150) NOT NULL,
  `Marca` varchar(120) NOT NULL,
  `idCategoria` int(11) unsigned NOT NULL,
  `idUml` int(11) unsigned NOT NULL,
  `idRubro` int(11) unsigned NOT NULL,
  `Observaciones` text NOT NULL,
  `ValorIngreso` decimal(11,6) unsigned NOT NULL,
  `ValorEgreso` decimal(11,6) unsigned NOT NULL,
  `StockLimite` decimal(11,6) unsigned NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=MyISAM AUTO_INCREMENT=282 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO activos_listado VALUES("1","Resma de papel Tamaño Carta","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("2","Resma de papel Tamaño Oficio","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("3","Lapiz pasta tinta negra","BIC","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("4","Lapiz pasta tinta azul","BIC","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("5","Lapiz pasta tinta roja","BIC","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("6","Lapiz pasta tinta verde","BIC","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("7","Corchetes 26/6 de 5000 ","Colon","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("8","Archivadores de Palanca tamaño Carta","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("9","Marcador tiza para vidrio","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("10","Marcador oleo amarillo","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("11","Plumon de pizarra negro","Sello board","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("12","Plumon de pizarra azul","Sello board","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("13","Plumon de pizarra rojo","Sello board","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("14","Plumon permanente negro","Sello board","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("15","Plumon permanente azul","Sello board","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("16","Plumon permanente rojo","Sello board","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("17","Separador tamaño carta","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("18","Corrector lapiz","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("19","Tarjetero plastico","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("20","Tijera 7.0","Fultons","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("21","Perforadora ","Colon","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("22","Visores para carpetas colgantes","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("23","Carpetas transparentes","Colon","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("24","Post-it","Colon","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("25","Portalapices","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("26","Corchetera","Genmes","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("27","Tiza blanca","Dimerc Office","4","1","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("28","Regla de metal 30 cm","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("29","Laminas para termolaminar tamaño carta","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("30","laminas para termolaminar tamaño oficio","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("31","Pilas AA","Duracell","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("32","Pilas AAA","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("33","Dedo de goma N13 T002469","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("34","Anotador simple vinil R107304","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("35","Caja carton multiorden super class R300718","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("36","Block anillado escolar H201620","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("37","Clips doble negro 12un 32mm S503004","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("38","Saca corchetes","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("39","Cinta Rotuladora amarilla S403036","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("40","Cinta Rotuladora blanca S403042","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("41","Cinta adhesiva cristal 18x30mt","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("42","Cinta de embalaje transparente","USA Tape","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("43","Sobre saco tamaño carta","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("44","Libro de asistencia 100hjs","Auca","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("45","Destacador faber-castell fluor amarillo","Faber Castle","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("46","Cuaderno universitario 100hj m7 ","Auca","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("47","Libro de actas 100hjs","Auca","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("48","Separador carta 6 posic.","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("49","Chinches Push Pins colores","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("50","Lomo archivador ancho verde ","Lavoro","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("51","Porta clips","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("52","Block prepicado 5mm","Auca","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("53","Portacredenciales 9x6,5","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("54","Tinta para tampón negro","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("55","Huella digital circular negro","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("56","Fechero estandar 5mm","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("57","Carpeta vinil carta fast negro","Rhein","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("58","Carpeta vinil oficio fast negro","Rhein","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("59","Carpeta colgante fleje plastico","Rhein","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("60","Accoclips fastener dorado 50und","Dimerc Office","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("61","Adhesivo en barra 20grs pritt stic fix ","Artel","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("62","Block prepicado oficio 7mm","Colon","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("63","Nota adhesiva pop up zr 330 3M","3M","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("64","Cartridge LC-75 BK XL","Brother","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("65","Cartridge LC-75 C XL","Brother","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("66","Cartridge LC-75 M XL","Brother","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("67","Cartridge LC-75 Y XL","Brother","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("68","Cartridge HP 122 Color","HP","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("69","Cartridge HP 122 Negro","HP","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("70","Toner alternativo MLT-D101","Globaltoner","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("71","Toner alternativo CE505X","Globaltoner","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("72","Toner alternativo Q5949X","Globaltoner","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("73","Toner alternativo Q7551X","Globaltoner","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("74","Toner alternativo CF283A","Globaltoner","4","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("75","Poleron Algodón M/L Azul T/S","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("76","Poleron Algodón M/L Azul T/M","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("77","Poleron Algodón M/L Azul T/L","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("78","Poleron Algodón M/L Azul T/XL","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("79","Poleron Algodón M/L Azul T/XXL","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("80","Polera Polo M/C Azul T/S","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("81","Polera Polo M/C Azul T-M","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("82","Polera Polo M/C Azul T-L","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("83","Polera Polo M/C Azul T-XL","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("84","Polera Polo M/C Azul T-XXL","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("85","Polera Pique M/L Azul T-S","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("86","Polera Pique M/L Azul T-M","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("87","Polera Pique M/L Azul T-L","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("88","Polera Pique M/L Azul T-XL","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("89","Polera Pique M/L Azul T-XXL","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("90","Polera Pique M/C Azul T-S","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("91","Polera Pique M/C Azul T-M","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("92","Polera Pique M/C Azul T-L","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("93","Polera Pique M/C Azul T-XL","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("94","Polera Pique M/C Azul T-XXL","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("95","Micropolar M/L Azul T-S","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("96","Micropolar M/L Azul T-M","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("97","Micropolar M/L Azul T-L","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("98","Micropolar M/L Azul T-XL","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("99","Micropolar M/L Azul T-XXL","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("100","Pantalon Mezclilla Prelavado T-40","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("101","Pantalon Mezclilla Prelavado T-42","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("102","Pantalon Mezclilla Prelavado T-44","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("103","Pantalon Mezclilla Prelavado T-46","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("104","Pantalon Mezclilla Prelavado T-48","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("105","Pantalon Mezclilla Prelavado T-50","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("106","Pantalon Mezclilla Prelavado T-52","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("107","Pantalon Vestir Cargo Azul T-40","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("108","Pantalon Vestir Cargo Azul T-42","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("109","Pantalon Vestir Cargo Azul T-44","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("110","Pantalon Vestir Cargo Azul T-46","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("111","Pantalon Vestir Cargo Azul T-48","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("112","Pantalon Vestir Cargo Azul T-50","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("113","Chaqueta Softshell Negra Dama T-S","Legend","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("114","Chaqueta Softshell Negra Dama T-M","Legend","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("115","Chaqueta Softshell Negra Dama T-L","Legend","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("116","Chaqueta Softshell Negra T-S","Legend","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("117","Chaqueta Softshell Negra  T-M","Legend","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("118","Chaqueta Softshell Negra T-L","Legend","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("119","Chaqueta Softshell Negra T-XL","Legend","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("120","Chaqueta Softshell Negra T-XXL","Legend","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("121","Chaleco Geologo Poplin Simple Naranjo T/M","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("122","Chaleco Geologo Poplin Simple Naranjo T/L","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("123","Chaleco Geologo Poplin Simple Naranjo T/XL","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("124","Chaleco Geologo Poplin Simple Naranjo T/XXL","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("125","Chaleco Geologo Poplin Doble Rojo T/M","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("126","Chaleco Geologo Poplin Doble Rojo T/L","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("127","Chaleco Geologo Poplin Doble Rojo T/XL","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("128","Chaleco Geologo Poplin Doble Rojo T/XXL","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("129","Chaleco Geologo Poplin  T/M","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("130","Chaleco Geologo Poplin T/L","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("131","Chaleco Geologo Poplin T/XL","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("132","Chaleco Geologo Poplin T/XXL","Texora","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("133","Buzo Piloto Poplin c/Reflectante T/M","Bunker","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("134","Buzo Piloto Poplin c/Reflectante T/L","Bunker","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("135","Buzo Piloto Poplin c/Reflectante T/XL","Bunker","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("136","Buzo Piloto Poplin c/Reflectante T/XXL","Bunker","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("137","Cubre nuca para casco","Bunker","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("138","Buzo Desechable  T-M","Bunker","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("139","Buzo Desechable  T-L","Bunker","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("140","Buzo Desechable  T-XL","Bunker","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("141","Buzo Desechable  T-XXL","Bunker","12","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("142","Botin Protex Nro 38","Tempest","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("143","Botin Protex Nro 40","Tempest","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("144","Botin Protex Nro 41","Tempest","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("145","Botin Protex Nro 42","Tempest","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("146","Botin Protex Nro 43","Tempest","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("147","Botin Tornado 3090 CDP Plantilla Klevar Nro 38","Tempest","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("148","Botin Tornado 3090 CDP Plantilla Klevar Nro 40","Tempest","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("149","Botin Tornado 3090 CDP Plantilla Klevar Nro 41","Tempest","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("150","Botin Tornado 3090 CDP Plantilla Klevar Nro 42","Tempest","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("151","Botin Tornado 3090 CDP Plantilla Klevar Nro 43","Tempest","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("152","Botin Edelbrock ED 106 Nro 40","Edelbrock","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("153","Botin Edelbrock ED 106 Nro 41","Edelbrock","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("154","Botin Edelbrock ED 106 Nro 42","Edelbrock","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("155","Tapon Auditivo 3M 1271","3M","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("156","Tapon Auditivo 3M 1270","3M","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("157","Mascara Respiratoria 2 Vias  3M 6200   T/L","3M","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("158","Filtro 2096 3M Mixto p/particulas,olores y acidos","3M","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("159","Respirador 8210 para particulas N95 3M","3M","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("160","Casco 3M H-700 Blanco","3M","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("161","Casco 3M H-700 Amarillo","3M","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("162","Casco 3M H-700 Azul","3M","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("163","Fonos para cascos CM-501","3M","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("164","Lentes de seguridad Claros Discovery","Discovery","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("165","Lentes de seguridad Oscuros Discovery","Discovery","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("166","Lentes de seguridad Claros Genesis","Ubex","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("167","Lentes de seguridad Oscuros Genesis XC","Ubex","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("168","Guantes Quirurgicos Latex Desechables T-L","Great Grove","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("169","Guantes Quirurgicos Nitrilo Desechables T-L","Great Grove","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("170","Guantes Nitrilo T-L","Multiflex","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("171","Guantes de Latex T-L","Multiflex","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("172","Guantes de Cabritilla sin forro","KS","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("173","Guantes de Cabritilla con forro","KS","6","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("174","Balde 20 Lts. Estandar E Blanco.","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("175","Balde Estandar 10 Lts.","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("176","Balde Estandar 5 lts.","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("177","Tapa Balde Estandar 20 Lts UN Sin Vertedor","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("178","Tapa Balde Estandar 20 Lts UN Con Vertedor","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("179","Tapa Balde Estandar 10 Lts Sin Vertedor","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("180","Tapa Balde Estandar 10 Lts Con Vertedor","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("181","Tapa Balde 5 Lts con Presinto Sin Vertedor","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("182","Tapa Balde 5 Lts con Presinto Con Vertedor","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("183","Tapa Balde Estandar 20 Lts con Presinto Sin Vertedor","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("184","Tapa Balde Estandar 20 Lts con Presinto con Vertedor","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("185","Jarro Graduado P.P. 1.4 Lts","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("186","Jarro 5 Lts Boca Ancha","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("187","Botella boca 3.1 cm toma muestras aceite 115cc","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("188","Tubo P.V.C. y P.E. toma muestra","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("189","Frasco 1 LT B/80 redondo destapado","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("190","Frasco 500cc B/80 redondo destapado","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("191","Tapa 80 contratapa","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("192","Tarro 240 Lts con rueda","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("193","Botella boca 280 gollete seguridad 1 LT","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("194","Botella 1 LT boca 280 redonda T/Red gollete Seg/Dest","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("195","Botella 500cc boca 280 redonda T/Red gollete Seg/Dest","Plasticos Haddad S.A.","9","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("196","Punta 5/16 Phillips Hexagono","Villela S.A.","8","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("197","Llave punta corona 3/8","Villela S.A.","8","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("198","Llave punta corona 1/2","Villela S.A.","8","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("199","Llave punta corona 1\" 1/16","Villela S.A.","8","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("200","Llave punta corona 3/4","Villela S.A.","8","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("201","Destornillador electrico","Villela S.A.","8","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("202","Destornillador mecánico","Villela S.A.","8","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("203","Marco y sierra","Villela S.A.","8","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("204","Alicate universal","Villela S.A.","8","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("205","Alicate de punta","Villela S.A.","8","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("206","Alicate cortante","Villela S.A.","8","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("207","Llave stilson 14 \"","Villela S.A.","8","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("208","Maceta de caucho recubierta","Villela S.A.","8","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("209","Alicate pico loro","Villela S.A.","8","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("210","Llave cadena","Villela S.A.","8","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("211","Amarras plasticas 10 cm","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("212","Aamarras plasticas 20 cm","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("213","Amarras plasticas 30 cm","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("214","Amarras plasticas 60 cm","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("215","Pernos de 6x30x1","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("216","Tuercas de 6x1","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("217","Agorex 60 transparente","Agorex","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("218","Amarras plasticas 300x4,8","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("219","Amarras plasticas 200x3,6","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("220","Amarras plasticas 100x2,5","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("221","Abrazaderas presión 92-97","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("222","Abrazaderas Presión 80-85","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("223","Abrazaderas presión 74-79","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("224","Abrazaderas presión 64-67","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("225","Abrazaderas presión 52-55","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("226","Pernos 5x20 cabeza redonda zincada","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("227","Tornillo  12 x 3/4 roscalata","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("228","Tornillo roscalata 10x1 ","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("229","Tornillo roscalata 10 x 3/4","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("230","Tornillo roscalata 8 x 1/2","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("231","Candados medianos","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("232","Cadena ","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("233","Soga 12 mm ","Villela S.A.","7","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("234","Lija 80 fierro","Villela S.A.","1","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("235","Lija 100 fierro","Villela S.A.","1","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("236","Lija 180 fierro","Villela S.A.","1","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("237","Soldadura 6013","Villela S.A.","1","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("238","Disco de corte 4,5","Villela S.A.","1","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("239","Disco de corte 4\" 1/2 ","Villela S.A.","1","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("240","Disco de corte 115 x 10 x 22,33","Villela S.A.","1","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("241","Silicona transparente","Villela S.A.","2","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("242","Pegamento PVC vinilit 250 cc","Villela S.A.","2","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("243","Cinta aisladora negro 3M ","Villela S.A.","2","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("244","WD-40 155 grs","Villela S.A.","3","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("245","Grasa dielectrica","Villela S.A.","3","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("246","Limpia contacto electrico","Villela S.A.","3","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("247","Teflon amarillo","Villela S.A.","10","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("248","Huincha aisladora","Villela S.A.","10","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("249","Enchufe macho 2P+T 10A Bticino","Villela S.A.","10","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("250","Enchufe hembra 2P+T 10A Bticino","Villela S.A.","10","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("251","Pintura Spray negro brillante","Villela S.A.","11","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("252","Pintura Spray blanca ","Villela S.A.","11","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("253","Pintura esmalte blanco galon","Villela S.A.","11","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("254","Pintura esmalte negro galon","Villela S.A.","11","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("255","Pintura Spray aluminio","Villela S.A.","11","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("256","Toalla jumbo 250m Extra Blanca","Dismer","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("257","Papel Higienico jumbo 500m Extra Blanca","Dismer","5","2","1","","1316.666667","0.000000","0.000000");
INSERT INTO activos_listado VALUES("258","Papel Higienico jumbo 50m","Dismer","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("259","Papel Higienico 500m Jumbo Extra Blanca","Dismer","5","2","1","","3128.333333","0.000000","0.000000");
INSERT INTO activos_listado VALUES("260","Toalla jumbo Tork 250m Extra Blanca","Tork","5","2","1","","3675.500000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("261","Papel Higienico 50m Tork","Tork","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("262","Desengrasante para trabajos pesados","Quik Fill 38","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("263","Liquido sintetico especial cadenas transportadoras","Tex Chain","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("264","Desengrasante lavado de cilindros","P-E 60/30","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("265","Jabon en Polvo P-100","Maritano","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("266","Paños de Limpieza","Hilachas","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("267","Cloro para limpieza de baños y desinfección de superficies","Cloro","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("268","Bactericida especial","Bactericida","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("269","Cera liquida autobrillante","Eco Brill","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("270","Lavalozas líquido concentrado","Eco Loz","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("271","Limpiador, desinfectante, fungicida, sanitizante y desodorante","Eco Limp 02","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("272","Jabón líquido de tocador","Eco Hand","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("273","Limpia vidrios concentrado","Eco Glass","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("274","Producto para eliminar el zarro de los baños","Eco 2","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("275","Shampoo para carrocerias de autos","Eco Car","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("276","Cloro para limpieza de baños y desinfección de superficies","Cloro Gel","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("277","Desodorante","Eco Fresh","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("278","Desincrustante","Eco Loz","5","2","1","","0.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("279","QUIK FILL 38","ECOLAB","5","4","2","","2224.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("280","Esmalte Alquidico Estructural Blanco 1 GL","Pinturas Tricolor","11","5","2","","9800.000000","0.000000","0.000000");
INSERT INTO activos_listado VALUES("281","Esmalte Alquidico Estructural Negro 1 GL","Pinturas Tricolor","11","5","2","","9800.000000","0.000000","0.000000");



DROP TABLE activos_uml;

CREATE TABLE `activos_uml` (
  `idUml` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idUml`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO activos_uml VALUES("1","Caja");
INSERT INTO activos_uml VALUES("2","Unidad");
INSERT INTO activos_uml VALUES("3","No Aplica");
INSERT INTO activos_uml VALUES("4","Litro");
INSERT INTO activos_uml VALUES("5","Galón");



DROP TABLE agenda_telefonica;

CREATE TABLE `agenda_telefonica` (
  `idAgenda` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Fono` varchar(15) NOT NULL,
  PRIMARY KEY (`idAgenda`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO agenda_telefonica VALUES("1","1","4","Juan Carlos Olmos","62498677");
INSERT INTO agenda_telefonica VALUES("2","1","4","Carlos Fernandez","50241267");



DROP TABLE analisis_aceite;

CREATE TABLE `analisis_aceite` (
  `idAnalisis` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idMaquina` int(11) unsigned NOT NULL,
  `idSistema` int(11) unsigned NOT NULL,
  `f_muestreo` date NOT NULL,
  `f_recibida` date NOT NULL,
  `f_reporte` date NOT NULL,
  `n_muestra` int(11) unsigned NOT NULL,
  `maquina` int(11) unsigned NOT NULL,
  `aceite` int(11) unsigned NOT NULL,
  `aceite_marca` varchar(120) NOT NULL,
  `aceite_grado` varchar(120) NOT NULL,
  `met_Aluminio` int(11) unsigned NOT NULL,
  `met_Plata` int(11) unsigned NOT NULL,
  `met_Cromo` int(11) unsigned NOT NULL,
  `met_Cobre` int(11) unsigned NOT NULL,
  `met_Hierro` int(11) unsigned NOT NULL,
  `met_Niquel` int(11) unsigned NOT NULL,
  `met_Plomo` int(11) unsigned NOT NULL,
  `met_Estano` int(11) unsigned NOT NULL,
  `cont_Zinc` int(11) unsigned NOT NULL,
  `cont_Silicio` int(11) unsigned NOT NULL,
  `cont_Fosforo` int(11) unsigned NOT NULL,
  `cont_Potasio` int(11) unsigned NOT NULL,
  `cont_Magnesio` int(11) unsigned NOT NULL,
  `cont_Molibdeno` int(11) unsigned NOT NULL,
  `cont_Sodio` int(11) unsigned NOT NULL,
  `cont_Boro` int(11) unsigned NOT NULL,
  `cont_Bario` int(11) unsigned NOT NULL,
  `cont_Calcio` int(11) unsigned NOT NULL,
  `prue_Glicol` decimal(11,2) unsigned NOT NULL,
  `prue_Nitracion` decimal(11,2) unsigned NOT NULL,
  `prue_Sulfatacion` decimal(11,2) unsigned NOT NULL,
  `prue_Oxidacion` decimal(11,2) unsigned NOT NULL,
  `prue_Viscosidad` decimal(11,2) unsigned NOT NULL,
  `prue_Indice` decimal(11,2) unsigned NOT NULL,
  `prue_Hollin` decimal(11,2) unsigned NOT NULL,
  `idDispersancia` int(11) unsigned NOT NULL,
  `idFlashPoint` int(11) unsigned NOT NULL,
  `prue_Agua` decimal(11,2) unsigned NOT NULL,
  `phys_TBN` decimal(11,2) unsigned NOT NULL,
  `obs_Diagnostico` text NOT NULL,
  `obs_Accion` text NOT NULL,
  `idEstado` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idAnalisis`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';




DROP TABLE analisis_dispersancia;

CREATE TABLE `analisis_dispersancia` (
  `idDispersancia` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idDispersancia`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO analisis_dispersancia VALUES("1","Pasa");
INSERT INTO analisis_dispersancia VALUES("2","No pasa");



DROP TABLE analisis_estado;

CREATE TABLE `analisis_estado` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO analisis_estado VALUES("1","Normal");
INSERT INTO analisis_estado VALUES("2","Precaucion");
INSERT INTO analisis_estado VALUES("3","Anormal");
INSERT INTO analisis_estado VALUES("4","Severo");



DROP TABLE analisis_flashpoint;

CREATE TABLE `analisis_flashpoint` (
  `idFlashPoint` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idFlashPoint`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO analisis_flashpoint VALUES("1","Negativo");
INSERT INTO analisis_flashpoint VALUES("2","Positivo");



DROP TABLE ayuda_listado;

CREATE TABLE `ayuda_listado` (
  `idAyuda` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `idAdmpm` int(11) unsigned NOT NULL,
  `id_pmcat` int(11) unsigned NOT NULL,
  `Version` decimal(4,2) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Direccion_img` varchar(150) NOT NULL,
  PRIMARY KEY (`idAyuda`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';




DROP TABLE bodegas_activos_facturacion;

CREATE TABLE `bodegas_activos_facturacion` (
  `idFacturacion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idBodegaOrigen` int(11) unsigned NOT NULL,
  `idBodegaDestino` int(11) unsigned NOT NULL,
  `idSistema` int(11) unsigned NOT NULL,
  `idSistemaDestino` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `Creacion_fecha` date NOT NULL,
  `Creacion_mes` int(2) unsigned NOT NULL,
  `Creacion_ano` int(4) unsigned NOT NULL,
  `idDocumentos` int(11) unsigned NOT NULL,
  `N_Doc` varchar(60) NOT NULL,
  `idTipo` int(11) unsigned NOT NULL,
  `Observaciones` text NOT NULL,
  `idOT` int(11) unsigned NOT NULL,
  `idTrabajador` int(11) unsigned NOT NULL,
  `idProveedor` int(11) unsigned NOT NULL,
  `idCliente` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idFacturacion`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

INSERT INTO bodegas_activos_facturacion VALUES("1","0","1","1","0","5","2015-10-28","10","2015","2","1036858","1","Sin observaciones","0","0","11","0");
INSERT INTO bodegas_activos_facturacion VALUES("2","0","1","1","0","5","2015-10-28","10","2015","2","43843","1","Sin observaciones","0","0","22","0");
INSERT INTO bodegas_activos_facturacion VALUES("3","0","1","1","0","5","2015-10-28","10","2015","2","367051","1","Sin observaciones","0","0","36","0");
INSERT INTO bodegas_activos_facturacion VALUES("4","1","3","1","4","5","2015-10-28","10","2015","0","","6","Sin observaciones","0","0","0","0");
INSERT INTO bodegas_activos_facturacion VALUES("5","1","9","1","8","5","2015-10-29","10","2015","0","","6","Sin observaciones","0","0","0","0");
INSERT INTO bodegas_activos_facturacion VALUES("6","1","9","1","8","5","2015-10-29","10","2015","0","","6","Sin observaciones","0","0","0","0");



DROP TABLE bodegas_activos_facturacion_existencias;

CREATE TABLE `bodegas_activos_facturacion_existencias` (
  `idExistencia` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idFacturacion` int(11) unsigned NOT NULL,
  `idBodega` int(11) unsigned NOT NULL,
  `idSistema` int(11) unsigned NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `Creacion_fecha` date NOT NULL,
  `Creacion_mes` int(2) unsigned NOT NULL,
  `Creacion_ano` int(4) unsigned NOT NULL,
  `idDocumentos` int(11) NOT NULL,
  `N_Doc` varchar(60) NOT NULL,
  `idTipo` int(11) unsigned NOT NULL,
  `idProducto` int(11) unsigned NOT NULL,
  `Cantidad_ing` decimal(11,6) unsigned NOT NULL,
  `Cantidad_eg` decimal(11,6) unsigned NOT NULL,
  `idOT` int(11) unsigned NOT NULL,
  `idTrabajador` int(11) unsigned NOT NULL,
  `Valor` decimal(11,6) unsigned NOT NULL,
  PRIMARY KEY (`idExistencia`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

INSERT INTO bodegas_activos_facturacion_existencias VALUES("1","1","1","1","5","2015-10-28","10","2015","2","1036858","1","279","20.000000","0.000000","0","0","2224.000000");
INSERT INTO bodegas_activos_facturacion_existencias VALUES("2","2","1","1","5","2015-10-28","10","2015","2","43843","1","259","72.000000","0.000000","0","0","3128.333333");
INSERT INTO bodegas_activos_facturacion_existencias VALUES("3","2","1","1","5","2015-10-28","10","2015","2","43843","1","257","48.000000","0.000000","0","0","1316.666667");
INSERT INTO bodegas_activos_facturacion_existencias VALUES("4","2","1","1","5","2015-10-28","10","2015","2","43843","1","260","28.000000","0.000000","0","0","3675.500000");
INSERT INTO bodegas_activos_facturacion_existencias VALUES("5","3","1","1","5","2015-10-28","10","2015","2","367051","1","280","2.000000","0.000000","0","0","9800.000000");
INSERT INTO bodegas_activos_facturacion_existencias VALUES("6","3","1","1","5","2015-10-28","10","2015","2","367051","1","281","2.000000","0.000000","0","0","9800.000000");
INSERT INTO bodegas_activos_facturacion_existencias VALUES("7","4","1","1","5","2015-10-28","10","2015","0","","6","280","0.000000","2.000000","0","0","0.000000");
INSERT INTO bodegas_activos_facturacion_existencias VALUES("8","4","3","4","5","2015-10-28","10","2015","0","","6","280","2.000000","0.000000","0","0","0.000000");
INSERT INTO bodegas_activos_facturacion_existencias VALUES("9","4","1","1","5","2015-10-28","10","2015","0","","6","281","0.000000","2.000000","0","0","0.000000");
INSERT INTO bodegas_activos_facturacion_existencias VALUES("10","4","3","4","5","2015-10-28","10","2015","0","","6","281","2.000000","0.000000","0","0","0.000000");
INSERT INTO bodegas_activos_facturacion_existencias VALUES("11","5","1","1","5","2015-10-29","10","2015","0","","6","279","0.000000","20.000000","0","0","0.000000");
INSERT INTO bodegas_activos_facturacion_existencias VALUES("12","5","9","8","5","2015-10-29","10","2015","0","","6","279","20.000000","0.000000","0","0","0.000000");
INSERT INTO bodegas_activos_facturacion_existencias VALUES("13","6","1","1","5","2015-10-29","10","2015","0","","6","259","0.000000","20.000000","0","0","0.000000");
INSERT INTO bodegas_activos_facturacion_existencias VALUES("14","6","9","8","5","2015-10-29","10","2015","0","","6","259","20.000000","0.000000","0","0","0.000000");



DROP TABLE bodegas_activos_facturacion_tipo;

CREATE TABLE `bodegas_activos_facturacion_tipo` (
  `idTipo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO bodegas_activos_facturacion_tipo VALUES("1","Ingreso de Activos a bodega");
INSERT INTO bodegas_activos_facturacion_tipo VALUES("2","Egreso de Activos a bodega");
INSERT INTO bodegas_activos_facturacion_tipo VALUES("3","Entrega de Activos");
INSERT INTO bodegas_activos_facturacion_tipo VALUES("4","Traspaso de Activos entre bodegas");
INSERT INTO bodegas_activos_facturacion_tipo VALUES("5","Transformacion de Activos");
INSERT INTO bodegas_activos_facturacion_tipo VALUES("6","Traspaso de Activos a otra Empresa");
INSERT INTO bodegas_activos_facturacion_tipo VALUES("7","Gasto de Activos en una Orden de Trabajo");



DROP TABLE bodegas_activos_listado;

CREATE TABLE `bodegas_activos_listado` (
  `idBodega` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(180) NOT NULL,
  `idSistema` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idBodega`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

INSERT INTO bodegas_activos_listado VALUES("1","Simyl - Principal","1");
INSERT INTO bodegas_activos_listado VALUES("2","mtr-Principal","5");
INSERT INTO bodegas_activos_listado VALUES("3","AAC-Principal","4");
INSERT INTO bodegas_activos_listado VALUES("4","Acrus - Principal","3");
INSERT INTO bodegas_activos_listado VALUES("5","Marinetti - Principal","2");
INSERT INTO bodegas_activos_listado VALUES("6","Enap Envasado - Principal","9");
INSERT INTO bodegas_activos_listado VALUES("7","Enap Linares - Principal","7");
INSERT INTO bodegas_activos_listado VALUES("8","Enap Maipu - Principal","6");
INSERT INTO bodegas_activos_listado VALUES("9","Enap San Fernando - Principal","8");
INSERT INTO bodegas_activos_listado VALUES("10","Enap Envasado Principal","10");



DROP TABLE bodegas_documentos_mercantiles;

CREATE TABLE `bodegas_documentos_mercantiles` (
  `idDocumentos` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`idDocumentos`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO bodegas_documentos_mercantiles VALUES("1","Guia de Despacho");
INSERT INTO bodegas_documentos_mercantiles VALUES("2","Factura");
INSERT INTO bodegas_documentos_mercantiles VALUES("3","Nota de Credito");
INSERT INTO bodegas_documentos_mercantiles VALUES("4","Nota de Debito");
INSERT INTO bodegas_documentos_mercantiles VALUES("5","Boleta");



DROP TABLE bodegas_facturacion;

CREATE TABLE `bodegas_facturacion` (
  `idFacturacion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idBodegaOrigen` int(11) unsigned NOT NULL,
  `idBodegaDestino` int(11) unsigned NOT NULL,
  `idSistema` int(11) unsigned NOT NULL,
  `idSistemaDestino` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `Creacion_fecha` date NOT NULL,
  `Creacion_mes` int(2) unsigned NOT NULL,
  `Creacion_ano` int(4) unsigned NOT NULL,
  `idDocumentos` int(11) unsigned NOT NULL,
  `N_Doc` varchar(60) NOT NULL,
  `idTipo` int(11) unsigned NOT NULL,
  `Observaciones` text NOT NULL,
  `idOT` int(11) unsigned NOT NULL,
  `idProveedor` int(11) unsigned NOT NULL,
  `idCliente` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idFacturacion`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

INSERT INTO bodegas_facturacion VALUES("1","0","1","1","0","5","2015-10-19","10","2015","2","413939","1","Sin observaciones","0","1","0");
INSERT INTO bodegas_facturacion VALUES("2","0","1","1","0","5","2015-10-19","10","2015","2","524871","1","Sin observaciones","0","7","0");
INSERT INTO bodegas_facturacion VALUES("3","0","1","1","0","5","2015-10-19","10","2015","2","524872","1","Sin observaciones","0","7","0");
INSERT INTO bodegas_facturacion VALUES("4","0","1","1","0","5","2015-10-19","10","2015","2","2416","1","Sin observaciones","0","6","0");
INSERT INTO bodegas_facturacion VALUES("5","0","1","1","0","5","2015-10-19","10","2015","2","2541","1","Sin observaciones","0","8","0");
INSERT INTO bodegas_facturacion VALUES("6","0","1","1","0","5","2015-10-19","10","2015","2","2542","1","Sin observaciones","0","8","0");
INSERT INTO bodegas_facturacion VALUES("7","0","1","1","0","5","2015-10-19","10","2015","2","2543","1","Sin observaciones","0","8","0");
INSERT INTO bodegas_facturacion VALUES("8","0","1","1","0","5","2015-10-19","10","2015","2","163645","1","Sin observaciones","0","9","0");
INSERT INTO bodegas_facturacion VALUES("9","0","1","1","0","5","2015-10-19","10","2015","2","8423","1","Sin observaciones","0","10","0");
INSERT INTO bodegas_facturacion VALUES("10","0","1","1","0","5","2015-10-19","10","2015","2","33097","1","Sin observaciones","0","12","0");
INSERT INTO bodegas_facturacion VALUES("11","0","1","1","0","5","2015-10-19","10","2015","2","45688324","1","Sin observaciones","0","13","0");
INSERT INTO bodegas_facturacion VALUES("12","0","1","1","0","5","2015-10-19","10","2015","2","2881","1","Sin observaciones","0","5","0");
INSERT INTO bodegas_facturacion VALUES("13","0","1","1","0","5","2015-10-19","10","2015","2","06","1","Sin observaciones","0","4","0");
INSERT INTO bodegas_facturacion VALUES("14","0","1","1","0","5","2015-10-19","10","2015","2","07","1","Sin observaciones","0","4","0");
INSERT INTO bodegas_facturacion VALUES("15","0","1","1","0","5","2015-10-19","10","2015","2","08","1","Sin observaciones","0","4","0");
INSERT INTO bodegas_facturacion VALUES("16","0","1","1","0","5","2015-10-19","10","2015","2","687354","1","Sin observaciones","0","14","0");
INSERT INTO bodegas_facturacion VALUES("17","0","1","1","0","5","2015-10-19","10","2015","2","7645389","1","Sin observaciones","0","15","0");
INSERT INTO bodegas_facturacion VALUES("18","0","1","1","0","5","2015-10-19","10","2015","2","758634638","1","Sin observaciones","0","16","0");
INSERT INTO bodegas_facturacion VALUES("19","0","1","1","0","5","2015-10-19","10","2015","2","8273643","1","Sin observaciones","0","17","0");
INSERT INTO bodegas_facturacion VALUES("20","0","1","1","0","4","2015-10-20","10","2015","2","3325","1","Codelco","0","8","0");
INSERT INTO bodegas_facturacion VALUES("21","0","1","1","0","5","2015-10-21","10","2015","2","3326","1","Sin observaciones","0","8","0");
INSERT INTO bodegas_facturacion VALUES("22","1","1","1","0","4","2015-10-21","10","2015","0","","5","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("23","1","0","1","0","4","2015-10-21","10","2015","1","600","2","Codelco Chuquicamata","0","0","1");
INSERT INTO bodegas_facturacion VALUES("24","0","1","1","0","5","2015-10-22","10","2015","2","8273644","1","Sin observaciones","0","17","0");
INSERT INTO bodegas_facturacion VALUES("25","0","1","1","0","5","2015-10-22","10","2015","2","687355","1","Sin observaciones","0","18","0");
INSERT INTO bodegas_facturacion VALUES("26","1","1","1","0","5","2015-10-22","10","2015","0","","5","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("27","1","3","1","2","5","2015-10-22","10","2015","0","","6","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("28","1","1","1","0","5","2015-10-22","10","2015","0","","5","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("29","1","2","1","3","5","2015-10-22","10","2015","0","","6","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("30","1","3","1","2","5","2015-10-22","10","2015","0","","6","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("31","1","1","1","0","5","2015-10-22","10","2015","0","","5","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("32","1","3","1","2","5","2015-10-23","10","2015","0","","6","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("33","0","1","1","0","5","2015-10-23","10","2015","2","168017","1","Sin observaciones","0","9","0");
INSERT INTO bodegas_facturacion VALUES("34","1","1","1","0","5","2015-10-23","10","2015","0","","5","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("35","1","0","1","0","5","2015-10-23","10","2015","2","1179","2","Sin observaciones","0","0","11");
INSERT INTO bodegas_facturacion VALUES("36","1","0","1","0","5","2015-10-23","10","2015","1","602","2","Sin observaciones","0","0","3");
INSERT INTO bodegas_facturacion VALUES("37","0","1","1","0","5","2015-10-26","10","2015","2","532490","1","Sin observaciones","0","7","0");
INSERT INTO bodegas_facturacion VALUES("38","1","5","1","4","5","2015-10-26","10","2015","0","","6","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("39","1","1","1","0","5","2015-10-26","10","2015","0","","5","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("40","1","1","1","0","5","2015-10-26","10","2015","0","","5","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("41","1","6","1","5","5","2015-10-27","10","2015","0","","6","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("42","1","3","1","2","5","2015-10-27","10","2015","0","","6","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("43","1","1","1","0","5","2015-10-27","10","2015","0","","5","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("44","1","1","1","0","5","2015-10-27","10","2015","0","","5","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("45","0","1","1","0","5","2015-10-27","10","2015","2","9","1","Sin observaciones","0","4","0");
INSERT INTO bodegas_facturacion VALUES("46","1","1","1","0","5","2015-10-27","10","2015","0","","5","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("47","1","0","1","0","5","2015-10-27","10","2015","2","1184","2","Sin observaciones","0","0","21");
INSERT INTO bodegas_facturacion VALUES("48","0","1","1","0","5","2015-10-28","10","2015","2","168300","1","Sin observaciones","0","9","0");
INSERT INTO bodegas_facturacion VALUES("49","0","1","1","0","5","2015-10-28","10","2015","2","2489","1","Sin observaciones","0","6","0");
INSERT INTO bodegas_facturacion VALUES("50","0","1","1","0","5","2015-10-28","10","2015","2","19538","1","Sin observaciones","0","35","0");
INSERT INTO bodegas_facturacion VALUES("51","1","3","1","2","5","2015-10-28","10","2015","0","","6","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("52","1","1","1","0","5","2015-10-28","10","2015","0","","5","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("53","1","1","1","0","4","2015-10-30","10","2015","0","","5","Codelco Chuquicamata","0","0","0");
INSERT INTO bodegas_facturacion VALUES("54","1","1","1","0","4","2015-10-30","10","2015","0","","5","Stock Santiago","0","0","0");
INSERT INTO bodegas_facturacion VALUES("55","1","1","1","0","5","2015-11-04","11","2015","0","","5","Sin observaciones","0","0","0");
INSERT INTO bodegas_facturacion VALUES("56","1","0","1","0","5","2015-11-04","11","2015","2","1185","2","Sin observaciones","0","0","1");
INSERT INTO bodegas_facturacion VALUES("57","0","3","2","0","3","2015-11-05","11","2015","1","00001","1","Corresponde al Stock de bodega en Planta Marinetti recibido el 04-08-2015.\nProductos que se facturaran a SIMYL S.A.","0","4","0");



DROP TABLE bodegas_facturacion_existencias;

CREATE TABLE `bodegas_facturacion_existencias` (
  `idExistencia` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idFacturacion` int(11) unsigned NOT NULL,
  `idBodega` int(11) unsigned NOT NULL,
  `idSistema` int(11) unsigned NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `Creacion_fecha` date NOT NULL,
  `Creacion_mes` int(2) unsigned NOT NULL,
  `Creacion_ano` int(4) unsigned NOT NULL,
  `idDocumentos` int(11) NOT NULL,
  `N_Doc` varchar(60) NOT NULL,
  `idTipo` int(11) unsigned NOT NULL,
  `idProducto` int(11) unsigned NOT NULL,
  `Cantidad_ing` decimal(11,6) unsigned NOT NULL,
  `Cantidad_eg` decimal(11,6) unsigned NOT NULL,
  `idOT` int(11) unsigned NOT NULL,
  `Valor` decimal(11,6) unsigned NOT NULL,
  PRIMARY KEY (`idExistencia`)
) ENGINE=MyISAM AUTO_INCREMENT=150 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

INSERT INTO bodegas_facturacion_existencias VALUES("1","1","1","1","5","2015-10-19","10","2015","2","413939","1","180","6.000000","0.000000","0","17160.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("2","2","1","1","5","2015-10-19","10","2015","2","524871","1","169","60.000000","0.000000","0","2645.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("3","2","1","1","5","2015-10-19","10","2015","2","524871","1","168","10.000000","0.000000","0","14423.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("4","3","1","1","5","2015-10-19","10","2015","2","524872","1","169","72.000000","0.000000","0","2645.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("5","3","1","1","5","2015-10-19","10","2015","2","524872","1","168","48.000000","0.000000","0","14423.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("6","4","1","1","5","2015-10-19","10","2015","2","2416","1","175","420.000000","0.000000","0","1625.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("7","5","1","1","5","2015-10-19","10","2015","2","2541","1","120","18.000000","0.000000","0","7905.888889");
INSERT INTO bodegas_facturacion_existencias VALUES("8","5","1","1","5","2015-10-19","10","2015","2","2541","1","113","4220.000000","0.000000","0","3953.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("9","5","1","1","5","2015-10-19","10","2015","2","2541","1","116","18.000000","0.000000","0","6930.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("10","5","1","1","5","2015-10-19","10","2015","2","2541","1","118","8.000000","0.000000","0","9412.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("11","5","1","1","5","2015-10-19","10","2015","2","2541","1","119","25.000000","0.000000","0","10117.640000");
INSERT INTO bodegas_facturacion_existencias VALUES("12","5","1","1","5","2015-10-19","10","2015","2","2541","1","114","6230.000000","0.000000","0","2610.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("13","5","1","1","5","2015-10-19","10","2015","2","2541","1","167","118.000000","0.000000","0","6094.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("14","6","1","1","5","2015-10-19","10","2015","2","2542","1","181","70.000000","0.000000","0","4480.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("15","7","1","1","5","2015-10-19","10","2015","2","2543","1","184","24.000000","0.000000","0","4500.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("16","7","1","1","5","2015-10-19","10","2015","2","2543","1","183","142.000000","0.000000","0","5647.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("17","8","1","1","5","2015-10-19","10","2015","2","163645","1","182","170.000000","0.000000","0","1382.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("18","8","1","1","5","2015-10-19","10","2015","2","163645","1","3","154.000000","0.000000","0","1448.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("19","8","1","1","5","2015-10-19","10","2015","2","163645","1","5","120.000000","0.000000","0","1509.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("20","8","1","1","5","2015-10-19","10","2015","2","163645","1","18","20.000000","0.000000","0","4170.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("21","8","1","1","5","2015-10-19","10","2015","2","163645","1","10","40.000000","0.000000","0","4000.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("22","8","1","1","5","2015-10-19","10","2015","2","163645","1","123","36.000000","0.000000","0","6077.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("23","8","1","1","5","2015-10-19","10","2015","2","163645","1","122","20.000000","0.000000","0","4237.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("24","9","1","1","5","2015-10-19","10","2015","2","8423","1","165","12.000000","0.000000","0","8460.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("25","9","1","1","5","2015-10-19","10","2015","2","8423","1","158","20.000000","0.000000","0","8128.400000");
INSERT INTO bodegas_facturacion_existencias VALUES("26","10","1","1","5","2015-10-19","10","2015","2","33097","1","64","10.000000","0.000000","0","23100.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("27","11","1","1","5","2015-10-19","10","2015","2","45688324","1","53","40.000000","0.000000","0","8349.150000");
INSERT INTO bodegas_facturacion_existencias VALUES("28","11","1","1","5","2015-10-19","10","2015","2","45688324","1","54","40.000000","0.000000","0","8185.300000");
INSERT INTO bodegas_facturacion_existencias VALUES("29","11","1","1","5","2015-10-19","10","2015","2","45688324","1","59","20.000000","0.000000","0","2300.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("30","12","1","1","5","2015-10-19","10","2015","2","2881","1","132","19.000000","0.000000","0","18715.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("31","13","1","1","5","2015-10-19","10","2015","2","06","1","29","19.000000","0.000000","0","1570.947368");
INSERT INTO bodegas_facturacion_existencias VALUES("32","13","1","1","5","2015-10-19","10","2015","2","06","1","30","19.000000","0.000000","0","1570.947368");
INSERT INTO bodegas_facturacion_existencias VALUES("33","13","1","1","5","2015-10-19","10","2015","2","06","1","24","19.000000","0.000000","0","1675.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("34","13","1","1","5","2015-10-19","10","2015","2","06","1","37","20.000000","0.000000","0","2604.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("35","13","1","1","5","2015-10-19","10","2015","2","06","1","128","13.000000","0.000000","0","2800.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("36","14","1","1","5","2015-10-19","10","2015","2","07","1","43","240.000000","0.000000","0","2380.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("37","14","1","1","5","2015-10-19","10","2015","2","07","1","44","1015.000000","0.000000","0","2380.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("38","14","1","1","5","2015-10-19","10","2015","2","07","1","45","180.000000","0.000000","0","2380.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("39","14","1","1","5","2015-10-19","10","2015","2","07","1","46","405.000000","0.000000","0","2380.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("40","14","1","1","5","2015-10-19","10","2015","2","07","1","47","40.000000","0.000000","0","2988.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("41","14","1","1","5","2015-10-19","10","2015","2","07","1","48","830.000000","0.000000","0","2988.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("42","14","1","1","5","2015-10-19","10","2015","2","07","1","49","385.000000","0.000000","0","2988.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("43","14","1","1","5","2015-10-19","10","2015","2","07","1","186","60.000000","0.000000","0","2380.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("44","15","1","1","5","2015-10-19","10","2015","2","08","1","50","615.000000","0.000000","0","2988.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("45","15","1","1","5","2015-10-19","10","2015","2","08","1","44","205.000000","0.000000","0","2380.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("46","15","1","1","5","2015-10-19","10","2015","2","08","1","187","624.000000","0.000000","0","6230.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("47","16","1","1","5","2015-10-19","10","2015","2","687354","1","156","200.000000","0.000000","0","23668.500000");
INSERT INTO bodegas_facturacion_existencias VALUES("48","17","1","1","5","2015-10-19","10","2015","2","7645389","1","157","43.000000","0.000000","0","23204.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("49","18","1","1","5","2015-10-19","10","2015","2","758634638","1","137","20.000000","0.000000","0","35000.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("50","19","1","1","5","2015-10-19","10","2015","2","8273643","1","138","3.000000","0.000000","0","19400.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("51","20","1","1","4","2015-10-20","10","2015","2","3325","1","121","18.000000","0.000000","0","6958.833333");
INSERT INTO bodegas_facturacion_existencias VALUES("52","21","1","1","5","2015-10-21","10","2015","2","3326","1","121","18.000000","0.000000","0","6958.833333");
INSERT INTO bodegas_facturacion_existencias VALUES("53","22","1","1","4","2015-10-21","10","2015","0","","5","121","0.000000","36.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("54","22","1","1","4","2015-10-21","10","2015","0","","5","155","36.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("55","23","1","1","4","2015-10-21","10","2015","1","600","2","155","0.000000","36.000000","0","10988.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("56","24","1","1","5","2015-10-22","10","2015","2","8273644","1","138","5.000000","0.000000","0","19400.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("57","25","1","1","5","2015-10-22","10","2015","2","687355","1","188","103.000000","0.000000","0","23669.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("58","26","1","1","5","2015-10-22","10","2015","0","","5","18","0.000000","19.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("59","26","1","1","5","2015-10-22","10","2015","0","","5","105","19.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("60","27","1","1","5","2015-10-22","10","2015","0","","6","168","0.000000","12.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("61","27","3","2","5","2015-10-22","10","2015","0","","6","168","12.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("62","27","1","1","5","2015-10-22","10","2015","0","","6","169","0.000000","24.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("63","27","3","2","5","2015-10-22","10","2015","0","","6","169","24.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("64","27","1","1","5","2015-10-22","10","2015","0","","6","132","0.000000","12.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("65","27","3","2","5","2015-10-22","10","2015","0","","6","132","12.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("66","27","1","1","5","2015-10-22","10","2015","0","","6","175","0.000000","400.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("67","27","3","2","5","2015-10-22","10","2015","0","","6","175","400.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("68","28","1","1","5","2015-10-22","10","2015","0","","5","175","0.000000","20.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("69","28","1","1","5","2015-10-22","10","2015","0","","5","177","20.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("70","29","1","1","5","2015-10-22","10","2015","0","","6","168","0.000000","6.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("71","29","2","3","5","2015-10-22","10","2015","0","","6","168","6.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("72","29","1","1","5","2015-10-22","10","2015","0","","6","169","0.000000","24.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("73","29","2","3","5","2015-10-22","10","2015","0","","6","169","24.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("74","29","1","1","5","2015-10-22","10","2015","0","","6","132","0.000000","4.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("75","29","2","3","5","2015-10-22","10","2015","0","","6","132","4.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("76","29","1","1","5","2015-10-22","10","2015","0","","6","177","0.000000","20.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("77","29","2","3","5","2015-10-22","10","2015","0","","6","177","20.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("78","30","1","1","5","2015-10-22","10","2015","0","","6","64","0.000000","10.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("79","30","3","2","5","2015-10-22","10","2015","0","","6","64","10.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("80","31","1","1","5","2015-10-22","10","2015","0","","5","10","0.000000","38.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("81","31","1","1","5","2015-10-22","10","2015","0","","5","94","38.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("82","32","1","1","5","2015-10-23","10","2015","0","","6","128","0.000000","13.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("83","32","3","2","5","2015-10-23","10","2015","0","","6","128","13.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("84","32","1","1","5","2015-10-23","10","2015","0","","6","180","0.000000","6.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("85","32","3","2","5","2015-10-23","10","2015","0","","6","180","6.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("86","33","1","1","5","2015-10-23","10","2015","2","168017","1","18","100.000000","0.000000","0","3920.150000");
INSERT INTO bodegas_facturacion_existencias VALUES("87","33","1","1","5","2015-10-23","10","2015","2","168017","1","10","100.000000","0.000000","0","3155.250000");
INSERT INTO bodegas_facturacion_existencias VALUES("88","34","1","1","5","2015-10-23","10","2015","0","","5","18","0.000000","38.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("89","34","1","1","5","2015-10-23","10","2015","0","","5","105","38.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("90","35","1","1","5","2015-10-23","10","2015","2","1179","2","105","0.000000","38.000000","0","11280.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("91","36","1","1","5","2015-10-23","10","2015","1","602","2","105","0.000000","19.000000","0","12445.684211");
INSERT INTO bodegas_facturacion_existencias VALUES("92","37","1","1","5","2015-10-26","10","2015","2","532490","1","169","17.000000","0.000000","0","2645.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("93","38","1","1","5","2015-10-26","10","2015","0","","6","169","0.000000","5.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("94","38","5","4","5","2015-10-26","10","2015","0","","6","169","5.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("95","39","1","1","5","2015-10-26","10","2015","0","","5","18","0.000000","38.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("96","39","1","1","5","2015-10-26","10","2015","0","","5","105","38.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("97","40","1","1","5","2015-10-26","10","2015","0","","5","10","0.000000","57.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("98","40","1","1","5","2015-10-26","10","2015","0","","5","94","57.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("99","41","1","1","5","2015-10-27","10","2015","0","","6","169","0.000000","12.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("100","41","6","5","5","2015-10-27","10","2015","0","","6","169","12.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("101","42","1","1","5","2015-10-27","10","2015","0","","6","168","0.000000","12.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("102","42","3","2","5","2015-10-27","10","2015","0","","6","168","12.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("103","43","1","1","5","2015-10-27","10","2015","0","","5","30","0.000000","19.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("104","43","1","1","5","2015-10-27","10","2015","0","","5","192","19.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("105","44","1","1","5","2015-10-27","10","2015","0","","5","29","0.000000","19.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("106","44","1","1","5","2015-10-27","10","2015","0","","5","192","19.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("107","45","1","1","5","2015-10-27","10","2015","2","9","1","29","2.000000","0.000000","0","1571.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("108","46","1","1","5","2015-10-27","10","2015","0","","5","29","0.000000","2.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("109","46","1","1","5","2015-10-27","10","2015","0","","5","192","2.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("110","47","1","1","5","2015-10-27","10","2015","2","1184","2","192","0.000000","40.000000","0","2988.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("111","48","1","1","5","2015-10-28","10","2015","2","168300","1","5","208.000000","0.000000","0","1509.341346");
INSERT INTO bodegas_facturacion_existencias VALUES("112","48","1","1","5","2015-10-28","10","2015","2","168300","1","122","50.000000","0.000000","0","4237.180000");
INSERT INTO bodegas_facturacion_existencias VALUES("113","49","1","1","5","2015-10-28","10","2015","2","2489","1","175","1000.000000","0.000000","0","1.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("114","50","1","1","5","2015-10-28","10","2015","2","19538","1","131","16.000000","0.000000","0","37227.437500");
INSERT INTO bodegas_facturacion_existencias VALUES("115","51","1","1","5","2015-10-28","10","2015","0","","6","131","0.000000","16.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("116","51","3","2","5","2015-10-28","10","2015","0","","6","131","16.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("117","52","1","1","5","2015-10-28","10","2015","0","","5","175","0.000000","800.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("118","52","1","1","5","2015-10-28","10","2015","0","","5","177","800.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("119","53","1","1","4","2015-10-30","10","2015","0","","5","5","0.000000","198.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("120","53","1","1","4","2015-10-30","10","2015","0","","5","188","0.000000","2.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("121","53","1","1","4","2015-10-30","10","2015","0","","5","68","200.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("122","54","1","1","4","2015-10-30","10","2015","0","","5","3","0.000000","18.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("123","54","1","1","4","2015-10-30","10","2015","0","","5","188","0.000000","1.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("124","54","1","1","4","2015-10-30","10","2015","0","","5","157","0.000000","1.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("125","54","1","1","4","2015-10-30","10","2015","0","","5","160","20.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("126","55","1","1","5","2015-11-04","11","2015","0","","5","175","0.000000","200.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("127","55","1","1","5","2015-11-04","11","2015","0","","5","177","200.000000","0.000000","0","0.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("128","56","1","1","5","2015-11-04","11","2015","2","1185","2","177","0.000000","780.000000","0","2640.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("129","57","3","2","3","2015-11-05","11","2015","1","00001","1","21","208.000000","0.000000","0","1856.250000");
INSERT INTO bodegas_facturacion_existencias VALUES("130","57","3","2","3","2015-11-05","11","2015","1","00001","1","189","23.000000","0.000000","0","1856.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("131","57","3","2","3","2015-11-05","11","2015","1","00001","1","29","208.000000","0.000000","0","1480.769231");
INSERT INTO bodegas_facturacion_existencias VALUES("132","57","3","2","3","2015-11-05","11","2015","1","00001","1","34","208.000000","0.000000","0","1904.326923");
INSERT INTO bodegas_facturacion_existencias VALUES("133","57","3","2","3","2015-11-05","11","2015","1","00001","1","35","227.000000","0.000000","0","1481.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("134","57","3","2","3","2015-11-05","11","2015","1","00001","1","25","36.000000","0.000000","0","2476.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("135","57","3","2","3","2015-11-05","11","2015","1","00001","1","36","19.000000","0.000000","0","2564.210526");
INSERT INTO bodegas_facturacion_existencias VALUES("136","57","3","2","3","2015-11-05","11","2015","1","00001","1","37","15.000000","0.000000","0","2741.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("137","57","3","2","3","2015-11-05","11","2015","1","00001","1","62","100.000000","0.000000","0","1481.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("138","57","3","2","3","2015-11-05","11","2015","1","00001","1","60","19.000000","0.000000","0","1772.526316");
INSERT INTO bodegas_facturacion_existencias VALUES("139","57","3","2","3","2015-11-05","11","2015","1","00001","1","63","5.000000","0.000000","0","2576.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("140","57","3","2","3","2015-11-05","11","2015","1","00001","1","64","15.000000","0.000000","0","1540.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("141","57","3","2","3","2015-11-05","11","2015","1","00001","1","132","7.000000","0.000000","0","18500.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("142","57","3","2","3","2015-11-05","11","2015","1","00001","1","133","7.000000","0.000000","0","18642.857143");
INSERT INTO bodegas_facturacion_existencias VALUES("143","57","3","2","3","2015-11-05","11","2015","1","00001","1","131","30.000000","0.000000","0","37227.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("144","57","3","2","3","2015-11-05","11","2015","1","00001","1","134","30.000000","0.000000","0","6000.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("145","57","3","2","3","2015-11-05","11","2015","1","00001","1","135","6.000000","0.000000","0","10000.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("146","57","3","2","3","2015-11-05","11","2015","1","00001","1","168","16.000000","0.000000","0","14000.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("147","57","3","2","3","2015-11-05","11","2015","1","00001","1","169","13.000000","0.000000","0","3476.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("148","57","3","2","3","2015-11-05","11","2015","1","00001","1","175","100.000000","0.000000","0","1625.000000");
INSERT INTO bodegas_facturacion_existencias VALUES("149","57","3","2","3","2015-11-05","11","2015","1","00001","1","174","10.000000","0.000000","0","223.200000");



DROP TABLE bodegas_facturacion_tipo;

CREATE TABLE `bodegas_facturacion_tipo` (
  `idTipo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO bodegas_facturacion_tipo VALUES("1","Ingreso de Materiales a bodega");
INSERT INTO bodegas_facturacion_tipo VALUES("2","Egreso de Materiales de bodega");
INSERT INTO bodegas_facturacion_tipo VALUES("3","Gasto de Materiales");
INSERT INTO bodegas_facturacion_tipo VALUES("4","Traspaso de Materiales entre bodegas");
INSERT INTO bodegas_facturacion_tipo VALUES("5","Transformacion de Materiales");
INSERT INTO bodegas_facturacion_tipo VALUES("6","Traspaso de Materiales a otra Empresa");
INSERT INTO bodegas_facturacion_tipo VALUES("7","Gasto de Materiales en una Orden de Trabajo");



DROP TABLE bodegas_listado;

CREATE TABLE `bodegas_listado` (
  `idBodega` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(180) NOT NULL,
  `idSistema` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idBodega`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

INSERT INTO bodegas_listado VALUES("1","Simyl - Principal","1");
INSERT INTO bodegas_listado VALUES("2","Acrus - Principal","3");
INSERT INTO bodegas_listado VALUES("3","Marinetti - Principal","2");
INSERT INTO bodegas_listado VALUES("5","AAC-Principal","4");
INSERT INTO bodegas_listado VALUES("6","mtr-Principal","5");
INSERT INTO bodegas_listado VALUES("7","Enap Envasado - Principal","9");
INSERT INTO bodegas_listado VALUES("8","Enap Linares - Principal","7");
INSERT INTO bodegas_listado VALUES("9","Enap Maipu - Principal","6");
INSERT INTO bodegas_listado VALUES("10","Enap San Fernando - Principal","8");
INSERT INTO bodegas_listado VALUES("11","Enap Envasado Principal","10");



DROP TABLE calendario_listado;

CREATE TABLE `calendario_listado` (
  `idCalendario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `Ano` int(4) unsigned NOT NULL,
  `Mes` int(2) unsigned NOT NULL,
  `Dia` int(2) unsigned NOT NULL,
  `N_Semana` int(2) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Titulo` varchar(120) NOT NULL,
  `Cuerpo` text NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idCalendario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';




DROP TABLE clientes_estado;

CREATE TABLE `clientes_estado` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO clientes_estado VALUES("1","Activo");
INSERT INTO clientes_estado VALUES("2","Inactivo");



DROP TABLE clientes_listado;

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
  `idCiudad` int(11) unsigned NOT NULL,
  `idComuna` int(11) unsigned NOT NULL,
  `Fax` varchar(15) NOT NULL,
  `PersonaContacto` varchar(210) NOT NULL,
  `Web` varchar(150) NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

INSERT INTO clientes_listado VALUES("1","1","1","1","jcont001@codelco.cl","Corporacion Nacional del Cobre de Chile","61.704.000-K","2015-10-21","AV.11 NORTE Nº 1291 VILLA EXOTICA","","","2","10","","JORGE CONTRERAS SANTANDER","");
INSERT INTO clientes_listado VALUES("2","1","1","1","jperez@agrosuper.cl","Alimentos Doñihue Ltda","79.872.410-K","2015-10-21","San Pablo N° 9500","226407714","","13","82","","Jose Perez","");
INSERT INTO clientes_listado VALUES("3","1","1","1","ricardo.garrido@talleres.cl","Fundición Talleres","99.532.410-5","2014-01-02","Avenida Estación  N° 01200","22587600","","6","105","","Ricardo Garrido","");
INSERT INTO clientes_listado VALUES("4","1","1","1","jaime.santiago@rexnord.com","Rexnord Chile Comercial Ltda","76.583.150-4","2015-10-21","EL Totoral Nº 900-Barrio IND. Buena Ventura","223666004","","13","79","","Jaime Santiago","");
INSERT INTO clientes_listado VALUES("5","1","1","1","luis.vasquez@imerys.com","Imerys Minerales Santiago Limitada","96.974.530-5","2015-10-21","Calle Saladillo Nº 0420-Sector Industrial Lo Echevers","225845900","","13","79","","Luis vasquez","");
INSERT INTO clientes_listado VALUES("6","1","1","1","jvicencio@fanadego.cl","Fanadego SPA","80.723.200-2","2015-10-21","Av. de Chena Nº 11350- Sector Industrial Puerta Sur","229272601","","13","98","","Juan Vicencio","");
INSERT INTO clientes_listado VALUES("7","1","1","1","info@soldadurasespeciales.cl","Aravena javier y Compañia Limitada","77.759.180-0","2015-10-21","Ñuble Nº 611","229272601","","13","70","","Pablo Aravena","");
INSERT INTO clientes_listado VALUES("8","1","1","1","c.pavez@chilarom.cl","Chilarom S.A.","96.549.960-1","2015-10-21","Av. Americo Vespucio Sur Nº 789","225278181","","13","96","","Cesar Pavez","");
INSERT INTO clientes_listado VALUES("9","1","1","1","info@comalameda.cl","Comercial Alameda Limitada","79.845.390-4","2015-10-21","Calle Til til Nº 2575","22383331","","13","323","","Javier Petit","");
INSERT INTO clientes_listado VALUES("10","1","1","1","mvelazco@jordan.cl","Empresas Jordan S.A.","88.683.400-4","2015-10-21","Av.Alberto Pepper Nº 1792","224785164","","13","77","","Maximiliano Velazco","");
INSERT INTO clientes_listado VALUES("11","1","1","1","sdiaz@panchovilla.cl","Alimentos Pancho Villa S.A.","96.590.910-9","2015-10-21","Volcán Lascar Nº 705","227146900","","13","82","","Sebastian Diaz","");
INSERT INTO clientes_listado VALUES("12","1","1","1","victor.vidal@rheem.cl","Rheem Chilena Limitada","91.881.000-5","2015-10-21","Camino Melipilla Nº 10.340","224408029","","13","94","","Jorge Valencia-Victor Vidal","");
INSERT INTO clientes_listado VALUES("13","1","1","1","claudio.bernal@rhona.cl","Rhona S.A.","92.307.000-1","2015-10-21","Agua Santa Nº 4211","2320600","","5","37","","Claudio Bernal","");
INSERT INTO clientes_listado VALUES("14","1","1","1","francisco.l.a.69@gmail.com","Lafitte Chile y Compañia Limitada","77.633.070-1","2015-10-21","José Miguel Carrera Nº 14B-Complejo Los Libertadores","224600580","","13","76","","Francisco León","");
INSERT INTO clientes_listado VALUES("15","1","1","1","operaciones@maigas.cl","Maigas Comercial S.A.","99.574.340-k","2015-10-21","San Nicolas Nº 1046","224450070","","13","95","","Jorge Contreras","");
INSERT INTO clientes_listado VALUES("16","1","1","1","francisco.l.a.69-@gmail.com","Capsulas metalco Chile Limitada","76.046.942-4","2015-10-21","José Miguel Carrera Nº 14B-Complejo Los Libertadores","224600580","","13","76","","Francisco León","");
INSERT INTO clientes_listado VALUES("17","1","1","1","benjamin.perez@sca.com","SCA Chile S.A.","94.282.000-3","2015-10-21","Panamericana Norte Nº 22.550-Cruce Lo Pinto","2264005294","","13","78","","Benjamin Perez","");
INSERT INTO clientes_listado VALUES("18","1","1","1","imprentamana@gmail.com","Rodrigo Ramirez Comercializadora E.I.R.L.","76.132.176-5","2015-10-21","Pedro de Valdivia Nº 3608","22744913","","13","91","","Patricio Ramirez","");
INSERT INTO clientes_listado VALUES("19","1","1","1","amontecinos@inversionesfarias.cl","Inversiones Farias ","76.093.010-5","2015-10-21","Orlando Varas Nº 263","2465602","","2","7","","Adan Montecinos Silva","");
INSERT INTO clientes_listado VALUES("20","1","1","1","carriagada@corpesca.cl","Corpesca S.A.","96.893.820-7","2015-10-21","Av. Arturo Prat S/N Sitio 32 Barrio Industrial","2512839","","1","2","","Cristian Arriagada Herrera","");
INSERT INTO clientes_listado VALUES("21","1","1","1","gsabhatier@sergas.cl","Luis Jimenez Y Compañia Limitada","79.777.790-0","2015-10-21","Camino Santa Marta Nº 1147","225354270","","13","94","","Gaston Sabathier","");
INSERT INTO clientes_listado VALUES("22","1","1","1","juliovelasquez@graficaandes.cl","Grafica Andes Limitada","88.100.800-9","2015-10-21","Santo Domingo Nº 4593","227733605","","13","81","","Julio Velasquez","");
INSERT INTO clientes_listado VALUES("23","1","1","1","jnunez@bo.cl","BO Packaging Chile S.A.","95.293.000-1","2015-10-21","Americo Vespucio Norte Nº 1470","228292069","","13","79","","Juan Nuñez","");
INSERT INTO clientes_listado VALUES("24","1","1","1","cristian.taipe@camanchaca.cl","Compañia Pesquera Camanchaca S.A.","93.711.000-6","2015-10-21","Recinto Portuario S/N","510840","","1","2","","Cristian Taipe","");
INSERT INTO clientes_listado VALUES("25","1","1","1","anunez@suminet.com","SM-Cyclo de Chile limitada","78.856.680-8","2015-10-21","Lo Echevers Nº 550-Bodega 5-6","228927000","","13","79","","Alexis Nuñez","");
INSERT INTO clientes_listado VALUES("26","1","1","1","salvarez@knop.cl","Knop Laboratorios S.A.","89.688.800-5","2015-10-21","Av. Industrial Nº 1198- Belloto Norte","2945964","","5","38","","Sebastian Alvares","");
INSERT INTO clientes_listado VALUES("27","1","1","1","patricio.callejas@cmda.cl","Minera Don Alberto ","79.721.970-3","2015-10-14","Av.Nueva Tajamar Nº 481- Torre Sur Of. 1903","223334294","","13","72","","Patricio Callejas","");
INSERT INTO clientes_listado VALUES("28","1","1","1","cristobal.palma@quadgraphics.cl","Quad Graphics Chile S.A.","96.830.710-k","2015-10-21","Av. Gladys Marín Nº 6920","224405700","","13","328","","Cristobal Palma","");
INSERT INTO clientes_listado VALUES("29","1","1","1","ngalleg@quiborax.com","Quiborax S.A.","79.639.570-2","2015-10-21","Ruta 5 Norte- km 1.378- Est. Uribe Planta Boratos","2594096","","2","7","","Nicolas Galleguillos","");
INSERT INTO clientes_listado VALUES("30","1","1","1","cbernal@ultraport.cl","Ultraport Mejillones ","88.056.400-5","2015-10-21","Av. Costanera Norte Nº 2.800","2883668","","2","8","","Carlos Bernal Rojas","");
INSERT INTO clientes_listado VALUES("31","1","1","1","trasandino.milton@hotmail.com","Transportes Trasandino S.A.","76.113.874-k","2015-10-21","Alejandro Azolas Nº 3380","","98734645","15","1","","Milton Patiño","");
INSERT INTO clientes_listado VALUES("32","1","1","1","fernando.fritz@triplecinternational.com","Triple C International SPA","76.009.782-9","2015-10-21","Las Tranqueras Nº 117. of 906 B","227554777","57897580","13","71","","Fernando Fritz","");
INSERT INTO clientes_listado VALUES("33","1","1","1","patricio.munoz@sellotek.cl","Sellotek Ingenieria SPA","76.339.348-8","2015-10-21","Fernandon Yungue Nº 1286","225053870","95432537","13","328","","Patricio Muñoz","");
INSERT INTO clientes_listado VALUES("34","1","1","1","juan.droguett@report.cl","Agencia Universales S.A.","96.566.940-k","2015-10-21","Arturo Prat Nª 391- Ed.Empresarial of 154","2584497","91623971","15","1","","Juan Dorguett Osorio","");



DROP TABLE clientes_observaciones;

CREATE TABLE `clientes_observaciones` (
  `idObservacion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Observacion` text NOT NULL,
  PRIMARY KEY (`idObservacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';




DROP TABLE clientes_sexo;

CREATE TABLE `clientes_sexo` (
  `idSexo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `Inicial` char(2) NOT NULL,
  PRIMARY KEY (`idSexo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO clientes_sexo VALUES("1","Masculino","M");
INSERT INTO clientes_sexo VALUES("2","Femenino","F");



DROP TABLE clientes_tipos;

CREATE TABLE `clientes_tipos` (
  `idTipo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO clientes_tipos VALUES("1","Empresa");
INSERT INTO clientes_tipos VALUES("2","Particular(Persona)");



DROP TABLE core_datos;

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

INSERT INTO core_datos VALUES("1","asd@bla21.cl","Corporacion Test","16029464-7","Los Lirios 0936","85125171","Santiago","Puente Alto","http://190.98.210.36/sostaxi/app/","2");



DROP TABLE core_datos_opciones;

CREATE TABLE `core_datos_opciones` (
  `idOpciones` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(80) NOT NULL,
  PRIMARY KEY (`idOpciones`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO core_datos_opciones VALUES("1","Si");
INSERT INTO core_datos_opciones VALUES("2","No");



DROP TABLE core_permisos;

CREATE TABLE `core_permisos` (
  `idAdmpm` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_pmcat` int(11) unsigned NOT NULL,
  `Direccionweb` varchar(50) NOT NULL,
  `Direccionbase` varchar(50) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `visualizacion` int(11) unsigned NOT NULL,
  `Version` decimal(4,2) unsigned NOT NULL,
  PRIMARY KEY (`idAdmpm`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=latin1 COMMENT='Administrador';

INSERT INTO core_permisos VALUES("1","4","admin_datos.php","admin_datos.php","Datos de la Empresa","9998","1.00");
INSERT INTO core_permisos VALUES("2","2","admin_usr.php?pagina=1","admin_usr.php","Usuarios - Listado","9998","1.00");
INSERT INTO core_permisos VALUES("3","2","admin_usr_activation.php?pagina=1","admin_usr_activation.php","Usuarios - Estado","9998","1.00");
INSERT INTO core_permisos VALUES("4","2","admin_usr_password.php?pagina=1","admin_usr_password.php","Usuarios - Contraseña","9998","1.00");
INSERT INTO core_permisos VALUES("5","2","admin_usr_permisos.php?pagina=1","admin_usr_permisos.php","Usuarios - Asignar Permisos","9998","1.00");
INSERT INTO core_permisos VALUES("6","2","admin_usr_type.php?pagina=1","admin_usr_type.php","Usuarios - Cambiar Tipo","9998","1.00");
INSERT INTO core_permisos VALUES("7","4","mnt_ubicacion_comunas.php?pagina=1","mnt_ubicacion_comunas.php","Mantencion - Comunas","9998","1.00");
INSERT INTO core_permisos VALUES("8","4","mnt_ubicacion_region.php?pagina=1","mnt_ubicacion_region.php","Mantencion - Regiones","9998","1.00");
INSERT INTO core_permisos VALUES("9","4","itemizado_familia.php?pagina=1","itemizado_familia.php","Itemizado - Familia","9998","1.00");
INSERT INTO core_permisos VALUES("10","4","itemizado_listado.php?pagina=1","itemizado_listado.php","Itemizado - Listado","9998","1.00");
INSERT INTO core_permisos VALUES("11","4","maquinaria_detalles.php","maquinaria_detalles.php","Maquinaria","9998","1.00");
INSERT INTO core_permisos VALUES("12","6","productos_categorias.php?pagina=1","productos_categorias.php","Productos - Categorias","9998","1.00");
INSERT INTO core_permisos VALUES("54","12","informe_bodega_mat_9.php","informe_bodega_mat_9.php","Bod Mat - Traspaso otras empresas","9998","1.00");
INSERT INTO core_permisos VALUES("14","6","productos_tipo.php?pagina=1","productos_tipo.php","Productos - Tipos","9998","1.00");
INSERT INTO core_permisos VALUES("15","6","productos_uml.php?pagina=1","productos_uml.php","Productos - Unidad de Medida","9998","1.00");
INSERT INTO core_permisos VALUES("16","7","trabajadores_listado.php?pagina=1","trabajadores_listado.php","Trabajadores - Listado","9998","1.00");
INSERT INTO core_permisos VALUES("17","8","ot_crear.php?pagina=1","ot_crear.php","Orden de trabajo - Creacion","9998","1.00");
INSERT INTO core_permisos VALUES("18","8","ot_liberar.php","ot_liberar.php","Orden de trabajo - Pasar OT a Proceso","9998","1.00");
INSERT INTO core_permisos VALUES("19","8","ot_ver.php","ot_ver.php","Orden de trabajo - Listar Ordenes","9998","1.00");
INSERT INTO core_permisos VALUES("20","8","ot_terminar.php?pagina=1","ot_terminar.php","Orden de trabajo - Cerrar Ordenes","9998","1.00");
INSERT INTO core_permisos VALUES("21","9","bodegas_listado.php?pagina=1","bodegas_listado.php","Bodega Mat - Listado","9998","1.00");
INSERT INTO core_permisos VALUES("22","9","bodegas_ingreso.php?pagina=1","bodegas_ingreso.php","Bodega Mat - Ingreso","9998","1.00");
INSERT INTO core_permisos VALUES("23","6","productos_listado.php?pagina=1","productos_listado.php","Productos - Listado","9998","1.00");
INSERT INTO core_permisos VALUES("24","9","bodegas_egreso.php?pagina=1","bodegas_egreso.php","Bodega Mat - Egreso","9998","1.00");
INSERT INTO core_permisos VALUES("25","9","bodegas_gasto.php?pagina=1","bodegas_gasto.php","Bodega Mat - Gastos","9998","1.00");
INSERT INTO core_permisos VALUES("26","9","bodegas_traspaso.php?pagina=1","bodegas_traspaso.php","Bodega Mat - Traspaso de materiales","9998","1.00");
INSERT INTO core_permisos VALUES("27","6","productos_recetas.php?pagina=1","productos_recetas.php","Productos - Recetas","9998","1.00");
INSERT INTO core_permisos VALUES("28","9","bodegas_transformacion.php?pagina=1","bodegas_transformacion.php","Productos Mat - Transformacion","9998","1.00");
INSERT INTO core_permisos VALUES("29","9","bodegas_stock.php?pagina=1","bodegas_stock.php","Bodega Mat - Stock","9998","1.00");
INSERT INTO core_permisos VALUES("30","9","bodegas_traspaso_empresa.php?pagina=1","bodegas_traspaso_empresa.php","Bodega Mat - Traspaso otras empresas","9998","1.00");
INSERT INTO core_permisos VALUES("31","9","bodegas_egreso_ot.php?pagina=1","bodegas_egreso_ot.php","Bodega Mat - Egreso por OT","9998","1.00");
INSERT INTO core_permisos VALUES("32","10","activos_categorias.php?pagina=1","activos_categorias.php","Insumos - Categorias","9998","1.00");
INSERT INTO core_permisos VALUES("33","10","activos_listado.php?pagina=1","activos_listado.php","Insumos - Listado","9998","1.00");
INSERT INTO core_permisos VALUES("34","10","activos_uml.php?pagina=1","activos_uml.php","Insumos - Unidad de Medida","9998","1.00");
INSERT INTO core_permisos VALUES("35","11","bodegas_activos_egreso.php?pagina=1","bodegas_activos_egreso.php","Bodegas Insumos - Egreso","9998","1.00");
INSERT INTO core_permisos VALUES("36","11","bodegas_activos_ingreso.php?pagina=1","bodegas_activos_ingreso.php","Bodegas Insumos - Ingreso","9998","1.00");
INSERT INTO core_permisos VALUES("37","11","bodegas_activos_listado.php?pagina=1","bodegas_activos_listado.php","Bodegas Insumos - Listado","9998","1.00");
INSERT INTO core_permisos VALUES("38","11","bodegas_activos_stock.php?pagina=1","bodegas_activos_stock.php","Bodegas Insumos - Stock","9998","1.00");
INSERT INTO core_permisos VALUES("39","11","bodegas_activos_traspaso.php?pagina=1","bodegas_activos_traspaso.php","Bodegas Insumos - Traspaso","9998","1.00");
INSERT INTO core_permisos VALUES("40","11","bodegas_activos_traspaso_empresa.php?pagina=1","bodegas_activos_traspaso_empresa.php","Bodegas Insumos - Traspaso otra Empresa","9998","1.00");
INSERT INTO core_permisos VALUES("41","1","admin_clientes.php?pagina=1","admin_clientes.php","Clientes - Listado","9998","1.00");
INSERT INTO core_permisos VALUES("42","1","admin_clientes_activation.php?pagina=1","admin_clientes_activation.php","Clientes - Estado","9998","1.00");
INSERT INTO core_permisos VALUES("43","5","admin_proveedor.php?pagina=1","admin_proveedor.php","Proveedor - Listado","9998","1.00");
INSERT INTO core_permisos VALUES("44","5","admin_proveedor_activation.php?pagina=1","admin_proveedor_activation.php","Proveedor - Estado","9998","1.00");
INSERT INTO core_permisos VALUES("45","3","analisis_aceite.php?pagina=1","analisis_aceite.php","Analisis Aceite","9998","1.00");
INSERT INTO core_permisos VALUES("46","12","informe_bodega_mat_1.php","informe_bodega_mat_1.php","Bod Mat - Ingresos y egresos por fechas","9998","1.00");
INSERT INTO core_permisos VALUES("47","12","informe_bodega_mat_2.php","informe_bodega_mat_2.php","Bod Mat - Ingresos y egresos por mes","9998","1.00");
INSERT INTO core_permisos VALUES("48","12","informe_bodega_mat_3.php","informe_bodega_mat_3.php","Bod Mat - Stock","9998","1.00");
INSERT INTO core_permisos VALUES("49","12","informe_bodega_mat_4.php","informe_bodega_mat_4.php","Bod Mat - Stock Critico","9998","1.00");
INSERT INTO core_permisos VALUES("50","12","informe_bodega_mat_5.php","informe_bodega_mat_5.php","Bod Mat - Movi Proveedor por fechas","9998","1.00");
INSERT INTO core_permisos VALUES("51","12","informe_bodega_mat_6.php","informe_bodega_mat_6.php","Bod Mat - Movi Proveedor por mes","9998","1.00");
INSERT INTO core_permisos VALUES("52","12","informe_bodega_mat_7.php","informe_bodega_mat_7.php","Bod Mat - Movimientos Cliente por fechas","9998","1.00");
INSERT INTO core_permisos VALUES("53","12","informe_bodega_mat_8.php","informe_bodega_mat_8.php","Bod Mat - Movimientos Cliente por mes","9998","1.00");
INSERT INTO core_permisos VALUES("55","13","informe_bodega_act_1.php","informe_bodega_act_1.php","Bod Ins - Ingresos y egresos por fechas","9998","1.00");
INSERT INTO core_permisos VALUES("56","13","informe_bodega_act_2.php","informe_bodega_act_2.php","Bod Ins - Ingresos y egresos por mes","9998","1.00");
INSERT INTO core_permisos VALUES("57","13","informe_bodega_act_3.php","informe_bodega_act_3.php","Bod Ins - Stock","9998","1.00");
INSERT INTO core_permisos VALUES("58","13","informe_bodega_act_4.php","informe_bodega_act_4.php","Bod Ins - Stock Critico","9998","1.00");
INSERT INTO core_permisos VALUES("59","13","informe_bodega_act_5.php","informe_bodega_act_5.php","Bod Ins - Movi Proveedor por fechas","9998","1.00");
INSERT INTO core_permisos VALUES("60","13","informe_bodega_act_6.php","informe_bodega_act_6.php","Bod Ins - Movi Proveedor por mes","9998","1.00");
INSERT INTO core_permisos VALUES("61","13","informe_bodega_act_7.php","informe_bodega_act_7.php","Bod Ins - Movimientos Trabajador por fechas","9998","1.00");
INSERT INTO core_permisos VALUES("62","13","informe_bodega_act_8.php","informe_bodega_act_8.php","Bod Ins - Movimientos Trabajador por mes","9998","1.00");
INSERT INTO core_permisos VALUES("63","13","informe_bodega_act_9.php","informe_bodega_act_9.php","Bod Ins - Traspaso otras empresas","9998","1.00");
INSERT INTO core_permisos VALUES("64","14","notificaciones_listado.php?pagina=1","notificaciones_listado.php","Notificacion Masiva","9998","1.00");
INSERT INTO core_permisos VALUES("65","14","notificaciones_usuario.php?pagina=1","notificaciones_usuario.php","Notificacion por usuario","9998","1.00");
INSERT INTO core_permisos VALUES("66","14","notificaciones_filtro.php?pagina=1","notificaciones_filtro.php","Notificacion con filtro","9998","1.00");
INSERT INTO core_permisos VALUES("67","15","ayuda_listado.php?pagina=1","ayuda_listado.php","Archivos de ayuda","9998","1.00");
INSERT INTO core_permisos VALUES("68","15","procedimientos_categorias.php?pagina=1","procedimientos_categorias.php","Procedimientos - Categorias","9998","1.00");
INSERT INTO core_permisos VALUES("69","15","procedimientos_listado.php?pagina=1","procedimientos_listado.php","Procedimientos - Listado","9998","1.00");
INSERT INTO core_permisos VALUES("70","14","agenda_telefonica.php?pagina=1","agenda_telefonica.php","Agenda Telefonica","9998","1.00");
INSERT INTO core_permisos VALUES("71","17","informe_productos_1.php","informe_productos_1.php","Variacion de precios por fecha","9998","1.00");
INSERT INTO core_permisos VALUES("72","17","informe_productos_2.php","informe_productos_2.php","Variacion de precios por mes","9998","1.00");
INSERT INTO core_permisos VALUES("73","4","mnt_base.php?pagina=1","mnt_base.php","Respaldar base","9998","1.00");



DROP TABLE core_permisos_cat;

CREATE TABLE `core_permisos_cat` (
  `id_pmcat` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(60) NOT NULL,
  `idFont` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_pmcat`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COMMENT='Administrador';

INSERT INTO core_permisos_cat VALUES("1","Clientes","131");
INSERT INTO core_permisos_cat VALUES("2","Usuarios","108");
INSERT INTO core_permisos_cat VALUES("3","Analisis","129");
INSERT INTO core_permisos_cat VALUES("4","Mantencion","128");
INSERT INTO core_permisos_cat VALUES("5","Proveedores","27");
INSERT INTO core_permisos_cat VALUES("6","Productos","133");
INSERT INTO core_permisos_cat VALUES("7","Trabajadores","102");
INSERT INTO core_permisos_cat VALUES("8","Orden de trabajo","132");
INSERT INTO core_permisos_cat VALUES("9","Bodegas Materiales","94");
INSERT INTO core_permisos_cat VALUES("10","Insumos","130");
INSERT INTO core_permisos_cat VALUES("11","Bodegas Insumos","94");
INSERT INTO core_permisos_cat VALUES("12","Informes Bodega Mat","52");
INSERT INTO core_permisos_cat VALUES("13","Informes Bodega Ins","54");
INSERT INTO core_permisos_cat VALUES("14","Comunicaciones Internas","83");
INSERT INTO core_permisos_cat VALUES("15","Documentacion","41");
INSERT INTO core_permisos_cat VALUES("16","Procedimientos","29");
INSERT INTO core_permisos_cat VALUES("17","Informes Productos","133");



DROP TABLE core_sistemas;

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='Administrador';

INSERT INTO core_sistemas VALUES("1","Simyl","","simyl@simyl.cl","96958770-k","Santa Corina 0473","","Santiago","La cisterna","2","","www.simyl.cl","Servicios integrales de mantenimiento","","","","0000-00-00","0","0","2");
INSERT INTO core_sistemas VALUES("2","MM Packaging Marinetti Limitada","","guillermo.baez@mm-marinetti.com","76.105.584-4","Avenida Americo Vespucio Norte 1751","223648997","Santiago","Renca","1","24844848","www.marinetti.com","Imprenta y Packaging","Guillermo Baez","Plan de Lubricacion TFM ","","2015-08-01","24","3","2");
INSERT INTO core_sistemas VALUES("3","ACRUS-CCL LABELS S.A.","","cmunoz@acrus-ccl.com","76.189.191-K","Panamericana Norte N° 5369","","Santiago","Conchali","39","","","Etiquetas","Juan Muñoz","Plan de Lubricacion TFM ","www2112","2013-10-01","48","2","2");
INSERT INTO core_sistemas VALUES("4","Empresa Aguas Andinas Camiones","","","16029464-7","asd","","asd","asd","1","","","","","","","0000-00-00","0","0","2");
INSERT INTO core_sistemas VALUES("5","Metro SA","","","8247656-3","asd","","asd","asd","1","","","","","","","0000-00-00","0","0","2");
INSERT INTO core_sistemas VALUES("6","Contrato ENAP Planta Maipu","","","","","","","","1","","","","","","","0000-00-00","0","0","2");
INSERT INTO core_sistemas VALUES("7","Contrato ENAP Planta Linares","","","","","","","","1","","","","","","","0000-00-00","0","0","2");
INSERT INTO core_sistemas VALUES("8","Contrato ENAP Planta San Fernando","","","","","","","","1","","","","","","","0000-00-00","0","0","2");
INSERT INTO core_sistemas VALUES("9","Contrato ENAP Planta de envasado Linares","","","","","","","","1","","","","","","","0000-00-00","0","0","2");
INSERT INTO core_sistemas VALUES("10"," Contrato ENAP Planta de envasado San Fernando ","","","","","","","","1","","","","","","","0000-00-00","0","0","2");



DROP TABLE core_sistemas_rubro;

CREATE TABLE `core_sistemas_rubro` (
  `idRubro` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idRubro`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Administrador';

INSERT INTO core_sistemas_rubro VALUES("1","Todos");
INSERT INTO core_sistemas_rubro VALUES("2","Lubricacion");
INSERT INTO core_sistemas_rubro VALUES("3","Agua");
INSERT INTO core_sistemas_rubro VALUES("4","Servicios");
INSERT INTO core_sistemas_rubro VALUES("5","Otro2");



DROP TABLE core_theme_colors;

CREATE TABLE `core_theme_colors` (
  `idTheme` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTheme`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COMMENT='Fija';

INSERT INTO core_theme_colors VALUES("1","Black - Default");
INSERT INTO core_theme_colors VALUES("2","Black - Gedit");
INSERT INTO core_theme_colors VALUES("3","Black - Olive");
INSERT INTO core_theme_colors VALUES("4","Black - Deep Sky");
INSERT INTO core_theme_colors VALUES("5","Black - Chrome");
INSERT INTO core_theme_colors VALUES("6","Black - Brune");
INSERT INTO core_theme_colors VALUES("7","Black - Human");
INSERT INTO core_theme_colors VALUES("8","Black - Mint dark 1");
INSERT INTO core_theme_colors VALUES("9","Black - Mint dark 2");
INSERT INTO core_theme_colors VALUES("10","Black - Shoot 1");
INSERT INTO core_theme_colors VALUES("11","Black - Shoot 2");
INSERT INTO core_theme_colors VALUES("12","Silver - Default");
INSERT INTO core_theme_colors VALUES("13","Silver - Gedit");
INSERT INTO core_theme_colors VALUES("14","Silver - Olive");
INSERT INTO core_theme_colors VALUES("15","Silver - Deep Sky");
INSERT INTO core_theme_colors VALUES("16","Silver - Chrome");
INSERT INTO core_theme_colors VALUES("17","Silver - Brune");
INSERT INTO core_theme_colors VALUES("18","Silver - Human");
INSERT INTO core_theme_colors VALUES("19","Silver - Mint dark 1");
INSERT INTO core_theme_colors VALUES("20","Silver - Mint dark 2");
INSERT INTO core_theme_colors VALUES("21","Silver - Shoot 1");
INSERT INTO core_theme_colors VALUES("22","Silver - Shoot 2");
INSERT INTO core_theme_colors VALUES("23","Clearlooks - Default");
INSERT INTO core_theme_colors VALUES("24","Clearlooks - Gedit");
INSERT INTO core_theme_colors VALUES("25","Clearlooks - Olive");
INSERT INTO core_theme_colors VALUES("26","Clearlooks - Deep Sky");
INSERT INTO core_theme_colors VALUES("27","Clearlooks - Chrome");
INSERT INTO core_theme_colors VALUES("28","Clearlooks - Brune");
INSERT INTO core_theme_colors VALUES("29","Clearlooks - Human");
INSERT INTO core_theme_colors VALUES("30","Clearlooks - Mint dark 1");
INSERT INTO core_theme_colors VALUES("31","Clearlooks - Mint dark 2");
INSERT INTO core_theme_colors VALUES("32","Clearlooks - Shoot 1");
INSERT INTO core_theme_colors VALUES("33","Clearlooks - Shoot 1");
INSERT INTO core_theme_colors VALUES("34","NeoXP - Default");
INSERT INTO core_theme_colors VALUES("35","NeoXP - Gedit");
INSERT INTO core_theme_colors VALUES("36","NeoXP - Olive");
INSERT INTO core_theme_colors VALUES("37","NeoXP - Deep Sky");
INSERT INTO core_theme_colors VALUES("38","NeoXP - Chrome");
INSERT INTO core_theme_colors VALUES("39","NeoXP - Brune");
INSERT INTO core_theme_colors VALUES("40","NeoXP - Human");
INSERT INTO core_theme_colors VALUES("41","NeoXP - Mint dark 1");
INSERT INTO core_theme_colors VALUES("42","NeoXP - Mint dark 2");
INSERT INTO core_theme_colors VALUES("43","NeoXP - Shoot 1");
INSERT INTO core_theme_colors VALUES("44","NeoXP - Shoot 1");



DROP TABLE detalle_general;

CREATE TABLE `detalle_general` (
  `id_Detalle` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Tipo` smallint(5) NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`id_Detalle`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

INSERT INTO detalle_general VALUES("1","1","Activo");
INSERT INTO detalle_general VALUES("2","1","Inactivo");
INSERT INTO detalle_general VALUES("3","2","Interno");
INSERT INTO detalle_general VALUES("4","2","Externo");
INSERT INTO detalle_general VALUES("5","3","Abierta");
INSERT INTO detalle_general VALUES("6","3","Cerrada");
INSERT INTO detalle_general VALUES("7","4","No Leida");
INSERT INTO detalle_general VALUES("8","4","Leido");
INSERT INTO detalle_general VALUES("9","5","Asistido");
INSERT INTO detalle_general VALUES("10","5","No Asistido");
INSERT INTO detalle_general VALUES("11","6","Padres");
INSERT INTO detalle_general VALUES("12","6","Hermanos");
INSERT INTO detalle_general VALUES("13","6","Conyugue");
INSERT INTO detalle_general VALUES("14","6","Hijos");
INSERT INTO detalle_general VALUES("15","6","Nietos");
INSERT INTO detalle_general VALUES("16","6","Abuelos");
INSERT INTO detalle_general VALUES("17","7","Normal");
INSERT INTO detalle_general VALUES("18","8","Informacion");
INSERT INTO detalle_general VALUES("19","8","Mensaje");
INSERT INTO detalle_general VALUES("20","8","Oferta");
INSERT INTO detalle_general VALUES("21","1","Bloqueado");
INSERT INTO detalle_general VALUES("22","9","Alto contenedor");
INSERT INTO detalle_general VALUES("23","9","Ancho contenedor");
INSERT INTO detalle_general VALUES("24","9","Ancho imagen");
INSERT INTO detalle_general VALUES("25","9","Tipo borde");
INSERT INTO detalle_general VALUES("26","9","Border Radius");
INSERT INTO detalle_general VALUES("27","9","Boton color");
INSERT INTO detalle_general VALUES("28","9","Bg color");
INSERT INTO detalle_general VALUES("29","9","text color");
INSERT INTO detalle_general VALUES("34","9","Hover notificaciones");
INSERT INTO detalle_general VALUES("30","9","text size");
INSERT INTO detalle_general VALUES("31","9","shadow");
INSERT INTO detalle_general VALUES("32","9","Degradado");
INSERT INTO detalle_general VALUES("33","9","Separador");
INSERT INTO detalle_general VALUES("35","9","Checked notificaciones");
INSERT INTO detalle_general VALUES("36","10","No visto");
INSERT INTO detalle_general VALUES("37","10","Visto");
INSERT INTO detalle_general VALUES("38","11","Taxi Solicitado");
INSERT INTO detalle_general VALUES("39","11","Pasajero Inexistente");
INSERT INTO detalle_general VALUES("40","11","Rechazado por cliente");
INSERT INTO detalle_general VALUES("41","11","Carrera aceptada");
INSERT INTO detalle_general VALUES("42","11","Cancelado por tiempo");
INSERT INTO detalle_general VALUES("43","11","Pasajero tomado");
INSERT INTO detalle_general VALUES("44","11","Carrera Finalizada");
INSERT INTO detalle_general VALUES("45","12","Taxi Libre");
INSERT INTO detalle_general VALUES("46","12","Taxi Ocupado");
INSERT INTO detalle_general VALUES("47","999","Notificacion");



DROP TABLE font_awesome;

CREATE TABLE `font_awesome` (
  `idFont` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `Codigo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idFont`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO font_awesome VALUES("1","Manos - piedra","fa fa-hand-rock-o");
INSERT INTO font_awesome VALUES("2","Manos - lizard","fa fa-hand-lizard-o");
INSERT INTO font_awesome VALUES("3","Manos - apuntando abajo","fa fa-hand-o-down");
INSERT INTO font_awesome VALUES("4","Manos - apuntando izquierda","fa fa-hand-o-left");
INSERT INTO font_awesome VALUES("5","Manos - apuntando derecha","fa fa-hand-o-right");
INSERT INTO font_awesome VALUES("6","Manos - apuntando arriba","fa fa-hand-o-up");
INSERT INTO font_awesome VALUES("7","Manos - papel","fa fa-hand-paper-o");
INSERT INTO font_awesome VALUES("8","Manos - paz","fa fa-hand-peace-o");
INSERT INTO font_awesome VALUES("9","Manos - apuntar","fa fa-hand-pointer-o");
INSERT INTO font_awesome VALUES("10","Varios - Calculadora","fa fa-calculator");
INSERT INTO font_awesome VALUES("11","Manos - tijeras","fa fa-hand-scissors-o");
INSERT INTO font_awesome VALUES("12","Manos - saludo spock","fa fa-hand-spock-o");
INSERT INTO font_awesome VALUES("13","Manos - desaprobar ver 1","fa fa-thumbs-down");
INSERT INTO font_awesome VALUES("14","Manos - desaprobar ver 2","fa fa-thumbs-o-down");
INSERT INTO font_awesome VALUES("15","Manos - aprobar ver 1","fa fa-thumbs-o-up");
INSERT INTO font_awesome VALUES("16","Manos - aprobar ver 2","fa fa-thumbs-up");
INSERT INTO font_awesome VALUES("17","Transporte - Ambulancia","fa fa-ambulance");
INSERT INTO font_awesome VALUES("18","Transporte - Bicicleta","fa fa-bicycle");
INSERT INTO font_awesome VALUES("19","Transporte - Bus","fa fa-bus");
INSERT INTO font_awesome VALUES("20","Transporte - Auto","fa fa-car");
INSERT INTO font_awesome VALUES("21","Transporte - Motocicleta","fa fa-motorcycle");
INSERT INTO font_awesome VALUES("22","Transporte - Avion","fa fa-plane");
INSERT INTO font_awesome VALUES("23","Transporte - Barco","fa fa-ship");
INSERT INTO font_awesome VALUES("24","Transporte - Metro","fa fa-subway");
INSERT INTO font_awesome VALUES("25","Transporte - Taxi","fa fa-taxi");
INSERT INTO font_awesome VALUES("26","Transporte - Tren","fa fa-train");
INSERT INTO font_awesome VALUES("27","Transporte - Camion","fa fa-truck");
INSERT INTO font_awesome VALUES("28","Transporte - Silla de ruedas","fa fa-wheelchair");
INSERT INTO font_awesome VALUES("29","Archivos - Archivo","fa fa-file");
INSERT INTO font_awesome VALUES("30","Archivos - Comprimido","fa fa-file-archive-o");
INSERT INTO font_awesome VALUES("31","Archivos - Audio","fa fa-file-audio-o");
INSERT INTO font_awesome VALUES("32","Archivos - Codigo","fa fa-file-code-o");
INSERT INTO font_awesome VALUES("33","Archivos - Excel","fa fa-file-excel-o");
INSERT INTO font_awesome VALUES("34","Archivos - Imagen","fa fa-file-image-o");
INSERT INTO font_awesome VALUES("35","Archivos - Archivo version 2","fa fa-file-o");
INSERT INTO font_awesome VALUES("36","Archivos - PDF","fa fa-file-pdf-o");
INSERT INTO font_awesome VALUES("37","Archivos - Power Point","fa fa-file-powerpoint-o");
INSERT INTO font_awesome VALUES("38","Archivos - Texto","fa fa-file-text");
INSERT INTO font_awesome VALUES("39","Archivos - Texto version 2","fa fa-file-text-o");
INSERT INTO font_awesome VALUES("40","Archivos - Video","fa fa-file-video-o");
INSERT INTO font_awesome VALUES("41","Archivos - Word","fa fa-file-word-o");
INSERT INTO font_awesome VALUES("42","Formularios - check-square","fa fa-check-square");
INSERT INTO font_awesome VALUES("43","Formularios - check-square 2","fa fa-check-square-o");
INSERT INTO font_awesome VALUES("44","Formularios - circle","fa fa-circle");
INSERT INTO font_awesome VALUES("45","Formularios - circle 2","fa fa-circle-o");
INSERT INTO font_awesome VALUES("46","Formularios - dot-circle","fa fa-dot-circle-o");
INSERT INTO font_awesome VALUES("47","Formularios - minus-square","fa fa-minus-square");
INSERT INTO font_awesome VALUES("48","Formularios - minus-square 2","fa fa-minus-square-o");
INSERT INTO font_awesome VALUES("49","Formularios - plus-square","fa fa-plus-square");
INSERT INTO font_awesome VALUES("50","Formularios - plus-square2","fa fa-plus-square-o");
INSERT INTO font_awesome VALUES("51","Formularios - square","fa fa-square");
INSERT INTO font_awesome VALUES("52","Graficos - Linea","fa fa-line-chart");
INSERT INTO font_awesome VALUES("53","Graficos - Torta","fa fa-pie-chart");
INSERT INTO font_awesome VALUES("54","Graficos - Area","fa fa-area-chart");
INSERT INTO font_awesome VALUES("55","Graficos - Barras","fa fa-bar-chart");
INSERT INTO font_awesome VALUES("56","Dinero - Dolar","fa fa-usd");
INSERT INTO font_awesome VALUES("57","Dinero - Euro","fa fa-eur");
INSERT INTO font_awesome VALUES("58","Dinero - Yen","fa fa-jpy");
INSERT INTO font_awesome VALUES("59","Editor Texto - Alineamiento Centro","fa fa-align-center");
INSERT INTO font_awesome VALUES("60","Editor Texto - Alineamiento Justificado","fa fa-align-justify");
INSERT INTO font_awesome VALUES("61","Editor Texto - Alineamiento Izquierda","fa fa-align-left");
INSERT INTO font_awesome VALUES("62","Editor Texto - Alineamiento Derecha","fa fa-align-right");
INSERT INTO font_awesome VALUES("63","Editor Texto - Negrita","fa fa-bold");
INSERT INTO font_awesome VALUES("64","Editor Texto - Enlace","fa fa-link");
INSERT INTO font_awesome VALUES("65","Editor Texto - Enlace Roto","fa fa-chain-broken");
INSERT INTO font_awesome VALUES("66","Editor Texto - Columnas","fa fa-columns");
INSERT INTO font_awesome VALUES("67","Editor Texto - Italica","fa fa-italic");
INSERT INTO font_awesome VALUES("68","Editor Texto - Cortar","fa fa-scissors");
INSERT INTO font_awesome VALUES("69","Editor Texto - Lista","fa fa-list");
INSERT INTO font_awesome VALUES("70","Editor Texto - Lista Alternativa","fa fa-list-alt");
INSERT INTO font_awesome VALUES("71","Editor Texto - Lista 2","fa fa-list-ol");
INSERT INTO font_awesome VALUES("72","Editor Texto - Repetir","fa fa-repeat");
INSERT INTO font_awesome VALUES("73","Editor Texto - Deshacer","fa fa-undo");
INSERT INTO font_awesome VALUES("74","Editor Texto - Guardar","fa fa-floppy-o");
INSERT INTO font_awesome VALUES("75","Editor Texto - Tabla","fa fa-table");
INSERT INTO font_awesome VALUES("76","Internet - Nube","fa fa-cloud");
INSERT INTO font_awesome VALUES("77","Internet - Nube descargar","fa fa-cloud-download");
INSERT INTO font_awesome VALUES("78","Internet - Nube subir","fa fa-cloud-upload");
INSERT INTO font_awesome VALUES("79","Internet - Internet Explorer","fa fa-internet-explorer");
INSERT INTO font_awesome VALUES("80","Internet - Firefox","fa fa-firefox");
INSERT INTO font_awesome VALUES("81","Internet - Facebook","fa fa-facebook");
INSERT INTO font_awesome VALUES("82","Internet - Youtube","fa fa-youtube");
INSERT INTO font_awesome VALUES("83","Internet - Whatsapp","fa fa-whatsapp");
INSERT INTO font_awesome VALUES("84","Calendario - Normal","fa fa-calendar");
INSERT INTO font_awesome VALUES("85","Calendario - Check","fa fa-calendar-check-o");
INSERT INTO font_awesome VALUES("86","Calendario - Menos","fa fa-calendar-minus-o");
INSERT INTO font_awesome VALUES("87","Calendario - Vacio","fa fa-calendar-o");
INSERT INTO font_awesome VALUES("88","Calendario - Mas","fa fa-calendar-plus-o");
INSERT INTO font_awesome VALUES("89","Calendario - Cancelado","fa fa-calendar-times-o");
INSERT INTO font_awesome VALUES("90","Varios - Camara","fa fa-camera");
INSERT INTO font_awesome VALUES("91","Varios - Correo","fa fa-envelope");
INSERT INTO font_awesome VALUES("92","Varios - Correo 2","fa fa-envelope-o");
INSERT INTO font_awesome VALUES("93","Varios - Descargar","fa fa-download");
INSERT INTO font_awesome VALUES("94","Varios - Base de Datos","fa fa-database");
INSERT INTO font_awesome VALUES("95","Varios - Cafe","fa fa-coffee");
INSERT INTO font_awesome VALUES("96","Varios - Engranaje","fa fa-cog");
INSERT INTO font_awesome VALUES("97","Varios - Engranajes","fa fa-cogs");
INSERT INTO font_awesome VALUES("98","Varios - Fax","fa fa-fax");
INSERT INTO font_awesome VALUES("99","Varios - Ojo","fa fa-eye");
INSERT INTO font_awesome VALUES("100","Varios - RSS","fa fa-rss");
INSERT INTO font_awesome VALUES("101","Varios - Mujer","fa fa-female");
INSERT INTO font_awesome VALUES("102","Varios - Hombre","fa fa-male");
INSERT INTO font_awesome VALUES("103","Varios - Fuego","fa fa-fire");
INSERT INTO font_awesome VALUES("104","Varios - Estintor de fuego","fa fa-fire-extinguisher");
INSERT INTO font_awesome VALUES("105","Varios - Bandera","fa fa-flag");
INSERT INTO font_awesome VALUES("106","Varios - Mundo","fa fa-globe");
INSERT INTO font_awesome VALUES("107","Varios - Graduacion","fa fa-graduation-cap");
INSERT INTO font_awesome VALUES("108","Varios - Usuarios","fa fa-users");
INSERT INTO font_awesome VALUES("109","Varios - Informacion","fa fa-info");
INSERT INTO font_awesome VALUES("110","Varios - Universidad","fa fa-university");
INSERT INTO font_awesome VALUES("111","Varios - Llave","fa fa-key");
INSERT INTO font_awesome VALUES("112","Varios - Portatil","fa fa-laptop");
INSERT INTO font_awesome VALUES("113","Varios - Mapa","fa fa-map");
INSERT INTO font_awesome VALUES("114","Varios - Marcador mapa","fa fa-map-marker");
INSERT INTO font_awesome VALUES("115","Varios - Mapa 2","fa fa-map-o");
INSERT INTO font_awesome VALUES("116","Varios - Musica","fa fa-music");
INSERT INTO font_awesome VALUES("117","Varios - Diario","fa fa-newspaper-o");
INSERT INTO font_awesome VALUES("118","Varios - Telefono","fa fa-phone");
INSERT INTO font_awesome VALUES("119","Varios - Impresora","fa fa-print");
INSERT INTO font_awesome VALUES("120","Varios - Apagar","fa fa-power-off");
INSERT INTO font_awesome VALUES("121","Varios - Carro de Compras","fa fa-shopping-cart");
INSERT INTO font_awesome VALUES("122","Varios - Mapa del sitio","fa fa-sitemap");
INSERT INTO font_awesome VALUES("123","Varios - Abrir","fa fa-unlock-alt");
INSERT INTO font_awesome VALUES("124","Varios - Cerrar","fa fa-lock");
INSERT INTO font_awesome VALUES("125","Varios - Usuario","fa fa-user");
INSERT INTO font_awesome VALUES("126","Varios - Agregar usuario","fa fa-user-plus");
INSERT INTO font_awesome VALUES("127","Varios - Eliminar usuario","fa fa-user-times");
INSERT INTO font_awesome VALUES("128","Varios - Herramienta","fa fa-wrench");
INSERT INTO font_awesome VALUES("129","Varios - Lupa","fa fa-search");
INSERT INTO font_awesome VALUES("130","Varios - Cajas","fa fa-cubes");
INSERT INTO font_awesome VALUES("131","Varios - Persona","fa fa-user-secret");
INSERT INTO font_awesome VALUES("132","Varios - Intercambio","fa fa-exchange");
INSERT INTO font_awesome VALUES("133","Varios - Caja","fa fa-cube");



DROP TABLE itemizado_familia;

CREATE TABLE `itemizado_familia` (
  `idItemFamilia` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Abreviatura` varchar(30) NOT NULL,
  PRIMARY KEY (`idItemFamilia`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO itemizado_familia VALUES("1","3","Sistemas de Lubricacion Centralizados","1.1");
INSERT INTO itemizado_familia VALUES("2","3","Sistemas Hidraulicos","1.2");
INSERT INTO itemizado_familia VALUES("3","3","Reductores","1.3");
INSERT INTO itemizado_familia VALUES("4","3","Grupo Impresores","1.4");
INSERT INTO itemizado_familia VALUES("5","3","Entrada de Maquina","1.5");
INSERT INTO itemizado_familia VALUES("6","3","Salida de Maquina","1.6");
INSERT INTO itemizado_familia VALUES("7","3","Unidad Rhino","1.7");
INSERT INTO itemizado_familia VALUES("8","3","Equipos Perifericos","1.8");
INSERT INTO itemizado_familia VALUES("9","3","Limpieza y Ordenamiento de Areas","1.9");
INSERT INTO itemizado_familia VALUES("10","3","Marcador","1.10");
INSERT INTO itemizado_familia VALUES("11","3","Unidades Offset","1.11");
INSERT INTO itemizado_familia VALUES("12","3","Unidades Troquelado","1.12");
INSERT INTO itemizado_familia VALUES("13","3","Grupo Barnizador","1.13");
INSERT INTO itemizado_familia VALUES("14","3","Cuerpo Principal","1.14");
INSERT INTO itemizado_familia VALUES("15","3","Cajas de Engranajes","1.15");
INSERT INTO itemizado_familia VALUES("16","3","Prensa de Platina","1.16");
INSERT INTO itemizado_familia VALUES("17","3","Mantenimiento FRL","1.17");



DROP TABLE itemizado_listado;

CREATE TABLE `itemizado_listado` (
  `idItemList` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `idItemFamilia` int(11) unsigned NOT NULL,
  `Abreviatura` varchar(10) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Valor` decimal(11,0) NOT NULL,
  `h_Programada` time NOT NULL,
  `idTrabajo` int(11) unsigned NOT NULL,
  UNIQUE KEY `idPuntos` (`idItemList`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO itemizado_listado VALUES("1","3","1","1.1.1","Revision de niveles aceite","0","00:05:00","2");
INSERT INTO itemizado_listado VALUES("2","3","1","1.1.2","Cambios de Aceite","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("3","3","1","1.1.3","Relleno de Aceite","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("4","3","1","1.1.4","Revision de niveles de Grasa","0","00:05:00","4");
INSERT INTO itemizado_listado VALUES("5","3","1","1.1.5","Cambios de Grasa","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("6","3","1","1.1.6","Rellenos de Grasa","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("7","3","2","1.2.1","Revision de niveles aceite","0","00:05:00","2");
INSERT INTO itemizado_listado VALUES("8","3","2","1.2.2","Cambios de Aceite","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("9","3","2","1.2.3","Relleno de Aceite","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("10","3","3","1.3.1","Revision de niveles aceite","0","00:05:00","2");
INSERT INTO itemizado_listado VALUES("11","3","3","1.3.2","Cambios de Aceite","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("12","3","3","1.3.3","Relleno de Aceite","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("13","3","4","1.4.1","Engrase de Puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("14","3","4","1.4.2","Aceitado de Puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("15","3","5","1.5.1","Engrase de Puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("16","3","5","1.5.2","Aceitado de Puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("17","3","6","1.6.1","Engrase de Puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("18","3","6","1.6.2","Aceitado de Puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("19","3","7","1.7.1","Engrase de Puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("20","3","7","1.7.2","Limpieza Interior","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("21","3","8","1.8.1","Engrase de Puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("22","3","8","1.8.2","Revision Filtros de Aire","0","00:05:00","4");
INSERT INTO itemizado_listado VALUES("23","3","8","1.8.3","Cambio Filtros de Aire","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("24","3","8","1.8.4","Limpieza Filtros de Aire","0","00:05:00","4");
INSERT INTO itemizado_listado VALUES("25","3","9","1.9.1","Limpieza Interior Maquina","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("26","3","9","1.9.2","Limpieza Exterior Maquina","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("27","3","9","1.9.3","Limpieza Pisos Perimetros Maquina","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("28","3","10","1.10.1","Aceitado de puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("29","3","10","1.10.3","Limpieza General","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("30","3","11","1.11.1","Engrase de puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("31","3","11","1.11.2","Aceitado de puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("32","3","12","1.12.1","Engrase de puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("33","3","12","1.12.2","Aceitado de puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("34","3","13","1.13.1","Engrase de puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("35","3","13","1.13.2","Aceitado de puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("36","3","6","1.6.3","Limpieza Sistema de Pinzas","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("37","3","6","1.6.4","Limpieza Filtros de Aire","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("38","3","14","1.14.1","Engrase de puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("39","3","14","1.14.2","Aceitado de puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("40","3","15","1.15.1","Revision de niveles aceite","0","00:05:00","2");
INSERT INTO itemizado_listado VALUES("41","3","15","1.15.2","Cambios de Aceite","0","00:30:00","3");
INSERT INTO itemizado_listado VALUES("42","3","15","1.15.3","Relleno de Aceite","0","00:10:00","3");
INSERT INTO itemizado_listado VALUES("43","3","16","1.16.1","Engrase de puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("44","3","16","1-16.2","Inspeccion Inyectores de Aceite","0","00:05:00","4");
INSERT INTO itemizado_listado VALUES("45","3","10","1.10.2","Engrase de puntos","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("46","3","10","1.10.4","Aplicacion desoxidante","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("47","3","6","1.6.5","Aplicación grasa Spray","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("48","3","4","1.4.3","Aplicacion desoxidante","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("49","3","11","1.11.3","Aplicación grasa Spray","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("50","3","12","1.12.3","Aplicación grasa Spray","0","00:05:00","3");
INSERT INTO itemizado_listado VALUES("51","3","11","1.11.4","Limpieza Interior","0","01:00:00","3");
INSERT INTO itemizado_listado VALUES("52","3","12","1.12.4","Limpieza Interior","0","01:00:00","3");
INSERT INTO itemizado_listado VALUES("53","3","13","1.13.3","Limpieza Interior","0","01:00:00","3");
INSERT INTO itemizado_listado VALUES("54","3","14","1.14.3","Limpieza Interior","0","01:00:00","3");
INSERT INTO itemizado_listado VALUES("55","3","10","1.10.5","Aplicación grasa Spray","0","00:10:00","3");
INSERT INTO itemizado_listado VALUES("56","3","17","1.17.1","Revision Nivel de Aceite","0","00:10:00","2");
INSERT INTO itemizado_listado VALUES("57","3","17","1.17.2","Relleno de Aceite","0","00:05:00","3");



DROP TABLE itemizado_listado_trabajos;

CREATE TABLE `itemizado_listado_trabajos` (
  `idTrabajo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTrabajo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO itemizado_listado_trabajos VALUES("1","Revision Temperatura");
INSERT INTO itemizado_listado_trabajos VALUES("2","Revision Aceite");
INSERT INTO itemizado_listado_trabajos VALUES("3","Consumo de Materiales");
INSERT INTO itemizado_listado_trabajos VALUES("4","Revisiones Generales");
INSERT INTO itemizado_listado_trabajos VALUES("5","Mantencion por Falla");



DROP TABLE maquinaria_area;

CREATE TABLE `maquinaria_area` (
  `idArea` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  UNIQUE KEY `idArea` (`idArea`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO maquinaria_area VALUES("1","3","OFFSET");
INSERT INTO maquinaria_area VALUES("2","3","NILPETER");
INSERT INTO maquinaria_area VALUES("3","3","TROQUELADO");
INSERT INTO maquinaria_area VALUES("4","3","GUILLOTINAS");
INSERT INTO maquinaria_area VALUES("5","3","BARNIZ");
INSERT INTO maquinaria_area VALUES("6","3","REVISADO");
INSERT INTO maquinaria_area VALUES("7","3","FOLIADO");
INSERT INTO maquinaria_area VALUES("8","3","FLEXOGRAFIA");



DROP TABLE maquinaria_componentes;

CREATE TABLE `maquinaria_componentes` (
  `idComponente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `idArea` int(11) unsigned NOT NULL,
  `idLinea` int(11) unsigned NOT NULL,
  `idMaquina` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `idItemFamilia` int(11) unsigned NOT NULL,
  `Marca` varchar(60) NOT NULL,
  `Modelo` varchar(60) NOT NULL,
  `fecha` int(4) unsigned NOT NULL,
  `Serie` varchar(60) NOT NULL,
  PRIMARY KEY (`idComponente`)
) ENGINE=MyISAM AUTO_INCREMENT=212 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO maquinaria_componentes VALUES("1","3","1","1","1","Deposito de Grasa ","1","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("2","3","1","1","1","Marcador Unidad Control Aire Comprimido","10","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("3","3","1","1","1","Marcador Cabezal Aspirador","10","Heidelberg","SM-52   ","2013","");
INSERT INTO maquinaria_componentes VALUES("4","3","1","1","1","Marcador Pinzas Delanteras","10","Heidelberg","SM-52   ","2013","");
INSERT INTO maquinaria_componentes VALUES("5","3","1","1","1","Grupo Impresor 01 - Tambor Marcador","4","Heidelberg","SM-52   ","2013","");
INSERT INTO maquinaria_componentes VALUES("6","3","1","1","1","Grupo Impresor 01 - Cilindro Impresor","4","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("7","3","1","1","1","Grupo Impresor 01 - Cilindro Transferencia","4","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("8","3","1","1","1","Grupo Impresor 01 - Accionamiento Rodillo Inmersor","4","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("9","3","1","1","1","Grupo Impresor 01 - Accionamiento Rodillo Dosificador","4","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("10","3","1","1","1","Grupo Impresor 02 - Cilindro Impresor","4","Heidelberg","SM-52   ","2013","");
INSERT INTO maquinaria_componentes VALUES("11","3","1","1","1","Grupo Impresor 02 - Cilindro Transferencia","4","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("12","3","1","1","1","Grupo Impresor 02 - Accionamiento Rodillo Inmersor","4","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("13","3","1","1","1","Grupo Impresor 02 - Accionamiento Rodillo Dosificador","4","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("14","3","1","1","1","Grupo Impresor 03 - Cilindro Impresor","4","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("15","3","1","1","1","Grupo Impresor 03 - Cilindro Transferencia","4","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("16","3","1","1","1","Grupo Impresor 03 - Accionamiento Rodillo Inmersor","4","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("17","3","1","1","1","Grupo Impresor 03 - Accionamiento Rodillo Dosificador","4","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("18","3","1","1","1","Grupo Impresor 01 - Registro de Ajuste","4","Heidelberg","SM-52 ","2000","");
INSERT INTO maquinaria_componentes VALUES("19","3","1","1","1","Grupo Impresor 02 - Registro de Ajuste","4","Heidelberg","SM-52  ","2000","");
INSERT INTO maquinaria_componentes VALUES("20","3","1","1","1","Grupo Impresor 03 - Registro de Ajuste","4","Heidelberg","SM-52 ","2000","");
INSERT INTO maquinaria_componentes VALUES("21","3","1","1","1","Grupos Impresores - Accionamiento Neumatico Rodillos","4","Heidelberg","SM-52    ","2000","");
INSERT INTO maquinaria_componentes VALUES("22","3","1","1","1","Grupo Barnizador - Cilindro Impresor","13","Heidelberg","SM-52 ","2000","");
INSERT INTO maquinaria_componentes VALUES("23","3","1","1","1","Grupo Barnizador - Cilindro Transferencia","13","Heidelberg","SM-52 ","2000","");
INSERT INTO maquinaria_componentes VALUES("24","3","1","1","1","Grupo Barnizador - Accionamiento Rodillo Inmersor","13","Heidelberg","SM-52 ","2000","");
INSERT INTO maquinaria_componentes VALUES("25","3","1","1","1","Barra de Salida 01","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("26","3","1","1","1","Barra de Salida 02","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("27","3","1","1","1","Barra de Salida 03","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("28","3","1","1","1","Barra de Salida 04","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("29","3","1","1","1","Barra de Salida 05","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("30","3","1","1","1","Barra de Salida 06","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("31","3","1","1","1","Barra de Salida 07","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("32","3","1","1","1","Salida de Maquina Freno de Pliegos","6","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("33","3","1","1","1","Salida de Maquina Soplador desenrollador pliegos","6","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("34","3","1","1","1","Entrada de Maquina Pila Principal","5","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("35","3","1","1","1","Salida de Maquina Pila Principal","6","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("36","3","1","1","1","Maquina  Heidelberg SM52","9","Heidelberg","SM-52 ","2003","");
INSERT INTO maquinaria_componentes VALUES("37","3","1","1","2","Deposito de Grasa","1","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("38","3","1","1","2","Unidad Control Aire Comprimido","10","Heidelberg","SM-52","2013","");
INSERT INTO maquinaria_componentes VALUES("39","3","1","1","2","Marcador Cabezal Aspirador","10","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("40","3","1","1","2","Marcador Pinzas Delanteras","10","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("41","3","1","1","2","Grupo Impresor 01 - Accionamiento Rodillo Dosificador","4","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("42","3","1","1","2","Grupo Impresor 01 - Accionamiento Rodillo Inmersor","4","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("43","3","1","1","2","Grupo Impresor 01 - Cilindro Impresor","4","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("44","3","1","1","2","Grupo Impresor 01 - Cilindro Transferencia","4","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("45","3","1","1","2","Grupo Impresor 01 - Registro de Ajuste","4","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("46","3","1","1","2","Grupo Impresor 01 - Tambor Marcador","4","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("47","3","1","1","2","Grupo Barnizador - Cilindro Impresor","13","Heidelberg","SM-52 ","2000","");
INSERT INTO maquinaria_componentes VALUES("48","3","1","1","2","Grupo Barnizador - Cilindro Transferencia","13","Heidelberg","SM-52 ","2000","");
INSERT INTO maquinaria_componentes VALUES("49","3","1","1","2","Grupo Barnizador - Accionamiento Rodillo Inmersor","13","Heidelberg","SM-52 ","2000","");
INSERT INTO maquinaria_componentes VALUES("50","3","1","1","2","Grupos Impresores - Accionamiento Neumatico Rodillos","4","Heidelberg","SM-52 ","2000","");
INSERT INTO maquinaria_componentes VALUES("51","3","1","1","2","Barra de Salida 01","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("52","3","1","1","2","Barra de Salida 02","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("53","3","1","1","2","Barra de Salida 03","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("54","3","1","1","2","Barra de Salida 04","6","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("55","3","1","1","2","Salida de Maquina Freno de Pliegos","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("56","3","1","1","2","Salida de Maquina Soplador desenrollador pliegos","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("57","3","1","1","2","Maquina  Heidelberg SM52","9","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("58","3","1","1","2","Entrada Maquina Pila Principal","5","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("59","3","1","1","2","Salida Maquina Pila Principal","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("60","3","1","1","2","Maquina  Heidelberg SM52","9","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("61","3","1","1","3","Deposito de Grasa","1","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("62","3","1","1","3","Unidad Control Aire Comprimido","10","Heidelberg","SM-52","2013","");
INSERT INTO maquinaria_componentes VALUES("63","3","1","1","3","Marcador Cabezal Aspirador","10","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("64","3","1","1","3","Marcador Pinzas Delanteras","10","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("65","3","1","1","3","Grupo Impresor 01 - Tambor Marcador","4","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("66","3","1","1","3","Grupo Impresor 01 - Cilindro Impresor","4","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("67","3","1","1","3","Grupo Impresor 01 - Cilindro Transferencia","4","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("68","3","1","1","3","Grupo Impresor 01 - Accionamiento Rodillo Inmersor","4","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("69","3","1","1","3","Grupo Impresor 01 - Accionamiento Rodillo Dosificador","4","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("70","3","1","1","3","Grupo Impresor 01 - Registro de Ajuste","4","Heidelberg","SM-52 ","2000","");
INSERT INTO maquinaria_componentes VALUES("71","3","1","1","3","Grupo Barnizador - Accionamiento Rodillo Inmersor","13","Heidelberg","SM-52 ","2000","");
INSERT INTO maquinaria_componentes VALUES("72","3","1","1","3","Grupo Barnizador - Cilindro Impresor","13","Heidelberg","SM-52 ","2000","");
INSERT INTO maquinaria_componentes VALUES("73","3","1","1","3","Grupo Barnizador - Cilindro Transferencia","13","Heidelberg","SM-52 ","2000","");
INSERT INTO maquinaria_componentes VALUES("74","3","1","1","3","Grupo Impresores -  Accionamiento Neumatico Rodillos","4","Heidelberg","SM-52  ","2000","");
INSERT INTO maquinaria_componentes VALUES("75","3","1","1","3","Barra de Salida 01","6","Heidelberg","SM-52  ","2013","");
INSERT INTO maquinaria_componentes VALUES("76","3","1","1","3","Barra de Salida 02","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("77","3","1","1","3","Barra de Salida 03","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("78","3","1","1","3","Barra de Salida 04","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("79","3","1","1","3","Salida de Maquina Freno de Pliegos","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("80","3","1","1","3","Salida de Maquina Soplador desenrollador pliegos","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("81","3","1","1","3","Entrada de Maquina Pila Principal","5","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("82","3","1","1","3","Salida de Maquina Pila Principal","6","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("83","3","1","1","3","Maquina  Heidelberg SM52","9","Heidelberg","SM-52 ","2013","");
INSERT INTO maquinaria_componentes VALUES("84","3","8","2","4","Unidad 01 Cajas de Engranajes","15","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("85","3","8","2","4","Unidad 02 Cajas de Engranajes","15","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("86","3","8","2","4","Unidad 03 Cajas de Engranajes","15","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("87","3","8","2","4","Unidad 04 Cajas de Engranajes","15","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("88","3","8","2","4","Unidad 05 Cajas de Engranajes","15","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("89","3","8","2","4","Unidad 06 Cajas de Engranajes","15","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("90","3","8","2","4","Unidad 07 Cajas de Engranajes","15","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("91","3","8","2","4","Unidad 08 Cajas de Engranajes","15","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("92","3","8","2","4","Unidad 09 Cajas de Engranajes","15","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("93","3","8","2","4","Unidad 10 Cajas de Engranajes","15","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("94","3","8","2","4","Unidad Rhino Eje de Levas","7","RHINO","410H ","2013","");
INSERT INTO maquinaria_componentes VALUES("95","3","8","2","4","Unidad Rhino Eje de Folias","7","RHINO","410H ","2013","");
INSERT INTO maquinaria_componentes VALUES("96","3","8","2","4","Unidad Rhino Sistema Deslizamiento","7","RHINO","410H  ","2013","");
INSERT INTO maquinaria_componentes VALUES("97","3","8","2","4","Unidad Rhino Cajas de Engranajes","15","RHINO","","2013","");
INSERT INTO maquinaria_componentes VALUES("98","3","8","2","4","Unidad Rhino Cilindro","7","RHINO","","2013","");
INSERT INTO maquinaria_componentes VALUES("99","3","8","2","4","Unidad Troquelado Cajas de Engranajes","15","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("100","3","8","2","4","Unidad Convertidora Cajas de Engranajes","15","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("101","3","8","2","4","Unidad Troquelado - Cilindro Contrapresion","12","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("102","3","8","2","4","Unidad Troquelado Rodillo troquel","12","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("103","3","8","2","4","Unidad Troquelado Ruedas dentadas rodillos","12","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("104","3","8","2","4","Unidad 01 Sistema Deslizamiento","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("105","3","8","2","4","Unidad 02 Sistema Deslizamiento","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("106","3","8","2","4","Unidad 03 Sistema Deslizamiento","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("107","3","8","2","4","Unidad 04 Sistema Deslizamiento","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("108","3","8","2","4","Unidad 05 Sistema Deslizamiento","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("109","3","8","2","4","Unidad 06 Sistema Deslizamiento","11","NILPETER","MO-4  ","2013","");
INSERT INTO maquinaria_componentes VALUES("110","3","8","2","4","Unidad 07 Sistema Deslizamiento","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("111","3","8","2","4","Unidad 08 Sistema Deslizamiento","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("112","3","8","2","4","Unidad 09 Sistema Deslizamiento","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("113","3","8","2","4","Unidad 10 Sistema Deslizamiento","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("114","3","8","2","4","Unidad 01 Cilindro 1","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("115","3","8","2","4","Unidad 01 Cilindro 2","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("116","3","8","2","4","Unidad 02 Cilindro 1","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("117","3","8","2","4","Unidad 02 Cilindro 2","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("118","3","8","2","4","Unidad 03 Cilindro 1","11","NILPETER","MO-4  ","2013","");
INSERT INTO maquinaria_componentes VALUES("119","3","8","2","4","Unidad 03 Cilindro 2","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("120","3","8","2","4","Unidad 04 Cilindro 1","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("121","3","8","2","4","Unidad 04 Cilindro 2","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("122","3","8","2","4","Unidad 05 Cilindro 1","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("123","3","8","2","4","Unidad 05 Cilindro 2","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("124","3","8","2","4","Unidad 06 Cilindro 1","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("125","3","8","2","4","Unidad 06 Cilindro 2","11","NILPETER","MO-4  ","2013","");
INSERT INTO maquinaria_componentes VALUES("126","3","8","2","4","Unidad 07 Cilindro 1","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("127","3","8","2","4","Unidad 07 Cilindro 2","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("128","3","8","2","4","Unidad 08 Cilindro 1","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("129","3","8","2","4","Unidad 08 Cilindro 2","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("130","3","8","2","4","Unidad 09 Cilindro 1","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("131","3","8","2","4","Unidad 09 Cilindro 2","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("132","3","8","2","4","Unidad 10 Cilindro 1 ","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("133","3","8","2","4","Unidad 10 Cilindro 2","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("134","3","8","2","4","Deposito de Aceite","1","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("135","3","8","2","4"," Maquina MO-4-1","9","NILPETER","MO-4 ","2012","");
INSERT INTO maquinaria_componentes VALUES("136","3","8","2","5","Unidad Rhino Eje de Levas","7","RHINO","410H ","2013","");
INSERT INTO maquinaria_componentes VALUES("137","3","8","2","5","Unidad Rhino Eje de Folias","7","RHINO","410H ","2013","");
INSERT INTO maquinaria_componentes VALUES("138","3","8","2","5","Unidad Rhino Sistema Deslizamiento","7","RHINO","410H ","2013","");
INSERT INTO maquinaria_componentes VALUES("139","3","8","2","5","Unidad Rhino Cajas de Engranajes","15","RHINO","","2012","");
INSERT INTO maquinaria_componentes VALUES("140","3","8","2","5","Unidad Rhino Cilindro","7","RHINO","","2012","");
INSERT INTO maquinaria_componentes VALUES("141","3","8","2","5","Unidad 01 Sistema Deslizamiento","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("142","3","8","2","5","Unidad 02 Sistema Deslizamiento","11","NILPETER","MO-4  ","2013","");
INSERT INTO maquinaria_componentes VALUES("143","3","8","2","5","Unidad 03 Sistema Deslizamiento","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("144","3","8","2","5","Unidad 04 Sistema Deslizamiento","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("145","3","8","2","5","Unidad 05 Sistema Deslizamiento","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("146","3","8","2","5","Unidad 06 Sistema Deslizamiento","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("147","3","8","2","5","Unidad 07 Sistema Deslizamiento","11","NILPETER","MO-4 ","2012","");
INSERT INTO maquinaria_componentes VALUES("148","3","8","2","5","Unidad 08 Sistema Deslizamiento","11","NILPETER","MO-4 ","2012","");
INSERT INTO maquinaria_componentes VALUES("149","3","8","2","5","Unidad 01 Cilindro 1","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("150","3","8","2","5","Unidad 01 Cilindro 2","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("151","3","8","2","5","Unidad 02 Cilindro 1","11","NILPETER","MO-4  ","2013","");
INSERT INTO maquinaria_componentes VALUES("152","3","8","2","5","Unidad 02 Cilindro 2","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("153","3","8","2","5","Unidad 03 Cilindro 1","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("154","3","8","2","5","Unidad 03 Cilindro 2","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("155","3","8","2","5","Unidad 04 Cilindro 1","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("156","3","8","2","5","Unidad 04 Cilindro 2","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("157","3","8","2","5","Unidad 05 Cilindro 1","11","NILPETER","MO-4  ","2013","");
INSERT INTO maquinaria_componentes VALUES("158","3","8","2","5","Unidad 05 Cilindro 2","11","NILPETER","MO-4  ","2013","");
INSERT INTO maquinaria_componentes VALUES("159","3","8","2","5","Unidad 06 Cilindro 1","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("160","3","8","2","5","Unidad 06 Cilindro 2","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("161","3","8","2","5","Unidad 07 Cilindro 1","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("162","3","8","2","5","Unidad 07 Cilindro 2","11","NILPETER","MO-4  ","2013","");
INSERT INTO maquinaria_componentes VALUES("163","3","8","2","5","Unidad 08 Cilindro 1","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("164","3","8","2","5","Unidad 08 Cilindro 2","11","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("165","3","8","2","5","Unidad 01 Cajas de Engranajes","15","NILPETER","MO-4  ","2012","");
INSERT INTO maquinaria_componentes VALUES("166","3","8","2","5","Unidad 02 Cajas de Engranajes","15","NILPETER","MO-4 ","2012","");
INSERT INTO maquinaria_componentes VALUES("167","3","8","2","5","Unidad 03 Cajas de Engranajes","15","NILPETER","MO-4 ","2012","");
INSERT INTO maquinaria_componentes VALUES("168","3","8","2","5","Unidad 04 Cajas de Engranajes","15","NILPETER","MO-4 ","2012","");
INSERT INTO maquinaria_componentes VALUES("169","3","8","2","5","Unidad 05 Cajas de Engranajes","15","NILPETER","MO-4 ","2012","");
INSERT INTO maquinaria_componentes VALUES("170","3","8","2","5","Unidad 06 Cajas de Engranajes","15","NILPETER","MO-4 ","2012","");
INSERT INTO maquinaria_componentes VALUES("171","3","8","2","5","Unidad 07 Cajas de Engranajes","15","NILPETER","MO-4 ","2012","");
INSERT INTO maquinaria_componentes VALUES("172","3","8","2","5","Unidad 08 Cajas de Engranajes","15","NILPETER","MO-4 ","2012","");
INSERT INTO maquinaria_componentes VALUES("173","3","8","2","5","Unidad Convertidora Cajas de Engranajes","15","NILPETER","MO-4 ","2012","");
INSERT INTO maquinaria_componentes VALUES("174","3","8","2","5","Unidad Troquelado Cajas de Engranajes","12","NILPETER","MO-4 ","2012","");
INSERT INTO maquinaria_componentes VALUES("175","3","8","2","5","Unidad Troquelado - Cilindro Contrapresion","12","NILPETER","MO-4 ","2012","");
INSERT INTO maquinaria_componentes VALUES("176","3","8","2","5","Unidad Troquelado Rodillo troquel","12","NILPETER","MO-4 ","2012","");
INSERT INTO maquinaria_componentes VALUES("177","3","8","2","5","Unidad Troquelado Ruedas dentadas rodillos","12","NILPETER","MO-4 ","2012","");
INSERT INTO maquinaria_componentes VALUES("178","3","8","2","5","Deposito de Aceite","1","NILPETER","MO-4  ","2013","");
INSERT INTO maquinaria_componentes VALUES("179","3","8","2","5","Maquina  MO-4-2","9","NILPETER","MO-4 ","2013","");
INSERT INTO maquinaria_componentes VALUES("180","3","3","3","7","Deposito de Aceite","1","KAMA","PROCUT 53 ","2013","");
INSERT INTO maquinaria_componentes VALUES("181","3","3","3","7","Prensa de Platina","16","KAMA","PROCUT 53  ","2013","");
INSERT INTO maquinaria_componentes VALUES("182","3","3","3","7","Entrada Maquina Pila Principal","5","KAMA","PROCUT 53 ","2013","");
INSERT INTO maquinaria_componentes VALUES("183","3","3","3","7","Salida de Maquina Pila Principal","6","KAMA","PROCUT 53 ","2013","");
INSERT INTO maquinaria_componentes VALUES("184","3","3","3","7","Embrague","16","KAMA","PROCUT 53 ","2012","");
INSERT INTO maquinaria_componentes VALUES("185","3","3","3","7","Maquina  KAMA","9","KAMA","PROCUT 53 ","2013","");
INSERT INTO maquinaria_componentes VALUES("186","3","4","4","9","Cuerpo Principal Maquina","14","POLAR","115","2013","");
INSERT INTO maquinaria_componentes VALUES("187","3","4","4","9","Reductor Deposito de Aceite","3","POLAR","115","2013","");
INSERT INTO maquinaria_componentes VALUES("188","3","4","4","9","Sistema Hidraulico Deposito de Aceite","2","POLAR","115","2013","");
INSERT INTO maquinaria_componentes VALUES("189","3","4","4","9","Maquina  POLAR 115","9","POLAR","92","2013","");
INSERT INTO maquinaria_componentes VALUES("190","3","4","4","10","Cuerpo Principal Maquina","14","POLAR","92","2013","");
INSERT INTO maquinaria_componentes VALUES("191","3","4","4","10","Reductor Deposito de Aceite","3","POLAR","92","2013","");
INSERT INTO maquinaria_componentes VALUES("192","3","4","4","10","Sistema Hidraulico Deposito de Aceite","2","POLAR","92","2013","");
INSERT INTO maquinaria_componentes VALUES("193","3","4","4","10","Maquina  POLAR 92","9","POLAR","92","2013","");
INSERT INTO maquinaria_componentes VALUES("194","3","5","5","11","Maquina  Barnizadora nacional","9","NACIONAL","","2015","");
INSERT INTO maquinaria_componentes VALUES("195","3","5","5","11","Puntos Lubricacion Maquina","14","NACIONAL","","2015","");
INSERT INTO maquinaria_componentes VALUES("196","3","5","5","12","Barnizadora Cartes","9","CARTES","","2015","");
INSERT INTO maquinaria_componentes VALUES("197","3","5","5","12","Puntos Lubricacion Maquina","14","CARTES","","2015","");
INSERT INTO maquinaria_componentes VALUES("198","3","5","5","13","Barnizadora Cartes","9","CARTES","","2015","");
INSERT INTO maquinaria_componentes VALUES("199","3","5","5","13","Puntos Lubricacion Maquina","14","CARTES","","2015","");
INSERT INTO maquinaria_componentes VALUES("200","3","6","6","14","Deposito de Aceite","17","FOCUSLIGHT","","2015","");
INSERT INTO maquinaria_componentes VALUES("201","3","6","6","14","Entrada Maquina Pila Principal","5","FOCUSLIGHT","","2015","");
INSERT INTO maquinaria_componentes VALUES("202","3","6","6","14","Salida de Maquina Pila Principal","6","FOCUSLIGHT","","2015","");
INSERT INTO maquinaria_componentes VALUES("203","3","6","6","14","Tornillos sin fin","14","FOCUSLIGHT","","2015","");
INSERT INTO maquinaria_componentes VALUES("204","3","6","6","14","Rodamientos transmision","14","FOCUSLIGHT","","2015","");
INSERT INTO maquinaria_componentes VALUES("205","3","6","6","14","Maquina  FOCUSLIGHT","9","FOCUSLIGHT","","2015","");
INSERT INTO maquinaria_componentes VALUES("206","3","7","7","15","Puntos Lubricacion Maquina","14","Cartes","","2015","");
INSERT INTO maquinaria_componentes VALUES("207","3","7","7","15","Maquina  CARTES 1","9","Cartes","","2015","");
INSERT INTO maquinaria_componentes VALUES("208","3","7","7","16","Puntos Lubricacion Maquina","14","Cartes","","2015","");
INSERT INTO maquinaria_componentes VALUES("209","3","7","7","16","Maquina  CARTES 1","9","Cartes","","2015","");
INSERT INTO maquinaria_componentes VALUES("210","3","5","5","13","Barnizadora MABETT","9","","","2015","");
INSERT INTO maquinaria_componentes VALUES("211","3","7","7","16","Maquina  CARTES 2","9","Cartes","","2015","");



DROP TABLE maquinaria_linea;

CREATE TABLE `maquinaria_linea` (
  `idLinea` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `idArea` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idLinea`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO maquinaria_linea VALUES("1","3","1","General 1");
INSERT INTO maquinaria_linea VALUES("2","3","8","General 2");
INSERT INTO maquinaria_linea VALUES("3","3","3","General 3");
INSERT INTO maquinaria_linea VALUES("4","3","4","General 4");
INSERT INTO maquinaria_linea VALUES("5","3","5","General 5");
INSERT INTO maquinaria_linea VALUES("6","3","6","General 6");
INSERT INTO maquinaria_linea VALUES("7","3","7","General 7");



DROP TABLE maquinaria_maquinas;

CREATE TABLE `maquinaria_maquinas` (
  `idMaquina` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `idArea` int(11) unsigned NOT NULL,
  `idLinea` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Modelo` varchar(120) NOT NULL,
  `Serie` varchar(120) NOT NULL,
  `Fabricante` varchar(120) NOT NULL,
  `idTrabajador` int(11) unsigned NOT NULL,
  `fincorporacion` date NOT NULL,
  `idActivo` int(11) unsigned NOT NULL,
  `Cod_pieza` varchar(60) NOT NULL,
  PRIMARY KEY (`idMaquina`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO maquinaria_maquinas VALUES("1","3","1","1","SM-52/1 - 4 Cuerpos","SM-52","2010","HEIDELBERG","0","0000-00-00","1","");
INSERT INTO maquinaria_maquinas VALUES("2","3","1","1","SM-52/3 - 2 Cuerpos ","SM-52","2010","HEIDELBERG","0","0000-00-00","1","");
INSERT INTO maquinaria_maquinas VALUES("3","3","1","1","SM-52/2 - 2 Cuerpos ","SM-52","2010","HEIDELBERG","0","0000-00-00","1","");
INSERT INTO maquinaria_maquinas VALUES("4","3","8","2","MO-4-01","MO-4","2012","NILPETER","0","0000-00-00","1","");
INSERT INTO maquinaria_maquinas VALUES("5","3","8","2","MO-4-02","MO-4","2012","NILPETER","0","0000-00-00","1","");
INSERT INTO maquinaria_maquinas VALUES("6","3","8","2","GALLUS ECS 340","ECS 340","2012","GALLUS","0","0000-00-00","1","");
INSERT INTO maquinaria_maquinas VALUES("7","3","3","3","PROCUT 53","","2012","","0","0000-00-00","1","");
INSERT INTO maquinaria_maquinas VALUES("8","3","3","3","BLUMER D-18","","2010","BLUMER","0","0000-00-00","1","");
INSERT INTO maquinaria_maquinas VALUES("9","3","4","4","POLAR 115","","2010","","0","0000-00-00","1","");
INSERT INTO maquinaria_maquinas VALUES("10","3","4","4","POLAR 92","","2010","","0","0000-00-00","1","");
INSERT INTO maquinaria_maquinas VALUES("11","3","5","5","Barnizadora Nacional","","2005","","0","0000-00-00","1","");
INSERT INTO maquinaria_maquinas VALUES("12","3","5","5","Barnizadora Cartes","","2005","","0","0000-00-00","1","");
INSERT INTO maquinaria_maquinas VALUES("13","3","5","5","Barnizadora MABETT","","2009","","0","0000-00-00","1","");
INSERT INTO maquinaria_maquinas VALUES("14","3","6","6","FOCUSLIGHT","FS-500","2013","","0","0000-00-00","1","");
INSERT INTO maquinaria_maquinas VALUES("15","3","7","7","Cartes 1","","2012","","0","0000-00-00","1","");
INSERT INTO maquinaria_maquinas VALUES("16","3","7","7","Cartes 2","","2015","","0","0000-00-00","1","");



DROP TABLE maquinaria_maquinas_opciones;

CREATE TABLE `maquinaria_maquinas_opciones` (
  `idActivo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idActivo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO maquinaria_maquinas_opciones VALUES("1","Activo");
INSERT INTO maquinaria_maquinas_opciones VALUES("2","Inactivo");



DROP TABLE maquinaria_subcomponentes;

CREATE TABLE `maquinaria_subcomponentes` (
  `idSubComponente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `idArea` int(11) unsigned NOT NULL,
  `idLinea` int(11) unsigned NOT NULL,
  `idMaquina` int(11) unsigned NOT NULL,
  `idComponente` int(11) unsigned NOT NULL,
  `idSubTipo` int(11) unsigned NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Grasa_inicial` decimal(11,6) NOT NULL,
  `Grasa_relubricacion` decimal(11,6) NOT NULL,
  `Aceite` decimal(11,6) NOT NULL,
  `Cantidad` decimal(11,6) NOT NULL,
  `idUml` int(11) unsigned NOT NULL,
  `Frecuencia` decimal(5,0) NOT NULL,
  `idFrecuencia` int(11) unsigned NOT NULL,
  `idProducto` int(11) unsigned NOT NULL,
  `Marca` varchar(120) NOT NULL,
  `Saf` varchar(6) NOT NULL,
  `Numero` varchar(20) NOT NULL,
  PRIMARY KEY (`idSubComponente`)
) ENGINE=MyISAM AUTO_INCREMENT=568 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO maquinaria_subcomponentes VALUES("1","3","1","1","1","1","1","Deposito de Grasa","3.000000","0.000000","0.000000","0.000000","3","7","1","132","","","");
INSERT INTO maquinaria_subcomponentes VALUES("2","3","1","1","1","2","3","Regulador de Filtro","0.000000","0.000000","0.000000","0.000000","2","7","1","0","","","");
INSERT INTO maquinaria_subcomponentes VALUES("3","3","1","1","1","3","3","Aspiradores elevacion/arrastre LI/LS","0.000000","0.000000","0.000000","0.000000","2","7","1","0","","","");
INSERT INTO maquinaria_subcomponentes VALUES("4","3","1","1","1","3","3","Valvula Rotativa","0.000000","0.000000","0.000000","1.000000","2","14","1","169","","","");
INSERT INTO maquinaria_subcomponentes VALUES("5","3","1","1","1","4","1","Palanca de Rodillo","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("6","3","1","1","1","4","2","Soportes de pinzas - alojamiento pinzas ","0.000000","0.000000","1.000000","1.000000","2","7","1","169","","","");
INSERT INTO maquinaria_subcomponentes VALUES("7","3","1","1","1","5","1","Palanca de Rodillo LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("8","3","1","1","1","5","1","Eje de Pinzas Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("9","3","1","1","1","5","1","Eje de Pinzas Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("10","3","1","1","1","5","1","Eje de Pinzas Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("11","3","1","1","1","5","1","Eje de Pinzas Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("12","3","1","1","1","5","1","Eje de Pinzas Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("13","3","1","1","1","6","1","Palanca de Rodillo 01 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("14","3","1","1","1","6","1","Eje de Pinzas 01 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("15","3","1","1","1","6","1","Eje de Pinzas 01 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("16","3","1","1","1","6","1","Eje de Pinzas 01 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("17","3","1","1","1","6","1","Eje de Pinzas 01 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("18","3","1","1","1","6","1","Eje de Pinzas 01 Cojinete 5","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("19","3","1","1","1","6","1","Palanca de Rodillo 02 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("20","3","1","1","1","6","1","Eje de Pinzas 02 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("21","3","1","1","1","6","1","Eje de Pinzas 02 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("22","3","1","1","1","6","1","Eje de Pinzas 02 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("23","3","1","1","1","6","1","Eje de Pinzas 02 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("24","3","1","1","1","6","1","Eje de Pinzas 02 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("25","3","1","1","1","7","1","Palanca de Rodillo 01 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("26","3","1","1","1","7","1","Eje de Pinzas 01 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","0","","","");
INSERT INTO maquinaria_subcomponentes VALUES("27","3","1","1","1","7","1","Eje de Pinzas 01 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("28","3","1","1","1","7","1","Eje de Pinzas 01 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("29","3","1","1","1","7","1","Eje de Pinzas 01 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("30","3","1","1","1","7","1","Eje de Pinzas 01 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("31","3","1","1","1","7","1","Palanca de Rodillo 02 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("32","3","1","1","1","7","1","Eje de Pinzas 02 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("33","3","1","1","1","7","1","Eje de Pinzas 02 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("34","3","1","1","1","7","1","Eje de Pinzas 02 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("35","3","1","1","1","7","1","Eje de Pinzas 02 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("36","3","1","1","1","7","1","Eje de Pinzas 02 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("37","3","1","1","1","8","1","Rueda Dentada LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("38","3","1","1","1","21","2","Accionamiento Neumatico","0.000000","0.000000","0.000000","0.000000","1","7","1","169","","","");
INSERT INTO maquinaria_subcomponentes VALUES("39","3","1","1","1","9","1","Rueda Dentada  LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("40","3","1","1","1","10","1","Palanca de Rodillo 01 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("41","3","1","1","1","10","1","Eje de Pinzas 01 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("42","3","1","1","1","10","1","Eje de Pinzas 01 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("43","3","1","1","1","10","1","Eje de Pinzas 01 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("44","3","1","1","1","10","1","Eje de Pinzas 01 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","0","","","");
INSERT INTO maquinaria_subcomponentes VALUES("45","3","1","1","1","10","1","Eje de Pinzas 01 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("46","3","1","1","1","10","1","Palanca de Rodillo 02 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("47","3","1","1","1","10","1","Eje de Pinzas 02 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("48","3","1","1","1","10","1","Eje de Pinzas 02 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("49","3","1","1","1","10","1","Eje de Pinzas 02 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("50","3","1","1","1","10","1","Eje de Pinzas 02 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("51","3","1","1","1","10","1","Eje de Pinzas 02 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("52","3","1","1","1","11","1","Palanca de Rodillo 01 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("53","3","1","1","1","11","1","Eje de Pinzas 01 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("54","3","1","1","1","11","1","Eje de Pinzas 01 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("55","3","1","1","1","11","1","Eje de Pinzas 01 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("56","3","1","1","1","11","1","Eje de Pinzas 01 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("57","3","1","1","1","11","1","Eje de Pinzas 01 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("58","3","1","1","1","11","1","Palanca de Rodillo 02 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("59","3","1","1","1","11","1","Eje de Pinzas 02 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("60","3","1","1","1","11","1","Eje de Pinzas 02 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("61","3","1","1","1","11","1","Eje de Pinzas 02 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("62","3","1","1","1","11","1","Eje de Pinzas 02 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("63","3","1","1","1","11","1","Eje de Pinzas 02 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("64","3","1","1","1","12","1","Rueda Dentada  LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("65","3","1","1","1","21","2","Accionamiento Neumatico","0.000000","0.000000","0.000000","0.000000","1","7","1","169","","","");
INSERT INTO maquinaria_subcomponentes VALUES("66","3","1","1","1","13","1","Rueda Dentada  LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("67","3","1","1","1","14","1","Palanca de Rodillo 01 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("68","3","1","1","1","14","1","Eje de Pinzas 01 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("69","3","1","1","1","14","1","Eje de Pinzas 01 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("70","3","1","1","1","14","1","Eje de Pinzas 01 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("71","3","1","1","1","14","1","Eje de Pinzas 01 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("72","3","1","1","1","14","1","Eje de Pinzas 01 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("73","3","1","1","1","14","1","Palanca de Rodillo 02 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("74","3","1","1","1","14","1","Eje de Pinzas 02 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("75","3","1","1","1","14","1","Eje de Pinzas 02 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("76","3","1","1","1","14","1","Eje de Pinzas 02 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("77","3","1","1","1","14","1","Eje de Pinzas 02 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("78","3","1","1","1","14","1","Eje de Pinzas 02 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("79","3","1","1","1","15","1","Palanca de Rodillo 01 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("80","3","1","1","1","15","1","Eje de Pinzas 01 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("81","3","1","1","1","15","1","Eje de Pinzas 01 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("82","3","1","1","1","15","1","Eje de Pinzas 01 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("83","3","1","1","1","15","1","Eje de Pinzas 01 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("84","3","1","1","1","15","1","Eje de Pinzas 01 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("85","3","1","1","1","15","1","Palanca de Rodillo 02 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("86","3","1","1","1","15","1","Eje de Pinzas 02 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("87","3","1","1","1","15","1","Eje de Pinzas 02 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("88","3","1","1","1","15","1","Eje de Pinzas 02 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("89","3","1","1","1","15","1","Eje de Pinzas 02 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("90","3","1","1","1","15","1","Eje de Pinzas 02 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("91","3","1","1","1","16","1","Rueda Dentada  LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("92","3","1","1","1","21","2","Accionamiento Neumatico","0.000000","0.000000","0.000000","0.000000","1","7","1","169","","","");
INSERT INTO maquinaria_subcomponentes VALUES("93","3","1","1","1","17","1","Rueda Dentada  LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("94","3","1","1","1","22","1","Palanca de Rodillo 01 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("95","3","1","1","1","25","3","Sistema de Pinzas 01","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("96","3","1","1","1","25","1","Sistema de Pinzas 02 ","0.000000","0.000000","0.000000","0.000000","1","7","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("97","3","1","1","1","26","3","Sistema de Pinzas 01","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("98","3","1","1","1","26","1","Sistema de Pinzas 02","0.000000","0.000000","0.000000","0.000000","1","7","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("99","3","1","1","1","27","3","Sistema de Pinzas 01","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("100","3","1","1","1","27","1","Sistema de Pinzas 02 ","0.000000","0.000000","0.000000","0.000000","1","7","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("101","3","1","1","1","28","3","Sistema de Pinzas 01","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("102","3","1","1","1","28","1","Sistema de Pinzas 02","0.000000","0.000000","0.000000","0.000000","1","7","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("103","3","1","1","1","29","3","Sistema de Pinzas 01","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("104","3","1","1","1","29","1","Sistema de Pinzas 02 ","0.000000","0.000000","0.000000","0.000000","1","7","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("105","3","1","1","1","30","3","Sistema de Pinzas 01","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("106","3","1","1","1","30","1","Sistema de Pinzas 02","0.000000","0.000000","0.000000","0.000000","1","7","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("107","3","1","1","1","31","3","Sistema de Pinzas 01","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("108","3","1","1","1","31","1","Sistema de Pinzas 02","0.000000","0.000000","0.000000","0.000000","1","7","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("109","3","1","1","1","32","3","Filtro de Aire","0.000000","0.000000","0.000000","0.000000","2","7","1","0","","","");
INSERT INTO maquinaria_subcomponentes VALUES("110","3","1","1","1","33","3","Filtro de Aire","0.000000","0.000000","0.000000","0.000000","2","7","1","0","","","");
INSERT INTO maquinaria_subcomponentes VALUES("111","3","1","1","1","34","2","Cadenas de Transmision","0.000000","0.000000","0.000000","0.000000","1","14","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("112","3","1","1","1","35","2","Cadenas de Transmision","0.000000","0.000000","0.000000","0.000000","1","14","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("113","3","1","1","2","1","1","Deposito de Grasa","3.000000","3.000000","0.000000","0.000000","3","7","1","132","","","");
INSERT INTO maquinaria_subcomponentes VALUES("114","3","1","1","2","38","3","Regulador de Filtro","0.000000","0.000000","0.000000","0.000000","2","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("115","3","1","1","2","3","3","Aspiradores elevacion/arrastre LI/LS","0.000000","0.000000","0.000000","0.000000","2","7","1","0","","","");
INSERT INTO maquinaria_subcomponentes VALUES("116","3","1","1","2","39","3","Valvula Rotativa","0.000000","0.000000","0.000000","0.000000","2","7","1","169","","","");
INSERT INTO maquinaria_subcomponentes VALUES("117","3","1","1","2","40","1","Palanca de Rodillo","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("118","3","1","1","2","40","2","Soportes de pinzas - alojamiento pinzas ","0.000000","0.000000","0.000000","0.000000","1","7","1","169","","","");
INSERT INTO maquinaria_subcomponentes VALUES("119","3","1","1","2","5","1","Palanca de Rodillo LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("120","3","1","1","2","5","1","Eje de Pinzas Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("121","3","1","1","2","5","1","Eje de Pinzas Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("122","3","1","1","2","5","1","Eje de Pinzas Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("123","3","1","1","2","5","1","Eje de Pinzas Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("124","3","1","1","2","5","1","Eje de Pinzas Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("125","3","1","1","2","6","1","Palanca de Rodillo 01 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("126","3","1","1","2","6","1","Eje de Pinzas 01 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("127","3","1","1","2","6","1","Eje de Pinzas 01 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("128","3","1","1","2","6","1","Eje de Pinzas 01 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("129","3","1","1","2","6","1","Eje de Pinzas 01 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("130","3","1","1","2","6","1","Eje de Pinzas 01 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("131","3","1","1","2","6","1","Palanca de Rodillo 02 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("132","3","1","1","2","6","1","Eje de Pinzas 02 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("133","3","1","1","2","6","1","Eje de Pinzas 02 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("134","3","1","1","2","6","1","Eje de Pinzas 02 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("135","3","1","1","2","6","1","Eje de Pinzas 02 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("136","3","1","1","2","6","1","Eje de Pinzas 02 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("137","3","1","1","2","7","1","Palanca de Rodillo 01 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("138","3","1","1","2","7","1","Eje de Pinzas 01 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("139","3","1","1","2","7","1","Eje de Pinzas 01 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("140","3","1","1","2","7","1","Eje de Pinzas 01 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("141","3","1","1","2","7","1","Eje de Pinzas 01 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("142","3","1","1","2","7","1","Eje de Pinzas 01 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("143","3","1","1","2","7","1","Palanca de Rodillo 02 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("144","3","1","1","2","7","1","Eje de Pinzas 02 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("145","3","1","1","2","7","1","Eje de Pinzas 02 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("146","3","1","1","2","7","1","Eje de Pinzas 02 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("147","3","1","1","2","7","1","Eje de Pinzas 02 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("148","3","1","1","2","7","1","Eje de Pinzas 02 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("149","3","1","1","2","22","1","Eje de Pinzas 01 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("150","3","1","1","2","22","1","Palanca de Rodillo 01 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("151","3","1","1","2","8","1","Rueda Dentada 1 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("152","3","1","1","2","9","1","Rueda Dentada 1 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("153","3","1","1","2","50","2","Accionamiento Neumatico","0.000000","0.000000","0.000000","0.000000","1","7","1","169","","","");
INSERT INTO maquinaria_subcomponentes VALUES("154","3","1","1","2","25","3","Sistema de Pinzas 01","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("155","3","1","1","2","25","1","Sistema de Pinzas 02","0.000000","0.000000","0.000000","0.000000","1","7","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("156","3","1","1","2","26","3","Sistema de Pinzas 01","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("157","3","1","1","2","26","1","Sistema de Pinzas 02","0.000000","0.000000","0.000000","0.000000","1","7","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("158","3","1","1","2","27","3","Sistema de Pinzas 01","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("159","3","1","1","2","27","1","Sistema de Pinzas 02","0.000000","0.000000","0.000000","0.000000","1","7","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("160","3","1","1","2","54","3","Sistema de Pinzas 01","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("161","3","1","1","2","54","1","Sistema de Pinzas 02","0.000000","0.000000","0.000000","0.000000","1","7","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("162","3","1","1","2","55","3","Filtro de Aire 01","0.000000","0.000000","0.000000","0.000000","2","7","1","0","","","");
INSERT INTO maquinaria_subcomponentes VALUES("163","3","1","1","2","56","3","Filtro de Aire 02","0.000000","0.000000","0.000000","0.000000","2","7","1","0","","","");
INSERT INTO maquinaria_subcomponentes VALUES("164","3","1","1","2","58","1","Cadenas de Transmision","0.000000","0.000000","0.000000","0.000000","1","14","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("165","3","1","1","2","59","1","Cadenas de Transmision","0.000000","0.000000","0.000000","0.000000","1","14","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("166","3","1","1","3","1","1","Deposito de Grasa","3.000000","3.000000","0.000000","0.000000","3","7","1","132","","","");
INSERT INTO maquinaria_subcomponentes VALUES("167","3","1","1","3","38","3","Regulador de Filtro","0.000000","0.000000","0.000000","0.000000","2","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("168","3","1","1","3","3","3","Aspiradores elevacion/arrastre LI/LS","0.000000","0.000000","0.000000","0.000000","2","7","1","0","","","");
INSERT INTO maquinaria_subcomponentes VALUES("169","3","1","1","3","39","3","Valvula Rotativa","0.000000","0.000000","0.000000","0.000000","2","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("170","3","1","1","3","40","1","Palanca de Rodillo","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("171","3","1","1","3","40","2","Soportes de pinzas - alojamiento pinzas ","0.000000","0.000000","0.000000","0.000000","1","7","1","169","","","");
INSERT INTO maquinaria_subcomponentes VALUES("172","3","1","1","3","65","1","Eje de Pinzas Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("173","3","1","1","3","65","1","Eje de Pinzas Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("174","3","1","1","3","65","1","Eje de Pinzas Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("175","3","1","1","3","65","1","Eje de Pinzas Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("176","3","1","1","3","65","1","Eje de Pinzas Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("177","3","1","1","1","19","1","Registro de Ajuste","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("178","3","1","1","1","18","1","Registro de Ajuste","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("179","3","1","1","3","66","1","Palanca de Rodillo 01 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("180","3","1","1","3","66","1","Eje de Pinzas 01 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("181","3","1","1","3","66","1","Eje de Pinzas 01 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("182","3","1","1","3","66","1","Eje de Pinzas 01 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("183","3","1","1","3","66","1","Eje de Pinzas 01 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("184","3","1","1","3","66","1","Eje de Pinzas 01 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("185","3","1","1","3","66","1","Palanca de Rodillo 02 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("186","3","1","1","3","66","1","Eje de Pinzas 02 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("187","3","1","1","3","66","1","Eje de Pinzas 02 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("188","3","1","1","3","66","1","Eje de Pinzas 02 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("189","3","1","1","3","66","1","Eje de Pinzas 02 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("190","3","1","1","3","66","1","Eje de Pinzas 02 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("191","3","1","1","3","67","1","Palanca de Rodillo 01 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("192","3","1","1","3","67","1","Eje de Pinzas 01 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("193","3","1","1","3","67","1","Eje de Pinzas 01 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("194","3","1","1","3","67","1","Eje de Pinzas 01 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("195","3","1","1","3","67","1","Eje de Pinzas 01 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("196","3","1","1","3","67","1","Eje de Pinzas 01 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("197","3","1","1","3","67","1","Palanca de Rodillo 02 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("198","3","1","1","3","67","1","Eje de Pinzas 02 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("199","3","1","1","3","67","1","Eje de Pinzas 02 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("200","3","1","1","3","67","1","Eje de Pinzas 02 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("201","3","1","1","3","67","1","Eje de Pinzas 02 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("202","3","1","1","3","67","1","Eje de Pinzas 02 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("203","3","1","1","3","22","1","Eje de Pinzas 01 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("204","3","1","1","3","22","1","Palanca de Rodillo 01 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("205","3","1","1","3","69","1","Rueda Dentada 1 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("206","3","1","1","3","68","1","Rueda Dentada 1 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("207","3","1","1","3","74","2","Accionamiento Neumatico","0.000000","0.000000","0.000000","0.000000","1","7","1","169","","","");
INSERT INTO maquinaria_subcomponentes VALUES("208","3","1","1","3","75","3","Sistema de Pinzas 01","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("209","3","1","1","3","75","1","Sistema de Pinzas 02","0.000000","0.000000","0.000000","0.000000","1","7","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("210","3","1","1","3","26","3","Sistema de Pinzas 01","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("211","3","1","1","3","26","1","Sistema de Pinzas 02","0.000000","0.000000","0.000000","0.000000","1","7","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("212","3","1","1","3","27","3","Sistema de Pinzas 01","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("213","3","1","1","3","27","1","Sistema de Pinzas 02","0.000000","0.000000","0.000000","0.000000","1","7","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("214","3","1","1","3","28","3","Sistema de Pinzas 01","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("215","3","1","1","3","28","1","Sistema de Pinzas 02","0.000000","0.000000","0.000000","0.000000","1","7","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("216","3","1","1","3","55","3","Filtro de Aire","0.000000","0.000000","0.000000","0.000000","2","7","1","0","","","");
INSERT INTO maquinaria_subcomponentes VALUES("217","3","1","1","3","56","3","Filtro de Aire","0.000000","0.000000","0.000000","0.000000","2","7","1","0","","","");
INSERT INTO maquinaria_subcomponentes VALUES("218","3","1","1","3","34","1","Cadenas de Transmision","0.000000","0.000000","0.000000","0.000000","1","14","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("219","3","1","1","3","82","1","Cadenas de Transmision","0.000000","0.000000","0.000000","0.000000","1","14","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("220","3","2","2","4","179","3","Interior Maquina","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("221","3","2","2","4","179","3","Exterior Maquina","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("222","3","2","2","4","179","3","Pisos Perimetros Maquina","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("223","3","2","2","5","178","2","Deposito de Aceite","0.000000","0.000000","3.000000","0.000000","1","7","1","66","","","");
INSERT INTO maquinaria_subcomponentes VALUES("224","3","2","2","5","179","3","Limpieza General","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("225","3","2","2","4","94","1","Rodamiento 1","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("226","3","2","2","4","94","1","Rodamiento 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("227","3","2","2","4","95","1","Rodamiento 1","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("228","3","2","2","4","95","1","Rodamiento 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("229","3","2","2","4","96","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("230","3","2","2","4","96","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("231","3","2","2","4","96","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("232","3","2","2","4","96","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("233","3","2","2","4","104","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("234","3","2","2","4","104","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("235","3","2","2","4","104","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("236","3","2","2","4","104","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("237","3","2","2","4","105","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("238","3","2","2","4","105","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("239","3","2","2","4","105","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("240","3","2","2","4","105","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("241","3","2","2","4","106","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("242","3","2","2","4","106","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("243","3","2","2","4","106","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("244","3","2","2","4","106","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("245","3","2","2","4","107","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("246","3","2","2","4","107","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("247","3","2","2","4","107","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("248","3","2","2","4","107","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("249","3","2","2","4","108","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("250","3","2","2","4","108","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("251","3","2","2","4","108","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("252","3","2","2","4","108","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("253","3","2","2","4","109","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("254","3","2","2","4","109","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("255","3","2","2","4","109","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("256","3","2","2","4","109","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("257","3","2","2","4","114","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("258","3","2","2","4","115","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("259","3","2","2","4","116","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("260","3","2","2","4","117","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("261","3","2","2","4","118","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("262","3","2","2","4","119","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("263","3","2","2","4","120","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("264","3","2","2","4","121","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("265","3","2","2","4","122","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("266","3","2","2","4","123","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("267","3","2","2","4","124","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("268","3","2","2","4","125","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("269","3","2","2","4","134","2","Deposito de Aceite","0.000000","0.000000","3.000000","0.000000","1","7","1","66","","","");
INSERT INTO maquinaria_subcomponentes VALUES("270","3","2","2","5","94","1","Rodamiento 1","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("271","3","2","2","5","94","1","Rodamiento 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("272","3","2","2","5","95","1","Rodamiento 1","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("273","3","2","2","5","95","1","Rodamiento 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("274","3","2","2","5","96","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("275","3","2","2","5","96","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("276","3","2","2","5","96","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("277","3","2","2","5","96","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("278","3","2","2","5","104","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("279","3","2","2","5","104","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("280","3","2","2","5","104","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("281","3","2","2","5","104","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("282","3","2","2","5","142","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("283","3","2","2","5","142","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("284","3","2","2","5","142","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("285","3","2","2","5","142","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("286","3","2","2","5","106","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("287","3","2","2","5","106","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("288","3","2","2","5","106","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("289","3","2","2","5","106","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("290","3","2","2","5","107","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("291","3","2","2","5","121","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("292","3","2","2","5","107","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("293","3","2","2","5","107","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("294","3","2","2","5","108","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("295","3","2","2","5","108","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("296","3","2","2","5","108","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("297","3","2","2","5","108","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("298","3","2","2","5","146","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("299","3","2","2","5","146","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("300","3","2","2","5","146","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("301","3","2","2","5","146","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("302","3","2","2","5","114","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("303","3","2","2","5","115","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("304","3","2","2","5","151","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("305","3","2","2","5","117","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("306","3","2","2","5","153","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("307","3","2","2","5","119","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("308","3","2","2","5","120","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("309","3","2","2","5","121","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("310","3","2","2","5","157","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("311","3","2","2","5","158","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("312","3","2","2","5","124","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("313","3","2","2","5","160","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("314","3","2","2","5","178","2","Deposito de Aceite","0.000000","0.000000","3.000000","0.000000","1","7","1","66","","","");
INSERT INTO maquinaria_subcomponentes VALUES("315","3","2","2","5","126","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("316","3","2","2","5","162","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("317","3","2","2","5","128","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("318","3","2","2","5","129","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("319","3","3","3","7","134","2","Deposito de Aceite","0.000000","0.000000","3.000000","0.000000","1","7","1","76","","","");
INSERT INTO maquinaria_subcomponentes VALUES("320","3","3","3","7","181","1","Rodamiento Empuje 1","0.000000","0.000000","0.000000","0.000000","3","7","1","129","","","");
INSERT INTO maquinaria_subcomponentes VALUES("321","3","3","3","7","181","1","Rodamiento Empuje 2","0.000000","0.000000","0.000000","0.000000","3","7","1","129","","","");
INSERT INTO maquinaria_subcomponentes VALUES("322","3","3","3","7","58","1","Cadenas de Transmision","0.000000","0.000000","0.000000","0.000000","1","14","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("323","3","3","3","7","82","1","Cadenas de Transmision","0.000000","0.000000","0.000000","0.000000","1","14","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("324","3","4","4","9","187","2","Deposito de Aceite","0.000000","0.000000","2.000000","0.000000","1","365","1","76","","","");
INSERT INTO maquinaria_subcomponentes VALUES("325","3","4","4","9","188","2","Deposito de Aceite","0.000000","0.000000","45.000000","0.000000","1","365","1","0","","","");
INSERT INTO maquinaria_subcomponentes VALUES("326","3","4","4","10","187","2","Deposito de Aceite","0.000000","0.000000","2.000000","0.000000","1","365","1","76","","","");
INSERT INTO maquinaria_subcomponentes VALUES("327","3","4","4","10","192","2","Deposito de Aceite","0.000000","0.000000","35.000000","0.000000","1","365","1","0","","","");
INSERT INTO maquinaria_subcomponentes VALUES("328","3","1","1","1","22","1","Eje de Pinzas 01 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("329","3","1","1","1","22","1","Eje de Pinzas 01 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("330","3","1","1","1","22","1","Eje de Pinzas 01 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("331","3","1","1","1","22","1","Eje de Pinzas 01 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("332","3","1","1","1","22","1","Eje de Pinzas 01 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("333","3","1","1","1","22","1","Eje de Pinzas 02 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("334","3","1","1","1","22","1","Eje de Pinzas 02 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("335","3","1","1","1","22","1","Palanca de Rodillo 02 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("336","3","1","1","1","22","1","Eje de Pinzas 02 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("337","3","1","1","1","22","1","Eje de Pinzas 02 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("338","3","1","1","1","22","1","Eje de Pinzas 02 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("339","3","1","1","1","23","1","Palanca de Rodillo 01 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("340","3","1","1","1","23","1","Eje de Pinzas 01 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("341","3","1","1","1","23","1","Eje de Pinzas 01 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("342","3","1","1","1","23","1","Eje de Pinzas 01 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("343","3","1","1","1","23","1","Eje de Pinzas 01 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("344","3","1","1","1","23","1","Eje de Pinzas 01 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("345","3","1","1","1","23","1","Palanca de Rodillo 02 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("346","3","1","1","1","23","1","Eje de Pinzas 02 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("347","3","1","1","1","23","1","Eje de Pinzas 02 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("348","3","1","1","1","23","1","Eje de Pinzas 02 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("349","3","1","1","1","23","1","Eje de Pinzas 02 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("350","3","1","1","1","23","1","Eje de Pinzas 02 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("351","3","1","1","1","24","1","Rueda Dentada  LI","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("352","3","1","1","3","65","1","Palanca de Rodillo","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("353","3","1","1","1","20","1","Registro de Ajuste","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("354","3","1","1","3","18","1","Registro de Ajuste","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("355","3","1","1","3","22","1","Eje de Pinzas 01 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("356","3","1","1","3","22","1","Eje de Pinzas 01 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("357","3","1","1","3","22","1","Eje de Pinzas 01 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("358","3","1","1","3","22","1","Eje de Pinzas 01 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("359","3","1","1","3","22","1","Palanca de Rodillo 02 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("360","3","1","1","3","22","1","Eje de Pinzas 02 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("361","3","1","1","3","22","1","Eje de Pinzas 02 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("362","3","1","1","3","22","1","Eje de Pinzas 02 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("363","3","1","1","3","22","1","Eje de Pinzas 02 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("364","3","1","1","3","22","1","Eje de Pinzas 02 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("365","3","1","1","3","23","1","Palanca de Rodillo 01 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("366","3","1","1","3","23","1","Eje de Pinzas 01 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("367","3","1","1","3","23","1","Eje de Pinzas 01 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("368","3","1","1","3","23","1","Eje de Pinzas 01 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("369","3","1","1","3","23","1","Eje de Pinzas 01 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("370","3","1","1","3","23","1","Eje de Pinzas 01 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("371","3","1","1","3","23","1","Palanca de Rodillo 02 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("372","3","1","1","3","23","1","Eje de Pinzas 02 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("373","3","1","1","3","23","1","Eje de Pinzas 02 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("374","3","1","1","3","23","1","Eje de Pinzas 02 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("375","3","1","1","3","23","1","Eje de Pinzas 02 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("376","3","1","1","3","23","1","Eje de Pinzas 02 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("377","3","1","1","3","24","1","Rueda Dentada  LI","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("378","3","1","1","3","36","3","Limpieza General","0.000000","0.000000","0.000000","1.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("379","3","1","1","1","36","3","Limpieza General","0.000000","0.000000","0.000000","1.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("380","3","1","1","2","18","1","Registro de Ajuste","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("381","3","1","1","2","22","1","Eje de Pinzas 01 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("382","3","1","1","2","22","1","Eje de Pinzas 01 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("383","3","1","1","2","22","1","Eje de Pinzas 01 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("384","3","1","1","2","22","1","Eje de Pinzas 01 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("385","3","1","1","2","22","1","Palanca de Rodillo 02 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("386","3","1","1","2","23","1","Eje de Pinzas 02 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("387","3","1","1","2","23","1","Eje de Pinzas 02 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("388","3","1","1","2","23","1","Eje de Pinzas 02 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("389","3","1","1","2","23","1","Eje de Pinzas 02 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("390","3","1","1","2","23","1","Eje de Pinzas 02 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("391","3","1","1","2","36","3","Limpieza General","0.000000","0.000000","0.000000","1.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("392","3","1","1","2","24","1","Rueda Dentada  LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("393","3","8","2","4","110","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("394","3","8","2","4","110","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("395","3","8","2","4","110","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("396","3","8","2","4","110","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("397","3","8","2","4","111","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("398","3","8","2","4","111","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("399","3","8","2","4","111","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("400","3","8","2","4","111","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("401","3","8","2","4","112","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("402","3","8","2","4","112","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("403","3","8","2","4","112","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("404","3","8","2","4","112","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("405","3","8","2","4","113","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("406","3","8","2","4","113","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("407","3","8","2","4","113","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("408","3","8","2","4","113","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("409","3","8","2","4","126","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("410","3","8","2","4","127","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("411","3","8","2","4","128","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("412","3","8","2","4","129","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("413","3","8","2","4","130","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("414","3","8","2","4","131","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("415","3","8","2","4","132","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("416","3","8","2","4","133","1","Eje Hidraulico","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("417","3","8","2","4","84","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("418","3","8","2","4","84","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("419","3","8","2","4","84","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("420","3","8","2","4","98","1","Punto Cilindro ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("421","3","8","2","5","98","1","Punto Cilindro ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("422","3","8","2","5","147","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("423","3","8","2","5","147","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("424","3","8","2","5","147","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("425","3","8","2","5","147","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("426","3","8","2","5","111","1","Guia Deslizamiento 1","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("427","3","8","2","5","111","1","Guia Deslizamiento 2","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("428","3","8","2","5","111","1","Guia Deslizamiento 3","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("429","3","8","2","5","111","1","Guia Deslizamiento 4","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("430","3","8","2","4","85","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("431","3","8","2","4","85","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("432","3","8","2","4","85","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("433","3","8","2","4","86","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("434","3","8","2","4","86","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("435","3","8","2","4","86","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("436","3","8","2","4","87","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("437","3","8","2","4","87","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("438","3","8","2","4","87","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("439","3","8","2","4","88","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("440","3","8","2","4","88","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("441","3","8","2","4","88","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("442","3","8","2","4","89","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("443","3","8","2","4","89","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("444","3","8","2","4","89","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("445","3","8","2","4","90","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("446","3","8","2","4","90","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("447","3","8","2","4","90","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("448","3","8","2","4","91","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("449","3","8","2","4","91","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("450","3","8","2","4","91","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("451","3","8","2","4","92","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("452","3","8","2","4","92","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("453","3","8","2","4","92","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("454","3","8","2","4","93","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("455","3","8","2","4","93","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("456","3","8","2","4","93","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("457","3","8","2","4","97","2","Caja de Engranaje 1","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("458","3","8","2","4","100","2","Caja de Engranaje 1","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("459","3","8","2","4","99","2","Caja de Engranaje 1","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("460","3","8","2","4","101","1","LOO Cilindro contrapresion","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("461","3","8","2","4","101","1","LO Cilindro Contrapresion","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("462","3","8","2","4","102","1","LO Rodillo troquel","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("463","3","8","2","4","102","1","LOO Rodillo troquel","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("464","3","8","2","4","103","1","Ruedas Dentadas rodillos","0.000000","0.000000","0.000000","0.000000","1","7","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("465","3","8","2","4","135","3","Limpieza General","0.000000","0.000000","0.000000","1.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("466","3","8","2","5","165","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("467","3","8","2","5","165","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("468","3","8","2","5","165","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("469","3","8","2","5","85","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("470","3","8","2","5","85","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("471","3","8","2","5","85","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("472","3","8","2","5","86","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("473","3","8","2","5","86","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("474","3","8","2","5","86","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("475","3","8","2","5","87","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("476","3","8","2","5","87","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("477","3","8","2","5","87","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("478","3","8","2","5","88","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("479","3","8","2","5","88","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("480","3","8","2","5","88","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("481","3","8","2","5","89","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("482","3","8","2","5","89","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("483","3","8","2","5","89","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("484","3","8","2","5","171","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("485","3","8","2","5","171","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("486","3","8","2","5","171","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("487","3","8","2","5","91","2","Caja de Engranaje 1- Eje Presion Trasero","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("488","3","8","2","5","91","2","Caja de Engranaje 2 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("489","3","8","2","5","91","2","Caja de Engranaje 3 - Puente de Impresion","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("490","3","8","2","5","173","2","Caja de Engranaje 1","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("491","3","8","2","5","97","2","Caja de Engranaje 1","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("492","3","8","2","5","174","2","Caja de Engranaje 1","0.000000","0.000000","1.000000","0.000000","1","365","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("493","3","8","2","5","101","1","LO Cilindro Contrapresion","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("494","3","8","2","5","101","1","LOO Cilindro contrapresion","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("495","3","8","2","5","102","1","LO Rodillo troquel","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("496","3","8","2","5","102","1","LOO Rodillo troquel","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("497","3","8","2","5","103","1","Ruedas Dentadas rodillos","0.000000","0.000000","0.000000","0.000000","1","7","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("498","3","3","3","7","184","1","Punto Grasa 01 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("499","3","3","3","7","181","1","Punto Grasa 01 ","0.000000","0.000000","0.000000","0.000000","3","7","1","129","","","");
INSERT INTO maquinaria_subcomponentes VALUES("500","3","3","3","7","185","3","Maquina KAMA","0.000000","0.000000","0.000000","1.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("501","3","4","4","9","186","1","Punto de Grasa 01 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("502","3","4","4","9","186","1","Punto de Grasa 02 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("503","3","4","4","9","186","1","Punto de Grasa 03 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("504","3","4","4","9","186","1","Punto de Grasa 04 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("505","3","4","4","9","186","1","Punto de Grasa 05 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("506","3","4","4","9","186","1","Punto de Grasa 06 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("507","3","4","4","9","186","1","Punto de Grasa 07 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("508","3","4","4","9","186","1","Punto de Grasa 08 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("509","3","4","4","9","186","3","Limpieza General","0.000000","0.000000","0.000000","1.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("510","3","1","1","2","58","1","Punto Grasa 01 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("511","3","1","1","2","58","1","Punto Grasa 02 LS ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("512","3","1","1","2","58","1","Punto Grasa 01 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("513","3","1","1","2","58","1","Punto Grasa 02 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("514","3","1","1","3","34","1","Punto Grasa 01 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("515","3","1","1","3","34","1","Punto Grasa 02 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("516","3","1","1","3","34","1","Punto Grasa 01 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("517","3","1","1","3","34","1","Punto Grasa 02 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("518","3","1","1","1","34","1","Punto Grasa 01 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("519","3","1","1","1","34","1","Punto Grasa 02 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("520","3","1","1","1","34","1","Punto Grasa 01 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("521","3","1","1","1","34","1","Punto Grasa 02 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("522","3","1","1","2","22","1","Eje de Pinzas 02 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("523","3","1","1","2","22","1","Eje de Pinzas 02 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("524","3","1","1","2","22","1","Eje de Pinzas 02 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("525","3","1","1","2","22","1","Eje de Pinzas 02 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("526","3","1","1","2","22","1","Eje de Pinzas 02 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("527","3","1","1","2","23","1","Eje de Pinzas 01 Cojinete 1 LS","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("528","3","1","1","2","23","1","Eje de Pinzas 01 Cojinete 2","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("529","3","1","1","2","23","1","Eje de Pinzas 01 Cojinete 4","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("530","3","1","1","2","23","1","Eje de Pinzas 01 Cojinete 3","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("531","3","1","1","2","23","1","Eje de Pinzas 01 Cojinete 5 LI","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("532","3","1","1","2","23","1","Palanca de Rodillo 01 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("533","3","1","1","2","23","1","Palanca de Rodillo 02 LS","0.000000","0.000000","0.000000","0.000000","3","7","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("534","3","4","4","10","186","1","Punto de Grasa 01 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("535","3","4","4","10","186","1","Punto de Grasa 02 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("536","3","4","4","10","186","1","Punto de Grasa 03 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("537","3","4","4","10","186","1","Punto de Grasa 04 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("538","3","4","4","10","186","1","Punto de Grasa 05 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("539","3","4","4","10","186","1","Punto de Grasa 06 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("540","3","4","4","10","186","1","Punto de Grasa 07 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("541","3","4","4","10","186","1","Punto de Grasa 08 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("542","3","4","4","10","193","3","Limpieza General","0.000000","0.000000","0.000000","0.000000","1","14","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("543","3","5","5","11","186","1","Punto de Grasa 01 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("544","3","5","5","11","194","3","Limpieza General","0.000000","0.000000","0.000000","0.000000","1","14","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("545","3","5","5","12","186","1","Punto de Grasa 01 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("546","3","5","5","12","196","3","Limpieza General","0.000000","0.000000","0.000000","0.000000","1","14","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("547","3","5","5","13","186","1","Punto de Grasa 01 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("548","3","5","5","13","210","3","Limpieza General","0.000000","0.000000","0.000000","0.000000","1","14","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("549","3","6","6","14","134","2","Sistema Hidraulico Deposito de Aceite  ","0.000000","0.000000","0.000000","0.000000","1","7","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("550","3","6","6","14","58","2","Punto de Aceite 01 ","0.000000","0.000000","0.000000","0.000000","1","14","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("551","3","6","6","14","82","2","Punto de Aceite 01 ","0.000000","0.000000","0.000000","0.000000","1","14","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("552","3","6","6","14","203","1","Punto de Grasa 01 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("553","3","6","6","14","204","1","Punto de Grasa 01 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("554","3","6","6","14","205","3","Limpieza General","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("555","3","7","7","15","195","1","Punto de Grasa 01 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("556","3","7","7","15","207","3","Limpieza General","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("557","3","7","7","16","195","1","Punto de Grasa 01 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("558","3","7","7","16","211","3","Limpieza General","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("559","3","6","6","14","134","2","Sistema Hidraulico Deposito de Aceite  ","0.000000","0.000000","0.000000","0.000000","1","7","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("560","3","6","6","14","58","2","Punto de Aceite 01 ","0.000000","0.000000","0.000000","0.000000","1","14","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("561","3","6","6","14","82","2","Punto de Aceite 01 ","0.000000","0.000000","0.000000","0.000000","1","14","1","179","","","");
INSERT INTO maquinaria_subcomponentes VALUES("562","3","6","6","14","203","1","Punto de Grasa 01 ","0.000000","0.000000","0.000000","0.000000","3","14","1","168","","","");
INSERT INTO maquinaria_subcomponentes VALUES("563","3","6","6","14","204","1","Punto de Grasa 01 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("564","3","6","6","14","205","3","Limpieza General","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("565","3","7","7","15","195","1","Punto de Grasa 01 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");
INSERT INTO maquinaria_subcomponentes VALUES("566","3","7","7","15","207","3","Limpieza General","0.000000","0.000000","0.000000","0.000000","1","7","1","177","","","");
INSERT INTO maquinaria_subcomponentes VALUES("567","3","7","7","16","195","1","Punto de Grasa 01 ","0.000000","0.000000","0.000000","0.000000","3","14","1","119","","","");



DROP TABLE maquinaria_subcomponentes_frec;

CREATE TABLE `maquinaria_subcomponentes_frec` (
  `idFrecuencia` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idFrecuencia`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO maquinaria_subcomponentes_frec VALUES("1","Dias");
INSERT INTO maquinaria_subcomponentes_frec VALUES("2","Horas");



DROP TABLE maquinaria_subcomponentes_tipo;

CREATE TABLE `maquinaria_subcomponentes_tipo` (
  `idSubTipo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idSubTipo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO maquinaria_subcomponentes_tipo VALUES("1","Grasa");
INSERT INTO maquinaria_subcomponentes_tipo VALUES("2","Aceite");
INSERT INTO maquinaria_subcomponentes_tipo VALUES("3","Normal");



DROP TABLE mnt_base;

CREATE TABLE `mnt_base` (
  `idRespaldo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`idRespaldo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO mnt_base VALUES("1","backup-2015-11-04.sql","2015-11-04");



DROP TABLE mnt_imagenes_categorias;

CREATE TABLE `mnt_imagenes_categorias` (
  `idCatimg` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idCatimg`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Limpiable';

INSERT INTO mnt_imagenes_categorias VALUES("1","Iconos");
INSERT INTO mnt_imagenes_categorias VALUES("2","Botones");



DROP TABLE mnt_imagenes_listado;

CREATE TABLE `mnt_imagenes_listado` (
  `idListimg` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCatimg` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `file` varchar(120) NOT NULL,
  PRIMARY KEY (`idListimg`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COMMENT='Limpiable';

INSERT INTO mnt_imagenes_listado VALUES("1","1","accidentes","icn_map_alerta.png");
INSERT INTO mnt_imagenes_listado VALUES("2","1","calle cerrada","icn_map_peligro.png");
INSERT INTO mnt_imagenes_listado VALUES("3","1","Peligro","icn_map_robo_visto.png");
INSERT INTO mnt_imagenes_listado VALUES("4","1","Persona Sospechosa","icn_map_ladron.png");
INSERT INTO mnt_imagenes_listado VALUES("5","1","Solicitud de ayuda","icn_map_close.png");
INSERT INTO mnt_imagenes_listado VALUES("6","1","Recepcion llamada taxi","icn_map_pass.png");
INSERT INTO mnt_imagenes_listado VALUES("7","1","Robo Vehiculo","icn_map_robo_vehiculo.png");
INSERT INTO mnt_imagenes_listado VALUES("8","1","Solicitud Taxi","icn_map_taxi.png");
INSERT INTO mnt_imagenes_listado VALUES("9","2","Espia","icn_espia.png");
INSERT INTO mnt_imagenes_listado VALUES("10","2","Sosclick","icn_sosclick.png");
INSERT INTO mnt_imagenes_listado VALUES("11","2","transantiago","icn_transantiago.png");
INSERT INTO mnt_imagenes_listado VALUES("12","2","boton sosclick alerta","icn_sosclick_alerta.png");
INSERT INTO mnt_imagenes_listado VALUES("13","2","boton carrete seguro","icn_carrete_seguro.png");
INSERT INTO mnt_imagenes_listado VALUES("14","2","boton enviar ubicacion","icn_carrete_enviar_ubicacion.png");
INSERT INTO mnt_imagenes_listado VALUES("15","2","boton carrete seguro 2","icn_enviar_ubicacion.png");
INSERT INTO mnt_imagenes_listado VALUES("16","2","boton pide mapa","icn_pide_mapa.png");
INSERT INTO mnt_imagenes_listado VALUES("17","2","boton llegue a destino","icn_carrete_llegue.png");
INSERT INTO mnt_imagenes_listado VALUES("18","2","boton sin transporte","icn_carrete_sintransporte.png");
INSERT INTO mnt_imagenes_listado VALUES("19","2","boton llamame","icn_carrete_llamame.png");
INSERT INTO mnt_imagenes_listado VALUES("20","2","volver sosclick","icn_soscloc_tit.png");
INSERT INTO mnt_imagenes_listado VALUES("21","2","texto sosclick","icn_texto_ppal.png");
INSERT INTO mnt_imagenes_listado VALUES("22","2","boton volver carrete seguro","icn_carrete_tit.png");
INSERT INTO mnt_imagenes_listado VALUES("23","2","texto carrete seguro","icn_texto_carrete.png");



DROP TABLE mnt_ubicacion_ciudad;

CREATE TABLE `mnt_ubicacion_ciudad` (
  `idCiudad` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idCiudad`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO mnt_ubicacion_ciudad VALUES("14","Región de Los Ríos");
INSERT INTO mnt_ubicacion_ciudad VALUES("13","Región Metropolitana");
INSERT INTO mnt_ubicacion_ciudad VALUES("12","Región de Magallanes y la Antártica Chilena");
INSERT INTO mnt_ubicacion_ciudad VALUES("11","Región de Aysén del General Carlos Ibáñez del Campo");
INSERT INTO mnt_ubicacion_ciudad VALUES("10","Región de Los Lagos");
INSERT INTO mnt_ubicacion_ciudad VALUES("9","Región de la Araucanía");
INSERT INTO mnt_ubicacion_ciudad VALUES("8","Región del Bío-Bío");
INSERT INTO mnt_ubicacion_ciudad VALUES("7","Región del Maule");
INSERT INTO mnt_ubicacion_ciudad VALUES("6","Región del Libertador General Bernardo O Higgins");
INSERT INTO mnt_ubicacion_ciudad VALUES("5","Región de Valparaiso");
INSERT INTO mnt_ubicacion_ciudad VALUES("4","Región de Coquimbo");
INSERT INTO mnt_ubicacion_ciudad VALUES("3","Región de Atacama");
INSERT INTO mnt_ubicacion_ciudad VALUES("2","Región de Antofagasta");
INSERT INTO mnt_ubicacion_ciudad VALUES("1","Región de Tarapacá");
INSERT INTO mnt_ubicacion_ciudad VALUES("15","Región de Arica y Parinacota");



DROP TABLE mnt_ubicacion_comunas;

CREATE TABLE `mnt_ubicacion_comunas` (
  `idComuna` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idCiudad` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idComuna`)
) ENGINE=MyISAM AUTO_INCREMENT=347 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO mnt_ubicacion_comunas VALUES("346","1","ALTO HOSPICIO");
INSERT INTO mnt_ubicacion_comunas VALUES("296","1","CAMINA");
INSERT INTO mnt_ubicacion_comunas VALUES("297","1","COLCHANE");
INSERT INTO mnt_ubicacion_comunas VALUES("3","1","HUARA");
INSERT INTO mnt_ubicacion_comunas VALUES("2","1","IQUIQUE");
INSERT INTO mnt_ubicacion_comunas VALUES("4","1","PICA");
INSERT INTO mnt_ubicacion_comunas VALUES("5","1","POZO ALMONTE");
INSERT INTO mnt_ubicacion_comunas VALUES("7","2","ANTOFAGASTA");
INSERT INTO mnt_ubicacion_comunas VALUES("10","2","CALAMA");
INSERT INTO mnt_ubicacion_comunas VALUES("298","2","MARIA ELENA");
INSERT INTO mnt_ubicacion_comunas VALUES("8","2","MEJILLONES");
INSERT INTO mnt_ubicacion_comunas VALUES("300","2","OLLAGÜE");
INSERT INTO mnt_ubicacion_comunas VALUES("301","2","SAN PEDRO DE ATACAMA");
INSERT INTO mnt_ubicacion_comunas VALUES("299","2","SIERRA GORDA");
INSERT INTO mnt_ubicacion_comunas VALUES("9","2","TALTAL");
INSERT INTO mnt_ubicacion_comunas VALUES("6","2","TOCOPILLA");
INSERT INTO mnt_ubicacion_comunas VALUES("302","3","ALTO DEL CARMEN");
INSERT INTO mnt_ubicacion_comunas VALUES("14","3","CALDERA");
INSERT INTO mnt_ubicacion_comunas VALUES("11","3","CHAÑARAL");
INSERT INTO mnt_ubicacion_comunas VALUES("13","3","COPIAPO");
INSERT INTO mnt_ubicacion_comunas VALUES("12","3","DIEGO DE ALMAGRO");
INSERT INTO mnt_ubicacion_comunas VALUES("17","3","FREIRINA");
INSERT INTO mnt_ubicacion_comunas VALUES("18","3","HUASCO");
INSERT INTO mnt_ubicacion_comunas VALUES("15","3","TIERRA AMARILLA");
INSERT INTO mnt_ubicacion_comunas VALUES("16","3","VALLENAR");
INSERT INTO mnt_ubicacion_comunas VALUES("22","4","ANDACOLLO");
INSERT INTO mnt_ubicacion_comunas VALUES("31","4","CANELA");
INSERT INTO mnt_ubicacion_comunas VALUES("29","4","COMBARBALA");
INSERT INTO mnt_ubicacion_comunas VALUES("21","4","COQUIMBO");
INSERT INTO mnt_ubicacion_comunas VALUES("30","4","ILLAPEL");
INSERT INTO mnt_ubicacion_comunas VALUES("20","4","LA HIGUERA");
INSERT INTO mnt_ubicacion_comunas VALUES("19","4","LA SERENA");
INSERT INTO mnt_ubicacion_comunas VALUES("33","4","LOS VILOS");
INSERT INTO mnt_ubicacion_comunas VALUES("26","4","MONTE PATRIA");
INSERT INTO mnt_ubicacion_comunas VALUES("25","4","OVALLE");
INSERT INTO mnt_ubicacion_comunas VALUES("24","4","PAIHUANO");
INSERT INTO mnt_ubicacion_comunas VALUES("27","4","PUNITAQUI");
INSERT INTO mnt_ubicacion_comunas VALUES("28","4","RIO HURTADO");
INSERT INTO mnt_ubicacion_comunas VALUES("32","4","SALAMANCA");
INSERT INTO mnt_ubicacion_comunas VALUES("23","4","VICUÑA");
INSERT INTO mnt_ubicacion_comunas VALUES("44","5","ALGARROBO");
INSERT INTO mnt_ubicacion_comunas VALUES("56","5","CABILDO");
INSERT INTO mnt_ubicacion_comunas VALUES("67","5","CALLE LARGA");
INSERT INTO mnt_ubicacion_comunas VALUES("46","5","CARTAGENA");
INSERT INTO mnt_ubicacion_comunas VALUES("40","5","CASABLANCA");
INSERT INTO mnt_ubicacion_comunas VALUES("63","5","CATEMU");
INSERT INTO mnt_ubicacion_comunas VALUES("340","5","CONCON");
INSERT INTO mnt_ubicacion_comunas VALUES("45","5","EL QUISCO");
INSERT INTO mnt_ubicacion_comunas VALUES("47","5","EL TABO");
INSERT INTO mnt_ubicacion_comunas VALUES("51","5","HIJUELAS");
INSERT INTO mnt_ubicacion_comunas VALUES("41","5","ISLA DE PASCUA");
INSERT INTO mnt_ubicacion_comunas VALUES("321","5","JUAN FERNANDEZ");
INSERT INTO mnt_ubicacion_comunas VALUES("50","5","LA CALERA");
INSERT INTO mnt_ubicacion_comunas VALUES("49","5","LA CRUZ");
INSERT INTO mnt_ubicacion_comunas VALUES("59","5","LA LIGUA");
INSERT INTO mnt_ubicacion_comunas VALUES("53","5","LIMACHE");
INSERT INTO mnt_ubicacion_comunas VALUES("65","5","LLAY LLAY");
INSERT INTO mnt_ubicacion_comunas VALUES("66","5","LOS ANDES");
INSERT INTO mnt_ubicacion_comunas VALUES("52","5","NOGALES");
INSERT INTO mnt_ubicacion_comunas VALUES("54","5","OLMUE");
INSERT INTO mnt_ubicacion_comunas VALUES("62","5","PANQUEHUE");
INSERT INTO mnt_ubicacion_comunas VALUES("57","5","PAPUDO");
INSERT INTO mnt_ubicacion_comunas VALUES("55","5","PETORCA");
INSERT INTO mnt_ubicacion_comunas VALUES("36","5","PUCHUNCAVI");
INSERT INTO mnt_ubicacion_comunas VALUES("61","5","PUTAENDO");
INSERT INTO mnt_ubicacion_comunas VALUES("48","5","QUILLOTA");
INSERT INTO mnt_ubicacion_comunas VALUES("38","5","QUILPUE");
INSERT INTO mnt_ubicacion_comunas VALUES("35","5","QUINTERO");
INSERT INTO mnt_ubicacion_comunas VALUES("68","5","RINCONADA");
INSERT INTO mnt_ubicacion_comunas VALUES("42","5","SAN ANTONIO");
INSERT INTO mnt_ubicacion_comunas VALUES("69","5","SAN ESTEBAN");
INSERT INTO mnt_ubicacion_comunas VALUES("60","5","SAN FELIPE");
INSERT INTO mnt_ubicacion_comunas VALUES("64","5","SANTA MARIA");
INSERT INTO mnt_ubicacion_comunas VALUES("43","5","SANTO DOMINGO");
INSERT INTO mnt_ubicacion_comunas VALUES("34","5","VALPARAISO");
INSERT INTO mnt_ubicacion_comunas VALUES("39","5","VILLA ALEMANA");
INSERT INTO mnt_ubicacion_comunas VALUES("37","5","VIÑA DEL MAR");
INSERT INTO mnt_ubicacion_comunas VALUES("58","5","ZAPALLAR");
INSERT INTO mnt_ubicacion_comunas VALUES("132","6","CHEPICA");
INSERT INTO mnt_ubicacion_comunas VALUES("125","6","CHIMBARONGO");
INSERT INTO mnt_ubicacion_comunas VALUES("110","6","CODEGUA");
INSERT INTO mnt_ubicacion_comunas VALUES("114","6","COINCO");
INSERT INTO mnt_ubicacion_comunas VALUES("113","6","COLTAUCO");
INSERT INTO mnt_ubicacion_comunas VALUES("112","6","DOÑIHUE");
INSERT INTO mnt_ubicacion_comunas VALUES("107","6","GRANEROS");
INSERT INTO mnt_ubicacion_comunas VALUES("139","6","LA ESTRELLA");
INSERT INTO mnt_ubicacion_comunas VALUES("116","6","LAS CABRAS");
INSERT INTO mnt_ubicacion_comunas VALUES("136","6","LITUECHE");
INSERT INTO mnt_ubicacion_comunas VALUES("129","6","LOLOL");
INSERT INTO mnt_ubicacion_comunas VALUES("106","6","MACHALI");
INSERT INTO mnt_ubicacion_comunas VALUES("122","6","MALLOA");
INSERT INTO mnt_ubicacion_comunas VALUES("134","6","MARCHIGUE");
INSERT INTO mnt_ubicacion_comunas VALUES("126","6","NANCAGUA");
INSERT INTO mnt_ubicacion_comunas VALUES("138","6","NAVIDAD");
INSERT INTO mnt_ubicacion_comunas VALUES("120","6","OLIVAR");
INSERT INTO mnt_ubicacion_comunas VALUES("130","6","PALMILLA");
INSERT INTO mnt_ubicacion_comunas VALUES("133","6","PAREDONES");
INSERT INTO mnt_ubicacion_comunas VALUES("131","6","PERALILLO");
INSERT INTO mnt_ubicacion_comunas VALUES("115","6","PEUMO");
INSERT INTO mnt_ubicacion_comunas VALUES("118","6","PICHIDEGUA");
INSERT INTO mnt_ubicacion_comunas VALUES("137","6","PICHILEMU");
INSERT INTO mnt_ubicacion_comunas VALUES("127","6","PLACILLA");
INSERT INTO mnt_ubicacion_comunas VALUES("135","6","PUMANQUE");
INSERT INTO mnt_ubicacion_comunas VALUES("123","6","QUINTA DE TILCOCO");
INSERT INTO mnt_ubicacion_comunas VALUES("105","6","RANCAGUA");
INSERT INTO mnt_ubicacion_comunas VALUES("121","6","RENGO");
INSERT INTO mnt_ubicacion_comunas VALUES("119","6","REQUINOA");
INSERT INTO mnt_ubicacion_comunas VALUES("124","6","SAN FERNANDO");
INSERT INTO mnt_ubicacion_comunas VALUES("111","6","SAN FRANCISCO DE MOSTAZAL");
INSERT INTO mnt_ubicacion_comunas VALUES("117","6","SAN VICENTE");
INSERT INTO mnt_ubicacion_comunas VALUES("128","6","SANTA CRUZ");
INSERT INTO mnt_ubicacion_comunas VALUES("166","7","CAUQUENES");
INSERT INTO mnt_ubicacion_comunas VALUES("167","7","CHANCO");
INSERT INTO mnt_ubicacion_comunas VALUES("161","7","COLBUN");
INSERT INTO mnt_ubicacion_comunas VALUES("157","7","CONSTITUCION");
INSERT INTO mnt_ubicacion_comunas VALUES("155","7","CUREPTO");
INSERT INTO mnt_ubicacion_comunas VALUES("140","7","CURICO");
INSERT INTO mnt_ubicacion_comunas VALUES("158","7","EMPEDRADO");
INSERT INTO mnt_ubicacion_comunas VALUES("144","7","HUALAÑE");
INSERT INTO mnt_ubicacion_comunas VALUES("145","7","LICANTEN");
INSERT INTO mnt_ubicacion_comunas VALUES("159","7","LINARES");
INSERT INTO mnt_ubicacion_comunas VALUES("162","7","LONGAVI");
INSERT INTO mnt_ubicacion_comunas VALUES("154","7","MAULE");
INSERT INTO mnt_ubicacion_comunas VALUES("147","7","MOLINA");
INSERT INTO mnt_ubicacion_comunas VALUES("164","7","PARRAL");
INSERT INTO mnt_ubicacion_comunas VALUES("152","7","PELARCO");
INSERT INTO mnt_ubicacion_comunas VALUES("320","7","PELLUHUE");
INSERT INTO mnt_ubicacion_comunas VALUES("153","7","PENCAHUE");
INSERT INTO mnt_ubicacion_comunas VALUES("143","7","RAUCO");
INSERT INTO mnt_ubicacion_comunas VALUES("165","7","RETIRO");
INSERT INTO mnt_ubicacion_comunas VALUES("149","7","RIO CLARO");
INSERT INTO mnt_ubicacion_comunas VALUES("141","7","ROMERAL");
INSERT INTO mnt_ubicacion_comunas VALUES("148","7","SAGRADA FAMILIA");
INSERT INTO mnt_ubicacion_comunas VALUES("151","7","SAN CLEMENTE");
INSERT INTO mnt_ubicacion_comunas VALUES("156","7","SAN JAVIER");
INSERT INTO mnt_ubicacion_comunas VALUES("341","7","SAN RAFAEL");
INSERT INTO mnt_ubicacion_comunas VALUES("150","7","TALCA");
INSERT INTO mnt_ubicacion_comunas VALUES("142","7","TENO");
INSERT INTO mnt_ubicacion_comunas VALUES("146","7","VICHUQUEN");
INSERT INTO mnt_ubicacion_comunas VALUES("163","7","VILLA ALEGRE");
INSERT INTO mnt_ubicacion_comunas VALUES("160","7","YERBAS BUENAS");
INSERT INTO mnt_ubicacion_comunas VALUES("303","8","ANTUCO");
INSERT INTO mnt_ubicacion_comunas VALUES("198","8","ARAUCO");
INSERT INTO mnt_ubicacion_comunas VALUES("180","8","BULNES");
INSERT INTO mnt_ubicacion_comunas VALUES("208","8","CABRERO");
INSERT INTO mnt_ubicacion_comunas VALUES("201","8","CAÑETE");
INSERT INTO mnt_ubicacion_comunas VALUES("344","8","CHIGUAYANTE");
INSERT INTO mnt_ubicacion_comunas VALUES("168","8","CHILLAN");
INSERT INTO mnt_ubicacion_comunas VALUES("342","8","CHILLAN VIEJO");
INSERT INTO mnt_ubicacion_comunas VALUES("175","8","COBQUECURA");
INSERT INTO mnt_ubicacion_comunas VALUES("186","8","COELEMU");
INSERT INTO mnt_ubicacion_comunas VALUES("170","8","COIHUECO");
INSERT INTO mnt_ubicacion_comunas VALUES("188","8","CONCEPCION");
INSERT INTO mnt_ubicacion_comunas VALUES("202","8","CONTULMO");
INSERT INTO mnt_ubicacion_comunas VALUES("194","8","CORONEL");
INSERT INTO mnt_ubicacion_comunas VALUES("197","8","CURANILAHUE");
INSERT INTO mnt_ubicacion_comunas VALUES("185","8","EL CARMEN");
INSERT INTO mnt_ubicacion_comunas VALUES("193","8","FLORIDA");
INSERT INTO mnt_ubicacion_comunas VALUES("192","8","HUALQUI");
INSERT INTO mnt_ubicacion_comunas VALUES("210","8","LAJA");
INSERT INTO mnt_ubicacion_comunas VALUES("199","8","LEBU");
INSERT INTO mnt_ubicacion_comunas VALUES("200","8","LOS ALAMOS");
INSERT INTO mnt_ubicacion_comunas VALUES("204","8","LOS ANGELES");
INSERT INTO mnt_ubicacion_comunas VALUES("195","8","LOTA");
INSERT INTO mnt_ubicacion_comunas VALUES("214","8","MULCHEN");
INSERT INTO mnt_ubicacion_comunas VALUES("212","8","NACIMIENTO");
INSERT INTO mnt_ubicacion_comunas VALUES("213","8","NEGRETE");
INSERT INTO mnt_ubicacion_comunas VALUES("174","8","NINHUE");
INSERT INTO mnt_ubicacion_comunas VALUES("184","8","PEMUCO");
INSERT INTO mnt_ubicacion_comunas VALUES("191","8","PENCO");
INSERT INTO mnt_ubicacion_comunas VALUES("169","8","PINTO");
INSERT INTO mnt_ubicacion_comunas VALUES("171","8","PORTEZUELO");
INSERT INTO mnt_ubicacion_comunas VALUES("215","8","QUILACO");
INSERT INTO mnt_ubicacion_comunas VALUES("206","8","QUILLECO");
INSERT INTO mnt_ubicacion_comunas VALUES("182","8","QUILLON");
INSERT INTO mnt_ubicacion_comunas VALUES("172","8","QUIRIHUE");
INSERT INTO mnt_ubicacion_comunas VALUES("187","8","RANQUIL");
INSERT INTO mnt_ubicacion_comunas VALUES("176","8","SAN CARLOS");
INSERT INTO mnt_ubicacion_comunas VALUES("178","8","SAN FABIAN");
INSERT INTO mnt_ubicacion_comunas VALUES("177","8","SAN GREGORIO DE ÑIQUEN");
INSERT INTO mnt_ubicacion_comunas VALUES("181","8","SAN IGNACIO");
INSERT INTO mnt_ubicacion_comunas VALUES("179","8","SAN NICOLAS");
INSERT INTO mnt_ubicacion_comunas VALUES("343","8","SAN PEDRO DE LA PAZ");
INSERT INTO mnt_ubicacion_comunas VALUES("211","8","SAN ROSENDO");
INSERT INTO mnt_ubicacion_comunas VALUES("205","8","SANTA BARBARA");
INSERT INTO mnt_ubicacion_comunas VALUES("196","8","SANTA JUANA");
INSERT INTO mnt_ubicacion_comunas VALUES("189","8","TALCAHUANO");
INSERT INTO mnt_ubicacion_comunas VALUES("203","8","TIRUA");
INSERT INTO mnt_ubicacion_comunas VALUES("190","8","TOME");
INSERT INTO mnt_ubicacion_comunas VALUES("173","8","TREHUACO");
INSERT INTO mnt_ubicacion_comunas VALUES("209","8","TUCAPEL");
INSERT INTO mnt_ubicacion_comunas VALUES("207","8","YUMBEL");
INSERT INTO mnt_ubicacion_comunas VALUES("183","8","YUNGAY");
INSERT INTO mnt_ubicacion_comunas VALUES("216","9","ANGOL");
INSERT INTO mnt_ubicacion_comunas VALUES("235","9","CARAHUE");
INSERT INTO mnt_ubicacion_comunas VALUES("220","9","COLLIPULLI");
INSERT INTO mnt_ubicacion_comunas VALUES("230","9","CUNCO");
INSERT INTO mnt_ubicacion_comunas VALUES("225","9","CURACAUTIN");
INSERT INTO mnt_ubicacion_comunas VALUES("305","9","CURARREHUE");
INSERT INTO mnt_ubicacion_comunas VALUES("221","9","ERCILLA");
INSERT INTO mnt_ubicacion_comunas VALUES("229","9","FREIRE");
INSERT INTO mnt_ubicacion_comunas VALUES("232","9","GALVARINO");
INSERT INTO mnt_ubicacion_comunas VALUES("238","9","GORBEA");
INSERT INTO mnt_ubicacion_comunas VALUES("231","9","LAUTARO");
INSERT INTO mnt_ubicacion_comunas VALUES("240","9","LONCOCHE");
INSERT INTO mnt_ubicacion_comunas VALUES("226","9","LONQUIMAY");
INSERT INTO mnt_ubicacion_comunas VALUES("218","9","LOS SAUCES");
INSERT INTO mnt_ubicacion_comunas VALUES("223","9","LUMACO");
INSERT INTO mnt_ubicacion_comunas VALUES("304","9","MELIPEUCO");
INSERT INTO mnt_ubicacion_comunas VALUES("234","9","NUEVA IMPERIAL");
INSERT INTO mnt_ubicacion_comunas VALUES("345","9","PADRE LAS CASAS");
INSERT INTO mnt_ubicacion_comunas VALUES("233","9","PERQUENCO");
INSERT INTO mnt_ubicacion_comunas VALUES("237","9","PITRUFQUEN");
INSERT INTO mnt_ubicacion_comunas VALUES("242","9","PUCON");
INSERT INTO mnt_ubicacion_comunas VALUES("236","9","PUERTO SAAVEDRA");
INSERT INTO mnt_ubicacion_comunas VALUES("217","9","PUREN");
INSERT INTO mnt_ubicacion_comunas VALUES("219","9","RENAICO");
INSERT INTO mnt_ubicacion_comunas VALUES("227","9","TEMUCO");
INSERT INTO mnt_ubicacion_comunas VALUES("306","9","TEODORO SCHMIDT");
INSERT INTO mnt_ubicacion_comunas VALUES("239","9","TOLTEN");
INSERT INTO mnt_ubicacion_comunas VALUES("222","9","TRAIGUEN");
INSERT INTO mnt_ubicacion_comunas VALUES("224","9","VICTORIA");
INSERT INTO mnt_ubicacion_comunas VALUES("228","9","VILCUN");
INSERT INTO mnt_ubicacion_comunas VALUES("241","9","VILLARRICA");
INSERT INTO mnt_ubicacion_comunas VALUES("277","10","ANCUD");
INSERT INTO mnt_ubicacion_comunas VALUES("265","10","CALBUCO");
INSERT INTO mnt_ubicacion_comunas VALUES("270","10","CASTRO");
INSERT INTO mnt_ubicacion_comunas VALUES("280","10","CHAITEN");
INSERT INTO mnt_ubicacion_comunas VALUES("271","10","CHONCHI");
INSERT INTO mnt_ubicacion_comunas VALUES("262","10","COCHAMO");
INSERT INTO mnt_ubicacion_comunas VALUES("276","10","CURACO DE VELEZ");
INSERT INTO mnt_ubicacion_comunas VALUES("279","10","DALCAHUE");
INSERT INTO mnt_ubicacion_comunas VALUES("268","10","FRESIA");
INSERT INTO mnt_ubicacion_comunas VALUES("269","10","FRUTILLAR");
INSERT INTO mnt_ubicacion_comunas VALUES("281","10","FUTALEUFU");
INSERT INTO mnt_ubicacion_comunas VALUES("308","10","HUALAIHUE");
INSERT INTO mnt_ubicacion_comunas VALUES("267","10","LLANQUIHUE");
INSERT INTO mnt_ubicacion_comunas VALUES("264","10","LOS MUERMOS");
INSERT INTO mnt_ubicacion_comunas VALUES("263","10","MAULLIN");
INSERT INTO mnt_ubicacion_comunas VALUES("255","10","OSORNO");
INSERT INTO mnt_ubicacion_comunas VALUES("282","10","PALENA");
INSERT INTO mnt_ubicacion_comunas VALUES("261","10","PUERTO MONTT");
INSERT INTO mnt_ubicacion_comunas VALUES("258","10","PUERTO OCTAY");
INSERT INTO mnt_ubicacion_comunas VALUES("266","10","PUERTO VARAS");
INSERT INTO mnt_ubicacion_comunas VALUES("274","10","PUQUELDON");
INSERT INTO mnt_ubicacion_comunas VALUES("260","10","PURRANQUE");
INSERT INTO mnt_ubicacion_comunas VALUES("256","10","PUYEHUE");
INSERT INTO mnt_ubicacion_comunas VALUES("272","10","QUEILEN");
INSERT INTO mnt_ubicacion_comunas VALUES("273","10","QUELLON");
INSERT INTO mnt_ubicacion_comunas VALUES("278","10","QUEMCHI");
INSERT INTO mnt_ubicacion_comunas VALUES("275","10","QUINCHAO");
INSERT INTO mnt_ubicacion_comunas VALUES("259","10","RIO NEGRO");
INSERT INTO mnt_ubicacion_comunas VALUES("307","10","SAN JUAN DE LA COSTA");
INSERT INTO mnt_ubicacion_comunas VALUES("257","10","SAN PABLO");
INSERT INTO mnt_ubicacion_comunas VALUES("285","11","AYSEN");
INSERT INTO mnt_ubicacion_comunas VALUES("287","11","CHILE CHICO");
INSERT INTO mnt_ubicacion_comunas VALUES("286","11","CISNES");
INSERT INTO mnt_ubicacion_comunas VALUES("289","11","COCHRANE");
INSERT INTO mnt_ubicacion_comunas VALUES("284","11","COYHAIQUE");
INSERT INTO mnt_ubicacion_comunas VALUES("309","11","GUAITECAS");
INSERT INTO mnt_ubicacion_comunas VALUES("312","11","LAGO VERDE");
INSERT INTO mnt_ubicacion_comunas VALUES("310","11","O´HIGGINS");
INSERT INTO mnt_ubicacion_comunas VALUES("288","11","RIO IBAÑEZ");
INSERT INTO mnt_ubicacion_comunas VALUES("311","11","TORTEL");
INSERT INTO mnt_ubicacion_comunas VALUES("316","12","LAGUNA BLANCA");
INSERT INTO mnt_ubicacion_comunas VALUES("319","12","NAVARINO");
INSERT INTO mnt_ubicacion_comunas VALUES("292","12","PORVENIR");
INSERT INTO mnt_ubicacion_comunas VALUES("317","12","PRIMAVERA");
INSERT INTO mnt_ubicacion_comunas VALUES("291","12","PUERTO NATALES");
INSERT INTO mnt_ubicacion_comunas VALUES("290","12","PUNTA ARENAS");
INSERT INTO mnt_ubicacion_comunas VALUES("314","12","RIO VERDE");
INSERT INTO mnt_ubicacion_comunas VALUES("315","12","SAN GREGORIO");
INSERT INTO mnt_ubicacion_comunas VALUES("318","12","TIMAUKEL");
INSERT INTO mnt_ubicacion_comunas VALUES("313","12","TORRES DEL PAINE");
INSERT INTO mnt_ubicacion_comunas VALUES("109","13","ALHUE");
INSERT INTO mnt_ubicacion_comunas VALUES("103","13","BUIN");
INSERT INTO mnt_ubicacion_comunas VALUES("99","13","CALERA DE TANGO");
INSERT INTO mnt_ubicacion_comunas VALUES("333","13","CERRILLOS");
INSERT INTO mnt_ubicacion_comunas VALUES("324","13","CERRO NAVIA");
INSERT INTO mnt_ubicacion_comunas VALUES("76","13","COLINA");
INSERT INTO mnt_ubicacion_comunas VALUES("75","13","CONCHALI");
INSERT INTO mnt_ubicacion_comunas VALUES("83","13","CURACAVI");
INSERT INTO mnt_ubicacion_comunas VALUES("338","13","EL BOSQUE");
INSERT INTO mnt_ubicacion_comunas VALUES("89","13","EL MONTE");
INSERT INTO mnt_ubicacion_comunas VALUES("328","13","ESTACION CENTRAL");
INSERT INTO mnt_ubicacion_comunas VALUES("334","13","HUECHURABA");
INSERT INTO mnt_ubicacion_comunas VALUES("330","13","INDEPENDENCIA");
INSERT INTO mnt_ubicacion_comunas VALUES("87","13","ISLA DE MAIPO");
INSERT INTO mnt_ubicacion_comunas VALUES("96","13","LA CISTERNA");
INSERT INTO mnt_ubicacion_comunas VALUES("93","13","LA FLORIDA");
INSERT INTO mnt_ubicacion_comunas VALUES("97","13","LA GRANJA");
INSERT INTO mnt_ubicacion_comunas VALUES("327","13","LA PINTANA");
INSERT INTO mnt_ubicacion_comunas VALUES("92","13","LA REINA");
INSERT INTO mnt_ubicacion_comunas VALUES("78","13","LAMPA");
INSERT INTO mnt_ubicacion_comunas VALUES("71","13","LAS CONDES");
INSERT INTO mnt_ubicacion_comunas VALUES("332","13","LO BARNECHEA");
INSERT INTO mnt_ubicacion_comunas VALUES("337","13","LO ESPEJO");
INSERT INTO mnt_ubicacion_comunas VALUES("325","13","LO PRADO");
INSERT INTO mnt_ubicacion_comunas VALUES("323","13","MACUL");
INSERT INTO mnt_ubicacion_comunas VALUES("94","13","MAIPU");
INSERT INTO mnt_ubicacion_comunas VALUES("90","13","MARIA PINTO");
INSERT INTO mnt_ubicacion_comunas VALUES("88","13","MELIPILLA");
INSERT INTO mnt_ubicacion_comunas VALUES("91","13","ÑUÑOA");
INSERT INTO mnt_ubicacion_comunas VALUES("339","13","PADRE HURTADO");
INSERT INTO mnt_ubicacion_comunas VALUES("104","13","PAINE");
INSERT INTO mnt_ubicacion_comunas VALUES("336","13","PEDRO AGUIRRE CERDA");
INSERT INTO mnt_ubicacion_comunas VALUES("85","13","PEÑAFLOR");
INSERT INTO mnt_ubicacion_comunas VALUES("322","13","PEÑALOLEN");
INSERT INTO mnt_ubicacion_comunas VALUES("101","13","PIRQUE");
INSERT INTO mnt_ubicacion_comunas VALUES("72","13","PROVIDENCIA");
INSERT INTO mnt_ubicacion_comunas VALUES("82","13","PUDAHUEL");
INSERT INTO mnt_ubicacion_comunas VALUES("100","13","PUENTE ALTO");
INSERT INTO mnt_ubicacion_comunas VALUES("79","13","QUILICURA");
INSERT INTO mnt_ubicacion_comunas VALUES("81","13","QUINTA NORMAL");
INSERT INTO mnt_ubicacion_comunas VALUES("329","13","RECOLETA");
INSERT INTO mnt_ubicacion_comunas VALUES("77","13","RENCA");
INSERT INTO mnt_ubicacion_comunas VALUES("98","13","SAN BERNARDO");
INSERT INTO mnt_ubicacion_comunas VALUES("335","13","SAN JOAQUIN");
INSERT INTO mnt_ubicacion_comunas VALUES("102","13","SAN JOSE DE MAIPO");
INSERT INTO mnt_ubicacion_comunas VALUES("95","13","SAN MIGUEL");
INSERT INTO mnt_ubicacion_comunas VALUES("108","13","SAN PEDRO");
INSERT INTO mnt_ubicacion_comunas VALUES("326","13","SAN RAMON");
INSERT INTO mnt_ubicacion_comunas VALUES("70","13","SANTIAGO CENTRO");
INSERT INTO mnt_ubicacion_comunas VALUES("73","13","SANTIAGO OESTE");
INSERT INTO mnt_ubicacion_comunas VALUES("84","13","SANTIAGO SUR");
INSERT INTO mnt_ubicacion_comunas VALUES("86","13","TALAGANTE");
INSERT INTO mnt_ubicacion_comunas VALUES("80","13","TIL-TIL");
INSERT INTO mnt_ubicacion_comunas VALUES("331","13","VITACURA");
INSERT INTO mnt_ubicacion_comunas VALUES("244","14","CORRAL");
INSERT INTO mnt_ubicacion_comunas VALUES("248","14","FUTRONO");
INSERT INTO mnt_ubicacion_comunas VALUES("251","14","LA UNION");
INSERT INTO mnt_ubicacion_comunas VALUES("254","14","LAGO RANCO");
INSERT INTO mnt_ubicacion_comunas VALUES("249","14","LANCO");
INSERT INTO mnt_ubicacion_comunas VALUES("247","14","LOS LAGOS");
INSERT INTO mnt_ubicacion_comunas VALUES("246","14","MAFIL");
INSERT INTO mnt_ubicacion_comunas VALUES("245","14","MARIQUINA");
INSERT INTO mnt_ubicacion_comunas VALUES("243","14","VALDIVIA");
INSERT INTO mnt_ubicacion_comunas VALUES("250","14","PANGUIPULLI");
INSERT INTO mnt_ubicacion_comunas VALUES("252","14","PAILLACO");
INSERT INTO mnt_ubicacion_comunas VALUES("253","14","RIO BUENO");
INSERT INTO mnt_ubicacion_comunas VALUES("1","15","ARICA");
INSERT INTO mnt_ubicacion_comunas VALUES("295","15","CAMARONES");
INSERT INTO mnt_ubicacion_comunas VALUES("293","15","GENERAL LAGOS");
INSERT INTO mnt_ubicacion_comunas VALUES("294","15","PUTRE");



DROP TABLE notificaciones_estado;

CREATE TABLE `notificaciones_estado` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO notificaciones_estado VALUES("1","No Visto");
INSERT INTO notificaciones_estado VALUES("2","Visto");



DROP TABLE notificaciones_listado;

CREATE TABLE `notificaciones_listado` (
  `idNotificaciones` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Notificacion` text NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`idNotificaciones`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';




DROP TABLE notificaciones_ver;

CREATE TABLE `notificaciones_ver` (
  `idNoti` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `Notificacion` varchar(255) NOT NULL,
  `Fecha` date NOT NULL,
  `FechaVisto` date NOT NULL,
  `idEstado` int(11) unsigned NOT NULL,
  `idNotificaciones` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idNoti`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

INSERT INTO notificaciones_ver VALUES("1","2","3","<a href=\"view_doc.php?view=27\" title=\"Ver Informacion\" class=\"icon-ver info-tooltip\"></a>Se ha realizado un traspaso de materiales desde otra empresa","2015-10-22","2015-10-22","2","0");
INSERT INTO notificaciones_ver VALUES("2","3","2","<a href=\"view_doc.php?view=29\" title=\"Ver Informacion\" class=\"icon-ver info-tooltip\"></a>Se ha realizado un traspaso de materiales desde otra empresa","2015-10-22","2015-10-22","2","0");
INSERT INTO notificaciones_ver VALUES("3","2","3","<a href=\"view_doc.php?view=30\" title=\"Ver Informacion\" class=\"icon-ver info-tooltip\"></a>Se ha realizado un traspaso de materiales desde otra empresa","2015-10-22","2015-10-22","2","0");
INSERT INTO notificaciones_ver VALUES("4","2","3","<a href=\"view_doc.php?view=32\" title=\"Ver Informacion\" class=\"icon-ver info-tooltip\"></a>Se ha realizado un traspaso de materiales desde otra empresa","2015-10-23","2015-11-05","2","0");
INSERT INTO notificaciones_ver VALUES("5","4","6","<a href=\"view_doc.php?view=38\" title=\"Ver Informacion\" class=\"icon-ver info-tooltip\"></a>Se ha realizado un traspaso de materiales desde otra empresa","2015-10-26","0000-00-00","1","0");
INSERT INTO notificaciones_ver VALUES("6","5","7","<a href=\"view_doc.php?view=41\" title=\"Ver Informacion\" class=\"icon-ver info-tooltip\"></a>Se ha realizado un traspaso de materiales desde otra empresa","2015-10-27","0000-00-00","1","0");
INSERT INTO notificaciones_ver VALUES("7","2","3","<a href=\"view_doc.php?view=42\" title=\"Ver Informacion\" class=\"icon-ver info-tooltip\"></a>Se ha realizado un traspaso de materiales desde otra empresa","2015-10-27","2015-11-05","2","0");
INSERT INTO notificaciones_ver VALUES("8","2","3","<a href=\"view_doc.php?view=51\" title=\"Ver Informacion\" class=\"icon-ver info-tooltip\"></a>Se ha realizado un traspaso de materiales desde otra empresa","2015-10-28","2015-11-05","2","0");
INSERT INTO notificaciones_ver VALUES("9","4","6","<a href=\"view_mov_act.php?view=4\" title=\"Ver Informacion\" class=\"icon-ver info-tooltip\"></a>Se ha realizado un traspaso de insumoa desde otra empresa","2015-10-28","0000-00-00","1","0");
INSERT INTO notificaciones_ver VALUES("10","8","11","<a href=\"view_mov_act.php?view=5\" title=\"Ver Informacion\" class=\"icon-ver info-tooltip\"></a>Se ha realizado un traspaso de insumoa desde otra empresa","2015-10-29","0000-00-00","1","0");
INSERT INTO notificaciones_ver VALUES("11","8","11","<a href=\"view_mov_act.php?view=6\" title=\"Ver Informacion\" class=\"icon-ver info-tooltip\"></a>Se ha realizado un traspaso de insumoa desde otra empresa","2015-10-29","0000-00-00","1","0");



DROP TABLE orden_trabajo_estados;

CREATE TABLE `orden_trabajo_estados` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO orden_trabajo_estados VALUES("1","Programada");
INSERT INTO orden_trabajo_estados VALUES("2","En Proceso");
INSERT INTO orden_trabajo_estados VALUES("3","Finalizada");



DROP TABLE orden_trabajo_listado;

CREATE TABLE `orden_trabajo_listado` (
  `idOT` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `idArea` int(11) unsigned NOT NULL,
  `idLinea` int(11) unsigned NOT NULL,
  `idMaquina` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `idEstado` int(11) unsigned NOT NULL,
  `idPrioridad` int(11) unsigned NOT NULL,
  `idTipo` int(11) unsigned NOT NULL,
  `f_creacion` date NOT NULL,
  `f_programacion` date NOT NULL,
  `f_ejecucion` date NOT NULL,
  `f_termino` date NOT NULL,
  `Observaciones` text NOT NULL,
  `progMes` int(2) unsigned NOT NULL,
  `progAno` int(4) unsigned NOT NULL,
  `ejeMes` int(2) unsigned NOT NULL,
  `ejeAno` int(4) unsigned NOT NULL,
  `terMes` int(2) unsigned NOT NULL,
  `terAno` int(4) unsigned NOT NULL,
  `idSupervisor` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idOT`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';




DROP TABLE orden_trabajo_listado_responsable;

CREATE TABLE `orden_trabajo_listado_responsable` (
  `idResponsable` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idOT` int(11) unsigned NOT NULL,
  `idTrabajador` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idResponsable`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';




DROP TABLE orden_trabajo_listado_trabajos;

CREATE TABLE `orden_trabajo_listado_trabajos` (
  `idTrabajo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idOT` int(11) unsigned NOT NULL,
  `idArea` int(11) unsigned NOT NULL,
  `idLinea` int(11) unsigned NOT NULL,
  `idMaquina` int(11) unsigned NOT NULL,
  `idComponente` int(11) unsigned NOT NULL,
  `idSubComponente` int(11) unsigned NOT NULL,
  `idItemFamilia` int(11) unsigned NOT NULL,
  `idItemList` int(11) unsigned NOT NULL,
  `idTarea` int(11) NOT NULL,
  `idEstado` int(11) unsigned NOT NULL,
  `f_termino` date NOT NULL,
  `Observacion` text NOT NULL,
  `T0` double(7,2) NOT NULL,
  `T1` double(7,2) NOT NULL,
  `T2` double(7,2) NOT NULL,
  `T3` double(7,2) NOT NULL,
  `T4` double(7,2) NOT NULL,
  `idEstadoAceite` int(11) unsigned NOT NULL,
  `idNivelAgua` int(11) unsigned NOT NULL,
  `idNivelAceite` int(11) unsigned NOT NULL,
  `idNivelSilice` int(11) unsigned NOT NULL,
  `TempAceite` double(7,2) unsigned NOT NULL,
  `idFlujoAgua` int(11) unsigned NOT NULL,
  `Grasa_inicial` decimal(11,6) unsigned NOT NULL,
  `Grasa_relubricacion` decimal(11,6) unsigned NOT NULL,
  `Aceite` decimal(11,6) unsigned NOT NULL,
  `Cantidad` decimal(11,6) unsigned NOT NULL,
  `idUml` int(11) unsigned NOT NULL,
  `idProducto` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idTrabajo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';




DROP TABLE orden_trabajo_listado_trabajos_estadoaceite;

CREATE TABLE `orden_trabajo_listado_trabajos_estadoaceite` (
  `idEstadoAceite` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idEstadoAceite`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO orden_trabajo_listado_trabajos_estadoaceite VALUES("1","Optimo");
INSERT INTO orden_trabajo_listado_trabajos_estadoaceite VALUES("2","Regular");
INSERT INTO orden_trabajo_listado_trabajos_estadoaceite VALUES("3","Malo");



DROP TABLE orden_trabajo_listado_trabajos_flujoagua;

CREATE TABLE `orden_trabajo_listado_trabajos_flujoagua` (
  `idFlujoAgua` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idFlujoAgua`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO orden_trabajo_listado_trabajos_flujoagua VALUES("1","Optimo");
INSERT INTO orden_trabajo_listado_trabajos_flujoagua VALUES("2","Bajo");
INSERT INTO orden_trabajo_listado_trabajos_flujoagua VALUES("3","Alto");



DROP TABLE orden_trabajo_listado_trabajos_nivelaceite;

CREATE TABLE `orden_trabajo_listado_trabajos_nivelaceite` (
  `idNivelAceite` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idNivelAceite`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO orden_trabajo_listado_trabajos_nivelaceite VALUES("1","Optimo");
INSERT INTO orden_trabajo_listado_trabajos_nivelaceite VALUES("2","Regular");
INSERT INTO orden_trabajo_listado_trabajos_nivelaceite VALUES("3","Malo");



DROP TABLE orden_trabajo_listado_trabajos_nivelagua;

CREATE TABLE `orden_trabajo_listado_trabajos_nivelagua` (
  `idNivelAgua` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idNivelAgua`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO orden_trabajo_listado_trabajos_nivelagua VALUES("1","No");
INSERT INTO orden_trabajo_listado_trabajos_nivelagua VALUES("2","Leve %");
INSERT INTO orden_trabajo_listado_trabajos_nivelagua VALUES("3","Alto %");



DROP TABLE orden_trabajo_listado_trabajos_nivelsilice;

CREATE TABLE `orden_trabajo_listado_trabajos_nivelsilice` (
  `idNivelSilice` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idNivelSilice`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO orden_trabajo_listado_trabajos_nivelsilice VALUES("1","No");
INSERT INTO orden_trabajo_listado_trabajos_nivelsilice VALUES("2","Leve %");
INSERT INTO orden_trabajo_listado_trabajos_nivelsilice VALUES("3","Alto %");



DROP TABLE orden_trabajo_meses;

CREATE TABLE `orden_trabajo_meses` (
  `idMes` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idMes`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO orden_trabajo_meses VALUES("1","Enero");
INSERT INTO orden_trabajo_meses VALUES("2","Febrero");
INSERT INTO orden_trabajo_meses VALUES("3","Marzo");
INSERT INTO orden_trabajo_meses VALUES("4","Abril");
INSERT INTO orden_trabajo_meses VALUES("5","Mayo");
INSERT INTO orden_trabajo_meses VALUES("6","Junio");
INSERT INTO orden_trabajo_meses VALUES("7","Julio");
INSERT INTO orden_trabajo_meses VALUES("8","Agosto");
INSERT INTO orden_trabajo_meses VALUES("9","Septiembre");
INSERT INTO orden_trabajo_meses VALUES("10","Octubre");
INSERT INTO orden_trabajo_meses VALUES("11","Noviembre");
INSERT INTO orden_trabajo_meses VALUES("12","Diciembre");



DROP TABLE orden_trabajo_prioridad;

CREATE TABLE `orden_trabajo_prioridad` (
  `idPrioridad` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idPrioridad`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO orden_trabajo_prioridad VALUES("1","Baja");
INSERT INTO orden_trabajo_prioridad VALUES("2","Media");
INSERT INTO orden_trabajo_prioridad VALUES("3","Alta");
INSERT INTO orden_trabajo_prioridad VALUES("4","Muy Alta");



DROP TABLE orden_trabajo_tipos;

CREATE TABLE `orden_trabajo_tipos` (
  `idTipo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO orden_trabajo_tipos VALUES("1","INP - Inspeccion");
INSERT INTO orden_trabajo_tipos VALUES("2","LIM - Limpieza");
INSERT INTO orden_trabajo_tipos VALUES("3","LUB - Lubricacion");
INSERT INTO orden_trabajo_tipos VALUES("4","MC - Mantencion Correctiva");
INSERT INTO orden_trabajo_tipos VALUES("5","MD - Mantencion Predictiva");
INSERT INTO orden_trabajo_tipos VALUES("6","ME - Mantencion de Emergencia");
INSERT INTO orden_trabajo_tipos VALUES("7","MM - Mantencion Mayor");
INSERT INTO orden_trabajo_tipos VALUES("8","MP - Mantencion Preventiva");
INSERT INTO orden_trabajo_tipos VALUES("9","RE - Relleno de aceite");



DROP TABLE procedimientos_categorias;

CREATE TABLE `procedimientos_categorias` (
  `idCategoria` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `idSistema` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO procedimientos_categorias VALUES("1","Testeo","1");



DROP TABLE procedimientos_listado;

CREATE TABLE `procedimientos_listado` (
  `idProcedimiento` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `idCategoria` int(11) unsigned NOT NULL,
  `Version` decimal(4,2) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `Direccion_img` varchar(150) NOT NULL,
  PRIMARY KEY (`idProcedimiento`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';




DROP TABLE productos_categorias;

CREATE TABLE `productos_categorias` (
  `idCategoria` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO productos_categorias VALUES("1","No aplica");
INSERT INTO productos_categorias VALUES("2","Alimenticio");
INSERT INTO productos_categorias VALUES("3","Dielectrico");
INSERT INTO productos_categorias VALUES("4","Especial");
INSERT INTO productos_categorias VALUES("5","Hidraulico");
INSERT INTO productos_categorias VALUES("6","Limpiador");
INSERT INTO productos_categorias VALUES("7","Mineral");
INSERT INTO productos_categorias VALUES("8","Motor");
INSERT INTO productos_categorias VALUES("9","Semifluida");
INSERT INTO productos_categorias VALUES("10","Sintetico");
INSERT INTO productos_categorias VALUES("11","Spray");



DROP TABLE productos_embalaje;

CREATE TABLE `productos_embalaje` (
  `idEmbalaje` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`idEmbalaje`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO productos_embalaje VALUES("8","Balde");
INSERT INTO productos_embalaje VALUES("3","Tubos");
INSERT INTO productos_embalaje VALUES("4","Tambor");
INSERT INTO productos_embalaje VALUES("5","Cuñete");
INSERT INTO productos_embalaje VALUES("7","Caja");
INSERT INTO productos_embalaje VALUES("9","Frasco Plástico/Metálico 1 Kgrs ");
INSERT INTO productos_embalaje VALUES("10","Cartucho 400 grs");
INSERT INTO productos_embalaje VALUES("11","Bidon");



DROP TABLE productos_listado;

CREATE TABLE `productos_listado` (
  `idProducto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  `idTipo` int(11) unsigned NOT NULL,
  `idCategoria` int(11) unsigned NOT NULL,
  `idUml` int(11) unsigned NOT NULL,
  `Marca` varchar(120) NOT NULL,
  `idTipoProducto` int(11) unsigned NOT NULL,
  `StockLimite` decimal(11,6) unsigned NOT NULL,
  `ValorIngreso` decimal(11,6) unsigned NOT NULL,
  `ValorEgreso` decimal(11,6) unsigned NOT NULL,
  `idRubro` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=MyISAM AUTO_INCREMENT=193 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO productos_listado VALUES("191","ADITIVO LR S","1","10","1","SIMYL","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("181","OGT 54 SP","8","11","2","RHENUS","1","0.000000","4480.000000","0.000000","1");
INSERT INTO productos_listado VALUES("3","CARTER EP 220","1","7","1","TOTAL","1","0.000000","1448.000000","0.000000","1");
INSERT INTO productos_listado VALUES("4","CARTER EP 320","1","7","1","TOTAL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("5","CARTER EP 460","1","7","1","TOTAL","1","20.000000","1509.341346","0.000000","1");
INSERT INTO productos_listado VALUES("6","CARTER EP 680","1","7","1","TOTAL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("7","CARTER SH 150","1","10","1","TOTAL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("8","CARTER SY 220 (POLIGLICOL)","1","10","1","TOTAL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("9","SERIOLA ETA ","1","7","1","TOTAL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("10","SPIRIT ASI 7000","1","7","1","TOTAL","1","0.000000","3155.250000","0.000000","1");
INSERT INTO productos_listado VALUES("11","NEVASTANE EP 320 ","2","2","1","TOTAL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("12","EQUIVIS ZS 32","1","5","1","TOTAL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("13","EQUIVIS ZS 46","1","5","1","TOTAL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("14","EQUIVIS ZS 68","1","5","1","TOTAL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("15","AZOLLA ZS 32","1","5","1","TOTAL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("16","AZOLLA ZS 46","1","5","1","TOTAL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("17","AZOLLA ZS 68","1","5","1","TOTAL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("18","CORTIS SHT 200","1","4","1","TOTAL","1","0.000000","3920.150000","0.000000","1");
INSERT INTO productos_listado VALUES("19","SPARTAN EP 100","1","7","1","MOBIL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("21","SPARTAN EP 220","1","7","1","MOBIL","1","0.000000","1856.250000","0.000000","1");
INSERT INTO productos_listado VALUES("22","SPARTAN EP 320","1","7","1","MOBIL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("23","SPARTAN EP 460","1","7","1","MOBIL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("24","SPARTAN EP 680","1","7","1","MOBIL","1","0.000000","1675.000000","0.000000","1");
INSERT INTO productos_listado VALUES("25","VACTRA N° 2","1","7","1","MOBIL","1","0.000000","2476.000000","0.000000","1");
INSERT INTO productos_listado VALUES("26","MOBILMET 427","1","7","1","MOBIL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("27","MOBILTHERM 605","1","7","1","MOBIL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("28","NUTO H 32","1","5","1","MOBIL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("29","NUTO H 46","1","5","1","MOBIL","1","0.000000","1480.769231","0.000000","1");
INSERT INTO productos_listado VALUES("30","NUTO H 68","1","5","1","MOBIL","1","0.000000","1570.947368","0.000000","1");
INSERT INTO productos_listado VALUES("31","RARUS 827 ","1","4","1","MOBIL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("32","GLAYGOLE ARTIC SHC 200 ","1","10","1","MOBIL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("33","EXCEL 15 ","1","4","1","MOBIL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("34","MOBIL GEAR 600 XP 68","1","4","1","MOBIL","3","0.000000","1904.326923","0.000000","1");
INSERT INTO productos_listado VALUES("35","DTE OIL 24","1","5","1","MOBIL","3","0.000000","1481.000000","0.000000","1");
INSERT INTO productos_listado VALUES("36","MOBILUBE HD 80W90 ","1","7","1","MOBIL","3","0.000000","2564.210526","0.000000","1");
INSERT INTO productos_listado VALUES("37","ATF 220 ","1","4","1","MOBIL","1","0.000000","2741.000000","0.000000","1");
INSERT INTO productos_listado VALUES("38","DELVAC MX 15W40","1","8","1","MOBIL","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("39","REFRIGERANTE PERMAZONE 50% ","12","8","1","MOBIL","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("40","MOBILTRANS HD 30 ","1","7","1","MOBIL","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("41","BLUEMAX","12","4","1","MOBIL","3","0.000000","1.818182","0.000000","1");
INSERT INTO productos_listado VALUES("42","FLUSHING OIL","1","7","1","MOBIL","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("43","ECOGEAR M ISO 220","1","7","1","ADDINOL","1","0.000000","2380.000000","0.000000","1");
INSERT INTO productos_listado VALUES("44","ECOGEAR M ISO 320","1","7","1","ADDINOL","1","0.000000","2380.000000","0.000000","1");
INSERT INTO productos_listado VALUES("45","ECOGEAR M ISO 460","1","7","1","ADDINOL","1","0.000000","2380.000000","0.000000","1");
INSERT INTO productos_listado VALUES("46","ECOGEAR M ISO 680","1","7","1","ADDINOL","1","0.000000","2380.000000","0.000000","1");
INSERT INTO productos_listado VALUES("47","ECOGEAR S ISO 220","1","10","1","ADDINOL","1","0.000000","2988.000000","0.000000","1");
INSERT INTO productos_listado VALUES("48","ECOGEAR S ISO 320","1","10","1","ADDINOL","1","0.000000","2988.000000","0.000000","1");
INSERT INTO productos_listado VALUES("49","ECOGEAR S ISO 460","1","10","1","ADDINOL","1","0.000000","2988.000000","0.000000","1");
INSERT INTO productos_listado VALUES("50","ECOGEAR S ISO 680","1","10","1","ADDINOL","1","0.000000","2988.000000","0.000000","1");
INSERT INTO productos_listado VALUES("51","PURITY FG EP 320","2","7","1","PETROCANADA","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("52","CELTIC TR 95","1","7","1","YPF","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("53","OVS 23 - VITANOR COM 46 ","1","4","1","RHENUS - ENEX","1","0.000000","8349.150000","0.000000","1");
INSERT INTO productos_listado VALUES("54","OCS 22 - VITANOR CHS 32 ","1","4","1","RHENUS - ENEX","1","0.000000","8185.300000","0.000000","1");
INSERT INTO productos_listado VALUES("55","SUGAR PRESSBIO","1","4","1","LAAPSA","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("56","CHAIN LAAP HT 1000/680","1","4","1","LAAPSA","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("57","ENVIROLUBE MEDIUM","1","4","1","WHITMORE","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("58","MAXIPRESS TACKY OG","1","4","1","LAAPSA","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("59","TELLUS T 15 ","1","7","1","SHELL ENEX","1","0.000000","2300.000000","0.000000","1");
INSERT INTO productos_listado VALUES("60","TELLUS C2 H 68 ","1","5","1","SHELL ENEX","3","0.000000","1772.526316","0.000000","1");
INSERT INTO productos_listado VALUES("61","TRANSYND TES 295","1","10","1","CASTROL","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("62","RANDO HD 32","1","5","1","TEXACO","3","0.000000","1481.000000","0.000000","1");
INSERT INTO productos_listado VALUES("63","STRUCTOVIS EHD","1","4","1","KLUBER","3","0.000000","2576.000000","0.000000","1");
INSERT INTO productos_listado VALUES("64","LA-8","1","4","1","ELKALUB","3","0.000000","1540.000000","0.000000","1");
INSERT INTO productos_listado VALUES("65","OMNILUBE PD ISO VG 150","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("66","OMNILUBE PD ISO VG 220","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("67","OMNILUBE PD ISO VG 320","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("68","OMNILUBE PD ISO VG 460","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("69","OMNILUBE PD ISO VG 680","1","4","1","SIMYL S.A.","3","0.000000","10000.000000","0.000000","1");
INSERT INTO productos_listado VALUES("70","OMNILUBE PD ISO VG 1300/1500","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("71","OMNILUBE S MF ISO VG 220","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("72","OMNILUBE S MF ISO VG 320","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("73","OMNILUBE S MF ISO VG 460","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("74","OMNILUBE S MF ISO VG 680","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("75","OMNILUBE S  ISO VG 150","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("76","OMNILUBE S  ISO VG 220","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("77","OMNILUBE S  ISO VG 320","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("78","OMNILUBE S  ISO VG 460","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("79","OMNILUBE S  ISO VG 680","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("80","OMNILUBE S PG  ISO VG 150","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("81","OMNILUBE S PG  ISO VG 220","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("82","OMNILUBE S PG  ISO VG 320","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("83","OMNILUBE S PG  ISO VG 460","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("84","OMNILUBE S PG  ISO VG 680","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("85","SIMGEAR LUBE  ISO VG 150","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("86","SIMGEAR LUBE  ISO VG 220","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("87","SIMGEAR LUBE  ISO VG 320","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("88","SIMGEAR LUBE  ISO VG 460","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("89","SIMGEAR LUBE  ISO VG 680","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("90","WSB 68","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("91","SMCT6","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("92","SIMTHERM 65","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("93","SIMTHERM ET 32/100","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("94","SIMCOOL ST ","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("95","SIMCOOL STN ","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("96","HIDROIL SC  32","1","5","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("97","HIDROIL SC  46","1","5","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("98","HIDROIL SC  68","1","5","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("99","HIDROIL SM  32","1","5","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("100","HIDROIL SM  46","1","5","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("101","HIDROIL SM  68","1","5","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("102","HIDROIL IN  32","1","5","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("103","HIDROIL IN  46","1","5","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("104","HIDROIL IN  68","1","5","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("105","SIMCHAIN LUBE SHT ","1","4","1","SIMYL S.A.","3","0.000000","0.000000","12445.684211","1");
INSERT INTO productos_listado VALUES("106","CHAIN LUBE HT 1000 S ","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("107","CHAINLUBE AC ","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("108","VITANOR CHS 32 ","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("109","AFCCO - S     ISO 68 ","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("110","AFCCO - S     ISO 100 ","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("111","NEUMATICO 8 ","1","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("112","VISCOGEN 0","8","4","1","LAAPSA","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("113","ADG 2","8","4","3","RHENUS","1","0.000000","3953.000000","0.000000","1");
INSERT INTO productos_listado VALUES("114","OGT 54","8","4","3","RHENUS","1","0.000000","2610.000000","0.000000","1");
INSERT INTO productos_listado VALUES("115","LKY 2","8","4","3","RHENUS","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("116","LKX 2","8","4","3","RHENUS","1","0.000000","6930.000000","0.000000","1");
INSERT INTO productos_listado VALUES("117","LKA 2","8","4","3","RHENUS","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("118","ACN 2","8","4","3","RHENUS","1","0.000000","9412.000000","0.000000","1");
INSERT INTO productos_listado VALUES("119","LKR 25","8","4","3","RHENUS","1","0.000000","10117.640000","0.000000","1");
INSERT INTO productos_listado VALUES("120","ABG 0","8","4","3","RHENUS","1","0.000000","7905.888889","2750.000000","1");
INSERT INTO productos_listado VALUES("121","ACK 2","11","4","3","RHENUS","1","0.000000","6958.833333","0.000000","1");
INSERT INTO productos_listado VALUES("122","MULTI COMPLEX  MV 2","8","4","3","TOTAL","1","0.000000","4237.180000","0.000000","1");
INSERT INTO productos_listado VALUES("123","MULTIS EP 00","8","4","3","TOTAL","1","0.000000","6077.000000","0.000000","1");
INSERT INTO productos_listado VALUES("124","NEVASTANE XS 320","9","2","3","TOTAL","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("125","NEVASTANE XMF 2 ","9","2","3","TOTAL","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("126","PURITY FG 2 ","9","2","3","TOTAL","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("127","CHEVRON SRI 2","8","4","3","CHEVRON","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("128","MOBILUX EP 2","8","4","3","MOBIL","1","0.000000","2800.000000","0.000000","1");
INSERT INTO productos_listado VALUES("129","MOBILGREASE XHP 222","8","4","2","MOBIL","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("130","MOBILARMA 798","8","4","3","MOBIL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("131","LONGTIME EP 2","8","4","3","CASTROL","3","0.000000","37227.000000","0.000000","1");
INSERT INTO productos_listado VALUES("132","CENTOPLEX GLP 500","8","9","3","KLUBER","3","0.000000","18500.000000","0.000000","1");
INSERT INTO productos_listado VALUES("133","MICROLUBE GL 261","8","4","3","KLUBER","3","0.000000","18642.857143","0.000000","1");
INSERT INTO productos_listado VALUES("134","OKS 470","8","4","3","OKS","3","0.000000","6000.000000","0.000000","1");
INSERT INTO productos_listado VALUES("135","GLEITMO 585 M","8","4","3","FUCHS","3","0.000000","10000.000000","0.000000","1");
INSERT INTO productos_listado VALUES("136","KLS - G 202","8","4","3","SILICON ARGENTINA","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("137","KLS - G 4 LT","8","4","3","SILICON ARGENTINA","1","0.000000","35000.000000","0.000000","1");
INSERT INTO productos_listado VALUES("138","SILICONA SILPACK","8","4","3","SILPACK CHILE","1","0.000000","19400.000000","0.000000","1");
INSERT INTO productos_listado VALUES("139","GRASA DIELECTRICA pomo 85 grs","8","3","2","WURTH","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("140","TM 305","8","4","3","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("141","GRAPTOR SS","8","4","3","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("142","OMNIGREASE GLB EP2","8","4","3","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("143","EFILUBE GLB EP2 ","8","4","3","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("144","EFILUBE X2 Cartucho 400 grs","8","4","2","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("145","EFILUBE GSC EP 2  ","8","4","3","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("146","EFILUBE GSC NLGI 2","8","4","3","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("147","OMNIGREASE EP 2","8","4","3","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("148","OMNIGREASE HT 22B","8","4","3","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("149","EFILUBE LONG LIFE WR","8","4","3","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("150","EFILUBE VP 2","8","4","3","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("151","EFILUBE GLC 00","8","4","3","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("152","KLM G 202","8","4","3","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("153","KLS C 208","8","4","3","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("154","SILIGRASS HT3","8","4","3","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("155","AFMP 2","11","4","3","SIMYL S.A.","3","0.000000","0.000000","10988.000000","1");
INSERT INTO productos_listado VALUES("188","MOLIVAN L","3","4","1","ADDINOL","1","50.000000","23669.000000","0.000000","1");
INSERT INTO productos_listado VALUES("157","MOLYBDEN S CONCENTRADO","3","4","1","JYMSA","1","20.000000","23204.000000","0.000000","1");
INSERT INTO productos_listado VALUES("158","OIL SYSTEM CLEANER","3","4","1","WYNNS","1","0.000000","8128.400000","0.000000","1");
INSERT INTO productos_listado VALUES("159","ENGINE OIL STOP LEAK","3","4","1","WYNNS","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("160","ADITIVO AH3T","3","4","1","SIMYL S.A.","3","0.000000","0.000000","1151.150000","1");
INSERT INTO productos_listado VALUES("161","ADITIVO DSC","3","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("162","ADITIVO LR","3","4","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("190","CARTER EP 100","1","7","1","TOTAL","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("164","CRC MOLY LUBE 312 grs","10","11","2","CRC TECNILUB","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("165","CRC DI-ELECTRIC GREASE  298 grs","6","11","2","CRC TECNILUB","1","0.000000","8460.000000","0.000000","1");
INSERT INTO productos_listado VALUES("166","PURITY FG 400 Ml ","9","11","2","PETROCANADA","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("167","MAG 2 SP","7","11","2","RHENUS","1","0.000000","6094.000000","0.000000","1");
INSERT INTO productos_listado VALUES("168","HHS LUBE","8","11","2","WURTH","3","0.000000","14000.000000","0.000000","1");
INSERT INTO productos_listado VALUES("169","ROST OFF","5","11","2","WURTH","3","0.000000","3476.000000","0.000000","1");
INSERT INTO productos_listado VALUES("170","SKM 121 SP","10","11","2","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("171","SKDE 121 SP","6","11","2","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("172","SKG 121 SP","7","11","2","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("173","GRAPTOR OGS 5000 SP","1","11","2","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("174","SOLVENT DEGREASER","6","6","1","ECOLAB","3","0.000000","223.200000","0.000000","1");
INSERT INTO productos_listado VALUES("175","WET-40","4","6","1","EDETER","1","0.000000","1625.000000","0.000000","1");
INSERT INTO productos_listado VALUES("176","INDERDIEL E ","6","6","1","EDETER","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("177","SIMYLOCK M-40","4","6","1","SIMYL S.A.","3","0.000000","0.000000","2640.000000","1");
INSERT INTO productos_listado VALUES("178","SIMYLOCK GE-101","6","6","1","SIMYL S.A.","3","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("179","OMALA 150","1","7","1","SHELL ENEX","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("180","LUBRICADOR AUTOMATICO SNR 125","14","4","2","NTN-SNR","3","0.000000","17160.000000","0.000000","1");
INSERT INTO productos_listado VALUES("182","CARTER EP 150","1","7","1","TOTAL","1","0.000000","1382.000000","0.000000","1");
INSERT INTO productos_listado VALUES("189","SPARTAN EP 150","1","7","1","MOBIL","1","0.000000","1856.000000","0.000000","1");
INSERT INTO productos_listado VALUES("184","LKX-2/ 400grs","8","7","2","Rhenus","1","0.000000","4500.000000","0.000000","1");
INSERT INTO productos_listado VALUES("185","OMALA 68","1","7","1","SHELL ENEX","1","0.000000","0.000000","0.000000","1");
INSERT INTO productos_listado VALUES("186","ECOPLUS XS 68","1","7","1","ADDINOL","3","0.000000","2380.000000","0.000000","1");
INSERT INTO productos_listado VALUES("187","GEAR ISO 1300","1","4","1","GEAR","1","0.000000","6230.000000","0.000000","1");
INSERT INTO productos_listado VALUES("192","HIDRAULIC FLUID ISO 68","1","7","1","SIMYL","3","0.000000","0.000000","2988.000000","1");



DROP TABLE productos_recetas;

CREATE TABLE `productos_recetas` (
  `idReceta` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) unsigned NOT NULL,
  `idProductoRel` int(11) unsigned NOT NULL,
  `Cantidad` decimal(11,6) unsigned NOT NULL,
  PRIMARY KEY (`idReceta`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

INSERT INTO productos_recetas VALUES("2","155","121","1.000000");
INSERT INTO productos_recetas VALUES("3","105","18","1.000000");
INSERT INTO productos_recetas VALUES("4","177","175","1.000000");
INSERT INTO productos_recetas VALUES("5","94","10","1.000000");
INSERT INTO productos_recetas VALUES("8","78","5","1.000000");
INSERT INTO productos_recetas VALUES("7","192","29","1.000000");
INSERT INTO productos_recetas VALUES("9","78","188","1.000000");
INSERT INTO productos_recetas VALUES("24","68","5","0.990000");
INSERT INTO productos_recetas VALUES("25","68","188","0.010000");
INSERT INTO productos_recetas VALUES("26","160","3","0.900000");
INSERT INTO productos_recetas VALUES("27","160","188","0.050000");
INSERT INTO productos_recetas VALUES("28","160","157","0.050000");



DROP TABLE productos_tipo;

CREATE TABLE `productos_tipo` (
  `idTipo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO productos_tipo VALUES("1","Aceite");
INSERT INTO productos_tipo VALUES("2","Aceite H1");
INSERT INTO productos_tipo VALUES("3","Aditivo");
INSERT INTO productos_tipo VALUES("4","Desengrasante");
INSERT INTO productos_tipo VALUES("5","Desoxidante");
INSERT INTO productos_tipo VALUES("6","Dielectrico");
INSERT INTO productos_tipo VALUES("7","Grafito");
INSERT INTO productos_tipo VALUES("8","Grasa");
INSERT INTO productos_tipo VALUES("9","Grasa H1");
INSERT INTO productos_tipo VALUES("10","Molidebno");
INSERT INTO productos_tipo VALUES("11","Pasta");
INSERT INTO productos_tipo VALUES("12","Refrigerante");
INSERT INTO productos_tipo VALUES("13","No aplica");
INSERT INTO productos_tipo VALUES("14","Lubricador Automático");



DROP TABLE productos_tipo_producto;

CREATE TABLE `productos_tipo_producto` (
  `idTipoProducto` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipoProducto`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO productos_tipo_producto VALUES("1","Materia Prima");
INSERT INTO productos_tipo_producto VALUES("2","Insumo");
INSERT INTO productos_tipo_producto VALUES("3","Producto Terminado");



DROP TABLE productos_uml;

CREATE TABLE `productos_uml` (
  `idUml` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idUml`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Mediante planilla';

INSERT INTO productos_uml VALUES("1","Litros");
INSERT INTO productos_uml VALUES("2","Unidad");
INSERT INTO productos_uml VALUES("3","Kilos");
INSERT INTO productos_uml VALUES("4","No aplica");



DROP TABLE proveedor_estado;

CREATE TABLE `proveedor_estado` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO proveedor_estado VALUES("1","Activo");
INSERT INTO proveedor_estado VALUES("2","Inactivo");



DROP TABLE proveedor_listado;

CREATE TABLE `proveedor_listado` (
  `idProveedor` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `idCiudad` int(11) unsigned NOT NULL,
  `idComuna` int(11) unsigned NOT NULL,
  `Fax` varchar(15) NOT NULL,
  `PersonaContacto` varchar(210) NOT NULL,
  `Web` varchar(150) NOT NULL,
  `idPais` int(11) unsigned NOT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

INSERT INTO proveedor_listado VALUES("1","1","1","1","ventas@rodamientosbrinck.cl","RODAMIENTOS BRINCK LIMITADA","86.028.400-6","2015-10-02","AV.MATTA Nº 1298","225567334","","13","70","","","www.rodamientosbrinck.cl","0");
INSERT INTO proveedor_listado VALUES("9","1","1","1","mariafernandea@total.cl","TOTAL CHILE S.A.","95.861.000-9","2015-10-14","Calle Uno Nº 3010","225197800","","13","79","","MARIA FERNANDA BORBOR","www.totalchile.cl","0");
INSERT INTO proveedor_listado VALUES("3","1","1","2","jaimevidela_6@hotmail.com","JAIME VIDELA MILLA","7.707.209-8","2015-10-08","QUILLAGUA Nº 0329","22456908","98847972","13","98","","Jaime Videla","","0");
INSERT INTO proveedor_listado VALUES("4","1","1","1","jolmos@tribalub.cl","TRIBALUB SPA","76.322.767-7","2015-10-08","AV.MANQUEHUE NORTE Nº 151 OF 709","","62498677","13","71","","Juan Carlos Olmos","www.tribalub.cl","0");
INSERT INTO proveedor_listado VALUES("5","1","1","1","natalia.baeza@cl.klueber.com","KLUBER LUBRICATION","77.103.920-0","2015-10-08","AV.EDUARDO FREI MONTALVA Nº 9950,Modulo B1","227471188","","13","79","","DENISSE PAREDES","www.klueber.cl","0");
INSERT INTO proveedor_listado VALUES("6","1","1","1","l.ruz@edeter.cl","EDETER QUIMICA LIMITADA","76.801.400-0","2015-10-08","ALVAREZ DE TOLEDO Nº 617","223609604","","13","335","","LORENA RUZ","","0");
INSERT INTO proveedor_listado VALUES("7","1","1","1","parancibia@wurth.cl","WHURT CHILE LIMITADA","78.701.740-1","2015-10-01","Coronel Santiago Bueras N° 1345","225772100","62186582","13","339","","Patricio Arancibia","www.wurth.cl","0");
INSERT INTO proveedor_listado VALUES("8","1","1","1","juan.calderon@inlog.cl","INLOG","77.482.540-1","2015-10-01","Avda.puerto Madero Nº 9620","224117200","88626286","13","82","","Juan Francisco calderon","www.inlog.cl","0");
INSERT INTO proveedor_listado VALUES("10","1","1","1","contacto@tecnilub.cl","TECNILUB LIMITADA","89.679.600-3","2015-10-14","ALCALDE PEDRO ALARCON Nº 726","227951300","","13","95","","CRISTIAN REYES KUNCAR","www.tecnilub.cl","0");
INSERT INTO proveedor_listado VALUES("11","1","1","1","gladys@ecolab.cl","ECOLAB S.A.","96.604.460-8","2015-10-14","AV.MARATHON Nº 3011","222380707","","13","323","","GLADYS DENEGRI CONYS","www.ecolab.cl","0");
INSERT INTO proveedor_listado VALUES("12","1","1","1","adrian.reyes@ferrostal.cl","FERROSTAL CHILE S.A.C.","91.336.000-1","2015-10-14","AVDA.LO ESPEJO Nº 01565 GALPON 12","223887891","93372492","13","337","","ADRIAN REYES","","0");
INSERT INTO proveedor_listado VALUES("13","1","1","1","gerson.tapia@enex.cl","ENEX SHELL LUBRICANTES","92.011.000-2","2015-10-14","AV. DEL CONDOR Nº 520- PISO 3-CIUDAD EMPRESARIAL","6003502000","75891795","13","334","","GERSON TAPIA PEÑA","","0");
INSERT INTO proveedor_listado VALUES("18","1","1","1","lcontreras@amster.cl","AMSTER S.A.","81.151.200-1","2014-09-01","Cerro San Cristobal N° 9600","29633909","","13","79","","Luz Maria Contreras","","1");
INSERT INTO proveedor_listado VALUES("15","1","1","1","info@jimsa.com.ar","JUSTO&MARTINEZ S.A.","96.958.770-K","2015-10-14","MONTEAGUDO Nº 504-BUENOS AIRES","542954423824","","0","0","","","","0");
INSERT INTO proveedor_listado VALUES("16","1","1","1","ventas@siliconargentinasrl.com.ar","SILICON ARGENTINA S.R.L.","12261769-6","2015-10-19","ARREGUI Nº 2495- BUENOS AIRES","541145824944","","0","0","","JUAN CARLOS OLMOS","","2");
INSERT INTO proveedor_listado VALUES("17","1","1","1","ventas@silpak.cl","SILPAK","96894230-1","2015-10-19","PARINACOTA Nº 381","227390829","","13","79","","RODRIGO ALARCON","","1");
INSERT INTO proveedor_listado VALUES("19","1","1","1","servicioclientes@kaufmann.cl","KAUFMANN S.A.","92.475.000-6","2015-10-27","Av. Gladys Marín Nº 5830","227202000","","13","328","","","","1");
INSERT INTO proveedor_listado VALUES("20","1","1","1","andrea@villela.cl","VILLELA S.A.","85.845.500-6","2015-10-27","Los Maitenes Oriente Nº 1253-Enea","225994200","51492332","13","82","","Andrea Gonzalez","www.villela.cl","1");
INSERT INTO proveedor_listado VALUES("21","1","1","1","instabio@gmail.com","NELSON ISIDORO LANDAETA LILLO A.D.P. SEGURIDAD E.I.R.L","76.380.279-5","2015-10-27","Padre Jaime Larrain Nº 206","227610168","82375153","13","328","","Nelson Landaeta","","1");
INSERT INTO proveedor_listado VALUES("22","1","1","1","dismer@dismer.cl","DISMER,INTEGRAL SERVICE LIMITADA","76.003.691-9","2015-10-27","Fresia Nº 9.321- BO.CL","228963770","","13","79","","Paula Moreno","","1");
INSERT INTO proveedor_listado VALUES("23","1","1","1","portiz@dimerc.cl","DIMERC S.A.","96.670.840-9","2015-10-27","Alberto Pepper Nº 1784","223858000","","13","77","","P.Ortiz","","1");
INSERT INTO proveedor_listado VALUES("24","1","1","1","mjimenez@seals.cl","SEALS-MIGUEL IGNACIO JIMENEZ LARA","7.435.554-4","2015-10-27","Gran Avenida José M.Carrera Nº 8031","225589742","","13","96","","Miguel Jimenez","www.seals.cl","1");
INSERT INTO proveedor_listado VALUES("25","1","1","1","ventas@norglas.cl","ACRILICOS NORGLAS S.A.","80.008.300-1","2015-10-27","Santa Elena Nº 1781","225896000","42657492","13","70","","Alejandro Barros","www.norglas.cl","1");
INSERT INTO proveedor_listado VALUES("26","1","1","1","ventas@barracacargioli.cl","BARRACA CARGIOLI S.A.","76.141.696-0","2015-10-27","Gran avenida José M.Carrera Nº 8136","225581111","","13","96","","Sergio Reyes","www.barracacargioli.cl","1");
INSERT INTO proveedor_listado VALUES("27","1","1","1","ferreteria@dosestrellas.cl","FERRETERIA LAS DOS ESTRELLAS S.A.","93.631.000-1","2015-10-27","Santa Rosa Nº 2001","","","13","84","","","www.dosestrellas.cl","1");
INSERT INTO proveedor_listado VALUES("28","1","1","1","contactenos@gobantes.cl","ELECTRICIDAD GOBANTES S.A.","80.409.800-3","2015-10-27","Av. Matta Nº 1195","226900000","","13","70","","Paola Madriaga","www.gobantes.cl","1");
INSERT INTO proveedor_listado VALUES("29","1","1","1","ventas.ct@rossier.cl","CASA ROSSIER LIMITADA","78.023.550-0","2015-10-27","Enrique Concha y Toro Nº 12","224126000","","13","70","","NG","","1");
INSERT INTO proveedor_listado VALUES("30","1","1","1","ventas@sdn.cl","SUPERMERCADO DEL NEUMATICO LIMITADA","78.239.560-2","2015-10-27","Av.España Nº 72","224634800","","13","70","","","www.sdn.cl","1");
INSERT INTO proveedor_listado VALUES("31","1","1","1","timbres@spa.cl","TIMBREXPRES SPA","76.122.058-6","2015-10-27","Luis Thayer Ojeda Nº 073","229519550","","13","72","","","","1");
INSERT INTO proveedor_listado VALUES("32","1","1","1","ventas@garmendia.cl","GARMENDIA MACUS S.A.","96.889.950-3","2015-10-27","Carlos Fernández Nº 255","224229595","","13","70","","Express","","1");
INSERT INTO proveedor_listado VALUES("33","1","1","1","cotaco@cotaco.cl","CIA.TRATAMIENTOS DE AGUA Y COMBUSTION LIMITADA ( COTACO )","81.286.300-2","2015-10-27","Camino San Pedro Nº 9650","225828837","","13","82","","Myrian Zelada","www.cotaco.cl","1");
INSERT INTO proveedor_listado VALUES("34","1","1","1","info@ndu.cl","SOCIEDAD NDU INGENIERIA LTDA","78.731.270-5","2015-10-27","Vicuña Mackenna Nº 1495","229639840","","13","70","","José Perez","www.ndu.cl","1");
INSERT INTO proveedor_listado VALUES("35","1","1","1","unitec@unitec.cl","UNITEC CHILE LTDA","78.013.540-9","2015-10-28","Avda. Del Parque Nº 4928, Of 223","224804520","","13","334","","","","1");
INSERT INTO proveedor_listado VALUES("36","1","1","1","tricolor@tricolor.cl","PINTURAS TRICOLOR S.A.","76.182.753-7","2015-10-28","Av. Claudio Arrau Nº 9440","6008225000","","13","82","","Natalia","","1");



DROP TABLE proveedor_observaciones;

CREATE TABLE `proveedor_observaciones` (
  `idObservacion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idProveedor` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Observacion` text NOT NULL,
  PRIMARY KEY (`idObservacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';




DROP TABLE proveedor_paises;

CREATE TABLE `proveedor_paises` (
  `idPais` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idPais`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO proveedor_paises VALUES("1","Chile");
INSERT INTO proveedor_paises VALUES("2","Argentina");
INSERT INTO proveedor_paises VALUES("3","Brasil");
INSERT INTO proveedor_paises VALUES("4","Perú");
INSERT INTO proveedor_paises VALUES("5","EEUU");
INSERT INTO proveedor_paises VALUES("6","Uruguay");
INSERT INTO proveedor_paises VALUES("7","Alemania");



DROP TABLE proveedor_tipos;

CREATE TABLE `proveedor_tipos` (
  `idTipo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO proveedor_tipos VALUES("1","Empresa");
INSERT INTO proveedor_tipos VALUES("2","Particular(Persona)");



DROP TABLE trabajadores_listado;

CREATE TABLE `trabajadores_listado` (
  `idTrabajador` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idSistema` int(11) unsigned NOT NULL,
  `Nombre` varchar(120) NOT NULL,
  `ApellidoPat` varchar(120) NOT NULL,
  `ApellidoMat` varchar(120) NOT NULL,
  `idTipo` int(11) unsigned NOT NULL,
  `Cargo` varchar(120) NOT NULL,
  `Fono` varchar(15) NOT NULL,
  `Rut` varchar(15) NOT NULL,
  `idCiudad` int(11) unsigned NOT NULL,
  `idComuna` int(11) unsigned NOT NULL,
  `Direccion` varchar(120) NOT NULL,
  PRIMARY KEY (`idTrabajador`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

INSERT INTO trabajadores_listado VALUES("1","1","asdd","asd","asd","1","","","","0","0","");
INSERT INTO trabajadores_listado VALUES("2","1","Supervisor","asd","asd","2","asd","","","0","0","");
INSERT INTO trabajadores_listado VALUES("3","2","Daniel Esteban","Pino","Barraza","1","Supervisor de Planta","84740638","13.472.501-K","13","323","Rodrigo de Araya N° 3701 - Psje.CHUCULLO - CASA \"F\"");
INSERT INTO trabajadores_listado VALUES("4","2","Luis Nelson","Mendez","Valdivia","1","Lubricador de Planta","84376094","10.243.436-6","13","79","Rio Valdivia N° 766 - Villa Ignacio Loyola");
INSERT INTO trabajadores_listado VALUES("5","2","Adinael Enrique","Fuenmayor","Gonzalez","1","Lubricador Planificador","86760185","22882022-5","13","70","Avda.Ricardo Cumming N° 1350");
INSERT INTO trabajadores_listado VALUES("6","2","Leopoldo Albino","Oyarzun","Cayuan","1","Lubricador de Planta","92891105","10.982.993-5","13","322","Los Pehuenches N° 9897 ");
INSERT INTO trabajadores_listado VALUES("7","2","Cesar Enrique","Ramirez","Ramirez","1","Lubricador de Planta","89089681","10.892.131-5","13","94","Pasaje Las Garzas N° 867");
INSERT INTO trabajadores_listado VALUES("8","2","Claudio Antonio","Peñailillo","Oyarzun","1","Lubricador de Planta","97173800","19.240.455-K","13","94","Pasaje Las Garzas N° 845");
INSERT INTO trabajadores_listado VALUES("9","2","Rodrigo Eduardo","Ramirez","Palominos","1","Lubricador de Planta","89089681","18.862.565-7","13","94","Pasaje Las Garzas N° 867");
INSERT INTO trabajadores_listado VALUES("10","2","Marcelo Leonel","Cifuentes","Sepulveda","1","Lubricador de Planta","85252693","15.228.518-3","13","75","Las Encinas N° 2650 El Cortijo");
INSERT INTO trabajadores_listado VALUES("11","2","Fredy Heriberto","Diaz","Cayuqueo","1","Lubricador de Planta","72789915","13.812.010-4","13","82","Avda.San Daniel N° 9250");
INSERT INTO trabajadores_listado VALUES("12","2","Jhan Carlos","Minchola","Minchola","1","Lubricador de Planta","41698114","23.528.916-4","13","70","Madrid N° 1796");



DROP TABLE trabajadores_listado_tipos;

CREATE TABLE `trabajadores_listado_tipos` (
  `idTipo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO trabajadores_listado_tipos VALUES("1","Normal");
INSERT INTO trabajadores_listado_tipos VALUES("2","Administrador");



DROP TABLE usuarios_accesos;

CREATE TABLE `usuarios_accesos` (
  `idAcceso` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`idAcceso`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

INSERT INTO usuarios_accesos VALUES("1","2","2015-10-17","21:23:51");
INSERT INTO usuarios_accesos VALUES("2","2","2015-10-17","21:24:53");
INSERT INTO usuarios_accesos VALUES("3","2","2015-10-18","16:24:00");
INSERT INTO usuarios_accesos VALUES("4","2","2015-10-19","12:06:01");
INSERT INTO usuarios_accesos VALUES("5","5","2015-10-19","13:46:16");
INSERT INTO usuarios_accesos VALUES("6","5","2015-10-19","14:51:14");
INSERT INTO usuarios_accesos VALUES("7","4","2015-10-19","14:52:07");
INSERT INTO usuarios_accesos VALUES("8","4","2015-10-19","15:13:42");
INSERT INTO usuarios_accesos VALUES("9","4","2015-10-19","15:14:02");
INSERT INTO usuarios_accesos VALUES("10","4","2015-10-19","15:36:08");
INSERT INTO usuarios_accesos VALUES("11","4","2015-10-19","18:06:06");
INSERT INTO usuarios_accesos VALUES("12","4","2015-10-20","13:15:47");
INSERT INTO usuarios_accesos VALUES("13","4","2015-10-20","13:16:08");
INSERT INTO usuarios_accesos VALUES("14","1","2015-10-20","13:58:14");
INSERT INTO usuarios_accesos VALUES("15","4","2015-10-20","13:59:58");
INSERT INTO usuarios_accesos VALUES("16","4","2015-10-20","14:00:02");
INSERT INTO usuarios_accesos VALUES("17","1","2015-10-20","14:13:59");
INSERT INTO usuarios_accesos VALUES("18","1","2015-10-20","14:14:05");
INSERT INTO usuarios_accesos VALUES("19","4","2015-10-20","14:39:50");
INSERT INTO usuarios_accesos VALUES("20","4","2015-10-20","14:40:21");
INSERT INTO usuarios_accesos VALUES("21","3","2015-10-20","15:42:46");
INSERT INTO usuarios_accesos VALUES("22","3","2015-10-20","15:43:07");
INSERT INTO usuarios_accesos VALUES("23","1","2015-10-20","21:04:14");
INSERT INTO usuarios_accesos VALUES("24","5","2015-10-21","10:08:50");
INSERT INTO usuarios_accesos VALUES("25","4","2015-10-21","10:14:43");
INSERT INTO usuarios_accesos VALUES("26","4","2015-10-21","10:16:10");
INSERT INTO usuarios_accesos VALUES("27","4","2015-10-21","11:05:49");
INSERT INTO usuarios_accesos VALUES("28","4","2015-10-21","11:06:20");
INSERT INTO usuarios_accesos VALUES("29","4","2015-10-21","12:18:37");
INSERT INTO usuarios_accesos VALUES("30","4","2015-10-21","12:18:52");
INSERT INTO usuarios_accesos VALUES("31","4","2015-10-21","13:11:55");
INSERT INTO usuarios_accesos VALUES("32","4","2015-10-21","13:12:10");
INSERT INTO usuarios_accesos VALUES("33","5","2015-10-21","13:42:20");
INSERT INTO usuarios_accesos VALUES("34","5","2015-10-21","14:07:03");
INSERT INTO usuarios_accesos VALUES("35","5","2015-10-21","14:26:28");
INSERT INTO usuarios_accesos VALUES("36","5","2015-10-22","14:24:57");
INSERT INTO usuarios_accesos VALUES("37","4","2015-10-22","15:21:58");
INSERT INTO usuarios_accesos VALUES("38","4","2015-10-22","15:23:28");
INSERT INTO usuarios_accesos VALUES("39","3","2015-10-22","15:27:41");
INSERT INTO usuarios_accesos VALUES("40","3","2015-10-22","15:28:03");
INSERT INTO usuarios_accesos VALUES("41","3","2015-10-22","17:30:26");
INSERT INTO usuarios_accesos VALUES("42","3","2015-10-22","17:31:38");
INSERT INTO usuarios_accesos VALUES("43","5","2015-10-22","17:45:02");
INSERT INTO usuarios_accesos VALUES("44","2","2015-10-22","17:52:18");
INSERT INTO usuarios_accesos VALUES("45","2","2015-10-22","17:52:51");
INSERT INTO usuarios_accesos VALUES("46","3","2015-10-22","18:02:10");
INSERT INTO usuarios_accesos VALUES("47","3","2015-10-22","18:03:37");
INSERT INTO usuarios_accesos VALUES("48","2","2015-10-22","18:56:16");
INSERT INTO usuarios_accesos VALUES("49","2","2015-10-22","18:56:37");
INSERT INTO usuarios_accesos VALUES("50","4","2015-10-23","10:03:52");
INSERT INTO usuarios_accesos VALUES("51","4","2015-10-23","10:04:08");
INSERT INTO usuarios_accesos VALUES("52","5","2015-10-23","10:12:57");
INSERT INTO usuarios_accesos VALUES("53","1","2015-10-23","10:17:26");
INSERT INTO usuarios_accesos VALUES("54","4","2015-10-23","10:20:28");
INSERT INTO usuarios_accesos VALUES("55","4","2015-10-23","10:21:02");
INSERT INTO usuarios_accesos VALUES("56","5","2015-10-23","10:55:17");
INSERT INTO usuarios_accesos VALUES("57","5","2015-10-23","11:35:05");
INSERT INTO usuarios_accesos VALUES("58","4","2015-10-23","11:47:19");
INSERT INTO usuarios_accesos VALUES("59","4","2015-10-23","11:47:33");
INSERT INTO usuarios_accesos VALUES("60","5","2015-10-26","09:20:34");
INSERT INTO usuarios_accesos VALUES("61","5","2015-10-26","11:01:34");
INSERT INTO usuarios_accesos VALUES("62","4","2015-10-26","12:05:26");
INSERT INTO usuarios_accesos VALUES("63","4","2015-10-26","12:05:46");
INSERT INTO usuarios_accesos VALUES("64","5","2015-10-26","12:25:55");
INSERT INTO usuarios_accesos VALUES("65","6","2015-10-26","16:41:29");
INSERT INTO usuarios_accesos VALUES("66","6","2015-10-26","16:41:42");
INSERT INTO usuarios_accesos VALUES("67","4","2015-10-26","17:40:25");
INSERT INTO usuarios_accesos VALUES("68","4","2015-10-26","17:40:39");
INSERT INTO usuarios_accesos VALUES("69","1","2015-10-26","20:48:31");
INSERT INTO usuarios_accesos VALUES("70","1","2015-10-27","21:52:10");
INSERT INTO usuarios_accesos VALUES("71","7","2015-10-27","07:13:06");
INSERT INTO usuarios_accesos VALUES("72","6","2015-10-27","07:16:12");
INSERT INTO usuarios_accesos VALUES("73","6","2015-10-27","07:16:34");
INSERT INTO usuarios_accesos VALUES("74","7","2015-10-27","07:18:31");
INSERT INTO usuarios_accesos VALUES("75","7","2015-10-27","07:18:46");
INSERT INTO usuarios_accesos VALUES("76","2","2015-10-27","07:21:45");
INSERT INTO usuarios_accesos VALUES("77","2","2015-10-27","07:22:02");
INSERT INTO usuarios_accesos VALUES("78","3","2015-10-27","07:23:43");
INSERT INTO usuarios_accesos VALUES("79","3","2015-10-27","07:23:56");
INSERT INTO usuarios_accesos VALUES("80","4","2015-10-27","07:25:04");
INSERT INTO usuarios_accesos VALUES("81","4","2015-10-27","07:25:19");
INSERT INTO usuarios_accesos VALUES("82","2","2015-10-27","07:28:29");
INSERT INTO usuarios_accesos VALUES("83","2","2015-10-27","07:28:42");
INSERT INTO usuarios_accesos VALUES("84","4","2015-10-27","07:29:33");
INSERT INTO usuarios_accesos VALUES("85","4","2015-10-27","07:29:52");
INSERT INTO usuarios_accesos VALUES("86","5","2015-10-27","09:08:58");
INSERT INTO usuarios_accesos VALUES("87","5","2015-10-27","09:45:07");
INSERT INTO usuarios_accesos VALUES("88","5","2015-10-27","17:16:07");
INSERT INTO usuarios_accesos VALUES("89","4","2015-10-27","17:49:32");
INSERT INTO usuarios_accesos VALUES("90","4","2015-10-27","17:49:45");
INSERT INTO usuarios_accesos VALUES("91","5","2015-10-27","18:12:15");
INSERT INTO usuarios_accesos VALUES("92","5","2015-10-28","15:09:07");
INSERT INTO usuarios_accesos VALUES("93","4","2015-10-28","15:19:50");
INSERT INTO usuarios_accesos VALUES("94","4","2015-10-28","15:20:06");
INSERT INTO usuarios_accesos VALUES("95","2","2015-10-28","15:24:13");
INSERT INTO usuarios_accesos VALUES("96","2","2015-10-28","15:24:35");
INSERT INTO usuarios_accesos VALUES("97","9","2015-10-28","17:29:10");
INSERT INTO usuarios_accesos VALUES("98","9","2015-10-28","17:29:39");
INSERT INTO usuarios_accesos VALUES("99","10","2015-10-28","17:30:54");
INSERT INTO usuarios_accesos VALUES("100","10","2015-10-28","17:31:16");
INSERT INTO usuarios_accesos VALUES("101","11","2015-10-28","17:32:28");
INSERT INTO usuarios_accesos VALUES("102","11","2015-10-28","17:32:48");
INSERT INTO usuarios_accesos VALUES("103","12","2015-10-28","17:34:29");
INSERT INTO usuarios_accesos VALUES("104","12","2015-10-28","17:35:25");
INSERT INTO usuarios_accesos VALUES("105","4","2015-10-28","17:42:42");
INSERT INTO usuarios_accesos VALUES("106","4","2015-10-28","17:42:58");
INSERT INTO usuarios_accesos VALUES("107","1","2015-10-29","21:12:38");
INSERT INTO usuarios_accesos VALUES("108","4","2015-10-29","11:51:35");
INSERT INTO usuarios_accesos VALUES("109","4","2015-10-29","11:51:47");
INSERT INTO usuarios_accesos VALUES("110","4","2015-10-29","12:31:48");
INSERT INTO usuarios_accesos VALUES("111","4","2015-10-29","12:32:02");
INSERT INTO usuarios_accesos VALUES("112","1","2015-10-29","13:26:08");
INSERT INTO usuarios_accesos VALUES("113","5","2015-10-29","13:30:42");
INSERT INTO usuarios_accesos VALUES("114","9","2015-10-29","15:09:47");
INSERT INTO usuarios_accesos VALUES("115","9","2015-10-29","15:10:06");
INSERT INTO usuarios_accesos VALUES("116","10","2015-10-29","15:13:39");
INSERT INTO usuarios_accesos VALUES("117","10","2015-10-29","15:13:56");
INSERT INTO usuarios_accesos VALUES("118","11","2015-10-29","15:15:31");
INSERT INTO usuarios_accesos VALUES("119","11","2015-10-29","15:15:51");
INSERT INTO usuarios_accesos VALUES("120","12","2015-10-29","15:17:29");
INSERT INTO usuarios_accesos VALUES("121","12","2015-10-29","15:17:47");
INSERT INTO usuarios_accesos VALUES("122","13","2015-10-29","15:19:07");
INSERT INTO usuarios_accesos VALUES("123","13","2015-10-29","15:19:48");
INSERT INTO usuarios_accesos VALUES("124","5","2015-10-29","15:22:44");
INSERT INTO usuarios_accesos VALUES("125","1","2015-10-29","21:55:52");
INSERT INTO usuarios_accesos VALUES("126","4","2015-10-30","10:22:26");
INSERT INTO usuarios_accesos VALUES("127","4","2015-10-30","10:22:50");
INSERT INTO usuarios_accesos VALUES("128","4","2015-10-30","10:27:34");
INSERT INTO usuarios_accesos VALUES("129","4","2015-10-30","10:27:52");
INSERT INTO usuarios_accesos VALUES("130","4","2015-10-30","10:33:29");
INSERT INTO usuarios_accesos VALUES("131","4","2015-10-30","10:33:47");
INSERT INTO usuarios_accesos VALUES("132","4","2015-10-30","11:38:25");
INSERT INTO usuarios_accesos VALUES("133","4","2015-10-30","11:38:41");
INSERT INTO usuarios_accesos VALUES("134","1","2015-10-30","12:04:15");
INSERT INTO usuarios_accesos VALUES("135","2","2015-11-01","15:15:47");
INSERT INTO usuarios_accesos VALUES("136","1","2015-11-02","09:32:04");
INSERT INTO usuarios_accesos VALUES("137","1","2015-11-03","23:17:19");
INSERT INTO usuarios_accesos VALUES("138","5","2015-11-04","09:47:28");
INSERT INTO usuarios_accesos VALUES("139","5","2015-11-04","13:17:31");
INSERT INTO usuarios_accesos VALUES("140","2","2015-11-04","15:47:20");
INSERT INTO usuarios_accesos VALUES("141","3","2015-11-05","12:49:40");
INSERT INTO usuarios_accesos VALUES("142","3","2015-11-05","12:49:53");
INSERT INTO usuarios_accesos VALUES("143","4","2015-11-06","11:28:37");
INSERT INTO usuarios_accesos VALUES("144","4","2015-11-06","11:29:09");
INSERT INTO usuarios_accesos VALUES("145","1","2015-11-08","09:09:57");



DROP TABLE usuarios_estado;

CREATE TABLE `usuarios_estado` (
  `idEstado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO usuarios_estado VALUES("1","Activo");
INSERT INTO usuarios_estado VALUES("2","Inactivo");



DROP TABLE usuarios_listado;

CREATE TABLE `usuarios_listado` (
  `idUsuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(120) NOT NULL,
  `password` char(32) NOT NULL,
  `tipo` varchar(13) NOT NULL,
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
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COMMENT='Cuidado';

INSERT INTO usuarios_listado VALUES("1","tenshi98","b9ad227539cc03cd8199e23aa9078065","SuperAdmin","1","asd@bla1.cl","Victor Reyes","16029464-7","2014-05-14","Los Lirios 0936","8512517","Santiago","Puente Alto","usr_img_img_6626.jpg","2015-11-08","0");
INSERT INTO usuarios_listado VALUES("2","admin_acrus","81dc9bdb52d04dc20036dbd8313ed055","Administrador","1","jolmos@simyl.cl","Juan Carlos Olmos","14.681.976-1","1956-11-12","Santa Corina 0473","225234462","Santiago","La Cisterna","usr_img_Imagen1 curriculum.jpg","2015-11-04","3");
INSERT INTO usuarios_listado VALUES("3","admin_marinetti","81dc9bdb52d04dc20036dbd8313ed055","Administrador","1","jolmos@simyl.cl","Juan Carlos Olmos","14.681.976-1","1956-12-11","Americo Vespucio 1751","62498677","Santiago","Renca","usr_img_admin_marinetti.jpg","2015-11-05","2");
INSERT INTO usuarios_listado VALUES("4","admin_simyl","81dc9bdb52d04dc20036dbd8313ed055","Administrador","1","jolmos@simyl.cl","admin_simyl","14.681.976-1","1956-12-11","Santa Corina 0473","62498677","Santiago","La Cisterna","usr_img_images (1).jpg","2015-11-06","1");
INSERT INTO usuarios_listado VALUES("5","cfernandez","2e247e2eb505c42b362e80ed4d05b078","Normal","1","cfernandez@simyl.cl","Carlos Fernandez","12.261.769-6","1972-04-15","Angel Pimentel Nº 2408","57290737","Santiago","Puente Alto","usr_img_IMG-20151026-WA0002-1.jpg","2015-11-04","1");
INSERT INTO usuarios_listado VALUES("6","admin_aac","81dc9bdb52d04dc20036dbd8313ed055","Administrador","1","asd@asd22s2.cl","asd","","0000-00-00","asd","","","","","2015-10-27","4");
INSERT INTO usuarios_listado VALUES("7","admin_mtr","81dc9bdb52d04dc20036dbd8313ed055","Administrador","1","asd@bla1.cl","asd","","0000-00-00","asd","","","","","2015-10-27","5");
INSERT INTO usuarios_listado VALUES("9","admin_enapmaipu","81dc9bdb52d04dc20036dbd8313ed055","Administrador","1","","Contrato ENAP Planta Maipu","","0000-00-00","","","","","","2015-10-29","6");
INSERT INTO usuarios_listado VALUES("10","admin_enaplinares","81dc9bdb52d04dc20036dbd8313ed055","Administrador","1","","Contrato ENAP Planta Linares","","0000-00-00","","","","","","2015-10-29","7");
INSERT INTO usuarios_listado VALUES("11","admin_enapsanfernando","81dc9bdb52d04dc20036dbd8313ed055","Administrador","1","","Contrato ENAP Planta San Fernando","","0000-00-00","","","","","","2015-10-29","8");
INSERT INTO usuarios_listado VALUES("12","admin_enapenvasadolinares","81dc9bdb52d04dc20036dbd8313ed055","Administrador","1","","Contrato ENAP Planta de envasado Linares","","0000-00-00","","","","","","2015-10-29","9");
INSERT INTO usuarios_listado VALUES("13","admin_enapenvasadosanfernando","81dc9bdb52d04dc20036dbd8313ed055","Administrador","1","","Contrato ENAP Planta de envasado San Fernando","","0000-00-00","","","","","","2015-10-29","10");



DROP TABLE usuarios_msj_enviados;

CREATE TABLE `usuarios_msj_enviados` (
  `idMsj_enviado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) unsigned NOT NULL,
  `Tipo` tinyint(2) unsigned NOT NULL,
  `Titulo` varchar(120) NOT NULL,
  `Mensaje` text NOT NULL,
  `Fecha` date NOT NULL,
  `Cantidad_clientes` smallint(4) unsigned NOT NULL,
  PRIMARY KEY (`idMsj_enviado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';




DROP TABLE usuarios_msj_tran_enviados;

CREATE TABLE `usuarios_msj_tran_enviados` (
  `idMsj_enviado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) unsigned NOT NULL,
  `Mensaje` text NOT NULL,
  `Fecha` date NOT NULL,
  `Cantidad_clientes` smallint(4) unsigned NOT NULL,
  PRIMARY KEY (`idMsj_enviado`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';




DROP TABLE usuarios_observaciones;

CREATE TABLE `usuarios_observaciones` (
  `idObservacion` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario_observado` int(11) unsigned NOT NULL,
  `idUsuario` int(11) unsigned NOT NULL,
  `Fecha` date NOT NULL,
  `Observacion` text NOT NULL,
  PRIMARY KEY (`idObservacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';




DROP TABLE usuarios_permisos;

CREATE TABLE `usuarios_permisos` (
  `idPermisos` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) unsigned NOT NULL,
  `idAdmpm` int(11) unsigned NOT NULL,
  `level` char(1) NOT NULL,
  PRIMARY KEY (`idPermisos`)
) ENGINE=MyISAM AUTO_INCREMENT=853 DEFAULT CHARSET=latin1 COMMENT='Limpiar al entregar';

INSERT INTO usuarios_permisos VALUES("1","2","45","4");
INSERT INTO usuarios_permisos VALUES("2","2","35","4");
INSERT INTO usuarios_permisos VALUES("3","2","36","4");
INSERT INTO usuarios_permisos VALUES("4","2","37","4");
INSERT INTO usuarios_permisos VALUES("5","2","38","4");
INSERT INTO usuarios_permisos VALUES("6","2","39","4");
INSERT INTO usuarios_permisos VALUES("7","2","40","4");
INSERT INTO usuarios_permisos VALUES("8","2","24","4");
INSERT INTO usuarios_permisos VALUES("9","2","31","4");
INSERT INTO usuarios_permisos VALUES("10","2","25","4");
INSERT INTO usuarios_permisos VALUES("11","2","22","4");
INSERT INTO usuarios_permisos VALUES("12","2","21","4");
INSERT INTO usuarios_permisos VALUES("13","2","29","4");
INSERT INTO usuarios_permisos VALUES("14","2","26","4");
INSERT INTO usuarios_permisos VALUES("15","2","30","4");
INSERT INTO usuarios_permisos VALUES("16","2","28","4");
INSERT INTO usuarios_permisos VALUES("17","2","42","4");
INSERT INTO usuarios_permisos VALUES("18","2","41","4");
INSERT INTO usuarios_permisos VALUES("19","2","46","4");
INSERT INTO usuarios_permisos VALUES("20","2","47","4");
INSERT INTO usuarios_permisos VALUES("21","2","50","4");
INSERT INTO usuarios_permisos VALUES("22","2","51","4");
INSERT INTO usuarios_permisos VALUES("23","2","52","4");
INSERT INTO usuarios_permisos VALUES("24","2","53","4");
INSERT INTO usuarios_permisos VALUES("25","2","48","4");
INSERT INTO usuarios_permisos VALUES("26","2","49","4");
INSERT INTO usuarios_permisos VALUES("27","2","54","4");
INSERT INTO usuarios_permisos VALUES("28","2","32","4");
INSERT INTO usuarios_permisos VALUES("29","2","33","4");
INSERT INTO usuarios_permisos VALUES("30","2","34","4");
INSERT INTO usuarios_permisos VALUES("31","2","1","4");
INSERT INTO usuarios_permisos VALUES("32","2","9","4");
INSERT INTO usuarios_permisos VALUES("33","2","10","4");
INSERT INTO usuarios_permisos VALUES("34","2","7","4");
INSERT INTO usuarios_permisos VALUES("35","2","8","4");
INSERT INTO usuarios_permisos VALUES("36","2","11","4");
INSERT INTO usuarios_permisos VALUES("37","2","20","4");
INSERT INTO usuarios_permisos VALUES("38","2","17","4");
INSERT INTO usuarios_permisos VALUES("39","2","19","4");
INSERT INTO usuarios_permisos VALUES("40","2","18","4");
INSERT INTO usuarios_permisos VALUES("41","2","12","4");
INSERT INTO usuarios_permisos VALUES("42","2","23","4");
INSERT INTO usuarios_permisos VALUES("43","2","27","4");
INSERT INTO usuarios_permisos VALUES("44","2","14","4");
INSERT INTO usuarios_permisos VALUES("45","2","15","4");
INSERT INTO usuarios_permisos VALUES("46","2","44","4");
INSERT INTO usuarios_permisos VALUES("47","2","43","4");
INSERT INTO usuarios_permisos VALUES("48","2","16","4");
INSERT INTO usuarios_permisos VALUES("49","2","5","4");
INSERT INTO usuarios_permisos VALUES("50","2","6","4");
INSERT INTO usuarios_permisos VALUES("51","2","4","4");
INSERT INTO usuarios_permisos VALUES("52","2","3","4");
INSERT INTO usuarios_permisos VALUES("53","2","2","4");
INSERT INTO usuarios_permisos VALUES("54","3","45","4");
INSERT INTO usuarios_permisos VALUES("55","3","35","4");
INSERT INTO usuarios_permisos VALUES("56","3","36","4");
INSERT INTO usuarios_permisos VALUES("57","3","37","4");
INSERT INTO usuarios_permisos VALUES("58","3","38","4");
INSERT INTO usuarios_permisos VALUES("59","3","39","4");
INSERT INTO usuarios_permisos VALUES("60","3","40","4");
INSERT INTO usuarios_permisos VALUES("61","3","24","4");
INSERT INTO usuarios_permisos VALUES("62","3","31","4");
INSERT INTO usuarios_permisos VALUES("63","3","25","4");
INSERT INTO usuarios_permisos VALUES("64","3","22","4");
INSERT INTO usuarios_permisos VALUES("65","3","21","4");
INSERT INTO usuarios_permisos VALUES("66","3","29","4");
INSERT INTO usuarios_permisos VALUES("67","3","26","4");
INSERT INTO usuarios_permisos VALUES("68","3","30","4");
INSERT INTO usuarios_permisos VALUES("69","3","28","4");
INSERT INTO usuarios_permisos VALUES("70","3","42","4");
INSERT INTO usuarios_permisos VALUES("71","3","41","4");
INSERT INTO usuarios_permisos VALUES("72","3","46","4");
INSERT INTO usuarios_permisos VALUES("73","3","47","4");
INSERT INTO usuarios_permisos VALUES("74","3","50","4");
INSERT INTO usuarios_permisos VALUES("75","3","51","4");
INSERT INTO usuarios_permisos VALUES("76","3","52","4");
INSERT INTO usuarios_permisos VALUES("77","3","53","4");
INSERT INTO usuarios_permisos VALUES("78","3","48","4");
INSERT INTO usuarios_permisos VALUES("79","3","49","4");
INSERT INTO usuarios_permisos VALUES("80","3","54","4");
INSERT INTO usuarios_permisos VALUES("81","3","32","4");
INSERT INTO usuarios_permisos VALUES("82","3","33","4");
INSERT INTO usuarios_permisos VALUES("83","3","34","4");
INSERT INTO usuarios_permisos VALUES("84","3","1","4");
INSERT INTO usuarios_permisos VALUES("85","3","9","4");
INSERT INTO usuarios_permisos VALUES("86","3","10","4");
INSERT INTO usuarios_permisos VALUES("87","3","7","4");
INSERT INTO usuarios_permisos VALUES("88","3","8","4");
INSERT INTO usuarios_permisos VALUES("89","3","11","4");
INSERT INTO usuarios_permisos VALUES("90","3","20","4");
INSERT INTO usuarios_permisos VALUES("91","3","17","4");
INSERT INTO usuarios_permisos VALUES("92","3","19","4");
INSERT INTO usuarios_permisos VALUES("93","3","18","4");
INSERT INTO usuarios_permisos VALUES("94","3","12","4");
INSERT INTO usuarios_permisos VALUES("95","3","23","4");
INSERT INTO usuarios_permisos VALUES("96","3","27","4");
INSERT INTO usuarios_permisos VALUES("97","3","14","4");
INSERT INTO usuarios_permisos VALUES("98","3","15","4");
INSERT INTO usuarios_permisos VALUES("99","3","44","4");
INSERT INTO usuarios_permisos VALUES("100","3","43","4");
INSERT INTO usuarios_permisos VALUES("101","3","16","4");
INSERT INTO usuarios_permisos VALUES("102","3","5","4");
INSERT INTO usuarios_permisos VALUES("103","3","6","4");
INSERT INTO usuarios_permisos VALUES("104","3","4","4");
INSERT INTO usuarios_permisos VALUES("105","3","3","4");
INSERT INTO usuarios_permisos VALUES("106","3","2","4");
INSERT INTO usuarios_permisos VALUES("456","4","45","4");
INSERT INTO usuarios_permisos VALUES("108","4","35","4");
INSERT INTO usuarios_permisos VALUES("109","4","36","4");
INSERT INTO usuarios_permisos VALUES("110","4","37","4");
INSERT INTO usuarios_permisos VALUES("111","4","38","4");
INSERT INTO usuarios_permisos VALUES("112","4","39","4");
INSERT INTO usuarios_permisos VALUES("113","4","40","4");
INSERT INTO usuarios_permisos VALUES("114","4","24","4");
INSERT INTO usuarios_permisos VALUES("115","4","31","4");
INSERT INTO usuarios_permisos VALUES("116","4","25","4");
INSERT INTO usuarios_permisos VALUES("117","4","22","4");
INSERT INTO usuarios_permisos VALUES("118","4","21","4");
INSERT INTO usuarios_permisos VALUES("119","4","29","4");
INSERT INTO usuarios_permisos VALUES("120","4","26","4");
INSERT INTO usuarios_permisos VALUES("121","4","30","4");
INSERT INTO usuarios_permisos VALUES("122","4","28","4");
INSERT INTO usuarios_permisos VALUES("123","4","42","4");
INSERT INTO usuarios_permisos VALUES("124","4","41","4");
INSERT INTO usuarios_permisos VALUES("125","4","46","4");
INSERT INTO usuarios_permisos VALUES("126","4","47","4");
INSERT INTO usuarios_permisos VALUES("127","4","50","4");
INSERT INTO usuarios_permisos VALUES("128","4","51","4");
INSERT INTO usuarios_permisos VALUES("129","4","52","4");
INSERT INTO usuarios_permisos VALUES("130","4","53","4");
INSERT INTO usuarios_permisos VALUES("131","4","48","4");
INSERT INTO usuarios_permisos VALUES("132","4","49","4");
INSERT INTO usuarios_permisos VALUES("133","4","54","4");
INSERT INTO usuarios_permisos VALUES("134","4","32","4");
INSERT INTO usuarios_permisos VALUES("135","4","33","4");
INSERT INTO usuarios_permisos VALUES("136","4","34","4");
INSERT INTO usuarios_permisos VALUES("137","4","1","4");
INSERT INTO usuarios_permisos VALUES("138","4","9","4");
INSERT INTO usuarios_permisos VALUES("139","4","10","4");
INSERT INTO usuarios_permisos VALUES("140","4","7","4");
INSERT INTO usuarios_permisos VALUES("141","4","8","4");
INSERT INTO usuarios_permisos VALUES("142","4","11","4");
INSERT INTO usuarios_permisos VALUES("143","4","20","4");
INSERT INTO usuarios_permisos VALUES("144","4","17","4");
INSERT INTO usuarios_permisos VALUES("145","4","19","4");
INSERT INTO usuarios_permisos VALUES("146","4","18","4");
INSERT INTO usuarios_permisos VALUES("147","4","12","4");
INSERT INTO usuarios_permisos VALUES("148","4","23","4");
INSERT INTO usuarios_permisos VALUES("149","4","27","4");
INSERT INTO usuarios_permisos VALUES("150","4","14","4");
INSERT INTO usuarios_permisos VALUES("151","4","15","4");
INSERT INTO usuarios_permisos VALUES("152","4","44","4");
INSERT INTO usuarios_permisos VALUES("153","4","43","4");
INSERT INTO usuarios_permisos VALUES("154","4","16","4");
INSERT INTO usuarios_permisos VALUES("155","4","5","4");
INSERT INTO usuarios_permisos VALUES("156","4","6","4");
INSERT INTO usuarios_permisos VALUES("157","4","4","4");
INSERT INTO usuarios_permisos VALUES("158","4","3","4");
INSERT INTO usuarios_permisos VALUES("159","4","2","4");
INSERT INTO usuarios_permisos VALUES("160","4","55","4");
INSERT INTO usuarios_permisos VALUES("161","4","56","4");
INSERT INTO usuarios_permisos VALUES("162","4","59","4");
INSERT INTO usuarios_permisos VALUES("163","4","60","4");
INSERT INTO usuarios_permisos VALUES("164","4","61","4");
INSERT INTO usuarios_permisos VALUES("165","4","62","4");
INSERT INTO usuarios_permisos VALUES("166","4","57","4");
INSERT INTO usuarios_permisos VALUES("167","4","58","4");
INSERT INTO usuarios_permisos VALUES("168","4","63","4");
INSERT INTO usuarios_permisos VALUES("194","4","64","4");
INSERT INTO usuarios_permisos VALUES("195","5","44","4");
INSERT INTO usuarios_permisos VALUES("196","5","43","4");
INSERT INTO usuarios_permisos VALUES("197","5","12","4");
INSERT INTO usuarios_permisos VALUES("198","5","23","4");
INSERT INTO usuarios_permisos VALUES("199","5","27","4");
INSERT INTO usuarios_permisos VALUES("200","5","14","4");
INSERT INTO usuarios_permisos VALUES("176","5","24","4");
INSERT INTO usuarios_permisos VALUES("467","5","67","1");
INSERT INTO usuarios_permisos VALUES("178","5","25","4");
INSERT INTO usuarios_permisos VALUES("179","5","22","4");
INSERT INTO usuarios_permisos VALUES("180","5","21","4");
INSERT INTO usuarios_permisos VALUES("181","5","29","4");
INSERT INTO usuarios_permisos VALUES("182","5","26","4");
INSERT INTO usuarios_permisos VALUES("183","5","30","4");
INSERT INTO usuarios_permisos VALUES("184","5","28","4");
INSERT INTO usuarios_permisos VALUES("185","5","46","3");
INSERT INTO usuarios_permisos VALUES("186","5","47","3");
INSERT INTO usuarios_permisos VALUES("187","5","50","3");
INSERT INTO usuarios_permisos VALUES("188","5","51","3");
INSERT INTO usuarios_permisos VALUES("189","5","52","3");
INSERT INTO usuarios_permisos VALUES("190","5","53","3");
INSERT INTO usuarios_permisos VALUES("191","5","48","3");
INSERT INTO usuarios_permisos VALUES("192","5","49","3");
INSERT INTO usuarios_permisos VALUES("193","5","54","3");
INSERT INTO usuarios_permisos VALUES("201","5","15","4");
INSERT INTO usuarios_permisos VALUES("202","5","42","4");
INSERT INTO usuarios_permisos VALUES("203","5","41","4");
INSERT INTO usuarios_permisos VALUES("204","5","64","4");
INSERT INTO usuarios_permisos VALUES("205","4","65","4");
INSERT INTO usuarios_permisos VALUES("206","3","64","4");
INSERT INTO usuarios_permisos VALUES("207","3","65","4");
INSERT INTO usuarios_permisos VALUES("208","3","55","4");
INSERT INTO usuarios_permisos VALUES("209","3","56","4");
INSERT INTO usuarios_permisos VALUES("210","3","59","4");
INSERT INTO usuarios_permisos VALUES("211","3","60","4");
INSERT INTO usuarios_permisos VALUES("212","3","61","4");
INSERT INTO usuarios_permisos VALUES("213","3","62","4");
INSERT INTO usuarios_permisos VALUES("214","3","57","4");
INSERT INTO usuarios_permisos VALUES("215","3","58","4");
INSERT INTO usuarios_permisos VALUES("216","3","63","4");
INSERT INTO usuarios_permisos VALUES("217","2","64","4");
INSERT INTO usuarios_permisos VALUES("218","2","65","4");
INSERT INTO usuarios_permisos VALUES("219","2","55","4");
INSERT INTO usuarios_permisos VALUES("220","2","56","4");
INSERT INTO usuarios_permisos VALUES("221","2","59","4");
INSERT INTO usuarios_permisos VALUES("222","2","60","4");
INSERT INTO usuarios_permisos VALUES("223","2","61","4");
INSERT INTO usuarios_permisos VALUES("224","2","62","4");
INSERT INTO usuarios_permisos VALUES("225","2","57","4");
INSERT INTO usuarios_permisos VALUES("226","2","58","4");
INSERT INTO usuarios_permisos VALUES("227","2","63","4");
INSERT INTO usuarios_permisos VALUES("228","6","45","4");
INSERT INTO usuarios_permisos VALUES("229","6","35","4");
INSERT INTO usuarios_permisos VALUES("230","6","36","4");
INSERT INTO usuarios_permisos VALUES("231","6","37","4");
INSERT INTO usuarios_permisos VALUES("232","6","38","4");
INSERT INTO usuarios_permisos VALUES("233","6","39","4");
INSERT INTO usuarios_permisos VALUES("234","6","40","4");
INSERT INTO usuarios_permisos VALUES("235","6","24","4");
INSERT INTO usuarios_permisos VALUES("236","6","31","4");
INSERT INTO usuarios_permisos VALUES("237","6","25","4");
INSERT INTO usuarios_permisos VALUES("238","6","22","4");
INSERT INTO usuarios_permisos VALUES("239","6","21","4");
INSERT INTO usuarios_permisos VALUES("240","6","29","4");
INSERT INTO usuarios_permisos VALUES("241","6","26","4");
INSERT INTO usuarios_permisos VALUES("242","6","30","4");
INSERT INTO usuarios_permisos VALUES("243","6","28","4");
INSERT INTO usuarios_permisos VALUES("244","6","42","4");
INSERT INTO usuarios_permisos VALUES("245","6","41","4");
INSERT INTO usuarios_permisos VALUES("246","6","64","4");
INSERT INTO usuarios_permisos VALUES("247","6","65","4");
INSERT INTO usuarios_permisos VALUES("248","6","55","4");
INSERT INTO usuarios_permisos VALUES("249","6","56","4");
INSERT INTO usuarios_permisos VALUES("250","6","59","4");
INSERT INTO usuarios_permisos VALUES("251","6","60","4");
INSERT INTO usuarios_permisos VALUES("252","6","61","4");
INSERT INTO usuarios_permisos VALUES("253","6","62","4");
INSERT INTO usuarios_permisos VALUES("254","6","57","4");
INSERT INTO usuarios_permisos VALUES("255","6","58","4");
INSERT INTO usuarios_permisos VALUES("256","6","63","4");
INSERT INTO usuarios_permisos VALUES("257","6","46","4");
INSERT INTO usuarios_permisos VALUES("258","6","47","4");
INSERT INTO usuarios_permisos VALUES("259","6","50","4");
INSERT INTO usuarios_permisos VALUES("260","6","51","4");
INSERT INTO usuarios_permisos VALUES("261","6","52","4");
INSERT INTO usuarios_permisos VALUES("262","6","53","4");
INSERT INTO usuarios_permisos VALUES("263","6","48","4");
INSERT INTO usuarios_permisos VALUES("264","6","49","4");
INSERT INTO usuarios_permisos VALUES("265","6","54","4");
INSERT INTO usuarios_permisos VALUES("266","6","32","4");
INSERT INTO usuarios_permisos VALUES("267","6","33","4");
INSERT INTO usuarios_permisos VALUES("268","6","34","4");
INSERT INTO usuarios_permisos VALUES("269","6","1","4");
INSERT INTO usuarios_permisos VALUES("270","6","9","4");
INSERT INTO usuarios_permisos VALUES("271","6","10","4");
INSERT INTO usuarios_permisos VALUES("272","6","7","4");
INSERT INTO usuarios_permisos VALUES("273","6","8","4");
INSERT INTO usuarios_permisos VALUES("274","6","11","4");
INSERT INTO usuarios_permisos VALUES("275","6","20","4");
INSERT INTO usuarios_permisos VALUES("276","6","17","4");
INSERT INTO usuarios_permisos VALUES("277","6","19","4");
INSERT INTO usuarios_permisos VALUES("278","6","18","4");
INSERT INTO usuarios_permisos VALUES("279","6","12","4");
INSERT INTO usuarios_permisos VALUES("280","6","23","4");
INSERT INTO usuarios_permisos VALUES("281","6","27","4");
INSERT INTO usuarios_permisos VALUES("282","6","14","4");
INSERT INTO usuarios_permisos VALUES("283","6","15","4");
INSERT INTO usuarios_permisos VALUES("284","6","44","4");
INSERT INTO usuarios_permisos VALUES("285","6","43","4");
INSERT INTO usuarios_permisos VALUES("286","6","16","4");
INSERT INTO usuarios_permisos VALUES("287","6","5","4");
INSERT INTO usuarios_permisos VALUES("288","6","6","4");
INSERT INTO usuarios_permisos VALUES("289","6","4","4");
INSERT INTO usuarios_permisos VALUES("290","6","3","4");
INSERT INTO usuarios_permisos VALUES("291","6","2","4");
INSERT INTO usuarios_permisos VALUES("292","7","45","4");
INSERT INTO usuarios_permisos VALUES("293","7","35","4");
INSERT INTO usuarios_permisos VALUES("294","7","36","4");
INSERT INTO usuarios_permisos VALUES("295","7","37","4");
INSERT INTO usuarios_permisos VALUES("296","7","38","4");
INSERT INTO usuarios_permisos VALUES("297","7","39","4");
INSERT INTO usuarios_permisos VALUES("298","7","40","4");
INSERT INTO usuarios_permisos VALUES("299","7","24","4");
INSERT INTO usuarios_permisos VALUES("300","7","31","4");
INSERT INTO usuarios_permisos VALUES("301","7","25","4");
INSERT INTO usuarios_permisos VALUES("302","7","22","4");
INSERT INTO usuarios_permisos VALUES("303","7","21","4");
INSERT INTO usuarios_permisos VALUES("304","7","29","4");
INSERT INTO usuarios_permisos VALUES("305","7","26","4");
INSERT INTO usuarios_permisos VALUES("306","7","30","4");
INSERT INTO usuarios_permisos VALUES("307","7","28","4");
INSERT INTO usuarios_permisos VALUES("308","7","42","4");
INSERT INTO usuarios_permisos VALUES("309","7","41","4");
INSERT INTO usuarios_permisos VALUES("310","7","64","4");
INSERT INTO usuarios_permisos VALUES("311","7","65","4");
INSERT INTO usuarios_permisos VALUES("312","7","55","4");
INSERT INTO usuarios_permisos VALUES("313","7","56","4");
INSERT INTO usuarios_permisos VALUES("314","7","59","4");
INSERT INTO usuarios_permisos VALUES("315","7","60","4");
INSERT INTO usuarios_permisos VALUES("316","7","61","4");
INSERT INTO usuarios_permisos VALUES("317","7","62","4");
INSERT INTO usuarios_permisos VALUES("318","7","57","4");
INSERT INTO usuarios_permisos VALUES("325","7","51","4");
INSERT INTO usuarios_permisos VALUES("320","7","58","4");
INSERT INTO usuarios_permisos VALUES("321","7","63","4");
INSERT INTO usuarios_permisos VALUES("322","7","46","4");
INSERT INTO usuarios_permisos VALUES("323","7","47","4");
INSERT INTO usuarios_permisos VALUES("324","7","50","4");
INSERT INTO usuarios_permisos VALUES("326","7","52","4");
INSERT INTO usuarios_permisos VALUES("327","7","53","4");
INSERT INTO usuarios_permisos VALUES("328","7","48","4");
INSERT INTO usuarios_permisos VALUES("329","7","49","4");
INSERT INTO usuarios_permisos VALUES("330","7","54","4");
INSERT INTO usuarios_permisos VALUES("331","7","32","4");
INSERT INTO usuarios_permisos VALUES("332","7","33","4");
INSERT INTO usuarios_permisos VALUES("333","7","34","4");
INSERT INTO usuarios_permisos VALUES("334","7","1","4");
INSERT INTO usuarios_permisos VALUES("335","7","9","4");
INSERT INTO usuarios_permisos VALUES("336","7","10","4");
INSERT INTO usuarios_permisos VALUES("337","7","7","4");
INSERT INTO usuarios_permisos VALUES("338","7","8","4");
INSERT INTO usuarios_permisos VALUES("339","7","11","4");
INSERT INTO usuarios_permisos VALUES("340","7","20","4");
INSERT INTO usuarios_permisos VALUES("341","7","17","4");
INSERT INTO usuarios_permisos VALUES("342","7","19","4");
INSERT INTO usuarios_permisos VALUES("343","7","18","4");
INSERT INTO usuarios_permisos VALUES("344","7","12","4");
INSERT INTO usuarios_permisos VALUES("345","7","23","4");
INSERT INTO usuarios_permisos VALUES("346","7","27","4");
INSERT INTO usuarios_permisos VALUES("347","7","14","4");
INSERT INTO usuarios_permisos VALUES("348","7","15","4");
INSERT INTO usuarios_permisos VALUES("349","7","44","4");
INSERT INTO usuarios_permisos VALUES("350","7","43","4");
INSERT INTO usuarios_permisos VALUES("354","7","5","4");
INSERT INTO usuarios_permisos VALUES("355","7","6","4");
INSERT INTO usuarios_permisos VALUES("353","7","16","4");
INSERT INTO usuarios_permisos VALUES("356","7","4","4");
INSERT INTO usuarios_permisos VALUES("357","7","3","4");
INSERT INTO usuarios_permisos VALUES("358","7","2","4");
INSERT INTO usuarios_permisos VALUES("359","4","70","4");
INSERT INTO usuarios_permisos VALUES("360","4","66","4");
INSERT INTO usuarios_permisos VALUES("361","4","67","4");
INSERT INTO usuarios_permisos VALUES("362","4","68","4");
INSERT INTO usuarios_permisos VALUES("363","4","69","4");
INSERT INTO usuarios_permisos VALUES("364","6","70","4");
INSERT INTO usuarios_permisos VALUES("365","6","66","4");
INSERT INTO usuarios_permisos VALUES("366","6","67","4");
INSERT INTO usuarios_permisos VALUES("367","6","68","4");
INSERT INTO usuarios_permisos VALUES("368","6","69","4");
INSERT INTO usuarios_permisos VALUES("369","2","70","4");
INSERT INTO usuarios_permisos VALUES("370","2","66","4");
INSERT INTO usuarios_permisos VALUES("371","2","67","4");
INSERT INTO usuarios_permisos VALUES("372","2","68","4");
INSERT INTO usuarios_permisos VALUES("373","2","69","4");
INSERT INTO usuarios_permisos VALUES("374","3","70","4");
INSERT INTO usuarios_permisos VALUES("375","3","66","4");
INSERT INTO usuarios_permisos VALUES("376","3","67","4");
INSERT INTO usuarios_permisos VALUES("377","3","68","4");
INSERT INTO usuarios_permisos VALUES("378","3","69","4");
INSERT INTO usuarios_permisos VALUES("379","7","70","4");
INSERT INTO usuarios_permisos VALUES("380","7","66","4");
INSERT INTO usuarios_permisos VALUES("381","7","67","4");
INSERT INTO usuarios_permisos VALUES("382","7","68","4");
INSERT INTO usuarios_permisos VALUES("383","7","69","4");
INSERT INTO usuarios_permisos VALUES("384","8","45","4");
INSERT INTO usuarios_permisos VALUES("385","8","35","4");
INSERT INTO usuarios_permisos VALUES("386","8","36","4");
INSERT INTO usuarios_permisos VALUES("387","8","37","4");
INSERT INTO usuarios_permisos VALUES("388","8","38","4");
INSERT INTO usuarios_permisos VALUES("389","8","39","4");
INSERT INTO usuarios_permisos VALUES("390","8","40","4");
INSERT INTO usuarios_permisos VALUES("391","8","24","4");
INSERT INTO usuarios_permisos VALUES("392","8","31","4");
INSERT INTO usuarios_permisos VALUES("393","8","25","4");
INSERT INTO usuarios_permisos VALUES("394","8","22","4");
INSERT INTO usuarios_permisos VALUES("395","8","21","4");
INSERT INTO usuarios_permisos VALUES("396","8","29","4");
INSERT INTO usuarios_permisos VALUES("397","8","26","4");
INSERT INTO usuarios_permisos VALUES("398","8","30","4");
INSERT INTO usuarios_permisos VALUES("399","8","28","4");
INSERT INTO usuarios_permisos VALUES("400","8","42","4");
INSERT INTO usuarios_permisos VALUES("401","8","41","4");
INSERT INTO usuarios_permisos VALUES("402","8","70","4");
INSERT INTO usuarios_permisos VALUES("403","8","66","4");
INSERT INTO usuarios_permisos VALUES("404","8","64","4");
INSERT INTO usuarios_permisos VALUES("405","8","65","4");
INSERT INTO usuarios_permisos VALUES("406","8","67","4");
INSERT INTO usuarios_permisos VALUES("407","8","68","4");
INSERT INTO usuarios_permisos VALUES("408","8","69","4");
INSERT INTO usuarios_permisos VALUES("409","8","55","4");
INSERT INTO usuarios_permisos VALUES("410","8","56","4");
INSERT INTO usuarios_permisos VALUES("411","8","59","4");
INSERT INTO usuarios_permisos VALUES("412","8","60","4");
INSERT INTO usuarios_permisos VALUES("413","8","61","4");
INSERT INTO usuarios_permisos VALUES("414","8","62","4");
INSERT INTO usuarios_permisos VALUES("415","8","57","4");
INSERT INTO usuarios_permisos VALUES("416","8","58","4");
INSERT INTO usuarios_permisos VALUES("417","8","63","4");
INSERT INTO usuarios_permisos VALUES("418","8","46","4");
INSERT INTO usuarios_permisos VALUES("419","8","47","4");
INSERT INTO usuarios_permisos VALUES("420","8","50","4");
INSERT INTO usuarios_permisos VALUES("421","8","51","4");
INSERT INTO usuarios_permisos VALUES("422","8","52","4");
INSERT INTO usuarios_permisos VALUES("423","8","53","4");
INSERT INTO usuarios_permisos VALUES("424","8","48","4");
INSERT INTO usuarios_permisos VALUES("425","8","49","4");
INSERT INTO usuarios_permisos VALUES("426","8","54","4");
INSERT INTO usuarios_permisos VALUES("427","8","32","4");
INSERT INTO usuarios_permisos VALUES("428","8","33","4");
INSERT INTO usuarios_permisos VALUES("429","8","34","4");
INSERT INTO usuarios_permisos VALUES("430","8","1","4");
INSERT INTO usuarios_permisos VALUES("431","8","9","4");
INSERT INTO usuarios_permisos VALUES("432","8","10","4");
INSERT INTO usuarios_permisos VALUES("433","8","7","4");
INSERT INTO usuarios_permisos VALUES("434","8","8","4");
INSERT INTO usuarios_permisos VALUES("435","8","11","4");
INSERT INTO usuarios_permisos VALUES("436","8","20","4");
INSERT INTO usuarios_permisos VALUES("437","8","17","4");
INSERT INTO usuarios_permisos VALUES("438","8","19","4");
INSERT INTO usuarios_permisos VALUES("439","8","18","4");
INSERT INTO usuarios_permisos VALUES("440","8","12","4");
INSERT INTO usuarios_permisos VALUES("441","8","23","4");
INSERT INTO usuarios_permisos VALUES("442","8","27","4");
INSERT INTO usuarios_permisos VALUES("443","8","14","4");
INSERT INTO usuarios_permisos VALUES("444","8","15","4");
INSERT INTO usuarios_permisos VALUES("445","8","44","4");
INSERT INTO usuarios_permisos VALUES("446","8","43","4");
INSERT INTO usuarios_permisos VALUES("447","8","16","4");
INSERT INTO usuarios_permisos VALUES("448","8","5","4");
INSERT INTO usuarios_permisos VALUES("449","8","6","4");
INSERT INTO usuarios_permisos VALUES("450","8","4","4");
INSERT INTO usuarios_permisos VALUES("451","8","3","4");
INSERT INTO usuarios_permisos VALUES("452","8","2","4");
INSERT INTO usuarios_permisos VALUES("453","5","66","4");
INSERT INTO usuarios_permisos VALUES("454","5","70","4");
INSERT INTO usuarios_permisos VALUES("455","5","65","4");
INSERT INTO usuarios_permisos VALUES("457","4","72","4");
INSERT INTO usuarios_permisos VALUES("458","4","71","4");
INSERT INTO usuarios_permisos VALUES("459","3","71","4");
INSERT INTO usuarios_permisos VALUES("460","3","72","4");
INSERT INTO usuarios_permisos VALUES("461","5","35","4");
INSERT INTO usuarios_permisos VALUES("462","5","36","4");
INSERT INTO usuarios_permisos VALUES("463","5","37","4");
INSERT INTO usuarios_permisos VALUES("464","5","38","4");
INSERT INTO usuarios_permisos VALUES("465","5","39","4");
INSERT INTO usuarios_permisos VALUES("466","5","40","4");
INSERT INTO usuarios_permisos VALUES("468","5","68","1");
INSERT INTO usuarios_permisos VALUES("469","5","69","1");
INSERT INTO usuarios_permisos VALUES("470","5","55","3");
INSERT INTO usuarios_permisos VALUES("471","5","56","3");
INSERT INTO usuarios_permisos VALUES("472","5","59","3");
INSERT INTO usuarios_permisos VALUES("473","5","60","1");
INSERT INTO usuarios_permisos VALUES("474","5","61","1");
INSERT INTO usuarios_permisos VALUES("475","5","62","1");
INSERT INTO usuarios_permisos VALUES("476","5","57","3");
INSERT INTO usuarios_permisos VALUES("477","5","58","3");
INSERT INTO usuarios_permisos VALUES("478","5","63","3");
INSERT INTO usuarios_permisos VALUES("479","5","32","4");
INSERT INTO usuarios_permisos VALUES("480","5","33","4");
INSERT INTO usuarios_permisos VALUES("481","5","34","4");
INSERT INTO usuarios_permisos VALUES("482","12","45","4");
INSERT INTO usuarios_permisos VALUES("483","6","71","4");
INSERT INTO usuarios_permisos VALUES("484","6","72","4");
INSERT INTO usuarios_permisos VALUES("485","2","71","4");
INSERT INTO usuarios_permisos VALUES("486","2","72","4");
INSERT INTO usuarios_permisos VALUES("487","12","35","4");
INSERT INTO usuarios_permisos VALUES("488","12","36","4");
INSERT INTO usuarios_permisos VALUES("489","12","37","4");
INSERT INTO usuarios_permisos VALUES("490","12","38","4");
INSERT INTO usuarios_permisos VALUES("491","12","39","4");
INSERT INTO usuarios_permisos VALUES("492","12","40","4");
INSERT INTO usuarios_permisos VALUES("493","12","24","4");
INSERT INTO usuarios_permisos VALUES("494","12","31","4");
INSERT INTO usuarios_permisos VALUES("495","12","25","4");
INSERT INTO usuarios_permisos VALUES("496","12","22","4");
INSERT INTO usuarios_permisos VALUES("497","12","21","4");
INSERT INTO usuarios_permisos VALUES("498","12","29","4");
INSERT INTO usuarios_permisos VALUES("499","12","26","4");
INSERT INTO usuarios_permisos VALUES("500","12","30","4");
INSERT INTO usuarios_permisos VALUES("501","12","28","4");
INSERT INTO usuarios_permisos VALUES("502","12","42","4");
INSERT INTO usuarios_permisos VALUES("503","12","41","4");
INSERT INTO usuarios_permisos VALUES("504","12","70","4");
INSERT INTO usuarios_permisos VALUES("505","12","66","4");
INSERT INTO usuarios_permisos VALUES("506","12","64","4");
INSERT INTO usuarios_permisos VALUES("507","12","65","4");
INSERT INTO usuarios_permisos VALUES("508","12","67","4");
INSERT INTO usuarios_permisos VALUES("509","12","68","4");
INSERT INTO usuarios_permisos VALUES("510","12","69","4");
INSERT INTO usuarios_permisos VALUES("511","12","55","4");
INSERT INTO usuarios_permisos VALUES("512","12","56","4");
INSERT INTO usuarios_permisos VALUES("513","12","59","4");
INSERT INTO usuarios_permisos VALUES("514","12","60","4");
INSERT INTO usuarios_permisos VALUES("515","12","61","4");
INSERT INTO usuarios_permisos VALUES("516","12","62","4");
INSERT INTO usuarios_permisos VALUES("517","12","57","4");
INSERT INTO usuarios_permisos VALUES("518","12","58","4");
INSERT INTO usuarios_permisos VALUES("519","12","63","4");
INSERT INTO usuarios_permisos VALUES("520","12","46","4");
INSERT INTO usuarios_permisos VALUES("521","12","47","4");
INSERT INTO usuarios_permisos VALUES("522","12","50","4");
INSERT INTO usuarios_permisos VALUES("523","12","51","4");
INSERT INTO usuarios_permisos VALUES("524","12","52","4");
INSERT INTO usuarios_permisos VALUES("525","12","53","4");
INSERT INTO usuarios_permisos VALUES("526","12","48","4");
INSERT INTO usuarios_permisos VALUES("527","12","49","4");
INSERT INTO usuarios_permisos VALUES("528","12","54","4");
INSERT INTO usuarios_permisos VALUES("529","12","71","4");
INSERT INTO usuarios_permisos VALUES("530","12","72","4");
INSERT INTO usuarios_permisos VALUES("531","12","32","4");
INSERT INTO usuarios_permisos VALUES("532","12","33","4");
INSERT INTO usuarios_permisos VALUES("533","12","34","4");
INSERT INTO usuarios_permisos VALUES("534","12","1","4");
INSERT INTO usuarios_permisos VALUES("535","12","9","4");
INSERT INTO usuarios_permisos VALUES("536","12","10","4");
INSERT INTO usuarios_permisos VALUES("537","12","7","4");
INSERT INTO usuarios_permisos VALUES("538","12","8","4");
INSERT INTO usuarios_permisos VALUES("539","12","11","4");
INSERT INTO usuarios_permisos VALUES("540","12","20","4");
INSERT INTO usuarios_permisos VALUES("541","12","17","4");
INSERT INTO usuarios_permisos VALUES("542","12","19","4");
INSERT INTO usuarios_permisos VALUES("543","12","18","4");
INSERT INTO usuarios_permisos VALUES("544","12","12","4");
INSERT INTO usuarios_permisos VALUES("545","12","23","4");
INSERT INTO usuarios_permisos VALUES("546","12","27","4");
INSERT INTO usuarios_permisos VALUES("547","12","14","4");
INSERT INTO usuarios_permisos VALUES("548","12","15","4");
INSERT INTO usuarios_permisos VALUES("549","12","44","4");
INSERT INTO usuarios_permisos VALUES("550","12","43","4");
INSERT INTO usuarios_permisos VALUES("551","12","16","4");
INSERT INTO usuarios_permisos VALUES("552","12","5","4");
INSERT INTO usuarios_permisos VALUES("553","12","6","4");
INSERT INTO usuarios_permisos VALUES("554","12","4","4");
INSERT INTO usuarios_permisos VALUES("555","12","3","4");
INSERT INTO usuarios_permisos VALUES("556","12","2","4");
INSERT INTO usuarios_permisos VALUES("557","13","45","4");
INSERT INTO usuarios_permisos VALUES("558","13","35","4");
INSERT INTO usuarios_permisos VALUES("559","13","36","4");
INSERT INTO usuarios_permisos VALUES("560","13","37","4");
INSERT INTO usuarios_permisos VALUES("561","13","38","4");
INSERT INTO usuarios_permisos VALUES("562","13","39","4");
INSERT INTO usuarios_permisos VALUES("563","13","40","4");
INSERT INTO usuarios_permisos VALUES("564","13","24","4");
INSERT INTO usuarios_permisos VALUES("565","13","31","4");
INSERT INTO usuarios_permisos VALUES("566","13","25","4");
INSERT INTO usuarios_permisos VALUES("567","13","22","4");
INSERT INTO usuarios_permisos VALUES("568","13","21","4");
INSERT INTO usuarios_permisos VALUES("569","13","29","4");
INSERT INTO usuarios_permisos VALUES("570","13","26","4");
INSERT INTO usuarios_permisos VALUES("571","13","30","4");
INSERT INTO usuarios_permisos VALUES("572","13","28","4");
INSERT INTO usuarios_permisos VALUES("573","13","42","4");
INSERT INTO usuarios_permisos VALUES("574","13","41","4");
INSERT INTO usuarios_permisos VALUES("575","13","70","4");
INSERT INTO usuarios_permisos VALUES("576","13","66","4");
INSERT INTO usuarios_permisos VALUES("577","13","64","4");
INSERT INTO usuarios_permisos VALUES("578","13","65","4");
INSERT INTO usuarios_permisos VALUES("579","13","67","4");
INSERT INTO usuarios_permisos VALUES("580","13","68","4");
INSERT INTO usuarios_permisos VALUES("581","13","69","4");
INSERT INTO usuarios_permisos VALUES("582","13","55","4");
INSERT INTO usuarios_permisos VALUES("583","13","56","4");
INSERT INTO usuarios_permisos VALUES("584","13","59","4");
INSERT INTO usuarios_permisos VALUES("585","13","60","4");
INSERT INTO usuarios_permisos VALUES("586","13","61","4");
INSERT INTO usuarios_permisos VALUES("587","13","62","4");
INSERT INTO usuarios_permisos VALUES("588","13","57","4");
INSERT INTO usuarios_permisos VALUES("589","13","58","4");
INSERT INTO usuarios_permisos VALUES("590","13","63","4");
INSERT INTO usuarios_permisos VALUES("591","13","46","4");
INSERT INTO usuarios_permisos VALUES("592","13","47","4");
INSERT INTO usuarios_permisos VALUES("593","13","50","4");
INSERT INTO usuarios_permisos VALUES("594","13","51","4");
INSERT INTO usuarios_permisos VALUES("595","13","52","4");
INSERT INTO usuarios_permisos VALUES("596","13","53","4");
INSERT INTO usuarios_permisos VALUES("597","13","48","4");
INSERT INTO usuarios_permisos VALUES("598","13","49","4");
INSERT INTO usuarios_permisos VALUES("599","13","54","4");
INSERT INTO usuarios_permisos VALUES("600","13","71","4");
INSERT INTO usuarios_permisos VALUES("601","13","72","4");
INSERT INTO usuarios_permisos VALUES("602","13","32","4");
INSERT INTO usuarios_permisos VALUES("603","13","33","4");
INSERT INTO usuarios_permisos VALUES("604","13","34","4");
INSERT INTO usuarios_permisos VALUES("605","13","1","4");
INSERT INTO usuarios_permisos VALUES("606","13","9","4");
INSERT INTO usuarios_permisos VALUES("607","13","10","4");
INSERT INTO usuarios_permisos VALUES("608","13","7","4");
INSERT INTO usuarios_permisos VALUES("609","13","8","4");
INSERT INTO usuarios_permisos VALUES("610","13","11","4");
INSERT INTO usuarios_permisos VALUES("611","13","20","4");
INSERT INTO usuarios_permisos VALUES("612","13","17","4");
INSERT INTO usuarios_permisos VALUES("613","13","19","4");
INSERT INTO usuarios_permisos VALUES("614","13","18","4");
INSERT INTO usuarios_permisos VALUES("615","13","12","4");
INSERT INTO usuarios_permisos VALUES("616","13","23","4");
INSERT INTO usuarios_permisos VALUES("617","13","27","4");
INSERT INTO usuarios_permisos VALUES("618","13","14","4");
INSERT INTO usuarios_permisos VALUES("619","13","15","4");
INSERT INTO usuarios_permisos VALUES("620","13","44","4");
INSERT INTO usuarios_permisos VALUES("621","13","43","4");
INSERT INTO usuarios_permisos VALUES("622","13","16","4");
INSERT INTO usuarios_permisos VALUES("623","13","5","4");
INSERT INTO usuarios_permisos VALUES("624","13","6","4");
INSERT INTO usuarios_permisos VALUES("625","13","4","4");
INSERT INTO usuarios_permisos VALUES("626","13","3","4");
INSERT INTO usuarios_permisos VALUES("627","13","2","4");
INSERT INTO usuarios_permisos VALUES("628","10","45","4");
INSERT INTO usuarios_permisos VALUES("629","10","35","4");
INSERT INTO usuarios_permisos VALUES("630","10","36","4");
INSERT INTO usuarios_permisos VALUES("631","10","37","4");
INSERT INTO usuarios_permisos VALUES("632","10","38","4");
INSERT INTO usuarios_permisos VALUES("633","10","39","4");
INSERT INTO usuarios_permisos VALUES("634","10","40","4");
INSERT INTO usuarios_permisos VALUES("635","10","24","4");
INSERT INTO usuarios_permisos VALUES("636","10","31","4");
INSERT INTO usuarios_permisos VALUES("637","10","25","4");
INSERT INTO usuarios_permisos VALUES("638","10","22","4");
INSERT INTO usuarios_permisos VALUES("639","10","21","4");
INSERT INTO usuarios_permisos VALUES("640","10","29","4");
INSERT INTO usuarios_permisos VALUES("641","10","26","4");
INSERT INTO usuarios_permisos VALUES("642","10","30","4");
INSERT INTO usuarios_permisos VALUES("643","10","28","4");
INSERT INTO usuarios_permisos VALUES("644","10","42","4");
INSERT INTO usuarios_permisos VALUES("645","10","41","4");
INSERT INTO usuarios_permisos VALUES("646","10","70","4");
INSERT INTO usuarios_permisos VALUES("647","10","66","4");
INSERT INTO usuarios_permisos VALUES("648","10","64","4");
INSERT INTO usuarios_permisos VALUES("649","10","65","4");
INSERT INTO usuarios_permisos VALUES("650","10","67","4");
INSERT INTO usuarios_permisos VALUES("651","10","68","4");
INSERT INTO usuarios_permisos VALUES("652","10","69","4");
INSERT INTO usuarios_permisos VALUES("653","10","55","4");
INSERT INTO usuarios_permisos VALUES("654","10","56","4");
INSERT INTO usuarios_permisos VALUES("655","10","59","4");
INSERT INTO usuarios_permisos VALUES("656","10","60","4");
INSERT INTO usuarios_permisos VALUES("657","10","61","4");
INSERT INTO usuarios_permisos VALUES("658","10","62","4");
INSERT INTO usuarios_permisos VALUES("659","10","57","4");
INSERT INTO usuarios_permisos VALUES("660","10","58","4");
INSERT INTO usuarios_permisos VALUES("661","10","63","4");
INSERT INTO usuarios_permisos VALUES("662","10","46","4");
INSERT INTO usuarios_permisos VALUES("663","10","47","4");
INSERT INTO usuarios_permisos VALUES("664","10","50","4");
INSERT INTO usuarios_permisos VALUES("665","10","51","4");
INSERT INTO usuarios_permisos VALUES("666","10","52","4");
INSERT INTO usuarios_permisos VALUES("667","10","53","4");
INSERT INTO usuarios_permisos VALUES("668","10","48","4");
INSERT INTO usuarios_permisos VALUES("669","10","49","4");
INSERT INTO usuarios_permisos VALUES("670","10","54","4");
INSERT INTO usuarios_permisos VALUES("671","10","71","4");
INSERT INTO usuarios_permisos VALUES("672","10","72","4");
INSERT INTO usuarios_permisos VALUES("673","10","32","4");
INSERT INTO usuarios_permisos VALUES("674","10","33","4");
INSERT INTO usuarios_permisos VALUES("675","10","34","4");
INSERT INTO usuarios_permisos VALUES("676","10","1","4");
INSERT INTO usuarios_permisos VALUES("677","10","9","4");
INSERT INTO usuarios_permisos VALUES("678","10","10","4");
INSERT INTO usuarios_permisos VALUES("679","10","7","4");
INSERT INTO usuarios_permisos VALUES("680","10","8","4");
INSERT INTO usuarios_permisos VALUES("681","10","11","4");
INSERT INTO usuarios_permisos VALUES("682","10","20","4");
INSERT INTO usuarios_permisos VALUES("683","10","17","4");
INSERT INTO usuarios_permisos VALUES("684","10","19","4");
INSERT INTO usuarios_permisos VALUES("685","10","18","4");
INSERT INTO usuarios_permisos VALUES("686","10","12","4");
INSERT INTO usuarios_permisos VALUES("687","10","23","4");
INSERT INTO usuarios_permisos VALUES("688","10","27","4");
INSERT INTO usuarios_permisos VALUES("689","10","14","4");
INSERT INTO usuarios_permisos VALUES("690","10","15","4");
INSERT INTO usuarios_permisos VALUES("691","10","44","4");
INSERT INTO usuarios_permisos VALUES("692","10","43","4");
INSERT INTO usuarios_permisos VALUES("693","10","16","4");
INSERT INTO usuarios_permisos VALUES("694","10","5","4");
INSERT INTO usuarios_permisos VALUES("695","10","6","4");
INSERT INTO usuarios_permisos VALUES("696","10","4","4");
INSERT INTO usuarios_permisos VALUES("697","10","3","4");
INSERT INTO usuarios_permisos VALUES("698","10","2","4");
INSERT INTO usuarios_permisos VALUES("699","9","45","4");
INSERT INTO usuarios_permisos VALUES("700","9","35","4");
INSERT INTO usuarios_permisos VALUES("701","9","36","4");
INSERT INTO usuarios_permisos VALUES("702","9","37","4");
INSERT INTO usuarios_permisos VALUES("703","9","38","4");
INSERT INTO usuarios_permisos VALUES("704","9","39","4");
INSERT INTO usuarios_permisos VALUES("705","9","40","4");
INSERT INTO usuarios_permisos VALUES("706","9","24","4");
INSERT INTO usuarios_permisos VALUES("707","9","31","4");
INSERT INTO usuarios_permisos VALUES("708","9","25","4");
INSERT INTO usuarios_permisos VALUES("709","9","22","4");
INSERT INTO usuarios_permisos VALUES("710","9","21","4");
INSERT INTO usuarios_permisos VALUES("711","9","29","4");
INSERT INTO usuarios_permisos VALUES("712","9","26","4");
INSERT INTO usuarios_permisos VALUES("713","9","30","4");
INSERT INTO usuarios_permisos VALUES("714","9","28","4");
INSERT INTO usuarios_permisos VALUES("715","9","42","4");
INSERT INTO usuarios_permisos VALUES("716","9","41","4");
INSERT INTO usuarios_permisos VALUES("717","9","70","4");
INSERT INTO usuarios_permisos VALUES("718","9","66","4");
INSERT INTO usuarios_permisos VALUES("719","9","64","4");
INSERT INTO usuarios_permisos VALUES("720","9","65","4");
INSERT INTO usuarios_permisos VALUES("721","9","67","4");
INSERT INTO usuarios_permisos VALUES("722","9","68","4");
INSERT INTO usuarios_permisos VALUES("723","9","69","4");
INSERT INTO usuarios_permisos VALUES("724","9","55","4");
INSERT INTO usuarios_permisos VALUES("725","9","56","4");
INSERT INTO usuarios_permisos VALUES("726","9","59","4");
INSERT INTO usuarios_permisos VALUES("727","9","60","4");
INSERT INTO usuarios_permisos VALUES("728","9","61","4");
INSERT INTO usuarios_permisos VALUES("729","9","62","4");
INSERT INTO usuarios_permisos VALUES("730","9","57","4");
INSERT INTO usuarios_permisos VALUES("731","9","58","4");
INSERT INTO usuarios_permisos VALUES("732","9","63","4");
INSERT INTO usuarios_permisos VALUES("733","9","46","4");
INSERT INTO usuarios_permisos VALUES("734","9","47","4");
INSERT INTO usuarios_permisos VALUES("735","9","50","4");
INSERT INTO usuarios_permisos VALUES("736","9","51","4");
INSERT INTO usuarios_permisos VALUES("737","9","52","4");
INSERT INTO usuarios_permisos VALUES("738","9","53","4");
INSERT INTO usuarios_permisos VALUES("739","9","48","4");
INSERT INTO usuarios_permisos VALUES("740","9","49","4");
INSERT INTO usuarios_permisos VALUES("741","9","54","4");
INSERT INTO usuarios_permisos VALUES("742","9","71","4");
INSERT INTO usuarios_permisos VALUES("743","9","72","4");
INSERT INTO usuarios_permisos VALUES("744","9","32","4");
INSERT INTO usuarios_permisos VALUES("745","9","33","4");
INSERT INTO usuarios_permisos VALUES("746","9","34","4");
INSERT INTO usuarios_permisos VALUES("747","9","1","4");
INSERT INTO usuarios_permisos VALUES("748","9","9","4");
INSERT INTO usuarios_permisos VALUES("749","9","10","4");
INSERT INTO usuarios_permisos VALUES("750","9","7","4");
INSERT INTO usuarios_permisos VALUES("751","9","8","4");
INSERT INTO usuarios_permisos VALUES("752","9","11","4");
INSERT INTO usuarios_permisos VALUES("753","9","20","4");
INSERT INTO usuarios_permisos VALUES("754","9","17","4");
INSERT INTO usuarios_permisos VALUES("755","9","19","4");
INSERT INTO usuarios_permisos VALUES("756","9","18","4");
INSERT INTO usuarios_permisos VALUES("757","9","12","4");
INSERT INTO usuarios_permisos VALUES("758","9","23","4");
INSERT INTO usuarios_permisos VALUES("759","9","27","4");
INSERT INTO usuarios_permisos VALUES("760","9","14","4");
INSERT INTO usuarios_permisos VALUES("761","9","15","4");
INSERT INTO usuarios_permisos VALUES("762","9","44","4");
INSERT INTO usuarios_permisos VALUES("763","9","43","4");
INSERT INTO usuarios_permisos VALUES("764","9","16","4");
INSERT INTO usuarios_permisos VALUES("765","9","5","4");
INSERT INTO usuarios_permisos VALUES("766","9","6","4");
INSERT INTO usuarios_permisos VALUES("767","9","4","4");
INSERT INTO usuarios_permisos VALUES("768","9","3","4");
INSERT INTO usuarios_permisos VALUES("769","9","2","4");
INSERT INTO usuarios_permisos VALUES("770","11","45","4");
INSERT INTO usuarios_permisos VALUES("771","11","35","4");
INSERT INTO usuarios_permisos VALUES("772","11","36","4");
INSERT INTO usuarios_permisos VALUES("773","11","37","4");
INSERT INTO usuarios_permisos VALUES("774","11","38","4");
INSERT INTO usuarios_permisos VALUES("775","11","39","4");
INSERT INTO usuarios_permisos VALUES("776","11","40","4");
INSERT INTO usuarios_permisos VALUES("777","11","24","4");
INSERT INTO usuarios_permisos VALUES("778","11","31","4");
INSERT INTO usuarios_permisos VALUES("779","11","25","4");
INSERT INTO usuarios_permisos VALUES("780","11","22","4");
INSERT INTO usuarios_permisos VALUES("781","11","21","4");
INSERT INTO usuarios_permisos VALUES("782","11","29","4");
INSERT INTO usuarios_permisos VALUES("783","11","26","4");
INSERT INTO usuarios_permisos VALUES("784","11","30","4");
INSERT INTO usuarios_permisos VALUES("785","11","28","4");
INSERT INTO usuarios_permisos VALUES("786","11","42","4");
INSERT INTO usuarios_permisos VALUES("787","11","41","4");
INSERT INTO usuarios_permisos VALUES("788","11","70","4");
INSERT INTO usuarios_permisos VALUES("789","11","66","4");
INSERT INTO usuarios_permisos VALUES("790","11","64","4");
INSERT INTO usuarios_permisos VALUES("791","11","65","4");
INSERT INTO usuarios_permisos VALUES("792","11","67","4");
INSERT INTO usuarios_permisos VALUES("793","11","68","4");
INSERT INTO usuarios_permisos VALUES("794","11","69","4");
INSERT INTO usuarios_permisos VALUES("795","11","55","4");
INSERT INTO usuarios_permisos VALUES("796","11","56","4");
INSERT INTO usuarios_permisos VALUES("797","11","59","4");
INSERT INTO usuarios_permisos VALUES("798","11","60","4");
INSERT INTO usuarios_permisos VALUES("799","11","61","4");
INSERT INTO usuarios_permisos VALUES("800","11","62","4");
INSERT INTO usuarios_permisos VALUES("801","11","57","4");
INSERT INTO usuarios_permisos VALUES("802","11","58","4");
INSERT INTO usuarios_permisos VALUES("803","11","63","4");
INSERT INTO usuarios_permisos VALUES("804","11","46","4");
INSERT INTO usuarios_permisos VALUES("805","11","47","4");
INSERT INTO usuarios_permisos VALUES("806","11","50","4");
INSERT INTO usuarios_permisos VALUES("807","11","51","4");
INSERT INTO usuarios_permisos VALUES("808","11","52","4");
INSERT INTO usuarios_permisos VALUES("809","11","53","4");
INSERT INTO usuarios_permisos VALUES("810","11","48","4");
INSERT INTO usuarios_permisos VALUES("811","11","49","4");
INSERT INTO usuarios_permisos VALUES("812","11","54","4");
INSERT INTO usuarios_permisos VALUES("813","11","71","4");
INSERT INTO usuarios_permisos VALUES("814","11","72","4");
INSERT INTO usuarios_permisos VALUES("815","11","32","4");
INSERT INTO usuarios_permisos VALUES("816","11","33","4");
INSERT INTO usuarios_permisos VALUES("817","11","34","4");
INSERT INTO usuarios_permisos VALUES("818","11","1","4");
INSERT INTO usuarios_permisos VALUES("819","11","9","4");
INSERT INTO usuarios_permisos VALUES("820","11","10","4");
INSERT INTO usuarios_permisos VALUES("821","11","7","4");
INSERT INTO usuarios_permisos VALUES("822","11","8","4");
INSERT INTO usuarios_permisos VALUES("823","11","11","4");
INSERT INTO usuarios_permisos VALUES("824","11","20","4");
INSERT INTO usuarios_permisos VALUES("825","11","17","4");
INSERT INTO usuarios_permisos VALUES("826","11","19","4");
INSERT INTO usuarios_permisos VALUES("827","11","18","4");
INSERT INTO usuarios_permisos VALUES("828","11","12","4");
INSERT INTO usuarios_permisos VALUES("829","11","23","4");
INSERT INTO usuarios_permisos VALUES("830","11","27","4");
INSERT INTO usuarios_permisos VALUES("831","11","14","4");
INSERT INTO usuarios_permisos VALUES("832","11","15","4");
INSERT INTO usuarios_permisos VALUES("833","11","44","4");
INSERT INTO usuarios_permisos VALUES("834","11","43","4");
INSERT INTO usuarios_permisos VALUES("835","11","16","4");
INSERT INTO usuarios_permisos VALUES("836","11","5","4");
INSERT INTO usuarios_permisos VALUES("837","11","6","4");
INSERT INTO usuarios_permisos VALUES("838","11","4","4");
INSERT INTO usuarios_permisos VALUES("839","11","3","4");
INSERT INTO usuarios_permisos VALUES("840","11","2","4");
INSERT INTO usuarios_permisos VALUES("841","7","71","4");
INSERT INTO usuarios_permisos VALUES("842","7","72","4");
INSERT INTO usuarios_permisos VALUES("843","6","73","4");
INSERT INTO usuarios_permisos VALUES("844","2","73","4");
INSERT INTO usuarios_permisos VALUES("845","12","73","4");
INSERT INTO usuarios_permisos VALUES("846","13","73","4");
INSERT INTO usuarios_permisos VALUES("847","10","73","4");
INSERT INTO usuarios_permisos VALUES("848","9","73","4");
INSERT INTO usuarios_permisos VALUES("849","11","73","4");
INSERT INTO usuarios_permisos VALUES("850","3","73","4");
INSERT INTO usuarios_permisos VALUES("851","7","73","4");
INSERT INTO usuarios_permisos VALUES("852","4","73","4");



DROP TABLE usuarios_tipos;

CREATE TABLE `usuarios_tipos` (
  `idTipoUsr` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(120) NOT NULL,
  PRIMARY KEY (`idTipoUsr`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Fija';

INSERT INTO usuarios_tipos VALUES("1","Administrador");
INSERT INTO usuarios_tipos VALUES("2","Normal");



