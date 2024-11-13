<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		'srbac' => array(
			'userclass'=>'User', 
			'userid'=>'id',
			'username'=>'username', 
			'debug'=>true,
			'pageSize'=>10,
			'superUser' =>'Admin',
		),
		// 'srbac'=>array(
        //     'userclass'=>'User', // Nama model User
        //     'userid'=>'id', // Primary key untuk tabel user
        //     'username'=>'username', // Field untuk username di tabel user
        //     'debug'=>true, // Set true untuk mode debug
        //     'pageSize'=>10,
        //     'superUser' =>'Admin', // Nama role untuk super user
        //     'layout'=>'application.views.layouts.main', // Layout yang digunakan
        //     'notAuthorizedView'=>'srbac.views.authitem.unauthorized', // View yang ditampilkan jika user tidak berizin
        //     'alwaysAllowed'=>array(
        //         'site/login','site/logout','site/index', // Aksi yang selalu bisa diakses
        //     ),
        //     'userActions'=>array('Show','View','List'),
        //     'listBoxNumberOfLines' => 15,
        //     'imagesPath' => 'srbac.images',
        //     'css'=>'srbac.css',
        // ),		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'admin',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'authManager'=>array(
            'class'=>'CDbAuthManager',
            'connectionID'=>'db',
            'itemTable'=>'AuthItem',
            'itemChildTable'=>'AuthItemChild',
            'assignmentTable'=>'AuthAssignment',
        ),
		'user'=>array(
			'class'=>'WebUser', // Menggunakan kelas WebUser yang baru
        	'allowAutoLogin'=>true,
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

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
