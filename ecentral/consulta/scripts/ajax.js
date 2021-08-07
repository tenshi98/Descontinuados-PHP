function Ajax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function OrdenarPor(campo, orden){
	//especificamos en div donde se mostrará el resultado
	divListado = document.getElementById('listado');
	
	ajax=Ajax();
	//especificamos el archivo que realizará el listado
	//y enviamos las dos variables: campo y orden
	ajax.open("GET", "lstatvirtual.php?campo="+campo+"&orden="+orden);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divListado.innerHTML = ajax.responseText
		}
	}
	ajax.send(null)
}