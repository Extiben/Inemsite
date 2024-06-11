<?php 
    include("conexion.php");
    if (isset($_POST["registrar"])) {
        if (!empty($_POST["Idusuario"]) and !empty($_POST["correo"]) and !empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["usuario"]) and !empty($_POST["contrasena"]) and !empty($_POST["numero_documento"]) and !empty($_POST["tipo_documento"]) and !empty($_POST["idrol"])) {
            $Idusuario = trim($_POST["Idusuario"]);
            $correo = trim($_POST["correo"]);
            $nombre = trim($_POST["nombre"]);
            $apellido = trim($_POST["apellido"]);
            $usuario = trim($_POST["usuario"]);
            $contrasena = trim($_POST["contrasena"]);
            $numero_documento = trim($_POST["numero_documento"]);
            $tipo_documento = trim($_POST["tipo_documento"]);
            $rol = trim($_POST["idrol"]);
            
            $sql = $conexion->query("INSERT INTO usuarios (Idusuario, correo, nombre, apellido, usuario, contrasena, numero_documento, tipo_documento, idrol) VALUES('$Idusuario', '$correo', '$nombre', '$apellido', '$usuario', '$contrasena', '$numero_documento', '$tipo_documento', '$rol')");
            
            header("location: ../admin/usuarios.php");
        }}
?>