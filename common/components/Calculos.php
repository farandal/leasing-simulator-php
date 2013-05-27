<?php

class Calculos
{
    
    
    /* 

by William Lucking (will@ahnet.net) of Affinity Hosting, LLC, offering 
low cost hosting providing UNIX accounts supporting PHP3, PHP2, and 
mySQL 
(no telnet access). 

We are always hiring PHP programmers in the Los Angeles area, full 
and 
part-time. 

This suite offers many financial management functions that can be 
used (but not limited) for a web based mortgage or loan calculator. 

Need some Financial Management training: 
http://www.duke.edu/~charvey/Classes/ba350_1997/preassignment/preassign.htm 

VARIABLES: 

$m = number of periods per year. For instance, if you are For 
instance, if you are making payments monthly then this number is 12. 
$n = total number of periods. For instance, if you are 
compounding monthly for 5 years, this number would be 60 (12 months 
x 5 years). 
$R = annual interest rate (represented as a decimal, 8% = .08) 
$pmt = first or re-occuring payment or receipt (this number cannot 
vary for differing cash flows) 
$principal = present value of an annuity, or current principal of a 
loan used in the PaymentCalc function 

*/ 

// present value of an Annuity 
// uses include defining Remaining Principal of a loan/mortgage 

public static function PVannuity ($m,$n,$R,$pmt) { 

    $Z = 1 / (1 + ($R/$m)); 
    return ($pmt * $Z * (1 - pow($Z,$n)))/(1 - $Z); 

} 

// Given the compounding, principal, interest rate, you can calculate the monthly payment 

public static function PaymentCalc ($m,$n,$R,$principal) { 

    $Z = 1 / (1 + ($R/$m)); 
    return ((1 - $Z) * $principal) / ($Z * (1 - pow($Z,$n))); 

} 

// future value of an Annuity 

public static function FVannuity ($m,$n,$R,$pmt) { 

return $pmt * ((pow((1 + $R/$n),$m) - 1)/($R/$n)); 

} 

// present value of a single payment 

public static function PVsingle ($m,$n,$R,$pmt) { 

return $pmt * pow((1 + $R/$m),-$n); 

} 

// future value of a single payment 

public static  function FVsingle ($m,$n,$R,$pmt) { 

return $pmt * pow((1 + $R/$m),$n); 

} 

// future value of a single payment with continuous compounding 

public static function FVperp ($m,$n,$R,$pmt) { 

return $pmt * exp($R * ($n/$m)); 

} 


	
        public static function  PMT($i, $n, $p) {
            // return $i * $p * pow((1 + $i), $n) / (1 - pow((1 + $i), $n));
            //return (number_format(Calculos::PMT(2.1 / 1200, 360, -100000),2));
            //return Calculos::PMT3($i,$n,$p);
            $m = 12;
            
         
            return number_format((Calculos::PaymentCalc($m,$n,($i/100)*$m,$p))*-1,2);
        }       
      
       
        
        public static function getRutFormato($rut) {
         
            return Rut::getRutCompleto($rut,Rut::FORMATO_CARNET);
            
            
        }

        
        public static function getTasas() {
            
            return array("TP"=>"Tasa Pizarra","TM"=>"Tasa Media","TB"=>"Tasa Baja");
        
        }
        
         public static function getMoneda($codigo) {
            
            $criteria=new CDbCriteria;
            $criteria->condition='nombre LIKE :nombre';
            $criteria->params=array(':nombre'=>$codigo);
            $MONEDA = Moneda::model()->find($criteria);             
                 
            return $MONEDA;

            
        }
    
    
        public static function actualizarMonedas() {
                    
            $criteria=new CDbCriteria;

            $criteria->condition='nombre LIKE :nombre';
            $criteria->params=array(':nombre'=>"UF");
            $UF = Moneda::model()->find($criteria); 

            $criteria->condition='nombre LIKE :nombre';
            $criteria->params=array(':nombre'=>"USD");
            $DOLAR = Moneda::model()->find($criteria);
            
            $tmp = Yii::app()->basePath."/runtime/monedas.xml";
	    
	  $source_error = true;

	
	if($source_error) {
            if(!file_exists($tmp) OR (time() - filemtime($tmp)) > 600 ){
                    $c = file_get_contents("http://indicador.eof.cl/xml", "w+");
                    if(!empty($c)) {
                            file_put_contents($tmp, $c);
		 }
			
            } 
	} else {
		 file_put_contents($tmp, $c);
	}

	 //$c = file_get_contents("http://indicador.eof.cl/xml", "w+");
         //file_put_contents($tmp, $c);
         //echo $c;
            
            if($I = simplexml_load_file($tmp)){
                    
                    foreach($I as $i){
                            list($n) = $i->attributes();
                            if(preg_match("/UF|Dólar|IPC \w+\. \(\)/", $n)) {
                                    
                                      $i = str_replace(".", "", $i);
                                      $i = str_replace(",", ".", $i);
                                     
                                    switch($n) {
                                        case "Dólar Observado":
                                            $DOLAR->valor = $i+5; //dolar observado + 5
                                            $DOLAR->save();
                                        break;
                                        case "UF":
                                            $UF->valor = $i;
					    $UF->save();
                                        break;
                                      }
                            }
                    }
                    
                    
            }
           
        }
    
    
        public static function generarCalculo($prospecto_id,$plazo)
	{
		$prospecto = Prospecto::model()->findByPk($prospecto_id);
		if($prospecto===null)
			throw new CHttpException(404,'The requested page does not exist.');
                        
                        $resumen = array();
                
                        $calculo = 0;
                        $valor_moneda = Calculos::getMoneda($prospecto->coMoneda->nombre);
                        
                        $tipo_moneda = $prospecto->coMoneda->nombre;
                        $tipo_moneda_equipo = $prospecto->eqMoneda->nombre; //Agregar esta variable al prospecto
                        
                        $tipo_equipo = $prospecto->eqTipo->code;
                        
                        $valor_UF = Calculos::getMoneda("UF")->valor;
                        $valor_USD = Calculos::getMoneda("USD")->valor;
                        
			//$valor_UF = 22807.54;
			//$valor_USD = 475.00;

			//$valor_UF = 22877.70;
			//$valor_USD = 482.02;
			$valor_equipo_nuevo = $prospecto->co_monto_nuevo;
                        $valor_equipo = $prospecto->co_monto;
                        if($valor_equipo_nuevo == 0) $valor_equipo_nuevo = $valor_equipo;
                        
                        $resumen["TIPO MONEDA"] = $tipo_moneda;
                        $resumen["VALOR UF"] =  $valor_UF;
                        $resumen["VALOR USD"] = floatval($valor_USD);
                        
                        $resumen["VALOR EQUIPO ORIGINAL"] =  $prospecto->co_monto;
                        $resumen["VALOR EQUIPO NUEVO"] =  $prospecto->co_monto_nuevo;

                        if($tipo_moneda_equipo == "CLP") {
                            //CONVERTIR DE CLP A UF
                            $valor_equipo = floatval($valor_equipo)/floatval($valor_UF);
			    $valor_equipo_nuevo = floatval($valor_equipo_nuevo)/floatval($valor_UF);
                            $resumen["VALOR EQUIPO CLP-UF"] = $valor_equipo;
			    $resumen["VALOR EQUIPO NUEVO CLP-UF"] = $valor_equipo_nuevo;
                        }
                        
                        if($tipo_moneda_equipo == "UF") {
                            //VALOR EN UF
                            $valor_equipo = $valor_equipo*1;
                            $valor_equipo_nuevo = $valor_equipo_nuevo*1;
                            $resumen["VALOR EQUIPO UF"] = $valor_equipo;
			    $resumen["VALOR EQUIPO NUEVO UF"] = $valor_equipo_nuevo;
                        }
                        
                        if($tipo_moneda_equipo == "USD") {
                            //CONVERTIR DE DOLARES A PESOS Y DE PESOS A UF
                            $valor_equipo = (floatval($valor_equipo)*floatval($valor_USD))/floatval($valor_UF);
                            $valor_equipo_nuevo = (floatval($valor_equipo_nuevo)*floatval($valor_USD))/floatval($valor_UF);
		            $resumen["VALOR EQUIPO USD-UF"] =  $valor_equipo;
			    $resumen["VALOR EQUIPO NUEVO USD-UF"] =  $valor_equipo_nuevo;

                        }
                        
                        $resumen["VALOR EQUIPO UF"] = $valor_equipo;
                        $resumen["VALOR EQUIPO NUEVO UF"] = $valor_equipo_nuevo;

                        //CALCULO DE COSTOS
                        
                        $costos = Costo::model()->findAll();
                        $suma_costos = 0;
                        
                        foreach($costos as $costo) {
                            
                            //Si es Equipo EM el tipo de vehculo, no sumar costo de transferencia
                            if($costo->nombre == "transferencia" && $prospecto->eqTipo->code == "EM") {
                                $costo->valor = floatval(0);
                            }
                            
                            switch($costo->tipo) {
                                case 1:
                                    //SE SUMA EL MONTO EN UF
                                    $suma_costos += floatval($costo->valor);
                                    $resumen[$costo->nombre] = floatval($costo->valor);
                                break;
                                case 2:
                                    //SE LE APLICA EL VALOR PORCENTAJE APLICADO AL VALOR DEL EQUIPO EN UF
                                    $suma_costos += floatval($valor_equipo)*((floatval($costo->valor))/100);
                                    $resumen[$costo->nombre] = floatval($valor_equipo)*((floatval($costo->valor))/100);
                                break;
                            }
                           
                        }
                        
                        
                        //CALCULO DE TASA Y COMISIONES
                        
                        $valor_tasa = floatval(3); //Dummy value
                        $comision_proveedor = floatval(3);//Dummy value
                        $comision_ejecutivo = floatval(1.5);//Dummy value
                        
                        if($prospecto->tasa == 0) {
                            $criteria=new CDbCriteria;

                            $criteria->condition='tipo = :tipo';
                            $criteria->params=array(':tipo'=>$prospecto->co_tasa);
                            $tasas = Tasa::model()->findAll($criteria); 


                            foreach($tasas as $tasa) {

                               $range = range(0,6);    //Dummy value

                               switch($tasa->rango) {
                                   case 1: $range = range(6, 12); break;
                                   case 2: $range = range(13, 24); break;
                                   case 3: $range = range(24, 9999); break;
                               }

                               if(in_array(intval($plazo), $range)){
                                    $valor_tasa = floatval($tasa->tasa);
                                    $resumen["VALOR TASA"] = $valor_tasa;
                               }

                            }
                        } else {
                                    $valor_tasa = floatval($prospecto->tasa);
                                     $resumen["VALOR TASA"] = $valor_tasa;
                        }
                        
                        
                         if($prospecto->compro == "0") {
                            
                               $criteria=new CDbCriteria;

                            $criteria->condition='tipo = :tipo';
                            $criteria->params=array(':tipo'=>$prospecto->co_tasa);
                            $tasas = Tasa::model()->findAll($criteria); 


                            foreach($tasas as $tasa) {

                               $range = range(0,6);    //Dummy value

                               switch($tasa->rango) {
                                   case 1: $range = range(6, 12); break;
                                   case 2: $range = range(13, 24); break;
                                   case 3: $range = range(24, 9999); break;
                               }

                               if(in_array(intval($plazo), $range)){

                                    $comision_proveedor = floatval($tasa->compro);
                                    $comision_ejecutivo = floatval($tasa->comeje);
                                    $resumen["COMISION % PROVEEDOR"] = $comision_proveedor;
                                    $resumen["COMISION % EJECUTIVO"] = $comision_ejecutivo;

                               }

                            }
                             
                                     
                         } else {
                             
                             $comision_proveedor = floatval($prospecto->compro);
                             $comision_ejecutivo = floatval($prospecto->comeje);
                              $resumen["COMISION % PROVEEDOR"] = $comision_proveedor;
                              $resumen["COMISION % EJECUTIVO"] = $comision_ejecutivo;
                         }
                        //REVISAR ESTO!
                        if($tipo_moneda == "CLP") {
                            $valor_tasa = floatval($valor_tasa + 0.5);
                            $resumen["VALOR TASA EN CLP"] = $valor_tasa;
                        }
                        if($tipo_moneda == "USD") {
                            $valor_tasa = floatval($valor_tasa + 1);
                            $resumen["VALOR TASA EN USD"] = $valor_tasa;    
                        }
                        //CALCULO DE SEGUROS
                        $criteria=new CDbCriteria;
                        $criteria->condition='tipo = :tipo';
                        $criteria->params=array(':tipo'=>$tipo_equipo);
                        $seguros = Seguro::model()->findAll($criteria); 
                        
                        foreach($seguros as $seguro) {
                           
                           $range = range($seguro->r1, $seguro->r2);
                           
                           if(in_array(intval($valor_equipo), $range)){
                               
                                $valor_seguro = floatval($seguro->valor);
				if($valor_seguro ==0) $valor_seguro = $valor_equipo_nuevo;

                                eval("\$valor_seguro_final = floatval(".$valor_seguro.$seguro->evaluation.");");
                                $resumen["VALOR SEGURO"] = $valor_seguro;
				$resumen["VALOR SEGURO FINAL"] = $valor_seguro_final;
				$resumen["EVALUACION"] = " floatval(".$valor_seguro.$seguro->evaluation.");";
                                $valor_seguro = ($valor_seguro_final/12)*(intval($plazo)+1);
                                $resumen["VALOR SEGURO MESES+1"] = $valor_seguro;
                               
                           }
                            
                        }
                        
                        
                        //CALCULO DE PIE
                        
                        if($prospecto->co_pie_tipo == 0) {
                            //PIE EN VALOR ESPECIFICADO POR EL TIPO DE MONEDA, NO SE REALIZA TRANSFORMACION
                            
                            $pie = $prospecto->co_pie;
                            
                            $resumen["PIE ORIGINAL"] = $prospecto->co_pie;
                            
                            if($tipo_moneda == "CLP" || $tipo_moneda == "$") {
                            //CONVERTIR DE CLP A UF
                                $pie = floatval($pie)/floatval($valor_UF);
                                $resumen["PIE CLP-UF"] = $pie;
                            }

                            if($tipo_moneda == "UF") {
                                //VALOR EN UF
                                $pie = $pie;
                                $resumen["PIE UF"] = floatval($pie);
                            }

                            if($tipo_moneda == "USD") {
                                //CONVERTIR DE DOLARES A PESOS Y DE PESOS A UF
                                $pie = (floatval($pie)*floatval($valor_USD))/floatval($valor_UF);
                                $resumen[] = array("PIE USD-UF"=>$pie);
                            }
                            
                            
                            $resumen["PIE UF FINAL"] = $pie;
                            $pie_uf = $pie;
                        }
                        
                        
                        if($prospecto->co_pie_tipo == 1) {
                           //PIE EN PORCENTAJE APLICADO SOBRE EL VALOR DEL EQUIPO
                           $pie = floatval($valor_equipo)*floatval($prospecto->co_pie/100);
                           $resumen["PIE EN UF"] = $pie;
                           $pie_uf = $pie;

/*
			   if($tipo_moneda == "CLP" || $tipo_moneda == "$") {
                                //CONVERTIR PIE DE UF a CLP 
                                $pie = floatval($pie)*floatval($valor_UF);
                                $resumen["PIE CLP"] = floatval($pie);
                            }

                            if($tipo_moneda == "UF") {
                                //VALOR EN UF
                                $pie = $pie;
                                $resumen["PIE UF"] = floatval($pie);
                            }

                           if($tipo_moneda == "USD") {
                                //CONVERTIR DE DOLARES A PESOS Y DE PESOS A UF
                                $pie = (floatval($pie)*floatval($valor_UF))/floatval($valor_USD);
                                $resumen[] = array("PIE DE UF A USD"=>$pie);
                            }
*/
                        }
          
                        //CALCULO DE COMISIONES
                        
                        $meses = intval($plazo);
                        $resumen["PLAZO"] = $meses;
                        
                        $monto_comisiones = $valor_equipo-$pie_uf;
                        $resumen["EQUIPO - PIE"] =  $monto_comisiones;
                        
                        $comision_global = $comision_proveedor+$comision_ejecutivo;
                        
                        //$monto_comision_global = $monto_comisiones*((($comision_global/100)*$meses)/36);
                        $monto_comision_global = $monto_comisiones*($comision_global/100);
                        if($monto_comision_global > (($comision_global/100)*$monto_comisiones) )  { 
                            $monto_comision_global = (($comision_global/100)*$monto_comisiones);
                             $resumen["COMISION MENSAJE"] = "MONTO SUPERA EL ".$comision_global."%"; 
                        }
                        
                        $monto_comision_ejecutivo = $monto_comisiones*($comision_ejecutivo/100);
                        //$monto_comision_ejecutivo = $monto_comisiones*((($comision_ejecutivo/100)*$meses)/36);
                        if($monto_comision_ejecutivo > (($comision_ejecutivo/100)*$monto_comisiones) )  $monto_comision_ejecutivo =  (($comision_ejecutivo/100)*$monto_comisiones);
                        
                        //$monto_comision_proveedor = $monto_comisiones*((($comision_proveedor/100)*$meses)/36);
                        $monto_comision_proveedor = $monto_comisiones*($comision_proveedor/100);
                        if($monto_comision_proveedor > (($comision_proveedor/100)*$monto_comisiones) )  $monto_comision_proveedor =  (($comision_proveedor/100)*$monto_comisiones);
                        
                        
                        $resumen["MONTO COMISION GLOBAL"] = $monto_comision_global;
                        $resumen["MONTO COMISION EJECUTIVO"] = $monto_comision_ejecutivo;
                        $resumen["MONTO COMISION PROVEEDOR"] = $monto_comision_proveedor;
                        
                        
                        $resumen["MONTO A FINANCIAR TOTAL INC. COSTOS - COMISION - SEGURO"] = 
($valor_equipo+$suma_costos+$monto_comision_global+$valor_seguro)-$pie_uf;
                        $monto_financiar = 
($valor_equipo+$suma_costos+$monto_comision_global+$valor_seguro)-$pie_uf;
                       
                     
                        $pago = (Calculos::PMT(floatval($valor_tasa), floatval($meses+1), floatval($monto_financiar)))*-1;
                        
                        $resumen["CUOTA"] = $pago;
                        
                        
                          if($tipo_moneda == "CLP" || $tipo_moneda == "$") {
                                 $monto_financiar = floatval($monto_financiar)*floatval($valor_UF);
                                 $pie2 = floatval($pie_uf)*floatval($valor_UF);
				 $resumen["ESTE ES EL PIE"] = $pie_uf;	
                                 $pago = floatval($pago)*floatval($valor_UF);
                                 $pie = $pie2;
                                 #$monto_financiar = Monedas::CLP($monto_financiar,true);
                                 #$pie =  Monedas::CLP($pie,true);
                                 #$pago = Monedas::CLP($pago,true);

                                 
                          }

                          if($tipo_moneda == "UF") {
                                
                                 #$monto_financiar =  Monedas::UF($monto_financiar);
                                 #$pie =  Monedas::UF($pie);
                                 #$pago = Monedas::UF($pago);
                          }

                          if($tipo_moneda == "USD") {
                                
                                 $monto_financiar = $monto_financiar*$valor_USD;
                                 $pie = ($pie_uf*$valor_UF)/$valor_USD;
                                 $pago = ($pago*$valor_UF)/$valor_USD;
                               
                                 #$monto_financiar =  Monedas::USD($monto_financiar);
                                 #$pie =  Monedas::USD($pie);
                                 #$pago = Monedas::USD($pago);
                                 
                          }
                        
                          return array($monto_financiar,$pie,$pago,$meses,json_encode($resumen));
                   
                      
                        
                        
                        
                        
                        
                        
                        
                        
                        

	}
}

?>
