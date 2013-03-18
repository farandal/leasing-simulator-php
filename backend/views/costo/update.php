<?php
/* @var $this CostoController */
/* @var $model Costo */

$this->breadcrumbs=array(
	'Costos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Costo', 'url'=>array('index')),
	array('label'=>'Create Costo', 'url'=>array('create')),
	array('label'=>'View Costo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Costo', 'url'=>array('admin')),
);
?>

<h1>Update Costo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>