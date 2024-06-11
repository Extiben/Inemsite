<?php
   
require_once ("conexion.php");

if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break;
        
        case 'eliminar_registro';
            eliminar_registro();
    
            break;
 
		}

	} 
    function editar_registro() {
        include ('conexion.php');
		extract($_POST);
        $stmt = $conexion->prepare("UPDATE usuarios 
                            SET correo = ?,
                                nombre = ?, 
                                apellido = ?,
                                usuario = ?,
                                contrasena = ?,
                                numero_documento = ?,
                                tipo_documento = ?,
                                idrol = ?
                            WHERE Idusuario = ?");
        $stmt->bind_param("sssssisii", $correo, $nombre, $apellido, $usuario, $contrasena, $numero_documento, $tipo_documento, $idrol, $id);
        $stmt->execute();
		header('Location: ../admin/usuarios.php');
}       
function eliminar_registro() {
    include ('conexion.php');
    if(isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $consulta = "DELETE FROM usuarios WHERE Idusuario = ?";
        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        header('Location: ../admin/usuarios.php');
    } else {
        echo "Error: ID de usuario no proporcionado o vacío.";
    }
}
?>