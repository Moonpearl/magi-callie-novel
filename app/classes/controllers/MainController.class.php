<?php

load_class('controllers/Controller');

class MainController extends Controller {
    function get_chapter($id) {
        $data = $this->database->readChapter($id);
        return new Chapter($data['title'], $data['serial']);
    }
}