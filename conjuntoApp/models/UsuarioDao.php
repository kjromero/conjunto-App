<?php

include 'conexion.php';
//include '../entidades/Usuario.php';

class UsuarioDao extends Conexion
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

    /**
     * Metodo que sirve para validar el login
     *
     * @param      object         $usuario
     * @return     boolean
     */
    public static function login($usuario)
    {
        $query = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":usuario", $usuario['usuario']);
        $resultado->bindParam(":password", $usuario['password']);

        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            $filas = $resultado->fetch();
            if ($filas["usuario"] == $usuario['usuario']
                && $filas["password"] == $usuario['password']) {
                return true;
            }
        }

        return false;
    }

    /**
     * Metodo que sirve obtener un usuario
     *
     * @param      object         $usuario
     * @return     object
     */
    public static function getUsuario($usuario)
    {
        $query = "SELECT id,nombre,email,usuario,privilegio,fecha_registro FROM usuarios WHERE usuario = :usuario AND password = :password";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":usuario", $usuario['usuario']);
        $resultado->bindParam(":password", $usuario['password']);

        $resultado->execute();

        $filas = $resultado->fetch();

        $usuario = [
          'id'=>$filas["id"],
          'nombre'=>$filas["nombre"],
          'usuario'=>$filas["usuario"],
          'email'=>$filas["email"],
          'privilegio'=>$filas["privilegio"],
          'fecha_registro'=>$filas["fecha_registro"]
        ];

       
        return $usuario;
    }
   
	 /**
	 * Metodo que sirve para obtener todos los  usuarios
	 *
	 * @param      object         $usuario
	 * @return     object
	 */
    public static function getAllUsers()
    {
    	

    	

    	$query ="SELECT*FROM usuarios";
    	self::getConexion();

    	$resultado = self::$cnx->prepare($query);

    	$resultado->execute();
        //$filas = $resultado->fetch();
 
        return $resultado;
    }

    /**
     * Metodo que sirve para registrar usuarios
     *
     * @param      object         $usuario
     * @return     boolean
     */
    public static function registrar($usuario)
    {
        $query = "INSERT INTO usuarios (nombre,email,usuario,password,privilegio) VALUES (:nombre,:email,:usuario,:password,:privilegio)";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);

        $resultado->bindParam(":nombre", $usuario['nombre']);
        $resultado->bindParam(":email", $usuario['email']);
        $resultado->bindParam(":usuario", $usuario['usuario']);
        $resultado->bindParam(":password", $usuario['password']);
        $resultado->bindParam(":privilegio", $usuario['privilegio']);

        if ($resultado->execute()) {
            return true;
        }

        return false;
    }
}
