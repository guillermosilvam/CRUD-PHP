<?php
include "../../../app/config/database.php";

$sql = "SELECT r.codigo, c.nombre AS solicitante_nombre, c.apellido AS solicitante_apellido, v.fecha,
               c_origen.nombre AS ciudad_origen, c_destino.nombre AS ciudad_destino, r.estado
        FROM reservaciones r
        JOIN clientes c ON r.fk_pasaporte_solicitante = c.pasaporte
        JOIN viajes v ON r.fk_codigo_viaje = v.codigo
        JOIN ciudades c_origen ON v.fk_codigo_origen = c_origen.codigo
        JOIN ciudades c_destino ON v.fk_codigo_destino = c_destino.codigo
        ORDER BY r.codigo DESC";
$reservaciones = mysqli_query($conn, $sql);

function getPasajeros($conn, $reservacion_id) {
    $pasajeros = [];
    $sql = "SELECT cl.nombre, cl.apellido FROM pasajeros p JOIN clientes cl ON p.fk_pasaporte = cl.pasaporte WHERE p.fk_codigo_reservacion = $reservacion_id";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $pasajeros[] = $row['nombre'] . ' ' . $row['apellido'];
    }
    return implode(', ', $pasajeros);
}
?>