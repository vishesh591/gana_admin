<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/login', 'Auth::index', ['filter' => 'noauth']);
$routes->post('/loginCheck', 'Auth::loginCheck');

// Filter on route group
$routes->group('', ['filter' => 'auth'], function ($routes) {
    /**
     * Auth Routes
     */
    $routes->get('/logout', 'Auth::logout');

    $routes->get('/', 'Home::index');
});

// Routes only for super admins
$routes->group('superadmin', ['filter' => 'role:superadmin'], function ($routes) {
    $routes->get('/', 'SuperAdmin::dashboard');
    $routes->get('accounts', 'SuperAdmin::accounts');
});

// Routes only for artists
$routes->group('artist', ['filter' => 'role:artist'], function ($routes) {
    $routes->get('/', 'Artist::dashboard');
    $routes->get('songs', 'Artist::manageSongs');
});
