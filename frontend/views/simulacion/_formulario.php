<? 
//FIX: esto no necesariamente funcionará siempre, el user_id, no corresponde al PK de la tablas
$usuario = YumUser::model()->cache(500)->findByPk($data->prospecto->user_id); ?>

<?
 			$valor_UF = Calculos::getMoneda("UF")->valor;
            $valor_USD = Calculos::getMoneda("USD")->valor;


?>

<table width="760" border="0" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif;font-size:16px;">
  <tr>
    <td colspan="2" style="text-align:center; font-size:23px;"><strong>COTIZACIÓN FINANCIAMIENTO LEASING </br> Nº <?=str_pad($data->prospecto->id,5,"0",STR_PAD_LEFT)?>-<?=$data->id?> </strong></td>
    <? if($ispdf) { ?>
             <td width="241" style="text-align:center;"><img src="<?=Yii::app()->basePath?>/www/images/rway_logo_cotizacion.png" width="79" height="118" alt="rway" /></td>
    <? } else { ?>
            <td width="241" style="text-align:center;"><img src="<?=Yii::app()->baseUrl?>/images/rway_logo_cotizacion.png" width="79" height="118" alt="rway" /></td>

    <? } ?>
  </tr>
  <tr>
    <td width="271" style="text-align:center;">&nbsp;</td>
    <td colspan="2" style="text-align:right;">Santiago, <?=date("d/m/Y",strtotime($data->prospecto->fecha))?></td>
  </tr>
  
  <? if($data->prospecto->em == 1) { ?>
    <tr>
      <td style="text-align:left;font-size:18px;"><? if($data->prospecto->em == 1) { ?><strong>Señores</strong> <? } else { ?><strong>Señores</strong><? } ?></td>
      <td colspan="2" style="text-align:left;">&nbsp;</td>
    </tr>

    <tr>
      <td colspan="3" style="text-align:left;font-size:18px;"><strong><?=$data->prospecto->em_nombre?> </strong>, RUT: <?=Rut::getRutCompleto($data->prospecto->em_rut,1)?> </td>
    </tr>

    <tr>
      <td style="text-align:left;font-size:18px;"><u><strong>PRESENTE</strong></u></td>
      <td colspan="2" style="text-align:left;">&nbsp;</td>
    </tr>

    <tr>
      <td style="text-align:left;">&nbsp;</td>
      <td colspan="2" style="text-align:left;">&nbsp;</td>
    </tr>
   <? } ?>
 
  
  <tr>
    <td colspan="3" style="text-align:left;font-size:18px;"><strong>Atn. <?=$data->prospecto->pe_nombre?> <?=$data->prospecto->pe_apellido?> </strong>
      <? if($data->prospecto->em == 0) { ?> 
    , <b>RUT: <?=Rut::getRutCompleto($data->prospecto->pe_rut,1)?></b> 
	<? } ?>  </td>
  </tr>
  
  <tr>
    <td style="text-align:left;">&nbsp;</td>
    <td colspan="2" style="text-align:left;">&nbsp;</td>
  </tr>
  <tr>
    <td style="text-align:left;">De nuestra consideración:  </br></td>
    <td colspan="2" style="text-align:left;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:left;">Por la presente, nos es grato cotizar el arriendo con opción de compra del siguiente bien:</td>
   
  </tr>
  <tr>
    <td style="text-align:left;">&nbsp;</td>
    <td colspan="2" style="text-align:left;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:left;"><b>1. Equipo marca <?=$data->prospecto->eq_marca?>, Modelo <?=$data->prospecto->eq_modelo?>, 
     </br>
    Año <?=$data->prospecto->eq_ano?>, con un valor de <?=Monedas::formato($data->prospecto->co_monto,$data->prospecto->eqMoneda->visual)?>+ IVA</b></td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:left;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:left;"><b>Valor de las rentas:</b>  Las rentas de esta cotización están afectas a IVA. </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:left;">&nbsp;</td>
  </tr>
  <tr>
    <td style="text-align:left;"><strong>ALTERNATIVA 1</strong></td>
    <td width="248" style="text-align:left;"><strong>ALTERNATIVA 2</strong></td>
    <td style="text-align:left;"><strong>ALTERNATIVA 3</strong></td>
  </tr>
  <tr>
    <td style="text-align:center;"><table width="100%" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27%">PIE </td>
        <td width="73%"><?=Monedas::formato($data->pie,$data->moneda)?></td>
      </tr>
      <tr>
        <td>CUOTAS</td>
        <td><?=$data->c1?></td>
      </tr>
      <tr>
        <td>RENTAS</td>
        <td><b><?=Monedas::formato($data->m1,$data->moneda)?></b></td>
      </tr>
      <tr>
        <td>O/C</td>
        <td><?=Monedas::formato($data->m1,$data->moneda)?></td>
      </tr>
    </table></td>
    <td style="text-align:center;"><table width="100%" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27%">PIE</td>
        <td width="73%"><?=Monedas::formato($data->pie,$data->moneda)?></td>
       
      </tr>
      <tr>
        <td>CUOTAS</td>
        <td><?=$data->c2?></td>
      </tr>
      <tr>
        <td>RENTAS</td>
        <td><b><?=Monedas::formato($data->m2,$data->moneda)?></b></td>
      </tr>
      <tr>
        <td>O/C</td>
        <td><?=Monedas::formato($data->m2,$data->moneda)?></td>
      </tr>
    </table></td>
    <td style="text-align:center;"><table width="100%" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27%">PIE</td>
        <td width="73%"><?=Monedas::formato($data->pie,$data->moneda)?></td>
      </tr>
      <tr>
        <td>CUOTAS</td>
        <td><?=$data->c3?></td>
      </tr>
      <tr>
        <td>RENTAS</td>
        <td><b><?=Monedas::formato($data->m3,$data->moneda)?></b></td>
      </tr>
      <tr>
        <td>O/C</td>
        <td><?=Monedas::formato($data->m3,$data->moneda)?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td style="text-align:center;">&nbsp;</td>
    <td style="text-align:center;">&nbsp;</td>
    <td style="text-align:center;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:left;font-size:14px;"><strong>Gastos y Costos de la operación</strong></td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:left;font-size:14px;">Los gastos asociados a la operación de leasing se encuentran incluidos en el valor de las rentas. </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:left;font-size:14px;">&nbsp;</td>
  </tr>


  <tr>
    <td colspan="3" style="text-align:left;font-size:14px;"><b>Nota: Para esta cotizaci&oacute;n se utiliz&oacute;:  UF = <?=Monedas::formato($valor_UF,"CLPDEC")?>; US$  = <?=Monedas::formato($valor_USD,"CLPDEC")?> </b> </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:left;font-size:14px;">&nbsp;</td>
  </tr>



  <tr>
    <td colspan="3" style="text-align:left;font-size:14px;"><strong>Seguro de la Operación</strong></td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:left;font-size:14px;">Los seguros se encuentran incluidos en el valor de la cuota por todo el periodo del contrato</td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:left;font-size:14px;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:left;font-size:14px;">La presente cotización es referencial y est&aacute; sujeta a la aprobación de nuestro comité de crédito; </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:left;font-size:14px;">y tiene una validez de 10 días.</td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:left;font-size:14px;">&nbsp;</td>
  </tr>



  <tr>
    <td colspan="3" style="text-align:left;font-size:14px;">Una vez aprobada las presentes condiciones, remítanos los antecedentes legales y financieros, </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:left;font-size:14px;">para posteriormente someter su aprobación al comité de créditos.</td>
  </tr>
  
   <tr>
    <td colspan="3" style="text-align:center;font-size:14px;">&nbsp;</td>
  </tr>
  
  
  <tr>
    <td colspan="3" style="text-align:center;font-size:14px;">&nbsp;</td>
  </tr>
  
  
  <tr>
    <td colspan="3" style="text-align:center;font-size:14px;"><table width="100%" border="0">
      
      <tr>
        <td width="350"><b>Contacto Right Way</b></td>
        <td width="350"><b>Ejecutivo </b></td>
      </tr>
      
      <tr>
       
        <td>
            Martín Insaurralde
            </br>
            martin@rway.cl
            </br>
            Right Way Leasing S.A
            </br>
            
        </td>
        
         <td>
           <?=$usuario->profile->firstname?> <?=$usuario->profile->lastname?>
            </br>
            <?=$usuario->profile->email?>
            </br>
            <?= Organizacion::model()->findByPk($usuario->organizacion_id)->name ?>
            </br>
            
        </td>
       
      </tr>
      
    
    
     </table></td>
  </tr>
  
  
  <tr>
    <td colspan="3" style="text-align:center;font-size:14px;">______________________________________________________</td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:center;font-size:14px;"><strong>Right Way Leasing S.A.</strong></td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:center;font-size:14px;">Avda. Santa María 6350 Piso 1, Vitacura Tel. 2-750.84.00 – www.rway.cl</td>
  </tr>

</table>

</br>
</br>


<? if($superadmin) { ?>

<h2>
Cálculo alternativa 1
</h2>

<pre>

<?=print_r(json_decode($data->log1))?>

</pre>


<h2>
Cálculo alternativa 2
</h2>

<pre>

<?=print_r(json_decode($data->log2))?>


</pre>

<h2>
Cálculo alternativa 3
</h2>

<pre>

<?=print_r(json_decode($data->log3))?>

</pre>


<? } ?>
