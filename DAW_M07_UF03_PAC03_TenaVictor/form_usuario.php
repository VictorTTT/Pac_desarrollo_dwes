<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PAC DESARROLLO M07</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<?php
    include_once('cabecera.php');
?>


<form method="post" name="form_usuario" action="funciones_bd.php">
    <table>
        <?php
            if (isset($_POST['IdModificar'])) {
                echo '<tr><td><input type="hidden" required name="IdModificar" value="' . $_POST['IdModificar'] . '"></td></tr>';
            } else {
                echo '<tr><td><input type="hidden" required name="IdCrear"></td></tr>';
            }
        ?>
        <tr>
            <?php
                if (isset($_POST['NombreModificar'])) {
                    echo '<td> Nombre: <input type="text" required name="NombreModificar" value=" ' . $_POST['NombreModificar'] . '" maxlength="50"></td>';
                } else {
                    echo '<td> Nombre: <input type="text" required name="Nombre" placeholder=" Introduce aquí tu nombre y apellidos" maxlength="50"></td>';
                }
            ?>
        </tr>
        <tr>
            <?php
                if (isset($_POST['ContraseñaModificar'])) {
                    echo '<td> Contraseña: <input type="text" required name="ContraseñaModificar" value=" ' . $_POST['ContraseñaModificar'] . '" maxlength="20"></td>';
                } else {
                    echo ' <td> Contraseña: <input type="password" required name="Contrasenia" placeholder="Aquí tu contraseña" maxlength="20"></td>';
                }
            ?>
        </tr>
        <tr>
            <?php
                if (isset($_POST['EmailModificar'])) {
                    echo '<td> Email: <input type="email" required name="EmailModificar" value=" ' . $_POST['EmailModificar'] . '" maxlength="50"></td>';
                } else {
                    echo '<td> Email: <input type="email" required name="Email" placeholder="Aquí tu email" maxlength="50"></td>';
                }
            ?>
        </tr>
        <tr>
            <?php
                if (isset($_POST['EdadModificar'])) {
                    echo '<td>Edad: <input type="number" required name="EdadModificar" value=" ' . $_POST['EdadModificar'] . '" min="1" max="99"></td>';
                } else {
                    echo '<td>Edad: <input type="number" required name="Edad" placeholder="Aquí tu edad" min="1" max="99"></td>';
                }
            ?>
        </tr>
        <tr>
            <?php
                if (isset($_POST['FechaModificar'])) {
                    echo '<td> Fecha nacimiento: <input type="date" required name="FechaModificar" value=" ' . $_POST['FechaModificar'] . '" maxlength="50"></td>';
                } else {
                    echo '<td>Fecha nacimiento: <input type="date" required name="Fecha" placeholder="Aquí tu fecha de nacimiento"></td>';
                }
            ?>
        <tr>
            <?php
                if (isset($_POST['DirecciónModificar'])) {
                    echo '<td>Dirección: <input type="text" required name="DirecciónModificar" value=" ' . $_POST['DirecciónModificar'] . '" maxlength="50"></td>';
                } else {
                    echo '<td>Dirección: <input type="text" required name="Direccion" placeholder="Aquí tu direccion" maxlength="50"></td>';
                }
            ?>
        </tr>
        <tr>
            <?php
                if (isset($_POST['CódigoModificar'])) {
                    echo '<td>Código Postal: <input type="number" required name="CódigoModificar" value=" ' . $_POST['CódigoModificar'] . '" min="1" max="99999"></td>';
                } else {
                    echo '<td>Código Postal:<input type="number" required name="CP" placeholder="Aquí tu codigo postal" min="1" max="99999"></td>';
                }
            ?>
        </tr>
        <tr>
            <?php
                if (isset($_POST['ProvinciaModificar'])) {
                    echo '<td>Provincia: <input type="text" required name="ProvinciaModificar" value=" ' . $_POST['ProvinciaModificar'] . '" maxlength="20"></td>';
                } else {
                    echo '<td>Provincia: <input type="text" required name="Provincia" placeholder="Aquí tu provincia" maxlength="20"></td>';
                }
            ?>
        </tr>
        <tr>
            <?php
                if (isset($_POST['GeneroModificar'])) {
                    if ($_POST['GeneroModificar'] == "Masculino") {
                        echo '<td>Género Masculino: <input type="checkbox"  name="Masculino" checked></td>';
                        echo '<td>Género Femenino: <input type="checkbox"  name="Femenino"></td>';
                    } else {
                        echo '<td>Género Masculino: <input type="checkbox"  name="Masculino" ></td>';
                        echo '<td>Género Femenino: <input type="checkbox"  name="Femenino" checked></td>';
                    }
                } else {
                    echo '<td>Género Masculino: <input type="checkbox"  name="Masculino" ></td>';
                    echo '<td>Género Femenino: <input type="checkbox"  name="Femenino"></td>';
                }
            ?>
        </tr>
        <tr>
            <td><input type="submit" name="enviar" value="Enviar formulario"></td>
            <td><input type="reset" name="cancelar" value="Resetear campos"></td>
        </tr>
    </table>
</form>



