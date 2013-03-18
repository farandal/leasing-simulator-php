<?php

if(!isset($model)) 
	$model = new YumUserLogin();

$module = Yum::module();

$this->pageTitle = Yum::t('Login');
if(isset($this->title))
$this->title = Yii::app()->name .' - '.Yum::t('Login');
$this->breadcrumbs=array(Yum::t('Login'));

Yum::renderFlash();

?>

<style>

#flashcontent { border-right:3px blue solid; }

</style>
<script type="text/javascript">

$(document).ready(function() {

	swfobject.embedSWF("/img/home.swf", "flashcontent", "505", "320", "9.0.0", "expressInstall.swf");


});


</script>


<div class="row">
    <div class="span4">

<div class="form"> 
	<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'htmlOptions'=>array('class'=>'well'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


        <p class="note">
            <?=Yum::t('Please fill out the following form with your login credentials:')?>
        </p>
        
        <p class="error">
            <? echo CHtml::errorSummary($model); ?>
        </p>
        
        
        
        <? 
	/*	if($module->loginType & UserModule::LOGIN_BY_USERNAME 
				|| $module->loginType & UserModule::LOGIN_BY_LDAP)
		echo CHtml::activeLabelEx($model,'username'); 
		if($module->loginType & UserModule::LOGIN_BY_EMAIL)
			printf ('<label for="YumUserLogin_username">%s <span class="required">*</span></label>', Yum::t('E-Mail address')); 
		if($module->loginType & UserModule::LOGIN_BY_OPENID)
			printf ('<label for="YumUserLogin_username">%s <span class="required">*</span></label>', Yum::t('OpenID username'));  */?>

        <? //echo CHtml::activeTextField($model,'username') ?>
        
        
	<?php echo $form->textFieldRow($model, 'username', array('class'=>'span3'));?>
       
        
	<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3'));?>
	
        
        	<? //echo CHtml::activeLabelEx($model,'password'); ?>
		<? //echo CHtml::activePasswordField($model,'password');
		/*if($module->loginType & UserModule::LOGIN_BY_OPENID)
			echo '<br />'. Yum::t('When logging in with OpenID, password can be omitted');*/
                ?>
        
       
        <?php echo $form->checkBoxRow($model, 'rememberMe');?>
        
        
        
        <div class="row">
	<p class="hint">
	<? 
	if(Yum::hasModule('registration') && Yum::module('registration')->enableRegistration)
	echo CHtml::link(Yum::t("Registration"),
			Yum::module('registration')->registrationUrl);
	if(Yum::hasModule('registration') 
			&& Yum::module('registration')->enableRegistration
			&& Yum::module('registration')->enableRecovery)
	echo ' | ';
	if(Yum::hasModule('registration') 
			&& Yum::module('registration')->enableRecovery) 
	echo CHtml::link(Yum::t("Lost password?"),
			Yum::module('registration')->recoveryUrl);
	?>
        </p>
	</div>
        
       
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'primary','label'=>'Submit', 'icon'=>'ok'));?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset','label'=>'Reset'));?>
	</div>
        
        <?
        if(isset($_GET['action']))
                echo CHtml::hiddenField('returnUrl', urldecode($_GET['action']));
        ?>


	<?php $this->endWidget(); ?>
</div><!-- form -->


</div>
    <div class="span6">

<div id="flashcontent">

</div>

</div>
 </div>
   

<?
/*$form = new CForm(array(
			'elements'=>array(
				'username'=>array(
					'type'=>'text',
					'maxlength'=>32,
					),
				'password'=>array(
					'type'=>'password',
					'maxlength'=>32,
					),
				'rememberMe'=>array(
					'type'=>'checkbox',
					)
				),

			'buttons'=>array(
				'login'=>array(
					'type'=>'submit',
					'label'=>'Login',
					),
				),
			), $model);*/
?>

