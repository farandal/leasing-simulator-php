<?php
/* @var $this SimulacionController */
/* @var $model Simulacion */

$this->breadcrumbs=array(
	'Simulacions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Simulacion', 'url'=>array('index')),
	array('label'=>'Create Simulacion', 'url'=>array('create')),
	array('label'=>'View Simulacion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Simulacion', 'url'=>array('admin')),
);
?>

<h1>Update Simulacion <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>