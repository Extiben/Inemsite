<?php
    $conexion = new mysqli("localhost", "root", "", "db_inemsite");
    $conexion ->set_charset("utf8");
    if($conexion -> connect_error) {
        die("No se pudo conectar a la base de datos". $conexion -> connect_error);
    }
?>
