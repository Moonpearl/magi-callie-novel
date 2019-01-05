<?php

class Language {
  public static $objects = [];
  public static $current;

  public static function first() {
    return self::$objects[0];
  }

  public static function setCurrentFromCode($code) {
    self::$current = self::lookup($code);
  }

  public static function exists($code) {
    try {
      self::lookup($code);
      return true;
    } catch (Exception $e) {
      return false;
    }
  }

  private static function lookup($code) {
    foreach (self::$objects as $language) {
      if ($language->code == $code) {
        return $language;
      }
    }
    throw new Exception('Language code "' . $code . '" does not exist');
  }

  public $code;
  public $name;

  public function __construct($code, $name) {
    $this->code = $code;
    $this->name = $name;
    $class_name = get_called_class();
    array_push($class_name::$objects, $this);
  }
}
