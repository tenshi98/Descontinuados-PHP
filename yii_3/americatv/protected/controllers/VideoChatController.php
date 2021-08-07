<?php
class VideoChatController extends Controller{
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
				'actions'=>array('video','chat'),
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
	
	
	//Index del sistema
	public function actionIndex(){
		
		if(isset($_POST['Postulante'])){
			$model=$this->loadModel(Yii::app()->user->getId());
			$model->attributes=$_POST['Postulante'];
			if($model->save(false)){
				$this->redirect(array('video'));
			}
		}
		$this->render("index");   
	}
	
	
	
	//Se inicia la videoconferencia
	public function actionVideo(){
		$model=$this->loadModel(Yii::app()->user->getId());

		$chatTemp = new PostulanteChatsTemp;
		$chatTemp->Nombre    = $model->alias;
		$chatTemp->url_img   = $model->url_img;
		$chatTemp->sala      = 'Video Chat';
		$chatTemp->save(false);
		
		$this->layout = '//layouts/principal_video';
		$this->render("video", array(
			'model'=>$model,
		));
		
		
	}
	
	//Se inicia el chat
	public function actionChat(){
	
		$model=$this->loadModel(Yii::app()->user->getId());
		$chatTemp = new PostulanteChatsTemp;
		$chatTemp->Nombre    = $model->alias;
		$chatTemp->url_img   = $model->url_img;
		$chatTemp->sala      = 'Chat';
		$chatTemp->save(false);
	
		//rendereo vista
		$this->layout = '//layouts/principal_chat';
		$this->render("chat");
			
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