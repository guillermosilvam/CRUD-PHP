<?php
include "../../../app/config/database.php";

if (isset($_POST['tren_id'], $_POST['origen'], $_POST['destino'], $_POST['fecha'], $_POST['hora'])) {
    $tren_id = (int)$_POST['tren_id'];
    $origen = (int)$_POST['origen'];
    $destino = (int)$_POST['destino'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    $check_sql = "SELECT * FROM viajes WHERE fk_codigo_tren = $tren_id AND fecha = '$fecha' AND hora = '$hora'";
    $check_result = mysqli_query($conn, $check_sql);
    if (mysqli_num_rows($check_result) > 0) {
        echo "<div style='color:red; text-align:center; margin-top:20px;'>Ya existe un viaje para este tren a la misma fecha y hora.</div>";
        exit();
    }
    $sql = "INSERT INTO viajes (fk_codigo_tren, fk_codigo_origen, fk_codigo_destino, fecha, hora) VALUES ($tren_id, $origen, $destino, '$fecha', '$hora')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: /server/static/templates/trip_views/read_trip.php?success=1");
        exit();
    } else {
        echo "Error al guardar el viaje: " . mysqli_error($conn);
    }
}
?>