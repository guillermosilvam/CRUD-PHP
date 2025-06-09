<?php
include "../../../app/config/database.php";


$estado = isset($_GET['estado']) ? $_GET['estado'] : '';
$fecha_inicio = isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : '';
$fecha_fin = isset($_GET['fecha_fin']) ? $_GET['fecha_fin'] : '';

$where = [];
if ($estado && in_array($estado, ['Activo', 'Inactivo'])) {
    $where[] = "r.estado = '" . mysqli_real_escape_string($conn, $estado) . "'";
}
if ($fecha_inicio && $fecha_fin) {
    $where[] = "r.fecha_creacion BETWEEN '" . mysqli_real_escape_string($conn, $fecha_inicio) . "' AND '" . mysqli_real_escape_string($conn, $fecha_fin) . " 23:59:59'";
}
$where_sql = count($where) ? 'WHERE ' . implode(' AND ', $where) : '';

$sql = "SELECT r.codigo AS nro_reserva, DATE(r.fecha_creacion) AS fecha_reserva, v.codigo AS codigo_viaje, t.nombre AS tipo_tren
FROM reservaciones r
JOIN viajes v ON r.fk_codigo_viaje = v.codigo
JOIN trenes t ON v.fk_codigo_tren = t.codigo
$where_sql
ORDER BY r.fecha_creacion DESC";
$reservas = mysqli_query($conn, $sql);


function getPasajeros($conn, $reserva_id) {
    $pasajeros = [];
    $sql = "SELECT cl.nombre, cl.apellido FROM pasajeros p JOIN clientes cl ON p.fk_pasaporte = cl.pasaporte WHERE p.fk_codigo_reservacion = $reserva_id";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $pasajeros[] = $row['nombre'] . ' ' . $row['apellido'];
    }
    return $pasajeros;
}
?>