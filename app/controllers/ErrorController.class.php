<?php

class ErrorController extends Controller {
  public function page404($data) {
    $this->render('404', $data);
  }
}
