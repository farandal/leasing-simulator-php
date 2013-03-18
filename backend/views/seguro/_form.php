<?php
/* @var $this SeguroController */
/* @var $model Seguro */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'seguro-form',
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
		<?php echo $form->labelEx($model,'r1'); ?>
		<?php echo $form->textField($model,'r1'); ?>
		<?php echo $form->error($model,'r1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'r2'); ?>
		<?php echo $form->textField($model,'r2'); ?>
		<?php echo $form->error($model,'r2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model,'valor'); ?>
		<?php echo $form->error($model,'valor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->