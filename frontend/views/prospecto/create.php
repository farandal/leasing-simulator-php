<?php
/* @var $this ProspectoController */
/* @var $model Prospecto */

$this->breadcrumbs=array(
	'Cotizaciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Cotizaciones', 'url'=>array('index')),

array('label'=>'Crear CotizaciÛn', 'url'=>array('create'), 'linkOptions'=>array('class' =>'btn btn-primary')   ),

);
?>

<h1>Crear Cotizaci√≥n</h1>
<?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'tipoequipos' => $tipoequipos,
    'estados'=> $estados,
    'user_id' => $user_id,
    'organizacion_id' => $organizacion_id,
    'monedas' => $monedas,
    'tasas' => $tasas,
    'is_tasa_admin' => $is_tasa_admin,
    'is_comision_admin' => $is_comision_admin,
   
    )); ?>
