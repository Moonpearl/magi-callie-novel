<?php

function get_current_url() {
    return str_replace($_SERVER['BASE_URI'], '', $_SERVER['REQUEST_URI']);
}

function get_base_page($url) {
    return explode('/', $url)[1];
}