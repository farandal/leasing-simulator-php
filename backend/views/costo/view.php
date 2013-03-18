<?php
/* @var $this CostoController */
/* @var $model Costo */

$this->breadcrumbs=array(
	'Costos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Costo', 'url'=>array('index')),
	array('label'=>'Create Costo', 'url'=>array('create')),
	array('label'=>'Update Costo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Costo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Costo', 'url'=>array('admin')),
);
?>

<h1>View Costo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'tipo',
		'valor',
	),
)); ?>
