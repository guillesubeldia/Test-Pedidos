<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--Para que funcione bien en los dispositivos-->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="<?php echo base_url(). 'plantilla/bower_components/bootstrap/dist/css/bootstrap.min.css'?>">
	<title>Factura 2</title>
	<style type="text/css">
		.container{
			margin-top: 70px;
		}

		.img-fluid .logo{
			max-width: 200px;
			max-height: 68px;
			margin-top: 10px;
			margin-bottom: 10px;
		}
		p{
			font-family: sans-serif;
			margin-bottom: 2px;
			margin-top: 2px;
		}
		.contenido {
		    max-width: 800px;
		    margin: 0px auto;
		    padding: 0px 3px;
    }
	  .central {
	    	width: 100%;
	    	min-width: 200px;
	    	margin: 0px 0px 0px;
	    	padding: 0px 5px 0px;
	    	vertical-align: top;
	  }
	    /* #principal::after{
	    	content     : 'Tipo';
	    	position: absolute;
	    	top: 35%;
	    	left: 37%;
    		font-size   : 100px;
    		color:#e2e6e9;
	    } */
	</style>
</head>
<body>
	<div class="container">
		<div class="table-responsive contenido">
			<table class="table">
				<tbody class="central">
					<tr style="border-right: 1px solid #dee2e6;border-left:1px solid #dee2e6;">
						<td colspan="2">
							<table style="width:100%;">
								<tr>
									<td width="50%" align="center" style="border:none;">
										<b>
											<!-- <img src="img/logo2.png" alt="Enan" class="img-fluid logo"> -->
				              <p>Colegio Privado</p>
				              <p>Dr. Esteban L. Maradona</p>
				              <!-- <p class="font-weight-bold">IVA Responsable Inscripto</p> -->
										</b>
                	</td>
                	<td width="50%" style="border-left:1px solid #dee2e6;border-top:none;border-bottom:none;border-right:none;padding-left:10px">
	          				<!-- <p>Recibo Nº:</p> -->
		                <p>Fecha:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20/06/2018</p>
		                <p>Apertura:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;06:20</p>
										<p>Cierre:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;21:30</p>
	                </td>
								</tr>
							</table>
						</td>
					</tr>

					<tr>
						<td colspan="2" style="padding:0px;">
							<div class="table-responsive" id="principal">
								<table class="table table-bordered" width="100%" style="margin-bottom:0px; border-right:0px; border-left:0px; border-top:0px; border-bottom:0px;">
									<thead class="thead-light text-center">
										<tr>
											<th colspan="6"> <center>INGRESOS</center> </th>
										</tr>
									    <tr>
									    	<th width="20%">Cuenta</th>
									    	<th width="20%">Subcuenta</th>
									      <th width="20%">Descripción</th>
												<th width="10%">Tipo comp.</th>
												<th width="10%">N° Comp.</th>
												<th width="20%">Imp. Pagado T.P.</th>
										</tr>
									</thead>
									<tbody>
										<tr>
									  	<td>Cantina</td>
									    <td>Cantina</td>
									    <td>Cantina</td>
											<td>R</td>
											<td>05042018</td>
											<td>$152.701,13</td>
									  </tr>
										<tr>
									  	<td>Cuotas/Matriculas</td>
									    <td>Cuotas</td>
									    <td>Cuotas</td>
											<td>F</td>
											<td>05042018</td>
											<td>$152.701,13</td>
									  </tr>
										<tr>
									  	<td>Cantina</td>
									    <td>Cantina</td>
									    <td>Cantina</td>
											<td>R</td>
											<td>05042018</td>
											<td>$152.701,13</td>
									  </tr>
										<tr>
									  	<td>Cantina</td>
									    <td>Cantina</td>
									    <td>Cantina</td>
											<td>R</td>
											<td>05042018</td>
											<td>$152.701,13</td>
									  </tr>
									</tbody>
									<tfoot>
										<td colspan="5" align="right"><b>Total Ingresos</b></td>
										<td><b>$152.701,13</b></td>
									</tfoot>
								</table>
							</div>
						</td>
					</tr>

					<tr>
						<td colspan="2" style="padding:0px;">
							<div class="table-responsive" id="principal">
								<table class="table table-bordered" width="100%" style="margin-bottom:0px; border-right:0px; border-left:0px; border-top:0px; border-bottom:0px;">
									<thead class="thead-light text-center">
											<tr>
												<th colspan="6"> <center>EGRESOS</center> </th>
											</tr>
									    <tr>
									    	<th width="20%">Cuenta</th>
									    	<th width="20%">Subcuenta</th>
									      <th width="20%">Descripción</th>
												<th width="10%">Tipo comp.</th>
												<th width="10%">N° Comp.</th>
												<th width="20%">Imp. Pagado T.P.</th>
										</tr>
									</thead>
									<tbody>
										<tr>
									  	<td>Cantina</td>
									    <td>Cantina</td>
									    <td>Cantina</td>
											<td>R</td>
											<td>05042018</td>
											<td>$152.701,13</td>
									  </tr>
										<tr>
									  	<td>Cuotas/Matriculas</td>
									    <td>Cuotas</td>
									    <td>Cuotas</td>
											<td>F</td>
											<td>05042018</td>
											<td>$152.701,13</td>
									  </tr>
										<tr>
									  	<td>Cantina</td>
									    <td>Cantina</td>
									    <td>Cantina</td>
											<td>R</td>
											<td>05042018</td>
											<td>$152.701,13</td>
									  </tr>
										<tr>
									  	<td>Cantina</td>
									    <td>Cantina</td>
									    <td>Cantina</td>
											<td>R</td>
											<td>05042018</td>
											<td>$152.701,13</td>
									  </tr>
									</tbody>
									<tfoot>
										<td colspan="5" align="right"><b>Total Egresos</b></td>
										<td><b>$152.701,13</b></td>
									</tfoot>
								</table>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="padding:0px;">
							<div class="table-responsive">
								<table class="table table-bordered" width="100%" style="margin-bottom:0px; border-right:0px; border-left:0px; border-top:0px; border-bottom:0px;">
									<thead class="text-center" style="font-size: 14px;">
									  <tr>
										  <th width="80%">TOTAL DE CAJA</th>
										  <th width="20%">$35.610,88</th>
										</tr>
									</thead>
								</table>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<br>
	</div>
	<script src="<?php echo base_url(). 'plantilla/bower_components/jquery/dist/jquery.min.js'?>"></script>
	<!-- <script src="js/popper.min.js"></script> -->
	<script src="<?php echo base_url(). 'plantilla/bower_components/bootstrap/dist/js/bootstrap.min.js'?>"></script>
</body>
</html>
