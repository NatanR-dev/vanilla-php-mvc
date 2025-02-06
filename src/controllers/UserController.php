<?php 

class UserController
{
    public function index(){
        // Simulação de uma lista de usuários
        $usuarios = [
            ['id' => 1, 'username' => 'lorem'],
            ['id' => 2, 'username' => 'ipsum'],
            ['id' => 3, 'username' => 'dolor'],
        ];

        // Exibe a lista de usuários
        foreach ($usuarios as $usuario) {
            echo "ID: " . htmlspecialchars($usuario['id']) . " - Username: " . htmlspecialchars($usuario['username']) . "<br>";
        }
    }

    public function show($id){
        echo "User Show: " .htmlspecialchars(($id));
    }
}