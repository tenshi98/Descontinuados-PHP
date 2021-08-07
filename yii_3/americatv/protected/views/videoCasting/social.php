<div class="bloq_news">

	<div class="span16"> 
	
		<div class="wrapper_casting">
			
			<?php 
			if (!Yii::app()->user->isGuest){
				$this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'HOME', 'url'=>array('/videoCasting/index')),
							array('label'=>'BOOK', 'url'=>array('/videoCasting/book')),
							array('label'=>'VIDEO PRESENTACIÓN', 'url'=>array('/videoCasting/presentation')),
							array('label'=>'COMPARTE TUS VIDEOS', 'url'=>array('/videoCasting/social'),'itemOptions' => array('class'=>'active_tab'))
						),
						'htmlOptions' => array('class'=>'tab_prin',),
					)); 
			}?>
						
	
	
			<div class="video_talento" style="margin-top:30px;">
				<h3>Tus videos de presentación</h3>
				<div class="cont_video_talento ">
				<div>
				<?php //Listo los errores
				if (!empty($error)) {  
					foreach ($error as $mensaje) {
						echo '<p>'.$mensaje.'</p>';
					} 
				}
	
				foreach(Yii::app()->user->getFlashes() as $key => $message) {
					echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
				}
	
				?>
				</div>
				
				
					<section class="tabs noti_hover noti_checked ">
											   
						<input id="tab-1" name="radio-set" class="tab-selector-1" checked="checked" type="radio">
						<label for="tab-1" class="tab-label-1 ">Enviar enlace a todos mis contactos</label>
														
						<input id="tab-2" name="radio-set" class="tab-selector-2" type="radio">
						<label for="tab-2" class="tab-label-2 ">Enviar enlace a Correo</label>
														
														
						<div class="clear-shadow"></div>
																
						<div class="content ">
														  
							<div class="content-1"> 
							
								<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
								<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery.fancybox.js"></script>
								<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;?>/css/jquery.fancybox.css" media="screen" />
								<script type="text/javascript">
									$(document).ready(function() {

										$(".fancybox").fancybox({
											type: 'iframe',
											'width':400,
											'height':200,
											'autoSize' : false,
											afterClose: function () { 
												parent.location.reload(true);
											}
										});

									});
								</script>
								<style type="text/css">
									.fancybox-custom .fancybox-outer {
										box-shadow: 0 0 50px #222;
									}
								</style>
								<a class="fancybox fancybox.iframe" href="<?php echo Yii::app()->params['openInviter'].$model->id_usuario?>">Importar Contactos</a>
							
							
							
							<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'social-form',
							'enableAjaxValidation'=>false,)
							); ?>
								<div class="cont_video_talento" style="overflow-y: scroll; overflow-x: hidden; height: 600px; padding-right: 5px;">
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tbody>
											<?php
											$lastChar = '';
											$contador = 0;
											foreach($correos as $correo):
												$char = strtoupper($correo->correo[0]);
												if ($char !== $lastChar) {
													echo '<tr><td colspan="3"><h2>'.$char.'</h2></td></tr>';   
													$lastChar = $char;
												}
												if($contador==1){echo '<tr>';}
												echo '<td align="left"><input type="checkbox" name="formId[]" value="'.$correo->correo.'">'.$correo->correo.'</td>';
												if($contador==2){echo '</tr>';$contador=0;}
												
												$contador++;
											endforeach;?>
										</tbody>
									</table>
								</div>
								<div class="send_video" style="margin-top:20px;">
									<span class="span6">Seleccione un video a compartir</span>
									<span class="span18">
										<select name="video">
											<option value="" selected>Seleccione un Video</option>
											<?php if($model->vid_aprob1==2){ ?><option value="1">Video 1 : <?php echo $datosPers['profesion1']; ?></option><?php } ?>
											<?php if($model->vid_aprob2==2){ ?><option value="2">Video 2 : <?php echo $datosPers['profesion2']; ?></option><?php } ?>
											<?php if($model->vid_aprob3==2){ ?><option value="3">Video 3 : <?php echo $datosPers['profesion3']; ?></option><?php } ?>
										</select>
									</span>
								</div>
								<div class="clearbox"></div>
								<div class="send_video" style="margin-top:20px;">
									<span class="span6">Asunto:</span>
									<span class="span18">
										<input name="asunto" type="text">
									</span>
								</div>
										
										
								<div class="cont_btn" style="margin-top:10px;">
									<?php echo CHtml::submitButton('ENVIAR', array('name' => 'enviar_varios')); ?>
								</div>
							<?php $this->endWidget(); ?> 
							

							
							</div>

							<div class="content-2">
								<h4> Se compartirán los videos que estén seleccionados (Solo videos aprobados)</h4><br/>
								
								<div class="cont_send_video">		
										<?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'postulante-form',
										'enableAjaxValidation'=>false,
										'htmlOptions'=>array('enctype' => 'multipart/form-data')
										)); ?>
				 
										<div class="send_video">
											<span class="span6">Seleccione un video a compartir</span>
											<span class="span18">
												<select name="video">
												  <option value="" selected>Seleccione un Video</option>
												  <?php if($model->vid_aprob1==2){ ?><option value="1">Video 1 : <?php echo $datosPers['profesion1']; ?></option><?php } ?>
												  <?php if($model->vid_aprob2==2){ ?><option value="2">Video 2 : <?php echo $datosPers['profesion2']; ?></option><?php } ?>
												  <?php if($model->vid_aprob3==2){ ?><option value="3">Video 3 : <?php echo $datosPers['profesion3']; ?></option><?php } ?>
												</select>
											</span>
										</div>

										<div class="send_video">
											<span class="span6">E-mail de destino:</span>
											<span class="span18">
												<input name="correo" type="text">
											</span>
										</div>
										<div class="send_video">
											<span class="span6">Asunto:</span>
											<span class="span18">
												<input name="asunto" type="text">
											</span>
										</div>
										
										<div class="row buttons">
											<div class="cont_btn">
												<?php echo CHtml::submitButton('Compartir', array('name' => 'enviar')); ?>
											</div>
										</div>
										
									<?php $this->endWidget(); ?>
								</div>

							</div>



							<div class=" clear"></div>  
													  
						</div>
					</section>															
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