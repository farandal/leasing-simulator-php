<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>


<div class="form">
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'htmlOptions'=>array('class'=>'well'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Campos marcados con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->textFieldRow($model, 'username', array('class'=>'span3'));?>
	<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3'));?>
	<?php echo $form->checkBoxRow($model, 'rememberMe');?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit','type'=>'primary','label'=>'Submit', 'icon'=>'ok'));?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset','label'=>'Reset'));?>
	</div>

	<?php $this->endWidget(); ?>
</div><!-- form -->
