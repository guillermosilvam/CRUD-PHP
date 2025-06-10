<?php
include "../../../app/config/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Solo se permite modificar el estado de la reservación
    if (!isset($_POST['codigo']) || !isset($_POST['estado'])) {
        header("Location: /server/static/templates/reservation_views/read_reservation.php?msg=missing_field");
        exit();
    }

    $codigo = intval($_POST['codigo']);
    $estado = mysqli_real_escape_string($conn, $_POST['estado']);

    $sql = "UPDATE reservaciones SET estado='$estado' WHERE codigo=$codigo";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        header("Location: /server/static/templates/reservation_views/read_reservation.php?msg=update_error&error=" . urlencode(mysqli_error($conn)));
        exit();
    }
    if (mysqli_affected_rows($conn) === 0) {
        header("Location: /server/static/templates/reservation_views/read_reservation.php?msg=no_reservation_updated");
        exit();
    }

    header("Location: /server/static/templates/reservation_views/read_reservation.php?msg=updated");
    exit();
} else {
    header("Location: /server/static/templates/reservation_views/read_reservation.php?msg=invalid");
    exit();
}
?>