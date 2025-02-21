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

    public function showById($id) {
        $postModel = new PostModel();
        $post = $postModel->getById($id);

        if ($post) {
            $this->render('posts/show', ['post' => $post]);
        } else {
            $notFoundController = new NotFoundController();
            $notFoundController->index();
        }
    }

    public function showBySlug($slug) {
        $postModel = new PostModel();
        $post = $postModel->getBySlug($slug);

        if ($post) {
            $this->render('posts/show', ['post' => $post]);
        } else {
            $notFoundController = new NotFoundController();
            $notFoundController->index();
        }
    }
} 