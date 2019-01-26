<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <!-- BEGIN PAGE SIDEBAR IZQUIERDA -->
    <!-- BEGIN PAGE SIDEBAR WRAPPER -->
    <?php
    //print_r($this->session->all_userdata());exit;die;// para ver todo los datos del session
    /*USAR CUANDO SE CONFIGURA EL SESSION <<<<<<<<<<<<<<<-------------------------------------------------*/
    //if ($this->menues->ConsultarMenuIzquierda($this->session->userdata('id_perfil')) === FALSE) {

    if ($this->menues->ConsultarMenuIzquierda($this->session->userdata('id_perfil')) === FALSE) {
    } else {
        ?>

            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN ARMAR MENU IZQUIERDA-->
                <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <!--                <li class="start ">
                                                            <a href="index.html">
                                                            <i class="icon-home"></i>
                                                            <span class="title">Inicio</span>
                                                            </a>
                                    </li>-->
                    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element
                     DOC: This is mobile version of the horizontal menu. The desktop version is defined(duplicated) in the header above -->
                    <li class="sidebar-toggler-wrapper">
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        <div class="active open">
                        </div>
                        <!-- END SIDEBAR TOGGLER BUTTON -->
                    </li>
      <?php /*USAR CUANDO SE CONFIGURA EL SESSION <<<<<<<<<<<<<<<-------------------------------------------------*/
            //echo $this->menues->armar_menues($this->session->userdata('id_perfil'));
            echo $this->menues->armar_menues($this->session->userdata('id_perfil'));
      ?>

                </ul>
                <!-- END ARMAR MENU IZQUIERDA -->
            </div>
            <!-- END PAGE SIDEBAR NAVBAR COLLAPSE -->
        </div>
<?php }; ?>
    <!-- END PAGE CONTAINER: El div tiene que cerrar en el body -->
