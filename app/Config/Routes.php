<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public routes
// $routes->get('/login', 'Auth::index');
// $routes->post('/loginCheck', 'Auth::loginCheck');
// $routes->get('auth-logout', 'Auth::logout');
// $routes->post('profile/changePassword', 'Auth::changePasswordAjax');

// // Common authenticated routes (ALL roles can access)
// $routes->group('', ['filter' => 'auth'], function ($routes) {
//     $routes->get('/logout', 'Auth::logout');
//     $routes->get('/', 'Home::index');
    
//     $routes->get('dashboard', 'Backend\Release\ReleaseDraftsController::dashboard');
//     $routes->post('register', 'RegisterController::register');

//     $routes->get('pages-profile', 'RegisterController::index');
    
//     $routes->get('releases', 'Backend\Release\ReleaseController::index');
//     $routes->get('add-release', 'Backend\Release\ReleaseController::addRelease');
//     $routes->get('releases/view/(:num)', 'Backend\Release\ReleaseController::view_release/$1');
//     $routes->get('releases/create', 'Backend\Release\ReleaseController::create');
//     $routes->post('releases/store', 'Backend\Release\ReleaseController::store');
//     $routes->get('releases/edit/(:num)', 'Backend\Release\ReleaseController::edit/$1');
//     $routes->post('releases/update/(:num)', 'Backend\Release\ReleaseController::update/$1');
//     $routes->get('releases/(:num)/rejection-messages', 'Backend\Release\ReleaseController::getRejectionMessages/$1');
//     $routes->get('releases/export-csv', 'Backend\Release\ReleaseController::exportCsv');

//     $routes->post('releases/drafts/save', 'Backend\Release\ReleaseDraftsController::saveDraft');
//     $routes->get('releases/drafts', 'Backend\Release\ReleaseDraftsController::getDrafts');
//     $routes->get('releases/drafts/load/(:num)', 'Backend\Release\ReleaseDraftsController::loadDraft/$1');
//     $routes->delete('releases/drafts/(:num)', 'Backend\Release\ReleaseDraftsController::deleteDraft/$1');
    
//     $routes->get('artists', 'Backend\Artist\ArtistController::index');
//     $routes->get('api/artists', 'Backend\Artist\ArtistController::getArtistsJson');
//     $routes->get('labels', 'Backend\Label\LabelController::index');
//     $routes->get('api/labels', 'Backend\Label\LabelController::getLabelsJson');
//     $routes->post('create-artist', 'Backend\Artist\ArtistController::store');
//     $routes->post('create-label', 'Backend\Label\LabelController::store');
//     $routes->post('artist/search-spotify', 'Backend\Artist\ArtistController::searchSpotifyArtists');
//     $routes->post('artist/search-apple-music', 'Backend\Artist\ArtistController::searchAppleMusicArtists');
//     $routes->get('support_user', 'SuperAdmin::support_user');
//     $routes->post('support/store', 'Backend\Support\SupportController::store');

//     $routes->get('accounts', 'RegisterController::accounts');
//     $routes->get('api/accounts', 'RegisterController::getAccountsJson');
//     $routes->post('register', 'RegisterController::register');
//     $routes->get('users/details/(:num)', 'RegisterController::getUserDetails/$1');
//     $routes->get('users/edit/(:num)', 'RegisterController::editUser/$1');
//     $routes->post('users/update-profile', 'RegisterController::updateUserProfile');
//     $routes->post('users/reset-password', 'RegisterController::resetUserPassword');

//     $routes->get('claiming-request', 'Backend\ClaimingRequest\ClaimingRequestController::index');
//     $routes->post('claiming-requests', 'Backend\ClaimingRequest\ClaimingRequestController::store');
//     $routes->get('api/claiming-req', 'Backend\ClaimingRequest\ClaimingRequestController::getClaimingRequestJson');

//     $routes->get('relocation-request', 'Backend\RelocationRequest\RelocationRequestController::index');
//     $routes->get('relocation-request/list', 'Backend\RelocationRequest\RelocationRequestController::list');
//     $routes->post('relocation-request/store', 'Backend\RelocationRequest\RelocationRequestController::store');
//     $routes->post('relocation-request/update-status/(:num)', 'Backend\RelocationRequest\RelocationRequestController::updateStatus/$1');
//     $routes->get('relocation-requests/data', 'Backend\RelocationRequest\RelocationRequestController::getRelocationRequestJson');

//     $routes->get('merge-request', 'Backend\ClaimReelMerge\ClaimReelMergeController::index');
//     $routes->get('claim-reel-merge/list', 'Backend\ClaimReelMerge\ClaimReelMergeController::list');
//     $routes->post('claim-reel-merge/store', 'Backend\ClaimReelMerge\ClaimReelMergeController::store');

//     $routes->group('facebook', function ($routes) {
//         $routes->post('import', 'Backend\FacebookConflict\FacebookConflictController::import');
//         $routes->get('list-json', 'Backend\FacebookConflict\FacebookConflictController::listConflictsJson');
//         $routes->get('/', 'Backend\FacebookConflict\FacebookConflictController::index');
//         $routes->post('update-resolution', 'Backend\FacebookConflict\FacebookConflictController::updateResolution');
//     });
//     $routes->get('facebook-ownership/list', 'Backend\FacebookConflict\FacebookConflictController::listOwnershipConflictsJson');

//     $routes->get('facebook/get-all-countries', 'Backend\FacebookConflict\FacebookConflictController::getAllCountries');
//     $routes->post('youtube-conflicts/import', 'Backend\YoutubeConflict\YoutubeConflictController::import');
//     $routes->get('youtube', 'Backend\YoutubeConflict\YoutubeConflictController::index');
//     $routes->get('youtube-conflicts/json', 'Backend\YoutubeConflict\YoutubeConflictController::listConflictsJson');
//     $routes->post('youtube-conflicts/update/(:num)', 'Backend\YoutubeConflict\YoutubeConflictController::update/$1');
// });

// $routes->group('', ['filter' => 'role:superadmin,subadmin'], function ($routes) {
//     $routes->get('claiming-data', 'Backend\ClaimingRequest\ClaimingRequestController::claimData');
//     $routes->get('api/claiming-data', 'Backend\ClaimingRequest\ClaimingRequestController::getClaimingDataJson');
//     $routes->post('api/claiming-data/(:num)/status', 'Backend\ClaimingRequest\ClaimingRequestController::updateStatus/$1');
//     $routes->post('/labels/update-status', 'Backend\Label\LabelController::updateStatus');

//     $routes->get('relocation-data', 'Backend\RelocationRequest\RelocationRequestController::relocationData');
//     $routes->get('api/relocation-data', 'Backend\RelocationRequest\RelocationRequestController::getRelocationDataJson');
//     $routes->get('api/relocation-data/(:num)', 'Backend\RelocationRequest\RelocationRequestController::getRelocationDataDetail/$1');
//     $routes->post('api/relocation-data/(:num)/status', 'Backend\RelocationRequest\RelocationRequestController::updateRelocationStatus/$1');
//     $routes->get('relocation-requests/data', 'Backend\RelocationRequest\RelocationRequestController::getRelocationRequestJson');
    
//     $routes->get('merge-data', 'Backend\ClaimReelMerge\ClaimReelMergeController::mergeData');
//     $routes->get('merge-data/list', 'Backend\ClaimReelMerge\ClaimReelMergeController::getMergeDataJson');
//     $routes->get('merge-data/detail/(:num)', 'Backend\ClaimReelMerge\ClaimReelMergeController::getMergeDataDetail/$1');
//     $routes->post('merge-data/update-status/(:num)', 'Backend\ClaimReelMerge\ClaimReelMergeController::updateMergeStatus/$1');
    
//     $routes->get('support/data', 'Backend\Support\SupportController::data');
//     $routes->post('support/update-status/(:num)', 'Backend\Support\SupportController::updateStatus/$1');
    
//     $routes->get('claiming-request', 'Backend\ClaimingRequest\ClaimingRequestController::index');
//     $routes->post('claiming-requests', 'Backend\ClaimingRequest\ClaimingRequestController::store');
//     $routes->get('api/claiming-req', 'Backend\ClaimingRequest\ClaimingRequestController::getClaimingRequestJson');
    
//     $routes->get('relocation-request', 'Backend\RelocationRequest\RelocationRequestController::index');
//     $routes->get('relocation-request/list', 'Backend\RelocationRequest\RelocationRequestController::list');
//     $routes->post('relocation-request/store', 'Backend\RelocationRequest\RelocationRequestController::store');
//     $routes->post('relocation-request/update-status/(:num)', 'Backend\RelocationRequest\RelocationRequestController::updateStatus/$1');
    
//     $routes->get('merge-request', 'Backend\ClaimReelMerge\ClaimReelMergeController::index');
//     $routes->get('claim-reel-merge/list', 'Backend\ClaimReelMerge\ClaimReelMergeController::list');
//     $routes->post('claim-reel-merge/store', 'Backend\ClaimReelMerge\ClaimReelMergeController::store');
    
//     $routes->group('facebook', function ($routes) {
//         $routes->post('import', 'Backend\FacebookConflict\FacebookConflictController::import');
//         $routes->get('list-json', 'Backend\FacebookConflict\FacebookConflictController::listConflictsJson');
//         $routes->get('/', 'Backend\FacebookConflict\FacebookConflictController::index');
//         $routes->post('update-resolution', 'Backend\FacebookConflict\FacebookConflictController::updateResolution');
//     });
//     $routes->get('facebook/get-all-countries', 'Backend\FacebookConflict\FacebookConflictController::getAllCountries');
//     $routes->get('facebook-ownership-data', 'Backend\FacebookConflict\FacebookConflictController::ownershipIndex');
//     $routes->get('facebook-ownership/list', 'Backend\FacebookConflict\FacebookConflictController::listOwnershipConflictsJson');
//     $routes->post('facebook-ownership/update/(:num)', 'Backend\FacebookConflict\FacebookConflictController::updateOwnership/$1');
    
//     $routes->post('youtube-conflicts/import', 'Backend\YoutubeConflict\YoutubeConflictController::import');
//     $routes->get('youtube', 'Backend\YoutubeConflict\YoutubeConflictController::index');
//     $routes->get('youtube-conflicts/json', 'Backend\YoutubeConflict\YoutubeConflictController::listConflictsJson');
//     $routes->post('youtube-conflicts/update/(:num)', 'Backend\YoutubeConflict\YoutubeConflictController::update/$1');
//     $routes->get('youtube-ownership-data', 'Backend\YoutubeConflict\YoutubeConflictController::youtubeOwnershipIndex');
//     $routes->get('youtube-ownership/list', 'Backend\YoutubeConflict\YoutubeConflictController::listYouTubeOwnershipConflictsJson');
//     $routes->post('youtube-ownership/update/(:num)', 'Backend\YoutubeConflict\YoutubeConflictController::updateYouTubeConflictStatus/$1');
// });

// // Superadmin EXCLUSIVE routes
// $routes->group('', ['filter' => 'role:superadmin'], function ($routes) {
//     $routes->get('accounts', 'RegisterController::accounts');
//     $routes->get('api/accounts', 'RegisterController::getAccountsJson');
//     $routes->post('register', 'RegisterController::register');
//     $routes->get('users/details/(:num)', 'RegisterController::getUserDetails/$1');
//     $routes->get('users/edit/(:num)', 'RegisterController::editUser/$1');
//     $routes->post('users/update-profile', 'RegisterController::updateUserProfile');
//     $routes->post('users/reset-password', 'RegisterController::resetUserPassword');
    
//     $routes->post('create-artist', 'Backend\Artist\ArtistController::store');
//     $routes->post('create-label', 'Backend\Label\LabelController::store');
//     $routes->post('artist/search-spotify', 'Backend\Artist\ArtistController::searchSpotifyArtists');
//     $routes->post('artist/search-apple-music', 'Backend\Artist\ArtistController::searchAppleMusicArtists');
    
//     $routes->get('sales-report', 'SuperAdmin::sales_report');
//     $routes->get('add-release', 'Backend\Release\ReleaseController::addRelease');
//     $routes->post('releases/takedown/(:num)', 'Backend\Release\ReleaseController::takedown_release/$1');
//     $routes->get('releases/export-csv', 'Backend\Release\ReleaseController::exportCsv');
// });

// $routes->group('superadmin', ['filter' => 'role:superadmin'], function ($routes) {
//     $routes->get('sales-report', 'SuperAdmin::sales_report');
//     $routes->get('add-release', 'Backend\Release\ReleaseController::addRelease');
//     $routes->post('create-artist', 'Backend\Artist\ArtistController::store');
//     $routes->post('create-label', 'Backend\Label\LabelController::store');
//     $routes->get('artists', 'Backend\Artist\ArtistController::index');
//     $routes->get('api/artists', 'Backend\Artist\ArtistController::getArtistsJson');
//     $routes->post('artist/search-spotify', 'Backend\Artist\ArtistController::searchSpotifyArtists');
//     $routes->post('artist/search-apple-music', 'Backend\Artist\ArtistController::searchAppleMusicArtists');
//     $routes->get('labels', 'Backend\Label\LabelController::index');
//     $routes->post('register', 'RegisterController::register');
//     $routes->get('accounts', 'RegisterController::accounts');
//     $routes->get('releases', 'Backend\Release\ReleaseController::index');
//     $routes->get('releases/view/(:num)', 'Backend\Release\ReleaseController::view_release/$1');
//     $routes->get('releases/create', 'Backend\Release\ReleaseController::create');
//     $routes->post('releases/store', 'Backend\Release\ReleaseController::store');
//     $routes->get('releases/edit/(:num)', 'Backend\Release\ReleaseController::edit/$1');
//     $routes->post('releases/update/(:num)', 'Backend\Release\ReleaseController::update/$1');
//     $routes->post('releases/takedown/(:num)', 'Backend\Release\ReleaseController::takedown_release/$1');
//     $routes->get('api/labels', 'Backend\Label\LabelController::getLabelsJson');
//     $routes->post('releases/drafts/save', 'Backend\Release\ReleaseDraftsController::saveDraft');
//     $routes->get('releases/drafts', 'Backend\Release\ReleaseDraftsController::getDrafts');
//     $routes->get('releases/drafts/load/(:num)', 'Backend\Release\ReleaseDraftsController::loadDraft/$1');
//     $routes->delete('releases/drafts/(:num)', 'Backend\Release\ReleaseDraftsController::deleteDraft/$1');
//     $routes->get('releases/(:num)/rejection-messages', 'Backend\Release\ReleaseController::getRejectionMessages/$1');
//     $routes->get('api/accounts', 'RegisterController::getAccountsJson');
//     $routes->get('pages-profile', 'RegisterController::index');
//     $routes->get('support', 'Backend\Support\SupportController::index');
//     $routes->get('support/data', 'Backend\Support\SupportController::data');
//     $routes->post('support/update-status/(:num)', 'Backend\Support\SupportController::updateStatus/$1');
//     $routes->get('releases/export-csv', 'Backend\Release\ReleaseController::exportCsv');
//     $routes->get('claiming-request', 'Backend\ClaimingRequest\ClaimingRequestController::index');
//     $routes->post('claiming-requests', 'Backend\ClaimingRequest\ClaimingRequestController::store');
//     $routes->get('claiming-data', 'Backend\ClaimingRequest\ClaimingRequestController::claimData'); // HERE IT IS!
//     $routes->get('api/claiming-req', 'Backend\ClaimingRequest\ClaimingRequestController::getClaimingRequestJson');
//     $routes->get('api/claiming-data', 'Backend\ClaimingRequest\ClaimingRequestController::getClaimingDataJson');
//     $routes->post('api/claiming-data/(:num)/status', 'Backend\ClaimingRequest\ClaimingRequestController::updateStatus/$1');
//     $routes->get('relocation-request', 'Backend\RelocationRequest\RelocationRequestController::index');
//     $routes->get('relocation-request/list', 'Backend\RelocationRequest\RelocationRequestController::list');
//     $routes->post('relocation-request/store', 'Backend\RelocationRequest\RelocationRequestController::store');
//     $routes->post('relocation-request/update-status/(:num)', 'Backend\RelocationRequest\RelocationRequestController::updateStatus/$1');
//     $routes->get('relocation-requests/data', 'Backend\RelocationRequest\RelocationRequestController::getRelocationRequestJson');
//     $routes->get('relocation-data', 'Backend\RelocationRequest\RelocationRequestController::relocationData');
//     $routes->get('api/relocation-data', 'Backend\RelocationRequest\RelocationRequestController::getRelocationDataJson');
//     $routes->get('api/relocation-data/(:num)', 'Backend\RelocationRequest\RelocationRequestController::getRelocationDataDetail/$1');
//     $routes->post('api/relocation-data/(:num)/status', 'Backend\RelocationRequest\RelocationRequestController::updateRelocationStatus/$1');
//     $routes->post('claim-reel-merge/store', 'Backend\ClaimReelMerge\ClaimReelMergeController::store');
//     $routes->get('merge-request', 'Backend\ClaimReelMerge\ClaimReelMergeController::index');
//     $routes->get('claim-reel-merge/list', 'Backend\ClaimReelMerge\ClaimReelMergeController::list');
//     $routes->get('merge-data', 'Backend\ClaimReelMerge\ClaimReelMergeController::mergeData');
//     $routes->get('merge-data/list', 'Backend\ClaimReelMerge\ClaimReelMergeController::getMergeDataJson');
//     $routes->get('merge-data/detail/(:num)', 'Backend\ClaimReelMerge\ClaimReelMergeController::getMergeDataDetail/$1');
//     $routes->post('merge-data/update-status/(:num)', 'Backend\ClaimReelMerge\ClaimReelMergeController::updateMergeStatus/$1');
//     $routes->group('facebook', function ($routes) {
//         $routes->post('import', 'Backend\FacebookConflict\FacebookConflictController::import');
//         $routes->get('list-json', 'Backend\FacebookConflict\FacebookConflictController::listConflictsJson');
//         $routes->get('/', 'Backend\FacebookConflict\FacebookConflictController::index');
//         $routes->post('update-resolution', 'Backend\FacebookConflict\FacebookConflictController::updateResolution');
//     });
//     $routes->get('facebook/get-all-countries', 'Backend\FacebookConflict\FacebookConflictController::getAllCountries');
//     $routes->post('youtube-conflicts/import', 'Backend\YoutubeConflict\YoutubeConflictController::import');
//     $routes->get('youtube', 'Backend\YoutubeConflict\YoutubeConflictController::index');
//     $routes->get('youtube-conflicts/json', 'Backend\YoutubeConflict\YoutubeConflictController::listConflictsJson');
//     $routes->post('youtube-conflicts/update/(:num)', 'Backend\YoutubeConflict\YoutubeConflictController::update/$1');
//     $routes->get('facebook-ownership-data', 'Backend\FacebookConflict\FacebookConflictController::ownershipIndex');
//     $routes->get('facebook-ownership/list', 'Backend\FacebookConflict\FacebookConflictController::listOwnershipConflictsJson');
//     $routes->post('facebook-ownership/update/(:num)', 'Backend\FacebookConflict\FacebookConflictController::updateOwnership/$1');
//     $routes->get('youtube-ownership-data', 'Backend\YoutubeConflict\YoutubeConflictController::youtubeOwnershipIndex');
//     $routes->get('youtube-ownership/list', 'Backend\YoutubeConflict\YoutubeConflictController::listYouTubeOwnershipConflictsJson');
//     $routes->post('youtube-ownership/update/(:num)', 'Backend\YoutubeConflict\YoutubeConflictController::updateYouTubeConflictStatus/$1');
//     $routes->get('dashboard', 'Backend\Release\ReleaseDraftsController::dashboard');
//     $routes->get('users/details/(:num)', 'RegisterController::getUserDetails/$1');
//     $routes->get('users/edit/(:num)', 'RegisterController::editUser/$1');
//     $routes->post('users/update-profile', 'RegisterController::updateUserProfile');
//     $routes->post('users/reset-password', 'RegisterController::resetUserPassword');
// });

$routes->get('/login', 'Auth::index');
$routes->post('/loginCheck', 'Auth::loginCheck');
$routes->get('auth-logout', 'Auth::logout');
$routes->post('profile/changePassword', 'Auth::changePasswordAjax');

// Common authenticated routes (ALL roles can access)
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/logout', 'Auth::logout');
    $routes->get('/', 'Home::index');
    
    // Dashboard - common for all
    $routes->get('dashboard', 'Backend\Release\ReleaseDraftsController::dashboard');
    
    // Profile - common for all
    $routes->get('pages-profile', 'RegisterController::index');
    
    // User management - common for all (moved back)
    $routes->get('accounts', 'RegisterController::accounts');
    $routes->get('api/accounts', 'RegisterController::getAccountsJson');
    $routes->post('register', 'RegisterController::register');
    $routes->get('users/details/(:num)', 'RegisterController::getUserDetails/$1');
    $routes->get('users/edit/(:num)', 'RegisterController::editUser/$1');
    $routes->post('users/update-profile', 'RegisterController::updateUserProfile');
    $routes->post('users/reset-password', 'RegisterController::resetUserPassword');
    
    // Release management - common for all
    $routes->get('releases', 'Backend\Release\ReleaseController::index');
    $routes->get('releases/view/(:num)', 'Backend\Release\ReleaseController::view_release/$1');
    $routes->get('releases/create', 'Backend\Release\ReleaseController::create');
    $routes->post('releases/store', 'Backend\Release\ReleaseController::store');
    $routes->get('releases/edit/(:num)', 'Backend\Release\ReleaseController::edit/$1');
    $routes->post('releases/update/(:num)', 'Backend\Release\ReleaseController::update/$1');
    $routes->get('releases/(:num)/rejection-messages', 'Backend\Release\ReleaseController::getRejectionMessages/$1');
    
    // Draft management - common for all
    $routes->post('releases/drafts/save', 'Backend\Release\ReleaseDraftsController::saveDraft');
    $routes->get('releases/drafts', 'Backend\Release\ReleaseDraftsController::getDrafts');
    $routes->get('releases/drafts/load/(:num)', 'Backend\Release\ReleaseDraftsController::loadDraft/$1');
    $routes->delete('releases/drafts/(:num)', 'Backend\Release\ReleaseDraftsController::deleteDraft/$1');
    $routes->get('add-release', 'Backend\Release\ReleaseController::addRelease');
    $routes->post('releases/takedown/(:num)', 'Backend\Release\ReleaseController::takedown_release/$1');
    $routes->get('releases/export-csv', 'Backend\Release\ReleaseController::exportCsv');
    // Artists and Labels - common for all
    $routes->get('artists', 'Backend\Artist\ArtistController::index');
    $routes->get('api/artists', 'Backend\Artist\ArtistController::getArtistsJson');
    $routes->post('create-artist', 'Backend\Artist\ArtistController::store');
    $routes->post('artist/search-spotify', 'Backend\Artist\ArtistController::searchSpotifyArtists');
    $routes->post('artist/search-apple-music', 'Backend\Artist\ArtistController::searchAppleMusicArtists');
    
    $routes->get('labels', 'Backend\Label\LabelController::index');
    $routes->get('api/labels', 'Backend\Label\LabelController::getLabelsJson');
    $routes->post('create-label', 'Backend\Label\LabelController::store');
    
    // Support - common for all (moved back)
    $routes->post('support/store', 'Backend\Support\SupportController::store');
    $routes->get('support_user', 'SuperAdmin::support_user');
    // Request management - common for all
    $routes->get('claiming-request', 'Backend\ClaimingRequest\ClaimingRequestController::index');
    $routes->post('claiming-requests', 'Backend\ClaimingRequest\ClaimingRequestController::store');
    $routes->get('api/claiming-req', 'Backend\ClaimingRequest\ClaimingRequestController::getClaimingRequestJson');
    
    $routes->get('relocation-request', 'Backend\RelocationRequest\RelocationRequestController::index');
    $routes->get('relocation-request/list', 'Backend\RelocationRequest\RelocationRequestController::list');
    $routes->post('relocation-request/store', 'Backend\RelocationRequest\RelocationRequestController::store');
    $routes->get('relocation-requests/data', 'Backend\RelocationRequest\RelocationRequestController::getRelocationRequestJson');
    
    $routes->get('merge-request', 'Backend\ClaimReelMerge\ClaimReelMergeController::index');
    $routes->get('claim-reel-merge/list', 'Backend\ClaimReelMerge\ClaimReelMergeController::list');
    $routes->post('claim-reel-merge/store', 'Backend\ClaimReelMerge\ClaimReelMergeController::store');
    
    // Facebook and YouTube - common for all
    $routes->group('facebook', function ($routes) {
        $routes->post('import', 'Backend\FacebookConflict\FacebookConflictController::import');
        $routes->get('list-json', 'Backend\FacebookConflict\FacebookConflictController::listConflictsJson');
        $routes->get('/', 'Backend\FacebookConflict\FacebookConflictController::index');
        $routes->post('update-resolution', 'Backend\FacebookConflict\FacebookConflictController::updateResolution');
    });
    $routes->get('facebook/get-all-countries', 'Backend\FacebookConflict\FacebookConflictController::getAllCountries');
    $routes->get('facebook-ownership/list', 'Backend\FacebookConflict\FacebookConflictController::listOwnershipConflictsJson');
    
    $routes->post('youtube-conflicts/import', 'Backend\YoutubeConflict\YoutubeConflictController::import');
    $routes->get('youtube', 'Backend\YoutubeConflict\YoutubeConflictController::index');
    $routes->get('youtube-conflicts/json', 'Backend\YoutubeConflict\YoutubeConflictController::listConflictsJson');
    $routes->post('youtube-conflicts/update/(:num)', 'Backend\YoutubeConflict\YoutubeConflictController::update/$1');

    $routes->get('sales-report', 'SuperAdmin::sales_report');

});

// Admin routes ONLY (superadmin + admin have same privileges)
$routes->group('', ['filter' => 'role:superadmin,subadmin'], function ($routes) {
    // Advanced features - admin only
    $routes->get('sales-report', 'SuperAdmin::sales_report');
    $routes->get('add-release', 'Backend\Release\ReleaseController::addRelease');
    $routes->post('releases/takedown/(:num)', 'Backend\Release\ReleaseController::takedown_release/$1');
    $routes->get('releases/export-csv', 'Backend\Release\ReleaseController::exportCsv');
    $routes->get('releases/validate-unique', 'Backend\Release\ReleaseController::validateUnique');
    
    // Data management - admin only
    $routes->get('claiming-data', 'Backend\ClaimingRequest\ClaimingRequestController::claimData');
    $routes->get('api/claiming-data', 'Backend\ClaimingRequest\ClaimingRequestController::getClaimingDataJson');
    $routes->post('api/claiming-data/(:num)/status', 'Backend\ClaimingRequest\ClaimingRequestController::updateStatus/$1');
    
    $routes->get('relocation-data', 'Backend\RelocationRequest\RelocationRequestController::relocationData');
    $routes->get('api/relocation-data', 'Backend\RelocationRequest\RelocationRequestController::getRelocationDataJson');
    $routes->get('api/relocation-data/(:num)', 'Backend\RelocationRequest\RelocationRequestController::getRelocationDataDetail/$1');
    $routes->post('api/relocation-data/(:num)/status', 'Backend\RelocationRequest\RelocationRequestController::updateRelocationStatus/$1');
    $routes->post('relocation-request/update-status/(:num)', 'Backend\RelocationRequest\RelocationRequestController::updateStatus/$1');
    
    $routes->get('merge-data', 'Backend\ClaimReelMerge\ClaimReelMergeController::mergeData');
    $routes->get('merge-data/list', 'Backend\ClaimReelMerge\ClaimReelMergeController::getMergeDataJson');
    $routes->get('merge-data/detail/(:num)', 'Backend\ClaimReelMerge\ClaimReelMergeController::getMergeDataDetail/$1');
    $routes->post('merge-data/update-status/(:num)', 'Backend\ClaimReelMerge\ClaimReelMergeController::updateMergeStatus/$1');
    
    $routes->get('support/data', 'Backend\Support\SupportController::data');
    $routes->post('support/update-status/(:num)', 'Backend\Support\SupportController::updateStatus/$1');
    $routes->get('support', 'Backend\Support\SupportController::index');
    // Label status management - admin only
    $routes->post('labels/update-status', 'Backend\Label\LabelController::updateStatus');
    
    // Advanced Facebook and YouTube management - admin only
    $routes->get('facebook-ownership-data', 'Backend\FacebookConflict\FacebookConflictController::ownershipIndex');
    $routes->post('facebook-ownership/update/(:num)', 'Backend\FacebookConflict\FacebookConflictController::updateOwnership/$1');
    
    $routes->get('youtube-ownership-data', 'Backend\YoutubeConflict\YoutubeConflictController::youtubeOwnershipIndex');
    $routes->get('youtube-ownership/list', 'Backend\YoutubeConflict\YoutubeConflictController::listYouTubeOwnershipConflictsJson');
    $routes->post('youtube-ownership/update/(:num)', 'Backend\YoutubeConflict\YoutubeConflictController::updateYouTubeConflictStatus/$1');
});