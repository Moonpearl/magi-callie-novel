<?php

class Controller {
    protected $database;

    function __construct() {
        $this->database = new Database;
    }

    function render($pagename, $data = []) {
        $database = $this->database;

        include get_view('header');
        include get_view($pagename);
        include get_view('footer');
    }
}