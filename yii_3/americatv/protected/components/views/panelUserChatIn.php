		<div class="datos_cast">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'postulante-form',
			'enableAjaxValidation'=>false,
		)); ?>  
			<div class="prf_cast">
				<div class="span8">
					<figcaption>
						<?php if (isset($dataProvider['url_img'])&&$dataProvider['url_img']!=''){?>
							<img src="<?php echo $dataProvider['url_img'];?>">
						<?php }else{?>
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/img_upl/img17.jpg">
						<?php } ?>
						<span><?php echo CHtml::link('Editar mi perfil', array('videoCasting/perfil')); ?></span>
					</figcaption>											
				</div>
				<div class="span16">
					<h3><?php echo $dataProvider['PostNombres'];?></h3>
					<h4><?php echo $dataProvider['PostApellPapa'].' '.$dataProvider['PostApellMama'];?></h4>
					<h5>Ingresa tu Alias</h5> 
					<?php echo $form->textField($model,'alias',array('placeholder' => 'Alias', 'class' => 'inputvideochat')); ?>
					<?php echo $form->error($model,'alias'); ?>
				</div>
			</div>
			<div class="btn_video_in"><?php echo CHtml::submitButton($model->isNewRecord ? 'ENTRAR AL VIDEOCHAT' : 'ENTRAR AL VIDEOCHAT',array('class'=>'btn_video_in_sub')); ?></div>
			<?php $this->endWidget(); ?>	
		</div>