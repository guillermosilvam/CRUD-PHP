<?php include "../../../app/includes/navbar.php" ?>
<?php include "../../../app/config/database.php" ?>
<?php include "../../../app/controllers/trip_controllers/put_trip.php"; ?>
<?php 
$trenes = mysqli_query($conn, "SELECT codigo, nombre FROM trenes");
$ciudades = mysqli_query($conn, "SELECT codigo, nombre FROM ciudades");
?>
<div class="w-full h-full flex items-center justify-center">
    <div class="w-full max-w-md mx-auto p-8 bg-white rounded-lg shadow-lg border border-gray-200">
        <form class="space-y-6" action="/server/app/controllers/trip_controllers/put_trip.php?id=<?php echo $_GET['id']; ?>" method="POST">
            <div class="space-y-2">
                <label for="tren_id" class="block text-sm font-medium text-gray-700">Seleccionar tren</label>
                <select name="tren_id" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200">
                    <option value="">Seleccione un tren</option>
                    <?php while($tren = mysqli_fetch_assoc($trenes)): ?>
                        <option value="<?php echo $tren['codigo']; ?>" <?php if(isset($tren_id) && $tren_id == $tren['codigo']) echo 'selected'; ?>>
                            <?php echo $tren['codigo'] . " - " . $tren['nombre']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="space-y-2">
                <label for="origen" class="block text-sm font-medium text-gray-700">Seleccionar ciudad origen</label>
                <select name="origen" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200">
                    <option value="">Seleccione ciudad origen</option>
                    <?php mysqli_data_seek($ciudades, 0); while($ciudad = mysqli_fetch_assoc($ciudades)): ?>
                        <option value="<?php echo $ciudad['codigo']; ?>" <?php if(isset($origen) && $origen == $ciudad['codigo']) echo 'selected'; ?>>
                            <?php echo $ciudad['codigo'] . " - " . $ciudad['nombre']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="space-y-2">
                <label for="destino" class="block text-sm font-medium text-gray-700">Seleccionar Ciudad destino</label>
                <select name="destino" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200">
                    <option value="">Seleccione ciudad destino</option>
                    <?php mysqli_data_seek($ciudades, 0); while($ciudad = mysqli_fetch_assoc($ciudades)): ?>
                        <option value="<?php echo $ciudad['codigo']; ?>" <?php if(isset($destino) && $destino == $ciudad['codigo']) echo 'selected'; ?>>
                            <?php echo $ciudad['codigo'] . " - " . $ciudad['nombre']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="space-y-2">
                <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                <input type="date" name="fecha" value="<?php echo isset($fecha) ? $fecha : ''; ?>" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
            </div>
            <div class="space-y-2">
                <label for="hora" class="block text-sm font-medium text-gray-700">Hora</label>
                <input type="time" name="hora" value="<?php echo isset($hora) ? $hora : ''; ?>" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
            </div>
            <button type="submit" class=" w-full py-2 px-4 bg-cyan-500 hover:bg-cyan-600 text-white font-medium rounded-md transition duration-200 shadow-sm hover:shadow-md">
                Guardar cambios
            </button>
        </form>
    </div>
</div>
</main>
</body>
</html>