<?php
class LoginController extends Controller{

	//Se carga un layout distinto al que esta por defecto
	public $layout='//layouts/login';

	//Acciones para el inicio de sesion
	public function actionLogin()
	{
		$model=new LoginForm;

		// si las validaciones se hacen por ajax
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// se toman los datos del formulario
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// se renderea el formulario
		$this->render('login',array('model'=>$model));
	}
	
	//Acciones para el termino de sesion
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

}