<?php
    /*
    Descripcion:   Archivo que recibe los valores de 2 campos;
            un usuario y un password, los 2 datos se buscan si estan en la
            base de datos y redicciona al login o la pagina principal.
    Archivo:    validarUsuario.php
    */
 
    //conectar BD
    include("conectar_bd.php"); 
    conectar_bd();
     
    $usr = $_POST['usuario'];
    $pw = $_POST['password'];
    //Obtengo la version encriptada del password
    $pw_enc = md5($pw);
     
    $sql = "SELECT * FROM tbl_users
            WHERE tx_username = '".$usr."'
            AND tx_password = '".$pw_enc."' "; 
    $result =mysql_query($sql,$conexio);
 
    $uid = "";
     
    //Si existe al menos una fila
    if( $fila=mysql_fetch_array($result) ) {      
        //Obtener el Id del usuario en la BD       
        $uid = $fila['id_usuario'];
		$tus = $fila['id_TipoUsuario'];
        //Iniciar una sesion de PHP
        session_start();
        //Crear una variable para indicar que se ha autenticado
        $_SESSION['autenticado']    = 'SI';
        //Crear una variable para guardar el ID del usuario para tenerlo siempre disponible
        $_SESSION['uid']            = $uid;
        //CODIGO DE SESION
        // Crear variable Tipo de Usuario
		$_SESSION['tus']            = $tus;
        //Crear un formulario para redireccionar al usuario y enviar oculto su Id
?>
        <form name="formulario" method="post" action="principal.php">
            <input type="hidden" name="idUsr" value='<?php echo $uid ?>' />
			<input type="hidden" name="Usr" value='<?php echo $usr ?>' />
			<input type="hidden" name="Pass" value='<?php echo $pw ?>' />
			<input type="hidden" name="TUsr" value='<?php echo $tus ?>' />
        </form>
<?php
    } else {
        //En caso de que no exista una fila...
        //..Crear un formulario para redireccionar al usuario a la pagina de login
        //enviandole un codigo de error
?>
        <form name="formulario" method="post" action="index.php">
            <input type="hidden" name="msg_error" value="1">
        </form>
<?php
    }
?>
                     
<script type="text/javascript">
    //Redireccionar con el formulario creado
    document.formulario.submit();
</script>