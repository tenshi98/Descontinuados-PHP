<?php
class VideoCastingController extends Controller{
	
	
	
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
				'actions'=>array('index','mivideo'),
				'users'=>array('*'),
			),
			//listado de vistas que solo los usuarios logueados pueden ver
			array('allow', 
				'actions'=>array('book','perfil','presentation','social',
								 'deptoSorted','provSorted','presentationMod1','presentationMod2','presentationMod3',
								 'borrarVideo1','borrarVideo2','borrarVideo3'),
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
	
	
	public function actionIndex(){
		
		$this->render("index");
	}
	
	public function actionBook(){
		//cargo la tabla
		$datosPers = QueryPostulante::model()->fullData(Yii::app()->user->getId());

		//rendereo vista
		$this->render('book',array(
			'datosPers'=>$datosPers,
		));
		
	}
	
	public function actionPerfil(){

		//cargo la tabla
		$profesiones = Profesion::model()->findAll(array('select'=>'ProfCod, ProfDesc', 'order'=>'ProfDesc'));
		$profesiones_list = CHtml::listData($profesiones, 'ProfCod', 'ProfDesc');
		
		$producciones = Producciones::model()->findAll(array('select'=>'idProd, ProdDesc', 'order'=>'ProdDesc'));
		$producciones_list = CHtml::listData($producciones, 'idProd', 'ProdDesc');
		
		$paises = UbicacionPais::model()->findAll(array('select'=>'idPais, Nombre', 'order'=>'Nombre'));
		$paises_list = CHtml::listData($paises, 'idPais', 'Nombre');
		
		$model=$this->loadModel(Yii::app()->user->getId());
		
		//ejecuto form
		if(isset($_POST['Postulante'])){
			
			if(isset($_POST['Postulante'])){}

			//Guardo el formulario
			$model->attributes=$_POST['Postulante'];
			if($model->save(false))
				$this->redirect(array(
				'book',
			));
		}		
				
		//rendereo vista
		$this->render('perfil',array(
			'profesiones'=>$profesiones_list,
			'producciones'=>$producciones_list,
			'paises'=>$paises_list,
			'model'=>$model,
		));
	}
	
	public function actionDeptoSorted(){
	
		$provincia = UbicacionProvincia::model()->findAll('idDepartamento=?',array($_POST['Postulante']['idDepartamento']));
		echo '<option value="0">Seleccione</option>';
		foreach($provincia as $data)
			echo '<option value="'.$data->idProvincia.'">'.$data->Nombre.'</option>';
	
	}
	
	public function actionProvSorted(){
	
		$distrito = UbicacionDistrito::model()->findAll('idProvincia=?',array($_POST['Postulante']['idProvincia']));
		echo '<option value="0">Seleccione</option>';
		foreach($distrito as $data)
			echo '<option value="'.$data->idDistrito.'">'.$data->Nombre.'</option>';
	
	}
	
	public function actionPresentation(){
		
		//cargo la tabla
		$datosPers = QueryPostulante::model()->fullData(Yii::app()->user->getId());
		
		//rendereo vista
		$this->render('presentation',array(
			'datosPers'=>$datosPers,
		));
	}
	
	public function actionPresentationMod1(){
		
		//cargo la tabla
		$datosPers = QueryPostulante::model()->fullData(Yii::app()->user->getId());
		$model=$this->loadModel(Yii::app()->user->getId());
		
		//Ejecuto Formulario
		if(isset($_POST['Postulante'])) {
		
			//Obtengo la id del usuario para renombrar los archivos
			$idUser = Yii::app()->user->getId();
            $model->attributes=$_POST['Postulante'];
			//Obtengo el nombre del archivo a subir
			$uploadFile = CUploadedFile::getInstance($model, 'vid_prof1');
			if($model->vid_prof1==''&&$uploadFile!=''){ 
				$fileName = $idUser.'_'."{$uploadFile}";
				$uploadFile->saveAs(Yii::app()->params['filesUbi'].Yii::getPathOfAlias('upload').'/'.$fileName);
				QueryPostulante::model()->update_video('vid_prof1', $fileName, $idUser);
				QueryPostulante::model()->update_video('vid_aprob1', '1', $idUser);
			}
			$this->redirect(array('presentation'));

		}	 

		//rendereo vista
		$this->render('presentationMod1',array(
			'model'=>$model,
			'datosPers'=>$datosPers,
		));
	}
	public function actionPresentationMod2(){
		
		//cargo la tabla
		$datosPers = QueryPostulante::model()->fullData(Yii::app()->user->getId());
		$model=$this->loadModel(Yii::app()->user->getId());
		
		//Ejecuto Formulario
		if(isset($_POST['Postulante'])) {
		
			//Obtengo la id del usuario para renombrar los archivos
			$idUser = Yii::app()->user->getId();
            $model->attributes=$_POST['Postulante'];
			//Obtengo el nombre del archivo a subir
			$uploadFile = CUploadedFile::getInstance($model, 'vid_prof2');
			if($model->vid_prof2==''&&$uploadFile!=''){ 
				$fileName = $idUser.'_'."{$uploadFile}";
				$uploadFile->saveAs(Yii::app()->params['filesUbi'].Yii::getPathOfAlias('upload').'/'.$fileName);
				QueryPostulante::model()->update_video('vid_prof2', $fileName, $idUser);
				QueryPostulante::model()->update_video('vid_aprob2', '1', $idUser);
			}
			$this->redirect(array('presentation'));

		}	 

		//rendereo vista
		$this->render('presentationMod2',array(
			'model'=>$model,
			'datosPers'=>$datosPers,
		));
	}
	public function actionPresentationMod3(){
		
		//cargo la tabla
		$datosPers = QueryPostulante::model()->fullData(Yii::app()->user->getId());
		$model=$this->loadModel(Yii::app()->user->getId());
		
		//Ejecuto Formulario
		if(isset($_POST['Postulante'])) {
		
			//Obtengo la id del usuario para renombrar los archivos
			$idUser = Yii::app()->user->getId();
            $model->attributes=$_POST['Postulante'];
			//Obtengo el nombre del archivo a subir
			$uploadFile = CUploadedFile::getInstance($model, 'vid_prof3');
			if($model->vid_prof3==''&&$uploadFile!=''){ 
				$fileName = $idUser.'_'."{$uploadFile}";
				$uploadFile->saveAs(Yii::app()->params['filesUbi'].Yii::getPathOfAlias('upload').'/'.$fileName);
				QueryPostulante::model()->update_video('vid_prof3', $fileName, $idUser);
				QueryPostulante::model()->update_video('vid_aprob3', '1', $idUser);
			}
			$this->redirect(array('presentation'));

		}	 

		//rendereo vista
		$this->render('presentationMod3',array(
			'model'=>$model,
			'datosPers'=>$datosPers,
		));
	}
	
	public function actionBorrarVideo1(){
		
		//Se conecta a la base de datos
		$model=$this->loadModel(Yii::app()->user->getId());
		
		//se borra la imagen fisica
		$pathimage = Yii::app()->params['filesUbi'].Yii::getPathOfAlias('upload').'/'.$model->vid_prof1;
		if (is_file($pathimage))
			{ // nota que no tiene apostrofes
			  unlink($pathimage); 
			}
		//Se actualizan los datos
        $model->vid_prof1 = ''; 
		$model->vid_aprob1 = 0; 
        $model->save(false);
		//redirijo
		$this->redirect(array('presentationMod1'));
	}
	public function actionBorrarVideo2(){
		
		//Se conecta a la base de datos
		$model=$this->loadModel(Yii::app()->user->getId());
		
		//se borra la imagen fisica
		$pathimage = Yii::app()->params['filesUbi'].Yii::getPathOfAlias('upload').'/'.$model->vid_prof2;
		if (is_file($pathimage))
			{ // nota que no tiene apostrofes
			  unlink($pathimage);
			}
		//Se actualizan los datos
        $model->vid_prof2 = ''; 
		$model->vid_aprob2 = 0; 
        $model->save(false);
		//redirijo
		$this->redirect(array('presentationMod2'));
	}
	public function actionBorrarVideo3(){
		
		//Se conecta a la base de datos
		$model=$this->loadModel(Yii::app()->user->getId());
		
		//se borra la imagen fisica
		$pathimage = Yii::app()->params['filesUbi'].Yii::getPathOfAlias('upload').'/'.$model->vid_prof3;
		if (is_file($pathimage))
			{ // nota que no tiene apostrofes
			  unlink($pathimage);
			}
		//Se actualizan los datos
        $model->vid_prof3 = ''; 
		$model->vid_aprob3 = 0; 
        $model->save(false);
		//redirijo
		$this->redirect(array('presentationMod3'));
	}
	
	
	
	
	
	
	public function actionSocial(){
		//Se consulta las tablas
		$model=$this->loadModel(Yii::app()->user->getId());
		$datosPers = QueryPostulante::model()->fullData(Yii::app()->user->getId());
		$correos = PostulanteCorreos::model()->findAll(array('select'=>'idPosCorreo,correo', 'order'=>'correo', 'condition'=>'id_usuario="'.Yii::app()->user->getId().'" '));


		
		$error='';

		//Ejecuto Formulario
		if(isset($_POST['enviar'])) {
			if (!Yii::app()->user->isGuest){
				$idUsuario = Yii::app()->user->getId();
			} else {
				$idUsuario = 0;    
			}
			$saludo = new SaludosTalento();
			$saludo->id_usuario = $idUsuario;
			if(!empty($_POST['video'])){$saludo->video = $_POST['video'];}
			if(!empty($_POST['correo'])){$saludo->correo = $_POST['correo'];}
			if(!empty($_POST['asunto'])){$saludo->asunto = $_POST['asunto'];}
			if (empty($_POST['video']))  $error['video']	  = 'No ha seleccionado un video a compartir';	
			if (empty($_POST['correo'])) $error['correo']	  = 'No ha ingresado un correo';
			if (empty($_POST['correo'])) $error['correo']	  = 'No ha ingresado un correo';
		
				if ( empty($error) ) {
					
					$count = PostulanteCorreos::Model()->count("id_usuario=:id_usuario", array("id_usuario" => $idUsuario));
					if($count==0){
						$talento = new PostulanteCorreos();
						$talento->id_usuario = $idUsuario;
						$talento->correo = $_POST['correo'];
						$talento->save(false);
					}
					
					if($saludo->save(false)){
						$ultimo_id = $saludo->primaryKey;
						if (!Yii::app()->user->isGuest){
							$email = $model->PostEmail;
							$nombre = $model->PostNombres.' '.$model->PostApellPapa.' '.$model->PostApellMama;
						} else {
							$email = 'anonimo@anonimo.com';
							$nombre = 'Anonimo';    
						}
						$mail = new YiiMailer();
						$mail->setFrom($email, $nombre);
						if(!empty($_POST['correo'])){$mail->setTo($_POST['correo']);}
						$mail->setSubject($_POST['asunto']);
						$mail->setBody('Te comparto mi video talento, entra a '.Yii::app()->params['miVideo'].$ultimo_id.'&video='.$_POST['video']);
						if ($mail->send()) {
							Yii::app()->user->setFlash('success', "Video Talento enviado correctamente");
						}else {
							Yii::app()->user->setFlash('success', "Fallo en el envio del Video Talento");
						}

						//redirijo
						$this->redirect(array('social'));
					}
				}
		}
		
		if(isset($_POST['enviar_varios'])) {
			if (!Yii::app()->user->isGuest){
				$idUsuario = Yii::app()->user->getId();
			} else {
				$idUsuario = 0;    
			}
			
			if (empty($_POST['video']))  $error['video']	  = 'No ha seleccionado un video a compartir';	

		
				if ( empty($error) ) {
				
					foreach($_POST["formId"] as $Valor){
						$saludo = new SaludosTalento();
						$saludo->id_usuario = $idUsuario;
						if(!empty($_POST['video'])){$saludo->video = $_POST['video'];}				
						if(!empty($_POST['asunto'])){$saludo->asunto = $_POST['asunto'];}	
						$saludo->correo = $Valor;

						if($saludo->save(false)){
							$ultimo_id = $saludo->primaryKey;
							if (!Yii::app()->user->isGuest){
								$email = $model->PostEmail;
								$nombre = $model->PostNombres.' '.$model->PostApellPapa.' '.$model->PostApellMama;
							} else {
								$email = 'anonimo@anonimo.com';
								$nombre = 'Anonimo';    
							}
							$mail = new YiiMailer();
							$mail->setFrom($email, $nombre);
							$mail->setTo($Valor);
							$mail->setSubject($_POST['asunto']);
							$mail->setBody('Te comparto mi video talento, entra a '.Yii::app()->params['miVideo'].$ultimo_id.'&video='.$_POST['video']);
							if ($mail->send()) {
								Yii::app()->user->setFlash('success', "Video Talento enviado correctamente");
							}else {
								Yii::app()->user->setFlash('success', "Fallo en el envio del Video Talento");
							}

							//redirijo
							$this->redirect(array('social'));
							
						}
					}
					
				}
		
		}

		$this->render("social", array(
			'model'=>$model,
			'datosPers'=>$datosPers,
			'error'=>$error,
			'correos'=>$correos,

		));
	}
	
	public function actionMiVideo($id, $video){
		
		$video = QueryVideoSaludos::model()->miVideo($id, $video);
		

		//rendereo vista
		$this->render('mivideo',array(
			'video'=>$video,
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