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
    <title>Inventas</title>

    <!--<link rel="stylesheet" href="../assets/css/style.css">-->

    <link rel="stylesheet" href="../assets/css/style_bienvenida.css">

</head>
<body>
    <main>
        <h1>Bienvenido a Inventas.</h1>
        <a class="button" href="cerrar_sesion.php">Cerrar sesion</a>
        
        <nav class="sidebar">
            <div class="sidebar-top-wrapper">
                <div class="sidebar-top">
                    <a href="#" class="logo__wrapper">
                    <img src="../assets/imag/inventas.png" alt="Logo" class="logo-small">
                        <span class="hide">Almacén</span>
                    </a>
                </div>
                <div class="expand-btn"></div>
            </div>
            <div class="search__wrapper">
                <img src="../assets/imag/buscar.png" alt="Buscar" class="logo-small">
                <input type="search" placeholder="Busca aquí...">
            </div>
            <div class="sidebar-links">
                <h2>Principal</h2>
                <ul>
                    <li>
                        <a href="#inicio" title="Inicio" class="tooltip">
                            <span class="link hide">Inicio</span>
                            <span class="tooltip__content">Inicio</span>
                        </a>
                    </li>
                    <li>
                        <a href="#productos" title="Productos" class="tooltip">
                            <span class="link hide">Productos</span>
                            <span class="tooltip__content">Productos</span>
                        </a>
                    </li>
                    <li>
                    <a href="#pedido" title="Pedido" class="tooltip">
                            <span class="link hide">Pedido</span>
                            <span class="tooltip__content">Pedido</span>
                        </a>
                    </li>
                    <li>
                    <a href="#cuenta" title="Cuenta" class="tooltip">
                            <span class="link hide">Cuenta</span>
                            <span class="tooltip__content">Cuenta</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-links bottom-links">
                <ul>
                    <li>
                        <a href="#configuracion" tittle="DConfiguración" class="tooltip">
                            <span class="link hide">Configuración</span>
                            <span class="tooltip__content">Configuración</span>
                        </a>
                    </li>
                </ul>
                <h2>Contáctanos</h2>
                <ul>
                    <li>
                        <a href="#contactos" title="Contactanos" class="tooltip">
                            <span class="link_hide">Email</span>
                            <span class="tooltip__content">Email</span>
                        </a>
                    </li>
                    <li>
                        <a href="#contactos" title="Contactanos" class="tooltip">
                            <span class="link_hide">WhatsApp</span>
                            <span class="tooltip__content">WhatsApp</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="divider"></div>
            <div class="sidebar__profile">
                <div class="avatar__wrapper">
                    <img class="avatar" src="../assets/imag/assets/imag/dan_o.png" alt="Dan Rojas ">
                    <div class="online__status"></div>
                </div>
                <section class="avatar__name hide">
                    <div class="user-name">Dan Rojas</div>
                    <div class="email">dan9849r@gmail.com</div>
                </section>
                <a href="#logout" class="logout">
                    <img src="..asssets/imag/salida.png" alt="Cerrar sesión">
                </a>
            </div>
        </nav> 
    </main>
    
    <script src="script.js"></script>

</body>
</html>