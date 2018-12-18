<?php

// include 'MidgardDate.php';
require_once 'NavItem.php';
require_once 'Chapter.php';

class Database {
    private $pdo;

    public $navItems;
    public $chapters;

    function __construct() {
        // Create database handler
        $this->createPDO();
        // Read nav items from database
        $this->readNavItems();
    }

    private function createPDO() {
        $host = '127.0.0.1';
        $db   = 'magi_callie';
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
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
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

        $data = $stmt->fetch();
        return new Chapter($data['title'], $data['serial']);
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
