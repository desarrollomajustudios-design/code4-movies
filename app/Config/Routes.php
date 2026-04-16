<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('api', ['namespace' => 'App\Controllers\API'], function ($routes) {
    $routes->get('movie/paginate', 'Movie::list');
    $routes->get('movie/paginate_full', 'Movie::listFull');
    $routes->get('movie/index_for_category/(:num)', 'Movie::index_for_category/$1');
    $routes->get('movie/index_for_tag/(:num)', 'Movie::index_for_tag/$1');
    $routes->post('movie/tag/(:num)', 'Movie::tags_post/$1', ['as' => 'movie.tags']);
    $routes->post('movie/(:num)/tag/(:num)/delete', 'Movie::tag_delete/$1/$2', ['as' => 'movie.tag.delete']);

    $routes->resource('movie');
    $routes->resource('category');
});

$routes->group('dashboard', function ($routes) {
    $routes->get('movie/tag/(:num)', 'Dashboard\Movie::tags/$1', ['as' => 'movie.tags']);
    $routes->post('movie/tag/(:num)', 'Dashboard\Movie::tags_post/$1', ['as' => 'movie.tags']);
    $routes->post('movie/(:num)/tag/(:num)/delete', 'Dashboard\Movie::tag_delete/$1/$2', ['as' => 'movie.tag.delete']);
    $routes->post('movie/(:num)/delete', 'Dashboard\Movie::delete_image/$1', ['as' => 'movie.image.delete']);
    $routes->get('movie/download/(:num)', 'Dashboard\Movie::download_image/$1', ['as' => 'movie.image.download']);

    $routes->presenter('movie', ['controller' => 'Dashboard\Movie']);
    $routes->presenter('tag', ['controller' => 'Dashboard\Tag']);
    $routes->presenter('category', ['except' => ['show'], 'controller' => 'Dashboard\Category']);
//    $routes->get('user/create', 'Web\User::create_user');
});

$routes->group('blog', ['namespace' => 'App\Controllers\Blog'], function ($routes) {
//    $routes->presenter('', ['only' => ['index', 'show'], 'controller' => 'Movie']);
    $routes->get('tags/(:num)', 'Movie::index_for_tags/$1', ['as' => 'blog.movie.index_for_tags']);
    $routes->get('category/(:num)', 'Movie::index_for_categories/$1', ['as' => 'blog.movie.index_for_category']);
    $routes->get('', 'Movie::index', ['as' => 'blog.movie.index']);
    $routes->get('(:num)', 'Movie::show/$1', ['as' => 'blog.movie.show']);
    $routes->get('tags_by_category/(:num)', 'Movie::tagsByCategory/$1', ['as' => 'blog.movie.tagsByCategory']);
});

$routes->get('login', 'Web\User::login', ['as' => 'user.login']);
$routes->post('login_user', 'Web\User::login_user', ['as' => 'user.login_user']);

$routes->get('signup', 'Web\User::register', ['as' => 'user.signup']);
$routes->post('signup_user', 'Web\User::register_user', ['as' => 'user.signup_user']);

$routes->get('logout', 'Web\User::logout', ['as' => 'user.logout']);