<div class="bloq_news">

	<div class="span16"> 

		<div class="cont_saludos_v box vtarjetas">
			<div class="salud_combinado"><h2 class="span14">TARJETAS CON VIDEO SALUDOS</h2></div>
				<div class="cont_sorteos_semana tab_salu_v">
				
			<div>
			<?php 
			if (!empty($error)) {  
				foreach ($error as $mensaje) {
					echo '<p>'.$mensaje.'</p>';
				} 
			}
			?>
			</div>
			
				<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'tarjetas-form',
				'enableAjaxValidation'=>false,)
				); ?>
				
					<div class="sort_semana">
						<div class="ingre_destinatarios marb20">
							<h3>2. Selecciona una canción de fondo para tu tarjeta</h3>
							<div class="select_cancion">
								<div class="span12">
									<?php echo CHtml::dropDownList('musica', 0, $musica, array(
										'prompt' => 'Selecciona una musica de fondo', 
										'id' => 'box1',
									));?>
								</div>
								
								<div class="span12 contrl_dow">
									<div class="contrls">
										<input class="play_dw" name="" onclick="playSound(this)"; type="button">
									</div>
								</div>
								<script>
								var soundfile = '<?php echo Yii::getPathOfAlias('mp3').'/'?>';
								function playSound(el) {
									var selection = document.getElementById("box1");
									if (el.mp3) {
										if(el.mp3.paused){
											el.mp3 = new Audio(soundfile+selection.options[selection.selectedIndex].value);
											el.mp3.play();
										}else{
											el.mp3.pause();
										}
									} else {
										el.mp3 = new Audio(soundfile+selection.options[selection.selectedIndex].value);
										el.mp3.play();
									}
								}
								</script>
							</div>
						</div>
						
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
									<div class="span18"><?php echo CHtml::textField('correo3', '',array('placeholder'=>'Correo 03')); ?></div>
								</div>
								<div class="item_destinatario">
									<div class="span6">Correo destino 5:</div>
									<div class="span18"><?php echo CHtml::textField('correo4', '',array('placeholder'=>'Correo 04')); ?></div>
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
						</div>
						<div class="cont_botonesg_videos">
							<div class="cont_btn">
								<?php echo CHtml::link('VOLVER', array('saludosVirtuales/index'),array('style'=>'width:50%;')); ?>
								<?php echo CHtml::submitButton('SIGUIENTE', array('name' => 'enviar')); ?>
							</div>
						</div>
					</div>
					<?php $this->endWidget(); ?> 
				</div>
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