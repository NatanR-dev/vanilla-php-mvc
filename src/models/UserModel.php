<?php

require_once __DIR__ . '/../models/Database.php';

class UserModel extends Database {
    public function getAllUsers() {
        return $this->connect(); 
    }
}
