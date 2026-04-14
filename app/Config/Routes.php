<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('api', ['namespace' => 'App\Controllers\API'], function ($routes) {
    $routes->resource('movie');
    $routes->resource('category');
});

$routes->group('dashboard', function ($routes) {
    $routes->get('movie/tag/(:num)', 'Dashboard\Movie::tags/$1', ['as' => 'movie.tags']);
    $routes->post('movie/tag/(:num)', 'Dashboard\Movie::tags_post/$1', ['as' => 'movie.tags']);
    $routes->post('movie/(:num)/tag/(:num)/delete', 'Dashboard\Movie::tag_delete/$1/$2', ['as' => 'movie.tag.delete']);

    $routes->presenter('movie', ['controller' => 'Dashboard\Movie']);
    $routes->presenter('tag', ['controller' => 'Dashboard\Tag']);
    $routes->presenter('category', ['except' => ['show'], 'controller' => 'Dashboard\Category']);
//    $routes->get('user/create', 'Web\User::create_user');
});

$routes->get('login', 'Web\User::login', ['as' => 'user.login']);
$routes->post('login_user', 'Web\User::login_user', ['as' => 'user.login_user']);

$routes->get('signup', 'Web\User::register', ['as' => 'user.signup']);
$routes->post('signup_user', 'Web\User::register_user', ['as' => 'user.signup_user']);

$routes->get('logout', 'Web\User::logout', ['as' => 'user.logout']);