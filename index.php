<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$query = $_SERVER['QUERY_STRING']; // Get query parameters (e.g., user=rajdeep)

$routes = [
    '/broadcast/' => 'src/controllers/home.php',
    '/broadcast/about/' => 'src/controllers/about.php',
    '/broadcast/login/' => 'src/controllers/login.php',
    '/broadcast/logout/' => 'src/controllers/logout.php',
    '/broadcast/register/' => 'src/controllers/register.php',
];

// Check for static routes
if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
    exit;
}

// Allow profile route with query parameters (e.g., ?user=rajdeep)
if ($uri === '/broadcast/profile') {
    require 'src/controllers/profile.php';
    exit;
}

// If no match, return 404
http_response_code(404);
echo '404 - Page Not Found';

?>
