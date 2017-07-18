<?php

require_once '../../controller/UserController.php';


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nombre"])  && isset($_POST["vehiculo"]) && isset($_POST["idApto"])  && isset($_POST["estado"]) ) {

           $data =[
             "id" => $_POST["id"],
             "nombre" => $_POST['nombre'],
             "numero_apto" => $_POST["idApto"],
             "vehiculo" => $_POST['vehiculo'],
             "idApto" => $_POST['idApto'],
             "estado"=> $_POST["estado"]
           ];


        $usuario = Usuario::editUsuarios($data);

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