<?php
include_once 'conexion.php';
class Vehiculo
{
    protected static $cnx;


    private static function getConexion()
    {
        self::$cnx = Conexion::conect();
    }

    private static function desconectar()
    {
        self::$cnx = null;
    }

    public  static function editVehiculo($vehiculo){
        try{

            $query = "UPDATE `vehiculo` SET `modelo`=:modelo,`marca`=:marca,`placa`=:placa,`id_tipo`=:tipo WHERE `id`= :id ";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":id", $vehiculo['id']);
            $resultado->bindParam(":modelo", $vehiculo['modelo']);
            $resultado->bindParam(":marca", $vehiculo['marca']);
            $resultado->bindParam(":placa", $vehiculo['placa']);
            $resultado->bindParam(":tipo", $vehiculo['tipo']);
            //$resultado->bindParam(":idResidente", $vehiculo['idResidente']);


            ($resultado->execute()) ? $response = true : $response = false;

            return $response;

        }catch (PDOException $e){

            $response  = ["status" => "false", "err"=> $e];
            return $response;

        }
    }

    public  static function postVehiculo($vehiculo){
        try{

            $query = "INSERT INTO `vehiculo` ( `modelo`, `marca`, `placa`, `id_tipo`, `idResidente`) VALUES (:modelo,:marca,:placa, :tipo, :idResidente)";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":modelo", $vehiculo['modelo']);
            $resultado->bindParam(":marca", $vehiculo['marca']);
            $resultado->bindParam(":placa", $vehiculo['placa']);
            $resultado->bindParam(":tipo", $vehiculo['tipo']);
            $resultado->bindParam(":idResidente", $vehiculo['idResidente']);


            ($resultado->execute()) ? $response = true : $response = false;

            return $response;

        }catch (PDOException $e){

            $response  = ["status" => "false", "err"=> $e];
            return $response;

        }
    }

    public static function getVehiculo($id){

        $res = "SELECT * FROM `vehiculo` WHERE id = ".$id;

        self::getConexion();

        $response = self::$cnx->prepare($res);

        $response->execute();

        return $response;

    }


    public static function getAllVehiculos(){

        $res = "SELECT * FROM `vehiculo`";

        self::getConexion();

        $response = self::$cnx->prepare($res);

        $response->execute();

        return $response;

    }
}