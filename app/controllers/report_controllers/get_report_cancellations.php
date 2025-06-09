<?php
include "../../../app/config/database.php";

$ciudades = mysqli_query($conn, "SELECT codigo, nombre FROM ciudades");
$clase = isset($_GET['clase']) ? $_GET['clase'] : '';
$ciudad_destino = isset($_GET['ciudad_destino']) ? $_GET['ciudad_destino'] : '';

$where = ["r.estado = 'Inactivo'"];
if ($ciudad_destino !== '') {
    $where[] = "v.fk_codigo_destino = " . intval($ciudad_destino);
}
if ($clase !== '') {
    $where[] = "p.clase = '" . mysqli_real_escape_string($conn, $clase) . "'";
}
$where_sql = count($where) ? 'WHERE ' . implode(' AND ', $where) : '';

$sql = "SELECT cl.nombre, cl.apellido, cl.pasaporte, cl.edad, cl.sexo, p.clase, c_destino.nombre AS ciudad_destino
FROM pasajeros p
JOIN reservaciones r ON p.fk_codigo_reservacion = r.codigo
JOIN viajes v ON r.fk_codigo_viaje = v.codigo
JOIN ciudades c_destino ON v.fk_codigo_destino = c_destino.codigo
JOIN clientes cl ON p.fk_pasaporte = cl.pasaporte
$where_sql
ORDER BY c_destino.nombre, cl.apellido, cl.nombre";
$pasajeros = mysqli_query($conn, $sql);
?>