<?php

// Load classes
const DIRECTORIES = ['classes', 'controllers'];

foreach ( DIRECTORIES as $directory ) {
    foreach ( glob($directory . '/*.php') as $filename) {
        require_once $filename;
    }
}

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