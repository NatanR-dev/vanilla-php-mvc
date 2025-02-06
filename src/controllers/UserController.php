<?php 

class UserController
{
    public function show($id){
        echo "User Show: " .htmlspecialchars(($id));
    }
}