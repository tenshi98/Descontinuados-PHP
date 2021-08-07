<?php
class VideoAdminController extends Controller{
	
	//Filtros en caso de ser necesarios
	public function filters()
	{
		return array(
			'accessControl', 
			'postOnly + delete', 
		);
	}
	
	
	//Control de accesos
	public function accessRules()
	{
		return array(
			//listado de vistas permitidas a los usuarios sin loguear
			array('allow',  
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			//listado de vistas que solo los usuarios logueados pueden ver
			array('allow', 
				'actions'=>array(''),
				'users'=>array('@'),
			),
			//Vistas a las que solo los administradores pueden acceder
			/*array('allow',
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
			//Redireccion al controlador y vista con el loguin
			array('deny',  
				'users'=>array('*'),
			),
		);
	}
	
	
	public function actionIndex($view, $columna){
		
		//cargo la tabla
		$model=$this->loadModel($view);

		//rendereo vista
		$this->render('index',array(
			'model'=>$model,
			'columna'=>$columna,
		));
		
	}
	
	

	
	//cargo modelo de la tabla
	public function loadModel($id)
	{
		$model=Postulante::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

}