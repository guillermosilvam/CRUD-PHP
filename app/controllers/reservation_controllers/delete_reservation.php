<?php
include "../../../app/config/database.php";

if (isset($_GET['id'])) {
    $codigo = intval($_GET['id']);
    $sql = "UPDATE reservaciones SET estado = 'Inactivo' WHERE codigo = $codigo";
    if (mysqli_query($conn, $sql)) {
        header("Location: /server/static/templates/reservation_views/read_reservation.php?msg=deleted");
        exit();
    } else {
        header("Location: /server/static/templates/reservation_views/read_reservation.php?msg=error");
        exit();
    }
} else {
    header("Location: /server/static/templates/reservation_views/read_reservation.php?msg=invalid");
    exit();
}
?>
