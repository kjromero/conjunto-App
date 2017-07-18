<?php
require_once '../../controller/VehiculoController.php';


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["modelo"]) && isset($_POST["marca"]) && isset($_POST["placa"]) && isset($_POST["idResidente"] )  && isset($_POST["tipo"]) ) {

        $data = [

            "modelo" => $_POST["modelo"],
            "marca" => $_POST["marca"],
            "tipo" => $_POST["tipo"],
            "placa" => $_POST["placa"],
            "idResidente" => $_POST["idResidente"]
        ];


        $vehiculo = VehiculoController::postVehiculo($data);

        if ($vehiculo) {

            $resultado = array("estado" => "true", "data" => $vehiculo );
            return print(json_encode($resultado));
            
        }

    }
}

$resultado = array("estado" => "false", "data" => $data);
return print(json_encode($resultado));