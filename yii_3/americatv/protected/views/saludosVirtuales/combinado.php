<div class="bloq_news">

	<div class="span16"> 

		<div class="cont_saludos_v box">
			<div class="salud_combinado">
				<h2 class="span12">VIDEO SALUDO COMBINADO</h2>
			</div>
			<div>
			<?php 
			if (!empty($error)) {  
				foreach ($error as $mensaje) {
					echo '<p>'.$mensaje.'</p>';
				} 
			}
			?>
			</div>
			<div class="combina_frases">
				<h3>2. Previsualiza tu saludo</h3>
				<div class="cont_combina_f">
					<div class="span12">

						<?php 
						$this->widget('ext.EjwPlayer.EjwPlayer',array(
							'width' => 590,
							'height' => 430,
							'autostart' => 'false',
							'controls' => 'true',
							'playlist' => array(
								array(
								'image' => Yii::app()->theme->baseUrl.'/img/carga_video.jpg',
								'sources' => array(array('file' => Yii::getPathOfAlias('videos').'/Combinados/'.$final, 'height' => 430),)),
							),
						)); 
						?>

					</div>
				</div>
			</div>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'saludos-form',
				'enableAjaxValidation'=>false,)
				); ?>
			<div class="ingre_destinatarios">
				<h3>3. Ingresa Destinatarios</h3>
				<div class="cont_destinatarios">
					<div class="item_destinatario">
						<div class="span6">Correo destino 1:</div>
						<div class="span18"><?php echo CHtml::textField('correo1', '',array('placeholder'=>'Correo 01')); ?></div>
						<span class="oblig">(Obligatorio)</span>
					</div>
					<div class="item_destinatario">
						<div class="span6">Correo destino 2:</div>
						<div class="span18"><?php echo CHtml::textField('correo2', '',array('placeholder'=>'Correo 02')); ?></div>
					</div>
					<div class="item_destinatario">
						<div class="span6">Correo destino 3:</div>
						<div class="span18"><?php echo CHtml::textField('correo3', '',array('placeholder'=>'Correo 03')); ?></div>
					</div>
					<div class="item_destinatario">
						<div class="span6">Correo destino 4:</div>
						<div class="span18"><?php echo CHtml::textField('correo4', '',array('placeholder'=>'Correo 04')); ?></div>
					</div>
					<div class="item_destinatario">
						<div class="span6">Correo destino 5:</div>
						<div class="span18"><?php echo CHtml::textField('correo5', '',array('placeholder'=>'Correo 05')); ?></div>
					</div>
					<div class="item_destinatario">
						<div class="span6">Asunto:</div>
						<div class="span18"><?php echo CHtml::textField('asunto', '',array('placeholder'=>'Asunto')); ?></div>
					</div>
					<div class="item_destinatario">
						<div class="span6">Mensaje:</div>
						<div class="span18">
						<?php echo CHtml::textArea('mensaje', '',array('placeholder'=>'Escribe aqui tu mensaje')); ?>
						</div>
					</div>
					
					
														
				</div>
				<div class="cont_btn">
					<?php echo CHtml::link('VOLVER', array('saludosVirtuales/saludo','codigo'=>$codigo),array('style'=>'width:50%;')); ?>
					<?php echo CHtml::submitButton('ENVIAR', array('name' => 'enviar')); ?>
				</div>
			</div> 
			<?php $this->endWidget(); ?> 			
        </div>

	</div>

	
	<aside class="span8">
	<?php 
		if (!Yii::app()->user->isGuest){
			$this->widget('PanelUserWidget');
		}
		$this->widget('PanelVideoChatRoomWidget');
	?>
	</aside>
</div>