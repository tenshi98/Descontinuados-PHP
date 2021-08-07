<div class="bloq_news">

	<div class="span16"> 
	
		<?php
			foreach(Yii::app()->user->getFlashes() as $key => $message) {
				echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
			}
		?>

		<div class="cont_slider saludos_v">
			<h3>El más popular</h3>
										
			<div class="slider_item">
				<figcaption class="chat_live">
					<a href=""><img src="<?php echo Yii::app()->theme->baseUrl;?>/img_upl/pascuerita3.jpg"></a>                                          
				</figcaption>
																								
				<h2><a href="">Envía tus saludos a todos tus amigos</a></h2>
																					
				<ul class="social_vch">
					<li><a href=""></a></li>
					<li class="tw_vch"><a href=""></a></li>
				</ul>
											   
				<ul class="balls">
					<li class="active_b"><a href=""></a></li>
					<li><a href=""></a></li>
					<li><a href=""></a></li>
					<li><a href=""></a></li>
				</ul>
			</div>
																
		</div>
		

		
		
		<div class="cont_sorteos_semana tab_salu_v">
			<h2 class="head_h2">VIDEOS SALUDOS PERSONALIZADOS</h2>
			<div class="sort_semana">
				<?php 
					$this->widget('zii.widgets.CMenu',array(
							'items'=>array(
								array('label'=>'COMBINADOS', 'url'=>array('/saludosVirtuales/index'),'itemOptions' => array('class'=>'active')),
								array('label'=>'TARJETAS', 'url'=>array('/saludosVirtuales/tarjetas'))
							),
							'htmlOptions' => array('class'=>'princ_sem',),
						)); 
				?>
											
											
				<div class="list_sorteo">
					<div class="selec_personaje">
						<h3>Selecciona personaje</h3>
						<ul>
							<li><a href="">LO MÁS NUEVO</a></li>
							<li><a href="">LO MÁS POPULAR</a></li>
							<li><a href="">TODO</a></li>
						</ul>
					</div>
															
			
					<ul class="bloq_sorteo">
					
						<?php 
						foreach($videoSaludoCat as $data): ?>
						<li class="img_saludos fleft">
							<figcaption>
								<a href="<?php echo 'saludo?codigo='.$data->idVideoCat; ?>">
									<img src="<?php echo Yii::getPathOfAlias('img').'/'.$data->img;?>">
								</a>
							</figcaption>
							<h2><?php echo CHtml::link(CHtml::encode($data->Nombre), array('saludosVirtuales/saludo', 'codigo' =>$data->idVideoCat)); ?></h2>
							<h4> <span></span><?php echo $data->n_enviados ?></h4>
						</li>
						<?php endforeach; ?>
	
					</ul>
									
					<ul class="bloq_sorteo">										 
						<div class="cont_btn">
							<a href="">VER TODOS <span>»</span></a>
						</div>
					</ul>
					
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