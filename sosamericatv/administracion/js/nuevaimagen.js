$(document).ready(function() {
    $("#file_upload").fileUpload({
        'uploader': 'uploadify/uploader.swf',
        'cancelImg': 'uploadify/cancel.png',
        'script': 'uploadify_libs/subirarchivo.php?id_Oirs=<?php echo $_GET['id_Oirs'] ?>',

        'folder': 'uploads',
        'buttonText': 'examinar',
        'checkScript': 'uploadify/check.php',
        'fileDesc': 'Archivos',
        'auto':false,
        //Estensiones permitidas para carga de los archivos
        'fileExt': '*.jpg;*.jpeg;*.gif;*.png;*.xlsx;*.docx;*.html;*.txt;*.pdf;*.zip',
		
		//Puede ingresar mas de 1 archivo a la vez, false solo 1 archivo
        'multi': false,
        'displayData': 'percentage',
        onComplete: function (){
     verlistadoimagenes();
            $("#txtdes").val('');
        }

       });
   $('#txtdes').bind('change', function(){
	$('#file_upload').fileUploadSettings('scriptData','&des='+$(this).val());


    });

})

function startUpload(id, conditional){
	if(conditional.value.length != 0) {
		$('#'+id).fileUploadStart();
	} else
		alert("Debe ingresar una descripcion");
}