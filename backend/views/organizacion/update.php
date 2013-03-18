<?php
/* @var $this OrganizacionController */
/* @var $model Organizacion */

$this->breadcrumbs=array(
	'Organizaciones'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Organizaciones', 'url'=>array('index')),
	array('label'=>'Adminsitrar Organizaciones', 'url'=>array('admin')),
	array('label'=>'Crear Organización', 'url'=>array('create')),
	array('label'=>'Ver Organización', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>

<h1>Actualizar Organización <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array(
    'model'=>$model,
      
    
    )); ?>