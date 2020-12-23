<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PAC DESARROLLO M07</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<?php

    include_once('cabecera.php');
    if (!isset($_SESSION['user1'])) {
        header('Location: index.php');
    }

    echo "<table id='botonCrear'><tr><td><form action='form_usuario.php' method='post'>
    <input type='submit' value='Crear nuevo usuario'></td></tr></table><br><br><br></form>";


    $sql = 'SELECT * FROM Usuarios';
    $resulset = $conect->prepare($sql);
    $resulset->execute(array(PDO::FETCH_ASSOC));
    foreach ($resulset as $usuario) {
        echo "<table id='tabla_usuarios'>";
        echo "<tr><td>Nombre: {$usuario['Nombre']}</tr></td><br>";
        echo "<tr><td>Contraseña: {$usuario['Contraseña']}</tr></td><br>";
        echo "<tr><td>Email: {$usuario['Email']}</tr></td><br>";
        echo "<tr><td>Edad: {$usuario['Edad']}</tr></td><br>";
        echo "<tr><td>Fecha de nacimiento: {$usuario['Fecha_nacimiento']}</tr></td><br>";
        echo "<tr><td>Dirección: {$usuario['Dirección']}</tr></td><br>";
        echo "<tr><td>Código postal: {$usuario['Código_postal']}</tr></td><br>";
        echo "<tr><td>Provincia: {$usuario['Provincia']}</tr></td><br>";
        echo "<tr><td>Genero: {$usuario['Genero']}</tr></td><br>";


        echo "<form action='form_usuario.php' method='post'>
        <input type='hidden' name='IdModificar' value='{$usuario["Id"]}'> 
        <input type='hidden' name='NombreModificar' value='{$usuario["Nombre"]}'> 
        <input type='hidden' name='ContraseñaModificar' value='{$usuario["Contraseña"]}'> 
        <input type='hidden' name='EmailModificar' value='{$usuario["Email"]}'> 
        <input type='hidden' name='EdadModificar' value='{$usuario["Edad"]}'> 
        <input type='hidden' name='FechaModificar' value='{$usuario["Fecha_nacimiento"]}'> 
        <input type='hidden' name='DirecciónModificar' value='{$usuario["Dirección"]}'> 
        <input type='hidden' name='CódigoModificar' value='{$usuario["Código_postal"]}'> 
        <input type='hidden' name='ProvinciaModificar' value='{$usuario["Provincia"]}'>
        <input type='hidden' name='GeneroModificar' value='{$usuario["Genero"]}'>         
        <tr><td><input type='submit' value='Modificar usuario'></tr></td></form> ";


        echo "<form action='funciones_bd.php' method='post'>
        <input type='hidden' name='IdBorrar' value='{$usuario["Id"]}'>
        <tr><td><input type='submit' value='Borrar usuario'></tr></td></form><br><br><br>";

        echo "</table>";

    }
    $conect = null;



