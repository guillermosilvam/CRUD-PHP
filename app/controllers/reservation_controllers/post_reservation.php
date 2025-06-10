<?php
include "../../../app/config/database.php";

if (
    isset($_POST['trip_id'], $_POST['cliente_nombre'], $_POST['cliente_apellido'], $_POST['cliente_pasaporte'], $_POST['cantidad_puestos'], $_POST['pasajeros'])
) {
    $trip_id = (int)$_POST['trip_id'];
    $cliente_nombre = mysqli_real_escape_string($conn, $_POST['cliente_nombre']);
    $cliente_apellido = mysqli_real_escape_string($conn, $_POST['cliente_apellido']);
    $cliente_pasaporte = mysqli_real_escape_string($conn, $_POST['cliente_pasaporte']);
    $cliente_edad = isset($_POST['cliente_edad']) ? (int)$_POST['cliente_edad'] : null;
    $cliente_sexo = isset($_POST['cliente_sexo']) ? mysqli_real_escape_string($conn, $_POST['cliente_sexo']) : null;
    $cantidad_puestos = (int)$_POST['cantidad_puestos'];
    $pasajeros = $_POST['pasajeros'];
    $fecha_creacion = date('Y-m-d H:i:s');

    $sql = "SELECT pasaporte FROM clientes WHERE pasaporte = '$cliente_pasaporte' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (!$result || !mysqli_fetch_assoc($result)) {
        $sql = "INSERT INTO clientes (pasaporte, nombre, apellido, edad, sexo) VALUES ('$cliente_pasaporte', '$cliente_nombre', '$cliente_apellido', $cliente_edad, '$cliente_sexo')";
        mysqli_query($conn, $sql);
    }


    $sql = "INSERT INTO reservaciones (fk_pasaporte_solicitante, fk_codigo_viaje, cantidad_puestos, estado, fecha_creacion) VALUES ('$cliente_pasaporte', $trip_id, $cantidad_puestos, 'Activo', '$fecha_creacion')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $reservacion_id = mysqli_insert_id($conn);
        foreach ($pasajeros as $p) {
            $p_nombre = mysqli_real_escape_string($conn, $p['nombre']);
            $p_apellido = mysqli_real_escape_string($conn, $p['apellido']);
            $p_pasaporte = mysqli_real_escape_string($conn, $p['pasaporte']);
            $p_edad = (int)$p['edad'];
            $p_sexo = mysqli_real_escape_string($conn, $p['sexo']);
            $p_clase = mysqli_real_escape_string($conn, $p['clase']);
            $p_asiento = mysqli_real_escape_string($conn, $p['asiento']);
            $p_precio = (int)$p['precio'];

            $sql = "SELECT pasaporte FROM clientes WHERE pasaporte = '$p_pasaporte' LIMIT 1";
            $res = mysqli_query($conn, $sql);
            if (!mysqli_fetch_assoc($res)) {
                $sql = "INSERT INTO clientes (pasaporte, nombre, apellido, edad, sexo) VALUES ('$p_pasaporte', '$p_nombre', '$p_apellido', $p_edad, '$p_sexo')";
                mysqli_query($conn, $sql);
            }

            $sql = "INSERT INTO pasajeros (fk_pasaporte, fk_codigo_reservacion, asiento, clase, precio) VALUES ('$p_pasaporte', $reservacion_id, '$p_asiento', '$p_clase', $p_precio)";
            mysqli_query($conn, $sql);
        }
        header("Location: /server/static/templates/reservation_views/read_reservation.php?success=1");
        exit();
    } else {
        echo "Error al guardar la reservación: " . mysqli_error($conn);
    }
} else {
    echo "Faltan datos obligatorios.";
}
?>
