<?php
include_once 'conexion.php';
/**
*  Clase que permite la gestión de los residentes 
*.  
*/
class Residente 
{
	
	protected static $cnx;
	private $response = [];

	private static function getConexion()
	{
	    self::$cnx = Conexion::conect();
	}

	private static function desconectar()
	{
	    self::$cnx = null;
	}


	public  static function editResidente($usuario)
	{

		try{

            $query = "UPDATE `residente` SET `nombre`=:nombre,`numero_apto`=:numero_apto,`vehiculo`=:vehiculo,`idApto`=:idApto, `estado`=:estado WHERE  id = :id";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);

 			$resultado->bindParam(":id", $usuario['id']);
            $resultado->bindParam(":nombre", $usuario['nombre']);
            $resultado->bindParam(":numero_apto", $usuario['numero_apto']);
            $resultado->bindParam(":vehiculo", $usuario['vehiculo']);
            $resultado->bindParam(":idApto", $usuario['idApto']);
            $resultado->bindParam(":estado", $usuario['estado']);


            ($resultado->execute()) ? $response = true : $response = false;

            return $response;

		}catch (PDOException $e){

            $response  = ["status" => "false", "err"=> $e];
			return $response;

		}
	}


	public  static function postResidente($usuario)
	{

		try{

            $query = "INSERT INTO `residente`( `nombre`, `numero_apto`, `vehiculo`,`idApto`, `estado`) VALUES (:nombre,:numero_apto,:vehiculo,:idApto,:estado)";

            $query2 = "INSERT INTO  `usuarios`(`nombre`, `usuario`, `email`, `password`, `privilegio`) VALUES (:nombre,:nombre,:nombre,'123456',2)";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);
            $resultado2 = self::$cnx->prepare($query2);
            $resultado2->bindParam(":nombre", $usuario['nombre']);

            $resultado->bindParam(":nombre", $usuario['nombre']);
            $resultado->bindParam(":numero_apto", $usuario['numero_apto']);
            $resultado->bindParam(":vehiculo", $usuario['vehiculo']);
            $resultado->bindParam(":idApto", $usuario['idApto']);
            $resultado->bindParam(":estado", $usuario['estado']);

            ($resultado->execute()) ? $response = true : $response = false;
            $resultado2->execute();

            return $response;

		}catch (PDOException $e){

            $response  = ["status" => "false", "err"=> $e];
			return $response;

		}
	}


	public static function getAllAptos(){

		$res  = "SELECT * FROM `aptos`" ;

        self::getConexion();

        $response = self::$cnx->prepare($res);

        $response->execute();

        return $response;
	}

	public static function getResidente(){

		$res = "SELECT * FROM `residente` ORDER BY `id` DESC LIMIT 1";

        self::getConexion();

        $response = self::$cnx->prepare($res);

        $response->execute();

        return $response;
	}

	public static function getAllResidentes(){

		$res = "SELECT * FROM `residente`";

		self::getConexion();

		$response = self::$cnx->prepare($res);

		$response->execute();

		return $response;

    }

    public  static  function getAptoResidente(){
		  $res = "SELECT `id`, `numero_apto` FROM `residente`";

			self::getConexion();

			$response = self::$cnx->prepare($res);

			$response->execute();

			return $response;
	}

	public static function getPagos(){
		$res = "SELECT * FROM `pagos`";

		self::getConexion();

		$response = self::$cnx->prepare($res);

		$response->execute();

		return $response;
	}


	public static function getResidenteIdApto($id){

		try{
			$res = "SELECT `nombre` FROM `residente` WHERE idApto = :id";

			self::getConexion();

			$response = self::$cnx->prepare($res);

			$response->bindParam(":id", $id);


			$response->execute();
			//print_r($response);

			return $response;

		}catch (PDOException $e){

            $response  = ["status" => "false", "err"=> $e];
			return $response;

		}
	}

	public static function getResidenteState($id){

		try{
			$res = "SELECT * FROM `residente` WHERE id = :id";

			self::getConexion();

			$response = self::$cnx->prepare($res);

			$response->bindParam(":id", $id);


			$response->execute();
			print_r($response);

			return $response;

		}catch (PDOException $e){

            $response  = ["status" => "false", "err"=> $e];
			return $response;

		}
	}

	public static function getResidenteId($id){

		try{

            $query = "SELECT * FROM `residente` WHERE id = :id";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);

             $resultado->bindParam(":id", $id);

            $resultado->execute();

            return $resultado;

		}catch (PDOException $e){

            $response  = ["status" => "false", "err"=> $e];
			return $response;

		}

	}

}

