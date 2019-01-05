<?php

final class Database {
  private static $name;

  private static $pdo;

  public static function Current() {
    if (isset(self::$instance)) {
      return self::$instance;
    }
    self::$instance = new Database(self::$name);
    return self::$instance;
  }

  public static function setName($value) {
    self::$name = $value;
  }

  private static function query($query) {
    $pdo = self::getPDO();
    $stmt = $pdo->query($query);
    return $stmt;
  }

  public static function queryAsArray($query) {
    return self::query($query)->fetchAll();
  }

  public static function queryAsObject($query, $class_name) {
    $result = [];

    $stmt = self::query($query);
    while ($obj = $stmt->fetchObject($class_name)) {
      array_push($result, $obj);
    }

    return $result;
  }

  private static function getPDO() {
    if (!isset(self::$pdo)) {
      self::$pdo = self::createPDO(self::$name);
    }
    return self::$pdo;
  }

  private static function createPDO($db) {
    $host = '127.0.0.1';
    // $db   = 'magi_callie';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
      $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    return $pdo;
  }

  private function readNavItems() {
      $this->navItems = [];

      $stmt = $this->pdo->query('
          SELECT *
          FROM nav_items
          ORDER BY id ASC
      ');

      while ($row = $stmt->fetch()) {
          array_push($this->navItems, new NavItem($row['caption'], $row['icon'], $row['url']));
      }
  }

  public function readChapter($id) {
      $stmt = $this->pdo->query('
          SELECT *
          FROM chapters
          WHERE id = ' . $id
      );

      return $stmt->fetch();
  }

  public function readChaptersAmount() {
      $stmt = $this->pdo->query('
          SELECT TABLE_ROWS
          FROM information_schema.TABLES
          WHERE table_name = \'chapters\'
      ');

      return $stmt->fetch()['TABLE_ROWS'];
  }
}
