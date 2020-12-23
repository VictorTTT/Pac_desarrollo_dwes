<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PAC DESARROLLO M07</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<?php
    include_once('conexión.php');
    session_start();
    if (!isset($_SESSION['user1'])) {
    echo "<h1>Regístrate para tener acceso a todas las funciones!</h1>";?>
    <nav>
        <div class="container">
            <ul id="menu">
                <li><a href="loguin.php">Login</a></li>
            </ul>
        </div>
    </nav>
    <?php
} else {
    echo "<h4 id='exito'>Sesión iniciada por: " . $_SESSION['user1']; ?>
<h1>PAC DE DESARROLLO M07</h1>
<nav>
    <div class="container">
        <ul id="menu">
            <li><a href="loguin.php">Login</a></li>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="list_usuarios.php">Listado de usuarios</a></li>
            <li><a href="list_noticias.php">Listado de noticias</a></li>
            <li><a href="funciones_bd.php?cerrarSesion">Cerrar sesión</a></li>
        </ul>
    </div>
</nav>
</html>

<?php }?>
