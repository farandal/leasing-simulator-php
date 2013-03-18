<?php
/* @var $this TasaController */
/* @var $model Tasa */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tasa-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rango'); ?>
		<?php echo $form->textField($model,'rango'); ?>
		<?php echo $form->error($model,'rango'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tasa'); ?>
		<?php echo $form->textField($model,'tasa'); ?>
		<?php echo $form->error($model,'tasa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'compro'); ?>
		<?php echo $form->textField($model,'compro'); ?>
		<?php echo $form->error($model,'compro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comeje'); ?>
		<?php echo $form->textField($model,'comeje'); ?>
		<?php echo $form->error($model,'comeje'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->