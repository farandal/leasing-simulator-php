<?php
/* @var $this OrganizacionController */
/* @var $model Organizacion */

$this->breadcrumbs=array(
	'Organizaciones'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Listar Organizaciones', 'url'=>array('index')),
	array('label'=>'Crear Organización', 'url'=>array('create')),
	array('label'=>'Actualizar Organización', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Organización', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Está seguro que desea eliminar este item?')),
	array('label'=>'Adminsitrar Organizaciones', 'url'=>array('admin')),
);
?>

<h1>Ver Organización '<?php echo $model->name; ?>'</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
	),
)); ?>
