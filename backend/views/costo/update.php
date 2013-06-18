<?php
/* @var $this CostoController */
/* @var $model Costo */

$this->breadcrumbs=array(
	'Costos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Costos', 'url'=>array('index')),
	array('label'=>'Crear Costo', 'url'=>array('create')),
	array('label'=>'Ver Costo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Costo', 'url'=>array('admin')),
);
?>

<h1>Actualizar Costo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
