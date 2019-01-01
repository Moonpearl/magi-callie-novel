<?php

// Load dependencies
require 'vendor/autoload.php';

// Load classes
const DIRECTORIES = ['functions', 'classes', 'classes/controllers'];

foreach ( DIRECTORIES as $directory ) {
    foreach ( glob('app/' . $directory . '/*.php') as $filename) {
        require_once $filename;
    }
}

// Define routes
$router = new AltoRouter;

$router->setBasePath($_SERVER['BASE_URI']);

// Route for home page
$router->map('GET', '/', function($data) {
    $data['date'] = new MidgardDate;

    $controller = new MainController;
    $controller->render('home', $data);
} );

// Route for novel page
$router->map('GET', '/chapter/[i:id]?', function($data) {
    // Process chapter number
    if ( isset($data['id']) ) {
        $id = $data['id'];
    }

    if ( !isset($id) ) {
        if ( isset($_COOKIE['last_chapter']) ) {
            $id = $_COOKIE['last_chapter'];
        } else {
            $id = 1;
        }
    }

    // Remember how far the user has read
    if ( !isset($_COOKIE['last_chapter']) || $id > $_COOKIE['last_chapter'] ) {
        setcookie('last_chapter', $id);
        $data['last_chapter'] = $id;
    } else if ( isset($_COOKIE['last_chapter']) ) {
        $data['last_chapter'] = $_COOKIE['last_chapter'];
    }

    $data['id'] = $id;

    // Create controller
    $controller = new MainController;

    // Load chapter from database
    $data['chapter'] = $controller->get_chapter($id);

    // Render page
    $controller->render('chapter', $data);
} );

// Route for calendar form processing
$router->map('GET', '/calculate_date', function($data) {
    $location = '/date';
    if ( isset($_GET['month']) && isset($_GET['day']) ) {
        $time = mktime(0, 0, 0, array_search($_GET['month'], MidgardDate::GREGORIAN_NAME_MONTH) + 1, $_GET['day']);
        $location .= '/' . $time;
    }
    header('Location: ' . $_SERVER['BASE_URI'] . $location);
} );

// Route for calendar page
$router->map('GET', '/date/[i:date]?', function($data) {
    if (isset($data['date'])) {
        $date = new MidgardDate($data['date']);
        $data['date'] = $date;
    }

    // Create controller
    $controller = new MainController;

    // Render page
    $controller->render('date', $data);
} );

// Route for encyclopedia page
$router->map('GET', '/cards/[i:id]?', function($data) {
    if ( isset($data['id']) ) {
        $pagename = 'card_details';
    } else {
        $pagename = 'cards';
    }

    // Create controller
    $controller = new MainController;

    // Render page
    $controller->render($pagename, $data);
} );




// Match requested URL with defined routes
$match = $router->match();

if ($match) {
    call_user_func( $match['target'], $match['params'] ); 
} else {
    $controller = new ErrorController;
    $controller->render('404');
}

die();


// Create controller
$controller = new MainController;

// Get pagename
$controller->pagename = $_GET['page'];

// Set up page
switch ($controller->pagename) {
    case '/home':
        $controller->setDate();
        break;
    
    case '/chapter':
        if ( isset($_GET['id']) ) {
            $id = $_GET['id'];
        }

        // Process chapter number
        if ( !isset($id) ) {
            if ( isset($_COOKIE['last_chapter']) ) {
                $id = $_COOKIE['last_chapter'];
            } else {
                $id = 1;
            }
        }

        // Remember how far the user has read
        if ( !isset($_COOKIE['last_chapter']) || $id > $_COOKIE['last_chapter'] ) {
            setcookie('last_chapter', $id);
            $last_chapter = $id;
        } else if ( isset($_COOKIE['last_chapter']) ) {
            $last_chapter = $_COOKIE['last_chapter'];
        }
        
        // Read chapter data
        $controller->setId($id);
        $controller->setChapter($id);
        $controller->setLastChapter($last_chapter);
        break;
    
    case '/calendar':
        $controller->setDate();
        break;
    
    default:
        // Create controller
        $controller = new ErrorController;
        $controller->page = '404';
}

// Display page
$controller->display_page();