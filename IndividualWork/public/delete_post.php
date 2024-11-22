<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    require_once __DIR__ . '/../src/controllers/PostController.php';
    $post_id = $_GET['id'];
    PostController::deletePost($post_id);
    header("Location: index.php");
    exit();
}

header("Location: index.php");
exit();
?>
