<div class="bloq_news">
    <div class="span16">  

		<script>
			var chat_username = '<?php echo $model->alias ?>';
			var type = '<?php echo $model->rol ?>';
		</script>
		
		
			
			<div class="CSSTableGenerator streaming_input" id="trans1" <?php if($model->rol==1){ echo 'style="display:none"';}?> >
				<table >
					<thead>
						<tr><th colspan="2">Crear Streaming</th></tr>
					</thead>
					<tbody>
						<tr>
							<td width="70%">
								<input type="hidden" id="session" title="Session" value="audio+video+data" >
								<input type="hidden" id="direction" title="Direction" value="one-way" >
								<input type="text" id="session-name"placeholder="Ingrese el nombre para la sesion" >
							</td>
							<td><button id="setup-new-session" class="setup">Crear nueva sesion</button></td>
						</tr> 
					</tbody>                  
				</table>
			</div>
			
						
	
			<div class="CSSTableGenerator streaming_input" id="trans2">
				<table id="rooms-list">
					<thead>
						<tr><th colspan="2">Streaming en emision</th></tr>
					</thead>
					<tbody>
													
					</tbody>              
				</table>
			</div>
		
		
		<div id="videos-container"></div>
		
		<?php if($model->rol==1){?>
		<div class="cont_chat_video box">
			<h2 style="display:none" id="trans5"><?php echo $model['PostNombres'].' '.$model['PostApellPapa'].' '.$model['PostApellMama'];?> dice:</h2>
			
			<div class="mod_chat" id="trans4" style="display:none">
				<div class="cont_chat">
					<textarea name="" cols="" rows="" id="chat-input"></textarea>
				</div>	
			</div>
		</div>
		<?php } else{ ?>
		<div id="trans5"></div>
		<div id="trans4" style="display:none"></div>
		<?php } ?>

	</div>	
		
	
	<aside class="span8" id="trans3">
		<?php  
			if (!Yii::app()->user->isGuest){
				$this->widget('PanelUserChatOutWidget'); 
			}
			$this->widget('PanelVideoChatRoomWidget'); 
		?>	
	</aside>


	<aside class="span8" id="trans6" style="display:none" >
		<div class="chat_area">
			<div id="chat_area">
				<div id="chat">
					<div id="chat-output"></div>
				</div>
				<div id="caja-mensaje">
					<input type="text" id="chat-input" placeholder="Escribir mensaje..." disabled style="display:none">
				</div> 
			</div>
		</div>
	</aside>

	
</div>