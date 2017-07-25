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
				$numApto = $_GET["numApto"];

			 ?>
	     <form id="residente" method='POST'>
	         <div class="form-group">
	          <h1>Quitar parqueadero</h1>
	          <input type="text" name="idApto" value=<?php echo $id; ?> class="hidden">

	          <h3>¿Desea quitarle el parqueadero al apartamento numero  <?php echo $numApto; ?> ?</h3>
	         </div>
	         <div class="form-group">
	         	<button onclick="QuitarParking.quitar(); return false;" class="btn btn-danger">Quitar Parking</button>
	         </div>
	     	
	     </form>
		</div>
	</div>
</div>	

<?php include '../partials/footer.php';?>
<script type="text/javascript" src="../assets/js/quitarParking.js"></script>
