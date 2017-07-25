<?php

include '../../controller/UsuarioControlador.php';
include '../../helpers/help.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

       // Temporary file name stored on the server
          $tmpName  = $_FILES['image']['tmp_name'];  

          // Read the file 
          $fp      = fopen($tmpName, 'r');
          $data = fread($fp, filesize($tmpName));
          $data = addslashes($data);
          fclose($fp);


        if (UsuarioControlador::uploadImage($data)) {
           
            $resultado = array("estado" => "true" );
            return print(json_encode($resultado));
            //header("location:dashboard/admin.php");
        }

    }
} 

$resultado = array("estado" => "false");
return print(json_encode($resultado));
