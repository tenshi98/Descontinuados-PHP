<?php
class HolaController extends CController{
	
	public function actionIndex(){
		//Llamo al contenido de una tabla
		$model=CActiveRecord::model("User")->findAll();
		//Cargo las variables manualmente
		$twitter = "bla";
		$this->render("index", array("model"=>$model,"twitter"=>$twitter));
	}

}