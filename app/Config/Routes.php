<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

$routes->get('/', 'MainController::catsPage');
$routes->get('CatPage', 'MainController::catsPage');

$routes->get('CatModel/new', 'MainController::addCat');
$routes->post('CatModel/create', 'MainController::createForm');

$routes->get('CatModel/arrayList', 'MainController::showAll');
$routes->get('CatModel/edit/(:num)', 'MainController::editCat/$1');
$routes->put('CatModel/edit', 'MainController::editForm/update');