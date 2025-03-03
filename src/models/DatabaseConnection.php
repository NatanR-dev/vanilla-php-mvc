<?php
namespace Models;

use Config\Database;

class DatabaseConnection {
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection(); 
    }
} 