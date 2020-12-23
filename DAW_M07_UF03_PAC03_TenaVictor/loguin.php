<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<!--Formulario de login-->
<h1>INTRODUCE TUS DATOS</h1>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <table>
        <tr>
            <td class="izq">Login:</td>
            <td class="der"><input type="text" name="login"></td>
        </tr>
        <tr>
            <td class="izq">Password:</td>
            <td class="der"><input type="password" name="password"></td>
        </tr>
        <tr>
            <div>
                <td colspan="3"><input type="submit" name="enviarLogin" value="LOGIN"></td>
            </div>
        </tr>
    </table>
</form>


<!--Botón de registro, al presionarlo recarga la página y aparece el formulario de registro-->
<h1><br>QUIERO REGISTRARME</h1>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
    <table>
        <tr>
            <div>
                <td colspan="3"><input type="submit" name="enviarRegistro" value="REGISTRAR"></td>
            </div>
        </tr>
    </table>
</form>
</body>
</html>


<?php

    //Si se ha enviado el formulario de loguin
    if (isset($_POST['enviarLogin'])) {

        include_once('conexión.php');

        //Sentencia necesaria para comprobar loguin
        $sql = "SELECT * FROM usuarios WHERE Nombre= :login AND Contraseña= :password";

        //Utilizamos métodos PHP para comprobar los datos con seguridad y evitar inyecciones SQL
        $login = htmlentities(addslashes($_POST['login']));
        $password = htmlentities(addslashes($_POST['password']));
        $resultado = $conect->prepare($sql);
        $resultado->bindValue(":login", $login);
        $resultado->bindValue(":password", $password);
        $resultado->execute();

        //Contamos los registros afectados, en caso de haberlos, iniciamos sesión asignandole el nombre del Login
        $filas_afectadas = $resultado->rowCount();
        if ($filas_afectadas != 0) {
            session_start();
            $_SESSION["user1"] = $_POST['login'];
            header('Location: index.php');

            // En caso de no haberlos, Informamos con mensaje
        } else {
            echo "<h4 id='error'>No ha sido posible loguearse, por favor, revise su datos y vuelva a intentarlo.";
        }
    }


    // Si se ha clickado en registro aparecerá este formulario que una vez relleno llamará a la función del "funciones_bd.php"
    if (isset($_GET['enviarRegistro'])) { ?><br>
        <form method="post" name="form_usuario" action="funciones_bd.php">
            <table>
                <tr>
                    <td><input type="hidden" required name="IdCrear"></td>
                </tr>
                <tr>
                    <td> Nombre: <input type="text" required name="Nombre"
                                        placeholder=" Introduce aquí tu nombre y apellidos"
                                        maxlength="50"></td>
                </tr>
                <tr>
                    <td>Contraseña: <input type="password" required name="Contrasenia" placeholder="Aquí tu contraseña"
                                           maxlength="20"></td>
                </tr>
                <tr>
                    <td> Email: <input type="email" required name="Email" placeholder="Aquí tu email" maxlength="50">
                    </td>
                </tr>
                <tr>
                    <td>Edad: <input type="number" required name="Edad" placeholder="Aquí tu edad" maxlength="2"></td>
                </tr>
                <tr>
                    <td>Fecha nacimiento: <input type="date" required name="Fecha"
                                                 placeholder="Aquí tu fecha de nacimiento"></td>
                </tr>
                <tr>
                    <td>Dirección: <input type="text" required name="Direccion" placeholder="Aquí tu direccion"
                                          maxlength="50"></td>
                </tr>
                <tr>
                    <td>Código Postal:<input type="number" required name="CP" placeholder="Aquí tu codigo postal"
                                             maxlength="6"></td>
                </tr>
                <tr>
                    <td>Provincia: <input type="text" required name="Provincia" placeholder="Aquí tu provincia"
                                          maxlength="20"></td>
                </tr>
                <tr>
                    <td>Género Masculino: <input type="checkbox" name="Masculino"></td>
                </tr>
                <tr>
                    <td>Género Femenino: <input type="checkbox" name="Femenino"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="enviar" value="Enviar formulario"></td>
                    <td><input type="reset" name="cancelar" value="Resetear campos"></td>
                </tr>
            </table>
        </form>
        <?php
    } ?>

