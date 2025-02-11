<?php
namespace Controllers;

use Utils\RenderView;
use Models\PostModel;

class PostController extends RenderView {

    public function index() {
        $postModel = new PostModel();
        $posts = $postModel->getAllPosts();
        
        $this->render('posts/index', ['posts' => $posts]);
    }

    public function show($id) {
        $postModel = new PostModel();
        $post = $postModel->getById($id[0]);
        
        $this->render('posts/show', ['post' => $post]);
    }
} 