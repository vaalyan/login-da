<?php
if (!empty($_GET["id"]) && !empty($_GET["nombre"])) {
    $id = $_GET["id"];
    $nombre = $_GET["nombre"];

    try {
        unlink($nombre);
    } catch (\Throwable $th) {
        //throw $th;
    }

    $eliminar = $conexion->query("DELETE FROM img WHERE id_img=$id");

    if ($eliminar == 1) {
        echo "<div class='alert alert-success'>Imagen eliminada con éxito.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al eliminar imagen.</div>";
    }
?>
<script>
    history.replaceState(null, null, location.pathname);
</script>
<?php } ?>
