<?php
/* @var $this SimulacionController */
/* @var $model Simulacion */

$this->breadcrumbs=array(
	'Simulacions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Simulacion', 'url'=>array('index')),
	array('label'=>'Create Simulacion', 'url'=>array('create')),
	array('label'=>'Update Simulacion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Simulacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Simulacion', 'url'=>array('admin')),
);
?>

<h1>View Simulacion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'prospecto_id',
		'pie',
		'c1',
		'm1',
		'c2',
		'm2',
		'c3',
		'm3',
		'monto',
		'monto2',
		'monto3',
		'estado',
		'log1',
		'log2',
		'log3',
		'fecha',
	),
)); ?>
