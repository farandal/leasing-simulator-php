<?php
/* @var $this ProspectoController */
/* @var $model Prospecto */

$this->breadcrumbs=array(
	'Cotizaciones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Ver Cotizaciones', 'url'=>array('index')),
	array('label'=>'Ver Cotización', 'url'=>array('view', 'id'=>$model->id)),

array('label'=>'Crear Cotizacion', 'url'=>array('create'), 'linkOptions'=>array('class' =>'btn btn-primary')   ),

);
?>

<h1>Actualizar Cotización <?php echo $model->id; ?></h1>


<?php $simulaciones_grid = $this->widget('zii.widgets.grid.CGridView', array(
	
        'dataProvider'=>$simulaciones_data_provider,
        'columns'=>array(
            
            'id',
            
          array( // display 'create_time' using an expression
                'name'=>'pie',
                'value'=> 'number_format($data->pie,2,",",".")',
               
            ),
            
            array( // display 'create_time' using an expression
                'name'=>'m1',
                'value'=> '$data->c1',
               
            ),
            /*array( // display 'create_time' using an expression
                'name'=>'monto1',
                'value'=> 'number_format($data->monto,0,",",".")',
               
            ),*/
            array( // display 'create_time' using an expression
                'name'=>'pago1',
                'value'=> 'number_format($data->m1,2,",",".")',
               
            ),
           
            
            
            array( // display 'create_time' using an expression
                'name'=>'m2',
                'value'=> '$data->c2',
               
            ),
            /*array( // display 'create_time' using an expression
                'name'=>'monto2',
                'value'=> 'number_format($data->monto2,0,",",".")',
               
            ),*/
            array( // display 'create_time' using an expression
                'name'=>'pago2',
                'value'=> 'number_format($data->m2,2,",",".")',
               
            ),
            
            
            
            array( // display 'create_time' using an expression
                'name'=>'m3',
                'value'=> '$data->c3',
               
            ),
            /*array( // display 'create_time' using an expression
                'name'=>'monto3',
                'value'=> 'number_format($data->monto3,0,",",".")',
               
            ),*/
            array( // display 'create_time' using an expression
                'name'=>'pago3',
                'value'=> 'number_format($data->m3,2,",",".")',
               
            ),
            
            
            
            
            
            array( // display 'create_time' using an expression
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
               
            
            array(
            'class'    => 'CButtonColumn',
            'template'=>'{view} {delete}',

            'buttons'  => array(
                'view'=>array(
                                'url'=>function ($data, $row) { 
                                    return Yii::app()->createUrl("/", array("simulacion" => $data->id));
                                },
                                'visible'=>function($row, $data) { 
                                    return true;
                                },

                  ),
                  'delete'=>array(
                                'url'=>function ($data, $row) { 
                                    return Yii::app()->createUrl("/simulacion/", array("delete" => $data->id));
                                },
                                'visible'=>function($row, $data) { 
                                    return true;
                                },

                  ),
             ),
            
       ),
    
   ), 
                
       
),true); ?> 





<?php echo $this->renderPartial('_form', array(
    'model'=>$model,
    'tipoequipos' => $tipoequipos,
    'estados'=> $estados,
    'user_id' => $user_id,
    'organizacion_id' => $organizacion_id,
    'calculos' => $calculos,
     'monedas' => $monedas,
    'tasas' => $tasas,
    'simulaciones_grid' => $simulaciones_grid,
    'is_tasa_admin' => $is_tasa_admin,
    'is_comision_admin' => $is_comision_admin,
    )); ?>


