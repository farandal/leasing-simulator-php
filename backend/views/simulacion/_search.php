<?php
/* @var $this SimulacionController */
/* @var $model Simulacion */
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
		<?php echo $form->label($model,'prospecto_id'); ?>
		<?php echo $form->textField($model,'prospecto_id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pie'); ?>
		<?php echo $form->textField($model,'pie'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c1'); ?>
		<?php echo $form->textField($model,'c1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m1'); ?>
		<?php echo $form->textField($model,'m1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c2'); ?>
		<?php echo $form->textField($model,'c2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m2'); ?>
		<?php echo $form->textField($model,'m2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c3'); ?>
		<?php echo $form->textField($model,'c3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m3'); ?>
		<?php echo $form->textField($model,'m3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'monto'); ?>
		<?php echo $form->textField($model,'monto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'monto2'); ?>
		<?php echo $form->textField($model,'monto2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'monto3'); ?>
		<?php echo $form->textField($model,'monto3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log1'); ?>
		<?php echo $form->textArea($model,'log1',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log2'); ?>
		<?php echo $form->textArea($model,'log2',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'log3'); ?>
		<?php echo $form->textArea($model,'log3',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->