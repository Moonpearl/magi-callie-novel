<?php

// Load database
include dirname(__FILE__) . '/inc/classes/Database.php';

// Process chapter number
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 1;
}

// Read chapter data
$chapter = $database->readChapter($id);

// Include templates
include dirname(__FILE__) . '/inc/templates/header.php';
include dirname(__FILE__) . '/inc/templates/chapter.php';
include dirname(__FILE__) . '/inc/templates/footer.php';
