<?php
/* @var $this SimulacionController */
/* @var $data Simulacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prospecto_id')); ?>:</b>
	<?php echo CHtml::encode($data->prospecto_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pie')); ?>:</b>
	<?php echo CHtml::encode($data->pie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c1')); ?>:</b>
	<?php echo CHtml::encode($data->c1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('m1')); ?>:</b>
	<?php echo CHtml::encode($data->m1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('c2')); ?>:</b>
	<?php echo CHtml::encode($data->c2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('m2')); ?>:</b>
	<?php echo CHtml::encode($data->m2); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('c3')); ?>:</b>
	<?php echo CHtml::encode($data->c3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('m3')); ?>:</b>
	<?php echo CHtml::encode($data->m3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto')); ?>:</b>
	<?php echo CHtml::encode($data->monto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto2')); ?>:</b>
	<?php echo CHtml::encode($data->monto2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto3')); ?>:</b>
	<?php echo CHtml::encode($data->monto3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log1')); ?>:</b>
	<?php echo CHtml::encode($data->log1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log2')); ?>:</b>
	<?php echo CHtml::encode($data->log2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log3')); ?>:</b>
	<?php echo CHtml::encode($data->log3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	*/ ?>

</div>