<?php
include "../../../app/config/database.php";


if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "DELETE FROM viajes WHERE codigo = $id";

    $result = mysqli_query($conn, $sql);

    header("Location: /server/static/templates/trip_views/read_trip.php?success=1");
    exit();
}
?>