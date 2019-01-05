<?php

class Controller {
  protected function render($pagename, $data = []) {
    // Give global access to router
    global $router;

    // Pass each variable as its own variable
    foreach ($data as $name => $value) {
      $$name = $value;
    }

    // Pass default title if it is mssing
    if (!isset($title)) {
      $title = DEFAULT_TITLE;
    }

    // Render each template
    include Path::view('header');
    include Path::view($pagename);
    include Path::view('footer');
  }
}
