<?php
namespace Models;

use \PDO;

class HomeModel extends Database
{
    public function getHomeData()
    {
        $postModel = new PostModel();
        $posts = $postModel->getAllPosts();
        
        
        $headerData = [
            'title' => 'Home',
        ];
        
        return [
            'headerData' => $headerData,
            'posts'      => $posts,
        ];
    }
} 