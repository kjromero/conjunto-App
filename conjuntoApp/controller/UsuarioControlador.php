<?php

include '../../models/UsuarioDao.php';

class UsuarioControlador
{
   

    public static function login($usuario, $password)
    {
        $obj_usuario = [
            "usuario" => $usuario,
            "password" => $password,
        ];
       
        return UsuarioDao::login($obj_usuario);
    }

    public static function getUsuario($usuario, $password)
    {
        $obj_usuario = [
            "usuario" => $usuario,
            "password" => $password,
        ];

        return UsuarioDao::getUsuario($obj_usuario);

    }

    public static function registrar($nombre, $email, $usuario, $password, $privilegio)
    {
       
        $obj_usuario = 
        [
           "nombre" => $nombre,
           "email" => $email,
           "usuario" => $usuario,
           "password" => $password,
           "privilegio" => $privilegio
        ];

        return UsuarioDao::registrar($obj_usuario);
    }

}
