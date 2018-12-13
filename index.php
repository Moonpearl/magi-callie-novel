<?php

// Load database
include dirname(__FILE__) . '/inc/classes/Database.php';

// Make Midgårdese date from current system date
$date = new MidgardDate();

// Include templates
include dirname(__FILE__) . '/inc/templates/header.php';
include dirname(__FILE__) . '/inc/templates/home.php';
include dirname(__FILE__) . '/inc/templates/footer.php';
