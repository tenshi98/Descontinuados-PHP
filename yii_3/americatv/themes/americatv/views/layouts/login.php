<!doctype html>
<!--[if lt IE 7] <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]--><!--[if IE 7] <html class="no-js lt-ie9 lt-ie8"> <![endif]--><!--[if IE 8] <html class="no-js lt-ie9"> <![endif]--><!--[if gt IE 8]><!-->
<html class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="es">
<!--<![endif]-->
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/style.css" rel="stylesheet" type="text/css">
		<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/mediaquerie.css" rel="stylesheet" type="text/css">
		<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/normalize.css" rel="stylesheet" type="text/css">
		<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/registro.css" rel="stylesheet" type="text/css">
		<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/nph.css" rel="stylesheet" type="text/css">

		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/modernizr-1.7.min.js"></script>
		
		<!--  PLUGIN PERUID  -->
		<script type="text/javascript" src="http://peruid.pe/f/scripts/peruid-1.1.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/peruid.pid-2.0.js"></script>
		<script type="text/javascript">
			var tag_last = 0;

			var site;
			$(document).ready(function(){
				/*------------PUGLIN PERUID----------*/
				site = new Site({
					ecoid_path:{
					base:'http://peruid.pe/',
					receiver:'<?php echo Yii::app()->theme->baseUrl;?>/ext/receiver.php',
					portal:'9702824bf1059d44f8a879e070b5b57c',
					proxy:'<?php echo Yii::app()->theme->baseUrl;?>/ext/proxy_peruid.html'
					}
				});
				/*-------FIN PUGLIN PERUID-----------*/
			});

		</script>


		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	</head>
	<body>
		<section class="wrapper row-fluid">
			<div class="cont_wrapper">	
			
				<div class="cont_registro">
					<div class="header_registro">
						<a href=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/img/logo_ca.png"/></a>
					</div>
					<div class="body_registro">
						<?php echo $content; ?>	
					</div>
				</div>
			</div>
		</section>
	</body>
</html>