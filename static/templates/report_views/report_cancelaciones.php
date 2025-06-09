<?php
include "../../../app/includes/navbar.php";
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['user_tipo']) || $_SESSION['user_tipo'] !== 'Supervisor') {
    header('Location: /server/static/templates/dashboard/dashboard.php');
    exit();
}
include "../../../app/controllers/report_controllers/get_report_cancellations.php"; ?>

<div class="w-full min-h-screen flex justify-center bg-[#f2f2f2]">
    <div class="w-full max-w-5xl mx-auto p-8 bg-white rounded-lg shadow-lg border border-gray-200 mt-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Reporte de Cancelaciones</h2>
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
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Clase</label>
                <select name="clase" class="px-4 py-2 rounded-md border border-gray-300 bg-gray-100 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
                    <option value="">Todas</option>
                    <option value="Primera" <?php if($clase=='Primera') echo 'selected'; ?>>Primera</option>
                    <option value="Turista" <?php if($clase=='Turista') echo 'selected'; ?>>Turista</option>
                    <option value="Economica" <?php if($clase=='Economica') echo 'selected'; ?>>Económica</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-cyan-500 hover:bg-cyan-600 text-white rounded-md">Buscar</button>
        </form>
        <div class="overflow-x-auto rounded-lg shadow mb-4">
            <table class="min-w-full text-sm font-medium text-center text-gray-700 border border-gray-200">
                <thead class="bg-cyan-500 text-white">
                    <tr>
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Apellido</th>
                        <th class="px-4 py-3">Pasaporte</th>
                        <th class="px-4 py-3">Edad</th>
                        <th class="px-4 py-3">Sexo</th>
                        <th class="px-4 py-3">Clase</th>
                        <th class="px-4 py-3">Ciudad Destino</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($pasajeros) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($pasajeros)): ?>
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-2"><?php echo htmlspecialchars($row['nombre']); ?></td>
                                <td class="px-4 py-2"><?php echo htmlspecialchars($row['apellido']); ?></td>
                                <td class="px-4 py-2"><?php echo htmlspecialchars($row['pasaporte']); ?></td>
                                <td class="px-4 py-2"><?php echo htmlspecialchars($row['edad']); ?></td>
                                <td class="px-4 py-2"><?php echo htmlspecialchars($row['sexo']); ?></td>
                                <td class="px-4 py-2"><?php echo htmlspecialchars($row['clase']); ?></td>
                                <td class="px-4 py-2"><?php echo htmlspecialchars($row['ciudad_destino']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="7" class="py-4 text-gray-400">No hay cancelaciones para los filtros seleccionados.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
