<?php
namespace Controllers;

use Utils\RenderView;
use Models\PostModel;
use Middleware\RoleMiddleware;
use Utils\SlashUrl;
use Controllers\AuthController;

class PostController extends RenderView {
    private $postModel; 

    public function __construct()
    {
        $this->postModel = new PostModel();
    }

    public function index() {
        // var_dump("index method"); Debugging
        $currentRoute = SlashUrl::normalizeUrl(); 
        //var_dump($currentRoute); 
        $posts = $this->postModel->getAllPosts(); 

        if ($currentRoute === '/posts') {
            // public view for the front-end
            RenderView::render('posts/index', ['posts' => $posts]);

        } else if ($currentRoute === '/admin/posts') {
            RoleMiddleware::handle();
            AuthController::checkAuthentication(); 
            // admin view for the back-end
            RenderView::render('admin/posts/index', ['posts' => $posts]);

        } else {
            $notFoundController = new NotFoundController();
            $notFoundController->index();
        }
    }

    public function showById($id) {
        $post = $this->postModel->getPostById($id); 
        $currentRoute = SlashUrl::normalizeUrl();

        if (preg_match('/^\/admin\/posts\/\d+$/', $currentRoute)) {
            AuthController::checkAuthentication();
        }

        if ($post) {
            RenderView::render('posts/show', ['post' => $post]);
        } else {
            $notFoundController = new NotFoundController();
            $notFoundController->index();
        }
    }

    public function showBySlug($slug) {
        $post = $this->postModel->getPostBySlug($slug); 

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
            $this->postModel->createPost(
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
        $post = $this->postModel->getPostById($id); 

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
            $this->postModel->updatePost(
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
        $this->postModel->deletePost($id); 
        header('Location: /admin/posts');
        exit;
    }

} 