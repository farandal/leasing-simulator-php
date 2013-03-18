<?php
/* @var $this CostoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Costos',
);

$this->menu=array(
	array('label'=>'Create Costo', 'url'=>array('create')),
	array('label'=>'Manage Costo', 'url'=>array('admin')),
);
?>

<h1>Costos</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
        'columns'=>array(
           'nombre',
            'tipo',
            'valor',
            array(            // display a column with "view", "update" and "delete" buttons
                'class'=>'CButtonColumn',
            ),
        )
)); 

