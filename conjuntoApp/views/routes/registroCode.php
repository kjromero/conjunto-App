<?php

include '../../controller/UsuarioControlador.php';
include '../../helpers/help.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtNombre"]) && isset($_POST["txtEmail"]) && isset($_POST["txtUsuario"]) && isset($_POST["txtPassword"])) {

        $txtNombre     = validar_campo($_POST["txtNombre"]);
        $txtEmail      = validar_campo($_POST["txtEmail"]);
        $txtUsuario    = validar_campo($_POST["txtUsuario"]);
        $txtPassword   = validar_campo($_POST["txtPassword"]);
        $txtPrivilegio = 2;

        

        if (UsuarioControlador::registrar($txtNombre, $txtEmail, $txtUsuario, $txtPassword, $txtPrivilegio)) {
            $usuario   = UsuarioControlador::getUsuario($txtUsuario, $txtPassword);
           
            $resultado = array("estado" => "true", "data" => $usuario );
            return print(json_encode($resultado));
            //header("location:dashboard/admin.php");
        }

    }
} 

$resultado = array("estado" => "false");
return print(json_encode($resultado));
