<?php
/* @var $this SimulacionController */
/* @var $model Simulacion */

$this->breadcrumbs=array(
	'Simulacions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Simulacion', 'url'=>array('index')),
	array('label'=>'Create Simulacion', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('simulacion-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Simulacions</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'simulacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'prospecto_id',
		'pie',
		'c1',
		'm1',
		'c2',
		/*
		'm2',
		'c3',
		'm3',
		'monto',
		'monto2',
		'monto3',
		'estado',
		'log1',
		'log2',
		'log3',
		'fecha',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
