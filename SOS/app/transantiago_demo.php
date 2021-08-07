<div id="consulta" ></div>
<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
window.onload=function(){
	 transMarker();
}

var bus_1 = 0;
var bus_2 = 54;
var bus_3 = 108;
var bus_4 = 152;
var bus_5 = 206;
var bus_6 = 260;
var bus_7 = 324;
var bus_8 = 398;
var bus_9 = 430;

function transMarker() {
	setInterval(function(){myTimer2()},5000);
}
function myTimer2() {
	
	$('#consulta').load('transantiago_demo_save.php?bus_1='+bus_1+'&bus_2='+bus_2+'&bus_3='+bus_3+'&bus_4='+bus_4+'&bus_5='+bus_5+'&bus_6='+bus_6+'&bus_7='+bus_7+'&bus_8='+bus_8+'&bus_9='+bus_9);
	
	bus_1++;
	bus_2++;
	bus_3++;
	bus_4++;
	bus_5++;
	bus_6++;
	bus_7++;
	bus_8++;
	bus_9++;
	
	if(bus_1==442){bus_1=1;}
	if(bus_2==442){bus_2=1;}
	if(bus_3==442){bus_3=1;}
	if(bus_4==442){bus_4=1;}
	if(bus_5==442){bus_5=1;}
	if(bus_6==442){bus_6=1;}
	if(bus_7==442){bus_7=1;}
	if(bus_8==442){bus_8=1;}
	if(bus_9==442){bus_9=1;}
	
}
</script>