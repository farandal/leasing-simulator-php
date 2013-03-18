<?php
/* @var $this SimulacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Simulacions',
);

$this->menu=array(
	array('label'=>'Create Simulacion', 'url'=>array('create')),
	array('label'=>'Manage Simulacion', 'url'=>array('admin')),
);
?>

<h1>Simulacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
