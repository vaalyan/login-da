<?php
if (!empty($_POST["btneditar"])) {
    //echo "<div class='alert alert-info'>boton presionado</div>";

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];

    $imagen = $_FILES["imagen"]["tmp_name"];
    $nombre_img = $_FILES["imagen"]["name"];
    $tipo_img = strtolower(pathinfo($nombre_img, PATHINFO_EXTENSION));
    $size_img = $_FILES["imagen"]["size"];
    $directorio = "../assets/imag/";

    if (is_file($imagen)) {

        if ($tipo_img == "jpg" or $tipo_img == "jpeg" or $tipo_img == "png") {
            echo "<div class='alert alert-info'>Imagen cargada</div>";

            /* Eliminar imagen anterior */
            try {
                unlink($nombre);
            } catch (\Throwable $th) {

            }

            $ruta = $directorio . $id . "." . $tipo_img;
            if (move_uploaded_file($imagen, $ruta)) {
                
                $editar = $conexion -> query("UPDATE img SET foto = '$ruta' WHERE id_img = $id");
                if ($editar == 1) {
                    echo "<div class='alert alert-success'>Imagen subida con éxito.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Error al subir imagen.</div>";
                }
                
            } else {
                echo "<div class='alert alert-warning'>Error al subir imagen.</div>";
            }

        } else {
            echo "<div class='alert alert-warning'>Error al guardar la imagen - Formato inválido.</div>";
        }

    } else {
        echo "<div class='alert alert-info'>Primero debes seleccionar una imagen</div>";
    }

    //echo "<div class='alert alert-info'>$tipo_img</div>";
    //echo "<div class='alert alert-info'>$size_img</div>";

    ?>
    <script>
        history.replaceState(null, null, location.pathname) //evitar que se re-envie el formulario
    </script>

<?php }
?>