<?php

function get_url($url) {
    return $_SERVER['BASE_URI'] . '/' . $url;
}

function get_css_url($url) {
    return get_url('public/css/' . $url);
}

function get_file($url) {
    return getcwd() . '/' . $url;
}

function get_view($url) {
    return get_file('app/views/' . $url) . '.tpl.php';
}