<?php
  echo "total a pagar: "; print_r($totalAPagar);
  echo "<br>";

  if (!empty($idCuotas)) { // <= true
  echo "array de los datos de las cuotas: ";print_r($idCuotas);
  }else{
    echo "No es cuota mensual.";
  }

  echo "<br>";
  echo "que se va a pagar: "; print_r($tipoPago);
  echo "<br>";
?>


<?php
// si existe lo deserializamos para poder tratarlo
// $cuotas = unserialize(stripslashes($idCuotas));
var_dump($idCuotas);

?>
<html>
<form role="form" action="<?php echo base_url()."/cuota/C_cuota/RecibirDatos";?>" method="post">
<input type="hidden" name="cuotas" value='<?php echo serialize($idCuotas) ?>'></input>
<label>Monto a Pagar</label>
<input type="text" name="montoPago" value=""></input>
<input type="hidden" name="tipoPago" value='<?php echo $tipoPago ?>'></input>
<input type="submit" value="Pasar">
</form>
</html></pre>
