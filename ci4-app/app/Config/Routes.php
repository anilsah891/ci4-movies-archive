<?php

namespace Config;

use App\Controllers\Pages;
use App\Controllers\MoviesController;
use App\Controllers\Ajax;
use CodeIgniter\Config\Services;

$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('home');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Default CodeIgniter welcome page
$routes->get('/', function () {
    echo view('welcome_message');
});

//  Static pages
$routes->get('home', 'Pages::home');
$routes->get('about', 'Pages::about');
$routes->get('contact', 'Pages::contact');
$routes->get('pages/(:any)', 'Pages::view/$1');
$routes->get('apis/wikipedia', 'Apis::wikipedia');

//  Movie section
$routes->get('movies', 'MoviesController::index');
$routes->get('movies/new', 'MoviesController::create');
$routes->get('movies/(:segment)', 'MoviesController::view/$1');
$routes->post('movies', 'MoviesController::store');

//  AJAX movie fetch
$routes->get('ajax/get/(:any)', 'Ajax::get/$1');

//  OMDb search
$routes->get('omdb', 'OmdbController::index');

// Reviews
$routes->post('review/submit', 'ReviewController::submit');
$routes->get('review/(:num)', 'ReviewController::show/$1');

//  User auth
$routes->get('register', 'Register::index');
$routes->post('register/store', 'Register::store');
$routes->get('login', 'Login::index');
$routes->post('login/authenticate', 'Login::authenticate');
$routes->get('logout', 'Login::logout');

//  Contact form submission
$routes->post('contact/send', 'ContactController::sendMessage');

/*
 * --------------------------------------------------------------------
 * Environment Specific Routes
 * --------------------------------------------------------------------
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
