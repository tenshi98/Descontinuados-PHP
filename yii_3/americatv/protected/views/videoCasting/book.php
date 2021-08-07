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
				<h3>Mi Perfil</h3>
				<div class="b_perfil">
					
					<div class="fotoperfil_d box">
						<div class="span12">
							<?php if (isset($datosPers['url_img'])&&$datosPers['url_img']!=''){?>
								<img src="<?php echo $datosPers['url_img'];?>">
							<?php }else{?>
								<img src="<?php echo Yii::app()->theme->baseUrl;?>/img_upl/img17.jpg">
							<?php } ?>
						</div>
						<div class="span12">
							<div class="datos_book">
								<h3><?php echo $datosPers['PostNombres']; ?></h3>
								<h4><?php echo $datosPers['PostApellPapa'].' '.$datosPers['PostApellMama']; ?></h4>
								<h5><?php echo 'No hay edad'; ?></h5>
								<h5><a href=""><?php echo $datosPers['PostEmail']; ?></a></h5>
							</div>
							<div class="b_cont_datos">
								<h4><strong>Dirección:</strong></h4>
								<h4><?php echo $datosPers['PostDireccion']; ?></h4>
							</div>
							<div class="datos_bloq2">
								<div class="span12">
									<div class="b_cont_datos">
										<h4><strong>Provincia</strong></h4>
										<h4><?php echo $datosPers['Provincia']; ?></h4>
									</div>
									<div class="b_cont_datos">
										<h4><strong>Distrito</strong></h4>
										<h4><?php echo $datosPers['Distrito']; ?></h4>
									</div>
									<div class="b_cont_datos">
										<h4><strong>Teléfono fijo</strong></h4>
										<h4><?php echo $datosPers['PostFonoFijo']; ?></h4>
									</div>
								</div>
								<div class="span12">
									<div class="b_cont_datos">
										<h4><strong>Departamento</strong></h4>
										<h4><?php echo $datosPers['Departamento']; ?></h4>
									</div>
									<div class="b_cont_datos">
										<h4><strong>&nbsp;</strong></h4>
										<h4>&nbsp;</h4>
									</div>
									<div class="b_cont_datos">
										<h4><strong>Teléfono Móvil</strong></h4>
										<h4><?php echo $datosPers['PostFonoCel']; ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
					
			<div class="cont_book_talento">
				<h2 class="head_h2">Talento</h2>
				<div class="bloq_talent">
					<h4>Tus 3 habilidades mas importantes en orden de prioridad</h4>
					<p><?php 
					$x=0;
					if(isset($datosPers['profesion1'])&&$datosPers['profesion1']!=''){
						echo $datosPers['profesion1'];
					}else{$x++;}
					if(isset($datosPers['profesion2'])&&$datosPers['profesion2']!=''){
						echo ' - '.$datosPers['profesion2'];
					}else{$x++;}
					if(isset($datosPers['profesion3'])&&$datosPers['profesion3']!=''){
						echo ' - '.$datosPers['profesion3'];
					}else{$x++;}
					if($x==3){echo 'Sin Habilidades Seleccionadas';}
					?></p>
				</div>
															
				<div class="bloq_talent">
					<h3>Descripción de tu perfil</h3>
					<p>
					<?php 
					if(isset($datosPers['PostObjetivo'])&&$datosPers['PostObjetivo']!=''){
						echo $datosPers['PostObjetivo'];
					}else{
						echo 'Sin descripcion, edita tu perfil';
					}?></p>
				</div>

				<div class="bloq_talent">
					<h3>Producciones de tu interés (casting)</h3>
					<h4>Las 3 producciones o castings en orden de importancia que te gustaría participar. (puedes elegir de 1 a 3)</h4>
					<p><?php 
					$x=0;
					if(isset($datosPers['produccion1'])&&$datosPers['produccion1']!=''){
						echo $datosPers['produccion1'];
					}else{$x++;}
					if(isset($datosPers['produccion2'])&&$datosPers['produccion2']!=''){
						echo ' - '.$datosPers['produccion2'];
					}else{$x++;}
					if(isset($datosPers['produccion3'])&&$datosPers['produccion3']!=''){
						echo ' - '.$datosPers['produccion3'];
					}else{$x++;}
					if($x==3){echo 'Sin Producciones de interes Seleccionadas';}
					?></p>
				</div>

			</div>	
					<div class="cont_btn"><?php echo CHtml::link('EDITAR PERFIL', array('videoCasting/perfil')); ?></div>
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