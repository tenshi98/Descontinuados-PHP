<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'AmericaTV',
	//Se define el controlador por defecto
	'defaultController' => 'inicio/index',
	//Lenguaje predefinido
	'language'=>'es',
	//Tema de la aplicacion
	'theme'=>"americatv",
	// preloading 'log' component
	'preload'=>array('log'),
	//Ubicacion fisica de la carpeta de subidas
	'aliases'=>array(
        'upload'=>'/yii/americatv/ex_upload/',
		'videos'=>'/yii/americatv/ex_videos/',
		'mp3'=>'/yii/americatv/ex_mp3/',
		'img'=>'/yii/americatv/ex_img/',
    ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'upload.*',
		'ext.YiiMailer.YiiMailer',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123333',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			// Controlador con el login predefinido
            'loginUrl'=>array('login/login'),
		),

		// URL Limpias
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		


		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				 // uncomment the following to show log messages on web pages
				array(
					'class' => 'CWebLogRoute',
					'enabled' => YII_DEBUG,
					'levels' => 'error, warning, trace, notice',
					'categories' => 'application',
					'showInFireBug' => true,
				),
		
				/*array(
					'class'=>'CWebLogRoute',
				),*/
				
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'filesUbi'=>'/var/www/pruebas2',
		'miSaludo'=>'http://pruebas2.naturalphone.cl/yii/americatv/saludosVirtuales/misaludo?id=',
		'miVideo'=>'http://pruebas2.naturalphone.cl/yii/americatv/videoCasting/mivideo?id=',
		'miTarjeta'=>'http://pruebas2.naturalphone.cl/yii/americatv/saludosVirtuales/mitarjeta?id=',
		'openInviter'=>'http://pruebas2.naturalphone.cl/yii_openinviter/example.php?idUsuario=',
		'updatetarjeta'=>'http://pruebas2.naturalphone.cl/yii/americatv/saludosVirtuales/tarjetas5?id=',
	),
);
