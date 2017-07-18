<?php 

  include '../partials/head.php';
  require_once '../partials/menu.php';
  require_once '../partials/aside.php';
  require_once '../../controller/VehiculoController.php';
?>


<div class="container">
	<div class="starter-template">
	
		<div class="jumbotron">


		<div class="container">
		    <div class="row">
		        <div class="col-md-10" style="padding-top: 70px;">
				 <h2>Editar vehiculos</h2>
				 <?php 
						$id = $_GET["idVehiculo"];

						echo $id;
					 ?>
		            <form id="vehiculo" method='POST'>
		                <div class="form-group">
		                <input type="text" name="id" value=<?php echo $id; ?> class="hidden">

		                    <label>Modelo</label>
		                    <?php
 								$modelo;
 								$marca;
 								$placa;
 								$tipo;

	                            foreach(VehiculoController::getVehiculo($id) as $row)
	                            {
	                                 $modelo = $row['modelo'];
	                                 $marca = $row['marca'];
	                                 $placa = $row['placa'];
	                                 $tipo = $row['id_tipo']; 
	                            }
                        
		                     ?>
		                  <input type="text" name="modelo" required class="form-control" value=<?php echo $modelo; ?>>
		                </div>
		                <div class="form-group">
		                    <label>Marca</label>
		                    <input type="text" name="marca"  required class="form-control" value=<?php echo $marca; ?>>
		                </div>
		                <div class="form-group">
		                    <label>Placa</label>
		                    <input type="text" name="placa"  required class="form-control" value=<?php echo $placa; ?>>
		                </div>
		              
		                <div class="form-group">
		                    <label>Vehiculo</label>
		                    <select id="vehiculo" name="tipo">
		                        <option value="1">Carro</option>
		                        <option value="2" >Camioneta</option>
		                        <option value="3" >Moto</option>
		                    </select>
		                </div>
		                <div class="form-group">
		                    <button onclick="EditVehiculo.vehiculo(); return false;" class="btn btn-primary">Editar</button>
		                     <button onclick="VehiculoController::deleteVehiculo($id); return false;" class="btn btn-danger">Eliminar</button>
		                </div>

		            </form>
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- /.container -->
<?php include '../partials/footer.php';?>
<script type="text/javascript" src="../assets/js/editVehiculo.js"></script>