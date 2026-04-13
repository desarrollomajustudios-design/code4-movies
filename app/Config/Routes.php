<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('dashboard', function ($routes) {
    $routes->presenter('movie', ['controller' => 'Dashboard\Movie']);
    $routes->presenter('category', ['except' => ['show'], 'controller' => 'Dashboard\Category']);
//    $routes->get('user/create', 'Web\User::create_user');
});

$routes->get('login', 'Web\User::login', ['as' => 'user.login']);
$routes->post('login_user', 'Web\User::login_user', ['as' => 'user.login_user']);

$routes->get('signup', 'Web\User::register', ['as' => 'user.signup']);
$routes->post('signup_user', 'Web\User::register_user', ['as' => 'user.signup_user']);

$routes->get('logout', 'Web\User::logout', ['as' => 'user.logout']);