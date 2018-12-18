<?php

// Load database
include dirname(__FILE__) . '/inc/classes/Database.php';

// Process chapter number
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    if (isset($_COOKIE['last_chapter'])) {
        $id = $_COOKIE['last_chapter'];
    } else {
        $id = 1;
    }
}

// Remember how far the user has read
if (!isset($_COOKIE['last_chapter']) || $id > $_COOKIE['last_chapter']) {
    setcookie('last_chapter', $id);
    $last_chapter = $id;
} else if (isset($_COOKIE['last_chapter'])) {
    $last_chapter = $_COOKIE['last_chapter'];
}

// Read chapter data
$chapter = $database->readChapter($id);

// Include templates
include dirname(__FILE__) . '/inc/templates/header.php';
include dirname(__FILE__) . '/inc/templates/chapter.php';
include dirname(__FILE__) . '/inc/templates/footer.php';
