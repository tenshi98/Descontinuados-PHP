<?php
    error_reporting(E_ALL ^ E_WARNING);
    $configpe = dirname(__FILE__) . DIRECTORY_SEPARATOR . "../lib_pagoefectivo/code/configpe.php";
    require_once($configpe);
    $msj_warning="";$count_warning=0; $msj_error="";$count_error=0;
    ++$count_warning; $msj_warning .="<li>Recuerde que este archivo no se debe pasar al ambiente de producción por razones de seguridad.</li>";
    if (!version_compare(PHP_VERSION, '5.2.0', '>=')) {
         ++$count_warning; $msj_warning .="<li>Pago efectivo es compatible con PHP 5.2 o superior, usted tiene la versión " . PHP_VERSION . "</li>";
    }
    if (!extension_loaded('openssl')) {
         ++$count_warning; $msj_warning .="<li>Debe habilitar la extensión openssl en su archivo php.ini.</li>";
    }
    if (!extension_loaded('soap')) {
         ++$count_warning; $msj_warning .="<li>Debe habilitar la extensión soap en su archivo php.ini.</li>";
    }
    /*if(file_get_contents(PE_WSCIP) === false){
         ++$count_warning; $msj_warning .="<li>Debe configurar su IP pública (" . $_SERVER['REMOTE_ADDR'] . ") para tener acceso a los Web Services de Pago Efectivo.</li>";
    }*/

    if(count($_POST)>0){
        $MERCHAND_ID = sanitize($_POST['MERCHAND_ID']);
        $SERVER = sanitize($_POST['SERVER']);
        $MOD_INTEGRACION = sanitize($_POST['MOD_INTEGRACION']);
        $COMERCIO_CONCEPTO_PAGO = sanitize($_POST['COMERCIO_CONCEPTO_PAGO']);
        $EMAIL_PORTAL = sanitize($_POST['EMAIL_PORTAL']);
        $TIEMPO_EXPIRACION = sanitize($_POST['TIEMPO_EXPIRACION']);

        if (!$MERCHAND_ID || empty($MERCHAND_ID)){ //
            ++$count_error; $msj_error .="<li>Indique el código del comercio</li>";
        }
        
        if (!$SERVER || empty($SERVER)){
            ++$count_error; $msj_error .="<li>Indique la url de pago efectivo</li>";
        }
        if (!isset($_FILES['LLAVE_PUBLICA']) || !isset($_FILES['LLAVE_PUBLICA']['tmp_name']) || empty($_FILES['LLAVE_PUBLICA']['tmp_name'])){
            ++$count_error; $msj_error .="<li>Cargue la llave pública</li>";
        }
        if (!isset($_FILES['LLAVE_PRIVADA']) || !isset($_FILES['LLAVE_PRIVADA']['tmp_name']) || empty($_FILES['LLAVE_PRIVADA']['tmp_name'])){
            ++$count_error; $msj_error .="<li>Cargue la llave privada</li>";
        }
        if (!$MOD_INTEGRACION || empty($MOD_INTEGRACION)){
            ++$count_error; $msj_error .="<li>Indique el modo de integración</li>";
        }
        if (!$COMERCIO_CONCEPTO_PAGO || empty($COMERCIO_CONCEPTO_PAGO)){
            ++$count_error; $msj_error .="<li>Indique el nombre del comercio</li>";
        }
        if (!$EMAIL_PORTAL || empty($EMAIL_PORTAL)){
            ++$count_error; $msj_error .="<li>Indique el email del comercio</li>";
        }
        if (!$TIEMPO_EXPIRACION || empty($TIEMPO_EXPIRACION)){
            ++$count_error; $msj_error .="<li>Indique el tiempo de expiración del pago</li>";
        }

        if($count_error==0)
        {
            $configpe = dirname(__FILE__) . DIRECTORY_SEPARATOR . "../lib_pagoefectivo/code/configpe.php";
            require_once($configpe);
            if (!file_exists(PE_SECURITY_PATH)) { deleteDir(PE_SECURITY_PATH); }
            $SECURITY_PATH = setKeyPath(PE_SECURITY_PRIMARY_PATH,$MERCHAND_ID);
            if (!file_exists($SECURITY_PATH)) {
                if (!mkdir($SECURITY_PATH, 0777, true)) {
                    die('Failed to create folders...');
                }
            }
            if ($error = validateKeyUpload($_FILES['LLAVE_PUBLICA'], 4000))
                return $error;
    		else
    		{
  				$ext = substr($_FILES['LLAVE_PUBLICA']['name'], strrpos($_FILES['LLAVE_PUBLICA']['name'], '.') + 1);
//  				$file_public = md5($_FILES['LLAVE_PUBLICA']['name']).'.'.$ext;
   				$file_public = $_FILES['LLAVE_PUBLICA']['name'].'.'.$ext;

  				if (!move_uploaded_file($_FILES['LLAVE_PUBLICA']['tmp_name'], $SECURITY_PATH.$file_public))
  					return 'Ocurrió un error mientras se cargaba el archivo: ' . $_FILES['LLAVE_PUBLICA']['name'];
    		}
            if ($error = validateKeyUpload($_FILES['LLAVE_PRIVADA'], 4000))
  		        return $error;
    		else
    		{
  				$ext = substr($_FILES['LLAVE_PRIVADA']['name'], strrpos($_FILES['LLAVE_PRIVADA']['name'], '.') + 1);
  				$file_private = md5($_FILES['LLAVE_PRIVADA']['name']).'.'.$ext;

  				if (!move_uploaded_file($_FILES['LLAVE_PRIVADA']['tmp_name'], $SECURITY_PATH.$file_private))
  					return 'Ocurrió un error mientras se cargaba el archivo: ' . $_FILES['LLAVE_PRIVADA']['name'];
		    }

            //Escribe los datos en el archivo de configuración
/*            $URL_NOTIFICACION = setNotificationPath(DOMINIO_COMERCIO, $MERCHAND_ID,$CCLAVE) . "notificacion.php";
            $PATH_NOTIFICACION = setNotificationPath(SECURITY_PRIMARY_PATH,$MERCHAND_ID,$CCLAVE);
            if (!file_exists($PATH_NOTIFICACION)) {
                if (!mkdir($PATH_NOTIFICACION, 0777, true)) {
                    die('Failed to create folders...');
                }
            }
            if (!rename(PATH_NOTIFICACION . "notificacion.php", $PATH_NOTIFICACION . "notificacion.php"))
     	        die('Ocurrió un error mientras se cargaba el archivo: notificacion.php');
*/
            $sLineas = file($configpe);$index=0;
            foreach ($sLineas as $sLinea)
            {
                if(strrpos($sLinea,"efine('PE_MERCHAND_ID'")>0){ $sLineas[$index] = "define('PE_MERCHAND_ID', '" . $MERCHAND_ID . "');\n"; }
                else if(strrpos($sLinea,"efine('PE_SERVER'")>0){ $sLineas[$index] = "define('PE_SERVER', '" . $SERVER . "');\n"; }
                else if(strrpos($sLinea,"efine('PE_PUBLICKEY'")>0){ $sLineas[$index] = "define('PE_PUBLICKEY', '" . $file_public . "');\n"; }
                else if(strrpos($sLinea,"efine('PE_PRIVATEKEY'")>0){ $sLineas[$index] = "define('PE_PRIVATEKEY', '" . $file_private . "');\n"; }
                else if(strrpos($sLinea,"efine('PE_MOD_INTEGRACION'")>0){ $sLineas[$index] = "define('PE_MOD_INTEGRACION', '" . $MOD_INTEGRACION . "');\n"; }
                else if(strrpos($sLinea,"efine('PE_COMERCIO_CONCEPTO_PAGO'")>0){ $sLineas[$index] = "define('PE_COMERCIO_CONCEPTO_PAGO', '" . $COMERCIO_CONCEPTO_PAGO . "');\n"; }
                else if(strrpos($sLinea,"efine('PE_EMAIL_PORTAL'")>0){ $sLineas[$index] = "define('PE_EMAIL_PORTAL', '" . $EMAIL_PORTAL . "');\n"; }
                else if(strrpos($sLinea,"efine('PE_TIEMPO_EXPIRACION'")>0){ $sLineas[$index] = "define('PE_TIEMPO_EXPIRACION', '" . $TIEMPO_EXPIRACION . "');\n"; }
                else if(strrpos($sLinea,"efine('PE_SECURITY_PATH'")>0){ $sLineas[$index] = "define('PE_SECURITY_PATH', '" . $SECURITY_PATH . "');\n"; }
                ++$index;
            }
            file_put_contents($configpe, $sLineas);
        }
        else
        {
             $msj_error = "<h4>Hay " . $count_error . " error(es):</h4><ul>" . $msj_error . "</ul>";
        }
    }
    function validateKeyUpload($file, $max_file_size = 0)
    {
    		if ((int)$max_file_size > 0 && $file['size'] > $max_file_size)
    			return sprintf(
    				'El archivo pesa demasiado (%1$d kB). Máximo permitido: %2$d kB',
    				$file['size'] / 1000,
    				$max_file_size / 1000
    			);
    		if (substr($file['name'], -4) != '.1pz')
    			return 'Formato del archivo no reconocido, formato permitido: .1pz';
    		if ($file['error'])
    			return 'Error mientras se cargaba el archivo, por favor revise la configuración de su servidor.';
    		return false;
    }
    function sanitize($string)
    {
        $invalid_characters = array("$", "%", "#", "<", ">", "|");
        return str_replace($invalid_characters, "", $string);
    }
    function deleteDir($dir)
    {
       if (substr($dir, strlen($dir)-1, 1) != '/')
           $dir .= '/';

       if ($handle = opendir($dir))
       {
           while ($obj = readdir($handle))
           {
               if ($obj != '.' && $obj != '..')
               {
                   if (is_dir($dir.$obj))
                   {
                       if (!deleteDir($dir.$obj))
                           return false;
                   }
                   elseif (is_file($dir.$obj))
                   {
                       if (!unlink($dir.$obj))
                           return false;
                   }
               }
           }

           closedir($handle);

           if (!@rmdir($dir))
               return false;
           return true;
       }
       return false;
    }
    function getKeyPath()
    {
        $configpe = dirname(__FILE__) . DIRECTORY_SEPARATOR . "../lib_pagoefectivo/code/configpe.php";
        require_once($configpe);
        return PE_SECURITY_PATH;
    }
    function makeSecurityPath($MERCHAND_ID)
    {
        $configpe = dirname(__FILE__) . DIRECTORY_SEPARATOR . "../lib_pagoefectivo/code/configpe.php";
        require_once($configpe);
        return $MERCHAND_ID;
    }
    function setKeyPath($ROOT,$MERCHAND_ID)
    {
        return ($ROOT . makeSecurityPath($MERCHAND_ID) . "/keys/");
    }
    function setNotificationPath($ROOT,$MERCHAND_ID)
    {
        return ($ROOT . makeSecurityPath($MERCHAND_ID) . "/notificacion/");
    }

?>
<?php include("../demo/MasterPage.php") ?>
<!-- CONTENIDO -->
  <div class="bootstrap pspagoefectivo">
      <div class="page-head">
          <ul class="breadcrumb page-breadcrumb">
              <li class="breadcrumb-current">
                  <i class="icon-AdminParentModules"></i>
              </li>
          </ul>
          <h2 class="page-title">
              Configurar "Pasarela Pago Efectivo"
          </h2>

      </div>
  </div>
  <div class="bootstrap pspagoefectivo">
    <?php if($count_warning > 0){
        echo '<div id="div_warning" class="alert alert-warning">
        		<button type="button" class="close" data-dismiss="alert" onclick="$(\'#div_warning\').hide();">×</button>
        		<h4>Hay ' . $count_warning . ' alerta(s):</h4>
  				<ul>' . $msj_warning . '</ul>
        	</div>';
        }
    ?>
    <?php if($count_error == 0 && count($_POST)>0){
        echo '<div id="div_success" class="module_confirmation conf confirm alert alert-success">
        	<button type="button" class="close" data-dismiss="alert" onclick="$(\'#div_success\').hide();">×</button>
        	Configuración actualizada
        </div>';}
      else if($count_error > 0 && count($_POST)>0){
        echo '<div id="div_danger" class="module_error alert alert-danger">
        	<button type="button" class="close" data-dismiss="alert" onclick="$(\'#div_danger\').hide();">×</button>' .
            $msj_error . '
        </div>';} ?>
  </div>
  <form id="module_form" class="defaultForm pspagoefectivo form-horizontal" action="configurador.php?submit=1" method="post" enctype="multipart/form-data" novalidate="">
  <input type="hidden" name="submitpspagoefectivo" value="1">

  <div class="panel" id="fieldset_0">

  <div class="panel-heading">
      <i class="icon-cogs"></i>							CONFIGURACIÓN: PAGO EFECTIVO
  </div>

  <div class="form-group">
      <label for="MERCHAND_ID" class="control-label col-lg-3 required">
          Merchand ID
      </label>
      <div class="col-lg-9 ">
          <input type="text" name="MERCHAND_ID" id="MERCHAND_ID" value="<?php echo PE_MERCHAND_ID; ?>" class="" size="3" maxlength="3" required="required">
          <p class="help-block">
              Código de 3 caracteres que identifica al comercio.
          </p>
      </div>
  </div>
  <div class="form-group">
      <label for="SERVER" class="control-label col-lg-3 required">
          Servidor Pago Efectivo
      </label>
      <div class="col-lg-9 ">
          <input type="text" name="SERVER" id="SERVER" value="<?php echo PE_SERVER; ?>" class="" size="50" required="required">
          <p class="help-block">
              Url del servidor de Pago Efectivo (testing / producción).
          </p>
      </div>
  </div>
  <div class="form-group">
      <label for="LLAVE_PUBLICA" class="control-label col-lg-3 required">
          Llave Pública
      </label>
      <div class="col-lg-9 ">
          <div class="form-group">
              <div class="col-sm-6">
                  <input id="LLAVE_PUBLICA" type="file" name="LLAVE_PUBLICA" class="hide">
                  <div class="dummyfile input-group">
                      <span class="input-group-addon"><i class="icon-file"></i></span>
                      <input id="LLAVE_PUBLICA-name" type="text" name="filename" readonly="" style="width: 400px;">
  			<span class="input-group-btn">
  				<button id="LLAVE_PUBLICA-selectbutton" type="button" name="submitAddAttachments" class="btn btn-default">
                      <i class="icon-folder-open"></i> Subir Archivo				</button>
  							</span>
                  </div>
              </div>
          </div>
          <script type="text/javascript">
              $(document).ready(function(){
                  $('#LLAVE_PUBLICA-selectbutton').click(function(e) {
                      $('#LLAVE_PUBLICA').trigger('click');
                  });

                  $('#LLAVE_PUBLICA-name').click(function(e) {
                      $('#LLAVE_PUBLICA').trigger('click');
                  });

                  $('#LLAVE_PUBLICA-name').on('dragenter', function(e) {
                      e.stopPropagation();
                      e.preventDefault();
                  });

                  $('#LLAVE_PUBLICA-name').on('dragover', function(e) {
                      e.stopPropagation();
                      e.preventDefault();
                  });

                  $('#LLAVE_PUBLICA-name').on('drop', function(e) {
                      e.preventDefault();
                      var files = e.originalEvent.dataTransfer.files;
                      $('#LLAVE_PUBLICA')[0].files = files;
                      $(this).val(files[0].name);
                  });

                  $('#LLAVE_PUBLICA').change(function(e) {
                      if ($(this)[0].files !== undefined)
                      {
                          var files = $(this)[0].files;
                          var name  = '';

                          $.each(files, function(index, value) {
                              name += value.name+', ';
                          });

                          $('#LLAVE_PUBLICA-name').val(name.slice(0, -2));
                      }
                      else // Internet Explorer 9 Compatibility
                      {
                          var name = $(this).val().split(/[\\/]/);
                          $('#LLAVE_PUBLICA-name').val(name[name.length-1]);
                      }
                  });

                  if (typeof LLAVE_PUBLICA_max_files !== 'undefined')
                  {
                      $('#LLAVE_PUBLICA').closest('form').on('submit', function(e) {
                          if ($('#LLAVE_PUBLICA')[0].files.length > LLAVE_PUBLICA_max_files) {
                              e.preventDefault();
                              alert('You can upload a maximum of  files');
                          }
                      });
                  }
              });
          </script>



          <p class="help-block">
              Carga la llave pública provista por Pago Efectivo.
          </p>

      </div>

  </div>
  <div class="form-group">

      <label for="LLAVE_PRIVADA" class="control-label col-lg-3 required">
          Llave Privada
      </label>



      <div class="col-lg-9 ">

          <div class="form-group">
              <div class="col-sm-6">
                  <input id="LLAVE_PRIVADA" type="file" name="LLAVE_PRIVADA" class="hide">
                  <div class="dummyfile input-group">
                      <span class="input-group-addon"><i class="icon-file"></i></span>
                      <input id="LLAVE_PRIVADA-name" type="text" name="filename" readonly="" style="width: 400px;">
  			<span class="input-group-btn">
  				<button id="LLAVE_PRIVADA-selectbutton" type="button" name="submitAddAttachments" class="btn btn-default">
                      <i class="icon-folder-open"></i> Subir Archivo				</button>
  							</span>
                  </div>
              </div>
          </div>
          <script type="text/javascript">

              $(document).ready(function(){
                  $('#LLAVE_PRIVADA-selectbutton').click(function(e) {
                      $('#LLAVE_PRIVADA').trigger('click');
                  });

                  $('#LLAVE_PRIVADA-name').click(function(e) {
                      $('#LLAVE_PRIVADA').trigger('click');
                  });

                  $('#LLAVE_PRIVADA-name').on('dragenter', function(e) {
                      e.stopPropagation();
                      e.preventDefault();
                  });

                  $('#LLAVE_PRIVADA-name').on('dragover', function(e) {
                      e.stopPropagation();
                      e.preventDefault();
                  });

                  $('#LLAVE_PRIVADA-name').on('drop', function(e) {
                      e.preventDefault();
                      var files = e.originalEvent.dataTransfer.files;
                      $('#LLAVE_PRIVADA')[0].files = files;
                      $(this).val(files[0].name);
                  });

                  $('#LLAVE_PRIVADA').change(function(e) {
                      if ($(this)[0].files !== undefined)
                      {
                          var files = $(this)[0].files;
                          var name  = '';

                          $.each(files, function(index, value) {
                              name += value.name+', ';
                          });

                          $('#LLAVE_PRIVADA-name').val(name.slice(0, -2));
                      }
                      else // Internet Explorer 9 Compatibility
                      {
                          var name = $(this).val().split(/[\\/]/);
                          $('#LLAVE_PRIVADA-name').val(name[name.length-1]);
                      }
                  });

                  if (typeof LLAVE_PRIVADA_max_files !== 'undefined')
                  {
                      $('#LLAVE_PRIVADA').closest('form').on('submit', function(e) {
                          if ($('#LLAVE_PRIVADA')[0].files.length > LLAVE_PRIVADA_max_files) {
                              e.preventDefault();
                              alert('You can upload a maximum of  files');
                          }
                      });
                  }
              });
          </script>



          <p class="help-block">
              Carga la llave privada provista por Pago Efectivo.
          </p>

      </div>

  </div>
  <div class="form-group">

      <label for="MOD_INTEGRACION" class="control-label col-lg-3 required">
          Modo Integración
      </label>
      <div class="col-lg-9 ">

          <select name="MOD_INTEGRACION" class=" fixed-width-xl" id="MOD_INTEGRACION">
              <option value="1" <?php echo (PE_MOD_INTEGRACION=="1"?'selected="selected"':''); ?>>Iframe (Embebido en el portal del comercio)</option>
              <option value="2" <?php echo (PE_MOD_INTEGRACION=="2"?'selected="selected"':''); ?>>Redirección (Abre una nueva ventana)</option>

          </select>


          <p class="help-block">
              Selecciona la modalidad de integración.
          </p>

      </div>

  </div>
<div class="form-group">
	<label for="COMERCIO_CONCEPTO_PAGO" class="control-label col-lg-3 required">
        Nombre Comercio
    </label>
    <div class="col-lg-9 ">
        <input type="text" name="COMERCIO_CONCEPTO_PAGO" id="COMERCIO_CONCEPTO_PAGO" value="<?php echo PE_COMERCIO_CONCEPTO_PAGO; ?>" class="" size="50" required="required">
    	<p class="help-block">
        	Nombre del comercio para el concepto de Pago que acompaña al numero de pedido en el banco.
    	</p>
    </div>
</div>
<div class="form-group">

	<label for="EMAIL_PORTAL" class="control-label col-lg-3 required">
        Email Comercio
    </label>
    <div class="col-lg-9 ">
        <input type="text" name="EMAIL_PORTAL" id="EMAIL_PORTAL" value="<?php echo PE_EMAIL_PORTAL; ?>" class="" size="50" required="required">
    	<p class="help-block">
			Email del comercio para envío de comunicaciones.
    	</p>

    </div>

</div>
<div class="form-group">

	<label for="TIEMPO_EXPIRACION" class="control-label col-lg-3 required">
        Tiempo Expiración
    </label>
    <div class="col-lg-9 ">
        <input type="text" name="TIEMPO_EXPIRACION" id="TIEMPO_EXPIRACION" value="<?php echo PE_TIEMPO_EXPIRACION; ?>" class="" size="50" maxlength="4" required="required">
    	<p class="help-block">
			Tiempo de expiración del pago (horas).
    	</p>
    </div>

</div>
  <div class="panel-footer">
      <button type="submit" value="1" id="module_form_submit_btn" name="submitpspagoefectivo" class="btn btn-default pull-right">
          <i class="process-icon-save"></i> Grabar
      </button>
  </div>
  </div>


  </form>

<?php include("../demo/FooterPage.php") ?>