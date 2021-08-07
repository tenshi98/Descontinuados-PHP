<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
//cargo la conversacion dentro de un array
$arrChat = array();
$query = "SELECT
chat.msg AS mensaje,
chat.timestamp AS hora,
ejecutivos.nom_ejecutiv AS nombre,
chat.user_id,
ejecutivos.direccion_img AS imagen_perfil
FROM chat 
LEFT JOIN ejecutivos   ON ejecutivos.id_ejecutiv   =  chat.user_id
WHERE chat.room = '".$_GET["nroom"]."'
ORDER BY chat.id DESC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrChat,$row );
}?>
	<?php foreach ($arrChat as $row) { ?>
    <?php if($row['user_id']!=$_GET["idusuario"]){ ?>
    <div class="chatbox fleft color_left">
    <?php } else {?>
    <div class="chatbox fright color_right">
    <?php } ?>
    
       <div class="picture fleft">
        <?php if($row['imagen_perfil']==''){ ?>
            <img src="images/usr.png"  />
        <?php } else {?>
            <img src="<?php echo $row['imagen_perfil']; ?>"  />
        <?php } ?>
         </div>
        <div class="text fleft">
             <p><?php echo $row['nombre']; ?> dijo : <?php echo expresiones($row['mensaje']);?><br/>
                <?php echo $row['hora']; ?></p>
      </div>
      <div class="clear"></div> 
    </div>
    <?php } // cierre del foreach ?>