<?php
/* @var $this SeguroController */
/* @var $model Seguro */

$this->breadcrumbs=array(
	'Seguros'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Seguro', 'url'=>array('index')),
	array('label'=>'Create Seguro', 'url'=>array('create')),
	array('label'=>'View Seguro', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Seguro', 'url'=>array('admin')),
);
?>

<h1>Update Seguro <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>