<?php
/* @var $this CostoController */
/* @var $model Costo */

$this->breadcrumbs=array(
	'Costos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Costo', 'url'=>array('index')),
	array('label'=>'Manage Costo', 'url'=>array('admin')),
);
?>

<h1>Create Costo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>