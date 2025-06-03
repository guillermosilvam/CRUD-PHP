<?php include "../../../app/config/database.php" ?>
<?php include "../../../app/includes/navbar.php" ?>
<div class="w-full h-full flex items-center justify-center">
    <div class="w-full max-w-4xl h-full bg-white p-8 rounded-lg shadow-lg">
        <div class="flex items-center justify-center gap-2 mb-6 w-full">
            <input type="search" name="busqueda" class="w-64 px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200" placeholder="Buscar">
            <button class="px-4 py-2 bg-cyan-500 hover:bg-cyan-600 text-white font-medium rounded-md transition duration-200 shadow-sm hover:shadow-md">Buscar</button>
            <a href="/server/static/templates/trip_views/create_trip.php" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white font-medium rounded-md transition duration-200 shadow-sm hover:shadow-md ml-2 flex items-center justify-center h-[40px]">Agregar</a>
        </div>
        <div class="overflow-x-auto rounded-lg shadow">
            <table class="min-w-full text-sm font-medium text-center text-gray-700 border border-gray-200">
                <thead class="bg-cyan-500 text-white">
                    <tr>
                        <th class="px-4 py-3 font-semibold border-r border-cyan-200 transition-colors duration-200">ID</th>
                        <th class="px-4 py-3 font-semibold border-r border-cyan-200 transition-colors duration-200">Nombre del tren</th>
                        <th class="px-4 py-3 font-semibold border-r border-cyan-200 transition-colors duration-200">Ciudad origen</th>
                        <th class="px-4 py-3 font-semibold border-r border-cyan-200 transition-colors duration-200">Ciudad destino</th>
                        <th class="px-4 py-3 font-semibold border-r border-cyan-200 transition-colors duration-200">Fecha</th>
                        <th class="px-4 py-3 font-semibold border-r border-cyan-200 transition-colors duration-200">Hora</th>
                        <th class="px-4 py-3 font-semibold text-center transition-colors duration-200">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php include "../../../app/controllers/trip_controllers/get_trip.php"?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</main>
</body>
</html>