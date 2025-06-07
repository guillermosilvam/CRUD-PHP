<?php include "../../../app/includes/navbar.php" ?>
<?php include "../../../app/config/database.php"; ?>
<?php
$viajes = mysqli_query($conn, "SELECT v.codigo, t.nombre AS tren, c_origen.nombre AS ciudad_origen, c_destino.nombre AS ciudad_destino, v.fecha, v.hora FROM viajes v JOIN trenes t ON v.fk_codigo_tren = t.codigo JOIN ciudades c_origen ON v.fk_codigo_origen = c_origen.codigo JOIN ciudades c_destino ON v.fk_codigo_destino = c_destino.codigo");
?>
<div class="w-full min-h-screen flex justify-center">
    <div class="w-1/2 mx-auto p-8 bg-white rounded-lg shadow-lg border border-gray-200">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Crear Reservación</h2>
        <form class="space-y-6" action="/server/app/controllers/reservation_controllers/post_reservation.php" method="POST">
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Código del Viaje</label>
                <select name="trip_id" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200">
                    <option value="">Seleccione un viaje</option>
                    <?php while($v = mysqli_fetch_assoc($viajes)): ?>
                        <option value="<?php echo $v['codigo']; ?>">
                            <?php echo $v['codigo'] . " - Tren: " . $v['tren'] . " | Origen: " . $v['ciudad_origen'] . " | Destino: " . $v['ciudad_destino'] . " | Fecha: " . $v['fecha'] . " " . $v['hora']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Nombre del Solicitante</label>
                    <input type="text" name="cliente_nombre" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Apellido del Solicitante</label>
                    <input type="text" name="cliente_apellido" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Nro de Pasaporte</label>
                    <input type="text" name="cliente_pasaporte" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Edad</label>
                    <input type="number" name="cliente_edad" min="0" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Sexo</label>
                    <select name="cliente_sexo" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200">
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
            </div>
            <div class="space-y-2">
                <label class="block text-sm font-medium text-gray-700">Número de puestos (máx 4)</label>
                <input type="number" name="cantidad_puestos" id="cantidad_puestos" min="1" max="4" value="1" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
            </div>
            <div id="pasajeros-section" class="space-y-4">
                
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-cyan-500 hover:bg-cyan-600 text-white font-medium rounded-md transition duration-200 shadow-sm hover:shadow-md">Guardar Reservación</button>
        </form>
    </div>
</div>
</main>
</body>
<script src="../../scripts/renderFields.js"></script>
</html>
