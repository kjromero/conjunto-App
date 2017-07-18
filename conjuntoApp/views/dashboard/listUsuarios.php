<?php 

  include '../partials/head.php';
  require_once '../partials/menu.php';
  require_once '../partials/aside.php';
  require_once '../../controller/UserController.php';

  $usr = new Usuario();
  $fila = $usr->getUsuarios();
  
?>
<div class="container">
	 <div class="row">
			 <div class="col-md-10" style="padding-top: 60px;">
				   <h1>Listado de Usuarios</h1>

				   <table class="table">
				   	<thead>
				   		<tr>
				   			<td>Nombre -   </td>
				   			<td> Usuario -  </td>
				   			<td> Email - </td>
				   			<td> Fecha Registro</td>
				   			
				   		</tr>
				   	</thead>
				   	<tbody>
				   	   <?php 
				   	   	  foreach ($fila  as $key => $row) {
				   	   	  	echo "<tr id='id_".$row['id']."' style=''>";
				   	   	  	echo "<td contenteditable='true'><p>".$row['nombre']."</p></td>";
				   	   	  	echo "<td contenteditable='true'><p>".$row['usuario']."</p></td>";
				   	   	  	echo "<td contenteditable='true'> <p>".$row['email']."</p></td>";
echo "<td contenteditable='true'><p>".date_format(date_create($row['fecha_registro']), 'M-D-y ')."</p></td>";
				   	   	  	echo "<td ><button class='edit btn btn-primary' id_edit=".$row['id'].">Editar</button></td>";
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