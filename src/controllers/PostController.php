<?php
namespace Controllers;

use Utils\RenderView;
use Models\PostModel;
use Middleware\RoleMiddleware;
use Utils\SlashUrl;
use Controllers\AuthController;

class PostController extends RenderView {

    public function __construct()
    {
        AuthController::checkAuthentication();
    }

    public function index() {
        // var_dump("index method"); Debugging
        $currentRoute = SlashUrl::normalizeUrl(); 
        //var_dump($currentRoute); 

        $postModel = new PostModel();
        $posts = $postModel->getAllPosts();

        if ($currentRoute === '/posts') {
            // public view for the front-end
            RenderView::render('posts/index', ['posts' => $posts]);

        } else if ($currentRoute === '/admin/posts') {
            RoleMiddleware::handle(); 
            // admin view for the back-end
            RenderView::render('admin/posts/index', ['posts' => $posts]);

        } else {
            $notFoundController = new NotFoundController();
            $notFoundController->index();
        }
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
        RoleMiddleware::handle();
        RenderView::render('admin/posts/create');
    }

    public function store()
    {
        RoleMiddleware::handle();
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
            header('Location: /admin/posts');
            exit;
        }
    }

    public function edit($id)
    {
        RoleMiddleware::handle();
        $postModel = new PostModel();
        $post = $postModel->getPostById($id);

        if ($post) {
            RenderView::render('admin/posts/edit', ['post' => $post]);
        } else {
            $notFoundController = new NotFoundController();
            $notFoundController->index();
        }
    }

    public function update($id)
    {
        RoleMiddleware::handle();
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
            header('Location: /admin/posts');
            exit;
        }
    }

    public function delete($id)
    {
        RoleMiddleware::handle();
        $postModel = new PostModel();
        $postModel->deletePost($id);
        header('Location: /admin/posts');
        exit;
    }

} 