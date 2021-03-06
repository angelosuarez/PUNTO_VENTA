<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'S O R I',
    'language'=>'es',
    'theme'=>'designa',
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
            'password'=>'123',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
            ),
        ),
        // application components
    'components'=>array(
        'user'=>array(
            'class'=>'WebUser',
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
            ),
            // uncomment the following to enable URLs in path-format
        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'rules'=>array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                ),
            ),
        'db'=>array(

//            'connectionString'=>'pgsql:host=localhost;port=5432;dbname=dev_sori',
            'connectionString'=>'pgsql:host=172.16.17.190;port=5432;dbname=sori',
            'emulatePrepare'=>true,
            'username'=>'postgres',
//            'password'=>'Nsusfd8263',

            'password'=>'123',
            'charset'=>'utf8',
            ),
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
                    /*array(
                        'class'=>'CWebLogRoute',
                        ),*/
                ),
            ),
        'enviarEmail'=>array(
                    'class'=>'application.components.EnviarEmail',
                ),
        ),
        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
    'params'=>array(
    // this is used in contact page
        'adminEmail'=>'manuel@newlifeve.com',
        ),
    );
