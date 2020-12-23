<?php
    include_once('conexión.php');

    if (isset($_POST['IdCrear'])) {
        insertarDatosUsuario($conect);
    }
    if (isset($_POST['IdModificar'])) {
        modificarDatosUsuario($conect);
    }
    if (isset($_POST['IdBorrar'])) {
        borrarUsuario($conect);
    }
    if (isset($_POST['IdNoticias'])) {
        insertarNoticia($conect);
    }
    if (isset($_POST['IdNoticiaModificar'])) {
        modificarNoticia($conect);
    }
    if (isset($_POST['IdBorrarNoticia'])) {
        borrarNoticia($conect);
    }
    if (isset($_POST['IdNoticiaLike'])) {
        manipulaLikes($conect);
    }
    if (isset($_GET['cerrarSesion'])) {
        cerrarSesion();
    }


    function insertarDatosUsuario($conect)
    {
        $nombre = $_POST['Nombre'];
        $contrasenia = $_POST['Contrasenia'];
        $email = $_POST['Email'];
        $edad = $_POST['Edad'];
        $fecha = $_POST['Fecha'];
        $direccion = $_POST['Direccion'];
        $cp = $_POST['CP'];
        $provincia = $_POST['Provincia'];
        $genero = '';
        if (isset($_POST['Masculino'])) {
            $genero = 'Masculino';
        } else {
            $genero = 'Femenino';
        }
        $sql = "INSERT INTO Usuarios (Nombre,Contraseña,Email,Edad,Fecha_nacimiento,Dirección,Código_postal,Provincia,Genero)
        values ('{$nombre}','{$contrasenia}','{$email}','{$edad}','{$fecha}','{$direccion}','{$cp}','{$provincia}','{$genero}')";
        $resulset = $conect->prepare($sql);
        $resulset->execute(array($sql));
        $conect = null;
        header("Location: loguin.php");
    }


    function modificarDatosUsuario($conect)
    {
        $IdModificar = $_POST['IdModificar'];
        $nombre = $_POST['NombreModificar'];
        $contrasenia = $_POST['ContraseñaModificar'];
        $email = $_POST['EmailModificar'];
        $edad = $_POST['EdadModificar'];
        $fecha = $_POST['FechaModificar'];
        $direccion = $_POST['DirecciónModificar'];
        $cp = $_POST['CódigoModificar'];
        $provincia = $_POST['ProvinciaModificar'];
        $genero = '';
        if (isset($_POST['GeneroModificar'])) {
            $genero = 'Masculino';
        } else {
            $genero = 'Femenino';
        }
        $sql = "UPDATE Usuarios SET Nombre='{$nombre}',Contraseña='{$contrasenia}',
        Email='{$email}',Edad='{$edad}',Fecha_nacimiento='{$fecha}',Dirección='{$direccion}',Código_postal='{$cp}',Provincia='{$provincia}',Genero='{$genero}'
        where Id='{$IdModificar}'";
        $resulset = $conect->prepare($sql);
        $resulset->execute(array($sql));
        $conect = null;
        header("Location: list_usuarios.php");
    }


    function borrarUsuario($conect)
    {
        $IdBorrar = $_POST['IdBorrar'];
        $sql = "DELETE  FROM Usuarios where Id='{$IdBorrar}'";
        $resulset = $conect->prepare($sql);
        $resulset->execute(array($sql));
        $conect = null;
        header("Location: list_usuarios.php");
    }


    function insertarNoticia($conect)
    {
        date_default_timezone_set("Europe/Madrid");
        $titulo = $_POST['Titulo'];
        $contenido = $_POST['Contenido'];
        $autor = $_POST['Autor'];
        $hora = date("Y-m-d H:i:s", time());


        $sql = "INSERT INTO Noticias (Titulo,Contenido,Autor,Hora_creación)  
        VALUES ('{$titulo}','{$contenido}','{$autor}','{$hora}')";
        $resulset = $conect->prepare($sql);
        $resulset->execute(array($sql));
        $conect = null;
        header("Location: list_noticias.php");
    }


    function modificarNoticia($conect)
    {
        date_default_timezone_set("Europe/Madrid");
        $titulo = $_POST['TituloModificar'];
        $contenido = $_POST['ContenidoModificar'];
        $autor = $_POST['AutorModificar'];
        $hora = date("Y-m-d H:i:s", time());

        $sql = "UPDATE Noticias SET Titulo='{$titulo}',Contenido='{$contenido}',Autor='{$autor}',
        Hora_creación='{$hora}' where Id='{$_POST['IdNoticiaModificar']}'";
        $resulset = $conect->prepare($sql);
        $resulset->execute(array($sql));
        $conect = null;
        header("Location: list_noticias.php");
    }


    function manipulaLikes($conect)
    {


        $liked = $_POST['LeDieronLike']; // likes anteriores
        $liked++;// likes nuevos
        $sql = "UPDATE noticias set Likes=$liked where Id='{$_POST['IdNoticiaLike']}'"; // actualizamos likes
        $resulset = $conect->prepare($sql);
        $resulset->execute(array($sql));
        $conect = null;
        session_start();
        // Creamos cookie cuyo valor va a ser la sesión del usuario
        setcookie("liked" . $_POST['IdNoticiaLike'],$_SESSION["user1"], time() + 1000000);
        header("Location: list_noticias.php"); // devolvemos ejecución

    }

    function cerrarSesion()
    {
        session_start();
        unset($_SESSION["user1"]);
        unset($_COOKIE[$_COOKIE["liked" . $_POST['IdNoticiaLike']]]);
        session_destroy();
        header("Location: loguin.php");
        exit;
    }


    function borrarNoticia($conect)
    {
        $sql = "DELETE  FROM Noticias where Id='{$_POST['IdBorrarNoticia']}'";
        $resulset = $conect->prepare($sql);
        $resulset->execute(array($sql));
        $conect = null;
        header("Location: list_noticias.php");
    }


