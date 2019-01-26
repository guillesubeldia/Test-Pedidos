
<div class="m-grid__item m-grid__item--fluid m-wrapper">
  <div class="m-content">
    <!--begin::Portlet-->
    <div class="m-portlet">
      <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <span class="m-portlet__head-icon">
                      <i class="la la-thumb-tack m--font-success"></i>
                    </span>
            <h3 class="m-portlet__head-text m--font-success">
                      Carga de Elemento
                    </h3>
          </div>
        </div>

      </div>
      <form action="<?php echo base_url()."producto/C_producto/ModificarProductoServicio";?>" method="post" class="m-form m-form--label-align-right">
        <div class="m-portlet__body">
          <div class="m-form__section m-form__section--first">
            <div class="m-form__heading">
              <h3 class="m-form__heading-title">Informacion del Elemento:</h3>
            </div>
            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">
            Elemento a Cargar
          </label>
              <div class="col-lg-6">
                <select class="form-control m-input form-control-sm" onchange="verElemento()" id="tipoElemento" name="tipoElemento" required>
                <option value="" selected disabled>Seleccione</option>
                <option value="1">
                  Producto
                </option>
                <option value="2">
                  Servicio
                </option>
            </select>
              </div>
            </div>
            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">
            Categoria
          </label>
              <!-- SELECT BOOTSTRAP, CARGAR PLUGIN
<div class="col-lg-6">
<select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true">
                  <option>
                    Hot Dog, Fries and a Soda
                  </option>
                  <option>
                    Burger, Shake and a Smile
                  </option>
                  <option>
                    Sugar, Spice and all things nice
                  </option>
                </select>
                <span class="m-form__help">
                  You can add a search input by passing
                  <code>
                  data-live-search="true"
                </code>
                attribute
              </span>
          </div> -->
              <div class="col-lg-6">
                <select class="form-control m-input form-control-sm" id="categoriaPadre" name="categoriaPadre" required>
                  <option value="" selected disabled>Seleccione una Categoria</option>
                  <?php foreach($categorias->result() as $row):?>
                  <option value="<?php echo $row->id_tipoProductoServicio;?>"><?php echo $row->descripcion;?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>
            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">
            Sub Categoria
          </label>
              <div class="col-lg-6">
                <select class="form-control m-input form-control-sm" id="subCategoria" name="subCategoria" required>
                    <option value="" selected disabled>Seleccione una Sub Categoria</option>
                </select>
              </div>
            </div>
            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">
                       Descripcion
                     </label>
              <div class="col-lg-6">
                <input name="nombreElemento" class="form-control m-input" placeholder="Nombre del Producto" required>
                <span class="m-form__help">
                         *Requerido
                       </span>
              </div>
            </div>
            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">
                       Código Producto
                     </label>
              <div class="col-lg-6">
                <input name="cups" class="form-control m-input" placeholder="Codigo del Producto" required>
                <span class="m-form__help">
                         *
                       </span>
              </div>
            </div>
            <div id="elementoProducto" style="display:none;">
              <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label">Precio Costo</label>
                <div class="col-lg-6">
                  <input name="precioCosto" id="precioCosto" class="form-control m-input" placeholder="Precio de Costo" required>
                  <span class="m-form__help">*</span>
                </div>
              </div>
              <div class="form-group m-form__group row">
                <label class="col-lg-2 col-form-label">Porcentaje de Ganancia</label>
                <div class="col-lg-6">
                  <input name="ganancia" id="ganancia" class="form-control m-input" placeholder="Porcentaje de Ganancia" required>
                  <span class="m-form__help">*</span>
                </div>
              </div>


            </div>
            <div class="form-group m-form__group row">
              <label class="col-lg-2 col-form-label">Precio Final</label>
              <div class="col-lg-6">
                <input name="precioVenta" id="precioVenta" class="form-control m-input" placeholder="Precio de Venta" required>
                <span class="m-form__help">*</span>
              </div>
            </div>


          </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
          <div class="m-form__actions m-form__actions">
            <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-6">
                <button type="sbumit" class="btn btn-primary">
            Enviar
          </button>
                <button type="reset" class="btn btn-secondary">
            Cancelar
          </button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <!--end::Portlet-->
  </div>
</div>
</div>
<!-- end:: Body -->

<script>
  function verElemento() {
    var elemento = document.getElementById("tipoElemento").value;
    //alert (elemento);
    if (elemento == 1) {
      elementoProducto.style.display = "block";
      document.getElementById("precioCosto").required = true;
      document.getElementById("ganancia").required = true;
    } else {
      elementoProducto.style.display = "none";
      document.getElementById("precioCosto").required = false;
      document.getElementById("ganancia").required = false;
    }
  }

/*Funcion para cargar un select dependiente de otro.*/
    $(document).ready(function () {
        $("#categoriaPadre").change(function () {
          alert("funca");
            $("#categoriaPadre option:selected").each(function () {
                categoriaPadre = $('#categoriaPadre').val();
                $.post("<?php echo base_url();?>producto/C_producto/BuscarSubCategoria", {
                    categoriaPadre: categoriaPadre
                }, function (data) {
                    $("#subCategoria").html(data);
                });
            });
        }); });
</script>
