<?php 
    include_once __DIR__ . '/../config/config.ini.php';
    session_start();
    $is_logged_in = $_SESSION['is_logged_in'];
    $username = $_SESSION['username'];

?>          



<header class="bg-white shadow-md p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-3xl font-bold text-blue-600">Broadcaster</div>
        
        <!-- Mobile menu button -->
        <button id="mobile-menu-button" class="md:hidden text-gray-600 hover:text-gray-900">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Navigation menu -->
        <nav id="nav-menu" class="hidden md:flex md:items-center md:space-x-4 absolute md:relative top-16 md:top-0 right-4 md:right-0 bg-white md:bg-transparent p-4 md:p-0 rounded-lg shadow-lg md:shadow-none w-48 md:w-auto">
            <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4">
                <a href="/broadcast/" class="text-blue-500 hover:text-blue-700 pt-3">Home</a>
                <a href="/broadcast/about/" class="text-blue-500 hover:text-blue-700 pt-3">About Us</a>
                <?php if ($_SESSION['is_logged_in'] == 0) { ?>
                    <a href="/broadcast/login/" class="text-blue-500 hover:text-blue-700 pt-3">Login</a>
                    <a href="/broadcast/register/" class="text-blue-500 hover:text-blue-700 pt-3">Register</a>
                <?php } else { ?>
                    <a href="/broadcast/logout/" class="text-blue-500 hover:text-blue-700 pt-3">Logout</a>
                    <a href="/broadcast/profile/" class="bg-blue-600 hover:bg-blue-700 transition-colors">
                        <div class="flex items-center space-x-2 p-3 rounded-full shadow-sm">
                            <span class="text-white font-medium">@<?php echo htmlspecialchars($_SESSION['username']); ?></span>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </nav>
    </div>
</header>

<script>
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const navMenu = document.getElementById('nav-menu');

    mobileMenuButton.addEventListener('click', () => {
        navMenu.classList.toggle('hidden');
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!navMenu.contains(e.target) && !mobileMenuButton.contains(e.target)) {
            navMenu.classList.add('hidden');
        }
    });
</script>
    