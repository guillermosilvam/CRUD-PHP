<?php include "../../../app/includes/navbar.php"; ?>
<?php include "../../../app/controllers/report_controllers/get_report_destination.php"; ?>

<div class="w-full min-h-screen flex justify-center bg-[#f2f2f2]">
    <div class="w-full max-w-5xl mx-auto p-8 bg-white rounded-lg shadow-lg border border-gray-200 mt-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Reporte de Destinos</h2>
        <form method="GET" class="mb-6 flex flex-wrap gap-4 items-end justify-center">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ciudad destino</label>
                <select name="ciudad_destino" class="px-4 py-2 rounded-md border border-gray-300 bg-gray-100 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
                    <option value="">Todas</option>
                    <?php while($ciudad = mysqli_fetch_assoc($ciudades)): ?>
                        <option value="<?php echo $ciudad['codigo']; ?>" <?php if(isset($_GET['ciudad_destino']) && $_GET['ciudad_destino'] == $ciudad['codigo']) echo 'selected'; ?>>
                            <?php echo $ciudad['nombre']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-cyan-500 hover:bg-cyan-600 text-white rounded-md">Buscar</button>
        </form>
        <div class="overflow-x-auto rounded-lg shadow mb-4">
            <table class="min-w-full text-sm font-medium text-center text-gray-700 border border-gray-200">
                <thead class="bg-cyan-500 text-white">
                    <tr>
                        <th class="px-4 py-3">Código Viaje</th>
                        <th class="px-4 py-3">Fecha</th>
                        <th class="px-4 py-3">Tren</th>
                        <th class="px-4 py-3">Ciudad Destino</th>
                        <th class="px-4 py-3">Total Reservas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($viajes) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($viajes)): ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-2"><?php echo $row['codigo_viaje']; ?></td>
                                <td class="px-4 py-2"><?php echo $row['fecha']; ?></td>
                                <td class="px-4 py-2"><?php echo htmlspecialchars($row['tren']); ?></td>
                                <td class="px-4 py-2"><?php echo htmlspecialchars($row['ciudad_destino']); ?></td>
                                <td class="px-4 py-2"><?php echo $row['total_reservas']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="5" class="py-4 text-gray-400">No hay viajes planificados para este destino.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
