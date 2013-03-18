<?php
/* @var $this SimulacionController */
/* @var $model Simulacion */

$this->breadcrumbs=array(
	'Simulacions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Volver a prospecto', 'url'=>array('prospecto/update/'.$model->prospecto->id)),
        array('label'=>'Guardar como Pdf',  'linkOptions' => array('target'=>'_blank') ,'url'=>array('simulacion/pdf/'.$model->id)),
        array('label'=>'Enviar por mail', 'url'=>array('simulacion/email/'.$model->id)),
);

?>

<? echo $output=$this->renderPartial("_formulario",array("data"=>$model,"superadmin"=>$superadmin),true);