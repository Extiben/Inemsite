<?php 
session_start();
global $conexion;
include("conexion.php");
if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["usuario"]) and !empty($_POST["contrasena"])) {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];
        $sql = $conexion->query(" select * from usuarios where usuario='$usuario' and contrasena='$contrasena'");
        if ($datos = $sql->fetch_object()) {
            $_SESSION["id"]= $datos->Idusuario;
            $_SESSION["usuario"]= $datos->usuario;
            $_SESSION["nombre"]= $datos->nombre;
            $_SESSION["apellido"]= $datos->apellido;
            $_SESSION["rol"]= $datos->idrol;
            if ($datos->idrol == 1) { //admin
                header("location: admin/admin.php");
            } else {
                if ($datos->idrol == 2) { //usuario
                    header("location: usuario/usuario.php");
                }
            }   
        } else {
            echo"<div class='alert alert-danger'>Datos Incorrectos</div>";
        }
        
    } else {
        if (!empty($_POST["usuario"])) {
            echo "<div class='alert alert-danger'>Campo Contraseña Vacio</div>";
        } else {
            if (!empty($_POST["contrasena"])) {
                echo "<div class='alert alert-danger'>Campo Usuario Vacio</div>";
            } else {
                echo "<div class='alert alert-danger'>Campos Vacios</div>";
            }
        }
        

    }
    
}
?>