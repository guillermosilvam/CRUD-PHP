<?php
include "../../../app/includes/navbar.php";
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['user_tipo']) || $_SESSION['user_tipo'] !== 'Supervisor') {
    header('Location: /server/static/templates/dashboard/dashboard.php');
    exit();
}
include "../../../app/controllers/report_controllers/get_report_season.php";
?>
<div class="w-full flex justify-center dark:bg-[#18181b] py-8" id="report-bg">
    <div class="w-full max-w-5xl mx-auto p-8 bg-white report-container rounded-lg shadow-lg border border-gray-200">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Reporte de Desplazamientos por Temporada</h2>
        <form method="GET" class="mb-6 flex flex-wrap gap-4 items-end justify-center">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Fecha inicio</label>
                <input type="date" name="fecha_inicio" value="<?php echo htmlspecialchars($fecha_inicio); ?>" class="px-4 py-2 rounded-md border border-gray-300 bg-gray-100 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Fecha fin</label>
                <input type="date" name="fecha_fin" value="<?php echo htmlspecialchars($fecha_fin); ?>" class="px-4 py-2 rounded-md border border-gray-300 bg-gray-100 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                <select name="estado" class="px-4 py-2 rounded-md border border-gray-300 bg-gray-100 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
                    <option value="">Todos</option>
                    <option value="Activo" <?php if($estado=='Activo') echo 'selected'; ?>>Activos</option>
                    <option value="Inactivo" <?php if($estado=='Inactivo') echo 'selected'; ?>>Inactivos</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-cyan-500 hover:bg-cyan-600 text-white rounded-md">Buscar</button>
        </form>
        <div class="overflow-x-auto rounded-lg shadow mb-4">
            <table class="min-w-full text-sm font-medium text-center text-gray-700 border border-gray-200">
                <thead class="bg-cyan-500 text-white">
                    <tr>
                        <th class="px-4 py-3">Nro Reserva</th>
                        <th class="px-4 py-3">Fecha Reserva</th>
                        <th class="px-4 py-3">Tipo Tren</th>
                        <th class="px-4 py-3">Código Viaje</th>
                        <th class="px-4 py-3">Pasajeros</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total_pasajeros = 0; ?>
                    <?php while($row = mysqli_fetch_assoc($reservas)): ?>
                        <?php $pasajeros = getPasajeros($conn, $row['nro_reserva']); $total_pasajeros += count($pasajeros); ?>
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2"><?php echo $row['nro_reserva']; ?></td>
                            <td class="px-4 py-2"><?php echo $row['fecha_reserva']; ?></td>
                            <td class="px-4 py-2"><?php echo $row['tipo_tren']; ?></td>
                            <td class="px-4 py-2"><?php echo $row['codigo_viaje']; ?></td>
                            <td class="px-4 py-2"><?php echo implode(', ', $pasajeros); ?></td>
                        </tr>
                    <?php endwhile; ?>
                    <?php if(mysqli_num_rows($reservas) == 0): ?>
                        <tr><td colspan="5" class="py-4 text-gray-400">No hay reservas para este periodo.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="text-right font-bold text-lg">
            Total de pasajeros: <span class="text-cyan-600"><?php echo $total_pasajeros; ?></span>
        </div>
    </div>
</div>
<script>
function updateReportBg() {
  const bg = document.getElementById('report-bg');
  if (document.documentElement.classList.contains('dark')) {
    bg.classList.add('bg-[#18181b]');
  } else {
    bg.classList.remove('bg-[#18181b]');
  }
}
document.addEventListener('DOMContentLoaded', updateReportBg);
const switchMode = document.getElementById('switchMode');
if (switchMode) {
  switchMode.addEventListener('change', updateReportBg);
}
</script>