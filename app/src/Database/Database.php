<?php

namespace Flights\Database;

use PDO;
class Database {
    protected $db;

    public function __construct(){
        $dsn = sprintf(
            'mysql:dbname=%s;host=%s;port=3306',
            $_ENV['DB_NAME'],
            $_ENV['DB_HOST']
        );
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];

        try {
            $this->db = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}
