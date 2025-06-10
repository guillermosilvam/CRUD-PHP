<?php
include "../../../app/config/database.php";

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $check = mysqli_query($conn, "SELECT 1 FROM viajes WHERE fk_codigo_origen = $id OR fk_codigo_destino = $id LIMIT 1");
    if (mysqli_num_rows($check) > 0) {
        header("Location: /server/static/templates/city_views/read_city.php?error=usada");
        exit();
    }
    $sql = "DELETE FROM ciudades WHERE codigo = $id";
    $result = mysqli_query($conn, $sql);
    
    header("Location: /server/static/templates/city_views/read_city.php?success=1");
    exit();
}

?>