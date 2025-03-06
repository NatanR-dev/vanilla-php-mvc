<?php
namespace Models;

use \PDO;

class PostModel extends DatabaseConnection {

    public function getAllPosts() {
        $stmt = $this->pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getPostBySlug($slug) {
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createPost($title, $description, $content, $slug, $author, $images)
    {
        $stmt = $this->pdo->prepare("INSERT INTO posts (title, description, content, slug, author, images) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$title, $description, $content, $slug, $author, json_encode($images)]);
    }

    public function updatePost($id, $title, $description, $content, $slug, $author, $images)
    {
        $stmt = $this->pdo->prepare("UPDATE posts SET title = ?, description = ?, content = ?, slug = ?, author = ?, images = ? WHERE id = ?");
        return $stmt->execute([$title, $description, $content, $slug, $author, json_encode($images), $id]);
    }

    public function deletePost($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM posts WHERE id = ?");
        return $stmt->execute([$id]);
    }
} 