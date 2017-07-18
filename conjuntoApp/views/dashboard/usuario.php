<?php include '../partials/head.php';

if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"]["privilegio"] == 1) {

        header("location:../dashboard/admin.php");
    }
    if ($_SESSION["usuario"]["privilegio"] == 2) {

        header("location:../dashboard/residente_residente.php");
    }

    if ($_SESSION["usuario"]["privilegio"] == 3) {

        header("location:../dashboard/consultaPlaca.php");
    }
} else {
    header("location:../auth/login.php");
}
?>
<?php 
 require_once '../partials/menu.php';
 require_once '../partials/aside.php';
 ?>
<!-- /.container -->
<?php include '../partials/footer.php';?>