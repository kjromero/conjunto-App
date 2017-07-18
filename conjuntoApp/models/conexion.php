<?php
require_once "../../config/config_con.php";
/**
* 
*/
class Conexion
{
	private $con;

	

	public static function conect()
	{
		try 
		{

			$con = new PDO("mysql:host=".HOST.";dbname=".DB_NAME."", "".USER."", "".PASSWORD."");
			
			return $con;
			
		} catch (PDOException $e) {
			
			die($e->getMessage());
		}
	}
}

