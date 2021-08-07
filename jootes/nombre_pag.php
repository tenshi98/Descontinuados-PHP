<?
$urlcorta="www.jootes.cl";
$nombre_corto="Comunidad jOOtes";
$pagina="Jootes - Amistad - Azar - Amor";
$nombreurl="www.jootes.cl";
$nombreurl_liga="www.ligacasino.cl";
//$nombreurl="190.98.210.34/jootes";
$correopagina="informacion@jootes.cl";
$concopia="marcelolopezb@gmail.com";
$cerrarsesion="www.jootes.cl";
$mantener="trans.chilefono.cl/jootes/mantiene/index.php";
$importar="trans.chilefono.cl/jootes/cargar/index.php";
$cerrar="cerrar.click2call.cl/desk2";
$residencia="jootes";
$residencia_completa="/var/www/jootes/";
$valor_apertura="50";
$promociones="umar";
$valor=5000;
$valor_nivel1=0.2;
$valor_nivel2=0.1;
$valor_nivel3=0.05;

// ESTO ES PARA QUE SE ACTUALICEN LOS DATOS CUANDO SE GENERA UNA CAMPAÑA DE CORREOS DESDE MULTIMAIL

   // EXTERNO
  if (!($campana=mysql_connect("190.8.79.210","root","petland"))) //Servidor Usuario Contraseña


   // INTERNO
  // if (!($link=mysql_connect("192.168.1.87","root","petland"))) //Servidor Usuario Contraseña

   {
      echo "Error conectando a la base de datos.";
      exit();
   }
   if (!mysql_select_db("correos_multimail",$campana)) //Nombre de la BD
   {
      echo "Error seleccionando la base de datos.";
      exit();
   }

if ($_GET["id_camp"]<>"") {
$sql="update campana set leido='1',fecha_entro=now() where id_campana=" . $_GET["id_camp"];
$res2=mysql_query($sql,$campana);
}
// ESTO ES PARA QUE SE ACTUALICEN LOS DATOS CUANDO SE GENERA UNA CAMPAÑA DE CORREOS DESDE MULTIMAIL

?>
<script type="text/javascript"><!--
 function closeShadow()
    {
        Shadowbox.close();
    }
// --></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>