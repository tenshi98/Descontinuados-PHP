//Confirmacion de eliminacion
function msg(direccion){
	if (confirm("¿Realmente deseas eliminar el registro?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
//Confirmacion de cerrado documento
function fact_close(direccion){
	if (confirm("¿Realmente deseas cerrar este documento?, una vez hecho ya no podras realizar modificaciones en este")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
//Confirmacion de eliminacion
function add_job(data,direccion){
	var datas = document.getElementById('idItemList_'+data).value
	location=direccion+'&val_select='+datas;
} 
//Confirmacion de eliminacion
function del_job(direccion){
	
	if (confirm("¿Realmente deseas eliminar el registro?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }		

}
//Confirmacion de eliminacion
function clear_all(direccion){
	if (confirm("¿Realmente deseas borrar todos los datos del documento?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
//Confirmacion de eliminacion
function ot_create(direccion){
	if (confirm("Desea crear la Orden de trabajo, tenga en cuenta que no podra realizar mas modificaciones una vez creada")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
//Confirmacion de eliminacion
function ot_liberar(direccion){
	if (confirm("¿Confirma que pasara todas las OT a proceso?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
//Confirmacion de eliminacion
function add_sup(direccion){
	var datas = document.getElementById('idSupervisor').value
	location=direccion+'&val_select='+datas;
} 
//Confirmacion de eliminacion
function delsup(direccion){
	if (confirm("¿Confirma que desea borrar al supervisor?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
//Confirmacion de eliminacion
function addtemp(direccion, valorid){
	var t0 = document.getElementById('T0_'+valorid).value
	var t1 = document.getElementById('T1_'+valorid).value
	var t2 = document.getElementById('T2_'+valorid).value
	var t3 = document.getElementById('T3_'+valorid).value
	var t4 = document.getElementById('T4_'+valorid).value
	var Observacion = document.getElementById('Observacion_'+valorid).value
	location=direccion+'&T0='+t0+'&T1='+t1+'&T2='+t2+'&T3='+t3+'&T4='+t4+'&Observacion='+Observacion;
} 
//Confirmacion de eliminacion
function deltemp(direccion, valorid){
	if (confirm("¿Confirma que desea borrar las temperaturas ingresadas?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
//Confirmacion de eliminacion
function addaceite(direccion, valorid){
	var idEstadoAceite = document.getElementById('idEstadoAceite_'+valorid).value
	var idNivelAgua = document.getElementById('idNivelAgua_'+valorid).value
	var idNivelAceite = document.getElementById('idNivelAceite_'+valorid).value
	var idNivelSilice = document.getElementById('idNivelSilice_'+valorid).value
	var TempAceite = document.getElementById('TempAceite_'+valorid).value
	var idFlujoAgua = document.getElementById('idFlujoAgua_'+valorid).value
	var Observacion = document.getElementById('Observacion_'+valorid).value
	location=direccion+'&idEstadoAceite='+idEstadoAceite+'&idNivelAgua='+idNivelAgua+'&idNivelAceite='+idNivelAceite+'&idNivelSilice='+idNivelSilice+'&TempAceite='+TempAceite+'&idFlujoAgua='+idFlujoAgua+'&Observacion='+Observacion;
} 
//Confirmacion de eliminacion
function delaceite(direccion, valorid){
	if (confirm("¿Confirma que desea borrar los datos relacionados al aceite?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
//Confirmacion de eliminacion
function addrevgen(direccion, valorid){
	var Observacion = document.getElementById('Observacion_'+valorid).value
	location=direccion+'&Observacion='+Observacion;
} 
//Confirmacion de eliminacion
function delrevgen(direccion, valorid){
	if (confirm("¿Confirma que desea borrar los datos de la revision general?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
//Confirmacion de eliminacion
function addfalla(direccion, valorid){
	var Observacion = document.getElementById('Observacion_'+valorid).value
	location=direccion+'&Observacion='+Observacion;
} 
//Confirmacion de eliminacion
function delfalla(direccion, valorid){
	if (confirm("¿Confirma que desea borrar los datos de la falla?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
//Confirmacion de eliminacion
function add_obs(direccion){
	var datas = document.getElementById('Observaciones').value
	location=direccion+'&val_select='+datas;
} 
//Confirmacion de eliminacion
function del_obs(direccion){
	
	if (confirm("¿Realmente deseas eliminar la observacion?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }		

}
//Confirmacion de eliminacion
function addfter(direccion){
	var datas = document.getElementById('f_termino').value
	location=direccion+'&val_select='+datas;
} 
//Confirmacion de eliminacion
function delfter(direccion){
	
	if (confirm("¿Realmente deseas eliminar la fecha de termino?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }		

}

//Confirmacion de eliminacion
function addconsumo1(direccion, valorid){
	var Grasa_inicial = document.getElementById('Grasa_inicial_'+valorid).value
	var Grasa_relubricacion = document.getElementById('Grasa_relubricacion_'+valorid).value
	var idUml = document.getElementById('idUml_'+valorid).value
	var idProducto = document.getElementById('idProducto_'+valorid).value
	var Observacion = document.getElementById('Observacion_'+valorid).value

	location=direccion+'&Grasa_inicial='+Grasa_inicial+'&Grasa_relubricacion='+Grasa_relubricacion+'&idUml='+idUml+'&idProducto='+idProducto+'&Observacion='+Observacion;
} 
//Confirmacion de eliminacion
function addconsumo2(direccion, valorid){
	var Aceite = document.getElementById('Aceite_'+valorid).value
	var idUml = document.getElementById('idUml_'+valorid).value
	var idProducto = document.getElementById('idProducto_'+valorid).value
	var Observacion = document.getElementById('Observacion_'+valorid).value

	location=direccion+'&Aceite='+Aceite+'&idUml='+idUml+'&idProducto='+idProducto+'&Observacion='+Observacion;
} 
//Confirmacion de eliminacion
function addconsumo3(direccion, valorid){
	var Cantidad = document.getElementById('Cantidad_'+valorid).value
	var idUml = document.getElementById('idUml_'+valorid).value
	var idProducto = document.getElementById('idProducto_'+valorid).value
	var Observacion = document.getElementById('Observacion_'+valorid).value

	location=direccion+'&Cantidad='+Cantidad+'&idUml='+idUml+'&idProducto='+idProducto+'&Observacion='+Observacion;
	
} 
//Confirmacion de eliminacion
function delconsumo(direccion){
	if (confirm("¿Confirma que desea borrar los datos relacionados al consumo?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
//Confirmacion de eliminacion
function cerrar_ot(direccion){
	if (confirm("¿Confirma que desea cerrar la Orden de Trabajo, una vez hecho no podra realizar mas cambios y los consumos de materiales seran contabilizados en el sistema?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
//Confirmacion de eliminacion
function ing_bodega(direccion){
	if (confirm("Realmente desea realizar el ingreso a bodega, una vez realizada no podra realizar cambios")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
//Confirmacion de eliminacion
function egr_bodega(direccion){
	if (confirm("Realmente desea realizar el egreso a bodega, una vez realizada no podra realizar cambios")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
//Confirmacion de eliminacion
function trasp_bodega(direccion){
	if (confirm("Realmente desea mover los materiales, una vez realizada no podra realizar cambios")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
//Confirmacion de eliminacion
function trans_bodega(direccion){
	if (confirm("Realmente desea transformar los materiales, una vez realizada no podra realizar cambios")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}











