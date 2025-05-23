<?php include "../../../app/includes/header.php" ?>

<div class="w-full max-w-md mx-auto my-20 p-8 bg-white rounded-lg shadow-lg border border-gray-200">
  <form class="space-y-6" action="/server/app/controllers/process_login.php" method="POST">
    <div class="space-y-2">
      <label for="user" class="block text-sm font-medium text-gray-700">Usuario</label>
      <input type="text" id="user" name="user" required
        class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200" />
    </div>

    <div class="space-y-2">
      <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
      <input type="password" name="password" id="password" required
        class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200" />
    </div>

    <button type="submit"
      class="w-full py-2 px-4 bg-cyan-500 hover:bg-cyan-600 text-white font-medium rounded-md transition duration-200 shadow-sm hover:shadow-md">
      Iniciar Sesión
    </button>
  </form>
</div>
</body>

</html>