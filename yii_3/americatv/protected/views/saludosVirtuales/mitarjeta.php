<div class="bloq_news">

	<div class="span16"> 
	                   
		<div class="cont_saludos_v box">
			<div class="salud_combinado">
				<h2 class="span12">TARJETA DE SALUDO</h2>
			</div>
			<div class="combina_frases">
				
	
				<div class="cont_combina_f">
				
					<div class="span24">
					<style>
					#contenedor {
					height: 100%;
					width: 100%;
					position: relative;
					}
					#contenido {
						height: 51%;
						width: 50%; /* probá una medida en px si querés */
						margin-right: auto;
						margin-left: auto;
						position: absolute;
						top: 24%;
						left: 25%;
					}

					</style>
					<div id="contenedor">
						<img src="<?php echo Yii::getPathOfAlias('img').'/'.$tarjeta['foto']; ?>" alt="imagen" width="100%"> 
						<div id="contenido">
						
						<?php
						if(isset($tarjeta['video'])&&$tarjeta['video']!=''){
							$this->widget('ext.EjwPlayer.EjwPlayer',array(
								'width' => 301,
								'height' => 232,
								'autostart' => 'false',
								'controls' => 'true',
								'playlist' => array(
									array('sources' => array(array('file' => Yii::getPathOfAlias('upload').'/'.$tarjeta['video'], 'height' => 232),)),
					
								),
							));
						}
						?>
						
						
						</div>
					</div>
							
							<?php 
							if(isset($tarjeta['musica'])&&$tarjeta['musica']!=''){
								$this->widget('ext.jouele.Jouele', array(
									'file' => Yii::getPathOfAlias('mp3').'/'.$tarjeta['musica'],
									'name' => 'Musica saludo',
									'htmlOptions' => array(
										'class' => 'jouele-skin-silver',
									 )
								));
							}
							?>
					</div>
				</div>
			</div>	
			<div class="ingre_destinatarios">
				<div class="cont_destinatarios">
					<div class="item_destinatario">
						<div class="span6">Asunto:</div>
						<div class="span18"><p><?php echo $tarjeta['asunto']; ?></p></div>
					</div>
					<div class="item_destinatario">
						<div class="span6">Mensaje:</div>
						<div class="span18"><?php echo $tarjeta['mensaje']; ?></div>
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