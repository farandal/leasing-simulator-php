<?php
/* @var $this SimulacionController */
/* @var $model Simulacion */

$this->breadcrumbs=array(
	'Simulacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Simulacion', 'url'=>array('index')),
	array('label'=>'Manage Simulacion', 'url'=>array('admin')),
);
?>

<h1>Create Simulacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>