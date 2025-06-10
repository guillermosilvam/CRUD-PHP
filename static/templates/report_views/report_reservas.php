<?php
include "../../../app/includes/navbar.php";
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['user_tipo']) || $_SESSION['user_tipo'] !== 'Supervisor') {
    header('Location: /server/static/templates/dashboard/dashboard.php');
    exit();
}
include "../../../app/controllers/report_controllers/get_report_reservation.php";
?>
<div class="w-full flex justify-center bg-gray-100 dark:bg-[#18181b] py-8">
    <div class="w-full max-w-5xl mx-auto p-8 bg-white report-container rounded-lg shadow-lg border border-gray-200">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Reporte de Reservas por Tipo de Tren</h2>
        <form method="GET" class="mb-6 flex gap-4 items-end">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tipo de tren</label>
                <select name="tren_id" class="px-4 py-2 rounded-md border border-gray-300 bg-gray-100 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500">
                    <option value="">Seleccione un tren</option>
                    <?php while($tren = mysqli_fetch_assoc($trenes)): ?>
                        <option value="<?php echo $tren['codigo']; ?>" <?php if(isset($_GET['tren_id']) && $_GET['tren_id'] == $tren['codigo']) echo 'selected'; ?>>
                            <?php echo $tren['nombre']; ?> (ID: <?php echo $tren['codigo']; ?>)
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <button type="submit" class="px-4 py-2 bg-cyan-500 hover:bg-cyan-600 text-white rounded-md">Buscar</button>
        </form>
        <?php if(isset($_GET['tren_id']) && $_GET['tren_id'] !== ''): ?>
            <div class="overflow-x-auto rounded-lg shadow mb-4">
                <table class="min-w-full text-sm font-medium text-center text-gray-700 border border-gray-200">
                    <thead class="bg-cyan-500 text-white">
                        <tr>
                            <th class="px-4 py-3">Nro de Reserva</th>
                            <th class="px-4 py-3">Ciudad Destino</th>
                            <th class="px-4 py-3">N° Pasajeros</th>
                            <th class="px-4 py-3">Monto de la Reserva (¥)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($reservas) > 0): ?>
                            <?php foreach($reservas as $res): ?>
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="px-4 py-2"><?php echo $res['nro_reserva']; ?></td>
                                    <td class="px-4 py-2"><?php echo $res['ciudad_destino']; ?></td>
                                    <td class="px-4 py-2"><?php echo $res['num_pasajeros']; ?></td>
                                    <td class="px-4 py-2">¥<?php echo number_format($res['monto_reserva'], 0, '', ','); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="4" class="py-4 text-gray-400">No hay reservas para este tren.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="text-right font-bold text-lg">
                Monto total: <span class="text-cyan-600">¥<?php echo number_format($monto_total, 0, '', ','); ?></span>
            </div>
        <?php endif; ?>
    </div>
</div>
