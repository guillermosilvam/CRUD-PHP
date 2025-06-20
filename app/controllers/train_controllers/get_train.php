<?php
include "../../../app/config/database.php"; 
$sql = "SELECT * FROM trenes";
$result_trains = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result_trains)) { ?>
<tr class="hover:bg-gray-50 transition-colors duration-200 border-b border-gray-200">
    <td class="px-4 py-3"><?php echo $row['codigo']; ?></td>
    <td class="px-4 py-3"><?php echo $row['nombre']; ?></td>
    <td class="px-4 py-3"><?php echo $row['velocidad']; ?> km/h</td>
    <td class="px-4 py-3"><?php echo $row['capacidad_economica']; ?></td>
    <td class="px-4 py-3"><?php echo $row['capacidad_turista']; ?></td>
    <td class="px-4 py-3"><?php echo $row['capacidad_primera']; ?></td>
    <td class="px-4 py-3 border-r border-gray-200"><?php echo $row['capacidad_economica'] + $row['capacidad_turista'] + $row['capacidad_primera']; ?></td>
    <td class="px-4 py-3 flex gap-2 justify-center items-center">
        <a href="./edit_train.php?id=<?php echo $row['codigo']; ?>" class="px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded-md text-md font-semibold transition-colors duration-200"><i class="fa-solid fa-pen"></i></a>
        <a href="/server/app/controllers/train_controllers/delete_train.php?id=<?php echo $row['codigo']; ?>" class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md text-md font-semibold transition-colors duration-200" onclick="return confirm('¿Está seguro que desea eliminar el registro?');"><i class="fa-solid fa-trash"></i></a>         
    </td>
</tr>
<?php } ?>