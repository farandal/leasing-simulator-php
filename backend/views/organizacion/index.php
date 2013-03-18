<?php
/* @var $this OrganizacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Organizaciones',
);

$this->menu=array(
	array('label'=>'Crear Organización', 'url'=>array('create')),
	array('label'=>'Adminsitrar Organizaciones', 'url'=>array('admin')),
);
?>

<h1>Organizaciones</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
        'columns'=>array(
            'name',  // display the 'name' attribute of the 'category' relation
            'description:html',   // display the 'content' attribute as purified HTML
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

/*
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
        'title',          // display the 'title' attribute
        'category.name',  // display the 'name' attribute of the 'category' relation
        'content:html',   // display the 'content' attribute as purified HTML
        array(            // display 'create_time' using an expression
            'name'=>'create_time',
            'value'=>'date("M j, Y", $data->create_time)',
        ),
        array(            // display 'author.username' using an expression
            'name'=>'authorName',
            'value'=>'$data->author->username',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'class'=>'CButtonColumn',
        ),
    ),
));
*/