<?php
include "../../../app/config/database.php";

$trenes = mysqli_query($conn, "SELECT codigo, nombre FROM trenes");

$reservas = [];
$monto_total = 0;
if (isset($_GET['tren_id']) && $_GET['tren_id'] !== '') {
    $tren_id = intval($_GET['tren_id']);
    $query = "SELECT r.codigo AS nro_reserva, c_destino.nombre AS ciudad_destino, r.cantidad_puestos AS num_pasajeros, SUM(p.precio) AS monto_reserva
        FROM reservaciones r
        JOIN viajes v ON r.fk_codigo_viaje = v.codigo
        JOIN ciudades c_destino ON v.fk_codigo_destino = c_destino.codigo
        JOIN pasajeros p ON p.fk_codigo_reservacion = r.codigo
        WHERE v.fk_codigo_tren = $tren_id
        GROUP BY r.codigo, c_destino.nombre, r.cantidad_puestos";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $reservas[] = $row;
        $monto_total += $row['monto_reserva'];
    }
}
?>