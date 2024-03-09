<?php

    session_start();

    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Por favor, iniciar sesión");
                window.location = "index.php";
            </script>
        ';
        header("location: index.php");
        session_destroy();
        die();
    }
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
</body>
</html>