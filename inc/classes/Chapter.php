<?php

class Chapter {
    public $title;
    public $serial;

    function __construct($title, $serial) {
        $this->title = $title;
        $this->serial = $serial;
    }
}