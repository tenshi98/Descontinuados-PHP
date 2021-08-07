		<div class="datos_cast">
			<div class="prf_cast">
				<div class="span8">
					<figcaption>
						<?php if (isset($model->url_img)&&$model->url_img!=''){?>
							<img src="<?php echo $model->url_img;?>">
						<?php }else{?>
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/img_upl/img17.jpg">
						<?php } ?>
						<span><?php echo CHtml::link('Editar mi perfil', array('videoCasting/perfil')); ?></span>
					</figcaption>
				</div>
				<div class="span16">
					<h3><?php echo $model->PostNombres;?></h3>
					<h4><?php echo $model->PostApellPapa.' '.$model->PostApellMama;?></h4>
					<h5>Tu Alias</h5>
					<h4><?php echo $model->alias;?></h4>  
				</div>
			</div>
			<div class="btn_video_in vlog_off"><?php echo CHtml::link('ABANDONAR EL VIDEO CHAT', array('videoChat/index')); ?></div>
		</div>