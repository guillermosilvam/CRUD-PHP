<?php include "../../../app/includes/navbar.php" ?>
<?php include "../../../app/config/database.php"; ?>
<?php
$viajes = mysqli_query($conn, "SELECT v.codigo, t.nombre AS tren, c_origen.nombre AS ciudad_origen, c_destino.nombre AS ciudad_destino, v.fecha, v.hora FROM viajes v JOIN trenes t ON v.fk_codigo_tren = t.codigo JOIN ciudades c_origen ON v.fk_codigo_origen = c_origen.codigo JOIN ciudades c_destino ON v.fk_codigo_destino = c_destino.codigo");

// Obtener datos de la reservación y pasajeros
$reservacion = null;
$pasajeros = [];
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT r.*, c.nombre AS solicitante_nombre, c.apellido AS solicitante_apellido, c.pasaporte AS solicitante_pasaporte, c.edad AS solicitante_edad, c.sexo AS solicitante_sexo
              FROM reservaciones r
              JOIN clientes c ON r.fk_pasaporte_solicitante = c.pasaporte
              WHERE r.codigo = $id LIMIT 1";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $reservacion = mysqli_fetch_assoc($result);
        $res = mysqli_query($conn, "SELECT cl.nombre, cl.apellido, cl.pasaporte as fk_pasaporte, cl.edad, cl.sexo, p.clase, p.asiento, p.precio FROM pasajeros p JOIN clientes cl ON p.fk_pasaporte = cl.pasaporte WHERE p.fk_codigo_reservacion = $id");
        while ($row = mysqli_fetch_assoc($res)) {
            $pasajeros[] = $row;
        }
    }
}
?>
<div class="w-full min-h-screen flex justify-center">
    <div class="w-1/2 mx-auto p-8 bg-white rounded-lg shadow-lg border border-gray-200">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Editar Reservación</h2>
        <form class="space-y-6" action="/server/app/controllers/reservation_controllers/put_reservation.php" method="POST">
            <input type="hidden" name="codigo" value="<?php echo $reservacion ? $reservacion['codigo'] : ''; ?>">
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Código del Viaje</label>
                <input type="text"
    value="<?php
        if ($reservacion) {
            // Busca el viaje seleccionado
            $viajeSel = null;
            $viajes = mysqli_query($conn, "SELECT v.codigo, t.nombre AS tren, c_origen.nombre AS ciudad_origen, c_destino.nombre AS ciudad_destino, v.fecha, v.hora FROM viajes v JOIN trenes t ON v.fk_codigo_tren = t.codigo JOIN ciudades c_origen ON v.fk_codigo_origen = c_origen.codigo JOIN ciudades c_destino ON v.fk_codigo_destino = c_destino.codigo");
            while($v = mysqli_fetch_assoc($viajes)) {
                if($reservacion['fk_codigo_viaje'] == $v['codigo']) {
                    $viajeSel = $v;
                    break;
                }
            }
            if ($viajeSel) {
                echo $viajeSel['codigo'] . ' - Tren: ' . $viajeSel['tren'] . ' | Origen: ' . $viajeSel['ciudad_origen'] . ' | Destino: ' . $viajeSel['ciudad_destino'] . ' | Fecha: ' . $viajeSel['fecha'] . ' ' . $viajeSel['hora'];
            }
        }
    ?>"
    class="w-full px-4 py-2 rounded-md" style="background-color: #e5e7eb; color: #6b7280; border: 2px #9ca3af; cursor: not-allowed;"
    readonly disabled
/>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Nombre del Solicitante</label>
                    <input type="text" name="cliente_nombre" required value="<?php echo $reservacion ? htmlspecialchars($reservacion['solicitante_nombre']) : ''; ?>" class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Apellido del Solicitante</label>
                    <input type="text" name="cliente_apellido" required value="<?php echo $reservacion ? htmlspecialchars($reservacion['solicitante_apellido']) : ''; ?>" class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Nro de Pasaporte</label>
                    <input type="text" name="cliente_pasaporte" required value="<?php echo $reservacion ? htmlspecialchars($reservacion['solicitante_pasaporte']) : ''; ?>" class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Edad</label>
                    <input type="number" name="cliente_edad" min="0" required value="<?php echo $reservacion ? intval($reservacion['solicitante_edad']) : ''; ?>" class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Sexo</label>
                    <select name="cliente_sexo" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200">
                        <option value="Masculino" <?php if($reservacion && $reservacion['solicitante_sexo'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
                        <option value="Femenino" <?php if($reservacion && $reservacion['solicitante_sexo'] == 'Femenino') echo 'selected'; ?>>Femenino</option>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Estado de la reservación</label>
                    <select name="estado" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200">
                        <option value="Activo" <?php if($reservacion && $reservacion['estado'] == 'Activo') echo 'selected'; ?>>Activo</option>
                        <option value="Inactivo" <?php if($reservacion && $reservacion['estado'] == 'Inactivo') echo 'selected'; ?>>Inactivo</option>
                    </select>
                </div>
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Número de puestos (máx 4)</label>
                <input type="number" name="cantidad_puestos" id="cantidad_puestos" min="1" max="4" value="<?php echo $reservacion ? intval($reservacion['cantidad_puestos']) : '1'; ?>" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
            </div>
            <div id="pasajeros-section" class="space-y-4">
                <!-- Aquí puedes cargar los pasajeros si lo deseas -->
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-cyan-500 hover:bg-cyan-600 text-white font-medium rounded-md transition duration-200 shadow-sm hover:shadow-md">Guardar Reservación</button>
        </form>
    </div>
</div>
</main>
</body>
<script>
    window.pasajerosAntiguos = <?php echo json_encode($pasajeros); ?>;
</script>
<script src="../../scripts/renderFields.js"></script>
</html>
