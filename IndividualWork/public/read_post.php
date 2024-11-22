<?php
session_start();

$post_id = $_GET['id'] ?? null;

if (!$post_id) {
    header("Location: index.php");
    exit();
}

require_once __DIR__ . '/../src/models/Post.php';
$post = Post::findById($post_id);

if (!$post) {
    echo "Post not found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1><?= htmlspecialchars($post['title']) ?></h1>
        <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>

        <a href="index.php" class="back-btn">Back to All Posts</a>
    </div>
</body>
</html>
