<?php

// Set project data
require 'app/utils/project.php';

// Load dependencies
require 'vendor/autoload.php';

// Setup class autloading
require 'app/utils/autoload.php';

// Bind database
Database::setName(DB_NAME);

// Define routes
$router = new AltoRouter;

$router->setBasePath($_SERVER['BASE_URI']);

$router->map('GET', '/',                'MainController#home',           'home');
$router->map('GET', '/chapter/[i:id]?', 'MainController#chapter',        'chapter');
$router->map('GET', '/calculate_date',  'MainController#calculateDate',  'calculate_date');
$router->map('GET', '/date/[i:date]?',  'MainController#date',           'date');
$router->map('GET', '/cards/[i:id]?',   'MainController#cards',          'cards');

// Match requested URL with defined routes
$match = $router->match();

if ($match) {
  $name = $match['target'];
} else {
  $name = 'ErrorController#page404';
}

// Create controller and render page
$name = explode('#', $name);

$controller = new $name[0];
$controller->$name[1]($match['params']);
