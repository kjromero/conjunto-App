<?php 

  include '../partials/head.php';
  require_once '../partials/menu.php';
  require_once '../partials/aside.php';
  require_once '../../controller/UserController.php';
 ?>

<div class="container">
	<div class="row">
  		<div class="col-md-10" style="padding-top: 70px;">

	     	<?php 
				$id = $_GET["idApto"];
				// $nameResidente = $_GET["nameResidente"];

			 ?>
	     <form id="residente" method='POST'>
	         <div class="form-group">
	          <h1>Asignar parqueaderos</h1>
	          <input type="text" name="idApto" value=<?php echo $id; ?> class="hidden">
	         </div>
	         <div class="form-group">
	         	<label>Parking</label>
	         	<select id="idParking" name="idParking">
	         	<?php 
	         		foreach ( Usuario::getAllParkings()  as $key => $row) {
	         			echo "<option value=".$row['idParking'].">".$row['numParking']."</option>";
			   	   	  }
	         	 ?>
				</select>

	         	 <!-- <input type="text" name="apto"  required class="form-control"> -->
	         </div>


	         <div class="form-group">
	         	<button onclick="AsignarParking.asignar(); return false;" class="btn btn-warning">Asignar</button>
	         </div>
	     	
	     </form>
		</div>
	</div>
</div>	

<?php include '../partials/footer.php';?>
<script type="text/javascript" src="../assets/js/asignarParking.js"></script>
