<?php
//Titulo de la pagina
$this->pageTitle=Yii::app()->name . ' - Login';
?>

<div class="suscrib">
	<h3>Suscríbete utilizando tu cuenta de:</h3>
	<ul>
		<li><a href=""></a></li>
		<li class="tw_r"><a href=""></a></li>
		<li class="gplus_r marg_r0"><a href=""></a></li>
	</ul>
	<h3>o con tu dirección de e-mail</h3>
	
	<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	)); ?>
	
		<div class="cont_form">
			
			<div class="item_form">
				<?php echo $form->textField($model, 'username', array('placeholder' => 'Usuario o correo electrónico',));?>
				<?php echo $form->error($model,'username'); ?>
			</div>
			<div class="item_form">
				<?php echo $form->passwordField($model,'password', array('placeholder' => 'Contraseña',)); ?>
				<?php echo $form->error($model,'password'); ?>
			</div>
			<div class="cont_btn_r">
				<?php echo CHtml::submitButton('Login', array('value' => 'INGRESAR',)); ?>
			</div> 
			
			<div class="mensaje_club ">
			¿Aún no eres parte del club? <a href="">Regístrate</a>
			<h4><a href="">Olvidé mi contraseña</a></h4>
			</div>  
			
			<div class="term_cond">
			Al registrarte, aceptarás sus <a href="#">Términos y Condiciones</a> y la <a href="#">Política de Privacidad</a>
			</div>
			
		</div>
	
	<?php $this->endWidget(); ?>
</div>



