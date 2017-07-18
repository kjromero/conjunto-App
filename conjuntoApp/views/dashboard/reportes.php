<?php

  include '../partials/head.php';
  require_once '../partials/menu.php';
  require_once '../partials/aside.php';
  require_once '../../controller/UserController.php';

  // $usr = new Usuario();
  // $fila = $usr->getPagos();
  
?>
<div class="container">
	 <div class="row">
			 <div class="col-md-10" style="padding-top: 60px;">
				   <h1>Reportes</h1>

				   <a href="../assets/reporteAptos.php"> <button  class="btn btn-primary">Reporte Apartamentos </button></a>
				  
				  
			 </div>
	 </div>
</div>


<?php include '../partials/footer.php';?>