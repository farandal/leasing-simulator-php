<?php
/* @var $this ProspectoController */
/* @var $model Prospecto */

$this->breadcrumbs=array(
	'Prospectos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Cotizaciones', 'url'=>array('index')),
	array('label'=>'Administrar Cotizaciones', 'url'=>array('admin')),
);
?>

<h1>Crear Cotización</h1>

<?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'tipoequipos' => $tipoequipos,
    'estados'=> $estados,
    'user_id' => $user_id,
    'organizacion_id' => $organizacion_id,
    
    )); ?>