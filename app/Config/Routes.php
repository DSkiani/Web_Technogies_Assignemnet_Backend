<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$route['api/weather/(:any)'] = 'weatherApi/getWeather/$1';
$route['api/save-user-preference'] = 'weatherApi/saveUserPreference';
