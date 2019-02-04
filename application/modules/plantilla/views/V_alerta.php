
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <h1>
       <?php echo $idError." ".$tipoError;?>
     </h1>
     <ol class="breadcrumb">
       <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i>Inicio</a></li>
       <li class="active"><?php echo $idError;?> Error</li>
     </ol>
   </section>
   <!-- Main content -->
   <section class="content">
     <div class="error-page">
       <h2 class="headline text-red"><?php echo $idError;?></br></h2>
       <div class="error-content">
         <h3><strong><i class="fa fa-warning text-red"></i> Oops! Algo salio mal.</strong></h3>
         <p>
          <h3><?php echo $mensaje;?></h3>
         </p>
         <form class="search-form" action="<?php echo base_url().$url;?>" method="post">
           <div class="input-group">
             <button type="submit" name="submit" class="btn btn-danger pull-right">VOLVER</button>
           </div>
           <!-- /.input-group -->
         </form>
       </div>
     </div>
     <!-- /.error-page -->
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
