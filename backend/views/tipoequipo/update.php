<?php
/* @var $this TipoequipoController */
/* @var $model Tipoequipo */

$this->breadcrumbs=array(
	'Tipoequipos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tipoequipo', 'url'=>array('index')),
	array('label'=>'Create Tipoequipo', 'url'=>array('create')),
	array('label'=>'View Tipoequipo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tipoequipo', 'url'=>array('admin')),
);
?>

<h1>Update Tipoequipo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>