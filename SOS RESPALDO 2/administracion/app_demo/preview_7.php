<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';

// obtengo puntero de conexion con la db
$dbConn = conectar();

// Se traen todos los datos 
$query = "SELECT 
background_color, 
form_color
FROM `app_ajustes_generales`
WHERE id = {$_GET['app_conf']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>test</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/estilo.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="<?php echo $rowdata['background_color'] ?>">
  
<div class="form <?php echo $rowdata['form_color'] ?>">


  <form>
  <h1>input normales</h1>
  <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      <input type="text"      placeholder="text" /></div>
  <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      <input type="password"  placeholder="password" /></div>
  <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      <input type="email"     placeholder="email" /></div>  
  <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      <input type="tel"       placeholder="tel" /></div> 
  <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      <input type="url"       placeholder="url" /></div>
  <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      
  <select>
      <option value="volvo">Volvo</option>
      <option value="saab">Saab</option>
      <option value="mercedes">Mercedes</option>
      <option value="audi">Audi</option>
    </select> </div>
  <textarea>At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.</textarea> 
    
  <h1>Otros</h1>
  <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      <input type="date"       placeholder="date" /></div>
  <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      <input type="month"      placeholder="month" /></div>
  <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      <input type="number"     placeholder="number" /></div>
  <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      <input type="time"       placeholder="time" /></div>
  <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      <input type="week"       placeholder="week" /></div>
  
  
  
  <h1>botones o similares</h1>
  
  
<div class="switch_content">
  <input type="range"      placeholder="range" />
</div>
  
  <div>
    <input type="radio" value="None" id="male" name="gender" checked/>  <label for="male" class="radio" chec>Male</label>
    <input type="radio" value="None" id="female" name="gender" />       <label for="female" class="radio">Female</label>
  </div> 
  
  <div class="switch_content">
      <label  class="fleft">Male</label>
      
      <div class="fright">
          <div class="onoffswitch">
            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
            <label class="onoffswitch-label" for="myonoffswitch">
            <span class="onoffswitch-inner"></span>
            <span class="onoffswitch-switch"></span>
            </label>
          </div> 
      </div>
      <div class="clear"></div>
  </div>

	<input type="submit"   value="Aceptar"   >
   
  </form>
</div>


</body>
</html>