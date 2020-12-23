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

    // Boton de crear noticia fuera del bucle para que solo esté una vez arriba
    echo "<table id='botonCrearNoticia'><tr><td><form action='form_noticias.php' method='post'>
    <input type='submit' value='Crear una nueva noticia'></td></tr></table><br><br><br></form>";


    $sql = 'SELECT *FROM Noticias ORDER BY Hora_creación desc';
    $resulset = $conect->prepare($sql);
    $resulset->execute(array(PDO::FETCH_ASSOC));


    // Bucle con tabla, dentro de ella se encontrará cada noticia cons sus botones
    foreach ($resulset as $noticia) {

        //Si no se ha creado la cookie que corresponde al id de esta noticia..
        if (!isset($_COOKIE['liked' . $noticia['Id']])) {
            echo "<table id='tabla_noticias'> ";
            echo "<tr><td id='Titulo'><h2> {$noticia['Titulo']}</h2></tr></td><br>";
            echo "<tr><td>{$noticia['Contenido']}</tr></td><br>";
            echo "<tr><td>Autor: {$noticia['Autor']}</tr></td><br>";
            echo "<tr><td>Creada: {$noticia['Hora_creación']}</tr></td><br>";
            echo "<tr><td>Likes: {$noticia['Likes']}</tr></td><br>";
            echo "<form action='funciones_bd.php'  method='post'>
        <input type='hidden' name='IdNoticiaLike' value='{$noticia["Id"]}'> 
        <input type='hidden' name='LeDieronLike' value='{$noticia["Likes"]}'> 
        <tr><td><input type='submit'  value='Me gusta!!!'></tr></td>
        </form>";

            //Si no,si se ha creado la cookie y esta es diferente a la sesión que ahora está activa
        } elseif (isset($_COOKIE['liked' . $noticia['Id']]) && ($_COOKIE['liked' . $noticia['Id']]) != $_SESSION['user1']) {
            echo "<table id='tabla_noticias'> ";
            echo "<tr><td id='Titulo'><h2> {$noticia['Titulo']}</h2></tr></td><br>";
            echo "<tr><td>{$noticia['Contenido']}</tr></td><br>";
            echo "<tr><td>Autor: {$noticia['Autor']}</tr></td><br>";
            echo "<tr><td>Creada: {$noticia['Hora_creación']}</tr></td><br>";
            echo "<tr><td>Likes: {$noticia['Likes']}</tr></td><br>";
            echo "<tr><td><b>A {$_COOKIE['liked'.$noticia['Id']]} le gusta!</b></tr></td><br>";
            echo "<form action='funciones_bd.php'  method='post'>
        <input type='hidden' name='IdNoticiaLike' value='{$noticia["Id"]}'> 
        <input type='hidden' name='LeDieronLike' value='{$noticia["Likes"]}'> 
        <tr><td><input type='submit'  value='Me gusta!!!'></tr></td>
        </form>";


        } //Si ya estaba creada, esconde la posiblidad de dar más likes e informa con el nombre de la sesión
        else {
            echo "<table id='tabla_noticias'> ";
            echo "<tr><td id='Titulo'><h2> {$noticia['Titulo']}</h2></tr></td><br>";
            echo "<tr><td>{$noticia['Contenido']}</tr></td><br>";
            echo "<tr><td>Autor: {$noticia['Autor']}</tr></td><br>";
            echo "<tr><td>Creada: {$noticia['Hora_creación']}</tr></td><br>";
            echo "<tr><td><b></b>Likes: {$noticia['Likes']}</b></tr></td><br>";
            echo "<tr><td><b>{$_COOKIE['liked'.$noticia['Id']]}, te ha gustado!</b></tr></td><br>";
        }

        // Datos que se pasan al formulario de crear/modificar para no tener que crear los datos desde cero
        echo "<form action='form_noticias.php' method='post'>
        <input type='hidden' name='IdNoticiaModificar' value='{$noticia["Id"]}'> 
        <input type='hidden' name='TituloModificar' value='{$noticia['Titulo']}'> 
        <input type='hidden' name='ContenidoModificar' value='{$noticia['Contenido']}'> 
        <input type='hidden' name='AutorModificar' value='{$noticia['Autor']}'> 
        <input type='hidden' name='HoraModificar' value='{$noticia['Hora_creación']}'>         
        <input type='hidden' name='LikesModificar' value='{$noticia['Likes']}'> 
        <tr><td><input type='submit' value='Modificar esta noticia'></tr></td>
        </form> ";

        // Para borrar la noticia
        echo "<form action='funciones_bd.php' method='post'>
        <input type='hidden' name='IdBorrarNoticia' value='{$noticia["Id"]}'>
        <tr><td><input type='submit' value='Borrar Noticia'></tr></td></form><br><br><br>";


        $conect = null;
    }