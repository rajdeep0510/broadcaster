<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$query = $_SERVER['QUERY_STRING']; // Get query parameters 

$routes = [
    '/broadcast' => 'src/controllers/home.php',  
    '/broadcast/' => 'src/controllers/home.php',
    '/broadcast/about' => 'src/controllers/about.php',
    '/broadcast/about/' => 'src/controllers/about.php',
    '/broadcast/login/' => 'src/controllers/login.php',
    '/broadcast/logout/' => 'src/controllers/logout.php',
    '/broadcast/register/' => 'src/controllers/register.php',
    '/broadcast/profile/' => 'src/controllers/profile.php',
];

// Check for static routes
if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
    exit;
}

// Allow profile route with query parameters
if ($uri === '/broadcast/profile') {
    require 'src/controllers/profile.php';
    exit;
}

// If no match, return 404
http_response_code(404);
echo '404 - Page Not Found';

?>
