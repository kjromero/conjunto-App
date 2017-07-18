<?php

require_once '../../controller/UserController.php';


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nombre"])  && isset($_POST["vehiculo"]) && isset($_POST["idApto"]) ) {

           $data =[
             "nombre" => $_POST['nombre'],
             "numero_apto" => $_POST["idApto"],
             "vehiculo" => $_POST['vehiculo'],
             "idApto" => $_POST['idApto'],
             "estado" => $_POST['estado']
           ];

       
        $usuario = Usuario::postUsuarios($data);

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