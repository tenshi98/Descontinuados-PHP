<div class="bloq_news">

	<div class="span16"> 
	
		<div class="wrapper_casting">
			
			<?php 
			if (!Yii::app()->user->isGuest){	
				$this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'HOME', 'url'=>array('/videoCasting/index')),
							array('label'=>'BOOK', 'url'=>array('/videoCasting/book'),'itemOptions' => array('class'=>'active_tab')),
							array('label'=>'VIDEO PRESENTACIÓN', 'url'=>array('/videoCasting/presentation')),
							array('label'=>'COMPARTE TUS VIDEOS', 'url'=>array('/videoCasting/social'))
						),
						'htmlOptions' => array('class'=>'tab_prin',),
					)); 
			}?>
				
			
			
			<div class="cont_book_perfil">
				<h3>Editar Perfil</h3>
				<div class="b_perfil">
					


				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'postulante-form',
					'enableAjaxValidation'=>false,
				)); ?>
					
					<h2 class="head_h2 margin_bottom">Datos Basicos</h2>
					
					<?php echo $form->errorSummary($model); ?>
					
					<div class="row">
						<?php echo $form->labelEx($model,'PostNombres'); ?>
						<?php echo $form->textField($model,'PostNombres',array('placeholder' => 'Nombre','class'=>'formvid')); ?>
						<?php echo $form->error($model,'PostNombres'); ?>
					</div>

					<div class="row">
						<?php echo $form->labelEx($model,'PostApellPapa'); ?>
						<?php echo $form->textField($model,'PostApellPapa',array('placeholder' => 'Apellido Paterno','class'=>'formvid')); ?>
						<?php echo $form->error($model,'PostApellPapa'); ?>
					</div>

					<div class="row">
						<?php echo $form->labelEx($model,'PostApellMama'); ?>
						<?php echo $form->textField($model,'PostApellMama',array('placeholder' => 'Apellido Materno','class'=>'formvid')); ?>
						<?php echo $form->error($model,'PostApellMama'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($model,'PostFecNac'); ?>
						<?php $this->widget('zii.widgets.jui.CJuiDatePicker', 
							[
								'model'=>$model,
								'language' => 'es',
								'attribute'=>'PostFecNac',
								'name'=>$model->PostFecNac,    
								'value'=>$model->PostFecNac,
								'options' => array(
									'showAnim' => 'fold',
									'dateFormat' => 'yy-mm-dd', 
									'altField' => '#self_pointing_id',
									'altFormat' => 'dd-mm-yy', 
								),

							]); 
						?>
						<?php echo $form->error($model,'PostFecNac'); ?>
					</div>
					
					<script type="text/javascript">
						
						function getPais(){
							var e = document.getElementById("Postulante_idPais");
							var strPais = e.options[e.selectedIndex].value;
							if(strPais!=162){
								disable();
							}else{
								enable();
							}
						}

						function disable(){
							document.getElementById("Postulante_idDepartamento").disabled=true;
							document.getElementById("Postulante_idProvincia").disabled=true;
							document.getElementById("Postulante_idDistrito").disabled=true;
						}
						function enable(){
							document.getElementById("Postulante_idDepartamento").disabled=false;
							document.getElementById("Postulante_idProvincia").disabled=false;
							document.getElementById("Postulante_idDistrito").disabled=false;
						}
					</script>					
					<div class="row">
						<?php echo $form->labelEx($model,'idPais'); ?>
						<?php echo $form->dropDownList($model, 'idPais', $paises, array(
						'prompt' => 'Seleccione',
						'options' => array('162'=>array('selected'=>true)),
						'onchange'=> 'getPais()',
						)
						); ?>
						<?php echo $form->error($model,'idPais'); ?>
					</div>

					<div class="row">
						<?php 
						$htmlOptions=array(
							'ajax'=>array(
								'url'=>$this->createUrl('deptoSorted'),
								'type'=>'POST',
								'update'=>'#Postulante_idProvincia',
							),
							'prompt' => 'Seleccione',
						)?>
						<?php echo $form->labelEx($model,'idDepartamento'); ?>
						<?php echo $form->dropDownList($model, 'idDepartamento',  $model->getMenuDepartamento(), $htmlOptions); ?>
						<?php echo $form->error($model,'idDepartamento'); ?>
					</div>
					
					<div class="row">
						<?php 
						$htmlOptions=array(
							'ajax'=>array(
								'url'=>$this->createUrl('provSorted'),
								'type'=>'POST',
								'update'=>'#Postulante_idDistrito',
							),
						)?>
						<?php echo $form->labelEx($model,'idProvincia'); ?>
						<?php echo $form->dropDownList($model, 'idProvincia', $model->getMenuProvincia($model->idDepartamento), $htmlOptions ); ?>
						<?php echo $form->error($model,'idProvincia'); ?>
					</div>

					<div class="row">
						<?php echo $form->labelEx($model,'idDistrito'); ?>
						<?php echo $form->dropDownList($model, 'idDistrito', $model->getMenuDistrito($model->idProvincia)); ?>
						<?php echo $form->error($model,'idDistrito'); ?>
					</div>

					<div class="row">
						<?php echo $form->labelEx($model,'PostDireccion'); ?>
						<?php echo $form->textField($model,'PostDireccion',array('placeholder' => 'Direccion','class'=>'formvid')); ?>
						<?php echo $form->error($model,'PostDireccion'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($model,'PostFonoFijo'); ?>
						<?php echo $form->textField($model,'PostFonoFijo',array('placeholder' => 'Telefono Fijo','class'=>'formvid')); ?>
						<?php echo $form->error($model,'PostFonoFijo'); ?>
					</div>

					<div class="row">
						<?php echo $form->labelEx($model,'PostFonoCel'); ?>
						<?php echo $form->textField($model,'PostFonoCel',array('placeholder' => 'Telefono Celular','class'=>'formvid')); ?>
						<?php echo $form->error($model,'PostFonoCel'); ?>
					</div>
					
					<div class="row">
						<?php echo $form->labelEx($model,'PostEmail'); ?>
						<?php echo $form->textField($model,'PostEmail',array('placeholder' => 'Email','class'=>'formvid')); ?>
						<?php echo $form->error($model,'PostEmail'); ?>
					</div>
					
					<h2 class="head_h2 margin_bottom">Talento</h2>
					<p class="margin_bottom">Tus 3 habilidades mas importantes en orden de prioridad</p>
					
					<div class="row">
						<?php echo $form->labelEx($model,'PostProfesion1'); ?>
						<?php echo $form->dropDownList($model, 'PostProfesion1', $profesiones, array('prompt' => 'Seleccione', 'onchange'=> 'compararTalento()')); ?>
						<?php echo $form->error($model,'PostProfesion1'); ?>
					</div>

					<div class="row">
						<?php echo $form->labelEx($model,'PostProfesion2'); ?>
						<?php echo $form->dropDownList($model, 'PostProfesion2', $profesiones, array('prompt' => 'Seleccione', 'onchange'=> 'compararTalento()')); ?>
						<?php echo $form->error($model,'PostProfesion2'); ?>
					</div>

					<div class="row">
						<?php echo $form->labelEx($model,'PostProfesion3'); ?>
						<?php echo $form->dropDownList($model, 'PostProfesion3', $profesiones, array('prompt' => 'Seleccione', 'onchange'=> 'compararTalento()')); ?>
						<?php echo $form->error($model,'PostProfesion3'); ?>
					</div>
					<script type="text/javascript">
						function compararTalento(){
							var talento1 = document.getElementById('Postulante_PostProfesion1').value;
							var talento2 = document.getElementById('Postulante_PostProfesion2').value;
							var talento3 = document.getElementById('Postulante_PostProfesion3').value;
							if(talento1==talento2&&talento1!=0&&talento2!=0&&talento1!=''&&talento2!=''){
								alert('Ha seleccionado Talentos repetidos');
								document.getElementById("mandatory").disabled=true;
							}else if(talento1==talento3&&talento1!=0&&talento3!=0&&talento1!=''&&talento3!=''){
								alert('Ha seleccionado Talentos repetidos');
								document.getElementById("mandatory").disabled=true;
							}else if(talento2==talento3&&talento2!=0&&talento3!=0&&talento2!=''&&talento3!=''){
								alert('Ha seleccionado Talentos repetidos');
								document.getElementById("mandatory").disabled=true;
							}else{
								document.getElementById("mandatory").disabled=false;
							}
						}
					</script>
					<div class="row">
						<?php echo $form->labelEx($model,'PostObjetivo'); ?>
						<?php echo $form->textArea($model,'PostObjetivo',array('placeholder' => 'Objetivos','class'=>'formvid')); ?>
						<?php echo $form->error($model,'PostObjetivo'); ?>
					</div>
					
					<h2 class="head_h2 margin_bottom">Producciones de tu interés (casting)</h2>
					<p class="margin_bottom">Las 3 producciones o castings en orden de importancia que te gustaría participar. (puedes elegir de 1 a 3)</p>
					
					<div class="row">
						<?php echo $form->labelEx($model,'PostProduccion1'); ?>
						<?php echo $form->dropDownList($model, 'PostProduccion1', $producciones, array('prompt' => 'Seleccione', 'onchange'=> 'compararProduccion()')); ?>
						<?php echo $form->error($model,'PostProduccion1'); ?>
					</div>

					<div class="row">
						<?php echo $form->labelEx($model,'PostProduccion2'); ?>
						<?php echo $form->dropDownList($model, 'PostProduccion2', $producciones, array('prompt' => 'Seleccione', 'onchange'=> 'compararProduccion()')); ?>
						<?php echo $form->error($model,'PostProduccion2'); ?>
					</div>

					<div class="row">
						<?php echo $form->labelEx($model,'PostProduccion3'); ?>
						<?php echo $form->dropDownList($model, 'PostProduccion3', $producciones, array('prompt' => 'Seleccione', 'onchange'=> 'compararProduccion()')); ?>
						<?php echo $form->error($model,'PostProduccion3'); ?>
					</div>
					<script type="text/javascript">
						function compararProduccion(){
							var produccion1 = document.getElementById('Postulante_PostProduccion1').value;
							var produccion2 = document.getElementById('Postulante_PostProduccion2').value;
							var produccion3 = document.getElementById('Postulante_PostProduccion3').value;
							if(produccion1==produccion2&&produccion1!=0&&produccion2!=0&&produccion1!=''&&produccion2!=''){
								alert('Ha seleccionado Producciones repetidas');
								document.getElementById("mandatory").disabled=true;
							}else if(produccion1==produccion3&&produccion1!=0&&produccion3!=0&&produccion1!=''&&produccion3!=''){
								alert('Ha seleccionado Producciones repetidas');
								document.getElementById("mandatory").disabled=true;
							}else if(produccion2==produccion3&&produccion2!=0&&produccion3!=0&&produccion2!=''&&produccion3!=''){
								alert('Ha seleccionado Producciones repetidas');
								document.getElementById("mandatory").disabled=true;
							}else{
								document.getElementById("mandatory").disabled=false;
							}
						}
					</script>
					
					<div class="row buttons">
						<div class="cont_btn">
							<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('id' => 'mandatory')); ?>
						</div>
					</div>

				<?php $this->endWidget(); ?>

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