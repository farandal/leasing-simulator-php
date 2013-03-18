<?php


class Monedas
{
    public static function CLP($valor) {
        return Monedas::formato($valor,"CLP");
    }
    
    public static function USD($valor) {
        return Monedas::formato($valor,"USD");
    }
    
    public static function UF($valor) {
        return Monedas::formato($valor,"UF");
    }
    
    public static function formato($valor,$formato) {
	//echo $valor;
	//echo $formato;       
	$formato = trim($formato);
        $return = $valor;
        switch($formato) {
            case "USD":  $return = "USD ".number_format($valor, 0, ",", "."); break;
            case "CLP":  $return = "$ ".number_format($valor, 0, ",", "."); break;
            case "$":  $return = "$ ".number_format($valor, 0, ",", "."); break;
	    case "UF":  $return = "UF ".number_format($valor, 2, ",", ".");  break;
	    case "CLPDEC":  $return = "$ ".number_format($valor, 2, ",", ".");  break;
        }
        
        return $return;
        
    }
    
}


?>
