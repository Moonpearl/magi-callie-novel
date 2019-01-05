<?php

class MainController extends Controller {
  public function home($data) {
    // Create date from today's date
    $data['date'] = new MidgardDate;
    // Render page
    $this->render('home', $data);
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
    $data['chapter'] = Chapter::readId($id);

    // Render page
    $this->render('chapter', $data);
  }

  public function calculateDate($data) {
    // Convert form input to timestamp
    $location = '/date';
    if ( isset($_GET['month']) && isset($_GET['day']) ) {
        $time = mktime(0, 0, 0, array_search($_GET['month'], MidgardDate::GREGORIAN_NAME_MONTH) + 1, $_GET['day']);
        $location .= '/' . $time;
    }
    // Redirect to calendar page
    header('Location: ' . $_SERVER['BASE_URI'] . $location);
  }

  public function date($data) {
    // If date was given as parameter, create new date from it
    if (isset($data['date'])) {
        $data['date'] = new MidgardDate($data['date']);
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
