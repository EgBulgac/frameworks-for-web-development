<?php

require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../../config/db.php';

class PostController
{
    public static function createPost()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $user_id = $_SESSION['user_id'];

            Post::create($title, $content, $user_id);

            header("Location: index.php");
            exit();
        }
    }

    public static function deletePost($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit();
        }

        Post::delete($id);

        header("Location: index.php");
        exit();
    }

    public static function updatePost($id)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header("Location: login.php");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];

            Post::update($id, $title, $content);

            header("Location: index.php");
            exit();
        }
    }

    public static function getAllPosts()
    {
        return Post::getAll();
    }

    public static function readPost($id)
    {
        return Post::findById($id);
    }
}
?>
