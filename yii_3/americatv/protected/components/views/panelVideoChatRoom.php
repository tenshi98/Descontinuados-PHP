<div class="salas_chat">
	<h2 class="head_h2">SALAS DE CHAT</h2>
	<ul>
		<li>
			<span class="cont_ft_chat span4">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/img_upl/img2.jpg">
				<span class="online"></span>
			</span>
			<span class="txt_chat span20">Michael: Hola Nikola, veo todos los programas</span>
		</li>
		<li>
			<span class="cont_ft_chat span4">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/img_upl/img2.jpg">
				<span class="online"></span>
			</span>
			<span class="txt_chat span20">Michael: Hola Nikola, veo todos los programas</span>
		</li>
		<li>
			<span class="cont_ft_chat span4">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/img_upl/img2.jpg">
				<span class="online"></span>
			</span>
			<span class="txt_chat span20">Michael: Hola Nikola, veo todos los programas</span>
		</li>
		<li>
			<span class="cont_ft_chat span4">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/img_upl/img2.jpg">
				<span class="online"></span>
			</span>
			<span class="txt_chat span20">Michael: Hola Nikola, veo todos los programas</span>
		</li>
		<li>
			<span class="cont_ft_chat span4">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/img_upl/img2.jpg">
				<span class="online"></span>
			</span>
			<span class="txt_chat span20">Michael: Hola Nikola, veo todos los programas</span>
		</li>
	</ul>
	<?php	
	//identifico el controlador dependiendo de si el usuario esta logueado o no
	if (!Yii::app()->user->isGuest){
        $link1 =  'videoChat/video';
		$link2 =  'videoChat/chat';
    } else {
        $link1 =  'login/login';
		$link2 =  'login/login';		
    }?>
	<div class="cont_btn">
		<?php echo CHtml::link('EMPEZAR EL VIDEO CHAT', array($link1)); ?> 
	</div>
	<div class="cont_btn" style="margin-top:5px;">
		<?php echo CHtml::link('EMPEZAR EL CHAT', array($link2)); ?> 
	</div>
</div>

