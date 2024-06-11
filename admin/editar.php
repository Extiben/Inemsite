<?php 
session_start();
if (empty($_SESSION["id"])) {
  header("location: ../index.php");
} elseif ($_SESSION["rol"] != 1) {
  header("location: ../usuario/usuario.php");
}

$id = $_GET['id'];
include("../includes/conexion.php");
$sql = $conexion->query("SELECT * FROM usuarios WHERE Idusuario = '$id'");
$usuario = mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets\icons\font\bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>InemSite</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #000000;">
  <div class="container-fluid ">
  <a class="navbar-brand " href="#">
      <img src="../assets/img/logoinem.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
       Inemsite
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link text-custom-white" href="admin.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-custom-white " href="reservas.php">Reservas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-custom-white " href="dispo.php">Disponibilidad de salas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-custom-white" href="misreservas.php">Mis Reservas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-custom-white" href="usuarios.php">Ver Usuarios</a>
        </li>
      </ul>
        <a class="btn btn-outline-light" href="../includes/controladorcerrarsesion.php">Salir</a>
    </div>
  </div>
</nav>
</header>
<section class="w-50 mx-auto text-center pt-5">
    <h1 class="p-3 fs-2 border-top border-3">Editar Usuarios</h1>
    <form action="../includes/funciones.php" method="post">
        <div class="form-group">
            <label class="form-label" for="correo">Correo electrónico *</label>
            <input class="form-control" type="email" name="correo" id="correo" value="<?php echo $usuario["correo"]?>" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="nombre">Nombre *</label>
            <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $usuario["nombre"]?>"required>
        </div>
        <div class="form-group">
            <label class="form-label" for="apellido">Apellido *</label>
            <input class="form-control" type="text" name="apellido" id="apellido" value="<?php echo $usuario["apellido"]?>" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="usuario">Usuario *</label>
            <input class="form-control" type="text" name="usuario" id="usuario" value="<?php echo $usuario["usuario"]?>" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="contrasena">Contraseña *</label>
            <input class="form-control" type="text" name="contrasena" id="contrasena" value="<?php echo $usuario["contrasena"]?>" required>
        <div class="form-group">
            <label class="form-label" for="numero_documento">Numero de Documento *</label>
            <input class="form-control" type="text" name="numero_documento" id="numero_documento" value="<?php echo $usuario["numero_documento"]?>" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="tipo_documento">Tipo de Documento *</label>
            <input class="form-control" type="text" name="tipo_documento" id="tipo_documento" value="<?php echo $usuario["tipo_documento"]?>" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="idrol">Rol *</label>
            <input class="form-control" type="text" name="idrol" id="idrol" value="<?php echo $usuario["idrol"]?>" required>
            <input type="hidden" name="accion" value="editar_registro">
            <input type="hidden" name="id" value="<?php echo $id;?>">
        </div>
        <div class="form-group">
          <br>
            <button type="submit" class="btn btn-success" >Editar</button>
            <a href="" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</section>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>