<nav class="navbar navbar-default sidebar" role="navigation">

    <div class=" container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <?php if ($_SESSION["usuario"]["privilegio"] == 1) {?>
            <li><a href="../auth/registro.php">Crear</a></li>
            <li><a href="../dashboard/listUsuarios.php">Usuarios</a></li>
            <li><a href="../dashboard/residente.php">Crear Residente</a></li>
            <li><a href="../dashboard/vehiculo.php">Crear Vehiculo</a></li>
            <li><a href="../dashboard/pagos.php">Consultar Pagos</a></li>
            <li><a href="../dashboard/reportes.php">Generar reportes</a></li>
            <li class="divider"></li>
            <?php } else if ($_SESSION["usuario"]["privilegio"] == 2){ ?>
            <li><a href="../dashboard/residente_residente.php">Soy Residente</a></li>
            <li><a href="../dashboard/vehiculo.php">Solicitar Parking</a></li>
            <?php } else{ ?>

              <li><a href="../dashboard/consultaPlaca.php">Consultar Por Placa</a></li>
          <!-- //  <li><a href="../dashboard/vehiculo.php">Solicitar Parking</a></li> -->


             <?php  } ?>

            <!-- <li><a href="#">Separated link</a></li> -->
            <li class="divider"></li>
            <li><a href="#">Informes</a></li>
          </ul>
        </li>          
  <!--       <li ><a href="#">Libros<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>        
        <li ><a href="#">Tags<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-tags"></span></a></li> -->
      </ul>
    </div>
  </div>
</nav>