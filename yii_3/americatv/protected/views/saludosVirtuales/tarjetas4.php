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
			
				
				
					<div class="sort_semana">
						
						
						
						<h3>Subir Videos de Saludos</h3>
							<div class="b_perfil">
						
								<style>
								.progress { position:relative; width:400px; border: 1px solid #ddd; padding: 1px; border-radius: 3px; margin-bottom: 15px; }
								.bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
								.percent { position:absolute; display:inline-block; top:3px; left:48%; }
								</style>				
															
								<?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'saludosTarjetasEnviados-form',
									'enableAjaxValidation'=>false,
									'htmlOptions'=>array('enctype' => 'multipart/form-data')
									)); ?>
									
								<?php echo $form->errorSummary($model); ?>
									
									<div class="row" style="margin-bottom: 15px;" id="fileinput">
										<?php echo $form->labelEx($model,'VideoSaludo', array('label' => 'Video Saludo')); ?>
										<?php echo $form->FileField($model,'VideoSaludo',array('class'=>'formvid','id'=>'myfile')); ?>
										<?php echo $form->error($model,'VideoSaludo'); ?>
									</div>
									
									<div class="progress" id="progress">
										<div class="bar"></div >
										<div class="percent">0%</div >
									</div>
									
									<div id="status"></div>	
									
									<div class="row buttons">
										<div class="cont_btn">
											<?php echo CHtml::submitButton($model->isNewRecord ? 'CREAR' : 'GUARDAR Y ENVIAR SALUDO',array("id"=>"savebtn")); ?>
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
											status.html('Video subido, su tarjeta ha sido enviada correctamente');
											
											setTimeout ("redireccionar()", 2000);
											
										}
									}); 

									})(); 
									
									function redireccionar() {
										var pagina="<?php echo Yii::app()->params['updatetarjeta'].$id; ?>"
										location.href=pagina
									} 


									
									</script>					
							
							</div>
		
						
					
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