<?php

class Path {
  public static function file($url) {
    return getcwd() . '/' . $url;
  }

  public static function view($url) {
    return self::file('app/views/' . $url) . '.tpl.php';
  }

  public static function url($url) {
      return $_SERVER['BASE_URI'] . '/' . $url;
  }

  public static function css_url($url) {
      return self::url('public/css/' . $url);
  }

  public static function current_url() {
      return str_replace($_SERVER['BASE_URI'], '', $_SERVER['REQUEST_URI']);
  }

  public static function base_page($url) {
      return explode('/', $url)[1];
  }
}
