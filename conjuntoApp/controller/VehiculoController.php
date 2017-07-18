<?php
include_once '../../models/VehiculoModel.php';

class VehiculoController
{
    public static function postVehiculo($data)
    {
        $data = [

            "modelo" => $data["modelo"],
            "marca" => $data["marca"],
            "placa" => $data["placa"],
            "tipo" => $data["tipo"],
            "idResidente" => $data["idResidente"]
        ];

        $response = Vehiculo::postVehiculo($data);

        return $response;

    }

    public static function editVehiculo($data)
    {
        $data = [
            "id" => $data["id"],
            "modelo" => $data["modelo"],
            "marca" => $data["marca"],
            "placa" => $data["placa"],
            "tipo" => $data["tipo"]
        ];

        $response = Vehiculo::editVehiculo($data);

        return $response;

    }


    public static function getVehiculo($id){

        $response = Vehiculo::getVehiculo($id);

        return $response;

    }

    public static function getAllVehiculos()
    {

        $response = Vehiculo::getAllVehiculos();

        return $response;

    }
}
