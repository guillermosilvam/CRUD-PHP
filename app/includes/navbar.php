<?php include "header.php" ?>
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
            <!-- <button class="mr-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button> -->
        </nav>
    </div>
    <main class="w-full h-[94%] pt-16">
        <!-- <aside class="h-full bg-gray-800 w-1/5 "></aside>
    
    </button> -->