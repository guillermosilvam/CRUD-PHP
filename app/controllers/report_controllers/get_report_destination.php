<?php 
include "../../../app/config/database.php";

$ciudades = mysqli_query($conn, "SELECT codigo, nombre FROM ciudades");
$ciudad_destino = isset($_GET['ciudad_destino']) ? $_GET['ciudad_destino'] : '';
$where = '';
if ($ciudad_destino !== '') {
    $where = "WHERE v.fk_codigo_destino = " . intval($ciudad_destino);
}
$sql = "SELECT v.codigo AS codigo_viaje, v.fecha, t.nombre AS tren, c_destino.nombre AS ciudad_destino,
            (SELECT COUNT(*) FROM reservaciones r WHERE r.fk_codigo_viaje = v.codigo) AS total_reservas
        FROM viajes v
        JOIN trenes t ON v.fk_codigo_tren = t.codigo
        JOIN ciudades c_destino ON v.fk_codigo_destino = c_destino.codigo
        $where
        ORDER BY v.fecha ASC";
$viajes = mysqli_query($conn, $sql);
?>