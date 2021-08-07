<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*             Funciones          */
/**********************************/
//Listado de errores
function errores($error) {
  switch ($error) {
    case 1: return "Nombre de usuario no ingresado"; break;
    case 2: return "Password de usuario no ingresado"; break;
	case 3: return "Email de usuario no ingresado"; break;
	case 4: return "Es obligatorio poner el nombre del permiso"; break;
	case 5: return "Es obligatorio seleccionar un tipo de permiso"; break;
	case 6: return "Es obligatorio poner la ubicación del archivo"; break;
	case 7: return "Usuario en uso"; break;
	case 8: return "Es obligatorio completar el nombre real del usuario"; break;
	case 9: return "Es obligatorio completar el tipo de usuario"; break;
	case 10: return "Email en uso"; break;
	case 11: return "La contrase&ntilde;a no coincide"; break;
	case 12: return "Nombre de empresa en uso"; break;
	case 13: return "Nombre de la empresa no ingresado"; break;
	case 14: return "Abreviatura de la empresa no ingresada"; break;
	case 15: return "Email de la empresa no ingresado"; break;
	case 16: return "Rut de la empresa no ingresado"; break;
	case 17: return "No ha ingresado la cantidad de niveles"; break;
	case 18: return "No ha ingresado el nombre del nivel"; break;
	case 19: return "No ha seleccionado una empresa"; break;
	case 20: return "No ha ingresado el RUT de la persona"; break;
	case 21: return "No ha ingresado el nombre de la comuna"; break;
	case 22: return "No ha ingresado la direccion"; break;
	case 23: return "No ha seleccionado el nivel"; break;
	case 24: return "No ha ingresado una categoria"; break;
	case 25: return "No ha ingresado una subcategoria"; break;
	case 26: return "No ha seleccionado una categoria"; break;
	case 27: return "No ha ingresado un nombre para el item"; break;
	case 28: return "No ha ingresado una unidad de medida"; break;
	case 29: return "No ha ingresado un valor para la unidad de medida"; break;
	case 30: return "No ha ingresado un valor unitario"; break;
	case 31: return "No ha ingresado un nombre del trabajador"; break;
	case 32: return "No ha ingresado un telefono del trabajador"; break;
	case 33: return "No ha ingresado una direccion del trabajador"; break;
	case 34: return "No ha ingresado un cargo del trabajador"; break;
	case 35: return "No ha seleccionado un trabajo a realizar"; break;
	case 36: return "No ha ingresado una fecha de ejecucion"; break;
	case 37: return "No ha ingresado un numero de documento"; break;
	case 38: return "No ha seleccionado un trabajador"; break;
	case 39: return "Es obligatorio completar el nombre del tipo de producto"; break;
	case 40: return "Es obligatorio completar el tipo de embalaje usado"; break;
	case 41: return "Es obligatorio completar el nombre del tipo de producto"; break;
	case 42: return "Es obligatorio completar el nombre de la Unidad de Medida"; break;
	case 43: return "Es obligatorio completar el nombre del Artículo"; break;
	case 44: return "Es obligatorio seleccionar el tipo de Artículo"; break;
	case 45: return "Es obligatorio seleccionar la categoría del Artículo"; break;
	case 46: return "Es obligatorio seleccionar la unidad de medida del Artículo"; break;
	case 47: return "Es obligatorio completar la capacidad del Artículo"; break;
	case 48: return "Es obligatorio seleccionar el embalaje del Artículo"; break;
	case 49: return "Es obligatorio completar la marca del Artículo"; break;
	case 50: return "Es obligatorio seleccionar el Articulo"; break;
	case 51: return "Es obligatorio poner la cantidad de Articulos"; break;
	case 52: return "Es obligatorio ingresar el valor de cada articulo"; break;
	case 53: return "Es obligatorio poner la procedencia de los Articulos"; break;
	case 54: return "Es obligatorio poner el tipo de documento utilizado"; break;
	case 55: return "Es obligatorio poner el numero del documento utilizado"; break;
	case 56: return "Es obligatorio poner un comentario"; break;
	case 57: return "Es obligatorio seleccionar el tipo de cliente"; break;
	case 58: return "Es obligatorio seleccionar el cliente"; break;
	case 59: return "Ingrese una fecha de inicio"; break;
	case 60: return "Ingrese una fecha de termino"; break;
	case 61: return "No ha seleccionado un permiso"; break;
	case 62: return "No ha seleccionado un Trabajo"; break;
	case 63: return "No ha ingresado un nombre"; break;
	case 64: return "No ha seleccionado una frecuencia"; break;
	case 65: return "No ha seleccionado una ubicacion"; break;
	case 66: return "No ha seleccionado una tarea"; break;
	case 67: return "No ha ingresado el tiempo utilizado"; break;
	case 68: return "Es obligatorio completar la contraseña"; break;
	case 69: return "Es obligatorio completar la contraseña nueva"; break;
	case 70: return "La contraseña no coincide"; break;
	case 71: return "No ha ingresado la fecha de inicio"; break;
	case 72: return "No ha ingresado la fecha de termino"; break;
	case 73: return "No ha ingresado un valor al costo no considerado"; break;
	case 74: return "No ha ingresado un comentario al costo no considerado"; break;
	case 75: return "No ha seleccionado una unidad de frecuencia"; break;
	case 76: return "No ha ingresado un valor para la frecuencia"; break;
	case 77: return "No ha ingresado un nombre a la categoria"; break;
	case 78: return "No ha seleccionado una unidad de frecuencia"; break;
	case 79: return "Debe ingresar un monto a la valorizacion"; break;
	case 80: return "Debe ingresar un monto a los gastos generales"; break;
	case 81: return "No ha seleccionado la cantidad de periodos"; break;
	
  }
}
?>