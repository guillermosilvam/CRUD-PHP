<?php include "header.php" ?>
<?php session_start(); ?>
<div class="w-screen h-screen ">
    <div class="bg-gray-800 w-full h-[6%] flex items-center fixed top-0 left-0 z-50">
        <nav class="flex items-center justify-between w-full">
            <h1 class="text-2xl font-bold text-white ml-10">
                <a href="/server/static/templates/dashboard/dashboard.php">
                    <span class="text-cyan-500">PHP</span>
                    <span class="text-white">CRUD</span>
                </a>
            </h1>
            <ul class="text-xl font-light text-white flex gap-6 mr-10">
                <li class=""><a
                        class="relative after:content-[''] after:block after:w-0 after:h-[2px] after:bg-cyan-500 after:transition-all after:duration-300 hover:after:w-full"
                        href="/server/static/templates/reservation_views/read_reservation.php">Reservacion</a></li>
                <li class=""><a
                        class="relative after:content-[''] after:block after:w-0 after:h-[2px] after:bg-cyan-500 after:transition-all after:duration-300 hover:after:w-full"
                        href="/server/static/templates/train_views/read_train.php">Trenes</a></li>
                <li class=""><a
                        class="relative after:content-[''] after:block after:w-0 after:h-[2px] after:bg-cyan-500 after:transition-all after:duration-300 hover:after:w-full"
                        href="/server/static/templates/city_views/read_city.php">Ciudades</a></li>
                <li class=""><a
                        class="relative after:content-[''] after:block after:w-0 after:h-[2px] after:bg-cyan-500 after:transition-all after:duration-300 hover:after:w-full"
                        href="/server/static/templates/trip_views/read_trip.php">Viajes</a></li>
                <?php if (isset($_SESSION['user_tipo']) && $_SESSION['user_tipo'] === 'Supervisor'): ?>
                <li class="relative" id="reportes-menu-container">
                    <a id="reportes-btn" class="relative after:content-[''] after:block after:w-0 after:h-[2px] after:bg-cyan-500 after:transition-all after:duration-300 hover:after:w-full cursor-pointer select-none">Reportes</a>
                    <ul id="reportes-submenu" class="absolute left-0 mt-2 w-56 bg-white text-gray-800 rounded shadow-lg opacity-0 invisible transition-opacity duration-200 z-50">
                        <li><a href="/server/static/templates/report_views/report_reservas.php" class="block px-4 py-2 hover:bg-cyan-100">Reservas</a></li>
                        <li><a href="/server/static/templates/report_views/report_temporada.php" class="block px-4 py-2 hover:bg-cyan-100">Desplazamientos por Temporada</a></li>
                        <li><a href="/server/static/templates/report_views/report_cancelaciones.php" class="block px-4 py-2 hover:bg-cyan-100">Cancelaciones</a></li>
                        <li><a href="/server/static/templates/report_views/report_destinos.php" class="block px-4 py-2 hover:bg-cyan-100">Destinos</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                <li class="">
                    <form action="/server/app/controllers/auth_controllers/logout.php" method="POST"
                        style="display:inline;">
                        <button type="submit"
                            class="relative after:content-[''] after:block after:w-0 after:h-[2px] after:bg-cyan-500 after:transition-all after:duration-300 hover:after:w-full text-white bg-transparent border-none cursor-pointer p-0 m-0">
                            Logout
                        </button>
                    </form>
                </li>

            </ul>
        </nav>
    </div>
    <main class="w-full h-[94%] pt-16">
        <!-- Contenido de la pagina -->
    <script src="/server/static/scripts/navbarMenu.js"></script>