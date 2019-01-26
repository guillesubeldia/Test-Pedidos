<script>
window.onload = function() {
  ContarRecordatorios();
  CargarRecordatoriosNuevos();
}
function CargarRecordatoriosNuevos(){
    $.post("<?php echo base_url() ?>/recordatorio/C_recordatorio/RecordatoriosNuevos",
    {},
      function(data) {
        document.getElementById('headerListarRecordatorios').innerHTML = data; //Se muestra el resultado
        document.getElementById('headerListarRecordatorios').style.display = "block";
      });
}

function RecordatorioTipo(id){
 var tipoRecordatorio = id;
  $.ajax({
      type:'POST',
      url:"<?php echo base_url() . 'recordatorio/C_recordatorio/RecuperarPorTipo';?>",
      dataType: "json",
      data:{tipoRecordatorio:tipoRecordatorio},
      success:function(data){
          if(data.estado == 'ok'){
           if(tipoRecordatorio == 2){
              document.getElementById("headerListarTipoRecordatorios1").innerHTML = data.resultado;
           }else{
             document.getElementById("headerListarTipoRecordatorios2").innerHTML = data.resultado;
           }
          }
      }
  });
}

//funciona :D
function ContarRecordatorios(){
  $.ajax({
      type:'POST',
      url:"<?php echo base_url() . 'recordatorio/C_recordatorio/ContarRecordatorios';?>",
      dataType: "json",
      data:{},
      success:function(data){
      // console.log("entro en la funcion");
      // console.log(data.resultado[0].cantidadrecordatorio);
          if(data.estado == 'ok'){
              $('.user-content').slideDown();
              $('#headCantidadRecordatorio').text(data.resultado[0].cantidadrecordatorio);
          }else{
            console.log("error");
              $('.user-content').slideUp();
              alert("User not found...");
          }

      }
  });
}

</script>
<!-- begin::Footer -->
      <footer class="m-grid__item    m-footer ">
        <div class="m-container m-container--fluid m-container--full-height m-page__container">
          <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
            <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
              <span class="m-footer__copyright">
                <?php echo date('Y');?>  &copy;
                <a href="" class="m-link" target="_blank">
                  E-SELL
                </a>
              </span>
            </div>
            <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
              <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
                <li class="m-nav__item">
                  <a href="#" class="m-nav__link">
                    <span class="m-nav__link-text">
                      Acerca de
                    </span>
                  </a>
                </li>
                <li class="m-nav__item m-nav__item">
                  <a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Preguntas M&aacute;s Frecuentes" data-placement="left">
                    <i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      <!-- end::Footer -->
    </div>
    <!-- end:: Page -->
      <!-- begin::Scroll Top -->
    <div id="m_scroll_top" class="m-scroll-top">
      <i class="la la-arrow-up"></i>
    </div>
    <!-- end::Scroll Top -->
    <!-- begin::Quick Nav -->
    <!-- <ul class="m-nav-sticky" style="margin-top: 30px;">
      <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Documentaci&oacute;n" data-placement="left">
        <a href="" target="_blank">
          <i class="la la-code-fork"></i>
        </a>
      </li>
      <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Centro de Ayuda" data-placement="left">
        <a href="" target="_blank">
          <i class="la la-life-ring"></i>
        </a>
      </li>
    </ul> -->
    <!-- begin::Quick Nav -->
      <!--begin::Base Scripts -->
    <script src="<?php echo base_url() . 'plantilla/js/vendors.bundle.js'; ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'plantilla/js/scripts.bundle.js'; ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'plantilla/js/bootstrap-select.js'; ?>" type="text/javascript"></script>
    <!-- <script src="<?php //echo base_url() . 'plantilla/plugins/forms/validation/form-controls.js'; ?>" type="text/javascript"></script> -->
    <script src="<?php echo base_url() . 'plantilla/plugins/datatables/datatables.bundle.js'; ?>" type="text/javascript"></script>
    <script src="<?php echo base_url() . 'plantilla/plugins/datatables/basic/scrollable.js'; ?>" type="text/javascript"></script>
    <!-- <script src="<?php //echo base_url() . 'plantilla/plugins/bootstrap-validator/dist/validator.min.js'; ?>" type="text/javascript"></script> -->
    <!--end::Base Scripts -->
  </body>
  <!-- end::Body -->
</html>
