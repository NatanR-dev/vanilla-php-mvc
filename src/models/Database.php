<?php

class Database {
    protected function connect() {
        return [
            [
                'id' => 1,
                'name' => 'João Silva',
                'username' => 'joao123',
                'email' => 'joao@mail.com',
                'password' => 'senha123',
                'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/5/59/User-avatar.svg'
            ],
            [
                'id' => 2,
                'name' => 'Maria Oliveira',
                'username' => 'maria456',
                'email' => 'maria@mail.com',
                'password' => 'senha456',
                'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/5/59/User-avatar.svg'
            ],
        ];
    }
}