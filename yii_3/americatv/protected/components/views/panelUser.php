<div class="datos_cast">
	<div class="prf_cast">
		
		<div class="span8">
			<figcaption>
				<?php if (isset($model['url_img'])&&$model['url_img']!=''){?>
					<img src="<?php echo $model['url_img'];?>">
				<?php }else{?>
					<img src="<?php echo Yii::app()->theme->baseUrl;?>/img_upl/img17.jpg">
				<?php } ?>
				<span class="budget"></span>
			</figcaption>													
		</div>
		
		<div class="span16">
			<h3><?php echo $model['PostNombres'];?></h3>
			<h4><?php echo $model['PostApellPapa'].' '.$model['PostApellMama'];?></h4>
			<h5>
			<?php //Calculo de la edad
				if($model['PostFecNac']!=0){
					function calculaedad($fechanacimiento){
						list($ano,$mes,$dia) = explode("-",$fechanacimiento);
						$ano_diferencia  = date("Y") - $ano;
						$mes_diferencia = date("m") - $mes;
						$dia_diferencia   = date("d") - $dia;
						if ($dia_diferencia < 0 || $mes_diferencia < 0)
							$ano_diferencia--;
						return $ano_diferencia;
					}
					// Se imprime la edad
					echo calculaedad($model['PostFecNac']).' años'; 
				}else{
					echo 'Sin Fecha de Nacimiento';
				}
			?>
			</h5>
			<h5><a href=""><?php echo $model['PostEmail'];?></a></h5>
		</div>
	</div>
	
	<div class="cont_presnt box">
		<div class="resultados">
			<h4>Presentación <span class="r_red">30%</span></h4>
			<div class="cont_resul">
				<span class="bg_r" style="width:30%;"></span>
			</div>
		</div>
		
		<div class="resultados">
			<h4>Book <span class="r_green">90%</span></h4>
			<div class="cont_resul">
				<span class="bg_g" style="width:90%;"></span>
			</div>
		</div>
	</div>
	
	<div class="edt_prf box">
		<div class="span20">
		<?php 
		$x=0;
		if(isset($model['profesion1'])&&$model['profesion1']!=''){
			echo $model['profesion1'];
		}else{$x++;}
		if(isset($model['profesion2'])&&$model['profesion2']!=''){
			echo ' - '.$model['profesion2'];
		}else{$x++;}
		if(isset($model['profesion3'])&&$model['profesion3']!=''){
			echo ' - '.$model['profesion3'];
		}else{$x++;}
		if($x==3){echo 'Sin Habilidades Seleccionadas';}
		?>
		</div>
		<div class="span4">
			<?php echo CHtml::link('Editar', array('videoCasting/perfil')); ?>
		</div>										
	</div>
	
	<div class="desc_cast box">
		<h3>Descripción</h3>
		<p><?php 
		if(isset($model['PostObjetivo'])&&$model['PostObjetivo']!=''){
			echo $model['PostObjetivo'];
		}else{
			echo 'Sin descripcion, edita tu perfil';
		}?></p>
	</div>
                                         
</div>