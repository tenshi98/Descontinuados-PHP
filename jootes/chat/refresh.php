

<?php
//llamo a las funciones
require_once('funciones.php');
//conecto con la base de datos
$con = mysql_connect("localhost","root","petland");
if (!$con)
  {
  die('Error en la coneccion: ' . mysql_error());
  }

mysql_select_db("jootes", $con);

$result = mysql_query("SELECT
chat.msg AS mensaje,
chat.timestamp AS hora,
usuarios.nombre AS nombre,
chat.user_id,
imagenes.imagen AS imagen_perfil

FROM chat 
LEFT JOIN ejecutivos   ON ejecutivos.id_ejecutiv   =  chat.user_id
LEFT JOIN usuarios     ON usuarios.username        =  ejecutivos.login
LEFT JOIN imagenes     ON imagenes.usuario         =  ejecutivos.login

WHERE chat.room = '".$_GET['nroom']."'
ORDER BY chat.id DESC");


  
while($row = mysql_fetch_array($result)){?>
<?php if($row['user_id']!=$_GET['idusuario']){ ?>



 
  
  <div class="chatbox fleft color_left">
    <div class="picture fleft">
      <?php if($row['imagen_perfil']==''){ ?>
      <img src="img/usr.png"  />
      <?php } else {?>
      <img src="<?php echo $row['imagen_perfil']; ?>"  />
      <?php } ?>
    </div>
    <div class="text fleft">
      <div class="tittle">
        <div class="name"><p><?php echo $row['nombre']; ?></p></div>
        <div class="date"><p><?php echo $row['hora']; ?></p></div>
        <div class="clear"></div>
      </div>
      <div class="body_text">
        <p><?php echo expresiones($row['mensaje']);?></p>
      </div> 
    </div>
    <div class="clear"></div> 
  </div>
  
  
  <?php } else {?>
<div class="chatbox fright color_right">
    <div class="picture fleft">
      <?php if($row['imagen_perfil']==''){ ?>
      <img src="img/usr.png"  />
      <?php } else {?>
      <img src="<?php echo $row['imagen_perfil']; ?>"  />
      <?php } ?>
    </div>
    <div class="text fleft">
      <div class="tittle">
        <div class="name"><p><?php echo $row['nombre']; ?></p></div>
        <div class="date"><p><?php echo $row['hora']; ?></p></div>
        <div class="clear"></div>
      </div>
      <div class="body_text">
        <p><?php echo expresiones($row['mensaje']);?></p>
      </div> 
    </div>
    <div class="clear"></div> 
  </div>
  
  
  <?php } 
  
  
   }
mysql_close($con);
?>













