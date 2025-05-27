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
</div>
</body>

</html>