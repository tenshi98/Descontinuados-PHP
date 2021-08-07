<div class="bloq_news">

	<div class="span16"> 
	                   
		<div class="cont_saludos_v box">
			<div class="salud_combinado">
				<h2 class="span12">VIDEO SALUDO COMBINADO</h2>
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
								array(
								'image' => Yii::app()->theme->baseUrl.'/img/carga_video.jpg',
								'sources' => array(array('file' => Yii::getPathOfAlias('videos').'/Combinados/'.$final, 'height' => 430),)),
							),
						)); 
						?>
					</div>
				</div>
			</div>	
			<div class="ingre_destinatarios">
				<div class="cont_destinatarios">
					<div class="item_destinatario">
						<div class="span6">Asunto:</div>
						<div class="span18"><p><?php echo $video['asunto']; ?></p></div>
					</div>
					<div class="item_destinatario">
						<div class="span6">Mensaje:</div>
						<div class="span18"><?php echo $video['mensaje']; ?></div>
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