<?php
/* @var $this OrganizacionController */
/* @var $model Organizacion */

$this->breadcrumbs=array(
	'Organizaciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Organizaciones', 'url'=>array('index')),
	array('label'=>'Adminsitrar Organizaciones', 'url'=>array('admin')),
);
?>

<h1>Crear Organización</h1>

<?php echo $this->renderPartial('_form', array(
        'model'=>$model,
        
    
    )); ?>