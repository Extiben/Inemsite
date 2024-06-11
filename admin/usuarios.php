<?php 
session_start();
if (empty($_SESSION["id"])) {
  header("location: ../index.php");
} elseif ($_SESSION["rol"] != 1) {
  header("location: ../usuario/usuario.php");
}
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- DataTables -->
    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap5"/>
    <link rel="stylesheet" href="../assets/css/datatables.css"/>
    <!-- Iconos BS5 -->
    <link href="../assets\icons\font\bootstrap-icons.css" rel="stylesheet">
    <!-- BS5 -->
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
<div>
  <a class="btn btn-success" href="registrar.php"><i class="bi bi-person-plus-fill"></i></a>
</div>
<div class="table responsive">
    <table class="table table-striped table-dark display nowrap hover" id="myTable">
    <thead class="table-success">    
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
        <th>Acciones</th>
      </tr>
    </thead>
<?php
// Incluimos la conexion a la base de datos
include("../includes/conexion.php");

//Ejecutar la consulta SQL para obtener todos los registros de la tabla "usuarios"
$sql = $conexion->query("SELECT * FROM usuarios ");

//Verifica si la consulta tiene al menos 1 registro
if($sql -> num_rows >0){
    //Los resultados de la consulta se convierten en objetos, cada objeto representa un registro
    while($fila = $sql->fetch_object()){


//Accedemos al valor de los campos en el objeto fila
echo "
<tr>
  <td>$fila->Idusuario</td>
  <td>$fila->correo</td>
  <td>$fila->nombre</td>
  <td>$fila->apellido</td>
  <td>$fila->usuario</td>
  <td>$fila->contrasena</td>
  <td>$fila->numero_documento</td>
  <td>$fila->tipo_documento</td>
  <td>";
  if ($fila->idrol == 1) {
    echo "Administrador";
  }else {
    echo "Cliente";
  }; 
  ?>
  </td>
  <td>
    <a class="btn btn-warning" name="editar" href="editar.php?id=<?php echo $fila->Idusuario; ?>"><i class="bi bi-pencil"></i></a>
    <a class="btn btn-danger" name="eliminar" href="eliminar.php?id=<?php echo $fila->Idusuario?>"><i class="bi bi-trash3"></i></a>
  </td>
</tr>

<?php
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
</section>
<!-- jquery -->
<script src="..\assets\js\jquery-3.7.1.min.js"></script>
<!-- sweetalert2 -->
<script src="../assets/sweetalert/dist/sweetalert2.all.js"></script>
<script src="./assets/sweetalert/dist/sweetalert2.all.min.js"></script>
<!-- DataTable -->
<script src="../assets/js/datatables.js"></script>
<script src="../assets/js/dataTables.bootstrap5.js"></script>
<script src="../assets/js/script.js"></script>
<!-- BS5 -->
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
