<?php 

  include '../partials/head.php';
  require_once '../partials/menu.php';
  require_once '../partials/aside.php';
  require_once '../../controller/UserController.php';
  require_once '../../controller/VehiculoController.php';
  
?>
<div class="container">
	 <div class="row">
	 <div class="col-md-10" style="padding-top: 70px;">
	     <h2>Consultar por placa</h2>
	     <form id="residente" method='POST' action="placa.php">
	  
	         <div class="form-group">
	         	<label>Placa</label>
	         	<select id="idResidente" name="idResidente">
	         	<?php 
	         		foreach ( Vehiculo::getAllVehiculos()  as $key => $row) {
	         			echo "<option value=".$row['idResidente'].">".$row['placa']."</option>";
			   	   	  }
	         	 ?>
				</select>
 	         	 <!-- <input type="text" name="apto"  required class="form-control"> -->
	         </div>
	                
	         <div class="form-group">
	         	<button onclick="Residente.residente(); return false;" class="btn btn-primary">Consultar</button>
	         </div>
	     	
	     </form>
	 	
	 </div>		
			 <div class="col-md-10" style="padding-top: 60px;">
				   <h1>Residente</h1>

				   <table class="table">
				   	<thead>
				   		<tr>
				   			<td> Nombre -   </td>
				   			<td> Apto -  </td>
				   			<td> propietario vehiculo - </td>
				   			<td> Estado del residente  </td>
				   			
				   		</tr>
				   	</thead>
				   	<tbody>
				   	   <?php 
				   	   	  foreach ( Usuario::getAllResidentes()  as $key => $row) {
				   	   	  	echo "<tr id='id_".$row['id']."' style='cursor:pointer'>";
				   	   	  	echo "<td contenteditable='true'><p>".$row['nombre']."</p></td>";
				   	   	  	echo "<td contenteditable='true'><p>".$row['idApto']."</p></td>";
				   	   	  	echo "<td contenteditable='true'> <p>" .$res =($row['vehiculo'] == 0) ?  "no":  "si" . "</p></td>";

				   	   	  	echo "<td contenteditable='true'> <p>" .$res =($row['estado'] == 0) ?  "Al dia":  "En Mora" . "</p></td>";


echo "<td> <a href='../dashboard/editResidente.php?idResidente=".$row['id']."&nameResidente=".$row['nombre']."'><button class='edit' id_edit=".$row['id'].">Editar</button></a></td>";
				   	   	  	echo "</tr>";
				   	   	  
				   	   	  }
				   	   ?>
				   	   <tr></tr>
				   	</tbody>
				   </table>
			 	
			 </div>
	 </div>
</div>


<?php include '../partials/footer.php';?>
<script type="text/javascript" src="../assets/js/residente.js"></script>
