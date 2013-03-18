<?php
/* @var $this TipoequipoController */
/* @var $model Tipoequipo */

$this->breadcrumbs=array(
	'Tipoequipos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Tipoequipo', 'url'=>array('index')),
	array('label'=>'Create Tipoequipo', 'url'=>array('create')),
	array('label'=>'Update Tipoequipo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tipoequipo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tipoequipo', 'url'=>array('admin')),
);
?>

<h1>View Tipoequipo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'code',
		'name',
	),
)); ?>
