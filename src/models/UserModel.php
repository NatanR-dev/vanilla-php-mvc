<?php
namespace Models;

use \PDO;

class UserModel extends DatabaseConnection {

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

    public function getByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($username, $email, $password, $role, $fullName, $birthday)
    {
        $hashedPassword = hash('sha256', $password); 
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password, role, full_name, birthday) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$username, $email, $hashedPassword, $role, $fullName, $birthday]);
    }

    public function getUserById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $fullName, $username, $email, $role, $birthday)
    {
        $stmt = $this->pdo->prepare("UPDATE users SET full_name = ?, username = ?, email = ?, role = ?, birthday = ? WHERE id = ?");
        $stmt->execute([$fullName, $username, $email, $role, $birthday, $id]);
    }

    public function deleteUser($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }
}
