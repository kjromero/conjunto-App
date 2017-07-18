<?php 
	

  include '../partials/head.php';
  require_once '../partials/menu.php';
  require_once '../partials/aside.php';
  require_once '../../controller/UserController.php';
 ?>

<div class="container">
	<div class="row">
  		<div class="col-md-10" style="padding-top: 70px;">
	     <h2>Editar Residente</h2>

	     	<?php 
				$id = $_GET["idResidente"];
				$nameResidente = $_GET["nameResidente"];

			 ?>
	     <form id="residente" method='POST'>
	         <div class="form-group">
	          <input type="text" name="id" value=<?php echo $id; ?> class="hidden">
	         	 <label>Nombre</label>
	         	 <input type="text" name="nombre" required class="form-control" value=<?php echo $nameResidente; ?> >
	         </div>
	         <div class="form-group">
	         	<label>Apto</label>
	         	<select id="idApto" name="idApto">
	         	<?php 
	         		foreach ( Usuario::getAllAptos()  as $key => $row) {
	         			echo "<option value=".$row['idApto'].">".$row['numApto']."</option>";
			   	   	  }
	         	 ?>
				</select>

	         	 <!-- <input type="text" name="apto"  required class="form-control"> -->
	         </div>
	         <div class="form-group">
	         	 <label>Vehiculo</label>
	         	 <select id="vehiculo" name="vehiculo">
	         	 	<option value="0">No</option>
	         	 	<option value="1" >Si</option>
	         	 </select>
	         </div>

	          <div class="form-group">
	         	 <label>Estado</label>
	         	 <select id="estado" name="estado">
	         	 	<option value="0">Al dia </option>
	         	 	<option value="1" >En mora</option>
	         	 </select>
	         </div>	


	         <div class="form-group">
	         	<button onclick="EditResidente.residente(); return false;" class="btn btn-warning">Editar</button>
	         </div>
	     	
	     </form>
		</div>
	</div>
</div>	

<?php include '../partials/footer.php';?>
<script type="text/javascript" src="../assets/js/editResidente.js"></script>
