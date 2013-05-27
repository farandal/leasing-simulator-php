<?php
/* @var $this ProspectoController */
/* @var $model Prospecto */
/* @var $form CActiveForm */
?>

<style>
   
    .row-fluid [class*="span"] { margin-left: 0px !important; }
    
    .capitalise
    {
        text-transform:uppercase;
    }
    
</style>

<script>

function nextTab(elem) {
  $(elem + ' li.active')
    .next()
    .find('a[data-toggle="tab"]')
    .click();
}
function prevTab(elem) {
  $(elem + ' li.active')
    .prev()
    .find('a[data-toggle="tab"]')
    .click();
}



$(document).ready(function() {
    
    $("#submit_btn").hide();
    $("#button-prev").hide();
    
     $('#button-next').click(function(e){
        e.preventDefault();
        if($('#prospecto-form').valid()) {
            nextTab("#tabs");
        }
        
     });
     
      $('#button-prev').click(function(e){
        e.preventDefault();
        prevTab("#tabs");
        
     });
     
     
 $('#tabs a[data-toggle="tab"]').on('shown', function (e) {
   
    
     if( $('#tabs li.active').index() > 0 ) { 
         $("#button-prev").show();
     } else {
         $("#button-prev").hide();
     }
     
     
     if($('#tabs li').length-1 == $('#tabs li.active').index() ) { 
            $("#submit_btn").show();
             $("#button-next").hide();
     } 
     
})
    
 $('#isEmpresaChk').on('change', function(){
    if($(this).is(':checked')){
        $("#datos_empresa").show("slow");
        $("#perut").removeClass("required");
        $("#rut_req").hide();        
    } else {
         $("#datos_empresa").hide("slow");
         $("#perut").addClass("required");
         $("#rut_req").show();
    }
});

$('#Prospecto_eq_estado, #Prospecto_eq_tipo').on('change', function(){

  if($("#Prospecto_eq_estado").val()==2 && $("#Prospecto_eq_tipo").val()==11){
        $("#valor_nuevo_contenedor").show("slow");
 $("#Prospecto_co_monto_nuevo").addClass("required");
    } else {
        $("#valor_nuevo_contenedor").hide("slow");
 $("#Prospecto_co_monto_nuevo").removeClass("required");
    }
});

$('#perut, #emrut').Rut({
  //on_error: function(){ alert('Rut incorrecto'); },
  format_on: 'keyup'
});



$("#prospecto-form input").bind('keyup', function (e) {
    if (e.which >= 97 && e.which <= 122) {
        var newKey = e.which - 32;
        // I have tried setting those
        e.keyCode = newKey;
        e.charCode = newKey;
    }

    $(this).val(($(this).val()).toUpperCase());
});



           $.extend($.validator.messages, {
                required: "Campo obligatorio",
                remote: "Pro favor corrige este campo",
                email: "Ingrese una direccion de email valida",
                url: "Ingrese una url valida",
                date: "Ingrese una fecha valida",
                dateISO: "Ingrese una fecha valida (ISO)",
                number: "Ingrese un numero",
                digits: "Ingrese solo digitos",
                creditcard: "Ingrese un numero de tarjeta valida",
                equalTo: "Ingrese el mismo valor",
                accept: "Ingrese una extension valida",
                maxlength: $.validator.format("No es posible ingresar mas de {0} catacteres"),
                minlength: $.validator.format("Ingrese al menos {0} caracteres"),
                rangelength: $.validator.format("Ingrese un valor con un minimo {0} y maximo {1} caracteres"),
                range: $.validator.format("Ingrese un valor entre {0} y {1}"),
                max: $.validator.format("Ingrese un valor menor o igual a {0}"),
                min: $.validator.format("Ingrese un valor mayor o igual a {0}")
            });       

         
            $.validator.addMethod("RutValidate", function(value, element) {
                return this.optional(element) || $.Rut.validar(value);
            }, "Este campo debe ser un rut valido.");
            
            
            $('#prospecto-form').validate({

                /*rules : {
                    'rut' : { RutValidate : true, required: true  }
                },*/
                   
                /*highlight: function(element, errorClass) {
                   $(element).removeClass("valid").addClass("label").addClass("label-important");
                },
                unhighlight: function(element, errorClass) {
                   $(element).addClass("valid").removeClass("label").removeClass("label-important");
                },*/

                /*errorClass: "error label label-important",*/
                debug:false,
                onkeyup: true,
                onblur: true,
                ignore:':hidden'
            });  

        /* var $tabs = $('.tabs_form').tabs(
	  {
    		select: function(event, ui) {
        		var isValid = $jquery_tabs('.wpcf7-form').valid();
        		return isValid;
    		}
	  }
         ); */ 

        /*$('.next').click(function(e) {    
               e.preventDefault();                  
               $tabs.tabs('select', $jquery_tabs(this).attr("rel"));     
               if($jquery_tabs('.wpcf7-form').valid()) { $tabs.tabs('select', $jquery_tabs(this).attr("rel"));   }
        });

        $('.back').click(function(e) {
            e.preventDefault(); 
            $tabs.tabs('select', $jquery_tabs(this).attr("rel"));
        });*/


         

    });
    
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prospecto-form',
        'htmlOptions'=>array('class'=>'well'),
	'enableAjaxValidation'=>false,
)); ?>
      
	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
        
            <? echo $form->errorSummary($model); ?>
        
            <div id="tabs" class="tabbable tabs-left">
            <ul class="nav nav-tabs">
                 <li class="active"><a href="#tab1" data-toggle="tab">Datos Cliente</a></li>
                 <li><a href="#tab3" data-toggle="tab">Datos Equipo</a></li>
                 <li><a href="#tab4" data-toggle="tab">Datos Cotización</a></li>
                 
                 <? if($is_tasa_admin || $is_comision_admin) { ?> <li><a href="#tab5" data-toggle="tab">Tasas y Comisiones</a></li> <? } ?>
                                  
            </ul>
            <div class="tab-content">

           
            
        
         <div class="tab-pane active" id="tab1">

             
             
               <div class="row-fluid">
           <div class="span6">
               
               <h4> Datos Empresa </h4>
		<?php echo $form->labelEx($model,'Es empresa'); ?>
		<?php echo $form->checkBox($model, 'em', $htmlOptions=array ("id"=>"isEmpresaChk")) ?>
	
        <div id="datos_empresa" style="<? if($model->em==0) { ?> display:none; <? } ?>">

		<?php echo $form->labelEx($model,'em_nombre'); ?>
		<?php echo $form->textField($model,'em_nombre',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'em_nombre'); ?>
	
	
		<?php echo $form->labelEx($model,'em_rut'); ?>
		<?php echo $form->textField($model,'em_rut',array('size'=>12,'maxlength'=>12,'id'=>'emrut','class'=>'rut required RutValidate')); ?>
		<?php echo $form->error($model,'em_rut'); ?>
        
        </div>
               
                </div> 
           </div>
        
             <div class="row-fluid">
                 
                    <h4> Datos Contacto </h4>
                    
                 <div class="span6">
                     
                      
            
                     
                     
                    <?php echo $form->labelEx($model,'pe_nombre'); ?>
                    <?php echo $form->textField($model,'pe_nombre',array('class'=>'required','size'=>60,'maxlength'=>255)); ?>
                    <?php echo $form->error($model,'pe_nombre'); ?>

                    <?php echo $form->labelEx($model,'pe_apellido'); ?>
                    <?php echo $form->textField($model,'pe_apellido',array('class'=>'required','size'=>60,'maxlength'=>255)); ?>
                    <?php echo $form->error($model,'pe_apellido'); ?>
                 </div>
                 
                 <div class="span6">
                   
                     <label for="Prospecto_pe_rut" class="required">Rut <span id="rut_req" class="required">*</span> <span class="label label-info">Ej: 11.111.111-1</span></label>
                     
                     
                    <?php echo $form->textField($model,'pe_rut',array('size'=>12,'maxlength'=>12,"id"=>"perut","class"=>"required RutValidate")); ?>
                    <?php echo $form->error($model,'pe_rut'); ?>
                     
                      
		<?php echo $form->labelEx($model,'pe_email'); ?>
		<?php echo $form->textField($model,'pe_email',array('size'=>60,'maxlength'=>255,'class'=>'email required')); ?>
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
   <div class="tab-pane" id="tab3">
	
                <div class="span6">

	        <?php echo $form->labelEx($model,'eq_tipo'); ?>
                <? $tipoequipos_list = CHtml::listData($tipoequipos, 'id', 'name'); ?>
                <?php echo $form->listBox($model,'eq_tipo', $tipoequipos_list,array('class'=>'required')); ?>
                <?php echo $form->error($model,'eq_tipo'); ?>


                    
                <?php echo $form->labelEx($model,'eq_moneda'); ?>
		<? $monedas_list = CHtml::listData($monedas, 'id', 'visual'); ?>
                <?php echo $form->listBox($model,'eq_moneda', $monedas_list,array('class'=>'required')); ?>
		<?php echo $form->error($model,'eq_moneda'); ?>
                    
 		<?php echo $form->labelEx($model,'co_monto'); ?>
                <?php echo $form->textField($model,'co_monto',array('class'=>'required number')); ?>
                <?php echo $form->error($model,'co_monto'); ?>

<? 
$st = "display:none;";
if($model->eq_tipo == 11 && $model->eq_estado = 2) $st=""; 
?>

	<div id="valor_nuevo_contenedor" style="<?=$st?>">
 		<?php echo $form->labelEx($model,'co_monto_nuevo'); ?>
                <?php echo $form->textField($model,'co_monto_nuevo',array('class'=>'number')); ?>
                <?php echo $form->error($model,'co_monto_nuevo'); ?>
	</div>
                
		<?php echo $form->labelEx($model,'eq_marca'); ?>
		<?php echo $form->textField($model,'eq_marca',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'eq_marca'); ?>
	

	
		<?php echo $form->labelEx($model,'eq_modelo'); ?>
		<?php echo $form->textField($model,'eq_modelo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'eq_modelo'); ?>
	
                </div>
              
       <div class="span6">
	
		<?php echo $form->labelEx($model,'eq_ano'); ?>
		<?php echo $form->textField($model,'eq_ano',array('size'=>4,'maxlength'=>4,'class'=>'number')); ?>
		<?php echo $form->error($model,'eq_ano'); ?>
	

	
		<?php echo $form->labelEx($model,'eq_estado'); ?>
		<? $estados_list = CHtml::listData($estados, 'id', 'name'); ?>
                <?php echo $form->listBox($model,'eq_estado', $estados_list,array('class'=>'required')); ?>
		<?php echo $form->error($model,'eq_estado'); ?>
               
           </div>
	
    </div>
    <div class="tab-pane" id="tab4">	
   
        <div class="span6">
        
	
                <?php echo $form->labelEx($model,'co_moneda'); ?>
		<? $monedas_list = CHtml::listData($monedas, 'id', 'visual'); ?>
                <?php echo $form->listBox($model,'co_moneda', $monedas_list,array('class'=>'required')); ?>
		<?php echo $form->error($model,'co_moneda'); ?>

	
		
                
                <? $range = array(); foreach(range(6,48) as $val) { $range[$val] = $val; }?>
            
		<?php echo $form->labelEx($model,'co_plazo'); ?>
                <?php echo $form->dropDownList($model,'co_plazo',$range,array()); ?>
		<?php echo $form->error($model,'co_plazo'); ?>
            
            <?php echo $form->labelEx($model,'co_plazo2'); ?>
                <?php echo $form->dropDownList($model,'co_plazo2',$range,array()); ?>
		<?php echo $form->error($model,'co_plazo2'); ?>
            
            
            <?php echo $form->labelEx($model,'co_plazo3'); ?>
                <?php echo $form->dropDownList($model,'co_plazo3',$range,array()); ?>
		<?php echo $form->error($model,'co_plazo3'); ?>
            
            
                <?php echo $form->labelEx($model,'co_tasa'); ?>
                <?php echo $form->listBox($model,'co_tasa', $tasas,array()); ?>
		<?php echo $form->error($model,'co_tasa'); ?>
            
	
        </div>

        <div class="span6">
	
		<?php echo $form->labelEx($model,'co_pie'); ?>
		<?php echo $form->textField($model,'co_pie',array('class'=>'number required')); ?>
		<?php echo $form->error($model,'co_pie'); ?>
	

	
            
               <?php echo $form->labelEx($model,'co_pie_tipo'); ?>
		<? $co_pie_tipo_list = array(0=>"MONTO",1=>"PORCENTAJE") ?>
                <?php echo $form->listBox($model,'co_pie_tipo', $co_pie_tipo_list,array()); ?>
		<?php echo $form->error($model,'co_pie_tipo'); ?>
	

	
		<?php // echo $form->labelEx($model,'eq_qty'); ?>
		<?php // echo $form->textField($model,'eq_qty'); ?>
		<?php // echo $form->error($model,'eq_qty'); ?>
        </div>
        
        
         
	
    </div>
                
                    <?php echo $form->hiddenField($model,'eq_qty',array("value"=> 1 )); ?>
                    <?php echo $form->hiddenField($model,'user_id',array("value"=> $user_id )); ?>
                    <?php echo $form->hiddenField($model,'organizacion_id',array("value"=> $organizacion_id )); ?>
   
                        
                    <? if(!$is_tasa_admin) { ?>
                
                      <?php echo $form->hiddenField($model,'tasa',array("value"=> 0 ,'size'=>3,'maxlength'=>3,'class'=>'number required')); ?>
                
                  <? } ?>
                
                
                    <? if(!$is_comision_admin) { ?>
                      <?php echo $form->hiddenField($model,'compro',array("value"=> 0,'size'=>3,'maxlength'=>3,'class'=>'number required' )); ?>
                      <?php echo $form->hiddenField($model,'comeje',array("value"=> 0,'size'=>3,'maxlength'=>3,'class'=>'number required' )); ?>
                
                    <? } ?>
                        
                  
                
   
    <? if($is_tasa_admin || $is_comision_admin) { ?>
            <div class="tab-pane" id="tab5">    
                
                 <div class="row-fluid">
                 <div class="span12">
                
                <? if($is_tasa_admin) { ?>
               <div class="span6">
                        <?php echo $form->labelEx($model,'tasa'); ?>
                        <?php echo $form->textField($model,'tasa',array("value"=> 0, 'class'=>'required')); ?>%
                        <?php echo $form->error($model,'tasa'); ?>
               </div>
               <div class="span6">
                 <div class="alert">
                        <p>*Nota: si el valor es 0, se calculará la tasa en base a la tabla de tasas</p>
                        <p>Ejemplo de formato de tasa: 2.5</p>
                </div>
               </div>
                
                    <? } ?>
                 </div>
                     
                 
                   <div class="span12">
                 
                 
                    <? if($is_comision_admin) { ?>
                         <div class="span6">
                        <?php echo $form->labelEx($model,'compro'); ?>
                        <?php echo $form->textField($model,'compro',array("value"=> 0,'class'=>'required' )); ?>%
                        <?php echo $form->error($model,'compro'); ?>

                        <?php echo $form->labelEx($model,'comeje'); ?>
                        <?php echo $form->textField($model,'comeje',array("value"=> 0,'class'=>'required' )); ?>%
                        <?php echo $form->error($model,'comeje'); ?>
                         </div>
                     <div class="span6">
                        <div class="alert">
                        <p>*Nota: si el valor es 0, se calculará la comisión en base a la tabla de comisiones</p>
                        <p>Las suma de las comisiones no puede superar el 4.5%</p>
                        <p>Ejemplo de formato de comisión : 3.0 y 1.5 </p>
                        </div>
                     </div>
                
                    <? } ?>    
                     
                     
                 </div>
                </div>
                
                
            </div>
    <? } ?>
               
                
   <!-- <div class="tab-pane" id="tab5">

        <? if(!$model->isNewRecord) { ?>
                    <?php echo $form->labelEx($model,'estado'); ?>
                    <?php echo $form->textField($model,'estado'); ?>
                    <?php echo $form->error($model,'estado'); ?>
        <? } ?>
               
                
                 
    <div class="tab-pane" id="tab5">-->
   <div class="buttons" style="text-align: right;">
   
   <button id="button-prev" class="btn btn-large right">Anterior</button>    
       
   <button id="button-next" class="btn btn-large right">Siguiente</button>    
   
   <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar Datos',array("class"=>"btn btn-large right","id"=>"submit_btn")); ?>
   </div>
 </div>
	
		
	
        </div>
                
    <?php $this->endWidget(); ?>

</div><!-- form -->


<? if(!$model->isNewRecord) { ?>
        <div class="well">  
            <h2>Simulaciones</h2>
                <div class="form">
                <form method="post" >

                        <input type="hidden" name="sim_prospecto_id" value="<?=$model->id?>" />
                        
                        <?=$simulaciones_grid?>
                        
                        <div class="buttons">
                            <?php echo CHtml::submitButton('Crear simulación',array("class"=>"btn btn-large")); ?>
                        </div>
                </form><!-- form -->
                </div>
        </div>  
<? } ?>

