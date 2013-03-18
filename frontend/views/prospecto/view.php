<?php

    $this->breadcrumbs=array(
            'Cotizaciones'=>array('index'),
            $model->id,
    );

    $this->menu=array(

            array('label'=>'Ver Cotizaciones', 'url'=>array('index')),
            array('label'=>'Actualizar Cotización', 'url'=>array('update', 'id'=>$model->id)),
            array('label'=>'Borrar Cotización', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Está seguro que desea eliminar este item?')),

  

array('label'=>'Crear Cotizacion', 'url'=>array('create'), 'linkOptions'=>array('class' =>'btn btn-primary')   ),

  );


?>

 <h1>Ver Cotización #<?php echo $model->id; ?></h1>


<?

 $this->renderPartial('/prospecto/_detalle',array("model"=>$model));

?>


