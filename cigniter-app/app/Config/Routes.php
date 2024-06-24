<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');

$routes->get('/login', 'LoginController::index');
$routes->post('/check_login', 'LoginController::check_login');

$routes->add('/logout', 'LoginController::logout');

$routes->get('/register', 'RegisterController::index');
$routes->post('/register/process', 'RegisterController::process');
$routes->get('captcha', 'RegisterController::captcha');

$routes->get('/notes', 'NoteController::index');
$routes->post('notes/save', 'NoteController::save');
$routes->post('notes/logout', 'NoteController::logout');
$routes->post('notes/search', 'NoteController::search');
$routes->get('notes/delete', 'NoteController::delete');
$routes->get('notes/edit/(:num)', 'NoteController::edit/$1');
$routes->post('notes/update/(:num)', 'NoteController::update/$1');
