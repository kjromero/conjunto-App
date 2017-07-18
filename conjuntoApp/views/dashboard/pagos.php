<?php

  include '../partials/head.php';
  require_once '../partials/menu.php';
  require_once '../partials/aside.php';
  require_once '../../controller/UserController.php';

  $usr = new Usuario();
  $fila = $usr->getPagos();
  
?>
<div class="container">
	 <div class="row">
			 <div class="col-md-10" style="padding-top: 60px;">
				   <h1>Listar Pagos</h1>

				   <table class="table">
				   	<thead>
				   		<tr>
				   			<td> No Pago -   </td>
				   			<td> Residente -  </td>
				   			<td> Estado - </td>
				   			<td> Info</td>
				   			
				   		</tr>

				   	</thead>
				   	<tbody>
				   	   <?php 
				   	   	  foreach ($fila  as $key => $row) {

				   	   	  	$varl = $usr->getCurrentState($row['idResidente']);

				   	   	  	
				   	   	  	echo "<td contenteditable='true'><p>".$row['id']."</p></td>";
				   	   	  	echo "<td contenteditable='true'><p>".$row['idResidente']."</p></td>";

				   	   	  	foreach ($varl as $key => $value) {
				   	   	  		echo "<td contenteditable='true'> <p>" .$res =($value['estado'] == 0) ?  "Al dia":  "En Mora" . "</p></td>";
				   	   	  		// echo "<td contenteditable='true'><p>".$value['estado']."</p></td>";
				   	   	  	}
//echo "<td contenteditable='true'><p>".$usr->getCurrentState($row['idResidente'])."</p></td>";


				   	   	  	echo "<td contenteditable='true'> <p>".$row['info']."</p></td>";

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