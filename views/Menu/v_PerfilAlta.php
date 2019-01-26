<div class="page-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Consulta de Menues con Perfiles
                </h3>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="alert alert-block alert-error fade in" style="width: 320px; margin: auto; padding-right: 5px; padding-bottom: 5px;">
                    <?php
                    if ($borrados == "uno") {
                        echo "<h4 style='text-align: center;' class='alert-heading'>Listo!</h4><br>";
                        echo "<p style='text-align:center;'>El perfil se ha dado de alta con Ã©xito.</p>";
                    } elseif ($borrados == "muchos") {
                        echo "<h4 style='text-align: center;' class='alert-heading'>Listo!</h4><br>";
                        echo "<p style='text-align:center;'>Los perfiles se han dado de alta con Ã©xito.</p>";
                    } elseif ($borrados == "vacio") {
                        echo "<h4 style='text-align: center;' class='alert-heading'>No hay relaciones seleccionadas!</h4><br>";
                        echo "<p style='text-align:center;'>Seleccione como mÃ­nimo un (1) perfil para dar de alta.</p>";
                    }
                    ?>
                    <p><center><br>
                        <input id="Aceptar" class='btn green' type="button" value="Aceptar" onclick="Aceptar();"/>
                        <script type="text/javascript">
                            function Aceptar() {
                                window.location.href = document.referrer;
                            }
                        </script>

                        </p></center>
                </div>
            </div>
        </div>
    </div> 
</div>
</div>

