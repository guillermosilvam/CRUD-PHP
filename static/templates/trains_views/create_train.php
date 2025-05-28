<?php include "../../../app/includes/navbar.php" ?>
        <div>
            <form action="" method="post">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre del tren</label>
                    <input type="text" name="name" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                </div>
                <div>
                    <label for="velocidad" class="block text-sm font-medium text-gray-700">Velocidad max</label>
                    <input type="number" name="velocidad" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                </div>
                <div>
                    <label for="cap_turista" class="block text-sm font-medium text-gray-700">Capacidad de la clase turista</label>
                    <input type="number" name="cap_turista" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                </div>
                <div>
                    <label for="cap_economica" class="block text-sm font-medium text-gray-700">Capacidad de la clase economica</label>
                    <input type="number" name="cap_economica" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                </div>
                <div>
                    <label for="cap_primera" class="block text-sm font-medium text-gray-700">Capacidad de la primera clase</label>
                    <input type="number" name="cap_primera" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                </div>
            </form>
        </div>
    </main>
</div>
</body>
</html>