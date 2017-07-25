<?php 

  include '../partials/head.php';
  require_once '../partials/menu.php';
  require_once '../partials/aside.php';
  require_once '../../controller/UserController.php';
  
?>
<div class="container">
	 <div class="row">
	 <div class="col-md-10" style="padding-top: 70px;">
	  
	     
	 	
	 </div>		
			 <div class="col-md-10" style="padding-top: 60px;">
				   <h1>Subir comprobante de pago</h1>

				   <h3>Soporta tu pago con una imagen te tu recibo</h3>

				   <p>--------------</p>

				   <form enctype="multipart/form-data" action="" method="POST" name="changer">
						<input name="MAX_FILE_SIZE" value="102400" type="hidden">
						<input name="image" accept="image/jpeg" type="file">
						<br>
						<!-- <input value="Submit" type="submit"> -->
						<button onclick="Upload.upload(); return false;" class="btn btn-primary">Subir comprobante de pago </button>
					</form>

				
<!-- echo '<img src="data:image/jpeg;base64,'.base64_encode( $result['image'] ).'"/>'; -->
			 	
			 </div>
	 </div>
</div>


<?php include '../partials/footer.php';?>
<script type="text/javascript" src="../assets/js/residente.js"></script>
