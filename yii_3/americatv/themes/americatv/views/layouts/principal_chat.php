<!doctype html>
 <!--[if lt IE 7] <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]--><!--[if IE 7] <html class="no-js lt-ie9 lt-ie8"> <![endif]--><!--[if IE 8] <html class="no-js lt-ie9"> <![endif]--><!--[if gt IE 8]><!-->
<html class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="es"><!--<![endif]-->
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/style.css" rel="stylesheet" type="text/css">
		<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/mediaquerie.css" rel="stylesheet" type="text/css">
		<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/normalize.css" rel="stylesheet" type="text/css">
		<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/style_barra.css" rel="stylesheet" type="text/css">
		<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/nph.css" rel="stylesheet" type="text/css">
		<?php if(!Yii::app()->user->isGuest){?>
		<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/smq1ndp.css" rel="stylesheet" type="text/css">
		<?php } ?>
		
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/modernizr-1.7.min.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.js"></script>
				
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	</head>

	<body>
	<section class="cont_cintillo">
		<section class="md_bar_content box-fluid md_bar_b960">
			<ul class="md_bar_sideA box-fluid">
				<li class="box-fluid md_bar_amtelevision"><a href="http://americatv.com.pe/?ref=hbare" class="box-fluid  ">Entretenimiento<i class="box-fluid"></i></a></li>
				<li class="box-fluid md_bar_amnoticias"><a href="http://americanoticias.pe/?ref=hbarn" class="box-fluid">Noticias<i class="box-fluid"></i></a></li>
				<li class="box-fluid md_bar_amdeportes"><a href="http://americadeportes.pe/?ref=hbard" class="box-fluid">Deportes<i class="box-fluid"></i></a></li>
				<li class="box-fluid md_bar_amtvgo bx_tooltip"><a href="http://tvgo.americatv.com.pe/?ref=hbarv" class="box-fluid">VIVO</a>
					<div style="display: none" class="tooltip tt_tvgo actual_vivo"><span class="ico_tooltip"></span>
						<div class="live_tooltip"><a href="http://tvgo.americatv.com.pe/"><img src="http://d1ud0vv1ppryfo.cloudfront.net/f/img/tvgo_tv.png" original="http://d1ud0vv1ppryfo.cloudfront.net/f/img/tvgo_tv.png"></a>
							<div class="hour_tooltip">16:30 h</div>
							<div class="box_tool_hi">
								<p>El color de la pasión</p>
							</div>
						</div>
					</div>
				</li>
			</ul>
			<div class="md_bar_sideB box-fluid">
				<ul class="md_bar_subbar">
					<li class="box-fluid search_n">
						<div id="navigation-bar">
							<form id="searchC" method="post" action="http://www.americatv.com.pe/busca" class="sb-search">
								<input type="search" name="buscar" placeholder="Buscar..." class="sb-search-input">
								<input type="submit" class="sb-search-submit"><span style="display:block" class="sb-icon-search icon_bar icon_busqueda"></span>
							</form>
						</div>
					</li>
					<li style="display:none" class="box-fluid"><a href="#" class="mail icon_bar icon_mail">mail</a></li>
				</ul>
			</div>
			<div class="border_amt"></div>
			  
		</section>
	</section>
	<section class="wrapper row-fluid">
		<div class="cont_wrapper">
			<header>
				<div class="cont_logo_redes">
					<div class="logo_ca">
						<h1>
							<a href=""><img title="Club America" src="<?php echo Yii::app()->theme->baseUrl;?>/img/logo_ca.png"> </a>
						</h1>
					</div>
					<ul>
						<li class="fb_ca"><a href=""></a></li>
						<li class="tw_ca"><a href=""></a></li>
						<li class="gplus_ca"><a href=""></a></li>
					</ul>
				</div>
				<nav>
					<?php $this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'INICIO', 'url'=>array('/inicio/index')),
							array('label'=>'VIDEO CASTING', 'url'=>array('/videoCasting/index')),
							array('label'=>'VIDEO CHAT', 'url'=>array('/videoChat/index')),
							array('label'=>'PARTICIPA', 'url'=>array('/participa/index')),
							array('label'=>'MÚSICA', 'url'=>array('/musica/index')),
							array('label'=>'SALUDOS VIRTUALES', 'url'=>array('/saludosVirtuales/index'))
						),
					)); ?>
				<h4>
				<?php 
				$this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'Iniciar Sesion', 'url'=>array('/login/login'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Cerrar Sesion ('.Yii::app()->user->getName().')', 'url'=>array('/login/logout'), 'visible'=>!Yii::app()->user->isGuest)
						),
				)); ?>
				</h4>
				</nav>
			</header>
			<div class="wrapper_b">
				<?php echo $content; ?>	
			</div>
			<script type="text/javascript"  src="<?php echo Yii::app()->theme->baseUrl;?>/js/Muaz_Khan.js"></script>
			<footer class=" wrapper_footer">
				<section class="top_footer_ae  ">
					<div class="row-fluid">
						<div class="span5 nn_footer  ">
							<h5>RED AMÉRICA</h5>
							<ul>
								<li><a href="http://www.americatv.com.pe">Entretenimiento</a></li>
								<li><a href="http://www.americatv.com.pe/noticias">Noticias</a></li>
								<li><a href="http://www.americatv.com.pe/deportes">Deportes</a></li>
								<li><a href="http://tvgo.americatv.com.pe/">EN VIVO</a></li>
							</ul>
						</div>
						<div class="span6 nn_footer movil_foo ">
							<h5>AMÉRICA EN VIVO</h5>
							<span class="tvgo_url_f">
								<img src="img/tvgo_footer.png" alt="">
							</span>
							<ul>
								<li><a href="javascript: void(0);" class="s_f inactive">Smartphones</a></li>
								<li><a href="http://tvgo.americatv.com.pe/" class="d_f">Desktop PC/MAC</a></li>
								<li><a href="javascript: void(0);" class="s_f inactive">Tablets</a></li>
							</ul>
						</div>
						<div class="span7 nn_footer two_foo footer_text">
							<h5>CONTÁCTANOS</h5>
							<ul>
								<li><a href="http://www.comercial.americatv.com.pe/">Comercial</a></li>
								<li><a href="http://americatv.trabajando.pe/">Trabaja con nosotros</a></li>
								<li><a href="mailto:web@americatv.com.pe">Contáctanos</a></li>
								<li><a href="http://peruid.pe/index.php/terminos_condiciones">Políticas de Privacidad</a></li>
							</ul>
						</div>
						<div class="span6 nn_footer suscri_foo">
							<form method="post" action="http://www.americatv.com.pe/busca" class="form-footer">
								<input type="search" name="buscar" class="input-footer">
								<input type="submit" class="submit-footer">
							</form>
							<ul>
								<li class="fb_f"><a href="https://www.facebook.com/americatelevision" target="_blank"></a></li>
								<li class="tw_f"><a href="https://twitter.com/americatv_peru" target="_blank"></a></li>
								<li class="gp_f"><a href="https://plus.google.com/u/0/+americatv/posts" target="_blank"></a></li>
							</ul>
						</div>
					</div>
				</section>
				<section class="bottom_ae box-block">
					  
					<div class="row-fluid">
						<div class="span24">
							<ul>
								<li class="tv_ae">
									<a href="http://www.americatv.com.pe">
										<span></span>
									</a>
								</li>
								<li class="tv_an">
									<a href="http://www.americatv.com.pe/noticias" target="_blank">
										<span></span>
									</a>
								</li>
								<li class="tv_ad">
									<a href="http://www.americatv.com.pe/deportes" target="_blank">
										<span></span>
									</a>
								</li>
								<li class="tv_go">
									<a href="http://tvgo.americatv.com.pe/" target="_blank">
										<span></span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="row-fluid">
						<div class="copy_r">
							<p>*Copyright © 2007 Compañía Peruana de Radiodifusión</p>
							<p>Montero Rosas 1099 - Santa Beatriz  Tlf. 419 4000</p>
						</div>
					</div>
				</section>
			</footer>
		</div>
	</section>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/firebase.js"> </script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/RTCPeerConnection-v1.6.js"> </script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/hangout.js"> </script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/hangout-ui.js"> </script>
	</body>
</html>