<?php
	        $baseurl = Yii::app()->request->baseUrl;
                /*Yii::app()->clientscript
		->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap.css' )
		->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap-responsive.css' )*/
?>
<!doctype html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="nl"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="nl"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="nl"><![endif]-->
<!--[if IE]><html class="no-js ie" lang="nl"><![endif]-->
<!--[if !IE]><!--><html class="no-js" lang="nl"><!--<![endif]-->

   
    <head>
 <meta name="google-site-verification" content="62PHqEiEzuda8TW9Janluavso5rdlDptTSqXsyYRXXI" />
		
        <!-- FAV AND TOUCH ICONS -->
            <link rel="shortcut icon" href="<?=$baseurl?>/images/favicon.ico">
            <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=$baseurl?>images/apple-touch-icon-144-precomposed.png" />
            <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=$baseurl?>images/apple-touch-icon-114-precomposed.png" />
            <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=$baseurl?>images/apple-touch-icon-72-precomposed.png" />
            <link rel="apple-touch-icon-precomposed" href="<?=$baseurl?>images/apple-touch-icon-57-precomposed.png" />
		
            	

	<meta name="csrf" content="<?php echo Yii::app()->request->getCsrfToken();?>"/>

            
        <!-- FONTS -->
       
            <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' />  -->
            <!-- <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css' /> --> 
           	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ubuntu">
			<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=McLaren">
            
            <!--[if lt IE 9]>
                <link href="http://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
                <link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
                <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
                <link href="http://fonts.googleapis.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
            <![endif]-->
  
   
   		<!-- PLUGIN CSS -->

            <link rel="stylesheet" href="<?=$baseurl?>/app/spdlo/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="<?=$baseurl?>/app/spdlo/bootstrap/css/bootstrap-responsive.min.css">
            <!-- <link href="<?=$baseurl?>/app/spdlo/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" type="text/css" />-->
            <link href="<?=$baseurl?>/app/spdlo/css/icons.css" rel="stylesheet" type="text/css" />
            <link href="<?=$baseurl?>/app/spdlo/css/supr-theme/jquery.ui.supr.css" rel="stylesheet" type="text/css"/>
            <link href="<?=$baseurl?>/app/spdlo/plugins/qtip/jquery.qtip.css" rel="stylesheet" type="text/css" />
            <link href="<?=$baseurl?>/app/spdlo/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
            <link href="<?=$baseurl?>/app/spdlo/plugins/jpages/jPages.css" rel="stylesheet" type="text/css" />
            <link href="<?=$baseurl?>/app/spdlo/plugins/prettify/prettify.css" type="text/css" rel="stylesheet" />
            <link href="<?=$baseurl?>/app/spdlo/plugins/inputlimiter/jquery.inputlimiter.css" type="text/css" rel="stylesheet" />
            <link href="<?=$baseurl?>/app/spdlo/plugins/ibutton/jquery.ibutton.css" type="text/css" rel="stylesheet" />
            <link href="<?=$baseurl?>/app/spdlo/plugins/uniform/uniform.default.css" type="text/css" rel="stylesheet" />
            <link href="<?=$baseurl?>/app/spdlo/plugins/color-picker/color-picker.css" type="text/css" rel="stylesheet" />
            <link href="<?=$baseurl?>/app/spdlo/plugins/select/select2.css" type="text/css" rel="stylesheet" />
            <link href="<?=$baseurl?>/app/spdlo/plugins/validate/validate.css" type="text/css" rel="stylesheet" />
            <link href="<?=$baseurl?>/app/spdlo/plugins/pnotify/jquery.pnotify.default.css" type="text/css" rel="stylesheet" />
            <link href="<?=$baseurl?>/app/spdlo/plugins/pretty-photo/prettyPhoto.css" type="text/css" rel="stylesheet" />
            <link href="<?=$baseurl?>/app/spdlo/plugins/smartWizzard/smart_wizard.css" type="text/css" rel="stylesheet" />
            <link href="<?=$baseurl?>/app/spdlo/plugins/dataTables/jquery.dataTables.css" type="text/css" rel="stylesheet" />
            <link href="<?=$baseurl?>/app/spdlo/plugins/elfinder/elfinder.css" type="text/css" rel="stylesheet" />
            <link href="<?=$baseurl?>/app/spdlo/plugins/plupload/jquery.ui.plupload/css/jquery.ui.plupload.css" type="text/css" rel="stylesheet" />
            <link rel="stylesheet" href="<?=$baseurl?>/app/spdlo/css/nivo-slider.css">
            <link rel="stylesheet" href="<?=$baseurl?>/app/spdlo/nivo-themes/bar/bar.css" type="text/css" media="screen" />
            <link rel="stylesheet" href="<?=$baseurl?>/app/spdlo/nivo-themes/light/light.css" type="text/css" media="screen" />

   
            <!-- HTML5 SHIM, for IE6-8 support of HTML5 elements -->
            <!--[if lt IE 9]>
              <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
 
            <!-- FRONTEND STYLES -->
            <link rel="stylesheet" href="<?=$baseurl?>/app/spdlo/css/style.css">
            <!-- BACKEND STYLES -->
            <link href="<?=$baseurl?>/app/spdlo/css/backend.css" rel="stylesheet" type="text/css"  media="screen" /> 
		
			
		
        
            <!-- JAVASCRIPT LIBRARIES 
            ================================================== -->
            
            
            <script src="<?=$baseurl?>/app/spdlo/js/config.js"></script>
           
         <!--   <script src="<?=$baseurl?>/app/spdlo/js/jquery-1.8.1.min.js"></script>
            <script src="<?=$baseurl?>/app/spdlo/bootstrap/js/bootstrap.min.js"></script> -->
      
                <meta charset="utf-8">
		<title><?=h($this->pageTitle)?></title>
		<meta name="description" content="Page description here">
		<meta name="author" content="Speedelo">
		<meta name="viewport" content="width=device-width">
        
                <script src="<?=$baseurl?>/js/jquery.Validator.js"></script>
                <script src="<?=$baseurl?>/js/jquery.Rut.js"></script>
		<script src="<?=$baseurl?>/js/swfobject/swfobject.js"></script>

<script src="<?=$baseurl?>/js//jwplayer/jwplayer.js"></script>
<script>jwplayer.key="BzI2FSVCrt/vFVjx+lr2zFFwZEoaf1cAWRK+Ug=="</script>                

	</head>

	<body>
    
		<!-- Facebook div for like button -->
		<div id="fb-root"></div>

		<!-- Div for shade line -->
		<div class="header-shadow"></div>

		<!--<div class="container-fluid">-->
                <div class="container">

			<div class="row-fluid print-show">
				<div class="span12">
					Alternate header for print version
				</div>
			</div>

			<div class="row-fluid print-hide">
				
				<div class="span12">
					<div class="navbar pull-right header-nav">
						<ul class="nav">
							<li class="dropdown">
							<? $logged_in = !Yii::app()->user->isGuest; ?>
							<? if(!$logged_in) { ?>
								<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?=Yii::t('user', 'login')?></a>
								<ul class="dropdown-menu">
									<li>
										<div class="dropdown-content">
											<br>
                                                                                            <?php $this->widget('application.modules.user.components.LoginWidget'); ?>
                                                                                        <br>
										</div>
									</li>
								</ul>
							
							<? } else { ?>
								
   								<a href="/user/auth/logout"><?=Yii::t('logout', 'Logout')?></a>
                                                                
								

							<? } ?>
							
							</li>
							
						</ul>
					</div>
				</div>
			</div>

			<div class="row-fluid print-hide">
				<div class="span3">
                                    <div id="logo">
                                    
					<img src="<?=$baseurl?>/app/spdlo/img/logo.png" alt="Logo">
                                    </div>
                                
                                </div>
				
               			 <div class="span9">
                
                		</div>
                    
                    
		    </div>
		
			<div class="row-fluid print-hide">
				<div class="span12">
					<div class="navbar main-nav">
						<div class="navbar-inner">
							<div class="container">
								<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">menu</a>
								<div class="nav-collapse">
										<?php $this->widget('zii.widgets.CMenu',array(
                                                                                            'htmlOptions' => array( 'class' => 'nav' ),
                                                                                            'activeCssClass'	=> 'active',
                                                                                            'items'=>array(
                                                                                                    array('label'=>'Home', 'url'=>array('/site/index')),
                                                                                                   /* array('label'=>'Login', 'url'=>array('/user/auth/login'), 'visible'=>Yii::app()->user->isGuest),
                                                                                                    array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/user/auth/logout'), 'visible'=>!Yii::app()->user->isGuest)*/
                                                                                                    array('label'=>'Cotizaciones', 'url'=>array('/prospecto'),'visible'=>!Yii::app()->user->isGuest),
                                                                                                    array('label'=>'Manual', 'url'=>array('/help')),
                                                                                            ),
                                                                                    )); ?>

                                                                                   <?php if (!Yii::app()->user->isGuest) : ?>
                                                                                   
                                                                                        <div class="pull-right">

                                                                                             <p class="navbar-text pull-right">Logged in as <a href="#"><?=Yii::app()->user->name?></a></p>

                                                                                                        <ul class="nav ">
                                                                                                    <li class="divider-vertical"></li>
                                                                                                    <li class="dropdown">
                                                                                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-envelope"></i></a>
                                                                                                            <ul class="dropdown-menu">
                                                                                                                    <li>
                                                                                                                            <div class="dropdown-content dropdown-content-wide">
                                                                                                                                     <?php $this->widget('application.modules.user.components.YumUserMenu'); ?>
                                                                                                                            </div>
                                                                                                                    </li>
                                                                                                            </ul>
                                                                                                    </li>

                                                                                            </ul>


                                                                                        </div>     
                                                                                    
                                                                                    <?php endif; ?>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

				
		<?=$content?>
	
            
            
                                <div class="row-fluid print-show">
					<div class="span12">
						RightWay Leasing
					</div>
				</div>

			</div>

		

	</body>

</html>
