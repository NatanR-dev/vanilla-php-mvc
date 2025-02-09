<?php
namespace Models;

use Models\Database;
use \PDO;

class UserModel extends Database {

    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }

    public function getAllUsers() {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
