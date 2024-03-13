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

    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <main>
        <h1>Bienvenido al mundo de fantasía épica de Bioware, Dragon Age.</h1>
        <a class="button" href="cerrar_sesion.php">Cerrar sesion</a>
    </main>
    
</body>
</html>