<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'VAG DataCenter',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>false,
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		//*/
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=VAG',
			'emulatePrepare' => true,
			'enableParamLogging' => true,
			'username' => 'DataCenter',
			'password' => '45fb2e0533b1f4d1e80f1504a65738be',
			'charset' => 'utf8',
		),
		'dbSecret'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=VAGPatientsSecret',
			'emulatePrepare' => true,
			'enableParamLogging' => true,
			'username' => 'DataCenter',
			'password' => '45fb2e0533b1f4d1e80f1504a65738be',
			'charset' => 'utf8',
			'class'=> 'CDbConnection',
		),
		//*/
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
				//*
				array(
					'class'=>'CWebLogRoute',
				),//*/
			),
		),
		//http://www.bsourcecode.com/2012/12/ftp-file-transfer-using-yii/
		'ftp'=>array(
         	'class'=>'application.extensions.ftp.EFtpComponent',
          	'host'=>'ftp.vibroarthrography.com',
          	'port'=>21,
          	'username'=>'lmu',
          	'password'=>'d41d8cd98f00b204e9800998ecf8427e',
          	'ssl'=>false,
          	'timeout'=>90,
          	'autoConnect'=>true,
		),
		/*
		'authManager'=>array(
			'class'=>'CDbAuthManager',
			'connectionID'=>'db',
		),//*/
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'oussama.jarrousse@gmail.com',
	),
);