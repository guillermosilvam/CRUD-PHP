<?php include "app/config/database.php"; ?>
<?php include "app/includes/header.php"; ?>

<div class="w-1/2 max-w-xs mx-auto my-20 p-8 bg-white rounded-lg shadow-lg border border-gray-200 text-center">
    <h1 class="text-2xl font-bold mb-6">
        <span class="text-cyan-500">PHP</span>
        <span class="text-gray-800">CRUD</span>
    </h1>
    <div class="space-y-4">
        <a href="./static/templates/auth_view/login.php"
            class="block w-full py-2 px-4 bg-cyan-500 hover:bg-cyan-600 text-white font-medium rounded-md transition duration-200 shadow-sm hover:shadow-md text-center">
            Iniciar sesión
        </a>
        <a href="./static/templates/auth_view/register.php"
            class="block w-full py-2 px-4 bg-white hover:bg-gray-50 text-cyan-500 font-medium rounded-md transition duration-200 border border-cyan-500 shadow-sm hover:shadow-md text-center">
            Registrarse
        </a>
    </div>
    <div class="flex items-center justify-center mt-6">
        <label for="switchMode" class="flex items-center cursor-pointer">
            <div class="relative">
                <input type="checkbox" id="switchMode" class="sr-only">
                <div class="block bg-gray-300 w-14 h-8 rounded-full"></div>
                <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
            </div>
            <span class="ml-3 text-gray-700">Modo Oscuro</span>
        </label>
    </div>
</div>
</body>

</html>