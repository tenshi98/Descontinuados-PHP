<div class="bloq_news">

	<div class="span16"> 
	                   
		<div class="cont_saludos_v box">
			<div class="salud_combinado">
				<h2 class="span12">Video Talento : <?php echo $video['talento']?></h2>
			</div>
			<div class="combina_frases">
				<div class="cont_combina_f">
					<div class="span24">
						<?php
						$this->widget('ext.EjwPlayer.EjwPlayer',array(
							'width' => 590,
							'height' => 430,
							'autostart' => 'false',
							'controls' => 'true',
							'playlist' => array(
								array('sources' => array(array('file' => Yii::getPathOfAlias('upload').'/'.$video['video'], 'height' => 430),)),
				
							),
						));
									
						$this->widget('ext.Yiippod.Yiippod', array(
						'video'=>Yii::getPathOfAlias('upload').'/'.$video['video'], 
						'id' => 'yiippodplayer',
						'autoplay'=>false,
						'width'=>590,
						'view'=>6, 
						'height'=>430,
						'bgcolor'=>'#000'
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