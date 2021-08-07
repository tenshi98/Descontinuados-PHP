<?php
	class PanelUserWidget extends CWidget{
	  
	    public function init(){}
		
	    public function run(){  
			//Llamo al modelo correspondiente
			$dataProvider = QueryPostulante::model()->fullData(Yii::app()->user->getId());
			//$dataProvider=Postulante::model()->findByPk(Yii::app()->user->getId());
	        $this->render("panelUser",array(
				'model'=>$dataProvider
			));   
	    }
	}
	?>