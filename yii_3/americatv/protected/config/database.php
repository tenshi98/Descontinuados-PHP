<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	//datos de la base de datos
	'connectionString' => 'mysql:host=localhost;dbname=casting',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'petland',
	//'password' => '',
	'charset' => 'utf8',
	
);