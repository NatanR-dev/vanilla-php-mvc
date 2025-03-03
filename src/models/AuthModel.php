<?php

namespace Models;

use PDO;

class AuthModel extends DatabaseConnection
{
    public function getUserByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyPassword($inputPassword, $storedHash)
    {
        return hash('sha256', $inputPassword) === $storedHash;
    }
} 