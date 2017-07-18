<?php
require_once '../../controller/VehiculoController.php';


session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["modelo"]) && isset($_POST["marca"]) && isset($_POST["placa"]) && isset($_POST["tipo"]) ) {

        $data = [
            "id" => $_POST["id"],
            "modelo" => $_POST["modelo"],
            "marca" => $_POST["marca"],
            "placa" => $_POST["placa"],
            "tipo" => $_POST["tipo"]
        ];


        $vehiculo = VehiculoController::editVehiculo($data);

        if ($vehiculo) {

            $resultado = array("estado" => "true", "data" => $vehiculo );
            return print(json_encode($resultado));
            
        }

    }
}

$resultado = array("estado" => "false", "data" => $data);
return print(json_encode($resultado));