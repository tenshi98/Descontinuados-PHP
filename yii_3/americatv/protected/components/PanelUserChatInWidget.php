<?php
	class PanelUserChatInWidget extends CWidget{
	  
	    public function init(){}
		
	    public function run(){  
			$dataProvider = QueryPostulante::model()->fullData(Yii::app()->user->getId());
			$model=Postulante::model()->findByPk(Yii::app()->user->getId());
	        $this->render("panelUserChatIn",array(
				'dataProvider'=>$dataProvider,
				'model'=>$model,
			));   
	    }
	}
	?>