<?php
/* @var $this SeguroController */
/* @var $data Seguro */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r1')); ?>:</b>
	<?php echo CHtml::encode($data->r1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('r2')); ?>:</b>
	<?php echo CHtml::encode($data->r2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />


</div>