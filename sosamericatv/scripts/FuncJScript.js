function ltrim(str, filter) {
  var i = str.length;
  filter || ( filter = '' );
  for (var k = 0; k < i && filtering(str.charAt(k), filter); k++);
  return str.substring(k, i);
}
function rtrim(str, filter) {
  filter || ( filter = '' );
  for (var j = str.length - 1; j >= 0 && filtering(str.charAt(j), filter); j--);          
  return str.substring(0, j + 1);
}
function trim(str, filter) {
  filter || ( filter = '' );
  return ltrim(rtrim(str, filter), filter);
}
function filtering(charToCheck, filter) {
  filter || ( filter = " \t\n\r\f" );
  return (filter.indexOf(charToCheck) != -1);
}

function isAlphaStd(e) {
    k = (document.all) ? e.keyCode : e.which;
    if ((k==null) || (k==0) || (k==8) || (k==9) || (k==13) || (k==27)) return true;
    patron = /[a-zA-Z 0-9_-]/;
    n = String.fromCharCode(k);
    return patron.test(n);
}

function isAlpha(e) {
    k = (document.all) ? e.keyCode : e.which;
    if ((k==null) || (k==0) || (k==8) || (k==9) || (k==13) || (k==27)) return true;
    patron = /[a-zA-Z áéíóúÁÉÍÓÚüÜñÑ0-9_-]/;
    n = String.fromCharCode(k);
    return patron.test(n);
}

function isNumber(e) {
    k = (document.all) ? e.keyCode : e.which;
    if ((k==null) || (k==0) || (k==8) || (k==9) || (k==13) || (k==27)) return true;
    patron = /\d/;
    n = String.fromCharCode(k);
    return patron.test(n);
}

function isDV(e) {
    k = (document.all) ? e.keyCode : e.which;
    if ((k==null) || (k==0) || (k==8) || (k==9) || (k==13) || (k==27)) return true;
    patron = /[0-9Kk]/;
    n = String.fromCharCode(k);
    return patron.test(n);
}

function isEmail(e) {
    k = (document.all) ? e.keyCode : e.which;
    if ((k==null) || (k==0) || (k==8) || (k==9) || (k==13) || (k==27)) return true;
    patron = /[a-zA-Z0-9@._-]/;
    n = String.fromCharCode(k);
    return patron.test(n);
}

function validarEmail(valor) {
	if (/^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/.test(valor)){
	/*  alert("La dirección de email " + valor + " es correcta.") */
	return (true);
	} else {
	alert("La direcci\u00f3n de email es incorrecta.\n"+valor);
	return (false);
	}
}

function checkEmail(email) {
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if (!filter.test(email.value)) {
	alert("CHECKEO DE EMAIL\n\nLa direcci\u00f3n de email es incorrecta.\n"+email);
  return (false);
 }
}

// Email Validation Javascript
// copyright 23rd March 2003, by Stephen Chapman, Felgall Pty Ltd

// You have permission to copy and use this javascript provided that
// the content of the script is not changed in any way.

function validateEmail(addr,man,db) {
if (addr == '' && man) {
   if (db) alert('La direcci\u00F3n email es obligatoria');
   return false;
}
if (addr == '') return true;
var invalidChars = '\/\'\\ ";:?!()[]\{\}^|';
for (i=0; i<invalidChars.length; i++) {
   if (addr.indexOf(invalidChars.charAt(i),0) > -1) {
      if (db) alert('La direcci\u00F3n email contiene caracteres inv\u00E1lidos');
      return false;
   }
}
for (i=0; i<addr.length; i++) {
   if (addr.charCodeAt(i)>127) {
      if (db) alert("La direcci\u00F3n email no contiene caracteres ascii.");
      return false;
   }
}

var atPos = addr.indexOf('@',0);
if (atPos == -1) {
   if (db) alert('La direcci\u00F3n email debe contener un @');
   return false;
}
if (atPos == 0) {
   if (db) alert('La direcci\u00F3n email no debe iniciarse con un @');
   return false;
}
if (addr.indexOf('@', atPos + 1) > - 1) {
   if (db) alert('La direcci\u00F3n email debe contener s\u00F3lo un @');
   return false;
}
if (addr.indexOf('.', atPos) == -1) {
   if (db) alert('La direcci\u00F3n email debe contener un . en el nombre de dominio');
   return false;
}
if (addr.indexOf('@.',0) != -1) {
   if (db) alert('El punto no debe estar enseguida del @, en una direcci\u00F3n email');
   return false;
}
if (addr.indexOf('.@',0) != -1){
   if (db) alert('El punto no debe estar justo antes del @, en una direcci\u00F3n email');
   return false;
}
if (addr.indexOf('..',0) != -1) {
   if (db) alert('Dos puntos no pueden estar juntos en una direcci\u00F3n email');
   return false;
}
var suffix = addr.substring(addr.lastIndexOf('.')+1);
if (suffix.length != 2 && suffix != 'com' && suffix != 'net' && suffix != 'org' && suffix != 'edu' && suffix != 'int' && suffix != 'mil' && suffix != 'gov' & suffix != 'arpa' && suffix != 'biz' && suffix != 'aero' && suffix != 'name' && suffix != 'coop' && suffix != 'info' && suffix != 'pro' && suffix != 'museum') {
   if (db) alert('Dominio primario inv\u00E1lido en la direcci\u00F3n email');
   return false;
}
return true;
}

function Digito(Numero2){
		var Numero = new String(Numero2);
		var Escala = new String("32765432");
		var l = Numero.length;
		var E = Escala.length;
		l = E-l;
		for (i=0;i<l;i++){
			Numero = "0" + Numero; 
		}	
		var Suma = 0;
		for(x=0;x<E;x++){
			Suma += Math.abs(Numero.substr(x,1)) * Math.abs(Escala.substr(x,1));
		}	
		
		
		var Resto = Suma % 11;
		var Dig = 11 - Resto;
		
		switch(Dig){
			case 10:
				return "K";
			case 11:
				return "0"
			default:
				return Dig.toString();
		}
}

function calcular_edad(fecha){ 
// el formato de fecha que debe venir es "dd/mm/aaaa" 
    //calculo la fecha de hoy 
    hoy=new Date() 
    //alert(hoy) 

    //calculo la fecha que recibo 
    //La descompongo en un array 
    var array_fecha = fecha.split("/") 
    //si el array no tiene tres partes, la fecha es incorrecta 
    if (array_fecha.length!=3) 
       return false 

    //compruebo que los ano, mes, dia son correctos 
    var ano 
    ano = parseInt(array_fecha[2]); 
    if (isNaN(ano)) 
       return false 

    var mes 
    mes = parseInt(array_fecha[1]); 
    if (isNaN(mes)) 
       return false 

    var dia 
    dia = parseInt(array_fecha[0]); 
    if (isNaN(dia)) 
       return false 


    //si el año de la fecha que recibo solo tiene 2 cifras hay que cambiarlo a 4 
    if (ano<=99) 
       ano +=1900 

    //resto los años de las dos fechas 
    edad=hoy.getFullYear()- ano - 1; //-1 porque no se si ha cumplido años ya este año 

    //si resto los meses y me da menor que 0 entonces no ha cumplido años. Si da mayor si ha cumplido 
    if (hoy.getMonth() + 1 - mes < 0) //+ 1 porque los meses empiezan en 0 
       return edad 
    if (hoy.getMonth() + 1 - mes > 0) 
       return edad+1 

    //entonces es que eran iguales. miro los dias 
    //si resto los dias y me da menor que 0 entonces no ha cumplido años. Si da mayor o igual si ha cumplido 
    if (hoy.getUTCDate() - dia >= 0) 
       return edad + 1 

    return edad 
} 