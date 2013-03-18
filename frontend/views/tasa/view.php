<?php
/* @var $this TasaController */
/* @var $model Tasa */

$this->breadcrumbs=array(
	'Tasas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tasa', 'url'=>array('index')),
	array('label'=>'Create Tasa', 'url'=>array('create')),
	array('label'=>'Update Tasa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tasa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tasa', 'url'=>array('admin')),
);
?>

<h1>View Tasa #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tipo',
		'rango',
		'tasa',
		'compro',
		'comeje',
	),
)); ?>
