<?php 
session_start();
if (empty($_SESSION["id"])) {
  header("location: ../index.php");
} elseif ($_SESSION["rol"] != 1) {
  header("location: ../usuario/usuario.php");
}
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
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="alert alert-danger text-center">
                    <p>¿Desea eliminar este registro??</p>
                    <form action="../includes/funciones.php" method="post">
                  <input type="hidden" name="accion" value="eliminar_registro">
                  <input type="hidden" name="id" value='<?php echo $registro; ?>'>
                  <input type="submit" name="" value="Eliminar" class= " btn btn-danger">
                  <a href="usuarios.php" class="btn btn-success">Cancelar</a>
              </form>   
                </div>
 
            </div>
            <table class="table table-striped table-dark table-sm" id= "table_id">
    <thead>    
      <tr>
        <th>Id Usuario</th>
        <th>Correo</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Usuario</th>
        <th>Contraseña</th>
        <th>Numero de Documento</th>
        <th>Tipo de Documento</th>
        <th>Rol</th>
      </tr>
    </thead>
<?php
include("../includes/conexion.php");
$registro = $_GET['id'];         
$sql = $conexion->query("SELECT * FROM usuarios WHERE Idusuario = $registro ");
if($sql -> num_rows >0){
    while($fila = $sql->fetch_object()){
?>
<tr>
  <td><?php echo $fila->Idusuario; ?></td>
  <td><?php echo $fila->correo; ?></td>
  <td><?php echo $fila->nombre; ?></td>
  <td><?php echo $fila->apellido; ?></td>
  <td><?php echo $fila->usuario; ?></td>
  <td><?php echo $fila->contrasena; ?></td>
  <td><?php echo $fila->numero_documento; ?></td>
  <td><?php echo $fila->tipo_documento; ?></td>
  <td><?php if ($fila->idrol == 1) {
    echo "Administrador";
  }else {
    echo "Cliente";
  }; 
}
}else{
    ?>
    <tr class="text-center">
    <td colspan="16">No existen registros</td>
    </tr>
    <?php
    
}
?>
</table>
        </div>
    </div>
</section>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>