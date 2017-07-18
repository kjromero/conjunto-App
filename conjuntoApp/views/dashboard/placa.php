<?php 
	
	$idResidente = $_POST['idResidente'];

	echo $idResidente;

  include '../partials/head.php';
  require_once '../partials/menu.php';
  require_once '../partials/aside.php';
  require_once '../../controller/UserController.php';
  require_once '../../controller/VehiculoController.php';
  
?>
<div class="container">
	 <div class="row">
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
				   	    	$fila = Usuario::getResidenteId($idResidente); 

				   	   	  foreach ( $fila   as $key => $row) {
				   	   	  	
				   	   	
				   	   	  	echo "<td contenteditable='true'><p>".$row['nombre']."</p></td>";
				   	   	  	echo "<td contenteditable='true'><p>".$row['idApto']."</p></td>";
				   	   	  	echo "<td contenteditable='true'> <p>" .$res =($row['vehiculo'] == 0) ?  "no":  "si" . "</p></td>";

				   	   	  	echo "<td contenteditable='true'> <p>" .$res =($row['estado'] == 0) ?  "Al dia":  "En Mora" . "</p></td>";



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

 <h1>Cat</h1>