<?php

class Controller {
    public $pagename;
    private $database;
    private $data = [];

    function __construct() {
        $this->database = new Database;
    }

    function setId($value) {
        $this->data['id'] = $value;
    }

    function setLastChapter($value) {
        $this->data['last_chapter'] = $value;
    }

    function setChapter($id) {
        $this->data['chapter'] = $this->database->readChapter($id);;
    }

    function setDate($value = null) {
        $this->data['date'] = new MidgardDate($value);
    }

    function display_page() {
        $database = $this->database;
        $data = $this->data;

        include dirname(__DIR__) . '/views/header.php';
        include dirname(__DIR__) . '/views' . $this->pagename . '.php';
        include dirname(__DIR__) . '/views/footer.php';
    }
}