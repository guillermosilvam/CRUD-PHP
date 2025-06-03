<?php
include "../../../app/config/database.php";

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "SELECT * FROM viajes WHERE codigo = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $tren_id = $row['fk_codigo_tren'];
        $origen = $row['fk_codigo_origen'];
        $destino = $row['fk_codigo_destino'];
        $fecha = $row['fecha'];
        $hora = $row['hora'];
    }
}

if (isset($_POST['tren_id'], $_POST['origen'], $_POST['destino'], $_POST['fecha'], $_POST['hora'])) {
    $id = (int)$_GET['id'];
    $tren_id = (int)$_POST['tren_id'];
    $origen = (int)$_POST['origen'];
    $destino = (int)$_POST['destino'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    $check_sql = "SELECT * FROM viajes WHERE fk_codigo_tren = $tren_id AND fecha = '$fecha' AND hora = '$hora' AND codigo != $id";
    $check_result = mysqli_query($conn, $check_sql);
    if (mysqli_num_rows($check_result) > 0) {
        echo "<div style='color:red; text-align:center; margin-top:20px;'>Ya existe un viaje para este tren a la misma fecha y hora.</div>";
        exit();
    }

    $sql = "UPDATE viajes SET fk_codigo_tren = $tren_id, fk_codigo_origen = $origen, fk_codigo_destino = $destino, fecha = '$fecha', hora = '$hora' WHERE codigo = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: /server/static/templates/trip_views/read_trip.php?success=1");
        exit();
    } else {
        echo "Error al actualizar el viaje: " . mysqli_error($conn);
    }
}
?>