<?php

/**
 * main.php
 *
 * This file holds frontend configuration settings.
 *
 * @author: antonio ramirez <antonio@clevertech.biz>
 * Date: 7/22/12
 * Time: 5:48 PM
 */

$frontendConfigDir = dirname(__FILE__);

$root = $frontendConfigDir . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..';

$params = require_once($frontendConfigDir . DIRECTORY_SEPARATOR . 'params.php');

// Setup some default path aliases. These alias may vary from projects.
Yii::setPathOfAlias('root', $root);
Yii::setPathOfAlias('common', $root . DIRECTORY_SEPARATOR . 'common');
Yii::setPathOfAlias('frontend', $root . DIRECTORY_SEPARATOR . 'frontend');
Yii::setPathOfAlias('www', $root. DIRECTORY_SEPARATOR . 'frontend' . DIRECTORY_SEPARATOR . 'www');

$mainLocalFile = $frontendConfigDir . DIRECTORY_SEPARATOR . 'main-local.php';
$mainLocalConfiguration = file_exists($mainLocalFile)? require($mainLocalFile): array();

$mainEnvFile = $frontendConfigDir . DIRECTORY_SEPARATOR . 'main-env.php';
$mainEnvConfiguration = file_exists($mainEnvFile) ? require($mainEnvFile) : array();

return CMap::mergeArray(
	array(
		// @see http://www.yiiframework.com/doc/api/1.1/CApplication#basePath-detail
		'basePath' => 'frontend',
		// set parameters
		'params' => $params,
		// preload components required before running applications
		// @see http://www.yiiframework.com/doc/api/1.1/CModule#preload-detail
		'preload' => array('bootstrap','log'),
		// @see http://www.yiiframework.com/doc/api/1.1/CApplication#language-detail
		'language' => 'es',
                //'theme' => 'bootstrap',
		// uncomment if a theme is used
		/*'theme' => '',*/
		// setup import paths aliases
		// @see http://www.yiiframework.com/doc/api/1.1/YiiBase#import-detail
		'import' => array(
			'common.components.*',
			'common.extensions.*',
			'common.models.*',
                        //'common.modules.*',
			// uncomment if behaviors are required
			// you can also import a specific one
			/* 'common.extensions.behaviors.*', */
			// uncomment if validators on common folder are required
			/* 'common.extensions.validators.*', */
			'application.components.*',
			'application.controllers.*',
			'application.models.*',
                        'application.modules.*',
                        'application.modules.user.models.*',
                        //'application.modules.api.components.*',
                    
                       /* 'application.modules.usergroup.models.*',*/
			
		),
                //'modulePath' => $params['local.path'].'common/modules/',
            
		/* uncomment and set if required */
		// @see http://www.yiiframework.com/doc/api/1.1/CModule#setModules-detail
		/* we need to uncomment the following to make use of "api" REST controllers */
		'modules' => array(
                        //'api',
			'user' => array(
                            //'class' => 'common.modules.user.UserModule',
                            //'path' => $params['local.path'].'common/modules/user',
                            /*'debug' => false,
                            'userTable' => 'user',
                            'translationTable' => 'translation',*/
                        ),
                       // 'usergroup' => array(
                            //'class' => 'common.modules.usergroup.UsergroupModule',
                            //'path' => $params['local.path'].'common/modules/usergroup',
                           /* 'usergroupTable' => 'usergroup',
                            'usergroupMessageTable' => 'user_group_message',*/
                       // ),
                       // 'membership' => array(
                            //'class' => 'common.modules.memebership.MembershipModule',
                            //'path' => $params['local.path'].'common/modules/memebers',
                            /*'membershipTable' => 'membership',
                            'paymentTable' => 'payment',*/
                       // ),
                        'friendship' => array(
                            //'class' => 'common.modules.friendship.FriendshipModule',
                            //'basePath' => $params['local.path'].'common/modules/friendship',
                           /* 'friendshipTable' => 'friendship',*/
                        ),
                        'profile' => array(
                            //'class' => 'common.modules.profile.ProfileModel',
                            //'path' => $params['local.path'].'common/modules/profile',
                          /*  'privacySettingTable' => 'privacysetting',
                            'profileFieldTable' => 'profile_field',
                            'profileTable' => 'profile',
                            'profileCommentTable' => 'profile_comment',
                            'profileVisitTable' => 'profile_visit',*/
                        ),
                        'role' => array(
                            //'class' => 'common.modules.role.RoleModel',
                            //'path' => $params['local.path'].'common/modules/role',
                           /* 'roleTable' => 'role',
                            'userRoleTable' => 'user_role',
                            'actionTable' => 'action',
                            'permissionTable' => 'permission',*/
                        ),
                        'message' => array(
                            //'class' => 'common.modules.message.MessageModule',
                            //'path' => $params['local.path'].'common/modules/message',
                          /*  'messageTable' => 'message',*/
                        ),

		),
		'components' => array(
                        /* load bootstrap components */
			/* 'request' => array(
                                'class' => 'application.modules.api.components.HttpRequest',
				'enableCsrfValidation' => true,
                         ),*/
                         /*'log'=>array(
                                'class'=>'CLogRouter',
                                'routes'=>array(
                                    array(
                                        'class'=>'CFileLogRoute',
                                        'levels'=>'trace',
                                        'categories'=>'system.*',
                                    ),
                                    array(
                                        'class'=>'CEmailLogRoute',
                                        'levels'=>'error, warning',
                                        'emails'=>'admin@example.com',
                                    ),
                                ),
                            ),*/
                    
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
				'rules' => $params["url.rules"]
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
                    
                     'ePdf' => array(
                            'class'         => 'common.extensions.yiipdf.EYiiPdf',
                            'params'        => array(
                                'mpdf'     => array(
                                    'librarySourcePath' => 'common.vendor.mpdf.*',
                                    'constants'         => array(
                                        '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                                    ),
                                    'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder.
                                    'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                                        #'mode'              => '', //  This parameter specifies the mode of the new document.
                                        'format'            => 'A4', // format A4, A5, ...
                                        'default_font_size' => 12, // Sets the default document font size in points (pt)
                                        #'default_font'      => '', // Sets the default font-family for the new document.
                                        'mgl'               => 15, // margin_left. Sets the page margins for the new document.
                                        'mgr'               => 15, // margin_right
                                        'mgt'               => 16, // margin_top
                                        'mgb'               => 16, // margin_bottom
                                        'mgh'               => 9, // margin_header
                                        'mgf'               => 9, // margin_footer
                                        'orientation'       => 'P', // landscape or portrait orientation
                                    )
                                ),
                                'HTML2PDF' => array(
                                    'librarySourcePath' => 'common.vendor.html2pdf.*',
                                    'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
                                    'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
                                        'orientation' => 'P', // landscape or portrait orientation
                                        'format'      => 'A4', // format A4, A5, ...
                                        'language'    => 'es', // language: fr, en, it ...
                                        'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
                                        'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
                                        'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
                                    )
                                )
								
								,
                                'PDFTK' => array(
                                    'librarySourcePath' => 'common.vendor.pdftk.*',
                                    'classFile'         => 'pdftk.php', // For adding to Yii::$classMap
                                    
                                )
								
								
                            ),
                        ),
                    
                    'mail' => array(
                        'class' => 'common.extensions.yiimail.YiiMail',
                         'transportType'=>'smtp',
                         'transportOptions'=>array(
                           'host'=>'smtp.gmail.com',
                           'username'=>'cotizaciones@rightwayleasing.cl',//contohna nama_email@yahoo.co.id
                           'password'=>'rway741..!',
                           'port'=>'465',
                           'encryption'=>'ssl',
                         ),
                        'viewPath' => 'application.views.mail',
                        'logging' => true,
                        'dryRun' => false
                    )  
                    
                    

		),
		/* make sure you have your cache set correctly before uncommenting */
		/* 'cache' => $params['cache.core'], */
		/* 'contentCache' => $params['cache.content'] */
	),
	CMap::mergeArray($mainEnvConfiguration, $mainLocalConfiguration)
);
