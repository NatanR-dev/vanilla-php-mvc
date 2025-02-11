<?php
namespace Models;

use \PDO;
use Models\Database;

class PostModel extends Database {

    protected $pdo;

    public function __construct() {
        $this->pdo = $this->getConnection();
    }

    public function getAllPosts() {
        $stmt = $this->pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

} 