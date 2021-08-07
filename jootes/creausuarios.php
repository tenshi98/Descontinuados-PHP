<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if ($_GET["cierro"]=="si") {
session_destroy();
}
require_once('nombre_pag.php');
require_once('conexion.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="http://<?=$nombreurl?>/favicon.ico" type="image/x-icon">
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
    <script src="js/login.js"></script>
    
    <link rel="stylesheet" type="text/css" href="js/jquery.slider.css" />
  <!--[if IE 6]>
  <link rel="stylesheet" type="text/css" href="javascript/slider/themes/default/jquery.slider.ie6.css" />
  <![endif]-->

<script type="text/javascript" src="http://<?=$nombreurl?>/js/jquery.min.js"></script>
<script type="text/javascript" src="http://<?=$nombreurl?>/js/jquery.slider.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".slider").slideshow({
        width      : 920,
        height     : 260,
        pauseOnHover : true,
        transition : ['slideLeft', 'slideRight', 'slideTop', 'slideBottom']
      });
      
      $(".caption").fadeIn(500);

      // playing with events:
      
      $(".slider").bind("sliderChange", function(event, curSlide) {
        $(curSlide).children(".caption").hide();
      });
      
      $(".slider").bind("sliderTransitionFinishes", function(event, curSlide) {
        $(curSlide).children(".caption").fadeIn(500);
      });
    });
  </script>
    <script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
<SCRIPT type="text/javascript" src="scripts/FuncJScript.js"></SCRIPT>
<SCRIPT TYPE="text/javascript">
<!--
// Radio Button Validation
// copyright Stephen Chapman, 15th Nov 2004,14th Sep 2005
// you may copy this function but please keep the copyright notice with it
function valButton(btn) {
    var cnt = -1;
    for (var i=btn.length-1; i > -1; i--) {
        if (btn[i].checked) {cnt = i; i = -1;}
    }
    if (cnt > -1) return btn[cnt].value;
    else return null;
}
// Valida E-Mail1 con Email2
function igualMail(){
if (trim(document.mainFrame.correo.value) == "") {
   alert("Debe ingresar un Correo Electr\u00F3nico/n ya que ser\u00E1 su Login");
			document.mainFrame.correo.focus();
			return;
} else {
  if (trim(document.mainFrame.correo1.value) == "") {
   alert("Debe reingresar un Correo Electr\u00F3nico/n ya que ser\u00E1 su Login");
			document.mainFrame.correo1.focus();
			return;
  } 			
  if (trim(document.mainFrame.correo.value) != trim(document.mainFrame.correo1.value)) {
     	alert("Los correos electr\u00F3nicos ingresados no son iguales\n E-Mail 1= " + document.mainFrame.correo.value +"\n E-Mail 2= "+ document.mainFrame.correo1.value );
		document.mainFrame.correo1.value ="";
		document.mainFrame.correo.focus();
		return;
	}
  }
}
// fin Valida E-Mail1 con Email2
// Valida password con password1
function igualpass(){
if (trim(document.mainFrame.password.value) == "") {
   alert("Debe ingresar una Clave");
			document.mainFrame.password.focus();
			return;
} else {
  if (trim(document.mainFrame.password1.value) == "") {
   alert("Debe reingresar la clave");
			document.mainFrame.password1.focus();
			return;
  } 			
  if (trim(document.mainFrame.password.value) != trim(document.mainFrame.password1.value)) {
     	alert("Las claves ingresadas no son iguales"  );
		document.mainFrame.password1.value ="";
		document.mainFrame.password.focus();
		return;
	}
  }
}
// fin Valida password con password1
function ValidateForm(){
//Valida nombre
if (trim(document.mainFrame.nombre.value) == "") {
				alert("Debe ingresar el nombre del solicitante");
				document.mainFrame.nombre.focus();
				return false;
}
if (trim(document.mainFrame.fono.value) == "") {
				alert("Debe ingresar un n\u00FAmero de Tel\u00E9fono Fijo");
				document.mainFrame.fono.focus();
				return false;
}
var btn = valButton(mainFrame.sexo);
if (btn == null) {
   alert("Debe ingresar su Sexo");
   //  document.mainFrame.sexo.focus();
   return false;
}
if (trim(document.mainFrame.direccion.value) == "") {
				alert("Debe ingresar una Direcci\u00f3n");
				document.mainFrame.direccion.focus();
				return false;
}
if (trim(document.mainFrame.ciudad.value) == "") {
				alert("Debe ingresar una Ciudad");
				document.mainFrame.ciudad.focus();
				return false;
}
// Valida lugar favorito
// if (document.mainFrame.congregacion.value == "") {
//	alert("Debe seleccionar un local que m\u00E1s frecuenta/n o que m\u00E1s le gusta");
//	document.mainFrame.congregacion.focus();
//	return false;
//}
// fin valida lugar favorito
// Valida e-mail
if (trim(document.mainFrame.correo.value) != "") {
var x=document.mainFrame.correo.value;
var emailID=document.mainFrame.correo
	if ((emailID.value==null)||(emailID.value=="")){
		alert("Por favor ingrese su Email");
		emailID.focus();
		return false;
	}	
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
	  alert(x+"\n \u00C9sta no es una direcci\u00F3n e-mail v\u00E1lida.");
	  emailID.focus();
	  return false;
	  }
} else {
      alert("Debe ingresar un Correo Electr\u00F3nico\n ya que ser\u00E1 su Login");
	  document.mainFrame.correo.focus();
	  return false;
}
// Fin Valida e-mail
if (trim(document.mainFrame.password.value) == ""){
	alert("Debe ingresar una clave secreta");
	document.mainFrame.password.focus();
	return(false);
}


return true
}
-->
</SCRIPT>
</head>

<body onload="MM_preloadImages('http://<?=$nombreurl?>/images/face_bot_up.png','images/twit_bot_up.png')">
	<?   
    // BOTON FLOTANTE --->
       // require_once('inc/boton_flotante.incl');         
     // BOTON FLOTANTE --->

?>
<div id="nonFooter" width="100%">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#000000">
	
	<?   
     // Cabecera --->
        require_once('inc/cabecera_ext.incl');         
     // Cabecera --->
?>


    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" >
	<table width="970" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_bca esquina_red">
      <tr>
        <td align="center" valign="middle">
        

        
        <table width="98%" border="0" cellpadding="2" cellspacing="3"id="table15" height="75" >
		<tr >
        <td valign="bottom"  height="25" width="50%"  class="arial_12_blue" align=center>
<input name="button10" type="submit" class="google_bot_txt_bco esquina_red_3px padding_10" id="button10" value="T&eacute;rminos y condiciones" onclick="javascript:window.location.href='http://<?=$nombreurl?>/documentos/Terminos_y_condiciones_d_uso_SOSCLICK1.pdf';"/>
		</td>

		</tr>		
		<tr >
        <td valign="bottom"  height="25" colspan="2"   align=center>		
	
		<span class="arial_light_med">
			Damos por asumido que ley&oacute; y acept&oacute; los T&eacute;rminos y Condiciones del sitio una vez que se haya registrado.<p></td>
      </tr>
	</table>

 
<FORM language=javascript name="mainFrame" id="mainFrame" onSubmit="return ValidateForm();" action="grabadatos.php" method="post" target="_self">  
<input type=hidden name=tipo id=tipo value="P">
<table width="92%" border=0 cellpadding="2" cellspacing="3" id="table15" align=center  >
<tr  class="cuerpo_gris">
        <td valign="middle"  height="25" width="29%" style="text-align: left" >Nombre Apellido</td>
        <td  width="69%" height="25" style="text-align: left">
		<input name="nombre" type="text" class="formText" id="nombre" size="45" onKeyPress="return isAlphaStd(event);"  ></td>
</tr>

<tr class="cuerpo_gris">
        <td valign="middle"  height="25" width="29%" style="text-align: left" >
        Tel&eacute;fono Movil</td>
        <td  width="69%" height="25" style="text-align: left">
		<!--input type=hidden name="ciudad_fono" id="ciudad_fono" value=02-->
	
		09-<input name="fono"  type="text" class="cajaGris" id="fono" size="26" onKeyPress="return isNumber(event);" maxlength="15">
		</td>
</tr>

<tr  class="cuerpo_gris">
        <td valign="middle" height="34" width="29%" style="text-align: left" >
		 Pa&iacute;s</td>
        <td  width="69%" height="34">
        <p align="left">
        <select name="pais"  id="pais"  class="box_1">
				<option selected="selected" value="Chile">Chile</option>
				<option value="AF">Afghanistan</option>
				<option value="AL">Albania</option>
				<option value="DZ">Algeria</option>
				<option value="AS">American Samoa</option>
				<option value="AD">Andorra</option>
				<option value="AO">Angola</option>
				<option value="AI">Anguilla</option>
				<option value="AQ">Antarctica</option>
				<option value="AG">Antigua and Barbuda</option>
				<option value="AR">Argentina</option>
				<option value="AM">Armenia</option>
				<option value="AW">Aruba</option>
				<option value="AU">Australia</option>
				<option value="AT">Austria</option>
				<option value="AZ">Azerbaijan</option>
				<option value="BS">Bahamas</option>
				<option value="BH">Bahrain</option>
				<option value="BD">Bangladesh</option>
				<option value="BB">Barbados</option>
				<option value="BY">Belarus</option>
				<option value="BE">Belgica</option>
				<option value="BZ">Belize</option>
				<option value="BJ">Benin</option>
				<option value="BM">Bermuda</option>
				<option value="BT">Bhutan</option>
				<option value="BO">Bolivia</option>
				<option value="BA">Bosnia and Herzegovina</option>
				<option value="BW">Botswana</option>
				<option value="BV">Bouvet Island</option>
				<option value="BR">Brazil</option>
				<option value="IO">British Indian Ocean Territory</option>
				<option value="VG">British Virgin Islands</option>
				<option value="BN">Brunei Darussalam</option>
				<option value="BG">Bulgaria</option>
				<option value="BF">Burkina Faso</option>
				<option value="BI">Burundi</option>
				<option value="KH">Cambodia</option>
				<option value="CM">Cameroon</option>
				<option value="CA">Canada</option>
				<option value="CV">Cape Verde</option>
				<option value="KY">Cayman Islands</option>
				<option value="CF">Central African Republic</option>
				<option value="TD">Chad</option>
				<option value="CL">Chile</option>
				<option value="CN">China</option>
				<option value="CX">Christmas Island</option>
				<option value="CC">Cocos</option>
				<option value="CO">Colombia</option>
				<option value="KM">Comoros</option>
				<option value="CG">Congo</option>
				<option value="CK">Cook Islands</option>
				<option value="CR">Costa Rica</option>
				<option value="HR">Croatia</option>
				<option value="CU">Cuba</option>
				<option value="CY">Cyprus</option>
				<option value="CZ">Czech Republic</option>
				<option value="DK">Denmark</option>
				<option value="DJ">Djibouti</option>
				<option value="DM">Dominica</option>
				<option value="DO">Dominican Republic</option>
				<option value="TP">East Timor</option>
				<option value="EC">Ecuador</option>
				<option value="EG">Egypt</option>
				<option value="SV">El Salvador</option>
				<option value="GQ">Equatorial Guinea</option>
				<option value="ER">Eritrea</option>
				<option value="EE">Estonia</option>
				<option value="ET">Ethiopia</option>
				<option value="FK">Falkland Islands</option>
				<option value="FO">Faroe Islands</option>
				<option value="FJ">Fiji</option>
				<option value="FI">Finland</option>
				<option value="FR">France</option>
				<option value="GF">French Guiana</option>
				<option value="PF">French Polynesia</option>
				<option value="TF">French Southern Territories</option>
				<option value="GA">Gabon</option>
				<option value="GM">Gambia</option>
				<option value="GE">Georgia</option>
				<option value="DE">Germany</option>
				<option value="GH">Ghana</option>
				<option value="GI">Gibraltar</option>
				<option value="GR">Greece</option>
				<option value="GL">Greenland</option>
				<option value="GD">Grenada</option>
				<option value="GP">Guadeloupe</option>
				<option value="GU">Guam</option>
				<option value="GT">Guatemala</option>
				<option value="GN">Guinea</option>
				<option value="GW">Guinea-Bissau</option>
				<option value="GY">Guyana</option>
				<option value="HT">Haiti</option>
				<option value="HM">Heard and McDonald Islands</option>
				<option value="HN">Honduras</option>
				<option value="HK">Hong Kong</option>
				<option value="HU">Hungary</option>
				<option value="IS">Iceland</option>
				<option value="IN">India</option>
				<option value="ID">Indonesia</option>
				<option value="IR">Iran</option>
				<option value="IQ">Iraq</option>
				<option value="IE">Ireland</option>
				<option value="IL">Israel</option>
				<option value="IT">Italy</option>
				<option value="CI">Ivory Coast</option>
				<option value="JM">Jamaica</option>
				<option value="JP">Japan</option>
				<option value="JO">Jordan</option>
				<option value="KZ">Kazakhstan</option>
				<option value="KE">Kenya</option>
				<option value="KI">Kiribati</option>
				<option value="KW">Kuwait</option>
				<option value="KG">Kyrgyzstan</option>
				<option value="LA">Laos</option>
				<option value="LV">Latvia</option>
				<option value="LB">Lebanon</option>
				<option value="LS">Lesotho</option>
				<option value="LR">Liberia</option>
				<option value="LY">Libya</option>
				<option value="LI">Liechtenstein</option>
				<option value="LT">Lithuania</option>
				<option value="LU">Luxembourg</option>
				<option value="MO">Macau</option>
				<option value="MK">Macedonia</option>
				<option value="MG">Madagascar</option>
				<option value="MW">Malawi</option>
				<option value="MY">Malaysia</option>
				<option value="MV">Maldives</option>
				<option value="ML">Mali</option>
				<option value="MT">Malta</option>
				<option value="MH">Marshall Islands</option>
				<option value="MQ">Martinique</option>
				<option value="MR">Mauritania</option>
				<option value="MU">Mauritius</option>
				<option value="YT">Mayotte</option>
				<option value="MX">Mexico</option>
				<option value="FM">Micronesia</option>
				<option value="MD">Moldova</option>
				<option value="MC">Monaco</option>
				<option value="MN">Mongolia</option>
				<option value="MS">Montserrat</option>
				<option value="MA">Morocco</option>
				<option value="MZ">Mozambique</option>
				<option value="MM">Myanmar</option>
				<option value="NA">Namibia</option>
				<option value="NR">Nauru</option>
				<option value="NP">Nepal</option>
				<option value="NL">Netherlands</option>
				<option value="AN">Netherlands Antilles</option>
				<option value="NC">New Caledonia</option>
				<option value="NZ">New Zealand</option>
				<option value="NI">Nicaragua</option>
				<option value="NE">Niger</option>
				<option value="NG">Nigeria</option>
				<option value="NU">Niue</option>
				<option value="NF">Norfolk Island</option>
				<option value="KP">North Korea</option>
				<option value="MP">Northern Mariana Islands</option>
				<option value="NO">Norway</option>
				<option value="OM">Oman</option>
				<option value="PK">Pakistan</option>
				<option value="PW">Palau</option>
				<option value="PA">Panama</option>
				<option value="PG">Papua New Guinea</option>
				<option value="PY">Paraguay</option>
				<option value="PE">Peru</option>
				<option value="PH">Philippines</option>
				<option value="PN">Pitcairn</option>
				<option value="PL">Poland</option>
				<option value="PT">Portugal</option>
				<option value="PR">Puerto Rico</option>
				<option value="QA">Qatar</option>
				<option value="RE">Reunion</option>
				<option value="RO">Romania</option>
				<option value="RU">Russian Federation</option>
				<option value="RW">Rwanda</option>
				<option value="GS">S. Georgia and S. Sandwich Islands</option>
				<option value="KN">Saint Kitts and Nevis</option>
				<option value="LC">Saint Lucia</option>
				<option value="VC">Saint Vincent and The Grenadines</option>
				<option value="WS">Samoa</option>
				<option value="SM">San Marino</option>
				<option value="ST">Sao Tome and Principe</option>
				<option value="SA">Saudi Arabia</option>
				<option value="SN">Senegal</option>
				<option value="SC">Seychelles</option>
				<option value="SL">Sierra Leone</option>
				<option value="SG">Singapore</option>
				<option value="SK">Slovakia</option>
				<option value="SI">Slovenia</option>
				<option value="SB">Solomon Islands</option>
				<option value="SO">Somalia</option>
				<option value="ZA">South Africa</option>
				<option value="KR">South Korea</option>
				<option value="SU">Soviet Union</option>
				<option value="ES">Spain</option>
				<option value="LK">Sri Lanka</option>
				<option value="SH">St. Helena</option>
				<option value="PM">St. Pierre and Miquelon</option>
				<option value="SD">Sudan</option>
				<option value="SR">Suriname</option>
				<option value="SJ">Svalbard and Jan Mayen Islands</option>
				<option value="SZ">Swaziland</option>
				<option value="SE">Sweden</option>
				<option value="CH">Switzerland</option>
				<option value="SY">Syria</option>
				<option value="TW">Taiwan</option>
				<option value="TJ">Tajikistan</option>
				<option value="TZ">Tanzania</option>
				<option value="TH">Thailand</option>
				<option value="TG">Togo</option>
				<option value="TK">Tokelau</option>
				<option value="TO">Tonga</option>
				<option value="TT">Trinidad and Tobago</option>
				<option value="TN">Tunisia</option>
				<option value="TR">Turkey</option>
				<option value="TM">Turkmenistan</option>
				<option value="TC">Turks and Caicos Islands</option>
				<option value="TV">Tuvalu</option>
				<option value="UG">Uganda</option>
				<option value="UA">Ukraine</option>
				<option value="AE">United Arab Emirates</option>
				<option value="UK">United Kingdom</option>
				<option value="US">United States</option>
				<option value="UY">Uruguay</option>
				<option value="UM">US Minor Outlying Islands</option>
				<option value="VI">US Virgin Islands</option>
				<option value="UZ">Uzbekistan</option>
				<option value="VU">Vanuatu</option>
				<option value="VE">Venezuela</option>
				<option value="VN">Viet Nam</option>
				<option value="WF">Wallis and Futuna Islands</option>
				<option value="EH">Western Sahara</option>
				<option value="YE">Yemen</option>
				<option value="YU">Yugoslavia</option>
				<option value="ZR">Zaire</option>
				<option value="ZM">Zambia</option>
				<option value="ZW">Zimbabwe</option>
			</select>
</tr>
<!--tr  class="cuerpo_gris">
        <td valign="middle"  height="25" width="29%" style="text-align: left" >
         Direcci&oacute;n</td>
        <td  width="69%" height="25" style="text-align: left">
		<input name="direccion" type="text" class="formText" id="direccion" size="45" onKeyPress="return isAlpha(event);" ></td>
</tr-->
      	
<tr  class="cuerpo_gris">
        <td valign="middle"  height="25" width="29%" style="text-align: left" > Ciudad</td>
        <td  width="69%" height="25" style="text-align: left">

 <select name="ciudad" id="ciudad">
				<option value='0'>Elija una ciudad</option>
						<?$SQL_comuna=" SELECT * FROM comuna ORDER BY comunas ASC";
						  $comuna=mysql_query($SQL_comuna,$base); 
						   while($fila_comuna=mysql_fetch_array($comuna)) {?>
						   <option value="<?=$fila_comuna["comunas"]?>"><?=$fila_comuna["comunas"]?></option>
						<?}?>
					
			</select>

</td>
</tr>
      	

<tr  class="cuerpo_gris">
        <td valign="middle"  height="34" width="29%" style="text-align: left" > Fecha de Nacimiento</font></td>
        <td  width="69%" height="34" align="left">
					<font size="2">d&iacute;a</font>&nbsp; 
					<select class="box_1" name="dia" id="dia" size="1">
					<?
					 for($vi=1;$vi<=31;$vi=$vi+1) {
						if ($vi < 10) {
						  $ivar = "0".$vi;
					       echo "<option value='".$ivar."' >".$ivar."</option>";
						}else{
						  echo "<option value='".$vi."' >".$vi."</option>";
						}
					}
					?>
      		      		      	
 			        </select>
					<font size="2">mes</font>&nbsp; 
					<select class="box_1" name="mes" id="mes" size="1">
					<?
					  for($vi=1;$vi<=12;$vi=$vi+1) {
						if ($vi < 10) {
						  $ivar = "0".$vi;
					       echo "<option value='".$ivar."' >".$ivar."</option>";
						}else{
						  echo "<option value='".$vi."' >".$vi."</option>";
						}
					}

					?>
 			        </select>
					<font size="2">a&ntilde;o</font>&nbsp;
					<select class="box_1" name="ano" id="ano" size="1">
                    <option value="1962" SELECTED>1962</option>
					<?
					 
					 $agnoActual=date ("Y");
					 echo "ANO ACTUAL ".$agnoActual;
					 $agnomenos10=$agnoActual-10;
					 $agnomenos90=$agnoActual-86;
					 for($vi=$agnomenos90;$vi<=$agnomenos10;$vi=$vi+1) {
						  echo "<option value='".$vi."' >".$vi."</option>";
					 }
					?>
 			        </select>&nbsp;
        </td>
   		  </tr>
      	

      <input name="anfitrion" type="hidden" class="formText" id="anfitrion" size="45" value="" readonly>
	  <input name="congregacion" type="hidden" class="formText" id="congregacion" size="45" value="" >
	  <input name="celular" type="hidden" class="formText" id="celular" size="45" value="" >
	  <input name="giro" type="hidden" class="formText" id="giro" size="45" value="" >
	  <input name="rut" type="hidden" class="formText" id="rut" size="45" value="" >
<tr  class="cuerpo_gris">
        <td valign="middle"  height="25" width="29%" style="text-align: left" >
        Correo Electr&oacute;nico ( ser&aacute; tu Login)</td>
        <td  width="69%" height="25" style="text-align: left">
		<input name="correo" type="text" class="formText" id="correo" size="45" onKeyPress="return isEmail(event);"></td>
</tr>
      		
<tr  class="cuerpo_gris">
        <td valign="middle"  height="25" width="29%" style="text-align: left" >
		Repite tu Correo Electr&oacute;nico</td>
        <td  width="69%" height="25" style="text-align: left">
		<input name="correo1" type="text" class="formText" id="correo1" size="45" onKeyPress="return isEmail(event);" onBlur="igualMail();"></td>
</tr>
      		
<tr  class="cuerpo_gris">
        <td valign="middle"  height="13" width="29%" style="text-align: left" >
        Contrase&ntilde;a </td>
        <td  width="69%" height="13" style="text-align: left">
		<input name="password" type="password" class="formText" id="password" size="45" onKeyPress="return isAlpha(event);" ></td>
</tr>
      		
<tr  class="cuerpo_gris">
        <td valign="middle"  height="13" width="29%" style="text-align: left" >
		Repite la Contrase&ntilde;a </td>
        <td  width="69%" height="13" style="text-align: left">
		<input name="password1" type="password" class="formText" id="password1" size="45" onBlur="igualpass();" onKeyPress="return isAlpha(event);"></td>
</tr>
      		
    

<tr  class="arial_light_med">
        <td valign="middle"  height="13" width="98%" style="text-align: left" colspan="2" >
		<p style="text-align: center">
		Doy por aceptado los t&eacute;rminos y condiciones del sitio, <?=$pagina?> 
		</p>
		<p style="text-align: center">
		<input name="button10" type="submit" class="google_bot_txt_bco esquina_red_3px padding_10" id="button10" value="Reg&iacute;strate"  />
</td>
</tr>

<tr  class="cuerpo_gris">
        <td valign="middle"  height="40" width="100%" style="text-align: center" colspan="2" ><span class="cuerpo_gris">
			Todos Los datos son obligatorios.</td>
</tr>

</table>

</form>



        
        
        </td>
      </tr>
  </table></td>
  </tr>
</table>



<!--Tabla de margen frente al footer -->

<table align="center" width="990" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="80"></td>
  </tr>
</table>

<!--Fin de la Tabla de margen frente al footer -->

</div> 
<!-- Footer, debe estar dentro del Div-->

<?  require_once('./inc/footer.incl');  ?> 

</body>
</html>
