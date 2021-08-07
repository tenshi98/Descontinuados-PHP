<div class="bloq_news">

	<div class="span16"> 
	
		<div class="wrapper_casting">

			<div class="video_talento" style="margin-top:30px;">
				<h3>Talentos</h3>
				<div class="cont_video_talento ">
					
					<div class="content-1"> 
								<?php
									switch ($columna) {
										case 'vid_aprob1': $video= $model->vid_prof1 ; break;
										case 'vid_aprob2': $video= $model->vid_prof2 ; break;
										case 'vid_aprob3': $video= $model->vid_prof3 ; break;
									}
									$this->widget('ext.EjwPlayer.EjwPlayer',array(
										'width' => 590,
										'height' => 430,
										'autostart' => 'false',
										'controls' => 'true',
										'playlist' => array(
											array('sources' => array(array('file' => Yii::getPathOfAlias('upload').'/'.$video, 'height' => 430),)),
				
										),
									));
								 ?>
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