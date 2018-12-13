<?php

// Load database
include dirname(__FILE__) . '/inc/classes/Database.php';

// Make Midgårdese date from form data
if (sizeof($_GET) > 0) {
    $date = new MidgardDate(mktime(0, 0, 0, array_search($_GET['month'], MidgardDate::GREGORIAN_NAME_MONTH) + 1, $_GET['day']));
}

// Include templates
include dirname(__FILE__) . '/inc/templates/header.php';
include dirname(__FILE__) . '/inc/templates/calendar.php';
include dirname(__FILE__) . '/inc/templates/footer.php';
