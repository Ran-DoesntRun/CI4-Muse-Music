<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'User\Music::songs');
$routes->post('/song/comment/(:any)', 'User\Music::add_review/$1');
$routes->get('/song', 'User\Music::songs');
$routes->get('/song/(:any)', 'User\Music::focus_Music/$1');
$routes->get('/album', 'User\Album::albums');
$routes->get('/album/(:any)', 'User\Album::focus_Album/$1');
$routes->get('/singer', 'User\Artist::artist');
$routes->get('/singer/(:any)', 'User\Artist::focus_Artist/$1');
$routes->get('/login', 'User\Users::login');
$routes->get('/signup', 'User\Users::signup');
$routes->post('/register/save', 'User\Users::save');
$routes->post('/login/auth', 'User\Users::auth');
$routes->get('/logout', 'User\Users::logout');

$routes->get('/admin', 'Admin\Admin::index');
$routes->get('/admin/register', 'Admin\Admin::register', ['filter' => 'auth']);
$routes->get('/admin/songs', 'Admin\Songs::index', ['filter' => 'auth']);
$routes->get('/admin/songs/create', 'Admin\Songs::create', ['filter' => 'auth']);
$routes->get('/admin/song/edit/(:any)', 'Admin\Songs::edit/$1', ['filter' => 'auth']);
$routes->get('/admin/artists', 'Admin\Artists::index', ['filter' => 'auth']);
$routes->get('admin/artist/delete/(:any)', 'Admin\Artists::delete/$1', ['filter' => 'auth']);
$routes->get('/admin/artists/create', 'Admin\Artists::create', ['filter' => 'auth']);
$routes->get('/admin/artists/edit/(:any)', 'Admin\Artists::edit/$1', ['filter' => 'auth']);
$routes->post('/admin/artist/update/(:any)', 'Admin\Artists::update/$1');
$routes->post('/admin/artist/save', 'Admin\Artists::save');
$routes->get('/admin/albums', 'Admin\Albums::index', ['filter' => 'auth']);
$routes->get('/admin/albums/create', 'Admin\Albums::create', ['filter' => 'auth']);
$routes->get('/admin/album/edit/(:any)', 'Admin\Albums::edit/$1', ['filter' => 'auth']);
$routes->post('/admin/album/save', 'Admin\Albums::save');
$routes->post('/admin/song/save', 'Admin\Songs::save');
$routes->get('admin/album/delete/(:any)', 'Admin\Albums::delete/$1', ['filter' => 'auth']);
$routes->get('admin/song/delete/(:any)', 'Admin\Songs::delete/$1' , ['filter' => 'auth']);
$routes->post('/admin/album/update/(:any)', 'Admin\Albums::update/$1');
$routes->post('/admin/song/update/(:any)', 'Admin\Songs::update/$1');
$routes->post('admin/login/auth','Admin\Admin::auth');
$routes->post('/admin/save/', 'Admin\Admin::save');
$routes->get('/admin/song/review/(:any)', 'Admin\Songs::review/$1', ['filter' => 'auth']);
$routes->get('/admin/review/delete/(:any)', 'Admin\Songs::delrev/$1', ['filter' => 'auth']);
$routes->get('/admin/logout', 'Admin\Admin::logout', ['filter' => 'auth']);











