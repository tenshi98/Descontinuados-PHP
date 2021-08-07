<footer id="footer">
<?php if (isset($arrUsuario['RazonSocial'])&&$arrUsuario['RazonSocial']!=''){?>
   	<p><?php echo ano_actual();?> &copy; <?php echo $arrUsuario['RazonSocial']; ?>. Todos los derechos reservados.</p>
<?php }else{?>
	<p><?php echo ano_actual();?> &copy;  Todos los derechos reservados.</p>
<?php } ?>    
</footer>
