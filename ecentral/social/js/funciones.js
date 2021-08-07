// JavaScript Document
$(document).ready(function(){
	verformularionuevaimagen();
	verlistadoimagenes();
})

function verformularionuevaimagen(){
	var randomnumber=Math.random()*11;
	$.post("upload_img.php",{randomnumber:randomnumber}, 
		function(data){
			$("#upload_img").html(data).slideDown("slow");
		});
}
function verlistadoimagenes(){
	var randomnumber=Math.random()*11;
	$.post("uploadify_libs/listadoImagenes.php",{randomnumber:randomnumber},
		function(data){
			$("#listadoimagenes").html(data).slideDown("slow");
		});
}