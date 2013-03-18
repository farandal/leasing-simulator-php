<?php
/* @var $this SeguroController */
/* @var $model Seguro */

$this->breadcrumbs=array(
	'Seguros'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Seguro', 'url'=>array('index')),
	array('label'=>'Create Seguro', 'url'=>array('create')),
	array('label'=>'Update Seguro', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Seguro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Seguro', 'url'=>array('admin')),
);
?>

<h1>View Seguro #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tipo',
		'r1',
		'r2',
		'valor',
	),
)); ?>
