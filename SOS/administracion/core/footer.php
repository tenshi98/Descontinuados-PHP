<footer id="footer">
<?php if (isset($arrUsuario['RazonSocial'])&&$arrUsuario['RazonSocial']!=''){?>
   	<p>2014 &copy; <?php echo $arrUsuario['RazonSocial']; ?>. Todos los derechos reservados.</p>
<?php }else{?>
	<p>Todos los derechos reservados.</p>
<?php } ?>    
</footer>