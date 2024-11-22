<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once __DIR__ . '/../src/controllers/PostController.php';
$posts = PostController::getAllPosts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>All Posts</h1>

        <div class="logout-container">
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>

        <?php if (empty($posts)): ?>
            <p>No posts available. Create one!</p>
        <?php else: ?>
            <div class="posts-list">
                <?php foreach ($posts as $post): ?>
                    <div class="post">
                        <h2><?= htmlspecialchars($post['title']) ?></h2>
                        <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                        <div class="post-actions">
                            <a href="update_post.php?id=<?= $post['id'] ?>" class="edit-btn">Edit</a>
                            <a href="delete_post.php?id=<?= $post['id'] ?>" class="delete-btn">Delete</a>
                            <a href="read_post.php?id=<?= $post['id'] ?>" class="read-btn">Read</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <a href="create_post.php" class="create-btn">Create New Post</a>
    </div>
</body>
</html>
