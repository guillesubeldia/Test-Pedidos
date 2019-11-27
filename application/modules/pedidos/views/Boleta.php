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
    $descripcionTecnico          = $row->pedidotecnico;
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


table, th, td {
    border-collapse: collapse;
  border: 1px solid black;
}
td{
    padding: 5px;
}
.logo{
     width: 200px; 
     height: 60px;
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
                    <td style="width: 10%;" align="center">Cargo N°: <?php echo $idPedido;?></td>
                    <td class="strg fnt"  style="width: 80%;" align="center">Direccion de informatica y comunicaciones</td>
                    <td style="width: 10%;"> <?php echo date("d/m/Y");?> </td>
                </tr>
                <tr>
                    <td class="strg fnt" style="width: 100%;" colspan="3" align="center"><?php echo $descripcionTecnico;?></td>
                </tr>
                <tr style="">
                    <td class="strg fnt" align="center" style="width: 10% ">Item</td>
                    <td class="strg fnt" align="center" style="width: 80%; ">Descripcion</td>
                    <td class="strg fnt" align="center" style="width:  10% ">Cantidad</td>
                </tr>
    
                <?php 
                $pos = 1 ;
                $total = 0;
                foreach($elementosPedido as $fila){
                    echo "<tr>";
                        echo "<td style='width: 10%' align='center'>".$pos."</td>";
                        echo "<td style='width: 80%' align='left'>".$fila->nombreelemento." ".$fila->marca." ".$fila->modelo." - ".$fila->numeroserie."</td>";
                        echo "<td style='width: 10%; ' align='center' >".$fila->cantidad."</td>";
                    echo "</tr>";
                                $pos++;
                                $total = $total + $fila->cantidad;
                            };
                ?>

                
               <tr>
                    
                    <td class="strg fnt" style='width: 90%' colspan="2" align="right">Total:</td>
                    <td align="center" style='width: 10%'><?php echo $total;?></td>
                </tr>

                <tr>
                    <td class="strg fnt" style='width: 10%'>Destino:</td>
                    <td colspan="2" align="center" style='width: 90%'><?php echo $descripcionDependencia;?></td>
                </tr>
                <tr>
                    <td class="strg fnt" style='width: 10%'>Retira:</td>
                    <td class="up" colspan="2"style='width: 70%' align="left"><?php echo $retira;?><br>Firma </td>
                    
                    
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <div id="bcTarget" class="barcode"></div>
                    </td>
                </tr>
            </tbody>
        </table>        
    </div>
    <div>
        <table border="1">
            <tbody>
                <tr>
                    <td colspan="3" align="left">
                        <img class="logo" src="<?php echo base_url(). 'plantilla/jqueryBarcode/Logo MDH.png'?>">
                    </td>
                </tr>
                
                <tr>
                    <td style="width: 10%;" align="center">Cargo N°: <?php echo $idPedido;?></td>
                    <td class="strg fnt"  style="width: 80%;" align="center">Direccion de informatica y comunicaciones</td>
                    <td style="width: 10%;"> <?php echo date("d/m/Y");?> </td>
                </tr>
                <tr>
                    <td class="strg fnt" style="width: 100%;" colspan="3" align="center"><?php echo $descripcionTecnico;?></td>
                </tr>
                <tr style="">
                    <td class="strg fnt" align="center" style="width: 10% ">Item</td>
                    <td class="strg fnt" align="center" style="width: 80%; ">Descripcion</td>
                    <td class="strg fnt" align="center" style="width:  10% ">Cantidad</td>
                </tr>
    
                <?php 
                $pos = 1 ;
                $total = 0;
                foreach($elementosPedido as $fila){
                    echo "<tr>";
                        echo "<td style='width: 10%' align='center'>".$pos."</td>";
                        echo "<td style='width: 80%' align='left'>".$fila->nombreelemento." ".$fila->marca." ".$fila->modelo." - ".$fila->numeroserie."</td>";
                        echo "<td style='width: 10%; ' align='center' >".$fila->cantidad."</td>";
                    echo "</tr>";
                                $pos++;
                                $total = $total + $fila->cantidad;
                            };
                ?>

                
               <tr>
                    
                    <td class="strg fnt" style='width: 90%' colspan="2" align="right">Total:</td>
                    <td align="center" style='width: 10%'><?php echo $total;?></td>
                </tr>

                <tr>
                    <td class="strg fnt" style='width: 10%'>Destino:</td>
                    <td colspan="2" align="center" style='width: 90%'><?php echo $descripcionDependencia;?></td>
                </tr>
                <tr>
                    <td class="strg fnt" style='width: 10%'>Retira:</td>
                    <td class="up" colspan="2"style='width: 70%' align="left"><?php echo $retira;?><br>Firma </td>
                    
                    
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <div id="bcTarget" class="barcode"></div>
                    </td>
                </tr>
            </tbody>
        </table>        
    </div>
    

</body>

<script>
$(".barcode").barcode("<?php echo $barcode;?>", "code11",{ barWidth: 2, barHeight: 40,fontSize: 12 });
</script>

</html>