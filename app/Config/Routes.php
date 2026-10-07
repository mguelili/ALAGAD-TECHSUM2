<?php
use CodeIgniter\Router\RouteCollection;
/** @var RouteCollection $routes */
$routes->get('/', 'Tasks::index');
$routes->get('/tasks', 'Tasks::taskList');
$routes->get('/profile', 'Tasks::profile');
$routes->get('/about', 'Tasks::about');
$routes->match(['get','post'], '/login', 'Auth::login');
$routes->post('/logout', 'Auth::logout');
$routes->get('/tasks/new', 'Tasks::newTask');
$routes->post('/tasks/create', 'Tasks::create');
$routes->get('/tasks/(:num)/edit', 'Tasks::edit/$1');
$routes->post('/tasks/(:num)/update', 'Tasks::update/$1');
$routes->post('/tasks/(:num)/delete', 'Tasks::delete/$1');
