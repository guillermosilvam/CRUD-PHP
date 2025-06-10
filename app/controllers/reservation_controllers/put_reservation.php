<?php
include "../../../app/config/database.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = intval($_POST['codigo']);
    $estado = mysqli_real_escape_string($conn, $_POST['estado']);
    $trip_id = intval($_POST['trip_id']);
    $cantidad_puestos = intval($_POST['cantidad_puestos']);
    $cliente_nombre = mysqli_real_escape_string($conn, $_POST['cliente_nombre']);
    $cliente_apellido = mysqli_real_escape_string($conn, $_POST['cliente_apellido']);
    $cliente_pasaporte = mysqli_real_escape_string($conn, $_POST['cliente_pasaporte']);
    $cliente_edad = intval($_POST['cliente_edad']);
    $cliente_sexo = mysqli_real_escape_string($conn, $_POST['cliente_sexo']);
    $pasajeros = isset($_POST['pasajeros']) ? $_POST['pasajeros'] : [];

    $sql = "UPDATE clientes SET nombre='$cliente_nombre', apellido='$cliente_apellido', edad=$cliente_edad, sexo='$cliente_sexo' WHERE pasaporte='$cliente_pasaporte'";
    mysqli_query($conn, $sql);

    $sql = "UPDATE reservaciones SET fk_pasaporte_solicitante='$cliente_pasaporte', fk_codigo_viaje=$trip_id, cantidad_puestos=$cantidad_puestos, estado='$estado' WHERE codigo=$codigo";
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM pasajeros WHERE fk_codigo_reservacion=$codigo";
    mysqli_query($conn, $sql);

    foreach ($pasajeros as $p) {
        $p_nombre = mysqli_real_escape_string($conn, $p['nombre']);
        $p_apellido = mysqli_real_escape_string($conn, $p['apellido']);
        $p_pasaporte = mysqli_real_escape_string($conn, $p['pasaporte']);
        $p_edad = intval($p['edad']);
        $p_sexo = mysqli_real_escape_string($conn, $p['sexo']);
        $p_clase = mysqli_real_escape_string($conn, $p['clase']);
        $p_asiento = mysqli_real_escape_string($conn, $p['asiento']);
        $p_precio = intval($p['precio']);

        $sql = "SELECT pasaporte FROM clientes WHERE pasaporte = '$p_pasaporte' LIMIT 1";
        $res = mysqli_query($conn, $sql);
        if (!mysqli_fetch_assoc($res)) {
            $sql = "INSERT INTO clientes (pasaporte, nombre, apellido, edad, sexo) VALUES ('$p_pasaporte', '$p_nombre', '$p_apellido', $p_edad, '$p_sexo')";
            mysqli_query($conn, $sql);
        } else {
            $sql = "UPDATE clientes SET nombre='$p_nombre', apellido='$p_apellido', edad=$p_edad, sexo='$p_sexo' WHERE pasaporte='$p_pasaporte'";
            mysqli_query($conn, $sql);
        }
        $sql = "INSERT INTO pasajeros (fk_codigo_reservacion, fk_pasaporte, clase, asiento, precio) VALUES ($codigo, '$p_pasaporte', '$p_clase', '$p_asiento', $p_precio)";
        mysqli_query($conn, $sql);
    }

    header("Location: /server/static/templates/reservation_views/read_reservation.php?msg=updated");
    exit();
} else {
    header("Location: /server/static/templates/reservation_views/read_reservation.php?msg=invalid");
    exit();
}
?>