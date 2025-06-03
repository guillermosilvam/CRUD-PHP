<?php include "../../../app/includes/header.php" ?>

<div class="w-full max-w-md mx-auto my-20 p-8 bg-white rounded-lg shadow-lg border border-gray-200">
  <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
    Inicio de Sesión
  </h2>
  <form class="space-y-6" action="/server/app/controllers/auth_controllers/process_login.php" method="POST">
    <div class="space-y-2">
      <label for="pasaporte" class="block text-sm font-medium text-gray-700">Pasaporte</label>
      <input type="text" name="pasaporte" required
        class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200" />
    </div>

    <div class="space-y-2">
      <label for="clave" class="block text-sm font-medium text-gray-700">Contraseña</label>
      <input type="password" name="clave" required
        class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200" />
    </div>

    <button type="submit"
      class="w-full py-2 px-4 bg-cyan-500 hover:bg-cyan-600 text-white font-medium rounded-md transition duration-200 shadow-sm hover:shadow-md">
      Iniciar Sesión
    </button>
    <p class="text-sm text-center text-gray-600">
      ¿No tienes cuenta?
      <a href="./register.php" class="text-cyan-500 hover:text-cyan-600 font-medium">Registrate aqui</a>
    </p>
  </form>
</div>
</body>

</html>