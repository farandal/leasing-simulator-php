<?php
/**
 * main.php
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/22/12
 * Time: 5:48 PM
 *
 * This file holds the configuration settings of your backend application.
 **/
$backendConfigDir = dirname(__FILE__);

$root = $backendConfigDir . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';

$params = require_once($backendConfigDir . DIRECTORY_SEPARATOR . 'params.php');

// Setup some default path aliases. These alias may vary from projects.
Yii::setPathOfAlias('root', $root);
Yii::setPathOfAlias('common', $root . DIRECTORY_SEPARATOR . 'common');
Yii::setPathOfAlias('backend', $root . DIRECTORY_SEPARATOR . 'backend');
Yii::setPathOfAlias('www', $root. DIRECTORY_SEPARATOR . 'backend' . DIRECTORY_SEPARATOR . 'www');
/* uncomment if you need to use frontend folders */
/* Yii::setPathOfAlias('frontend', $root . DIRECTORY_SEPARATOR . 'frontend'); */


$mainLocalFile = $backendConfigDir . DIRECTORY_SEPARATOR . 'main-local.php';
$mainLocalConfiguration = file_exists($mainLocalFile)? require($mainLocalFile): array();

$mainEnvFile = $backendConfigDir . DIRECTORY_SEPARATOR . 'main-env.php';
$mainEnvConfiguration = file_exists($mainEnvFile) ? require($mainEnvFile) : array();

return CMap::mergeArray(
	array(
		'name' => 'RightWay Leasing',
		// @see http://www.yiiframework.com/doc/api/1.1/CApplication#basePath-detail
		'basePath' => 'backend',
		// set parameters
		'params' => $params,
		// preload components required before running applications
		// @see http://www.yiiframework.com/doc/api/1.1/CModule#preload-detail
		'preload' => array('bootstrap', 'log'),
		// @see http://www.yiiframework.com/doc/api/1.1/CApplication#language-detail
		'language' => 'en',
		// using bootstrap theme ? not needed with extension
//		'theme' => 'bootstrap',
		// setup import paths aliases
		// @see http://www.yiiframework.com/doc/api/1.1/YiiBase#import-detail
		'import' => array(
			'common.components.*',
			'common.extensions.*',
			/* uncomment if required */
			/* 'common.extensions.behaviors.*', */
			/* 'common.extensions.validators.*', */
			'common.models.*',
			// uncomment if behaviors are required
			// you can also import a specific one
			/* 'common.extensions.behaviors.*', */
			// uncomment if validators on common folder are required
			/* 'common.extensions.validators.*', */
			'application.components.*',
			'application.controllers.*',
			'application.models.*',
                        'application.modules.user.models.*',
                       
		),
		/* uncomment and set if required */
		// @see http://www.yiiframework.com/doc/api/1.1/CModule#setModules-detail
		'modules' => array(
			'gii' => array(
				'class' => 'system.gii.GiiModule',
				'password' => 'rway',
				'generatorPaths' => array(
					'bootstrap.gii'
				)
			),
                        'user' => array(
                            //'class' => 'common.modules.user.UserModule',
                            //'path' => $params['local.path'].'common/modules/user',
                            'debug' => false,
                            'userTable' => 'user',
                            'translationTable' => 'translation',
                        ),
                        //'usergroup' => array(
                            //'class' => 'common.modules.usergroup.UsergroupModule',
                            //'path' => $params['local.path'].'common/modules/usergroup',
                           /* 'usergroupTable' => 'usergroup',
                            'usergroupMessageTable' => 'user_group_message',*/
                        //),
                        //'membership' => array(
                            //'class' => 'common.modules.memebership.MembershipModule',
                            //'path' => $params['local.path'].'common/modules/memebers',
                            /*'membershipTable' => 'membership',
                            'paymentTable' => 'payment',*/
                        //),
                        //'friendship' => array(
                            //'class' => 'common.modules.friendship.FriendshipModule',
                            //'basePath' => $params['local.path'].'common/modules/friendship',
                           /* 'friendshipTable' => 'friendship',*/
                        //),
                        'profile' => array(
                            //'class' => 'common.modules.profile.ProfileModel',
                            //'path' => $params['local.path'].'common/modules/profile',
                           /* 'privacySettingTable' => 'privacysetting',
                            'profileFieldTable' => 'profile_field',
                            'profileTable' => 'profile',
                            'profileCommentTable' => 'profile_comment',
                            'profileVisitTable' => 'profile_visit',*/
                        ),
                        'role' => array(
                            //'class' => 'common.modules.role.RoleModel',
                            //'path' => $params['local.path'].'common/modules/role',
                          /*  'roleTable' => 'role',
                            'userRoleTable' => 'user_role',
                            'actionTable' => 'action',
                            'permissionTable' => 'permission',*/
                        ),
                        'message' => array(
                            //'class' => 'common.modules.message.MessageModule',
                            //'path' => $params['local.path'].'common/modules/message',
                            /*'messageTable' => 'message',*/
                        ),
		), 
		'components' => array(
			/* load bootstrap components */
			'bootstrap' => array(
				'class' => 'common.extensions.bootstrap.components.Bootstrap',
				'responsiveCss' => true,
			),
			'errorHandler' => array(
				// @see http://www.yiiframework.com/doc/api/1.1/CErrorHandler#errorAction-detail
				'errorAction'=>'site/error'
			),
                        'db' => array(
				'connectionString' => $params['db.connectionString'],
				'username' => $params['db.username'],
				'password' => $params['db.password'],
				'schemaCachingDuration' => YII_DEBUG ? 0 : 86400000, // 1000 days
		  		'enableParamLogging' => YII_DEBUG,
				'charset' => 'utf8'
			),
                        'urlManager' => array(
				'urlFormat' => 'path',
				'showScriptName' => false,
				'urlSuffix' => '/',
				'rules' => $params['url.rules']
			),
                        'mailer' => array(
				'class' => 'application.extensions.mailer.EMailer',
			),
			'user'=>array(
      			      'class' => 'application.modules.user.components.YumWebUser',
      			      'allowAutoLogin'=>true,
			      'loginUrl' => array('//user/user/login'),
    			),
                        'cache'=>array(
                            /* para utilizar cache de archivo es necesario que /public/frontend/runtime exista y sea escribible */
                            'class' => 'system.caching.CFileCache',
                            /* TODO: en producción esto debería configurarse para usar cmemcache, por ahora utilizaremos cache de archivo */
                            /*'class'=>'system.caching.CMemCache',
                            'servers'=>array(
                                array('host'=>'server1', 'port'=>11211, 'weight'=>60),
                                array('host'=>'server2', 'port'=>11211, 'weight'=>40),
                            ),*/
                            
                        ),
		),
		/* make sure you have your cache set correctly before uncommenting */
		/* 'cache' => $params['cache.core'], */
		/* 'contentCache' => $params['cache.content'] */
	),
	CMap::mergeArray($mainEnvConfiguration, $mainLocalConfiguration)
);