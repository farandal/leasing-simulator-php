<?php
/* @var $this TasaController */
/* @var $model Tasa */

$this->breadcrumbs=array(
	'Tasas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tasa', 'url'=>array('index')),
	array('label'=>'Create Tasa', 'url'=>array('create')),
	array('label'=>'View Tasa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tasa', 'url'=>array('admin')),
);
?>

<h1>Update Tasa <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>