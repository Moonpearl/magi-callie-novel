<?php

class Controller {
  protected function render($pagename, $data = []) {
    // Give global access to router
    global $router;

    // Pass each variable as its own variable
    foreach ($data as $name => $value) {
      $$name = $value;
    }

    // Render each template
    include Path::view('header');
    include Path::view($pagename);
    include Path::view('footer');
  }
}
