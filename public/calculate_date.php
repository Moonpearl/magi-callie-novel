<?php

if ( isset($_GET['month']) && isset($_GET['day'])) {
    $time = mktime(0, 0, 0, array_search($_GET['month'], MidgardDate::GREGORIAN_NAME_MONTH) + 1, $_GET['day']);
    echo $time;
}