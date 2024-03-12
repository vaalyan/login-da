<?php

    session_start();

    if(!isset($_SESSION['usuario'])){ //proteccion sessión
        echo '
            <script>
                alert("Por favor, iniciar sesión");
                window.location = "../index.php";
            </script>
        ';
        session_destroy();
        die();
    }

    //session_destroy(); cerrar sesión automáticamente

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Thedas - Dragon Age</title>
</head>
<body>
    <h1>Bienvenido al mundo de fantasía épica de Bioware, Dragon Age.</h1>
    <a href="cerrar_sesion.php">Cerrar sesion</a>
</body>
</html>