<?php
/* @var $this ProspectoController */
/* @var $model Prospecto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prospecto-form',
        'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>false,
)); ?>

                
	<p class="note">Fields with <span class="required">*</span> are required.</p>

          
        
            <? echo $form->errorSummary($model); ?>
        
            <div class="tabbable tabs-left">
            <ul class="nav nav-tabs">
                 <li class="active"><a href="#tab1" data-toggle="tab">Datos Personales</a></li>
                 <li><a href="#tab2" data-toggle="tab">Datos Empresa</a></li>
                 <li><a href="#tab3" data-toggle="tab">Datos Equipo</a></li>
                 <li><a href="#tab4" data-toggle="tab">Datos Cotización</a></li>
                 <li><a href="#tab5" data-toggle="tab">Otros</a></li>
            </ul>
            <div class="tab-content">

           
            
        
         <div class="tab-pane active" id="tab1">

        
             <div class="row-fluid">
                 <div class="span6">
                    <?php echo $form->labelEx($model,'pe_nombre'); ?>
                    <?php echo $form->textField($model,'pe_nombre',array('size'=>60,'maxlength'=>255)); ?>
                    <?php echo $form->error($model,'pe_nombre'); ?>

                    <?php echo $form->labelEx($model,'pe_apellido'); ?>
                    <?php echo $form->textField($model,'pe_apellido',array('size'=>60,'maxlength'=>255)); ?>
                    <?php echo $form->error($model,'pe_apellido'); ?>
                 </div>
                 
                 <div class="span6">
                    <?php echo $form->labelEx($model,'pe_rut'); ?>
                    <?php echo $form->textField($model,'pe_rut',array('size'=>9,'maxlength'=>9)); ?>
                    <?php echo $form->error($model,'pe_rut'); ?>
                     
                      
		<?php echo $form->labelEx($model,'pe_email'); ?>
		<?php echo $form->textField($model,'pe_email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pe_email'); ?>
               
                     
                 </div>
             </div>
             
             
              <div class="row-fluid">
		<div class="span6">
                <?php echo $form->labelEx($model,'pe_telefono'); ?>
		<?php echo $form->textField($model,'pe_telefono',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pe_telefono'); ?>
                </div>

                <div class="span6">
		<?php echo $form->labelEx($model,'pe_celular'); ?>
		<?php echo $form->textField($model,'pe_celular',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'pe_celular'); ?>
                </div>

               
              </div>

	
    </div>
    <div class="tab-pane" id="tab2">

            
		<?php echo $form->labelEx($model,'Es empresa'); ?>
		<?php echo $form->checkBox($model, 'em', $htmlOptions=array ( )) ?>
	

		<?php echo $form->labelEx($model,'em_nombre'); ?>
		<?php echo $form->textField($model,'em_nombre',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'em_nombre'); ?>
	
	
		<?php echo $form->labelEx($model,'em_rut'); ?>
		<?php echo $form->textField($model,'em_rut',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'em_rut'); ?>
	
    
    </div>
   <div class="tab-pane" id="tab3">
	
		<?php echo $form->labelEx($model,'eq_tipo'); ?>
                <? $tipoequipos_list = CHtml::listData($tipoequipos, 'id', 'name'); ?>
                <?php echo $form->listBox($model,'eq_tipo', $tipoequipos_list,array()); ?>
		<?php echo $form->error($model,'eq_tipo'); ?>
	

	
		<?php echo $form->labelEx($model,'eq_marca'); ?>
		<?php echo $form->textField($model,'eq_marca',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'eq_marca'); ?>
	

	
		<?php echo $form->labelEx($model,'eq_modelo'); ?>
		<?php echo $form->textField($model,'eq_modelo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'eq_modelo'); ?>
	

	
		<?php echo $form->labelEx($model,'eq_ano'); ?>
		<?php echo $form->textField($model,'eq_ano'); ?>
		<?php echo $form->error($model,'eq_ano'); ?>
	

	
		<?php echo $form->labelEx($model,'eq_estado'); ?>
		<? $estados_list = CHtml::listData($estados, 'id', 'name'); ?>
                <?php echo $form->listBox($model,'eq_estado', $estados_list,array()); ?>
		<?php echo $form->error($model,'eq_estado'); ?>
	
    </div>
    <div class="tab-pane" id="tab4">	
   
		<?php echo $form->labelEx($model,'co_moneda'); ?>
		<?php echo $form->textField($model,'co_moneda',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'co_moneda'); ?>
	

	
		<?php echo $form->labelEx($model,'co_monto'); ?>
		<?php echo $form->textField($model,'co_monto'); ?>
		<?php echo $form->error($model,'co_monto'); ?>
	

	
		<?php echo $form->labelEx($model,'co_plazo'); ?>
		<?php echo $form->textField($model,'co_plazo'); ?>
		<?php echo $form->error($model,'co_plazo'); ?>
	

	
		<?php echo $form->labelEx($model,'co_pie'); ?>
		<?php echo $form->textField($model,'co_pie'); ?>
		<?php echo $form->error($model,'co_pie'); ?>
	

	
		<?php echo $form->labelEx($model,'co_pie_tipo'); ?>
		<?php echo $form->textField($model,'co_pie_tipo'); ?>
		<?php echo $form->error($model,'co_pie_tipo'); ?>
	

	
		<?php echo $form->labelEx($model,'eq_qty'); ?>
		<?php echo $form->textField($model,'eq_qty'); ?>
		<?php echo $form->error($model,'eq_qty'); ?>
	
    </div>
    <div class="tab-pane" id="tab5">

        <? if(!$model->isNewRecord) { ?>
                    <?php echo $form->labelEx($model,'estado'); ?>
                    <?php echo $form->textField($model,'estado'); ?>
                    <?php echo $form->error($model,'estado'); ?>
        <? } ?>
               
                    <?php echo $form->hiddenField($model,'user_id',array("value"=> $user_id )); ?>
                    <?php echo $form->hiddenField($model,'organizacion_id',array("value"=> $organizacion_id )); ?>
                 
    </div>
                
 </div>
	
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	
            </div>
                
<?php $this->endWidget(); ?>

                
                
</div><!-- form -->