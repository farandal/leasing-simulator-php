<?php
/* @var $this TipoequipoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipoequipos',
);

$this->menu=array(
	array('label'=>'Create Tipoequipo', 'url'=>array('create')),
	array('label'=>'Manage Tipoequipo', 'url'=>array('admin')),
);
?>

<h1>Tipoequipos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
