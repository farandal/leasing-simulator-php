<?php
/* @var $this ProspectoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Prospectos',
);

$this->menu=array(
	array('label'=>'Crear Cotización', 'url'=>array('create')),
	array('label'=>'Administrar Cotizaciones', 'url'=>array('admin')),
);
?>

<h1>Prospectos</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
        'columns'=>array(
            'pe_rut',
            'pe_nombre', 
            'pe_apellido',
            'pe_telefono',
            'pe_email',
           
            array(            // display 'create_time' using an expression
                'name'=>'fecha',
                'value'=> '$data->fecha',
               
            ),
           /* array(            // display 'create_time' using an expression
                'name'=>'fecha',
                'value'=>'date("M j, Y", $data->created)',
               
            ),
            array(            // display 'author.username' using an expression
                'name'=>'Autor',
                'value'=>'$data->author->username',
            ),*/
            array(            // display a column with "view", "update" and "delete" buttons
                'class'=>'CButtonColumn',
            ),
        ),
)); 
