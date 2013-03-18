<?php
/* @var $this ProspectoController */
/* @var $model Prospecto */

$this->breadcrumbs=array(
	'Cotizaciones'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Cotzaciones', 'url'=>array('index')),
	array('label'=>'Crear Cotización', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('prospecto-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Cotización</h1>

<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'prospecto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'pe_nombre',
		'pe_apellido',
		'pe_rut',
		'pe_telefono',
		'pe_celular',
		/*
		'pe_email',
		'em',
		'em_nombre',
		'em_rut',
		'eq_tipo',
		'eq_marca',
		'eq_modelo',
		'eq_ano',
		'eq_estado',
		'co_moneda',
		'co_monto',
		'co_plazo',
		'co_pie',
		'co_pie_tipo',
		'eq_qty',
		'estado',
		'user_id',
		'fecha',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
