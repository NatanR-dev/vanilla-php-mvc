<?php
namespace Models;

class HomeModel extends DatabaseConnection
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