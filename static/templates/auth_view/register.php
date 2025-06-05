<?php include "../../../app/includes/header.php" ?>
<div class="w-full max-w-md mx-auto my-20 p-8 bg-white rounded-lg shadow-lg border border-gray-200">
  <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
    Crear Cuenta
  </h2>
  <form class="space-y-4" action="/server/app/controllers/auth_controllers/register_auth.php" method="POST"">
    <div class="grid grid-cols-1 gap-4">
      <div class="space-y-2">
        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
        <input type="text" name="nombre" required
          class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200" />
      </div>
    </div>
    <div class="space-y-2">
      <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido</label>
      <input type="text" name="apellido" required
        class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200" />
    </div>
    <div class="space-y-2">
      <label for="pasaporte" class="block text-sm font-medium text-gray-700">Pasaporte</label>
      <input type="text" name="pasaporte" required
        class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200" />
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div class="space-y-2">
        <label for="edad" class="block text-sm font-medium text-gray-700">Edad</label>
        <input type="number" name="edad" min="0" required
          class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200" />
      </div>
      <div class="space-y-2">
        <label for="sexo" class="block text-sm font-medium text-gray-700">Sexo</label>
        <select name="sexo" required
          class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200">
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option>
        </select>
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div class="space-y-2">
        <label for="clave" class="block text-sm font-medium text-gray-700">Contraseña</label>
        <input type="password" name="clave" required
          class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200" />
      </div>
      <div class="space-y-2">
        <label for="confirmar_clave" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
        <input type="password" name="confirmar_clave" required
          class="w-full px-4 py-2 rounded-md bg-gray-100 border border-gray-300 text-gray-800 focus:outline-none focus:bg-white focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 transition duration-200" />
      </div>
    </div>
    <button type="submit"
      class="w-full py-2 px-4 bg-cyan-500 hover:bg-cyan-600 text-white font-medium rounded-md transition duration-200 shadow-sm hover:shadow-md">
      Registrarse
    </button>
    <p class="text-sm text-center text-gray-600">
      ¿Ya tienes cuenta?
      <a href="./login.php" class="text-cyan-500 hover:text-cyan-600 font-medium">Inicia Sesión</a>
    </p>
  </form>
</div>
</body>

</html>