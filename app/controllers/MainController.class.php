<?php

class MainController extends Controller {
  public function home($data) {
    // Create date from today's date
    $data['date'] = new MidgardDate;
    // Render page
    $this->render('home', $data);
  }

  public function backHome($data) {
    global $router;
    header('Location: ' . $router->generate('home', ['lang' => Language::first()->code]) );
  }

  public function chapter($data) {
    // Process chapter number
    if ( isset($data['id']) ) {
        $id = $data['id'];
    }

    if ( !isset($id) ) {
        if ( isset($_COOKIE['last_chapter']) ) {
            $id = $_COOKIE['last_chapter'];
        } else {
            $id = 1;
        }
    }

    // Remember how far the user has read
    if ( !isset($_COOKIE['last_chapter']) || $id > $_COOKIE['last_chapter'] ) {
      setcookie('last_chapter', $id);
      $data['last_chapter'] = $id;
    } else if ( isset($_COOKIE['last_chapter']) ) {
      $data['last_chapter'] = $_COOKIE['last_chapter'];
    }

    $data['id'] = $id;

    // Load chapter from id
    $chapter = Chapter::fetchById($id, ['id', 'title', 'serial']);

    $data['title'] = 'Read chapter ' . $id . ' - ' . $chapter->title;

    $data['chapter'] = $chapter;

    // Render page
    $this->render('chapter', $data);
  }

  public function calculateDate($data) {
    global $router;

    // Convert form input to timestamp
    if ( isset($_GET['month']) && isset($_GET['day']) ) {
      $time = mktime(0, 0, 0, array_search($_GET['month'], MidgardDate::GREGORIAN_NAME_MONTH) + 1, $_GET['day']);
      // Redirect to calendar page
      header('Location: ' . $router->generate('date', ['lang' => $data['lang'], 'date' => $time]) );
    }

  }

  public function date($data) {
    $data['title'] = "Calculate your birthday";

    // If date was given as parameter, create new date from it
    if (isset($data['date'])) {
      $data['date'] = new MidgardDate($data['date']);
      $data['title'] = "You were born on " . $data['date']->display();
    }

    // Render page
    $this->render('date', $data);
  }

  public function cards($data) {
    if ( isset($data['id']) ) {
      $pagename = 'card_details';
    } else {
      $pagename = 'cards';
    }

    // Render page
    $this->render($pagename, $data);
  }
}
