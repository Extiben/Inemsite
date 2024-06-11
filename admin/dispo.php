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
    <h1 class="p-3 fs-2 border-top border-3 text-custom-title">Hola <?php echo $_SESSION["nombre"];?> Bienvenido a Inemsite</h1>
    <p>Te damos la bienvenida a la plataforma de reservas de salas de informatica, estamos encargados de ofrecerte a ti como usuario una experiencia gratificante. </p>
    <div id="carouselExample" class="carousel carousel-dark slide">
  <div class="carousel-inner">
  <?php 
    // Incluir el archivo de conexión a la base de datos
    include("../includes/conexion.php");              
    
    // Ejecutar la consulta SQL para obtener las salas de informática
    $sql = $conexion->query("SELECT * FROM salas_de_informatica ORDER BY idsala ASC");
    
    // Verificar si hay resultados en la consulta
    if($sql -> num_rows >0){
      // Inicializar un contador para el índice del carousel
      $i = 0;
      
      // Recorrer los resultados de la consulta
      while($fila = $sql->fetch_object()){
        // Incrementar el contador
        $i++;
        
        // Si es el primer elemento, marcarlo como activo
        if($i == 1) {
          echo '<div class="carousel-item active mt-3">';
        }else {
          // Si no es el primero, generar un elemento de carousel normal
          echo '<div class="carousel-item mt-3">';
        }
        ?>
        
        <!-- Generar una tarjeta para cada sala de informática -->
        <div class="card text-bg-dark">
          <!-- Mostrar la imagen de la sala -->
          <img src="..\assets\img\Teclado2.avif" class="card-img" alt="...">
        <div class="card-img-overlay">
          <!-- Mostrar el título de la sala (id del bloque y número de salón) -->
          <h5 class="card-title"><?php echo $fila->idBloque . "-" . $fila->numerodesalon;?></h5>
          
          <!-- Mostrar la descripción de la sala (elementos del aula) -->
          <p class="card-text"><?php echo $fila->elementosdelaula?></p>
          
          <!-- Mostrar el estado de la sala -->
          <?php 
            if ($fila->estado == "Disponible") {
              //Si está disponible se mostrará el estado en verde en forma de pildora
              echo "<span class='badge rounded-pill text-bg-success'><i class='bi bi-check-lg'></i> $fila->estado</span>";
            } elseif ($fila->estado == "No Disponible") {
              //Si no está disponible se mostrará el estado en rojo en forma de pildora
              echo "<span class='badge rounded-pill text-bg-danger'><i class='bi bi-exclamation-triangle-fill'></i> $fila->estado</span>";
            } else {
              //Si tiene un estado diferente a disponible o no disponible se mostrará el estado en amarillo en forma de pildora
              echo "<span class='badge rounded-pill text-bg-warning'><i class='bi bi-tools'></i> $fila->estado</span>";
            }

          ?>
          
        </div>
      </div>
      
      <!-- Botón de control para navegar al elemento anterior del carousel -->
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  
  <!-- Botón de control para navegar al siguiente elemento del carousel -->
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        <?php
      }
    }
    ?>
</section>
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>