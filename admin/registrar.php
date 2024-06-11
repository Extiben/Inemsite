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
<section class="w-50 mx-auto text-center pt-5">
    <h1 class="p-3 fs-2 border-top border-3">Registrar usuarios</h1>
    <form action="../includes/validar.php" method="post">
    <div class="form-group">
            <label class="form-label" for="Idusuario">Id Usuario:</label>
            <input class="form-control" type="text" name="Idusuario" id="Idusuario" pattern="[0-9]*" title="Por favor ingresa solo números" maxlength="11" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="correo">Correo electrónico:</label>
            <input class="form-control" type="email" name="correo" id="correo" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="nombre">Nombre:</label>
            <input class="form-control" type="text" name="nombre" id="nombre" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="apellido">Apellido:</label>
            <input class="form-control" type="text" name="apellido" id="apellido" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="usuario">Usuario:</label>
            <input class="form-control" type="text" name="usuario" id="usuario" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="contrasena">Contraseña:</label>
            <input class="form-control" type="text" name="contrasena" id="contrasena" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="numero_documento">Numero de Documento:</label>
            <input class="form-control" type="text" name="numero_documento" id="numero_documento" maxlength="66"  pattern="[0-9]*" title="Por favor ingresa solo números" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="tipo_documento">Tipo de Documento: :</label>
            <input class="form-control" type="text" name="tipo_documento" id="tipo_documento" required>
        </div>
        <div class="form-group">
            <label class="form-label" for="idrol">Rol:</label>
            <input class="form-control" type="text" name="idrol" id="idrol"  pattern="[1-2]*" title="Por favor ingresa solo números" required>
        </div>
        <div class="form-group">
          <br>
            <input type="submit" value="Guardar" class="btn btn-success" id="register" name="registrar">
            <a href="usuarios.php" class="btn btn-danger">Cancelar</a>
        </div>
                               
          </form>
    </form>
</section>
<!-- sweetalert2 -->
<script src="../assets/sweetalert/dist/sweetalert2.all.js"></script>
<script src="../assets/sweetalert/dist/sweetalert2.all.min.js"></script>
<!-- bootstrap 5 -->
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>