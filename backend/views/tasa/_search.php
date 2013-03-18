<?php
/* @var $this TasaController */
/* @var $model Tasa */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rango'); ?>
		<?php echo $form->textField($model,'rango'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tasa'); ?>
		<?php echo $form->textField($model,'tasa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'compro'); ?>
		<?php echo $form->textField($model,'compro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comeje'); ?>
		<?php echo $form->textField($model,'comeje'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->