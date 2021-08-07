<div class="bloq_news">

	<div class="span16"> 
	
		<div class="wrapper_casting">
			
			<?php
			if (!Yii::app()->user->isGuest){
				$this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'HOME', 'url'=>array('/videoCasting/index')),
							array('label'=>'BOOK', 'url'=>array('/videoCasting/book')),
							array('label'=>'VIDEO PRESENTACIÓN', 'url'=>array('/videoCasting/presentation'),'itemOptions' => array('class'=>'active_tab')),
							array('label'=>'COMPARTE TUS VIDEOS', 'url'=>array('/videoCasting/social'))
						),
						'htmlOptions' => array('class'=>'tab_prin',),
					)); 
			}?>
				
			
			<div class="cont_video_perfil">
				<h3>Instrucciones</h3>
				<ul>
					<li class="span6 i1">
						<figcaption></figcaption>
						<h4>Para poder grabar tu video tienes que tener cámara web y micrófono</h4>
					</li>
					<li class="span6 i2">
						<figcaption></figcaption>
						<h4>Puedes grabar hasta 1 video por cada talento de un mínimo de 10 segundos cada uno</h4>
					</li>
					<li class="span6 i3">
						<figcaption></figcaption>
						<h4>Los videos que subas, están sujetos a una revisión antes de que puedan ser vistos por el resto de los socios</h4>
					</li>
					<li class="span6 i4">
						<figcaption></figcaption>
						<h4>Luego de grabar el video podras descargarlo a tu computador para editarlo y subirlo en formato mp4</h4>
					</li>
				</ul>
			</div>
			
			
	
			<div class="cont_video_perfil">
			<h3>Subir Videos de Presentacion</h3>
				<div class="b_perfil">
				<?php if($datosPers['vid_prof3']==''){?>
					<style>
					.progress { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; margin-bottom: 15px; }
					.bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
					.percent { position:absolute; display:inline-block; top:3px; left:48%; }
					</style>				
												
					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'postulante-form',
						'enableAjaxValidation'=>false,
						'htmlOptions'=>array('enctype' => 'multipart/form-data')
						)); ?>
						
					<?php echo $form->errorSummary($model); ?>
						
						<div class="row" style="margin-bottom: 15px;" id="fileinput">
							<?php echo $form->labelEx($model,'vid_prof3', array('label' => 'Video Talento : '.$datosPers['profesion3'])); ?>
							<?php echo $form->FileField($model,'vid_prof3',array('class'=>'formvid','id'=>'myfile')); ?>
							<?php echo $form->error($model,'vid_prof3'); ?>
						</div>
						
						<div class="progress" id="progress">
							<div class="bar"></div >
							<div class="percent">0%</div >
						</div>
						
						<div id="status"></div>	
						
						<div class="row buttons">
							<div class="cont_btn">
								<?php echo CHtml::submitButton($model->isNewRecord ? 'CREAR' : 'GUARDAR',array("id"=>"savebtn")); ?>
								<?php echo CHtml::link('VOLVER', array('videoCasting/presentation')); ?>
							</div>
						</div>
						
					<?php $this->endWidget(); ?>	
						<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
						<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.form.js"></script>
						<script>
						(function() { 
						var bar = $('.bar');
						var percent = $('.percent'); 
						var status = $('#status');						
						$('form').ajaxForm({
							beforeSend: function() {
								//status.empty();
								var percentVal = '0%';
								bar.width(percentVal)
								percent.html(percentVal);
							},
							uploadProgress: function(event, position, total, percentComplete) {
								var percentVal = percentComplete + '%';
								bar.width(percentVal)
								percent.html(percentVal);
							},
							success: function() {
								var percentVal = '100%';
								bar.width(percentVal)
								percent.html(percentVal);
							},
							complete: function() {
								document.getElementById("fileinput").style.display = "none";
								document.getElementById("progress").style.display = "none";
								document.getElementById("savebtn").style.display = "none";
								status.html('Archivo Subido Correctamente');
							}
						}); 

						})();       
						</script>					
				<?php } else{?>
					<div class="row" style="margin-bottom: 15px;">
						<p><?php echo $datosPers['profesion3'].' ';?>
						<?php echo CHtml::link('Borrar Video', array('videoCasting/borrarVideo3')); ?></p>
					</div>
					<div class="row buttons">
						<div class="cont_btn">
							<?php echo CHtml::link('VOLVER', array('videoCasting/presentation')); ?>
						</div>
					</div>
				<?php } ?>
				</div>
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