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

<form method="post" name="form_noticias" action="funciones_bd.php">
    <table>
        <?php
            if (isset($_POST['IdNoticiaModificar'])) {
                echo '<tr><td><input type="hidden" required name="IdNoticiaModificar" value="' . $_POST['IdNoticiaModificar'] . '"></td></tr>';
            } else {
                echo '<tr><td><input type="hidden" required name="IdNoticias" ></td></tr>';
            }
        ?>
        <tr>
            <?php
                if (isset($_POST['TituloModificar'])) {
                    echo '<td>Título: <input type="text" required name="TituloModificar" value=" ' . $_POST['TituloModificar'] . '" maxlength="50"></td>';
                } else {
                    echo '<td>Título: <input type="text" required name="Titulo" placeholder=" Introduce aquí el nombre de la noticia"  size="50" maxlength="50"></td>';
                }
            ?>
        </tr>
        <tr>
            <?php
                if (isset($_POST['ContenidoModificar'])) {
                    echo '<td>Contenido: <textarea required name="ContenidoModificar" placeholder=" ' . $_POST['ContenidoModificar'] . ' "cols="30" rows="10" maxlength="300" maxlength="50"></textarea> </td>';
                } else {
                    echo '<td>Contenido: <textarea required name="Contenido" cols="30" rows="10" maxlength="300"></textarea>';
                }
            ?>
        </tr>
        <tr>
            <?php
                if (isset($_POST['AutorModificar'])) {
                    echo '<td>Autor: <input required name="AutorModificar" value=" ' . $_POST['AutorModificar'] . ' "maxlength="50"></td>';
                } else {
                    echo '<td>Autor: <input required name="Autor" placeholder="Aquí el nombre del autor" maxlength="50"></td>';
                }
            ?>
        </tr>

        <td><input type="submit" name="enviar" value="Enviar formulario"></td>
        <td><input type="reset" name="cancelar" value="Resetear campos"></td>
        </tr>
    </table>
</form>