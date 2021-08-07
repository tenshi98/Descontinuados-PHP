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

			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'saludos-form',
				'enableAjaxValidation'=>false,)
				); ?>
								  
				<div class="combina_frases">
					<h3>1. Combina las frases de tu personaje</h3>
					<div class="cont_combina_f">
						<div class="span12">
							<img src="<?php echo Yii::getPathOfAlias('img').'/'.$img->img;?>">
						</div>
						<div class="span12 combos_sv">

							<div class="cont_combos_sv">
								<?php echo CHtml::dropDownList('sal01', 0, $opc1, array('class'=>'span22', 'prompt' => 'Selecciona tu saludo de entrada'));?> 
							</div>
							<div class="cont_combos_sv">
								<?php echo CHtml::dropDownList('sal02', 0, $opc2, array('class'=>'span22', 'prompt' => 'Selecciona tu broma'));?> 
							</div>
							<div class="cont_combos_sv">
								<?php echo CHtml::dropDownList('sal03', 0, $opc3, array('class'=>'span22', 'prompt' => 'Selecciona tu invitacion'));?> 
							</div>
							<div class="cont_combos_sv">
								<?php echo CHtml::dropDownList('sal04', 0, $opc4, array('class'=>'span22', 'prompt' => 'Selecciona tu despedida'));?> 
							</div>
						</div>
						<div class="cont_btn">
							<?php echo CHtml::link('VOLVER', array('saludosVirtuales/index'),array('style'=>'width:50%;')); ?>
							<?php echo CHtml::submitButton('CONTINUAR', array('name' => 'continuar')); ?>
						</div>
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