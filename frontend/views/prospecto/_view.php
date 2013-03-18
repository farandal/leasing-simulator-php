<?php
/* @var $this ProspectoController */
/* @var $data Prospecto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pe_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->pe_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pe_apellido')); ?>:</b>
	<?php echo CHtml::encode($data->pe_apellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pe_rut')); ?>:</b>
	<?php echo CHtml::encode($data->pe_rut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pe_telefono')); ?>:</b>
	<?php echo CHtml::encode($data->pe_telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pe_celular')); ?>:</b>
	<?php echo CHtml::encode($data->pe_celular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pe_email')); ?>:</b>
	<?php echo CHtml::encode($data->pe_email); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('em')); ?>:</b>
	<?php echo CHtml::encode($data->em); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('em_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->em_nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('em_rut')); ?>:</b>
	<?php echo CHtml::encode($data->em_rut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eq_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->eq_tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eq_marca')); ?>:</b>
	<?php echo CHtml::encode($data->eq_marca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eq_modelo')); ?>:</b>
	<?php echo CHtml::encode($data->eq_modelo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eq_ano')); ?>:</b>
	<?php echo CHtml::encode($data->eq_ano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eq_estado')); ?>:</b>
	<?php echo CHtml::encode($data->eq_estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('co_moneda')); ?>:</b>
	<?php echo CHtml::encode($data->co_moneda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('co_monto')); ?>:</b>
	<?php echo CHtml::encode($data->co_monto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('co_plazo')); ?>:</b>
	<?php echo CHtml::encode($data->co_plazo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('co_pie')); ?>:</b>
	<?php echo CHtml::encode($data->co_pie); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('co_pie_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->co_pie_tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eq_qty')); ?>:</b>
	<?php echo CHtml::encode($data->eq_qty); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	*/ ?>

</div>