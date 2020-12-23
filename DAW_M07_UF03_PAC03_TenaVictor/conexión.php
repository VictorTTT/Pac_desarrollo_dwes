<?php
    try {

        // Conexión medaiante la librería PDO
        $conect = new PDO("mysql:dbname=m07;host=localhost", 'root', '');

        // Establecemos atributos para esta conexión
        $conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Establecer encoding en PDO
        $conect->exec("SET CHARACTER SET UTF8");

    } catch (Exception $exception) {

        // En caso de error en la conexion matamos el proceso e informamos del tipo  de error y de su ubicación
        die("Se ha producido un error en la conexión de tipo: " . $exception->getMessage() .
            "en la línea: " . $exception->getLine());

    }

