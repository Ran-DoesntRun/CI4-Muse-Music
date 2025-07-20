<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Users::songs');
$routes->post('/song/comment/(:any)', 'Users::add_review/$1');
$routes->get('/song', 'Users::songs');
$routes->get('/song/(:any)', 'Users::focus_Music/$1');
$routes->get('/album', 'Users::albums');
$routes->get('/album/(:any)', 'Users::focus_Album/$1');
$routes->get('/singer', 'Users::artist');
$routes->get('/singer/(:any)', 'Users::focus_Artist/$1');
$routes->get('/login', 'Users::login');
$routes->get('/signup', 'Users::signup');
$routes->post('/register/save', 'Users::save');
$routes->post('login/auth', 'Users::auth');
$routes->get('logout', 'Users::logout');

$routes->get('/admin', 'Admin\Admin::index');
$routes->get('/admin/register', 'Admin\Admin::register');
$routes->get('/admin/songs', 'Admin\Songs::index');
$routes->get('/admin/songs/create', 'Admin\Songs::create');
$routes->get('/admin/song/edit/(:any)', 'Admin\Songs::edit/$1');
$routes->get('/admin/artists', 'Admin\Artists::index');
$routes->get('admin/artist/delete/(:any)', 'Admin\Artists::delete/$1');
$routes->get('/admin/artists/create', 'Admin\Artists::create');
$routes->get('/admin/artists/edit/(:any)', 'Admin\Artists::edit/$1');
$routes->post('/admin/artist/update/(:any)', 'Admin\Artists::update/$1');
$routes->post('/admin/artist/save', 'Admin\Artists::save');
$routes->get('/admin/albums', 'Admin\Albums::index');
$routes->get('/admin/albums/create', 'Admin\Albums::create');
$routes->get('/admin/album/edit/(:any)', 'Admin\Albums::edit/$1');
$routes->post('/admin/album/save', 'Admin\Albums::save');
$routes->post('/admin/song/save', 'Admin\Songs::save');
$routes->get('admin/album/delete/(:any)', 'Admin\Albums::delete/$1');
$routes->get('admin/song/delete/(:any)', 'Admin\Songs::delete/$1');
$routes->post('/admin/album/update/(:any)', 'Admin\Albums::update/$1');
$routes->post('/admin/song/update/(:any)', 'Admin\Songs::update/$1');










