<?php

require_once '../../controller/UserController.php';


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["idParking"])  && isset($_POST["idApto"])) {

           $data =[
             "idApto" => $_POST["idApto"],
             "idParking" => $_POST['idParking']
           ];


        $usuario = Usuario::asignarParking($data);

        /*if($usuario){

            $resultado = array("estado" => "true", "data" => $usuario );
            return print (json_encode($resultado));
        }*/


        if ($usuario) {

            $resultado = array("estado" => "true", "data" => $usuario );
            return print(json_encode($resultado));
            //header("location:dashboard/admin.php");
        }

    }
} 

$resultado = array("estado" => "false", "data" => $data);
return print(json_encode($resultado));