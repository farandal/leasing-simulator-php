<?php
/* @var $this TasaController */
/* @var $data Tasa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango')); ?>:</b>
	<?php echo CHtml::encode($data->rango); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tasa')); ?>:</b>
	<?php echo CHtml::encode($data->tasa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('compro')); ?>:</b>
	<?php echo CHtml::encode($data->compro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comeje')); ?>:</b>
	<?php echo CHtml::encode($data->comeje); ?>
	<br />


</div>