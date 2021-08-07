<div class="bloq_news">

	<div class="span16"> 
	
		<div class="wrapper_casting">
			
			
			<?php 
			if (!Yii::app()->user->isGuest){
				$this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'HOME', 'url'=>array('/videoCasting/index'),'itemOptions' => array('class'=>'active_tab')),
							array('label'=>'BOOK', 'url'=>array('/videoCasting/book')),
							array('label'=>'VIDEO PRESENTACIÓN', 'url'=>array('/videoCasting/presentation')),
							array('label'=>'COMPARTE TUS VIDEOS', 'url'=>array('/videoCasting/social'))
						),
						'htmlOptions' => array('class'=>'tab_prin',),
					)); 
			}?>
				
			<div class="slider_cast">

				<figcaption>
					<a href="">
						<img src="<?php echo Yii::app()->theme->baseUrl;?>/img_upl/img5.jpg">  <span class="ico_play"> </span>
					</a>
				</figcaption>

				<h2><a href="">Bienvenido al Casting Virtual de América Televisión. Entérate en qué consiste</a></h2>
				<ul class="balls">
					<li class="active_b"><a href=""></a></li>
					<li><a href=""></a></li>
					<li><a href=""></a></li>
					<li><a href=""></a></li>
				</ul>

			</div>
			
			<div class="cont_sorteos_semana">
				<h2 class="head_h2">SORTEOS DE LA SEMANA</h2>
				<div class="sort_semana">
					<ul class="princ_sem">
						<li class="active"><a href="">LOS MÁS VALORADOS</a></li>
						<li><a href="">LOS MÁS RECIENTES</a></li>
						<li class="bloq_search"> 
							<input name="" class="srch_s" value="Categorías" type="text"> <input class="btn_s" name="" type="button"> 
						</li>
					</ul>
					
					<div class="list_sorteo">
						<ul class="bloq_sorteo">
							
							<li class="span6">
								<figcaption>
									<a href="">
										<img src="<?php echo Yii::app()->theme->baseUrl;?>/img_upl/img5.jpg">
										<span class="ico_play2"> </span>
									</a>
								</figcaption>
								<h4> <span></span>12 005</h4>
								<h2><a href="">Yo cantando ando</a></h2>
								<h3><strong>Luisa Pérez López</strong></h3>
								<h3>Canto</h3>
							</li>
							
							
																		  
						</ul>	
						<div class="cont_btn">
						<a href="">VER TODOS <span>»</span></a>
						</div>
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