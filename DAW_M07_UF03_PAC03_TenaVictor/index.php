<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PAC DESARROLLO M07</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<?php
    include_once('cabecera.php');


    $sql = "SELECT *FROM Noticias ORDER BY Hora_creación desc limit 5";
    $resultset = $conect->prepare($sql);
    $resultset->execute(array(PDO::FETCH_ASSOC));

    foreach ($resultset

    as $noticia) { ?>
<table id="tabla_inicio">
    <tr>
        <td id="Titulo"><h2><?php echo $noticia['Titulo']; ?></h2></td>
    </tr>
    <tr>
        <td id="Contenido"><?php echo $noticia['Contenido']; ?></td>
    </tr>
    <div id="enLinea">
        <tr id="Autor">
            <td>Autor: <?php echo $noticia['Autor']; ?></td>
        </tr>
        <tr id="texto-uno">
            <td> Hora: <?php echo $noticia['Hora_creación']; ?></td>
        </tr>
        <tr id="texto-dos">
            <td>Likes: <?php echo $noticia['Likes']; ?> <br><br></td>
        </tr>
    </div>
    <?php } ?>
</table>







