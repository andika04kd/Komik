<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/pages/about', "Pages::about");
$routes->get('/pages/contact', "Pages::contact");
$routes->get('/pages/comics', "Pages::comics");
$routes->get('/pages/comics/(:any)', "Pages::detail/$1");

service('auth')->routes($routes);

$routes->group('', ['filter' => 'session'], function ($routes) {
    $routes->get('/comics', "Comics::index");
    $routes->get('/comics/create', "Comics::create");
    $routes->post('/comics/save', "Comics::save");
    $routes->get('/comics/edit/(:segment)', "Comics::edit/$1");
    $routes->post('/comics/update/(:num)', "Comics::update/$1");
    $routes->delete('/comics/(:num)', "Comics::delete/$1");
    $routes->get('/comics/(:any)', "Comics::detail/$1");
});

// $routes->get('/comics', "Comics::index");
// $routes->get('/comics/create', "Comics::create");
// $routes->post('/comics/save', "Comics::save");
// $routes->get('/comics/edit/(:segment)', "Comics::edit/$1");
// $routes->post('/comics/update/(:num)', "Comics::update/$1");
// $routes->delete('/comics/(:num)', "Comics::delete/$1");
// $routes->get('/comics/(:any)', "Comics::detail/$1");
