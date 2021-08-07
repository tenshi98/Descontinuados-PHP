<?php session_start();
   
    // HEAD --->
        require_once('inc/head.php');         
     // HEAD --->

if ( !empty($_POST['submit_edit']) ) {
$sql_Postulante="UPDATE Postulante set   PostProfesion1='".$_POST["PostProfesion1"]."', PostProfesion2='".$_POST["PostProfesion2"]."', PostProfesion3='".$_POST["PostProfesion3"]."', PostProduccion1='".$_POST["PostProduccion1"]."', PostProduccion2='".$_POST["PostProduccion2"]."', PostProduccion3='".$_POST["PostProduccion3"]."', PostObjetivo='".$_POST["PostObjetivo"]."',  PostActivo='1'  WHERE user_atv = '".$_COOKIE['sess_demo_correo']."'"; 

$result_graba_Postulante =mysql_query($sql_Postulante,$dbCasting);
		header( 'Location: casting_virtual_book.php' );
		die;
}

?>

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
                        	<ul class="tab_prin">
                        		<li  ><a href="">HOME</a></li>
                        		<li class="active_tab"><a href="">BOOK</a></li>
                        		<li><a href="">VIDEO PRESENTACIÓN</a></li>
                        		<li><a href="">COMPARTE TUS VIDEOS</a></li>
                        	</ul>
<form method="post" name="formulario" data-ajax="false"  >
                            <div class="cont_casting">
                            	<div class="casting_16 span16">
                                	 <div class="cont_book_perfil">
                                     		<h3>Mi Perfil</h3>
                                            <div class="b_perfil">
                                            	<div class="fotoperfil_d box">
                                                		  <div class="span12">
                                                        <img src="img/temporales/img17.jpg"/>
                                                    </div>
                                                    
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
                                                  
                                                     
                                                    
                                                    
                                                    <div class="cont_btn">
                                                        <a href="">EDITAR PERFIL</a>
                                                    </div>
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
										                                                                             <div class="cont_btn">
																													      <input name="submit_edit" type="submit"  id="post_button" Value="GUARDAR"/>
                                                        <!--a href="#" onclick="document.forms['formulario'].submit(); return false;">  GUARDAR</a-->
                                                    </div>
                                     </div>
</form>
                                </div>
<aside class="span8">
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