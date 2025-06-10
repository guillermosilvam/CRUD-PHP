<?php
include "../../../app/config/database.php";

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $check = mysqli_query($conn, "SELECT 1 FROM reservaciones WHERE fk_codigo_viaje = $id LIMIT 1");
    if (mysqli_num_rows($check) > 0) {
        header("Location: /server/static/templates/trip_views/read_trip.php?error=usado");
        exit();
    }
    $sql = "DELETE FROM viajes WHERE codigo = $id";
    $result = mysqli_query($conn, $sql);

    header("Location: /server/static/templates/trip_views/read_trip.php?success=1");
    exit();
}
?>