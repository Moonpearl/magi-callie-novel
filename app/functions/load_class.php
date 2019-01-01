<?php

function load_class($name) {
    require_once get_file('app/classes/' . $name . '.class.php');
}