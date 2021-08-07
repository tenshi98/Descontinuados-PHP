<?php session_start();
/**********************************************************************************************************************************/
/*                                                      Verifico la sesion                                                        */
/**********************************************************************************************************************************/
if (isset($_GET["cierro"])&&$_GET["cierro"]=="si") {
	session_destroy();
}
if (!isset($_GET["room"]) or $_GET["room"]=='' or !isset($_GET["r"]) or $_GET["r"]=='' or !isset($_GET["name"]) or $_GET["name"]=='') {
	header( 'Location: index.php' );
	die;
}
/**********************************************************************************************************************************/
/*                                                         Se carga el head                                                       */
/**********************************************************************************************************************************/
require_once('inc/head.php'); 
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear usuario
if ( !empty($_POST['ingreso']) )  { 
	//Se consiguen las variables de busqueda y paginacion
	$location ='chat_videochat.php';
	$location .='?room='.$_GET['room'];
	$location .='&r='.$_GET['r'];
	$location .='&name='.$_GET['name'];
	
	//Manejo del formulario
	if ( !empty($_POST['alias']) )            $alias            = $_POST['alias'];
	//Valida el ingreso del alias
	if ( empty($alias) )      $errors[1] 	  = '<h5>no ha ingresado un alias</h5>';
	//si no hay errores ejecuto instrucciones
	if ( !isset($errors[1]) && !isset($errors[2])  ) {
	
		//Verifico si el usuario existe
		$usr_nombre = $_COOKIE['sess_demo_name'];
		$usr_avatar = $_COOKIE['sess_demo_avatar'];
		$usr_email  = $_COOKIE['sess_demo_correo'];
		$nick = $alias;
		//consulta
		$query = "SELECT rol
		FROM `user_listado`
		WHERE Nombre='{$usr_nombre}' ";
		$resultado = mysql_query ($query, $dbCasting);
		$row_data = mysql_fetch_assoc ($resultado);
		$row_number = mysql_num_rows ($resultado);
		
		if($row_number!=0&&$row_number!=''){
			// Actualizo los datos del usuario ingresado
			$query  = "UPDATE `user_listado` SET email='".$usr_email."',url_img='".$usr_avatar."', nick = '".$nick."' WHERE Nombre = '".$usr_nombre."'";
			$result = mysql_query($query, $dbCasting);
		}else{
			//Defino las variables
			$usr_rol=1;
			
				//Ingreso nombre
				if(isset($usr_nombre) && $usr_nombre != ''){ 
					$a = "'".$usr_nombre."'" ;
				}else{
					$a = "''";
				}
				//Ingreso del email
				if(isset($usr_email) && $usr_email != ''){ 
					$a .= ",'".$usr_email."'" ;
				}else{
					$a .= ",''";
				}
				//Ingreso de la imagen
				if(isset($usr_avatar) && $usr_avatar != ''){ 
					$a .= ",'".$usr_avatar."'" ;
				}else{
					$a .= ",''";
				}
				//Ingreso del nick
				if(isset($nick) && $nick != ''){ 
					$a .= ",'".$nick."'" ;
				}else{
					$a .= ",''";
				}
				//Ingreso del rol
				if(isset($usr_rol) && $usr_rol != ''){ 
					$a .= ",'".$usr_rol."'" ;
				}else{
					$a .= ",''";
				}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `user_listado` (Nombre, email, url_img, nick, rol) VALUES ({$a} )";
				$result = mysql_query($query, $dbCasting);	
		}
	
	
		header( 'Location: '.$location );
		die;
	
	}
	
	
}        
?>
<body>
<?php
//Menu superior   
require_once('inc/menu_cintillo.php'); 
?>	
	<section class="wrapper row-fluid">
    		<div class="cont_wrapper">
            	<?php //Menu y login 
        			require_once('inc/menu_nav_login.php');?>
                <div class="wrapper_b">
                	  <div class="body_ca bchat_live">
                	<div class="bloq_news">
                    	<div class="span16">
     

<?php if(isset($_COOKIE['sess_demo'])){ ?>

    <form method="post">     
    <div class="datos_cast">
        <div class="prf_cast">
            <div class="span8">
            <figcaption>
                <img src="<?php echo $_COOKIE['sess_demo_avatar']; ?>">                                            
                <span><a target="new" href="http://peruid.pe/"> Editar mi perfil</a></span>
            </figcaption>
                                                                
            </div>
            <div class="span16">
                <h3><?php echo $_COOKIE['sess_demo_name']; ?></h3>
                <h4><?php echo $_COOKIE['sess_demo_apellidos']; ?></h4>
                <h5>Ingresa tu Alias</h5>
                <input name="alias" type="text" required> 
                <?php  if (isset($errors[1])) {echo $errors[1];}?> 
            </div>
        </div>
        <div class="btn_login_usr"><input  name="ingreso" type="submit" value="ENTRAR AL VIDEO CHAT"></div>
    </div>
    </form> 			 
             
<?php }else{ ?>
	
    <h1 class="msg_h1">Inicia Sesion Primero</h1>	                   

<?php } ?>
                                             
                                        
                                        
                        	
                        </div>
                        <aside class="span8">
                            <?php 
								//Video chat  
        						require_once('inc/publicidad_sorteo.php'); 
								//Video chat  
        						require_once('inc/video_chat.php'); 
								//Publicidad
								require_once('inc/publicidad_derecha.php');
								?>  
                        </aside>
                    </div>
                </div>
                </div>
				<?php  //Footer
                require_once('inc/footer.php');         
                ?>
            </div>
    </section>
</body>
</html>