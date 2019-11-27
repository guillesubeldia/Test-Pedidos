<?php
foreach ($datosPedido as $row) {
    $idPedido               = $row->id_pedido;
    $tipoPedido             = $row->id_tipopedido;
    $descirpcionTipoPedido  = $row->tipopedido;
    $dependencia            = $row->id_dependencia;
    $descripcionDependencia = $row->dependenciaorigen;

    $barcode                = $row->barcode;
    $solicitante            = $row->solicita;
    $retira                 = $row->retira;
    $numeroservicio         = $row->numeroservicio;
    $fechaservicio          = $row->fechaservicio;
    $pedidotecnico          = $row->id_pedidotecnico;
    $descripcionTecnico     = $row->pedidotecnico;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
  <script src="<?php echo base_url(). 'plantilla/bower_components/jquery/dist/jquery.min.js'?>"></script>
  <script src="<?php echo base_url(). 'plantilla/jqueryBarcode/jquery-barcode.js'?>"></script>
<style>
.strg{
    font-weight: bold;
}
.fnt{
    font-size: 16px;
    
}
.up{
  text-transform: uppercase;
}

table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
}
 td{
    padding: 5px;
}
.logo{
     width: 200px; 
     height: 60px;
}
table{
    width: 595; 
    height: 421px;
}

</style>

<body>

    <div>
        <table border="1">
            <tbody>
                <tr>
                    <td colspan="3" align="left">
                        <img class="logo" src="<?php echo base_url(). 'plantilla/jqueryBarcode/Logo MDH.png'?>">
                    </td>
                </tr>
                
                <tr>
                    <td align="center">Cargo N°: <?php echo $idPedido;?></td>
                    <td class="strg fnt"  style="width: 600px; " align="center">Direccion de informatica y comunicaciones</td>
                    <td> <?php echo date("d/m/Y");?> </td>
                </tr>
                <tr>
                    <td class="strg fnt">Recibo de:</td>
                    <td class="up" colspan="2" align="center"><?php echo $descripcionDependencia;?></td>
                </tr>
                <tr>
                    <td class="strg fnt">Estado:</td>
                    <td class="strg fnt" colspan="2" align="center"><?php echo $descripcionTecnico;?></td>
                </tr>
                <tr style="">
                    <td class="strg fnt" align="center" style="width: 73px; ">Item</td>
                    <td class="strg fnt" align="center" style="width: 600px; ">Descripcion</td>
                    <td class="strg fnt" align="center" style="width:  73px; ">Cantidad</td>
                </tr>
    
                <?php 
                $pos = 1 ;
                $total = 0;
                foreach($elementosPedido as $fila){
                    echo "<tr>";
                        echo "<td style='width: 73px; ' align='center'>".$pos."</td>";
                        echo "<td style='width: 600px; ' align='left'>".$fila->nombreelemento." ".$fila->marca." ".$fila->modelo." - ".$fila->numeroserie."</td>";
                        echo "<td style='width: 73px; ' align='center' >".$fila->cantidad."</td>";
                    echo "</tr>";
                                $pos++;
                                $total = $total + $fila->cantidad;
                            };
                ?>

                
               <tr>
                    
                    <td class="strg fnt" colspan="2" align="right">Total:</td>
                    <td align="center"><?php echo $total;?></td>
                </tr>

                                
                <tr>
                    <td colspan="3" align="center"><br>
                        <div id="bcTarget" class="barcode"></div><br>
                    </td>
                </tr>
            </tbody>
        </table>

                            <br>


        
    </div>
    

</body>

<script>
$(".barcode").barcode("<?php echo $barcode;?>", "code11",{ barWidth: 2, barHeight: 80,fontSize: 20 });
</script>

</html>