<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

$routes->get('/', 'MainController::catsPage');
$routes->get('CatPage', 'MainController::catsPage');
$routes->get('CatPage/(:num)', 'MainController::catsSinglePage/$1');

$routes->get('CatModel/new', 'MainController::addCat');
$routes->post('CatModel/create', 'MainController::createForm');

$routes->get('CatModel/arrayList', 'MainController::showAll');
$routes->get('CatModel/edit/(:num)', 'MainController::editCat/$1');
$routes->put('CatModel/edit', 'MainController::editForm/update');

$routes->get('CatModel/delete/(:num)', 'MainController::confirmDelete/$1');
$routes->delete('CatModel/delete', 'MainController::deleteForm/delete');

$routes->get('login','Auth::login');
$routes->get('register','Auth::register');

$routes->post('login-complete','Auth::loginComplete');
$routes->post('register-complete','Auth::registerComplete');
$routes->get('logout','Auth::logoutComplete');


$routes->group('admin', ['filter' => 'auth'], static function ($routes) {
    $routes->get('dash','MainController::catsPage');
});