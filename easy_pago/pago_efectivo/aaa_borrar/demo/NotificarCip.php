<?php include("../demo/MasterPage.php") ?>
  <div class="bootstrap pspagoefectivo">
      <div class="page-head">
          <ul class="breadcrumb page-breadcrumb">
              <li class="breadcrumb-current">
                  <i class="icon-AdminParentModules"></i>
              </li>
          </ul>
          <h2 class="page-title">
              Notificar Cip
          </h2>

      </div>
  </div>
  <div class="bootstrap pspagoefectivo">
  <div class='pe_pago'>
     <div class='pe_payment'>
	    <form method="post" action="notificacion.php">
	            Par&aacute;metros:<br />
                <br />Data:
                 <input type="text" style="width:800px;" id="data" name="data">
                <br /><br />
	            <input type="submit" id="btnPanel" value="Enviar Par&aacute;metros" name="btnPanel">
	   </form>
</div>
<?php include("../demo/FooterPage.php") ?>