<?php 
    if (!empty($_POST["btncargar"])) {

        $imagen = $_FILES["imagen"]["tmp_name"];
        $nombre_img = $_FILES["imagen"]["name"];
        $tipo_img = strtolower(pathinfo($nombre_img, PATHINFO_EXTENSION));
        $size_img = $_FILES["imagen"]["size"];
        $directorio = "../assets/imag/";

        if ($tipo_img == "jpg" or $tipo_img == "jpeg" or $tipo_img == "png") {
            echo "<div class='alert alert-info'>Imagen cargada</div>";

            $registro = $conexion -> query("INSERT INTO img(foto) values('')");
            $id_registro = $conexion -> insert_id;

            $ruta = $directorio.$id_registro.".".$tipo_img;
            $actualizar_img = $conexion -> query(" UPDATE img SET foto = '$ruta' WHERE id_img = $id_registro ");

            /*Almacenar imagen*/
            if (move_uploaded_file($imagen, $ruta)) {
                echo "<div class='alert alert-info'>Imagen guardada con éxito</div>";
            } else {
                echo "<div class='alert alert-danger'>Error al guardar la imagen</div>";
            }
        } else {
            echo "<div class='alert alert-info'>No se acepta ese formato</div>";
        }


        //echo "<div class='alert alert-info'>$tipo_img</div>";
        //echo "<div class='alert alert-info'>$size_img</div>";
        
        ?>
    <script>
        history.replaceState(null, null, location.pathname) //evitar que se re-envie el formulario
    </script>

<?php }
?>