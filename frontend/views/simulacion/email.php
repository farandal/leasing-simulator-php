<?php
/* @var $this SimulacionController */
/* @var $model Simulacion */

$this->breadcrumbs=array(
	'Simulacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Volver a prospecto', 'url'=>array('prospecto/update/'.$model->prospecto->id)),
        array('label'=>'Guardar como Pdf',  'linkOptions' => array('target'=>'_blank') ,'url'=>array('simulacion/pdf/'.$model->id)),
        array('label'=>'Enviar por mail', 'url'=>array('simulacion/email/'.$model->id)),
);

?>

<h1>Enviar simulación por email</h1>

  <div class="well">  
            <h2>Email</h2>
                <div class="form">
                <form method="post" >

                        <input type="text" name="email" value="<?=$model->prospecto->pe_email?>" />
                        
                        <div class="buttons">
                            <?php echo CHtml::submitButton('Enviar Email',array("class"=>"btn btn-large")); ?>
                        </div>
                </form><!-- form -->
                </div>
        </div>  
