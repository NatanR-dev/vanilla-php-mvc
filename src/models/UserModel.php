<?php
namespace Models;

use Models\Database;

class UserModel extends Database {
    public function getAllUsers() {
        return $this->connect(); 
    }
}
