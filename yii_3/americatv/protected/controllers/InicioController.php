<?php
class InicioController extends Controller{

	public function actionIndex(){
		
		//conexion a las bases de datos
		//$dataProvider=CActiveRecord::model("ChatTemp")->findAll();
		$this->render('index',array(
			//"twitter"=>$twitter //variables a pasar a la vista
		));

	}

}