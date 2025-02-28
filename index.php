<?php


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$routes = [
    '/broadcast/' => 'src/controllers/home.php',
    '/broadcast/about/' => 'src/controllers/about.php',
    '/broadcast/profile/' => 'src/controllers/profile.php',
    '/broadcast/login/' => 'src/controllers/login.php',
    '/broadcast/logout/' => 'src/controllers/logout.php',
    '/broadcast/register/' => 'src/controllers/register.php',
];


if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    http_response_code(404);
    echo '404 - Page Not Found';
}

?>

