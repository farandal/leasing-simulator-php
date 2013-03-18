<?php
/* @var $this ProspectoController */
/* @var $model Prospecto */

$this->breadcrumbs=array(
	'Prospectos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Ver Cotizaciones', 'url'=>array('index')),
	array('label'=>'Crear Cotización', 'url'=>array('create')),
	array('label'=>'Ver Cotizaciones', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Cotizaciones', 'url'=>array('admin')),
);
?>

<h1>Actualizar Cotización <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'tipoequipos' => $tipoequipos,
    'estados'=> $estados,
    'user_id' => $user_id,
    'organizacion_id' => $organizacion_id,
    )); ?>