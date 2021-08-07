<div class="bloq_news">
	<div class="span16"> 
	

	
	</div>
	<aside class="span8">
		<?php  
			if (!Yii::app()->user->isGuest){
				$this->widget('PanelUserChatInWidget'); 
			}
			$this->widget('PanelVideoChatRoomWidget'); 
		?>													
	</aside>
</div>