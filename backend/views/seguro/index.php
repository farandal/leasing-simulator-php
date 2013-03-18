<?php
/* @var $this SeguroController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Seguros',
);

$this->menu=array(
	array('label'=>'Create Seguro', 'url'=>array('create')),
	array('label'=>'Manage Seguro', 'url'=>array('admin')),
);
?>

<h1>Seguros</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
        'columns'=>array(
           
            'tipo',
            'r1',
            'r2',
            'valor',
            
            array(            // display a column with "view", "update" and "delete" buttons
                'class'=>'CButtonColumn',
            ),
        )
)); 



