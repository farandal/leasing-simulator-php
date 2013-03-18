<?php
/* @var $this TasaController */
/* @var $model Tasa */

$this->breadcrumbs=array(
	'Tasas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tasa', 'url'=>array('index')),
	array('label'=>'Manage Tasa', 'url'=>array('admin')),
);
?>

<h1>Create Tasa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>