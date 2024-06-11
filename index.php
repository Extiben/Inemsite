<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets\icons\font\bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<main>

<div class="contenedor__todo">
    <div class="caja__trasera">
        <div class="caja__trasera-login">
            <h3>¿Aún no tienes una cuenta?</h3>
            <p>Comunicate con el administrador</p>
            <ul id="ul_administrador">
                <li class="lista_boton">
                    <button class="btn btn-outline-light">Administrador</button>
                    <ul class="contacto">393939943993</ul>
                </li>
            </ul>
        </div>
    </div>

    <!--Formulario de Login-->
    <div class="contenedor__login">
        <!--Login-->
        <form action="" class="formulario__login" method="post" autocomplete="off">
            <h2>Inicio De Sesión</h2>
            <?php 
            include("includes/controladorlogin.php");
            ?>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingPassword" placeholder="Usuario" name="usuario">
                <label for="usuario">Usuario</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña" name="contrasena">
                <label for="contrasena">Contraseña</label>
            </div>
            <input name="btningresar"  class="btn btn-outline-primary" type="submit" value="Iniciar sesion">
        </form>
    </div>
</div>

</main>
</body>
</html>