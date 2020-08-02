<?php
namespace Flights\Database;

use PDO;
class Database {
    protected $db;

    public function __construct(){
        try {
            $this->db = new PDO($_ENV['DSN'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}
