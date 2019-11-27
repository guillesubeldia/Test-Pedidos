
<?php echo $idPedido;?>
<!-- Modal -->
<div class="modal fade" id="comprobanteModal" tabindex="-1" role="dialog" aria-labelledby="comprobanteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="comprobanteModalLabel">Impresion de Comprobante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a type="button" target="_blank" href="<?php echo base_url()."Pedidos/C_Pedidos/GeneraComprobante/".$idPedido?>" class="btn btn-success">Comprobante</a>    
        &nbsp;&nbsp;&nbsp;
        <a type="button" target="_blank" href="<?php echo base_url()."Pedidos/C_Pedidos/GeneraRecibo/".$idPedido?>" class="btn btn-success">Recibo</a>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>