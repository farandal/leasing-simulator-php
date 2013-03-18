<?php
/* @var $this SeguroController */
/* @var $model Seguro */
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
		<?php echo $form->label($model,'r1'); ?>
		<?php echo $form->textField($model,'r1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'r2'); ?>
		<?php echo $form->textField($model,'r2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valor'); ?>
		<?php echo $form->textField($model,'valor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->