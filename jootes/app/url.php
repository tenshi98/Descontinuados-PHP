<?php 
/**********************************************************************************************************************************/
/*                                       Se cargan las variables URL para reutilizarlas                                           */
/**********************************************************************************************************************************/
if(isset($_GET['id'])&&$_GET['id']!='')             {$id=$_GET['id'];}else{$id='';}
if(isset($_GET['IMEI'])&&$_GET['IMEI']!='')         {$IMEI=$_GET['IMEI'];}else{$IMEI='';}
if(isset($_GET['msg'])&&$_GET['msg']!='')           {$msg=$_GET['msg'];}else{$msg='';}
if(isset($_GET['latitud'])&&$_GET['latitud']!='')   {$latitud=$_GET['latitud'];}else{$latitud='';}
if(isset($_GET['longitud'])&&$_GET['longitud']!='') {$longitud=$_GET['longitud'];}else{$longitud='';}
if(isset($_GET['mensajes'])&&$_GET['mensajes']!='') {$mensajes=$_GET['mensajes'];}else{$mensajes='';}
$w  = '?id='.$id;
$w .= '&IMEI='.$IMEI;
$w .= '&msg='.$msg;
$w .= '&latitud='.$latitud;
$w .= '&longitud='.$longitud;
$w .= '&mensajes='.$mensajes;
?> 