<?php
class SaludosVirtualesController extends Controller{
	
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
				'actions'=>array('index', 'saludo','combinado','misaludo','tarjetas','tarjetas2','tarjetas3','tarjetas4','tarjetas5','mitarjeta'),
				'users'=>array('*'),
			),
			//listado de vistas que solo los usuarios logueados pueden ver
			array('allow', 
				'actions'=>array('book',),
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
		

		$videoSaludoCat = SaludosVideosCategorias::model()->findAll(array('select'=>'idVideoCat, Nombre, img, n_enviados', 'order'=>'Nombre'));


		$this->render('index',array(
			'videoSaludoCat'=>$videoSaludoCat,
		));
		
	}
	
	public function actionSaludo($codigo){
		
		//cargo la tabla
		$sal01 = SaludosVideosListado::model()->findAll(array('select'=>'idVideoList,glosa', 'order'=>'glosa', 'condition'=>'idVideoCat="'.$codigo.'" and tipo=1 and estado=1'));
		$sal02 = SaludosVideosListado::model()->findAll(array('select'=>'idVideoList,glosa', 'order'=>'glosa', 'condition'=>'idVideoCat="'.$codigo.'" and tipo=2 and estado=1'));
		$sal03 = SaludosVideosListado::model()->findAll(array('select'=>'idVideoList,glosa', 'order'=>'glosa', 'condition'=>'idVideoCat="'.$codigo.'" and tipo=3 and estado=1'));
		$sal04 = SaludosVideosListado::model()->findAll(array('select'=>'idVideoList,glosa', 'order'=>'glosa', 'condition'=>'idVideoCat="'.$codigo.'" and tipo=4 and estado=1'));
		$opc1_list = CHtml::listData($sal01, 'idVideoList', 'glosa');
		$opc2_list = CHtml::listData($sal02, 'idVideoList', 'glosa');
		$opc3_list = CHtml::listData($sal03, 'idVideoList', 'glosa');
		$opc4_list = CHtml::listData($sal04, 'idVideoList', 'glosa');
		
		$img = SaludosVideosCategorias::model()->find(array('select'=>'img', 'condition'=>'idVideoCat="'.$codigo.'" '));
		$error='';

		if(isset($_POST['continuar'])){

			if (empty($_POST['sal01'])) $error['opc1']	  = 'No ha seleccionado su saludo de entrada';
			if (empty($_POST['sal02'])) $error['opc2'] 	  = 'No ha seleccionado su broma';
			if (empty($_POST['sal03'])) $error['opc3'] 	  = 'No ha seleccionado su invitacion';
			if (empty($_POST['sal04'])) $error['opc4'] 	  = 'No ha seleccionado su despedida';
			
			if ( empty($error) ) {
				$this->redirect(array(
						'combinado',
						'sal01'=>$_POST['sal01'],
						'sal02'=>$_POST['sal02'],
						'sal03'=>$_POST['sal03'],
						'sal04'=>$_POST['sal04'],
						'codigo'=>$codigo,
					));
			}	
		}

		//rendereo vista
		$this->render('saludo',array(
			'codigo'=>$codigo,
			'opc1'=>$opc1_list,
			'opc2'=>$opc2_list,
			'opc3'=>$opc3_list,
			'opc4'=>$opc4_list,
			'img'=>$img,
			'error'=>$error,
		));
		
	}
	
	public function actionCombinado($codigo,$sal01,$sal02,$sal03,$sal04){
		

		$error='';
	
		if(isset($_POST['enviar'])){

				if (empty($_POST['correo1'])) $error['correo1']	  = 'No ha ingresado un correo';

				if ( empty($error) ) {
				
					if (!Yii::app()->user->isGuest){
						$idUsuario = Yii::app()->user->getId();
					} else {
						$idUsuario = 0;    
					}
					$saludo = new SaludosVideosEnviados();
					$saludo->id_usuario = $idUsuario;
					$saludo->sal01 = $sal01;
					$saludo->sal02 = $sal02;
					$saludo->sal03 = $sal03;
					$saludo->sal04 = $sal04;
					if(!empty($_POST['correo1'])){$saludo->correo1 = $_POST['correo1'];}
					if(!empty($_POST['correo2'])){$saludo->correo2 = $_POST['correo2'];}
					if(!empty($_POST['correo3'])){$saludo->correo3 = $_POST['correo3'];}
					if(!empty($_POST['correo4'])){$saludo->correo4 = $_POST['correo4'];}
					if(!empty($_POST['correo5'])){$saludo->correo5 = $_POST['correo5'];}
					if(!empty($_POST['asunto'])){$saludo->asunto = $_POST['asunto'];}
					if(!empty($_POST['mensaje'])){$saludo->mensaje = $_POST['mensaje'];}

					if($saludo->save(false)){
						
						$ultimo_id = $saludo->primaryKey;
						
						$contarSaludo1 = SaludosVideosListado::model()->find(array('select'=>'n_enviados,idVideoCat', 'condition'=>'idVideoList="'.$sal01.'" '));
						$contarSaludo2 = SaludosVideosListado::model()->find(array('select'=>'n_enviados', 'condition'=>'idVideoList="'.$sal02.'" '));
						$contarSaludo3 = SaludosVideosListado::model()->find(array('select'=>'n_enviados', 'condition'=>'idVideoList="'.$sal03.'" '));
						$contarSaludo4 = SaludosVideosListado::model()->find(array('select'=>'n_enviados', 'condition'=>'idVideoList="'.$sal04.'" '));
						$cuenta1 = ($contarSaludo1->n_enviados)+1;
						$cuenta2 = ($contarSaludo2->n_enviados)+1;
						$cuenta3 = ($contarSaludo3->n_enviados)+1;
						$cuenta4 = ($contarSaludo4->n_enviados)+1;
						QueryVideoSaludos::model()->update_contador('saludos_videos_listado','n_enviados',$cuenta1,'idVideoList',$sal01);
						QueryVideoSaludos::model()->update_contador('saludos_videos_listado','n_enviados',$cuenta2,'idVideoList',$sal02);
						QueryVideoSaludos::model()->update_contador('saludos_videos_listado','n_enviados',$cuenta3,'idVideoList',$sal03);
						QueryVideoSaludos::model()->update_contador('saludos_videos_listado','n_enviados',$cuenta4,'idVideoList',$sal04);
						
						$contarCategoria = SaludosVideosCategorias::model()->find(array('select'=>'n_enviados', 'condition'=>'idVideoCat="'.$contarSaludo1->idVideoCat.'" '));
						$cuentaCat = ($contarCategoria->n_enviados)+1;
						QueryVideoSaludos::model()->update_contador('saludos_videos_categorias','n_enviados',$cuentaCat,'idVideoCat',$contarSaludo1->idVideoCat);

						
						if (!Yii::app()->user->isGuest){
							$model=$this->loadModel(Yii::app()->user->getId());
							$email = $model->PostEmail;
							$nombre = $model->PostNombres.' '.$model->PostApellPapa.' '.$model->PostApellMama;
						} else {
							$email = 'anonimo@anonimo.com';
							$nombre = 'Anonimo';    
						}
						$mail = new YiiMailer();
						$mail->setFrom($email, $nombre);
						$enviar_1 = '';
						$enviar_2 = '';
						$enviar_3 = '';
						$enviar_4 = '';
						$enviar_5 = '';
						if(!empty($_POST['correo1'])){$enviar_1 =$_POST['correo1'];}
						if(!empty($_POST['correo2'])){$enviar_2 =$_POST['correo2'];}
						if(!empty($_POST['correo3'])){$enviar_3 =$_POST['correo3'];}
						if(!empty($_POST['correo4'])){$enviar_4 =$_POST['correo4'];}
						if(!empty($_POST['correo5'])){$enviar_5 =$_POST['correo5'];}
						
						$mail->setTo(array($enviar_1,$enviar_2,$enviar_3,$enviar_4,$enviar_5));

						$mail->setSubject('Te comparto mi saludo');
						$mail->setBody('Te comparto mi saludo, entra a '.Yii::app()->params['miSaludo'].$ultimo_id);
						
						if ($mail->send()) {
							Yii::app()->user->setFlash('success', "Saludo enviado correctamente");
						}else {
							Yii::app()->user->setFlash('success', "Fallo en el envio del saludo");
						}
						
						//redirijo
						$this->redirect(array('index'));
				
					}	
				}
		}	

		//cargo la tabla
		$video1=SaludosVideosListado::model()->findByPk($sal01);
		$video2=SaludosVideosListado::model()->findByPk($sal02);
		$video3=SaludosVideosListado::model()->findByPk($sal03);
		$video4=SaludosVideosListado::model()->findByPk($sal04);
		
		$n1 = $video1->archivo;
		$n2 = $video2->archivo;
		$n3 = $video3->archivo;
		$n4 = $video4->archivo;

		$temp=$sal01.$sal02.$sal03.$sal04.'.mp4';
		$final='final_'.$sal01.$sal02.$sal03.$sal04.'.mp4';

		$path_ini = '/var/www/pruebas2/yii/americatv/ex_videos/';
		$path_des = '/var/www/pruebas2/yii/americatv/ex_videos/Combinados/';
		
		$comando="mencoder -ovc copy -oac mp3lame  $path_ini$n1 $path_ini$n2 $path_ini$n3 $path_ini$n4 -o $path_des$temp";
		shell_exec($comando);

		$comando="ffmpeg -i $path_des$temp -vcodec copy -acodec aac -strict experimental -ab 384k $path_des$final";
		shell_exec($comando);
		
		$comando="rm $path_des$temp";
		shell_exec($comando);
		
		
		$this->render('combinado',array(
			'error'=>$error,
			'final'=>$final,
			'codigo'=>$codigo,

		));
	
	
	}
	
	public function actionTarjetas(){
		//cargo la tabla
		$tarjetaSaludoCat = SaludosTarjetasCategorias::model()->findAll(array('select'=>'idTarjetaCat, Nombre, img, n_enviados', 'order'=>'Nombre'));

		//rendereo vista
		$this->render('tarjetas',array(
			'tarjetaSaludoCat'=>$tarjetaSaludoCat,
		));
	}
	public function actionTarjetas2($codigo){
		//cargo la tabla
		$motivos = SaludosTarjetasListado::model()->findAll(array('select'=>'idTarjetaList,img, motivo, n_enviados', 'order'=>'idTarjetaList', 'condition'=>'idTarjetaCat="'.$codigo.'" and estado=1'));

		//rendereo vista
		$this->render('tarjetas2',array(
			'motivos'=>$motivos,
			'codigo'=>$codigo,
		));
	}
	public function actionTarjetas3($codigo, $tarjeta){
		//cargo la tabla
		$musica = SaludosTarjetasMusica::model()->findAll(array('select'=>'NombreArchivo,Nombre', 'order'=>'Nombre'));
		$musica_list = CHtml::listData($musica, 'NombreArchivo', 'Nombre');
		$error='';

		if(isset($_POST['enviar'])){
				
				if(empty($_POST['correo1'])) $error['correo1']	  = 'No ha ingresado un correo';

				if ( empty($error) ) {
				
					if (!Yii::app()->user->isGuest){
						$idUsuario = Yii::app()->user->getId();
					} else {
						$idUsuario = 0;    
					}
					if (!empty($_POST['musica'])){
						$musicId = SaludosTarjetasMusica::model()->find(array('select'=>'idMusica', 'condition'=>'NombreArchivo="'.$_POST['musica'].'" '));
						$identMusica = $musicId->idMusica;
					} else {
						$identMusica = 0;    
					}

					$saludo = new SaludosTarjetasEnviados();
					$saludo->id_usuario = $idUsuario;
					$saludo->codigo = $codigo;
					$saludo->tarjeta = $tarjeta;
					$saludo->idMusica = $identMusica;

					
					if(!empty($_POST['correo1'])){$saludo->correo1 = $_POST['correo1'];}
					if(!empty($_POST['correo2'])){$saludo->correo2 = $_POST['correo2'];}
					if(!empty($_POST['correo3'])){$saludo->correo3 = $_POST['correo3'];}
					if(!empty($_POST['correo4'])){$saludo->correo4 = $_POST['correo4'];}
					if(!empty($_POST['correo5'])){$saludo->correo5 = $_POST['correo5'];}
					if(!empty($_POST['asunto'])){$saludo->asunto = $_POST['asunto'];}
					if(!empty($_POST['mensaje'])){$saludo->mensaje = $_POST['mensaje'];}

					if($saludo->save(false)){
					
						$contarTarjeta = SaludosTarjetasListado::model()->find(array('select'=>'n_enviados', 'condition'=>'idTarjetaList="'.$tarjeta.'" '));
						$cuenta = ($contarTarjeta->n_enviados)+1;
						QueryVideoSaludos::model()->update_contador('saludos_tarjetas_listado','n_enviados',$cuenta,'idTarjetaList',$tarjeta);
						
						$contarCategoria = SaludosTarjetasCategorias::model()->find(array('select'=>'n_enviados', 'condition'=>'idTarjetaCat="'.$codigo.'" '));
						$cuentaCat = ($contarCategoria->n_enviados)+1;
						QueryVideoSaludos::model()->update_contador('saludos_tarjetas_categorias','n_enviados',$cuentaCat,'idTarjetaCat',$codigo);

						$ultimo_id = $saludo->primaryKey;

						
						$this->redirect(array('tarjetas4',
							'id'=>$ultimo_id,
						));

		
				
					}
				}
		}
	
		$this->render('tarjetas3',array(
			'musica'=>$musica_list,
			'error'=>$error,
		));
	}
	
	public function actionTarjetas4($id){
		$model=SaludosTarjetasEnviados::model()->findByPk($id);
		
		//Ejecuto Formulario
		if(isset($_POST['SaludosTarjetasEnviados'])) {

			$idUser = Yii::app()->user->getId();
            $model->attributes=$_POST['SaludosTarjetasEnviados'];
			$uploadFile = CUploadedFile::getInstance($model, 'VideoSaludo');
			$uploadFile = str_replace(' ', '_', $uploadFile);
			
			if($model->VideoSaludo==''&&$uploadFile!=''){ 
			
				$fileName = 'Saludo_'.$id.'_'.$idUser.'_'."{$uploadFile}";
				$uploadFile->saveAs(Yii::app()->params['filesUbi'].Yii::getPathOfAlias('upload').'/'.$fileName);
				QueryVideoSaludos::model()->update_saludo('saludos_tarjetas_enviados','VideoSaludo',$fileName,'idTarjetas',$id);
			
			}
		}	 

		
		$this->render('tarjetas4',array(
			'model'=>$model,
			'id'=>$id,
		));
	}
	
	public function actionTarjetas5($id){
		
		$model = QueryVideoSaludos::model()->correosSaludo($id);

		if (!Yii::app()->user->isGuest){
			$usuario=$this->loadModel(Yii::app()->user->getId());
			$email = $usuario->PostEmail;
			$nombre = $usuario->PostNombres.' '.$usuario->PostApellPapa.' '.$usuario->PostApellMama;
		} else {
			$email = 'anonimo@anonimo.com';
			$nombre = 'Anonimo';    
		}
		$mail = new YiiMailer();
						
		$mail->setFrom($email, $nombre);
					
		$enviar_1 = '';
		$enviar_2 = '';
		$enviar_3 = '';
		$enviar_4 = '';
		$enviar_5 = '';
		if($model['correo1']!=''){$enviar_1 = $model['correo1'];}
		if($model['correo2']!=''){$enviar_2 = $model['correo2'];}
		if($model['correo3']!=''){$enviar_3 = $model['correo3'];}
		if($model['correo4']!=''){$enviar_4 = $model['correo4'];}
		if($model['correo5']!=''){$enviar_5 = $model['correo5'];}
		
		$mail->setTo(array($enviar_1,$enviar_2,$enviar_3,$enviar_4,$enviar_5));

		$mail->setSubject('Te comparto mi tarjeta');
		$mail->setBody('Te comparto mi tarjeta, entra a '.Yii::app()->params['miTarjeta'].$id);
						
		if ($mail->send()) {
			Yii::app()->user->setFlash('success', "Tarjeta enviada correctamente");
		}else {
			Yii::app()->user->setFlash('success', "Fallo en el envio de la tarjeta");
		}	

		$this->redirect(array('index'));
	}
	
	
	
	
	public function actionMiSaludo($id){
		
		$video = QueryVideoSaludos::model()->miSaludo($id);

		$n1 = $video['vid01'];
		$n2 = $video['vid02'];
		$n3 = $video['vid03'];
		$n4 = $video['vid04'];

		$temp=$video['sal01'].$video['sal02'].$video['sal03'].$video['sal04'].'.mp4';
		$final='final_'.$video['sal01'].$video['sal02'].$video['sal03'].$video['sal04'].'.mp4';

		$path_ini = '/var/www/pruebas2/yii/americatv/ex_videos/';
		$path_des = '/var/www/pruebas2/yii/americatv/ex_videos/Combinados/';
		
		$comando="mencoder -ovc copy -oac mp3lame  $path_ini$n1 $path_ini$n2 $path_ini$n3 $path_ini$n4 -o $path_des$temp";
		shell_exec($comando);

		$comando="ffmpeg -i $path_des$temp -vcodec copy -acodec aac -strict experimental -ab 384k $path_des$final";
		shell_exec($comando);
		
		$comando="rm $path_des$temp";
		shell_exec($comando);
		
		$this->render('misaludo',array(
			'video'=>$video,
			'final'=>$final,
		));
	}
	
	public function actionMiTarjeta($id){
		
		$tarjeta = QueryVideoSaludos::model()->miTarjeta($id);
		$this->render('mitarjeta',array(
			'tarjeta'=>$tarjeta,
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