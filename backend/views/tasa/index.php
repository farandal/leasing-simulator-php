<?php
/* @var $this TasaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tasas',
);

$this->menu=array(
	array('label'=>'Create Tasa', 'url'=>array('create')),
	array('label'=>'Manage Tasa', 'url'=>array('admin')),
);
?>

<h1>Tasas</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
        'columns'=>array(
           
            'tipo',
            'rango',
            'tasa',
            'compro',
            'comeje',
            array(            // display a column with "view", "update" and "delete" buttons
                'class'=>'CButtonColumn',
            ),
        )
)); 



