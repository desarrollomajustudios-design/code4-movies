<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('dashboard', function ($routes) {
    $routes->presenter('movie', ['controller' => 'Dashboard\Movie']);
    $routes->presenter('category', ['except' => ['show'], 'controller' => 'Dashboard\Category']);
});

