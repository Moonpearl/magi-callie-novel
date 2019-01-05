<?php

// Set project data
require 'app/utils/project.php';

// Load dependencies
require 'vendor/autoload.php';

// Setup class autloading
require 'app/utils/autoload.php';

// Bind database
Database::setName(DB_NAME);

// Set up languages
foreach (LANGUAGES as $code => $name) {
  new Language($code, $name);
}

// Define routes
$router = new AltoRouter;

$router->setBasePath($_SERVER['BASE_URI']);

$router->map('GET', '/',                         'MainController#backHome',       'none');
$router->map('GET', '/[a:lang]',                 'MainController#home',           'home');
$router->map('GET', '/[a:lang]/chapter/[i:id]?', 'MainController#chapter',        'chapter');
$router->map('GET', '/[a:lang]/calculate_date',  'MainController#calculateDate',  'calculate_date');
$router->map('GET', '/[a:lang]/date/[i:date]?',  'MainController#date',           'date');
$router->map('GET', '/[a:lang]/cards/[i:id]?',   'MainController#cards',          'cards');
$router->map('GET', '/[a:lang]/contact',         'MainController#contact',        'contact');

// Match requested URL with defined routes
$match = $router->match();

if ($match) {
  if (isset($match['params']['lang'])) {
    $lang = $match['params']['lang'];
    if (Language::exists($lang)) {
      $return_code = 200;
    } else {
      $return_code = 404;
    }
  } else {
    $lang = Language::first()->code;
    $return_code = 200;
  }

} else {
    $return_code = 404;
}

switch ($return_code) {
  case 200:
    $name = $match['target'];
    $params = $match['params'];
    $params['match_name'] = $match['name'];
    break;

  case 404:
    $name = 'ErrorController#page404';
    $params = [ 'match_name' => null, 'lang' => Language::first()->code ];
    break;
}

Language::setCurrentFromCode($lang);

// Create controller and render page
$name = explode('#', $name);

$controller = new $name[0];
$controller->$name[1]($params);
