<?php
/* @var $this ProspectoController */
/* @var $model Prospecto */

$this->breadcrumbs=array(
	'Cotizaciones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Ver Cotizaciones', 'url'=>array('index')),
	array('label'=>'Crear Cotización', 'url'=>array('create')),
	array('label'=>'Actualizar Cotización', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Cotización', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Está seguro que desea eliminar este item?')),
	array('label'=>'Administrar Cotizaciones', 'url'=>array('admin')),
);
?>

<h1>Ver Cotización #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'pe_nombre',
		'pe_apellido',
		'pe_rut',
		'pe_telefono',
		'pe_celular',
		'pe_email',
		'em',
		'em_nombre',
		'em_rut',
		'eq_tipo',
		'eq_marca',
		'eq_modelo',
		'eq_ano',
		'eq_estado',
		'co_moneda',
		'co_monto',
		'co_plazo',
		'co_pie',
		'co_pie_tipo',
		'eq_qty',
		'estado',
		'user_id',
		'fecha',
	),
)); ?>
