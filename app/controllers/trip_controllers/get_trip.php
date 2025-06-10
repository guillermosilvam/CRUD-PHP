<?php
include "../../../app/config/database.php"; 
$sql = "SELECT v.*, t.nombre AS nombre_tren, c1.nombre AS ciudad_origen, c2.nombre AS ciudad_destino
        FROM viajes v
        JOIN trenes t ON v.fk_codigo_tren = t.codigo
        JOIN ciudades c1 ON v.fk_codigo_origen = c1.codigo
        JOIN ciudades c2 ON v.fk_codigo_destino = c2.codigo";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) { ?>
<tr class="hover:bg-gray-50 transition-colors duration-200 border-b border-gray-200">
    <td class="px-4 py-3"><?php echo $row['codigo'];?></td>
    <td class="px-4 py-3"><?php echo $row['nombre_tren'];?></td>
    <td class="px-4 py-3"><?php echo $row['ciudad_origen'];?> </td>
    <td class="px-4 py-3"><?php echo $row['ciudad_destino'];?></td>
    <td class="px-4 py-3"><?php echo $row['fecha'];?></td>
    <td class="px-4 py-3 border-r border-gray-200"><?php echo $row['hora'];?></td>
    <td class="px-4 py-3 flex gap-2 justify-center items-center">
        <a href="./edit_trip.php?id=<?php echo $row['codigo']; ?>" class="px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded-md text-md font-semibold transition-colors duration-200"><i class="fa-solid fa-pen"></i></a>
        <a href="/server/app/controllers/trip_controllers/delete_trip.php?id=<?php echo $row['codigo']; ?>" class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md text-md font-semibold transition-colors duration-200" onclick="return confirm('¿Está seguro que desea eliminar el registro?');"><i class="fa-solid fa-trash"></i></a>         
    </td>
</tr>
<?php } ?>