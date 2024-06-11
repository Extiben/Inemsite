<?php 
session_start();
if (empty($_SESSION["id"])) {
  header("location: ../index.php");
} elseif ($_SESSION["id"] != 2) {
  header("location: ../admin/admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets\icons\font\bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        .text-custom-blue {
            color: #edf6f9;
        }
        .text-custom-title {
          color: #46A2FD
        }
    </style>
    <title>InemSite</title>
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #46A2FD;">
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
          <a class="nav-link text-custom-white" href="usuario.php">Inicio</a>
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
      </ul>
        <a class="btn btn-outline-light" href="../controlador/controladorcerrarsesion.php">Salir</a>
    </div>
  </div>
</nav>
</header>
<section class="w-50 mx-auto text-center pt-5">
    <h1 class="p-3 fs-2 border-top border-3 text-custom-title">Hola <?php echo $_SESSION["nombre"];?> Bienvenido a Inemsite</h1>
    <p>Te damos la bienvenida a la plataforma de reservas de salas de informatica, estamos encargados de ofrecerte a ti como usuario una experiencia gratificante. </p>
</section>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>