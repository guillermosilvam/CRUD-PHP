<?php include "../../../app/includes/navbar.php" ?>
        <div class="w-full h-full flex items-center justify-center">
            <div class="w-full max-w-md mx-auto p-8 bg-white rounded-lg shadow-lg border border-gray-200">
                <form class="space-y-6" action="/server/app/controllers/train_controllers/save_train.php" method="POST">
                    <div class="space-y-2"> 
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre del tren</label>
                        <input type="text" name="name" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                    </div>
                    <div class="space-y-2">
                        <label for="velocidad" class="block text-sm font-medium text-gray-700">Velocidad max</label>
                        <input type="number" name="velocidad" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                    </div>
                    <div class="space-y-2">
                        <label for="cap_turista" class="block text-sm font-medium text-gray-700">Capacidad de la clase turista</label>
                        <input type="number" name="cap_turista" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                    </div>
                    <div class="space-y-2">
                        <label for="cap_economica" class="block text-sm font-medium text-gray-700">Capacidad de la clase economica</label>
                        <input type="number" name="cap_economica" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                    </div>
                    <div class="space-y-2">
                        <label for="cap_primera" class="block text-sm font-medium text-gray-700">Capacidad de la primera clase</label>
                        <input type="number" name="cap_primera" required class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200"/>
                    </div>
                    <button type="submit" class=" w-full py-2 px-4 bg-cyan-500 hover:bg-cyan-600 text-white font-medium rounded-md transition duration-200 shadow-sm hover:shadow-md">
                        Guardar
                    </button>
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>