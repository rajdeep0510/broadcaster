<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$query = $_SERVER['QUERY_STRING']; // Get query parameters 

$routes = [
    '/broadcaster' => 'src/controllers/home.php',  
    '/broadcaster/' => 'src/controllers/home.php',
    '/broadcaster/about' => 'src/controllers/about.php',
    '/broadcaster/about/' => 'src/controllers/about.php',
    '/broadcaster/login/' => 'src/controllers/login.php',
    '/broadcaster/login' => 'src/controllers/login.php',
    '/broadcaster/logout/' => 'src/controllers/logout.php',
    '/broadcaster/logout' => 'src/controllers/logout.php',
    '/broadcaster/register/' => 'src/controllers/register.php',
    '/broadcaster/register' => 'src/controllers/register.php',
    '/broadcaster/like' => 'src/controllers/like.php',
    '/broadcaster/like/' => 'src/controllers/like.php',
    '/broadcaster/comments' => 'src/controllers/comments.php',
    '/broadcaster/comments/' => 'src/controllers/comments.php'
];

// Check for static routes
if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
    exit;
}

// Handle profile route with query parameters
if (strpos($uri, '/broadcaster/profile') === 0) {
    require 'src/controllers/profile.php';
    exit;
}

// Handle individual message route
if (strpos($uri, '/broadcaster/message') === 0) {
    require 'src/controllers/comments.php';  // We'll use comments.php to handle message display
    exit;
}


// If no match, return 404
http_response_code(404);
echo '404 - Page Not Found';

?>
