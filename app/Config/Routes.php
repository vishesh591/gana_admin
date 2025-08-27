<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/login', 'Auth::index');
$routes->post('/loginCheck', 'Auth::loginCheck');
$routes->get('auth-logout', 'Auth::logout');
$routes->post('profile/changePassword', 'Auth::changePasswordAjax');
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
    $routes->get('dashboard', 'SuperAdmin::dashboard');
    // $routes->get('accounts', 'SuperAdmin::accounts');
    $routes->get('claiming-data', 'SuperAdmin::claiming_data');
    $routes->get('relocation-data', 'SuperAdmin::relocation_data');
    $routes->get('merge-data', 'SuperAdmin::merge_data');
    $routes->get('ownership-data', 'SuperAdmin::ownership_data');
    // $routes->get('releases', 'SuperAdmin::releases');
    // $routes->get('artists', 'SuperAdmin::artists');
    // $routes->get('labels', 'SuperAdmin::labels');
    $routes->get('sales-report', 'SuperAdmin::sales_report');
    $routes->get('claiming-request', 'SuperAdmin::claiming_request');
    $routes->get('relocation-request', 'SuperAdmin::relocation_request');
    $routes->get('merge-request', 'SuperAdmin::merge_request');
    $routes->get('youtube', 'SuperAdmin::youtube');
    $routes->get('facebook', 'SuperAdmin::facebook');

    $routes->get('add-release', 'Backend\Release\ReleaseController::addRelease');
    // $routes->get('support', 'SuperAdmin::support');//will comment later
    $routes->get('support_user', 'SuperAdmin::support_user');
    $routes->post('create-artist', 'Backend\Artist\ArtistController::store');
    $routes->post('create-label', 'Backend\Label\LabelController::store');
    $routes->get('artists', 'Backend\Artist\ArtistController::index');
    $routes->get('api/artists', 'Backend\Artist\ArtistController::getArtistsJson');
    $routes->get('labels', 'Backend\Label\LabelController::index');
    $routes->post('register', 'RegisterController::register');
    $routes->get('accounts', 'RegisterController::accounts');
    $routes->get('auth-logout', 'Auth::logout');
    $routes->get('releases', 'Backend\Release\ReleaseController::index');
    $routes->get('releases/create', 'Backend\Release\ReleaseController::create');
    $routes->post('releases/store', 'Backend\Release\ReleaseController::store');
    $routes->get('releases/edit/(:num)', 'Backend\Release\ReleaseController::edit/$1');
    $routes->post('releases/update/(:num)', 'Backend\Release\ReleaseController::update/$1');
    $routes->get('api/labels', 'Backend\Label\LabelController::getLabelsJson');
    $routes->get('api/accounts', 'RegisterController::getAccountsJson');
    $routes->get('pages-profile', 'RegisterController::index');
    $routes->get('view_release', 'SuperAdmin::view_release');
    $routes->get('support', 'Backend\Support\SupportController::index');
    $routes->post('support/store', 'Backend\Support\SupportController::store');
    $routes->get('support/data', 'Backend\Support\SupportController::data');
    $routes->post('support/update-status/(:num)', 'Backend\Support\SupportController::updateStatus/$1');
});

// Routes only for artists
$routes->group('artist', ['filter' => 'role:artist'], function ($routes) {
    $routes->get('/', 'Artist::dashboard');
    $routes->get('songs', 'Artist::manageSongs');
});
