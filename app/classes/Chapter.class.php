<?php

class Chapter {
    public $title;
    public $serial;

    function __construct($title, $serial) {
        $this->title = $title;
        $this->serial = $serial;
    }

    function getURL() {
        return 'https://docs.google.com/document/d/e/2PACX-' . $this->serial . '/pub?embedded=true';
    }
}