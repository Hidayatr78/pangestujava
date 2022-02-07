<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/iyan/', 'Iyan/login::index', ['filter' => 'filterauth']);


$routes->get('/iyan/dashboard', 'Iyan/Dashboard::index', ['filter' => 'filterauth']);

$routes->get('/iyan/login/logout', 'Iyan/Login::logout', ['filter' => 'filterauth']);
$routes->get('/iyan/logout', 'Iyan/Login::logout', ['filter' => 'filterauth']);

$routes->get('/iyan/biodata', 'Iyan/Biodata::index', ['filter' => 'filterauth']);

$routes->get('/iyan/configuration', 'Iyan/Configuration::index', ['filter' => 'filterauth']);
$routes->get('/iyan/configuration/logo', 'Iyan/Configuration::logo', ['filter' => 'filterauth']);
$routes->get('/iyan/configuration/icon', 'Iyan/Configuration::icon', ['filter' => 'filterauth']);

$routes->get('/iyan/skill', 'Iyan/Skill::index', ['filter' => 'filterauth']);
$routes->get('/iyan/skill/delete', 'Iyan/Skill::delete', ['filter' => 'filterauth']);
$routes->get('/iyan/skill/edit', 'Iyan/Skill::edit', ['filter' => 'filterauth']);
$routes->get('/iyan/skill/add', 'Iyan/Skill::add', ['filter' => 'filterauth']);

$routes->get('/iyan/project', 'Iyan/Project::index', ['filter' => 'filterauth']);
$routes->get('/iyan/project/delete', 'Iyan/Project::delete', ['filter' => 'filterauth']);
$routes->get('/iyan/project/edit', 'Iyan/Project::edit', ['filter' => 'filterauth']);
$routes->get('/iyan/project/add', 'Iyan/Project::add', ['filter' => 'filterauth']);
$routes->get('/iyan/project/image', 'Iyan/Project::image', ['filter' => 'filterauth']);

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
