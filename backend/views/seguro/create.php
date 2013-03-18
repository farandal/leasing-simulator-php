<?php
/* @var $this SeguroController */
/* @var $model Seguro */

$this->breadcrumbs=array(
	'Seguros'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Seguro', 'url'=>array('index')),
	array('label'=>'Manage Seguro', 'url'=>array('admin')),
);
?>

<h1>Create Seguro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>