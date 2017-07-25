<?php
include_once '../../models/UsuarioDao.php';
include_once '../../models/residenteModel.php';


class Usuario 
{
    private $response;

	public function getUsuarios(){
     
        $result = UsuarioDao::getAllUsers(); 

		return $result;        
	}

	public static function postUsuarios($data){
         
		 $data = [
		 	"nombre" => $data['nombre'],
		 	"numero_apto" => "",
		 	"vehiculo" => $data['vehiculo'],
            "idApto" => $data['idApto'],
            "estado" => $data['estado']
		 ];

         $response = Residente::postResidente($data);

         if ( $response ) {
		     return self::getResidente();
         }else{

             return $response;
         }

	}

    public static function editUsuarios($data){
         
         $data = [
            "id" => $data["id"],
            "nombre" => $data['nombre'],
            "numero_apto" => "",
            "vehiculo" => $data['vehiculo'],
            "idApto" => $data['idApto'],
            "estado" => $data['estado']
         ];

         $response = Residente::editResidente($data);


        return $response;
         

    }

    
    public static function getResidenteId($id){
        $response =  Residente::getResidenteId($id);
        return $response;
    }

     public static function getResidenteIdApto($id){
        $response =  Residente::getResidenteIdApto($id);
        return $response;
    }


	public static function getResidente(){
        $response =  Residente::getResidente();
        return $response;
    }

    public static function getAllAptos(){
        $response =  Residente::getAllAptos();
        return $response;
    }

    public static function getApto($idApto){
        $response =  Residente::getApto($idApto);
        return $response;
    }


    public static function getAllResidentes()
    {
         $response = Residente::getAllResidentes();
         return $response;
    }

    public static function getAptoResidente(){
        $response = Residente::getAptoResidente();
        return $response;
    }

    public static function getPagos()
    {
        $response = Residente::getPagos();
        return $response;
    }

    public static function getCurrentState($id){
        $response = Residente::getResidenteState($id);
        return $response;
    }

}

