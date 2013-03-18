<?php
/* @var $this ProspectoController */
/* @var $model Prospecto */
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
		<?php echo $form->label($model,'pe_nombre'); ?>
		<?php echo $form->textField($model,'pe_nombre',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pe_apellido'); ?>
		<?php echo $form->textField($model,'pe_apellido',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pe_rut'); ?>
		<?php echo $form->textField($model,'pe_rut',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pe_telefono'); ?>
		<?php echo $form->textField($model,'pe_telefono',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pe_celular'); ?>
		<?php echo $form->textField($model,'pe_celular',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pe_email'); ?>
		<?php echo $form->textField($model,'pe_email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'em'); ?>
		<?php echo $form->textField($model,'em'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'em_nombre'); ?>
		<?php echo $form->textField($model,'em_nombre',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'em_rut'); ?>
		<?php echo $form->textField($model,'em_rut',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eq_tipo'); ?>
		<?php echo $form->textField($model,'eq_tipo',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eq_marca'); ?>
		<?php echo $form->textField($model,'eq_marca',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eq_modelo'); ?>
		<?php echo $form->textField($model,'eq_modelo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eq_ano'); ?>
		<?php echo $form->textField($model,'eq_ano'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eq_estado'); ?>
		<?php echo $form->textField($model,'eq_estado',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'co_moneda'); ?>
		<?php echo $form->textField($model,'co_moneda',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'co_monto'); ?>
		<?php echo $form->textField($model,'co_monto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'co_plazo'); ?>
		<?php echo $form->textField($model,'co_plazo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'co_pie'); ?>
		<?php echo $form->textField($model,'co_pie'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'co_pie_tipo'); ?>
		<?php echo $form->textField($model,'co_pie_tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eq_qty'); ?>
		<?php echo $form->textField($model,'eq_qty'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
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