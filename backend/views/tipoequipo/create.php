<?php
/* @var $this TipoequipoController */
/* @var $model Tipoequipo */

$this->breadcrumbs=array(
	'Tipoequipos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tipoequipo', 'url'=>array('index')),
	array('label'=>'Manage Tipoequipo', 'url'=>array('admin')),
);
?>

<h1>Create Tipoequipo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>