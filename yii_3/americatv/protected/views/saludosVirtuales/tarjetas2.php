<div class="bloq_news">

	<div class="span16"> 
		
		<div class="cont_saludos_v box vtarjetas">
			<div class="salud_combinado">
				<h2 class="span14">TARJETAS CON SALUDOS</h2>
			</div>
			<div class="cont_sorteos_semana tab_salu_v">
													
				<div class="sort_semana">
					<h3>1. Selecciona el motivo de la tarjeta <span>(Obligactorio)</span></h3>

					<div class="list_sorteo">
						<ul class="bloq_sorteo">
							<?php 
							foreach($motivos as $data): ?>
							<li class="span8 fleft">
								<figcaption>
									<a href="<?php echo 'tarjetas3?codigo='.$codigo.'&tarjeta='.$data->idTarjetaList; ?>">
										<img src="<?php echo Yii::getPathOfAlias('img').'/'.$data->img;?>">
									</a>
								</figcaption>
								<h2>
								<?php echo CHtml::link(CHtml::encode($data->motivo), array(
								'saludosVirtuales/tarjetas3', 
								'codigo' =>$codigo,
								'tarjeta' =>$data->idTarjetaList
								)); ?>
								</h2>
								<h4> <span></span><?php echo $data->n_enviados ?></h4>
							</li> 
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="cont_btn">
						<?php echo CHtml::link('VOLVER', array('saludosVirtuales/tarjetas'),array('style'=>'width:50%;')); ?>
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