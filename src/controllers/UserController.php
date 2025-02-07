<?php 

class UserController
{
    public function index(){
        require_once __DIR__ . '/../models/UserModel.php';
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();

        foreach ($users as $user) {
            echo "ID: " . $user['id'] . "<br>";
            echo "Nome: " . $user['name'] . "<br>";
            echo "Username: " . $user['username'] . "<br>";
            echo "Email: " . $user['email'] . "<br>";
            echo "Avatar: <img src='" . $user['avatar'] . "' alt='Avatar'><br><br>";
        }
    }

    public function show($id){
        echo "User Show: " .htmlspecialchars(($id));
    }
}