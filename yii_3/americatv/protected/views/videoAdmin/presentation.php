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
			

			<div class="video_talento" style="margin-top:30px;">
				<h3>Talentos</h3>
				<div class="cont_video_talento ">
					<section class="tabs noti_hover noti_checked ">
											   
						<input id="tab-1" name="radio-set" class="tab-selector-1" checked="checked" type="radio">
						<label for="tab-1" class="tab-label-1 "><i class="fa fa-inbox"><?php echo $datosPers['profesion1']; ?></i></label>
														
						<input id="tab-2" name="radio-set" class="tab-selector-2" type="radio">
						<label for="tab-2" class="tab-label-2 "><i class="fa fa-share-square-o"><?php echo $datosPers['profesion2']; ?></i></label>
														
						<input id="tab-3" name="radio-set" class="tab-selector-3" type="radio">
						<label for="tab-3" class="tab-label-3 "><i class="fa fa-taxi"><?php echo $datosPers['profesion3']; ?></i></label>
														
						<div class="clear-shadow"></div>
																
						<div class="content ">
														  
							<div class="content-1"> 
								<?php
								if($datosPers['vid_prof1']!=''){
									switch ($datosPers['vid_aprob1']) {
										case 1: echo '<p>En espera de aprobacion</p><br/>'; break;
										case 2: echo '<p>Aceptado</p><br/>'; break;
										case 3: echo '<p>Rechazado</p><br/>'; break;
										default: echo '<p>sin estado</p><br/>';
									}
									$this->widget('ext.EjwPlayer.EjwPlayer',array(
										'width' => 590,
										'height' => 430,
										'autostart' => 'false',
										'controls' => 'true',
										'playlist' => array(
											array('sources' => array(array('file' => Yii::getPathOfAlias('upload').'/'.$datosPers['vid_prof1'], 'height' => 430),)),
				
										),
									));
								} ?>
							</div>

							<div class="content-2">
								<?php if($datosPers['vid_prof2']!=''){
									switch ($datosPers['vid_aprob2']) {
										case 1: echo '<p>En espera de aprobacion</p><br/>'; break;
										case 2: echo '<p>Aceptado</p><br/>'; break;
										case 3: echo '<p>Rechazado</p><br/>'; break;
										default: echo '<p>sin estado</p><br/>';
									}
									$this->widget('ext.EjwPlayer.EjwPlayer',array(
										'width' => 590,
										'height' => 430,
										'autostart' => 'false',
										'controls' => 'true',
										'playlist' => array(
											array('sources' => array(array('file' => Yii::getPathOfAlias('upload').'/'.$datosPers['vid_prof2'], 'height' => 430),)),
				
										),
									));
								} ?>
							</div>

							<div class="content-3">		
								<?php if($datosPers['vid_prof3']!=''){
									switch ($datosPers['vid_aprob3']) {
										case 1: echo '<p>En espera de aprobacion</p><br/>'; break;
										case 2: echo '<p>Aceptado</p><br/>'; break;
										case 3: echo '<p>Rechazado</p><br/>'; break;
										default: echo '<p>sin estado</p><br/>';
									}
									$this->widget('ext.EjwPlayer.EjwPlayer',array(
										'width' => 590,
										'height' => 430,
										'autostart' => 'false',
										'controls' => 'true',
										'playlist' => array(
											array('sources' => array(array('file' => Yii::getPathOfAlias('upload').'/'.$datosPers['vid_prof3'], 'height' => 430),)),
				
										),
									));
								} ?>
							</div>

							<div class=" clear"></div>  
													  
						</div>
					</section>															
				</div>
				<div class="cont_btn"><?php echo CHtml::link('EDITAR VIDEOS', array('videoCasting/presentationMod')); ?></div>
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