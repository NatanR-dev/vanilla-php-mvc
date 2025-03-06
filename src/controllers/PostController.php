<?php
namespace Controllers;

use Utils\RenderView;
use Models\PostModel;

class PostController extends RenderView {

    public function index() {
        $postModel = new PostModel();
        $posts = $postModel->getAllPosts();
        
        RenderView::render('posts/index', ['posts' => $posts]);
    }

    public function showById($id) {
        $postModel = new PostModel();
        $post = $postModel->getPostById($id);

        if ($post) {
            RenderView::render('posts/show', ['post' => $post]);
        } else {
            $notFoundController = new NotFoundController();
            $notFoundController->index();
        }
    }

    public function showBySlug($slug) {
        $postModel = new PostModel();
        $post = $postModel->getPostBySlug($slug);

        if ($post) {
            RenderView::render('posts/show', ['post' => $post]);
        } else {
            $notFoundController = new NotFoundController();
            $notFoundController->index();
        }
    }

    public function create()
    {
        RenderView::render('posts/create');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postModel = new PostModel();
            $postModel->createPost(
                $_POST['title'],
                $_POST['description'],
                $_POST['content'],
                $_POST['slug'],
                $_POST['author'],
                $_FILES['images']
            );
            header('Location: /posts');
            exit;
        }
    }

    public function edit($id)
    {
        $postModel = new PostModel();
        $post = $postModel->getPostById($id);
        RenderView::render('posts/edit', ['post' => $post]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postModel = new PostModel();
            $postModel->updatePost(
                $id,
                $_POST['title'],
                $_POST['description'],
                $_POST['content'],
                $_POST['slug'],
                $_POST['author'],
                $_FILES['images']
            );
            header('Location: /posts');
            exit;
        }
    }

    public function delete($id)
    {
        $postModel = new PostModel();
        $postModel->deletePost($id);
        header('Location: /posts');
        exit;
    }

} 