<?php include "../../../app/includes/navbar.php" ?>
<?php include "../../../app/controllers/reservation_controllers/get_reservation.php" ?>

<div class="w-full h-full flex items-center justify-center">
    <div class="w-full max-w-4xl h-full bg-white p-8 rounded-lg shadow-lg">
        <div class="flex items-center justify-center gap-2 mb-6 w-full">
            <input type="search" name="busqueda"
                class="w-64 px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"
                placeholder="Buscar">
            <button
                class="px-4 py-2 bg-cyan-500 hover:bg-cyan-600 text-white font-medium rounded-md transition duration-200 shadow-sm hover:shadow-md">Buscar</button>
            <a href="/server/static/templates/reservation_views/create_reservation.php"
                class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white font-medium rounded-md transition duration-200 shadow-sm hover:shadow-md ml-2 flex items-center justify-center h-[40px]">Agregar</a>
        </div>
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full text-sm font-medium text-center text-gray-700 border border-gray-200">
                <thead class="bg-cyan-500 text-white">
                    <tr>
                        <th class="px-4 py-3">Código</th>
                        <th class="px-4 py-3">Solicitante</th>
                        <th class="px-4 py-3">Pasajeros</th>
                        <th class="px-4 py-3">Ciudad Origen</th>
                        <th class="px-4 py-3">Ciudad Destino</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3">Fecha</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php while ($row = mysqli_fetch_assoc($reservaciones)): ?>
                        <tr>
                            <td class="px-4 py-3 font-semibold"><?php echo $row['codigo']; ?></td>
                            <td class="px-4 py-3">
                                <?php echo $row['solicitante_nombre'] . ' ' . $row['solicitante_apellido']; ?></td>
                            <td class="px-4 py-3"><?php echo getPasajeros($conn, $row['codigo']); ?></td>
                            <td class="px-4 py-3"><?php echo $row['ciudad_origen']; ?></td>
                            <td class="px-4 py-3"><?php echo $row['ciudad_destino']; ?></td>
                            <td class="px-4 py-3"><?php echo isset($row['estado']) ? $row['estado'] : 'Desconocido'; ?></td>
                            <td class="px-4 py-3"><?php echo $row['fecha']; ?></td>
                            <td class="px-4 py-3 flex gap-2 justify-center items-center">
                            <td class="px-4 py-3 flex gap-2 justify-center items-center">
                                <a href="./edit_reservation.php?id=<?php echo $row['codigo']; ?>"
                                    class="px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded-md text-md font-semibold transition-colors duration-200"><i
                                        class="fa-solid fa-pen"></i></a>
                                <a href="/server/app/controllers/reservation_controllers/delete_reservation.php?id=<?php echo $row['codigo']; ?>"
                                    class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md text-md font-semibold transition-colors duration-200" onclick="return confirm('¿Está seguro que desea eliminar el registro?');"><i
                                        class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</main>
</body>
</html>