<?php session_start();
  
    // HEAD --->
        require_once('inc/head.php');         
     // HEAD --->

	 
if ( !empty($_POST['submit_edit']) ) {
$sql_Postulante="UPDATE Postulante set   PostProfesion1='".$_POST["PostProfesion1"]."', PostProfesion2='".$_POST["PostProfesion2"]."', PostProfesion3='".$_POST["PostProfesion3"]."', PostProduccion1='".$_POST["PostProduccion1"]."', PostProduccion2='".$_POST["PostProduccion2"]."', PostProduccion3='".$_POST["PostProduccion3"]."', PostObjetivo='".$_POST["PostObjetivo"]."',  PostActivo='1'  WHERE user_atv = '".$_COOKIE['sess_demo_correo']."'"; 

$result_graba_Postulante =mysql_query($sql_Postulante,$dbCasting);
		header( 'Location: casting_virtual_inicio.php' );
		die;
}
?>
<script type="text/javascript" src="tabs/tabber.js"></script>

<link rel="stylesheet" href="tabs/tabs.css" TYPE="text/css" MEDIA="screen">
<link rel="stylesheet" href="css/tabs2.css" TYPE="text/css" MEDIA="screen">
<script type="text/javascript">

/* Optional: Temporarily hide the "tabber" class so it does not "flash"
   on the page as plain HTML. After tabber runs, the class is changed
   to "tabberlive" and it will appear. */

document.write('<style type="text/css">.tabber{display:none;}<\/style>');
</script>

<body>

<?php 
if(!isset($_COOKIE['sess_demo'])){ 
		header( 'Location: registro_inicio_sesion.php?contacto='.$nombre_programa );
		die;
}?>




	<?   
    // MENU CINTILLO --->
        require_once('inc/menu_cintillo.php'); 
		    // MENU CINTILLO --->
?>
	<section class="wrapper row-fluid">
    		<div class="cont_wrapper">
<?   
    // MENU NAVEGACION --->
        require_once('inc/menu_nav_login.php');         
     // MENU NAVEGACION --->
?>
                 <div class="wrapper_b">
                 		<div class="wrapper_casting">
<div class="cont_casting">
<div class="tabber">

     <div class="tabbertab">
<h2>HOME</h2>
				<p><div class="casting_16">
                                	<div class="slider_cast">
                                    	<figcaption>
                                            <a href="">
                                                <img src="img/temporales/img5.jpg">  <span class="ico_play"> </span>
                                            </a>
                                        </figcaption>
                                        <h2><a href="">Bienvenido al Casting Virtual de América Televisión. Entérate en qué consiste</a></h2>
                                        <ul class="balls">
                                	<li class="active_b"><a href=""></a></li>
                                    <li><a href=""></a></li>
                                    <li><a href=""></a></li>
                                    <li><a href=""></a></li>
                                </ul>
                                    </div>
                                    <div class="cont_sorteos_semana">
                                    	<h2 class="head_h2">SORTEOS DE LA SEMANA</h2>
                                       <div class="sort_semana">
                                       		<ul class="princ_sem">
                                       			<li class="active"><a href="">LOS MÁS VALORADOS</a></li>
                                                <li><a href="">LOS MÁS RECIENTES</a></li>
                                                <li class="bloq_search"> <input  name="" type="text" class="srch_s" value="Categorías"> <input class="btn_s" name="" type="button"> </li>
                                       		</ul>
                                            <div class="list_sorteo">
                                            	<ul class="bloq_sorteo">
                                           		  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">
                                                                <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 005</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                            	</ul>
                                                <ul class="bloq_sorteo">
                                           		  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">
                                                                <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">
                                                                <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                            	</ul>
                                                <ul class="bloq_sorteo">
                                           		  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                            	</ul>
                                                <ul class="bloq_sorteo">
                                           		  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                            	</ul>	
                                            	<div class="cont_btn">
                                        <a href="">VER TODOS <span>»</span></a>
                                    </div>
                                            </div>
                                       
                                       </div>
                                    </div>
                                
                                </div>
                               
										 
										 
										 </p>
     </div>


     <div class="tabbertab">
<h2>BOOK</h2>
	  <p>
<form method="post" name="formulario" data-ajax="false"  >
                            	<div class="casting_16 ">
                                	 <div class="cont_book_perfil">
                                     		<h3>Mi Perfil</h3>
                                            <div class="b_perfil">
                                            	<div class="fotoperfil_d box">
                                                		  <div class="span12"><img src="<?php echo $_COOKIE['sess_demo_avatar']; ?>"/></div>
                                                    
                                                    <div class="span12">
                                                    	<div class="datos_book">
                                                        	<h3><?php echo $row_usuario["PostNombres"]?></h3>
                                                        <h4><?php echo $row_usuario["PostApellPapa"]?> <?php echo $row_usuario["PostApellMama"]?></h4>
                                                        <h5><?php echo $edad;?> años</h5>
                                                        <h5><a href=""><?php echo $row_usuario["PostEmail"]?></a></h5>
                                                        
                                                        </div>
                                                        <div class="b_cont_datos">
                                                        <h4><strong>Dirección:</strong></h4>
                                                        <h4><?php echo $row_usuario["PostDireccion"]?></h4>
                                                	</div>
                                                    <div class="datos_bloq2">
                                                    	<div class="span12">
                                                        		<div class="b_cont_datos">
                                                                    <h4><strong>Ciudad</strong></h4>
                                                                    <h4><?php echo $row_usuario["PostCiudad"]?></h4>
                                                                </div>
                                                                <div class="b_cont_datos">
                                                                    <h4><strong>Teléfono fijo</strong></h4>
                                                                    <h4><?php echo $row_usuario["PostFonoFijo"]?></h4>
                                                                </div>
                                                        </div>
                                                    	<div class="span12">
                                                        		<div class="b_cont_datos">
                                                                    <h4><strong>País</strong></h4>
                                                                    <h4><?php echo $row_usuario["PostNacionalidad"]?></h4>
                                                                </div>
                                                                <div class="b_cont_datos">
                                                                    <h4><strong>Teléfono Móvil</strong></h4>
                                                                    <h4><?php echo $row_usuario["PostFonoCel"]?></h4>
                                                                </div>
                                                        
                                                        </div>
                                                    </div>
                                               	  </div>

                                                </div>
                                                  
                                                     
                                                    
                                                    
                                                    <div class="cont_btn"><a href="perfil.php" rel="shadowbox;width=700;height=400">EDITAR PERFIL</a></div>
                                            </div>
                                     </div>
                                     <div class="cont_book_talento">
                                     		<h2 class="head_h2">Talento</h2>
                                            <div class="bloq_talent">
                                            	<h4>Tus 3 habilidades mas importantes en orden de prioridad</h4>
                                                <ul>
                                                    <li class="span8">1 <span>
                                                    <select name="PostProfesion1"  id="PostProfesion1" >
												<option selected="selected" value="<?=$row_usuario['PostProfesion1']?>"><?=$row_usuario['PostProfesion1']?></option>
												<?
												$sql_profesion1 = "SELECT ProfDesc FROM Profesion order by ProfDesc ASC"; 
												$result_profesion1 =mysql_query($sql_profesion1,$dbCasting);
												while ($registro_profesion1= mysql_fetch_array($result_profesion1))  {   
												?>
												<option value="<?=$registro_profesion1['ProfDesc']?>"><?=$registro_profesion1['ProfDesc']?></option>
												<?}?>
												</select></span> </li>
                                                    <li class="span8">2 <span>
                                                    <select name="PostProfesion2"  id="PostProfesion2" >
												<option selected="selected" value="<?=$row_usuario['PostProfesion2']?>"><?=$row_usuario['PostProfesion2']?></option>
												<?
												$sql_profesion2 = "SELECT ProfDesc FROM Profesion order by ProfDesc ASC"; 
												$result_profesion2 =mysql_query($sql_profesion2,$dbCasting);
												while ($registro_profesion2= mysql_fetch_array($result_profesion2))  {   
												?>
												<option value="<?=$registro_profesion2['ProfDesc']?>"><?=$registro_profesion2['ProfDesc']?></option>
												<?}?>
												</select></span> </li>
                                                    <li class="span8">3 <span>
                                                    <select name="PostProfesion3"  id="PostProfesion3" >
												<option selected="selected" value="<?=$row_usuario['PostProfesion3']?>"><?=$row_usuario['PostProfesion3']?></option>
												<?
												$sql_profesion3 = "SELECT ProfDesc FROM Profesion order by ProfDesc ASC"; 
												$result_profesion3 =mysql_query($sql_profesion3,$dbCasting);
												while ($registro_profesion3= mysql_fetch_array($result_profesion3))  {   
												?>
												<option value="<?=$registro_profesion3['ProfDesc']?>"><?=$registro_profesion3['ProfDesc']?></option>
												<?}?>
												</select></span> </li>
                                                </ul>
                                            </div>
                                            
                                            <div class="bloq_talent">
                                                 <h3>Descripción de tu perfil</h3>
                                                 <textarea name="PostObjetivo" cols="" rows=""><?php echo $row_usuario["PostObjetivo"]?></textarea>
                                            </div>
                                            <div class="bloq_talent">
                                            	<h3>Producciones de tu interés (casting)</h3>
                                            	<h4>Tus 3 habilidades mas importantes en orden de prioridad</h4>
                                                <ul>
                                                    <li class="span8">1 <span>
                                                    <select name="PostProduccion1"  id="PostProduccion1" >
												<option selected="selected" value="<?=$row_usuario['PostProduccion1']?>"><?=$row_usuario['PostProduccion1']?></option>
												<?
												$sql_produccion1 = "SELECT ProdDesc FROM Producciones order by ProdDesc ASC"; 
												$result_produccion1 =mysql_query($sql_produccion1,$dbCasting);
												while ($registro_produccion1= mysql_fetch_array($result_produccion1))  {   
												?>
												<option value="<?=$registro_produccion1['ProdDesc']?>"><?=$registro_produccion1['ProdDesc']?></option>
												<?}?>
												</select></span> </li>
                                                    <li class="span8">2 <span>
                                                    <select name="PostProduccion2"  id="PostProduccion2" >
												<option selected="selected" value="<?=$row_usuario['PostProduccion2']?>"><?=$row_usuario['PostProduccion2']?></option>
												<?
												$sql_produccion2 = "SELECT ProdDesc FROM Producciones order by ProdDesc ASC"; 
												$result_produccion2 =mysql_query($sql_produccion2,$dbCasting);
												while ($registro_produccion2= mysql_fetch_array($result_produccion2))  {   
												?>
												<option value="<?=$registro_produccion2['ProdDesc']?>"><?=$registro_produccion2['ProdDesc']?></option>
												<?}?>
												</select></span> </li>
                                                    <li class="span8">3 <span>
                                                     <select name="PostProduccion3"  id="PostProduccion3" >
												<option selected="selected" value="<?=$row_usuario['PostProduccion3']?>"><?=$row_usuario['PostProduccion3']?></option>
												<?
												$sql_produccion3 = "SELECT ProdDesc FROM Producciones order by ProdDesc ASC"; 
												$result_produccion3 =mysql_query($sql_produccion3,$dbCasting);
												while ($registro_produccion3= mysql_fetch_array($result_produccion3))  {   
												?>
												<option value="<?=$registro_produccion3['ProdDesc']?>"><?=$registro_produccion3['ProdDesc']?></option>
												<?}?>
												</select></span> </li>
                                             </ul>
                                          </div>
                                            
                                           
                                           <div class="bloq_talent">
										   <?php if($row_usuario['PostreciboNoticias']==1) {?>
                                           		<input name="PostreciboNoticias" type="checkbox" value="1" checked> Deseo recibir noticias de castings, en VIVOS y campa&ntilde;as de los portales de Am&eacute;rica Televisión
											<?}else{?>
                                           		<input name="PostreciboNoticias" type="checkbox" value="0" > Deseo recibir noticias de castings, en VIVOS y campa&ntilde;as de los portales de Am&eacute;rica Televisión
											<?}?>
                                           </div>
										     <div class="cont_btn"><input name="submit_edit" type="submit"  id="post_button" Value="GUARDAR"/></div>
                                     </div>

                                </div>
								
								</form>
	 </p>
     </div>


     <div class="tabbertab">
<h2>VIDEO PRESENTACI&Oacute;N</h2>
	  <p>
<?
$result = mysql_query("select * from parametros ",$dbCasting);

while($row=mysql_fetch_array($result))
{
		  $ipe_in=$row['IP_interna'];
		  $ipe_out=$row['IP_externa'];
		  $datos=$row['donde'];
		  $directorio=$row['directorio'];
		  list($ip1_in, $ip2_in, $ip3_in, $ip4_in) =split( '[.]', $row['IP_interna']);
		  list($ip1_out, $ip2_out, $ip3_out, $ip4_out) =split( '[.]', $row['IP_externa']);
		  
}	

$mi_ip = $_SERVER['REMOTE_ADDR']; 
list($ip1, $ip2, $ip3, $ip4) =split( '[.]', $mi_ip);
$inicio=$ip1_in.".".$ip2_in.".".$ip3_in.".";


if ($mi_ip == "200.119.246.138" or $mi_ip == "192.168.1.25")
			{
				 $IPE=$ip1_in.".".$ip2_in.".".$ip3_in.".".$ip4_in;
			
			  }else{
			
	 			$IPE=$ip1_out.".".$ip2_out.".".$ip3_out.".".$ip4_out;
}

$Infor="peliculas/grabador_full.swf?mi_var=" . $directorio. "&id=" . $usuario . "&IP_in=" . $IPE . "&nombre_video=" . $row_usuario['PostEmail'];
?>


	  <div class="casting_16 presentacio_v">
									<div class="cont_video_perfil">
                                     		<h3>Instrucciones</h3>
                                           <ul>
                                           	<li class="span6 i1">
                                            	<figcaption></figcaption>
                                                <h4>Para poder grabar tu video tienes que tener cámara web y micrófono</h4>
                                            </li>
                                           	<li class="span6 i2">
                                            	<figcaption></figcaption>
                                                <h4>Puedes grabar hasta 1 video por cada talento de un m&iacute;nimo de 10 segundos cada uno</h4>
                                            </li>
                                            <li class="span6 i3">
                                            	<figcaption></figcaption>
                                                <h4>Los videos que subas, están sujetos a una revisión antes de que puedan ser vistos por el resto de los socios</h4>
                                            </li>
                                            <li class="span6 i4">
                                            	<figcaption></figcaption>
                                                <h4>Luego de grabar el video y antes de enviarlos podrás previsualizarlos y regrabarlo si lo deseas</h4>
                                            </li>
                                           </ul>
                                     </div>
                                     <div class="video_talento">

                                     	<h3>Talento</h3>






                                        <div class="cont_video_talento ">

										<section class="tabs noti_hover noti_checked ">
       
       
        <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
        <label for="tab-1" class="tab-label-1 "><i class="fa fa-inbox"><?php echo $row_usuario['PostProfesion1'];?></i></label>
        
        <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
        <label for="tab-2" class="tab-label-2 "><i class="fa fa-share-square-o"><?php echo $row_usuario['PostProfesion2'];?></i></label>
        
        <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
        <label for="tab-3" class="tab-label-3 "><i class="fa fa-taxi"><?php echo $row_usuario['PostProfesion3'];?></i></label>
        
     <div class="clear-shadow"></div>
  
        
        
        <div class="content ">
          
          <div class="content-1"> <?php  $Infor="peliculas/grabador_full.swf?mi_var=" . $directorio. "&IP_in=" . $IPE . "&nombre_video=nph1_" . $row_usuario['PostEmail'];?>
		  
		  

             <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="550" height="409" id="seguridad1" align="middle">
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="movie" value="<?=$Infor?>" />
			<param name="quality" value="High" />
    	    <param name=wmode value="transparent">
			<embed src="<?=$Infor?>" quality='high' width='550' height='409' name='grabador' align='middle' allowScriptAccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' /> 
			<param name="movie"></object>
 
		  
		  </div>
          <div class="content-2"><?php $Infor="peliculas/grabador_full.swf?mi_var=" . $directorio. "&IP_in=" . $IPE . "&nombre_video=nph2_" . $row_usuario['PostEmail'];?>
		  
             <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="550" height="409" id="seguridad1" align="middle">
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="movie" value="<?=$Infor?>" />
			<param name="quality" value="High" />
    	    <param name=wmode value="transparent">
			<embed src="<?=$Infor?>" quality='high' width='550' height='409' name='grabador' align='middle' allowScriptAccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' /> 
			<param name="movie"></object>
		  
		  
		  </div>
          <div class="content-3"><?php $Infor="peliculas/grabador_full.swf?mi_var=" . $directorio. "&IP_in=" . $IPE . "&nombre_video=nph3_" . $row_usuario['PostEmail'];?>
		  
		  
             <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="550" height="409" id="seguridad1" align="middle">
			<param name="allowScriptAccess" value="sameDomain" />
			<param name="movie" value="<?=$Infor?>" />
			<param name="quality" value="High" />
    	    <param name=wmode value="transparent">
			<embed src="<?=$Infor?>" quality='high' width='550' height='409' name='grabador' align='middle' allowScriptAccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' /> 
			<param name="movie"></object>
		  
		  
		  </div>

          
        </div>
        <div class=" clear"></div>  
      
</section>


                                        	<div class="cont_btn"> <a href="">ACTUALIZAR</a> </div>
                                        </div>
                                     </div>





                                     <div class="cont_sorteos_semana">
                                    	<h2 class="head_h2">SORTEOS DE LA SEMANA</h2>
                                       <div class="sort_semana">
                                       		 
                                            <div class="list_sorteo">
                                            	<ul class="bloq_sorteo">
                                           		  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">
                                                                <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 005</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                            	</ul>
                                                <ul class="bloq_sorteo">
                                           		  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">
                                                                <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">
                                                                <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                                  <li class="span6">
                                                    	<figcaption>
                                                            <a href="">
                                                                <img src="img/temporales/img5.jpg">  <span class="ico_play2"> </span>
                                                            </a>
                                                        </figcaption>
                                                       		 <h4> <span></span>12 000</h4>
                                                            <h2><a href="">Yo cantando ando</a></h2>
                                                            <h3><strong>Luisa Pérez López</strong></h3>
                                                            <h3>Canto</h3>
                                                  </li>
                                            	</ul>
                                            </div>
                                       
                                       </div>
                                    </div>


</div>
</p>
     </div>

     <div class="tabbertab">
<h2>COMPARTE TUS VIDEOS</h2>
	  <p>                           
	  <div class="casting_16 compartir_v">
                                	 <div class="cont_video_perfil">
                                     		<h3>Tus videos de presentación</h3>
                                          <h4> Se compartirán los videos que estén seleccionados</h4>
                                     		<div class="cont_share_video">
											<? if ($row_usuario['PostFoto1']!="") {?>
                                            	<div class="item_share_v">
                                                	<div class="cont_check span2"><input name="" type="checkbox" value=""></div>
                                                    <figcaption class="span9">
													<a href="ver_video.php?correo=<?=$row_usuario['PostFoto1']?>" rel=shadowbox;width=640;height=360>
													<img src="fotos/<?php echo $row_usuario['PostFoto1'];?>.jpg"/>
													<span class="ico_play"> </span></a></figcaption>
                                                	<div class="preview_v span12"><a href="ver_video.php?correo=<?=$row_usuario['PostFoto1']?>" rel=shadowbox;width=640;height=360>
													<input name="" type="button"></a></div>
                                                </div>
												<?}?>
											<? if ($row_usuario['PostFoto2']!="") {?>
												<div class="item_share_v">
                                                	<div class="cont_check span2"><input name="" type="checkbox" value=""></div>
                                                    <figcaption class="span9">
													<a href="ver_video.php?correo=<?=$row_usuario['PostFoto2']?>" rel=shadowbox;width=640;height=360>
													<img src="fotos/<?php echo $row_usuario['PostFoto2'];?>.jpg"/>
													<span class="ico_play"> </span></a></figcaption>
                                                	<div class="preview_v span12"><a href="ver_video.php?correo=<?=$row_usuario['PostFoto2']?>" rel=shadowbox;width=640;height=360>
													<input name="" type="button"></a></div>
                                                </div>
												<?}?>
											<? if ($row_usuario['PostFoto3']!="") {?>
												<div class="item_share_v">
                                                	<div class="cont_check span2"><input name="" type="checkbox" value=""></div>
                                                    <figcaption class="span9">
													<a href="ver_video.php?correo=<?=$row_usuario['PostFoto3']?>" rel=shadowbox;width=640;height=360>
													<img src="fotos/<?php echo $row_usuario['PostFoto3'];?>.jpg"/>
													<span class="ico_play"> </span></a></figcaption>
                                                	<div class="preview_v span12"><a href="ver_video.php?correo=<?=$row_usuario['PostFoto3']?>" rel=shadowbox;width=640;height=360>
													<input name="" type="button"></a></div>
                                                </div>
												<?}?>											
                                            </div>
                                    </div>

									<div class="cont_video_perfil enviar_a">
                                     		<h3>Enviar a un amigo</h3>
                                       <div class="cont_send_video">
                                            	<div class="send_video">
                                                	<span class="span6">
                                                    	E-mail de destino:
                                                    </span>
                                                    <span class="span18">
                                                    	<input name="" type="text">
                                                    </span>
                                                </div>
                                                <div class="send_video">
                                                	<span class="span6">
                                                    	Nombre de destinatario:
                                                    </span>
                                                    <span class="span18">
                                                    	<input name="" type="text">
                                                    </span>
                                                </div>
                                                <div class="btn_send_v"><input name="ENVIAR" type="button" value="ENVIAR" id="ENVIAR"></div>
                                        </div>
                                   </div>


                                     <div class="video_talento tus_contactos">
                                     	<h3>Tus contactos</h3>
                                        <div class="selc_datos">
                                        	<input name="" type="checkbox" value=""> <span>Seleccionar todos</span>
                                        </div>
                                        
                                        <div class="tab_contactos">
                                        	 <ul>
                                                <li class="active"><a href="">A</a></li>
                                                <li><a href="">B</a></li>
                                                <li><a href="">D</a></li>
                                                <li><a href="">M</a></li>
                                                <li><a href="">P</a></li>
                                              </ul>
                                              <h4><a href="">Importar contactos</a></h4>
                                        </div>
                                       
                                        <div class="cont_video_talento ">
                                        	 <ul>
                                        	 	<li><input name="" type="checkbox" value=""> <span>anibal.ore@gmail.com</span></li>
                                                <li><input name="" type="checkbox" value=""> <span>anibal.ore@gmail.com</span></li>
                                                <li><input name="" type="checkbox" value=""> <span>anibal.ore@gmail.com</span></li>
                                        	 </ul>
                                            
                                        	 
                                        </div>
                                     </div>

	</div>
                            									
									</p>
     </div>

</div>
                            
                        
            















<aside class="span8">
                                		<div class="datos_cast">
                                       		<div class="prf_cast">
                                            	<div class="span8">
                                                <figcaption>
                                                	<img src="<?php echo $_COOKIE['sess_demo_avatar']; ?>"/>
                                               	<span class="budget"></span>
                                                </figcaption>
                                                	
                                              </div>
                                            	<div class="span16">
                                                    <h3><?php echo $row_usuario["PostNombres"]?></h3>
                                                 	<h4><?php echo $row_usuario["PostApellPapa"]?> <?php echo $row_usuario["PostApellMama"]?></h4>
                                                  	<h5><?php echo $edad;?> años</h5>
                                                    <h5><a href=""><?php echo $row_usuario["PostEmail"]?></a></h5>
                                                </div>
                                            </div>
                                            <div class="cont_presnt box">
                                            	  <div class="resultados">
                                                        <h4>
                                                            Presentación <span class="r_red">30%</span>
                                                        </h4>
                                                        <div class="cont_resul">
                                                            <span class="bg_r" style="width:30%;"></span>
                                                        </div>
                                                    </div>
                                                    <div class="resultados">
                                                        <h4>
                                                             
                                                            Book <span class="r_green">90%</span>
                                                        </h4>
                                                        <div class="cont_resul">
                                                            <span class="bg_g" style="width:90%;"></span>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="edt_prf box">
                                            	<div class="span20">
                                                	<?php echo $row_usuario["PostProfesion1"]?>, <?php echo $row_usuario["PostProfesion2"]?>, <?php echo $row_usuario["PostProfesion3"]?>
                                                </div>
                                            	<div class="span4">
                                                	<a href="">Editar</a>
                                                </div>
                                            
                                            </div>
                                       		<div class="desc_cast box">
                                            	<h3>Descripción</h3>
                                            	<p><?php echo $row_usuario["PostObjetivo"]?>.
</p>
                                         </div>
                                            
                                            
                                        </div>
                            
<?   
        require_once('inc/publicidad_derecha.php');         
?> 
                                		 <?   
        require_once('inc/gana_derecha.php');         
?> 
                                        
                                   
                                  		<!-- VIDEO CHAT -->                         
<?   
    // MENU NAVEGACION --->
        require_once('inc/video_chat.php');         
     // MENU NAVEGACION --->
?>        

		<!-- VIDEO CHAT -->  
                        </aside>
                            
                            </div>
                        
                        
                        </div>
                 	
                 </div>
                
                
            <!-- FOOTER -->	

<?   
    // MENU NAVEGACION --->
        require_once('inc/footer.php');         
     // MENU NAVEGACION --->
?>



<!-- FOOTER -->	
            </div>
    		
    
    </section>



</body></html>