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