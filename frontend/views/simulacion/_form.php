<?php
/* @var $this SimulacionController */
/* @var $model Simulacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'simulacion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'prospecto_id'); ?>
		<?php echo $form->textField($model,'prospecto_id',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'prospecto_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pie'); ?>
		<?php echo $form->textField($model,'pie'); ?>
		<?php echo $form->error($model,'pie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c1'); ?>
		<?php echo $form->textField($model,'c1'); ?>
		<?php echo $form->error($model,'c1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'m1'); ?>
		<?php echo $form->textField($model,'m1'); ?>
		<?php echo $form->error($model,'m1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c2'); ?>
		<?php echo $form->textField($model,'c2'); ?>
		<?php echo $form->error($model,'c2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'m2'); ?>
		<?php echo $form->textField($model,'m2'); ?>
		<?php echo $form->error($model,'m2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c3'); ?>
		<?php echo $form->textField($model,'c3'); ?>
		<?php echo $form->error($model,'c3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'m3'); ?>
		<?php echo $form->textField($model,'m3'); ?>
		<?php echo $form->error($model,'m3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo $form->textField($model,'monto'); ?>
		<?php echo $form->error($model,'monto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'monto2'); ?>
		<?php echo $form->textField($model,'monto2'); ?>
		<?php echo $form->error($model,'monto2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'monto3'); ?>
		<?php echo $form->textField($model,'monto3'); ?>
		<?php echo $form->error($model,'monto3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado'); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'log1'); ?>
		<?php echo $form->textArea($model,'log1',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'log1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'log2'); ?>
		<?php echo $form->textArea($model,'log2',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'log2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'log3'); ?>
		<?php echo $form->textArea($model,'log3',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'log3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->