<?

/**
 * Valida y formatea RUT en distintos formatos.
 * Esta clase considera que los RUT son manejados como sólo una cadena de texto, es decir,
 * incluye SIEMPRE el digito verificador.
 *
 * @author Esteban Martini Muñoz
 * @version 1.0
 *
 */

class Rut {

  const FORMATO_CARNET = 1; //Ejemplo 12.345.678-9
  const FORMATO_CARNET_SIN_PUNTOS = 2; //Ejemplo 123456789

   /**
   * remueve caracteres que actuan como separadores dentro del
   * RUT (espacios, puntos, guiones,etc)
   *
   * @param string $r RUT
   * @return string RUT sin caracteres separadores.
   */
  public static function formatoUser($r){
      return $r = preg_replace('/(\.)|(\-)|[ ]|[\,]|[\']/','',$r);
  }

  /**
   * Crea un arreglo asociativo separando el RUT y el dígito verificador.
   * @param string $r
   * @return string[]
   */
  public static function splitRut($r)
  {
    //sacar puntos, guiones, espacios, etc:
    $r = self::formatoUser($r);

    $dv = substr($r,strlen($r)-1);
    $r = substr($r,0,strlen($r)-1);

    return ($rut = array("rut"=>$r, "dv"=>$dv));
  }

  /**
   * Retorna el RUT sin dígito verificador
   * @param <type> $rut
   * @return <type>
   */
  public function getRut($rut)
  {
      $r = self::splitRut($rut);
      return $r["rut"];
  }

  /**
   *
   * @param <type> $rut
   * @return <type>
   */
  public function getDV($rut)
  {
      $r = self::splitRut($rut);
      return $r["dv"];
  }

  /**
   * Formatea el RUT en el formato específicado, se asume que incluye DV
   * @param string $rutCompleto
   * @param integer $formato
   * @return string
   * @example getRutCompleto(163580357,FORMATO_CARNET)
   */
  public static function getRutCompleto($r, $formato = 0){

      if(strlen($r)==0)
          return '';

      $rut = self::splitRut($r);

      if($formato == self::FORMATO_CARNET){
        return number_format($rut["rut"],0,'','.')."-".$rut["dv"];
      }
      else if($formato == self::FORMATO_CARNET_SIN_PUNTOS){
        return $rut["rut"]."-".$rut["dv"];
      }
      else{
          return $rut["rut"].$rut["dv"];
      }

  }

  /**
   * Verifica que el formato del rut sea tipo usuario (123456789)
   * y tenga un largo entre 6 y 9
   * @param <type> $r
   * @return <type>
   */
  public static function verificaFormatoRut($r)
  {
      //sacar puntos, guiones, espacios, etc:
      $r = self::formatoUser($r);

      //extraer el rut sin dv:
      $rut = substr($r,0,strlen($r)-1);

      return (preg_match('/^[0-9]+$/', $rut) && preg_match('/([kK0-9])$/',$r) && strlen($rut)>5 && strlen($rut)<9);
  }

  /**
   * Verifica que un RUT tenga un dígito verificador válido.
   * @param string $r
   * @return boolean
   */
  public function isRut($r)
  {
    $rut = self::splitRut($r);
    return (strcasecmp($rut["dv"], self::calculaDV($rut["rut"])) == 0 ? true : false);
  }

  /**
  * Calcula el digito verificador de un RUT.
  * Fuente: http://www.dcc.uchile.cl/~mortega/microcodigos/validarrut/php.php
  * @author Luis Dujovne
  * @param int $r  Un RUT sin DV
  * @return char(1) el digito verificador del RUT
  */
  public function calculaDV($r)
  {
    $s=1;
    for($m=0;$r!=0;$r/=10)
      $s=($s+$r%10*(9-$m++%6))%11;
    return chr($s?$s+47:75);
  }
}

?>