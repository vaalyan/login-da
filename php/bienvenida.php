<?php

session_start();

if (!isset($_SESSION['usuario'])) { //proteccion sessión
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
    <title>Dragon Age</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
    <main>
        <h1 class="text-center text-white font-weight-bold p-4" style="background-color: rgba(0, 0, 0, 0.5);">Bienvenido a la fan page de Dragon Age</h1>

        <p class="text-center text-white" style="background-color: rgba(0, 0, 0, 0.5);">En está página puedes agregar tus imágenes favoritas del video juego Dragon Age - Inquisition</p>

        <?php
        include "conexion_be.php";
        include "registrar_img_be.php";
        include "editar_img_be.php";
        include "eliminar_img_be.php";
        $sql = $conexion->query("SELECT * FROM img");
        ?>

        <script>
            function eliminar() {
                let res=confirm("¿Estas seguro de eliminar la imagen?")
                return res;
            }
        </script>

        <div class="p-3 table-responsive">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                AGREGAR
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Carga tu arte favorito</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" enctype="multipart/form-data" method="POST">
                                <input type="file" class="form-control mb-2" name="imagen">
                                <input type="submit" value="Cargar" name="btncargar"
                                    class="form-control btn btn-success">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-hover table-striped">
                <thead class="text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">FOTO</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <th scope="row"><?= $datos->id_img ?></th>
                            <td>
                                <img width="200" src="<?= $datos->foto ?>" alt="">
                            </td>
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#exampleModalEditar<?= $datos->id_img ?>" class="btn btn-warning">Editar</a>
                                <a href="bienvenida.php?id=<?= $datos->id_img ?>&nombre=<?= $datos->foto ?>" class="btn btn-danger" onclick="return eliminar()">Eliminar</a>
                            </td>
                        </tr>

                        <div class="modal fade" id="exampleModalEditar<?= $datos->id_img ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cambia a otro de tus artes favoritos.</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" enctype="multipart/form-data" method="POST">
                                            <input type="hidden" value="<?= $datos->id_img ?>" name="id">
                                            <input type="hidden" value="<?= $datos->foto ?>" name="nombre">
                                            <input type="file" class="form-control mb-2" name="imagen">
                                            <input type="submit" value="Cambiar" name="btneditar"
                                                class="form-control btn btn-success">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php }
                    ?>

                </tbody>
            </table>
        </div>
    </main>

    <script src="../assets/js/script_pb.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>